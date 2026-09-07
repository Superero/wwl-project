@extends('layouts.main')
@section('title',"Insights — Ward Wide Learning")
@section('style',"style/insights.css")
@section('script',"scripts/insights.js")

@section('content')

<!-- SECTION NAV INDICATOR -->
<nav class="section-nav" aria-label="Navigation des sections">
  <a href="#insights-top" data-label="Insights" aria-label="Insights"></a>
  <a href="#featured" data-label="À la une" aria-label="Article à la une"></a>
  <a href="#tous-les-articles" data-label="Articles" aria-label="Tous les articles"></a>
  <a href="#newsletter" data-label="Newsletter" aria-label="Newsletter"></a>
  <a href="#cta-final" data-label="Contact" aria-label="Nous contacter"></a>
</nav>


<section class="insights-hero" id="insights-top">
  <div class="wrap">
    <span class="kicker reveal">Insights · Ward Wide Learning</span>
    <h1 class="reveal reveal-delay-1">Learning, decoded.</h1>
    <p class="lead reveal reveal-delay-2">Le blog Ward Wide Learning devient Insights : des points de vue, des repères et des retours d'expérience pour piloter la formation avec plus de rigueur et un impact réellement mesurable.</p>
    <div class="insight-filters reveal reveal-delay-3" id="insightFilters">
      <button class="filter-pill active" data-filter="all" type="button">Tous les insights</button>
      <button class="filter-pill" data-filter="Learning Impact" type="button"><i data-lucide="trending-up" aria-hidden="true"></i> Learning Impact</button>
      <button class="filter-pill" data-filter="Learning Experience" type="button"><i data-lucide="brain" aria-hidden="true"></i> Learning Experience</button>
      <button class="filter-pill" data-filter="Digital Learning & IA" type="button"><i data-lucide="bot" aria-hidden="true"></i> Digital Learning &amp; IA</button>
      <button class="filter-pill" data-filter="Talent & Assessment" type="button"><i data-lucide="clipboard-check" aria-hidden="true"></i> Talent &amp; Assessment</button>
      <button class="filter-pill" data-filter="Leadership & Human Performance" type="button"><i data-lucide="users-round" aria-hidden="true"></i> Leadership &amp; Human Performance</button>
    </div>
  </div>
</section>

<section id="featured" style="padding-top:12px;">
  <div class="wrap">
    <a href="#" class="featured-insight reveal" data-category="Learning Impact">
      <div class="featured-thumb">
           <img src="{{ asset('article01.png') }}" alt="Pourquoi le transfert échoue après une bonne formation" loading="lazy">
      </div>
      <div class="featured-body">
        <span class="featured-label"><i data-lucide="trending-up" aria-hidden="true"></i> Article à la une · Learning Impact</span>
        <h3>Votre formation a eu 95 % de satisfaction. Et alors ?</h3>
        <p>La satisfaction à chaud ne dit rien de l'apprentissage réel, ni du transfert sur le terrain. Voici ce qu'il faut mesurer pour savoir si une formation a vraiment produit un effet.</p>
        <span class="featured-meta">12 min de lecture · 3 septembre 2026</span>
        <span class="featured-link">Lire l'article <i data-lucide="arrow-up-right" aria-hidden="true"></i></span>
      </div>
    </a>
  </div>
</section>

