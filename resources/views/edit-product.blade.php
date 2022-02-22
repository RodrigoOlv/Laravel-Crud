@extends('layout.app')

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('product.update', $prod['id']) }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        id="productName"
                        placeholder="Nome do Produto"
                        name="name"
                        value="{{ $prod['name'] }}"
                    >
                    <label for="productName">Nome do Produto</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="number"
                        class="form-control"
                        id="productStock"
                        placeholder="Estoque do Produto"
                        name="stock"
                        value="{{ $prod['stock'] }}"
                    >
                    <label for="productStock">Estoque do Produto</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="number"
                        class="form-control"
                        id="productPrice"
                        placeholder="Preço do Produto"
                        name="price"
                        value="{{ $prod['price'] }}"
                    >
                    <label for="productPrice">Preço do Produto</label>
                </div>
                <div class="form-floating mb-3">
                    @if ($categories)
                        <select name="category" id="productCategory" class="form-select">
                            {{-- <option selected>Selecione a categoria</option> --}}
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}" @if ( $category['name'] == $prod['category_id']) selected @endif>
                                    {{ $category['name'] }}
                                </option>
                            @endforeach
                        </select>
                        <label for="productCategory">Categoria</label>
                    @else
                        <input type="text" value="Nenhuma categoria disponível" readonly>
                    @endif

                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
@endsection