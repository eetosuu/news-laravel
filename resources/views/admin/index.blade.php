@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Панель управления</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a type="button"  href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>
    <x-alert :type="request()->get('type', 'light')" message="Уведомление"></x-alert>
    <x-alert type="danger" message="Уведомление"></x-alert>
    <x-alert type="warning" message="Уведомление"></x-alert>
    <x-alert type="success" message="Уведомление"></x-alert>
    <x-alert type="dark" message="Уведомление"></x-alert>
    <x-alert type="primary" message="Уведомление"></x-alert>
@endsection