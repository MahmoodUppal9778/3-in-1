<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use Carbon\Carbon;


class PostService
{

	public function getAllPosts(){
		$post = Post::where('api_insertion','0')->latest()->get();
		return $post;
	}

	public function storePost(Request $request, string $imgPath, string $slugUrl){

            $userId = Auth::id();
  
			$post = new Post;            
            $post->title = $request->title;
            $post->body = $request->body;
            $post->featured_image = $imgPath;
            $post->user_id = $userId;
            $post->slug = $slugUrl;
            $post->created_at = Carbon::now(); 
 			if($post->save()){
 				return 1;
 			}	
 			else{
 				return 0;
 			}

	}


	public function updatePost(Request $request, string $imgPath, string $slugUrl, int $postId){


		$postUpdate = Post::where('api_insertion', '0')->where('id', $postId)->first();            

		if($imgPath == "No New Image Uploaded")
 		{ 

	            $postUpdate->title = $request->edittitle;
	            $postUpdate->body = $request->editbody;
	            $postUpdate->slug = $slugUrl;
	            $postUpdate->updated_at = Carbon::now(); 
	 			if($postUpdate->update()){
	 				return 1;
	 			}	
	 			else{
	 				return 0;
	 			}


		}
		else
		{

                @unlink(public_path($postUpdate->featured_image));

	            $postUpdate->title = $request->edittitle;
	            $postUpdate->body = $request->editbody;
	            $postUpdate->featured_image = $imgPath;
	            $postUpdate->slug = $slugUrl;
	            $postUpdate->updated_at = Carbon::now(); 
	 			if($postUpdate->update()){
	 				return 1;
	 			}	
	 			else{
	 				return 0;
	 			}

		}	

	}


	public function deleteAPost(int $id)
	{

        $postDeleted = Post::where('api_insertion', '0')->where('id', $id)->first();
//        dd($post);
        @unlink(public_path($postDeleted->featured_image));


		if($postDeleted->delete()){
			return 1;
		}	
		else{
			return 0;
		}

	}

	public function postUserId(string $postId)
	{
		$selectedPost = Post::where('api_insertion', '0')->where('id', $postId)->first();

		return $selectedPost->user_id;
	}

}

?>