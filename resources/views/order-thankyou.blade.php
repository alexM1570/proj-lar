@extends("app")

@section("title", "Корзина товаров")


@section("content")

<h1 class="my-5">{{__("Спасибо за заказ!")}}</h1>

<h3 class="mb-3">Ваш заказ №{{$order->id}} успешно оформлен!</h3>
<h4>Статус закза - {{__('statuses.' .$order->status)}}.</h4>

@foreach($order->items as $item)
<table class="table table-striped">
    <thead>
        <tr>

            <th>{{__("image")}}</th>
            <th>{{__("product name")}}</th>
            <th>{{__("price")}}</th>



        </tr>

    </thead>

    <tbody>

        <tr>
            <td>
                <img src="{{$item->store->getImage()}}" alt="" height="50px">
            </td>
            <td>
                {{$item->store->info}}
            </td>
            <td>

                {{$item->subtotal}}

            </td>


    </tbody>

</table>
@endforeach




<a href="/" class="btn btn-success">Вернуться на главную</a>

@endsection