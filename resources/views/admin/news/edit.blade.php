@extends('layouts.admin')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>
    </div>
        <form method="post" action="{{route('admin.news.update', ['news' => $news])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="{{ $news->title }}">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Автор</label>
                    <input type="text" class="form-control" id="author" name="author" aria-describedby="author" value="{{ $news->author }}">
                @error('author') {{ $message }} @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Категория</label>
                    <select class="form-select form-control" aria-label="Select category" name="category_id" id="category_id">
                        @foreach($categoriesList as $category)
                            <option value="{{$category->id}}" @if($category->id === $news->category_id) selected @endif>{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Статус</label>
                    <select class="form-select form-control" aria-label="Select status" name="status">
                        <option @if($news->status === \App\Enums\News\Status::DRAFT->value) selected @endif>
                            {{\App\Enums\News\Status::DRAFT->value}}</option>
                        <option @if($news->status === \App\Enums\News\Status::ACTIVE->value) selected @endif>
                            {{\App\Enums\News\Status::ACTIVE->value}}</option>
                        <option @if($news->status === \App\Enums\News\Status::BLOCKED->value) selected @endif>{{\App\Enums\News\Status::BLOCKED->value}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea type="text" class="form-control" id="description" name="description" aria-describedby="description"> {{ $news->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Default file input example</label>
                    <img src="{{ Storage::disk('public')->url($news->image) }}" style="width: 200px; height: 200px" alt="">
                    <input class="form-control" type="file" name="image" id="image">
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
@endsection
@push('js')
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
