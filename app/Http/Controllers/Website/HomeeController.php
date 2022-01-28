<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class HomeeController extends Controller
{
    public function getHome()
    {
        $homeNews = News::where('h_view',1)->orderBy('id','desc')->limit(5)->get();
        $category = Category::where('h_view',1)->get();
        $news = News::orderBy('created_at','desc')->paginate(200);
       
        return view('Website.home',[
            'homeNews' => $homeNews,
            'nfc' => $category,
            'news' => $news
        ]);
    }
    public function getSingleNews($slug){
        $news = News::where('slug',$slug)->first();

        if($news == null){
            return view('404');
        }
        else{
            $news->increment('reading_count');
            return view('Website.singlenews',[
                'singleNews' => $news
            ]);
        }
    }
    public function getCategory($category){
        $category = Category::where('name',$category)->first();
        if($category == null){
            return view('404');
        }
        else{
            $news = News::where('category_id',$category->id)->paginate(200);
            return view('Website.category',[
                'category' => $category,
                'news' => $news
            ]);
        }

    }
    public function getAuthor($author){
        $author = Author::where('name',$author)->first();

        if($author == null){
            return view('404');
        }
        else{
            $news = News::where('author_id',$author->id)->paginate(200);
            return view('Website.author',[
                'author' => $author,
                'news' => $news
            ]);        
        
        }
    }
    public function postSearch(Request $request){
        $searched = $request->get('text');
        if($searched == null) {
            return redirect()->route('getHome');
        }
        $news = News::where ( 'caption', 'LIKE', '%'.$searched.'%' )->orWhere ( 'text', 'LIKE', '%'.$searched .'%' )->paginate(200);
        
       
        return view('Website.search',[
            'news' => $news,
            'searched' => $searched
        ]);
    }
    
    public function getContact(){
        return view('Website.contact');
    }
  

    
}
