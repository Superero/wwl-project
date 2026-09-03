<!DOCTYPE html>
<html lang="fr" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ward Wide Learning — Formation d'entreprise, pilotée par la donnée</title>
<link rel="shortcut icon" href="{{ asset('logo-lockup.svg') }}" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Work+Sans:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<style>
/* =========================================================
   WARD WIDE LEARNING — V2 COMPLETE STYLESHEET
   ========================================================= */
:root{
  --background:#0d0f16;--bg-soft:#12151e;--surface:#171a24;--surface-2:#1c202b;
  --surface-hover:#212635;--border:rgba(233,238,248,0.11);--border-strong:rgba(233,238,248,0.24);
  --text-primary:#edeff6;--text-secondary:#9099ae;
  --primary:#7188da;--primary-ink:#3951ab;--secondary:#5dc9ca;--accent:#fabc19;--magenta:#f14e93;
  --success:#4fcb8f;--warning:#fabc19;--error:#f0685e;
  --radius-sm:4px;--radius-md:12px;--radius-lg:26px;
  --font-display:'Fraunces','Iowan Old Style',serif;
  --font-body:'Work Sans','Segoe UI',sans-serif;
  --font-mono:'IBM Plex Mono',monospace;
  color-scheme:dark;
}
html[data-theme="light"]{
  --background:#eef1f7;--bg-soft:#e5e9f2;--surface:#ffffff;--surface-2:#f6f8fc;--surface-hover:#e9edf6;
  --border:rgba(16,20,35,0.13);--border-strong:rgba(16,20,35,0.26);--text-primary:#10121c;--text-secondary:#565d74;
  --primary:#3951ab;--primary-ink:#3951ab;--secondary:#157e80;--accent:#a86400;--magenta:#c81f6c;
  --success:#1e8e5a;--warning:#a86400;--error:#c23b3b; color-scheme:light;
}
*{box-sizing:border-box;margin:0;padding:0;}
html{scroll-behavior:smooth;}
body{
  background:var(--background);color:var(--text-primary);font-family:var(--font-body);
  font-size:16px;line-height:1.6;overflow-x:hidden;
  transition:background-color .35s ease,color .35s ease;
}
@media (prefers-reduced-motion:reduce){*{animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important;scroll-behavior:auto!important;}}
h1,h2,h3{font-family:var(--font-display);letter-spacing:-0.01em;font-weight:600;}
a{color:inherit;text-decoration:none;}
img{display:block;max-width:100%;}
button{font:inherit;}
.mono{font-family:var(--font-mono);}
.wrap{max-width:1180px;margin:0 auto;padding:0 32px;}
section{position:relative;padding:104px 0;}
@media(max-width:600px){.wrap{padding:0 20px;}section{padding:72px 0;}}

/* Scroll progress */
.scroll-progress{position:fixed;top:0;left:0;height:2px;z-index:100;background:linear-gradient(90deg,var(--primary-ink),var(--secondary),var(--accent));width:0%;transition:width .1s linear;}

/* Section nav */
.section-nav{position:fixed;right:24px;top:50%;transform:translateY(-50%);z-index:40;display:flex;flex-direction:column;gap:10px;}
.section-nav a{width:8px;height:8px;border-radius:50%;border:1.5px solid var(--border-strong);background:transparent;transition:all .3s ease;position:relative;}
.section-nav a.active{background:var(--secondary);border-color:var(--secondary);transform:scale(1.3);}
.section-nav a::before{content:attr(data-label);position:absolute;right:18px;top:50%;transform:translateY(-50%);font-size:11px;color:var(--text-secondary);white-space:nowrap;opacity:0;transition:opacity .25s ease,transform .25s ease;pointer-events:none;font-family:var(--font-mono);letter-spacing:.05em;text-transform:uppercase;}
.section-nav a:hover::before{opacity:1;transform:translateY(-50%) translateX(-4px);}
@media(max-width:1024px){.section-nav{display:none;}}

