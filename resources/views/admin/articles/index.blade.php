{{-- @extends('layouts.admin')
@section('title', 'Articles')

@section('content')

<div class="admin-header">
  <div>
    <h1>Articles</h1>
    <p>Gérez les publications affichées sur la page Insights.</p>
  </div>
  <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
    <i data-lucide="plus"></i> Nouvel article
  </a>
</div>

<style>
  .art-table-wrap{
    background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);
    overflow:hidden;
  }
  table{width:100%;border-collapse:collapse;}
  thead th{
    text-align:left;font-family:var(--font-mono);font-size:11.5px;text-transform:uppercase;
    letter-spacing:.04em;color:var(--text-secondary);padding:14px 18px;border-bottom:1px solid var(--border);
    background:var(--surface-2);
  }
  tbody td{padding:16px 18px;border-bottom:1px solid var(--border);font-size:14px;vertical-align:middle;}
  tbody tr:last-child td{border-bottom:none;}
  tbody tr:hover{background:var(--surface-hover);}
  .art-title{display:flex;align-items:center;gap:12px;}
  .art-thumb{
    width:52px;height:38px;border-radius:6px;object-fit:cover;flex:0 0 auto;
    background:var(--surface-2);border:1px solid var(--border);
  }
  .art-title strong{display:block;font-size:14px;font-weight:600;}
  .art-title span{display:block;font-size:12px;color:var(--text-secondary);margin-top:2px;}
  .badge{
    display:inline-flex;align-items:center;gap:5px;font-family:var(--font-mono);font-size:11px;
    padding:5px 10px;border-radius:20px;border:1px solid var(--border-strong);color:var(--text-secondary);
  }
  .badge-on{color:var(--success);border-color:rgba(79,203,143,.4);background:rgba(79,203,143,.08);}
  .badge-off{color:var(--text-secondary);}
  .badge-featured{color:var(--accent);border-color:rgba(250,188,25,.4);background:rgba(250,188,25,.08);}
  .row-actions{display:flex;gap:8px;justify-content:flex-end;}
  .empty-state{padding:70px 20px;text-align:center;color:var(--text-secondary);}
  .empty-state i{width:34px;height:34px;color:var(--text-secondary);margin-bottom:12px;}
  .pagination-wrap{margin-top:24px;}
</style>

<div class="art-table-wrap">
  @if($articles->count())
  <table>
    <thead>
      <tr>
        <th>Article</th>
        <th>Catégorie</th>
        <th>Statut</th>
        <th>Publié le</th>
        <th style="text-align:right;">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($articles as $article)
      <tr>
        <td>
          <div class="art-title">
            @if($article->image)
              <img class="art-thumb" src="{{ Storage::url($article->image) }}" alt="">
            @else
              <div class="art-thumb"></div>
            @endif
            <div>
              <strong>{{ Str::limit($article->title, 55) }}</strong>
              <span>{{ $article->reading_time }} min de lecture</span>
            </div>
          </div>
        </td>
        <td><span class="badge">{{ $article->category }}</span></td>
        <td style="display:flex;gap:6px;flex-wrap:wrap;">
          <span class="badge {{ $article->is_published ? 'badge-on' : 'badge-off' }}">
            {{ $article->is_published ? 'Publié' : 'Brouillon' }}
          </span>
          @if($article->is_featured)
            <span class="badge badge-featured">À la une</span>
          @endif
        </td>
        <td>{{ $article->published_at?->translatedFormat('d M Y') ?? '—' }}</td>
        <td>
          <div class="row-actions">
            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-ghost btn-sm">
              <i data-lucide="pencil"></i> Modifier
            </a>
            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                  onsubmit="return confirm('Supprimer définitivement « {{ addslashes($article->title) }} » ?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">
                <i data-lucide="trash-2"></i> Supprimer
              </button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <div class="empty-state">
    <i data-lucide="inbox"></i>
    <p>Aucun article pour le moment.</p>
  </div>
  @endif
</div>

<div class="pagination-wrap">
  {{ $articles->links() }}
</div>

@endsection --}}

@extends('layouts.admin')
@section('title', 'Articles')

@section('content')

<!-- =========================
     PAGE HEADER
========================= -->
<section class="page-header">
    <div>
        <span class="page-kicker">
            GESTION DE CONTENU
        </span>
        <h1>
            Articles
        </h1>
        <p>
            Gérez les publications affichées sur la page Insights.
        </p>
    </div>
    <div class="header-actions">
        <a href="{{ url('/insights') }}" target="_blank" class="export-btn">
            <span>↗</span>
            Voir Insights
        </a>
        <a href="{{ route('admin.articles.create') }}" class="export-btn primary">
            <span>＋</span>
            Nouvel article
        </a>
    </div>
</section>


<!-- =========================
     TABLE CARD
========================= -->
<section class="requests-card">
    <div class="requests-card-header">
        <div>
            <span class="table-kicker">
                BIBLIOTHÈQUE
            </span>
            <h2>
                Publications
            </h2>
        </div>

        <div class="table-hint">
            <span class="hint-dot"></span>
            {{ $articles->total() }} article(s)
        </div>
    </div>
    <div class="table-container">
        <table class="admin-table">
            <thead>
            <tr>
                <th>ARTICLE</th>
                <th>CATÉGORIE</th>
                <th>STATUT</th>
                <th>PUBLIÉ LE</th>
                <th style="text-align:right;">ACTIONS</th>
            </tr>
            </thead>

            <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td>
                        <div class="art-title-cell">
                            @if ($article->image)
                                <img class="art-thumb" src="{{ Storage::url($article->image) }}" alt="">
                            @else
                                <div class="art-thumb art-thumb-empty">✎</div>
                            @endif
                            <div>
                                <strong>
                                    {{ Str::limit($article->title, 50) }}
                                </strong>
                                <span>
                                    {{ $article->reading_time }} min de lecture
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="need-badge need-badge-wide">
                            {{ $article->category }}
                        </span>
                    </td>
                    <td>
                        <div class="badge-cell">
                            <span class="badge {{ $article->is_published ? 'badge-on' : '' }}">
                                {{ $article->is_published ? 'Publié' : 'Brouillon' }}
                            </span>
                            @if ($article->is_featured)
                                <span class="badge badge-featured">
                                    À la une
                                </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <span class="date-main">
                            {{ $article->published_at?->format('d/m/Y') ?? '—' }}
                        </span>
                    </td>
                    <td>
                        <div class="row-actions">
                            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-ghost btn-sm">
                                ✎ Modifier
                            </a>
                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                                  onsubmit="return confirm('Supprimer définitivement « {{ addslashes($article->title) }} » ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    × Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div class="empty-state">
                            <div class="empty-icon">
                                ✎
                            </div>
                            <strong>
                                Aucun article
                            </strong>
                            <span>
                                Créez votre première publication pour alimenter la page Insights.
                            </span>
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</section>

@endsection

@section('pagination')
    {{ $articles->links() }}
@endsection