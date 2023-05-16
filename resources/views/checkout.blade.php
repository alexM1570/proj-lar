@extends("app")

@section("title", "Корзина товаров")


@section("content")

<h1 class="my-5">{{__("Оформление заказа")}}</h1>


<form action="{{ route('storeOrder.app') }}" method="POST">
    @csrf
    <div class="row">

        <div class="col-md-6 col-12">


            <div class="form-group mb-3">
                <label for="">Фамилия</label>
                <input type="text" id="user_surname" name="user_surname" class="form-control" value="{{old('user_surname')}}">
                @error('user_surname')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="">Имя</label>
                <input type="text" id="user_name" name="user_name" class="form-control" value="{{old('user_name', auth()->user()->name)}}">
                @error('user_name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="">Отчество</label>
                <input type="text" name="user_patronymic" id="user_patronymic" class="form-control" value="{{old('user_patronymic')}}">
            </div>

            <div class="form-group mb-3">
                <label for="phone">Телефон</label>
                <input type="text"  name="user_phone" id="phone" class="form-control" value="{{old('user_phone')}}">
            </div>

            <div class="form-group mb-3">
                <label for="">Email</label>
                <input type="text" name="user_email" id="user_email" class="form-control" value="{{old('user_email', auth()->user()->email)}}">
            </div>

        </div>
        <div class="col-md-6 col-12">



        </div>

    </div>

    <button class="btn btn-primary">Оформить заказ</button>

</form>

@endsection

@section('page-scripts')
<script src="{{asset('assets/js/jquery.inputmask.min.js')}}"></script>
@endsection