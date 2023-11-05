<?php


use App\Http\Livewire\Admin\AdminAddMaterialComponent;
use App\Http\Livewire\Admin\AdminAddNewUserComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminBalanceComponent;
use App\Http\Livewire\Admin\AdminBuyersComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditMaterialComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminMaterialComponent;
use App\Http\Livewire\Admin\AdminMaterialDetailComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminProductDetailComponent;
use App\Http\Livewire\Admin\AdminReturnItemComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\Admin\AdminSupplierComponent;
use App\Http\Livewire\Admin\AdminCartComponent;
use App\Http\Livewire\Admin\AdminCheckoutComponent;
use App\Http\Livewire\Admin\AdminGenerateOrderComponent;
use App\Http\Livewire\Admin\AdminOrderPdfComponent;
use App\Http\Livewire\Admin\AdminOrderProcessComponent;
use App\Http\Livewire\Admin\AdminOrderDispatchComponent;
use App\Http\Livewire\Admin\AdminOrderDeliveredComponent;
use App\Http\Livewire\Admin\AdminOrderCancelComponent;
use App\Http\Livewire\Admin\AdminPendingOrderComponent;

use App\Http\Livewire\Admin\AdminSupplierDetailComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\AdminGatePassComponent;
use App\Http\Livewire\Admin\AdminPrintGatePassComponent;

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
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
   Route::get('/admin/pdf/{id}',[AdminDashboardComponent::class,'hicpdf'])->name('hic_pdf');
   Route::get('/admin/add/product',AdminAddProductComponent::class)->name('addproduct');
    Route::get('/admin/add/user',AdminAddNewUserComponent::class)->name('adduser');
    Route::get('/admin/order', AdminOrderComponent::class)->name('orders');
    Route::get('/admin/all/products',AdminProductComponent::class)->name('products');
    Route::get('/admin/invoice/product/{id}',[AdminProductComponent::class,'productInvoice'])->name('invoice');
    Route::get('/admin/all/products/invoice',[AdminProductComponent::class,'allProductInvoice'])->name('allproduct_invoices');
    Route::get('/admin/balance/product/wise', AdminBalanceComponent::class)->name('balance');
    Route::get('/admin/buyers', AdminBuyersComponent::class)->name('buyers');
    Route::get('/admin/buyer/pdf/{id}', [AdminBuyersComponent::class,'buyerBalancePdf'])->name('buyer-detail-pdf');
    Route::get('/admin/supplier', AdminSupplierComponent::class)->name('supplier');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('categories');
    Route::get('/admin/product/{id}',AdminProductDetailComponent::class)->name('admin.product-detail');
    Route::get('/Aadmin/generate/order',AdminGenerateOrderComponent::class)->name('generateorder');
    Route::get('/admin/cart',AdminCartComponent::class)->name('cart');
    Route::get('/admin/checkout',AdminCheckoutComponent::class)->name('checkout');
    //Route::get('/admin/addtocart/{id}/{price}/{}',[AdminCartComponent::class,'store'])->name('allproduct_invoices');
    Route::get('/admin/invoice/order/{id}',[AdminOrderComponent::class,'orderInvoice'])->name('orderinvoice');
    Route::get('/admin/process/orders',AdminOrderProcessComponent::class)->name('processorders');
    Route::get('/admin/dispatch/orders',AdminOrderDispatchComponent::class)->name('dispatchorders');
    Route::get('/admin/delivered/orders',AdminOrderDeliveredComponent::class)->name('deliveredorders');
    Route::get('/admin/cancel/orders',AdminOrderCancelComponent::class)->name('cancelorders');
    Route::get('/admin/pending/orders',AdminPendingOrderComponent::class)->name('pendingorders');
    Route::get('/admin/gatepass/order/{id}',AdminGatePassComponent::class)->name('gatepass');
    Route::get('/admin/gatepass/{order_id}',[AdminPrintGatePassComponent::class,'printGatePass'])->name('gate_pass_print');
    Route::get('admin/add/material',AdminAddMaterialComponent::class)->name('addmaterial');
    Route::get('admin/all/materials',AdminMaterialComponent::class)->name('allmaterials');
    Route::get('/admin/all/material/excelsheet',[AdminMaterialComponent::class,'allMaterialSheet'])->name('allmaterial_excelsheet');
    Route::get('/admin/material/{id}',AdminMaterialDetailComponent::class)->name('material-detail');
    Route::get('/admin/supplier/detail/{id}',AdminSupplierDetailComponent::class)->name('supplier-detail');
    Route::get('/admin/supplier/pdf/{id}',[AdminSupplierComponent::class,'supplierBalancePdf'])->name('supplier-detail-pdf');
    Route::get('/admin/update/material/{id}',AdminEditMaterialComponent::class)->name('editmaterial');
    Route::get('/admin/edit/product/{id}',AdminEditProductComponent::class)->name('admin.editproduct');
    Route::get('/admin/retrun/item',AdminReturnItemComponent::class)->name('admin.retrunItem');
    Route::get('/admin/setting',AdminSettingComponent::class)->name('setting');
   // Route::get('/admin/pdf/order/{id}',[AdminOrderPdfComponent::class,'generatePDF'])->name('orderpdf');


});
