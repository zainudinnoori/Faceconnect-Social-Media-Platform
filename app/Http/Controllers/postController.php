<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Post;
Use App\Photo;
use App\Like;
use Illuminate\Http\Request;
use Image;


class postController extends Controller
{


    public function store(Request $request)
    {
        if(is_null(request('post_body')) && is_null(request('images')))
        {
            session()->flash('status','Opps.... Write something or Upload an image !!!');
            return back();
        }

        $post= new Post;
        $post::create([
            'user_id' => Auth::id(),
            'body' => request('post_body'),
        ]);
        $postid= Post::latest()->first()->id;
        if(! is_null(request('images')))
        {
            $photos=request('images');
            foreach ($photos as $photo)
             {
                // $imageName = time().'.'.$photo->getClientOriginalExtension();
                // dd($imageName);
                // $imageTumbnail = time().'_tumbinal'.'.'.$photo->getClientOriginalExtension();
                // $imagOriginal = time().'_orginal'.'.'.$photo->getClientOriginalExtension();
           
                // $destinationPath = public_path('/images');
                // $img = Image::make($photo->getRealPath());
                // $img->resize(100, 100, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($destinationPath.'/'.$imageTumbnail);

                $imageName = time().'.'.$photo->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $photo->move($destinationPath, $imageName);
                $photo= new Photo;
                $photo::create([
                    'user_id' => Auth::id(),
                    'post_id' => $postid,
                    'photo' => $imageName,
                ]);
            }
        }
        return back();
    }


    public function show($id)
    {
        $Like=new Like;
        $post= Post::find($id);
        return view('home.showpost',compact('post','Like'));
    }

 
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $post= Post::find($id);
        $post->body= $request['post_content'];
        $post->save();
        return response()->json([
          'success' => 'Record has been updated successfully!'
        ]);
    }

 
    public function destroy($id)
    {
        $post= Post::find($id)->delete();
        // session()->flash('post_deleted','Your post has beed deleted !!!');
        return response()->json([
          'success' => 'Record has been deleted successfully!'
        ]);

    }
}
