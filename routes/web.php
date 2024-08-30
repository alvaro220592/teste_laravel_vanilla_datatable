<?php

use Alvaro220592\VanillaLaratable\DataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
});

Route::post('users', function (Request $request){
    $search = $request->search;
    $classe = new DataTable(User::class);
    $per_page = 1;

    if ($search) {
        $classe = $classe->where('name', 'like', '%'.$search.'%');
    }

    if ($request->sort_column) {
        $classe = $classe->orderBy($request->sort_column, $request->sort_direction);
    }

    if ($request->per_page) {
        $per_page = $request->per_page == 'all' ? count($classe->get()) : $request->per_page;
    }

    $dados = $classe->getData($per_page);

    return response()->json($dados);
});
