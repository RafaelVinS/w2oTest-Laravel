<?php

namespace App\Http\Controllers;

use App\Models\Colaboradores;
use Illuminate\Http\Request;

class ColaboradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colaboradores = Colaboradores::sortable()->paginate(5);
        
        return view('colaboradores.index',compact('colaboradores'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Colaboradores $colaboradores)
    {
        return view('colaboradores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required', 
            'telefone' => 'required|telefone_com_ddd',
            'email' => 'required|email',
            'data_nascimento',
            'empresa_id' => 'required',
        ]);

        $empresa_id = $request->id;
     
        Colaboradores::create($request->all());       

        return redirect()->route('empresas.index')
                        ->with('success','Colaborador created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colaboradores  $colaboradores
     * @return \Illuminate\Http\Response
     */
    public function show(Colaboradores $colaboradores, $id)
    {
        $colaboradores = Colaboradores::findOrFail($id);
        return view('colaboradores.show',compact('colaboradores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colaboradores  $colaboradores
     * @return \Illuminate\Http\Response
     */
    public function edit(Colaboradores $colaboradores, $id)
    {
        $colaboradores = Colaboradores::findOrFail($id);
        return view('colaboradores.edit',compact('colaboradores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colaboradores  $colaboradores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colaboradores $colaboradores, $id)
    {
        $request->validate([
            'nome' => 'required', 
            'telefone' => 'required|telefone_com_ddd',
            'email' => 'required|email',
            'data_nascimento',
            'empresa_id' => 'required',
        ]);

        $colaboradores = Colaboradores::findOrFail($id);

        $colaboradores->update($request->all());

        return redirect()->route('colaboradores.index')
                        ->with('success','Colaborador updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colaboradores  $colaboradores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colaboradores $colaboradores, $id)
    {
        $colaboradores = Colaboradores::findOrFail($id);
        $colaboradores->delete();

        return redirect()->route('colaboradores.index')
                        ->with('success','Colaborador deleted successfully');
    }
}