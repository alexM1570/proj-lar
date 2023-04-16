@extends("app")


@section('title', 'Добавление списка')
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>Добавление списка</h2>
</div>

<div>


<form action="{{route('store.create')}}" method="POST" enctype="multipart/form-data">
@csrf  
<div class="form-group my-4">

<label for="price" class="form-label">Цена</label>
<input type="text" name="price" id="price" class="form-control" value="{{old('price')}}">
@error('price')
<small class="text-danger">{{ $message }}</small>

@enderror
</div>
<div class="form-group my-4">

<label for="group" class="form-label">Группа товара</label>
<input type="text" name="group" id="group" class="form-control" value="{{old('group')}}">

</div>
<div class="form-group my-4">

<label for="info" class="form-label">Название товара</label>
<input type="text" name="info" id="info" class="form-control" value="{{old('info')}}">

</div>
<div class="form-group my-4">

<label for="category" class="form-label">Категория</label>
<select name="category" id="category" class="form-select">

<option value="" selected disabled>Выберите категорию</option>

@foreach($categories as $category)

<option value="{{$category->id}}" @if($category->id == old('category')) selected @endif >{{$category->name}}</option>

@endforeach

</select>
@error('category')
<small class="text-danger">{{ $message }}</small>

@enderror
</div>
<div class="form-group my-4">

<label for="image" class="form-label">Изображение</label>
<input type="file" name="image" id="image" class="form-control">

</div>
<button class="btn btn-primary my-5">Создать</button>
</form>



</div>


@endsection