/* Background layers */
.field{position:fixed;inset:0;z-index:0;pointer-events:none;overflow:hidden;}
#bgCanvas{position:absolute;inset:0;width:100%;height:100%;opacity:.9;}
html[data-theme="light"] #bgCanvas{opacity:.75;}
.field-grid{position:absolute;inset:-2px;background-image:linear-gradient(var(--border) 1px,transparent 1px),linear-gradient(90deg,var(--border) 1px,transparent 1px);background-size:72px 72px;background-position:0 var(--scrollShift,0px);opacity:.35;mask-image:radial-gradient(ellipse 85% 55% at 50% 0%,black 35%,transparent 88%);transition:background-position .1s linear;}
html[data-theme="light"] .field-grid{opacity:.45;}
.field-wash{position:absolute;inset:-10%;width:120%;height:120%;background:radial-gradient(680px 460px at 8% -6%,rgba(57,81,171,0.18),transparent 65%),radial-gradient(620px 520px at 96% 18%,rgba(93,201,202,0.14),transparent 62%),radial-gradient(520px 420px at 60% 96%,rgba(241,78,147,0.08),transparent 60%),radial-gradient(460px 380px at 30% 60%,rgba(250,188,25,0.05),transparent 65%);background-repeat:no-repeat;animation:washDrift 34s ease-in-out infinite alternate;}
html[data-theme="light"] .field-wash{background:radial-gradient(680px 460px at 8% -6%,rgba(57,81,171,0.11),transparent 65%),radial-gradient(620px 520px at 96% 18%,rgba(21,126,128,0.10),transparent 62%),radial-gradient(520px 420px at 60% 96%,rgba(200,31,108,0.06),transparent 60%),radial-gradient(460px 380px at 30% 60%,rgba(168,100,0,0.05),transparent 65%);}
@keyframes washDrift{0%{transform:translate(0,0) scale(1);}50%{transform:translate(-2.5%,2%) scale(1.03);}100%{transform:translate(2%,-1.5%) scale(1);}}
.field-glow{position:absolute;inset:0;background:radial-gradient(520px 520px at var(--mx,50%) var(--my,50%),rgba(93,201,202,0.12),transparent 72%);transition:background-position .35s cubic-bezier(.25,.46,.45,.94);}
html[data-theme="light"] .field-glow{background:radial-gradient(520px 520px at var(--mx,50%) var(--my,50%),rgba(57,81,171,0.08),transparent 72%);}
@media(max-width:780px),(pointer:coarse){.field-glow{display:none;}}
.field-shapes{position:absolute;inset:0;}
.field-shape{position:absolute;border:1.5px solid currentColor;opacity:.14;animation:shapeDrift 46s ease-in-out infinite;}
.field-shape.sh1{top:12%;left:6%;width:64px;height:64px;color:var(--primary-ink);transform:rotate(8deg);animation-duration:52s;}
.field-shape.sh2{top:64%;left:88%;width:46px;height:46px;color:var(--secondary);transform:rotate(-12deg);animation-duration:38s;animation-direction:reverse;}
.field-shape.sh3{top:30%;left:92%;width:30px;height:30px;color:var(--accent);border-radius:50%;animation-duration:44s;}
.field-shape.sh4{top:82%;left:14%;width:38px;height:38px;color:var(--magenta);transform:rotate(20deg);animation-duration:60s;animation-direction:reverse;}
.field-shape.sh5{top:4%;left:48%;width:22px;height:22px;color:var(--secondary);border-radius:50%;animation-duration:34s;}
@keyframes shapeDrift{0%{transform:translate(0,0) rotate(var(--r,6deg));}50%{transform:translate(22px,-26px) rotate(calc(var(--r,6deg) + 14deg));}100%{transform:translate(0,0) rotate(var(--r,6deg));}}
@media(max-width:780px){.field-shape.sh2,.field-shape.sh3,.field-shape.sh4{display:none;}.field-shape{animation:none;}}
.field-grain{position:absolute;inset:0;opacity:.04;mix-blend-mode:overlay;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");}
html[data-theme="light"] .field-grain{opacity:.025;}

/* Header */
header{position:sticky;top:0;z-index:50;background:color-mix(in srgb,var(--background) 78%,transparent);backdrop-filter:blur(14px);border-bottom:1px solid var(--border);transition:border-color .3s ease;}
nav{display:flex;align-items:center;justify-content:space-between;padding:14px 32px;max-width:1180px;margin:0 auto;}
.brand{display:flex;align-items:center;gap:12px;font-family:var(--font-display);font-weight:600;font-size:17px;cursor:pointer;position:relative;}
.brand-mark{height:32px;width:auto;object-fit:contain;transition:transform .4s cubic-bezier(.34,1.56,.64,1);}
.brand:hover .brand-mark{transform:translateY(-2px) rotate(-3deg) scale(1.05);}
.nav-links{display:flex;gap:30px;font-size:14.5px;color:var(--text-secondary);}
.nav-links a{position:relative;padding:4px 0;transition:color .2s;}
.nav-links a::after{content:'';position:absolute;left:0;bottom:-2px;width:0;height:1.5px;background:var(--secondary);transition:width .3s cubic-bezier(.25,.46,.45,.94);}
.nav-links a:hover{color:var(--text-primary);}.nav-links a:hover::after{width:100%;}
.nav-links a.active{color:var(--text-primary);}.nav-links a.active::after{width:100%;}
.nav-cta{font-family:var(--font-mono);font-size:13px;padding:10px 18px;border-radius:var(--radius-sm);border:1px solid var(--primary);color:var(--primary);white-space:nowrap;transition:all .25s ease;position:relative;overflow:hidden;}
html[data-theme="light"] .nav-cta{color:var(--primary-ink);border-color:var(--primary-ink);}
.nav-cta::before{content:'';position:absolute;inset:0;background:var(--primary-ink);transform:translateX(-101%);transition:transform .35s cubic-bezier(.25,.46,.45,.94);z-index:-1;}
.nav-cta:hover{color:#fff;border-color:var(--primary-ink);}.nav-cta:hover::before{transform:translateX(0);}
.nav-actions{display:flex;align-items:center;gap:12px;}
.theme-toggle,.nav-burger{width:38px;height:38px;border-radius:50%;flex:0 0 auto;display:flex;align-items:center;justify-content:center;border:1px solid var(--border);background:var(--surface);color:var(--secondary);cursor:pointer;transition:border-color .2s,transform .2s,box-shadow .2s;}
.theme-toggle:hover,.nav-burger:hover{border-color:var(--secondary);transform:translateY(-1px);box-shadow:0 4px 12px rgba(93,201,202,.15);}
.theme-toggle svg{width:17px;height:17px;}
.nav-burger{display:none;flex-direction:column;gap:4px;}
.nav-burger span{width:16px;height:1.5px;background:currentColor;display:block;transition:all .3s ease;}
@media(max-width:900px){
  .nav-links{position:fixed;top:64px;left:16px;right:16px;z-index:49;display:flex;flex-direction:column;gap:2px;background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);padding:10px;box-shadow:0 20px 50px rgba(0,0,0,.28);opacity:0;transform:translateY(-12px) scale(.98);pointer-events:none;transition:opacity .25s ease,transform .25s cubic-bezier(.34,1.56,.64,1);}
  .nav-links.open{opacity:1;transform:translateY(0) scale(1);pointer-events:auto;}
  .nav-links a{padding:12px 10px;border-radius:var(--radius-sm);}.nav-links a:hover{background:var(--surface-hover);}.nav-links a::after{display:none;}
  .nav-burger{display:flex;}.nav-cta{display:none;}
  .nav-burger.open span:nth-child(1){transform:translateY(5.5px) rotate(45deg);}.nav-burger.open span:nth-child(2){opacity:0;transform:scaleX(0);}.nav-burger.open span:nth-child(3){transform:translateY(-5.5px) rotate(-45deg);}
}

/* Buttons */
.btn-row{display:flex;gap:14px;flex-wrap:wrap;}
.btn-primary{font-family:var(--font-body);font-size:15px;font-weight:600;background:var(--primary-ink);color:#fff;padding:14px 26px;border-radius:var(--radius-sm);border:none;cursor:pointer;transition:transform .25s cubic-bezier(.34,1.56,.64,1),box-shadow .25s ease;display:inline-flex;align-items:center;gap:8px;position:relative;overflow:hidden;}
.btn-primary::after{content:'';position:absolute;inset:0;background:linear-gradient(90deg,transparent,rgba(255,255,255,.15),transparent);transform:translateX(-100%);transition:transform .6s ease;}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 12px 28px rgba(57,81,171,.35);}.btn-primary:hover::after{transform:translateX(100%);}
.btn-ghost{font-family:var(--font-body);font-size:15px;font-weight:500;padding:14px 22px;border-radius:var(--radius-sm);border:1px solid var(--border-strong);color:var(--text-secondary);transition:all .25s ease;position:relative;overflow:hidden;}
.btn-ghost:hover{border-color:var(--text-secondary);color:var(--text-primary);background:var(--surface-hover);}

/* Kicker & Section heads */
.kicker{display:inline-flex;align-items:center;gap:9px;font-size:13.5px;color:var(--text-secondary);padding-bottom:16px;margin-bottom:22px;border-bottom:1px solid var(--border);position:relative;overflow:hidden;}
.kicker::before{content:'';width:7px;height:7px;border-radius:2px;background:var(--accent);transform:rotate(45deg);flex:0 0 auto;}
.section-head{max-width:640px;margin-bottom:52px;}.section-head .kicker{margin-bottom:16px;}
.section-head h2{font-size:clamp(25px,3vw,36px);}.section-head p{color:var(--text-secondary);margin-top:14px;font-size:16px;}

/* Hero */
.hero{padding:76px 0 56px;}
.hero-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:64px;align-items:center;}
@media(max-width:940px){.hero-grid{grid-template-columns:1fr;}}
.hero h1{font-size:clamp(32px,4.4vw,54px);line-height:1.1;margin-bottom:22px;}
.hero h1 .accent{color:var(--primary);}html[data-theme="light"] .hero h1 .accent{color:var(--primary-ink);}
.hero .lead{font-size:17px;color:var(--text-secondary);max-width:520px;margin-bottom:32px;}
.hero-visual{aspect-ratio:4/3;background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);display:flex;align-items:center;justify-content:center;overflow:hidden;}
.hero-visual svg{width:120px;height:120px;opacity:.3;}