<section class="insights-index" id="tous-les-articles">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Tous les articles</span>
      <h2>Des repères concrets pour vos décisions L&amp;D.</h2>
      <p>Filtrez par thématique ou parcourez l'ensemble des publications Ward Wide Learning.</p>
    </div>

    <div class="insights-grid" id="insightsGrid">

      <article class="insight-card reveal" data-category="Learning Experience">
        <div class="insight-thumb">
           <img src="{{ asset('article02.png') }}" loading="lazy">
          <span class="insight-cat"><i data-lucide="brain" aria-hidden="true"></i> Learning Experience</span>
        </div>
        <div class="insight-body">
          <span class="insight-meta">8 min · 27 août 2026</span>
          <h3>Pourquoi le transfert échoue après une bonne formation.</h3>
          <p class="insight-excerpt">Un excellent dispositif pédagogique ne garantit pas le passage à l'action. Les vrais leviers du transfert se jouent après la salle.</p>
          <a href="#" class="insight-link">Lire l'article <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
        </div>
      </article>

      <article class="insight-card reveal reveal-delay-1" data-category="Learning Impact">
        <div class="insight-thumb">
           <img src="{{ asset('article03.png') }}" loading="lazy">
          <span class="insight-cat"><i data-lucide="bar-chart-3" aria-hidden="true"></i> Learning Impact</span>
        </div>
        <div class="insight-body">
          <span class="insight-meta">10 min · 19 août 2026</span>
          <h3>Kirkpatrick : ce que les entreprises mesurent… et ce qu'elles oublient.</h3>
          <p class="insight-excerpt">La plupart des dispositifs s'arrêtent aux deux premiers niveaux du modèle. Voici comment aller jusqu'au résultat business.</p>
          <a href="#" class="insight-link">Lire l'article <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
        </div>
      </article>

      <article class="insight-card reveal reveal-delay-2" data-category="Digital Learning & IA">
        <div class="insight-thumb">
           <img src="{{ asset('article04.png') }}" loading="lazy">
          <span class="insight-cat"><i data-lucide="monitor-play" aria-hidden="true"></i> Digital Learning &amp; IA</span>
        </div>
        <div class="insight-body">
          <span class="insight-meta">7 min · 12 août 2026</span>
          <h3>Présentiel, e-learning ou blended : la mauvaise question à poser.</h3>
          <p class="insight-excerpt">Le bon format dépend du besoin, pas d'une préférence pour le digital. Voici comment arbitrer sans se tromper.</p>
          <a href="#" class="insight-link">Lire l'article <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
        </div>
      </article>

      <article class="insight-card reveal" data-category="Learning Experience">
        <div class="insight-thumb">
          <span class="insight-cat"><i data-lucide="search-check" aria-hidden="true"></i> Learning Experience</span>
        </div>
        <div class="insight-body">
          <span class="insight-meta">9 min · 5 août 2026</span>
          <h3>7 signaux que votre formation doit être repensée, pas simplement digitalisée.</h3>
          <p class="insight-excerpt">Digitaliser un mauvais dispositif ne le rend pas meilleur. Voici les signaux qui doivent alerter avant de lancer un projet digital.</p>
          <a href="#" class="insight-link">Lire l'article <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
        </div>
      </article>

      <article class="insight-card reveal reveal-delay-1" data-category="Talent & Assessment">
        <div class="insight-thumb">
          <span class="insight-cat"><i data-lucide="clipboard-check" aria-hidden="true"></i> Talent &amp; Assessment</span>
        </div>
        <div class="insight-body">
          <span class="insight-meta">11 min · 29 juillet 2026</span>
          <h3>Learning analytics : 5 données plus utiles que le taux de complétion.</h3>
          <p class="insight-excerpt">Le taux de complétion ne mesure rien d'utile. Voici les indicateurs qui éclairent vraiment la performance d'un dispositif.</p>
          <a href="#" class="insight-link">Lire l'article <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
        </div>
      </article>

    </div>

    <p class="no-results" id="noResults">Aucun article dans cette thématique pour le moment. Choisissez une autre catégorie.</p>
  </div>
</section>

{{-- <section id="newsletter">
  <div class="wrap">
    <div class="newsletter reveal">
      <div>
        <h3>Un insight par mois, jamais plus.</h3>
        <p>Recevez uniquement nos publications les plus utiles sur l'impact, l'expérience et le digital learning. Pas de spam, pas de contenu promotionnel.</p>
      </div>
      <div>
        <form class="newsletter-form" id="newsletterForm">
          <input type="email" id="newsletterEmail" name="email" required placeholder="vous@entreprise.com" aria-label="Adresse email professionnelle">
          <button type="submit">S'abonner</button>
        </form>
        <p class="newsletter-note">Désinscription possible à tout moment.</p>
        <p class="newsletter-success" id="newsletterSuccess"><i data-lucide="check-circle-2" aria-hidden="true"></i> Merci, vous êtes inscrit(e).</p>
      </div>
    </div>
  </div>
</section> --}}

<section id="cta-final">
  <div class="wrap">
    <div class="final-cta reveal">
      <span class="kicker" style="justify-content:center;">Un enjeu Learning à partager ?</span>
      <h2>Parlez-nous de votre contexte ou commencez par notre diagnostic offert.</h2>
      <p>Un échange court suffit souvent pour clarifier le point de départ.</p>
      <div class="btn-row">
        <a href="/#contact" class="btn-primary">Planifier un échange <i data-lucide="calendar-arrow-up" aria-hidden="true"></i></a>
        <a href="/#contact" class="btn-ghost">Faire le diagnostic offert <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</section>

{{-- <script src="{{ asset('script.js') }}"></script> --}}
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  if (window.lucide) lucide.createIcons();
</script>
</body>
</html>
@endsection