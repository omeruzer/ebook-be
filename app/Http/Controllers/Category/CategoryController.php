<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $authors = Category::orderByDesc('id')->paginate(10);

        return response()->json($authors);
    }
    public function detail($id)
    {

        $category = Category::find($id);

        return response()->json($category);
    }
    public function add(Request $request)
    {
        $category = Category::create($request->all());

        return response()->json($category);
    }
    public function edit(Request $request, $id)
    {
        $category = Category::where('id', $id)->update($request->all());

        return response()->json($category);
    }
    public function remove($id)
    {
        $category = Category::where('id', $id)->delete();

        return response()->json($category);
    }
}
