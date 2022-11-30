<?php

use App\Http\Controllers\ComentarioController;
//use App\Http\Controllers\FormacaoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscritorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| todosArtigos
*/

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/legalalert', [HomeController::class,'newsPapers'])->name('legalalert');
Route::post('subscrever',[SubscritorController::class,'store'])->name('subscrever');
Route::get('pesquisar', [HomeController::class,'artigoSearch'])->name('pesquisar');
Route::get('/artigo/{artigo}', [HomeController::class,'verArtigo'])->name('artigo');
Route::get('/Artigos', [HomeController::class,'todosArtigos'])->name('artigo.todos');
Route::get('/Livros', [HomeController::class,'livros'])->name('livros');
Route::get('/Jornais', [HomeController::class,'jornais'])->name('jornais');
Route::get('/contacto', [HomeController::class,'contacto'])->name('contacto');
Route::post('emailContacto', [HomeController::class,'emailContacto'])->name('email.Contacto');
Route::get('/sobre', [HomeController::class,'sobre'])->name('sobre');
Route::get('/blog', [HomeController::class,'blogs'])->name('blog');
Route::get('/blog/{blog}', [HomeController::class,'verBlog'])->name('blog.ler');
Route::get('/legalalert/{newspaper}', [HomeController::class,'newspaper'])->name('legalalert.ler');
Route::get('/legalalert/download/{newspaper}', [HomeController::class,'newspaperDownload'])->name('legalalert.download');
Route::post('comentar',[ComentarioController::class,'store'])->name('comentar');
Route::get('candidato/{formacao}',[App\Http\Controllers\FormacaoController::class,'listarCandidatos'])->name('candidato')->middleware(['auth']);
Route::get('formacao',[HomeController::class,'formacao'])->name('formacao');
Route::get('formacao/{formacao}',[HomeController::class,'verFormacao'])->name('formacao.vermais');
Route::get('candidatura/{formacao}',[HomeController::class,'candidatura'])->name('candidatura');
Route::post('candidatura',[App\Http\Controllers\CandidatoController::class,'store'])->name('candidatura.criar');
Route::get('Artigos/Plataformas',[HomeController::class,'artigosCintefico'])->name('artigoscientifico');
//

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {return view('admin.dashboard');})->name('dashboard');
Route::resources(['users'=>UsersController::class,
                  'funcoes' =>RoleController::class,
                   'permissoes'=>PermissionController::class,
                    'artigos' => ArtigoController::class,
                    'blogs'   => BlogController::class,
                    'newspapers' => NewspaperController::class,
                    'formacoes' => FormacaoController::class,
                    'candidatos' =>CandidatoController::class,
                    'categoria'=> CategoriaController::class,
                    'artigoscienticos' => ArtigocertificoController::class,
                    'livros' => LivroController::class,
                    'jornais' => JornaiController::class
                ]);
                Route::controller(MaterialController::class)->group(function(){
                Route::get('/materiais','index')->name('materiais.index');
                Route::get('/materiais/create/{formacao}','create');
                Route::get('/materiais/{material}','show')->name('materiais.show');
                Route::get('/materiais/{material}/edit','edit')->name('materiais.edit');
                Route::put('/materiais/{material}','update')->name('materiais.update');
                Route::post('/materiais','store')->name('materiais.store');
                Route::delete('/materiais/{material}','destroy')->name('materiais.destroy');
                });
                Route::get('listarformacao',[App\Http\Controllers\CandidatoController::class,'formacao'])->name('candidatos.formacao');
                Route::get('meuscursos',[App\Http\Controllers\CandidatoController::class,'meusCorsus'])->name('candidatos.meuscursos');
                Route::get('realizarcandidatura/{formacao}/{candidato}',[App\Http\Controllers\CandidatoController::class,'realizarCandidatura'])->name('realizar.candidatura');
                Route::get('aceitarcandidatura/{formacao}/{candidato}',[App\Http\Controllers\FormacaoController::class,'aceitarCandidatura']);
                Route::get('regeitarcandidatura/{formacao}/{candidato}',[App\Http\Controllers\FormacaoController::class,'rejeitarCandidatura']);
});
require __DIR__.'/auth.php';
