<?php



Route::get('/', function () {
    return redirect()->to('login');
});

Auth::routes(['register' => false, 'reset' => false]);
   Route::get('/home', 'HomeController@index')->name('home');
   Auth::routes();

Route::group(['module' => 'Category', 'prefix' => 'student', 'middleware' => ['auth']], function () {

 

//Students
    Route::get('list', 'StudentController@list')->name('studentList');
    Route::post('store', 'StudentController@store')->name('student.store');

//FeesSetup
    Route::get('feesSetup/list', 'FeesController@list')->name('feesList');
    Route::post('feesSetup/store', 'FeesController@store')->name('fees.store');

//FeesBook
    Route::get('feesBook/list', 'FeesBookController@list')->name('feesBookList');
    Route::post('feesBook/store', 'FeesBookController@store')->name('feesBook.store');
    Route::post('feesBook/valueByCategory', 'FeesBookController@feesValueByCategory')->name('feesBook.valueByCategory');
    Route::get('feesBook/voucher/{id}', 'FeesBookController@generateVoucher')->name('feesBook.voucher');

//profile
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('profile/update', 'ProfileController@update')->name('profile.update');


});
