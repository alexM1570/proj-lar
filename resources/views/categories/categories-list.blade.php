@extends("app")


@section('title', 'Категории')
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{ __("Categories") }}</h2>


<a href="{{route('categories.create')}}" class="btn btn-info">{{__("add")}}</a>

</div>
<table class = "table table-striped">

<thead>
<tr>

<th>ID</th>
<th>{{__("Categories")}}</th>
<th>{{__("Actions")}}</th>

</tr>

</thead>
@foreach($categories as $category)
<tbody>

<tr>
    <td>{{$category->id}}</td>
    <td>{{$category->name}}</td>
     <td class="d-flex">
        <a href="{{ route('categories.update', $category->id)}}" class="btn btn-sm btn-secondary mx-3">{{__("edit")}}</a>
        <form action="{{ route('categories.delete', $category->id)}}" method="POST">
@csrf @method("DELETE")
        <button type="submit" class="btn btn-sm btn-danger">{{__("delete")}}</button>

        </form>
       
    </td>
</tr>
@endforeach
</tbody>

</table>


@endsection