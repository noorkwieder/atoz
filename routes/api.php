<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\usercontroller;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::post('/es',[\App\Http\Controllers\EBookingcontroller::class, 'store']);
route::get('saverest/{saverest}',[\App\Http\Controllers\SaveresturantController::class, 'show']);
route::get('saverest',[\App\Http\Controllers\SaveresturantController::class, 'index']);

route::post('/rb',[\App\Http\Controllers\HotelController::class, 'store']);


//route::post('/escort',[\App\Http\Controllers\EscortController::class, 'store']);





/*Route::prefix('auth')->group(function (){
   
    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
   
});*/
Route::get('showpro/{user}', [\App\Http\Controllers\AuthController::class, 'show']);
Route::prefix('products')->group(function (){
    route::get('/',[\App\Http\Controllers\ProductController::class, 'index']);
});

Route::prefix('categories')->group(function (){
    route::get('/',[\App\Http\Controllers\CategoryController::class, 'index']);
    route::post('/',[\App\Http\Controllers\CategoryController::class, 'store']);
    route::get('/{category}',[\App\Http\Controllers\CategoryController::class, 'show']);
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('taxi', TaxiController::class);
});

Route::middleware('auth:api')->group(function (){

    Route::prefix('products')->group(function (){
        route::post('/',[\App\Http\Controllers\ProductController::class, 'store']);
        route::get('/{product}',[\App\Http\Controllers\ProductController::class, 'show']);
        route::put('/{product}',[\App\Http\Controllers\ProductController::class, 'update']);
        route::delete('/{product}',[\App\Http\Controllers\ProductController::class, 'destroy']);
    });

   
});

route::post('/all',[\App\Http\Controllers\ResturantController::class, 'store']);
route::get('all/{resturant}',[\App\Http\Controllers\ResturantController::class, 'show']);
route::put('all/{resturant}',[\App\Http\Controllers\ResturantController::class, 'update']);
route::delete('all/{resturant}',[\App\Http\Controllers\ResturantController::class, 'destroy']);


  
  route::post('/country',[\App\Http\Controllers\CountryController::class, 'store']);

  
  route::get('country/{country}',[\App\Http\Controllers\CountryController::class, 'show']);
  route::post('/covernorate',[\App\Http\Controllers\CovernorateController::class, 'store']);

  
  route::get('covernorate/{covernorate}',[\App\Http\Controllers\CovernorateController::class, 'show']);
 
 //route::post('/taxi',[\App\Http\Controllers\TaxiController::class, 'store']);


 //route::post('/cov',[\App\Http\Controllers\RoleController::class, 'store']);

    
 // هون كلشي روابط عن تكسي
Route::middleware('auth:api')->group(function (){
    route::post('/taxistore',[\App\Http\Controllers\TaxiController::class, 'store']);
    route::get('taxishow/{taxi}',[\App\Http\Controllers\TaxiController::class, 'show']);
    route::get('taxiallshow',[\App\Http\Controllers\TaxiController::class, 'index']);
    route::post('taxiupdateprice/{taxi}',[\App\Http\Controllers\TaxiController::class, 'updateprice']);
route::delete('taxidestroy/{taxi}',[\App\Http\Controllers\TaxiController::class, 'destroy']);

});
    // كلشي عن مطعم
Route::middleware('auth:api')->group(function (){
    route::post('/resturantstore',[\App\Http\Controllers\ResturantController::class, 'store']);
route::get('resturantshow/{resturant}',[\App\Http\Controllers\ResturantController::class, 'show']);
route::get('resturantallshow',[\App\Http\Controllers\ResturantController::class, 'index']);
route::post('resturantupdatephone/{resturant}',[\App\Http\Controllers\ResturantController::class, 'updatephone']);
route::post('resturantupdatetime/{resturant}',[\App\Http\Controllers\ResturantController::class, 'updatetime']);
route::post('resturantupdateimg/{resturant}',[\App\Http\Controllers\ResturantController::class, 'updateimg']);
route::delete('resturantdestroy/{resturant}',[\App\Http\Controllers\ResturantController::class, 'destroy']);


});
//طاولات مطعم
  Route::middleware('auth:api')->group(function (){
    route::post('/tablestore',[\App\Http\Controllers\TabletController::class, 'store']);
    route::get('tableshow/{tablet}',[\App\Http\Controllers\TabletController::class, 'show']);
    route::get('tableallshow',[\App\Http\Controllers\TabletController::class, 'index']);
    route::post('tableupdatefree/{tablet}',[\App\Http\Controllers\TabletController::class, 'updatefree']);
    route::delete('tabledestroy/{tablet}',[\App\Http\Controllers\TabletController::class, 'destroy']);


});

