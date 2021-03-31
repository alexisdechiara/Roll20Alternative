<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
})->name('home');

Route::prefix('create')->group(function () {
    Route::get('/', [GameController::class, 'create'])->name('create');
    Route::post('/new', [GameController::class, 'createParty'])->name('createParty');
    Route::post('/join', [GameController::class, 'joinParty'])->name('joinParty');
});

Route::prefix('game')->group(function () {
    Route::get('/{slug}', [GameController::class, 'game'])->name('game');
    Route::get('/userInfo/{id}/{pid}', [GameController::class, 'userInfo'])->name('userInfo');
    Route::get('/getChat/{party_id}/{n}', [GameController::class, 'getChat'])->name('getChat');
    Route::get('/getBoard/{party_id}', [GameController::class, 'getBoard'])->name('getBoard');
    Route::post('/chat', [GameController::class, 'chatParty'])->name('chatParty');
    Route::post('/disband', [GameController::class, 'disbandParty'])->name('disbandParty');
    Route::post('/leave', [GameController::class, 'leaveParty'])->name('leaveParty');

    Route::post('/rollDice', [GameController::class, 'rollDice'])->name('rollDice');
    Route::post('/saveBoard', [GameController::class, 'saveBoard'])->name('saveBoard');
    Route::post('/moveToken', [GameController::class, 'moveToken'])->name('moveToken');
});

Route::prefix('characters')->group(function () {
    Route::get('/create', [CharactersController::class, 'create'])->name('createCharacter');
    Route::get('/edit/{id}', [CharactersController::class, 'edit'])->name('editCharacterID');
    Route::get('/show/{id}', [CharactersController::class, 'show'])->name('showCharacterID');
    Route::get('/help', [CharactersController::class, 'help'])->name('helpCharacter');
    Route::get('/', [CharactersController::class, 'list'])->name('listCharacter');
    Route::get('/{slug}', [CharactersController::class, 'listPlayer'])->name('listPlayerCharacter');
    Route::get('/addStuff/{id}', [CharactersController::class, 'addStuff'])->name('addStuff');
    Route::get('/deleteStuff/{id}', [CharactersController::class, 'deleteStuff'])->name('deleteStuff');

    Route::post('new', [CharactersController::class, 'newCharacter'])->name('newCharacter');
    Route::post('edit', [CharactersController::class, 'editCharacter'])->name('editCharacter');
    Route::post('delete', [CharactersController::class, 'deleteCharacter'])->name('deleteCharacter');
    Route::post('addStuffRequest', [CharactersController::class, 'addStuffRequest'])->name('addStuffRequest');
    Route::post('deleteStuffRequest', [CharactersController::class, 'deleteStuffRequest'])->name('deleteStuffRequest');
    Route::post('export', [CharactersController::class, 'exportCharacter'])->name('exportCharacter');
    Route::post('import', [CharactersController::class, 'importCharacter'])->name('importCharacter');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'home'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('dashboard_users');
    Route::get('/parties', [AdminController::class, 'parties'])->name('dashboard_parties');
    Route::get('/characters', [AdminController::class, 'characters'])->name('dashboard_characters');
    Route::get('/migrations', [AdminController::class, 'migrations'])->name('dashboard_migrations');
});

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'home'])->name('profile');
    Route::post('/edit', [ProfileController::class, 'editProfile'])->name('editProfile');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/join', [GameController::class, 'join'])->name('join');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'fr'])) {
        abort(400);
    }
    session()->put('locale', $locale);
    return back();
})->name('lang');

Auth::routes();
