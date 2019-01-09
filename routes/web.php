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


/**
 * Routes to manage frontend of app
 */

//home page for goshentaxapp
Route::get('/', [
    'uses' => 'IndexController@create',
    'as' => 'index'
]);

//single post page for goshentaxapp
Route::get('/post/{slug}', [
    'uses' => 'IndexController@single',
    'as' => 'post.single'
]);

//single legislation page for goshentaxapp
Route::get('/legislation/{slug}', [
    'uses' => 'IndexController@legislation',
    'as' => 'legislation.single'
]);

//single legislation page for goshentaxapp
Route::get('/download/{file}', [
    'uses' => 'IndexController@download',
    'as' => 'download'
]);

//route to manage subscription or continue
Route::get('/subscribe/register', [
    'uses' => 'SubscriptionsController@subscribeOrContinue',
    'as' => 'subscription.orContinue'
]);

//route to manage subscription or continue
Route::post('/subscribe/plan', [
    'uses' => 'SubscriptionsController@register',
    'as' => 'subscription.plan'
]);

//route to verify email address
Route::get('/email_verification/{email}/{token}', [
    'uses' => 'SubscriptionsController@emailVerify',
    'as' => 'subscription.verify'
]);

//route to verify email address
Route::get('/subscribe/subtype/{email}/{id}', [
    'uses' => 'SubscriptionsController@subtypeForm',
    'as' => 'subscription.subscriptionchoice'
]);

//route to verify email address
Route::post('/subscribe/subtype', [
    'uses' => 'SubscriptionsController@subtypeForm',
    'as' => 'subscription.subscriptionchoices'
]);


/**
 *  Routes for admin section of app
 *  All routes will be protected by middleware 
*/
Route::group(['middleware' => 'isloggedin'] , function(){

    //get dashboard for logged in user
    Route::get('/dashboard', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard'
    ]);

    //logout
    Route::get('/logout', [
        'uses'=> 'LogoutController@logout',
        'as' => 'admin.logout'
    ]);

    //create news-content form
    Route::get('/news/create', [
        'uses'=> 'NewsController@create',
        'as' => 'news.index'
    ]);

    //store new article
    Route::POST('/news/create', [
        'uses'=> 'NewsController@store',
        'as' => 'news.store'
    ]);

    //manage news article
    Route::get('/news/manage', [
        'uses'=> 'NewsController@index',
        'as' => 'news.manage'
    ]);

    //edit news article
    Route::get('/news/manage/edit/{id}', [
        'uses'=> 'NewsController@edit',
        'as' => 'news.edit'
    ]);

    //update news article
    Route::POST('/news/update/{id}', [
        'uses'=> 'NewsController@update',
        'as' => 'news.update'
    ]);

    //delete news article
    Route::post('/news/delete', [
        'uses'=> 'NewsController@delete',
        'as' => 'news.delete'
    ]);

    //approve news article
    Route::get('/news/approve/{id}', [
        'uses'=> 'NewsController@approve',
        'as' => 'news.approve'
    ]);

    //create new advert
    Route::get('/advert/create', [
        'uses'=> 'AdvertsController@create',
        'as' => 'advert.create'
    ]);

    //create new advert
    Route::post('/advert/store', [
        'uses'=> 'AdvertsController@store',
        'as' => 'advert.store'
    ]);

    //create advert code
    Route::post('/advert/generatecode', [
        'uses'=> 'AdvertsController@generateCode',
        'as' => 'advert.codeGeneration'
    ]);

    //manage adverts
    Route::get('/advert/manage', [
        'uses'=> 'AdvertsController@index',
        'as' => 'advert.manage'
    ]);

    //approve advert
    Route::get('/advert/approve/{id}', [
        'uses'=> 'AdvertsController@approve',
        'as' => 'advert.approve'
    ]);

    //delete advert
     Route::post('/advert/delete', [
        'uses'=> 'AdvertsController@delete',
        'as' => 'advert.delete'
    ]);

    //edit news article
    Route::get('/advert/manage/edit/{id}', [
        'uses'=> 'AdvertsController@edit',
        'as' => 'advert.edit'
    ]);

    //update advert
    Route::POST('/advert/update/{id}', [
        'uses'=> 'AdvertsController@update',
        'as' => 'advert.update'
    ]);

    //create litigation form
    Route::get('/legistlation/create', [
        'uses'=> 'LegislationController@create',
        'as' => 'legislation.create'
    ]);

    //post litigation to database
    Route::post('/legistlation/store', [
        'uses'=> 'LegislationController@store',
        'as' => 'legislation.store'
    ]);

    //manage litigation
    Route::get('/legistlation/manage', [
        'uses'=> 'LegislationController@index',
        'as' => 'legislation.index'
    ]);

    //approve litigation
    Route::get('/legistlation/approve/{id}', [
        'uses'=> 'LegislationController@approve',
        'as' => 'legislation.approve'
    ]);

    //edit litigation
    Route::get('/legistlation/edit/{id}', [
        'uses'=> 'LegislationController@edit',
        'as' => 'legislation.edit'
    ]);

    //update litigation
    Route::POST('/legistlation/update/{id}', [
        'uses'=> 'LegislationController@update',
        'as' => 'legislation.update'
    ]);

    //delete litigation
    Route::get('/legistlation/delete/{id}', [
        'uses'=> 'LegislationController@delete',
        'as' => 'legislation.delete'
    ]);

    //create notification form
    Route::get('/notification/create', [
        'uses'=> 'NotificationController@create',
        'as' => 'notification.create'
    ]);

    //post notification to database
    Route::post('/notification/store', [
        'uses'=> 'NotificationController@store',
        'as' => 'notification.store'
    ]);

    //manage notifications
    Route::get('/notification/manage', [
        'uses'=> 'NotificationController@index',
        'as' => 'notification.index'
    ]);

    //delete notifications
    Route::post('/notification/delete', [
        'uses'=> 'NotificationController@delete',
        'as' => 'notification.delete'
    ]);

}); //end of route group  


/**
 *  Routes for admin section of app
 *  All routes will be protected by middleware 
*/
Route::group(['middleware' => 'loggedIn' ] , function(){

    //login for goshentax admin signin
    Route::get('/admin/login', [
        'uses' => 'LoginController@index',
        'as' => 'admin.login.index'
    ]); 

    //login for goshentax admin signin form
    Route::post('/admin/login', [
        'uses' => 'LoginController@login',
        'as' => 'admin.login'
    ]); 

});
