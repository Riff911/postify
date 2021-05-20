<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ElectronicsController;
use App\Http\Controllers\AnalyticsController;
use App\Exports\PostExport;
use App\Models\Post;
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


Route::resource('/posts', PostController::class)
->middleware(['auth']);

Route::get('/posted', function(){
    return redirect('/posts');
})
->middleware(['auth'])->name('posted');
Route::get('/exportexcel', function(){
    return Excel::download(new PostExport,'postlist.xlsx');
})
->middleware(['auth']);
Route::get('/exportcsv', function(){
    return Excel::download(new PostExport,'postlist.csv');
})
->middleware(['auth']);
Route::get('/exportpdf', function(){
    $posts = Post::all();
    $pdf = PDF::loadView('postpdf',compact('posts'));
    return $pdf->download('posts.pdf');
})
->middleware(['auth']);
Route::get('/autocomplete', function(){
    $posts = Post::select("name")->where("name","LIKE","%($request->terms)%")->get();
    return response()->json($posts);
})
->middleware(['auth'])->name('autocomplete');
Route::get('/', function(){
    return redirect('/login');
});
Route::get('/contact', [ContactController::class, 'index'])
->middleware(['auth'])->name('contact');

Route::get('/dash', [AnalyticsController::class, 'index'])
->middleware(['auth'])->name('dash');

Route::post('/sendmail', [ContactController::class, 'sendMail'])
->middleware(['auth'])->name('sendmail');

Route::get('/addstudent', [StudentController::class, 'addStudent'])
->middleware(['auth']);

Route::post('/addstudent', [StudentController::class, 'storeStudent'])
->middleware(['auth']);
 
Route::get('/students', [StudentController::class, 'students'])
->middleware(['auth'])->name('students');

Route::get('/electronics', [ElectronicsController::class, 'index'])
->middleware(['auth'])->name('electronics');

Route::get('/editstudent/{student}', [StudentController::class, 'editstudent'])
->middleware(['auth']);

Route::get('/deletestudent/{student}', [StudentController::class, 'deletestudent'])
->middleware(['auth']);

Route::post('/storestudent/{student}', [StudentController::class, 'updatestudent'])
->middleware(['auth']);

require __DIR__.'/auth.php';


