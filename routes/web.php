<?php

use App\Http\Controllers\ThemeController;
use App\Http\Livewire\Admin\AddCityComponent;
use App\Http\Livewire\Admin\AddPathComponent;
use App\Http\Livewire\Admin\AddQuizComponent;
use App\Http\Livewire\Admin\AddSiteComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\CitiesConpoment;
use App\Http\Livewire\Admin\EditCityComponent;
use App\Http\Livewire\Admin\EditPathComponent;
use App\Http\Livewire\Admin\EditQuizComponent;
use App\Http\Livewire\Admin\PathComponent;
use App\Http\Livewire\Admin\ProfileComponent;
use App\Http\Livewire\Admin\QuizComponent;
use App\Http\Livewire\Admin\ShowCityComponent;
use App\Http\Livewire\Admin\ShowPathComponent;
use App\Http\Livewire\Admin\ShowQuizComponent;
use App\Http\Livewire\Admin\ShowSiteComponent;
use App\Http\Livewire\Admin\SiteEditComponent;
use App\Http\Livewire\Admin\SitesComponent;
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
    return redirect()->route('login');
})->name('home');

Route::middleware([ 'auth:sanctum',  config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin-dashboard');
    Route::get('/changeTheme/{theme}',[ThemeController::class,'changeTheme'])->name('change-theme');

    //CITY
    Route::get('/admin/cities',CitiesConpoment::class)->name('admin-cities');
    Route::get('/admin/cities/add',AddCityComponent::class)->name('admin-addcity');
    Route::get('/admin/cities/{idcity}/show',ShowCityComponent::class)->name('admin-showcity');
    Route::get('/admin/cities/{idcity}/edit',EditCityComponent::class)->name('admin-editcity');

    //SITE
    Route::get('/admin/sites',SitesComponent::class)->name('admin-sites');
    Route::get('/admin/sites/add/{city_id?}',AddSiteComponent::class)->name('admin-addsite');
    Route::get('/admin/sites/{site_id}/show',ShowSiteComponent::class)->name('admin-showsite');
    Route::get('/admin/sites/{site_id}/edit',SiteEditComponent::class)->name('admin-editsite');

    //PROFILE
    Route::get('/admin/profile',ProfileComponent::class)->name('admin-profile');

    //QUIZ
    Route::get('/admin/quiz',QuizComponent::class)->name('admin-quiz');
    Route::get('/admin/quiz/add',AddQuizComponent::class)->name('admin-addquiz');
    Route::get('/admin/quiz/{quiz_id}/show',ShowQuizComponent::class)->name('admin-showquiz');
    Route::get('/admin/quiz/{quiz_id}/edit',EditQuizComponent::class)->name('admin-editquiz');

    //PATH
    Route::get('/admin/path',PathComponent::class)->name('admin-path');
    Route::get('/admin/path/add',AddPathComponent::class)->name('admin-addpath');
    Route::get('/admin/path/{path_id}/show',ShowPathComponent::class)->name('admin-showpath');
    Route::get('/admin/path/{path_id}/edit',EditPathComponent::class)->name('admin-editpath');
});
