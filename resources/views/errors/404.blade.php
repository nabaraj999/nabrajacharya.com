<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Lost in Space | TechNabu</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #030712;
            --text: #edf3ff;
            --muted: #7a8fb0;
            --primary: #78f2c8;
            --secondary: #4cc9ff;
            --violet: #9c8cff;
            --danger: #ff6b7d;
        }

        html, body {
            height: 100%;
            overflow-x: hidden;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* ── Star field ── */
        .stars {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .stars span {
            position: absolute;
            border-radius: 50%;
            background: #fff;
            animation: twinkle var(--dur, 3s) ease-in-out infinite var(--delay, 0s);
            opacity: 0;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0; transform: scale(0.8); }
            50%       { opacity: var(--op, 0.7); transform: scale(1); }
        }

        /* ── Background glow blobs ── */
        .blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            z-index: 0;
        }
        .blob-teal   { width: 480px; height: 480px; top: -80px;  left: -100px; background: rgba(120,242,200,0.07); animation: blobDrift 14s ease-in-out infinite alternate; }
        .blob-blue   { width: 420px; height: 420px; bottom: -60px; right: -80px; background: rgba(76,201,255,0.08); animation: blobDrift 18s ease-in-out infinite alternate-reverse; }
        .blob-violet { width: 360px; height: 360px; top: 40%;    left: 40%;  background: rgba(156,140,255,0.06); animation: blobDrift 22s ease-in-out infinite alternate; }

        @keyframes blobDrift {
            from { transform: translate(0,0) scale(1);   }
            to   { transform: translate(40px,30px) scale(1.1); }
        }

        /* ── Main layout ── */
        .page {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 24px 60px;
            width: 100%;
            max-width: 860px;
            text-align: center;
        }

        /* ── Topbar ── */
        .topbar {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 48px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--text);
            font-weight: 800;
            letter-spacing: 0.02em;
        }

        .brand-mark {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1rem;
            background: linear-gradient(135deg, rgba(120,242,200,0.9), rgba(76,201,255,0.88));
            color: #07111f;
            box-shadow: 0 10px 28px rgba(76,201,255,0.22);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: var(--muted);
            font-size: 0.9rem;
            padding: 8px 14px;
            border-radius: 10px;
            border: 1px solid rgba(147,164,202,0.14);
            transition: color 0.2s, border-color 0.2s;
        }

        .back-link:hover { color: var(--text); border-color: rgba(147,164,202,0.3); }

        /* ── Astronaut scene ── */
        .scene {
            position: relative;
            width: 240px;
            height: 240px;
            margin-bottom: 8px;
        }

        /* Orbit ring */
        .orbit-ring {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 220px;
            height: 80px;
            border-radius: 50%;
            border: 1px dashed rgba(120,242,200,0.2);
            transform: translate(-50%, -50%) rotateX(72deg);
            animation: orbitRotate 16s linear infinite;
        }

        /* Orbiting dot */
        .orbit-dot {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: radial-gradient(circle, #78f2c8, #4cc9ff);
            box-shadow: 0 0 12px rgba(120,242,200,0.8);
            transform-origin: -90px 0;
            animation: orbitDot 6s linear infinite;
        }

        @keyframes orbitRotate { to { transform: translate(-50%, -50%) rotateX(72deg) rotateZ(360deg); } }
        @keyframes orbitDot    { to { transform: rotate(360deg) translateX(-90px); } }

        /* Astronaut SVG wrapper — floating animation */
        .astronaut-wrap {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: floatAstro 4s ease-in-out infinite;
        }

        @keyframes floatAstro {
            0%   { transform: translate(-50%, -50%) rotate(-4deg); }
            25%  { transform: translate(-50%, calc(-50% - 14px)) rotate(2deg); }
            50%  { transform: translate(-50%, calc(-50% - 20px)) rotate(-3deg); }
            75%  { transform: translate(-50%, calc(-50% - 10px)) rotate(3deg); }
            100% { transform: translate(-50%, -50%) rotate(-4deg); }
        }

        /* Planet */
        .planet {
            position: absolute;
            bottom: 10px;
            right: 0;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: radial-gradient(circle at 35% 35%, #7de1ff 0%, #1a3a60 45%, #0a1a30 100%);
            box-shadow: 0 0 24px rgba(76,201,255,0.3), inset -8px -6px 16px rgba(0,0,0,0.6);
            animation: planetPulse 5s ease-in-out infinite;
        }

        .planet::after {
            content: '';
            position: absolute;
            top: 50%;
            left: -10px;
            width: 72px;
            height: 16px;
            border-radius: 50%;
            background: transparent;
            border: 2px solid rgba(120,242,200,0.25);
            transform: translateY(-50%) rotateX(75deg);
        }

        @keyframes planetPulse {
            0%, 100% { box-shadow: 0 0 24px rgba(76,201,255,0.3), inset -8px -6px 16px rgba(0,0,0,0.6); }
            50%       { box-shadow: 0 0 40px rgba(76,201,255,0.5), inset -8px -6px 16px rgba(0,0,0,0.6); }
        }

        /* ── 404 glitch text ── */
        .error-code {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(5rem, 16vw, 9rem);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.04em;
            position: relative;
            background: linear-gradient(135deg, #ffffff 0%, #9ce6ff 50%, #b7a8ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: glitch 5s ease-in-out infinite;
            margin-bottom: 16px;
        }

        .error-code::before,
        .error-code::after {
            content: '404';
            position: absolute;
            inset: 0;
            background: inherit;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .error-code::before {
            animation: glitchTop 5s ease-in-out infinite;
            clip-path: polygon(0 0, 100% 0, 100% 38%, 0 38%);
        }

        .error-code::after {
            animation: glitchBot 5s ease-in-out infinite;
            clip-path: polygon(0 62%, 100% 62%, 100% 100%, 0 100%);
        }

        @keyframes glitch {
            0%, 85%, 100% { transform: translate(0); filter: none; }
            87%            { transform: translate(-3px, 1px); filter: hue-rotate(10deg); }
            89%            { transform: translate(3px, -1px); filter: hue-rotate(-10deg); }
            91%            { transform: translate(-2px, 2px); }
            93%            { transform: translate(0); }
        }

        @keyframes glitchTop {
            0%, 85%, 100% { transform: translate(0); opacity: 0; }
            87%            { transform: translate(-4px, -2px); opacity: 0.7; }
            89%            { transform: translate(4px, 1px);  opacity: 0.6; }
            91%            { transform: translate(0);          opacity: 0; }
        }

        @keyframes glitchBot {
            0%, 85%, 100% { transform: translate(0); opacity: 0; }
            87%            { transform: translate(4px, 2px);  opacity: 0.6; }
            89%            { transform: translate(-4px, -1px); opacity: 0.7; }
            91%            { transform: translate(0);          opacity: 0; }
        }

        /* ── Copy ── */
        .headline {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(1.4rem, 4vw, 2rem);
            font-weight: 700;
            letter-spacing: -0.02em;
            margin-bottom: 12px;
            animation: fadeUp 0.7s ease 0.1s both;
        }

        .sub {
            color: var(--muted);
            font-size: 1rem;
            line-height: 1.75;
            max-width: 480px;
            margin: 0 auto 32px;
            animation: fadeUp 0.7s ease 0.2s both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Actions ── */
        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
            margin-bottom: 48px;
            animation: fadeUp 0.7s ease 0.3s both;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            border-radius: 14px;
            padding: 12px 22px;
            font-weight: 700;
            font-size: 0.95rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn:hover { transform: translateY(-2px); }

        .btn-primary {
            color: #07111f;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            box-shadow: 0 12px 32px rgba(76,201,255,0.2);
        }

        .btn-primary:hover { box-shadow: 0 18px 40px rgba(76,201,255,0.34); }

        .btn-secondary {
            color: var(--text);
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(147,164,202,0.18);
        }

        .btn-secondary:hover { border-color: rgba(120,242,200,0.3); }

        /* ── Status line ── */
        .status-line {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.82rem;
            color: var(--muted);
            padding: 8px 16px;
            border-radius: 999px;
            border: 1px solid rgba(120,242,200,0.14);
            background: rgba(120,242,200,0.05);
            animation: fadeUp 0.7s ease 0.45s both;
        }

        .pulse-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--primary);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%   { box-shadow: 0 0 0 0 rgba(120,242,200,0.5); }
            70%  { box-shadow: 0 0 0 8px rgba(120,242,200,0); }
            100% { box-shadow: 0 0 0 0 rgba(120,242,200,0); }
        }

        /* ── Quick links row ── */
        .quick-links {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            margin-top: 28px;
            animation: fadeUp 0.7s ease 0.5s both;
        }

        .quick-link {
            text-decoration: none;
            color: var(--muted);
            font-size: 0.85rem;
            padding: 6px 14px;
            border-radius: 8px;
            border: 1px solid rgba(147,164,202,0.12);
            transition: color 0.2s, border-color 0.2s;
        }

        .quick-link:hover { color: var(--text); border-color: rgba(147,164,202,0.28); }

        /* ── Responsive ── */
        @media (max-width: 600px) {
            .topbar { margin-bottom: 32px; }
            .scene  { width: 180px; height: 180px; }
            .actions { gap: 10px; }
            .btn { padding: 11px 18px; font-size: 0.88rem; }
        }
    </style>
</head>
<body>

    {{-- Star field --}}
    <div class="stars" id="stars" aria-hidden="true"></div>

    {{-- Glow blobs --}}
    <div class="blob blob-teal"   aria-hidden="true"></div>
    <div class="blob blob-blue"   aria-hidden="true"></div>
    <div class="blob blob-violet" aria-hidden="true"></div>

    <main class="page">

        {{-- Topbar --}}
        <div class="topbar">
            <a href="{{ url('/') }}" class="brand" aria-label="TechNabu home">
                <span class="brand-mark">T</span>
                <span>TechNabu</span>
            </a>
            <a href="{{ url()->previous() !== url()->current() ? url()->previous() : url('/') }}" class="back-link">
                ← Go back
            </a>
        </div>

        {{-- Astronaut scene --}}
        <div class="scene" aria-hidden="true">
            <div class="orbit-ring"></div>
            <div class="orbit-dot"></div>
            <div class="planet"></div>

            <div class="astronaut-wrap">
                <svg width="120" height="140" viewBox="0 0 120 140" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Lost astronaut">
                    <!-- Jetpack flame -->
                    <ellipse cx="38" cy="118" rx="7" ry="13" fill="url(#flameL)" opacity="0.85">
                        <animate attributeName="ry" values="13;9;14;10;13" dur="0.4s" repeatCount="indefinite"/>
                        <animate attributeName="opacity" values="0.85;0.5;0.9;0.6;0.85" dur="0.4s" repeatCount="indefinite"/>
                    </ellipse>
                    <ellipse cx="82" cy="118" rx="7" ry="13" fill="url(#flameR)" opacity="0.85">
                        <animate attributeName="ry" values="13;11;8;14;13" dur="0.4s" repeatCount="indefinite"/>
                        <animate attributeName="opacity" values="0.85;0.6;0.5;0.9;0.85" dur="0.4s" repeatCount="indefinite"/>
                    </ellipse>

                    <!-- Body / suit -->
                    <rect x="30" y="66" width="60" height="54" rx="22" fill="url(#suitGrad)"/>

                    <!-- Jetpack -->
                    <rect x="26" y="72" width="16" height="36" rx="8" fill="#1e2d4a"/>
                    <rect x="78" y="72" width="16" height="36" rx="8" fill="#1e2d4a"/>

                    <!-- Helmet -->
                    <circle cx="60" cy="52" r="34" fill="url(#helmetGrad)"/>
                    <!-- Visor -->
                    <ellipse cx="60" cy="53" rx="22" ry="20" fill="url(#visorGrad)"/>
                    <!-- Visor shine -->
                    <ellipse cx="54" cy="45" rx="7" ry="5" fill="rgba(255,255,255,0.18)" transform="rotate(-20,54,45)"/>
                    <!-- Helmet ring -->
                    <circle cx="60" cy="52" r="34" stroke="rgba(120,242,200,0.3)" stroke-width="2" fill="none"/>

                    <!-- Arms -->
                    <rect x="8"  y="72" width="24" height="14" rx="7" fill="url(#suitGrad)"/>
                    <rect x="88" y="72" width="24" height="14" rx="7" fill="url(#suitGrad)"/>
                    <!-- Gloves -->
                    <circle cx="14"  cy="79" r="8" fill="url(#gloveGrad)"/>
                    <circle cx="106" cy="79" r="8" fill="url(#gloveGrad)"/>

                    <!-- Chest detail -->
                    <rect x="45" y="82" width="30" height="18" rx="6" fill="rgba(120,242,200,0.08)" stroke="rgba(120,242,200,0.2)" stroke-width="1"/>
                    <circle cx="55" cy="91" r="3" fill="rgba(120,242,200,0.5)">
                        <animate attributeName="opacity" values="1;0.2;1" dur="1.6s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="65" cy="91" r="3" fill="rgba(76,201,255,0.5)">
                        <animate attributeName="opacity" values="0.3;1;0.3" dur="1.6s" repeatCount="indefinite"/>
                    </circle>

                    <!-- Tether line -->
                    <path d="M106 79 Q130 50 120 20" stroke="rgba(120,242,200,0.35)" stroke-width="1.5" stroke-dasharray="4 3" fill="none">
                        <animate attributeName="d" values="M106 79 Q130 50 120 20;M106 79 Q126 46 118 16;M106 79 Q130 50 120 20" dur="4s" repeatCount="indefinite"/>
                    </path>

                    <defs>
                        <linearGradient id="suitGrad" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%"  stop-color="#c8dff8"/>
                            <stop offset="100%" stop-color="#8aafd4"/>
                        </linearGradient>
                        <radialGradient id="helmetGrad" cx="40%" cy="36%" r="60%">
                            <stop offset="0%"  stop-color="#d4eeff"/>
                            <stop offset="100%" stop-color="#7aa8cc"/>
                        </radialGradient>
                        <linearGradient id="visorGrad" x1="0.2" y1="0" x2="0.8" y2="1">
                            <stop offset="0%"  stop-color="#0d2040" stop-opacity="0.9"/>
                            <stop offset="50%" stop-color="#112a50" stop-opacity="0.95"/>
                            <stop offset="100%" stop-color="#0a1a35"/>
                        </linearGradient>
                        <linearGradient id="gloveGrad" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%"  stop-color="#bcd3ef"/>
                            <stop offset="100%" stop-color="#7a9fc0"/>
                        </linearGradient>
                        <linearGradient id="flameL" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%"  stop-color="#78f2c8"/>
                            <stop offset="60%" stop-color="#4cc9ff"/>
                            <stop offset="100%" stop-color="rgba(76,201,255,0)"/>
                        </linearGradient>
                        <linearGradient id="flameR" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%"  stop-color="#78f2c8"/>
                            <stop offset="60%" stop-color="#4cc9ff"/>
                            <stop offset="100%" stop-color="rgba(76,201,255,0)"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </div>

        {{-- Error code --}}
        <div class="error-code" aria-label="Error 404">404</div>

        {{-- Copy --}}
        <h1 class="headline">Houston, page not found.</h1>
        <p class="sub">
            This URL drifted out of orbit and got lost somewhere in the void.
            The rest of the site is alive and well — let's get you back on course.
        </p>

        {{-- CTAs --}}
        <div class="actions">
            <a href="{{ url('/') }}" class="btn btn-primary">
                ↩ Return to Home
            </a>
            <a href="{{ route('portfolio') }}" class="btn btn-secondary">
                View My Work
            </a>
            <a href="{{ route('contact') }}" class="btn btn-secondary">
                Contact Me
            </a>
        </div>

        {{-- Status badge --}}
        <div class="status-line">
            <span class="pulse-dot"></span>
            HTTP 404 &nbsp;·&nbsp; Page not found &nbsp;·&nbsp; nabrajacharya.com.np
        </div>

        {{-- Quick links --}}
        <nav class="quick-links" aria-label="Quick navigation">
            <a href="{{ route('services') }}"  class="quick-link">Services</a>
            <a href="{{ route('about') }}"     class="quick-link">About</a>
            <a href="{{ route('blog.index') }}"  class="quick-link">Blog</a>
            <a href="{{ route('portfolio') }}" class="quick-link">Portfolio</a>
            <a href="{{ route('contact') }}"   class="quick-link">Contact</a>
        </nav>

    </main>

    <script>
        (() => {
            const container = document.getElementById('stars');
            const count = 130;
            for (let i = 0; i < count; i++) {
                const s = document.createElement('span');
                const size = Math.random() * 2.4 + 0.6;
                s.style.cssText = [
                    `width:${size}px`,
                    `height:${size}px`,
                    `top:${Math.random() * 100}%`,
                    `left:${Math.random() * 100}%`,
                    `--dur:${(Math.random() * 4 + 2).toFixed(1)}s`,
                    `--delay:${(Math.random() * 6).toFixed(1)}s`,
                    `--op:${(Math.random() * 0.5 + 0.3).toFixed(2)}`,
                ].join(';');
                container.appendChild(s);
            }
        })();
    </script>
</body>
</html>
