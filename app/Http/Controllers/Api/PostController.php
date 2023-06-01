<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       $post = Post::select('title', 'body')->where('api_insertion', '1')->get();
       return response()->json(['posts' => $post, 200 ]);  
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateInput = Validator::make($request->all(),[
        'title' => 'required|max:100|regex:/^[a-zA-Z0-9\s]*$/',    
        'body' => 'required|regex:/^[a-zA-Z0-9\s]*$/',
 
        ],

        [
            'title.required' => 'Post Title is required',
            'title.max' => 'You have cross the characte limit of title',
            'title.required' => 'You can only enter alphabets and numbers only',
            'body.required' => 'Post Body is required',
            'body.regex' => 'You can only enter alphabets and numbers only in post',
    ]
    );


        if ($validateInput->fails())
        {     

         return response()->json(['message' => 'All fields i.e. title and body are required'], 500);

        }

            $userId = Auth::id();
//            $userId = 1;
            $lowerCase = strtolower($request->title);
            $slugRaw = str_replace(' ', '_', $lowerCase);
            $publicUrl = Url('/post').'/'.$slugRaw;
            $post = new Post;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->user_id = $userId;
            $post->slug = $publicUrl;
            $post->api_insertion = 1;
            $post->created_at = Carbon::now();
            $post->save();
            return response()->json(['message' => 'Post Added Successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
      $post = Post::select('title', 'body')->where('api_insertion', '1')->where('id', $id)->get();
      if($post->count()>0){
       return response()->json(['posts' => $post, 200 ]);  
        }
      else {
       return response()->json(['message' => 'No API post Found', 404]);
        }  

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

                $count = Post::where('id',$id)->where('api_insertion', 1)->count(); 

                if($count==1){

                        $validateInput = Validator::make($request->all(),[
                        'edittitle' => 'required|max:100|regex:/^[a-zA-Z0-9\s]*$/',    
                        'editbody' => 'required|regex:/^[a-zA-Z0-9\s]*$/',


                        ],

                        [
                            'edittitle.required' => 'Post Title is required',
                            'edittitle.max' => 'You have cross the characte limit of title',
                            'edittitle.required' => 'You can only enter alphabets and numbers only',
                            'editbody.required' => 'Post Body is required',
                            'editbody.regex' => 'You can only enter alphabets and numbers only in post',


                        
                    ]
                    );

                        if ($validateInput->fails())
                        {     

                             return response()->json(['message' => 'All fields i.e. title and body are required'], 500);

                        }
                        

                        $userId = Auth::id();
//                        $userId = 1;

                            $lowerCase = strtolower($request->edittitle);
                            $slugRaw = str_replace(' ', '_', $lowerCase);
                            $publicUrl = Url('/post').'/'.$slugRaw;


                            Post::where('id',$id)->where('api_insertion', 1)->update([
                                'title' => $request->edittitle,
                                'body' => $request->editbody,
                                'slug' => $publicUrl,
                                'updated_at' => Carbon::now(),
                            ]);
                            
//                                $oldPostData->title = $request->edittitle;
//                                $oldPostData->body = $request->editbody;
// ;
//                                $oldPostData->slug = $publicUrl;
//                                $oldPostData->updated_at = Carbon::now();

//                            $oldPostData->update();  
                            return response()->json(['message' => 'Post Updated Successfully'], 200);
                        }
        else{
                return response()->json(['message' => 'No API post Found', 404]);
                               
            }    
 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        ;
        if($post = Post::where('id',$id)->where('api_insertion', 1)->delete())
        {    
            return response()->json(['message' => 'Post Deleted Successfully', 200]);            
        }
        else{

             return response()->json(['message' => 'No API post Found', 404]);            

        }    
    }
}
