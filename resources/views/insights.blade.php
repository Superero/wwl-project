<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insights — Ward Wide Learning</title>
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
   SECTION HEADS
========================= */
.section-head{max-width:640px;margin-bottom:52px;}
.section-head .kicker{margin-bottom:16px;}
.section-head h2{font-size:clamp(25px,3vw,36px);}
.section-head p{color:var(--text-secondary);margin-top:14px;font-size:16px;}
.section-head-cta{margin-top:28px;}

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
   INSIGHTS — HERO
========================= */
.insights-hero{padding:72px 0 40px;}
.insights-hero h1{font-size:clamp(32px,4.4vw,52px);line-height:1.1;max-width:16ch;margin-bottom:18px;}
.insights-hero p.lead{font-size:16.5px;color:var(--text-secondary);max-width:56ch;margin-bottom:36px;}

.insight-filters{display:flex;gap:10px;flex-wrap:wrap;}
.filter-pill{
  font-family:var(--font-mono);font-size:12.5px;color:var(--text-secondary);
  border:1px solid var(--border);border-radius:20px;padding:9px 16px;
  background:var(--surface);cursor:pointer;transition:all .25s ease;white-space:nowrap;
}
.filter-pill:hover{border-color:var(--border-strong);color:var(--text-primary);}
.filter-pill.active{background:var(--primary-ink);border-color:var(--primary-ink);color:#fff;}

/* =========================
   FEATURED INSIGHT
========================= */
.featured-insight{
  display:grid;grid-template-columns:1.1fr 1fr;gap:0;
  background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-lg);
  overflow:hidden;transition:border-color .3s ease, box-shadow .4s ease;
}
.featured-insight:hover{border-color:var(--border-strong);box-shadow:0 24px 60px rgba(0,0,0,.22);}
.featured-thumb{
  position:relative;min-height:280px;
  background:
    radial-gradient(420px 280px at 15% 10%, rgba(93,201,202,.20), transparent 65%),
    radial-gradient(360px 260px at 90% 90%, rgba(57,81,171,.22), transparent 60%),
    linear-gradient(135deg, var(--surface-2), var(--bg-soft));
}
.featured-thumb::after{
  content:'';position:absolute;inset:0;
  background-image:linear-gradient(var(--border) 1px, transparent 1px),linear-gradient(90deg, var(--border) 1px, transparent 1px);
  background-size:36px 36px;opacity:.5;
  mask-image:radial-gradient(ellipse 80% 80% at 50% 50%, black 20%, transparent 85%);
}
.featured-body{padding:44px 44px 40px;display:flex;flex-direction:column;justify-content:center;gap:14px;}
.featured-label{font-family:var(--font-mono);font-size:11px;color:var(--secondary);letter-spacing:.04em;}
.featured-body h3{font-size:clamp(21px,2.4vw,28px);line-height:1.3;}
.featured-body p{color:var(--text-secondary);font-size:15px;max-width:44ch;}
.featured-meta{font-family:var(--font-mono);font-size:11.5px;color:var(--text-secondary);}
.featured-link{margin-top:6px;font-size:14px;font-weight:600;color:var(--primary);display:inline-flex;align-items:center;gap:6px;}
html[data-theme="light"] .featured-link{color:var(--primary-ink);}
@media(max-width:860px){
  .featured-insight{grid-template-columns:1fr;}
  .featured-thumb{min-height:180px;}
  .featured-body{padding:30px 26px;}
}

