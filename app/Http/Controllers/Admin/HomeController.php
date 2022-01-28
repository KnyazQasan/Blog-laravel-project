<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\News;
use App\Http\Requests\RequestAddNews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RequestNewsEdit;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    
    public function getAdminHome(){
        $news = News::all();

        return view('Admin.news.home',[
            'news'=>$news
        ]);
    }
    public function addNews(){
        $author = Author::all();
        $category = Category::all();

        return view('Admin.news.add-news',[
            'author' => $author,
            'category' => $category
        ]);
    }
    protected function sendMail($caption,$slug){
        $subs = DB::table('subscribers')->select('email','is_active')->get();
        $url = url("/news/".$slug);
        $news_url = url('/');
        $details = [
            'caption' => $caption,
            'url' => $url,
            'news_url'=> $news_url
        ];
        foreach($subs as $sub){
            if($sub->is_active == 1){
                Mail::to($sub->email)->send( new \App\Mail\NewsMail($details));
            }
        }
    }
    public function addNewsPost(RequestAddNews $request){
        $slug = Str::slug($request->caption);
        

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $new_name = Str::slug($request->caption)."-".Str::slug(Carbon::now()).'.'.$extension;

        $image->move('img/news_image/',$new_name);
        if($request->h_view and $request->h_view == 'on' ){
            $h_view = 1;
            $this->sendMail($request->caption,$slug);
        }
        else{
            $h_view = 0;
        }

        if($request->c_view and $request->c_view == 'on' ){
            $c_view = 1;
        }
        else{
            $c_view = 0;
        }
       
        News::create([
            'category_id' => $request->category_id,
            'author_id' => $request->author_id,
            'caption' => $request->caption,
            'h_view' =>$h_view,
            'c_view' => $c_view,
            'text' => $request->text,
            'min_text' => $request->mintext,
            'image' => $new_name,
            'slug' => $slug
        ]);

      

        return redirect()->route('getAdminHome');
        
       
    }

    

    public function deleteNews($id){
        $news = News::find($id);
        $image = $news->image;
        $news->delete();
        unlink(public_path().'\img\news_image\\'.$image);
        return redirect()->route('getAdminHome');

    }

    public function editNews($id){

        $author = Author::all();
        $category = Category::all();
        $news = News::find($id);

        return view('Admin.news.edit-news',[
            'author' => $author,
            'category' => $category,
            'editNews'=> $news            
        ]);

    }

    public function editNewsPost(RequestNewsEdit $request,$id){
        $news = News::find($id);
        $slug = Str::slug($request->caption);

        if($request->c_view and $request->c_view == 'on' ){
            $c_view = 1;
        }
        else{
            $c_view = 0;
        }
        if($request->h_view and $request->h_view == 'on' ){
            $h_view = 1;
            
        }
        else{
            $h_view = 0;
        }
        if($news->h_view == 0 and $request->h_view and $request->h_view =="on"){
            $this->sendMail($request->caption,$slug);
        }
        
        

        $news->update([
            'category_id' => $request->category_id,
            'author_id' => $request->author_id,
            'caption' => $request->caption,
            'h_view' =>$h_view,
            'c_view' => $c_view,
            'text' => $request->text,
            'min_text' => $request->mintext,
            'slug' => $slug
        ]);


        if($request->hasFile('image')){
            $old_name = $news->image;
            $image =  $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $new_name = Str::slug($request->caption).'-'.Str::slug(Carbon::now()).'.'.$extension;
            
            $news->update([
                'image'=> $new_name
            ]);
            $image->move('img/news_image/',$new_name);
            unlink(public_path().'\img\news_image\\'.$old_name);

        }

        return redirect()->route('getAdminHome');

    }

}
