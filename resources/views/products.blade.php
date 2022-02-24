@extends('layout.app')

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Categorias</h5>
            <table class="table table-ordered table-hover" id="table-products">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product-dialog">
                Novo produto
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div
        class="modal"
        id="product-dialog"
        tabindex="-1"
        aria-labelledby="product-dialog-title"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" id="form-product">
                    <div class="modal-header">
                        <h5 class="modal-title" id="product-dialog-title">Novo produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="productName"
                                placeholder="Nome do Produto"
                                name="name"
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
                            >
                            <label for="productPrice">Preço do Produto</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="productCategory" name="category-id">
                                <option selected>Selecione a categoria do produto</option>
                            </select>
                            <label for="categoryProduct">Categoria</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function loadCategories() {
            $.getJSON('/api/categorias', function(data) {

                for(i = 0; i < data.length; i++) {
                    opt = '<option value="' + data[i].id + '">' + data[i].name + '</option>';

                    $('#productCategory').append(opt);
                }
            });
        }

        function getRow(p) {
            var row = '<tr>' +
                        '<td>' + p.id + '</td>' +
                        '<td>' + p.name + '</td>' +
                        '<td>' + p.stock + '</td>' +
                        '<td>' + p.price + '</td>' +
                        '<td>' + p.category_id + '</td>' +
                        '<td>' +
                            '<button class="btn btn-primary btn-sm" onClick="edit('+ p.id +')">Editar</button>' + 
                            '<button class="btn btn-danger btn-sm ms-2" onClick="remove(' + p.id +')">Apagar</button>' + 
                        '</td>' +
                    '</tr>';

            return row;
        }

        function loadProducts() {
            $.getJSON('/api/produtos', function(products) {

                for(i = 0; i < products.length; i++) {
                    
                    row = getRow(products[i]);

                    $('#table-products>tbody').append(row);
                }
            });
        }

        function createProduct() {

            prod = {
                name: $('#productName').val(),
                price: $('#productPrice').val(),
                stock: $('#productStock').val(),
                category_id: $('#productCategory').val()
            };

            $.post('/api/produtos', prod, function(data) {
                
                product = JSON.parse(data);

                row = getRow(product);

                $('#table-products>tbody').append(row);
            })
        }

        function saveProduct() {
            prod = {
                id: $('#id').val(),
                name: $('#productName').val(),
                price: $('#productPrice').val(),
                stock: $('#productStock').val(),
                category_id: $('#productCategory').val()
            };

            $.ajax({
                type: 'PUT',
                url: '/api/produtos/' + prod.id,
                context: this,
                data: prod,
                success: function(data) {

                    prod = JSON.parse(data);
                    
                    row = $('#table-products>tbody>tr');

                    e = row.filter( function(i, e) {
                        
                        return (e.cells[0].textContent == prod.id);
                    });

                    if ( e ) {
                        
                        e[0].cells[0].textContent = prod.id;
                        e[0].cells[1].textContent = prod.name;
                        e[0].cells[2].textContent = prod.stock;
                        e[0].cells[3].textContent = prod.price;
                        e[0].cells[4].textContent = prod.category_id;
                    }
                },
                error: function(error) {

                    console.log(error);
                }
            });
        }

        $('#form-product').submit(function(event) {
            
            event.preventDefault();

            if ( $('#id').val() != '' )
                
                saveProduct();

            else
                
                createProduct();

            $('#product-dialog').hide();
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        });

        function remove(id) {
            $.ajax({
                type: 'DELETE',
                url: '/api/produtos/' + id,
                context: this,
                success: function() {
                    
                    row = $('#table-products>tbody>tr');

                    e = row.filter(function(i, el) {
                        
                        return el.cells[0].textContent == id;
                    });

                    if ( e )
                        
                        e.remove();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function edit(id) {
            $.getJSON('/api/produtos/' + id, function(data) {

                $('#id').val(data.id);
                $('#productName').val(data.name);
                $('#productPrice').val(data.price);
                $('#productStock').val(data.stock);
                $('#productCategory').val(data.category_id);

                $('#product-dialog').show();
            });
        }

        $(function() {
            loadCategories();
            loadProducts();
        });

    </script>
@endsection