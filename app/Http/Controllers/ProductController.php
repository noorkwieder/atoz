<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $category_id = $request->input('cata_id');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');
        $key_search = $request->input('key_search');
        $order_by = $request->input('order_by');

        $productQuery = Product::query();

        if ($category_id)
            $productQuery->where('category_id', $category_id);

        if ($price_from)
            $productQuery->where('price', '>=', $price_from);

        if ($price_to)
            $productQuery->where('price', '<=', $price_to);

        if ($key_search)
            $productQuery->where(function ($Q) use ($key_search) {
                $Q->where('name', 'like', '%'.$key_search.'%')
                    ->orWhere('description', 'like', '%'.$key_search.'%');
            });

        if ($order_by)
            $productQuery->orderBy($order_by);

        $productQuery->whereDate('exp_date', '>=', now());

        $product = $productQuery->get();
        return $this->sendresponse($product);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'price'=>['required', 'numeric'],
            'exp_date'=> ['required', 'date'],
            'description'=>'required',
            'quantity'=>'required',
            'img_url'=>'required',
            'category_id'=> ['required', 'numeric', Rule::exists('categories', 'id')]
        ]);

        $product = Product::query()->create([
            'name' => $request->name,
            'price' => $request->price,
            'exp_date' => $request->exp_date,
            'description' => $request->description,
            'img_url' => $request->img_url,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);

        foreach ($request->list_discount as $discount){
            $product->sales()->create([
                'date' => $discount['date'],
                'discount' => $discount['discount']
            ]);
        }

        return $this->sendResponse($product);
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        $product->increment('views');
        $sales=$product->sales()->get();

        $maxDiscount=null;
        foreach ($sales as $sale ) {
            if (carbon::parse($sale['date']) <= now()) {
                $maxDiscount=$sale;
            }
        }

        if (!is_null($maxDiscount)) {
            $discount_value = ($product->price * $maxDiscount['discount']) / 100;
            $product['new_price'] = $product->price - $discount_value;
        }else{
            $product['new_price'] = $product->price;
        }

        return $this->sendResponse($product);
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name'=>'required',
            'price'=>['required', 'numeric'],
            'description'=>'required',
            'quantity'=>'required',
            'img_url'=>'required',
            'category_id'=> ['required', 'numeric', Rule::exists('categories', 'id')]
        ]);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'img_url' => $request->img_url,
            'category_id' => $request->category_id,
        ]);

        return $this->sendResponse($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $this-> sendresponse(null);
    }
}