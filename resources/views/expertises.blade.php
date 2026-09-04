<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Expertises — Ward Wide Learning</title>
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
   PAGE HERO (rubriques internes)
========================= */
.page-hero{padding:76px 0 20px;}
/* .page-hero .wrap{max-width:900px;} */
.page-hero h1{font-size:clamp(30px,4.2vw,48px);line-height:1.14;margin-bottom:20px;}
.page-hero p.lead{font-size:17px;color:var(--text-secondary);max-width:640px;}
.breadcrumb{
  display:flex;align-items:center;gap:8px;font-family:var(--font-mono);font-size:12px;
  color:var(--text-secondary);margin-bottom:20px;letter-spacing:.02em;
}
.breadcrumb a{color:var(--text-secondary);transition:color .2s ease;}
.breadcrumb a:hover{color:var(--secondary);}
.breadcrumb .sep{opacity:.5;}
.breadcrumb .current{color:var(--text-primary);}

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
   EXPERTISE — DETAILED BLOCKS
========================= */
.expertise-list{border-top:1px solid var(--border);}
.expertise-block{
  display:grid;grid-template-columns:240px 1fr;gap:52px;
  padding:56px 0;border-bottom:1px solid var(--border);
  position:relative;
}
.expertise-block::before{
  content:'';position:absolute;left:-10px;top:56px;bottom:56px;width:3px;background:var(--tag-color,var(--primary));
  opacity:0;transition:opacity .4s ease;
}
.expertise-block:hover::before{opacity:1;}
.expertise-block:nth-child(1){--tag-color:var(--primary-ink);}
.expertise-block:nth-child(2){--tag-color:var(--secondary);}
.expertise-block:nth-child(3){--tag-color:var(--magenta);}
.expertise-block:nth-child(4){--tag-color:var(--accent);}

.expertise-head{display:flex;flex-direction:column;gap:14px;}
.expertise-head .num{font-family:var(--font-mono);font-size:13px;color:var(--tag-color,var(--primary));}
.expertise-icon{
  width:52px;height:52px;border-radius:var(--radius-sm);border:1px solid var(--border);
  background:var(--surface);display:flex;align-items:center;justify-content:center;color:var(--tag-color,var(--primary));
  transition:transform .35s cubic-bezier(.34,1.56,.64,1), border-color .3s ease;
}
.expertise-block:hover .expertise-icon{transform:translateY(-3px) rotate(-4deg);border-color:var(--tag-color,var(--primary));}
.expertise-icon svg{width:24px;height:24px;}
.expertise-head h3{font-size:21px;line-height:1.25;}
.expertise-head .tag{font-size:11.5px;font-family:var(--font-mono);color:var(--tag-color,var(--primary));}

.expertise-body p.tagline{
  font-family:var(--font-display);font-size:19px;font-weight:600;line-height:1.4;
  margin-bottom:16px;max-width:52ch;
}
.expertise-body p{color:var(--text-secondary);font-size:15.5px;max-width:64ch;margin-bottom:14px;}
.expertise-body p:last-of-type{margin-bottom:20px;}

.domain-list{display:flex;flex-wrap:wrap;gap:9px;margin-top:6px;}
.domain-pill{
  font-size:12.5px;font-family:var(--font-mono);color:var(--text-secondary);
  border:1px solid var(--border);border-radius:20px;padding:7px 13px;
  background:var(--surface);transition:all .3s ease;
}
.expertise-block:hover .domain-pill{border-color:var(--border-strong);}
.domain-pill:hover{border-color:var(--tag-color,var(--secondary));color:var(--text-primary);transform:translateY(-1px);}

@media(max-width:780px){
  .expertise-block{grid-template-columns:1fr;gap:22px;padding:40px 0;}
  .expertise-block::before{display:none;}
  .expertise-head{flex-direction:row;align-items:center;gap:16px;}
}

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
   ACCESSIBILITY
========================= */
:focus-visible{outline:2px solid var(--secondary);outline-offset:2px;}
.wa-fab:focus-visible,.theme-toggle:focus-visible,.nav-burger:focus-visible{outline-offset:3px;}

