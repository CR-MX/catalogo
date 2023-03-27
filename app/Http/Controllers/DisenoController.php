<?php

namespace App\Http\Controllers;

use App\Diseno;
use Illuminate\Http\Request;

/**
 * Class DisenoController
 * @package App\Http\Controllers
 */
class DisenoController extends Controller
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
        $disenos = Diseno::where('categoria_id',$id)->paginate();

        return view('diseno.index', compact('disenos','id','nombre'))
            ->with('i', (request()->input('page', 1) - 1) * $disenos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diseno = new Diseno();
        return view('diseno.create', compact('diseno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Diseno::$rules);

        $diseno = Diseno::create($request->all());

        return redirect()->route('disenos.index', ['id' => $diseno->categoria_id, 'nombre' =>$diseno->categoria->nombre ])
            ->with('success', 'Diseno created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diseno = Diseno::find($id);

        return view('diseno.show', compact('diseno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diseno = Diseno::find($id);
        $categoria =[$diseno->categoria->id => $diseno->categoria->nombre ] ;
        return view('diseno.edit', compact('diseno','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Diseno $diseno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diseno $diseno)
    {
        request()->validate(Diseno::$rules);

        $diseno->update($request->all());

        return redirect()->route('disenos.index')
            ->with('success', 'Diseno updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $diseno = Diseno::find($id)->delete();

        return redirect()->route('disenos.index')
            ->with('success', 'Diseno deleted successfully');
    }
}
