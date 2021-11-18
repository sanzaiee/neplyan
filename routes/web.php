<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use App\Fnq;
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

// Route::get('/', function () {
//     return view('welcome');
// });

 //Clear config cache:
 Route::get('/config-cache', function() {
     $exitCode = Artisan::call('cache:clear');
     return 'Config cache cleared';
 });
 
 

// for facebook login
Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook.login');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/auth/google', 'GoogleController@redirectToGoogle')->name('google.login');
Route::get('/auth/google/callback', 'GoogleController@handleGoogleCallback');


Route::get('/start', function () {
    
    //   Permission::create(['name' => 'browse_sale', 'table_name' => 'orders']);
    // Permission::create(['name' => 'browse_clients', 'table_name' => 'clients']);

    // Permission::create(['name' => 'browse_role', 'table_name' => 'roles']);
    // Permission::create(['name' => 'create_role', 'table_name' => 'roles']);
    // Permission::create(['name' => 'read_role', 'table_name' => 'roles']);
    // Permission::create(['name' => 'update_role', 'table_name' => 'roles']);
    // Permission::create(['name' => 'delete_role', 'table_name' => 'roles']);


    // Permission::create(['name' => 'browse_education', 'table_name' => 'educations']);
    // Permission::create(['name' => 'create_education', 'table_name' => 'educations']);
    // Permission::create(['name' => 'read_education', 'table_name' => 'educations']);
    // Permission::create(['name' => 'update_education', 'table_name' => 'educations']);
    // Permission::create(['name' => 'delete_education', 'table_name' => 'educations']);

    // Permission::create(['name' => 'browse_material', 'table_name' => 'materials']);
    // Permission::create(['name' => 'create_material', 'table_name' => 'materials']);
    // Permission::create(['name' => 'read_material', 'table_name' => 'materials']);
    // Permission::create(['name' => 'update_material', 'table_name' => 'materials']);
    // Permission::create(['name' => 'delete_material', 'table_name' => 'materials']);


    // Permission::create(['name' => 'browse_level', 'table_name' => 'levels']);
    // Permission::create(['name' => 'create_level', 'table_name' => 'levels']);
    // Permission::create(['name' => 'read_level', 'table_name' => 'levels']);
    // Permission::create(['name' => 'update_level', 'table_name' => 'levels']);
    // Permission::create(['name' => 'delete_level', 'table_name' => 'levels']);


    // Permission::create(['name' => 'browse_semester', 'table_name' => 'semesters']);
    // Permission::create(['name' => 'create_semester', 'table_name' => 'semesters']);
    // Permission::create(['name' => 'read_semester', 'table_name' => 'semesters']);
    // Permission::create(['name' => 'update_semester', 'table_name' => 'semesters']);
    // Permission::create(['name' => 'delete_semester', 'table_name' => 'semesters']);

    // Permission::create(['name' => 'browse_product', 'table_name' => 'products']);
    // Permission::create(['name' => 'create_product', 'table_name' => 'products']);
    // Permission::create(['name' => 'read_product', 'table_name' => 'products']);
    // Permission::create(['name' => 'update_product', 'table_name' => 'products']);
    // Permission::create(['name' => 'delete_product', 'table_name' => 'products']);

    // Permission::create(['name' => 'browse_heading', 'table_name' => 'headings']);
    // Permission::create(['name' => 'create_heading', 'table_name' => 'headings']);
    // Permission::create(['name' => 'read_heading', 'table_name' => 'headings']);
    // Permission::create(['name' => 'update_heading', 'table_name' => 'headings']);
    // Permission::create(['name' => 'delete_heading', 'table_name' => 'headings']);

    // Permission::create(['name' => 'browse_topic', 'table_name' => 'topics']);
    // Permission::create(['name' => 'create_topic', 'table_name' => 'topics']);
    // Permission::create(['name' => 'read_topic', 'table_name' => 'topics']);
    // Permission::create(['name' => 'update_topic', 'table_name' => 'topics']);
    // Permission::create(['name' => 'delete_topic', 'table_name' => 'topics']);

    // Permission::create(['name' => 'browse_topic_content', 'table_name' => 'topic_contents']);
    // Permission::create(['name' => 'create_topic_content', 'table_name' => 'topic_contents']);
    // Permission::create(['name' => 'read_topic_content', 'table_name' => 'topic_contents']);
    // Permission::create(['name' => 'update_topic_content', 'table_name' => 'topic_contents']);
    // Permission::create(['name' => 'delete_topic_content', 'table_name' => 'topic_contents']);


    // Permission::create(['name' => 'browse_user', 'table_name' => 'users']);
    // Permission::create(['name' => 'create_user', 'table_name' => 'users']);
    // Permission::create(['name' => 'read_user', 'table_name' => 'users']);
    // Permission::create(['name' => 'update_user', 'table_name' => 'users']);
    // Permission::create(['name' => 'delete_user', 'table_name' => 'users']);


    // Permission::create(['name' => 'browse_product_employee', 'table_name' => 'employee']);
    // Permission::create(['name' => 'browse_other_product_employee', 'table_name' => 'employee']);
    // Permission::create(['name' => 'create_product_employee', 'table_name' => 'employee']);
    // Permission::create(['name' => 'create_other_product_employee', 'table_name' => 'employee']);
    // Permission::create(['name' => 'read_product_employee', 'table_name' => 'employee']);
    
    
    return "permissions made successfuly";

});

