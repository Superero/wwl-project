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
{{-- <link rel="stylesheet" href="{{ asset('style.css') }}"> --}}
<style>
    /* =========================================================
   WARD WIDE LEARNING — STYLESHEET
   Identité visuelle construite à partir du logo :
   encre marine, bleu institutionnel, sarcelle, ambre, magenta.
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
   HERO
========================= */
.hero{padding:76px 0 56px;}
.hero-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:64px;align-items:center;}
@media(max-width:940px){.hero-grid{grid-template-columns:1fr;}}

.kicker{
  display:inline-flex;align-items:center;gap:9px;
  font-size:13.5px;color:var(--text-secondary);
  padding-bottom:16px;margin-bottom:22px;border-bottom:1px solid var(--border);
  position:relative;overflow:hidden;
}
.kicker::before{content:'';width:7px;height:7px;border-radius:2px;background:var(--accent);transform:rotate(45deg);flex:0 0 auto;}

.hero h1{font-size:clamp(32px,4.4vw,54px);line-height:1.1;margin-bottom:22px;}
.hero h1 .accent-word{color:var(--primary);position:relative;display:inline-block;}
html[data-theme="light"] .hero h1 .accent-word{color:var(--primary-ink);}
.hero p.lead{font-size:17px;color:var(--text-secondary);max-width:520px;margin-bottom:32px;}

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

/* module field */
.module-field{
  --mx:50%;--my:50%;
  position:relative;
  display:grid;
  grid-template-columns:repeat(4,1fr);
  grid-template-rows:repeat(4,minmax(46px,1fr));
  gap:10px;
  aspect-ratio:1/.92;
  max-width:440px;margin:0 auto;
  perspective:800px;
}
.module-tile{
  position:relative;border-radius:var(--radius-sm);
  border:1px solid var(--border);
  background:var(--surface);
  overflow:hidden;
  display:flex;flex-direction:column;align-items:flex-start;justify-content:flex-end;
  padding:14px 16px;
  transition:transform .4s cubic-bezier(.25,.46,.45,.94), border-color .3s ease, box-shadow .3s ease;
  cursor:default;
}
.module-tile::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(220px 220px at var(--mx) var(--my), rgba(255,255,255,0.07), transparent 60%);
  opacity:0;transition:opacity .4s ease;
}
.module-field:hover .module-tile::before{opacity:1;}
.module-tile:hover{
  transform:translateZ(12px) scale(1.02);
  border-color:var(--border-strong);
  box-shadow:0 8px 24px rgba(0,0,0,.2);
}
.tile-metric{grid-column:1/4;grid-row:1/4;background:var(--surface-2);border-color:var(--border-strong);z-index:2;}
.metric-value{font-family:var(--font-mono);font-size:clamp(30px,5vw,44px);color:var(--secondary);font-weight:500;transition:color .3s ease;}
.module-field:hover .tile-metric .metric-value{color:var(--primary);}
.metric-label{font-size:12.5px;color:var(--text-secondary);margin-top:2px;}
.tile-stat{grid-column:4/5;justify-content:center;}
.tile-stat .stat-value{font-family:var(--font-mono);font-size:16px;font-weight:600;transition:transform .3s ease;}
.tile-stat:hover .stat-value{transform:scale(1.1);}
.tile-stat .stat-label{font-size:10.5px;color:var(--text-secondary);margin-top:3px;line-height:1.3;}
.tile-stat:nth-of-type(2){grid-row:1/2;}
.tile-stat:nth-of-type(3){grid-row:2/3;}
.tile-blue{border-top:3px solid var(--primary-ink);transition:border-width .3s ease;}
.tile-blue:hover{border-top-width:5px;}
.tile-blue .stat-value{color:var(--primary);}
.tile-magenta{border-top:3px solid var(--magenta);transition:border-width .3s ease;}
.tile-magenta:hover{border-top-width:5px;}
.tile-magenta .stat-value{color:var(--magenta);}
.tile-accent{grid-column:1/2;padding:0;transition:transform .5s cubic-bezier(.34,1.56,.64,1);}
.tile-amber{grid-row:4/5;background:var(--accent);}
.tile-amber:hover{transform:translateZ(20px) rotate(-2deg) scale(1.05);}
.tile-teal{grid-column:2/3;grid-row:4/5;background:var(--secondary);}
.tile-teal:hover{transform:translateZ(20px) rotate(2deg) scale(1.05);}
.tile-blank{grid-column:3/5;grid-row:4/5;border-style:dashed;}
@media(max-width:600px){.module-field{max-width:340px;}}

