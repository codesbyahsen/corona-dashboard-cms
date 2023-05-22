<?php

use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SystemSettings\EnvironmentSetupController;
use App\Http\Controllers\Admin\SystemSettings\GeneralSetupController;
use App\Http\Controllers\Admin\SystemSettings\MailConfigurationController;
use App\Http\Controllers\Admin\SystemSettings\PageController;
use App\Http\Controllers\Admin\SystemSettings\SocialLinkController;
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
        Route::patch('/update-status/{id}', 'updateStatus')->name('blogs.update.status');
        Route::delete('/destroy/{id}', 'destroy')->name('blogs.destroy');
    });

    # faq category
    Route::controller(FaqCategoryController::class)->prefix('faq-categories')->group(function () {
        Route::get('/', 'index')->name('faq_categories');
        Route::get('/create', 'create')->name('faq_categories.create');
        Route::post('/store', 'store')->name('faq_categories.store');
        Route::get('/show/{id}', 'show')->name('faq_categories.show');
        Route::get('/edit/{id}', 'edit')->name('faq_categories.edit');
        Route::put('/update/{id}', 'update')->name('faq_categories.update');
        Route::delete('/destroy/{id}', 'destroy')->name('faq_categories.destroy');
    });

    # faq
    Route::controller(FaqController::class)->prefix('faqs')->group(function () {
        Route::get('/', 'index')->name('faqs');
        Route::get('/create', 'create')->name('faqs.create');
        Route::post('/store', 'store')->name('faqs.store');
        Route::get('/show/{id}', 'show')->name('faqs.show');
        Route::get('/edit/{id}', 'edit')->name('faqs.edit');
        Route::put('/update/{id}', 'update')->name('faqs.update');
        Route::patch('/update-status/{id}', 'updateStatus')->name('faqs.update.status');
        Route::delete('/destroy/{id}', 'destroy')->name('faqs.destroy');
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

    # social link
    Route::controller(SocialLinkController::class)->prefix('social-links')->group(function () {
        Route::get('/', 'index')->name('social_links');
        Route::post('/store', 'store')->name('social_links.store');
        Route::put('/update/{id}', 'update')->name('social_links.update');
        Route::patch('/update-status/{id}', 'updateStatus')->name('social_links.update.status');
        Route::delete('/destroy/{id}', 'destroy')->name('social_links.destroy');
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

    # general setting
    Route::controller(GeneralSetupController::class)->prefix('general-settings')->group(function () {
        Route::get('/', 'index')->name('general_settings');
        Route::post('/', 'store')->name('general_settings.store');
    });

    # environment setting
    Route::controller(EnvironmentSetupController::class)->prefix('environment-settings')->group(function () {
        Route::get('/', 'index')->name('environment_settings');
        Route::post('/', 'store')->name('environment_settings.store');
    });

    # terms
    Route::controller(PageController::class)->prefix('terms')->group(function () {
        Route::get('/', 'terms')->name('terms');
        Route::post('/store', 'storeTerms')->name('terms.store');
    });

    # privacy policy
    Route::controller(PageController::class)->prefix('privacy-policy')->group(function () {
        Route::get('/', 'privacyPolicy')->name('privacy_policy');
        Route::post('/store', 'storePrivacyPolicy')->name('privacy_policy.store');
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
