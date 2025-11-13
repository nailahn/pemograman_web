@extends('layouts.app') @section('content')
    <div class="card">
        <h1>Halo {{ auth()->user()->name }}</h1>
        <p>Ini halaman test untuk cek blade formatter.</p>
        @if (true)
            <span>iya</span>
        @endif
    </div>
@endsection
