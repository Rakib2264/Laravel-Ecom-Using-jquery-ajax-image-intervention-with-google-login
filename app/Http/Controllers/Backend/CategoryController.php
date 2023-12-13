<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.pages.category.manage');
    }

    public function storecat(Request $request)
    {
        $cat = new Category(); // Create a new Category model instance
        $cat->name = $request->name; // Set the 'name' attribute from the request data
        $cat->des = $request->des; // Set the 'des' attribute from the request data
        $cat->status = $request->status; // Set the 'status' attribute from the request data
        $cat->save(); // Save the new category to the database
        return response()->json(['msg' => 'Category added successfully']); // Return a JSON response
    }

    public function showcat()
    {
        $cats = Category::all();
        return response()->json([
            'status' => '200',
            'allData' => $cats
        ]);
    }

    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return response()->json([
            'msg' => 'Deleted',
        ]);
    }

    public function active($id)
    {
        $catactive = Category::find($id);
        $catactive->status = '2';
        $catactive->update();
        return response()->json([
            'msg' => 'Inactive',
        ]);
    }

    public function inactive($id)
    {
        $catinactive = Category::find($id);
        $catinactive->status = '1';
        $catinactive->update();
        return response()->json([
            'msg' => 'Active',
        ]);
    }
    public function edit($id)
    {
        $cat = Category::find($id);
        return response()->json([
            'allData' => $cat
        ]);
    }

    public function update(Request $request , $id)
    {
        $cat = Category::find($id);
        $cat->name = $request->name;
        $cat->des = $request->des;
        $cat->status = $request->status;
        $cat->update();
        return response()->json([
            'msg' => "updated"
        ]);
    }
}
