@extends("app")


@section('title', __('product groups'))
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{ __("product groups") }}</h2>


<a href="{{route('groups.create') }}" class="btn btn-info">{{__("add")}}</a>

</div>
<table class = "table table-striped">

<thead>
<tr>

<th>ID</th>
<th>{{ __("product groups") }}</th>


</tr>

</thead>
@foreach($groups as $group)
<tbody>

<tr>
    <td>{{$group->id}}</td>
    <td>{{$group->name}}</td>
     <td class="d-flex">
        <a href="" class="btn btn-sm btn-secondary mx-3">{{__("edit")}}</a>
        <form action="" method="POST">
@csrf @method("DELETE")
        <button type="submit" class="btn btn-sm btn-danger">{{__("delete")}}</button>

        </form>
       
    </td>
</tr>
@endforeach
</tbody>

</table>


@endsection