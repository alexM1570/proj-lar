

@extends("app")


@section('title', 'Карточки товара')
@section('content')


<h2 class="my-5 ">Карточки товара товара</h2>



<div class="card" style="width: 16rem;">
  <img src="{{$store->getImage()}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-title">{{$store->info}}</h3>
    <h5 class="card-title">Цена:{{$store->price}}</h5>
    <p class="card-text">Группа товара: {{$store->group}} <br> Категория: {{$store->category->name}}</p>
    <a href="#" class="btn btn-primary">Добавить</a>
  </div>
</div>

@endsection

