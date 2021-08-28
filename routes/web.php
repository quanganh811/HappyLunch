<?php
require __DIR__ . '/auth.php';

use App\Http\Controllers\MerchantController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ListItemController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\HistoryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ListMerchantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpendController;
use App\Models\Spend;
use App\Http\Controllers\ShareController;
use PhpParser\Node\Stmt\Return_;

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
Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/', function () {
        return view('home');
    })->name('home');
    
    //Transaction
    Route::resource('transaction', TransactionController::class);
    Route::delete('myTransactionsDeleteAll', [TransactionController::class, 'deleteAll']);

    //Merchant
    Route::resource('merchant', MerchantController::class);
    Route::delete('mymerchantsDeleteAll', [MerchantController::class, 'deleteAll']);
    
    //Item
    Route::get('item/{id}/index', [ItemController::class, 'index']);
    Route::get('item/{id}/create', [ItemController::class, 'create']);
    Route::resource('item', ItemController::class);
    
    // Category
    Route::resource('category', CategoryController::class)->middleware(['auth']);
    Route::get('category-create', function () {
        return view('admin.category.create');
    });
    
    //app
    Route::resource('app', AppController::class)->middleware(['auth']);
    Route::delete('MyAppsDeleteAll', [AppController::class, 'deleteAll']);
    
    // Order
    Route::resource('order', OrderController::class);
    
    //User
    // Route::post('info', [UserController::class, 'editImage']);
    Route::resource('info', UserController::class);
    Route::get('order/{id}/index', [OrderController::class, 'index']);
    Route::delete('order/{order_id}/transaction/{transaction_id}', [OrderController::class, 'destroyTransaction']);
    Route::resource('user/spend', SpendController::class);
    Route::resource('user/history', HistoryController::class);
    Route::get('/spend/detail', function() {
        return view('user.spend-detail');
    });
    Route::get('/user/change-password', function() {
        return view('user.change-password');
    });
    
    //item-merchant
    Route::get('item-merchant/index', [TransactionController::class, 'index']);
    Route::post('item-merchant/store', [TransactionController::class, 'store']);
    // Route::post('item-merchant/index', [TransactionController::class, 'index']);
    Route::resource('item-merchant', TransactionController::class); 

    //share-money
    Route::get('share/{id}', [ShareController::class, 'shareMoney']);
    
    Route::get('/test', function () {
        return view('order.sharetest');
    });
    Route::post('/change-password',  [UserController::class,'changePassword'])->name('profile.change.password');

    

});
