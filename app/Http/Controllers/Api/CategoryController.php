<?php

namespace App\Http\Controllers\Api; // incase you want to use the base Controller class
use App\Http\Controllers\Controller; // incase you want to use the base Controller class
use App\Models\Category; // incase you want to use the Category model
use Illuminate\Http\Request; //incase you want to use the Request class
use Illuminate\Support\Facades\Validator; // incase you want to use the Validator facade

class CategoryController extends Controller
{
    //display a listing of the resource
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'success' => true,
            'message' => 'Categories retrieved successfully',
            'data' => $categories
        ]);
    }

    //store a newly created resource in storage
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'description' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        $category = Category::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'data' => $category
        ], 201);
    }

    //display the specified resource
    public function show(string $id)
    {
        $category = Category::find($id);
        
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Category retrieved successfully',
            'data' => $category
        ]);
    }

    //update the category
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'description' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $category->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
            'data' => $category
        ]);
    }

    //remove the category and all its products
    public function destroy(string $id)
    {
        $category = Category::find($id);
        
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully'
        ]);
    }
}
