<?php

use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
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

Route::get('/login', function () {
    return view('modules.authentication.login');
})->name('admin.login');

Route::get('/forgot-password', function () {
    return view('modules.authentication.forgot-password');
})->name('admin.forgot_password');

Route::get('/reset-password', function () {
    return view('modules.authentication.reset-password');
})->name('admin.reset_password');

Route::get('/', function () {
    return view('modules.dashboard.index');
})->name('admin.dashboard');

Route::get('/profile', function () {
    return view('modules.profile.index');
})->name('admin.profile');

Route::get('/profile/edit', function () {
    return view('modules.profile.edit');
})->name('admin.profile.edit');

Route::get('/change-password', function () {
    return view('modules.profile.change-password');
})->name('admin.change_password');

# blog categories
Route::controller(BlogCategoryController::class)->group(function () {
    Route::prefix('blog/categories')->group(function () {
        Route::get('/', 'index')->name('blog_categories');
        Route::get('/create', 'create')->name('blog_categories.create');
        Route::post('/store', 'store')->name('blog_categories.store');
        Route::get('/edit/{id}', 'edit')->name('blog_categories.edit');
        Route::put('/update/{id}', 'update')->name('blog_categories.update');
        Route::delete('/destroy/{id}', 'destroy')->name('blog_categories.destroy');
    });
});

# blogs
Route::controller(BlogController::class)->group(function () {
    Route::prefix('blogs')->group(function () {
        Route::get('/', 'index')->name('blogs');
        Route::get('/show', 'show')->name('blogs.show');
        Route::get('/create', 'create')->name('blogs.create');
        Route::post('/store', 'store')->name('blogs.store');
        Route::get('/edit/{id}', 'edit')->name('blogs.edit');
        Route::put('/update/{id}', 'update')->name('blogs.update');
        Route::put('/status-update/{id}', 'updateStatus')->name('blogs_status.update');
        Route::delete('/destroy/{id}', 'destroy')->name('blogs.destroy');
    });
});


Route::get('/contact-info', function () {
    return view('modules.contact-info.index');
})->name('contact_info');

Route::get('/contact-info/show', function () {
    return view('modules.contact-info.show');
})->name('contact_info.show');

Route::get('/contact-info/create', function () {
    return view('modules.contact-info.create');
})->name('contact_info.create');

Route::get('/contact-info/edit', function () {
    return view('modules.contact-info.edit');
})->name('contact_info.edit');

Route::get('/contact-queries', function () {
    return view('modules.contact-queries.index');
})->name('contact_queries');

Route::get('/contact-queries/show', function () {
    return view('modules.contact-queries.show');
})->name('contact_queries.show');

Route::get('/social-links', function () {
    return view('modules.social-links.create-or-edit');
})->name('social_links');

Route::get('/terms', function () {
    return view('modules.terms-and-conditions.create-or-edit');
})->name('terms_and_conditions');

Route::get('/privacy-policies', function () {
    return view('modules.privacy-policies.create-or-edit');
})->name('privacy_policies');

Route::get('/faqs/categories', function () {
    return view('modules.faqs.categories.index');
})->name('faq_categories');

Route::get('/faqs/categories/create', function () {
    return view('modules.faqs.categories.create');
})->name('faq_categories.create');

Route::get('/faqs/categories/edit', function () {
    return view('modules.faqs.categories.edit');
})->name('faq_categories.edit');

Route::get('/faqs', function () {
    return view('modules.faqs.index');
})->name('faqs');

Route::get('/faqs/show', function () {
    return view('modules.faqs.show');
})->name('faqs.show');

Route::get('/faqs/create', function () {
    return view('modules.faqs.create');
})->name('faqs.create');

Route::get('/faqs/edit', function () {
    return view('modules.faqs.edit');
})->name('faqs.edit');

Route::get('/newsletter/subscribers', function () {
    return view('modules.newsletter.subscribers.index');
})->name('newsletter.subscribers');

Route::get('/newsletter/mails', function () {
    return view('modules.newsletter.index');
})->name('newsletter.mails');

Route::get('/newsletter/show', function () {
    return view('modules.newsletter.show');
})->name('newsletter.show');

Route::get('/newsletter/create', function () {
    return view('modules.newsletter.create');
})->name('newsletter.create');

Route::get('/newsletter/edit', function () {
    return view('modules.newsletter.edit');
})->name('newsletter.edit');

Route::get('/mail-configuration', function () {
    return view('modules.mail-configuration.index');
})->name('smtp');

Route::get('/mail-configuration/show', function () {
    return view('modules.mail-configuration.show');
})->name('smtp.show');

Route::get('/mail-configuration/create', function () {
    return view('modules.mail-configuration.create');
})->name('smtp.create');

Route::get('/mail-configuration/edit', function () {
    return view('modules.mail-configuration.edit');
})->name('smtp.edit');

Route::get('/general-settings', function () {
    return view('modules.general-settings.create-or-edit');
})->name('general_settings');
