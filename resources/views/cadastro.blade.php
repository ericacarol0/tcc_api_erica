<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoGo - Painel de Cadastro</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #f4f8f6;
            --primary: #059669; /* Emerald 600 */
            --primary-light: #10b981; /* Emerald 500 */
            --primary-dark: #065f46; /* Emerald 800 */
            --secondary: #1e293b; /* Slate 800 */
            --text-main: #0f172a; /* Slate 900 */
            --text-muted: #475569; /* Slate 600 */
            --card-bg: #ffffff;
            --card-border: #e2e8f0;
            --glow-color: rgba(16, 185, 129, 0.15);
            --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.03), 0 2px 4px -2px rgba(0, 0, 0, 0.03);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.04), 0 4px 6px -4px rgba(0, 0, 0, 0.04);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.06), 0 8px 10px -6px rgba(0, 0, 0, 0.06);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .dashboard-container {
            display: flex;
            flex: 1;
            min-height: calc(100vh - 65px);
        }

        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }
        }

        /* Top Header */
        header {
            background-color: white;
            border-bottom: 1px solid var(--card-border);
            padding: 0.8rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 65px;
            z-index: 10;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
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
            width: 7px;
            height: 7px;
            background-color: var(--primary-light);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--primary-light);
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.9rem;
            transition: color 0.15s ease;
        }

        .btn-back:hover {
            color: var(--primary);
        }

        /* Sidebar Navigation */
        .sidebar {
            width: 260px;
            background-color: white;
            border-right: 1px solid var(--card-border);
            padding: 1.5rem 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid var(--card-border);
                padding: 1rem;
                flex-direction: row;
                overflow-x: auto;
                white-space: nowrap;
            }
        }

        .sidebar-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.8rem 1rem;
            border: none;
            background: none;
            border-radius: 8px;
            color: var(--text-muted);
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            text-align: left;
            transition: all 0.2s ease;
            width: 100%;
        }

        @media (max-width: 768px) {
            .sidebar-btn {
                width: auto;
            }
        }

        .sidebar-btn:hover {
            background-color: #f1f8f5;
            color: var(--primary);
        }

        .sidebar-btn.active {
            background-color: var(--primary);
            color: white;
        }

        /* Main Panel Content */
        .main-content {
            flex: 1;
            padding: 2.5rem;
            overflow-y: auto;
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 1.5rem;
            }
        }

        .panel-tab {
            display: none;
            animation: fadeIn 0.4s ease;
        }

        .panel-tab.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .panel-header {
            margin-bottom: 2rem;
        }

        .panel-header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.8rem;
            color: var(--secondary);
            margin-bottom: 0.35rem;
        }

        .panel-header p {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        /* Grid Layout: Form left, Preview Table right */
        .panel-grid {
            display: grid;
            grid-template-columns: 1.2fr 1.8fr;
            gap: 2rem;
            align-items: start;
        }

        @media (max-width: 1024px) {
            .panel-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Form styling */
        .form-card {
            background-color: white;
            border: 1px solid var(--card-border);
            border-radius: 12px;
            padding: 1.75rem;
            box-shadow: var(--shadow-sm);
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            font-size: 0.88rem;
            color: var(--secondary);
            margin-bottom: 0.4rem;
        }

        .form-control {
            width: 100%;
            padding: 0.65rem 0.9rem;
            font-family: inherit;
            font-size: 0.92rem;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            outline: none;
            transition: all 0.15s ease-in-out;
            background-color: #fafbfc;
        }

        .form-control:focus {
            border-color: var(--primary-light);
            background-color: white;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
        }

        .checkbox-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.88rem;
            color: var(--text-muted);
        }

        .checkbox-item input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .radio-group {
            display: flex;
            gap: 1.25rem;
            margin-top: 0.5rem;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.9rem;
            color: var(--text-muted);
            cursor: pointer;
        }

        .radio-item input[type="radio"] {
            width: 16px;
            height: 16px;
            accent-color: var(--primary);
        }

        .btn-submit {
            width: 100%;
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: background-color 0.15s ease;
            margin-top: 0.5rem;
        }

        .btn-submit:hover {
            background-color: var(--primary-dark);
        }

        /* Preview Card and Table styling */
        .preview-card {
            background-color: white;
            border: 1px solid var(--card-border);
            border-radius: 12px;
            padding: 1.75rem;
            box-shadow: var(--shadow-sm);
        }

        .preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
            border-bottom: 1px solid var(--card-border);
            padding-bottom: 0.75rem;
        }

        .preview-header h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.25rem;
            color: var(--secondary);
        }

        .items-count {
            background-color: #f1f5f9;
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.2rem 0.6rem;
            border-radius: 9999px;
        }

        .table-container {
            overflow-x: auto;
            max-height: 480px;
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.88rem;
        }

        th {
            background-color: #f8fafc;
            color: var(--text-muted);
            font-weight: 700;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--card-border);
            position: sticky;
            top: 0;
            z-index: 1;
        }

        td {
            padding: 0.85rem 1rem;
            border-bottom: 1px solid var(--card-border);
            color: var(--text-main);
            vertical-align: middle;
        }

        tr:hover td {
            background-color: #f8fafc;
        }

        .badge-table {
            display: inline-block;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.15rem 0.45rem;
            border-radius: 4px;
            margin-right: 0.2rem;
            margin-top: 0.2rem;
        }

        .badge-success {
            background-color: #dcfce7;
            color: #166534;
        }

        .badge-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .btn-delete {
            background: none;
            border: none;
            color: #ef4444;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .btn-delete:hover {
            text-decoration: underline;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 1.5rem;
            color: var(--text-muted);
        }

        .empty-state svg {
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* Success Alert styling */
        .alert {
            background-color: #dcfce7;
            border: 1px solid #b9f6ca;
            color: #15803d;
            padding: 0.75rem 1rem;
            border-radius: 6px;
            font-size: 0.9rem;
            margin-bottom: 1.25rem;
            display: none;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <a href="/" class="logo">
            EcoGo<span></span><span class="logo-dot"></span>
        </a>
        <a href="/" class="btn-back">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Voltar para Início
        </a>
    </header>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <button class="sidebar-btn active" onclick="switchTab('ecopontos')">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                Ecopontos
            </button>
            <button class="sidebar-btn" onclick="switchTab('materiais')">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                Materiais
            </button>
            <button class="sidebar-btn" onclick="switchTab('classificacao')">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                Classificações
            </button>
        </aside>

        <!-- Main Panel Content -->
        <main class="main-content">
            
            <!-- Tab: Ecopontos -->
            <section id="tab-ecopontos" class="panel-tab active">
                <div class="panel-header">
                    <h1>Cadastro de Ecopontos</h1>
                    <p>Cadastre novos pontos de coleta seletiva e postos de descarte voluntário no sistema.</p>
                </div>
                
                <div class="panel-grid">
                    <!-- Form -->
                    <div class="form-card">
                        <div id="alert-ecopontos" class="alert">✓ Ecoponto cadastrado com sucesso!</div>
                        <form id="form-ecoponto" onsubmit="saveEcoponto(event)">
                            <div class="form-group">
                                <label for="eco-nome">Nome do Ecoponto *</label>
                                <input type="text" id="eco-nome" class="form-control" placeholder="Ex: Ecoponto Central Pinheiros" required>
                            </div>
                            <div class="form-group">
                                <label for="eco-endereco">Endereço Completo *</label>
                                <input type="text" id="eco-endereco" class="form-control" placeholder="Ex: Rua das Flores, 123" required>
                            </div>
                            <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem;">
                                <div>
                                    <label for="eco-lat">Latitude *</label>
                                    <input type="number" step="any" id="eco-lat" class="form-control" placeholder="-23.5678" required>
                                </div>
                                <div>
                                    <label for="eco-lng">Longitude *</label>
                                    <input type="number" step="any" id="eco-lng" class="form-control" placeholder="-46.6891" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="eco-horario">Horário de Funcionamento *</label>
                                <input type="text" id="eco-horario" class="form-control" placeholder="Ex: Seg a Sáb, das 08h às 18h" required>
                            </div>
                            <div class="form-group">
                                <label>Materiais Aceitos *</label>
                                <div class="checkbox-grid">
                                    <div class="checkbox-item"><input type="checkbox" name="eco-materiais" value="Plástico" id="m-plat"><label for="m-plat">Plástico</label></div>
                                    <div class="checkbox-item"><input type="checkbox" name="eco-materiais" value="Papel" id="m-pap"><label for="m-pap">Papel</label></div>
                                    <div class="checkbox-item"><input type="checkbox" name="eco-materiais" value="Metal" id="m-met"><label for="m-met">Metal</label></div>
                                    <div class="checkbox-item"><input type="checkbox" name="eco-materiais" value="Vidro" id="m-vid"><label for="m-vid">Vidro</label></div>
                                    <div class="checkbox-item"><input type="checkbox" name="eco-materiais" value="Eletrônicos" id="m-ele"><label for="m-ele">Eletrônicos</label></div>
                                    <div class="checkbox-item"><input type="checkbox" name="eco-materiais" value="Óleo Usado" id="m-oleo"><label for="m-oleo">Óleo Usado</label></div>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit">Cadastrar Ecoponto</button>
                        </form>
                    </div>

                    <!-- Preview Table -->
                    <div class="preview-card">
                        <div class="preview-header">
                            <h2>Ecopontos Cadastrados</h2>
                            <span class="items-count" id="count-ecopontos">0</span>
                        </div>
                        <div class="table-container">
                            <table id="table-ecopontos">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Endereço / Horário</th>
                                        <th>Materiais Aceitos</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-ecopontos">
                                    <!-- Dynamic items -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tab: Materiais -->
            <section id="tab-materiais" class="panel-tab">
                <div class="panel-header">
                    <h1>Cadastro de Materiais</h1>
                    <p>Adicione materiais com instruções de descarte para enriquecer a base de dados da aplicação.</p>
                </div>
                
                <div class="panel-grid">
                    <!-- Form -->
                    <div class="form-card">
                        <div id="alert-materiais" class="alert">✓ Material cadastrado com sucesso!</div>
                        <form id="form-material" onsubmit="saveMaterial(event)">
                            <div class="form-group">
                                <label for="mat-nome">Nome do Material *</label>
                                <input type="text" id="mat-nome" class="form-control" placeholder="Ex: Garrafa PET, Jornal" required>
                            </div>
                            <div class="form-group">
                                <label for="mat-categoria">Categoria do Material *</label>
                                <select id="mat-categoria" class="form-control" required>
                                    <option value="" disabled selected>Selecione uma categoria...</option>
                                    <option value="Plástico">Plástico</option>
                                    <option value="Papel">Papel</option>
                                    <option value="Metal">Metal</option>
                                    <option value="Vidro">Vidro</option>
                                    <option value="Eletrônicos">Eletrônicos</option>
                                    <option value="Perigoso">Resíduo Perigoso</option>
                                    <option value="Orgânico">Orgânico</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>É Reciclável? *</label>
                                <div class="radio-group">
                                    <label class="radio-item">
                                        <input type="radio" name="mat-reciclavel" value="Sim" checked> Sim
                                    </label>
                                    <label class="radio-item">
                                        <input type="radio" name="mat-reciclavel" value="Não"> Não
                                    </label>
                                </div>
                            </div>
                            <div class="form-group" style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 0.75rem;">
                                <div>
                                    <label for="mat-cor">Cor da Lixeira Recomendada</label>
                                    <select id="mat-cor" class="form-control">
                                        <option value="Sem lixeira">Nenhuma específica</option>
                                        <option value="Vermelha (Plástico)">Vermelha (Plástico)</option>
                                        <option value="Azul (Papel)">Azul (Papel)</option>
                                        <option value="Amarela (Metal)">Amarela (Metal)</option>
                                        <option value="Verde (Vidro)">Verde (Vidro)</option>
                                        <option value="Laranja (Pilhas/Baterias)">Laranja (Pilhas/Baterias)</option>
                                        <option value="Cinza (Não reciclável)">Cinza (Não reciclável)</option>
                                        <option value="Marrom (Orgânico)">Marrom (Orgânico)</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="mat-tempo">Decomposição *</label>
                                    <input type="text" id="mat-tempo" class="form-control" placeholder="Ex: 100 anos, 3 meses" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mat-instrucoes">Instruções de Descarte *</label>
                                <textarea id="mat-instrucoes" class="form-control" rows="3" placeholder="Ex: Remova a tampa, lave os resíduos internos e amasse para reduzir volume." required></textarea>
                            </div>
                            <button type="submit" class="btn-submit">Cadastrar Material</button>
                        </form>
                    </div>

                    <!-- Preview Table -->
                    <div class="preview-card">
                        <div class="preview-header">
                            <h2>Materiais Cadastrados</h2>
                            <span class="items-count" id="count-materiais">0</span>
                        </div>
                        <div class="table-container">
                            <table id="table-materiais">
                                <thead>
                                    <tr>
                                        <th>Material</th>
                                        <th>Categoria / Reciclável</th>
                                        <th>Orientações</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-materiais">
                                    <!-- Dynamic items -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tab: Classificação -->
            <section id="tab-classificacao" class="panel-tab">
                <div class="panel-header">
                    <h1>Cadastro de Classificações</h1>
                    <p>Defina as categorias e as classificações de lixo, incluindo códigos de cores e descrições didáticas.</p>
                </div>
                
                <div class="panel-grid">
                    <!-- Form -->
                    <div class="form-card">
                        <div id="alert-classificacao" class="alert">✓ Classificação cadastrada com sucesso!</div>
                        <form id="form-classificacao" onsubmit="saveClassificacao(event)">
                            <div class="form-group">
                                <label for="cla-nome">Nome da Classificação *</label>
                                <input type="text" id="cla-nome" class="form-control" placeholder="Ex: Plásticos, Papéis, Orgânico" required>
                            </div>
                            <div class="form-group" style="display: grid; grid-template-columns: 1fr 2.5fr; gap: 0.75rem;">
                                <div>
                                    <label for="cla-cor">Cor Oficial</label>
                                    <input type="color" id="cla-cor" class="form-control" style="height: 38px; padding: 2px;" value="#10b981">
                                </div>
                                <div>
                                    <label for="cla-lixeira">Nome da Lixeira / Destino</label>
                                    <input type="text" id="cla-lixeira" class="form-control" placeholder="Ex: Lixeira Vermelha, Logística Reversa" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cla-descricao">Descrição da Categoria *</label>
                                <textarea id="cla-descricao" class="form-control" rows="3" placeholder="Ex: Materiais derivados de resinas plásticas que podem ser refundidos e reutilizados." required></textarea>
                            </div>
                            <button type="submit" class="btn-submit">Cadastrar Categoria</button>
                        </form>
                    </div>

                    <!-- Preview Table -->
                    <div class="preview-card">
                        <div class="preview-header">
                            <h2>Classificações Cadastradas</h2>
                            <span class="items-count" id="count-classificacao">0</span>
                        </div>
                        <div class="table-container">
                            <table id="table-classificacao">
                                <thead>
                                    <tr>
                                        <th>Cor</th>
                                        <th>Classificação / Lixeira</th>
                                        <th>Descrição</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-classificacao">
                                    <!-- Dynamic items -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>

    <!-- JS Logic for Tab Swapping and Dynamic LocalStorage persistence -->
    <script>
        // Switching tabs
        function switchTab(tabName) {
            // Remove active classes
            document.querySelectorAll('.sidebar-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.panel-tab').forEach(tab => tab.classList.remove('active'));
            
            // Add active classes to targets
            event.currentTarget.classList.add('active');
            document.getElementById(`tab-${tabName}`).classList.add('active');
        }

        // --- Core Data Controllers (using LocalStorage for mock database persistence) ---

        // Preload default data if empty to keep it populated and didactic
        const defaultEcopontos = [
            {
                id: 1,
                nome: "Ecoponto Central Pinheiros",
                endereco: "Rua dos Pinheiros, 1234 - Pinheiros",
                lat: "-23.5678",
                lng: "-46.6891",
                horario: "Seg a Sáb, das 08h às 18h",
                materiais: ["Plástico", "Papel", "Metal", "Vidro"]
            },
            {
                id: 2,
                nome: "Ponto Seletiva Parque da Cidade",
                endereco: "Av. das Nações Unidas, 4500 - Vila Almeida",
                lat: "-23.6012",
                lng: "-46.7023",
                horario: "Todos os dias, das 07h às 22h",
                materiais: ["Eletrônicos", "Óleo Usado"]
            }
        ];

        const defaultMateriais = [
            {
                id: 1,
                nome: "Garrafa PET",
                categoria: "Plástico",
                reciclavel: "Sim",
                cor: "Vermelha (Plástico)",
                tempo: "Mais de 400 anos",
                instrucoes: "Lave para retirar resíduos internos e amasse para reduzir volume."
            },
            {
                id: 2,
                nome: "Caixa de Papelão",
                categoria: "Papel",
                reciclavel: "Sim",
                cor: "Azul (Papel)",
                tempo: "3 a 6 meses",
                instrucoes: "Desdobre e amasse a caixa para ficar plana antes de descartar."
            }
        ];

        const defaultClassificacoes = [
            {
                id: 1,
                nome: "Plásticos",
                cor: "#ef4444",
                lixeira: "Lixeira Vermelha",
                descricao: "Garrafas PET, embalagens de higiene, tampas, sacolas e potes plásticos limpos."
            },
            {
                id: 2,
                nome: "Papéis",
                cor: "#3b82f6",
                lixeira: "Lixeira Azul",
                descricao: "Papelão, jornais, revistas, folhas de caderno, correspondências secas e limpas."
            }
        ];

        // Init database collections
        let ecopontos = JSON.parse(localStorage.getItem('eco_ecopontos')) || defaultEcopontos;
        let materiais = JSON.parse(localStorage.getItem('eco_materiais')) || defaultMateriais;
        let classificacoes = JSON.parse(localStorage.getItem('eco_classificacoes')) || defaultClassificacoes;

        // Render functions
        function renderAll() {
            renderEcopontos();
            renderMateriais();
            renderClassificacoes();
        }

        // Render Ecopontos
        function renderEcopontos() {
            const tbody = document.getElementById('tbody-ecopontos');
            tbody.innerHTML = '';
            document.getElementById('count-ecopontos').innerText = ecopontos.length;

            if (ecopontos.length === 0) {
                tbody.innerHTML = `<tr><td colspan="4" class="empty-state">Nenhum ecoponto cadastrado.</td></tr>`;
                return;
            }

            ecopontos.forEach(eco => {
                const tr = document.createElement('tr');
                const badges = eco.materiais.map(m => `<span class="badge-table badge-success">${m}</span>`).join('');
                
                tr.innerHTML = `
                    <td><strong>${eco.nome}</strong></td>
                    <td>${eco.endereco}<br><small style="color:var(--text-muted)">${eco.horario}<br>Lat: ${eco.lat} / Lng: ${eco.lng}</small></td>
                    <td>${badges}</td>
                    <td><button class="btn-delete" onclick="deleteEcoponto(${eco.id})">Excluir</button></td>
                `;
                tbody.appendChild(tr);
            });
        }

        // Render Materiais
        function renderMateriais() {
            const tbody = document.getElementById('tbody-materiais');
            tbody.innerHTML = '';
            document.getElementById('count-materiais').innerText = materiais.length;

            if (materiais.length === 0) {
                tbody.innerHTML = `<tr><td colspan="4" class="empty-state">Nenhum material cadastrado.</td></tr>`;
                return;
            }

            materiais.forEach(mat => {
                const tr = document.createElement('tr');
                const isRec = mat.reciclavel === "Sim";
                const badgeRec = isRec ? `<span class="badge-table badge-success">Reciclável</span>` : `<span class="badge-table badge-danger">Não Reciclável</span>`;
                
                tr.innerHTML = `
                    <td><strong>${mat.nome}</strong></td>
                    <td>${mat.categoria}<br>${badgeRec}</td>
                    <td><small><strong>Lixeira:</strong> ${mat.cor}<br><strong>Decomp.:</strong> ${mat.tempo}<br><strong>Dica:</strong> ${mat.instrucoes}</small></td>
                    <td><button class="btn-delete" onclick="deleteMaterial(${mat.id})">Excluir</button></td>
                `;
                tbody.appendChild(tr);
            });
        }

        // Render Classificacoes
        function renderClassificacoes() {
            const tbody = document.getElementById('tbody-classificacao');
            tbody.innerHTML = '';
            document.getElementById('count-classificacao').innerText = classificacoes.length;

            if (classificacoes.length === 0) {
                tbody.innerHTML = `<tr><td colspan="4" class="empty-state">Nenhuma classificação cadastrada.</td></tr>`;
                return;
            }

            classificacoes.forEach(cla => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="text-align:center;"><div style="width:20px; height:20px; border-radius:50%; background-color:${cla.cor}; margin:0 auto; border:1px solid #cbd5e1;"></div></td>
                    <td><strong>${cla.nome}</strong><br><small style="color:var(--text-muted)">${cla.lixeira}</small></td>
                    <td>${cla.descricao}</td>
                    <td><button class="btn-delete" onclick="deleteClassificacao(${cla.id})">Excluir</button></td>
                `;
                tbody.appendChild(tr);
            });
        }

        // Save Ecoponto
        function saveEcoponto(e) {
            e.preventDefault();
            
            // Get selected checkboxes
            const checkedBoxes = document.querySelectorAll('input[name="eco-materiais"]:checked');
            const selectedMateriais = Array.from(checkedBoxes).map(cb => cb.value);

            if (selectedMateriais.length === 0) {
                alert("Por favor, selecione ao menos um material aceito.");
                return;
            }

            const newEco = {
                id: Date.now(),
                nome: document.getElementById('eco-nome').value,
                endereco: document.getElementById('eco-endereco').value,
                lat: document.getElementById('eco-lat').value,
                lng: document.getElementById('eco-lng').value,
                horario: document.getElementById('eco-horario').value,
                materiais: selectedMateriais
            };

            ecopontos.push(newEco);
            localStorage.setItem('eco_ecopontos', JSON.stringify(ecopontos));
            renderEcopontos();
            
            // Reset and Alert
            document.getElementById('form-ecoponto').reset();
            const alert = document.getElementById('alert-ecopontos');
            alert.style.display = 'flex';
            setTimeout(() => alert.style.display = 'none', 3000);
        }

        // Save Material
        function saveMaterial(e) {
            e.preventDefault();

            const isReciclavel = document.querySelector('input[name="mat-reciclavel"]:checked').value;

            const newMat = {
                id: Date.now(),
                nome: document.getElementById('mat-nome').value,
                categoria: document.getElementById('mat-categoria').value,
                reciclavel: isReciclavel,
                cor: document.getElementById('mat-cor').value,
                tempo: document.getElementById('mat-tempo').value,
                instrucoes: document.getElementById('mat-instrucoes').value
            };

            materiais.push(newMat);
            localStorage.setItem('eco_materiais', JSON.stringify(materiais));
            renderMateriais();

            // Reset and Alert
            document.getElementById('form-material').reset();
            const alert = document.getElementById('alert-materiais');
            alert.style.display = 'flex';
            setTimeout(() => alert.style.display = 'none', 3000);
        }

        // Save Classificacao
        function saveClassificacao(e) {
            e.preventDefault();

            const newCla = {
                id: Date.now(),
                nome: document.getElementById('cla-nome').value,
                cor: document.getElementById('cla-cor').value,
                lixeira: document.getElementById('cla-lixeira').value,
                descricao: document.getElementById('cla-descricao').value
            };

            classificacoes.push(newCla);
            localStorage.setItem('eco_classificacoes', JSON.stringify(classificacoes));
            renderClassificacoes();

            // Reset and Alert
            document.getElementById('form-classificacao').reset();
            const alert = document.getElementById('alert-classificacao');
            alert.style.display = 'flex';
            setTimeout(() => alert.style.display = 'none', 3000);
        }

        // Delete handlers
        function deleteEcoponto(id) {
            ecopontos = ecopontos.filter(item => item.id !== id);
            localStorage.setItem('eco_ecopontos', JSON.stringify(ecopontos));
            renderEcopontos();
        }

        function deleteMaterial(id) {
            materiais = materiais.filter(item => item.id !== id);
            localStorage.setItem('eco_materiais', JSON.stringify(materiais));
            renderMateriais();
        }

        function deleteClassificacao(id) {
            classificacoes = classificacoes.filter(item => item.id !== id);
            localStorage.setItem('eco_classificacoes', JSON.stringify(classificacoes));
            renderClassificacoes();
        }

        // Initial trigger
        window.onload = renderAll;
    </script>
</body>
</html>
