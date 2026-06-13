<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoGo - Descarte Consciente & Ação Sustentável</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #fafdfb;
            --primary: #059669; /* Emerald 600 */
            --primary-light: #10b981; /* Emerald 500 */
            --primary-dark: #065f46; /* Emerald 800 */
            --secondary: #1e293b; /* Slate 800 */
            --text-main: #0f172a; /* Slate 900 */
            --text-muted: #475569; /* Slate 600 */
            --card-bg: rgba(255, 255, 255, 0.85);
            --card-border: rgba(226, 232, 240, 0.8);
            --glow-color: rgba(16, 185, 129, 0.15);
            --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -4px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            line-height: 1.6;
            overflow-x: hidden;
            position: relative;
        }

        /* Background Animated Blobs */
        .blob {
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            filter: blur(120px);
            z-index: -1;
            opacity: 0.45;
            pointer-events: none;
        }

        .blob-1 {
            background-color: #d1fae5; /* Light emerald */
            top: -150px;
            right: -100px;
            animation: float-blob 20s infinite alternate;
        }

        .blob-2 {
            background-color: #ecfccb; /* Light lime */
            bottom: 20%;
            left: -200px;
            animation: float-blob 25s infinite alternate-reverse;
        }

        @keyframes float-blob {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(40px, -60px) scale(1.1); }
            100% { transform: translate(-30px, 30px) scale(0.95); }
        }

        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Header / Navigation */
        header {
            padding: 1.25rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--card-border);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            position: sticky;
            top: 0;
            z-index: 100;
            background-color: rgba(250, 253, 251, 0.85);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Outfit', sans-serif;
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--secondary);
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .logo span {
            color: var(--primary);
        }

        .logo-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: var(--primary-light);
            border-radius: 50%;
            box-shadow: 0 0 12px var(--primary-light);
        }

        .status-badge-header {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            font-weight: 600;
            background-color: #e6fcf5;
            color: var(--primary-dark);
            padding: 0.4rem 0.8rem;
            border-radius: 9999px;
            border: 1px solid #c3fae8;
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            background-color: #0fda82;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(15, 218, 130, 0.7);
            animation: pulse 1.6s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(15, 218, 130, 0.7);
            }
            70% {
                transform: scale(1);
                box-shadow: 0 0 0 6px rgba(15, 218, 130, 0);
            }
            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(15, 218, 130, 0);
            }
        }

        /* Hero Section (2 Columns) */
        .hero-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 3rem;
            align-items: center;
            padding: 5rem 0 4rem;
        }

        @media (max-width: 900px) {
            .hero-grid {
                grid-template-columns: 1fr;
                text-align: center;
                padding: 3rem 0;
            }
        }

        .hero-content h1 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.3rem, 5vw, 3.5rem);
            font-weight: 800;
            line-height: 1.15;
            color: var(--secondary);
            margin-bottom: 1.5rem;
            letter-spacing: -1px;
        }

        .hero-content h1 span {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-content p.lead {
            font-size: clamp(1.05rem, 1.8vw, 1.25rem);
            color: var(--text-muted);
            margin-bottom: 2.5rem;
            font-weight: 400;
        }

        .hero-image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image {
            width: 100%;
            max-width: 460px;
            height: auto;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            border: 4px solid white;
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .hero-image:hover {
            transform: translateY(-8px) rotate(1deg);
        }

        /* CTA Buttons */
        .cta-group {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        @media (max-width: 900px) {
            .cta-group {
                justify-content: center;
            }
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.6rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            box-shadow: 0 4px 14px rgba(5, 150, 105, 0.3);
            border: none;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(5, 150, 105, 0.4);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--secondary);
            border: 1px solid var(--card-border);
            background-color: rgba(255, 255, 255, 0.5);
        }

        .btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.95);
            transform: translateY(-2px);
            border-color: var(--text-muted);
        }

        /* Split Section Design */
        .split-section {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 4rem;
            align-items: center;
            margin-bottom: 5rem;
        }

        .split-section.reverse {
            grid-template-columns: 1.1fr 1fr;
        }

        @media (max-width: 900px) {
            .split-section, .split-section.reverse {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }
        }

        .split-image-container {
            display: flex;
            justify-content: center;
            position: relative;
        }

        .split-image {
            width: 100%;
            max-width: 480px;
            height: auto;
            border-radius: 18px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--card-border);
            transition: all 0.3s ease;
        }

        .split-image:hover {
            transform: scale(1.02);
            box-shadow: var(--shadow-lg);
        }

        .split-content h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            color: var(--secondary);
            margin-bottom: 1.2rem;
            letter-spacing: -0.5px;
        }

        .split-content p {
            color: var(--text-muted);
            font-size: 1.05rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .badge-small {
            display: inline-block;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .bullet-list {
            list-style: none;
        }

        .bullet-list li {
            position: relative;
            padding-left: 1.75rem;
            margin-bottom: 0.8rem;
            font-size: 0.98rem;
            color: var(--text-muted);
        }

        .bullet-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: var(--primary-light);
            font-weight: 800;
            font-size: 1.1rem;
        }

        /* Features Section */
        .features-section {
            padding: 4.5rem 0;
            background: rgba(241, 248, 245, 0.45);
            border-radius: 24px;
            border: 1px solid var(--card-border);
            margin-bottom: 5rem;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .section-header {
            text-align: center;
            margin-bottom: 3.5rem;
            padding: 0 1rem;
        }

        .section-header h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 2.2rem;
            color: var(--secondary);
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .section-header p {
            color: var(--text-muted);
            font-size: 1.1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            padding: 0 2rem;
        }

        @media (max-width: 900px) {
            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        .feature-card {
            background: white;
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .icon-wrapper {
            width: 52px;
            height: 52px;
            background-color: #ecfccb; /* Lime 100 */
            color: var(--primary-dark);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .feature-card h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.25rem;
            color: var(--secondary);
            margin-bottom: 0.75rem;
        }

        .feature-card p {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Endpoints API Section */
        .endpoints-section {
            margin-bottom: 5rem;
        }

        .endpoints-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .endpoint-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            transition: all 0.2s ease;
        }

        .endpoint-card:hover {
            border-color: var(--primary-light);
            box-shadow: 0 8px 20px var(--glow-color);
            transform: translateY(-2px);
        }

        .method-badge {
            display: inline-block;
            align-self: flex-start;
            font-size: 0.75rem;
            font-weight: 800;
            background-color: #e0f2fe; /* Light blue */
            color: #0369a1;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.8rem;
        }

        .endpoint-path {
            font-family: monospace;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 0.5rem;
        }

        .endpoint-desc {
            color: var(--text-muted);
            font-size: 0.88rem;
            margin-bottom: 1.2rem;
            flex-grow: 1;
        }

        .endpoint-link {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--primary);
            text-decoration: none;
            transition: color 0.15s ease;
        }

        .endpoint-link:hover {
            color: var(--primary-dark);
        }

        .endpoint-link svg {
            transition: transform 0.15s ease;
        }

        .endpoint-link:hover svg {
            transform: translateX(3px);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 3rem 0;
            border-top: 1px solid var(--card-border);
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        footer strong {
            color: var(--secondary);
        }

        /* SVG Helper Icons */
        .icon {
            width: 24px;
            height: 24px;
            fill: currentColor;
        }
    </style>
</head>
<body>

    <!-- Decorative Animated Blobs -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <div class="container">
        <!-- Header -->
        <header>
            <a href="/" class="logo">
                EcoGo<span></span><span class="logo-dot"></span>
            </a>
            <div class="status-badge-header">
                <div class="pulse-dot"></div>
                API em Produção
            </div>
        </header>

        <!-- Hero Section (Grid com Imagem de Meio Ambiente) -->
        <section class="hero-grid">
            <div class="hero-content">
                <h1>EcoGo: <span>Ação Sustentável</span> & Descarte Consciente</h1>
                <p class="lead">
                    Transformando a reciclagem em um hábito diário por meio de geolocalização de ecopontos, guias inteligentes de descarte e incentivos gamificados.
                </p>
                <div class="cta-group">
                    <a href="#endpoints" class="btn btn-primary">Testar API Endpoints</a>
                    <a href="/cadastro" class="btn btn-primary" style="background-color: var(--secondary); box-shadow: none;">Painel de Cadastro</a>
                    <a href="#sobre" class="btn btn-outline">Sobre o EcoGo</a>
                </div>
            </div>
            <div class="hero-image-container">
                <img src="/images/meio_ambiente.png" alt="Preservação Ambiental e Tecnologia EcoGo" class="hero-image">
            </div>
        </section>

        <!-- Split Section 1: Materiais Recicláveis e Não Recicláveis -->
        <section id="sobre" class="split-section">
            <div class="split-image-container">
                <img src="/images/materiais_reciclagem.png" alt="Classificação de Materiais Recicláveis e Não Recicláveis" class="split-image">
            </div>
            <div class="split-content">
                <span class="badge-small">Educação e Conscientização</span>
                <h2>Classificação Inteligente de Resíduos</h2>
                <p>
                    O descarte incorreto acontece principalmente por falta de informação rápida. O EcoGo resolve isso ao catalogar o que pode ser reciclado e o que deve ir para aterros sanitários.
                </p>
                <ul class="bullet-list">
                    <li><strong>Materiais Recicláveis:</strong> Plásticos limpos, papelão seco, latas de alumínio e vidros inteiros.</li>
                    <li><strong>Materiais Não Recicláveis:</strong> Papéis engordurados, cerâmicas, espelhos e fitas adesivas.</li>
                    <li><strong>Orientações de Preparo:</strong> Instruções passo a passo como enxaguar recipientes e compactar caixas.</li>
                </ul>
            </div>
        </section>

        <!-- Split Section 2: Geolocalização e Endpoints -->
        <section class="split-section reverse">
            <div class="split-content">
                <span class="badge-small">Geolocalização em Tempo Real</span>
                <h2>Pontos de Coleta e Ecopontos Próximos</h2>
                <p>
                    O aplicativo utiliza coordenadas de GPS para apontar no mapa os locais mais próximos aptos a receber resíduos sólidos, materiais volumosos ou lixo eletrônico.
                </p>
                <ul class="bullet-list">
                    <li>Filtros dinâmicos por tipo de material aceito.</li>
                    <li>Status em tempo real de funcionamento do local.</li>
                    <li>Rotas integradas para facilitar o deslocamento do usuário.</li>
                </ul>
            </div>
            <div class="split-image-container">
                <img src="/images/mapa_ecopontos.png" alt="Mockup de Mapa de Ecopontos e Geolocalização" class="split-image">
            </div>
        </section>

        <!-- Features Section (Grid original mantido e aprimorado) -->
        <section class="features-section">
            <div class="section-header">
                <h2>Funcionalidades Principais</h2>
                <p>O que faz o EcoGo ser uma solução completa e engajadora</p>
            </div>
            
            <div class="features-grid">
                <!-- feature 1 -->
                <article class="feature-card">
                    <div class="icon-wrapper">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                    </div>
                    <h3>Geolocalização de Pontos</h3>
                    <p>Encontre de maneira interativa os ecopontos, cooperativas e caixas de coleta seletiva mais próximos, com rotas rápidas e horários de funcionamento.</p>
                </article>

                <!-- feature 2 -->
                <article class="feature-card">
                    <div class="icon-wrapper">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M12 3H4v6h8V3zm10 0h-8v6h8V3zM4 11h8v10H4V11zm18 0h-8v10h8V11z"/>
                        </svg>
                    </div>
                    <h3>Identificação & Guia</h3>
                    <p>Pesquise ou envie a foto de um resíduo para descobrir na hora o tipo de material, qual a lixeira apropriada, dicas de limpeza e tempo de decomposição.</p>
                </article>

                <!-- feature 3 -->
                <article class="feature-card">
                    <div class="icon-wrapper">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H7c0-2.76 2.24-5 5-5s5 2.24 5 5c0 1.04-.42 1.99-1.07 2.75z"/>
                        </svg>
                    </div>
                    <h3>Gamificação & Recompensas</h3>
                    <p>Leitura de QR Codes nos ecopontos parceiros para registrar seus descartes voluntários de lixo reciclável, acumulando pontos para trocar por cupons.</p>
                </article>
            </div>
        </section>

        <!-- API Endpoints Section -->
        <section id="endpoints" class="endpoints-section">
            <div class="section-header">
                <h2>Endpoints da API</h2>
                <p>Consulte dados simulados e didáticos retornados em formato JSON</p>
            </div>

            <div class="endpoints-grid">
                <!-- status -->
                <article class="endpoint-card">
                    <div>
                        <span class="method-badge">GET</span>
                        <div class="endpoint-path">/api/status</div>
                        <p class="endpoint-desc">Retorna o status atual do servidor, versão do Laravel e ambiente de execução.</p>
                    </div>
                    <a href="/api/status" target="_blank" class="endpoint-link">
                        Testar Rota
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </article>

                <!-- pontos de coleta -->
                <article class="endpoint-card">
                    <div>
                        <span class="method-badge">GET</span>
                        <div class="endpoint-path">/api/pontos-coleta</div>
                        <p class="endpoint-desc">Retorna a listagem de ecopontos com nomes, endereços, coordenadas de geolocalização e tipos de materiais aceitos.</p>
                    </div>
                    <a href="/api/pontos-coleta" target="_blank" class="endpoint-link">
                        Testar Rota
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </article>

                <!-- materiais -->
                <article class="endpoint-card">
                    <div>
                        <span class="method-badge">GET</span>
                        <div class="endpoint-path">/api/materiais</div>
                        <p class="endpoint-desc">Retorna orientações didáticas para cada tipo de material, tempo de decomposição e instruções recomendadas de descarte.</p>
                    </div>
                    <a href="/api/materiais" target="_blank" class="endpoint-link">
                        Testar Rota
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </article>

                <!-- recompensas -->
                <article class="endpoint-card">
                    <div>
                        <span class="method-badge">GET</span>
                        <div class="endpoint-path">/api/recompensas</div>
                        <p class="endpoint-desc">Lista as recompensas ativas no sistema de gamificação e o custo de pontos necessários para resgate de cada uma.</p>
                    </div>
                    <a href="/api/recompensas" target="_blank" class="endpoint-link">
                        Testar Rota
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </article>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <p>&copy; 2026 - Projeto TCC <strong>EcoGo</strong>. Desenvolvido para apresentação acadêmica.</p>
        </footer>
    </div>
</body>
</html>
