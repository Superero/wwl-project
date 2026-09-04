<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Solutions — Ward Wide Learning | Des réponses concrètes à vos enjeux Learning</title>
<meta name="description" content="Learning Impact, Digital Learning, Académies & parcours, Pit Stop Learning, Assessment & Positioning, Management & Human Performance : découvrez nos solutions Learning sur mesure.">
<link rel="shortcut icon" href="{{ asset('logo-lockup.svg') }}" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Work+Sans:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{ asset('style.css') }}"> --}}
<style>
    /* =========================================================
   WARD WIDE LEARNING — STYLESHEET
   Identité visuelle construite à partir du logo :
   encre marine, bleu institutionnel, sarcelle, ambre, magenta.
   (Feuille de style identique à la homepage — ne pas dupliquer
   dans un fichier séparé, factoriser via {{ asset('style.css') }}
   dès que possible.)
   ========================================================= */

/* =========================
   DESIGN TOKENS
========================= */
:root{
  --background:#0d0f16;
  --bg-soft:#12151e;
  --surface:#171a24;
  --surface-2:#1c202b;
  --surface-hover:#212635;
  --border:rgba(233,238,248,0.11);
  --border-strong:rgba(233,238,248,0.24);
  --text-primary:#edeff6;
  --text-secondary:#9099ae;

  --primary:#7188da;
  --primary-ink:#3951ab;
  --secondary:#5dc9ca;
  --accent:#fabc19;
  --magenta:#f14e93;

  --success:#4fcb8f;
  --warning:#fabc19;
  --error:#f0685e;

  --radius-sm:4px;
  --radius-md:12px;
  --radius-lg:26px;

  --font-display:'Fraunces', 'Iowan Old Style', serif;
  --font-body:'Work Sans', 'Segoe UI', sans-serif;
  --font-mono:'IBM Plex Mono', monospace;

  color-scheme:dark;
}

html[data-theme="light"]{
  --background:#eef1f7;
  --bg-soft:#e5e9f2;
  --surface:#ffffff;
  --surface-2:#f6f8fc;
  --surface-hover:#e9edf6;
  --border:rgba(16,20,35,0.13);
  --border-strong:rgba(16,20,35,0.26);
  --text-primary:#10121c;
  --text-secondary:#565d74;

  --primary:#3951ab;
  --primary-ink:#3951ab;
  --secondary:#157e80;
  --accent:#a86400;
  --magenta:#c81f6c;

  --success:#1e8e5a;
  --warning:#a86400;
  --error:#c23b3b;

  color-scheme:light;
}

/* =========================
   RESET / BASE
========================= */
*{box-sizing:border-box;margin:0;padding:0;}
html{scroll-behavior:smooth;}
body{
  background:var(--background);
  color:var(--text-primary);
  font-family:var(--font-body);
  font-size:16px;
  line-height:1.6;
  overflow-x:hidden;
  transition:background-color .35s ease, color .35s ease;
}
@media (prefers-reduced-motion: reduce){
  *{animation-duration:.01ms !important;animation-iteration-count:1 !important;transition-duration:.01ms !important;scroll-behavior:auto !important;}
}
h1,h2,h3{font-family:var(--font-display);letter-spacing:-0.01em;font-weight:600;}
a{color:inherit;text-decoration:none;}
img{display:block;max-width:100%;}
button{font:inherit;}
.mono{font-family:var(--font-mono);}
.wrap{max-width:1180px;margin:0 auto;padding:0 32px;}
section{position:relative;padding:104px 0;}
@media(max-width:600px){
  .wrap{padding:0 20px;}
  section{padding:72px 0;}
}

/* =========================
   SCROLL PROGRESS
========================= */
.scroll-progress{
  position:fixed;top:0;left:0;height:2px;z-index:100;
  background:linear-gradient(90deg, var(--primary-ink), var(--secondary), var(--accent));
  width:0%;transition:width .1s linear;
}

/* =========================
   SECTION NAV INDICATOR
========================= */
.section-nav{
  position:fixed;right:24px;top:50%;transform:translateY(-50%);z-index:40;
  display:flex;flex-direction:column;gap:10px;
}
.section-nav a{
  width:8px;height:8px;border-radius:50%;border:1.5px solid var(--border-strong);
  background:transparent;transition:all .3s ease;position:relative;
}
.section-nav a.active{
  background:var(--secondary);border-color:var(--secondary);transform:scale(1.3);
}
.section-nav a::before{
  content:attr(data-label);position:absolute;right:18px;top:50%;transform:translateY(-50%);
  font-size:11px;color:var(--text-secondary);white-space:nowrap;opacity:0;
  transition:opacity .25s ease, transform .25s ease;pointer-events:none;
  font-family:var(--font-mono);letter-spacing:.05em;text-transform:uppercase;
}
.section-nav a:hover::before{opacity:1;transform:translateY(-50%) translateX(-4px);}
@media(max-width:1024px){.section-nav{display:none;}}

/* =========================
   BACKGROUND — CANVAS + LAYERS
========================= */
.field{
  position:fixed;inset:0;z-index:0;pointer-events:none;overflow:hidden;
}
#bgCanvas{
  position:absolute;inset:0;width:100%;height:100%;opacity:.9;
}
html[data-theme="light"] #bgCanvas{opacity:.75;}
.field-grid{
  position:absolute;inset:-2px;
  background-image:
    linear-gradient(var(--border) 1px, transparent 1px),
    linear-gradient(90deg, var(--border) 1px, transparent 1px);
  background-size:72px 72px;
  background-position:0 var(--scrollShift,0px);
  opacity:.35;
  mask-image:radial-gradient(ellipse 85% 55% at 50% 0%, black 35%, transparent 88%);
  transition:background-position .1s linear;
}
html[data-theme="light"] .field-grid{opacity:.45;}

.field-wash{
  position:absolute;inset:-10%;
  width:120%;height:120%;
  background:
    radial-gradient(680px 460px at 8% -6%, rgba(57,81,171,0.18), transparent 65%),
    radial-gradient(620px 520px at 96% 18%, rgba(93,201,202,0.14), transparent 62%),
    radial-gradient(520px 420px at 60% 96%, rgba(241,78,147,0.08), transparent 60%),
    radial-gradient(460px 380px at 30% 60%, rgba(250,188,25,0.05), transparent 65%);
  background-repeat:no-repeat;
  animation:washDrift 34s ease-in-out infinite alternate;
}
html[data-theme="light"] .field-wash{
  background:
    radial-gradient(680px 460px at 8% -6%, rgba(57,81,171,0.11), transparent 65%),
    radial-gradient(620px 520px at 96% 18%, rgba(21,126,128,0.10), transparent 62%),
    radial-gradient(520px 420px at 60% 96%, rgba(200,31,108,0.06), transparent 60%),
    radial-gradient(460px 380px at 30% 60%, rgba(168,100,0,0.05), transparent 65%);
}
@keyframes washDrift{
  0%{transform:translate(0,0) scale(1);}
  50%{transform:translate(-2.5%,2%) scale(1.03);}
  100%{transform:translate(2%,-1.5%) scale(1);}
}

.field-glow{
  position:absolute;inset:0;
  background:radial-gradient(520px 520px at var(--mx,50%) var(--my,50%), rgba(93,201,202,0.12), transparent 72%);
  transition:background-position .35s cubic-bezier(.25,.46,.45,.94);
}
html[data-theme="light"] .field-glow{
  background:radial-gradient(520px 520px at var(--mx,50%) var(--my,50%), rgba(57,81,171,0.08), transparent 72%);
}
@media(max-width:780px),(pointer:coarse){
  .field-glow{display:none;}
}

.field-shapes{position:absolute;inset:0;}
.field-shape{
  position:absolute;border:1.5px solid currentColor;opacity:.14;
  animation:shapeDrift 46s ease-in-out infinite;
}
.field-shape.sh1{top:12%;left:6%;width:64px;height:64px;color:var(--primary-ink);transform:rotate(8deg);animation-duration:52s;}
.field-shape.sh2{top:64%;left:88%;width:46px;height:46px;color:var(--secondary);transform:rotate(-12deg);animation-duration:38s;animation-direction:reverse;}
.field-shape.sh3{top:30%;left:92%;width:30px;height:30px;color:var(--accent);border-radius:50%;animation-duration:44s;}
.field-shape.sh4{top:82%;left:14%;width:38px;height:38px;color:var(--magenta);transform:rotate(20deg);animation-duration:60s;animation-direction:reverse;}
.field-shape.sh5{top:4%;left:48%;width:22px;height:22px;color:var(--secondary);border-radius:50%;animation-duration:34s;}
@keyframes shapeDrift{
  0%{transform:translate(0,0) rotate(var(--r,6deg));}
  50%{transform:translate(22px,-26px) rotate(calc(var(--r,6deg) + 14deg));}
  100%{transform:translate(0,0) rotate(var(--r,6deg));}
}
@media(max-width:780px){
  .field-shape.sh2,.field-shape.sh3,.field-shape.sh4{display:none;}
  .field-shape{animation:none;}
}

