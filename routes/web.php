<?php

 use Illuminate\Support\Facades\Route;
 use app\Models\Users;
 use app\Models\Comment;
 use App\Http\Controllers\GameController;
 use App\Http\Controllers\CategoryController;
 use App\Http\Controllers\PlatformController;
 use Illuminate\Http\Request;
 use App\Http\Controllers\AuthController;
 use App\Http\Controllers\CartController;
 use App\Http\Controllers\OrderController;

 // Route::get('/', function () {
 //     return view('welcome');
 // });
 // Route::get('/greeting', function () {
 //     return 'Hello World';
 // });


     //  Route::get('/', function () {
     //       return redirect()->route('games.index');
     //  });
     //  Route::resource('games', GameController::class);
     //  Route::resource('categories', CategoryController::class);
     //  Route::resource('platforms', PlatformController::class);





//      //نمایش فرم لاگین
//      Route::get('/login', function () {
//      return view('login');
//      })->name('login');

//      // پردازش لاگین
//      Route::post('/login', function (Request $request) {
//      $username = 'admin';
//      $password = '123456';

//      if ($request->username === $username && $request->password === $password) {
//           // ذخیره ورود موقت
//           session(['user_verified' => false]);
//           // شبیه‌سازی ارسال پیامک
//           $code = rand(1000, 9999);
//           session(['verify_code' => $code]);
//           // (در حالت واقعی باید کد را از طریق API پیامک ارسال کنید)
//           return redirect()->route('verify')->with('code', $code);
//      } else {
//           return back()->withErrors(['msg' => 'نام کاربری یا رمز عبور اشتباه است']);
//      }
//      });

//      // نمایش فرم تأیید کد
//      Route::get('/verify', function () {
//      return view('verify');
//      })->name('verify');

//      // بررسی کد وارد شده
//      Route::post('/verify', function (Request $request) {
//      if ($request->code == session('verify_code')) {
//           session(['user_verified' => true]);
//           return redirect()->route('games.index');
//      } else {
//           return back()->withErrors(['msg' => 'کد وارد شده اشتباه است']);
//      }
//      });

//      // صفحه اصلی بازی‌ها (بعد از ورود)
//      Route::get('/games', function () {
//      if (!session('user_verified')) {
//           return redirect()->route('login');
//      }
//      return view('games.index');
//      })->name('games.index');
     
     
//      Route::get('/', function () {
//     return redirect()->route('games.index');
//   });

//  Route::resource('games', GameController::class);

// صفحه لاگین
Route::get('/login', function () {
    return view('login');
})->name('login');

// پردازش لاگین
Route::post('/login', function (Request $request) {

    $username = 'admin';
    $password = '123456';

    if ($request->username === $username && $request->password === $password) {

        session(['user_verified' => false]);

        $code = rand(1000, 9999);
        session(['verify_code' => $code]);

        return redirect()->route('verify')->with('code', $code);
    }

    return back()->withErrors(['msg' => 'نام کاربری یا رمز عبور اشتباه است']);
})->name('login.do');

// نمایش صفحه وارد کردن کد
Route::get('/verify', function () {
    return view('verify');
})->name('verify');

// پردازش کد احراز هویت
Route::post('/verify', function (Request $request) {

    if ($request->code == session('verify_code')) {
        session(['user_verified' => true]);
        return redirect()->route('home');
    }

    return back()->withErrors(['msg' => 'کد وارد شده اشتباه است']);
})->name('verify.do');

// صفحه هوم فقط برای افراد لاگین‌شده
Route::get('/home', function () {
    if (!session('user_verified')) {
        return redirect()->route('login');
    }
    return view('home');
})->name('home');

// ریسورس بازی‌ها
Route::resource('games', GameController::class);

// روت اصلی
Route::get('/', function () {
    return redirect()->route('home');
});
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');



Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// سفارش‌ها
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

// ثبت سفارش
Route::post('/orders/add/{id}', [OrderController::class, 'store'])->name('orders.add');

Route::get('/admins/orders', [OrderController::class, 'index'])->name('admins.orders.index');

 

