@extends("app")


@section('title', $role->name)
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{ $role->name }}</h2>
</div>

<div>

<form action="{{ route('roles.update', $role)}}" method="POST">
@csrf @method('PUT')
<div class="form-group">

<label for="name" class="form-label">{{__('Role name')}}</label>
<input type="text" name="name" id="name" class="form-control" value="{{old('name', $role->name)}}">

@error('name')
<small class="text-danger">{{$message}}</small>
@enderror
</div>
<h5>Права</h5>

@foreach($permissions as $perm)
<label for="{{'perm_' .$perm->id}}" class="form-label">
<input type="checkbox" id="{{'perm_' .$perm->id}}" name="permissions[]" class="form-check-input"
value="{{$perm->name}}" @if($role->permissions->contains(old('perm_' .$perm->id)==$perm->id)) checked @endif>
{{$perm->name}}
</label>

@endforeach

<button type="submit" class="btn btn-primary my-5">Изминить</button>
</form>



</div>


@endsection