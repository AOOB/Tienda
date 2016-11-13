<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comments as comments;
use DB;
class commentsController extends Controller
{
	public function NewComment(Request $new_comment) {
		$comment = new comments;

		$comment->comment=$new_comment->input('inputComment');
		$comment->product_id=$new_comment->input('inputProductId');
		$comment->user_id=$new_comment->input('inputUserId');


		if ($comment->save()){

			return Redirect('/Producto/'.$comment->product_id);	
		}

		echo "<script> alert('Ha ocurrido un error, favor de intentar más tarde'); </script>";
		return $comment;
	}
	public function ListComments(){
		$comments = DB::table('comments as c')->join('users as u','u.id','=','c.user_id')->join('products as p','p.id','=','c.product_id')->select('c.id','c.comment','p.name as product_name','p.id as product_id','u.id as user_id','u.name')->where('approved','=',0)->get();
		return view('adminpanel.commentList', compact('comments'));
	}

	public function CommentAction(Request $comment_action) {
		$comment_id = $comment_action->input('inputCommentId');
		$comment = comments::find($comment_id);

		if (!$comment_action->input('inputOption')){
			$comment->approved=1;
			$comment->save();
		}else{
			$comment->delete();
		}

		$comments = DB::table('comments as c')->join('users as u','u.id','=','c.user_id')->join('products as p','p.id','=','c.product_id')->select('c.id','c.comment','p.name as product_name','p.id as product_id','u.id as user_id','u.name')->where('approved','=',0)->get();

		return view('adminpanel.commentList', compact('comments'));

	}
}