// route::get('/ses', function () {

//     request()->session()->flush();
// });


Route::get('/for-support','SupportController@create')->name('support.create');
Route::post('/support','SupportController@store')->name('support.store');
Route::get('/support','SupportController@index')->name('support.index');

Route::get('/supoort-status/{id}','SupportController@status')->name('support.read.status');
Route::get('/contact-status/{id}','ContactController@status')->name('contact.read.status');
Route::get('/private-status/{id}','PrivateMessageController@status')->name('private.read.status');



Route::get('client/password/reset', 'ClientForgetPasswordController@showLinkRequestForm')->name('client.password.request');
Route::post('client/password/email', 'ClientForgetPasswordController@sendResetLinkEmail')->name('client.password.email');
Route::get('client/password-reset', 'ClientForgetPasswordController@showResetForm')->name('client.password.reset');
Route::post('client/password/reset', 'ClientForgetPasswordController@reset')->name('client.password.update');


Route::get('/email-list','SellerMessageController@messageAdmin')->name('email.list');

//check seller
    Route::post('/seller-check', 'ClientController@checkSeller')->name('check.seller');
//ends seller check

Route::resource('/role', 'RoleController');
Route::resource('/admin', 'AdminController');

// this is for client
Route::get('/client-login', 'ClientController@loginPage')->name('client.login');
Route::post('/client-login', 'ClientController@login')->name('client.loggedin');
Route::post('/client-logout', 'ClientController@logout')->name('client.logout');
Route::post('/client-register', 'ClientController@register')->name('client.register');
Route::get('/client-dashboard', 'ClientController@index')->name('client.dashboard');
Route::get('/courselist', 'ClientController@paidCourse')->name('course.list');
Route::get('/client/product-detail/{prodslug}', 'ClientController@prodDetail')->name('prodDetail');

Route::get('/faq', function () {
    $faq = Fnq::where('status',1)->get();
    return view('client.faq',compact('faq'));
})->name('user.faq');

Route::get('/client-comments', 'ClientController@myComments')->name('client.comment');
Route::post('/client-comments/feature/{id}', 'CommentController@feature')->name('comment.feature');
Route::resource('/comment', 'CommentController');
Route::get('/my-profile', 'ProfileController@create')->name('profile.create');
Route::post('/my-profile', 'ProfileController@store')->name('profile.store');
Route::put('/my-profile/{id}', 'ProfileController@update')->name('profile.update');


Route::post('/search/paid-product', 'ClientController@searchPaidProd')->name('paid.prod.search');
Route::post('/search/paid-other-product', 'ClientController@searchPaidOther')->name('paid.otherprod.search');
// Route::get('/login', 'HomeController@login')->name('login');


Route::get('/sellerMessage', 'ClientController@messageSeller')->name('client.message.seller');
//client routes ends here


Route::get('/', 'HomeController@index')->name('home');
// frontend routes starts here
Route::get('/subject-/{id}', 'HomeController@subjectDetail')->name('subject.detail');
Route::get('/single-search', 'HomeController@singleSearch')->name('single.search');


// frontend routes ends here

Route::get('/login', 'UserDashboardController@systemLoginPage')->name('admin.login');

Auth::routes();
Route::get('/system/login', 'UserDashboardController@systemLoginPage')->name('admin.login');
Route::get('/user-dashboard', 'UserDashboardController@index')->name('user.dashboard');


//for seller url
Route::get('/total-sales', 'SellerController@totalSale')->name('total.sale');
Route::get('/total-clients', 'SellerController@totalClient')->name('total.client');
Route::get('/email-clients', 'SellerMessageController@emailClient')->name('email.client');

Route::post('/email-client', 'SellerMessageController@send')->name('seller.email.send');
Route::get('/email-outbox', 'SellerMessageController@outbox')->name('email.outbox');
//seller url ends here

