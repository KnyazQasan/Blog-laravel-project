<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Author;
use Illuminate\Support\Facades\DB;
use App\Models\Author as AuthorModel;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    public function getAdminAuthor(){

        $author = AuthorModel::all();
       
        return view('Admin.author.author',[
            'author'=> $author
        ]);

       

        

    }
    public function addAuthor(){
        return view('Admin.author.add-author');
    }
    public function addAuthorPost(Author $request){
        $slug = Str::slug($request->get('name'));
      
        $author = AuthorModel::create([
            'name'=>$request->get('name'),
            'slug'=> $slug
        ]);
      
       
        return redirect()->route('getAdminAuthor');


        
    }
    public function deleteAuthor($id){
       
        $deletedAuthor = AuthorModel::where('id',$id)->delete();
       
        return redirect()->route('getAdminAuthor');
    }
    public function editAuthor($id){
        
      
        $author = AuthorModel::find($id);
       
        
        return view('Admin.author.edit-author',[
            'author'=> $author
        ]);
    }
    public function editAuthorPost(Author $request,$id){
        $slug = Str::slug($request->get('name'));
       
        $author = AuthorModel::find($id)->update([
            'name'=>$request->get('name'),
            'slug'=> $slug
        ]);
       
        return redirect()->route('getAdminAuthor');
    }
}

