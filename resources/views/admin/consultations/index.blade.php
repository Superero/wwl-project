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

    <link rel="stylesheet" href="{{ asset('adminStyle.css') }}">
</head>
<body>
<div class="admin-bg"></div>

<!-- =========================
     SIDEBAR
========================= -->
<aside class="sidebar">
    <div class="sidebar-brand">
        <img src="../logo-lockup.svg" class="sidebar-logo" alt="Ward Wide Learning">
        <div>
            <a href="{{route('home')}}"><strong>Ward Wide Learning</strong></a>
        </div>
    </div>

    <div class="sidebar-section">
        <span class="sidebar-label">
            ADMINISTRATION
        </span>
        <a href="{{ route('dashboard') }}" class="sidebar-link active">
            <span class="sidebar-icon">▦</span>
            <span>Consultations</span>
            <span class="sidebar-count">
                {{ $total }}
            </span>
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
                 PAGE HEADER
            ========================= -->
            <section class="page-header">
                <div>
                    <span class="page-kicker">
                        CENTRE DE GESTION
                    </span>
                    <h1>
                        Demandes de consultation
                    </h1>
                    <p>
                        Gérez et suivez les demandes reçues depuis votre plateforme.
                    </p>
                </div>
                <div class="header-actions">
                    <a href="{{ route('admin.consultations.export') }}"
                       class="export-btn">
                        <span>↓</span>
                        CSV
                    </a>
                    <a href="{{ route('admin.consultations.exportXlsx') }}"
                       class="export-btn primary">
                        <span>↓</span>
                        Excel
                    </a>
                </div>
            </section>


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
                 STATISTICS
            ========================= -->

            <section class="stats-grid">
                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">
                            TOTAL
                        </span>
                        <span class="stat-icon cyan">
                            #
                        </span>
                    </div>
                    <div class="stat-value">
                        {{ $total }}
                    </div>
                    <div class="stat-description">
                        Demandes reçues
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">
                            AUJOURD'HUI
                        </span>
                        <span class="stat-icon violet">
                            ◷
                        </span>
                    </div>
                    <div class="stat-value">
                        {{ $today }}
                    </div>
                    <div class="stat-description">
                        Nouvelles demandes
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">
                            EN COURS
                        </span>
                        <span class="stat-icon amber">
                            ◌
                        </span>
                    </div>
                    <div class="stat-value amber-text">
                        {{ $requests->where('status', 'en_cours')->count() }}
                    </div>
                    <div class="stat-description">
                        À traiter
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">
                            VALIDÉES
                        </span>
                        <span class="stat-icon green">
                            ✓
                        </span>
                    </div>

                    <div class="stat-value green-text">
                        {{ $requests->where('status', 'valide')->count() }}
                    </div>

                    <div class="stat-description">
                        Demandes validées
                    </div>
                </div>

            </section>

            <!-- =========================
                 TABLE CARD
            ========================= -->

            <section class="requests-card">
                <div class="requests-card-header">
                    <div>
                        <span class="table-kicker">
                            LISTE DES DEMANDES
                        </span>
                        <h2>
                            Consultations récentes
                        </h2>
                    </div>

                    <div class="table-hint">
                        <span class="hint-dot"></span>
                        Cliquez sur une ligne pour lire le message
                    </div>
                </div>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                        <tr>
                            <th>DATE</th>
                            <th>CONTACT</th>
                            <th>TÉLÉPHONE</th>
                            <th>EMAIL</th>
                            <th>ENTREPRISE</th>
                            <th>RÔLE</th>
                            <th>ENJEU</th>
                            <th>STATUT</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse ($requests as $r)
                            <tr class="request-row"
                                onclick="showMessage(@js($r->message), @js($r->name))">
                                <td>
                                    <span class="date-main">
                                        {{ $r->created_at->format('d/m/Y') }}
                                    </span>
                                    <span class="date-time">
                                        {{ $r->created_at->format('H:i') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="contact-cell">
                                        <div class="contact-avatar">
                                            {{ strtoupper(substr($r->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <strong>
                                                {{ $r->name }}
                                            </strong>
                                            <span>
                                                Demandeur
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="mono-cell">
                                    {{ $r->phone }}
                                </td>
                                <td>
                                    <span class="email-cell">
                                        {{ $r->email }}
                                    </span>
                                </td>
                                <td>
                                    {{ $r->company ?: '—' }}
                                </td>
                                <td>
                                    {{ $r->role ?: '—' }}
                                </td>
                                <td>
                                    <span class="need-badge">
                                        {{ $r->need }}
                                    </span>
                                </td>
                                <td onclick="event.stopPropagation()">
                                    <form method="POST" action="{{ route('admin.consultations.updateStatus', $r) }}">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="status-select status-{{ $r->status }}"onchange="this.form.submit()">
                                            @foreach (\App\Models\ConsultationRequest::STATUSES as $value => $label)
                                                <option value="{{ $value }}"
                                                    @selected($r->status === $value)>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                                <td onclick="event.stopPropagation()">
                                    <form method="POST" action="{{ route('admin.consultations.destroy', $r) }}"onsubmit="return confirm('Supprimer cette demande ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-btn"type="submit" title="Supprimer">
                                            ×
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <div class="empty-state">
                                        <div class="empty-icon">
                                            ∅
                                        </div>
                                        <strong>
                                            Aucune demande
                                        </strong>
                                        <span>
                                            Aucune demande de consultation n'a encore été reçue.
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </section>


            <!-- =========================
                 PAGINATION
            ========================= -->

            <div class="pagination-container">
                {{ $requests->links() }}
            </div>
        </div>
    </main>
</div>


<!-- =========================
     MESSAGE MODAL
========================= -->

<div id="messageModal" class="message-modal">
    <div class="message-overlay"
         onclick="closeMessage()">
    </div>
    <div class="message-dialog">
        <button class="modal-close" onclick="closeMessage()">
            ×
        </button>
        <div class="modal-top">
            <div class="modal-symbol">
                ✓
            </div>
            <div>
                <span>
                    MESSAGE DE CONSULTATION
                </span>
                <h2 id="messageModalTitle">
                    Message
                </h2>
            </div>
        </div>
        <div class="modal-message">
            <div class="quote-mark">
                “
            </div>
            <p id="messageModalText"></p>
        </div>
        <div class="modal-footer">
            <span>
                Ward Wide Learning
            </span>
            <button onclick="closeMessage()">
                Fermer
            </button>
        </div>
    </div>
</div>

<script>

function showMessage(message, name) {
    const modal = document.getElementById('messageModal');
    document.getElementById('messageModalTitle').textContent = name;
    document.getElementById('messageModalText').textContent = message || 'Aucun message disponible.';
    modal.classList.add('active');
    document.body.classList.add('modal-open');
}

function closeMessage() {
    document.getElementById('messageModal').classList.remove('active');
    document.body.classList.remove('modal-open');
}

document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeMessage();
    }
});

</script>

</body>
</html>