Route::get('/admin-message','PrivateMessageController@index')->name('message.from.admin');


Route::middleware(['admin.access'])->group(function () {
    Route::get('/send-private-message/{user}/{id}','PrivateMessageController@create')->name('private.create');
    Route::post('/send-private-message','PrivateMessageController@store')->name('private.store');

    Route::get('/client-list','SubscribeController@clientList')->name('all.client.index');
    Route::get('/subscribe-courseList/{id}','SubscribeController@subscribeCourseList')->name('subscribe.courselist');
    Route::delete('/client/{id}/delete','SubscribeController@destroyClient')->name('client.destroy');
    
    Route::resource('/banner', 'BannerController');
    Route::resource('/testimonal', 'TestimonalController');
    Route::resource('/about', 'AboutController');
    Route::resource('/advertise', 'AdvertiseController');
    
    Route::post('/discount','DiscountController@store')->name('discount.store');

    Route::resource('/term', 'TermController');
    Route::resource('/fnq', 'FnqController');
    Route::resource('/setting', 'SettingController');
    Route::resource('/tag', 'TagController');
    Route::resource('/blog', 'BlogController');
    // Route::get('/random','RandomContentController@index')->name('random.index');
    Route::resource('/random', 'RandomContentController');
    Route::resource('/notice', 'NoticeController');
    Route::resource('/event', 'EventController');
    Route::resource('/guideline', 'GuidelineController');

    // education routes
    Route::resource('/education', 'EducationController');
    Route::get('/{education}/material', 'MaterialController@create')->name('add.material');
    Route::get('/material/create', 'MaterialController@create1')->name('material.create');

    Route::post('/material', 'MaterialController@store')->name('material.store');
    Route::put('/material/{id}', 'MaterialController@update')->name('material.update');
    Route::delete('/material/{id}', 'MaterialController@destroy')->name('material.destroy');


    Route::get('/{material}/level', 'LevelController@create')->name('add.level');
    Route::get('/level', 'LevelController@create1')->name('level.create');
    Route::post('/level', 'LevelController@store')->name('level.store');
    Route::put('/level/{id}', 'LevelController@update')->name('level.update');
    Route::delete('/level/{id}', 'LevelController@destroy')->name('level.destroy');

    Route::get('/{level}/semester', 'SemesterController@create')->name('add.semester');
    Route::get('/semester', 'SemesterController@create1')->name('semester.create');
    Route::post('/semester', 'SemesterController@store')->name('semester.store');
    Route::put('/semester/{id}', 'SemesterController@update')->name('semester.update');
    Route::delete('/semester/{id}', 'SemesterController@destroy')->name('semester.destroy');

    // for other education
    Route::resource('/other', 'OtherController');
    Route::post('/change-status', 'UserDashboardController@changeStatus')->name('user.status.change');
});

Route::resource('/subscribe', 'SubscribeController');

Route::group(['prefix' => '/admins'], function () {
    Route::get('/my-profile', 'AdminProfileController@create')->name('admin.profile.create');
    Route::post('/my-profile', 'AdminProfileController@store')->name('admin.profile.store');
    Route::put('/my-profile/{id}', 'AdminProfileController@update')->name('admin.profile.update');
});

// list of vendors
Route::get('/vendor-list', 'UserDashboardController@vendorList')->name('vendor.list');
Route::get('/vendor-list-by/{id}', 'UserDashboardController@vendorById')->name('vendor.list.id');
Route::post('/vendor-product-approval/{slug}', 'UserDashboardController@approval')->name('product.approval');


// Products routes
Route::get('/{semester}/product', 'ProductController@create')->name('add.product');

Route::get('/product/{semester}', 'ProductController@index')->name('product.index');

Route::get('/product-create', 'ProductController@all')->name('product.all');
Route::get('/all-product', 'ProductController@allProduct')->name('product');

Route::get('/product-by/{eduslug}', 'ProductController@byEducation')->name('product.by');
// Route::get('/product/{semesterslug}', 'ProductController@index')->name('product.index');

// Route::resource('/subject', 'SubjectController');
Route::resource('/product', 'ProductController')->only('store', 'update', 'destroy');

