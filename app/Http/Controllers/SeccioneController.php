<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Diseno;
use App\Producto;
use App\Seccione;
use Illuminate\Http\Request;

/**
 * Class SeccioneController
 * @package App\Http\Controllers
 */
class SeccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secciones = Seccione::paginate();

        return view('seccione.index', compact('secciones'))
            ->with('i', (request()->input('page', 1) - 1) * $secciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seccione = new Seccione();
        return view('seccione.create', compact('seccione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Seccione::$rules);

        $seccione = Seccione::create($request->all());
        if ($seccione->imagen != null) {
            $nombre = 'imgSeccion_'.$seccione->id.'_'.$seccione->imagen->getClientOriginalName();
            $seccione->imagen->storeAs('public',$nombre);
            $getSeccione = Seccione::find($seccione->id);
            $getSeccione->imagen = '/storage/'.$nombre;
            $getSeccione->save();
        }
        return redirect()->route('secciones.index')
            ->with('success', 'Seccione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seccione = Seccione::find($id);

        return view('seccione.show', compact('seccione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seccione = Seccione::find($id);

        return view('seccione.edit', compact('seccione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Seccione $seccione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seccione $seccione)
    {
        request()->validate(Seccione::$rules);
        if ($request->imagen != null) {
            if ($seccione->imagen != null) {
                $fileImagen = base_path('storage/app/public/'.explode("/",$seccione->imagen)[2]);
                if(file_exists($fileImagen)){
                    unlink($fileImagen);
                }
            }
            $nombre = 'imgSeccion_'.$seccione->id.'_'. $request->imagen->getClientOriginalName();
            $request->imagen->storeAs('public',$nombre);
            $seccione->update($request->all());
            $seccione->imagen = '/storage/'.$nombre;
            $seccione->save();  
        }else{
            $seccione->update($request->all());
        }

        return redirect()->route('secciones.index')
            ->with('success', 'Seccione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $seccione = Seccione::find($id);
        // borra su imagen de seccion
        if ($seccione->imagen != null) {
            $fileImagen = base_path('storage/app/public/'.explode("/",$seccione->imagen)[2]);
            if(file_exists($fileImagen)){
                unlink($fileImagen);
            }
        }
        // elimina los productos relacionados
        $secProductos = $seccione->productos;
        $productoController = new ProductoController;
        foreach ($secProductos as $item) {
            $productoController->destroy($item->id);
        }
        // elimina registro seccion
        $seccione->delete();
        return redirect()->route('secciones.index')
            ->with('success', 'Seccione deleted successfully');
    }

    // inicio
    public function inicio()
    {
        $secciones = Seccione::paginate();
        return view('menu.inicio', compact('secciones'))
            ->with('i', (request()->input('page', 1) - 1) * $secciones->perPage());
    }

    // vista de lista de productos
    public function listaProductos($seccion_id)
    {
        $producto = Producto::where('seccion_id',$seccion_id)->get();
        $nombre = Seccione::find($seccion_id)->nombre;
        return view('menu.listaProductos', compact('producto','nombre'));
    }

    // vista deproducto especifico
    public function producto($producto_id)
    {
        $producto = Producto::find($producto_id);
        $categorias = $producto->categoria;
        $esUno = $categorias->count() == 1 || $categorias->count() == 0 ? True:false;
        return view('menu.producto', compact('producto','categorias','esUno'));
    }

    // vista deproducto especifico
    public function listaDisenos(Request $request)
    {
        $categoria_id = $request->categoria_id;
        $clave = $request->clave;
        $diseno = Diseno::where('categoria_id',$categoria_id)->get();
        $nombre = Categoria::find($categoria_id)->nombre;
        return view('menu.diseno', compact('diseno','nombre','clave'));
    }
}
