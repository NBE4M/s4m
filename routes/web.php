<?php
use App\categories;
use App\subcategories;
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

Route::get('/registration', function () {
    return view('registration');
});
Route::get('/entry-abcde', function () {

     $categories   =  Categories::with('Subcategory')->where('flag', '=', '1')->get();       
        //echo '<pre>';print_r($categories);echo '</pre>';
    return view('entry-abcde',['categories' => $categories]);
});
Route::get('/category-form', function () {
      $categories   =  Categories::with('Subcategory')->where('flag', '=', '1')->get();       
        //echo '<pre>';print_r($categories);echo '</pre>';
    return view('category-form',['categories' => $categories]);
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/', function () {
    $posts = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'home')->get();
    $header = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'header(string)')->get();
    $footer = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'footer')->get();
    return view('welcome',compact('posts','header','footer'));
});

Route::get('/rules', function () {
    $posts = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'rules')->get();
 
    return view('rules',compact('posts'));
});
Route::get('/gallery', function () {
    $posts = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'Gallrey')->get();
 
    return view('rules',compact('posts'));
});
Route::get('/judgecriteria', function () {
    $posts = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'judgecriteria')->get();
 
    return view('judgecriteria',compact('posts'));
});
Route::get('/contactus', function () {
    $posts = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'contact')->get();
 
    return view('contactus',compact('posts'));
});
Route::get('/agenda', function () {
    $posts = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'agenda')->get();
 
    return view('agenda',compact('posts'));
    
});

Route::get('/category', function () {
    $posts = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'category')->get();
 
    return view('category',compact('posts'));
});
Route::get('/jury', function () {
    $posts = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'jury')->get();
 
    return view('jury',compact('posts'));
});
Route::get('/onlinejury', function () {
    $posts = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'onlinejury')->get();
 
    return view('juryonline',compact('posts'));
});
Route::get('/speaker', function () {
    $posts = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'speaker')->get();
 
    return view('speakers',compact('posts'));
});

Route::get('/partners', function () {
    $posts = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'partners')->get();
 
    return view('partners',compact('posts'));
});
Route::get('/venue', function () {
    $posts = DB::table('static_pages')
        ->select('*') 
        ->where('title', '=', 'venue')->get();
 
    return view('partners',compact('posts'));
});
Route::get('/entryguideline', function () {
    return view('entryguideline');
});

