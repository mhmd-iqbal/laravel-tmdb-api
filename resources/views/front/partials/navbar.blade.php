<nav class="navbar navbar-dark navbar-expand-lg bg-dark shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Movie Apps</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
      aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Movie Apps</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end align-items-center flex-grow-1 pe-3">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu" style="border: none;">
              @forelse ($categories as $category)
                <li><a class="dropdown-item" href="/{{ $category->category_slug }}">{{ $category->category_name }}</a>
                </li>
              @empty
                <li><a href="javascript:void(0)">No category found</a></li>
              @endforelse

            </ul>
          </li>

          <li class="nav-item mx-4">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-warning px-4" aria-current="page" href="{{ route('login') }}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
