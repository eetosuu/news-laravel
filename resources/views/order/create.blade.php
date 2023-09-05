@extends('layouts.main')
@section('content')
    <form method="post" action="{{route('order.store')}}">
        @csrf
        <div class="form-group">
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="title" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Номер телефона</label>
                <input type="number" class="form-control" id="phone" name="author" aria-describedby="phone" value="{{ old('phone') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Номер телефона</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea type="text" class="form-control" id="description" name="description" aria-describedby="description"> {{ old('description') }}" "</textarea>
            </div>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </div>
    </form>
@endsection