<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ward Wide Learning — Formation d'entreprise, pilotée par la donnée</title>
<link rel="shortcut icon" href="{{ asset('logo-lockup.svg') }}" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Work+Sans:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('style/index.css') }}">

</head>
<body>

{{-- POPUP SUCCÈS — affichée uniquement après une soumission réussie --}}
@if (session('success'))
    <div class="success-modal" id="successModal" role="dialog" aria-modal="true" aria-labelledby="successTitle">
        <div class="success-modal-backdrop"></div>
        <div class="success-modal-card">
            <button type="button" class="success-modal-close" id="successModalClose" aria-label="Fermer">
                ×
            </button>
            <div class="success-icon-wrapper">
                <div class="success-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M5 12.5L9.5 17L19 7"/>
                    </svg>
                </div>
            </div>
            <div class="success-modal-content">
                <span class="success-modal-label">Transmission confirmée</span>
                <h2 id="successTitle">Demande envoyée</h2>
                <p>{{ session('success') }}</p>
                <div class="success-modal-status">
                    <span class="status-dot"></span>
                    Votre demande est bien enregistrée
                </div>
                <button type="button" class="success-modal-button" id="successModalContinue">
                    <i data-lucide="check" aria-hidden="true"></i> Parfait, merci
                </button>
            </div>
        </div>
    </div>
@endif

<!-- SCROLL PROGRESS -->
<div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>

<!-- SECTION NAV INDICATOR -->
<nav class="section-nav" aria-label="Navigation des sections">
  <a href="#hero" data-label="Accueil" aria-label="Accueil"></a>
  <a href="#expertises" data-label="Expertises" aria-label="Nos expertises"></a>
  <a href="#solutions" data-label="Solutions" aria-label="Nos solutions"></a>
  <a href="#check" data-label="Diagnostic" aria-label="Learning Performance Check"></a>
  <a href="#approche" data-label="Approche" aria-label="Notre approche"></a>
  <a href="#insights" data-label="Insights" aria-label="Insights"></a>
  <a href="#apropos" data-label="À propos" aria-label="À propos"></a>
  <a href="#contact" data-label="Contact" aria-label="Contact"></a>
</nav>

<!-- CUSTOM CURSOR -->
<div class="cursor-dot" id="cursorDot" aria-hidden="true"></div>
<div class="cursor-ring" id="cursorRing" aria-hidden="true"></div>

<!-- BACKGROUND LAYERS -->
<div class="field" aria-hidden="true">
  <canvas id="bgCanvas"></canvas>
  <div class="field-wash"></div>
  <div class="field-grid"></div>
  <div class="field-glow"></div>
  <div class="field-shapes">
    <span class="field-shape sh1"></span>
    <span class="field-shape sh2"></span>
    <span class="field-shape sh3"></span>
    <span class="field-shape sh4"></span>
    <span class="field-shape sh5"></span>
  </div>
  <div class="field-grain"></div>
</div>

<header>
  <nav>
    <div class="brand" id="siteLogo"
     data-dashboard-url="{{ route('dashboard') }}"
     role="button"
     tabindex="0"
     aria-label="Ward Wide Learning">
      <img class="brand-mark" id="logo" src="{{ asset('logo-lockup.svg') }}" alt="Ward Wide Learning">
      <span>Ward Wide Learning</span>
    </div>
    <div class="nav-links" id="navLinks">
      <a href="{{ route('expertises') }}">Expertises</a>
      <a href="{{ route('solutions') }}">Solutions</a>
      <a href="{{ route('insights') }}">Insights</a>
      <a href="{{ route('about') }}">À propos</a>
      <a href="{{ route('contact') }}">Contact</a>
    </div>
    <div class="nav-actions">
      <button class="theme-toggle" id="themeToggle" type="button" aria-label="Activer le mode clair"></button>
      <button class="nav-burger" id="navBurger" type="button" aria-label="Ouvrir le menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
      <a href=" https://docs.google.com/forms/d/e/1FAIpQLSfsIlapJ1kpymakN-_97jUNkh-KPlCYq2RTb3LSutkts1JmIQ/viewform?usp=publish-editor" target="blank" class="nav-cta">Diagnostic offert</a>
    </div>
  </nav>