/* =========================
   RESPONSIVE — MOBILE FIXES
========================= */
@media(max-width:768px){
  .page-hero{padding:56px 0 8px;}
  .page-hero h1{font-size:clamp(26px,7vw,36px);}
  .page-hero p.lead{font-size:15.5px;}
  .nav-cta{display:none;}
  .btn-row{flex-direction:column;width:100%;}
  .btn-primary,.btn-ghost{width:100%;justify-content:center;text-align:center;padding:13px 20px;font-size:14.5px;}
  section{padding:64px 0;}
  .section-head{margin-bottom:36px;}
  .section-head h2{font-size:clamp(22px,6vw,28px);}
  .interactive-card{padding:34px 22px;}
  .final-cta{padding:40px 22px;}
  .footer-wrap{flex-direction:column;align-items:center;text-align:center;gap:10px;}
}
@media(max-width:480px){
  .wrap{padding:0 16px;}
  .nav-cta{display:none;}
  .kicker{font-size:12px;padding-bottom:12px;margin-bottom:16px;}
  .wa-panel{width:calc(100vw - 32px);right:16px;}
}

/* =========================================================
   EXPERTISE HERO — VISUAL VERSION
========================================================= */

.page-hero-expertise{
  padding:72px 0 70px;
  overflow:hidden;
}

.hero-expertise-grid{
  max-width:1180px;
  margin:0 auto;
  display:grid;
  grid-template-columns:minmax(0, 1.02fr) minmax(420px, .98fr);
  align-items:center;
  gap:70px;
}

/* =========================
   CONTENT
========================= */

.hero-expertise-content{
  position:relative;
  z-index:2;
}

.hero-expertise-content h1{
  font-size:clamp(38px, 5vw, 64px);
  line-height:1.04;
  letter-spacing:-.035em;
  max-width:760px;
  margin-bottom:24px;
}

.hero-expertise-content h1 span{
  display:block;
  color:var(--secondary);
}

.hero-expertise-content .lead{
  max-width:620px;
  font-size:17px;
  line-height:1.75;
  color:var(--text-secondary);
}


/* =========================
   IMAGE AREA
========================= */

.hero-expertise-visual{
  position:relative;
  min-height:500px;
  display:flex;
  align-items:center;
  justify-content:center;
}

.hero-image-card{
  width:100%;
  height:500px;
  position:relative;
  overflow:hidden;

  border-radius:30px;
  border:1px solid var(--border-strong);

  background:var(--surface);

  box-shadow:
    0 30px 80px rgba(0,0,0,.30),
    0 0 0 1px rgba(255,255,255,.02);

  transform:rotate(1.5deg);
  transition:
    transform .6s cubic-bezier(.25,.46,.45,.94),
    box-shadow .6s ease;
}

.hero-image-card:hover{
  transform:rotate(0deg) translateY(-6px);

  box-shadow:
    0 40px 100px rgba(0,0,0,.38),
    0 0 50px rgba(93,201,202,.08);
}

.hero-image-card img{
  width:100%;
  height:100%;
  object-fit:cover;

  transform:scale(1.04);

  filter:
    saturate(.82)
    contrast(1.05);

  transition:
    transform .8s cubic-bezier(.25,.46,.45,.94),
    filter .5s ease;
}

.hero-image-card:hover img{
  transform:scale(1.08);
  filter:saturate(.95) contrast(1.05);
}


/* =========================
   IMAGE OVERLAY
========================= */

.hero-image-overlay{
  position:absolute;
  inset:0;

  background:
    linear-gradient(
      180deg,
      rgba(13,15,22,.04) 20%,
      rgba(13,15,22,.15) 45%,
      rgba(13,15,22,.82) 100%
    );

  pointer-events:none;
}

html[data-theme="light"] .hero-image-overlay{
  background:
    linear-gradient(
      180deg,
      rgba(255,255,255,.02) 20%,
      rgba(255,255,255,.05) 45%,
      rgba(16,20,35,.72) 100%
    );
}


/* =========================
   FLOATING CARD
========================= */

.hero-floating-card{
  position:absolute;
  left:24px;
  bottom:24px;

  display:flex;
  align-items:center;
  gap:12px;

  padding:13px 16px;

  max-width:320px;

  background:
    color-mix(
      in srgb,
      var(--surface) 82%,
      transparent
    );

  border:1px solid rgba(255,255,255,.14);
  border-radius:12px;

  backdrop-filter:blur(18px);

  box-shadow:0 16px 40px rgba(0,0,0,.25);

  color:#fff;

  animation:heroFloat 5s ease-in-out infinite;
}

.floating-icon{
  width:38px;
  height:38px;

  display:flex;
  align-items:center;
  justify-content:center;

  flex:0 0 auto;

  border-radius:9px;

  background:rgba(93,201,202,.12);
  border:1px solid rgba(93,201,202,.28);

  color:var(--secondary);
}

