@extends("app")


@section('title', 'Регистрация')
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>Регистрация</h2>
</div>

<div>


<form action="{{route('auth.storeUser')}}" method="POST" >
@csrf  
<div class="form-group my-4">

<label for="name" class="form-label">Логин</label>
<input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
@error('name')
<small class="text-danger">{{ $message }}</small>

@enderror
</div>
<div class="form-group my-4">

<label for="email" class="form-label">Ваш email</label>
<input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
@error('email')
<small class="text-danger">{{ $message }}</small>

@enderror
</div>
<div class="form-group my-4">

<label for="password" class="form-label">Пароль</label>
<input type="password" name="password" id="password" class="form-control" >
@error('password')
<small class="text-danger">{{ $message }}</small>

@enderror
</div>

</div>
<div class="form-group my-4">

<label for="password_confirmation" class="form-label">Пароль</label>
<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
@error('password_confirmation')
<small class="text-danger">{{ $message }}</small>

@enderror
</div>



<button class="btn btn-primary ">Регистрация</button>
</form>



</div>


@endsection