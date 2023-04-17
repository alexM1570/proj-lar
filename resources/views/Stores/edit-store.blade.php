@extends("app")


@section('title', $store->info . "(ред.)")
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{$store->info . "(ред.)"}}</h2>
</div>

<div>


<form action="{{route('update.create', $store)}}" method="POST" enctype="multipart/form-data">
@csrf  @method('PUT')
<div class="form-group my-4">

<label for="price" class="form-label">Цена</label>
<input type="text" name="price" id="price" class="form-control" value="{{old('price', $store->price)}}">
@error('price')
<small class="text-danger">{{ $message }}</small>

@enderror
</div>
<div class="form-group my-4">

<label for="group" class="form-label">Группа товара</label>
<input type="text" name="group" id="group" class="form-control" value="{{old('group', $store->group)}}">

</div>
<div class="form-group my-4">

<label for="info" class="form-label">Название товара</label>
<input type="text" name="info" id="info" class="form-control" value="{{old('info', $store->info)}}">

</div>
<div class="form-group my-4">

<label for="category" class="form-label">Категория</label>
<select name="category" id="category" class="form-select">

<option value="" selected disabled>Выберите категорию</option>

@foreach($categories as $category)

<option value="{{$category->id}}" @if($category->id == old('category', $store->category->id)) selected @endif >{{$category->name}}</option>

@endforeach

</select>
@error('category')
<small class="text-danger">{{ $message }}</small>

@enderror
</div>
<div class="form-group my-4">

<label for="image" class="form-label">Изображение</label>
<input type="file" name="image" id="image" class="form-control">
@if($store->image)
<div class="mt-4">

<img src="{{$store->getImage()}}" alt="" width="150px">

</div>
<a href="{{route('store.removeImage', $store->id)}}">Удалить</a>
@endif


</div>
<button class="btn btn-primary my-3">Сохранить</button>
</form>



</div>


@endsection