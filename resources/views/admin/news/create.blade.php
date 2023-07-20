@extends('layouts.admin')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</button>
            </div>
        </div>
    </div>
    <div>
        <form method="post" action="{{route('admin.news.store')}}">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="{{ old('title') }}">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Автор</label>
                    <input type="text" class="form-control" id="author" name="author" aria-describedby="author" value="{{ old('author') }}">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Статус</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option value="1" @if(old('status') === 'draft') selected @endif>draft</option>
                        <option value="2" @if(old('status') === 'active') selected @endif>active</option>
                        <option value="3" @if(old('status') === 'blocked') selected @endif>blocked</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea type="text" class="form-control" id="description" name="description" aria-describedby="description"> {{ old('description') }}" "</textarea>
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