//حجز مطعم
Route::prefix('auth')->group(function (){
   
  
    Route::post('storerbook', [\App\Http\Controllers\RBookingController::class, 'store']);
    Route::get('allrbook', [\App\Http\Controllers\RBookingController::class, 'index']);
    Route::get('showrbook/{rbook}', [\App\Http\Controllers\RBookingController::class, 'show']);
    Route::delete('deletrbook/{rbook}', [\App\Http\Controllers\RBookingController::class, 'destroy']);
    Route::post('updaterbookdone/{rbook}', [\App\Http\Controllers\RBookingController::class, 'updatedone']);
   
});


//كلشي عن اوتيل
 Route::middleware('auth:api')->group(function (){
    route::post('/hotelstore',[\App\Http\Controllers\HotelController::class, 'store']);
route::get('hotelshow/{hotel}',[\App\Http\Controllers\HotelController::class, 'show']);
route::get('hotelallshow',[\App\Http\Controllers\HotelController::class, 'index']);
route::post('updatephone/{hotel}',[\App\Http\Controllers\HotelController::class, 'updatephone']);
route::post('updateimg/{hotel}',[\App\Http\Controllers\HotelController::class, 'updateimg']);
route::delete('hoteldestroy/{hotel}',[\App\Http\Controllers\HotelController::class, 'destroy']);


});
//غرف اوتيل
  Route::middleware('auth:api')->group(function (){
    route::post('/rtstore',[\App\Http\Controllers\RoomtypeController::class, 'store']);
    route::get('rtshow/{roomtype}',[\App\Http\Controllers\RoomtypeController::class, 'show']);
    route::get('rtallshow',[\App\Http\Controllers\RoomtypeController::class, 'index']);
    route::post('rtupdatefree/{roomtype}',[\App\Http\Controllers\RoomtypeController::class, 'updatefree']);
    route::post('rtupdateprice/{roomtype}',[\App\Http\Controllers\RoomtypeController::class, 'updateprice']);
    route::delete('rtdestroy/{roomtype}',[\App\Http\Controllers\RoomtypeController::class, 'destroy']);


});

//حجز اوتيل
Route::prefix('auth')->group(function (){
   
  
    Route::post('storehbook', [\App\Http\Controllers\HBookingController::class, 'store']);
    Route::get('allhbook', [\App\Http\Controllers\HBookingController::class, 'index']);
    Route::get('showhbook/{hbook}', [\App\Http\Controllers\HBookingController::class, 'show']);
    Route::delete('delethbook/{hbook}', [\App\Http\Controllers\HBookingController::class, 'destroy']);
    Route::post('updatehbookdone/{hbook}', [\App\Http\Controllers\HBookingController::class, 'updatedone']);
   
});




// تصنيف مكان السياحي
   Route::middleware('auth:api')->group(function (){
 
    route::post('/cstore',[\App\Http\Controllers\CategoryController::class, 'store']);
route::get('cshow/{category}',[\App\Http\Controllers\CategoryController::class, 'show']);
route::get('callshow',[\App\Http\Controllers\CategoryController::class, 'index']);
 //  route::put('cupdate/{category}',[\App\Http\Controllers\CategoryController::class, 'update']);
   route::delete('cdestroy/{category}',[\App\Http\Controllers\CategoryController::class, 'destroy']);


});
// مكان سياحي
Route::middleware('auth:api')->group(function (){
 
    route::post('/tourstore',[\App\Http\Controllers\ToursimplaceController::class, 'store']);
route::get('tourshow/{toursimplace}',[\App\Http\Controllers\ToursimplaceController::class, 'show']);
route::get('tourallshow',[\App\Http\Controllers\ToursimplaceController::class, 'index']);
  // route::put('tourupdate/{toursimplace}',[\App\Http\Controllers\ToursimplaceController::class, 'update']);
   route::delete('tourdestroy/{toursimplace}',[\App\Http\Controllers\ToursimplaceController::class, 'destroy']);


});
//كلشي للمستخدم
Route::prefix('auth')->group(function (){
   
    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('showuser/{user}', [\App\Http\Controllers\AuthController::class, 'show']);
    Route::delete('deletuser/{user}', [\App\Http\Controllers\AuthController::class, 'destroy']);
   // Route::get('updateuser/{user}', [\App\Http\Controllers\AuthController::class, 'update']);
   
});
//كلشي عن المرافق
Route::prefix('auth')->group(function (){
   
  
    Route::post('storeescort', [\App\Http\Controllers\EscortController::class, 'store']);
    Route::get('allescort', [\App\Http\Controllers\EscortController::class, 'index']);
    Route::get('showescort/{escort}', [\App\Http\Controllers\EscortController::class, 'show']);
    Route::delete('deletescort/{escort}', [\App\Http\Controllers\EscortController::class, 'destroy']);
    Route::post('updateescortfree/{escort}', [\App\Http\Controllers\EscortController::class, 'updatefree']);
    Route::post('updateescortphone/{escort}', [\App\Http\Controllers\EscortController::class, 'updatephone']);
    Route::post('updateescortprice/{escort}', [\App\Http\Controllers\EscortController::class, 'updateprice']);
});

