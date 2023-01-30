@extends('empresas.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cadastrar Empresa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('empresas.index') }}"> Voltar</a>
            </div>
        </div>
    </div>  

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif  

    <form action="{{ route('empresas.store') }}" method="POST">
        @csrf 
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="nome">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="cnpj">
                    <strong>CNPJ:</strong>
                    <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="telefone">
                    <strong>Telefone:</strong>
                    <input type="tel" class="form-control" name="telefone" id="telefone"  placeholder="(99)9999-9999"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="email">
                    <strong>E-mail:</strong>
                    <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="endereco">
                    <strong>Endereço:</strong>
                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereco"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>   
    </form>
@endsection