/* =========================
   INSIGHTS — GRID
========================= */
.insights-index{padding-top:12px;}
.insights-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-top:44px;}
@media(max-width:860px){.insights-grid{grid-template-columns:1fr 1fr;}}
@media(max-width:600px){.insights-grid{grid-template-columns:1fr;}}
.insight-card{
  background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);overflow:hidden;
  display:flex;flex-direction:column;
  transition:transform .4s cubic-bezier(.25,.46,.45,.94), box-shadow .4s ease, border-color .3s ease, opacity .3s ease;
}
.insight-card:hover{transform:translateY(-6px);box-shadow:0 20px 40px rgba(0,0,0,.25);border-color:var(--border-strong);}
.insight-card.is-hidden{display:none;}
.insight-thumb{
  position:relative;height:190px;overflow:hidden;background:var(--surface-2);
}
.insight-thumb::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(320px 220px at 20% 0%, rgba(93,201,202,.18), transparent 70%),
             linear-gradient(135deg, var(--surface-2), var(--bg-soft));
}
.insight-thumb::after{
  content:'';position:absolute;inset:0;
  background-image:linear-gradient(var(--border) 1px, transparent 1px),linear-gradient(90deg, var(--border) 1px, transparent 1px);
  background-size:30px 30px;opacity:.4;
  mask-image:radial-gradient(ellipse 75% 75% at 25% 20%, black 15%, transparent 80%);
  transition:transform .6s cubic-bezier(.25,.46,.45,.94);
}
.insight-card:hover .insight-thumb::after{transform:scale(1.08);}
.insight-cat{
  position:absolute;left:16px;bottom:16px;z-index:2;
  display:inline-flex;align-items:center;gap:6px;padding:7px 10px;
  border:1px solid var(--border-strong);border-radius:8px;
  background:color-mix(in srgb, var(--surface) 72%, transparent);
  backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);
  color:var(--text-primary);font-size:11px;font-family:var(--font-mono);
}
.insight-cat svg{width:14px;height:14px;stroke-width:1.8;color:var(--secondary);}
.insight-body{padding:22px 22px 24px;display:flex;flex-direction:column;gap:10px;flex:1;}
.insight-meta{font-family:var(--font-mono);font-size:11.5px;color:var(--text-secondary);}
.insight-body h3{font-size:17px;line-height:1.35;}
.insight-excerpt{color:var(--text-secondary);font-size:13.5px;line-height:1.55;}
.insight-link{margin-top:auto;font-size:13.5px;font-weight:600;color:var(--primary);display:inline-flex;align-items:center;gap:6px;}
html[data-theme="light"] .insight-link{color:var(--primary-ink);}

.no-results{
  display:none;text-align:center;padding:60px 20px;color:var(--text-secondary);font-size:14.5px;
}
.no-results.is-visible{display:block;}

/* =========================
   NEWSLETTER STRIP
========================= */
.newsletter{
  background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-lg);
  padding:44px 48px;display:grid;grid-template-columns:1.2fr 1fr;gap:36px;align-items:center;
  position:relative;overflow:hidden;
}
.newsletter::before{
  content:'';position:absolute;top:0;left:0;right:0;height:3px;
  background:linear-gradient(90deg, var(--primary-ink), var(--secondary));
}
.newsletter h3{font-size:20px;margin-bottom:8px;}
.newsletter p{color:var(--text-secondary);font-size:14.5px;max-width:42ch;}
.newsletter-form{display:flex;gap:10px;}
.newsletter-form input{
  flex:1;background:var(--bg-soft);border:1px solid var(--border);border-radius:var(--radius-sm);
  padding:13px 14px;color:var(--text-primary);font-family:var(--font-body);font-size:14px;outline:none;
  transition:border-color .3s ease, box-shadow .3s ease;
}
.newsletter-form input:focus{border-color:var(--primary-ink);box-shadow:0 0 0 3px rgba(57,81,171,.12);}
.newsletter-form input::placeholder{color:var(--text-secondary);opacity:.55;}
.newsletter-form button{
  flex:0 0 auto;font-family:var(--font-body);font-weight:600;font-size:14px;
  background:var(--primary-ink);color:#fff;padding:13px 20px;border-radius:var(--radius-sm);border:none;cursor:pointer;
  transition:transform .25s ease, box-shadow .25s ease;
}
.newsletter-form button:hover{transform:translateY(-2px);box-shadow:0 10px 24px rgba(57,81,171,.3);}
.newsletter-note{font-size:11.5px;color:var(--text-secondary);margin-top:8px;}
.newsletter-success{
  display:none;font-size:13.5px;color:var(--secondary);margin-top:8px;align-items:center;gap:7px;
}
.newsletter-success.is-visible{display:flex;}
@media(max-width:780px){
  .newsletter{grid-template-columns:1fr;padding:32px 26px;}
  .newsletter-form{flex-direction:column;}
  .newsletter-form button{width:100%;justify-content:center;display:flex;}
}

