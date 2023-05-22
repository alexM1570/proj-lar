<h2>Здравствуйте, {{ $order->user_name }}</h2>

<h4>Вы успешно оформили заказ № {{ $order->id }}</h4>

<p>Список заказа</p>
<table>
@foreach($order->items as $item)
    <tr>
       <td> {{ $item->store->info }} </td>
       <td> {{ priceFormat($item->price) }} </td>
       <td> {{ $item->store->quantity }} </td>
       <td> {{ priceFormat($item->sub_total) }} </td>
       
       </tr>
    @endforeach
</table>