</header>

<section class="hero" id="hero">
  <div class="hero-background-atmosphere"></div>
  <div class="hero-vignette"></div>
  <div class="hero-grain"></div>
  <div class="hero-light"></div>
  <div class="wrap hero-grid">
    <div>
      <span class="kicker reveal">Diagnostic offert · Partenaire Learning & Performance</span>
      <h1 class="reveal reveal-delay-1 ttl">Nous concevons des expériences d'apprentissage qui créent un changement <span class="accent-word">mesurable</span>.</h1>
      <p class="lead reveal reveal-delay-2">Learning strategy, Digital Learning, évaluation
de la formation et impact au service de vos enjeux business.</p>
      <div class="btn-row reveal reveal-delay-3">
        <a href=" https://docs.google.com/forms/d/e/1FAIpQLSfsIlapJ1kpymakN-_97jUNkh-KPlCYq2RTb3LSutkts1JmIQ/viewform?usp=publish-editor" target="blank" class="btn-primary">Faire le diagnostic offert <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
        <a href="#solutions" class="btn-ghost btn1 ">Découvrir nos solutions <i data-lucide="arrow-down" aria-hidden="true"></i></a>
      </div>
      <div class="hero-microcopy reveal reveal-delay-3">
        <span>5 minutes</span>
        <span>Résultat immédiat</span>
        <span>Sans engagement</span>
      </div>
    </div>
    <div class="module-field reveal reveal-delay-2">
      <div class="module-tile">
        <i data-lucide="compass" class="tile-icon" aria-hidden="true"></i>
        <span class="tile-tag">01</span>
        <h4>Learning Strategy</h4>
      </div>
      <div class="module-tile">
        <i data-lucide="sparkles" class="tile-icon" aria-hidden="true"></i>
        <span class="tile-tag">02</span>
        <h4>Learning Experience Design</h4>
      </div>
      <div class="module-tile">
        <i data-lucide="monitor-play" class="tile-icon" aria-hidden="true"></i>
        <span class="tile-tag">03</span>
        <h4>Digital Learning</h4>
      </div>
      <div class="module-tile">
        <i data-lucide="chart-no-axes-combined" class="tile-icon" aria-hidden="true"></i>
        <span class="tile-tag">04</span>
        <h4>Learning Impact & Assessment</h4>
      </div>
    </div>
    {{-- <div class="hero-art reveal reveal-delay-2">

    <!-- Glow derrière l'image -->
    <div class="hero-art-glow"></div>

    <!-- Cercle décoratif -->
    <div class="hero-art-ring hero-art-ring-1"></div>
    <div class="hero-art-ring hero-art-ring-2"></div>

    <!-- Image principale -->
    <div class="hero-art-image">

        <img
            src="{{ asset('img2.png') }}"
            alt="Learning and performance"
        >

        <div class="hero-art-image-overlay"></div>

    </div>

    <!-- Petit élément flottant -->
    <div class="hero-art-badge">
        <span class="hero-art-dot"></span>

        <div>
            <small>WWL</small>
            <strong>Learning in motion</strong>
        </div>
    </div>

    <!-- Chiffre décoratif -->
    <div class="hero-art-number">
        01
    </div>

    <!-- Ligne graphique -->
    <div class="hero-art-line"></div>

</div> --}}
  </div>
</section>

