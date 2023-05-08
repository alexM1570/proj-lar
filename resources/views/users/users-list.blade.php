@extends("app")


@section('title', __('Users'))
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{ __("Users") }}</h2>


<a href="#" class="btn btn-info">{{__("add")}}</a>

</div>
<table class = "table table-striped">

<thead>
<tr>

<th>ФИО</th>
<th>Email</th>
<th>Роли</th>
<th>Действия</th>


</tr>

</thead>
@foreach($users as $user)
<tbody>

<tr>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>
       
    {{ $user->getRoles() }}
        
    </td>

     <td class="d-flex">
        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-secondary mx-3">{{__("edit")}}</a>
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