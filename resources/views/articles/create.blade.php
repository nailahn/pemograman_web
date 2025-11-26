@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
    <section class="card">
        <h2 style="margin-top: 0;">Tambah Artikel / Berita</h2>

        <p class="muted">
            Isi formulir di bawah untuk menambahkan berita baru. Gambar menggunakan URL (opsional),
            jika kosong maka sistem akan memakai placeholder online.
        </p>

        @if ($errors->any())
            <div class="error">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <label for="title">Judul Artikel</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                required
                placeholder="Masukkan judul berita"
            >

            <label for="image">URL Gambar (opsional)</label>
            <input
                type="text"
                id="image"
                name="image"
                value="{{ old('image') }}"
                placeholder="https://example.com/gambar.jpg"
            >

            <p class="muted">
                Jika dikosongkan, sistem akan menggunakan gambar placeholder dari
                <code>picsum.photos</code>.
            </p>

            <label for="body">Isi Berita</label>
            <textarea
                id="body"
                name="body"
                rows="8"
                required
                placeholder="Tulis isi berita di sini..."
            >{{ old('body') }}</textarea>

            <button type="submit">Simpan Artikel</button>
            <a href="{{ route('articles.index') }}">Batal</a>
        </form>
    </section>
@endsection
