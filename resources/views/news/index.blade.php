@extends('layouts.main');
@section('title') Cписок новостей - @parent @stop
@section('content');
    <h2>News list</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($newsList as $news)
            <div class="col">
                <div class="card shadow-sm">
                    <h4><a href="{{ route('news.show', $news['id']) }}">{{ $news['title'] }}</a></h4>
                    <img src="{{ $news['image'] }}" alt="">
                    <div class="card-body">
                        <p class="card-text">{!!  $news['description'] !!}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a type="button" href="{{ route('news.show', $news['id']) }}"
                                   class="btn btn-sm btn-outline-secondary">View</a>
                            </div>
                            <small class="text-body-secondary"><em>{{  $news['author'] }}</em> &nbsp;
                                ({{ $news['created_at'] }})</small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h2>Новостей нет</h2>
        @endforelse
    </div>
@endsection
