@extends("app")


@section('title', __('Roles'))
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{ __("Roles") }}</h2>


<a href= "{{ route('roles.create') }}" class="btn btn-info">{{__("add")}}</a>

</div>
<table class = "table table-striped">

<thead>
<tr>

<th>Роль</th>
<th>Права</th>
<th>Действия</th>


</tr>

</thead>
@foreach($roles as $role)
<tbody>

<tr>
    <td>{{$role->name}}</td>
    <td>
    
    @foreach($role->permissions as $perm)
    {{  $perm->name . '/ '  }}
    @endforeach
    </td>
    
     <td class="d-flex">
        <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-secondary mx-3">{{__("edit")}}</a>
        <form action="#" method="POST">
@csrf @method("DELETE")
        <button type="submit" class="btn btn-sm btn-danger">{{__("delete")}}</button>

        </form>
       
    </td>
</tr>
@endforeach
</tbody>

</table>


@endsection