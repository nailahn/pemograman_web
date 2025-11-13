@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <section class="card">
    <h2>Home</h2>
    <p>Selamat datang di aplikasi Laravel sederhana.</p>

    @guest
      <p>
        Kamu belum login. Silakan
        <a href="{{ route('login') }}">Login</a> atau
        <a href="{{ route('register') }}">Register</a>.
      </p>
    @endguest

    @auth
      <p>
        Kamu sudah login sebagai <strong>{{ auth()->user()->name }}</strong>.
        Lanjut ke <a href="{{ route('dashboard') }}">Dashboard</a>.
      </p>
    @endauth
  </section>
@endsection
