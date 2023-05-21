@extends("app")


@section('title', 'Список заказов пользователей')
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{ __("Список заказов пользователей") }}</h2>


</div>
<table class = "table table-striped">

<thead>
<tr>

<th>ID</th>
<th>ФИО</th>
<th>Товар</th>
<th>Сумма заказа</th>
<th>Статус</th>
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
    <td>
        <form action="{{ route('order.change-status', $order) }}" method="GET">
            <select name="status" class="form-control change-status">
                <option value="in_process" @if($order->status == 'in_process') selected @endif>
                    {{ __('statuses.in_process') }}
                </option>
                <option value="finished"@if($order->status == 'finished') selected @endif>
                    {{ __('statuses.finished') }}
                </option>
                <option value="canceled"@if($order->status == 'canceled') selected @endif>
                    {{ __('statuses.canceled') }}
                </option>
                <option value="paid"@if($order->status == 'paid') selected @endif>
                    {{ __('statuses.paid') }}
                </option>
            </select>
        </form>

    </td>
  
</tr>
@endforeach
</tbody>

</table>


@endsection