/* =========================
   FINAL CTA (reused pattern)
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
@keyframes gradientShift{0%{background-position:0% 50%;}100%{background-position:200% 50%;}}
.final-cta h2{font-size:clamp(24px,3.6vw,38px);margin-bottom:14px;}
.final-cta p{color:var(--text-secondary);font-size:15.5px;max-width:52ch;margin:0 auto 30px;}
.final-cta .btn-row{justify-content:center;}
@media(max-width:600px){.final-cta{padding:44px 24px;}}

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
  .insights-hero{padding:52px 0 32px;}
  .insights-hero h1{font-size:clamp(26px,7vw,38px);}
  .insights-hero p.lead{font-size:15px;}
  .nav-cta{display: none;}
  section{padding: 64px 0;}
  .featured-body{padding:26px 22px;}
  .final-cta{padding:40px 22px;}
  .footer-wrap{
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 10px;
  }
}
@media(max-width: 480px){
  .wrap{padding: 0 16px;}
  .nav-cta{display: none;}
  .kicker{font-size: 12px; padding-bottom: 12px; margin-bottom: 16px;}
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

<!-- SCROLL PROGRESS -->
<div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>

<!-- SECTION NAV INDICATOR -->
<nav class="section-nav" aria-label="Navigation des sections">
  <a href="#insights-top" data-label="Insights" aria-label="Insights"></a>
  <a href="#featured" data-label="À la une" aria-label="Article à la une"></a>
  <a href="#tous-les-articles" data-label="Articles" aria-label="Tous les articles"></a>
  <a href="#newsletter" data-label="Newsletter" aria-label="Newsletter"></a>
  <a href="#cta-final" data-label="Contact" aria-label="Nous contacter"></a>
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
      <a href="/#expertises">Expertises</a>
      <a href="/#solutions">Solutions</a>
      <a href="/insights" class="active">Insights</a>
      <a href="/#apropos">À propos</a>
      <a href="/#contact">Contact</a>
    </div>
    <div class="nav-actions">
      <button class="theme-toggle" id="themeToggle" type="button" aria-label="Activer le mode clair"></button>
      <button class="nav-burger" id="navBurger" type="button" aria-label="Ouvrir le menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
      <a href="/#contact" class="nav-cta">Diagnostic offert</a>
    </div>
  </nav>
</header>

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
      <div class="featured-thumb"></div>
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

<section id="newsletter">
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
</section>

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
    <div class="wa-bubble">👋 Bonjour ! Une question sur un article Insights ou sur nos solutions Learning ? Écrivez-nous, on vous répond rapidement.</div>
    <a class="wa-cta" id="waLink" href="https://wa.me/212679857317?text=Bonjour%20Ward%20Wide%20Learning%2C%20j%27ai%20une%20question%20suite%20%C3%A0%20un%20article%20Insights." target="_blank" rel="noopener">
      <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.01 3C9.38 3 4 8.38 4 15.01c0 2.35.65 4.54 1.78 6.42L4 29l7.76-1.75c1.79.98 3.86 1.54 6.25 1.54 6.63 0 12.01-5.38 12.01-12.01C30.02 8.38 24.64 3 16.01 3z"/></svg>
      Démarrer la discussion
    </a>
  </div>
</div>

{{-- <script src="{{ asset('script.js') }}"></script> --}}
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    /* =========================================================
   WARD WIDE LEARNING — INTERACTIVE ENGINE (Insights)
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

    const hoverTargets = 'a, button, .pillar, .solution-card, .badge, .index-row, .insight-card, .featured-insight, .filter-pill, .nav-cta, .wa-fab';
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
    apply(saved || 'dark');

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
     INSIGHTS — CATEGORY FILTER
  ========================= */
  (function(){
    const pills = document.querySelectorAll('#insightFilters .filter-pill');
    const cards = document.querySelectorAll('#insightsGrid .insight-card');
    const featured = document.querySelector('.featured-insight');
    const noResults = document.getElementById('noResults');
    if(!pills.length) return;

    pills.forEach(pill => {
      pill.addEventListener('click', () => {
        pills.forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
        const filter = pill.dataset.filter;
        let visibleCount = 0;

        cards.forEach(card => {
          const match = filter === 'all' || card.dataset.category === filter;
          card.classList.toggle('is-hidden', !match);
          if(match) visibleCount++;
        });

        if(featured){
          const featuredMatch = filter === 'all' || featured.dataset.category === filter;
          featured.closest('section').style.display = featuredMatch ? '' : 'none';
        }

        if(noResults) noResults.classList.toggle('is-visible', visibleCount === 0);
      });
    });
  })();

  /* =========================
     NEWSLETTER — INLINE SUCCESS STATE
  ========================= */
  (function(){
    const form = document.getElementById('newsletterForm');
    const success = document.getElementById('newsletterSuccess');
    if(!form) return;
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      form.querySelector('button').textContent = 'Inscrit(e)';
      form.querySelector('button').disabled = true;
      if(success){
        success.classList.add('is-visible');
        if(window.lucide) lucide.createIcons();
      }
    });
  })();

})();
</script>
<script>
  if (window.lucide) lucide.createIcons();
</script>
</body>
</html>