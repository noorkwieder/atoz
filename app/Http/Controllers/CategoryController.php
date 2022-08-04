<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:store_tour', ['only' => ['store']]);
        $this->middleware('permission:show_tour', ['only' => ['show','index']]);
        $this->middleware('permission:update_tour', ['only' => ['update']]);
        $this->middleware('permission:delet_tour', ['only' => ['destroy']]);
    }
    public function index()
    {
        $categories = Category::query()->get();

        return $this->sendResponse($categories);
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
           'name' => ['required', 'string', 'max:180', 'min:3']
        ]);

        $category = Category::query()->create([
           'name' => $request->name
        ]);

        return $this->sendResponse($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $this->sendResponse($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:180', 'min:3']
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return $this->sendResponse($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->sendResponse(null);
    }
}
