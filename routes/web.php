<?php

use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\AnswerCommentController;

Auth::routes();

//Admin
Route::prefix('admin')->middleware('CheckRoll')->group(function (){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::get('/users',[UserController::class,'index'])->name('admin.users');
    Route::get('/users/UpdateStatus/{user}',[UserController::class,'changeStatus'])->name('admin.user.status');
    Route::get('/users/delete/{user}',[UserController::class,'destroy'])->name('A.user.destroy');
    Route::get('/users/edit/{user}',[UserController::class,'edit'])->name('A.user.edit');
    Route::post('/users/update/{user}',[UserController::class,'update'])->name('A.user.update');
});
//Admin.categories
Route::prefix('admin')->middleware('CheckRoll')->group(function(){
Route::get('/categories',[CategoryController::class,'index'])->name('A.categories');
Route::get('/category/new',[CategoryController::class,'create'])->name('A.category.new');
Route::post('/category/store',[CategoryController::class,'store'])->name('A.category.store');
Route::get('/edit-category/{category:slug}',[CategoryController::class,'edit'])->name('A.editCategory');
Route::post('/update-category/{category:slug}',[CategoryController::class,'update'])->name('A.category.Update');
Route::get('/delete-category/{category}',[CategoryController::class,'destroy'])->name('A.category.Delete');
});

//Admin-articles
Route::prefix('admin')->middleware('CheckRoll')->group(function (){
    Route::get('/articles',[ArticleController::class,'index'])->name('A.articles');
    Route::get('/article-create',[ArticleController::class,'create'])->name('A.create.article');
    Route::post('/article-store',[ArticleController::class,'store'])->name('article.store');
    Route::get('/change-status/{article}',[ArticleController::class,'updateStatus'])->name('A.changeStatus');
    Route::get('/article-edit/{article}',[ArticleController::class,'edit'])->name('A.edit.article');
    Route::post('/article-update/{article}',[ArticleController::class,'update'])->name('A.article.update');
    Route::get('/preview/{article}',[ArticleController::class,'preview'])->name('A.article.preview');
    Route::get('/article-delete/{article}',[ArticleController::class,'destroy'])->name('A.article.delete');
});
//Admin-comment
Route::prefix('admin')->middleware('CheckRoll')->group(function (){
    Route::get('/comments',[\App\Http\Controllers\Back\CommentController::class,'index'])->name('admin.comments');
    Route::get('/answer-comments',[\App\Http\Controllers\Back\CommentController::class,'answers'])->name('admin.comments.answers');
    Route::get('/comment-edit/{comment}',[\App\Http\Controllers\Back\CommentController::class,'edit'])->name('A.comment.edit');
    Route::post('/comment-update/{comment}',[\App\Http\Controllers\Back\CommentController::class,'update'])->name('A.comment.update');
    Route::get('/comment-delete/{comment}',[\App\Http\Controllers\Back\CommentController::class,'destroy'])->name('A.comment.delete');
    Route::get('/update-status-comment/{comment}',[\App\Http\Controllers\Back\CommentController::class,'changeStatus'])->name('A.comment.changeStatus');
});

// comment
Route::post('/comment/{article:slug}',[CommentController::class,'store'])->middleware('auth')->name('comment.store');
Route::post('/comment',[CommentController::class,'replyStore'])->middleware('auth')->name('reply.store');
//unisharp file manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//profiel
Route::get('/profile/{user}',[\App\Http\Controllers\Front\UserController::class,'edit'])->name('profile.show');
Route::post('/profile-update/{user}',[\App\Http\Controllers\Front\UserController::class,'update'])->name('profile.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Front\ArticleControllerF::class, 'index'])->name('Front.index');
Route::get('/{article:slug}', [App\Http\Controllers\Front\ArticleControllerF::class,'show'])->name('article.detail');
