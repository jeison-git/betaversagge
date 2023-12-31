<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CommerceController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AllyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;

use App\Http\Livewire\ShoppingCart;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\PaymentOrder;
use App\Http\Livewire\VipClient;
use App\Http\Livewire\VipAlly;
use App\Http\Controllers\WebhooksController;
use App\Http\Livewire\VipCommerce;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Livewire\CreateJobapplication;
use App\Http\Livewire\EditJobapplication;
use App\Http\Livewire\ShowEmployments;
use App\Http\Livewire\StaticBanner;
use App\Http\Controllers\GoogleSocialiteController;

/* 
Route::get('login/google', [GoogleSocialiteController::class, 'redirectToGoogle']);

Route::get('login/google/callback', [GoogleSocialiteController::class, 'handleCallback']); */

/////////////////////////////////////////////////////////////////////////////////////////

Route::get('/', WelcomeController::class)->name('versagge');/* vista principal */

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');/* Categorias de los productos */

Route::get('search', SearchController::class)->name('search');/* componente de busqueda de productos */

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');/* Vista de todos los productos */

Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');/* Componente Shopping card */

Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');/* contacto */

/* Route::get('static-banner', StaticBanner::class)->name('static-banner'); */

////////////////////////* Sucripciones *//////////////////////////////////////////////////

Route::post('/payments/pay', [PaymentController::class, 'pay'])->name('pay');

Route::get('/payments/approval', [PaymentController::class, 'approval'])->name('approval');

Route::get('/payments/cancelled', [PaymentController::class, 'cancelled'])->name('cancelled');

Route::prefix('subscribe')
    ->name('subscribe.')
    ->group(function () {
        Route::get('/', [SubscriptionController::class, 'show'])->name('show');

        Route::post('/', [SubscriptionController::class, 'store'])->name('store');

        Route::get('/approval', [SubscriptionController::class, 'approval'])->name('approval');

        Route::get('/cancelled', [SubscriptionController::class, 'cancelled'])->name('cancelled');
    });

////////////////////Legales//////////////////////////////////////////////////////////////////////////////

Route::view('about', 'about')->name('about');

Route::view('policy', 'policy')->name('policy');

Route::view('terms', 'terms')->name('terms');

/////////////////////Solicitud de Empleos Vip  ////////////////////////////////////////////////////////////////////

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('job-application', ShowEmployments::class)->name('job-application');/* Solicitud de empleo */

    Route::get('job-application/create', CreateJobapplication::class)->name('applications.create');

    Route::get('job-application/{application}/edit', EditJobapplication::class)->name('applications.edit');

    Route::post('job-application/{application}/files', [EmploymentController::class, 'files'])->name('applications.files');

    Route::get('job-applications/{application}/message', [EditJobapplication::class, 'message'])->name('applications.message');
});

/////////////Grupo de vistas donde es necesario que el usuario este registrado, logeado, verificado y afiliado///////////////////////////////////

Route::middleware(['auth', 'verified', 'unsubscribed'])->group(function () {

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');/* lLista de ordenes del usuario */

    Route::get('orders/create', CreateOrder::class)->name('orders.create');/* En usurio puede crear una orden o pedido */

    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');/* Muesta los detalles de la orden  */

    Route::get('orders/{order}/payment', PaymentOrder::class)->name('orders.payment');  /* Metodo de pago del pedido realizado */

    Route::get('orders/{order}/pay', [OrderController::class, 'pay'])->name('orders.pay');/* Metodo de pago del pedido realizado */

    Route::post('webhooks', WebhooksController::class);

    ////////////////////* Vistas Vip Cliente, Aliados y Comercios *///////////////////////////////////////////////////////////////

    Route::get('vip-client', VipClient::class)->name('vip-client');

    Route::get('vip-ally', VipAlly::class)->name('vip-ally');

    Route::get('vip-commerce', VipCommerce::class)->name('vip-commerce');

    Route::get('claims/{claim}', [AllyController::class, 'show'])->name('claims.show');/* Vistas de los Aliados comerciales */

    Route::get('commerces/{claim}', [CommerceController::class, 'show'])->name('commerces.show');/* Vistas de los  comercios Vip*/
});
