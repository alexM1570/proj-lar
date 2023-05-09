@extends("app")

@section("title", "Корзина товаров")


@section("content")

<h1 class="my-5">{{__("Корзина товаров")}}</h1>



<div class="row">

<div class="col-lg-8 col-12">


        @foreach($cart->items as $item)

        <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-6">
      <img src="{{$item->store->getImage()}}" class="img-fluid rounded-start" alt=""width="100%">
    </div>
    <div class="col-md-6">
      <div class="card-body ">
        <h3 class="card-title  mx-4">  {{ $item->store->info }}</h3>
        <h5 class="card-text m-4">Цена: {{ $item->store->getPrice() }}</h5>
        <div class="d-flex">
        <form action="{{ route('cart.items.qty', $item) }}"method="POST" class="col-3  mx-4">
                    @csrf @method('PUT')
                    <input type="number" class="form-control change-qty d-flex" name="quantity" value="{{ $item->quantity }}">
                </form>
                <form action="{{ route('cart.items.destroy', $item) }}"method="POST">
                    @csrf @method('DELETE')
                   <button class="btn btn-sm btn-danger">Удалить</button>
                </form>
                
        </div>
        <h5 class="card-text m-4"><small class="text-body-secondary"> Сумма: {{ $item->subTotal() }}</small></h5>
        
       
      </div>
    </div>
  </div>
</div>
       
        @endforeach


<div class="col-lg-4 col-12">


</div>

</div>


@endsection