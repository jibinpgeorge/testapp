<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Config;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use HTML;

class BikeController extends Controller
{

    //Home page controller
    public function getIndex(){
        
        $favorites = new \App\Favorites();

        $bikeapi = 'https://feeds.citibikenyc.com/stations/stations.json';
        $bikeDetails = $this->curlFetch($bikeapi);
        $bikeDetails = json_decode($bikeDetails);
        Session::set('bikeDetails', $bikeDetails);
        $allFavorites = $favorites->getAllFavorites(Auth::user()->id);
        $post_ids = $allFavorites->pluck('post_id')->toArray();
        return view('site.index',compact('bikeDetails','post_ids'));
    }

    //Favourites page controller
    public function getFavorites(){
        $favorites = new \App\Favorites();
        $bikeDetails = $favorites->getAllFavorites(Auth::user()->id);
        return view('site.favorites',compact('bikeDetails'));
    }

    //Comment page controller
    public function getPost($post_id){
        $bike = [];
        $collection = Session::get('bikeDetails')->stationBeanList;
        $comments = new \App\Comments();
        foreach ($collection as $collect) {
            if($collect->id == $post_id){
                $bike = $collect;
            }
        }
        $allComments = $comments->getComments($post_id);
        return view('site.post',compact('bike','allComments'));
    }

    //Adding Comments
    public function postPost($post_id){
        $v =  Validator::make(Input::all(),
            [
               'comment'=> 'required', 
            ]
        );
        if($v->fails()) {
            return back()->withInput()->withErrors($v);
        }
        $comment = Input::get('comment');
        $user_id = Auth::user()->id;
        $comments = new \App\Comments();
        $commentStatus = $comments->addComment($post_id, $user_id, $comment);
        return redirect('home/post/'.$post_id)->with('message','Comment Added');
    }

    //Add to favourites
    public function postAjax(){

        $bike = [];
        $post_id = Input::get('post_id');
        $user_id = Auth::user()->id;
        $favorites = new \App\Favorites();
        $collection = Session::get('bikeDetails')->stationBeanList;
        foreach ($collection as $collect) {
            if($collect->id == $post_id){
                $bike = $collect;
            }
        }
        if($post_id !== null && $bike){
            $data = $favorites->saveDetails($post_id, $user_id, $bike);
            return $data;
        }
    }

    //Delete favourites using ajax
    public function postAjaxdelete(){
        $post_id = Input::get('post_id');
        $user_id = Auth::user()->id;
        $favorites = new \App\Favorites();
        $data = $favorites->deleteBookMark($post_id, $user_id);
        return $data;
    }

    // curl data fetch function
    public function curlFetch($url){
        $ch = curl_init();  
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output=curl_exec($ch);
     
        curl_close($ch);
        return $output;
    }
}