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
                class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}"
                href="{{ route('index') }}"
            >
                Home
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                href="{{ route('products') }}"
            >
                Produtos
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                href="{{ route('categories') }}"
            >
                Categorias
            </a>
        </li>
    </ul>

    </div>
</nav>