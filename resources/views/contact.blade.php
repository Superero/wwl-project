@extends('layouts.main')
@section('title',"Contact — Ward Wide Learning | Parlons de votre enjeu Learning")
@section('description',"Planifiez un échange stratégique avec Ward Wide Learning. Réponse sous 24 à 48h ouvrées, sans engagement.")
@section('style',"style/contact.css")
@section('script',"scripts/contact.js")

@section('content')

<!-- SECTION NAV INDICATOR -->
<nav class="section-nav" aria-label="Navigation des sections">
  <a href="#contact-hero" data-label="Contact" aria-label="Contact"></a>
  <a href="#contact-form" data-label="Formulaire" aria-label="Formulaire de contact"></a>
  <a href="#comment" data-label="Étapes" aria-label="Comment ça se passe"></a>
  <a href="#canaux" data-label="Canaux" aria-label="Autres canaux"></a>
  <a href="#faq" data-label="FAQ" aria-label="Questions fréquentes"></a>
</nav>

<!-- = HERO DE PAGE = -->
<section class="page-hero" id="contact-hero">
  <div class="wrap">
    <span class="kicker reveal">Contact</span>
    <h1 class="reveal reveal-delay-1">Parlons de votre enjeu Learning.</h1>
    <p class="lead reveal reveal-delay-2">Un échange court suffit souvent pour clarifier le point de départ. Remplissez le formulaire ci-dessous ou joignez-nous directement par téléphone, email ou WhatsApp.</p>
    <div class="hero-microcopy reveal reveal-delay-3">
      <span>Réponse sous 24 à 48h ouvrées</span>
      <span>Sans engagement</span>
      <span>Échange avec un expert WWL</span>
    </div>
  </div>
</section>

<!-- = FORMULAIRE + COORDONNÉES = -->
<section id="contact-form">
  <div class="wrap">
    <div class="contact-card reveal">
      <div>
        <h2>Parlons de votre enjeu</h2>
        <p>Un échange court suffit souvent pour clarifier le point de départ. Remplissez ce formulaire pour être recontacté par un expert Ward Wide Learning.</p>
        <div class="contact-coords">
          <strong>Ward Wide Learning</strong><br>
          Oasis Latitude Offices, Angle Route de l'Oasis, Allée Imam Mouslim, Casablanca<br>
          <a href="tel:+212679857317">+212 6 79 85 73 17</a> · <a href="mailto:h.ward@wardwidelearning.com">h.ward@wardwidelearning.com</a>
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

<!-- = COMMENT ÇA SE PASSE = -->
<section id="comment">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Comment ça se passe ?</span>
      <h2>Trois étapes, du formulaire à l'échange.</h2>
    </div>
    <div class="pit-lane">
      <div class="pit-track"></div>
      <div class="pillars-3">
        <div class="pillar reveal">
          <div class="pillar-marker">01</div>
          <span class="stage">Envoi</span>
          <h3><i data-lucide="send" class="inline-icon" aria-hidden="true"></i> Vous envoyez votre demande</h3>
          <p>Un formulaire court : vos coordonnées, votre fonction et votre enjeu principal.</p>
        </div>
        <div class="pillar reveal reveal-delay-1">
          <div class="pillar-marker">02</div>
          <span class="stage">Prise de contact</span>
          <h3><i data-lucide="phone-call" class="inline-icon" aria-hidden="true"></i> Un expert vous recontacte</h3>
          <p>Réponse sous 24 à 48h ouvrées, par téléphone, email ou WhatsApp selon votre préférence.</p>
        </div>
        <div class="pillar reveal reveal-delay-2">
          <div class="pillar-marker">03</div>
          <span class="stage">Échange</span>
          <h3><i data-lucide="handshake" class="inline-icon" aria-hidden="true"></i> Échange stratégique</h3>
          <p>Un échange court pour clarifier le point de départ et identifier les prochaines étapes.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- = AUTRES CANAUX = -->
<section id="canaux">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Autres façons de nous joindre</span>
      <h2>Choisissez le canal qui vous convient.</h2>
    </div>
    <div class="channels-grid">
      <div class="channel-card reveal">
        <div class="channel-icon"><i data-lucide="phone" aria-hidden="true"></i></div>
        <h3>Téléphone</h3>
        <p>Pour un contact direct et rapide avec notre équipe.</p>
        <a href="tel:+212679857317" class="channel-link">+212 6 79 85 73 17</a>
      </div>
      <div class="channel-card reveal reveal-delay-1">
        <div class="channel-icon"><i data-lucide="mail" aria-hidden="true"></i></div>
        <h3>Email</h3>
        <p>Pour détailler votre contexte ou joindre des documents.</p>
        <a href="mailto:h.ward@wardwidelearning.com" class="channel-link">h.ward@wardwidelearning.com</a>
      </div>
      <div class="channel-card reveal reveal-delay-2">
        <div class="channel-icon"><i data-lucide="message-circle" aria-hidden="true"></i></div>
        <h3>WhatsApp</h3>
        <p>Pour une question rapide, sans passer par le formulaire.</p>
        <a href="https://wa.me/212679857317?text=Bonjour%20Ward%20Wide%20Learning%2C%20je%20souhaite%20des%20informations." target="_blank" rel="noopener" class="channel-link">Démarrer la discussion</a>
      </div>
    </div>
  </div>
</section>

<!-- = FAQ = -->
<section id="faq">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Questions fréquentes</span>
      <h2>Avant de nous écrire.</h2>
    </div>
    <div class="faq-list reveal">
      <div class="faq-item">
        <button class="faq-q" type="button">Le diagnostic est-il vraiment offert ?<span class="faq-icon"><i data-lucide="plus" aria-hidden="true"></i></span></button>
        <div class="faq-a"><p>Oui. Le premier échange et le Learning Performance Check n'engagent à rien : ils servent à clarifier votre point de départ avant toute proposition.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-q" type="button">Sous combien de temps une réponse ?<span class="faq-icon"><i data-lucide="plus" aria-hidden="true"></i></span></button>
        <div class="faq-a"><p>Nous répondons sous 24 à 48h ouvrées après réception de votre demande, par le canal que vous préférez.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-q" type="button">Que dois-je préparer avant l'échange ?<span class="faq-icon"><i data-lucide="plus" aria-hidden="true"></i></span></button>
        <div class="faq-a"><p>Rien d'obligatoire. Un mot sur votre contexte et votre enjeu principal suffit ; nous posons les bonnes questions pendant l'échange.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-q" type="button">Travaillez-vous avec des entreprises de toutes tailles ?<span class="faq-icon"><i data-lucide="plus" aria-hidden="true"></i></span></button>
        <div class="faq-a"><p>Nous adaptons nos solutions au niveau de maturité et aux moyens de chaque organisation, du Pit Stop ciblé à l'accompagnement d'une académie complète.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- = CTA FINAL = -->
<section id="cta-final">
  <div class="wrap">
    <div class="final-cta reveal">
      <span class="kicker" style="justify-content:center;">Votre prochain Pit Stop commence ici</span>
      <h2>Prêt à clarifier votre enjeu Learning ?</h2>
      <p>Un échange court suffit souvent pour clarifier le point de départ.</p>
      <div class="btn-row">
        <a href="#contact-form" class="btn-primary">Remplir le formulaire <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
        <a href="https://wa.me/212679857317" target="_blank" rel="noopener" class="btn-ghost">Nous écrire sur WhatsApp <i data-lucide="message-circle" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</section>


@endsection