.floating-icon svg{
  width:19px;
  height:19px;
}

.hero-floating-card strong{
  display:block;
  font-family:var(--font-body);
  font-size:12px;
  font-weight:600;
  letter-spacing:.02em;
}

.hero-floating-card > div:last-child span{
  display:block;
  margin-top:2px;

  font-family:var(--font-mono);
  font-size:9.5px;

  color:rgba(255,255,255,.62);
}

@keyframes heroFloat{
  0%,100%{
    transform:translateY(0);
  }

  50%{
    transform:translateY(-7px);
  }
}


/* =========================
   IMAGE INDEX
========================= */

.hero-image-index{
  position:absolute;
  top:20px;
  right:20px;

  display:flex;
  flex-direction:column;
  align-items:flex-end;
  gap:1px;

  color:#fff;

  font-family:var(--font-mono);

  text-shadow:0 2px 12px rgba(0,0,0,.3);
}

.hero-image-index span{
  font-size:25px;
  line-height:1;
  color:var(--accent);
}

.hero-image-index small{
  font-size:8px;
  letter-spacing:.15em;
  opacity:.7;
}


/* =========================
   DECORATIVE ORBITS
========================= */

.hero-orbit{
  position:absolute;

  border:1px solid;
  border-radius:50%;

  pointer-events:none;
}

.orbit-1{
  width:420px;
  height:420px;

  right:-70px;
  top:20px;

  border-color:rgba(93,201,202,.16);

  transform:rotate(-22deg);
}

.orbit-2{
  width:270px;
  height:270px;

  right:35px;
  bottom:20px;

  border-color:rgba(57,81,171,.18);

  transform:rotate(28deg);
}


/* =========================
   LIGHT MODE
========================= */

html[data-theme="light"] .hero-image-card{
  box-shadow:
    0 30px 80px rgba(30,40,70,.14),
    0 0 0 1px rgba(16,20,35,.02);
}

html[data-theme="light"] .hero-floating-card{
  border-color:rgba(255,255,255,.25);
}


/* =========================
   TABLET
========================= */

@media(max-width:950px){

  .hero-expertise-grid{
    grid-template-columns:1fr;
    gap:48px;
  }

  .hero-expertise-content h1{
    max-width:720px;
  }

  .hero-expertise-visual{
    max-width:720px;
    width:100%;
    margin:0 auto;
    min-height:440px;
  }

  .hero-image-card{
    height:440px;
  }

}


/* =========================
   MOBILE
========================= */

@media(max-width:600px){

  .page-hero-expertise{
    padding:48px 0 50px;
  }

  .hero-expertise-grid{
    gap:36px;
  }

  .hero-expertise-content h1{
    font-size:clamp(34px,10vw,44px);
    line-height:1.07;
  }

  .hero-expertise-content h1 span{
    display:inline;
  }

  .hero-expertise-content .lead{
    font-size:15px;
    line-height:1.65;
  }

  .hero-expertise-visual{
    min-height:340px;
  }

  .hero-image-card{
    height:340px;
    border-radius:22px;
    transform:rotate(0);
  }

  .hero-floating-card{
    left:14px;
    right:14px;
    bottom:14px;
    max-width:none;
    padding:11px 12px;
  }

  .floating-icon{
    width:34px;
    height:34px;
  }

  .hero-floating-card strong{
    font-size:11px;
  }

  .hero-floating-card > div:last-child span{
    font-size:8.5px;
  }

  .hero-image-index{
    top:14px;
    right:14px;
  }

  .hero-image-index span{
    font-size:21px;
  }

  .orbit-1{
    width:300px;
    height:300px;
    right:-100px;
    top:15px;
  }

  .orbit-2{
    display:none;
  }
}

@media(prefers-reduced-motion:reduce){

  .hero-floating-card{
    animation:none;
  }

  .hero-image-card,
  .hero-image-card img{
    transition:none;
  }
}

</style>
</head>
<body>

<!-- SCROLL PROGRESS -->
<div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>

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
      <a href="{{ route('home') }}#expertises" class="active">Expertises</a>
      <a href="{{ route('home') }}#solutions">Solutions</a>
      <a href="{{ route('home') }}#insights">Insights</a>
      <a href="{{ route('home') }}#apropos">À propos</a>
      <a href="{{ route('home') }}#contact">Contact</a>
    </div>
    <div class="nav-actions">
      <button class="theme-toggle" id="themeToggle" type="button" aria-label="Activer le mode clair"></button>
      <button class="nav-burger" id="navBurger" type="button" aria-label="Ouvrir le menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
      <a href="{{ route('home') }}#contact" class="nav-cta">Diagnostic offert</a>
    </div>
  </nav>
