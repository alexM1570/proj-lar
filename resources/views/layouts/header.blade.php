
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
            <li><a class="dropdown-item" href="{{route('card.index')}}">Список товара</a></li>
            </ul>
        </li>
        </ul>
       
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @if(auth()->user())

          <li class="nav-item text-danger mx-3">

          {{auth()->user()->name}}

          </li>
          <li class="nav-item text-danger mx-3">

<form action="{{route('auth.logout')}}" method="POST">
  @csrf
<button type="submit" class="btn btn-sm btn-danger">Выйти</button>
</form>

              </li>

@else
<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('auth.register')}}">Регистрация</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('auth.login')}}">Вход</a>
        </li>

          @endif
     
        </ul>
    </div>
  </div>
</nav>

  </header>
 