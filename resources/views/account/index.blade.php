<h2>Welcome, {{ \Illuminate\Support\Facades\Auth::user()->name }}</h2>
@if(\Illuminate\Support\Facades\Auth::user()->is_admin === true)
    <a href="{{ route('admin.index') }}">Админка</a>
@endif