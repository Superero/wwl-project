<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ward Wide Learning — Formation d'entreprise, pilotée par la donnée</title>
<link rel="shortcut icon" href="logo-lockup.svg" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
{{-- <style>
  :root{
    --bg:#080b14;
    --bg-alt:#0e1424;
    --panel:#11182b;
    --panel-2:#141d34;
    --line:rgba(148,168,204,0.14);
    --cyan:#4ce0d2;
    --violet:#8b7cf6;
    --amber:#ffb454;
    --text:#e9f0f5;
    --text-dim:#8a97ac;
    --radius:14px;
  }
  /* LIGHT MODE */
  html[data-theme="light"]{
    --bg:#f6f8fb;
    --bg-alt:#eef2f9;
    --panel:#ffffff;
    --panel-2:#f3f6fc;
    --line:rgba(15,20,40,0.12);
    --cyan:#0f9a91;
    --violet:#3851ab;
    --amber:#dd8a00;
    --text:#0e1220;
    --text-dim:#586082;
  }
  html[data-theme="light"] body{background:var(--bg);}
  html[data-theme="light"] .grid-bg{opacity:0.16;}
  html[data-theme="light"] .glow-1{opacity:0.55;}
  html[data-theme="light"] .glow-2{opacity:0.55;}
  html[data-theme="light"] header{background:rgba(246,248,251,0.8);}
  html[data-theme="light"] .btn-primary{color:#ffffff;}
  html[data-theme="light"] .nav-cta:hover{color:#ffffff;}
  html[data-theme="light"] .problem-card::before{color:rgba(14,18,32,0.05);}
  html[data-theme="light"] .hud-core{box-shadow:inset 0 0 40px rgba(15,154,145,0.10), 0 0 50px rgba(15,154,145,0.12);}
  html[data-theme="light"] .success-msg{color:#0c7f78;}
  html[data-theme="light"] ::selection{background:rgba(15,154,145,0.22);}

  *{box-sizing:border-box;margin:0;padding:0;}
  html{scroll-behavior:smooth;}
  body{
    background:var(--bg);
    color:var(--text);
    font-family:'Inter',sans-serif;
    line-height:1.6;
    overflow-x:hidden;
    transition:background 0.3s ease, color 0.3s ease;
  }
  @media (prefers-reduced-motion: reduce){
    *{animation-duration:0.01ms !important; animation-iteration-count:1 !important; transition-duration:0.01ms !important;}
  }
  h1,h2,h3{font-family:'Space Grotesk',sans-serif; letter-spacing:-0.01em;}
  .mono{font-family:'IBM Plex Mono',monospace;}
  a{color:inherit;}
  .wrap{max-width:1180px;margin:0 auto;padding:0 32px;}
  section{position:relative;padding:110px 0;}

  /* ambient grid backdrop */
  .grid-bg{
    position:fixed;inset:0;z-index:0;pointer-events:none;
    background-image:
      linear-gradient(var(--line) 1px, transparent 1px),
      linear-gradient(90deg, var(--line) 1px, transparent 1px);
    background-size:64px 64px;
    opacity:0.35;
    mask-image:radial-gradient(ellipse 90% 60% at 50% 0%, black 40%, transparent 90%);
  }
  .glow{
    position:fixed;z-index:0;pointer-events:none;border-radius:50%;filter:blur(120px);
  }
  .glow-1{width:600px;height:600px;background:radial-gradient(circle, rgba(76,224,210,0.16), transparent 70%);top:-200px;left:-150px;}
  .glow-2{width:700px;height:700px;background:radial-gradient(circle, rgba(139,124,246,0.14), transparent 70%);top:20%;right:-250px;}

  /* NAV */
  header{
    position:sticky;top:0;z-index:50;
    background:rgba(8,11,20,0.72);
    backdrop-filter:blur(14px);
    border-bottom:1px solid var(--line);
  }
  nav{display:flex;align-items:center;justify-content:space-between;padding:18px 32px;max-width:1180px;margin:0 auto;}
  .brand{display:flex;align-items:center;gap:10px;font-family:'Space Grotesk';font-weight:600;font-size:16px;letter-spacing:0.02em;}
  .brand-mark{width:50px;height:50px;border-radius:30px;background:var(--cyan);box-shadow:0 0 12px var(--cyan);animation:pulse 2.4s ease-in-out infinite;}
  @keyframes pulse{0%,100%{opacity:1;}50%{opacity:0.4;}}
  .nav-links{display:flex;gap:28px;font-size:14px;color:var(--text-dim);}
  .nav-links a{transition:color 0.2s;}
  .nav-links a:hover{color:var(--cyan);}
  .nav-cta{
    font-family:'IBM Plex Mono';font-size:13px;padding:9px 18px;border-radius:8px;
    border:1px solid var(--cyan);color:var(--cyan);white-space:nowrap;transition:all 0.2s;
  }
  .nav-cta:hover{background:var(--cyan);color:#04140f;}
  @media(max-width:780px){.nav-links{display:none;}}

  /* HERO */
  .hero{padding:90px 0 60px;}
  .hero-grid{display:grid;grid-template-columns:1.1fr 0.9fr;gap:60px;align-items:center;}
  @media(max-width:900px){.hero-grid{grid-template-columns:1fr;}}
  .eyebrow{
    display:inline-flex;align-items:center;gap:8px;
    font-family:'IBM Plex Mono';font-size:12px;letter-spacing:0.08em;text-transform:uppercase;
    color:var(--cyan);border:1px solid rgba(76,224,210,0.35);background:rgba(76,224,210,0.06);
    padding:6px 14px;border-radius:999px;margin-bottom:26px;
  }
  .eyebrow::before{content:'';width:6px;height:6px;border-radius:50%;background:var(--amber);box-shadow:0 0 8px var(--amber);}
  .hero h1{font-size:clamp(34px,4.6vw,58px);font-weight:600;line-height:1.08;margin-bottom:24px;}
  .hero h1 em{font-style:normal;color:var(--cyan);}
  .hero p.lead{font-size:17px;color:var(--text-dim);max-width:520px;margin-bottom:34px;}
  .btn-row{display:flex;gap:16px;flex-wrap:wrap;}
  .btn-primary{
    font-family:'IBM Plex Mono';font-size:14px;font-weight:500;
    background:var(--cyan);color:#04140f;padding:14px 26px;border-radius:9px;border:none;cursor:pointer;
    box-shadow:0 0 0 rgba(76,224,210,0.4);transition:box-shadow 0.25s, transform 0.2s;
    display:inline-flex;align-items:center;gap:8px;
  }
  .btn-primary:hover{box-shadow:0 0 26px rgba(76,224,210,0.45);transform:translateY(-1px);}
  .btn-ghost{
    font-family:'IBM Plex Mono';font-size:14px;padding:14px 22px;border-radius:9px;
    border:1px solid var(--line);color:var(--text-dim);transition:all 0.2s;
  }
  .btn-ghost:hover{border-color:var(--text-dim);color:var(--text);}

  /* HUD signature */
  .hud{position:relative;width:100%;max-width:420px;aspect-ratio:1;margin:0 auto;}
  .hud-ring{position:absolute;inset:0;border-radius:50%;border:1px solid var(--line);}
  .hud-ring.r2{inset:34px;border-color:rgba(139,124,246,0.25);animation:spin 40s linear infinite;}
  .hud-ring.r3{inset:68px;border:1px dashed rgba(76,224,210,0.25);animation:spin 60s linear infinite reverse;}
  @keyframes spin{to{transform:rotate(360deg);}}
  .hud-core{
    position:absolute;inset:100px;border-radius:50%;
    background:radial-gradient(circle at 35% 30%, var(--panel-2), var(--bg-alt));
    border:1px solid var(--line);
    display:flex;flex-direction:column;align-items:center;justify-content:center;
    box-shadow:inset 0 0 40px rgba(76,224,210,0.08), 0 0 60px rgba(76,224,210,0.08);
  }
  .hud-core .num{font-family:'Space Grotesk';font-size:40px;font-weight:700;color:var(--cyan);}
  .hud-core .lbl{font-family:'IBM Plex Mono';font-size:11px;color:var(--text-dim);letter-spacing:0.05em;margin-top:4px;}
  .hud-dot{position:absolute;width:9px;height:9px;border-radius:50%;background:var(--amber);box-shadow:0 0 10px var(--amber);}
  .hud-dot.d1{top:8px;left:calc(50% - 4px);}
  .hud-dot.d2{bottom:34px;right:22px;background:var(--violet);box-shadow:0 0 10px var(--violet);}
  .hud-readout{
    position:absolute;font-family:'IBM Plex Mono';font-size:11px;color:var(--text-dim);
    background:rgba(8,11,20,0.8);border:1px solid var(--line);padding:6px 10px;border-radius:7px;
  }
  .hud-readout.top{top:-6px;right:-10px;}
  .hud-readout.bottom{bottom:-6px;left:-10px;}
  .hud-readout .v{color:var(--cyan);font-weight:500;}

  /* SECTION HEADERS */
  .section-head{max-width:640px;margin-bottom:56px;}
  .section-head .eyebrow{margin-bottom:18px;}
  .section-head h2{font-size:clamp(26px,3.2vw,38px);font-weight:600;}
  .section-head p{color:var(--text-dim);margin-top:14px;font-size:16px;}

  /* PROBLEM */
  .problem-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;}
  @media(max-width:860px){.problem-grid{grid-template-columns:1fr;}}
  .problem-card{
    background:var(--panel);border:1px solid var(--line);border-radius:var(--radius);
    padding:30px 26px;position:relative;overflow:hidden;
  }
  .problem-card::before{
    content:attr(data-idx);position:absolute;top:-6px;right:12px;
    font-family:'Space Grotesk';font-size:70px;font-weight:700;color:rgba(255,255,255,0.03);
  }
  .problem-card .tag{font-family:'IBM Plex Mono';font-size:11px;color:var(--amber);letter-spacing:0.06em;text-transform:uppercase;}
  .problem-card h3{font-size:19px;margin:12px 0 10px;font-weight:600;}
  .problem-card p{color:var(--text-dim);font-size:14.5px;}

  /* SEGMENTS */
  .seg-tabs{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:30px;}
  .seg-tab{
    font-family:'IBM Plex Mono';font-size:13px;padding:10px 16px;border-radius:8px;
    border:1px solid var(--line);color:var(--text-dim);cursor:pointer;background:transparent;transition:all 0.2s;
  }
  .seg-tab.active{border-color:var(--cyan);color:var(--cyan);background:rgba(76,224,210,0.07);}
  .seg-panel{
    display:none;background:var(--panel);border:1px solid var(--line);border-radius:var(--radius);
    padding:38px;grid-template-columns:auto 1fr auto;gap:28px;align-items:center;
  }
  .seg-panel.active{display:grid;}
  @media(max-width:720px){.seg-panel{grid-template-columns:1fr;text-align:left;}}
  .seg-icon{
    width:54px;height:54px;border-radius:12px;background:var(--bg-alt);border:1px solid var(--line);
    display:flex;align-items:center;justify-content:center;font-family:'Space Grotesk';font-weight:700;color:var(--cyan);font-size:18px;
  }
  .seg-panel h3{font-size:21px;margin-bottom:8px;font-weight:600;}
  .seg-panel p{color:var(--text-dim);font-size:15px;}
  .seg-cta{font-family:'IBM Plex Mono';font-size:13px;color:var(--cyan);border:1px solid rgba(76,224,210,0.35);padding:10px 18px;border-radius:8px;white-space:nowrap;}

  /* PILLARS */
  .pit-lane{position:relative;padding-top:10px;}
  .pit-track{position:absolute;top:38px;left:6%;right:6%;height:1px;background:var(--line);}
  .pillars{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;position:relative;}
  @media(max-width:860px){.pillars{grid-template-columns:1fr;}.pit-track{display:none;}}
  .pillar{background:var(--panel);border:1px solid var(--line);border-radius:var(--radius);padding:34px 26px;}
  .pillar-marker{
    width:34px;height:34px;border-radius:50%;background:var(--bg-alt);border:1px solid var(--cyan);
    display:flex;align-items:center;justify-content:center;font-family:'IBM Plex Mono';font-size:13px;color:var(--cyan);
    margin-bottom:22px;box-shadow:0 0 14px rgba(76,224,210,0.25);
  }
  .pillar .stage{font-family:'IBM Plex Mono';font-size:11px;color:var(--violet);text-transform:uppercase;letter-spacing:0.08em;}
  .pillar h3{font-size:19px;margin:10px 0;font-weight:600;}
  .pillar p{color:var(--text-dim);font-size:14.5px;}

  /* ABOUT */
  .about-wrap{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;}
  @media(max-width:860px){.about-wrap{grid-template-columns:1fr;}}
  .about-wrap p{color:var(--text-dim);font-size:15.5px;margin-bottom:20px;}
  .badge-row{display:flex;gap:14px;flex-wrap:wrap;}
  .badge{
    font-family:'IBM Plex Mono';font-size:12.5px;border:1px solid var(--line);border-radius:9px;
    padding:12px 16px;color:var(--text-dim);background:var(--panel);
  }
  .badge .v{display:block;color:var(--cyan);font-size:15px;font-weight:500;margin-bottom:3px;}
  .about-panel{
    background:var(--panel);border:1px solid var(--line);border-radius:var(--radius);padding:34px;
    font-family:'IBM Plex Mono';font-size:13px;color:var(--text-dim);
  }
  .about-panel .row{display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--line);}
  .about-panel .row:last-child{border-bottom:none;}
  .about-panel .row .v{color:var(--cyan);}

  /* CONTACT */
  #contact{padding-bottom:140px;}
  .contact-card{
    background:linear-gradient(160deg, var(--panel), var(--bg-alt));
    border:1px solid var(--line);border-radius:20px;padding:56px;
    display:grid;grid-template-columns:1fr 1fr;gap:50px;
  }
  @media(max-width:860px){.contact-card{grid-template-columns:1fr;padding:34px;}}
  .contact-card h2{font-size:clamp(24px,3vw,32px);margin-bottom:16px;font-weight:600;}
  .contact-card > div:first-child p{color:var(--text-dim);font-size:15px;margin-bottom:24px;}
  .mini-stats{display:flex;gap:22px;flex-wrap:wrap;}
  .mini-stats div{font-family:'IBM Plex Mono';font-size:12px;color:var(--text-dim);}
  .mini-stats .n{display:block;color:var(--amber);font-size:20px;font-family:'Space Grotesk';font-weight:700;}
  form{display:flex;flex-direction:column;gap:14px;}
  .field label{font-family:'IBM Plex Mono';font-size:11px;color:var(--text-dim);text-transform:uppercase;letter-spacing:0.05em;display:block;margin-bottom:6px;}
  .field input, .field select{
    width:100%;background:var(--bg-alt);border:1px solid var(--line);border-radius:8px;
    padding:12px 14px;color:var(--text);font-family:'Inter';font-size:14px;outline:none;transition:border-color 0.2s;
  }
  .field input:focus, .field select:focus{border-color:var(--cyan);}
  .field select{appearance:none;cursor:pointer;}
  form .btn-primary{margin-top:6px;justify-content:center;}
  .form-note{font-family:'IBM Plex Mono';font-size:11.5px;color:var(--text-dim);margin-top:4px;}
  .success-msg{
    display:none;text-align:center;padding:30px 10px;font-family:'IBM Plex Mono';font-size:14px;color:var(--cyan);
  }

  footer{border-top:1px solid var(--line);padding:44px 0;}
  .footer-wrap{display:flex;justify-content:space-between;flex-wrap:wrap;gap:20px;font-size:13px;color:var(--text-dim);}
  .footer-wrap .brand{font-size:14px;}
  .legal{font-size:11.5px;color:#5a6478;max-width:1180px;margin:22px auto 0;padding:0 32px;line-height:1.6;}

  .reveal{opacity:0;transform:translateY(18px);transition:opacity 0.6s ease, transform 0.6s ease;}
  .reveal.in{opacity:1;transform:translateY(0);}

  /* THEME TOGGLE */
  .nav-actions{display:flex;align-items:center;gap:14px;}
  .theme-toggle{
    width:38px;height:38px;border-radius:50%;flex:0 0 auto;
    display:flex;align-items:center;justify-content:center;
    border:1px solid var(--line);background:var(--panel);color:var(--cyan);
    cursor:pointer;transition:border-color 0.2s, transform 0.2s;
  }
  .theme-toggle:hover{border-color:var(--cyan);transform:translateY(-1px);}
  .theme-toggle svg{width:17px;height:17px;}

  /* WHATSAPP WIDGET */
  .wa-fab{
    position:fixed;bottom:26px;right:26px;z-index:70;
    width:60px;height:60px;border-radius:50%;border:none;cursor:pointer;
    background:linear-gradient(160deg,#2be08a,#0f9a91);
    display:flex;align-items:center;justify-content:center;
    box-shadow:0 8px 26px rgba(15,154,145,0.4);
    transition:transform 0.2s;
    animation:wa-pulse 2.8s ease-in-out infinite;
  }
  .wa-fab:hover{transform:translateY(-3px) scale(1.05);}
  .wa-fab svg{width:29px;height:29px;fill:#04140f;}
  @keyframes wa-pulse{
    0%,100%{box-shadow:0 8px 26px rgba(15,154,145,0.4), 0 0 0 0 rgba(43,224,138,0.35);}
    50%{box-shadow:0 8px 26px rgba(15,154,145,0.4), 0 0 0 14px rgba(43,224,138,0);}
  }
  .wa-badge{
    position:absolute;top:-3px;right:-3px;width:15px;height:15px;border-radius:50%;
    background:var(--amber);border:2px solid var(--bg);
  }
  .wa-panel{
    position:fixed;bottom:100px;right:26px;z-index:70;width:320px;max-width:calc(100vw - 36px);
    background:var(--panel);border:1px solid var(--line);border-radius:16px;overflow:hidden;
    box-shadow:0 24px 60px rgba(0,0,0,0.4);
    opacity:0;transform:translateY(14px) scale(0.97);pointer-events:none;
    transition:opacity 0.22s ease, transform 0.22s ease;
  }
  .wa-panel.open{opacity:1;transform:translateY(0) scale(1);pointer-events:auto;}
  .wa-panel-head{
    position:relative;display:flex;align-items:center;gap:12px;padding:16px 40px 16px 18px;
    background:linear-gradient(135deg,#2be08a,#0f9a91);color:#04140f;
  }
  .wa-avatar{
    width:38px;height:38px;border-radius:50%;flex:0 0 auto;
    background:rgba(4,20,15,0.14);display:flex;align-items:center;justify-content:center;
  }
  .wa-avatar svg{width:20px;height:20px;fill:#04140f;}
  .wa-panel-head h4{font-family:'Space Grotesk';font-size:14px;font-weight:600;}
  .wa-panel-head .status{font-family:'IBM Plex Mono';font-size:11px;display:flex;align-items:center;gap:5px;opacity:0.85;margin-top:2px;}
  .wa-panel-head .status::before{content:'';width:7px;height:7px;border-radius:50%;background:#04140f;opacity:0.55;}
  .wa-close{
    position:absolute;top:10px;right:10px;width:26px;height:26px;border:none;background:none;
    color:#04140f;opacity:0.75;cursor:pointer;font-size:15px;line-height:1;
  }
  .wa-panel-body{padding:18px;background:var(--bg-alt);}
  .wa-bubble{
    background:var(--panel);border:1px solid var(--line);border-radius:12px 12px 12px 3px;
    padding:12px 14px;font-size:13.5px;color:var(--text);margin-bottom:16px;line-height:1.5;
  }
  .wa-cta{
    display:flex;align-items:center;justify-content:center;gap:8px;width:100%;
    background:linear-gradient(135deg,#2be08a,#0f9a91);color:#04140f;
    font-family:'IBM Plex Mono';font-size:13.5px;font-weight:500;
    padding:12px 16px;border-radius:9px;text-decoration:none;transition:filter 0.2s;
  }
  .wa-cta:hover{filter:brightness(1.08);}
  .wa-cta svg{width:16px;height:16px;fill:#04140f;}
  @media(max-width:480px){
    .wa-fab{right:16px;bottom:16px;}
    .wa-panel{right:14px;bottom:90px;}
  }
</style> --}}
<link rel="stylesheet" href="style.css">

</head>
<body>

{{-- POPUP SUCCÈS Affichée uniquement après une soumission réussie --}}
@if (session('success'))
    <div class="success-modal" id="successModal" role="dialog" aria-modal="true" aria-labelledby="successTitle">
        <div class="success-modal-backdrop"></div>
        <div class="success-modal-card">
            {{-- Bouton fermeture --}}
            <button type="button" class="success-modal-close" id="successModalClose" aria-label="Fermer">
                ×
            </button>
            {{-- Icône succès --}}
            <div class="success-icon-wrapper">
                <div class="success-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M5 12.5L9.5 17L19 7"/>
                    </svg>
                </div>
            </div>

            {{-- Contenu --}}
            <div class="success-modal-content">
                <span class="success-modal-label">
                    TRANSMISSION CONFIRMÉE
                </span>
                <h2 id="successTitle">
                    Demande envoyée
                </h2>
                <p>
                    {{ session('success') }}
                </p>
                <div class="success-modal-status">
                    <span class="status-dot"></span>
                    Votre demande est bien enregistrée
                </div>
                <button type="button" class="success-modal-button" id="successModalContinue">
                    Parfait, merci →
                </button>
            </div>
        </div>
    </div>
@endif

<div class="grid-bg"></div>
<div class="glow glow-1"></div>
<div class="glow glow-2"></div>

<header>
  <nav>
    <div class="brand">
      <span class="">
      <img class="brand-mark" src="./logo-lockup.svg" alt="" srcset="">
    </span>Ward Wide Learning</div>
    <div class="nav-links">
      <a href="#constat">Le constat</a>
      <a href="#enjeux">Votre enjeu</a>
      <a href="#solution">Solution</a>
      <a href="#apropos">À propos</a>
    </div>
    <div class="nav-actions">
      <button class="theme-toggle" id="themeToggle" type="button" aria-label="Activer le mode clair"></button>
      <a href="#contact" class="nav-cta">Diagnostic offert</a>
    </div>
  </nav>
</header>

<section class="hero">
  <div class="wrap hero-grid">
    <div>
      <span class="eyebrow">Diagnostic offert · Partenaire digital</span>
      <h1>Faites de la formation un levier de performance, <em>mesurable et sans répétition</em>.</h1>
      <p class="lead">Que vous cherchiez à automatiser l'accueil de vos équipes terrain ou à prouver le ROI de vos budgets formation auprès du COMEX, nous concevons des dispositifs digitaux et d'évaluation sur-mesure.</p>
      <div class="btn-row">
        <a href="#contact" class="btn-primary">Demander une consultation →</a>
        <a href="#solution" class="btn-ghost">Voir la méthode</a>
      </div>
    </div>
    <div class="hud">
      <div class="hud-ring"></div>
      <div class="hud-ring r2"></div>
      <div class="hud-ring r3"></div>
      <div class="hud-dot d1"></div>
      <div class="hud-dot d2"></div>
      <div class="hud-core">
        <span class="num" id="roiCounter">0%</span>
        <span class="lbl">ROI FORMATION</span>
      </div>
      <div class="hud-readout top">TEMPS ÉCONOMISÉ <span class="v">-60%</span></div>
      <div class="hud-readout bottom">CONFORMITÉ <span class="v">100%</span></div>
    </div>
  </div>
</section>

<section id="constat">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">Le constat</span>
      <h2>Le problème universel des formations en entreprise</h2>
    </div>
    <div class="problem-grid">
      <div class="problem-card reveal" data-idx="01">
        <span class="tag">Coût</span>
        <h3>Des coûts répétitifs</h3>
        <p>Mobiliser vos experts et vos managers pour réexpliquer en boucle les mêmes bases brûle du temps et du budget.</p>
      </div>
      <div class="problem-card reveal" data-idx="02">
        <span class="tag">Conformité</span>
        <h3>Une traçabilité complexe</h3>
        <p>Préparer vos audits ou suivre l'assimilation réelle des procédures reste un casse-tête opérationnel.</p>
      </div>
      <div class="problem-card reveal" data-idx="03">
        <span class="tag">Impact</span>
        <h3>Un ROI invisible</h3>
        <p>Mesurer la satisfaction « à chaud » ne garantit aucun changement de comportement durable sur le terrain.</p>
      </div>
    </div>
  </div>
</section>

<section id="enjeux">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">C'est vous ?</span>
      <h2>Quel est votre enjeu prioritaire ?</h2>
      <p>Sélectionnez votre situation — la solution qui correspond s'affiche instantanément.</p>
    </div>
    <div class="seg-tabs reveal" id="segTabs">
      <button class="seg-tab active" data-target="seg1">Centres d'appels</button>
      <button class="seg-tab" data-target="seg2">Intégration & formations de masse</button>
      <button class="seg-tab" data-target="seg3">Industrie & QHSE</button>
      <button class="seg-tab" data-target="seg4">Directions RH & L&D</button>
      <button class="seg-tab" data-target="seg5">Direction générale & COMEX</button>
    </div>

    <div class="seg-panel active" id="seg1">
      <div class="seg-icon">01</div>
      <div>
        <h3>Centres d'appels</h3>
        <p>Préparation linguistique, culturelle et comportementale des agents avant la première mise en production.</p>
      </div>
      <a href="#contact" data-role="Directeur de centre d'appels" data-need="Onboarding de nouvelles recrues" class="seg-cta">Voir la solution →</a>
    </div>
    <div class="seg-panel" id="seg2">
      <div class="seg-icon">02</div>
      <div>
        <h3>Intégration & formations de masse</h3>
        <p>Digitalisation des parcours récurrents pour former des volumes importants sans mobiliser vos experts internes.</p>
      </div>
      <a href="#contact" data-role="Responsable formation / L&D" data-need="Formation de volumes importants" class="seg-cta">Voir la solution →</a>
    </div>
    <div class="seg-panel" id="seg3">
      <div class="seg-icon">03</div>
      <div>
        <h3>Industrie & QHSE</h3>
        <p>Validation 100 % conforme des consignes de sécurité et de qualité, avec traçabilité complète pour vos audits.</p>
      </div>
      <a href="#contact" data-role="Responsable QHSE" data-need="Conformité et traçabilité QHSE" class="seg-cta">Voir la solution →</a>
    </div>
    <div class="seg-panel" id="seg4">
      <div class="seg-icon">04</div>
      <div>
        <h3>Directions RH & L&D</h3>
        <p>Passage d'un reporting de présence à une démonstration d'impact réel basée sur le modèle Kirkpatrick.</p>
      </div>
      <a href="#contact" data-role="Responsable formation / L&D" data-need="Mesure du ROI formation" class="seg-cta">Voir la solution →</a>
    </div>
    <div class="seg-panel" id="seg5">
      <div class="seg-icon">05</div>
      <div>
        <h3>Direction générale & COMEX</h3>
        <p>Pilotage du budget formation par la donnée de performance et un retour sur investissement démontré.</p>
      </div>
      <a href="#contact" data-role="Direction générale / COMEX" data-need="Mesure du ROI formation" class="seg-cta">Voir la solution →</a>
    </div>
  </div>
</section>

<section id="solution">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">Notre solution</span>
      <h2>Trois piliers de performance</h2>
      <p>Une méthode inspirée de la course automobile : diagnostiquer vite, agir juste, repartir plus fort — sans arrêt de production.</p>
    </div>
    <div class="pit-lane">
      <div class="pit-track"></div>
      <div class="pillars">
        <div class="pillar reveal">
          <div class="pillar-marker">01</div>
          <span class="stage">Stop</span>
          <h3>Digitalisation & onboarding sur-mesure</h3>
          <p>Automatisation des contenus standards et d'intégration pour former en continu, sans surcoût par recrue.</p>
        </div>
        <div class="pillar reveal">
          <div class="pillar-marker">02</div>
          <span class="stage">Design</span>
          <h3>Méthodologie agile « Pit Stop »</h3>
          <p>Diagnostic rapide, scénarisation pédagogique et déploiement fluide pour zéro temps d'arrêt de production.</p>
        </div>
        <div class="pillar reveal">
          <div class="pillar-marker">03</div>
          <span class="stage">Accelerate</span>
          <h3>Mesure d'impact (Kirkpatrick & ITE)</h3>
          <p>Mise en place d'indicateurs précis pour mesurer la transformation réelle des pratiques et le ROI.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="apropos">
  <div class="wrap about-wrap">
    <div class="reveal">
      <span class="eyebrow">À propos</span>
      <h2 style="font-size:clamp(24px,3vw,32px);font-weight:600;margin-bottom:20px;">Ward Wide Learning</h2>
      <p>Chaque dispositif est conçu par une équipe d'experts certifiés en ingénierie pédagogique, en évaluation Kirkpatrick & ITE (Institute for Transfer Effectiveness) et en ingénierie digitale.</p>
      <p>Nous accompagnons les organisations sur la durée, pour transformer la formation en moteur de croissance durable plutôt qu'en centre de coûts.</p>
      <div class="badge-row">
        <div class="badge"><span class="v">Kirkpatrick ITE</span>Certification officielle</div>
        <div class="badge"><span class="v">Pit Stop</span>Méthode propriétaire</div>
      </div>
    </div>
    <div class="about-panel reveal">
      <div class="row"><span>Localisation</span><span class="v">Casablanca, Maroc</span></div>
      <div class="row"><span>Adresse</span><span class="v">Oasis Latitude Offices</span></div>
      <div class="row"><span>Rue</span><span class="v">Angle Route de l'Oasis</span></div>
      <div class="row"><span>Consultation</span><span class="v">20 min · offerte</span></div>
      <div class="row"><span>Statut</span><span class="v">Diagnostic disponible</span></div>
    </div>
  </div>
</section>

<section id="contact">
  <div class="wrap">
    <div class="contact-card reveal">
      <div>
        <span class="eyebrow">Échangeons sur votre projet</span>
        <h2>Planifiez un échange stratégique de 20 minutes</h2>
        <p>Remplissez ce formulaire pour être recontacté par un expert Ward Wide Learning et faire le point sur votre dispositif de formation.</p>
        <div class="mini-stats">
          <div><span class="n">-60%</span>Temps de formation</div>
          <div><span class="n">100%</span>Traçabilité audit</div>
          <div><span class="n">+38%</span>ROI formation moyen</div>
        </div>
      </div>
      <div>
        <form method="POST" action="{{ route('consultation.store') }}" id="hero-form">
          @csrf
          <div class="field">
            <label for="name">Nom & prénom</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Votre nom complet">
          </div>
          <div class="field">
            <label for="phone">Téléphone</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="+212 6 00 00 00 00">
          </div>
          <div class="field">
            <label for="role">Votre rôle</label>
            <select id="role" name="role" required>
              <option value="" disabled selected>Sélectionnez votre rôle</option>
              <option>Responsable formation / L&D</option>
              <option>Directeur RH</option>
              <option>Directeur de centre d'appels</option>
              <option>Responsable QHSE</option>
              <option>Direction générale / COMEX</option>
              <option>Autre</option>
            </select>
          </div>
          <div class="field">
            <label for="need">Votre enjeu principal</label>
            <select id="need" name="need" required>
              <option value="" disabled selected>Sélectionnez votre enjeu</option>
              <option>Onboarding de nouvelles recrues</option>
              <option>Conformité et traçabilité QHSE</option>
              <option>Mesure du ROI formation</option>
              <option>Formation de volumes importants</option>
              <option>Autre besoin</option>
            </select>
          </div>
          <button type="submit" class="btn-primary">Demander une consultation →</button>
          <p class="form-note">Réponse sous 24h ouvrées · aucun engagement.</p>
        </form>
        @if (session('success'))
            <div class="success-msg" style="display:block;">✓ {{ session('success') }}</div>
        @endif
        <div class="success-msg" id="successMsg">✓ Demande envoyée. Un expert Ward Wide Learning vous recontacte sous 24h.</div>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="wrap footer-wrap">
    <div class="brand">Ward Wide Learning</div>
    <div>Oasis Latitude Offices, Angle Route de l'Oasis, Casablanca</div>
    <div>© 2026 Ward Wide Learning</div>
  </div>
  <!-- <p class="legal">Ce site n'est pas affilié à Meta / Facebook Inc. Cette page n'est en aucun cas sponsorisée, approuvée ou administrée par Facebook, Instagram ou Google. FACEBOOK est une marque déposée de Meta Platforms, Inc. GOOGLE est une marque déposée de Google LLC.</p> -->
</footer>

<!-- WHATSAPP CHAT WIDGET -->
<button class="wa-fab" id="waFab" type="button" aria-label="Discuter avec nous sur WhatsApp" aria-expanded="false">
  <span class="wa-badge" id="waBadge"></span>
  <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.01 3C9.38 3 4 8.38 4 15.01c0 2.35.65 4.54 1.78 6.42L4 29l7.76-1.75c1.79.98 3.86 1.54 6.25 1.54 6.63 0 12.01-5.38 12.01-12.01C30.02 8.38 24.64 3 16.01 3zm7.05 17.16c-.3.84-1.72 1.6-2.38 1.7-.61.09-1.38.13-2.23-.14-.51-.16-1.17-.38-2.02-.75-3.55-1.53-5.86-5.1-6.04-5.34-.18-.24-1.45-1.93-1.45-3.68 0-1.75.92-2.6 1.24-2.96.32-.35.7-.44.93-.44.23 0 .47 0 .67.01.22.01.5-.08.78.6.3.72 1.02 2.48 1.11 2.66.09.18.15.39.03.63-.12.24-.18.39-.36.6-.18.21-.38.47-.54.63-.18.18-.37.38-.16.74.21.35.94 1.55 2.02 2.51 1.39 1.24 2.56 1.62 2.92 1.8.36.18.57.15.78-.09.21-.24.9-1.05 1.14-1.41.24-.35.48-.29.81-.18.33.12 2.09.99 2.45 1.17.36.18.6.27.69.42.09.15.09.85-.21 1.69z"/></svg>
</button>

<div class="wa-panel" id="waPanel">
  <div class="wa-panel-head">
    <div class="wa-avatar">
      <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.01 3C9.38 3 4 8.38 4 15.01c0 2.35.65 4.54 1.78 6.42L4 29l7.76-1.75c1.79.98 3.86 1.54 6.25 1.54 6.63 0 12.01-5.38 12.01-12.01C30.02 8.38 24.64 3 16.01 3zm7.05 17.16c-.3.84-1.72 1.6-2.38 1.7-.61.09-1.38.13-2.23-.14-.51-.16-1.17-.38-2.02-.75-3.55-1.53-5.86-5.1-6.04-5.34-.18-.24-1.45-1.93-1.45-3.68 0-1.75.92-2.6 1.24-2.96.32-.35.7-.44.93-.44.23 0 .47 0 .67.01.22.01.5-.08.78.6.3.72 1.02 2.48 1.11 2.66.09.18.15.39.03.63-.12.24-.18.39-.36.6-.18.21-.38.47-.54.63-.18.18-.37.38-.16.74.21.35.94 1.55 2.02 2.51 1.39 1.24 2.56 1.62 2.92 1.8.36.18.57.15.78-.09.21-.24.9-1.05 1.14-1.41.24-.35.48-.29.81-.18.33.12 2.09.99 2.45 1.17.36.18.6.27.69.42.09.15.09.85-.21 1.69z"/></svg>
    </div>
    <div>
      <h4>Ward Wide Learning</h4>
      <div class="status">En ligne · répond rapidement</div>
    </div>
    <button class="wa-close" id="waClose" type="button" aria-label="Fermer la discussion">✕</button>
  </div>
  <div class="wa-panel-body">
    <div class="wa-bubble">👋 Bonjour ! Une question sur nos dispositifs de formation ou notre méthode « Pit Stop » ? Écrivez-nous, on vous répond rapidement.</div>
    <a class="wa-cta" id="waLink" href="https://wa.me/212699712087?text=Bonjour%20Ward%20Wide%20Learning%2C%20je%20souhaite%20des%20informations%20sur%20vos%20formations." target="_blank" rel="noopener">
      <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.01 3C9.38 3 4 8.38 4 15.01c0 2.35.65 4.54 1.78 6.42L4 29l7.76-1.75c1.79.98 3.86 1.54 6.25 1.54 6.63 0 12.01-5.38 12.01-12.01C30.02 8.38 24.64 3 16.01 3z"/></svg>
      Démarrer la discussion
    </a>
  </div>
</div>

{{-- <script>
  // ROI counter animation
  (function(){
    const el = document.getElementById('roiCounter');
    let val = 0;
    const target = 38;
    const step = () => {
      val += 1;
      el.textContent = val + '%';
      if(val < target) requestAnimationFrame(() => setTimeout(step, 28));
    };
    step();
  })();

  // Segment tabs
  const tabs = document.querySelectorAll('.seg-tab');
  const panels = document.querySelectorAll('.seg-panel');
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('active'));
      panels.forEach(p => p.classList.remove('active'));
      tab.classList.add('active');
      document.getElementById(tab.dataset.target).classList.add('active');
    });
  });

  // Reveal on scroll
  const revealEls = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if(entry.isIntersecting){
        entry.target.classList.add('in');
        observer.unobserve(entry.target);
      }
    });
  }, {threshold: 0.15});
  revealEls.forEach(el => observer.observe(el));

  // Theme toggle (dark <-> light), respecte la palette du logo
  (function(){
    const root = document.documentElement;
    const toggle = document.getElementById('themeToggle');
    const sunIcon = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2.4M12 19.6V22M4.93 4.93l1.7 1.7M17.37 17.37l1.7 1.7M2 12h2.4M19.6 12H22M4.93 19.07l1.7-1.7M17.37 6.63l1.7-1.7"/></svg>';
    const moonIcon = '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.35 15.35A9 9 0 018.65 3.65 9 9 0 1020.35 15.35z"/></svg>';
    function apply(theme){
      root.setAttribute('data-theme', theme);
      toggle.innerHTML = theme === 'light' ? moonIcon : sunIcon;
      toggle.setAttribute('aria-label', theme === 'light' ? 'Activer le mode sombre' : 'Activer le mode clair');
    }
    apply('dark');
    toggle.addEventListener('click', function(){
      const next = root.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
      apply(next);
    });
  })();

  // WhatsApp chat widget
  (function(){
    const fab = document.getElementById('waFab');
    const panel = document.getElementById('waPanel');
    const closeBtn = document.getElementById('waClose');
    const badge = document.getElementById('waBadge');
    function openPanel(){
      panel.classList.add('open');
      fab.setAttribute('aria-expanded', 'true');
      if(badge) badge.style.display = 'none';
    }
    function closePanel(){
      panel.classList.remove('open');
      fab.setAttribute('aria-expanded', 'false');
    }
    fab.addEventListener('click', function(){
      panel.classList.contains('open') ? closePanel() : openPanel();
    });
    closeBtn.addEventListener('click', closePanel);
    document.addEventListener('click', function(e){
      if(panel.classList.contains('open') && !panel.contains(e.target) && !fab.contains(e.target)){
        closePanel();
      }
    });
  })();

  // Form submit (no backend — front-end confirmation only)
  function handleSubmit(e){
    e.preventDefault();
    document.getElementById('hero-form').style.display = 'none';
    document.getElementById('successMsg').style.display = 'block';
    return false;
  }
</script> --}}
<script src="script.js"></script>
</body>
</html>