//كلشي عن لغات المرافق
Route::prefix('auth')->group(function (){
   
  
    Route::post('storeescortlan', [\App\Http\Controllers\EscortlanController::class, 'store']);
    Route::get('allescortlan', [\App\Http\Controllers\EscortlanController::class, 'index']);
    Route::get('showescortlan/{escort}', [\App\Http\Controllers\EscortlanController::class, 'show']);
    Route::delete('deletescortlan/{escort}', [\App\Http\Controllers\EscortlanController::class, 'destroy']);
 //   Route::put('updateescortlan/{escort}', [\App\Http\Controllers\EscortlanController::class, 'update']);
   
});
//كلشي عن حجز المرافق
Route::prefix('auth')->group(function (){
   
  
    Route::post('storeebook', [\App\Http\Controllers\EBookingController::class, 'store']);
    Route::get('allebook', [\App\Http\Controllers\EBookingController::class, 'index']);
    Route::get('showebook/{ebook}', [\App\Http\Controllers\EBookingController::class, 'show']);
    Route::delete('deletebook/{ebook}', [\App\Http\Controllers\EBookingController::class, 'destroy']);
    Route::post('updateebookdone/{ebook}', [\App\Http\Controllers\EBookingController::class, 'updatedone']);
   
});


//كلشي عن رحلة 
 Route::middleware('auth:api')->group(function (){
    route::post('/tripstore',[\App\Http\Controllers\TripController::class, 'store']);
route::get('tripshow/{trip}',[\App\Http\Controllers\TripController::class, 'show']);
route::get('tripallshow',[\App\Http\Controllers\TripController::class, 'index']);
route::post('tripupdatedate/{trip}',[\App\Http\Controllers\TripController::class, 'updatedate']);
route::post('tripupdatetime/{trip}',[\App\Http\Controllers\TripController::class, 'updatetime']);
route::delete('tripdestroy/{trip}',[\App\Http\Controllers\TripController::class, 'destroy']);


});
//انواع مقاعد الرحلة
  Route::middleware('auth:api')->group(function (){
    route::post('/ttstore',[\App\Http\Controllers\TriptypeController::class, 'store']);
    route::get('ttshow/{triptype}',[\App\Http\Controllers\TriptypeController::class, 'show']);
    route::get('ttallshow',[\App\Http\Controllers\TriptypeController::class, 'index']);
    route::put('ttupdatefree/{triptype}',[\App\Http\Controllers\TriptypeController::class, 'updatefree']);
    route::delete('ttdestroy/{triptype}',[\App\Http\Controllers\TriptypeController::class, 'destroy']);


});
//حجز رحلة
Route::prefix('auth')->group(function (){
   
  
    Route::post('storetbook', [\App\Http\Controllers\TBookingController::class, 'store']);
    Route::get('alltbook', [\App\Http\Controllers\TBookingController::class, 'index']);
    Route::get('showtbook/{hbook}', [\App\Http\Controllers\TBookingController::class, 'show']);
    Route::delete('delettbook/{hbook}', [\App\Http\Controllers\TBookingController::class, 'destroy']);
    Route::post('updatetbookdone/{hbook}', [\App\Http\Controllers\TBookingController::class, 'updatedone']);
   
}); 
//مطار
Route::prefix('auth')->group(function (){
   
  
    Route::post('storeairport', [\App\Http\Controllers\AirportController::class, 'store']);
    Route::get('allairport', [\App\Http\Controllers\AirportController::class, 'index']);
    Route::get('showairport/{airport}', [\App\Http\Controllers\AirportController::class, 'show']);
    Route::delete('deletairport/{airport}', [\App\Http\Controllers\AirportController::class, 'destroy']);
   
});

