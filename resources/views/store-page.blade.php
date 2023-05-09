@extends("app")

@section("title", "Карточка товара")


@section("content")

<h1 class="my-5">{{__("Home page")}}</h1>



<div class="row">

<div class="col-lg-6 col-12">

<div class="col-12">
<img src="{{$store->getImage()}}" alt="" width="100%">
</div>

</div>

<div class="col-lg-6 col-12">

<div>
<h3 class="mb-3">{{ $store->info}}</h3>
<div class="mb-3">{!!$store->getGroup()!!}</div>
<div class="mb-3">{{ $store->getPrice() }}</div>

<div class="mb-3">
<a href="{{ route('cart.add-store', $store) }}" type="button" class=" btn btn-success"> Добавить в корзину</a>
</div>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
</div>
</div>

</div>


@endsection