@extends("app")


@section('title', __('Permissions'))
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{ __("Permissions") }}</h2>


<a href= "{{ route('permissions.create') }}" class="btn btn-info">{{__("add")}}</a>

</div>
<table class = "table table-striped">

<thead>
<tr>


<th>Право</th>



</tr>

</thead>
@foreach($permissions as $perm)
<tbody>

<tr>
    <td>{{$perm->name}}</td>
 
    
     <td class="d-flex">
        <a href="" class="btn btn-sm btn-secondary mx-3">{{__("edit")}}</a>
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