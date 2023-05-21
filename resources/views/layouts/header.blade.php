<header>
  <nav class="navbar navbar-expand-lg " style="background-color: #5BD497;">
    <div class="container">
      <a class="navbar-brand text-light" href="{{url('/')}}">{{config("app.name")}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">{{__('app.menu-home')}}</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('app.menu-console')}}
            </a>
            <ul class="dropdown-menu">

              <li><a class="dropdown-item" href="{{route('users.index')}}">{{__('app.menu-users')}}</a></li>
              <li><a class="dropdown-item" href="{{route('roles.index')}}">{{__('app.menu-roles')}}</a></li>
              <li><a class="dropdown-item" href="{{route('permissions.index')}}">{{__('app.menu-permissions')}}</a></li>

              <li><a class="dropdown-item" href="{{route('categories.droad')}}">{{__('app.menu-categories')}}</a></li>
              <li><a class="dropdown-item" href="{{route('card.index')}}">{{__('app.menu-list')}}</a></li>
              <li><a class="dropdown-item" href="{{route('groups.index')}}">{{__('app.menu-groups')}}</a></li>
              <li><a class="dropdown-item" href="{{route('orders.index')}}">{{__('app.menu-user orders')}}</a></li>


            </ul>
          </li>
        </ul>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('app.menu-lang')}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('changeLang', 'en')}}">{{__('app.menu-english')}}</a></li>
              <li><a class="dropdown-item" href="{{route('changeLang', 'ru')}}">{{__('app.menu-russian')}}</a></li>
              <li><a class="dropdown-item" href="{{route('changeLang', 'ko')}}">{{__('app.menu-korean')}}</a></li>
            </ul>
          </li>
        </ul>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('app.menu-categories')}}
            </a>
            <ul class="dropdown-menu">
              @foreach($categories as $category)
              <li>
                <a class="dropdown-item" href="#">

                  {{ $category->name }}

                </a>


              </li>
              @endforeach
            </ul>
          </li>
        </ul>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            @if($currentUser)
            @if($currentUser->cart)
            <a class="nav-link  mx-2 header-cart"  href="{{ route('cart')}}">Корзина( {{ $currentUser->cart->items->count() }} )</a>
            @else
            <a href="#" class="header-cart">Корзина</a>
            @endif
            @endif
          </li>
          
        </ul>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li><a class="dropdown-item" href="{{route('admin.orders')}}">{{__('app.menu-orders')}}</a></li>
        </ul>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @if(auth()->user())

          <li class="nav-item text-danger mx-3">

            {{auth()->user()->name}}

          </li>
          <li class="nav-item text-danger mx-3">

            <form action="{{route('auth.logout')}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-sm btn-danger">{{__('app.menu-exit')}}</button>
            </form>

          </li>

          @else
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('auth.register')}}">{{__("Registration")}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('auth.login')}}">{{__("Entrance")}}</a>
          </li>

          @endif

        </ul>
      </div>
    </div>
  </nav>

</header>