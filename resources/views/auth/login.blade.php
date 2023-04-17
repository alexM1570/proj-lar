@extends("app")


@section('title', 'Вход')
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>Вход</h2>
</div>

<div>
@if(session('success_register'))
<div class="alert alert-success">
{{session('success_register')}}

</div>
@endif

<form action="{{route('auth.loginUs')}}" method="POST" >
@csrf  
<div class="form-group my-4">

<label for="name" class="form-label">Логин</label>
<input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
@error('name')
<small class="text-danger">{{ $message }}</small>

@enderror
</div>

</div>
<div class="form-group my-4">

<label for="password" class="form-label">Пароль</label>
<input type="password" name="password" id="password" class="form-control" >
@error('password')
<small class="text-danger">{{ $message }}</small>

@enderror
</div>



<button class="btn btn-primary ">Войти</button>
</form>



</div>


@endsection