<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = "comments";
  	public $timestamps = false;

    public function addComment($post_id, $user_id, $comment){
        $comments = new $this;
        $comments->post_id = $post_id;
        $comments->user_id = $user_id;
        $comments->comment = $comment;
        $comments->created_at = date('Y-m-d H:i:s');
        $comments->save();
        return true;
    }
    public function getUser(){
        return $this->BelongsTo('App\User','user_id');
    }
    public function getComments($post_id){

        $allComments = $this::with('getUser')
        ->where('post_id','=',$post_id)
        ->orderBy('created_at','desc')
        ->get();
        return $allComments;
    }
}