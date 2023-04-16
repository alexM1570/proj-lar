@extends("app")


@section('title', 'Категории')
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>Категории</h2>


<a href="{{route('categories.create')}}" class="btn btn-info">Добавить</a>

</div>
<table class = "table table-striped">

<thead>
<tr>

<th>ID</th>
<th>Категория</th>
<th>Действия</th>

</tr>

</thead>
@foreach($categories as $category)
<tbody>

<tr>
    <td>{{$category->id}}</td>
    <td>{{$category->name}}</td>
     <td class="d-flex">
        <a href="{{ route('categories.update', $category->id)}}" class="btn btn-sm btn-secondary mx-3">Редактировать</a>
        <form action="{{ route('categories.delete', $category->id)}}" method="POST">
@csrf @method("DELETE")
        <button type="submit" class="btn btn-sm btn-danger">Удалить</button>

        </form>
       
    </td>
</tr>
@endforeach
</tbody>

</table>


@endsection