Route::post('/product/search', 'UserDashboardController@productSearch')->name('product.search');
Route::group(['prefix' => '/dropdownlist'], function () {
    Route::get('/material/{id}', 'HomeController@material')->name('list.material');
    Route::get('/level/{id}', 'HomeController@level')->name('list.level');
    Route::get('/semester/{id}', 'HomeController@semester')->name('list.semester');
    Route::get('/product/{id}', 'HomeController@product')->name('list.product');
    Route::get('/topic/{id}', 'HomeController@topic')->name('list.topic');
    Route::get('/topiccontent/{id}', 'HomeController@topiccontent')->name('list.topiccontent');
    Route::get('/question/{id}', 'HomeController@question')->name('list.question');
    Route::get('/otherproduct/{id}', 'HomeController@otherproduct')->name('list.otherproduct');
});




// Route::get('/materials/{id}/select', 'HomeController@material');




Route::get('/client/faq', function () {
    return view('client.list-detail');
});

// Route::get('/heading-of/subject/{subject}', 'HeadingController@create')->name('add.book.content');
// Route::resource('heading', 'HeadingController');

// Route::get('/content-of/heading/{heading}', 'ContentController@create')->name('add.heading.content');
// Route::resource('content', 'ContentController');

Route::get('/heading-of/product/{product}', 'TopicController@create')->name('add.topic');
Route::resource('topic', 'TopicController');

Route::get('/content-of/topic/{topic}', 'TopicContentController@create')->name('add.topic.content');
Route::resource('topiccontent', 'TopicContentController');

Route::get('/heading-of/other/{other}', 'OtherTopicController@create')->name('add.other.topic');
Route::resource('othertopic', 'OtherTopicController');

Route::get('/content-of/othertopic/{othertopic}', 'OtherTopicContentController@create')->name('add.othertopic.content');
Route::resource('othertopiccontent', 'OtherTopicContentController');

Route::get('/question-of/{productslug}', 'QuestionController@index')->name('question.index');
Route::get('/question-create', 'QuestionController@directCreate')->name('direct.add.question');
Route::post('/question', 'QuestionController@store')->name('question.store');
Route::put('/question/{id}', 'QuestionController@update')->name('question.update');
Route::get('/question-all', 'QuestionController@allQuestion')->name('all.question');
Route::post('/allQuestion/byProduct', 'QuestionController@questionByProd')->name('allQuestion.byProduct');

Route::get('/notice-of/{education}', 'EducationNoticeController@create')->name('notice.edu.create');
Route::post('/noticeEdu', 'EducationNoticeController@store')->name('notice.edu.store');
Route::put('/noticeEdu/{id}', 'EducationNoticeController@update')->name('notice.edu.update');
Route::delete('/noticeEdu/{id}', 'EducationNoticeController@destroy')->name('notice.edu.destroy');

Route::get('/other-product/product-create', 'OtherProductController@create')->name('other.product.create');
Route::post('/other-product/store', 'OtherProductController@store')->name('other.product.store');

Route::get('/other-product/create-by/{id}', 'OtherProductController@createById')->name('other.product.create.id');

Route::put('/other-product/{id}', 'OtherProductController@update')->name('other.product.update');
Route::get('/other-product', 'OtherProductController@index')->name('other.product.index');
Route::delete('/other-product/{other-id}', 'OtherProductController@destroy')->name('other.product.destroy');

Route::get('/other-product/read/{otherproduct}', 'OtherProductController@readProduct')->name('read.otherproduct');

Route::post('/other-product/search', 'UserDashboardController@otherProductSearch')->name('other.product.search');
Route::post('/other-question', 'OtherQuestionController@store')->name('other.question.store');
Route::put('/other-question/{id}', 'OtherQuestionController@update')->name('other.question.update');
Route::delete('/other-question/{id}', 'OtherQuestionController@destroy')->name('other.question.destroy');



// vendor route
Route::get('/my-prod', function () {
    return view('dashboard.vendor.myprod');
})->name('myProd.view');


Route::get('/my-prod/{slug}/education','VendorController@prodByEducation')->name('productbyeducationslug');

Route::get('/my-other-prod/{slug}/other-education','VendorController@prodByOtherEducation')->name('productbyothereducationslug');


Route::group(['prefix' => '/employee/educational'], function () {
    Route::get('/product', 'VendorController@prodByUser')->name('productBy.user');
    Route::get('/direct/create', 'VendorController@directProdcreate')->name('directProd.create');
    Route::post('/product', 'VendorController@storeProduct')->name('productBy.user.store');
    Route::put('/product/{prodid}', 'VendorController@updateProduct')->name('productBy.user.update');
    Route::get('/overview-product', 'VendorController@overviewProduct')->name('overview.user.product');
    Route::get('/product/create/{semester}', 'VendorController@createProduct')->name('employee.add.product');
});

