<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function AjouterCategory(Request $request)
    {
        $categories = Category::where('category', $request->category)->first();
        
        if(!$categories){

            $category = new Category();
            $category->category = $request->category;
            $category->save();
            
            return redirect()->back()->with('success','Ajoute avec success');
        }
        else{
            return redirect()->back()->with('Error','Category already Exist');
        }
    }

    public function getCategory()
    {
        $category = Category::paginate(2);
        return view('organisateur.table', compact('category'));
    }

    public function deleteCategory($id)
    {
       
        $delete = Category::find($id);
        $delete->delete();
    }
 
}
