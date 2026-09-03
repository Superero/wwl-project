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
<link rel="stylesheet" href="adminStyle.css">
</head>
<body>

<div class="grid-bg"></div>

<header>
  <nav>
    <div class="brand"><span class=""><img class="brand-mark" src="../logo-lockup.svg" alt="" srcset=""></span>Ward Wide Learning</div>
    <div class="nav-right"><a href="{{route('profile.edit')}}">
        {{ auth()->user()->name }}
    </a>
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
        {{-- affiche le status par page --}}
        <div><span class="n amber">{{ $requests->where('status', 'en_cours')->count() }}</span>En cours</div>
        {{-- affiche le status total --}}
        {{-- <div><span class="n amber">{{ $enCours }}</span>En cours</div> --}}
        {{-- <div><span class="n amber">{{ $valide }}</span>Validées</div> --}}
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
            <th>Email</th>
            <th>Company</th>
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
              <td class="mono">{{ $r->email }}</td>
              <td>{{ $r->company }}</td>
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