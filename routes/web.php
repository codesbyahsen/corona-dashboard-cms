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