<section id="expertises">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Nos expertises</span>
      <h2>Une expertise de bout en bout, du besoin à l'impact.</h2>
    </div>
    <div class="index-list">
      <div class="index-row reveal">
        <span class="num">01</span>
        <div>
          <span class="tag">Learning Strategy</span>
          <h3>
            {{-- <i data-lucide="target" class="inline-icon" aria-hidden="true"></i> --}}
             Learning design Strategy</h3>
        </div>
        <p>Aligner la formation aux enjeux stratégiques, métiers et compétences.</p>
      </div>
      <div class="index-row reveal reveal-delay-1">
        <span class="num">02</span>
        <div>
          <span class="tag">Conception</span>
          <h3>
            {{-- <i data-lucide="layers-3" class="inline-icon" aria-hidden="true"></i> --}}
             Learning Experience Design</h3>
        </div>
        <p>Concevoir des expériences utiles, engageantes et adaptées au travail réel.</p>
      </div>
      <div class="index-row reveal reveal-delay-2">
        <span class="num">03</span>
        <div>
          <span class="tag">Digital</span>
          <h3>
            {{-- <i data-lucide="monitor-play" class="inline-icon" aria-hidden="true"></i> --}}
             Digital Learning</h3>
        </div>
        <p>Créer des parcours digitaux, blended et scalables sans appauvrir l'expérience.</p>
      </div>
      <div class="index-row reveal reveal-delay-3">
        <span class="num">04</span>
        <div>
          <span class="tag">Impact</span>
          <h3>
            {{-- <i data-lucide="chart-no-axes-combined" class="inline-icon" aria-hidden="true"></i> --}}
             Learning Impact & Assessment</h3>
        </div>
        <p>Mesurer l'apprentissage, le transfert, les compétences et la contribution aux résultats.</p>
      </div>
    </div>
  </div>
</section>

<section id="solutions">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Vos enjeux, nos solutions</span>
      <h2>Commencez par votre problème. Nous construisons la réponse.</h2>
    </div>
    <div class="solutions-grid">
      <div class="solution-card reveal">
        <span class="num">01</span>
        <h3><i data-lucide="bar-chart-3" class="inline-icon" aria-hidden="true"></i> Learning Impact</h3>
        <p>Évaluer l'efficacité des formations, structurer les indicateurs, mesurer le transfert et mieux piloter les décisions L&D.</p>
        <a href="#contact" data-need="Mesure du ROI formation" class="seg-cta">Évaluer l'impact de mes formations</a>
      </div>
      <div class="solution-card reveal reveal-delay-1">
        <span class="num">02</span>
        <h3><i data-lucide="monitor-play" class="inline-icon" aria-hidden="true"></i> Digital Learning</h3>
        <p>Digitaliser des parcours, produire des modules e-learning, concevoir du blended learning et structurer des expériences scalables.</p>
        <a href="#contact" data-need="Formation de volumes importants" class="seg-cta">Digitaliser mon parcours</a>
      </div>
      <div class="solution-card reveal reveal-delay-2">
        <span class="num">03</span>
        <h3><i data-lucide="route" class="inline-icon" aria-hidden="true"></i> Académies & parcours</h3>
        <p>Structurer une académie, un curriculum, une architecture de parcours ou une offre de formation cohérente.</p>
        <a href="#contact" data-need="Structurer une académie" class="seg-cta">Structurer mon académie</a>
      </div>
      <div class="solution-card reveal">
        <span class="num">04</span>
        <h3><i data-lucide="gauge" class="inline-icon" aria-hidden="true"></i> Pit Stop Learning</h3>
        <p>Intervention courte et ciblée pour diagnostiquer un enjeu, prioriser et repartir avec un plan d'action concret.</p>
        <a href="#contact" data-need="Pit Stop Learning" class="seg-cta">Faire un Pit Stop</a>
      </div>
      <div class="solution-card reveal reveal-delay-1">
        <span class="num">05</span>
        <h3><i data-lucide="clipboard-check" class="inline-icon" aria-hidden="true"></i> Assessment & Positioning</h3>
        <p>Créer des tests de positionnement, assessments, et dispositifs d'évaluation d'impact et de transfert.</p>
        <a href="#contact" data-need="Assessment et positionnement" class="seg-cta">Concevoir mon assessment</a>
      </div>
      <div class="solution-card reveal reveal-delay-2">
        <span class="num">06</span>
        <h3><i data-lucide="users-round" class="inline-icon" aria-hidden="true"></i> Management & Human Performance</h3>
        <p>Développer leadership, soft skills, cognition, communication et dynamiques d'équipe avec des dispositifs adaptés.</p>
        <a href="#contact" data-need="Management et soft skills" class="seg-cta">Construire mon parcours</a>
      </div>
    </div>
    <div class="section-head-cta reveal">
      <a href="{{ route('solutions') }}" class="btn-ghost">Explorer toutes les solutions</a>
    </div>
  </div>
