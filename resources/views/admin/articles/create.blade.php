{{-- @extends('layouts.admin')
@section('title', 'Nouvel article')

@section('content')

<div class="admin-header">
  <div>
    <h1>Nouvel article</h1>
    <p>Rédigez et publiez un nouvel insight.</p>
  </div>
  <a href="{{ route('admin.articles.index') }}" class="btn btn-ghost">
    <i data-lucide="arrow-left"></i> Retour à la liste
  </a>
</div>

@include('admin.articles._form', ['article' => null])

@endsection

@section('scripts')
<script>
  // Compteur de caractères pour l'extrait
  const excerpt = document.getElementById('excerpt');
  const excerptCount = document.getElementById('excerptCount');
  function updateCount(){ excerptCount.textContent = excerpt.value.length; }
  if(excerpt){ updateCount(); excerpt.addEventListener('input', updateCount); }

  // Sélecteur d'icône
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
@section('title', 'Nouvel article')

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
            Nouvel article
        </h1>
        <p>
            Rédigez et publiez un nouvel insight.
        </p>
    </div>
    <div class="header-actions">
        <a href="{{ route('admin.articles.index') }}" class="export-btn">
            <span>←</span>
            Retour à la liste
        </a>
    </div>
</section>

@include('admin.articles._form', ['article' => null])

@endsection

@section('scripts')
<script>
  // Compteur de caractères pour l'extrait
  const excerpt = document.getElementById('excerpt');
  const excerptCount = document.getElementById('excerptCount');
  function updateCount(){ excerptCount.textContent = excerpt.value.length; }
  if(excerpt){ updateCount(); excerpt.addEventListener('input', updateCount); }

  // Sélecteur d'icône
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