@extends('layouts.main')
@section('title',"Solutions — Ward Wide Learning | Des réponses concrètes à vos enjeux Learning")
@section('description',"Learning Impact, Digital Learning, Académies & parcours, Pit Stop Learning, Assessment & Positioning, Management & Human Performance : découvrez nos solutions Learning sur mesure.")
@section('style',"style/solutions.css")
@section('script',"scripts/solutions.js")

@section('content')

<!-- SECTION NAV INDICATOR -->
<nav class="section-nav" aria-label="Navigation des sections">
  <a href="#solutions-hero" data-label="Solutions" aria-label="Solutions"></a>
  <a href="#learning-impact" data-label="Learning Impact" aria-label="Learning Impact"></a>
  <a href="#digital-learning" data-label="Digital Learning" aria-label="Digital Learning"></a>
  <a href="#pit-stop" data-label="Pit Stop" aria-label="Pit Stop Learning"></a>
  <a href="#academies" data-label="Académies" aria-label="Académies & parcours"></a>
  <a href="#assessment" data-label="Assessment" aria-label="Assessment & Positioning"></a>
  <a href="#management" data-label="Management" aria-label="Management & Human Performance"></a>
  <a href="#check" data-label="Diagnostic" aria-label="Learning Performance Check"></a>
  <a href="#contact" data-label="Contact" aria-label="Contact"></a>
</nav>

<!-- = HERO DE PAGE = -->
<section class="page-hero" id="solutions-hero">
    <div class="wrap">
        <div class="hero-layout">
            <!-- CONTENU -->
            <div class="hero-content">
                <span class="kicker reveal">Vos enjeux, nos solutions</span>
                <h1 class="reveal reveal-delay-1">Des solutions conçues pour vos enjeux Learning.</h1>
                <p class="lead reveal reveal-delay-2">
                    Qu'il s'agisse de repenser un dispositif existant,
                    de digitaliser un parcours, de structurer une académie
                    ou de mieux mesurer l'impact de la formation, nous
                    construisons des solutions adaptées à votre contexte,
                    vos publics et vos objectifs.
                </p>
                <div class="btn-row reveal reveal-delay-3">
                    <a href=" https://docs.google.com/forms/d/e/1FAIpQLSfsIlapJ1kpymakN-_97jUNkh-KPlCYq2RTb3LSutkts1JmIQ/viewform?usp=publish-editor" target="blank"class="btn-primary">Faire le diagnostic offert<i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
                    <a href="#check" class="btn-ghost">Tester mon Impact Coverage<i data-lucide="arrow-down" aria-hidden="true"></i></a>
                </div>

                <div class="solutions-jump reveal reveal-delay-4">
                    <a href="#learning-impact"><span class="jump-dot"></span>Learning Impact</a>
                    <a href="#digital-learning"><span class="jump-dot"></span>Digital Learning</a>
                    <a href="#pit-stop"><span class="jump-dot"></span>Pit Stop Learning</a>
                    <a href="#academies"> <span class="jump-dot"></span>Académies & parcours</a>
                    <a href="#assessment"><span class="jump-dot"></span>Assessment & Positioning</a>
                    <a href="#management"><span class="jump-dot"></span>Management & Human Performance</a>
                </div>
            </div>

            <!-- VISUEL HERO -->
            <div class="hero-visual reveal reveal-delay-2">
                <div class="hero-image-card">
                    <div class="hero-image-frame">
                        <img src="img3.avif" alt="Innovation et transformation des expériences Learning">
                        <div class="hero-image-overlay"></div>
                    </div>

                    <!-- Étiquette -->
                    <div class="hero-floating-label hero-label-top">
                        <span class="label-dot"></span>Learning Intelligence
                    </div>

                    <!-- Carte flottante -->
                    <div class="hero-floating-card">
                        <div class="floating-icon">
                            <i data-lucide="sparkles"></i>
                        </div>
                        <div>
                            <span class="floating-small">APPROCHE</span>
                            <strong>Learning × Impact</strong>
                        </div>
                    </div>
                    <!-- Élément décoratif -->
                    <div class="hero-orbit orbit-one"></div>
                    <div class="hero-orbit orbit-two"></div>
                    <span class="hero-accent accent-one"></span>
                    <span class="hero-accent accent-two"></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- = LISTE DES SOLUTIONS — DÉTAIL = -->