/* =========================
   SECTION HEADS
========================= */
.section-head{max-width:640px;margin-bottom:52px;}
.section-head .kicker{margin-bottom:16px;}
.section-head h2{font-size:clamp(25px,3vw,36px);}
.section-head p{color:var(--text-secondary);margin-top:14px;font-size:16px;}

/* =========================
   PROBLEM / CONSTAT
========================= */
.index-list{border-top:1px solid var(--border);}
.index-row{
  display:grid;grid-template-columns:64px 1fr 1.6fr;gap:28px;
  padding:30px 0;border-bottom:1px solid var(--border);
  align-items:start;
  transition:background .3s ease, padding-left .3s ease, border-color .3s ease;
  cursor:default;position:relative;
}
.index-row::before{
  content:'';position:absolute;left:0;top:0;bottom:0;width:3px;background:var(--tag-color,var(--primary));
  transform:scaleY(0);transition:transform .4s cubic-bezier(.25,.46,.45,.94);
}
.index-row:hover{padding-left:16px;background:var(--surface);border-color:var(--border-strong);}
.index-row:hover::before{transform:scaleY(1);}
.index-row .num{font-family:var(--font-mono);font-size:14px;color:var(--text-secondary);padding-top:3px;transition:color .3s ease;}
.index-row:hover .num{color:var(--tag-color,var(--primary));}
.index-row h3{font-size:19px;font-weight:600;transition:transform .3s ease;}
.index-row:hover h3{transform:translateX(4px);}
.index-row .tag{display:block;font-size:11.5px;color:var(--tag-color, var(--primary));margin-bottom:8px;transition:letter-spacing .3s ease;}
.index-row:hover .tag{letter-spacing:.05em;}
.index-row p{color:var(--text-secondary);font-size:15px;max-width:44ch;}
.index-row:nth-child(1){--tag-color:var(--primary-ink);}
.index-row:nth-child(2){--tag-color:var(--secondary);}
.index-row:nth-child(3){--tag-color:var(--magenta);}
@media(max-width:700px){
  .index-row{grid-template-columns:40px 1fr;}
  .index-row p{grid-column:2/3;max-width:none;}
  .index-row:hover{padding-left:10px;}
}

/* =========================
   SEGMENTS
========================= */
.seg-tabs{display:flex;gap:6px;flex-wrap:wrap;margin-bottom:0;border-bottom:1px solid var(--border);position:relative;}
.seg-tabs::after{
  content:'';position:absolute;bottom:-1px;height:2px;background:var(--primary-ink);
  transition:left .4s cubic-bezier(.25,.46,.45,.94), width .4s cubic-bezier(.25,.46,.45,.94);
}
.seg-tab{
  font-family:var(--font-body);font-size:13.5px;font-weight:500;padding:12px 4px;margin-right:22px;
  border:none;border-bottom:2px solid transparent;color:var(--text-secondary);cursor:pointer;background:transparent;
  transition:color .3s ease;position:relative;white-space:nowrap;
}
.seg-tab:hover{color:var(--text-primary);}
.seg-tab.active{color:var(--text-primary);}
.seg-panel{
  display:none;padding:40px 0 0;
  grid-template-columns:auto 1fr auto;gap:30px;align-items:center;
  opacity:0;transform:translateY(16px);
  transition:opacity .5s ease, transform .5s cubic-bezier(.25,.46,.45,.94);
}
.seg-panel.active{display:grid;opacity:1;transform:translateY(0);}
@media(max-width:720px){.seg-panel{grid-template-columns:1fr;text-align:left;}}
.seg-icon{
  width:52px;height:52px;border-radius:var(--radius-sm);background:var(--surface);border:1px solid var(--border);
  display:flex;align-items:center;justify-content:center;font-family:var(--font-mono);font-weight:600;color:var(--secondary);font-size:16px;
  transition:transform .4s cubic-bezier(.34,1.56,.64,1), box-shadow .3s ease, border-color .3s ease;
}
.seg-panel:hover .seg-icon{transform:rotate(-6deg) scale(1.08);box-shadow:0 6px 20px rgba(93,201,202,.15);border-color:var(--secondary);}
.seg-panel h3{font-size:21px;margin-bottom:8px;}
.seg-panel p{color:var(--text-secondary);font-size:15px;max-width:52ch;}
.seg-cta{
  font-family:var(--font-body);font-size:14px;font-weight:600;color:var(--primary-ink);
  border-bottom:1px solid var(--primary-ink);padding-bottom:2px;white-space:nowrap;
  position:relative;transition:all .3s ease;
}
.seg-cta::after{
  content:'→';position:absolute;right:-18px;opacity:0;transform:translateX(-4px);
  transition:all .3s ease;
}
.seg-cta:hover{padding-right:18px;}
.seg-cta:hover::after{opacity:1;transform:translateX(0);}
html[data-theme="dark"] .seg-cta,:root .seg-cta{color:var(--primary);border-color:var(--primary);}

