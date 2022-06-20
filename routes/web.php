<?php
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
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
// Page d'acceuil
Route::get('/', [HomeController::class,"index"])->name('home');
Route::get("/aboutUs",[HomeController::class,"aboutUS"])->name("aboutUs");
/**
 * Article Manager
 */
// liste des articles
Route::get("/article/liste",[ ArticleController::class,"list"])->name("article_list");
Route::middleware("auth")->group(function(){
// Ajouter un article
Route::get('/article/add', [ArticleController::class,"add"])->name('article_add');
Route::Post('/article/add', [ArticleController::class,"add"]);  
// detail article
Route::get("/article/detail/{id}",[ArticleController::class,"detail"])->name("article_detail");

// supprimer un article
Route::get("/article/suprimer/{id}",[ArticleController::class,"delete"])->name("article_supprimer");
// Modifier un article 
Route::get("/article/modifier/{id}",[ArticleController::class,"edit"])->name("article_editer");
Route::post("/article/modifier/{id}",[ArticleController::class,"edit"]);
});
// Rechercher un article 
Route::get("/recherche",[ArticleController::class,"search"])->name("article_recherche");
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
