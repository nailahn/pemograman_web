@extends('layouts.app')

{{-- @section('title', 'Home') --}}

@section('content')
    <section class="card">
        <h2 style="margin-top: 0;">Portal Berita Sederhana</h2>
        <p>
            Selamat datang di portal berita sederhana berbasis Laravel.
            Berita di bawah ini diambil dari tabel article.
        </p>

        @guest
            <p class="muted">
                Kamu belum login. Untuk mengelola berita, silakan
                <a href="{{ route('login') }}">Login</a> atau
                <a href="{{ route('register') }}">Register</a>.
            </p>
        @endguest

        @auth
            <p class="muted">
                Kamu login sebagai <strong>{{ auth()->user()->name }}</strong>.
                Kamu dapat menambah berita di menu
                <a href="{{ route('articles.index') }}">Artikel</a>.
            </p>
        @endauth
    </section>

    <section class="card" style="margin-top: 1rem;">
        <h3>Berita Terbaru</h3>

        @if ($articles->count())
            <div class="row">
                @foreach ($articles as $article)
                    <article class="card">
                        <div style="display: flex; gap: 1rem;">
                            <img
                                src="https://picsum.photos/240/150?random={{ $loop->index + 1 }}"
                                alt="Gambar berita"
                                style="width: 240px; height: 150px; object-fit: cover; border-radius: 10px;"
                            >
                            <div>
                                <h4 style="margin: 0 0 .25rem 0;">
                                    <a href="{{ route('articles.show', $article) }}">
                                        {{ $article->title }}
                                    </a>
                                </h4>

                                <p class="muted" style="margin: 0 0 .5rem 0;">
                                    Dipublikasikan pada
                                    {{ $article->created_at->format('d M Y') }}
                                    @if ($article->user_id)
                                        oleh User #{{ $article->user_id }}
                                    @endif
                                </p>

                                <p style="margin: 0 0 .5rem 0;">
                                    {{ \Illuminate\Support\Str::limit($article->body, 140) }}
                                </p>

                                <a href="{{ route('articles.show', $article) }}">
                                    Baca selengkapnya →
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <p class="muted">
                Belum ada berita yang tersedia.
                @auth
                    Silakan buat berita baru di menu
                    <a href="{{ route('articles.create') }}">Tambah Artikel</a>.
                @endauth
            </p>
        @endif
    </section>
@endsection
