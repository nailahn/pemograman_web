@extends('layouts.app')

{{-- @section('title', 'Articles') --}}

@section('content')
    <section class="card">
        <h2>Daftar Artikel</h2>

        <a href="{{ route('articles.create') }}">+ Artikel Baru</a>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if ($articles->count())
            <ul>
                @foreach ($articles as $article)
                    <li>
                        <a href="{{ route('articles.show', $article) }}">
                            {{ $article->title }}
                        </a>
                        <small>oleh user {{ $article->user_id }}</small>
                    </li>
                @endforeach
            </ul>

            {{ $articles->links() }}
        @else
            <p>Belum ada artikel.</p>
        @endif
    </section>
@endsection