Route::group(['prefix' => '/employee/other'], function () {
    Route::get('/product', 'VendorController@otherProdByUser')->name('otherproductBy.user');
    Route::get('/product-create', 'VendorController@directOtherProdcreate')->name('directOtherProd.create');
    Route::post('/product-create', 'VendorController@storeOtherProduct')->name('otherProductBy.user.store');
    Route::put('/product/{prodid}', 'VendorController@updateOtherProduct')->name('otherProductBy.user.update');
    Route::get('/other-product/create-by/{id}', 'VendorController@createById')->name('employee.other.product.create.id');
});

//employee dropdownlist
Route::group(['prefix' => '/employee/dropdownlist'], function () {
    Route::get('/material/{id}', 'VendorController@material')->name('employee.list.material');
    Route::get('/level/{id}', 'VendorController@level')->name('employee.list.level');
    Route::get('/semester/{id}', 'VendorController@semester')->name('employee.list.semester');
    Route::get('/product/{id}', 'VendorController@product')->name('employee.list.product');
    Route::get('/topic/{id}', 'VendorController@topic')->name('employee.list.topic');
    Route::get('/topiccontent/{id}', 'VendorController@topiccontent')->name('employee.list.topiccontent');
    Route::get('/question/{id}', 'VendorController@question')->name('employee.list.question');
    Route::get('/otherproduct/{id}', 'VendorController@otherproduct')->name('employee.list.otherproduct');

    Route::post('/product/search', 'VendorController@productSearch')->name('employee.product.search');
    Route::post('/other-product/search', 'VendorController@otherProductSearch')->name('employee.other.product.search');
});

// Route::get('/your-product', 'ProductController@vendorProduct')->name('vendor.product');
Route::get('/overview-product', 'ProductController@overviewProduct')->name('overview.product');
Route::get('/read-content/{slug}', 'ProductController@readProduct')->name('read.content');

Route::get('/client/read-content/{slug}', 'ProductController@readProductClient')->name('read.content.client');
Route::get('client/{product}', 'ProductController@productDetail')->name('product.detail');
Route::get('/product-list/{semester}', 'SemesterController@productBysemester')->name('semester.product.list');
Route::get('/product-list-of/{education}', 'HomeController@productByeducation')->name('education.product.list');

Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::get('/admin-contact', 'ContactController@indexForAdmin')->name('contact.admin.index');

Route::resource('/contact', 'ContactController');

Route::get('/payment-mode/{product}', 'PaymentController@mode')->name('payment.mode');

Route::get('/terms-condition', 'HomeController@terms')->name('term');
Route::get('/faqs', 'HomeController@faqs')->name('faq');

Route::get('/events', 'HomeController@events')->name('event');
Route::get('/event-detail/{event}', 'HomeController@eventDetail')->name('event.detail');

Route::get('/about-us', 'HomeController@about')->name('about');

Route::get('/notice-list', 'HomeController@notices')->name('notice');
Route::get('/notice-details/{notice}', 'HomeController@noticeDetail')->name('notice.detail');

Route::get('/blogs', 'HomeController@blogs')->name('blog');
Route::get('/blog-detail/{blog}', 'HomeController@blogDetail')->name('blog.detail');

Route::get('blogs/{tag}', 'HomeController@byTag')->name('blog.tag');

Route::get('/other-product/{otherslug}', 'HomeController@otherProductList')->name('other.product.list');
Route::get('/other-product/detail-of/{otherslug}', 'HomeController@otherProductDetail')->name('other.product.detail');





// forfrontend
Route::get('/question/{prodslug}', 'QuestionController@show')->name('question.show');

// questionOfOther
Route::get('/other-question/{prodslug}', 'QuestionController@questionOfOther')->name('other.question.show');


Route::get('/question/detail/{prodslug}', 'QuestionController@questiondetail')->name('question.detail');
Route::get('/other-question/detail/{prodslug}', 'QuestionController@otherQuestionDetail')->name('other.question.detail');
// Route::resource('/question', 'QuestionController');
Route::get('/notice-all/{education}', 'EducationNoticeController@noticeAll')->name('edu.notice.all');
Route::get('/notice-detail/{notice}', 'EducationNoticeController@noticeDetail')->name('edu.notice.detail');


Route::any('/esewa/success', 'PaymentController@success')->name('esewa.success');
Route::any('/esewa/fail', 'ClientController@failed')->name('esewa.fail');


Route::get('/success', 'PaymentController@successful')->name('success.response');
Route::get('/fail', 'PaymentController@fail')->name('fail.response');
Route::post('/order', 'OrderController@store')->name('order.store');
Route::get('/order', 'OrderController@index')->name('order.index');

