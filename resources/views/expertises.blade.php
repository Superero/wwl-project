@extends('layouts.main')
@section('title',"Expertises — Ward Wide Learning")
@section('style',"style/expertises.css")
@section('script',"scripts/expertises.js")

@section('content')

{{-- hero de page --}}
{{-- <section class="page-hero" id="hero">
  <div class="wrap">
    <div class="breadcrumb reveal">
      <a href="{{ route('home') }}">Accueil</a>
      <span class="sep">/</span>
      <span class="current">Expertises</span>
    </div>
    <span class="kicker reveal reveal-delay-1">Nos expertises</span>
    <h1 class="reveal reveal-delay-2">Notre expertise couvre l'ensemble du cycle Learning.</h1>
    <p class="lead reveal reveal-delay-3">Nous intervenons avant, pendant et après la formation&nbsp;: pour cadrer le besoin, concevoir l'expérience, digitaliser, évaluer et soutenir le transfert.</p>
    <div class="btn-row reveal reveal-delay-3" style="margin-top:28px;">
      <a href="{{ route('home') }}#contact" class="btn-primary">Parler de votre enjeu Learning <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
      <a href="{{ route('home') }}#solutions" class="btn-ghost">Voir nos solutions <i data-lucide="arrow-right" aria-hidden="true"></i></a>
    </div>
  </div>
</section> --}}
<section class="page-hero page-hero-expertise" id="hero">
  <div class="wrap">

    <div class="hero-expertise-grid">

      <!-- CONTENU -->
      <div class="hero-expertise-content">

        <div class="breadcrumb reveal">
          <a href="{{ route('home') }}">Accueil</a>
          <span class="sep">/</span>
          <span class="current">Expertises</span>
        </div>

        <span class="kicker reveal reveal-delay-1">
          Nos expertises
        </span>

        <h1 class="reveal reveal-delay-2">
          Notre expertise couvre
          <span>l'ensemble du cycle Learning.</span>
        </h1>

        <p class="lead reveal reveal-delay-3">
          Nous intervenons avant, pendant et après la formation :
          pour cadrer le besoin, concevoir l'expérience, digitaliser,
          évaluer et soutenir le transfert.
        </p>

        <div class="btn-row reveal reveal-delay-3" style="margin-top:28px;">
          <a href="{{ route('home') }}#contact" class="btn-primary">
            Parler de votre enjeu Learning
            <i data-lucide="arrow-up-right" aria-hidden="true"></i>
          </a>

          <a href="{{ route('home') }}#solutions" class="btn-ghost">
            Voir nos solutions
            <i data-lucide="arrow-right" aria-hidden="true"></i>
          </a>
        </div>

      </div>


      <!-- VISUEL HERO -->
      <div class="hero-expertise-visual reveal reveal-delay-2">

        <div class="hero-image-card">

          <img
            src="img1.png"
            alt="Digital Learning et transformation des compétences"
          >

          <div class="hero-image-overlay"></div>

          <!-- Petit élément flottant -->
          <div class="hero-floating-card">
            <span class="floating-icon">
              <i data-lucide="brain-circuit"></i>
            </span>

            <div>
              <strong>Learning ecosystem</strong>
              <span>Stratégie · Expérience · Digital · Impact</span>
            </div>
          </div>

          <!-- Indicateur -->
          <div class="hero-image-index">
            <span>01</span>
            <small>EXPERTISE</small>
          </div>

        </div>

        <!-- éléments décoratifs -->
        <div class="hero-orbit orbit-1"></div>
        <div class="hero-orbit orbit-2"></div>

      </div>

    </div>

  </div>
</section>

{{-- Expertises section --}}

