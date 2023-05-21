@extends("app")

@section("title", "Корзина товаров")


@section("content")

<h1 class="my-5">{{__("Корзина товаров")}}</h1>

@if($cart)

<div class="row">

  <div class="col-lg-8 col-12">


    @foreach($cart->items as $item)

    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-6">
          <img src="{{$item->store->getImage()}}" class="img-fluid rounded-start" alt="" width="100%">
        </div>
        <div class="col-md-6">
          <div class="card-body ">
            <h3 class="card-title  mx-4"> {{ $item->store->info }}</h3>
            <h5 class="card-text m-4">Цена: {{ $item->store->getPrice() }}</h5>
            <div class="d-flex">
              <form action="{{ route('cart.items.qty', $item) }}" method="POST" class="col-3  mx-4">
                @csrf @method('PUT')
                <input type="number" class="form-control change-qty d-flex" name="quantity" value="{{ $item->quantity }}">
              </form>
              <form action="{{ route('cart.items.destroy', $item) }}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Удалить</button>
              </form>

            </div>
            <h5 class="card-text m-4"><small class="text-body-secondary"> Сумма: {{ priceFormat($item->sub_total) }}</small></h5>


          </div>
        </div>
      </div>
    </div>

    

    @endforeach


  </div>

  <div class="order col-lg-4 col-12 ">

    <div class="text-center mt-5">
      <h3 class="mb-4 text-primary">Ваш заказ!</h3>

      <h4 class="mb-2">Сумма заказа</h4>
      <h5 class="mb-2">{{ priceFormat($cart->getTotalPrice()) }}</h5>
    <form action="{{ route('checkout.app') }}" >
      <button  class="btn btn-primary"  >Оформить заказ</button>
      </form>

    </div>


  </div>
</div>
@else

<div>

  <h3>Ваша корзина пуста!</h3>

  <a href="/" class="btn btn-info">Главная страница</a>

</div>
@endif

@endsection