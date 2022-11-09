<?php

Route::get('/', 'HomeController')->name('dashboard');

Route::get('/book/data', 'DataController@books')->name('book.data');
Route::get('/author/data', 'DataController@authors')->name('author.data');
Route::get('/borrow/data', 'DataController@borrows')->name('borrow.data');
Route::get('/borrow', 'BorrowController@index')->name('borrow.index');
Route::put('/borrow/{BorrowHistory}/return', 'BorrowController@returnBook')->name('borrow.return');
Route::resource('author', 'AuthorController');
Route::resource('book', 'BookController');
Route::get('/report/top-book', 'ReportController@topBook')->name('report.top-book');
Route::get('/report/top-user', 'ReportController@topUser')->name('report.top-user');