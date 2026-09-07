@extends('layouts.main')
@section('title',"À propos — Ward Wide Learning | Learning that makes sense. Learning that moves.")
@section('description',"Chez Ward Wide Learning, la formation en entreprise est un moteur de transformation. Découvrez notre vision, notre ADN — Exigence, Expérience, Impact — et notre équipe.")
@section('style',"style/about.css")
@section('script',"scripts/about.js")


@section('content')



<!-- SECTION NAV INDICATOR -->
<nav class="section-nav" aria-label="Navigation des sections">
  <a href="#apropos-hero" data-label="À propos" aria-label="À propos"></a>
  <a href="#vision" data-label="Vision" aria-label="Notre vision"></a>
  <a href="#adn" data-label="ADN" aria-label="Notre ADN"></a>
  <a href="#equipe" data-label="Équipe" aria-label="Notre équipe"></a>
  <a href="#certifications" data-label="Certifs" aria-label="Certifications"></a>
  <a href="#contact" data-label="Contact" aria-label="Contact"></a>
</nav>

<!-- =========================
     HERO DE PAGE
========================= -->
<section class="page-hero" id="apropos-hero">
  <div class="wrap">
    <span class="kicker reveal">À propos</span>
    <h1 class="reveal reveal-delay-1">Learning that makes sense. Learning that moves.</h1>
    <p class="lead reveal reveal-delay-2">Chez Ward Wide Learning, nous croyons que la formation en entreprise est bien plus qu'un levier de compétences : c'est un moteur de transformation. Chaque dispositif est conçu pour faire sens, engager et produire des résultats visibles et mesurables.</p>
    <div class="btn-row reveal reveal-delay-3">
      <a href="#contact" class="btn-primary">Parler de votre enjeu Learning <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
      <a href="#adn" class="btn-ghost">Découvrir notre ADN <i data-lucide="arrow-down" aria-hidden="true"></i></a>
    </div>
  </div>
</section>

<!-- =========================
     VISION
========================= -->
<section id="vision">
  <div class="wrap about-wrap">
    <div class="reveal">
      <span class="kicker">Notre vision</span>
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

<!-- =========================
     NOTRE ADN
========================= -->
<section id="adn">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Notre ADN</span>
      <h2>Trois principes qui guident chaque dispositif.</h2>
    </div>
    <div class="adn-grid">
      <div class="adn-card reveal">
        <div class="adn-icon"><i data-lucide="badge-check" aria-hidden="true"></i></div>
        <span class="adn-num">01</span>
        <h3>EXIGENCE</h3>
        <p class="adn-tagline">Concevoir avec rigueur.</p>
        <p>Rigueur, précision et qualité dans chaque étape — de l'analyse du besoin à la mesure des résultats.</p>
      </div>
      <div class="adn-card reveal reveal-delay-1">
        <div class="adn-icon"><i data-lucide="user-round" aria-hidden="true"></i></div>
        <span class="adn-num">02</span>
        <h3>EXPÉRIENCE</h3>
        <p class="adn-tagline">Penser pour l'apprenant et son contexte réel.</p>
        <p>L'apprenant et son contexte réel au centre du design, pour des dispositifs utiles autant qu'engageants.</p>
      </div>
      <div class="adn-card reveal reveal-delay-2">
        <div class="adn-icon"><i data-lucide="chart-no-axes-combined" aria-hidden="true"></i></div>
        <span class="adn-num">03</span>
        <h3>IMPACT</h3>
        <p class="adn-tagline">Mesurer ce qui change vraiment.</p>
        <p>Mesurer, apprendre et améliorer en continu pour rendre visible la contribution réelle de la formation.</p>
      </div>
    </div>
  </div>
</section>

<!-- =========================
     ÉQUIPE
========================= -->
<section id="equipe">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Notre équipe</span>
      <h2>Des experts Learning, Digital et Impact.</h2>
      <p>Une équipe pluridisciplinaire réunissant designers pédagogiques, spécialistes du digital learning et experts en mesure d'impact.</p>
    </div>
    <div class="team-grid">
      <div class="team-card reveal">
        <div class="team-photo"><i data-lucide="user" aria-hidden="true"></i></div>
        <div class="team-body"><h4>À compléter</h4><span>Fonction</span></div>
      </div>
      <div class="team-card reveal reveal-delay-1">
        <div class="team-photo"><i data-lucide="user" aria-hidden="true"></i></div>
        <div class="team-body"><h4>À compléter</h4><span>Fonction</span></div>
      </div>
      <div class="team-card reveal reveal-delay-2">
        <div class="team-photo"><i data-lucide="user" aria-hidden="true"></i></div>
        <div class="team-body"><h4>À compléter</h4><span>Fonction</span></div>
      </div>
      <div class="team-card reveal reveal-delay-3">
        <div class="team-photo"><i data-lucide="user" aria-hidden="true"></i></div>
        <div class="team-body"><h4>À compléter</h4><span>Fonction</span></div>
      </div>
    </div>
    {{-- <p class="team-note mono reveal">// TODO WWL : remplacer par les photos, noms, fonctions et courtes bios de l'équipe.</p> --}}
  </div>
</section>

<!-- =========================
     CERTIFICATIONS
========================= -->
<section id="certifications">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Certifications & partenaires</span>
      <h2>Des méthodes reconnues, des outils éprouvés.</h2>
    </div>
    <div class="cert-row reveal">
      <span class="cert-badge"><i data-lucide="award" aria-hidden="true"></i> Certification Kirkpatrick</span>
      <span class="cert-badge"><i data-lucide="award" aria-hidden="true"></i> ITE - Institute for Transfer Effectiveness</span>
      <span class="cert-badge"><i data-lucide="award" aria-hidden="true"></i> Méthode Pit Stop propriétaire</span>
      {{-- <span class="cert-badge"><i data-lucide="award" aria-hidden="true"></i> Partenaire outil à compléter</span> --}}
    </div>
    {{-- <p class="team-note mono reveal reveal-delay-1">// TODO WWL : lister les certifications, accréditations et partenariats outils (Articulate, Rise, LMS/LXP...) à afficher.</p> --}}
  </div>
</section>

<!-- =========================
     CTA FINAL
========================= -->
<section id="cta-final">
  <div class="wrap">
    <div class="final-cta reveal">
      <span class="kicker" style="justify-content:center;">Votre prochain Pit Stop commence ici</span>
      <h2>Parlez-nous de votre enjeu ou commencez par notre diagnostic offert.</h2>
      <p>Un échange court suffit souvent pour clarifier le point de départ.</p>
      <div class="btn-row">
        <a href="#contact" class="btn-primary">Planifier un échange <i data-lucide="calendar-arrow-up" aria-hidden="true"></i></a>
        <a href="#contact" class="btn-ghost">Faire le diagnostic offert <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- =========================
     CONTACT
========================= -->
<section id="contact">
  <div class="wrap">
    <div class="contact-card reveal">
      <div>
        <span class="kicker">Parlons de votre enjeu Learning</span>
        <h2>Planifiez un échange stratégique</h2>
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


{{-- <script src="{{ asset('script.js') }}"></script> --}}
<script src="https://unpkg.com/lucide@latest"></script>

<script>
  if (window.lucide) lucide.createIcons();
</script>
</body>
</html>
@endsection