.field-grain{
  position:absolute;inset:0;opacity:.04;mix-blend-mode:overlay;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
html[data-theme="light"] .field-grain{opacity:.025;}

/* =========================
   HEADER / NAVIGATION
========================= */
header{
  position:sticky;top:0;z-index:50;
  background:color-mix(in srgb, var(--background) 78%, transparent);
  backdrop-filter:blur(14px);
  border-bottom:1px solid var(--border);
  transition:border-color .3s ease;
}
nav{
  display:flex;align-items:center;justify-content:space-between;
  padding:14px 32px;max-width:1180px;margin:0 auto;
}
.brand{display:flex;align-items:center;gap:12px;font-family:var(--font-display);font-weight:600;font-size:17px;cursor:pointer;position:relative;}
.brand-mark{height:32px;width:auto;object-fit:contain;transition:transform .4s cubic-bezier(.34,1.56,.64,1);}
.brand:hover .brand-mark{transform:translateY(-2px) rotate(-3deg) scale(1.05);}
.nav-links{display:flex;gap:30px;font-size:14.5px;color:var(--text-secondary);}
.nav-links a{position:relative;padding:4px 0;transition:color .2s;}
.nav-links a::after{
  content:'';position:absolute;left:0;bottom:-2px;width:0;height:1.5px;background:var(--secondary);
  transition:width .3s cubic-bezier(.25,.46,.45,.94);
}
.nav-links a:hover{color:var(--text-primary);}
.nav-links a:hover::after{width:100%;}
.nav-links a.active{color:var(--text-primary);}
.nav-links a.active::after{width:100%;}

.nav-cta{
  font-family:var(--font-mono);font-size:13px;padding:10px 18px;border-radius:var(--radius-sm);
  border:1px solid var(--primary);color:var(--primary);white-space:nowrap;transition:all .25s ease;
  position:relative;overflow:hidden;
}
html[data-theme="light"] .nav-cta{color:var(--primary-ink);border-color:var(--primary-ink);}
.nav-cta::before{
  content:'';position:absolute;inset:0;background:var(--primary-ink);transform:translateX(-101%);
  transition:transform .35s cubic-bezier(.25,.46,.45,.94);z-index:-1;
}
.nav-cta:hover{color:#fff;border-color:var(--primary-ink);}
.nav-cta:hover::before{transform:translateX(0);}
.nav-actions{display:flex;align-items:center;gap:12px;}
.theme-toggle,.nav-burger{
  width:38px;height:38px;border-radius:50%;flex:0 0 auto;
  display:flex;align-items:center;justify-content:center;
  border:1px solid var(--border);background:var(--surface);color:var(--secondary);
  cursor:pointer;transition:border-color .2s, transform .2s, box-shadow .2s;
}
.theme-toggle:hover,.nav-burger:hover{border-color:var(--secondary);transform:translateY(-1px);box-shadow:0 4px 12px rgba(93,201,202,.15);}
.theme-toggle svg{width:17px;height:17px;}
.nav-burger{display:none;flex-direction:column;gap:4px;}
.nav-burger span{width:16px;height:1.5px;background:currentColor;display:block;transition:all .3s ease;}

@media(max-width:780px){
  .nav-links{
    position:fixed;top:64px;left:16px;right:16px;z-index:49;
    display:flex;flex-direction:column;gap:2px;
    background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);
    padding:10px;box-shadow:0 20px 50px rgba(0,0,0,.28);
    opacity:0;transform:translateY(-12px) scale(.98);pointer-events:none;
    transition:opacity .25s ease, transform .25s cubic-bezier(.34,1.56,.64,1);
  }
  .nav-links.open{opacity:1;transform:translateY(0) scale(1);pointer-events:auto;}
  .nav-links a{padding:12px 10px;border-radius:var(--radius-sm);}
  .nav-links a:hover{background:var(--surface-hover);}
  .nav-links a::after{display:none;}
  .nav-burger{display:flex;}
  .nav-burger.open span:nth-child(1){transform:translateY(5.5px) rotate(45deg);}
  .nav-burger.open span:nth-child(2){opacity:0;transform:scaleX(0);}
  .nav-burger.open span:nth-child(3){transform:translateY(-5.5px) rotate(-45deg);}
}

/* =========================
   PAGE HERO (sous-pages)
========================= */
.page-hero{padding:64px 0 8px;}
.page-hero .kicker{margin-bottom:22px;}
.page-hero h1{font-size:clamp(30px,4vw,48px);line-height:1.12;margin-bottom:20px;max-width:16ch;}
.page-hero p.lead{font-size:17px;color:var(--text-secondary);max-width:640px;margin-bottom:30px;}

.kicker{
  display:inline-flex;align-items:center;gap:9px;
  font-size:13.5px;color:var(--text-secondary);
  padding-bottom:16px;margin-bottom:22px;border-bottom:1px solid var(--border);
  position:relative;overflow:hidden;
}
.kicker::before{content:'';width:7px;height:7px;border-radius:2px;background:var(--accent);transform:rotate(45deg);flex:0 0 auto;}

.btn-row{display:flex;gap:14px;flex-wrap:wrap;}
.btn-primary{
  font-family:var(--font-body);font-size:15px;font-weight:600;
  background:var(--primary-ink);color:#fff;padding:14px 26px;border-radius:var(--radius-sm);border:none;cursor:pointer;
  transition:transform .25s cubic-bezier(.34,1.56,.64,1), box-shadow .25s ease;
  display:inline-flex;align-items:center;gap:8px;position:relative;overflow:hidden;
}
.btn-primary::after{
  content:'';position:absolute;inset:0;background:linear-gradient(90deg,transparent,rgba(255,255,255,.15),transparent);
  transform:translateX(-100%);transition:transform .6s ease;
}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 12px 28px rgba(57,81,171,.35);}
.btn-primary:hover::after{transform:translateX(100%);}
.btn-ghost{
  font-family:var(--font-body);font-size:15px;font-weight:500;padding:14px 22px;border-radius:var(--radius-sm);
  border:1px solid var(--border-strong);color:var(--text-secondary);transition:all .25s ease;
  position:relative;overflow:hidden;
}
.btn-ghost:hover{border-color:var(--text-secondary);color:var(--text-primary);background:var(--surface-hover);}

/* =========================
   SECTION HEADS
========================= */
.section-head{max-width:640px;margin-bottom:52px;}
.section-head .kicker{margin-bottom:16px;}
.section-head h2{font-size:clamp(25px,3vw,36px);}
.section-head p{color:var(--text-secondary);margin-top:14px;font-size:16px;}
.section-head-cta{margin-top:28px;}

/* =========================
   SOLUTIONS — bloc sommaire (jump links)
========================= */
.solutions-jump{
  display:flex;flex-wrap:wrap;gap:10px;margin-top:8px;
}
.solutions-jump a{
  font-family:var(--font-mono);font-size:12.5px;color:var(--text-secondary);
  border:1px solid var(--border);border-radius:20px;padding:9px 16px;
  display:inline-flex;align-items:center;gap:8px;transition:all .25s ease;
  background:var(--surface);
}
.solutions-jump a .jump-dot{width:6px;height:6px;border-radius:50%;background:var(--jump-color,var(--primary));flex:0 0 auto;}
.solutions-jump a:hover{border-color:var(--jump-color,var(--secondary));color:var(--text-primary);transform:translateY(-2px);}
.solutions-jump a:nth-child(1){--jump-color:var(--primary-ink);}
.solutions-jump a:nth-child(2){--jump-color:var(--secondary);}
.solutions-jump a:nth-child(3){--jump-color:var(--magenta);}
.solutions-jump a:nth-child(4){--jump-color:var(--accent);}
.solutions-jump a:nth-child(5){--jump-color:var(--primary-ink);}
.solutions-jump a:nth-child(6){--jump-color:var(--secondary);}