</section>

<section id="check">
  <div class="wrap">
    <div class="interactive-card reveal">
      <div>
        {{-- <span class="kicker">Rubrique interactive</span> --}}
        <h2>Que mesure réellement votre dispositif d'évaluation de la formation ?</h2>
        <p>Répondez à une série courte de questions pour obtenir une première lecture de votre Learning Impact Coverage.</p>
      </div>
      <a href="#contact" data-need="Learning Performance Check" class="btn-primary">Tester mon Impact Coverage</a>
    </div>
  </div>
</section>

<section id="approche">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Notre approche</span>
      <h2>Apprendre. Ajuster. Accélérer.</h2>
    </div>
    <div class="pit-lane">
      <div class="pit-track"></div>
      <div class="pillars">
        <div class="pillar reveal">
          <div class="pillar-marker">01</div>
          <span class="stage">Stop</span>
          <h3>
            {{-- <i data-lucide="search-check" class="inline-icon" aria-hidden="true"></i> --}}
             Analyser et diagnostiquer</h3>
          <p>Comprendre le dispositif existant, les objectifs et les points de friction.</p>
        </div>
        <div class="pillar reveal reveal-delay-1">
          <div class="pillar-marker">02</div>
          <span class="stage">Design</span>
          <h3>
            {{-- <i data-lucide="pen-tool" class="inline-icon" aria-hidden="true"></i> --}}
             Concevoir l'expérience</h3>
          <p>Scénariser un dispositif pédagogique adapté aux publics et aux usages.</p>
        </div>
        <div class="pillar reveal reveal-delay-2">
          <div class="pillar-marker">03</div>
          <span class="stage">Sprint</span>
          <h3>
            {{-- <i data-lucide="flask-conical" class="inline-icon" aria-hidden="true"></i> --}}
             Prototyper et tester</h3>
          <p>Déployer une version pilote et l'ajuster au contact du terrain.</p>
        </div>
        <div class="pillar reveal reveal-delay-3">
          <div class="pillar-marker">04</div>
          <span class="stage">Accelerate</span>
          <h3>
            {{-- <i data-lucide="rocket" class="inline-icon" aria-hidden="true"></i> --}}
             Déployer, mesurer et améliorer</h3>
          <p>Généraliser le dispositif et mettre en place le suivi de son impact.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="insights">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Insights</span>
      <h2>Learning, decoded.</h2>
    </div>
    <div class="insights-grid">
      <article class="insight-card reveal">
        <div class="insight-thumb">
            <img src="article01.png" alt="" srcset="" loading="lazy">
            <span class="insight-cat"><i data-lucide="trending-up" aria-hidden="true"></i> Learning Impact</span></div>
        <div class="insight-body">
          <span class="insight-meta">12 min · 3 sept. 2026</span>
          <h3>Votre formation a eu 95 % de satisfaction. Et alors ?</h3>
          <a href="{{ route('insights') }}" class="insight-link">Lire l'article <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
        </div>
      </article>
      <article class="insight-card reveal reveal-delay-1">
        <div class="insight-thumb">
            <img src="article02.png" alt="" srcset="" loading="lazy">
          <span class="insight-cat"><i data-lucide="brain" aria-hidden="true"></i> Learning Experience</span></div>
        <div class="insight-body">
          <span class="insight-meta">8 min · 27 août 2026</span>
          <h3>Pourquoi le transfert échoue après une bonne formation.</h3>
          <a href="{{ route('insights') }}" class="insight-link">Lire l'article <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
        </div>
      </article>
      <article class="insight-card reveal reveal-delay-2">
        <div class="insight-thumb">
            <img src="article03.png" alt="" srcset="" loading="lazy">
          <span class="insight-cat"><i data-lucide="bot" aria-hidden="true"></i> Digital Learning & IA</span></div>
        <div class="insight-body">
          <span class="insight-meta">10 min · 19 août 2026</span>
          <h3>Kirkpatrick : ce que les entreprises mesurent... et ce qu'elles oublient.</h3>
          <a href="{{ route('insights') }}" class="insight-link">Lire l'article <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
        </div>
      </article>
    </div>
    <div class="section-head-cta reveal">
      <a href="{{ route('insights') }}" class="btn-ghost">Voir tous les Insights</a>
    </div>
  </div>
