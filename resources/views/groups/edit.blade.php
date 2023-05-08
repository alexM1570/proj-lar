@extends("app")


@section('title',$group->name .'( ред.)')
@section('content')

<div class="d-flex justify-content-between ilign-items-center my-5" >
<h2>{{ $group->name .'( ред.)'}}</h2>
</div>

<div>

<form action="{{ route('groups.update', $group)}}" method="POST">
@csrf @method('PUT')
<div class="form-group">

<label for="name" class="form-label">{{__('product groups')}}</label>
<input type="text" name="name" id="name" class="form-control" value="{{old('name', $group->name)}}" >
@foreach($categories as $category)
<label for="{{'category_' .$category->id}}" class="form-label">
<input type="checkbox" id="{{'category_' .$category->id}}" name="categories[]" class="form-check-input"
value="{{$category->id}}" @if($group->categories->contains(old('category_' .$category->id, $category->id))) checked @endif>
{{$category->name}}
</label>

@endforeach
@error('name')
<small class="text-danger">{{$message}}</small>
@enderror
</div>
<button type="submit" class="btn btn-primary my-5">Сохранить</button>
</form>



</div>


@endsection