<section id="solutions-detail">
  <div class="wrap">

    <div class="solution-detail reveal" id="learning-impact">
      <span class="num">01</span>
      <div>
        <span class="tag">Learning Impact</span>
        <h3><i data-lucide="bar-chart-3" class="inline-icon" aria-hidden="true"></i> Learning Impact</h3>
        <p class="hook">Passer du reporting de formation à une véritable lecture de son efficacité.</p>
        <p class="body-text">Nous accompagnons les équipes RH et L&amp;D dans la construction de dispositifs d'évaluation adaptés à leur niveau de maturité et aux enjeux de chaque formation.</p>
        <p class="body-text">L'objectif n'est pas de multiplier les questionnaires, mais de définir ce qu'il est réellement utile de mesurer : expérience apprenant, apprentissages acquis, application en situation de travail et évolution des résultats associés.</p>
        <p class="body-text">Selon le besoin, nous pouvons réaliser un diagnostic de maturité, structurer le dispositif d'évaluation selon les différents niveaux du modèle de <strong>Kirkpatrick</strong>, définir les indicateurs pertinents, mettre en place le suivi du transfert des acquis et concevoir des tableaux de bord permettant de transformer les données en décisions d'amélioration.</p>
        <a href="#contact" data-need="Mesure du ROI formation" class="seg-cta">Évaluer l'impact de mes formations</a>
      </div>
    </div>

    <div class="solution-detail reveal" id="digital-learning">
      <span class="num">02</span>
      <div>
        <span class="tag">Digital Learning</span>
        <h3><i data-lucide="monitor-play" class="inline-icon" aria-hidden="true"></i> Digital Learning</h3>
        <p class="hook">Transformer une formation en expérience digitale, pas simplement en contenu en ligne.</p>
        <p class="body-text">Nous concevons et digitalisons des parcours adaptés aux usages des apprenants, aux contraintes du terrain et aux objectifs pédagogiques.</p>
        <p class="body-text">Notre intervention peut couvrir l'ensemble de la chaîne : architecture du parcours, scénarisation pédagogique, création de modules e-learning interactifs, microlearning, dispositifs blended, simulations et intégration sur les plateformes de formation.</p>
        <p class="body-text">Nous produisons notamment avec une panoplie d'outils (Articulate, Rise, Kumullus...) et développons des contenus compatibles avec les standards LMS tels que SCORM/HTML5. Nous pouvons également intégrer l'intelligence artificielle lorsqu'elle permet d'enrichir, personnaliser ou optimiser l'expérience d'apprentissage.</p>
        <span class="tools-note mono"><i data-lucide="wrench" aria-hidden="true"></i> Articulate · Rise · SCORM/HTML5</span><br>
        <a href="#contact" data-need="Formation de volumes importants" class="seg-cta">Digitaliser mon parcours</a>
      </div>
    </div>

    <div class="solution-detail reveal" id="pit-stop">
      <span class="num">03</span>
      <div>
        <span class="tag">Intervention ciblée</span>
        <h3><i data-lucide="gauge" class="inline-icon" aria-hidden="true"></i> Pit Stop Learning</h3>
        <p class="hook">Prendre du recul rapidement pour débloquer un enjeu Learning précis.</p>
        <p class="body-text">Le Pit Stop Learning est un format d'intervention court destiné aux organisations qui n'ont pas nécessairement besoin d'un projet de transformation complet, mais qui souhaitent clarifier une problématique et identifier rapidement les bonnes décisions à prendre.</p>
        <p class="body-text">Nous analysons le dispositif existant, les objectifs, les publics et les principaux points de friction lors d'un diagnostic ciblé et d'un atelier de cadrage avec les parties prenantes.</p>
        <p class="body-text">À l'issue du Pit Stop, l'organisation dispose d'une lecture claire de la situation, de priorités identifiées et d'un plan d'action concret pour avancer.</p>
        <a href="#contact" data-need="Pit Stop Learning" class="seg-cta">Faire un Pit Stop</a>
      </div>
    </div>

    <div class="solution-detail reveal" id="academies">
      <span class="num">04</span>
      <div>
        <span class="tag">Académies & parcours</span>
        <h3><i data-lucide="route" class="inline-icon" aria-hidden="true"></i> Académies & parcours</h3>
        <p class="hook">Transformer une succession de formations en un véritable parcours de développement.</p>
        <p class="body-text">Nous accompagnons les organisations dans la création ou la restructuration de leurs académies internes et de leurs parcours de développement.</p>
        <p class="body-text">Nous partons des compétences attendues et des différentes populations pour construire une architecture cohérente : niveaux de progression, séquençage des apprentissages, modalités pédagogiques, formats digitaux et présentiels, évaluations et accompagnement terrain.</p>
        <p class="body-text">Nous pouvons également structurer la gouvernance de l'académie, définir sa roadmap de déploiement et accompagner sa digitalisation afin de rendre l'offre plus lisible, accessible et évolutive.</p>
        <a href="#contact" data-need="Structurer une académie" class="seg-cta">Structurer mon académie</a>
      </div>
    </div>

    <div class="solution-detail reveal" id="assessment">
      <span class="num">05</span>
      <div>
        <span class="tag">Assessment & Positioning</span>
        <h3><i data-lucide="clipboard-check" class="inline-icon" aria-hidden="true"></i> Assessment & Positioning</h3>
        <p class="hook">Savoir où en sont les compétences avant de décider comment les développer.</p>
        <p class="body-text">Nous concevons des dispositifs de positionnement et d'assessment adaptés aux enjeux de formation, de recrutement, de mobilité ou de développement des compétences.</p>
        <p class="body-text">Nous commençons par définir précisément les compétences à évaluer et la manière dont elles seront mesurées. Nous construisons ensuite l'architecture du test, les niveaux de difficulté, la banque de questions ou de mises en situation ainsi que les règles de scoring.</p>
        <p class="body-text">Les résultats sont traduits en profils de positionnement et recommandations permettant d'identifier les écarts, d'orienter les parcours de formation ou d'aider à la prise de décision.</p>
        <a href="#contact" data-need="Assessment et positionnement" class="seg-cta">Concevoir mon assessment</a>
      </div>
    </div>

    <div class="solution-detail reveal" id="management">
      <span class="num">06</span>
      <div>
        <span class="tag">Management & Human Performance</span>
        <h3><i data-lucide="users-round" class="inline-icon" aria-hidden="true"></i> Management & Human Performance</h3>
        <p class="hook">Développer les compétences qui permettent aux équipes de mieux agir, décider et collaborer.</p>
        <p class="body-text">Nous concevons des parcours de développement adaptés aux enjeux des managers, des équipes et des fonctions RH : prise de posture managériale, leadership, communication, gestion des situations difficiles, intelligence émotionnelle et dynamiques collectives.</p>
        <p class="body-text">Selon les objectifs, les dispositifs peuvent combiner formation, ateliers expérientiels, coaching individuel ou collectif, mises en situation et accompagnement dans la durée.</p>
        <p class="body-text">Nous pouvons également intégrer des approches issues de la performance cognitive pour travailler notamment l'attention, la flexibilité cognitive, la mémoire de travail et la prise de décision dans les environnements professionnels exigeants.</p>
        <a href="#contact" data-need="Management et soft skills" class="seg-cta">Construire mon parcours</a>
      </div>
    </div>

  </div>