<section id="expertises-detail">
  <div class="wrap">
    <div class="expertise-list">

      <div class="expertise-block reveal">
        <div class="expertise-head">
          <span class="num">01</span>
          <div class="expertise-icon"><i data-lucide="compass" aria-hidden="true"></i></div>
          <span class="tag">Stratégie</span>
          <h3>Learning Strategy</h3>
        </div>
        <div class="expertise-body">
          <p class="tagline">Relier la formation aux enjeux réels de l'organisation.</p>
          <p>Nous aidons les entreprises à clarifier leurs priorités Learning, à identifier les compétences à développer et à structurer des dispositifs cohérents avec leurs enjeux métier, leurs publics et leurs contraintes opérationnelles.</p>
          <p>Nous intervenons notamment sur l'analyse des besoins, la cartographie des compétences, la segmentation des publics, l'architecture de parcours et la structuration de la gouvernance L&amp;D.</p>
          <div class="domain-list">
            <span class="domain-pill">Analyse des besoins</span>
            <span class="domain-pill">Cartographie des compétences</span>
            <span class="domain-pill">Segmentation des publics</span>
            <span class="domain-pill">Architecture de parcours</span>
            <span class="domain-pill">Gouvernance L&amp;D</span>
          </div>
        </div>
      </div>

      <div class="expertise-block reveal">
        <div class="expertise-head">
          <span class="num">02</span>
          <div class="expertise-icon"><i data-lucide="sparkles" aria-hidden="true"></i></div>
          <span class="tag">Conception</span>
          <h3>Learning Experience Design</h3>
        </div>
        <div class="expertise-body">
          <p class="tagline">Transformer un besoin de formation en une expérience qui engage et fait apprendre.</p>
          <p>Nous concevons des parcours pédagogiques sur mesure en choisissant les formats, activités et modalités les plus adaptés aux objectifs et aux usages des apprenants.</p>
          <p>Selon les projets, nous combinons présentiel, digital et blended learning, pédagogie active, gamification, serious games, simulations, microlearning et mises en situation pour favoriser la compréhension, la pratique et l'ancrage.</p>
          <div class="domain-list">
            <span class="domain-pill">Blended learning</span>
            <span class="domain-pill">Pédagogie active</span>
            <span class="domain-pill">Gamification</span>
            <span class="domain-pill">Serious games</span>
            <span class="domain-pill">Simulations</span>
            <span class="domain-pill">Microlearning</span>
            <span class="domain-pill">Mises en situation</span>
          </div>
        </div>
      </div>

      <div class="expertise-block reveal">
        <div class="expertise-head">
          <span class="num">03</span>
          <div class="expertise-icon"><i data-lucide="monitor-play" aria-hidden="true"></i></div>
          <span class="tag">Digital</span>
          <h3>Digital Learning</h3>
        </div>
        <div class="expertise-body">
          <p class="tagline">Digitaliser sans réduire la formation à une succession de contenus.</p>
          <p>Nous concevons et produisons des expériences digitales pensées pour être accessibles, engageantes et déployables à grande échelle&nbsp;: modules e-learning, microlearning, académies digitales, parcours blended ou dispositifs hébergés sur LMS/LXP.</p>
          <p>Nous accompagnons également le choix des outils, la scénarisation, la production sur Storyline et Rise, l'intégration SCORM/HTML5 et l'usage de l'intelligence artificielle lorsque celle-ci apporte une réelle valeur à l'expérience d'apprentissage.</p>
          <div class="domain-list">
            <span class="domain-pill">E-learning</span>
            <span class="domain-pill">Académies digitales</span>
            <span class="domain-pill">LMS / LXP</span>
            <span class="domain-pill">Storyline &amp; Rise</span>
            <span class="domain-pill">SCORM / HTML5</span>
            <span class="domain-pill">IA appliquée au Learning</span>
          </div>
        </div>
      </div>

      <div class="expertise-block reveal">
        <div class="expertise-head">
          <span class="num">04</span>
          <div class="expertise-icon"><i data-lucide="chart-no-axes-combined" aria-hidden="true"></i></div>
          <span class="tag">Impact</span>
          <h3>Learning Impact &amp; Assessment</h3>
        </div>
        <div class="expertise-body">
          <p class="tagline">Mesurer ce qui a réellement été appris, appliqué et transformé.</p>
          <p>Nous accompagnons les organisations dans la conception de dispositifs d'évaluation qui vont au-delà de la satisfaction à chaud. Nous pouvons structurer l'évaluation selon les différents niveaux du modèle de Kirkpatrick&nbsp;: réaction des participants, apprentissage, évolution des comportements en situation de travail et résultats associés.</p>
          <p>Nous concevons également des assessments et tests de positionnement, définissons les indicateurs à suivre, analysons le transfert des acquis sur le terrain et exploitons les données Learning pour identifier ce qui fonctionne, ce qui bloque et ce qui doit être amélioré.</p>
          <div class="domain-list">
            <span class="domain-pill">Modèle Kirkpatrick</span>
            <span class="domain-pill">Assessments</span>
            <span class="domain-pill">Tests de positionnement</span>
            <span class="domain-pill">Indicateurs &amp; pilotage</span>
            <span class="domain-pill">Analyse du transfert</span>
            <span class="domain-pill">Learning analytics</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section id="check">
  <div class="wrap">
    <div class="interactive-card reveal">
      <div>
        <span class="kicker">Rubrique interactive</span>
        <h2>Que mesure réellement votre dispositif d'évaluation de la formation ?</h2>
        <p>Répondez à une série courte de questions pour obtenir une première lecture de votre Learning Impact Coverage.</p>
      </div>
      <a href="{{ route('home') }}#contact" data-need="Learning Performance Check" class="btn-primary">Tester mon Impact Coverage</a>
    </div>
  </div>
</section>

<section id="cta-final">
  <div class="wrap">
    <div class="final-cta reveal">
      <span class="kicker" style="justify-content:center;">Votre prochain Pit Stop commence ici</span>
      <h2>Parlez-nous de votre enjeu ou commencez par notre diagnostic offert.</h2>
      <p>Un échange court suffit souvent pour clarifier le point de départ.</p>
      <div class="btn-row">
        <a href="{{ route('home') }}#contact" class="btn-primary">Planifier un échange <i data-lucide="calendar-arrow-up" aria-hidden="true"></i></a>
        <a href="{{ route('home') }}#solutions" class="btn-ghost">Découvrir nos solutions <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</section>




{{-- <script src="{{ asset('script.js') }}"></script> --}}
<script src="https://unpkg.com/lucide@latest"></script>
{{-- <script src="{{asset('scripts/expertises.js')}}"></script> --}}
<script>
  if (window.lucide) lucide.createIcons();
</script>
@endsection