<?php

use App\Http\Livewire\Admin\Classes;
use App\Http\Livewire\Admin\Classrooms;
use App\Http\Livewire\Admin\Course;
use App\Http\Livewire\Admin\General;
use App\Http\Livewire\Admin\MyClasses;
use App\Http\Livewire\Admin\Notes;
use App\Http\Livewire\Admin\Parametres;
use App\Http\Livewire\Admin\Parents;
use App\Http\Livewire\Admin\Profil;
use App\Http\Livewire\Admin\Roles;
use App\Http\Livewire\Admin\Setting;
use App\Http\Livewire\Admin\Student;
use App\Http\Livewire\Admin\Subject;
use App\Http\Livewire\Admin\Teacher;
use App\Http\Livewire\Admin\TypeMatiere;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Logout;
use App\Http\Livewire\Student\Rating;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Login::class)->name('login');
Route::get('/home', Home::class)->name('home');
Route::get('/logout', Logout::class)->name('logout');
Route::get('/users', Users::class)->name('users');

Route::get('/roles', Roles::class)->name('role');
Route::get('/classes', Classes::class)->name('classe');
Route::get('/mes-classes', MyClasses::class)->name('myclasses');
Route::get('/teachers', Teacher::class)->name('teacher');
Route::get('/students', Student::class)->name('student');
Route::get('/parents', Parents::class)->name('parent');
Route::any('/general', Parametres::class)->name('general');
Route::get('/salles', Classrooms::class)->name('classroom');
Route::get('/matieres', Subject::class)->name('subject');
Route::get('/type-matieres', TypeMatiere::class)->name('subject-type');
Route::get('/cours', Course::class)->name('course');
Route::get('/note', Notes::class)->name('note');
Route::get('/mes-notes', Rating::class)->name('mymark');
Route::get('/profil', Profil::class)->name('profile');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