/* =========================
   PILLARS
========================= */
.pit-lane{position:relative;padding-top:6px;}
.pit-track{position:absolute;top:22px;left:5%;right:5%;height:1px;background:var(--border);}
.pillars{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;position:relative;}
@media(max-width:860px){.pillars{grid-template-columns:1fr;}.pit-track{display:none;}}
.pillar{
  background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);padding:30px 26px;
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
.pillar h3{font-size:19px;margin:10px 0;}
.pillar p{color:var(--text-secondary);font-size:14.5px;}

/* =========================
   ABOUT
========================= */
.about-wrap{display:grid;grid-template-columns:1.05fr .95fr;gap:60px;align-items:center;}
@media(max-width:860px){.about-wrap{grid-template-columns:1fr;}}
.about-wrap p{color:var(--text-secondary);font-size:15.5px;margin-bottom:18px;}
.badge-row{display:flex;gap:12px;flex-wrap:wrap;margin-top:8px;}
.badge{
  font-size:12.5px;border:1px solid var(--border);border-radius:var(--radius-sm);
  padding:11px 15px;color:var(--text-secondary);background:var(--surface);
  transition:all .3s ease;position:relative;overflow:hidden;
}
.badge::before{
  content:'';position:absolute;inset:0;background:var(--secondary);opacity:0;
  transition:opacity .3s ease;
}
.badge:hover{border-color:var(--secondary);transform:translateY(-2px);box-shadow:0 6px 16px rgba(93,201,202,.1);}
.badge:hover::before{opacity:.04;}
.badge .v{display:block;color:var(--secondary);font-size:14.5px;font-weight:600;margin-bottom:3px;position:relative;}
.about-panel{
  background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);padding:8px 30px;
  font-size:14px;transition:box-shadow .4s ease, border-color .3s ease;
}
.about-panel:hover{box-shadow:0 12px 32px rgba(0,0,0,.15);border-color:var(--border-strong);}
.about-panel .row{display:flex;justify-content:space-between;padding:16px 0;border-bottom:1px solid var(--border);gap:16px;transition:padding-left .3s ease;}
.about-panel .row:last-child{border-bottom:none;}
.about-panel .row:hover{padding-left:8px;}
.about-panel .row span:first-child{color:var(--text-secondary);transition:color .3s ease;}
.about-panel .row:hover span:first-child{color:var(--text-primary);}
.about-panel .row .v{color:var(--text-primary);font-weight:500;text-align:right;}

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
.mini-stats{display:flex;gap:22px;flex-wrap:wrap;}
.mini-stats div{font-size:12px;color:var(--text-secondary);transition:transform .3s ease;}
.mini-stats div:hover{transform:translateY(-2px);}
.mini-stats .n{display:block;font-family:var(--font-mono);color:var(--accent);font-size:19px;font-weight:600;transition:color .3s ease;}
.mini-stats div:hover .n{color:var(--secondary);}

