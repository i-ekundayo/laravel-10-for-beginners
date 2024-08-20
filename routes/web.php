<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');


                        // FETCH ALL USERS
                        // Raw SQL
    // $users = DB::select("select * from users");
                        // Query Builder
    // $users = DB::table('users')->get();
                        // Eloquent
    // $users = User::first();


                        // CREATE NEW USER
                        // Raw SQL
    // $user = DB:: insert("insert into users (name, email, password) values (?, ?, ?)", ['Gabriel', 'goekundayo700@gmail.com', 'password']);
                        // Query Builder
    // $user = DB::table('users')->insert([
    //     'name' => 'Gabriel',
    //     'email' => 'goekundayo700@gmail.com',
    //     'password' => 'password'
    // ]);
                        // Eloquent
    // $user = User::create([
    //     'name' => 'Gabriel',
    //     'email' => 'goekundayo700@gmail.com',
    //     'password' => 'password'
    // ]);

                        // UPDATE A USER
                        // Raw SQL
    // $user = DB::update("update users set email='olaekundayo700@gmail.com' where id = 3");
                        // Query Builder
    // $user = DB::table('users')->where('id', 4)->update(['email' => 'olaekundayo700@gmail.com']);
                        // Eloquent
    // $user = User::where('id', 8)->first();
    // $user->update([
    //     'email' => 'moekundayo700@gmail.com'
    // ]);


                        // DELETE A USER
                        // Raw SQL
    // $user = DB:: delete("delete from users where id = 3");
                        // Query Builder
    // $user = DB::table('users')->where('id', 4)->delete();
                        // Eloquent
    // $user = User::find(8);
    // $user->delete();
    // dd($user);







                            // More on Eloquent
    // $user = DB::insert("insert into users (name, email, password) values (?, ?, ?)", [
    //     'Sarthak',
    //     'sarthak1@bitfumes.com',
    //     'password'
    // ]);

    // $user = DB::table('users')->insert([
    //     'name' => 'Sarthak',
    //     'email' => 'sarthak2@bitfumes.com',
    //     'password' => 'password'
    // ]);

    // $user = User::create([
    //     'name' => 'Sarthak',
    //     'email' => 'sarthak7@bitfumes.com',
    //     'password' => 'password'
    // ]);


    // $users = User::find(18);
    // dd($users->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