</section>

<section id="apropos">
  <div class="wrap about-wrap">
    <div class="reveal">
      <span class="kicker">À propos</span>
      <p class="about-lead">Chez Ward Wide Learning, nous ne concevons pas la formation comme une succession de contenus à délivrer, mais comme un système à faire fonctionner.</p>
      <p>Nous partons des enjeux réels de l'organisation, concevons des expériences d'apprentissage adaptées aux usages et au terrain, puis nous cherchons à rendre visible ce qui change réellement après la formation.</p>
      <p>Notre ambition : créer des dispositifs plus utiles, plus engageants et plus mesurables, avec une même exigence tout au long du parcours.</p>
      <div class="btn-row">
        <a href="#contact" class="btn-primary">Parler de votre enjeu Learning <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
      </div>
    </div>
    <div class="about-panel reveal reveal-delay-2">
      <div class="row"><span><i data-lucide="badge-check" aria-hidden="true"></i> Exigence</span><span class="v">Concevoir avec rigueur</span></div>
      <div class="row"><span><i data-lucide="user-round" aria-hidden="true"></i> Expérience</span><span class="v">Penser pour l'apprenant et son contexte réel</span></div>
      <div class="row"><span><i data-lucide="chart-no-axes-combined" aria-hidden="true"></i> Impact</span><span class="v">Mesurer ce qui change vraiment</span></div>
      <div class="row"><span><i data-lucide="map-pin" aria-hidden="true"></i> Localisation</span><span class="v">Casablanca, Maroc</span></div>
    </div>
  </div>
</section>

<section id="cta-final">
  <div class="wrap">
    <div class="final-cta reveal">
      {{-- <span class="kicker" style="justify-content:center;">Votre prochain Pit Stop commence ici</span> --}}
      <h2>Parlez-nous de votre enjeu ou commencez par notre diagnostic offert.</h2>
      <p>Un échange court suffit souvent pour clarifier le point de départ.</p>
      <div class="btn-row">
        <a href="#contact" class="btn-primary">Planifier un échange <i data-lucide="calendar-arrow-up" aria-hidden="true"></i></a>
        <a href=" https://docs.google.com/forms/d/e/1FAIpQLSfsIlapJ1kpymakN-_97jUNkh-KPlCYq2RTb3LSutkts1JmIQ/viewform?usp=publish-editor" target="blank" class="btn-ghost">Faire le diagnostic offert <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</section>

