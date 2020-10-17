<?php

use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Show news = http://127.0.0.1:8000/api/show_news
Route::get('show_news', function(){
    $data = News::get();
    return Response::json($data);
});

// Insert news = http://127.0.0.1:8000/api/insert_news
Route::post('insert_news', function(Request $request){
    $data = [
        'user_id' => $request->id,
        'news_title'=> $request->title,
        'news_photo'=> $request->photo,
        'news_content'=> $request->content,
    ];
    News::create($data);
    return "Insert Success!";
});

// Update News = http://127.0.0.1:8000/api/update_news
Route::post('update_news', function(Request $request){
    $id = $request->id;
    $data = [
        'user_id' => $request->userID,
        'news_title'=> $request->title,
        'news_photo'=> $request->photo,
        'news_content'=> $request->content,
    ];
    News::findOrFail($id)->update($data);
    return "Update Success!";
});

// Delete News = http://127.0.0.1:8000/api/delete_news
Route::post('delete_news', function(Request $request){
    $id = $request->id;
    News::findOrFail($id)->delete();
    return "Delete Success!";
});