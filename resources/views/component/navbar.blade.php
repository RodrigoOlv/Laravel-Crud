<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded px-3">
    <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbar"
        aria-controls="navbar"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a
                class="nav-link{{ $current == 'home' ? ' active' : '' }}"
                href="{{ route('index') }}"
            >
                Home
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link{{ $current == 'products' ? ' active' : '' }}"
                href="{{ route('product') }}"
            >
                Produtos
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link{{ $current == 'categories' ? ' active' : '' }}"
                href="{{ route('category') }}"
            >
                Categorias
            </a>
        </li>
    </ul>

    </div>
</nav>