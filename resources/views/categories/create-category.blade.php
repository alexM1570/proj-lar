@extends("app")


@section('title', 'Новая')
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>Новая Категория</h2>
</div>

<div>

<form action="{{route('categories.store')}}" method="POST">
@csrf  
<div class="form-group">

<label for="name" class="form-label">Название Категории</label>
<input type="text" name="name" class="form-control">

</div>
<button class="btn btn-primary my-5">Создать</button>
</form>



</div>


@endsection