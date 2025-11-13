@extends('layouts.app')

@section('title', 'Login')

@section('content')
  <section class="card">
    <h2>Login</h2>

    <form method="POST" action="{{ url('/login') }}" novalidate>
      @csrf

      <label>Email</label>
      <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

      <label>Password</label>
      <input type="password" name="password" required autocomplete="current-password">

      <label style="display:flex; gap:.5rem; align-items:center;">
        <input type="checkbox" name="remember"> Remember me
      </label>

      <button type="submit">Masuk</button>
    </form>

    <p class="muted">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
  </section>
@endsection
