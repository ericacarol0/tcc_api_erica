<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - EcoGo
|--------------------------------------------------------------------------
|
| Aqui são registradas as rotas da web para a aplicação EcoGo.
| A rota raiz "/" carrega a landing page de apresentação do projeto.
| Rota "/cadastro" carrega o painel de cadastro de ecopontos e materiais.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});