/* Cards grid */
.card-grid{display:grid;gap:20px;}
.card-grid.cols-2{grid-template-columns:repeat(2,1fr);}.card-grid.cols-3{grid-template-columns:repeat(3,1fr);}.card-grid.cols-4{grid-template-columns:repeat(4,1fr);}
@media(max-width:1024px){.card-grid.cols-4{grid-template-columns:repeat(2,1fr);}.card-grid.cols-3{grid-template-columns:repeat(2,1fr);}}
@media(max-width:640px){.card-grid.cols-2,.card-grid.cols-3,.card-grid.cols-4{grid-template-columns:1fr;}}

/* Generic card */
.card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);padding:30px 26px;transition:transform .4s cubic-bezier(.25,.46,.45,.94),box-shadow .4s ease,border-color .3s ease;position:relative;overflow:hidden;}
.card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--primary-ink),var(--secondary));transform:scaleX(0);transform-origin:left;transition:transform .5s cubic-bezier(.25,.46,.45,.94);}
.card:hover{transform:translateY(-6px);box-shadow:0 20px 40px rgba(0,0,0,.25);border-color:var(--border-strong);}.card:hover::before{transform:scaleX(1);}
.card-num{font-family:var(--font-mono);font-size:12.5px;color:var(--primary);margin-bottom:14px;display:block;}
.card h3{font-size:19px;margin-bottom:10px;font-weight:600;}
.card p{color:var(--text-secondary);font-size:14.5px;line-height:1.55;}
.card .cta-link{display:inline-block;margin-top:16px;font-size:14px;font-weight:600;color:var(--primary-ink);border-bottom:1px solid var(--primary-ink);padding-bottom:2px;position:relative;transition:all .3s ease;}
.card .cta-link::after{content:'→';position:absolute;right:-18px;opacity:0;transform:translateX(-4px);transition:all .3s ease;}
.card .cta-link:hover{padding-right:18px;}.card .cta-link:hover::after{opacity:1;transform:translateX(0);}

/* Insight card */
.insight-card{padding:0;overflow:hidden;display:flex;flex-direction:column;}
.insight-img{aspect-ratio:16/10;background:var(--surface-2);position:relative;overflow:hidden;}
.insight-img img{width:100%;height:100%;object-fit:cover;transition:transform .6s ease;}
.insight-card:hover .insight-img img{transform:scale(1.05);}
.insight-body{padding:22px 24px 26px;}
.insight-meta{display:flex;align-items:center;gap:12px;font-size:11.5px;color:var(--text-secondary);font-family:var(--font-mono);text-transform:uppercase;letter-spacing:.04em;margin-bottom:10px;}
.insight-meta .cat{color:var(--secondary);}.insight-body h3{font-size:17px;margin-bottom:8px;line-height:1.35;}
.insight-body p{font-size:14px;color:var(--text-secondary);line-height:1.5;}

/* Approach / Steps */
.approach-track{position:absolute;top:22px;left:5%;right:5%;height:1px;background:var(--border);}
.steps{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;position:relative;}
@media(max-width:860px){.steps{grid-template-columns:1fr;}.approach-track{display:none;}}
.step{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);padding:30px 26px;transition:all .4s ease;transform-style:preserve-3d;position:relative;overflow:hidden;}
.step::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--primary-ink),var(--secondary));transform:scaleX(0);transform-origin:left;transition:transform .5s cubic-bezier(.25,.46,.45,.94);}
.step:hover{transform:translateY(-6px);box-shadow:0 20px 40px rgba(0,0,0,.25);border-color:var(--border-strong);}.step:hover::before{transform:scaleX(1);}
.step-marker{width:30px;height:30px;border-radius:50%;background:var(--bg-soft);border:1px solid var(--primary-ink);display:flex;align-items:center;justify-content:center;font-family:var(--font-mono);font-size:12.5px;color:var(--primary);margin-bottom:20px;transition:transform .4s cubic-bezier(.34,1.56,.64,1),background .3s ease;}
.step:hover .step-marker{transform:scale(1.15) rotate(-10deg);background:var(--surface-hover);}
.step .stage{font-family:var(--font-mono);font-size:11px;color:var(--secondary);text-transform:uppercase;letter-spacing:.08em;margin-bottom:8px;display:block;}
.step h3{font-size:19px;margin-bottom:10px;}.step p{color:var(--text-secondary);font-size:14.5px;}

/* Values */
.values{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:32px;}
@media(max-width:768px){.values{grid-template-columns:1fr;}}
.value-item{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);padding:28px 24px;transition:all .3s ease;}
.value-item:hover{border-color:var(--secondary);transform:translateY(-4px);box-shadow:0 12px 28px rgba(0,0,0,.15);}
.value-item h4{font-family:var(--font-display);font-size:18px;margin-bottom:8px;color:var(--text-primary);}
.value-item h4 span{color:var(--secondary);font-family:var(--font-mono);font-size:13px;display:block;margin-bottom:4px;}
.value-item p{font-size:14px;color:var(--text-secondary);line-height:1.55;}

/* Interactive section */
.interactive-card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-lg);padding:48px;display:flex;gap:48px;align-items:center;position:relative;overflow:hidden;}
.interactive-card::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--primary-ink),var(--secondary),var(--accent),var(--magenta));background-size:200% 100%;animation:gradientShift 6s linear infinite;}
@keyframes gradientShift{0%{background-position:0% 50%;}100%{background-position:200% 50%;}}
@media(max-width:860px){.interactive-card{flex-direction:column;padding:32px 24px;gap:32px;text-align:center;}}
.inter-icon{width:72px;height:72px;border-radius:50%;background:var(--bg-soft);border:1.5px solid var(--secondary);display:flex;align-items:center;justify-content:center;font-size:24px;flex-shrink:0;transition:transform .4s ease;}
.interactive-card:hover .inter-icon{transform:scale(1.1) rotate(-6deg);}

