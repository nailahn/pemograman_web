<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portal Berita')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <style>
        :root {
            --bg-body: #d7d1c5;
            --bg-card: #ffffff;
            --bg-nav: #ffffff;
            --border-soft: #e2e8f0;
            --text-main: #33321f;
            --text-muted: #6b7280;
            --primary: #a5a16f;
            --primary-soft: #e5e7de;
            --danger: #dc2626;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--bg-body);
            color: var(--text-main);
            display: flex;
            flex-direction: column;
        }

        a {
            color: var(--primary);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .app-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 1.5rem 1rem 2.5rem;
        }

        /* NAVBAR */
        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: .85rem 1rem;
            background-color: var(--bg-nav);
            border-radius: 10px;
            border: 1px solid var(--border-soft);
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
            margin-top: 1rem;
            position: sticky;
            top: .75rem;
            z-index: 20;
            backdrop-filter: blur(12px);
        }

        .nav a {
            font-size: .95rem;
            font-weight: 500;
            padding: .45rem .9rem;
            border-radius: 999px;
            color: var(--text-muted);
            text-decoration: none;
        }

        .nav a.active {
            background-color: var(--primary-soft);
            color: var(--primary);
        }

        .nav a:hover {
            background-color: rgba(198, 220, 124, 0.12);
        }

        .nav .right {
            display: flex;
            gap: .35rem;
            align-items: center;
        }

        .nav span.muted {
            font-size: .9rem;
            color: var(--text-muted);
            margin-right: .5rem;
        }

        .nav form.inline {
            display: inline;
        }

        .nav button {
            border: none;
            background-color: #f3f4f6;
            color: var(--text-main);
            font-size: .9rem;
            padding: .4rem .9rem;
            border-radius: 999px;
            cursor: pointer;
        }

        .nav button:hover {
            background-color: #e5e7eb;
        }

        /* CARD, ROW, LAYOUT */
        .page-header {
            margin-top: 1.5rem;
            margin-bottom: .75rem;
        }

        .card {
            background-color: var(--bg-card);
            border-radius: 18px;
            padding: 1.25rem 1.4rem;
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: 0 12px 35px rgba(15, 23, 42, 0.06);
        }

        .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1rem;
        }

        .muted {
            color: var(--text-muted);
            font-size: .9rem;
        }

        .flash {
            margin-top: .75rem;
            margin-bottom: .75rem;
            padding: .75rem 1rem;
            border-radius: 12px;
            background-color: #ecfdf3;
            border: 1px solid #bbf7d0;
            color: #166534;
            font-size: .9rem;
        }

        .error {
            margin-top: .75rem;
            margin-bottom: .75rem;
            padding: .75rem 1rem;
            border-radius: 12px;
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: var(--danger);
            font-size: .9rem;
        }

        .error ul {
            margin: .4rem 0 0 1rem;
        }

        /* FORM, BUTTON, INPUT */
        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: .55rem .7rem;
            margin-top: .25rem;
            margin-bottom: .75rem;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            font-size: .95rem;
            font-family: inherit;
            outline: none;
            transition: border-color .15s ease, box-shadow .15s ease;
        }

        input:focus,
        textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 1px rgba(37, 99, 235, 0.25);
        }

        label {
            font-size: .9rem;
            font-weight: 500;
            color: var(--text-main);
        }

        button[type="submit"],
        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .25rem;
            padding: .5rem 1.1rem;
            border-radius: 999px;
            border: none;
            background-color: var(--primary);
            color: #ffffff;
            font-size: .9rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color .15s ease, transform .05s ease;
            text-decoration: none;
        }

        button[type="submit"]:hover,
        .btn-primary:hover {
            background-color: #b4bc6c99;
            transform: translateY(-1px);
        }

        button[type="submit"]:active,
        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: .45rem 1rem;
            border-radius: 999px;
            border: 1px solid #d1d5db;
            background-color: white;
            color: var(--text-main);
            font-size: .9rem;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background-color: #f3f4f6;
        }

        /* LIST ARTIKEL */
        .article-list {
            list-style: none;
            padding-left: 0;
            margin: 0.75rem 0 0;
        }

        .article-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: .55rem .4rem;
            border-bottom: 1px dashed #e5e7eb;
        }

        .article-list li:last-child {
            border-bottom: none;
        }

        .article-list a {
            font-weight: 500;
            color: var(--text-main);
        }

        .article-list small {
            color: var(--text-muted);
            font-size: .8rem;
        }

        /* FOOTER */
        .footer {
            padding: 1.2rem 1rem 1.8rem;
            text-align: center;
            font-size: .8rem;
            color: var(--text-muted);
        }

        @media (max-width: 640px) {
            .container {
                padding: 1rem .75rem 2rem;
            }

            .nav {
                padding-inline: .75rem;
            }
        }
    </style>
</head>

<body>
    <div class="app-wrapper">
        <div class="container">

            {{-- NAVBAR --}}
            @include('partials.nav')

            {{-- JUDUL HALAMAN --}}
            <div class="page-header">
                @hasSection('title')
                    <h1 style="margin:0 0 .25rem 0; font-size:1.4rem;">
                        @yield('title')
                    </h1>
                @endif
            </div>

            {{-- Flash message sukses kalau ada --}}
            @if (session('success'))
                <div class="flash">
                    {{ session('success') }}
                </div>
            @endif

            {{-- KONTEN UTAMA --}}
            @yield('content')
        </div>

        <footer class="footer">
            © {{ date('Y') }} Portal Berita Laravel Praktikum.
        </footer>
    </div>
</body>

</html>