<section id="contact">
  <div class="wrap">
    <div class="contact-card reveal">
      <div>
        {{-- <span class="kicker">Parlons de votre enjeu Learning</span> --}}
        <h2>Parlons de votre enjeu</h2>
        <p>Un échange court suffit souvent pour clarifier le point de départ. Remplissez ce formulaire pour être recontacté par un expert Ward Wide Learning.</p>
        <div class="contact-coords">
          <strong>Ward Wide Learning</strong><br>
          Oasis Latitude Offices, Angle Route de l'Oasis, Allée Imam Mouslim, Casablanca<br>
          +212 6 79 85 73 17 · h.ward@wardwidelearning.com
        </div>
      </div>
      <div>
        <form method="POST" action="{{ route('consultation.store') }}" id="hero-form">
          @csrf
          <div class="field-pair">
            <div class="field-row">
              <label for="name"><i data-lucide="user" aria-hidden="true"></i> Prénom et nom</label>
              <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Votre nom complet">
            </div>
            <div class="field-row">
              <label for="email"><i data-lucide="mail" aria-hidden="true"></i> Email professionnel</label>
              <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="vous@entreprise.com">
            </div>
          </div>
          <div class="field-pair">
            <div class="field-row">
              <label for="company"><i data-lucide="building-2" aria-hidden="true"></i> Entreprise</label>
              <input type="text" id="company" name="company" value="{{ old('company') }}" required placeholder="Nom de votre entreprise">
            </div>
            <div class="field-row">
              <label for="role"><i data-lucide="briefcase-business" aria-hidden="true"></i> Fonction</label>
              <select id="role" name="role" required>
                <option value="" disabled selected>Sélectionnez votre fonction</option>
                <option>Responsable formation / L&D</option>
                <option>Directeur RH</option>
                <option>Responsable QHSE</option>
                <option>Direction générale / COMEX</option>
                <option>Autre</option>
              </select>
              <span class="select-arrow"></span>
            </div>
          </div>
          <div class="field-pair">
            <div class="field-row">
              <label for="phone"><i data-lucide="phone" aria-hidden="true"></i> Votre numéno de téléphone</label>
              <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="+212 60000-0000">
            </div>
            <div class="field-row">
              <label for="need"><i data-lucide="layers-3" aria-hidden="true"></i> Votre enjeu principal</label>
              <select id="need" name="need" required>
                <option value="" disabled selected>Sélectionnez votre enjeu</option>
                <option>Mesure du ROI formation</option>
                <option>Formation de volumes importants</option>
                <option>Structurer une académie</option>
                <option>Pit Stop Learning</option>
                <option>Assessment et positionnement</option>
                <option>Management et soft skills</option>
                <option>Learning Performance Check</option>
                <option>Autre besoin</option>
              </select>
              <span class="select-arrow"></span>
          </div>
          </div> 
          {{-- <div class="field-row">
            <label for="need"><i data-lucide="layers-3" aria-hidden="true"></i> Votre enjeu principal</label>
            <select id="need" name="need" required>
              <option value="" disabled selected>Sélectionnez votre enjeu</option>
              <option>Mesure du ROI formation</option>
              <option>Formation de volumes importants</option>
              <option>Structurer une académie</option>
              <option>Pit Stop Learning</option>
              <option>Assessment et positionnement</option>
              <option>Management et soft skills</option>
              <option>Learning Performance Check</option>
              <option>Autre besoin</option>
            </select>
            <span class="select-arrow"></span>
          </div> --}}
          <div class="field-row">
            <label for="message"><i data-lucide="message-square" aria-hidden="true"></i> Message libre (optionnel)</label>
            <textarea id="message" name="message" rows="3" placeholder="Décrivez brièvement votre contexte...">{{ old('message') }}</textarea>
          </div>
          <button type="submit" class="btn-primary" id="submitBtn">
            <span>Envoyer ma demande</span>
          </button>
          <p class="form-note">Réponse sous 24 à 48h ouvrées · aucun engagement.</p>
        </form>
        @if (session('success'))
            <div class="success-msg" style="display:block;">✓ {{ session('success') }}</div>
        @endif
        <div class="success-msg" id="successMsg">✓ Demande envoyée. Un expert Ward Wide Learning vous recontacte sous 24 à 48h.</div>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="wrap footer-wrap">
    <div class="brand"><img class="brand-mark" src="{{ asset('logo-lockup.svg') }}" alt="Ward Wide Learning">Ward Wide Learning</div>
    <div>Oasis Latitude Offices, Angle Route de l'Oasis, Casablanca</div>
    <div>© {{ now()->year }} Ward Wide Learning</div>
  </div>
