<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\ProductosCategoria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $nombre = $request->nombre;
        $productos = Producto::where('seccion_id',$id)->paginate();
        return view('producto.index', compact('productos','id','nombre'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Producto::$rules);
        // crear la clave como folio 
        $claveMaxima = Producto::max('clave')+1;
        $request->request->add(['clave' => $claveMaxima]);
        $producto = Producto::create($request->all());
        if ($producto->imagen != null) {
            $nombre = 'imgProducto_'.$producto->id.'_'.$producto->imagen->getClientOriginalName();
            $producto->imagen->storeAs('public',$nombre);
            $getProducto = Producto::find($producto->id);
            $getProducto->imagen = '/storage/'.$nombre;
            $getProducto->save();
        }
        return redirect()->route('producto.index',['id' => $producto->seccion_id,'nombre' =>$producto->seccion->nombre])
        ->with('success', 'Producto creado con clave "'.$claveMaxima.'".');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $seccion =[$producto->seccion->id => $producto->seccion->nombre ] ;
        return view('producto.edit', compact('producto','seccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);
        if ($request->imagen != null) {
            if ($producto->imagen != null) {
                $fileImagen = base_path('storage/app/public/'.explode("/",$producto->imagen)[2]);
                if(file_exists($fileImagen)){
                    unlink($fileImagen);
                }
            }
            $nombre = 'imgProducto_'.$producto->id.'_'. $request->imagen->getClientOriginalName();
            $request->imagen->storeAs('public',$nombre);
            $producto->update($request->all());
            $producto->imagen = '/storage/'.$nombre;
            $producto->save();  
        }else{
            $producto->update($request->all());
        }
        return redirect()->route('productos.index',['id' => $producto->seccion_id, 'nombre' =>$producto->seccion->nombre ])
            ->with('success', 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        // se elimina la imagen
        if ($producto->imagen != null) {
            $fileImagen = base_path('storage/app/public/'.explode("/",$producto->imagen)[2]);
            if(file_exists($fileImagen)){
                unlink($fileImagen);
            }
        }
        // se eleminan las relaciones con categoria
        $RelacionProCat = $producto->categoria;
        $disController = new ProductosCategoriaController;
        foreach ($RelacionProCat as $item) {
            $disController->destroy($item->id);
        }
        // se elimina el registro
        $producto->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }

    public function cat_pro($id)
    {
        $producto = Producto::find($id);
        $categorias = DB::select(DB::raw("
            SELECT
                c.id,
                c.nombre,
                if(pc.id is not null, 1, 0)  as 'es_check'
            FROM
                categorias c
                LEFT JOIN( SELECT 
                    pc.id, pc.producto_id, pc.categoria_id 
                    FROM productos_categorias pc 
                    WHERE pc.producto_id = ".$id." ) as pc ON pc.categoria_id = c.id
            "));
        return view('producto.categoria', compact('producto','categorias'));
    }

    public function updatecatpro(Request $request, Producto $producto)
    {
        $pro = Producto::find($request->id);
        $pro->categoria()->delete();
        $check_cat = $request->cat;
        if($check_cat){
            $dateNow = Carbon::now()->toDateTimeString();
            foreach($check_cat as $item){
                $arreglo_cat = [
                    'producto_id' => $pro->id,
                    'categoria_id' => $item,
                    'create_at' => $dateNow,
                    'updated_at' => $dateNow,
                ];
                $productosCategoria = ProductosCategoria::create($arreglo_cat);
            }
        }
        return redirect()->route('productos.index',['id' => $pro->seccion_id,'nombre' =>$pro->seccion->nombre])
            ->with('success', 'Producto updated successfully');
    }
}
