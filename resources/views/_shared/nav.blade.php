<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
        <a class="nav-link {{ Request::is('pedidos*') || Request::is('/*') ? 'active' : '' }}" href="{{ url('/') }}">
            <span data-feather="home"></span>
            Pedidos <span class="sr-only">(current)</span>
        </a>
        </li>

    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>CADASTRO BÁSICOS</span>
        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle"></span>
        </a>
    </h6>

    <ul class="nav flex-column mb-2">
        <li class="nav-item">
        <a class="nav-link {{ Request::is('produtos*') ? 'active' : '' }}" href="{{ url('/produtos') }}">
            Produtos 
        </a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}" href="{{ url('/clientes') }}">
            Clientes 
        </a>
        </li>
        
    </ul>
    </div>
</nav>