</section>

<!-- = LEARNING PERFORMANCE CHECK = -->
<section id="check">
  <div class="wrap">
    <div class="interactive-card reveal">
      <div>
        <h2>Un premier regard structuré sur la performance de votre dispositif Learning.</h2>
        <p>Répondez à une série courte de questions pour évaluer votre dispositif selon plusieurs dimensions clés : alignement avec les enjeux métier, qualité du design, apprentissage, transfert des acquis et pilotage. À l'issue du questionnaire, vos réponses sont analysées par Ward Wide Learning et donnent lieu à une restitution personnalisée.</p>
      </div>
      <a href="#contact" data-need="Learning Performance Check" class="btn-primary">Faire le Learning Performance Check <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
    </div>
  </div>
</section>

<section id="check-comment">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Comment ça se passe ?</span>
      <h2>Quatre étapes, du questionnaire à la restitution.</h2>
    </div>
    <div class="pit-lane">
      <div class="pit-track"></div>
      <div class="pillars">
        <div class="pillar reveal">
          <div class="pillar-marker">01</div>
          <span class="stage">Check</span>
          <h3>Vous réalisez le check en ligne</h3>
          <p>Un questionnaire court permet de recueillir une première lecture de votre dispositif.</p>
        </div>
        <div class="pillar reveal reveal-delay-1">
          <div class="pillar-marker">02</div>
          <span class="stage">Analyse</span>
          <h3>Nous analysons vos réponses</h3>
          <p>WWL interprète les résultats et identifie les principaux signaux à approfondir.</p>
        </div>
        <div class="pillar reveal reveal-delay-2">
          <div class="pillar-marker">03</div>
          <span class="stage">Restitution</span>
          <h3>Nous vous restituons les résultats</h3>
          <p>Un échange permet de partager les constats et d'identifier les premières priorités.</p>
        </div>
        <div class="pillar reveal reveal-delay-3">
          <div class="pillar-marker">04</div>
          <span class="stage">Approfondir</span>
          <h3>Si nécessaire, nous approfondissons</h3>
          <p>Entretiens, étude des dispositifs existants et, si pertinent, observation terrain.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="check-obtenez">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Ce que vous obtenez</span>
      <h2>À l'issue de la première restitution.</h2>
    </div>
    <div class="checklist-panel reveal">
      <div class="row"><span class="check-ic"><i data-lucide="check" aria-hidden="true"></i></span><span class="label">Une lecture structurée de votre dispositif</span></div>
      <div class="row"><span class="check-ic"><i data-lucide="check" aria-hidden="true"></i></span><span class="label">Vos principaux points forts</span></div>
      <div class="row"><span class="check-ic"><i data-lucide="check" aria-hidden="true"></i></span><span class="label">Les zones de vigilance identifiées</span></div>
      <div class="row"><span class="check-ic"><i data-lucide="check" aria-hidden="true"></i></span><span class="label">Les priorités à investiguer</span></div>
      <div class="row"><span class="check-ic"><i data-lucide="check" aria-hidden="true"></i></span><span class="label">Les premières recommandations WWL</span></div>
    </div>
  </div>
