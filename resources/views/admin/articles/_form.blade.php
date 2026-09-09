@php
  $article = $article ?? null;
  $categories = [
    'Learning Impact',
    'Learning Experience',
    'Digital Learning & IA',
    'Talent & Assessment',
    'Leadership & Human Performance',
  ];
//   $icons = [
//     'trending-up', 'brain', 'bot', 'clipboard-check', 'users-round',
//     'bar-chart-3', 'monitor-play', 'search-check',
//   ];
@endphp

<form action="{{ $article ? route('admin.articles.update', $article) : route('admin.articles.store') }}"
      method="POST" enctype="multipart/form-data" id="articleForm">
  @csrf
  @if($article) @method('PUT') @endif

  <div class="form-grid">

    <!-- COLONNE PRINCIPALE -->
    <div>
      <div class="form-card">
        <div class="form-card-head">
          <span class="form-card-symbol">✎</span>
          <h3>Contenu</h3>
        </div>
        <div class="form-card-body">

          <div class="field">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" required maxlength="255"
                   value="{{ old('title', $article->title ?? '') }}"
                   placeholder="Ex : Votre formation a eu 95 % de satisfaction. Et alors ?">
          </div>

          <div class="field">
            <label for="excerpt">Extrait (affiché sur les cartes)</label>
            <textarea id="excerpt" name="excerpt" maxlength="500" rows="3"
                      placeholder="Une ou deux phrases qui donnent envie de lire l'article.">{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
            <p class="char-counter"><span id="excerptCount">0</span>/500</p>
          </div>

          <div class="field">
            <label for="content">Contenu complet</label>
            <textarea id="content" name="content"
                      placeholder="Rédigez l'article ici (HTML ou Markdown selon votre configuration).">{{ old('content', $article->content ?? '') }}</textarea>
          </div>

        </div>
      </div>
    </div>

    <!-- COLONNE LATÉRALE -->
    <div>
      <div class="form-card">
        <div class="form-card-head">
          <span class="form-card-symbol">◩</span>
          <h3>Image</h3>
        </div>
        <div class="form-card-body">
          <div class="field">
            @if(!empty($article) && $article->image)
              <img class="current-image" src="{{ Storage::url($article->image) }}" alt="">
            @endif
            <input type="file" name="image" accept="image/*">
            <p class="hint">Format recommandé : paysage, 1200×675px environ. Laissez vide pour conserver l'image actuelle.</p>
          </div>
        </div>
      </div>

      <div class="form-card">
        <div class="form-card-head">
          <span class="form-card-symbol">#</span>
          <h3>Classification</h3>
        </div>
        <div class="form-card-body">

          <div class="field">
            <label for="category">Catégorie</label>
            <select id="category" name="category" required>
              <option value="" disabled {{ old('category', $article->category ?? '') === '' ? 'selected' : '' }}>Choisir une catégorie</option>
              @foreach($categories as $cat)
                <option value="{{ $cat }}" {{ old('category', $article->category ?? '') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
              @endforeach
            </select>
          </div>

          {{-- <div class="field">
            <label>Icône</label>
            <input type="hidden" name="icon" id="iconInput" value="{{ old('icon', $article->icon ?? 'trending-up') }}">
            <div class="icon-picker" id="iconPicker">
              @foreach($icons as $icon)
                <div class="icon-choice {{ old('icon', $article->icon ?? 'trending-up') === $icon ? 'selected' : '' }}"
                     data-icon="{{ $icon }}" title="{{ $icon }}">
                  <i data-lucide="{{ $icon }}"></i>
                </div>
              @endforeach
            </div>
          </div> --}}

          <div class="field">
            <label for="reading_time">Temps de lecture (min)</label>
            <input type="number" id="reading_time" name="reading_time" min="1" max="60"
                   value="{{ old('reading_time', $article->reading_time ?? 5) }}">
          </div>
          <div class="field">
            <label for="published_at">Date de publication</label>
            <input type="date" id="published_at" name="published_at"
                value="{{ old('published_at', isset($article->published_at) ? $article->published_at->format('Y-m-d') : now()->format('Y-m-d')) }}">
            @error('published_at') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        </div>
      </div>

      <div class="form-card">
        <div class="form-card-head">
          <span class="form-card-symbol">⚙</span>
          <h3>Publication</h3>
        </div>
        <div class="form-card-body">

          <div class="toggle-row">
            <div class="label-text">
              Publié
              <small>Visible sur la page Insights</small>
            </div>
            <label class="switch">
                <input type="hidden" name="is_published" value="0">
              <input type="checkbox" name="is_published" value="1"
                     {{ old('is_published', $article->is_published ?? true) ? 'checked' : '' }}>
              <span class="track"></span>
            </label>
          </div>

          <div class="toggle-row">
            <div class="label-text">
              Article à la une
              <small>Un seul article featured à la fois recommandé</small>
            </div>
            <label class="switch">
              <input type="checkbox" name="is_featured" value="1"
                     {{ old('is_featured', $article->is_featured ?? false) ? 'checked' : '' }}>
              <span class="track"></span>
            </label>
          </div>

        </div>
      </div>

      <div class="form-actions">
        <button type="submit" class="btn btn-primary">
          ✓ {{ $article ? 'Enregistrer' : 'Créer l’article' }}
        </button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-ghost">Annuler</a>
      </div>
    </div>

  </div>
</form>