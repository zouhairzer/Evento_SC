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



    public function AfficheCategory()
    {
        $category = Category::paginate(5);
        return view('admin.table', compact('category'));
    }



    public function deleteCategory($id)
    {
       
        $delete = Category::find($id);
        $delete->delete();
        return redirect()->back();
    }
 


    public function getCategory($id)
    {
        $category = Category::find($id);
        return view('admin.update_category',compact('category'));
    }


    
    public function updateCategory(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->category = $request->category;
        $category->update();
        // dd($category); 
        return redirect('/table')->with('succes','Update Success'); 
    }


    public function filter(Request $request)
    {
        
        $category= $request->input('category');

        $categories = Category::where('category',$category)->get();

        return view('index', compact('categories'));
    }
}
