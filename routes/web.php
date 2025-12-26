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
 use App\Http\Controllers\PaymentController;
 use Illuminate\Support\Facades\Mail;
 use App\Models\User;



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



 





/*
|--------------------------------------------------------------------------
| Login + Email Verification
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| صفحه لاگین
|--------------------------------------------------------------------------
*/
Route::get('/login', fn () => view('login'))->name('login');

Route::post('/login', function (Request $request) {

    if ($request->username === 'admin' && $request->password === '123456') {

        session([
            'step_login_ok' => true,
            'logged_in' => false
        ]);

        return redirect()->route('email.verify');
    }

    return back()->withErrors(['msg' => 'نام کاربری یا رمز عبور اشتباه است']);
})->name('login.do');

/*
|--------------------------------------------------------------------------
| وارد کردن ایمیل
|--------------------------------------------------------------------------
*/
Route::get('/email-verify', function () {
    if (!session('step_login_ok')) {
        return redirect()->route('login');
    }
    return view('email_verify');
})->name('email.verify');

/*
|--------------------------------------------------------------------------
| ارسال کد ایمیل
|--------------------------------------------------------------------------
*/
Route::post('/email-send', function (Request $request) {

    if (!session('step_login_ok')) {
        return redirect()->route('login');
    }

    $request->validate([
        'email' => 'required|email'
    ]);

    $code = rand(1000, 9999);

    session([
        'email_code' => $code,
        'email_address' => $request->email
    ]);

    Mail::raw("کد احراز هویت شما: $code", function ($message) use ($request) {
        $message->to($request->email)
                ->subject('کد ورود');
    });

    return redirect()->route('email.check');
})->name('email.send');

/*
|--------------------------------------------------------------------------
| صفحه وارد کردن کد ایمیل
|--------------------------------------------------------------------------
*/
Route::get('/email-check', function () {
    if (!session('email_code')) {
        return redirect()->route('email.verify');
    }
    return view('email_check');
})->name('email.check');

/*
|--------------------------------------------------------------------------
| بررسی کد ایمیل و ورود
|--------------------------------------------------------------------------
*/
Route::post('/email-check', function (Request $request) {

    if ((int)$request->code === session('email_code')) {

        // کاربر فیک
        $user = User::firstOrCreate(
            ['id' => 1],
            ['name' => 'admin', 'email' => session('email_address'), 'password' => bcrypt('123456')]
        );

        // تنظیم بالانس اولیه
        if (!$user->balance) {
            $user->balance = 150000;
            $user->save();
        }

        session([
            'logged_in' => true,
            'user_verified' => true,
            'user_id' => $user->id
        ]);

        session()->forget(['email_code', 'step_login_ok']);

        return redirect()->route('home');
    }

    return back()->withErrors(['msg' => 'کد وارد شده اشتباه است']);
})->name('email.check.do');

/*
|--------------------------------------------------------------------------
| خانه / داشبورد
|--------------------------------------------------------------------------
*/
Route::get('/home', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }

    $user = \App\Models\User::find(session('user_id'));

    return view('home', compact('user'));
})->name('home');

Route::get('/', fn () => redirect()->route('home'));

/*
|--------------------------------------------------------------------------
| Games CRUD
|--------------------------------------------------------------------------
*/
Route::resource('games', \App\Http\Controllers\GameController::class);

/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/complete/{order}', [CartController::class, 'complete'])->name('cart.complete');
});

/*
|--------------------------------------------------------------------------
| Orders Routes
|--------------------------------------------------------------------------
*/
Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/add/{id}', [OrderController::class, 'store'])->name('orders.add');
    Route::delete('/delete/{id}', [OrderController::class, 'destroy'])->name('orders.delete');
    Route::post('/complete/{id}', [OrderController::class, 'complete'])->name('orders.complete');
});

/*
|--------------------------------------------------------------------------
| Admin Orders
|--------------------------------------------------------------------------
*/
Route::get('/admins/orders', [OrderController::class, 'index'])
    ->name('admins.orders.index');

/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
*/
Route::prefix('payment')->group(function () {
    Route::get('/topup', [PaymentController::class, 'showTopUpForm'])->name('payment.topup');
    Route::post('/topup', [PaymentController::class, 'topUp'])->name('payment.topup.do');
    Route::get('/callback', [PaymentController::class, 'callback'])->name('payment.callback');
});

// پرداخت سفارش
Route::get('/pay/{order}', [PaymentController::class, 'pay'])->name('pay');
/*
|--------------------------------------------------------------------------
| Balanc Charging
|--------------------------------------------------------------------------
*/
// نمایش فرم شارژ کیف پول
Route::get('/payment/topup', [PaymentController::class, 'showTopUpForm'])->name('payment.topup');

// پردازش شارژ کیف پول
Route::post('/payment/topup', [PaymentController::class, 'topUp'])->name('payment.topup.do');