</footer>

<!-- WHATSAPP CHAT WIDGET -->
<button class="wa-fab" id="waFab" type="button" aria-label="Discuter avec nous sur WhatsApp" aria-expanded="false">
  <span class="wa-badge" id="waBadge"></span>
  <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.01 3C9.38 3 4 8.38 4 15.01c0 2.35.65 4.54 1.78 6.42L4 29l7.76-1.75c1.79.98 3.86 1.54 6.25 1.54 6.63 0 12.01-5.38 12.01-12.01C30.02 8.38 24.64 3 16.01 3zm7.05 17.16c-.3.84-1.72 1.6-2.38 1.7-.61.09-1.38.13-2.23-.14-.51-.16-1.17-.38-2.02-.75-3.55-1.53-5.86-5.1-6.04-5.34-.18-.24-1.45-1.93-1.45-3.68 0-1.75.92-2.6 1.24-2.96.32-.35.7-.44.93-.44.23 0 .47 0 .67.01.22.01.5-.08.78.6.3.72 1.02 2.48 1.11 2.66.09.18.15.39.03.63-.12.24-.18.39-.36.6-.18.21-.38.47-.54.63-.18.18-.37.38-.16.74.21.35.94 1.55 2.02 2.51 1.39 1.24 2.56 1.62 2.92 1.8.36.18.57.15.78-.09.21-.24.9-1.05 1.14-1.41.24-.35.48-.29.81-.18.33.12 2.09.99 2.45 1.17.36.18.6.27.69.42.09.15.09.85-.21 1.69z"/></svg>
</button>

<div class="wa-panel" id="waPanel">
  <div class="wa-panel-head">
    <div class="wa-avatar">
      <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.01 3C9.38 3 4 8.38 4 15.01c0 2.35.65 4.54 1.78 6.42L4 29l7.76-1.75c1.79.98 3.86 1.54 6.25 1.54 6.63 0 12.01-5.38 12.01-12.01C30.02 8.38 24.64 3 16.01 3z"/></svg>
    </div>
    <div>
      <h4>Ward Wide Learning</h4>
      <div class="status">En ligne · répond rapidement</div>
    </div>
    <button class="wa-close" id="waClose" type="button" aria-label="Fermer la discussion">✕</button>
  </div>
  <div class="wa-panel-body">
    <div class="wa-bubble">👋 Bonjour ! Une question sur nos solutions Learning ou notre approche « Pit Stop » ? Écrivez-nous, on vous répond rapidement.</div>
    <a class="wa-cta" id="waLink" href="https://wa.me/212679857317?text=Bonjour%20Ward%20Wide%20Learning%2C%20je%20souhaite%20des%20informations%20sur%20vos%20solutions." target="_blank" rel="noopener">
      <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.01 3C9.38 3 4 8.38 4 15.01c0 2.35.65 4.54 1.78 6.42L4 29l7.76-1.75c1.79.98 3.86 1.54 6.25 1.54 6.63 0 12.01-5.38 12.01-12.01C30.02 8.38 24.64 3 16.01 3z"/></svg>
      Démarrer la discussion
    </a>
  </div>
</div>

{{-- <script src="{{ asset('script.js') }}"></script> --}}
<script src="https://unpkg.com/lucide@latest" defer></script>
<script src="{{asset('scripts/index.js')}}" ></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    if (window.lucide) {
        lucide.createIcons();
    }
  });
</script>
</body>
</html>