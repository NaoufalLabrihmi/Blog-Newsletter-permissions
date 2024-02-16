<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Permissions\AssignController;
use App\Http\Controllers\Permissions\AssignUserController;
use App\Http\Controllers\Permissions\PermissionController;
use App\Http\Controllers\Permissions\RoleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/about', function () {
    return view('about');
})->name('about.index');
Route::get('/search', [SearchController::class, 'post'])->name('posts.search');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'has.role'])->name('dashboard');
Route::get('/generate-dashboard-pdf', [DashboardController::class, 'generateDashboardPDF'])->name('generate.dashboard.pdf');
Route::post('/subscriber', [SubscribeController::class, 'store'])->name('subscriber');
Route::get('/tags', [TagController::class, 'index'])->name('tags.index');

Route::prefix('admin')->middleware('auth', 'verified', 'has.role')->group(function () {
    //Post
    Route::prefix('posts')->group(function () {
        Route::get('create', [PostController::class, 'create'])->name('post.create')->middleware('permission:create post');
        Route::post('store', [PostController::class, 'store'])->name('post.store')->middleware('permission:store post');
        Route::get('{post:slug}/edit', [PostController::class, 'edit'])->name('post.edit')->middleware('permission:edit post');
        Route::patch('{post:slug}/edit', [PostController::class, 'update'])->name('post.update')->middleware('permission:update post');
        Route::delete('{post:slug}/delete', [PostController::class, 'destroy'])->name('post.delete')->middleware('permission:delete post');
    });
    //Roles and Permission
    Route::prefix('roles-and-permissions')->namespace('Permissions')->group(function () {
        Route::get('assigns', [AssignController::class, 'index'])->name('assign.index')->middleware('permission:view assign');
        Route::post('assigns/create', [AssignController::class, 'store'])->name('assign.create')->middleware('permission:create assign');
        Route::get('assigns/{role}/edit', [AssignController::class, 'edit'])->name('assign.edit')->middleware('permission:edit assign');
        Route::put('assigns/{role}/edit', [AssignController::class, 'update'])->name('assign.update')->middleware('permission:update assign');

        Route::get('assigns/api', [AssignController::class, 'indexApi'])->name('assignApi.index')->middleware('permission:view assign');
        Route::post('assigns/create/api', [AssignController::class, 'storeApi'])->name('assignApi.create')->middleware('permission:create assign');
        Route::get('assigns/{role}/edit/api', [AssignController::class, 'editApi'])->name('assignApi.edit')->middleware('permission:edit assign');
        Route::put('assigns/{role}/edit/api', [AssignController::class, 'updateApi'])->name('assignApi.update')->middleware('permission:update assign');

        Route::get('assign/user', [AssignUserController::class, 'index'])->name('assign.user.index')->middleware('permission:view assignUser');
        Route::post('assign/user', [AssignUserController::class, 'store'])->name('assign.user.create')->middleware('permission:create assignUser');
        Route::get('assign/{user}/user', [AssignUserController::class, 'edit'])->name('assign.user.edit')->middleware('permission:edit assignUser');
        Route::put('assign/{user}/user', [AssignUserController::class, 'update'])->name('assign.user.update')->middleware('permission:update assignUser');

        Route::get('roles', [RoleController::class, 'index'])->name('role.index')->middleware('permission:view role');
        Route::post('roles/create', [RoleController::class, 'store'])->name('role.create')->middleware('permission:create role');
        Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('role.edit')->middleware('permission:edit role');
        Route::put('roles/{role}/edit', [RoleController::class, 'update'])->name('role.update')->middleware('permission:update role');
        Route::delete('roles/{role}/delete', [RoleController::class, 'destroy'])->name('role.delete')->middleware('permission:delete role');

        Route::get('permissions', [PermissionController::class, 'index'])->name('permission.index')->middleware('permission:view permission');
        Route::post('permissions/create', [PermissionController::class, 'store'])->name('permission.create')->middleware('permission:create permission');
        Route::get('permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permission.edit')->middleware('permission:edit permission');
        Route::put('permissions/{permission}/edit', [PermissionController::class, 'update'])->name('permission.update')->middleware('permission:update permission');
        Route::delete('permissions/{permission}/delete', [PermissionController::class, 'destroy'])->name('permission.delete')->middleware('permission:delete permission');
    });
    //Subscriber
    Route::prefix('subscribers')->group(function () {
        Route::get('/', [SubscribeController::class, 'index'])->name('subscribe.index')->middleware('permission:view subscribe');
        Route::get('{subscribe}/edit', [SubscribeController::class, 'edit'])->name('subscribe.edit')->middleware('permission:edit subscribe');
        Route::patch('{subscribe}/edit', [SubscribeController::class, 'update'])->name('subscribe.update')->middleware('permission:update subscribe');
        Route::delete('{subscribe}/delete', [SubscribeController::class, 'destroy'])->name('subscribe.delete')->middleware('permission:delete subscribe');
        Route::post('{subscribe}/sendemail', [SubscribeController::class, 'storeSingleEmail'])->name('subscribe.sendemail')->middleware('permission:email subscribe');
        // Route::post('/sendemailall', [SubscribeController::class, 'storeAllUserEmail'])->name('subscribe.sendemailall');
        Route::post('/sendemailall', [SubscribeController::class, 'storeAllUserEmail'])->name('subscribe.sendemailall');
    });


    //Tag
    Route::prefix('tags')->group(function () {
        Route::get('create', [TagController::class, 'create'])->name('tag.create')->middleware('permission:create tag');
        Route::post('store', [TagController::class, 'store'])->name('tag.store')->middleware('permission:store tag');
        Route::get('{tag:slug}/edit', [TagController::class, 'edit'])->name('tag.edit')->middleware('permission:edit tag');
        Route::patch('{tag:slug}/edit', [TagController::class, 'update'])->name('tag.update')->middleware('permission:update tag');
        Route::delete('{tag:slug}/delete', [TagController::class, 'destroy'])->name('tag.delete')->middleware('permission:delete tag');
    });
    //Users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index')->middleware('permission:view user');
    });
});
Route::get('blog/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::get('tags/{tag:slug}', [TagController::class, 'show'])->name('tag.show');

require __DIR__ . '/auth.php';
