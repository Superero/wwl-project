{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
{{-- <div class="wrap" style="padding:60px 32px; max-width:1180px; margin:0 auto;">
    <div class="admin-toolbar">
        <div class="admin-stats">
            <div><span class="n">{{ $total }}</span>Demandes reçues</div>
            <div><span class="n">{{ $today }}</span>Aujourd'hui</div>
        </div>
        <div class="admin-actions">
            <a href="{{ route('admin.consultations.export') }}" class="btn-small">⇩ Exporter CSV</a>
        </div>
    </div>

    @if (session('success'))
        <p style="color:#4ce0d2; margin-bottom:16px;">{{ session('success') }}</p>
    @endif

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr><th>Date</th><th>Nom</th><th>Téléphone</th><th>Rôle</th><th>Enjeu</th><th></th></tr>
            </thead>
            <tbody>
                @forelse ($requests as $r)
                    <tr>
                        <td class="mono">{{ $r->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $r->name }}</td>
                        <td class="mono">{{ $r->phone }}</td>
                        <td>{{ $r->role }}</td>
                        <td>{{ $r->need }}</td>
                         <td>
                            <form method="POST" action="{{ route('admin.consultations.updateStatus', $r) }}">
                                @csrf @method('PATCH')
                                <select name="status" class="status-select status-{{ $r->status }}" onchange="this.form.submit()">
                                    @foreach (\App\Models\ConsultationRequest::STATUSES as $value => $label)
                                        <option value="{{ $value }}" @selected($r->status === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </form>
                         </td>
                        <td>
                            <form method="POST" action="{{ route('admin.consultations.destroy', $r) }}" onsubmit="return confirm('Supprimer cette demande ?')">
                                @csrf @method('DELETE')
                                <button class="row-del" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="admin-empty">Aucune demande reçue.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $requests->links() }}
</div> --}}
{{-- @endsection --}}

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panneau admin — Ward Wide Learning</title>
<link rel="shortcut icon" href="logo-lockup.svg" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --bg:#080b14;
    --bg-alt:#0e1424;
    --panel:#11182b;
    --panel-2:#141d34;
    --line:rgba(148,168,204,0.14);
    --cyan:#4ce0d2;
    --violet:#8b7cf6;
    --amber:#ffb454;
    --text:#e9f0f5;
    --text-dim:#8a97ac;
    --radius:14px;
  }
  *{box-sizing:border-box;margin:0;padding:0;}
  body{
    background:var(--bg);color:var(--text);font-family:'Inter',sans-serif;line-height:1.6;
    min-height:100vh;
  }
  h1,h2,h3{font-family:'Space Grotesk',sans-serif;letter-spacing:-0.01em;}
  .mono{font-family:'IBM Plex Mono',monospace;}
  a{color:inherit;text-decoration:none;}
  .wrap{max-width:1180px;margin:0 auto;padding:0 32px;}

  .grid-bg{
    position:fixed;inset:0;z-index:0;pointer-events:none;
    background-image:linear-gradient(var(--line) 1px, transparent 1px),linear-gradient(90deg, var(--line) 1px, transparent 1px);
    background-size:64px 64px;opacity:0.3;
    mask-image:radial-gradient(ellipse 90% 60% at 50% 0%, black 40%, transparent 90%);
  }

  header{
    position:sticky;top:0;z-index:50;background:rgba(8,11,20,0.75);backdrop-filter:blur(14px);
    border-bottom:1px solid var(--line);
  }
  nav{display:flex;align-items:center;justify-content:space-between;padding:18px 32px;max-width:1180px;margin:0 auto;}
  .brand{display:flex;align-items:center;gap:10px;font-family:'Space Grotesk';font-weight:600;font-size:16px;}
  .brand-mark{width:50px;height:50px;border-radius:30px;background:var(--cyan);box-shadow:0 0 12px var(--cyan);animation:pulse 2.4s ease-in-out infinite;}
  @keyframes pulse{0%,100%{opacity:1;}50%{opacity:0.4;}}
  .nav-right{display:flex;align-items:center;gap:18px;font-family:'IBM Plex Mono';font-size:13px;color:var(--text-dim);}
  .logout-btn{
    background:transparent;border:1px solid var(--line);color:var(--text-dim);
    padding:8px 16px;border-radius:8px;font-family:'IBM Plex Mono';font-size:13px;cursor:pointer;transition:all 0.2s;
  }
  .logout-btn:hover{border-color:var(--amber);color:var(--amber);}

  main{position:relative;z-index:1;padding:56px 0 100px;}

  .page-head{margin-bottom:36px;}
  .eyebrow{
    display:inline-flex;align-items:center;gap:8px;font-family:'IBM Plex Mono';font-size:12px;
    letter-spacing:0.08em;text-transform:uppercase;color:var(--cyan);
    border:1px solid rgba(76,224,210,0.35);background:rgba(76,224,210,0.06);
    padding:6px 14px;border-radius:999px;margin-bottom:16px;
  }
  .eyebrow::before{content:'';width:6px;height:6px;border-radius:50%;background:var(--amber);box-shadow:0 0 8px var(--amber);}
  .page-head h1{font-size:clamp(24px,3vw,32px);font-weight:600;}

  .flash{
    font-family:'IBM Plex Mono';font-size:13.5px;color:var(--cyan);
    background:rgba(76,224,210,0.08);border:1px solid rgba(76,224,210,0.3);
    padding:12px 18px;border-radius:9px;margin-bottom:24px;
  }

  .admin-toolbar{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;margin-bottom:28px;}
  .admin-stats{display:flex;gap:26px;flex-wrap:wrap;}
  .admin-stats div{font-family:'IBM Plex Mono';font-size:12px;color:var(--text-dim);}
  .admin-stats .n{display:block;color:var(--cyan);font-size:24px;font-family:'Space Grotesk';font-weight:700;}
  .admin-stats .n.amber{color:var(--amber);}
  .admin-stats .n.violet{color:var(--violet);}

  .btn-small{
    font-family:'IBM Plex Mono';font-size:12.5px;padding:10px 16px;border-radius:8px;
    border:1px solid var(--line);color:var(--text-dim);background:transparent;cursor:pointer;transition:all 0.2s;
    display:inline-flex;align-items:center;gap:6px;
  }
  .btn-small:hover{border-color:var(--cyan);color:var(--cyan);}

  .admin-table-wrap{
    background:var(--panel);border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;overflow-x:auto;
  }
  table.admin-table{width:100%;border-collapse:collapse;font-size:13.5px;min-width:760px;}
  table.admin-table th{
    text-align:left;font-family:'IBM Plex Mono';font-size:11px;text-transform:uppercase;letter-spacing:0.05em;
    color:var(--text-dim);padding:14px 18px;border-bottom:1px solid var(--line);background:var(--bg-alt);
  }
  table.admin-table td{padding:14px 18px;border-bottom:1px solid var(--line);color:var(--text);vertical-align:middle;}
  table.admin-table tr:last-child td{border-bottom:none;}
  table.admin-table tr:hover td{background:rgba(76,224,210,0.04);}

  .status-select{
    font-family:'IBM Plex Mono';font-size:12px;padding:7px 12px;border-radius:7px;
    background:var(--bg-alt);cursor:pointer;outline:none;appearance:none;
    border:1px solid var(--line);
  }
  .status-en_attente{ color:var(--text-dim); border-color:var(--line); }
  .status-en_cours{ color:var(--amber); border-color:rgba(255,180,84,0.4); background:rgba(255,180,84,0.06); }
  .status-valide{ color:var(--cyan); border-color:rgba(76,224,210,0.4); background:rgba(76,224,210,0.06); }

  .row-del{
    font-family:'IBM Plex Mono';font-size:11.5px;color:var(--text-dim);border:1px solid var(--line);
    border-radius:6px;padding:6px 12px;background:transparent;cursor:pointer;transition:all 0.2s;
  }
  .row-del:hover{color:var(--amber);border-color:var(--amber);}

  .admin-empty{padding:60px 20px;text-align:center;color:var(--text-dim);font-family:'IBM Plex Mono';font-size:13.5px;}

  .pagination-wrap{margin-top:26px;display:flex;justify-content:center;}
  .pagination-wrap nav > div{display:flex;justify-content:center;}
  .pagination-wrap a, .pagination-wrap span{
    font-family:'IBM Plex Mono';font-size:12.5px;color:var(--text-dim);
  }
  .pagination-wrap a:hover{color:var(--cyan);}
