<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - EcoGo
|--------------------------------------------------------------------------
|
| Aqui são registradas as rotas da API do projeto EcoGo.
| Todas as rotas abaixo são automaticamente prefixadas com "/api".
|
*/

/**
 * Rota GET /api/status
 * Verifica a saúde e status atual do servidor da API.
 */
Route::get('/status', function () {
    return response()->json([
        'status' => 'online',
        'projeto' => 'EcoGo API',
        'descricao' => 'Aplicativo voltado ao descarte consciente de resíduos e conscientização ambiental',
        'versao' => '1.0.0',
        'laravel_version' => app()->version(),
        'ambiente' => app()->environment(),
        'timestamp' => now()->toIso8601String(),
    ]);
});

/**
 * Rota GET /api/pontos-coleta
 * Retorna os pontos de coleta cadastrados mais próximos com coordenadas geográficas e tipos de resíduos aceitos.
 */
Route::get('/pontos-coleta', function () {
    return response()->json([
        [
            'id' => 1,
            'nome' => 'Ecoponto Central Pinheiros',
            'endereco' => 'Rua dos Pinheiros, 1234 - Pinheiros, São Paulo - SP',
            'latitude' => -23.56789,
            'longitude' => -46.68912,
            'materiais_aceitos' => ['plástico', 'papel', 'metal', 'vidro', 'eletrônicos'],
            'status' => 'aberto',
            'horario_funcionamento' => 'Segunda a Sábado, das 08:00 às 18:00',
            'telefone' => '(11) 3456-7890',
        ],
        [
            'id' => 2,
            'nome' => 'Ponto de Coleta Seletiva Parque da Cidade',
            'endereco' => 'Av. das Nações Unidas, 4500 - Vila Almeida, São Paulo - SP',
            'latitude' => -23.60124,
            'longitude' => -46.70234,
            'materiais_aceitos' => ['óleo de cozinha usado', 'pilhas e baterias', 'lâmpadas'],
            'status' => 'aberto',
            'horario_funcionamento' => 'Todos os dias, das 07:00 às 22:00',
            'telefone' => '(11) 3456-7891',
        ],
        [
            'id' => 3,
            'nome' => 'Associação de Recicladores EcoVida',
            'endereco' => 'Rua das Flores, 88 - Bairro Verde, São Paulo - SP',
            'latitude' => -23.54321,
            'longitude' => -46.61234,
            'materiais_aceitos' => ['papelão', 'latinhas de alumínio', 'garrafas pet', 'sucatas de metal'],
            'status' => 'aberto',
            'horario_funcionamento' => 'Segunda a Sexta, das 07:30 às 17:00',
            'telefone' => '(11) 3456-7892',
        ]
    ]);
});

/**
 * Rota GET /api/materiais
 * Fornece orientações e informações sobre classificação e descarte adequado de resíduos.
 * Auxilia o aplicativo na identificação por imagem e orientações de conscientização.
 */
Route::get('/materiais', function () {
    return response()->json([
        [
            'id' => 1,
            'nome' => 'Garrafa PET',
            'categoria' => 'Plástico',
            'reciclavel' => true,
            'cor_lixeira' => 'Vermelha',
            'tempo_decomposicao' => 'Mais de 400 anos',
            'instrucoes_descarte' => 'Retire a tampa e o rótulo, lave para remover resíduos internos e amasse para reduzir o volume ocupado.',
        ],
        [
            'id' => 2,
            'nome' => 'Caixa de Papelão',
            'categoria' => 'Papel',
            'reciclavel' => true,
            'cor_lixeira' => 'Azul',
            'tempo_decomposicao' => '3 a 6 meses',
            'instrucoes_descarte' => 'Desmonte e desdobre a caixa para que fique plana, evitando que acumule água ou ocupe espaço excessivo.',
        ],
        [
            'id' => 3,
            'nome' => 'Lata de Refrigerante',
            'categoria' => 'Metal',
            'reciclavel' => true,
            'cor_lixeira' => 'Amarela',
            'tempo_decomposicao' => '200 a 500 anos',
            'instrucoes_descarte' => 'Enxágue para remover restos de líquido, amasse a lata (opcional) e descarte com o lacre acoplado.',
        ],
        [
            'id' => 4,
            'nome' => 'Pilha / Bateria',
            'categoria' => 'Resíduo Perigoso',
            'reciclavel' => true,
            'cor_lixeira' => 'Laranja / Ponto Específico',
            'tempo_decomposicao' => 'Indeterminado (contém metais pesados)',
            'instrucoes_descarte' => 'Nunca descarte no lixo comum ou reciclável tradicional. Armazene em recipiente seco e leve a um ponto de coleta logística reversa.',
        ]
    ]);
});

/**
 * Rota GET /api/recompensas
 * Retorna as opções de recompensas disponíveis para o sistema de gamificação, incentivando os descartes corretos.
 * O usuário pode resgatar esses prêmios utilizando os pontos obtidos via leitura de QR Code nos ecopontos.
 */
Route::get('/recompensas', function () {
    return response()->json([
        [
            'id' => 1,
            'titulo' => 'Desconto de 10% no Bilhete Único / Transporte Público',
            'descricao' => 'Desconto aplicável na recarga mensal ou comum de transporte público coletivo.',
            'pontos_necessarios' => 150,
            'categoria' => 'Mobilidade',
            'parceiro' => 'SPTrans / Mobilidade Urbana',
            'status' => 'disponivel',
        ],
        [
            'id' => 2,
            'titulo' => 'R$ 15,00 de Crédito na Conta de Energia',
            'descricao' => 'Crédito aplicado diretamente na sua próxima fatura de energia elétrica residencial.',
            'pontos_necessarios' => 250,
            'categoria' => 'Serviços Públicos',
            'parceiro' => 'Distribuidora de Energia Local',
            'status' => 'disponivel',
        ],
        [
            'id' => 3,
            'titulo' => 'Cupom de R$ 10,00 para Feiras Orgânicas',
            'descricao' => 'Vale-compras para aquisição de alimentos orgânicos em feiras livres de produtores parceiros.',
            'pontos_necessarios' => 80,
            'categoria' => 'Alimentação',
            'parceiro' => 'Feira Verde Orgânica',
            'status' => 'disponivel',
        ],
        [
            'id' => 4,
            'titulo' => 'Muda de Planta Nativa da Mata Atlântica',
            'descricao' => 'Retire uma muda de ipê, pitangueira ou jabuticabeira em um ecoponto parceiro para plantar na sua região.',
            'pontos_necessarios' => 50,
            'categoria' => 'Meio Ambiente',
            'parceiro' => 'Horto Florestal Municipal',
            'status' => 'disponivel',
        ]
    ]);
});