/* =========================
   SOLUTION DETAIL — sections longues
========================= */
.solution-detail{
  scroll-margin-top:100px;
  border-top:1px solid var(--border);
  padding:56px 0;
  display:grid;grid-template-columns:64px 1fr;gap:28px;
  position:relative;
}
.solution-detail:last-child{border-bottom:1px solid var(--border);}
.solution-detail::before{
  content:'';position:absolute;left:0;top:0;bottom:0;width:3px;background:var(--tag-color,var(--primary));
  transform:scaleY(0);transform-origin:top;transition:transform .5s cubic-bezier(.25,.46,.45,.94);
}
.solution-detail.in::before{transform:scaleY(1);}
.solution-detail .num{font-family:var(--font-mono);font-size:14px;color:var(--text-secondary);padding-top:4px;}
.solution-detail .tag{display:block;font-size:11.5px;letter-spacing:.05em;text-transform:uppercase;color:var(--tag-color,var(--primary));margin-bottom:10px;font-family:var(--font-mono);}
.solution-detail h3{font-size:clamp(21px,2.4vw,27px);margin-bottom:6px;display:flex;align-items:center;gap:10px;}
.solution-detail .hook{font-family:var(--font-display);font-weight:600;font-size:17.5px;color:var(--text-primary);margin:14px 0 16px;max-width:56ch;line-height:1.5;}
.solution-detail .body-text{color:var(--text-secondary);font-size:15px;max-width:66ch;margin-bottom:14px;}
.solution-detail .body-text:last-of-type{margin-bottom:22px;}
.solution-detail .tools-note{
  display:inline-block;font-family:var(--font-mono);font-size:12px;color:var(--secondary);
  background:color-mix(in srgb, var(--secondary) 10%, transparent);
  border:1px solid color-mix(in srgb, var(--secondary) 30%, transparent);
  border-radius:20px;padding:6px 12px;margin-bottom:18px;
}
.solution-detail:nth-of-type(1){--tag-color:var(--primary-ink);}
.solution-detail:nth-of-type(2){--tag-color:var(--secondary);}
.solution-detail:nth-of-type(3){--tag-color:var(--magenta);}
.solution-detail:nth-of-type(4){--tag-color:var(--accent);}
.solution-detail:nth-of-type(5){--tag-color:var(--primary-ink);}
.solution-detail:nth-of-type(6){--tag-color:var(--secondary);}
@media(max-width:700px){
  .solution-detail{grid-template-columns:36px 1fr;gap:14px;padding:40px 0;}
}

.seg-cta{
  font-family:var(--font-body);font-size:14px;font-weight:600;color:var(--primary-ink);
  border-bottom:1px solid var(--primary-ink);padding-bottom:2px;white-space:nowrap;
  position:relative;transition:all .3s ease;display:inline-flex;align-items:center;
}
.seg-cta::after{
  content:'→';position:absolute;right:-18px;opacity:0;transform:translateX(-4px);
  transition:all .3s ease;
}
.seg-cta:hover{padding-right:18px;}
.seg-cta:hover::after{opacity:1;transform:translateX(0);}
html[data-theme="dark"] .seg-cta,:root .seg-cta{color:var(--primary);border-color:var(--primary);}

/* =========================
   INTERACTIVE / IMPACT COVERAGE
========================= */
.interactive-card{
  background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-lg);
  padding:56px;display:grid;grid-template-columns:1fr auto;gap:40px;align-items:center;
  position:relative;overflow:hidden;
}
.interactive-card::before{
  content:'';position:absolute;top:0;left:0;right:0;height:4px;
  background:linear-gradient(90deg, var(--secondary), var(--primary-ink), var(--magenta));
  background-size:200% 100%;animation:gradientShift 6s linear infinite;
}
@media(max-width:780px){.interactive-card{grid-template-columns:1fr;padding:34px 26px;text-align:left;}}
.interactive-card h2{font-size:clamp(22px,3vw,30px);margin-bottom:14px;max-width:46ch;}
.interactive-card p{color:var(--text-secondary);font-size:15px;max-width:48ch;}

/* =========================
   PILLARS — "Comment ça se passe ?"
========================= */
.pit-lane{position:relative;padding-top:6px;}
.pit-track{position:absolute;top:22px;left:5%;right:5%;height:1px;background:var(--border);}
.pillars{display:grid;grid-template-columns:repeat(4,1fr);gap:22px;position:relative;}
@media(max-width:940px){.pillars{grid-template-columns:repeat(2,1fr);}.pit-track{display:none;}}
@media(max-width:560px){.pillars{grid-template-columns:1fr;}}
.pillar{
  background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);padding:28px 24px;
  transition:transform .4s cubic-bezier(.25,.46,.45,.94), box-shadow .4s ease, border-color .3s ease;
  transform-style:preserve-3d;position:relative;overflow:hidden;
}
.pillar::before{
  content:'';position:absolute;top:0;left:0;right:0;height:3px;
  background:linear-gradient(90deg, var(--primary-ink), var(--secondary));
  transform:scaleX(0);transform-origin:left;transition:transform .5s cubic-bezier(.25,.46,.45,.94);
}
.pillar:hover{transform:translateY(-6px);box-shadow:0 20px 40px rgba(0,0,0,.25);border-color:var(--border-strong);}
.pillar:hover::before{transform:scaleX(1);}
.pillar-marker{
  width:30px;height:30px;border-radius:50%;background:var(--bg-soft);border:1px solid var(--primary-ink);
  display:flex;align-items:center;justify-content:center;font-family:var(--font-mono);font-size:12.5px;color:var(--primary);
  margin-bottom:20px;transition:transform .4s cubic-bezier(.34,1.56,.64,1), background .3s ease;
}
.pillar:hover .pillar-marker{transform:scale(1.15) rotate(-10deg);background:var(--surface-hover);}
.pillar .stage{font-family:var(--font-mono);font-size:11px;color:var(--secondary);transition:letter-spacing .3s ease;}
.pillar:hover .stage{letter-spacing:.08em;}
.pillar h3{font-size:17px;margin:10px 0;}
.pillar p{color:var(--text-secondary);font-size:14px;}

/* =========================
   CHECKLIST — "Ce que vous obtenez"
========================= */
.checklist-panel{
  background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);
  padding:8px 30px;transition:box-shadow .4s ease, border-color .3s ease;
}
.checklist-panel:hover{box-shadow:0 12px 32px rgba(0,0,0,.15);border-color:var(--border-strong);}
.checklist-panel .row{
  display:flex;align-items:flex-start;gap:14px;padding:18px 0;border-bottom:1px solid var(--border);
  transition:padding-left .3s ease;
}
.checklist-panel .row:last-child{border-bottom:none;}
.checklist-panel .row:hover{padding-left:8px;}
.checklist-panel .row .check-ic{
  flex:0 0 auto;width:26px;height:26px;border-radius:50%;
  background:color-mix(in srgb, var(--secondary) 14%, transparent);
  border:1px solid color-mix(in srgb, var(--secondary) 40%, transparent);
  display:flex;align-items:center;justify-content:center;color:var(--secondary);margin-top:1px;
}
.checklist-panel .row .check-ic svg{width:14px;height:14px;}
.checklist-panel .row span.label{color:var(--text-primary);font-size:14.5px;padding-top:3px;}

/* =========================
   ABOUT-LIKE QUOTE BLOCK
========================= */
.quote-block{max-width:760px;}
.quote-block .about-lead{
  font-size:20px;color:var(--text-primary);font-family:var(--font-display);font-weight:600;line-height:1.5;margin-bottom:22px;
}
.quote-block p{color:var(--text-secondary);font-size:15.5px;margin-bottom:22px;max-width:64ch;}

/* =========================
   FINAL CTA
========================= */
.final-cta{
  background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-lg);
  padding:64px 52px;text-align:center;position:relative;overflow:hidden;
}
.final-cta::before{
  content:'';position:absolute;top:0;left:0;right:0;height:4px;
  background:linear-gradient(90deg, var(--primary-ink), var(--secondary), var(--accent), var(--magenta));
  background-size:200% 100%;animation:gradientShift 6s linear infinite;
}
.final-cta h2{font-size:clamp(24px,3.6vw,38px);margin-bottom:14px;}
.final-cta p{color:var(--text-secondary);font-size:15.5px;max-width:52ch;margin:0 auto 30px;}
.final-cta .btn-row{justify-content:center;}
@media(max-width:600px){.final-cta{padding:44px 24px;}}

/* =========================
   CONTACT
========================= */
#contact{padding-bottom:120px;}
.contact-card{
  background:var(--surface);
  border:1px solid var(--border);border-radius:var(--radius-lg);padding:52px;
  display:grid;grid-template-columns:1fr 1fr;gap:48px;
  position:relative;overflow:hidden;
  transition:box-shadow .4s ease, border-color .3s ease;
}
.contact-card:hover{box-shadow:0 24px 60px rgba(0,0,0,.2);border-color:var(--border-strong);}
.contact-card::before{
  content:'';position:absolute;top:0;left:0;right:0;height:4px;
  background:linear-gradient(90deg, var(--primary-ink), var(--secondary), var(--accent), var(--magenta));
  background-size:200% 100%;animation:gradientShift 6s linear infinite;
}
@keyframes gradientShift{0%{background-position:0% 50%;}100%{background-position:200% 50%;}}
@media(max-width:860px){.contact-card{grid-template-columns:1fr;padding:32px 26px;}}
.contact-card h2{font-size:clamp(23px,3vw,30px);margin-bottom:14px;}
.contact-card > div:first-child p{color:var(--text-secondary);font-size:15px;margin-bottom:26px;}
.contact-coords{margin-top:30px;font-size:13.5px;color:var(--text-secondary);line-height:1.9;}
.contact-coords strong{color:var(--text-primary);font-weight:600;}

