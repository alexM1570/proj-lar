@extends("app")

@section("title", "Главная страница")


@section("content")

<h1 class="my-5">{{__("Home page")}}</h1>

@foreach($stores as $store)
<div class="float-start mx-2">
<div class="card" style="width: 18rem; height: 460px;">
  <img src="{{$store->getImage()}}" class="card-img-top" alt="..." height="220px">
  <div class="card-body">
    <h3 class="card-title">{{$store->info}}</h3>
    <h5 class="card-title">Цена:{{$store->price}}</h5>
    <p class="card-text">Группа товара: {{$store->group}} <br> Категория: {{$store->category->name}}</p>
    <a href="#" class="btn btn-primary ">Добавить</a>
  </div>
</div>
</div>
@endforeach






@endsection

