<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminDashboardController;
use App\Http\Controllers\Auth\CustomerAuthController;


// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop.index');
Route::get('/shop/{id}', [HomeController::class, 'showProduct'])->name('shop.show');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/categories', [HomeController::class, 'categories'])->name('categories');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/faqs', [HomeController::class, 'faqs'])->name('faqs');

// Product Filter
Route::post('/filter-products', [HomeController::class, 'filter'])->name('filter.products');

// Cart routes (guest + authenticated customer)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::get('/cart/total', [CartController::class, 'getCartTotal'])->name('cart.total');


// Customer Register + Login
Route::middleware('customer.guest')->group(function () {
    Route::get('/customer/register', [CustomerAuthController::class, 'showRegisterForm'])->name('customer.register');
    Route::post('/customer/register-save', [CustomerAuthController::class, 'register'])->name('customer.register-save');

    Route::get('/customer/login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
    Route::post('/customer/login', [CustomerAuthController::class, 'login'])->name('customer.login.submit');
});

// Customer Dashboard (only after login)
Route::middleware('auth:customer')->group(function () {
    Route::get('/dashboard', [CustomerAuthController::class, 'dashboard'])->name('dashboard');

    // Wishlist
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::get('/wishlist/count', [WishlistController::class, 'getCount'])->name('wishlist.count');

    // Checkout + Orders
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

    // customer logout
    Route::get('/logout', [CustomerAuthController::class, 'logout'])->name('customerlogout');

});






// Admin order management (require admin role)
Route::middleware(['auth', 'role:admin|super-admin'])->group(function () {
    Route::get('/admin/orders/{id}', [OrderController::class, 'adminShow'])->name('admin.orders.show');
    Route::put('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
});

// 🔹 Admin Login Routes 
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');


// Route::get('/dashboard', function () {
//     if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('super-admin'))) {
//         return redirect()->route('admin.dashboard');
//     }
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('admin')->middleware('adminauth')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::delete('/thumbnail/delete', [ProductController::class, 'deleteThumbnail'])->name('admin.delete');


    Route::get('/orders', function () {
        $orders = \App\Models\Order::with('user','customer')->latest()->paginate(20);
        return view('admin.orders', compact('orders'));
    })->name('admin.orders');

    Route::get('customerordersdetails',[AdminDashboardController::class,'customerdetails'])->name('admin.customerordersdetails');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Logout
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});



require __DIR__.'/auth.php';
