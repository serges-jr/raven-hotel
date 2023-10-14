<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ChambreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenageController;
use App\Http\Controllers\RequeteController;
use App\Http\Controllers\ReserverController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// login admin

Route::prefix('/admin')->controller(AdminLoginController::class)->group(function() {
    Route::get('/','login')->name('admin.login');
    Route::post('/','tologin');
});
// Adminnistration

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/delete', [LoginController::class, 'logout'])->name('logout');

    // Category
    Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::get('/categorys', [\App\Http\Controllers\CategoryController::class, 'read']);
    Route::post('/storeCategory', [\App\Http\Controllers\CategoryController::class, 'store'])->name('storeCategory');
    Route::get('/editCategory/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('editCategory');
    Route::post('/editCategory/{id}', [\App\Http\Controllers\CategoryController::class, 'edite']);
    Route::delete('/deleteCategory/{id}', [\App\Http\Controllers\CategoryController::class, 'delete']);

    // Equipment

    Route::get('/equipment', [\App\Http\Controllers\EquipmentController::class, 'index'])->name('equipment');
    Route::post('/storeEquipment', [\App\Http\Controllers\EquipmentController::class, 'storeEquipment'])->name('storeEquipment');
    Route::get('/editEquipment/{id}', [\App\Http\Controllers\EquipmentController::class, 'edit'])->name('editEquipment');
    Route::post('/editEquipment/{id}', [\App\Http\Controllers\EquipmentController::class, 'post']);
    Route::get('/activeEquipment/{id}', [EquipmentController::class, 'active']);

    //Features

    Route::get('/feature', [\App\Http\Controllers\FeatureController::class, 'index'])->name('feature');
    Route::post('/storeFeature', [\App\Http\Controllers\FeatureController::class, 'store']);
    Route::get('/editFeature/{id}', [FeatureController::class, 'edit'])->name('editFeature');

    // users

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/storeUser', [UserController::class, 'storeUser']);
    Route::get('/addImageUser/{id}', [UserController::class, 'addImage'])->name('addImageUser');
    Route::post('/addImageUser/{id}', [UserController::class, 'postImage']);
    Route::get('/editUser/{id}', [UserController::class, 'edit']);
    Route::post('/editUser/{id}', [UserController::class, 'edite']);
    Route::get('/activeUser/{id}', [UserController::class, 'active']);

    // requêtes
    Route::get('/requetes', [RequeteController::class, 'index'])->name('requetes');
    // commentaires

    Route::get('/comments', [CommentController::class, 'index'])->name('comments');
    Route::get('/editComment/{id}', [CommentController::class, 'edit']);
    Route::get('/activeComment/{id}', [CommentController::class, 'active']);
    Route::post('/editComment/{id}', [CommentController::class, 'edite']);

    // chambres
    Route::get('/room', [ChambreController::class, 'index'])->name('room.index');
    Route::post('/StoreRoom', [ChambreController::class, 'store']);
    Route::get('editRoom/{id}', [ChambreController::class, 'show']);
    Route::get('/addImageRoom/{id}', [ChambreController::class, 'addImage'])->name('addImageRoom');
    Route::post('/addImageRoom/{id}', [ChambreController::class, 'postImage']);

    //reservations

    Route::get('/reserver', [ReserverController::class, 'index'])->name('reserver');
    Route::post('/SearchReserver', [ReserverController::class, 'search']);
    Route::get('/PayerReserver/{id}', [ReserverController::class, 'payer']);
    Route::get('/addReservation',[ReserverController::class,'add'])->name('add-book');
    Route::post('/addReservation',[ReserverController::class,'addBooking']);
    Route::get('/addReservation/{id}',[ReserverController::class,'addRoom']);
    Route::get('/reserver/{id}', [ReserverController::class, 'infoBook']);
    Route::get('/reservation-{id}',[ReserverController::class, 'valider']);

    // Menage
    Route::get('/menage', [MenageController::class, 'index'])->name('menage');
    Route::get('/menage/{id}', [MenageController::class, 'store']);
});

// clientelle

Route::prefix('/')->group(function () {
    Route::get('/', [HotelController::class, 'index'])->name('hotel');
    Route::post('/book', [HotelController::class, 'filter'])->name('book');
    Route::post('/register', [HotelController::class, 'store'])->name('register');
    Route::get('/Login', [LoginController::class, 'login'])->middleware('guest')->name('login');
    Route::post('/Login', [LoginController::class, 'tologin'])->name('Login');
    Route::post('/delete', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
    ////profile Users
    Route::get('/profile', [LoginController::class, 'profile'])->middleware('auth')->name('profile');
    Route::post('/profile/{id}', [LoginController::class, 'editProfile'])->middleware('auth')->name('editprofile');
    Route::post('/profil/{id}', [LoginController::class, 'editpassword'])->middleware('auth')->name('editpassword');
    Route::delete('/supprimer', [LoginController::class, 'supprimer'])->middleware('auth')->name('supprimer');


    Route::get('/sign', [LoginController::class, 'sign'])->middleware('guest')->name('sign');
    Route::post('/sign', [LoginController::class, 'store']);
    Route::get('/about', [HotelController::class, 'about'])->name('about');
    Route::get('/service', [HotelController::class, 'service'])->name('service');
    Route::get('/chambres', [HotelController::class, 'chambres'])->name('chambres');
    Route::get('/chambre/{id}', [HotelController::class, 'chambre'])->name('chambre');
    Route::post('/chambre/{id}', [HotelController::class, 'storeComment'])->name('chambre');
    Route::get('/contact', [HotelController::class, 'comment'])->name('contact');
    Route::post('/contact', [HotelController::class, 'storeRequete']);
    Route::get('/reservation/{id}', [HotelController::class, 'bookOne'])->name('bookOne');
    Route::post('/reservation/{id}', [HotelController::class, 'reserver']);
    Route::get('/team', [HotelController::class, 'team'])->name('team');
    Route::get('/temoignage', [HotelController::class, 'temoin'])->name('temoin');
    Route::get('/bookRoom/{id}-{user}', [ReserverController::class, 'store']);
});


Route::resource('test', TestController::class);
