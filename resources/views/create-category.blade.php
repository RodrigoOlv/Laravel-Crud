@extends('layout.app', ['current' => 'categories'])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('category') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        id="categoryName"
                        placeholder="Nome da Categoria"
                        name="name"
                    >
                    <label for="categoryName">Nome da Categoria</label>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
@endsection