</style>
</head>
<body>

<div class="grid-bg"></div>

<header>
  <nav>
    <div class="brand"><span class=""><img class="brand-mark" src="../logo-lockup.svg" alt="" srcset=""></span>Ward Wide Learning</div>
    <div class="nav-right">
      {{ auth()->user()->name }}
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Déconnexion</button>
      </form>
    </div>
  </nav>
</header>

<main>
  <div class="wrap">
    <div class="page-head">
      <span class="eyebrow">Espace interne</span>
      <h1>Demandes de consultation</h1>
    </div>

    @if (session('success'))
      <div class="flash">✓ {{ session('success') }}</div>
    @endif

    <div class="admin-toolbar">
      <div class="admin-stats">
        <div><span class="n">{{ $total }}</span>Total</div>
        <div><span class="n">{{ $today }}</span>Aujourd'hui</div>
        <div><span class="n amber">{{ $requests->where('status', 'en_cours')->count() }}</span>En cours</div>
        <div><span class="n violet">{{ $requests->where('status', 'valide')->count() }}</span>Validées</div>
      </div>
      <a href="{{ route('admin.consultations.export') }}" class="btn-small">⇩ Exporter CSV</a>
      <a href="{{ route('admin.consultations.exportXlsx') }}" class="btn-small">⇩ Excel (.xlsx)</a>
    </div>

    <div class="admin-table-wrap">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Nom & prénom</th>
            <th>Téléphone</th>
            <th>Rôle</th>
            <th>Enjeu principal</th>
            <th>Statut</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($requests as $r)
            <tr>
              <td class="mono">{{ $r->created_at->format('d/m/Y H:i') }}</td>
              <td>{{ $r->name }}</td>
              <td class="mono">{{ $r->phone }}</td>
              <td>{{ $r->role }}</td>
              <td>{{ $r->need }}</td>
              <td>
                <form method="POST" action="{{ route('admin.consultations.updateStatus', $r) }}">
                  @csrf
                  @method('PATCH')
                  <select name="status" class="status-select status-{{ $r->status }}" onchange="this.form.submit()">
                    @foreach (\App\Models\ConsultationRequest::STATUSES as $value => $label)
                      <option value="{{ $value }}" @selected($r->status === $value)>{{ $label }}</option>
                    @endforeach
                  </select>
                </form>
              </td>
              <td>
                <form method="POST" action="{{ route('admin.consultations.destroy', $r) }}" onsubmit="return confirm('Supprimer cette demande ?')">
                  @csrf
                  @method('DELETE')
                  <button class="row-del" type="submit">Supprimer</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="7" class="admin-empty">Aucune demande reçue pour le moment.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="pagination-wrap">
      {{ $requests->links() }}
    </div>
  </div>
</main>

</body>
</html>