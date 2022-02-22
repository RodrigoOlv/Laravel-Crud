@extends('layout.app')

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Categorias</h5>

            @if ( count($products) > 0 )

                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome da Produto</th>
                            <th>Estoque da Produto</th>
                            <th>Preço da Produto</th>
                            <th>Código da Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product['id'] }}</td>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['stock'] }}</td>
                                <td>{{ $product['price'] }}</td>
                                <td>{{ $product['category_id'] }}</td>
                                <td>
                                    <a
                                        href="{{ route('product.edit', $product['id']) }}"
                                        class="btn btn-sm btn-primary"
                                    >
                                        Editar
                                    </a>
                                    <a
                                        href="{{ route('product.delete', $product['id']) }}"
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

                <p class="card-text">Nenhum produto foi encontrado</p>

            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary" role="button">
                Novo Produto
            </a>
        </div>
    </div>
@endsection