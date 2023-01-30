<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresas::sortable()->paginate(5);

        return view('empresas.index',compact('empresas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
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
            'cnpj' => 'required|cnpj',
            'telefone' => 'required|telefone_com_ddd',
            'email' => 'email',
            'endereco',
        ]);
     
        Empresas::create($request->all());       

        return redirect()->route('empresas.index')
                        ->with('success','Empresa created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function show(Empresas $empresas, $id)
    {
        $empresas = Empresas::findOrFail($id);
        return view('empresas.show',compact('empresas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresas $empresas, $id)
    {
        $empresas = Empresas::findOrFail($id);
        return view('empresas.edit',compact('empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresas $empresas, $id)
    {
        $request->validate([
            'nome' => 'required', 
            'cnpj' => 'required|cnpj',
            'telefone' => 'required|telefone_com_ddd',
            'email' => 'email',
            'endereco',
        ]);

        $empresas = Empresas::findOrFail($id);

        $empresas->update($request->all());

        return redirect()->route('empresas.index')
                        ->with('success','Empresa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresas $empresas, $id)
    {
        $empresas = Empresas::findOrFail($id);
        $empresas->delete();

        return redirect()->route('empresas.index')
                        ->with('success','Empresa deleted successfully');
    }
}
