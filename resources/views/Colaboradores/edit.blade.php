@extends('colaboradores.layout')   

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Colaborador</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('empresas.index') }}"> Back</a>
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

    <form action="{{ route('colaboradores.update',$colaboradores->id) }}" method="POST">
        @csrf
        @method('PUT')   
         <div class="row">
            <div class="form-group" for="nome">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" id="nome" value="{{ $colaboradores->nome }}" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="telefone">
                    <strong>Telefone:</strong>
                    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="(99)9999-9999" mask="(00) 0000-0000" value="{{ $colaboradores->telefone }}"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="email">
                    <strong>E-mail:</strong>
                    <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@mail.com" value="{{ $colaboradores->email }}"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="data_nascimento">
                    <strong>Data de Nascimento:</strong>
                    <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento" value="{{ $colaboradores->data_nascimento }}"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" for="empresa_id">
                    <input type="hidden" class="form-control" name="empresa_id" id="empresa_id" placeholder="Id" value="{{ request()->get('empresa_id') }}"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection