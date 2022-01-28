<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function getAdminCategory(){ 
        $category = Category::all();
        return view('Admin.category.category',[
            'category' => $category
        ]);
    }
    public function addCategory(){
        return view('Admin.category.add-category');
    }

    public function addCategoryPost(CategoryRequest $request){
        if($request->get('home_view') and $request->get('home_view') == 'on' ){
            $h_view = 1;
        }
        else{
            $h_view = 0;

            
        }
        $slug = Str::slug($request->get('name'));
        $category = Category::create([
            'name'=>$request->get('name'),
            'h_view' => $h_view,
            'slug' => $slug

        ]);

       
        return redirect()->route('getAdminCategory');
        
    }
    public function deleteCategory($id){
       
        $delete = Category::find($id)->delete();
       
        return redirect()->route('getAdminCategory');

    }
    public function editCategory($id){
        $category = Category::find($id);

        return view('Admin.category.edit-category',[
            'category' => $category
        ]);
    }
    public function editCategoryPost(CategoryRequest $request,$id){
        if($request->get('home_view') and $request->get('home_view') == 'on' ){
            $h_view = 1;
        }
        else{
            $h_view = 0;

            
        }
        $slug = Str::slug($request->get('name'));
        Category::find($id)->update([
            'name' => $request->get('name'),
            'h_view' => $h_view,
            'slug' => $slug
        ]);
        return redirect()->route('getAdminCategory');

    }
   
}