</header>
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
    <div class="wa-bubble">👋 Bonjour ! Une question sur nos expertises ou notre approche « Pit Stop » ? Écrivez-nous, on vous répond rapidement.</div>
    <a class="wa-cta" id="waLink" href="https://wa.me/212679857317?text=Bonjour%20Ward%20Wide%20Learning%2C%20je%20souhaite%20des%20informations%20sur%20vos%20expertises." target="_blank" rel="noopener">
      <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.01 3C9.38 3 4 8.38 4 15.01c0 2.35.65 4.54 1.78 6.42L4 29l7.76-1.75c1.79.98 3.86 1.54 6.25 1.54 6.63 0 12.01-5.38 12.01-12.01C30.02 8.38 24.64 3 16.01 3z"/></svg>
      Démarrer la discussion
    </a>
  </div>
</div>

{{-- <script src="{{ asset('script.js') }}"></script> --}}
<script src="https://unpkg.com/lucide@latest"></script>
<script>
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

    function resize(){ W = canvas.width = window.innerWidth; H = canvas.height = window.innerHeight; }
    resize();
    window.addEventListener('resize', resize);

    class Particle{
      constructor(){
        this.x = Math.random() * W; this.y = Math.random() * H;
        this.vx = (Math.random() - .5) * .3; this.vy = (Math.random() - .5) * .3;
        this.r = Math.random() * 1.6 + .9; this.alpha = Math.random() * .4 + .3;
      }
      update(){
        this.x += this.vx; this.y += this.vy;
        if(this.x < 0 || this.x > W) this.vx *= -1;
        if(this.y < 0 || this.y > H) this.vy *= -1;
        const dx = this.x - mouse.x, dy = this.y - mouse.y;
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
        ctx.globalAlpha = this.alpha; ctx.fill(); ctx.globalAlpha = 1;
      }
    }
    for(let i=0;i<PARTICLE_COUNT;i++) particles.push(new Particle());

    function drawConnections(){
      for(let i=0;i<particles.length;i++){
        let connections = 0;
        for(let j=i+1;j<particles.length;j++){
          const dx = particles[i].x - particles[j].x, dy = particles[i].y - particles[j].y;
          const dist = Math.sqrt(dx*dx + dy*dy);
          if(dist < CONNECTION_DIST && connections < MAX_CONNECTIONS){
            ctx.beginPath();
            ctx.moveTo(particles[i].x, particles[i].y);
            ctx.lineTo(particles[j].x, particles[j].y);
            const alpha = (1 - dist/CONNECTION_DIST) * .22;
            ctx.strokeStyle = getComputedStyle(root).getPropertyValue('--secondary').trim();
            ctx.globalAlpha = alpha; ctx.lineWidth = .8; ctx.stroke(); ctx.globalAlpha = 1;
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
      window.addEventListener('mousemove', rafThrottle((e)=>{ mouse.x = e.clientX; mouse.y = e.clientY; }), {passive:true});
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

  /* CURSOR GLOW + GRID PARALLAX */
  (function(){
    const grid = document.querySelector('.field-grid');
    if(!reducedMotion && !isTouch){
      let raf = false;
      window.addEventListener('mousemove', function(e){
        if(raf) return; raf = true;
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
        if(ticking) return; ticking = true;
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
    apply(saved || 'dark');
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
      links.classList.remove('open'); burger.classList.remove('open');
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

  /* WHATSAPP WIDGET */
  (function(){
    const fab = document.getElementById('waFab');
    const panel = document.getElementById('waPanel');
    const closeBtn = document.getElementById('waClose');
    const badge = document.getElementById('waBadge');
    if(!fab || !panel) return;
    function openPanel(){ panel.classList.add('open'); fab.setAttribute('aria-expanded', 'true'); if(badge) badge.style.display = 'none'; }
    function closePanel(){ panel.classList.remove('open'); fab.setAttribute('aria-expanded', 'false'); }
    fab.addEventListener('click', () => { panel.classList.contains('open') ? closePanel() : openPanel(); });
    if(closeBtn) closeBtn.addEventListener('click', closePanel);
    document.addEventListener('click', (e) => {
      if(panel.classList.contains('open') && !panel.contains(e.target) && !fab.contains(e.target)) closePanel();
    });
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

})();
</script>
<script>
  if (window.lucide) lucide.createIcons();
</script>
</body>
</html>