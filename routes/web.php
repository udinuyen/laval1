<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\AdminNewsController;


use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use App\Http\Middleware\CheckAge;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FormController;
use App\Container;
use App\Services\TwitterService;
use App\Interfaces\SocialMediaServiceInterface;
use App\Helpers\ExternalApiHelper;

use 	Illuminate\Routing\Redirector;
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

Route::get('post/create', [PostController::class,'create']);

Route::post('post',  [PostController::class,'store']);

Route::get('/image', function() {
    return response()->file('txt.doc');
});
Route::get('/downloadd2', function() {
    return response()->download('../resources/views/txt.doc','hihi')->deleteFileAfterSend();
});
Route::get('/bbb12', function() {
    return redirect()->route('profile', ['id' => 100]);
}); 

Route::get('/profile/{id}', function($id) {
    return 'Profile '. $id;
})->name('profile');
Route::get('homem', function () {
    return response('<h1>helloworld</h1>', 200)
                ->header('Content-Type', 'text/plain')
                ->cookie('name', 'value',1);

});
Route::get('/dl', function() {
    return view('child');
});
Route::get('/333', function() {
    return [1, 2, 3];
});
// Route::put('/post', function() {
//     return 'Posted';
// });
Route::get('/qqc', function () {
    return view('list');
});

Route::get('/ccq',[FormController::class, 'show']);

// Route::post('/post', 'FormController@post');

Route::get('/admin/post', function (Request $request) {
    if ($request->is('admin/*')) {
        return 'Request path matches with "admin/*" pattern';
    }
});
Route::get('/foo/bar', function (Request $request) {
    return $request->path();
});
Route::get('/postt', function () {
    return 'Body post';
})->middleware('role:editor');

Route::get('api/users/{user}', function (App\Models\User $user) {
    return $user->email;
});
Route::get('/register', function(){
    return view('register');
});
Route::get('/admin', function () {
    return view('admin/index');
})->middleware('checklogin');
Route::prefix('adminm')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
    });
});



Route::domain('{account}.myapp.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});







Route::get('/get', function () {
    return view('welcome');
});
Route::get('/get2', function () {
    return view('home', ['name' => 'Pham Nhan']);
});

Route::get('/user/{name?}', function (?string $name = 'John') {
    return $name;
});

Route::get('/user/{id}/{name}', function (string $id, string $name) {
    return $id . $name;
   
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/bum', function (Request $request) {
    $name = $request->input(12312321);
    print_r ($name);
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/num', function () {
    return [1, 2, 3];
});
Route::get('/home', function () {
    return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain');
});
Route::get('/user1/{user}', function (User $user) {
    return $user;
});

Route::get('/blade', function () {
    return redirect()->away('https://www.google.com');

});

Route::get('/cache', function () {
    return Cache::getname();
});

Route::get('age/{agee}', function ($agee) {
    return $agee;
})->middleware('checklogin');

Route::get('/xxx', function() {
    return view('child');
});


Route::get('/cache1', function () {
    return redirect()->away('https://www.google.com');
});

Route::get('/homee', function() {
    return view('home', ['name' => 'Pham Nhan']);
});

Route::get('/foo/bar', function (Request $request) {
    return $request->ip();
});

Route::get('/admin/post', function (Request $request) {
    if ($request->is('admin/*')) {
        return 'Request path matches with "admi222n/*" pattern';
    }
});
Route::get('/http', function (Request $request) {
    echo 'Current method HTTP: ' . $request->method() . '
';
    
    if ($request->isMethod('get')) {
        echo 'This is GET method HTTP';
    }
});


Route::get('/fost', [FormController::class ,'show']);
// Route::post('/post', [FormController::class ,'post']);



Route::get('ome', function () {
    return response()->streamDownload(function() {
        echo 'Pham Nhan';
    }, 'users.txt');
});

Route::get('/session', function() {
    session(['name' => 'Pham Nhan']);
});

Route::get('laydulieu', function () {
    $data = DB::table('tb_book')->get();
    $burgers = DB::select('select * from tb_book');
    // print_r($data[0]);
    // print_r($data[1]);

    print_r($burgers[2]);
    foreach ($burgers as $user) {
        echo $user->name;
    }

});

Route::get('/apppp', function () {
    dd(app()); // Dòng code để kiểm chứng việc đã bind thành công 
});

Route::get('/testuser', function(){
    
    dd(app()->make('namehim')->foo());
});

Route::get('/zxc', function () {
    dd(app()->make(Illuminate\Contracts\Http\Kernel::class));
});

Route::get('/binda', function(){
   dd(app()->make('namehim'));
});
Route::get('/container', function () {
    $container = new Container();

    $container->bind('name', 'Farhan Hasin Chowdhury');

    dd($container->make('name'));

    // Farhan Hasin Chowdhury
});

Route::get('/nema', function () {
    $container = new Container;

    $container->bind('ApiKey', 'very-secret-api-key');

    $container->bind(SocialMediaServiceInterface::class, function() use ($container){
        return new App\Services\TwitterService($container->make('ApiKey'));
    });

    dd($container->make(SocialMediaServiceInterface::class));

    // App\Services\TwitterService {#269 ▼
    //     #apiKey: "very-secret-api-key"
    // }

});
Route::view('/welcome', 'welcome');

Route::get('/xxx/{id?}', function($id = 11) {
    return "This is post  of user $id"; 
});
Route::get('zzz/{id?}', function($id = 3) {
    if ($id == null) {
        return 'List users';
    }
    
    return "User $id";
});
Route::get('/admin/news/create', [AdminNewsController::class,'create']);

Route::get('/admin/create', [PostController::class,'showform']);
Route::post('/admin/create', [PostController::class,'showform']);

Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '.*');



Route::fallback(function (Request $request) {
    return dd([
        $request->url(),
        $request->fullUrl()
    ]);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
