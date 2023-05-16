@extends("app")


@section('title', 'Список заказов')
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{ __("Список заказов") }}</h2>


</div>
<table class = "table table-striped">

<thead>
<tr>

<th>ID</th>
<th>ФИО</th>
<th>Товар</th>
<th>Сумма заказа</th>
<th>Действия</th>

</tr>

</thead>
@foreach($orders as $order)
<tbody>

<tr>
    <td>{{$order->id}}</td>
    <td>{{$order->getFullName()}}</td>
   <td>

   <ul>
    @foreach($order->items as $item)
<li><a href="{{route('store.show', $item->store->slug)}}">{{ $item->store->info }}</a></li>
    @endforeach
   </ul>

   </td>
    <td>{{priceFormat($order->total_sum)}}</td>
    <td></td>
      <td class="d-flex">
    
       
    </td>
</tr>
@endforeach
</tbody>

</table>


@endsection