// Authentication routes...
Route::get('auth/login', ['middleware' => 'guest',   'uses' =>'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('forgot/password', 'Auth\AuthController@forgotPassword');
Route::post('forgot/password', 'Auth\AuthController@sendResetLink');
Route::get('reset/password/{id}', 'Auth\AuthController@resetPassword');
Route::post('reset/password', 'Auth\AuthController@saveNewPassword');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@create');


Auth::routes();
Route::get('/admin/addpage', function () {
    return view('admin/add_page');
});
Route::get('admin/upload_file','AdminController@upload_file');

Route::post('admin/dropzoneUploadFile','AdminController@dropzoneUploadFile');


/*for gallery*/
Route::get('admin/upload_gallery','AdminController@upload_gallery');

Route::post('admin/dropzoneUploadgallery','AdminController@dropzoneUploadgallery');
/*gallery*/

Route::get('/entry', 'EntryController@index');
Route::get('/dashboard', 'DashboardController@index');
Route::post('/entry', 'EntryController@create');
Route::post('/entrynominee', 'EntryController@entrynominee');
Route::get('/entry/{id}', 'EntryController@edit');
Route::get('/entrynominee/{id}', 'EntryController@editnominee');
Route::post('/entry/{id}', 'EntryController@update');
Route::post('/entrynominee/{id}', 'EntryController@entrynomineeupdate');
Route::get('/delete/{id}', 'EntryController@updates');
Route::get('/destroy/{id}', 'EntryController@destroy');
Route::get('/viewentry/{id}', 'EntryController@show');
Route::get('/viewentrynominee/{id}', 'EntryController@shownominee');
// Delegate Registration.............................
/*jury related*/
Route::post('/insertdata', 'JuryController@store');
Route::post('/updatejuryentry', 'JuryController@updatejuryentry');
Route::post('/recusedatainsert', 'JuryController@recusedatainsert');
Route::get('/updatestatus/{id}', 'JuryController@updatestatus');
Route::get('/judge', 'JuryController@index');
Route::get('/admin/jurylist', 'AdminController@jurylist');
Route::get('/admin/juryprofile', 'AdminController@juryprofilelist');
Route::get('/admin/juryreport', 'AdminController@juryreport');
Route::get('/admin/juryissuereport', 'AdminController@juryissuereport');
Route::post('/admin/juryreport', 'AdminController@juryreport_report');
Route::get('/admin/addjury', 'AdminController@addjury');
Route::post('/admin/addjury', 'AdminController@addNewjury');
Route::get('/admin/addjury/{id}', 'AdminController@editjury');
Route::post('/admin/addjury/{id}', 'AdminController@updatejury');

Route::get('/admin/juryassign', 'AdminjuryassignController@index');
Route::post('/admin/juryassign', 'AdminjuryassignController@store');

Route::get('/admin/adminjurydeleteassign/{id?}', 'AdminjuryassignController@assignjurydelete');
Route::post('/admin/adminjurydeleteassign/{id?}', 'AdminjuryassignController@assignjury_deletedata');

Route::get('/top5enrty', 'JuryController@top5enrty');
Route::get('/top5judge', 'DelegateController@top5enrty');
Route::get('/entry_information', 'JuryController@entry_information');
Route::get('/entry_updation/{id}', 'JuryController@entry_updation');
Route::get('admin/issuedelete/{id}', 'AdminController@destroy');
Route::get('/admin/avaibleentry', 'AdminController@show');
Route::post('/admin/update', 'AdminController@update');
Route::get('/admin/alredyassign', 'AdminController@alreadyassign');
/*jury related*/
Route::get('/delegate', 'DelegateController@index');
Route::get('/delegate_reg', 'DelegateController@create');
Route::any('/deloohpayment/payment_success', 'DelegateController@del_online_payment_store');
Route::any('/deloohpayment/payment_fail', 'DelegateController@del_online_payment_store');
// Delegate Registration payment.............................

Route::get('/del_checkpayment', 'DelegateController@delcheckpayment');
//Route::get('/delneftpayment', 'DelegateController@delneftdatainsert');
Route::post('/delegate_reg', 'DelegateController@del_online_payment_store');
//Route::get('/makeonlinepayment', 'DashboardController@make_online_payment');
Route::post('delchequedatainsert', 'DelegateController@delcheckpayment');
Route::post('/delneftpayment', 'DelegateController@delneftdatainsert');
// payment option routes.....................

Route::get('/paymentoption', 'DashboardController@paymentoption');
Route::get('/makecheckpayment', 'DashboardController@makecheckpayment');
Route::get('/makeneftpayment', 'DashboardController@makeneftpayment');
Route::post('/makeonlinepayment', 'DashboardController@make_online_payment_store');
Route::get('/makeonlinepayment', 'DashboardController@make_online_payment');
Route::post('/chequedatainsert', 'DashboardController@chequedatainsert');
Route::post('/neftdatainsert', 'DashboardController@neftdatainsert');

// Admin Panel Route................................
Route::post('admin/createpage','AdminController@staticpages');
Route::get('admin/addpage/{id}','AdminController@editpages');
Route::post('admin/updatestory','AdminController@updatepage');
Route::get('/admin/managepage', 'AdminController@managepagepage');
Route::get('/admin/categorylist', 'AdminController@categorylist');
Route::post('/admin/addcat', 'AdminController@addcat');
Route::post('/admin/addsubcat', 'AdminController@addsubcat');
Route::post('/admin/updatecats', 'AdminController@updatecats');
Route::post('/admin/updatesubcat', 'AdminController@updatesubcat');

Route::get('/admin/subcategorylist', 'AdminController@subcategorylist');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/jurylist', 'AdminController@jurylist');
Route::get('/admin/juryreport', 'AdminController@juryreport');
Route::post('/admin/juryreport', 'AdminController@juryreport_report');
Route::get('/admin/addjury', 'AdminController@addjury');
Route::post('/admin/addjury', 'AdminController@addNewjury');
Route::get('/admin/addjury/{id}', 'AdminController@editjury');
Route::post('/admin/addjury/{id}', 'AdminController@updatejury');

Route::get('/admin/juryassign', 'AdminjuryassignController@index');
Route::post('/admin/juryassign', 'AdminjuryassignController@store');

Route::get('/admin/adminjurydeleteassign/{id?}', 'AdminjuryassignController@assignjurydelete');
Route::post('/admin/adminjurydeleteassign/{id?}', 'AdminjuryassignController@assignjury_deletedata');

/* Start Reportings url */
Route::get('/admin/adminuserentryreport', 'AdminReportsController@Userwisereport');
Route::get('/admin/admincategentryreport', 'AdminReportsController@Categorywisereport');
Route::get('/admin/admincompentryreport', 'AdminReportsController@Companywisereport');
Route::get('/admin/adminpaymentreport', 'AdminReportsController@Paymentreport');
Route::get('/admin/admindelpaymentreport', 'AdminReportsController@admindelpaymentreport');
Route::get('/admin/adminneftpaymentreport', 'AdminReportsController@neftPaymentreport');
Route::get('/admin/adminchequepaymentreport', 'AdminReportsController@chequePaymentreport');
/* Entry Reportings url */


Route::get('/admin/entrylist', 'AdminusersController@entrylist');
Route::get('/admin/entry/{id}', 'AdminusersController@viewentry');
Route::get('/admin/entrynominee/{id}', 'AdminusersController@viewentrynominee');
Route::get('/admin/editentry/{id}', 'AdminusersController@editentry');
Route::post('/admin/editentry/{id}', 'AdminusersController@updateentry');
Route::get('/admin/userslist', 'AdminusersController@userslist');
Route::get('/admin/catentrylist', 'AdminusersController@catentrylist');
Route::get('/admin/adduser', 'AdminusersController@index');
Route::post('/admin/adduser', 'AdminusersController@store');
Route::get('/admin/adduser/{id}', 'AdminusersController@edit');
Route::post('/admin/adduser/{id}', 'AdminusersController@update');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/adduser', 'AdminusersController@index');
Route::post('/admin/adduser', 'AdminusersController@store');
Route::get('/admin/userslist', 'AdminusersController@userslist');