{{-- <!DOCTYPE html>
<html lang="fr" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Administration') — Ward Wide Learning</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Work+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    :root{
      --background:#0d0f16;
      --surface:#171a24;
      --surface-2:#1c202b;
      --surface-hover:#212635;
      --border:rgba(233,238,248,0.11);
      --border-strong:rgba(233,238,248,0.24);
      --text-primary:#edeff6;
      --text-secondary:#9099ae;
      --primary:#7188da;
      --primary-ink:#3951ab;
      --secondary:#5dc9ca;
      --accent:#fabc19;
      --magenta:#f14e93;
      --success:#4fcb8f;
      --error:#f0685e;
      --radius-sm:6px;
      --radius-md:12px;
      --radius-lg:20px;
      --font-display:'Fraunces', serif;
      --font-body:'Work Sans', sans-serif;
      --font-mono:'IBM Plex Mono', monospace;
    }
    *{box-sizing:border-box;margin:0;padding:0;}
    body{
      background:var(--background);
      color:var(--text-primary);
      font-family:var(--font-body);
      font-size:15px;
      line-height:1.6;
      min-height:100vh;
      display:flex;
    }
    a{color:inherit;text-decoration:none;}
    h1,h2,h3{font-family:var(--font-display);font-weight:600;letter-spacing:-0.01em;}

    /* Sidebar */
    .admin-sidebar{
      width:240px;flex:0 0 auto;background:var(--surface);
      border-right:1px solid var(--border);padding:26px 18px;
      display:flex;flex-direction:column;gap:28px;position:sticky;top:0;height:100vh;
    }
    .admin-brand{font-family:var(--font-display);font-size:16px;font-weight:600;padding:0 8px;display:flex;align-items:center;gap:8px;}
    .admin-brand span{color:var(--secondary);}
    .admin-nav{display:flex;flex-direction:column;gap:4px;}
    .admin-nav a{
      display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:var(--radius-sm);
      color:var(--text-secondary);font-size:14px;transition:all .2s ease;
    }
    .admin-nav a:hover{background:var(--surface-hover);color:var(--text-primary);}
    .admin-nav a.active{background:var(--primary-ink);color:#fff;}
    .admin-nav a svg{width:16px;height:16px;flex:0 0 auto;}

    /* Main */
    .admin-main{flex:1;padding:36px 44px;max-width:1100px;}
    .admin-header{display:flex;align-items:flex-start;justify-content:space-between;gap:20px;margin-bottom:28px;flex-wrap:wrap;}
    .admin-header h1{font-size:26px;}
    .admin-header p{color:var(--text-secondary);font-size:14px;margin-top:6px;}

    /* Alerts */
    .alert{
      padding:14px 16px;border-radius:var(--radius-sm);font-size:14px;margin-bottom:22px;
      display:flex;align-items:center;gap:10px;border:1px solid transparent;
    }
    .alert-success{background:rgba(79,203,143,.1);border-color:rgba(79,203,143,.35);color:var(--success);}
    .alert-error{background:rgba(240,104,94,.1);border-color:rgba(240,104,94,.35);color:var(--error);}

    /* Buttons */
    .btn{
      font-family:var(--font-body);font-size:14px;font-weight:600;cursor:pointer;
      padding:11px 20px;border-radius:var(--radius-sm);border:none;
      display:inline-flex;align-items:center;gap:8px;transition:transform .2s ease, box-shadow .2s ease, background .2s ease;
    }
    .btn svg{width:15px;height:15px;}
    .btn-primary{background:var(--primary-ink);color:#fff;}
    .btn-primary:hover{transform:translateY(-1px);box-shadow:0 10px 24px rgba(57,81,171,.32);}
    .btn-ghost{background:var(--surface-2);color:var(--text-secondary);border:1px solid var(--border);}
    .btn-ghost:hover{color:var(--text-primary);border-color:var(--border-strong);}
    .btn-danger{background:rgba(240,104,94,.12);color:var(--error);border:1px solid rgba(240,104,94,.3);}
    .btn-danger:hover{background:rgba(240,104,94,.2);}
    .btn-sm{padding:7px 12px;font-size:12.5px;}

    @media(max-width:820px){
      body{flex-direction:column;}
      .admin-sidebar{width:100%;height:auto;position:relative;flex-direction:row;overflow-x:auto;}
      .admin-nav{flex-direction:row;}
      .admin-main{padding:24px 20px;}
    }
  </style>
  @yield('head')
</head>
<body>

  <aside class="admin-sidebar">
    <div class="admin-brand"><span>WWL</span> Admin</div>
    <nav class="admin-nav">
      <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
        <i data-lucide="newspaper"></i> Articles
      </a>
      <a href="{{ url('/insights') }}" target="_blank">
        <i data-lucide="external-link"></i> Voir Insights
      </a>
    </nav>
  </aside>

  <main class="admin-main">
    @if(session('success'))
      <div class="alert alert-success"><i data-lucide="check-circle-2"></i> {{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-error">
        <i data-lucide="alert-triangle"></i>
        <div>
          @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
          @endforeach
        </div>
      </div>
    @endif

    @yield('content')
  </main>

  <script>if (window.lucide) lucide.createIcons();</script>
  @yield('scripts')
</body>
</html> --}}

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration') — Ward Wide Learning</title>
    <link rel="shortcut icon" href="{{ asset('logo-lockup.svg') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminStyle.css') }}">
    @yield('head')
</head>
<body>
<div class="admin-bg"></div>

<!-- =========================
     SIDEBAR
========================= -->
<aside class="sidebar">
    <div class="sidebar-brand">
        <img src="{{ asset('logo-lockup.svg') }}" class="sidebar-logo" alt="Ward Wide Learning">
        <div>
            <a href="{{ route('home') }}"><strong>Ward Wide Learning</strong></a>
        </div>
    </div>

    <div class="sidebar-section">
        <span class="sidebar-label">
            ADMINISTRATION
        </span>
        <a href="{{ route('dashboard') }}"
           class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="sidebar-icon">▦</span>
            <span>Consultations</span>
            @if(isset($total))
                <span class="sidebar-count">{{ $total }}</span>
            @endif
        </a>
        <a href="{{ route('admin.articles.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
            <span class="sidebar-icon">✎</span>
            <span>Articles</span>
            @if(isset($articlesTotal))
                <span class="sidebar-count">{{ $articlesTotal }}</span>
            @endif
        </a>
    </div>
    <div class="sidebar-bottom">
        <a href="{{ route('profile.edit') }}" class="admin-user">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="user-info">
                <strong>{{ auth()->user()->name }}</strong>
                <span>Administrateur</span>
            </div>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="sidebar-logout">
                <span>↪</span>
                Déconnexion
            </button>
        </form>
    </div>
</aside>


<!-- =========================
     MAIN
========================= -->
<div class="admin-layout">
    <header class="topbar">
        <div class="topbar-left">
            <span class="topbar-status"></span>
            <span>
                Espace d'administration
            </span>
        </div>

        <div class="topbar-right">
            <span class="topbar-date">
                {{ now()->format('d/m/Y') }}
            </span>
            <a href="{{ route('profile.edit') }}" class="profile-link">
                {{ auth()->user()->name }}
            </a>
        </div>
    </header>

    <main>
        <div class="content">

            <!-- =========================
                 SUCCESS MESSAGE
            ========================= -->
            @if (session('success'))
                <div class="success-alert">
                    <div class="success-icon">
                        ✓
                    </div>
                    <div>
                        <strong>Opération réussie</strong>
                        <span>
                            {{ session('success') }}
                        </span>
                    </div>
                </div>
            @endif

            <!-- =========================
                 ERRORS
            ========================= -->
            @if ($errors->any())
                <div class="error-alert">
                    <div class="error-icon">
                        !
                    </div>
                    <div>
                        <strong>Erreur de validation</strong>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            @yield('content')

            <!-- =========================
                 PAGINATION
            ========================= -->
            @hasSection('pagination')
                <div class="pagination-container">
                    @yield('pagination')
                </div>
            @endif
        </div>
    </main>
</div>

@yield('modals')
@yield('scripts')

</body>
</html>