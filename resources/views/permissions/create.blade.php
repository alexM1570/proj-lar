@extends("app")


@section('title', __('Create Permission'))
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{ __('Create Permission') }}</h2>
</div>

<div>

<form action="{{ route('permissions.store')}}" method="POST">
@csrf 
<div class="form-group">

<label for="name" class="form-label">{{__('Create Permissions')}}</label>
<input type="text" name="name" id="name" class="form-control" >

@error('name')
<small class="text-danger">{{$message}}</small>
@enderror
</div>
<button type="submit" class="btn btn-primary my-5">Создать</button>
</form>



</div>


@endsection