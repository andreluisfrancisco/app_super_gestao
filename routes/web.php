<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobrenos', 'SobreNosController@sobrenos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('login', function () {
    return 'Login';
})->name('site.login');

Route::prefix('/app')->group(function () {
    Route::get('clientes', function () {
        return 'Clientes';
    })->name('app.clientes');;
    Route::get('fornecedores', function () {
        return 'Fornecedores';
    })->name('site.fornecedores');;
    Route::get('produtos', function () {
        return '`Produtos';
    })->name('site.produtos');;
});
//Rota com parametro
/*
Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem?}', function (string $nome, string $categoria, string $assunto, string $mensagem = '') {
    echo "Nome:  $nome <br> Categoria: $categoria <br> Assunto: $assunto <br> Mensagem: $mensagem";
});
*/

//Rota com parametro
Route::get(
    '/contato/{nome}/{categoria_id}',
    function (
        string $nome = 'Desconhecido',
        int $categoria_id = 1 // 1 - 'Informação'
    ) {
        echo "Nome: $nome <br> Categoria: $categoria_id";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Z][a-z].*');

/*
Route::get('/', function () {
    return "Curso PHP Laravel";
});

Route::get('/sobre-nos', function () {
    return view('sobre-nos');
});

Route::get('/contato', function () {
    return view('contato');
});
*/