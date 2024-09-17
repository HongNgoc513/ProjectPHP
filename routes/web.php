<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Sanpham;
use Symfony\Component\VarDumper\Caster\DsPairStub;

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
Route::get('/son',[Sanpham::class,'son']);
Route::get('/phan',[Sanpham::class,'phan']);
Route::get('/nen',[Sanpham::class,'nen']);
Route::get('/taytrang',[Sanpham::class,'taytrang']);
Route::get('/suaruamat',[Sanpham::class,'suaruamat']);
Route::get('/taytebaochet',[Sanpham::class,'taytebaochet']);

Route::get('/',[Sanpham::class,'trangchu']);
Route::get('/shop',[Sanpham::class,'tatcasp']);
Route::get('/trangthemsp',[Sanpham::class,'trangsanpham']);
Route::post('/themsp',[Sanpham::class,'themsanpham']);
Route::get('/trangdanhsach',[Sanpham::class,'trangdanhsach']);
Route::get('/update/{Masanpham}',[Sanpham::class,'update']);
// Route::post('/update/{Masanpham}',[Sanpham::class,'update']);
Route::post('/update',[Sanpham::class,'save']);
Route::get('/delete/{Masanpham}',[Sanpham::class, 'delete']);

Route::get('/login',[Sanpham::class, 'login']);
Route::post('/login',[Sanpham::class, 'dangnhap'])->name('login');

Route::get('/loginadmin',[Sanpham::class, 'loginadmin']);
Route::post('/loginadmin',[Sanpham::class, 'dangnhapadmin'])->name('loginadmin');

Route::get('/redister',[Sanpham::class, 'redister']);
Route::post('/redister',[Sanpham::class, 'dangki'])->name('redister');


Route::get('/cart', [Sanpham::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{Masanpham}', [Sanpham::class, 'addToCart'])->name('addToCart');
Route::get('/thanhtoan', [Sanpham::class, 'thanhtoan']);
Route::post('/vnpay', [Sanpham::class, 'vnpay']);
Route::get('/thongbaodathang',[Sanpham::class,'thongbaodathang']);
// Route::get('/tatcasp',[Sanpham::class,'tatcasp']);
?>