form{display:flex;flex-direction:column;gap:14px;}
.field-row{position:relative;}
.field-row label{
  font-size:12px;color:var(--text-secondary);display:block;margin-bottom:6px;
  transition:color .3s ease, transform .3s ease;
}
.field-row:focus-within label{color:var(--primary);transform:translateX(2px);}
.field-row input, .field-row select{
  width:100%;background:var(--bg-soft);border:1px solid var(--border);border-radius:var(--radius-sm);
  padding:12px 14px;color:var(--text-primary);font-family:var(--font-body);font-size:14px;outline:none;
  transition:border-color .3s ease, box-shadow .3s ease, transform .3s ease;
}
.field-row input:focus, .field-row select:focus{
  border-color:var(--primary-ink);
  box-shadow:0 0 0 3px rgba(57,81,171,.12);
  transform:translateY(-1px);
}
.field-row input::placeholder{color:var(--text-secondary);opacity:.5;}
.field-row select{appearance:none;cursor:pointer;}
.field-row .select-arrow{
  position:absolute;right:14px;top:50%;transform:translateY(-50%);
  width:0;height:0;border-left:4px solid transparent;border-right:4px solid transparent;
  border-top:4px solid var(--text-secondary);pointer-events:none;
  transition:border-color .3s ease;
}
.field-row:focus-within .select-arrow{border-top-color:var(--primary);}
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
/* =========================
   RESPONSIVE — MOBILE FIXES
========================= */

@media(max-width: 768px){
  /* Hero : réduction des espacements */
  .hero{padding: 56px 0 40px;}
  .hero-grid{gap: 40px;}
  .hero h1{font-size: clamp(26px, 7vw, 40px);}
  .hero p.lead{font-size: 15.5px;}
  .nav-cta{display: none;}
  /* Boutons : pleine largeur empilés */
  .btn-row{flex-direction: column; width: 100%;}
  .btn-primary, .btn-ghost{
    width: 100%;
    justify-content: center;
    text-align: center;
    padding: 13px 20px;
    font-size: 14.5px;
  }

  /* Module field : adapté à l'écran */
  .module-field{
    max-width: 100%;
    gap: 8px;
    aspect-ratio: 1 / 0.85;
  }
  .module-tile{padding: 10px 12px;}
  .metric-value{font-size: clamp(24px, 8vw, 32px);}
  .tile-stat .stat-value{font-size: 14px;}
  .tile-stat .stat-label{font-size: 10px;}

  /* Sections : padding réduit */
  section{padding: 64px 0;}
  .section-head{margin-bottom: 36px;}
  .section-head h2{font-size: clamp(22px, 6vw, 28px);}

  /* Constat : lignes plus compactes */
  .index-row{padding: 24px 0; gap: 16px;}
  .index-row:hover{padding-left: 8px;}
  .index-row h3{font-size: 17px;}
  .index-row p{font-size: 14px;}

  /* Segments : scroll horizontal propre */
  .seg-tabs{
    flex-wrap: nowrap;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    padding-bottom: 4px;
    gap: 0;
  }
  .seg-tabs::after{display: none;} /* indicateur masqué sur mobile */
  .seg-tab{
    margin-right: 18px;
    font-size: 13px;
    padding: 10px 2px;
    white-space: nowrap;
    flex: 0 0 auto;
  }
  .seg-panel{
    padding: 28px 0 0;
    gap: 20px;
    text-align: left;
  }
  .seg-icon{
    width: 44px;
    height: 44px;
    font-size: 14px;
  }
  .seg-panel h3{font-size: 18px;}
  .seg-panel p{font-size: 14px;}

  /* Pillars : padding réduit */
  .pillar{padding: 24px 20px;}
  .pillar h3{font-size: 17px;}
  .pillar p{font-size: 13.5px;}

  /* About : gap réduit */
  .about-wrap{gap: 36px;}
  .about-panel{padding: 6px 20px;}
  .about-panel .row{padding: 14px 0; font-size: 13px;}
  .badge-row{gap: 8px;}
  .badge{padding: 10px 12px; font-size: 11.5px;}

  /* Contact : plus compact */
  .contact-card{padding: 28px 20px; gap: 32px;}
  .contact-card h2{font-size: 22px;}
  .mini-stats{justify-content: flex-start; gap: 16px;}
  .mini-stats .n{font-size: 17px;}
  .field-row input, .field-row select{padding: 11px 12px;}

  /* Footer : centré en colonne */
  .footer-wrap{
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 10px;
  }
  .footer-wrap .brand{font-size: 13px;}
}

