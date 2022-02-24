@extends('layout.app')

@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <div class="row p-5">
            <div class="col-md-6 d-flex">
                <div class="card border border-primary">
                    <div class="card-body d-flex flex-column w-100">
                        <h5 class="card-title">Cadastro de Produtos</h5>
                        <p class="card-text">
                            Aqui você cadastra todos os seus produtos.
                            Só não esqueça de cadastrar previamente as categorias.
                        </p>
                        <a href="{{ route('product') }}" class="btn btn-primary mt-auto mr-auto">
                            Cadastre seus produtos
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card border border-primary w-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Cadastro de Categorias</h5>
                        <p class="card-text">
                            Cadastre as categorias dos seus produtos
                        </p>
                        <a href="{{ route('category') }}" class="btn btn-primary mt-auto mr-auto">
                            Cadastre suas categorias
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection