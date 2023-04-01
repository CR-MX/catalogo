<?php

namespace App\Http\Controllers;

use App\ProductosCategoria;
use Illuminate\Http\Request;

/**
 * Class ProductosCategoriaController
 * @package App\Http\Controllers
 */
class ProductosCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productosCategorias = ProductosCategoria::paginate();

        return view('productos-categoria.index', compact('productosCategorias'))
            ->with('i', (request()->input('page', 1) - 1) * $productosCategorias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productosCategoria = new ProductosCategoria();
        return view('productos-categoria.create', compact('productosCategoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductosCategoria::$rules);

        $productosCategoria = ProductosCategoria::create($request->all());

        return redirect()->route('productos-categorias.index')
            ->with('success', 'ProductosCategoria created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productosCategoria = ProductosCategoria::find($id);

        return view('productos-categoria.show', compact('productosCategoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productosCategoria = ProductosCategoria::find($id);

        return view('productos-categoria.edit', compact('productosCategoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductosCategoria $productosCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductosCategoria $productosCategoria)
    {
        request()->validate(ProductosCategoria::$rules);

        $productosCategoria->update($request->all());

        return redirect()->route('productos-categoria.index')
            ->with('success', 'ProductosCategoria updated successfully');
    }


    // solo se usa como metodo externo
    public function destroy($id)
    {
        $productosCategoria = ProductosCategoria::find($id)->delete();
        return $productosCategoria;
    }
}