@media(max-width: 480px){
  /* Très petits écrans : 375–430px */
  .wrap{padding: 0 16px;}
  .nav-cta{display: none;}
  .module-field{
    gap: 6px;
    grid-template-rows: repeat(4, minmax(36px, 1fr));
  }
  .module-tile{padding: 8px 10px;}
  .metric-value{font-size: 22px;}
  .metric-label{font-size: 11px;}

  .kicker{font-size: 12px; padding-bottom: 12px; margin-bottom: 16px;}

  .index-row{grid-template-columns: 32px 1fr; gap: 12px;}
  .index-row .num{font-size: 12px;}

  .pillar{padding: 20px 16px;}

  .contact-card{padding: 24px 16px; border-radius: var(--radius-md);}
  .contact-card::before{height: 3px;}

  .about-panel .row{flex-direction: column; gap: 4px; align-items: flex-start;}
  .about-panel .row .v{text-align: left;}

  .success-modal{padding: 12px;}
  .success-modal-card{padding: 32px 18px 24px;}
  .success-icon{width: 60px; height: 60px;}
  .success-icon svg{width: 26px; height: 26px;}

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
                    Parfait, merci
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
  <a href="#constat" data-label="Constat" aria-label="Le constat"></a>
  <a href="#enjeux" data-label="Enjeux" aria-label="Votre enjeu"></a>
  <a href="#solution" data-label="Solution" aria-label="Solution"></a>
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
      <img class="brand-mark" src="{{ asset('logo-lockup.svg') }}" alt="Ward Wide Learning">
      <span>Ward Wide Learning</span>
    </div>
    <div class="nav-links" id="navLinks">
      <a href="#constat">Le constat</a>
      <a href="#enjeux">Votre enjeu</a>
      <a href="#solution">Solution</a>
      <a href="#apropos">À propos</a>
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

<section class="hero" id="hero">
  <div class="wrap hero-grid">
    <div>
      <span class="kicker reveal">Diagnostic offert · Partenaire digital</span>
      <h1 class="reveal reveal-delay-1">Faites de la formation un levier de performance <span class="accent-word">mesurable</span>, sans répétition.</h1>
      <p class="lead reveal reveal-delay-2">Que vous cherchiez à automatiser l'accueil de vos équipes terrain ou à prouver le ROI de vos budgets formation auprès du COMEX, nous concevons des dispositifs digitaux et d'évaluation sur-mesure.</p>
      <div class="btn-row reveal reveal-delay-3">
        <a href="#contact" class="btn-primary">Demander une consultation</a>
        <a href="#solution" class="btn-ghost">Voir la méthode</a>
      </div>
    </div>
    <div class="module-field reveal reveal-delay-2">
      <div class="module-tile tile-metric">
        <span class="metric-value" id="roiCounter">0%</span>
        <span class="metric-label">ROI formation moyen</span>
      </div>
      <div class="module-tile tile-stat tile-blue">
        <span class="stat-value">-60%</span>
        <span class="stat-label">Temps de formation</span>
      </div>
      <div class="module-tile tile-stat tile-magenta">
        <span class="stat-value">100%</span>
        <span class="stat-label">Traçabilité audit</span>
      </div>
      <div class="module-tile tile-accent tile-amber"></div>
      <div class="module-tile tile-accent tile-teal"></div>
      <div class="module-tile tile-blank"></div>
    </div>
  </div>
</section>

<section id="constat">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Le constat</span>
      <h2>Le problème universel des formations en entreprise</h2>
    </div>
    <div class="index-list">
      <div class="index-row reveal">
        <span class="num">01</span>
        <div>
          <span class="tag">Coût</span>
          <h3>Des coûts répétitifs</h3>
        </div>
        <p>Mobiliser vos experts et vos managers pour réexpliquer en boucle les mêmes bases brûle du temps et du budget.</p>
      </div>
      <div class="index-row reveal reveal-delay-1">
        <span class="num">02</span>
        <div>
          <span class="tag">Conformité</span>
          <h3>Une traçabilité complexe</h3>
        </div>
        <p>Préparer vos audits ou suivre l'assimilation réelle des procédures reste un casse-tête opérationnel.</p>
      </div>
      <div class="index-row reveal reveal-delay-2">
        <span class="num">03</span>
        <div>
          <span class="tag">Impact</span>
          <h3>Un ROI invisible</h3>
        </div>
        <p>Mesurer la satisfaction « à chaud » ne garantit aucun changement de comportement durable sur le terrain.</p>
      </div>
    </div>
  </div>
</section>

<section id="enjeux">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">C'est vous ?</span>
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
      <a href="#contact" data-role="Directeur de centre d'appels" data-need="Onboarding de nouvelles recrues" class="seg-cta">Voir la solution</a>
    </div>
    <div class="seg-panel" id="seg2">
      <div class="seg-icon">02</div>
      <div>
        <h3>Intégration & formations de masse</h3>
        <p>Digitalisation des parcours récurrents pour former des volumes importants sans mobiliser vos experts internes.</p>
      </div>
      <a href="#contact" data-role="Responsable formation / L&D" data-need="Formation de volumes importants" class="seg-cta">Voir la solution</a>
    </div>
    <div class="seg-panel" id="seg3">
      <div class="seg-icon">03</div>
      <div>
        <h3>Industrie & QHSE</h3>
        <p>Validation 100 % conforme des consignes de sécurité et de qualité, avec traçabilité complète pour vos audits.</p>
      </div>
      <a href="#contact" data-role="Responsable QHSE" data-need="Conformité et traçabilité QHSE" class="seg-cta">Voir la solution</a>
    </div>
    <div class="seg-panel" id="seg4">
      <div class="seg-icon">04</div>
      <div>
        <h3>Directions RH & L&D</h3>
        <p>Passage d'un reporting de présence à une démonstration d'impact réel basée sur le modèle Kirkpatrick.</p>
      </div>
      <a href="#contact" data-role="Responsable formation / L&D" data-need="Mesure du ROI formation" class="seg-cta">Voir la solution</a>
    </div>
    <div class="seg-panel" id="seg5">
      <div class="seg-icon">05</div>
      <div>
        <h3>Direction générale & COMEX</h3>
        <p>Pilotage du budget formation par la donnée de performance et un retour sur investissement démontré.</p>
      </div>
      <a href="#contact" data-role="Direction générale / COMEX" data-need="Mesure du ROI formation" class="seg-cta">Voir la solution</a>
    </div>
  </div>
</section>

<section id="solution">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Notre solution</span>
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
        <div class="pillar reveal reveal-delay-1">
          <div class="pillar-marker">02</div>
          <span class="stage">Design</span>
          <h3>Méthodologie agile « Pit Stop »</h3>
          <p>Diagnostic rapide, scénarisation pédagogique et déploiement fluide pour zéro temps d'arrêt de production.</p>
        </div>
        <div class="pillar reveal reveal-delay-2">
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
      <span class="kicker">À propos</span>
      <h2 style="font-size:clamp(23px,3vw,30px);margin-bottom:18px;">Ward Wide Learning</h2>
      <p>Chaque dispositif est conçu par une équipe d'experts certifiés en ingénierie pédagogique, en évaluation Kirkpatrick & ITE (Institute for Transfer Effectiveness) et en ingénierie digitale.</p>
      <p>Nous accompagnons les organisations sur la durée, pour transformer la formation en moteur de croissance durable plutôt qu'en centre de coûts.</p>
      <div class="badge-row">
        <div class="badge"><span class="v">Kirkpatrick ITE</span>Certification officielle</div>
        <div class="badge"><span class="v">Pit Stop</span>Méthode propriétaire</div>
      </div>
    </div>
    <div class="about-panel reveal reveal-delay-2">
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
        <span class="kicker">Échangeons sur votre projet</span>
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
          <div class="field-row">
            <label for="name">Nom & prénom</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Votre nom complet">
          </div>
          <div class="field-row">
            <label for="phone">Téléphone</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="+212 6 00 00 00 00">
          </div>
          <div class="field-row">
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
            <span class="select-arrow"></span>
          </div>
          <div class="field-row">
            <label for="need">Votre enjeu principal</label>
            <select id="need" name="need" required>
              <option value="" disabled selected>Sélectionnez votre enjeu</option>
              <option>Onboarding de nouvelles recrues</option>
              <option>Conformité et traçabilité QHSE</option>
              <option>Mesure du ROI formation</option>
              <option>Formation de volumes importants</option>
              <option>Autre besoin</option>
            </select>
            <span class="select-arrow"></span>
          </div>
          <button type="submit" class="btn-primary" id="submitBtn">
            <span>Demander une consultation</span>
          </button>
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
    <div class="wa-bubble">👋 Bonjour ! Une question sur nos dispositifs de formation ou notre méthode « Pit Stop » ? Écrivez-nous, on vous répond rapidement.</div>
    <a class="wa-cta" id="waLink" href="https://wa.me/212699712087?text=Bonjour%20Ward%20Wide%20Learning%2C%20je%20souhaite%20des%20informations%20sur%20vos%20formations." target="_blank" rel="noopener">
      <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.01 3C9.38 3 4 8.38 4 15.01c0 2.35.65 4.54 1.78 6.42L4 29l7.76-1.75c1.79.98 3.86 1.54 6.25 1.54 6.63 0 12.01-5.38 12.01-12.01C30.02 8.38 24.64 3 16.01 3z"/></svg>
      Démarrer la discussion
    </a>
  </div>
</div>

{{-- <script src="{{ asset('script.js') }}"></script> --}}
<script>
    /* =========================================================
   WARD WIDE LEARNING — INTERACTIVE ENGINE
   ========================================================= */

(function(){
  'use strict';

  /* =========================
     UTILS
  ========================= */
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

  /* =========================
     CANVAS BACKGROUND — Subtle connected nodes
  ========================= */
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

        // gentle mouse repulsion
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

    let frame = 0;
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

  /* =========================
     SCROLL PROGRESS
  ========================= */
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

  /* =========================
     SECTION NAV INDICATOR
  ========================= */
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

  /* =========================
     CUSTOM CURSOR
  ========================= */
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

    const hoverTargets = 'a, button, .module-tile, .pillar, .badge, .index-row, .seg-tab, .nav-cta, .wa-fab, .success-modal-button';
    document.querySelectorAll(hoverTargets).forEach(el => {
      el.addEventListener('mouseenter', () => { dot.classList.add('hover'); ring.classList.add('hover'); });
      el.addEventListener('mouseleave', () => { dot.classList.remove('hover'); ring.classList.remove('hover'); });
    });
  })();

  /* =========================
     GLOBAL CURSOR GLOW + GRID PARALLAX
  ========================= */
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

  /* =========================
     MODULE FIELD 3D HOVER
  ========================= */
  (function(){
    const field = document.querySelector('.module-field');
    if(!field) return;
    const canAnimate = window.innerWidth > 780 && !reducedMotion;
    if(!canAnimate) return;
    let ticking = false;
    field.addEventListener('mousemove', function(e){
      if(ticking) return;
      requestAnimationFrame(function(){
        const rect = field.getBoundingClientRect();
        const mx = ((e.clientX - rect.left) / rect.width) * 100;
        const my = ((e.clientY - rect.top) / rect.height) * 100;
        field.style.setProperty('--mx', mx + '%');
        field.style.setProperty('--my', my + '%');
        ticking = false;
      });
      ticking = true;
    });
  })();

  /* =========================
     ROI COUNTER ANIMATION
  ========================= */
  (function(){
    const el = document.getElementById('roiCounter');
    if(!el) return;
    let started = false;
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if(entry.isIntersecting && !started){
          started = true;
          let val = 0;
          const target = 38;
          const step = () => {
            val += 1;
            el.textContent = '+' + val + '%';
            if(val < target) requestAnimationFrame(() => setTimeout(step, 28));
          };
          step();
          observer.unobserve(el);
        }
      });
    }, {threshold: .5});
    observer.observe(el);
  })();

  /* =========================
     SEGMENT TABS — with sliding indicator
  ========================= */
  (function(){
    const tabsContainer = document.getElementById('segTabs');
    if(!tabsContainer) return;
    const tabs = tabsContainer.querySelectorAll('.seg-tab');
    const panels = document.querySelectorAll('.seg-panel');
    const indicator = document.createElement('div');
    indicator.style.cssText = 'position:absolute;bottom:-1px;height:2px;background:var(--primary-ink);transition:left .4s cubic-bezier(.25,.46,.45,.94),width .4s cubic-bezier(.25,.46,.45,.94);';
    tabsContainer.appendChild(indicator);

    function moveIndicator(tab){
      indicator.style.left = tab.offsetLeft + 'px';
      indicator.style.width = tab.offsetWidth + 'px';
    }

    const activeTab = tabsContainer.querySelector('.seg-tab.active');
    if(activeTab) moveIndicator(activeTab);

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        panels.forEach(p => p.classList.remove('active'));
        tab.classList.add('active');
        const target = document.getElementById(tab.dataset.target);
        if(target){
          target.classList.add('active');
          // reflow to restart transition
          void target.offsetWidth;
        }
        moveIndicator(tab);
      });
    });
  })();

  /* =========================
     REVEAL ON SCROLL
  ========================= */
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

  /* =========================
     THEME TOGGLE
  ========================= */
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
    apply(saved || (prefersDark ? 'dark' : 'dark')); // default dark as per design

    toggle.addEventListener('click', () => {
      const next = root.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
      apply(next);
    });
  })();

  /* =========================
     MOBILE NAVIGATION
  ========================= */
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

  /* =========================
     SMOOTH ANCHOR SCROLL
  ========================= */
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

  /* =========================
     WHATSAPP WIDGET
  ========================= */
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

  /* =========================
     SOLUTION BUTTONS → FORM
  ========================= */
  (function(){
    const solutionButtons = document.querySelectorAll('.seg-cta');
    const roleSelect = document.getElementById('role');
    const needSelect = document.getElementById('need');
    const form = document.getElementById('hero-form');
    if(!solutionButtons.length) return;

    solutionButtons.forEach(button => {
      button.addEventListener('click', function(e){
        e.preventDefault();
        const role = button.dataset.role;
        const need = button.dataset.need;

        if(roleSelect && role){
          const roleOption = Array.from(roleSelect.options).find(opt => opt.textContent.trim() === role);
          if(roleOption){
            roleSelect.value = roleOption.value;
            roleSelect.dispatchEvent(new Event('change', { bubbles: true }));
          }
        }
        if(needSelect && need){
          const needOption = Array.from(needSelect.options).find(opt => opt.textContent.trim() === need);
          if(needOption){
            needSelect.value = needOption.value;
            needSelect.dispatchEvent(new Event('change', { bubbles: true }));
          }
        }
        if(form){
          form.scrollIntoView({ behavior: reducedMotion ? 'auto' : 'smooth', block: 'start' });
          // focus first empty field
          setTimeout(() => {
            const firstEmpty = form.querySelector('input:not([value]), input[value=""], select');
            if(firstEmpty) firstEmpty.focus();
          }, 500);
        }
      });
    });
  })();

  /* =========================
     SUCCESS MODAL
  ========================= */
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

  /* =========================
     LOGO — 3 CLICKS → DASHBOARD
  ========================= */
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

  /* =========================
     FORM SUBMIT LOADING STATE
  ========================= */
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
</body>
</html>