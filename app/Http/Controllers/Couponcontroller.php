<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class Couponcontroller extends Controller
{
    public function addcoupon (Request $request)
    {
        //echo $request->b;
       
        //insert
        Coupon::create([
        'name' => $request -> name ,
        'price' => $request -> price ,
        'type' => $request -> type ,
        'percentage' => $request -> percentage ,
        'done' => $request -> done ,
        'exp_date' => $request -> exp_date ,

        

        
    ]);
    }

    public function showcoupon()
    {
        $coupon= coupon::all();

     //  if($coupon -> done == '0')
        
        
        return Coupon::select('name','price','type','percentage','exp_date','done')->get();
        
    }
    public function buycoupon($id,Request $request)
    {
        $coupon= coupon::find($id);
        $user_id=$request->user_id;
        $user=User::find($user_id);
        if($user -> point >= $coupon -> price)
        {
        $coupon->done ="true";
        $coupon->user_id = $request->get('user_id');
        $coupon->save();
        $user-> point =$user -> point - $coupon -> price ;
        $user ->save();
        return $coupon;
        } 
          
    }
    /*public function destroy()
    {
        $coupon= Coupon::all;
        if($coupon->exp_date >= now())
        $product->delete();
      //  return $this->sendResponse(new ProductResources($product),'Product Deleted successfully!');
    }*/
    public function order_price(){
        $coupon= coupon::orderBy('price','ASC')->get();
        return $coupon;
    }
    public function searchByType($type)
    {
        return coupon::where('type' , 'like' , '%'.$type.'%')->get();
    }

}