/* Contact */
#contact{padding-bottom:120px;}
.contact-card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-lg);padding:52px;display:grid;grid-template-columns:1fr 1fr;gap:48px;position:relative;overflow:hidden;transition:box-shadow .4s ease,border-color .3s ease;}
.contact-card:hover{box-shadow:0 24px 60px rgba(0,0,0,.2);border-color:var(--border-strong);}
.contact-card::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--primary-ink),var(--secondary),var(--accent),var(--magenta));background-size:200% 100%;animation:gradientShift 6s linear infinite;}
@media(max-width:860px){.contact-card{grid-template-columns:1fr;padding:32px 26px;}}
.contact-card h2{font-size:clamp(23px,3vw,30px);margin-bottom:14px;}
.contact-card > div:first-child p{color:var(--text-secondary);font-size:15px;margin-bottom:26px;}
.mini-stats{display:flex;gap:22px;flex-wrap:wrap;}.mini-stats div{font-size:12px;color:var(--text-secondary);transition:transform .3s ease;}.mini-stats div:hover{transform:translateY(-2px);}
.mini-stats .n{display:block;font-family:var(--font-mono);color:var(--accent);font-size:19px;font-weight:600;transition:color .3s ease;}.mini-stats div:hover .n{color:var(--secondary);}
form{display:flex;flex-direction:column;gap:14px;}
.field-row{position:relative;}.field-row label{font-size:12px;color:var(--text-secondary);display:block;margin-bottom:6px;transition:color .3s ease,transform .3s ease;}
.field-row:focus-within label{color:var(--primary);transform:translateX(2px);}
.field-row input,.field-row select,.field-row textarea{width:100%;background:var(--bg-soft);border:1px solid var(--border);border-radius:var(--radius-sm);padding:12px 14px;color:var(--text-primary);font-family:var(--font-body);font-size:14px;outline:none;transition:border-color .3s ease,box-shadow .3s ease,transform .3s ease;}
.field-row input:focus,.field-row select:focus,.field-row textarea:focus{border-color:var(--primary-ink);box-shadow:0 0 0 3px rgba(57,81,171,.12);transform:translateY(-1px);}
.field-row input::placeholder,.field-row textarea::placeholder{color:var(--text-secondary);opacity:.5;}
.field-row select{appearance:none;cursor:pointer;}.field-row .select-arrow{position:absolute;right:14px;top:50%;transform:translateY(-50%);width:0;height:0;border-left:4px solid transparent;border-right:4px solid transparent;border-top:4px solid var(--text-secondary);pointer-events:none;transition:border-color .3s ease;}
.field-row:focus-within .select-arrow{border-top-color:var(--primary);}
form .btn-primary{margin-top:6px;justify-content:center;width:100%;}.form-note{font-size:12px;color:var(--text-secondary);margin-top:2px;}
.success-msg{display:none;text-align:center;padding:26px 10px;font-size:14.5px;color:var(--secondary);}

/* Footer */
footer{border-top:1px solid var(--border);padding:40px 0;}
.footer-wrap{display:flex;justify-content:space-between;flex-wrap:wrap;gap:16px;font-size:13px;color:var(--text-secondary);}
.footer-wrap .brand{font-size:14px;}.footer-wrap .brand-mark{height:22px;}
.footer-wrap a{position:relative;transition:color .2s;}.footer-wrap a::after{content:'';position:absolute;left:0;bottom:-2px;width:0;height:1px;background:var(--secondary);transition:width .25s ease;}
.footer-wrap a:hover{color:var(--text-primary);}.footer-wrap a:hover::after{width:100%;}

/* Reveal */
.reveal{opacity:0;transform:translateY(24px);transition:opacity .7s cubic-bezier(.25,.46,.45,.94),transform .7s cubic-bezier(.25,.46,.45,.94);}.reveal.in{opacity:1;transform:translateY(0);}
.reveal-delay-1{transition-delay:.08s;}.reveal-delay-2{transition-delay:.16s;}.reveal-delay-3{transition-delay:.24s;}.reveal-delay-4{transition-delay:.32s;}

