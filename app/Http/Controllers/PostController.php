<?php

namespace App\Http\Controllers;

use App\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Auth;
use Carbon\Carbon;



class PostController extends Controller
{

    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository) 
    {
        $this->postRepository = $postRepository;
    }


    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //

        $dataPost = $this->postRepository->getAllPosts();
//        dd('dataPost');
        return view('frontendmain.viewfile', compact('dataPost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        'feature_image' => 'required|file|mimes:jpg,jpeg,png,gif|max:1024',
 
        ],

        [
            'title.required' => 'Post Title is required',
            'title.max' => 'You have cross the characte limit of title',
            'title.required' => 'You can only enter alphabets and numbers only',
            'body.required' => 'Post Body is required',
            'body.regex' => 'You can only enter alphabets and numbers only in post',
            'feature_image.required' => 'Feature Image is required',
            'feature_image.mimes' => 'Only jpg, jpeg, png, gif type of image is required',

        
    ]
    );

        if ($validateInput->fails())
        {     

         return redirect()->back()->withErrors($validateInput);

        }

        else
        {    
//            $userId = Auth::id();
                $lowerCase = strtolower($request->title);
                $slugRaw = str_replace(' ', '_', $lowerCase);
        //            dd($slugRaw);
                $slugUrl = Url('/post').'/'.$slugRaw;
        //            dd($publicUrl);
                $image = $request->file('feature_image');
                $nameGen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('upload/post_images/'.$nameGen);
                $picUrl = 'upload/post_images/'.$nameGen;
                $varReturn = $this->postRepository->storePost($request, $picUrl, $slugUrl);

            if($varReturn == 1)
            {
                
                  return redirect()->back()->with('success', 'Success! Post created');

            }
            else
            {

                 return redirect()->back()->with('error', 'ERROR! Post is NOT created');

            }    

        }        

      

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $userId = $this->postRepository->postUserId($request->editpostid);
//        dd($oldPost);
        if(Auth::id() == $userId)
        {    
            if(!(empty($request->edit_feature_image))){
                $validateInput = Validator::make($request->all(),[
                'editpostid' => 'required|exists:posts,id',    
                'edittitle' => 'required|max:100|regex:/^[a-zA-Z0-9\s]*$/',    
                'editbody' => 'required|regex:/^[a-zA-Z0-9\s]*$/',
                'edit_feature_image' => 'required|file|mimes:jpg,jpeg,png,gif|max:1024',


                ],

                [
                    'edittitle.required' => 'Post Title is required',
                    'edittitle.max' => 'You have cross the characte limit of title',
                    'edittitle.required' => 'You can only enter alphabets and numbers only',
                    'editbody.required' => 'Post Body is required',
                    'editbody.regex' => 'You can only enter alphabets and numbers only in post',
                    'edit_feature_image.required' => 'Feature Image is required',
                    'edit_feature_image.mimes' => 'Only jpg, jpeg, png, gif type of image is required',
                    'editpostid.exists' => 'Something went wrong, You have do some illegal changes through inspection',


                
            ]
            );

                if ($validateInput->fails())
                {     

                 return redirect()->back()->withErrors($validateInput);

                }
                $postId = $request->editpostid;


                    $lowerCase = strtolower($request->edittitle);
                    $slugRaw = str_replace(' ', '_', $lowerCase);
                    $slugUrl = Url('/post').'/'.$slugRaw;
                    $image = $request->file('edit_feature_image');
                    $nameGen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(300,300)->save('upload/post_images/'.$nameGen);
                    $picUrl = 'upload/post_images/'.$nameGen;

                    $returnVar = $this->postRepository->updatePost($request, $picUrl, $slugUrl, $postId);
                    
            }
            else{
 
//                    $image = $request->file('edit_feature_image');

//                    $oldPostData = Post::findOrFail($request->editpostid);
                        $postId = $request->editpostid;
                        $lowerCase = strtolower($request->edittitle);
                        $slugRaw = str_replace(' ', '_', $lowerCase);
                        $slugUrl = Url('/post').'/'.$slugRaw;
                        $picUrl = 'No New Image Uploaded';
                    
                    $returnVar = $this->postRepository->updatePost($request, $picUrl, $slugUrl, $postId);


            }        
            if($returnVar == 1)
            {
                
                  return redirect()->route('posts.index')->with('success', 'Success! Post updated');

            }
            else
            {

                 return redirect()->route('posts.index')->with('error', 'ERROR! Post is NOT updated');

            }    

        }
        else
        {
            return redirect()->back()->with('error', 'Error! You have not access to do this');
        }    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $returnVar = $this->postRepository->deleteAPost($id);

        if($returnVar == 1)
        {
            
            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);

        }
        else
        {

              return response()->json([
                'error' => 'Record is NOT deleted'
            ]);

        }    


        
    }


}
