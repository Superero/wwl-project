{{-- @extends('layouts.admin')
@section('title', 'Modifier l’article')

@section('content')

<div class="admin-header">
  <div>
    <h1>Modifier l’article</h1>
    <p>{{ $article->title }}</p>
  </div>
  <div style="display:flex;gap:10px;">
    <a href="{{ route('insights.show', $article->slug) }}" target="_blank" class="btn btn-ghost">
      <i data-lucide="eye"></i> Aperçu
    </a>
    <a href="{{ route('admin.articles.index') }}" class="btn btn-ghost">
      <i data-lucide="arrow-left"></i> Retour
    </a>
  </div>
</div>

@include('admin.articles._form', ['article' => $article])

@endsection

@section('scripts')
<script>
  const excerpt = document.getElementById('excerpt');
  const excerptCount = document.getElementById('excerptCount');
  function updateCount(){ excerptCount.textContent = excerpt.value.length; }
  if(excerpt){ updateCount(); excerpt.addEventListener('input', updateCount); }

  const iconPicker = document.getElementById('iconPicker');
  const iconInput = document.getElementById('iconInput');
  if(iconPicker){
    iconPicker.querySelectorAll('.icon-choice').forEach(el => {
      el.addEventListener('click', () => {
        iconPicker.querySelectorAll('.icon-choice').forEach(i => i.classList.remove('selected'));
        el.classList.add('selected');
        iconInput.value = el.dataset.icon;
      });
    });
  }
</script>
@endsection --}}

@extends('layouts.admin')
@section('title', 'Modifier l’article')

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
            Modifier l’article
        </h1>
        <p>
            {{ $article->title }}
        </p>
    </div>
    <div class="header-actions">
        <a href="{{ route('insights.show', $article->slug) }}" target="_blank" class="export-btn">
            <span>↗</span>
            Aperçu
        </a>
        <a href="{{ route('admin.articles.index') }}" class="export-btn">
            <span>←</span>
            Retour
        </a>
    </div>
</section>

@include('admin.articles._form', ['article' => $article])

@endsection

@section('scripts')
<script>
  const excerpt = document.getElementById('excerpt');
  const excerptCount = document.getElementById('excerptCount');
  function updateCount(){ excerptCount.textContent = excerpt.value.length; }
  if(excerpt){ updateCount(); excerpt.addEventListener('input', updateCount); }

  const iconPicker = document.getElementById('iconPicker');
  const iconInput = document.getElementById('iconInput');
  if(iconPicker){
    iconPicker.querySelectorAll('.icon-choice').forEach(el => {
      el.addEventListener('click', () => {
        iconPicker.querySelectorAll('.icon-choice').forEach(i => i.classList.remove('selected'));
        el.classList.add('selected');
        iconInput.value = el.dataset.icon;
      });
    });
  }
</script>
@endsection