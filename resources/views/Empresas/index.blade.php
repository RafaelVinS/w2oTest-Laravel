@extends('empresas.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Empresas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('empresas.create') }}"> Cadastrar Empresas</a>
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
            <th>@sortablelink('cnpj', 'CNPJ')</th>
            <th>@sortablelink('telefone', 'Telefone')</th>
            <th>@sortablelink('email', 'Email')</th>
            <th>@sortablelink('endereco', 'Endereço')</th>
            <th width="280px">Ação</th>
        </tr>

        @foreach ($empresas as $empresa)

        <tr>
            <td>{{ $empresa->id }}</td>
            <td>{{ $empresa->nome }}</td>
            <td>{{ $empresa->cnpj }}</td>
            <td>{{ $empresa->telefone }}</td>
            <td>{{ $empresa->email }}</td>
            <td>{{ $empresa->endereco }}</td>

            <td>
                <form action="{{ route('empresas.destroy',$empresa->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('empresas.show',$empresa->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('empresas.edit',$empresa->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table> 
    {!! $empresas->appends(Request::except('page'))->render() !!}
    {!! $empresas->links() !!}
@endsection