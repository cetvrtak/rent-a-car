<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = $request->per_page ? $request->per_page : 10;
        $currentPage = $request->current_page ? $request->current_page : 1;
        
        $categories = Category::paginate($perPage, ["*"], "page", $currentPage);
        $response = new APIPaginateCollection($categories, CategoryResource::class);
        return response()->json($response);
    }

    /**
     * Create new Category
     */public function createNew()
     {
        return view('create_category');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create($request->only("name","price","parent_id"));
        return response()->json(["data" => [
            "success" => true
        ]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $response = new CategoryResouce($category);
        return response()->json(["data" => [
            "success" => true
        ]]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->only("name","price","parent_id"));
        return response()->json(["data" => [
            "success" => true
        ]]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return response()->json(["data" => [
            "success" => true
        ]]);
    }
}
