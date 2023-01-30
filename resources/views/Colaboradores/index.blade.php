@extends('colaboradores.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Colaboradores</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('empresas.index') }}"> Voltar</a>
            </div>
        </div>
    </div>  

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>@sortablelink('id', 'Id')</th>
            <th>@sortablelink('nome', 'Nome')</th>
            <th>@sortablelink('telefone', 'Telefone')</th>
            <th>@sortablelink('email', 'Email')</th>
            <th>@sortablelink('data_nascimento', 'Data de Nascimento')</th>
            <th>@sortablelink('empresa_id', 'Id da Empresa')</th>
            <th width="280px">Ação</th>
        </tr>

        @foreach ($colaboradores as $colaborador)
            @if ($colaborador->empresa_id == request()->get('empresa_id'))
                <tr>
                    <td>{{ $colaborador->id }}</td>
                    <td>{{ $colaborador->nome }}</td>
                    <td>{{ $colaborador->telefone }}</td>
                    <td>{{ $colaborador->email }}</td>
                    <td>{{ $colaborador->data_nascimento }}</td>
                    <td>{{ $colaborador->empresa_id }}</td>

                    <td>
                        <form action="{{ route('colaboradores.destroy', $colaborador->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('colaboradores.show', $colaborador->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('colaboradores.edit', $colaborador->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </table> 
    {!! $colaboradores->links() !!}
@endsection