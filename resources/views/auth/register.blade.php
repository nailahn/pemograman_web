@extends('layouts.app')
@section('title', 'Register')

@section('content')
  <section class="card">
    <h2>Register</h2>

    <form method="POST" action="{{ url('/register') }}" novalidate>
      @csrf

      <label>Nama</label>
      <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

      <label>Email</label>
      <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

      <label>Password</label>
      <input type="password" name="password" required autocomplete="new-password">

      <label>Ulangi Password</label>
      <input type="password" name="password_confirmation" required autocomplete="new-password">

      <button type="submit">Daftar</button>
    </form>

    <p class="muted">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
  </section>
@endsection