//شركة الطيران
Route::prefix('auth')->group(function (){
   
  
    Route::post('storecompany', [\App\Http\Controllers\CompanyController::class, 'store']);
    Route::get('allcompany', [\App\Http\Controllers\CompanyController::class, 'index']);
    Route::get('showcompany/{company}', [\App\Http\Controllers\CompanyController::class, 'show']);
    Route::delete('deletcompany/{company}', [\App\Http\Controllers\CompanyController::class, 'destroy']);
   
});


//البلدان
Route::prefix('auth')->group(function (){
   
  
    Route::post('storec', [\App\Http\Controllers\CountryController::class, 'store']);
    Route::get('allc', [\App\Http\Controllers\CountryController::class, 'index']);
    Route::get('showc/{country}', [\App\Http\Controllers\CountryController::class, 'show']);
    Route::delete('deletc/{country}', [\App\Http\Controllers\CountryController::class, 'destroy']);
   
});

//المحافظات
Route::prefix('auth')->group(function (){
   
  
    Route::post('storecc', [\App\Http\Controllers\Covernoratecontroller::class, 'store']);
    Route::get('allcc', [\App\Http\Controllers\Covernoratecontroller::class, 'index']);
    Route::get('showcc/{covenorate}', [\App\Http\Controllers\Covernoratecontroller::class, 'show']);
    Route::delete('deletcc/{covernorate}', [\App\Http\Controllers\Covernoratecontroller::class, 'destroy']);
   
});
//savepostfor resturant
Route::prefix('auth')->group(function (){
   
  
    Route::post('storeres', [\App\Http\Controllers\Saveresturantcontroller::class, 'store']);
    Route::get('allres', [\App\Http\Controllers\Saveresturantcontroller::class, 'index']);
    Route::get('showres/{resturant}', [\App\Http\Controllers\Saveresturantcontroller::class, 'show']);
    Route::delete('deletres/{resturant}', [\App\Http\Controllers\Saveresturantcontroller::class, 'destroy']);
   
});

//savepostfor resturant
Route::prefix('auth')->group(function (){
   
  
    Route::post('storeres', [\App\Http\Controllers\Saveresturantcontroller::class, 'store']);
    Route::get('allres', [\App\Http\Controllers\Saveresturantcontroller::class, 'index']);
    Route::get('showres/{resturant}', [\App\Http\Controllers\Saveresturantcontroller::class, 'show']);
    Route::delete('deletres/{resturant}', [\App\Http\Controllers\Saveresturantcontroller::class, 'destroy']);
   
});
//savepostfor toursimplace
Route::prefix('auth')->group(function (){
   
  
    Route::post('storets', [\App\Http\Controllers\ Savetourcontroller::class, 'store']);
    Route::get('allts', [\App\Http\Controllers\ Savetourcontroller::class, 'index']);
    Route::get('showts/{tour}', [\App\Http\Controllers\ Savetourcontroller::class, 'show']);
    Route::delete('deletts/{tour}', [\App\Http\Controllers\ Savetourcontroller::class, 'destroy']);
   
});
//savepostfor hotel
Route::prefix('auth')->group(function (){
   
  
    Route::post('storehs', [\App\Http\Controllers\  Savehotelcontroller::class, 'store']);
    Route::get('allhs', [\App\Http\Controllers\  Savehotelcontroller::class, 'index']);
    Route::get('showhs/{hotel}', [\App\Http\Controllers\  Savehotelcontroller::class, 'show']);
    Route::delete('deleths/{hotel}', [\App\Http\Controllers\  Savehotelcontroller::class, 'destroy']);
   
});

/*//copan
Route::prefix('auth')->group(function (){
   
  
    Route::post('storcop', [\App\Http\Controllers\  Couponcontroller::class, 'addcoupon']);
    Route::get('allcop', [\App\Http\Controllers\  Couponcontroller::class, 'showcoupon']);
    Route::post('upcop/{copon}', [\App\Http\Controllers\  Couponcontroller::class, 'buycoupon']);
    Route::get('sortcop',[\App\Http\Controllers\  Couponcontroller::class, 'order_price']);
    Route::get('typecop{type}',[\App\Http\Controllers\  Couponcontroller::class, 'searchByType']);

   
});*/
Route::post('storecop', [\App\Http\Controllers\  Couponcontroller::class, 'addcoupon']);
    Route::get('allcop', [\App\Http\Controllers\  Couponcontroller::class, 'showcoupon']);
    Route::post('upcop/{copon}', [\App\Http\Controllers\  Couponcontroller::class, 'buycoupon']);
    Route::get('sortcop',[\App\Http\Controllers\  Couponcontroller::class, 'order_price']);
    Route::get('typecop{type}',[\App\Http\Controllers\  Couponcontroller::class, 'searchByType']);

