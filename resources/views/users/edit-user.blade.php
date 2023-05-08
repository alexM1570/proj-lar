@extends("app")


@section('title', $user->name)
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{ $user->name }}</h2>
</div>

<div>

<form action="{{ route('users.update', $user)}}" method="POST">
@csrf @method ('PUT')
<div class="form-group">

<label for="name" class="form-label">Имя</label>
<input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" >

@if($user->id != auth()->user()->id)
<div class="form-group mb-3">
<h6>Роли</h6>

@foreach($roles as $role)
<label for="{{'role_' .$role->id}}" class="form-label">
<input type="checkbox" id="{{'role_' .$role->id}}" name="roles[]" class="form-check-input"
value="{{$role->name}}" @if($user->roles->contains(old('role_' .$role->id, $role->id))) checked @endif>
{{$role->name}}
</label>

@endforeach
</div>

<div class="form-group mb-3">
<h6>Права</h6>

@foreach($permissions as $permission)
<label for="{{'permission_' .$permission->id}}" class="form-label">
<input type="checkbox" id="{{'permission_' .$permission->id}}" name="permissions[]" class="form-check-input"
value="{{$permission->name}}" @if($user->hasPermissionTo($permission->name)) checked @endif>
{{$permission->name}}
</label>

@endforeach

</div>
@endif
@error('name')
<small class="text-danger">{{$message}}</small>
@enderror
</div>
<button type="submit" class="btn btn-primary my-5">Изменить</button>
</form>



</div>


@endsection