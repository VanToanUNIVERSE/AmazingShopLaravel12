<h1>Home</h1>
<h2>xin chào {{ Auth::user()->username ?? 'quý khách' }}</h2>
<form method="post" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>