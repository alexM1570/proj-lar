
<header>
  <nav class="navbar navbar-expand-lg "style="background-color: #5BD497;" >
  <div class="container">
    <a class="navbar-brand text-light" href="{{url('/')}}">{{config("app.name")}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">Главная</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Консоль администратора
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('categories.droad')}}">Категории</a></li>
            </ul>
        </li>
        </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

  </header>
 