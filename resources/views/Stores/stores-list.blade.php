@extends("app")


@section('info', 'Список товара')
@section('content')


<h2 class="my-5 ">{{__("Product List")}}</h2>

<a href="{{route('card.create')}}" class="btn btn-info">{{__("add")}}</a>

@if (session('success'))

<div class="alert alert-success">

{{session('success')}}

</div>

@endif

<div class="d-flex justify-content-between ilign-items-center my-5" >

@if($Stores ->count())

<table class = "table table-striped">
<thead>
<tr>

<th>{{__("image")}}</th>
<th>{{__("price")}}</th>
<th>{{__("product group")}}</th>
<th>{{__("product name")}}</th>
<th>{{__("product category")}}</th>
<th>{{__("edit/delete")}}</th>

</tr>

</thead>
@foreach($Stores as $store)
<tbody>

<tr>
    <td>

    <img src="{{$store->getImage()}}" alt="" height="50px">

    </td>
    <td>
              {{$store->price}}
        </td>
        
    <td>
    @foreach($store->groups as $group)
    <p class="card-text"> {{$group->name}} </p>
    @endforeach
   
       </td>
      
    <td>
        
    <a href="{{route('store.show', $store->slug)}}">
    {{$store->info}}
   </a>

</td>
    <td >{{$store->category->name}}</td> 
    <td class="d-flex" style="height:70px">
        <a  style="height:35px" href="{{route('edit.create', $store)}}" class="btn btn-sm btn-secondary mx-3 mt-2">{{__("edit")}}</a>
        <form action="{{route('delete.create', $store)}}" method="POST">
@csrf @method("DELETE")
        <button type="submit" class="btn btn-sm btn-danger mt-2" onclick="event.preventDefault();if(confirm('Запись будет удалена! Продолжить')){this.closest('form').submit();}">{{__("delete")}}</button>

        </form>
       
    </td>
</tr> 
@endforeach
</tbody>

</table>
@else

<p>{{__("there are no records yet")}}</p>

@endif

</div>

@endsection