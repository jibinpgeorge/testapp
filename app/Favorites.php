<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = "favorites";
  	public $timestamps = false;

    // relation user
    public function getUser(){
        return $this->BelongsTo('App\User','user_id');
    }

  	public function saveDetails($post_id,$user_id, $bike){
  		$data = [];
  		$favor = $this::where('post_id','=',$post_id)
  		->where('user_id','=',$user_id)
  		->first();

  		if($favor !== null){
  			$favor->delete();
  			$data = ['post_id'=>$post_id,'message'=>'deleted'];
  		} else {
  			$favorite = new $this;
  			$favorite->post_id = $post_id;
  			$favorite->user_id = $user_id;
  			$favorite->station_name = $bike->stationName;
  			$favorite->available_docks = $bike->availableDocks;
  			$favorite->total_docks = $bike->totalDocks;

  			$favorite->status_value = $bike->statusValue;
  			$favorite->available_bikes = $bike->availableBikes;
  			$favorite->address = $bike->stAddress1;
  			$favorite->save();
  			$data = ['post_id'=>$post_id,'message'=>'favorited'];
  		}
  		return $data;
  	}

  	public function getAllFavorites($user_id){
  		$favor = $this::where('user_id','=',$user_id)
  		->get();
  		return $favor;
  	}

    public function deleteBookMark($post_id, $user_id){
        $favor = $this::where('post_id','=',$post_id)
        ->where('user_id','=',$user_id)
        ->first();
        if($favor){
            $favor->delete();
            $data = ['post_id'=>$post_id,'message'=>'deleted'];
        } else {
            $data = ['post_id'=>$post_id,'message'=>'unauthorized'];
        }
        return $data;
    }
}