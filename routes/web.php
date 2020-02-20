<?php

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
use App\Models\User;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello_world', function(){
    $posts = factory(Post::class, 5)->make();
    // dd($posts);
    return view('hello_world', ['posts' => $posts]);
})->name('home.hello_world');

Route::group([
    'prefix' => 'users',
    'as' => 'users.'
], function(){
    Route::post('store', function(){
        $request = request()->all();
        
        $data = Arr::except($request, ['_token']);

        $user = User::create($data);
        // dd($data);
        return redirect()->route('users.index');
    })->name('store');

    Route::get('show/{user}', function($user){
        $user = User::find($user);
        // dd($user);
        return view('users.show', [
            'user_data' => $user,
        ]);
    })->name('show');

    Route::get('/', function() {
        $user = User::all();
        return view('users.index', [
            'users' => $user,
        ]);
    })->name('index');

    Route::get('create', function() {
        return view('users.create');
    })->name('create');

    Route::post('delete', function() {
        $request = request()->all();
        // dd($request);
        $user = User::find($request['id']);
        // dd($user);
        $user->delete();
        // User::destroy($request['id']);

        return redirect()->route('users.index');
    })->name('delete');
});

Route::group([
    'prefix' => 'post',
    'as' => 'post.'
], function(){
    Route::get('create', function(){
        dd('Create');
    })->name('create');

    Route::get('show', function(){
        dd('Show_post');
    })->name('show');

});

// Form
Route::get('register', function () {
    return view('register');
});