</section>

<section id="check-final">
  <div class="wrap">
    <div class="quote-block reveal">
      <p class="about-lead">Votre dispositif Learning est-il réellement performant ?</p>
      <p>En quelques minutes, évaluez les forces et les points de friction de votre dispositif de formation : alignement business, qualité du design, apprentissage, transfert terrain et pilotage de l'impact.</p>
      <a href="#contact" data-need="Learning Performance Check" class="btn-primary">Lancer le Performance Check <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
    </div>
  </div>
</section>

<!-- = CTA FINAL = -->
<section id="cta-final">
  <div class="wrap">
    <div class="final-cta reveal">
      <span class="kicker" style="justify-content:center;">Votre prochain Pit Stop commence ici</span>
      <h2>Parlez-nous de votre enjeu ou commencez par notre diagnostic offert.</h2>
      <p>Un échange court suffit souvent pour clarifier le point de départ.</p>
      <div class="btn-row">
        <a href="#contact" class="btn-primary">Planifier un échange <i data-lucide="calendar-arrow-up" aria-hidden="true"></i></a>
        <a href=" https://docs.google.com/forms/d/e/1FAIpQLSfsIlapJ1kpymakN-_97jUNkh-KPlCYq2RTb3LSutkts1JmIQ/viewform?usp=publish-editor" target="blank" class="btn-ghost">Faire le diagnostic offert <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- = CONTACT = -->
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

@endsection