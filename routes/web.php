<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostsController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Website\CategoryController as WebsiteCategoryController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Website\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\EmailController;
use App\Http\Controllers\Dashboard\SubscriberController;



use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Auth;

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



// website


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/categories/{category}', [WebsiteCategoryController::class, 'show'])->name('category');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post');


Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');










// Dashboard


Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth', 'checkLogin']], function () {

    Route::get('/', function () {
        return view('dashboard.layouts.layout');
    })->name('index');



    Route::get('/settings', [SettingController::class, 'index'])->name('settings');

    Route::post('/settings/update/{setting}', [SettingController::class, 'update'])->name('settings.update');


    Route::get('/users/all', [UserController::class, 'getUsersDatatable'])->name('users.all');
    Route::post('/users/delete', [UserController::class, 'delete'])->name('users.delete');


    Route::get('/category/all', [CategoryController::class, 'getCategoriesDatatable'])->name('category.all');
    Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/subscribers/all', [SubscriberController::class, 'getSubscribersDatatable'])->name('subscribers.all');
    Route::post('/subscribers/delete', [SubscriberController::class, 'delete'])->name('subscribers.delete');
    Route::get('dashboard/subscribers/{subscriber}/edit', [SubscriberController::class, 'edit'])->name('dashboard.subscribers.edit');


    // Route for the subscribers index page
    // Route::get('/subscribers/all', [SubscriberController::class, 'getAllSubscribers'])->name('subscribers.all');

    // Route for the send email page
    // Route::get('/subscribers/send-email', [SubscriberController::class, 'showSendEmailForm'])->name('subscribers.send-email');
    // Route::get('/send-email', [SubscriberController::class, 'showSendEmailForm'])->name('dashboard.send.email');

    // Route::get('/subscribers/sendemail', [SubscriberController::class, 'showSendEmailForm'])->name('dashboard.send.email');
    // Route::get('/subscribers/sendemail', [SubscriberController::class, 'showSendEmailForm'])->name('dashboard.send.email');
    Route::get('/subscribers/sendemail/{id}', [SubscriberController::class, 'showSendEmailForm']);
    Route::get('/subscribers/sendemailall', [SubscriberController::class, 'showSendEmailFormAll']);
    Route::post('/Store/email/{id}', [SubscriberController::class, 'storeSingleEmail'])->name('senddata');
    // Route::get('/senddata/{id}', 'SubscriberController@storeSingleEmail')->name('senddata');
    Route::post('/Store/emailall', [SubscriberController::class, 'storeAllUserEmail'])->name('allsenddata');


    Route::get('/posts/all', [PostsController::class, 'getPostsDatatable'])->name('posts.all');
    Route::post('/posts/delete', [PostsController::class, 'delete'])->name('posts.delete');

    // Route::get('/send-email', [SubscriberController::class, 'showSendEmailForm'])->name('subscribers.send_email');
    // Route::get('/send-email', [SubscriberController::class, 'showSendEmailForm'])->name('dashboard.subscribers.sendemail');





    Route::resources([
        'users' => UserController::class,
        'category' => CategoryController::class,
        'posts' => PostsController::class,
        'subscribers' => SubscriberController::class,
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
