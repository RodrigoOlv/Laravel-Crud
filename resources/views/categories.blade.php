@extends('layout.app')

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Categorias</h5>

            @if ( count($categories) > 0 )
                
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Name da Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category['id'] }}</td>
                                <td>{{ $category['name'] }}</td>
                                <td>
                                    <a
                                        href="{{ route('category.edit', $category['id']) }}"
                                        class="btn btn-sm btn-primary"
                                    >
                                        Editar
                                    </a>
                                    <a
                                        href="{{ route('category.delete', $category['id']) }}"
                                        class="btn btn-sm btn-danger"
                                    >
                                        Apagar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else

                <p class="card-text">Nenhuma categoria foi encontrada</p>

            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary" role="button">
                Nova Categoria
            </a>
        </div>
    </div>
@endsection