@extends("app")

@section("title", "Главная страница")


@section("content")

<h1 class="my-5">{{__("Home page")}}</h1>



<div class="row">
  @foreach($stores as $store)
  <div class="col-lg-3 col-md-4 col-6">
    <div class="card mb-3" style="height: 450px">
      <img src="{{$store->getImage()}}" class="card-img-top" alt="..." height="220px">
      <div class="card-body">
        <h3 class="card-title">{{$store->info}}</h3>
        <h5 class="card-title">Цена: {{$store->getPrice()}}</h5>
        <p class="card-text"> Категория: {{$store->category->name}}</p>
        @foreach($store->groups as $group)
        <p class="card-text"> Группа товара:{{$group->name}} </p>
        @endforeach
        <a href="{{route('store_show', $store->slug)}}" class="btn btn-sm btn-primary ">Перейти</a>
        <a href="{{ route('cart.add-store', $store) }}" type="button" class="add-to-cart btn btn-sm btn-success"> Добавить в корзину</a>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group me-2" role="group" aria-label="First group">
    @if($stores->currentPage() != 1)
    <a href="{{ $stores->previousPageUrl() }}" type="button" class="btn btn-primary"><</a>
        @endif
        @for($i=1;$i<=$stores->lastPage();$i++)
          <a href="{{ $stores->url($i) }}" type="button" class="btn @if($i==$stores->currentPage()) btn-primary @else btn-outline-primary @endif">{{$i}}</a>
          @endfor
          @if($stores->currentPage() != $stores->lastPage())
          <a href="{{ $stores->nextPageUrl() }}" type="button" class="btn btn-primary">></a>
          @endif
  </div>
</div>







@endsection