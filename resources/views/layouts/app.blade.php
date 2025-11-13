<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'App')</title>

  <link rel="stylesheet"
href="https://unpkg.com/sakura.css/css/sakura.css">

  <style>
    .container { max-width: 980px; margin: 2rem auto; }
    .nav { display:flex; gap:.75rem; align-items:center; flex-wrap:wrap; }
    .nav a.active { font-weight:700; text-decoration:underline; }
    .right { margin-left:auto; display:flex; gap:.75rem; align-items:center; }

    .muted { color:#666; font-size:.95rem; }
    .card { border:1px solid #e5e5e5; padding:1rem 1.25rem; border-radius:.5rem; background:#fff; }
    .row { display:grid; gap:1rem; }
    form.inline { display:inline; }
    .error { color:#c00; }
    .flash { padding:.6rem .8rem; border-radius:.4rem; border:1px solid #cfc; background:#f6fff6; }
  </style>

</head>
<body>
  <div class="container">
    @include('partials.nav')

    <main class="row">
      @yield('content')
    </main>

    <footer style="margin-top:2rem">
      <hr>
      <div class="muted">© Footer</div>
    </footer>
  </div>
</body>
</html>
