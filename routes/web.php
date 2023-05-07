<?php

use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SystemSettings\GeneralSetupController;
use App\Http\Controllers\Admin\SystemSettings\MailConfigurationController;
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

Route::prefix('admin')->as('admin.')->group(function () {
    # blog category
    Route::controller(BlogCategoryController::class)->prefix('blog/categories')->group(function () {
        Route::get('/', 'index')->name('blog.categories');
        Route::get('/create', 'create')->name('blog.categories.create');
        Route::post('/store', 'store')->name('blog.categories.store');
        Route::get('/edit/{id}', 'edit')->name('blog.categories.edit');
        Route::put('/update/{id}', 'update')->name('blog.categories.update');
        Route::delete('/destroy/{id}', 'destroy')->name('blog.categories.destroy');
    });

    # blog
    Route::controller(BlogController::class)->prefix('blogs')->group(function () {
        Route::get('/', 'index')->name('blogs');
        Route::get('/create', 'create')->name('blogs.create');
        Route::post('/store', 'store')->name('blogs.store');
        Route::get('/show/{id}', 'show')->name('blogs.show');
        Route::get('/edit/{id}', 'edit')->name('blogs.edit');
        Route::put('/update/{id}', 'update')->name('blogs.update');
        Route::put('/update-status/{id}', 'updateStatus')->name('blogs.update.status');
        Route::delete('/destroy/{id}', 'destroy')->name('blogs.destroy');
    });

    # mail configuration
    Route::controller(MailConfigurationController::class)->prefix('mail-config')->group(function () {
        Route::get('/', 'index')->name('smtp');
        Route::get('/create', 'create')->name('smtp.create');
        Route::post('/store', 'store')->name('smtp.store');
        Route::get('/show/{id}', 'show')->name('smtp.show');
        Route::get('/edit/{id}', 'edit')->name('smtp.edit');
        Route::put('/update/{id}', 'update')->name('smtp.update');
        Route::patch('/update-status/{id}', 'updateStatus')->name('smtp.update.status');
        Route::delete('/destroy/{id}', 'destroy')->name('smtp.destroy');
    });

    # contact
    Route::controller(ContactController::class)->prefix('contacts')->group(function () {
        Route::get('/', 'index')->name('contacts');
        Route::get('/create', 'create')->name('contacts.create');
        Route::post('/store', 'store')->name('contacts.store');
        Route::get('/show/{id}', 'show')->name('contacts.show');
        Route::get('/edit/{id}', 'edit')->name('contacts.edit');
        Route::put('/update/{id}', 'update')->name('contacts.update');
        Route::put('/update-status/{id}', 'updateStatus')->name('contacts.update.status');
        Route::delete('/destroy/{id}', 'destroy')->name('contacts.destroy');
    });
});


Route::get('/login', function () {
    return view('admin.modules.authentication.login');
})->name('admin.login');

Route::get('/forgot-password', function () {
    return view('admin.modules.authentication.forgot-password');
})->name('admin.forgot_password');

Route::get('/reset-password', function () {
    return view('admin.modules.authentication.reset-password');
})->name('admin.reset_password');

Route::get('/', function () {
    return view('admin.modules.dashboard.index');
})->name('admin.dashboard');

Route::get('/profile', function () {
    return view('admin.modules.profile.index');
})->name('admin.profile');

Route::get('/profile/edit', function () {
    return view('admin.modules.profile.edit');
})->name('admin.profile.edit');

Route::get('/change-password', function () {
    return view('admin.modules.profile.change-password');
})->name('admin.change_password');


Route::get('/contact-queries', function () {
    return view('admin.modules.contact-queries.index');
})->name('contact_queries');

Route::get('/contact-queries/show', function () {
    return view('admin.modules.contact-queries.show');
})->name('contact_queries.show');

Route::get('/social-links', function () {
    return view('admin.modules.social-links.create-or-edit');
})->name('social_links');

Route::get('/terms', function () {
    return view('admin.modules.terms.create-or-edit');
})->name('terms_and_conditions');

Route::get('/privacy-policies', function () {
    return view('admin.modules.privacy.create-or-edit');
})->name('privacy_policies');

Route::get('/faqs/categories', function () {
    return view('admin.modules.faqs.categories.index');
})->name('faq_categories');

Route::get('/faqs/categories/create', function () {
    return view('admin.modules.faqs.categories.create');
})->name('faq_categories.create');

Route::get('/faqs/categories/edit', function () {
    return view('admin.modules.faqs.categories.edit');
})->name('faq_categories.edit');

Route::get('/faqs', function () {
    return view('admin.modules.faqs.index');
})->name('faqs');

Route::get('/faqs/show', function () {
    return view('admin.modules.faqs.show');
})->name('faqs.show');

Route::get('/faqs/create', function () {
    return view('admin.modules.faqs.create');
})->name('faqs.create');

Route::get('/faqs/edit', function () {
    return view('admin.modules.faqs.edit');
})->name('faqs.edit');

Route::get('/newsletter/subscribers', function () {
    return view('admin.modules.newsletter.subscribers.index');
})->name('newsletter.subscribers');

Route::get('/newsletter/mails', function () {
    return view('admin.modules.newsletter.index');
})->name('newsletter.mails');

Route::get('/newsletter/show', function () {
    return view('admin.modules.newsletter.show');
})->name('newsletter.show');

Route::get('/newsletter/create', function () {
    return view('admin.modules.newsletter.create');
})->name('newsletter.create');

Route::get('/newsletter/edit', function () {
    return view('admin.modules.newsletter.edit');
})->name('newsletter.edit');

Route::get('/general-settings', [GeneralSetupController::class, 'index'])->name('general_settings');
