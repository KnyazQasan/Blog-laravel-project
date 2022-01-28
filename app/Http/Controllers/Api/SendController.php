<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestComment;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Subs;
use App\Http\Requests\RequestContact;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RequestSubs;
use App\Http\Requests\RequestActiveSubs;

class SendController extends Controller
{
    public function sendComment(RequestComment $request){

        $validator = Validator::make($request->all(), $request->rules());
        
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        try {
            $comment = Comment::create([
                'news_id' => $request->news,
                'username' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment
            ]);
            
        } catch (\Exception $e) {
            return response()->json(['success'=>false,'my-message'=> $e->getMessage()]);
        }
        $lastComment = array(
            'username' => $request->name,
            'created_at'=> \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('d/m/y H:i'),
            'comment' => $request->comment
        );
        return response()->json([
            'success' => true,
            'lastcomment' => $lastComment
            
        ]);
    }

    public function sendMessage(RequestContact $request){
        $validator = Validator::make($request->all(), $request->rules());
        
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        try {
            $details = array(
                'name'=> $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'message' => $request->message
            );
            Mail::to('hknyaz73@gmail.com')->send( new \App\Mail\ContactMail($details));
        } catch (\Exception $e) {
            return response()->json(['success'=>false,'my-message'=> $e->getMessage()]);
           
        }
        return response()->json([
            'success'=>true
            
        ]);

    }
    public function sendAndAddSubs(RequestSubs $request){
        $validator = Validator::make($request->all(),$request->rules());
        if($validator->fails()){
            return response()->json(['success'=>false,'errors'=>$validator->errors()->all()]);
        }
        try {
            $subs = Subs::where('email',$request->email)->first();
    
        } catch (\Exception $e) {
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
            
        }
        if($subs == null){
            $rand = rand(10000,99999);
            $subs = Subs::create([
                'email' => $request->email,
                'is_active' => 0,
                'active_code' => $rand
            ]);
            $details = array(
                'code'=>$rand,
            );
            Mail::to($request->email)->send( new \App\Mail\SubsMail($details));

            return response()->json(['success'=>true,'subs'=>null]);
        } 
        elseif($subs->is_active == 1) {
            return response()->json(['success'=>true,'subs'=>1]);
        }
        elseif($subs->is_active == 0) {
            $details = array(
                'code'=>$subs->active_code
            );
            Mail::to($request->email)->send( new \App\Mail\SubsMail($details));
            return response()->json(['success'=>true,'subs'=>0]);
        }
        
    }
    public function activeSubs(RequestActiveSubs $request){
        $validator = Validator::make($request->all(),$request->rules());

        if($validator->fails()){
            return response()->json(['success'=>false,'errors'=>$validator->errors()->all()]);
        }
       
        $subs = Subs::where('email',$request->email)->first();
        if($subs == null){
            return response()->json(['success'=>false,'subs'=>null]);
        }

        if($subs->is_active == 1){
            return response()->json(['success'=>false,'subs'=>1]);
        }
        if($subs->is_active == 0){
            if($subs->active_code == $request->code){
                $subs->update([
                    'is_active' => 1
                ]);
                return response()->json(['success'=>true,'subs'=>'active']);
            }
            else{
                return response()->json(['success'=>false,'subs'=>'deactive']);

            }

        }
        
       

    }
}
