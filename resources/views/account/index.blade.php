<h2>Добро пожаловать, {{ \Illuminate\Support\Facades\Auth::user()->email }}</h2>
<br>
@if(Auth::user()->is_admin)
    <a href="{{ route('admin') }}">Перейти в админку</a>
@endif
<br>
<a href="{{ route('logout') }}">Выход</a>