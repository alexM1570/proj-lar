@extends("app")


@section('info', 'Список товара')
@section('content')


<h2 class="my-5 ">Список товара</h2>

<a href="{{route('card.create')}}" class="btn btn-info">Добавить</a>

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

<th>Изображение</th>
<th>Цена</th>
<th>Группа товара</th>
<th>Название товара</th>
<th>Катекория товара</th>
<th>Редактировать/ Удалить</th>

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
  
        {{$store->group}}
       </td>
    <td>
        
    <a href="{{route('store.show', $store->slug)}}">
    {{$store->info}}
   </a>

</td>
    <td >{{$store->category->name}}</td> 
    <td class="d-flex" style="height:70px">
        <a  style="height:35px" href="{{route('edit.create', $store)}}" class="btn btn-sm btn-secondary mx-3 mt-2">Редактировать</a>
        <form action="{{route('delete.create', $store)}}" method="POST">
@csrf @method("DELETE")
        <button type="submit" class="btn btn-sm btn-danger mt-2" onclick="event.preventDefault();if(confirm('Запись будет удалена! Продолжить')){this.closest('form').submit();}">Удалить</button>

        </form>
       
    </td>
</tr> 
@endforeach
</tbody>

</table>
@else

<p>Пока нет записей!</p>

@endif

</div>

@endsection