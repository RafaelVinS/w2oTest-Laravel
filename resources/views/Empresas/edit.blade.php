@extends('empresas.layout')   

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Empresa</h2>
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

    <form action="{{ route('empresas.update',$empresas->id) }}" method="POST">
        @csrf
        @method('PUT')   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="nome">
                    <strong>Razão social:</strong>
                    <input type="text" name="nome" id="nome" value="{{ $empresas->nome }}" class="form-control" placeholder="Razão social">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="cnpj">
                    <strong>CNPJ:</strong>
                    <input type="tel" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ" mask="99.999.999/9999-99" value="{{ $empresas->cnpj }}"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="telefone">
                    <strong>Telefone:</strong>
                    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="(99)9999-9999" mask="(00) 0 0000-0000" value="{{ $empresas->telefone }}"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="email">
                    <strong>E-mail:</strong>
                    <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com" value="{{ $empresas->email }}"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="endereco">
                    <strong>Endereço:</strong>
                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereco" value="{{ $empresas->endereco }}"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection