@extends("app")


@section('title', $category->name.'(ред.)')
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{$category->name.'(ред.)'}}</h2>
</div>

<div>

<form action="{{ route('categories.update', $category->id)}}" method="POST">
@csrf  @method("PUT")
<div class="form-group">

<label for="name" class="form-label">Название Категории</label>
<input type="text" name="name" value="{{$category->name}}" class="form-control">

</div>
<button class="btn btn-primary my-5">Сохранить</button>
</form>



</div>


@endsection