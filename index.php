

Dapur kreatif · HTML
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dapur Kreatif — Kantin Wirausaha Siswa</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    :root{
        --bg:#FBF1E1;
        --paper:#FFFCF6;
        --ink:#3B2113;
        --brown:#6B3410;
        --gold:#D98324;
        --terracotta:#B5502F;
        --sage:#6F8F5A;
        --berry:#C1466B;
        --line:rgba(59,33,19,.12);
        --shadow:rgba(74,38,14,.14);
    }
    *{box-sizing:border-box;}
    html{scroll-behavior:smooth;}
    @media (prefers-reduced-motion: reduce){
        html{scroll-behavior:auto;}
        *{animation-duration:.001ms !important; animation-iteration-count:1 !important; transition-duration:.001ms !important;}
    }
    body{
        margin:0;
        background:var(--bg);
        color:var(--ink);
        font-family:'Work Sans', sans-serif;
        line-height:1.5;
    }
    h1,h2,h3{ font-family:'Fraunces', serif; margin:0; color:var(--brown); font-weight:600; }
    a{ color:inherit; }
    :focus-visible{ outline:3px solid var(--gold); outline-offset:3px; border-radius:4px; }
 
    /* ---------- Header ---------- */
    header{
        position:sticky; top:0; z-index:100;
        background:rgba(251,241,225,.92);
        backdrop-filter:blur(6px);
        border-bottom:1px solid var(--line);
        padding:16px 6%;
        display:flex; align-items:center; justify-content:space-between;
    }
    .logo{ display:flex; align-items:center; gap:10px; font-family:'Fraunces',serif; font-size:22px; font-weight:700; color:var(--brown); }
    .logo-mark{ width:34px; height:34px; flex:0 0 auto; }
    nav{ display:flex; gap:26px; }
    nav a{ text-decoration:none; color:var(--ink); font-size:14px; font-weight:600; position:relative; padding-bottom:4px; }
    nav a::after{
        content:""; position:absolute; left:0; bottom:0; width:0; height:2px; background:var(--gold);
        transition:width .25s ease;
    }
    nav a:hover::after, nav a:focus-visible::after{ width:100%; }
 
    /* ---------- Hero ---------- */
    .hero{
        padding:64px 6% 80px;
        display:grid;
        grid-template-columns:1.1fr .9fr;
        gap:48px;
        align-items:center;
        background:linear-gradient(180deg, #FBF1E1 0%, #F6E4C4 100%);
        border-bottom:1px solid var(--line);
    }
    .hero-copy .eyebrow{
        display:inline-flex; align-items:center; gap:8px;
        font-size:13px; font-weight:600; color:var(--terracotta);
        margin-bottom:16px;
    }
    .hero-copy .eyebrow svg{ width:16px; height:16px; }
    .hero h1{ font-size:clamp(34px,4.6vw,54px); line-height:1.08; margin-bottom:20px; }
    .hero p.lede{ font-size:17px; max-width:46ch; color:#5A4130; margin-bottom:28px; }
    .hero-actions{ display:flex; gap:12px; flex-wrap:wrap; }
    .btn{
        display:inline-flex; align-items:center; gap:8px;
        text-decoration:none; padding:13px 22px; border-radius:10px;
        font-weight:600; font-size:15px; border:1px solid transparent;
        transition:transform .15s ease, box-shadow .15s ease;
    }
    .btn:hover{ transform:translateY(-2px); }
    .btn-fill{ background:var(--brown); color:#FFF7EC; box-shadow:0 8px 18px rgba(107,52,16,.28); }
    .btn-outline{ background:transparent; border-color:var(--brown); color:var(--brown); }
 
    .hero-stall{
        position:relative;
        background:var(--paper);
        border-radius:26px;
        border:1px solid var(--line);
        box-shadow:0 24px 44px var(--shadow);
        padding:22px;
        transform:rotate(-1.2deg);
    }
    .hero-stall svg{ width:100%; height:auto; display:block; }
    .hero-stall figcaption{
        margin-top:10px; text-align:center; font-size:13px; color:#8A6C55; font-weight:500;
    }
 
    /* ---------- Sections ---------- */
    section{ padding:70px 6%; }
    .section-head{ max-width:640px; margin:0 auto 40px; text-align:center; }
    .section-head h2{ font-size:32px; margin-bottom:10px; }
    .section-head p{ color:#7A5F49; margin:0; }
 
    .category-head{
        display:flex; align-items:baseline; gap:12px; margin:44px 0 22px;
    }
    .category-head:first-of-type{ margin-top:0; }
    .category-head h3{ font-size:23px; color:var(--terracotta); }
    .category-head .count{ font-size:13px; color:#9C8064; }
 
    /* ---------- Menu mosaic ---------- */
    .menu-grid{
        display:grid;
        grid-template-columns:repeat(4, 1fr);
        gap:20px;
        align-items:start;
    }
    .dish{
        --tilt:0deg;
        background:var(--tile-bg, var(--paper));
        border:1px solid var(--line);
        border-radius:var(--radius, 20px);
        padding:20px;
        position:relative;
        transform:rotate(var(--tilt));
        box-shadow:0 10px 22px var(--shadow);
        opacity:0;
        animation:place .55s cubic-bezier(.2,.7,.3,1) forwards;
        animation-delay:calc(var(--i) * 55ms);
    }
    @keyframes place{
        from{ opacity:0; transform:translateY(14px) rotate(var(--tilt)) scale(.97); }
        to{ opacity:1; transform:translateY(0) rotate(var(--tilt)) scale(1); }
    }
    .dish--wide{ grid-column:span 2; }
    .dish:nth-child(3n+1){ --tilt:-.6deg; }
    .dish:nth-child(3n+2){ --tilt:.5deg; }
    .dish:nth-child(3n+3){ --tilt:-.3deg; }
 
    .dish-top{
        display:flex; align-items:flex-start; justify-content:space-between; gap:10px; margin-bottom:14px;
    }
    .dish-icon{
        width:64px; height:64px; border-radius:var(--blob, 30% 70% 65% 35% / 45% 40% 60% 55%);
        background:var(--blob-bg, #F1E2C9);
        display:flex; align-items:center; justify-content:center;
        flex:0 0 auto;
    }
    .dish--wide .dish-icon{ width:84px; height:84px; }
    .dish-icon svg{ width:70%; height:70%; }
    .sticker{
        font-size:10.5px; font-weight:700; color:var(--sticker-color, var(--terracotta));
        background:var(--sticker-bg, #FFF1D6);
        padding:5px 9px; border-radius:6px;
        transform:rotate(2deg);
        white-space:nowrap;
    }
    .dish h4{ font-family:'Fraunces',serif; font-size:19px; color:var(--ink); margin:0 0 6px; font-weight:600; }
    .dish p{ font-size:13.5px; color:#7A5F49; margin:0 0 14px; min-height:38px; }
    .dish-price{
        display:inline-flex; align-items:center; gap:6px;
        font-family:'Fraunces',serif; font-weight:700; font-size:19px;
        color:var(--price-color, var(--brown));
        border-top:1px dashed var(--line); padding-top:12px; width:100%;
    }
    .dish-price::before{ content:"Rp"; font-size:12px; font-weight:600; color:#B08A64; }
 
    /* ---------- About ---------- */
    .about{ background:var(--paper); border-top:1px solid var(--line); border-bottom:1px solid var(--line); }
    .about-wrap{
        max-width:960px; margin:0 auto;
        display:grid; grid-template-columns:1fr 1fr; gap:40px; align-items:center;
    }
    .about-art{
        background:#FBEFDA; border-radius:24px; padding:30px;
        border:1px solid var(--line);
    }
    .about-art svg{ width:100%; height:auto; }
    .about-copy p{ color:#5A4130; font-size:15.5px; margin:0 0 16px; }
    .about-copy .fact{
        display:flex; gap:10px; align-items:flex-start; margin-top:20px;
        font-size:14px; color:var(--brown); font-weight:600;
    }
 
    /* ---------- Contact ---------- */
    .contact{ background:#F3DFC0; }
    .contact-wrap{ max-width:760px; margin:0 auto; text-align:center; }
    .contact-wrap p{ color:#5A4130; margin:10px 0 26px; }
    .contact-grid{
        display:flex; justify-content:center; gap:14px; flex-wrap:wrap; margin-bottom:28px;
    }
    .contact-item{
        display:flex; align-items:center; gap:10px;
        background:var(--paper); padding:14px 18px; border-radius:12px;
        border:1px solid var(--line); font-size:14px; font-weight:500;
        box-shadow:0 6px 16px var(--shadow);
    }
    .contact-item svg{ width:20px; height:20px; flex:0 0 auto; color:var(--terracotta); }
 
    footer{
        background:var(--ink); color:#F3E3CB;
        text-align:center; padding:24px 6%; font-size:13.5px;
    }
    footer b{ color:#FBE0B3; }
 
    @media (max-width:980px){
        .hero{ grid-template-columns:1fr; }
        .about-wrap{ grid-template-columns:1fr; }
        .menu-grid{ grid-template-columns:repeat(2,1fr); }
        .dish--wide{ grid-column:span 2; }
    }
    @media (max-width:620px){
        header{ flex-direction:column; gap:12px; padding:14px 6%; }
        nav{ gap:16px; flex-wrap:wrap; justify-content:center; }
        .hero{ padding:44px 6% 56px; text-align:center; }
        .hero-actions{ justify-content:center; }
        .menu-grid{ grid-template-columns:1fr; }
        .dish--wide{ grid-column:span 1; }
        section{ padding:52px 6%; }
    }
</style>
</head>
<body>
 
<header>
    <div class="logo">
        <svg class="logo-mark" viewBox="0 0 40 40" fill="none">
            <circle cx="20" cy="20" r="19" fill="#F1E2C9" stroke="#B5502F" stroke-width="1.5"/>
            <path d="M12 24c0-6 3-11 8-11s8 5 8 11" stroke="#6B3410" stroke-width="2" fill="none" stroke-linecap="round"/>
            <circle cx="20" cy="14" r="2.4" fill="#D98324"/>
        </svg>
        Dapur Kreatif
    </div>
    <nav>
        <a href="#beranda">Beranda</a>
        <a href="#produk">Menu</a>
        <a href="#tentang">Tentang</a>
        <a href="#kontak">Kontak</a>
    </nav>
</header>
 
<section class="hero" id="beranda">
    <div class="hero-copy">
        <span class="eyebrow">
            <svg viewBox="0 0 24 24" fill="none"><path d="M4 12h16M4 6h16M4 18h10" stroke="#B5502F" stroke-width="2" stroke-linecap="round"/></svg>
            Dikelola siswa, dijual di kantin sekolah
        </span>
        <h1>Jajanan buatan siswa, rasanya nggak kaleng-kaleng.</h1>
        <p class="lede">Dapur Kreatif menjual camilan, makanan berat, dan minuman dingin dengan harga yang tetap ramah kantong pelajar. Cocok buat teman istirahat, belajar kelompok, atau nongkrong sore.</p>
        <div class="hero-actions">
            <a class="btn btn-fill" href="#produk">Lihat menu lengkap</a>
            <a class="btn btn-outline" href="#kontak">Cara pesan</a>
        </div>
    </div>
 
    <figure class="hero-stall">
        <svg viewBox="0 0 360 260" fill="none">
            <rect x="10" y="150" width="340" height="90" rx="10" fill="#E7BE86"/>
            <rect x="10" y="150" width="340" height="14" fill="#D9A662"/>
            <rect x="26" y="176" width="60" height="8" fill="#C1861F" opacity=".5"/>
            <rect x="120" y="176" width="60" height="8" fill="#C1861F" opacity=".5"/>
            <rect x="214" y="176" width="60" height="8" fill="#C1861F" opacity=".5"/>
            <!-- rice bowl -->
            <ellipse cx="90" cy="150" rx="46" ry="10" fill="#B5502F" opacity=".18"/>
            <path d="M52 150c0 18 17 30 38 30s38-12 38-30" fill="#F3E3CB" stroke="#B5502F" stroke-width="2"/>
            <ellipse cx="90" cy="150" rx="38" ry="10" fill="#D9731C"/>
            <circle cx="78" cy="146" r="10" fill="#FFF7EC" stroke="#D9A662" stroke-width="1.5"/>
            <circle cx="78" cy="146" r="4" fill="#D98324"/>
            <circle cx="104" cy="150" r="3" fill="#6F8F5A"/>
            <circle cx="94" cy="152" r="3" fill="#6F8F5A"/>
            <!-- banana -->
            <path d="M190 128c8-24 30-34 46-30-4 20-24 40-46 40z" fill="#E9C13A"/>
            <path d="M190 128c8-24 30-34 46-30" stroke="#B5502F" stroke-width="1.5" fill="none"/>
            <path d="M198 118c8-4 18-10 24-18" stroke="#6B3410" stroke-width="3" fill="none" stroke-linecap="round"/>
            <circle cx="210" cy="104" r="3" fill="#3B2113"/>
            <!-- drink cup -->
            <path d="M282 96l8 62h34l8-62z" fill="#FBE0B3" stroke="#B5502F" stroke-width="2"/>
            <path d="M284 108h46" stroke="#D9731C" stroke-width="2"/>
            <rect x="288" y="108" width="38" height="42" fill="#D9731C" opacity=".85"/>
            <rect x="299" y="76" width="6" height="34" rx="3" fill="#FFF7EC" stroke="#B5502F" stroke-width="1.5"/>
            <rect x="290" y="112" width="6" height="6" fill="#FFF7EC" opacity=".8"/>
            <rect x="305" y="122" width="6" height="6" fill="#FFF7EC" opacity=".8"/>
        </svg>
        <figcaption>Etalase Dapur Kreatif di kantin sekolah</figcaption>
    </figure>
</section>
 
<section id="produk">
    <div class="section-head">
        <h2>Menu Dapur Kreatif</h2>
        <p>Setiap menu ditata dengan tampilannya sendiri — biar kamu bisa langsung kebayang rasanya sebelum pesan.</p>
    </div>
 
    <div class="category-head">
        <h3>Makanan &amp; Camilan</h3>
        <span class="count">8 pilihan</span>
    </div>
    <div class="menu-grid">
 
        <!-- Pisang Coklat -->
        <article class="dish dish--wide" style="--i:0; --tile-bg:#F7E9CE; --blob-bg:#E9C13A; --sticker-bg:#5B2E12; --sticker-color:#FBE0B3; --price-color:#7A4324;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:62% 38% 55% 45% / 48% 45% 55% 52%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <path d="M14 40c4-20 22-30 36-24-6 18-22 32-40 30z" fill="#E9C13A" stroke="#8A5A16" stroke-width="1.5"/>
                        <path d="M20 34c6-3 14-9 18-16" stroke="#6B3410" stroke-width="2.5" fill="none" stroke-linecap="round"/>
                        <path d="M22 20c4 2 12 1 18-6" stroke="#5B2E12" stroke-width="3.5" fill="none" stroke-linecap="round"/>
                        <circle cx="30" cy="16" r="2" fill="#3B2113"/>
                        <circle cx="24" cy="24" r="2" fill="#3B2113"/>
                        <circle cx="38" cy="12" r="2" fill="#3B2113"/>
                    </svg>
                </div>
                <span class="sticker">TERLARIS</span>
            </div>
            <h4>Pisang Coklat</h4>
            <p>Pisang renyah digulung tipis lalu digoreng garing, isian cokelat leleh yang manis di setiap gigitan.</p>
            <span class="dish-price">8.000</span>
        </article>
 
        <!-- Kripik Pisang -->
        <article class="dish" style="--i:1; --tile-bg:#FBEFD6; --blob-bg:#F3D98A; --sticker-bg:#FFF1D6; --sticker-color:#C1861F;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:55% 45% 60% 40% / 40% 55% 45% 60%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <ellipse cx="24" cy="40" rx="14" ry="8" fill="#F3D98A" stroke="#C1861F" stroke-width="1.5"/>
                        <ellipse cx="34" cy="32" rx="14" ry="8" fill="#F6E2A8" stroke="#C1861F" stroke-width="1.5"/>
                        <ellipse cx="26" cy="24" rx="14" ry="8" fill="#F3D98A" stroke="#C1861F" stroke-width="1.5"/>
                        <path d="M18 24c2-1 6-1 8 0M40 32c2-1 6-1 8 0M14 40c2-1 6-1 8 0" stroke="#8A5A16" stroke-width="1.3" stroke-linecap="round"/>
                    </svg>
                </div>
                <span class="sticker">GURIH &amp; RENYAH</span>
            </div>
            <h4>Kripik Pisang</h4>
            <p>Kripik pisang tipis dan renyah, tersedia rasa original atau balado pedas manis.</p>
            <span class="dish-price">10.000</span>
        </article>
 
        <!-- Nasi Goreng -->
        <article class="dish dish--wide" style="--i:2; --tile-bg:#FCE6C8; --blob-bg:#FFF7EC; --sticker-bg:#B5502F; --sticker-color:#FFF3E4; --price-color:#B5502F;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:50% 50% 50% 50% / 42% 42% 58% 58%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <ellipse cx="32" cy="42" rx="24" ry="7" fill="#B5502F" opacity=".15"/>
                        <path d="M10 40c0 9 10 15 22 15s22-6 22-15" fill="none" stroke="#B5502F" stroke-width="2"/>
                        <ellipse cx="32" cy="40" rx="20" ry="7" fill="#D9731C"/>
                        <ellipse cx="24" cy="34" rx="9" ry="6" fill="#E68C31"/>
                        <circle cx="20" cy="30" r="6" fill="#FFF7EC" stroke="#D9A662" stroke-width="1.5"/>
                        <circle cx="20" cy="30" r="2.6" fill="#D98324"/>
                        <circle cx="40" cy="37" r="1.8" fill="#6F8F5A"/>
                        <circle cx="36" cy="40" r="1.8" fill="#6F8F5A"/>
                        <circle cx="44" cy="41" r="1.8" fill="#C1442E"/>
                    </svg>
                </div>
                <span class="sticker">MENU UTAMA</span>
            </div>
            <h4>Nasi Goreng</h4>
            <p>Nasi goreng gurih dengan telur mata sapi, taburan bawang, dan sedikit sentuhan pedas.</p>
            <span class="dish-price">15.000</span>
        </article>
 
        <!-- Mie Goreng -->
        <article class="dish" style="--i:3; --tile-bg:#F7E3CE; --blob-bg:#F6D9A8; --sticker-bg:#FFF1D6; --sticker-color:#B5502F;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:45% 55% 55% 45% / 55% 45% 55% 45%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <ellipse cx="32" cy="42" rx="22" ry="8" fill="#8A5A2A" opacity=".18"/>
                        <path d="M14 34c4-4 8 4 12 0s8 4 12 0 8 4 12 0" stroke="#D9A662" stroke-width="2.4" fill="none" stroke-linecap="round"/>
                        <path d="M14 40c4-4 8 4 12 0s8 4 12 0 8 4 12 0" stroke="#E9C13A" stroke-width="2.4" fill="none" stroke-linecap="round"/>
                        <circle cx="24" cy="30" r="4" fill="#FFF7EC" stroke="#D9A662" stroke-width="1.2"/>
                        <circle cx="42" cy="34" r="2" fill="#C1442E"/>
                        <circle cx="20" cy="38" r="1.8" fill="#6F8F5A"/>
                    </svg>
                </div>
                <span class="sticker">FAVORIT</span>
            </div>
            <h4>Mie Goreng</h4>
            <p>Mie goreng dengan telur dan potongan sayuran segar, pas untuk makan siang.</p>
            <span class="dish-price">13.000</span>
        </article>
 
        <!-- Roti Bakar Cokelat -->
        <article class="dish" style="--i:4; --tile-bg:#F1E2C9; --blob-bg:#E7B978; --sticker-bg:#FFF1D6; --sticker-color:#8B4A2B;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:35% 65% 60% 40% / 55% 40% 60% 45%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <rect x="12" y="16" width="40" height="32" rx="4" fill="#E7B978" stroke="#8B4A2B" stroke-width="1.6"/>
                        <rect x="12" y="16" width="40" height="32" rx="4" fill="none" stroke="#8B4A2B" stroke-width="1" stroke-dasharray="1 4"/>
                        <path d="M16 26c6-2 8 3 14 1s8-4 14-1 8 3 12 1" stroke="#5B2E12" stroke-width="2.2" fill="none" stroke-linecap="round"/>
                        <path d="M16 34c6-2 8 3 14 1s8-4 14-1 8 3 12 1" stroke="#5B2E12" stroke-width="2.2" fill="none" stroke-linecap="round"/>
                        <circle cx="22" cy="40" r="1.6" fill="#C1442E"/>
                        <circle cx="30" cy="42" r="1.6" fill="#6F8F5A"/>
                        <circle cx="38" cy="40" r="1.6" fill="#D98324"/>
                    </svg>
                </div>
                <span class="sticker">CAMILAN</span>
            </div>
            <h4>Roti Bakar Cokelat</h4>
            <p>Roti dipanggang hingga hangat, diberi selai cokelat dan taburan meses warna-warni.</p>
            <span class="dish-price">10.000</span>
        </article>
 
        <!-- Sosis Bakar -->
        <article class="dish" style="--i:5; --tile-bg:#F9E0D3; --blob-bg:#E8B199; --sticker-bg:#FFF1D6; --sticker-color:#C1442E;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:60% 40% 40% 60% / 50% 50% 50% 50%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <rect x="10" y="30" width="4" height="4" fill="#B5502F"/>
                        <path d="M14 32c8-6 28-6 36 0" stroke="#8A5A2A" stroke-width="2"/>
                        <rect x="14" y="24" width="34" height="16" rx="8" fill="#C1442E" stroke="#7A2A1A" stroke-width="1.6"/>
                        <path d="M20 25l-3 15M30 24l-3 17M40 25l-3 15" stroke="#3B2113" stroke-width="1.4" stroke-linecap="round"/>
                        <path d="M48 32h6" stroke="#8A5A2A" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <span class="sticker">PRAKTIS</span>
            </div>
            <h4>Sosis Bakar</h4>
            <p>Sosis panggang bergaris bakar, disiram saus pedas manis yang menggugah selera.</p>
            <span class="dish-price">10.000</span>
        </article>
 
        <!-- Kentang Goreng -->
        <article class="dish" style="--i:6; --tile-bg:#FCEFD9; --blob-bg:#F3D98A; --sticker-bg:#FFF1D6; --sticker-color:#C18B1F;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:50% 50% 60% 40% / 60% 40% 55% 45%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <path d="M20 30h24l-3 20a4 4 0 0 1-4 4H27a4 4 0 0 1-4-4z" fill="#C1442E" stroke="#7A2A1A" stroke-width="1.5"/>
                        <rect x="20" y="26" width="24" height="6" fill="#FFF7EC" stroke="#C1442E" stroke-width="1.2"/>
                        <rect x="24" y="10" width="4" height="20" rx="1.5" fill="#E9C13A"/>
                        <rect x="30" y="6" width="4" height="24" rx="1.5" fill="#F3D98A"/>
                        <rect x="36" y="12" width="4" height="18" rx="1.5" fill="#E9C13A"/>
                    </svg>
                </div>
                <span class="sticker">CAMILAN</span>
            </div>
            <h4>Kentang Goreng</h4>
            <p>Kentang goreng renyah di luar, lembut di dalam. Pilih saus sambal atau mayones.</p>
            <span class="dish-price">10.000</span>
        </article>
 
        <!-- Sandwich Telur -->
        <article class="dish" style="--i:7; --tile-bg:#F3E7D2; --blob-bg:#DCE7C9; --sticker-bg:#FFF1D6; --sticker-color:#6F8F5A;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:40% 60% 45% 55% / 55% 55% 45% 45%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <path d="M10 44l22-26 22 26z" fill="none" stroke="#8B4A2B" stroke-width="2"/>
                        <path d="M14 40l18-20 18 20" fill="#E7B978"/>
                        <path d="M18 40c4-2 8 2 14 0s10-2 14 0" stroke="#6F8F5A" stroke-width="3" fill="none" stroke-linecap="round"/>
                        <ellipse cx="32" cy="34" rx="6" ry="4" fill="#FFF7EC" stroke="#D9A662" stroke-width="1"/>
                        <circle cx="32" cy="34" r="2.2" fill="#D98324"/>
                    </svg>
                </div>
                <span class="sticker">RINGAN</span>
            </div>
            <h4>Sandwich Telur</h4>
            <p>Roti lembut berisi telur dan sayuran segar, cukup untuk mengisi perut di sela kelas.</p>
            <span class="dish-price">12.000</span>
        </article>
    </div>
 
    <div class="category-head">
        <h3>Minuman</h3>
        <span class="count">6 pilihan</span>
    </div>
    <div class="menu-grid">
 
        <!-- Es Teh Manis -->
        <article class="dish" style="--i:0; --tile-bg:#EAF1E2; --blob-bg:#CFE0C0; --sticker-bg:#5C8A52; --sticker-color:#F3FBEE;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:45% 55% 55% 45% / 50% 50% 50% 50%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <path d="M20 16h24l-4 34a5 5 0 0 1-5 4.5H29a5 5 0 0 1-5-4.5z" fill="#FFF7EC" stroke="#5C8A52" stroke-width="1.6"/>
                        <path d="M21 26h22l-2.5 24a3 3 0 0 1-3 2.6h-11a3 3 0 0 1-3-2.6z" fill="#8A5A2A" opacity=".55"/>
                        <rect x="26" y="30" width="5" height="5" fill="#FFF7EC" opacity=".9"/>
                        <rect x="33" y="36" width="5" height="5" fill="#FFF7EC" opacity=".9"/>
                        <rect x="30" y="4" width="3" height="20" rx="1.5" fill="#5C8A52"/>
                    </svg>
                </div>
                <span class="sticker">PALING HEMAT</span>
            </div>
            <h4>Es Teh Manis</h4>
            <p>Teh manis dingin yang menyegarkan, teman pas untuk semua menu makanan.</p>
            <span class="dish-price">5.000</span>
        </article>
 
        <!-- Es Jeruk -->
        <article class="dish" style="--i:1; --tile-bg:#FDEBD0; --blob-bg:#F3B65A; --sticker-bg:#FFF1D6; --sticker-color:#E08A1F;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:55% 45% 45% 55% / 45% 55% 45% 55%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <path d="M20 16h24l-4 34a5 5 0 0 1-5 4.5H29a5 5 0 0 1-5-4.5z" fill="#FFF7EC" stroke="#E08A1F" stroke-width="1.6"/>
                        <path d="M21 24h22l-2.7 26a3 3 0 0 1-3 2.6H26.7a3 3 0 0 1-3-2.6z" fill="#E9821E" opacity=".8"/>
                        <circle cx="32" cy="20" r="8" fill="#F3B65A" stroke="#D9731C" stroke-width="1.4"/>
                        <path d="M32 12v16M24 20h16M26.3 14.3l11.4 11.4M37.7 14.3L26.3 25.7" stroke="#FFF7EC" stroke-width="1.1"/>
                        <rect x="30" y="4" width="3" height="10" rx="1.5" fill="#E08A1F"/>
                    </svg>
                </div>
                <span class="sticker">SEGAR</span>
            </div>
            <h4>Es Jeruk</h4>
            <p>Perasan jeruk segar dengan es batu, rasa manis asam yang pas di siang hari.</p>
            <span class="dish-price">7.000</span>
        </article>
 
        <!-- Es Cokelat -->
        <article class="dish" style="--i:2; --tile-bg:#EDE0D3; --blob-bg:#7A4324; --sticker-bg:#FFF1D6; --sticker-color:#6B3A1E;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:50% 50% 60% 40% / 55% 45% 55% 45%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <path d="M20 16h24l-4 34a5 5 0 0 1-5 4.5H29a5 5 0 0 1-5-4.5z" fill="#FFF7EC" stroke="#6B3A1E" stroke-width="1.6"/>
                        <path d="M21 24h22l-2.7 26a3 3 0 0 1-3 2.6H26.7a3 3 0 0 1-3-2.6z" fill="#5B2E12"/>
                        <path d="M25 24c3 3 3 6 0 9M32 24c3 3 3 6 0 9M39 24c3 3 3 6 0 9" stroke="#8A5A2A" stroke-width="1.6" fill="none" stroke-linecap="round"/>
                        <ellipse cx="32" cy="17" rx="9" ry="4" fill="#FFF7EC"/>
                        <rect x="30" y="4" width="3" height="10" rx="1.5" fill="#6B3A1E"/>
                    </svg>
                </div>
                <span class="sticker">FAVORIT</span>
            </div>
            <h4>Es Cokelat</h4>
            <p>Minuman cokelat dingin yang creamy, manisnya pas untuk penutup jam istirahat.</p>
            <span class="dish-price">10.000</span>
        </article>
 
        <!-- Milkshake Stroberi -->
        <article class="dish dish--wide" style="--i:3; --tile-bg:#FBE1E7; --blob-bg:#EE9BB0; --sticker-bg:#C1466B; --sticker-color:#FFF0F5; --price-color:#C1466B;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:40% 60% 55% 45% / 60% 40% 60% 40%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <path d="M18 18h28l-3.5 32a5 5 0 0 1-5 4.5H26.5a5 5 0 0 1-5-4.5z" fill="#FFF7EC" stroke="#C1466B" stroke-width="1.6"/>
                        <path d="M19.5 26h25l-2.6 22a3 3 0 0 1-3 2.6h-13.8a3 3 0 0 1-3-2.6z" fill="#F2A7BE"/>
                        <ellipse cx="32" cy="19" rx="11" ry="4.5" fill="#FFF7EC" stroke="#EE9BB0" stroke-width="1.2"/>
                        <path d="M20 12c2 4 1 7-1 9M32 10c2 4 1 7-1 9M44 12c-2 4-1 7 1 9" stroke="#FFF7EC" stroke-width="2" fill="none" stroke-linecap="round"/>
                        <circle cx="44" cy="22" r="5" fill="#D0304F"/>
                        <path d="M44 17c-2 0-3 2-3 2s1-2 3-2z" fill="#6F8F5A"/>
                        <circle cx="42" cy="21" r=".6" fill="#5B0F1F"/>
                        <circle cx="46" cy="23" r=".6" fill="#5B0F1F"/>
                        <circle cx="43" cy="24" r=".6" fill="#5B0F1F"/>
                    </svg>
                </div>
                <span class="sticker">MANIS</span>
            </div>
            <h4>Milk Shake Stroberi</h4>
            <p>Susu kental rasa stroberi diblender lembut, ditutup krim manis di atasnya — favorit anak-anak.</p>
            <span class="dish-price">12.000</span>
        </article>
 
        <!-- Es Kopi Susu -->
        <article class="dish" style="--i:4; --tile-bg:#EFE3D6; --blob-bg:#8A5A2A; --sticker-bg:#FFF1D6; --sticker-color:#4A2E1E;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:55% 45% 45% 55% / 45% 55% 45% 55%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <path d="M20 16h24l-4 34a5 5 0 0 1-5 4.5H29a5 5 0 0 1-5-4.5z" fill="#FFF7EC" stroke="#4A2E1E" stroke-width="1.6"/>
                        <path d="M21 24h22l-1.3 12h-19.4z" fill="#3B2313"/>
                        <path d="M20.6 36h22.8l-1.4 14a3 3 0 0 1-3 2.6H25a3 3 0 0 1-3-2.6z" fill="#D9C3A6"/>
                        <path d="M21 30h22" stroke="#5B2E12" stroke-width="1.2" stroke-dasharray="2 2"/>
                        <rect x="30" y="4" width="3" height="10" rx="1.5" fill="#4A2E1E"/>
                    </svg>
                </div>
                <span class="sticker">COFFEE</span>
            </div>
            <h4>Es Kopi Susu</h4>
            <p>Perpaduan kopi dan susu yang lembut, rasa pahitnya ringan dan nggak nusuk.</p>
            <span class="dish-price">12.000</span>
        </article>
 
        <!-- Thai Tea -->
        <article class="dish" style="--i:5; --tile-bg:#F7DFC4; --blob-bg:#E68C31; --sticker-bg:#FFF1D6; --sticker-color:#D9731C;">
            <div class="dish-top">
                <div class="dish-icon" style="--blob:45% 55% 60% 40% / 50% 50% 50% 50%;">
                    <svg viewBox="0 0 64 64" fill="none">
                        <path d="M20 16h24l-4 34a5 5 0 0 1-5 4.5H29a5 5 0 0 1-5-4.5z" fill="#FFF7EC" stroke="#D9731C" stroke-width="1.6"/>
                        <path d="M21 24h22l-2 18h-18z" fill="#E68C31"/>
                        <path d="M20.6 41h22.8l-1 8.5a3 3 0 0 1-3 2.6H24.6a3 3 0 0 1-3-2.6z" fill="#F3E3CB"/>
                        <rect x="26" y="27" width="4" height="4" fill="#FFF7EC" opacity=".8"/>
                        <rect x="34" y="30" width="4" height="4" fill="#FFF7EC" opacity=".8"/>
                        <rect x="30" y="4" width="3" height="10" rx="1.5" fill="#D9731C"/>
                    </svg>
                </div>
                <span class="sticker">KEKINIAN</span>
            </div>
            <h4>Thai Tea</h4>
            <p>Teh khas Thailand dengan lapisan susu creamy di atasnya, wangi dan menyegarkan.</p>
            <span class="dish-price">10.000</span>
        </article>
    </div>
</section>
 
<section class="about" id="tentang">
    <div class="about-wrap">
        <div class="about-art">
            <svg viewBox="0 0 260 220" fill="none">
                <rect x="20" y="150" width="220" height="14" fill="#D9A662"/>
                <rect x="20" y="164" width="220" height="40" rx="6" fill="#E7BE86"/>
                <path d="M50 150c0-40 28-72 80-72s80 32 80 72" fill="none" stroke="#B5502F" stroke-width="3"/>
                <circle cx="90" cy="110" r="9" fill="#E9C13A"/>
                <circle cx="130" cy="96" r="9" fill="#D9731C"/>
                <circle cx="170" cy="112" r="9" fill="#C1466B"/>
                <rect x="82" y="118" width="16" height="18" rx="3" fill="#8A5A2A"/>
                <rect x="122" y="104" width="16" height="24" rx="3" fill="#6B3410"/>
                <rect x="162" y="120" width="16" height="16" rx="3" fill="#7A2A46"/>
            </svg>
        </div>
        <div class="about-copy">
            <h2>Tentang Dapur Kreatif</h2>
            <p>Dapur Kreatif dibuat sebagai proyek wirausaha siswa untuk melatih kreativitas, kerja sama tim, pelayanan pelanggan, dan kemampuan mengelola usaha kecil dari nol.</p>
            <p>Setiap menu dipilih dari makanan dan minuman yang mudah dijual di lingkungan sekolah, dengan harga yang tetap terjangkau untuk pelajar.</p>
            <div class="fact">
                <svg viewBox="0 0 24 24" fill="none" width="20" height="20"><path d="M12 2l2.5 6.5L21 9l-5 4.5L17.5 21 12 17l-5.5 4L8 13.5 3 9l6.5-.5z" fill="#D98324"/></svg>
                Target pelanggan: siswa, guru, pegawai sekolah, dan masyarakat sekitar.
            </div>
        </div>
    </div>
</section>
 
<section class="contact" id="kontak">
    <div class="contact-wrap">
        <h2>Pesan Sekarang</h2>
        <p>Datang langsung ke kantin, atau hubungi kami lewat kontak berikut.</p>
        <div class="contact-grid">
            <div class="contact-item">
                <svg viewBox="0 0 24 24" fill="none"><path d="M12 21s7-6.5 7-12a7 7 0 1 0-14 0c0 5.5 7 12 7 12z" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="9" r="2.5" stroke="currentColor" stroke-width="1.6"/></svg>
                Kantin Sekolah
            </div>
            <div class="contact-item">
                <svg viewBox="0 0 24 24" fill="none"><path d="M6 3h4l2 5-2.5 1.5a12 12 0 0 0 5 5L16 12l5 2v4a2 2 0 0 1-2 2C10.5 20 4 13.5 4 5a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="1.6"/></svg>
                0812-3456-7890
            </div>
            <div class="contact-item">
                <svg viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M4 7l8 6 8-6" stroke="currentColor" stroke-width="1.6"/></svg>
                dapurkreatif@email.com
            </div>
        </div>
        <a class="btn btn-fill" href="https://wa.me/6281234567890">Chat WhatsApp</a>
    </div>
</section>
 
<footer>
    Dapur Kreatif · Wirausaha Siswa <b>© 2026</b>
</footer>
 
</body>
</html>
 
