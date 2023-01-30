@extends('empresas.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Consulta Empresa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('empresas.index') }}">Voltar</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id:</strong>
                {{ $empresas->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $empresas->nome }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CNPJ:</strong>
                {{ $empresas->cnpj }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefone:</strong>
                {{ $empresas->telefone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $empresas->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Endereco:</strong>
                {{ $empresas->endereco }}
            </div>
        </div>   
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <br>
            <div class="pull-right">
                <a class="btn btn-info btn-sm" href="{{ route('colaboradores.index', ['empresa_id' => $empresas->id]) }}"> Consultar Colaboradores</a>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-primary btn-sm" href="{{ route('colaboradores.create', ['empresa_id' => $empresas->id]) }}"> Cadastrar Colaboradores</a>
            </div>
        </div>
    </div>  
@endsection