/* WhatsApp */
.wa-fab{position:fixed;bottom:26px;right:26px;z-index:70;width:58px;height:58px;border-radius:50%;border:none;cursor:pointer;background:#25d366;display:flex;align-items:center;justify-content:center;box-shadow:0 10px 26px rgba(15,120,90,.35);transition:transform .3s cubic-bezier(.34,1.56,.64,1),box-shadow .3s ease;}
.wa-fab:hover{transform:translateY(-4px) scale(1.08);box-shadow:0 14px 34px rgba(15,120,90,.45);}.wa-fab:active{transform:translateY(-2px) scale(1.04);}.wa-fab svg{width:27px;height:27px;fill:#ffffff;}
.wa-badge{position:absolute;top:-2px;right:-2px;width:14px;height:14px;border-radius:50%;background:var(--accent);border:2px solid var(--background);animation:badgePulse 2s ease-in-out infinite;}
@keyframes badgePulse{0%,100%{transform:scale(1);}50%{transform:scale(1.15);}}
.wa-panel{position:fixed;bottom:96px;right:26px;z-index:70;width:318px;max-width:calc(100vw - 32px);background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-md);overflow:hidden;box-shadow:0 24px 60px rgba(0,0,0,.35);opacity:0;transform:translateY(16px) scale(.96);pointer-events:none;transition:opacity .3s ease,transform .3s cubic-bezier(.34,1.56,.64,1);}
.wa-panel.open{opacity:1;transform:translateY(0) scale(1);pointer-events:auto;}
.wa-panel-head{position:relative;display:flex;align-items:center;gap:12px;padding:16px 40px 16px 18px;background:#25d366;color:#04140f;}
.wa-avatar{width:36px;height:36px;border-radius:50%;flex:0 0 auto;background:rgba(4,20,15,.14);display:flex;align-items:center;justify-content:center;transition:transform .3s ease;}.wa-panel-head:hover .wa-avatar{transform:scale(1.1);}.wa-avatar svg{width:19px;height:19px;fill:#04140f;}
.wa-panel-head h4{font-family:var(--font-display);font-size:14px;font-weight:600;}.wa-panel-head .status{font-size:11px;display:flex;align-items:center;gap:5px;opacity:.85;margin-top:2px;}.wa-panel-head .status::before{content:'';width:6px;height:6px;border-radius:50%;background:#04140f;opacity:.55;animation:statusPulse 2s ease-in-out infinite;}
@keyframes statusPulse{0%,100%{opacity:.55;}50%{opacity:1;}}
.wa-close{position:absolute;top:9px;right:9px;width:25px;height:25px;border:none;background:none;color:#04140f;opacity:.75;cursor:pointer;font-size:15px;line-height:1;transition:opacity .2s,transform .2s;}.wa-close:hover{opacity:1;transform:rotate(90deg);}
.wa-panel-body{padding:18px;background:var(--bg-soft);}.wa-bubble{background:var(--surface);border:1px solid var(--border);border-radius:12px 12px 12px 3px;padding:12px 14px;font-size:13.5px;color:var(--text-primary);margin-bottom:16px;line-height:1.5;transition:transform .3s ease,box-shadow .3s ease;}.wa-bubble:hover{transform:translateX(4px);box-shadow:0 4px 12px rgba(0,0,0,.1);}
.wa-cta{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;background:#25d366;color:#04140f;font-weight:600;padding:12px 16px;border-radius:var(--radius-sm);font-size:13.5px;transition:all .25s ease;}.wa-cta:hover{filter:brightness(1.06);transform:translateY(-1px);}.wa-cta svg{width:16px;height:16px;fill:#04140f;}
@media(max-width:480px){.wa-fab{right:16px;bottom:16px;}.wa-panel{right:14px;bottom:88px;}}

/* Success modal */
.success-modal{position:fixed;inset:0;z-index:99999;display:flex;align-items:center;justify-content:center;padding:24px;opacity:0;visibility:hidden;transition:opacity .4s ease,visibility .4s ease;}
.success-modal.is-visible{opacity:1;visibility:visible;}.success-modal-backdrop{position:absolute;inset:0;background:radial-gradient(circle at 50% 45%,rgba(93,201,202,.10),transparent 40%),rgba(6,8,14,.78);backdrop-filter:blur(14px);}
.success-modal-card{position:relative;z-index:2;width:min(480px,100%);padding:44px 38px 38px;text-align:center;border:1px solid var(--border-strong);border-radius:var(--radius-lg);background:var(--surface);box-shadow:0 30px 90px rgba(0,0,0,.45);transform:translateY(28px) scale(.95);transition:transform .5s cubic-bezier(.16,1,.3,1);}.success-modal.is-visible .success-modal-card{transform:translateY(0) scale(1);}
.success-modal-close{position:absolute;top:14px;right:16px;width:36px;height:36px;display:flex;align-items:center;justify-content:center;border:1px solid var(--border);border-radius:50%;background:var(--surface-2);color:var(--text-secondary);font-size:22px;line-height:1;cursor:pointer;transition:background .25s ease,color .25s ease,transform .25s ease;}.success-modal-close:hover{background:var(--surface-hover);color:var(--text-primary);transform:rotate(90deg);}
.success-icon-wrapper{display:flex;justify-content:center;margin-bottom:24px;}.success-icon{position:relative;width:76px;height:76px;display:flex;align-items:center;justify-content:center;border:1px solid var(--secondary);border-radius:50%;background:radial-gradient(circle,color-mix(in srgb,var(--secondary) 20%,transparent),transparent 65%);}
.success-icon::before{content:'';position:absolute;inset:-8px;border:1px solid color-mix(in srgb,var(--secondary) 30%,transparent);border-radius:50%;animation:successRing 2.4s ease-out infinite;}
.success-icon svg{width:34px;height:34px;fill:none;stroke:var(--secondary);stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:30;stroke-dashoffset:30;animation:successCheck .7s .25s ease forwards;}
.success-modal-label{display:inline-block;margin-bottom:10px;font-size:11px;font-weight:600;color:var(--secondary);}.success-modal-content h2{margin:0 0 12px;font-size:clamp(24px,4.6vw,32px);}.success-modal-content p{max-width:390px;margin:0 auto 20px;font-size:14.5px;line-height:1.7;color:var(--text-secondary);}
.success-modal-status{display:inline-flex;align-items:center;gap:9px;margin-bottom:26px;padding:8px 13px;border:1px solid var(--border);border-radius:var(--radius-sm);background:var(--surface-2);font-size:11px;color:var(--text-secondary);}.status-dot{width:7px;height:7px;border-radius:50%;background:var(--secondary);animation:statusBlink 1.5s ease-in-out infinite;}
.success-modal-button{width:100%;padding:14px 20px;border:none;border-radius:var(--radius-sm);background:var(--primary-ink);color:#fff;font-size:14px;font-weight:600;cursor:pointer;transition:transform .25s ease,box-shadow .25s ease;}.success-modal-button:hover{transform:translateY(-2px);box-shadow:0 14px 32px rgba(57,81,171,.3);}
@keyframes successRing{0%{opacity:.7;transform:scale(.95);}100%{opacity:0;transform:scale(1.25);}}@keyframes successCheck{to{stroke-dashoffset:0;}}@keyframes statusBlink{0%,100%{opacity:1;}50%{opacity:.35;}}
@media(max-width:600px){.success-modal{padding:16px;}.success-modal-card{padding:38px 22px 26px;border-radius:var(--radius-md);}.success-icon{width:68px;height:68px;}.success-icon svg{width:30px;height:30px;}.success-modal-content h2{font-size:26px;}}

/* Accessibility */
:focus-visible{outline:2px solid var(--secondary);outline-offset:2px;}
.wa-fab:focus-visible,.theme-toggle:focus-visible,.nav-burger:focus-visible{outline-offset:3px;}

/* Cursor */
@media(min-width:1024px) and (pointer:fine){
  .cursor-dot,.cursor-ring{position:fixed;top:0;left:0;pointer-events:none;z-index:9999;border-radius:50%;transition:transform .15s ease-out,opacity .15s ease;}
  .cursor-dot{width:6px;height:6px;background:var(--secondary);transform:translate(-50%,-50%);}
  .cursor-ring{width:32px;height:32px;border:1.5px solid var(--secondary);opacity:.4;transform:translate(-50%,-50%);}
  .cursor-ring.hover{transform:translate(-50%,-50%) scale(1.6);opacity:.15;border-color:var(--primary);}.cursor-dot.hover{transform:translate(-50%,-50%) scale(.5);background:var(--primary);}
}
@media(max-width:1023px),(pointer:coarse){.cursor-dot,.cursor-ring{display:none;}}

/* Mobile fixes */
@media(max-width:768px){
  .btn-row{flex-direction:column;width:100%;}.btn-primary,.btn-ghost{width:100%;justify-content:center;text-align:center;padding:13px 20px;font-size:14.5px;}
  section{padding:64px 0;}.section-head{margin-bottom:36px;}.section-head h2{font-size:clamp(22px,6vw,28px);}
  .hero{padding:56px 0 40px;}.hero-grid{gap:40px;}.hero h1{font-size:clamp(26px,7vw,40px);}.hero .lead{font-size:15.5px;}
  .contact-card{padding:28px 20px;gap:32px;}.contact-card h2{font-size:22px;}
  .footer-wrap{flex-direction:column;align-items:center;text-align:center;gap:10px;}
  .interactive-card{padding:28px 20px;}
  .steps{gap:16px;}.step{padding:24px 20px;}
  .values{gap:16px;}
}
@media(max-width:480px){
  .wrap{padding:0 16px;}.kicker{font-size:12px;padding-bottom:12px;margin-bottom:16px;}
  .contact-card{padding:24px 16px;border-radius:var(--radius-md);}.contact-card::before{height:3px;}
  .success-modal{padding:12px;}.success-modal-card{padding:32px 18px 24px;}
  .success-icon{width:60px;height:60px;}.success-icon svg{width:26px;height:26px;}
  .wa-panel{width:calc(100vw - 32px);right:16px;}
}
</style>
</head>
<body>

@if (session('success'))
<div class="success-modal is-visible" id="successModal" role="dialog" aria-modal="true" aria-labelledby="successTitle">
  <div class="success-modal-backdrop"></div>
  <div class="success-modal-card">
    <button type="button" class="success-modal-close" id="successModalClose" aria-label="Fermer">×</button>
    <div class="success-icon-wrapper"><div class="success-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12.5L9.5 17L19 7"/></svg></div></div>
    <div class="success-modal-content">
      <span class="success-modal-label">Transmission confirmée</span>
      <h2 id="successTitle">Demande envoyée</h2>
      <p>{{ session('success') }}</p>
      <div class="success-modal-status"><span class="status-dot"></span>Votre demande est bien enregistrée</div>
      <button type="button" class="success-modal-button" id="successModalContinue">Parfait, merci</button>
    </div>
  </div>
</div>
@endif

<div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>

<nav class="section-nav" aria-label="Navigation des sections">
  <a href="#hero" data-label="Accueil" aria-label="Accueil"></a>
  <a href="#expertises" data-label="Expertises" aria-label="Expertises"></a>
  <a href="#solutions" data-label="Solutions" aria-label="Solutions"></a>
  <a href="#approche" data-label="Approche" aria-label="Approche"></a>
  <a href="#insights" data-label="Insights" aria-label="Insights"></a>
  <a href="#apropos" data-label="À propos" aria-label="À propos"></a>
  <a href="#contact" data-label="Contact" aria-label="Contact"></a>
</nav>

<div class="cursor-dot" id="cursorDot" aria-hidden="true"></div>
<div class="cursor-ring" id="cursorRing" aria-hidden="true"></div>

<div class="field" aria-hidden="true">
  <canvas id="bgCanvas"></canvas>
  <div class="field-wash"></div>
  <div class="field-grid"></div>
  <div class="field-glow"></div>
  <div class="field-shapes">
    <span class="field-shape sh1"></span><span class="field-shape sh2"></span><span class="field-shape sh3"></span><span class="field-shape sh4"></span><span class="field-shape sh5"></span>
  </div>
  <div class="field-grain"></div>
</div>

<header>
  <nav>
    <div class="brand" id="siteLogo" data-dashboard-url="{{ route('dashboard') }}" role="button" tabindex="0" aria-label="Ward Wide Learning">
      <img class="brand-mark" src="{{ asset('logo-lockup.svg') }}" alt="Ward Wide Learning">
      <span>Ward Wide Learning</span>
    </div>
    <div class="nav-links" id="navLinks">
      <a href="#expertises">Expertises</a>
      <a href="#solutions">Solutions</a>
      <a href="#insights">Insights</a>
      <a href="#apropos">À propos</a>
      <a href="#contact">Contact</a>
    </div>
    <div class="nav-actions">
      <button class="theme-toggle" id="themeToggle" type="button" aria-label="Activer le mode clair"></button>
      <button class="nav-burger" id="navBurger" type="button" aria-label="Ouvrir le menu" aria-expanded="false"><span></span><span></span><span></span></button>
      <a href="#contact" class="nav-cta">Diagnostic offert</a>
    </div>
  </nav>
</header>

<main>

<!-- ===== HERO ===== -->
<section class="hero" id="hero">
  <div class="wrap hero-grid">
    <div>
      <span class="kicker reveal">Diagnostic offert · Partenaire Learning</span>
      <h1 class="reveal reveal-delay-1">Nous concevons des expériences d'apprentissage qui créent un <span class="accent">changement mesurable</span>.</h1>
      <p class="lead reveal reveal-delay-2">Stratégie Learning, Digital Learning, assessment et impact au service de vos enjeux business.</p>
      <div class="btn-row reveal reveal-delay-3">
        <a href="#contact" class="btn-primary">Faire le diagnostic offert</a>
        <a href="#solutions" class="btn-ghost">Découvrir nos solutions</a>
      </div>
      <p style="font-size:13px;color:var(--text-secondary);margin-top:14px;" class="reveal reveal-delay-3">5 minutes · résultat immédiat · sans engagement</p>
    </div>
    <div class="hero-visual reveal reveal-delay-2">
      <svg viewBox="0 0 24 24" fill="none" stroke="var(--secondary)" stroke-width="1"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/><path d="M2 12h20"/></svg>
    </div>
  </div>
</section>

<!-- ===== EXPERTISES ===== -->
<section id="expertises">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Nos expertises</span>
      <h2>Une expertise de bout en bout, du besoin à l'impact.</h2>
    </div>
    <div class="card-grid cols-4">
      <div class="card reveal">
        <span class="card-num">01</span>
        <h3>Learning Strategy</h3>
        <p>Aligner la formation aux enjeux stratégiques, métiers et compétences.</p>
      </div>
      <div class="card reveal reveal-delay-1">
        <span class="card-num">02</span>
        <h3>Learning Experience Design</h3>
        <p>Concevoir des expériences utiles, engageantes et adaptées au travail réel.</p>
      </div>
      <div class="card reveal reveal-delay-2">
        <span class="card-num">03</span>
        <h3>Digital Learning</h3>
        <p>Créer des parcours digitaux, blended et scalables sans appauvrir l'expérience.</p>
      </div>
      <div class="card reveal reveal-delay-3">
        <span class="card-num">04</span>
        <h3>Learning Impact &amp; Assessment</h3>
        <p>Mesurer l'apprentissage, le transfert, les compétences et la contribution aux résultats.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== SOLUTIONS ===== -->
<section id="solutions">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Vos enjeux, nos solutions</span>
      <h2>Commencez par votre problème. Nous construisons la réponse.</h2>
    </div>
    <div class="card-grid cols-3">
      <div class="card reveal">
        <span class="card-num" style="color:var(--primary);">Learning Impact</span>
        <h3>Évaluer l'efficacité</h3>
        <p>Structurer les indicateurs, mesurer le transfert et mieux piloter les décisions L&amp;D.</p>
        <a href="#contact" class="cta-link" data-prefill-role="Responsable formation / L&D" data-prefill-need="Mesure du ROI formation">Évaluer l'impact →</a>
      </div>
      <div class="card reveal reveal-delay-1">
        <span class="card-num" style="color:var(--secondary);">Digital Learning</span>
        <h3>Digitaliser sans réduire</h3>
        <p>Modules e-learning, microlearning, blended learning et expériences scalables.</p>
        <a href="#contact" class="cta-link" data-prefill-role="Responsable formation / L&D" data-prefill-need="Digitaliser mon parcours">Digitaliser →</a>
      </div>
      <div class="card reveal reveal-delay-2">
        <span class="card-num" style="color:var(--accent);">Académies &amp; parcours</span>
        <h3>Structurer le développement</h3>
        <p>Curriculum, architecture de parcours et offre de formation cohérente.</p>
        <a href="#contact" class="cta-link" data-prefill-role="Responsable formation / L&D" data-prefill-need="Structurer mon académie">Structurer →</a>
      </div>
      <div class="card reveal">
        <span class="card-num" style="color:var(--magenta);">Pit Stop Learning</span>
        <h3>Intervention ciblée</h3>
        <p>Diagnostic rapide, priorités et plan d'action concret en format court.</p>
        <a href="#contact" class="cta-link" data-prefill-role="Direction générale / COMEX" data-prefill-need="Faire un Pit Stop">Faire un Pit Stop →</a>
      </div>
      <div class="card reveal reveal-delay-1">
        <span class="card-num" style="color:var(--primary);">Assessment &amp; Positioning</span>
        <h3>Tester et positionner</h3>
        <p>Tests de positionnement, assessments et évaluation d'impact et transfert.</p>
        <a href="#contact" class="cta-link" data-prefill-role="Responsable formation / L&D" data-prefill-need="Concevoir mon assessment">Concevoir →</a>
      </div>
      <div class="card reveal reveal-delay-2">
        <span class="card-num" style="color:var(--secondary);">Management &amp; Human Performance</span>
        <h3>Développer les équipes</h3>
        <p>Leadership, soft skills, communication et dynamiques collectives.</p>
        <a href="#contact" class="cta-link" data-prefill-role="Directeur RH" data-prefill-need="Construire mon parcours">Construire →</a>
      </div>
    </div>
    <div style="text-align:center;margin-top:40px;" class="reveal">
      <a href="#contact" class="btn-ghost">Explorer toutes les solutions</a>
    </div>
  </div>
</section>

<!-- ===== INTERACTIVE : LEARNING PERFORMANCE CHECK ===== -->
<section id="interactive" style="padding:80px 0;">
  <div class="wrap">
    <div class="interactive-card reveal">
      <div class="inter-icon">📊</div>
      <div style="flex:1;">
        <span class="kicker" style="border:none;padding:0;margin:0 0 12px;">Learning Performance Check</span>
        <h2 style="font-size:clamp(22px,3vw,30px);margin-bottom:12px;">Que mesure réellement votre dispositif d'évaluation ?</h2>
        <p style="color:var(--text-secondary);font-size:15px;max-width:52ch;margin-bottom:20px;">
          Un questionnaire court pour évaluer votre dispositif selon 5 dimensions clés : alignement business, design, apprentissage, transfert et pilotage.
        </p>
        <a href="#contact" class="btn-primary">Tester mon Impact Coverage</a>
      </div>
      <div style="display:flex;flex-direction:column;gap:16px;min-width:200px;">
        <div style="font-size:13px;color:var(--text-secondary);"><span style="color:var(--accent);font-family:var(--font-mono);font-size:18px;font-weight:600;">5 min</span><br>Questionnaire</div>
        <div style="font-size:13px;color:var(--text-secondary);"><span style="color:var(--secondary);font-family:var(--font-mono);font-size:18px;font-weight:600;">1</span><br>Restitution personnalisée</div>
        <div style="font-size:13px;color:var(--text-secondary);"><span style="color:var(--primary);font-family:var(--font-mono);font-size:18px;font-weight:600;">0</span><br>Engagement</div>
      </div>
    </div>
  </div>
</section>

<!-- ===== APPROCHE / PIT STOP ===== -->
<section id="approche">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Notre approche</span>
      <h2>Apprendre. Ajuster. Accélérer.</h2>
      <p>Une méthode inspirée de la course automobile : diagnostiquer vite, agir juste, repartir plus fort.</p>
    </div>
    <div style="position:relative;padding-top:6px;">
      <div class="approach-track"></div>
      <div class="steps">
        <div class="step reveal">
          <div class="step-marker">01</div>
          <span class="stage">Stop</span>
          <h3>Analyser et diagnostiquer</h3>
          <p>Comprendre le contexte, identifier les points de friction et cadrer l'enjeu réel.</p>
        </div>
        <div class="step reveal reveal-delay-1">
          <div class="step-marker">02</div>
          <span class="stage">Design</span>
          <h3>Concevoir l'expérience</h3>
          <p>Scénariser les parcours, choisir les formats et structurer les contenus pédagogiques.</p>
        </div>
        <div class="step reveal reveal-delay-2">
          <div class="step-marker">03</div>
          <span class="stage">Sprint</span>
          <h3>Prototyper et tester</h3>
          <p>Valider rapidement les hypothèses avec des itérations courtes et des retours terrain.</p>
        </div>
        <div class="step reveal reveal-delay-3">
          <div class="step-marker">04</div>
          <span class="stage">Accelerate</span>
          <h3>Déployer, mesurer et améliorer</h3>
          <p>Lancer à grande échelle, suivre les indicateurs et optimiser en continu.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== INSIGHTS ===== -->
<section id="insights">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Insights</span>
      <h2>Learning, decoded.</h2>
    </div>
    <div class="card-grid cols-3">
      <article class="card insight-card reveal">
        <div class="insight-img" style="background:linear-gradient(135deg,var(--surface-2),var(--bg-soft));"></div>
        <div class="insight-body">
          <div class="insight-meta"><span class="cat">Learning Impact</span><span>5 min</span></div>
          <h3>Votre formation a eu 95 % de satisfaction. Et alors ?</h3>
          <p>Pourquoi la satisfaction à chaud ne garantit aucun transfert réel sur le terrain.</p>
        </div>
      </article>
      <article class="card insight-card reveal reveal-delay-1">
        <div class="insight-img" style="background:linear-gradient(135deg,var(--surface-2),var(--bg-soft));"></div>
        <div class="insight-body">
          <div class="insight-meta"><span class="cat">Digital Learning</span><span>7 min</span></div>
          <h3>Présentiel, e-learning ou blended : la mauvaise question à poser.</h3>
          <p>Ce qui compte n'est pas le format, mais l'expérience et l'ancrage dans le travail réel.</p>
        </div>
      </article>
      <article class="card insight-card reveal reveal-delay-2">
        <div class="insight-img" style="background:linear-gradient(135deg,var(--surface-2),var(--bg-soft));"></div>
        <div class="insight-body">
          <div class="insight-meta"><span class="cat">Learning Impact</span><span>6 min</span></div>
          <h3>Kirkpatrick : ce que les entreprises mesurent… et ce qu'elles oublient.</h3>
          <p>Un décryptage des 4 niveaux et des pièges à éviter dans l'évaluation.</p>
        </div>
      </article>
    </div>
    <div style="text-align:center;margin-top:40px;" class="reveal">
      <a href="#insights" class="btn-ghost">Voir tous les Insights</a>
    </div>
  </div>
</section>

<!-- ===== À PROPOS ===== -->
<section id="apropos">
  <div class="wrap">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;">
      <div class="reveal">
        <span class="kicker">À propos</span>
        <h2 style="font-size:clamp(23px,3vw,30px);margin-bottom:18px;">Chez Ward Wide Learning, nous ne concevons pas la formation comme une succession de contenus à délivrer, mais comme un <span style="color:var(--primary);">système à faire fonctionner</span>.</h2>
        <p style="color:var(--text-secondary);font-size:15.5px;margin-bottom:18px;">
          Nous partons des enjeux réels de l'organisation, concevons des expériences adaptées aux usages et au terrain, puis cherchons à rendre visible ce qui change réellement après la formation.
        </p>
        <a href="#contact" class="btn-ghost">Parler de votre enjeu Learning</a>
      </div>
      <div class="reveal reveal-delay-2">
        <div class="values">
          <div class="value-item">
            <h4><span>01</span>Exigence</h4>
            <p>Concevoir avec rigueur et précision à chaque étape du parcours.</p>
          </div>
          <div class="value-item">
            <h4><span>02</span>Expérience</h4>
            <p>Penser pour l'apprenant et son contexte réel de travail.</p>
          </div>
          <div class="value-item">
            <h4><span>03</span>Impact</h4>
            <p>Mesurer ce qui change vraiment, pas seulement ce qui se consomme.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== CTA FINAL ===== -->
<section style="padding:80px 0;text-align:center;">
  <div class="wrap">
    <div class="reveal">
      <span class="kicker" style="margin:0 auto 16px;display:table;">Votre prochain Pit Stop commence ici</span>
      <h2 style="font-size:clamp(24px,3.5vw,38px);margin-bottom:16px;">Parlez-nous de votre enjeu Learning</h2>
      <p style="color:var(--text-secondary);font-size:16px;max-width:560px;margin:0 auto 28px;">
        Commencez par notre diagnostic offert ou planifiez un échange stratégique de 20 minutes.
      </p>
      <div class="btn-row" style="justify-content:center;">
        <a href="#contact" class="btn-primary">Planifier un échange</a>
        <a href="#contact" class="btn-ghost">Faire le diagnostic offert</a>
      </div>
    </div>
  </div>
</section>

<!-- ===== CONTACT ===== -->
<section id="contact">
  <div class="wrap">
    <div class="contact-card reveal">
      <div>
        <span class="kicker">Échangeons sur votre projet</span>
        <h2>Planifiez un échange stratégique de 20 minutes</h2>
        <p>Remplissez ce formulaire pour être recontacté par un expert Ward Wide Learning.</p>
        <div class="mini-stats">
          <div><span class="n">-60%</span>Temps de formation</div>
          <div><span class="n">100%</span>Traçabilité audit</div>
          <div><span class="n">+38%</span>ROI formation moyen</div>
        </div>
      </div>
      <div>
        <form method="POST" action="{{ route('consultation.store') }}" id="contactForm">
          @csrf
          <div class="field-row">
            <label for="name">Prénom et nom</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Votre nom complet">
          </div>
          <div class="field-row">
            <label for="email">Email professionnel</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="prenom@entreprise.com">
          </div>
          <div class="field-row">
            <label for="company">Entreprise</label>
            <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="Nom de votre entreprise">
          </div>
          <div class="field-row">
            <label for="role">Fonction</label>
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
          <div class="field-row">
            <label for="message">Message (optionnel)</label>
            <input type="text" id="message" name="message" value="{{ old('message') }}" placeholder="Décrivez brièvement votre contexte...">
          </div>
          <button type="submit" class="btn-primary" id="submitBtn">
            <span>Envoyer ma demande</span>
          </button>
          <p class="form-note">Réponse sous 24 à 48h ouvrées · aucun engagement.</p>
        </form>
        @if (session('success'))
            <div class="success-msg" style="display:block;">✓ {{ session('success') }}</div>
        @endif
        <div class="success-msg" id="successMsg">✓ Demande envoyée. Un expert vous recontacte sous 24h.</div>
      </div>
    </div>
  </div>
</section>

</main>

<footer>
  <div class="wrap footer-wrap">
    <div class="brand"><img class="brand-mark" src="{{ asset('logo-lockup.svg') }}" alt="Ward Wide Learning">Ward Wide Learning</div>
    <div>Oasis Latitude Offices, Angle Route de l'Oasis, Casablanca</div>
    <div>© {{ date('Y') }} Ward Wide Learning</div>
  </div>
</footer>

<button class="wa-fab" id="waFab" type="button" aria-label="Discuter avec nous sur WhatsApp" aria-expanded="false">
  <span class="wa-badge" id="waBadge"></span>
  <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.01 3C9.38 3 4 8.38 4 15.01c0 2.35.65 4.54 1.78 6.42L4 29l7.76-1.75c1.79.98 3.86 1.54 6.25 1.54 6.63 0 12.01-5.38 12.01-5.38 12.01-12.01C30.02 8.38 24.64 3 16.01 3zm7.05 17.16c-.3.84-1.72 1.6-2.38 1.7-.61.09-1.38.13-2.23-.14-.51-.16-1.17-.38-2.02-.75-3.55-1.53-5.86-5.1-6.04-5.34-.18-.24-1.45-1.93-1.45-3.68 0-1.75.92-2.6 1.24-2.96.32-.35.7-.44.93-.44.23 0 .47 0 .67.01.22.01.5-.08.78.6.3.72 1.02 2.48 1.11 2.66.09.18.15.39.03.63-.12.24-.18.39-.36.6-.18.21-.38.47-.54.63-.18.18-.37.38-.16.74.21.35.94 1.55 2.02 2.51 1.39 1.24 2.56 1.62 2.92 1.8.36.18.57.15.78-.09.21-.24.9-1.05 1.14-1.41.24-.35.48-.29.81-.18.33.12 2.09.99 2.45 1.17.36.18.6.27.69.42.09.15.09.85-.21 1.69z"/></svg>
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
    <div class="wa-bubble">👋 Bonjour ! Une question sur nos dispositifs de formation ou notre méthode ? Écrivez-nous, on vous répond rapidement.</div>
    <a class="wa-cta" id="waLink" href="https://wa.me/212699712087?text=Bonjour%20Ward%20Wide%20Learning%2C%20je%20souhaite%20des%20informations%20sur%20vos%20formations." target="_blank" rel="noopener">
      <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16.01 3C9.38 3 4 8.38 4 15.01c0 2.35.65 4.54 1.78 6.42L4 29l7.76-1.75c1.79.98 3.86 1.54 6.25 1.54 6.63 0 12.01-5.38 12.01-12.01C30.02 8.38 24.64 3 16.01 3z"/></svg>
      Démarrer la discussion
    </a>
  </div>
</div>

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

  /* =========================
     CANVAS BACKGROUND
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
    const sections = Array.from(links).map(a => document.querySelector(a.getAttribute('href'))).filter(Boolean);
    if(!sections.length) return;
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if(entry.isIntersecting){
          const id = entry.target.id;
          links.forEach(l => l.classList.toggle('active', l.getAttribute('href') === '#' + id));
        }
      });
    }, {threshold: .4});
    sections.forEach(s => observer.observe(s));
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
    const hoverTargets = 'a, button, .card, .step, .value-item, .insight-card, .nav-cta, .wa-fab, .success-modal-button, .inter-icon, .btn-primary, .btn-ghost';
    document.querySelectorAll(hoverTargets).forEach(el => {
      el.addEventListener('mouseenter', () => { dot.classList.add('hover'); ring.classList.add('hover'); });
      el.addEventListener('mouseleave', () => { dot.classList.remove('hover'); ring.classList.remove('hover'); });
    });
  })();

  /* =========================
     CURSOR GLOW + GRID PARALLAX
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
     SOLUTION BUTTONS → FORM PREFILL
  ========================= */
  (function(){
    const solutionButtons = document.querySelectorAll('[data-prefill-role]');
    const roleSelect = document.getElementById('role');
    const needSelect = document.getElementById('need');
    const form = document.getElementById('contactForm');
    if(!solutionButtons.length) return;
    solutionButtons.forEach(button => {
      button.addEventListener('click', function(e){
        e.preventDefault();
        const role = button.dataset.prefillRole;
        const need = button.dataset.prefillNeed;
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
    if(!modal.classList.contains('is-visible')){
      document.body.style.overflow = 'hidden';
      requestAnimationFrame(() => modal.classList.add('is-visible'));
    }
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
    const form = document.getElementById('contactForm');
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