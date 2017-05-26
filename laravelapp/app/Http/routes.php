<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::any('students/{id?}',function($id =null){
//    return 'dsd'.$id;
//})->where('id','[a-z]+');

//Route::any('students/{id?}/{name?}',function($id =null,$name = null){
//    return 'dsd'.$id.'_'.$name;
//})->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);
//Route::any('students/{id?}/{name?}',function($id =null,$name = null){
//    return 'dsd'.$id.'_'.$name;
//})->where(['name'=>'[a-zA-Z]+']);

//Route::get('student/{name?}',function($name = 'caoyi'){
//    return $name;
//});

//Route::group(['prefix'=>'kaka'],function(){
//    Route::get('student/{name?}',function($name = 'caoyi'){
//        return $name;
//    });
//});

//Route::get('member/index','MemberController@index');

//Route::get('member/inde',['uses' => 'MemberController@index']);
//Route::any('member/index',['uses' => 'MemberController@index']);
//Route::any('member/index',[
//    'uses' => 'MemberController@index',
//    'as' => 'memberinfo'
//]);
//������
//Route::get('member/{id}',['uses' => 'MemberController@index'])->where(['id'=>'[0-9]+']);
//�൱��as(name)
//Route::get('member/qiao',['uses' => 'MemberController@qiao'])->name('qiao');

//Route::get('member/view',['uses' => 'MemberController@view']);

//Route::get('yi',['uses' => 'MemberController@yi']);

//Route::get('test1',['uses' => 'StudentController@test1']);
Route::get('query1',['uses' => 'StudentController@query1']);
Route::get('query2',['uses' => 'StudentController@query2']);
Route::get('query3',['uses' => 'StudentController@query3']);
Route::get('query4',['uses' => 'StudentController@query4']);
Route::get('orm1',['uses' => 'StudentController@orm1']);
Route::get('orm2',['uses' => 'StudentController@orm2']);
Route::get('orm3',['uses' => 'StudentController@orm3']);
Route::get('orm4',['uses' => 'StudentController@orm4']);
Route::get('section1',['uses' => 'StudentController@section1']);
Route::get('student/request1',['uses' => 'StudentController@request1']);
Route::get('response',['uses' => 'StudentController@response']);

Route::group(['middleware'=>['web']],function(){
    Route::any('session1',['uses'=>'StudentController@session1']);
    Route::any('session2',['uses'=>'StudentController@session2']);
});






//项目
Route::any('Admin/Student/index',['uses'=>'Admin\StudentController@index']);
Route::any('Admin/Student/studentsData',['uses'=>'Admin\StudentController@studentsData']);
Route::any('Admin/Student/addStudent',['uses'=>'Admin\StudentController@addStudent']);
Route::any('Admin/Student/saveStudent',['uses'=>'Admin\StudentController@saveStudent']);


