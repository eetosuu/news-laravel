@extends('layouts.admin')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
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
                    <label for="category" class="form-label">Категория</label>
                    <select class="form-select form-control" aria-label="Select category" name="category_id" id="category_id">
                        @foreach($categoriesList as $category)
                            <option value="{{$category->id}}" @if($category->id === old('category_id')) selected @endif>{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Статус</label>
                    <select class="form-select form-control" aria-label="Select status" name="status">
                        <option @if(old('status') === \App\Enums\News\Status::DRAFT->value) selected @endif>
                            {{\App\Enums\News\Status::DRAFT->value}}</option>
                        <option @if(old('status') === \App\Enums\News\Status::ACTIVE->value) selected @endif>
                            {{\App\Enums\News\Status::ACTIVE->value}}</option>
                        <option @if(old('status') === \App\Enums\News\Status::BLOCKED->value) selected @endif>{{\App\Enums\News\Status::BLOCKED->value}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea type="text" class="form-control" id="description" name="description" aria-describedby="description"> {{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="image">
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