form{display:flex;flex-direction:column;gap:14px;}
.field-row{position:relative;}
.field-row label{
  font-size:12px;color:var(--text-secondary);display:block;margin-bottom:6px;
  transition:color .3s ease, transform .3s ease;
}
.field-row:focus-within label{color:var(--primary);transform:translateX(2px);}
.field-row input, .field-row select, .field-row textarea{
  width:100%;background:var(--bg-soft);border:1px solid var(--border);border-radius:var(--radius-sm);
  padding:12px 14px;color:var(--text-primary);font-family:var(--font-body);font-size:14px;outline:none;
  transition:border-color .3s ease, box-shadow .3s ease, transform .3s ease;
  resize:vertical;
}
.field-row input:focus, .field-row select:focus, .field-row textarea:focus{
  border-color:var(--primary-ink);
  box-shadow:0 0 0 3px rgba(57,81,171,.12);
  transform:translateY(-1px);
}
.field-row input::placeholder, .field-row textarea::placeholder{color:var(--text-secondary);opacity:.5;}
.field-row select{appearance:none;cursor:pointer;}
.field-row .select-arrow{
  position:absolute;right:14px;top:50%;transform:translateY(-50%);
  width:0;height:0;border-left:4px solid transparent;border-right:4px solid transparent;
  border-top:4px solid var(--text-secondary);pointer-events:none;
  transition:border-color .3s ease;
}
.field-row:focus-within .select-arrow{border-top-color:var(--primary);}
.field-pair{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
@media(max-width:480px){.field-pair{grid-template-columns:1fr;}}
form .btn-primary{margin-top:6px;justify-content:center;width:100%;}
.form-note{font-size:12px;color:var(--text-secondary);margin-top:2px;}
.success-msg{
  display:none;text-align:center;padding:26px 10px;font-size:14.5px;color:var(--secondary);
}

/* =========================
   FOOTER
========================= */
footer{border-top:1px solid var(--border);padding:40px 0;}
.footer-wrap{display:flex;justify-content:space-between;flex-wrap:wrap;gap:16px;font-size:13px;color:var(--text-secondary);}
.footer-wrap .brand{font-size:14px;}
.footer-wrap .brand-mark{height:22px;}
.footer-wrap a{position:relative;transition:color .2s;}
.footer-wrap a::after{
  content:'';position:absolute;left:0;bottom:-2px;width:0;height:1px;background:var(--secondary);
  transition:width .25s ease;
}
.footer-wrap a:hover{color:var(--text-primary);}
.footer-wrap a:hover::after{width:100%;}

/* =========================
   REVEAL / MOTION
========================= */
.reveal{opacity:0;transform:translateY(24px);transition:opacity .7s cubic-bezier(.25,.46,.45,.94), transform .7s cubic-bezier(.25,.46,.45,.94);}
.reveal.in{opacity:1;transform:translateY(0);}
.reveal-delay-1{transition-delay:.08s;}
.reveal-delay-2{transition-delay:.16s;}
.reveal-delay-3{transition-delay:.24s;}
.reveal-delay-4{transition-delay:.32s;}
.reveal-delay-5{transition-delay:.40s;}

/* =========================
   WHATSAPP WIDGET
========================= */
.wa-fab{
  position:fixed;bottom:26px;right:26px;z-index:70;
  width:58px;height:58px;border-radius:50%;border:none;cursor:pointer;
  background:#25d366;
  display:flex;align-items:center;justify-content:center;
  box-shadow:0 10px 26px rgba(15,120,90,.35);
  transition:transform .3s cubic-bezier(.34,1.56,.64,1), box-shadow .3s ease;
}
.wa-fab:hover{transform:translateY(-4px) scale(1.08);box-shadow:0 14px 34px rgba(15,120,90,.45);}
.wa-fab:active{transform:translateY(-2px) scale(1.04);}
.wa-fab svg{width:27px;height:27px;fill:#ffffff;}
.wa-badge{
  position:absolute;top:-2px;right:-2px;width:14px;height:14px;border-radius:50%;
  background:var(--accent);border:2px solid var(--background);
  animation:badgePulse 2s ease-in-out infinite;
}
@keyframes badgePulse{0%,100%{transform:scale(1);}50%{transform:scale(1.15);}}
.wa-panel{
  position:fixed;bottom:96px;right:26px;z-index:70;width:318px;max-width:calc(100vw - 32px);
  background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);overflow:hidden;
  box-shadow:0 24px 60px rgba(0,0,0,.35);
  opacity:0;transform:translateY(16px) scale(.96);pointer-events:none;
  transition:opacity .3s ease, transform .3s cubic-bezier(.34,1.56,.64,1);
}
.wa-panel.open{opacity:1;transform:translateY(0) scale(1);pointer-events:auto;}
.wa-panel-head{
  position:relative;display:flex;align-items:center;gap:12px;padding:16px 40px 16px 18px;
  background:#25d366;color:#04140f;
}
.wa-avatar{
  width:36px;height:36px;border-radius:50%;flex:0 0 auto;
  background:rgba(4,20,15,.14);display:flex;align-items:center;justify-content:center;
  transition:transform .3s ease;
}
.wa-panel-head:hover .wa-avatar{transform:scale(1.1);}
.wa-avatar svg{width:19px;height:19px;fill:#04140f;}
.wa-panel-head h4{font-family:var(--font-display);font-size:14px;font-weight:600;}
.wa-panel-head .status{font-size:11px;display:flex;align-items:center;gap:5px;opacity:.85;margin-top:2px;}
.wa-panel-head .status::before{content:'';width:6px;height:6px;border-radius:50%;background:#04140f;opacity:.55;animation:statusPulse 2s ease-in-out infinite;}
@keyframes statusPulse{0%,100%{opacity:.55;}50%{opacity:1;}}
.wa-close{
  position:absolute;top:9px;right:9px;width:25px;height:25px;border:none;background:none;
  color:#04140f;opacity:.75;cursor:pointer;font-size:15px;line-height:1;
  transition:opacity .2s, transform .2s;
}
.wa-close:hover{opacity:1;transform:rotate(90deg);}
.wa-panel-body{padding:18px;background:var(--bg-soft);}
.wa-bubble{
  background:var(--surface);border:1px solid var(--border);border-radius:12px 12px 12px 3px;
  padding:12px 14px;font-size:13.5px;color:var(--text-primary);margin-bottom:16px;line-height:1.5;
  transition:transform .3s ease, box-shadow .3s ease;
}
.wa-bubble:hover{transform:translateX(4px);box-shadow:0 4px 12px rgba(0,0,0,.1);}
.wa-cta{
  display:flex;align-items:center;justify-content:center;gap:8px;width:100%;
  background:#25d366;color:#04140f;font-weight:600;
  padding:12px 16px;border-radius:var(--radius-sm);font-size:13.5px;transition:all .25s ease;
}
.wa-cta:hover{filter:brightness(1.06);transform:translateY(-1px);}
.wa-cta svg{width:16px;height:16px;fill:#04140f;}
@media(max-width:480px){
  .wa-fab{right:16px;bottom:16px;}
  .wa-panel{right:14px;bottom:88px;}
}

/* =========================
   RESPONSIVE — MOBILE FIXES
========================= */
@media(max-width: 768px){
  .page-hero{padding:44px 0 4px;}
  .page-hero h1{font-size: clamp(26px, 7vw, 36px);}
  .page-hero p.lead{font-size: 15.5px;}
  .nav-cta{display: none;}
  .btn-row{flex-direction: column; width: 100%;}
  .btn-primary, .btn-ghost{
    width: 100%;
    justify-content: center;
    text-align: center;
    padding: 13px 20px;
    font-size: 14.5px;
  }
  section{padding: 64px 0;}
  .section-head{margin-bottom: 36px;}
  .section-head h2{font-size: clamp(22px, 6vw, 28px);}
  .interactive-card{padding:34px 22px;}
  .pillar{padding: 22px 18px;}
  .pillar h3{font-size: 16px;}
  .pillar p{font-size: 13px;}
  .checklist-panel{padding: 6px 20px;}
  .checklist-panel .row{padding: 14px 0; font-size: 13px;}
  .final-cta{padding:40px 22px;}
  .contact-card{padding: 28px 20px; gap: 32px;}
  .contact-card h2{font-size: 22px;}
  .field-row input, .field-row select, .field-row textarea{padding: 11px 12px;}
  .footer-wrap{
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 10px;
  }
  .footer-wrap .brand{font-size: 13px;}
  .solutions-jump{gap:8px;}
}

@media(max-width: 480px){
  .wrap{padding: 0 16px;}
  .nav-cta{display: none;}
  .kicker{font-size: 12px; padding-bottom: 12px; margin-bottom: 16px;}
  .pillar{padding: 20px 16px;}
  .contact-card{padding: 24px 16px; border-radius: var(--radius-md);}
  .contact-card::before{height: 3px;}
  .wa-panel{width: calc(100vw - 32px); right: 16px;}
}

/* =========================
   ACCESSIBILITY
========================= */
:focus-visible{outline:2px solid var(--secondary);outline-offset:2px;}
.wa-fab:focus-visible,.theme-toggle:focus-visible,.nav-burger:focus-visible{outline-offset:3px;}

/* =========================
   CURSOR CUSTOM (desktop only)
========================= */
@media(min-width:1024px) and (pointer:fine){
  .cursor-dot,.cursor-ring{
    position:fixed;top:0;left:0;pointer-events:none;z-index:9999;border-radius:50%;
    transition:transform .15s ease-out, opacity .15s ease;
  }
  .cursor-dot{width:6px;height:6px;background:var(--secondary);transform:translate(-50%,-50%);}
  .cursor-ring{width:32px;height:32px;border:1.5px solid var(--secondary);opacity:.4;transform:translate(-50%,-50%);}
  .cursor-ring.hover{transform:translate(-50%,-50%) scale(1.6);opacity:.15;border-color:var(--primary);}
  .cursor-dot.hover{transform:translate(-50%,-50%) scale(.5);background:var(--primary);}
}
@media(max-width:1023px),(pointer:coarse){.cursor-dot,.cursor-ring{display:none;}}

/* =========================================================
   HERO VISUAL — SOLUTIONS
========================================================= */

.page-hero{
    padding:78px 0 34px;
}

.hero-layout{
    display:grid;
    grid-template-columns:minmax(0, 1.05fr) minmax(380px, .95fr);
    align-items:center;
    gap:70px;
}

.hero-content{
    position:relative;
    z-index:2;
}

.hero-content h1{
    max-width:15ch;
}

.hero-content .lead{
    max-width:620px;
}


/* =========================
   HERO VISUAL
========================= */

.hero-visual{
    position:relative;
    min-height:520px;
    display:flex;
    align-items:center;
    justify-content:center;
}

.hero-image-card{
    position:relative;
    width:min(100%, 500px);
    aspect-ratio: .88;
}


/* Image principale */

.hero-image-frame{
    position:absolute;
    inset:28px 18px 28px 18px;
    overflow:hidden;
    border-radius:28px;

    background:var(--surface);

    border:1px solid var(--border-strong);

    box-shadow:
        0 35px 80px rgba(0,0,0,.32),
        0 0 0 1px rgba(255,255,255,.025);

    transform:rotate(2deg);

    transition:
        transform .6s cubic-bezier(.25,.46,.45,.94),
        box-shadow .6s ease;
}

.hero-image-frame img{
    width:100%;
    height:100%;
    object-fit:cover;

    filter:saturate(.82) contrast(1.04);

    transform:scale(1.04);

    transition:
        transform 1s cubic-bezier(.25,.46,.45,.94),
        filter .6s ease;
}


/* Overlay */

.hero-image-overlay{
    position:absolute;
    inset:0;

    background:
        linear-gradient(
            135deg,
            rgba(57,81,171,.30),
            transparent 45%,
            rgba(93,201,202,.20)
        );

    mix-blend-mode:screen;
}


/* Hover */

.hero-image-card:hover .hero-image-frame{
    transform:rotate(0deg) translateY(-6px);

    box-shadow:
        0 45px 100px rgba(0,0,0,.38),
        0 0 60px rgba(93,201,202,.08);
}

.hero-image-card:hover img{
    transform:scale(1.09);
    filter:saturate(1) contrast(1.05);
}


/* =========================
   IMAGE GLOW
========================= */

.hero-image-card::before{
    content:'';

    position:absolute;

    width:300px;
    height:300px;

    top:50%;
    left:50%;

    transform:translate(-50%,-50%);

    background:
        radial-gradient(
            circle,
            rgba(93,201,202,.20),
            transparent 68%
        );

    filter:blur(30px);

    z-index:-2;

    pointer-events:none;
}


/* =========================
   FLOATING LABEL
========================= */

.hero-floating-label{
    position:absolute;

    display:flex;
    align-items:center;
    gap:9px;

    padding:9px 13px;

    background:color-mix(
        in srgb,
        var(--surface) 88%,
        transparent
    );

    border:1px solid var(--border-strong);

    backdrop-filter:blur(14px);

    border-radius:30px;

    font-family:var(--font-mono);
    font-size:10px;
    letter-spacing:.05em;
    text-transform:uppercase;

    color:var(--text-secondary);

    box-shadow:0 12px 30px rgba(0,0,0,.18);

    z-index:5;
}

.hero-label-top{
    top:18px;
    left:-16px;
}

.label-dot{
    width:7px;
    height:7px;

    border-radius:50%;

    background:var(--secondary);

    box-shadow:
        0 0 0 4px
        color-mix(
            in srgb,
            var(--secondary) 12%,
            transparent
        );

    animation:heroPulse 2.4s ease-in-out infinite;
}

@keyframes heroPulse{
    0%,100%{
        transform:scale(1);
    }

    50%{
        transform:scale(1.3);
    }
}


/* =========================
   FLOATING CARD
========================= */

.hero-floating-card{
    position:absolute;

    right:-22px;
    bottom:42px;

    display:flex;
    align-items:center;
    gap:12px;

    min-width:190px;

    padding:13px 16px;

    background:var(--surface);

    border:1px solid var(--border-strong);

    border-radius:14px;

    box-shadow:
        0 20px 50px rgba(0,0,0,.28);

    z-index:6;

    animation:heroFloat 5s ease-in-out infinite;
}

@keyframes heroFloat{

    0%,100%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-8px);
    }

}

.floating-icon{
    width:36px;
    height:36px;

    flex:0 0 auto;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:10px;

    background:
        color-mix(
            in srgb,
            var(--primary-ink) 16%,
            transparent
        );

    color:var(--primary);
}

.floating-icon svg{
    width:17px;
    height:17px;
}

.floating-small{
    display:block;

    font-family:var(--font-mono);

    font-size:9px;

    color:var(--text-secondary);

    letter-spacing:.08em;

    margin-bottom:2px;
}

.hero-floating-card strong{
    display:block;

    font-family:var(--font-display);

    font-size:14px;

    color:var(--text-primary);
}


/* =========================
   DECORATIVE ORBITS
========================= */

.hero-orbit{
    position:absolute;

    border:1px solid;

    border-radius:50%;

    pointer-events:none;

    opacity:.28;
}

.orbit-one{
    width:430px;
    height:430px;

    top:50%;
    left:50%;

    transform:
        translate(-50%,-50%)
        rotate(18deg);

    border-color:var(--secondary);

    border-left-color:transparent;
    border-bottom-color:transparent;

    animation:orbitRotate 24s linear infinite;
}

.orbit-two{
    width:360px;
    height:360px;

    top:50%;
    left:50%;

    transform:
        translate(-50%,-50%)
        rotate(-25deg);

    border-color:var(--primary);

    border-right-color:transparent;
    border-top-color:transparent;

    animation:orbitRotateReverse 30s linear infinite;
}

@keyframes orbitRotate{
    from{
        transform:
            translate(-50%,-50%)
            rotate(18deg);
    }

    to{
        transform:
            translate(-50%,-50%)
            rotate(378deg);
    }
}

@keyframes orbitRotateReverse{
    from{
        transform:
            translate(-50%,-50%)
            rotate(-25deg);
    }

    to{
        transform:
            translate(-50%,-50%)
            rotate(-385deg);
    }
}


/* =========================
   COLOR ACCENTS
========================= */

.hero-accent{
    position:absolute;

    width:13px;
    height:13px;

    border-radius:3px;

    transform:rotate(45deg);

    z-index:7;
}

.accent-one{
    top:70px;
    right:18px;

    background:var(--accent);

    box-shadow:
        0 0 25px
        color-mix(
            in srgb,
            var(--accent) 35%,
            transparent
        );
}

.accent-two{
    bottom:78px;
    left:4px;

    background:var(--magenta);

    box-shadow:
        0 0 25px
        color-mix(
            in srgb,
            var(--magenta) 30%,
            transparent
        );
}


/* =========================
   LIGHT MODE
========================= */

html[data-theme="light"] .hero-image-frame{
    box-shadow:
        0 30px 70px rgba(16,20,35,.14),
        0 0 0 1px rgba(16,20,35,.03);
}

html[data-theme="light"] .hero-floating-card{
    box-shadow:
        0 20px 45px rgba(16,20,35,.12);
}


/* =========================
   TABLET
========================= */

@media(max-width:980px){

    .hero-layout{
        grid-template-columns:1fr;
        gap:50px;
    }

    .hero-content h1{
        max-width:17ch;
    }

    .hero-visual{
        min-height:460px;
        max-width:620px;
        margin:0 auto;
        width:100%;
    }

}


/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .page-hero{
        padding:50px 0 25px;
    }

    .hero-layout{
        gap:38px;
    }

    .hero-content h1{
        max-width:100%;
    }

    .hero-visual{
        min-height:390px;
    }

    .hero-image-card{
        width:100%;
        max-width:390px;
    }

    .hero-image-frame{
        inset:22px 12px;
        border-radius:22px;
    }

    .hero-label-top{
        left:-4px;
        top:10px;
    }

    .hero-floating-card{
        right:-4px;
        bottom:28px;
    }

    .orbit-one{
        width:330px;
        height:330px;
    }

    .orbit-two{
        width:280px;
        height:280px;
    }

}


/* =========================
   SMALL MOBILE
========================= */

@media(max-width:480px){

    .hero-visual{
        min-height:350px;
    }

    .hero-floating-card{
        min-width:auto;
        padding:10px 12px;
    }

    .floating-icon{
        width:32px;
        height:32px;
    }

    .hero-floating-card strong{
        font-size:12px;
    }

    .hero-floating-label{
        font-size:9px;
        padding:8px 10px;
    }

    .hero-label-top{
        left:0;
    }

    .hero-image-frame{
        inset:20px 8px;
    }

}

/* =========================
   SUCCESS MODAL
========================= */
.success-modal{
  position:fixed;inset:0;z-index:99999;
  display:flex;align-items:center;justify-content:center;padding:24px;
  opacity:0;visibility:hidden;
  transition:opacity .4s ease, visibility .4s ease;
}
.success-modal.is-visible{opacity:1;visibility:visible;}
.success-modal-backdrop{
  position:absolute;inset:0;
  background:radial-gradient(circle at 50% 45%, rgba(93,201,202,.10), transparent 40%), rgba(6,8,14,.78);
  backdrop-filter:blur(14px);
}
.success-modal-card{
  position:relative;z-index:2;width:min(480px,100%);padding:44px 38px 38px;text-align:center;
  border:1px solid var(--border-strong);border-radius:var(--radius-lg);
  background:var(--surface);
  box-shadow:0 30px 90px rgba(0,0,0,.45);
  transform:translateY(28px) scale(.95);
  transition:transform .5s cubic-bezier(.16,1,.3,1);
}
.success-modal.is-visible .success-modal-card{transform:translateY(0) scale(1);}
.success-modal-close{
  position:absolute;top:14px;right:16px;width:36px;height:36px;
  display:flex;align-items:center;justify-content:center;
  border:1px solid var(--border);border-radius:50%;background:var(--surface-2);color:var(--text-secondary);
  font-size:22px;line-height:1;cursor:pointer;
  transition:background .25s ease, color .25s ease, transform .25s ease;
}
.success-modal-close:hover{background:var(--surface-hover);color:var(--text-primary);transform:rotate(90deg);}
.success-icon-wrapper{display:flex;justify-content:center;margin-bottom:24px;}
.success-icon{
  position:relative;width:76px;height:76px;display:flex;align-items:center;justify-content:center;
  border:1px solid var(--secondary);border-radius:50%;
  background:radial-gradient(circle, color-mix(in srgb, var(--secondary) 20%, transparent), transparent 65%);
}
.success-icon::before{
  content:'';position:absolute;inset:-8px;border:1px solid color-mix(in srgb, var(--secondary) 30%, transparent);
  border-radius:50%;animation:successRing 2.4s ease-out infinite;
}
.success-icon svg{
  width:34px;height:34px;fill:none;stroke:var(--secondary);stroke-width:2;
  stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:30;stroke-dashoffset:30;
  animation:successCheck .7s .25s ease forwards;
}
.success-modal-label{display:inline-block;margin-bottom:10px;font-size:11px;font-weight:600;color:var(--secondary);}
.success-modal-content h2{margin:0 0 12px;font-size:clamp(24px,4.6vw,32px);}
.success-modal-content p{max-width:390px;margin:0 auto 20px;font-size:14.5px;line-height:1.7;color:var(--text-secondary);}
.success-modal-status{
  display:inline-flex;align-items:center;gap:9px;margin-bottom:26px;padding:8px 13px;
  border:1px solid var(--border);border-radius:var(--radius-sm);background:var(--surface-2);
  font-size:11px;color:var(--text-secondary);
}
.status-dot{width:7px;height:7px;border-radius:50%;background:var(--secondary);animation:statusBlink 1.5s ease-in-out infinite;}
.success-modal-button{
  width:100%;padding:14px 20px;border:none;border-radius:var(--radius-sm);
  background:var(--primary-ink);color:#fff;font-size:14px;font-weight:600;cursor:pointer;
  transition:transform .25s ease, box-shadow .25s ease;
}
.success-modal-button:hover{transform:translateY(-2px);box-shadow:0 14px 32px rgba(57,81,171,.3);}

@keyframes successRing{0%{opacity:.7;transform:scale(.95);}100%{opacity:0;transform:scale(1.25);}}
@keyframes successCheck{to{stroke-dashoffset:0;}}
@keyframes statusBlink{0%,100%{opacity:1;}50%{opacity:.35;}}

@media(max-width:600px){
  .success-modal{padding:16px;}
  .success-modal-card{padding:38px 22px 26px;border-radius:var(--radius-md);}
  .success-icon{width:68px;height:68px;}
  .success-icon svg{width:30px;height:30px;}
  .success-icon svg{width:30px;height:30px;}
  .success-modal-content h2{font-size:26px;}
}

</style>
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
      <img class="brand-mark" src="{{ asset('logo-lockup.svg') }}" alt="Ward Wide Learning">
      <span>Ward Wide Learning</span>
    </div>
    <div class="nav-links" id="navLinks">
      <a href="{{ route('home') }}#expertises">Expertises</a>
      <a href="{{ route('solutions') }}" class="active">Solutions</a>
      <a href="{{ route('home') }}#insights">Insights</a>
      <a href="{{ route('home') }}#apropos">À propos</a>
      <a href="{{ route('home') }}#contact">Contact</a>
    </div>
    <div class="nav-actions">
      <button class="theme-toggle" id="themeToggle" type="button" aria-label="Activer le mode clair"></button>
      <button class="nav-burger" id="navBurger" type="button" aria-label="Ouvrir le menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
      <a href="#contact" class="nav-cta">Diagnostic offert</a>
    </div>
  </nav>
</header>

<!-- =========================
     HERO DE PAGE
========================= -->
{{-- <section class="page-hero" id="solutions-hero">
  <div class="wrap">
    <span class="kicker reveal">Vos enjeux, nos solutions</span>
    <h1 class="reveal reveal-delay-1">Des solutions conçues pour vos enjeux Learning.</h1>
    <p class="lead reveal reveal-delay-2">Qu'il s'agisse de repenser un dispositif existant, de digitaliser un parcours, de structurer une académie ou de mieux mesurer l'impact de la formation, nous construisons des solutions adaptées à votre contexte, vos publics et vos objectifs.</p>
    <div class="btn-row reveal reveal-delay-3">
      <a href="#contact" class="btn-primary">Faire le diagnostic offert <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
      <a href="#check" class="btn-ghost">Tester mon Impact Coverage <i data-lucide="arrow-down" aria-hidden="true"></i></a>
    </div>
    <div class="solutions-jump reveal reveal-delay-4">
      <a href="#learning-impact"><span class="jump-dot"></span>Learning Impact</a>
      <a href="#digital-learning"><span class="jump-dot"></span>Digital Learning</a>
      <a href="#pit-stop"><span class="jump-dot"></span>Pit Stop Learning</a>
      <a href="#academies"><span class="jump-dot"></span>Académies & parcours</a>
      <a href="#assessment"><span class="jump-dot"></span>Assessment & Positioning</a>
      <a href="#management"><span class="jump-dot"></span>Management & Human Performance</a>
    </div>
  </div>
</section> --}}

<!-- =========================
     HERO DE PAGE
========================= -->
<section class="page-hero" id="solutions-hero">
    <div class="wrap">

        <div class="hero-layout">

            <!-- CONTENU -->
            <div class="hero-content">

                <span class="kicker reveal">
                    Vos enjeux, nos solutions
                </span>

                <h1 class="reveal reveal-delay-1">
                    Des solutions conçues pour vos enjeux Learning.
                </h1>

                <p class="lead reveal reveal-delay-2">
                    Qu'il s'agisse de repenser un dispositif existant,
                    de digitaliser un parcours, de structurer une académie
                    ou de mieux mesurer l'impact de la formation, nous
                    construisons des solutions adaptées à votre contexte,
                    vos publics et vos objectifs.
                </p>

                <div class="btn-row reveal reveal-delay-3">
                    <a href="#contact" class="btn-primary">
                        Faire le diagnostic offert
                        <i data-lucide="arrow-up-right" aria-hidden="true"></i>
                    </a>

                    <a href="#check" class="btn-ghost">
                        Tester mon Impact Coverage
                        <i data-lucide="arrow-down" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="solutions-jump reveal reveal-delay-4">
                    <a href="#learning-impact">
                        <span class="jump-dot"></span>
                        Learning Impact
                    </a>

                    <a href="#digital-learning">
                        <span class="jump-dot"></span>
                        Digital Learning
                    </a>

                    <a href="#pit-stop">
                        <span class="jump-dot"></span>
                        Pit Stop Learning
                    </a>

                    <a href="#academies">
                        <span class="jump-dot"></span>
                        Académies & parcours
                    </a>

                    <a href="#assessment">
                        <span class="jump-dot"></span>
                        Assessment & Positioning
                    </a>

                    <a href="#management">
                        <span class="jump-dot"></span>
                        Management & Human Performance
                    </a>
                </div>

            </div>


            <!-- VISUEL HERO -->
            <div class="hero-visual reveal reveal-delay-2">

                <div class="hero-image-card">

                    <div class="hero-image-frame">

                        <img
                            src="img3.png"
                            alt="Innovation et transformation des expériences Learning"
                        >

                        <div class="hero-image-overlay"></div>

                    </div>


                    <!-- Étiquette -->
                    <div class="hero-floating-label hero-label-top">
                        <span class="label-dot"></span>
                        Learning Intelligence
                    </div>


                    <!-- Carte flottante -->
                    <div class="hero-floating-card">

                        <div class="floating-icon">
                            <i data-lucide="sparkles"></i>
                        </div>

                        <div>
                            <span class="floating-small">
                                APPROCHE
                            </span>

                            <strong>
                                Learning × Impact
                            </strong>
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

<!-- =========================
     LISTE DES SOLUTIONS — DÉTAIL
========================= -->
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

<!-- =========================
     LEARNING PERFORMANCE CHECK
========================= -->
<section id="check">
  <div class="wrap">
    <div class="interactive-card reveal">
      <div>
        <span class="kicker">Rubrique interactive</span>
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
          <h3><i data-lucide="list-checks" class="inline-icon" aria-hidden="true"></i> Vous réalisez le check en ligne</h3>
          <p>Un questionnaire court permet de recueillir une première lecture de votre dispositif.</p>
        </div>
        <div class="pillar reveal reveal-delay-1">
          <div class="pillar-marker">02</div>
          <span class="stage">Analyse</span>
          <h3><i data-lucide="search-check" class="inline-icon" aria-hidden="true"></i> Nous analysons vos réponses</h3>
          <p>WWL interprète les résultats et identifie les principaux signaux à approfondir.</p>
        </div>
        <div class="pillar reveal reveal-delay-2">
          <div class="pillar-marker">03</div>
          <span class="stage">Restitution</span>
          <h3><i data-lucide="presentation" class="inline-icon" aria-hidden="true"></i> Nous vous restituons les résultats</h3>
          <p>Un échange permet de partager les constats et d'identifier les premières priorités.</p>
        </div>
        <div class="pillar reveal reveal-delay-3">
          <div class="pillar-marker">04</div>
          <span class="stage">Approfondir</span>
          <h3><i data-lucide="microscope" class="inline-icon" aria-hidden="true"></i> Si nécessaire, nous approfondissons</h3>
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

<footer>
  <div class="wrap footer-wrap">
    <div class="brand"><img class="brand-mark" src="{{ asset('logo-lockup.svg') }}" alt="Ward Wide Learning">Ward Wide Learning</div>
    <div>Oasis Latitude Offices, Angle Route de l'Oasis, Casablanca</div>
    <div>© 2026 Ward Wide Learning</div>
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
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    /* =========================================================
   WARD WIDE LEARNING — INTERACTIVE ENGINE
   (identique à la homepage — script partagé, mêmes sélecteurs)
   ========================================================= */

(function(){
  'use strict';

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const isTouch = window.matchMedia('(pointer: coarse)').matches;
  const root = document.documentElement;

  function rafThrottle(fn){
    let ticking = false;
    return function(...args){
      if(ticking) return;
      ticking = true;
      requestAnimationFrame(() => { fn.apply(this, args); ticking = false; });
    };
  }

  /* CANVAS BACKGROUND */
  (function initCanvas(){
    const canvas = document.getElementById('bgCanvas');
    if(!canvas) return;
    const ctx = canvas.getContext('2d');
    let W, H, particles = [], mouse = {x:-1000,y:-1000};
    const PARTICLE_COUNT = isTouch ? 30 : 55;
    const CONNECTION_DIST = 140;
    const MAX_CONNECTIONS = 3;

    function resize(){
      W = canvas.width = window.innerWidth;
      H = canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    class Particle{
      constructor(){
        this.x = Math.random() * W;
        this.y = Math.random() * H;
        this.vx = (Math.random() - .5) * .3;
        this.vy = (Math.random() - .5) * .3;
        this.r = Math.random() * 1.6 + .9;
        this.alpha = Math.random() * .4 + .3;
      }
      update(){
        this.x += this.vx;
        this.y += this.vy;
        if(this.x < 0 || this.x > W) this.vx *= -1;
        if(this.y < 0 || this.y > H) this.vy *= -1;
        const dx = this.x - mouse.x;
        const dy = this.y - mouse.y;
        const dist = Math.sqrt(dx*dx + dy*dy);
        if(dist < 180){
          const force = (180 - dist) / 180;
          this.x += (dx / dist) * force * .8;
          this.y += (dy / dist) * force * .8;
        }
      }
      draw(){
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.r, 0, Math.PI*2);
        ctx.fillStyle = getComputedStyle(root).getPropertyValue('--secondary').trim();
        ctx.globalAlpha = this.alpha;
        ctx.fill();
        ctx.globalAlpha = 1;
      }
    }

    for(let i=0;i<PARTICLE_COUNT;i++) particles.push(new Particle());

    function drawConnections(){
      for(let i=0;i<particles.length;i++){
        let connections = 0;
        for(let j=i+1;j<particles.length;j++){
          const dx = particles[i].x - particles[j].x;
          const dy = particles[i].y - particles[j].y;
          const dist = Math.sqrt(dx*dx + dy*dy);
          if(dist < CONNECTION_DIST && connections < MAX_CONNECTIONS){
            ctx.beginPath();
            ctx.moveTo(particles[i].x, particles[i].y);
            ctx.lineTo(particles[j].x, particles[j].y);
            const alpha = (1 - dist/CONNECTION_DIST) * .22;
            ctx.strokeStyle = getComputedStyle(root).getPropertyValue('--secondary').trim();
            ctx.globalAlpha = alpha;
            ctx.lineWidth = .8;
            ctx.stroke();
            ctx.globalAlpha = 1;
            connections++;
          }
        }
      }
    }

    function animate(){
      if(document.hidden){ requestAnimationFrame(animate); return; }
      ctx.clearRect(0,0,W,H);
      particles.forEach(p => { p.update(); p.draw(); });
      drawConnections();
      requestAnimationFrame(animate);
    }
    if(!reducedMotion) animate();

    if(!isTouch && !reducedMotion){
      window.addEventListener('mousemove', rafThrottle((e)=>{
        mouse.x = e.clientX; mouse.y = e.clientY;
      }), {passive:true});
    }
  })();

  /* SCROLL PROGRESS */
  (function(){
    const bar = document.getElementById('scrollProgress');
    if(!bar) return;
    const update = rafThrottle(() => {
      const scrollTop = window.scrollY;
      const docHeight = document.documentElement.scrollHeight - window.innerHeight;
      const pct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
      bar.style.width = pct + '%';
    });
    window.addEventListener('scroll', update, {passive:true});
    update();
  })();

  /* SECTION NAV INDICATOR */
  (function(){
    const nav = document.querySelector('.section-nav');
    if(!nav) return;
    const links = nav.querySelectorAll('a');
    const sections = Array.from(links).map(a => document.querySelector(a.getAttribute('href')));
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if(entry.isIntersecting){
          const id = entry.target.id;
          links.forEach(l => l.classList.toggle('active', l.getAttribute('href') === '#' + id));
        }
      });
    }, {threshold: .4});
    sections.forEach(s => s && observer.observe(s));
  })();

  /* CUSTOM CURSOR */
  (function(){
    if(isTouch || window.innerWidth < 1024) return;
    const dot = document.getElementById('cursorDot');
    const ring = document.getElementById('cursorRing');
    if(!dot || !ring) return;

    let mx = 0, my = 0, rx = 0, ry = 0;
    document.addEventListener('mousemove', (e) => { mx = e.clientX; my = e.clientY; }, {passive:true});

    function loop(){
      rx += (mx - rx) * .18;
      ry += (my - ry) * .18;
      dot.style.transform = `translate(${mx}px,${my}px) translate(-50%,-50%)`;
      ring.style.transform = `translate(${rx}px,${ry}px) translate(-50%,-50%)`;
      requestAnimationFrame(loop);
    }
    loop();

    const hoverTargets = 'a, button, .solution-detail, .pillar, .checklist-panel .row, .nav-cta, .wa-fab, .success-modal-button';
    document.querySelectorAll(hoverTargets).forEach(el => {
      el.addEventListener('mouseenter', () => { dot.classList.add('hover'); ring.classList.add('hover'); });
      el.addEventListener('mouseleave', () => { dot.classList.remove('hover'); ring.classList.remove('hover'); });
    });
  })();

  /* GLOBAL CURSOR GLOW + GRID PARALLAX */
  (function(){
    const grid = document.querySelector('.field-grid');
    if(!reducedMotion && !isTouch){
      let raf = false;
      window.addEventListener('mousemove', function(e){
        if(raf) return;
        raf = true;
        requestAnimationFrame(function(){
          const mx = (e.clientX / window.innerWidth) * 100;
          const my = (e.clientY / window.innerHeight) * 100;
          root.style.setProperty('--mx', mx + '%');
          root.style.setProperty('--my', my + '%');
          raf = false;
        });
      }, { passive: true });
    }
    if(grid && !reducedMotion){
      let ticking = false;
      window.addEventListener('scroll', function(){
        if(ticking) return;
        ticking = true;
        requestAnimationFrame(function(){
          const shift = (window.scrollY * 0.06) % 72;
          grid.style.setProperty('--scrollShift', shift + 'px');
          ticking = false;
        });
      }, { passive: true });
    }
  })();

  /* REVEAL ON SCROLL */
  (function(){
    const revealEls = document.querySelectorAll('.reveal');
    if(!revealEls.length) return;
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if(entry.isIntersecting){
          entry.target.classList.add('in');
          observer.unobserve(entry.target);
        }
      });
    }, {threshold: 0.12});
    revealEls.forEach(el => observer.observe(el));
  })();

  /* THEME TOGGLE */
  (function(){
    const toggle = document.getElementById('themeToggle');
    if(!toggle) return;
    const sunIcon = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2.4M12 19.6V22M4.93 4.93l1.7 1.7M17.37 17.37l1.7 1.7M2 12h2.4M19.6 12H22M4.93 19.07l1.7-1.7M17.37 6.63l1.7-1.7"/></svg>';
    const moonIcon = '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.35 15.35A9 9 0 018.65 3.65 9 9 0 1020.35 15.35z"/></svg>';

    function apply(theme){
      root.setAttribute('data-theme', theme);
      toggle.innerHTML = theme === 'light' ? moonIcon : sunIcon;
      toggle.setAttribute('aria-label', theme === 'light' ? 'Activer le mode sombre' : 'Activer le mode clair');
      localStorage.setItem('wwl-theme', theme);
    }

    const saved = localStorage.getItem('wwl-theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    apply(saved || (prefersDark ? 'dark' : 'dark'));

    toggle.addEventListener('click', () => {
      const next = root.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
      apply(next);
    });
  })();

  /* MOBILE NAVIGATION */
  (function(){
    const burger = document.getElementById('navBurger');
    const links = document.getElementById('navLinks');
    if(!burger || !links) return;
    function close(){
      links.classList.remove('open');
      burger.classList.remove('open');
      burger.setAttribute('aria-expanded', 'false');
    }
    burger.addEventListener('click', () => {
      const isOpen = links.classList.toggle('open');
      burger.classList.toggle('open', isOpen);
      burger.setAttribute('aria-expanded', String(isOpen));
    });
    links.querySelectorAll('a').forEach(a => a.addEventListener('click', close));
    document.addEventListener('click', (e) => {
      if(links.classList.contains('open') && !links.contains(e.target) && !burger.contains(e.target)) close();
    });
  })();

  /* SMOOTH ANCHOR SCROLL */
  (function(){
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e){
        const targetId = this.getAttribute('href');
        if(targetId === '#') return;
        const target = document.querySelector(targetId);
        if(target){
          e.preventDefault();
          target.scrollIntoView({behavior: reducedMotion ? 'auto' : 'smooth', block: 'start'});
        }
      });
    });
  })();

  /* WHATSAPP WIDGET */
  (function(){
    const fab = document.getElementById('waFab');
    const panel = document.getElementById('waPanel');
    const closeBtn = document.getElementById('waClose');
    const badge = document.getElementById('waBadge');
    if(!fab || !panel) return;
    function openPanel(){
      panel.classList.add('open');
      fab.setAttribute('aria-expanded', 'true');
      if(badge) badge.style.display = 'none';
    }
    function closePanel(){
      panel.classList.remove('open');
      fab.setAttribute('aria-expanded', 'false');
    }
    fab.addEventListener('click', () => {
      panel.classList.contains('open') ? closePanel() : openPanel();
    });
    if(closeBtn) closeBtn.addEventListener('click', closePanel);
    document.addEventListener('click', (e) => {
      if(panel.classList.contains('open') && !panel.contains(e.target) && !fab.contains(e.target)){
        closePanel();
      }
    });
  })();

  /* BOUTONS SOLUTIONS → FORMULAIRE (pré-remplissage de l'enjeu) */
  (function(){
    const solutionButtons = document.querySelectorAll('.seg-cta, [data-need].btn-primary');
    const needSelect = document.getElementById('need');
    const form = document.getElementById('hero-form');
    if(!solutionButtons.length) return;

    solutionButtons.forEach(button => {
      button.addEventListener('click', function(e){
        const need = button.dataset.need;
        if(!need) return;
        e.preventDefault();

        if(needSelect){
          const needOption = Array.from(needSelect.options).find(opt => opt.textContent.trim() === need);
          if(needOption){
            needSelect.value = needOption.value;
            needSelect.dispatchEvent(new Event('change', { bubbles: true }));
          }
        }
        if(form){
          form.scrollIntoView({ behavior: reducedMotion ? 'auto' : 'smooth', block: 'start' });
          setTimeout(() => {
            const firstEmpty = form.querySelector('input:not([value]), input[value=""]');
            if(firstEmpty) firstEmpty.focus();
          }, 500);
        }
      });
    });
  })();

  /* SUCCESS MODAL */
  (function(){
    const modal = document.getElementById('successModal');
    if(!modal) return;
    const closeBtn = document.getElementById('successModalClose');
    const continueBtn = document.getElementById('successModalContinue');
    const backdrop = modal.querySelector('.success-modal-backdrop');

    document.body.style.overflow = 'hidden';
    requestAnimationFrame(() => modal.classList.add('is-visible'));

    function closeModal(){
      modal.classList.remove('is-visible');
      document.body.style.overflow = '';
      setTimeout(() => modal.remove(), 500);
    }
    if(closeBtn) closeBtn.addEventListener('click', closeModal);
    if(continueBtn) continueBtn.addEventListener('click', closeModal);
    if(backdrop) backdrop.addEventListener('click', closeModal);
    document.addEventListener('keydown', (e) => { if(e.key === 'Escape') closeModal(); });
  })();

  /* LOGO — 3 CLICKS → DASHBOARD */
  (function(){
    const logo = document.getElementById('siteLogo');
    if(!logo) return;
    let clickCount = 0, clickTimer = null;
    logo.addEventListener('click', () => {
      clickCount++;
      if(clickCount === 3){
        clearTimeout(clickTimer);
        const url = logo.dataset.dashboardUrl;
        if(url) window.location.href = url;
        clickCount = 0;
        return;
      }
      clearTimeout(clickTimer);
      clickTimer = setTimeout(() => { clickCount = 0; }, 1000);
    });
  })();

  /* FORM SUBMIT LOADING STATE */
  (function(){
    const form = document.getElementById('hero-form');
    const btn = document.getElementById('submitBtn');
    if(!form || !btn) return;
    form.addEventListener('submit', () => {
      btn.disabled = true;
      btn.innerHTML = '<span style="display:inline-flex;align-items:center;gap:8px;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="animation:spin 1s linear infinite"><path d="M21 12a9 9 0 11-6.22-8.56"/></svg>Envoi en cours…</span>';
    });
  })();

})();
</script>
<script>
  if (window.lucide) lucide.createIcons();
</script>
</body>
</html>