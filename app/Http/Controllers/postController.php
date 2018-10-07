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
    {   $i=0;
        if(is_null(request('post_body')) && is_null(request('images')))
        {
            session()->flash('status','Opps.... Write something or Upload an image !!!');
            return back();
        }

        $post= new Post;
        $post::create([
            'user_id' => Auth::id(),
            'body' => ucfirst(request('post_body')),
        ]);
        $postid= Post::orderBy('id', 'desc')->first()->id;
        if(! is_null(request('images')))
        {
            $photos=request('images');
            foreach ($photos as $photo)
             {
                    $imageExtension=$photo->getClientOriginalExtension();
                    $i+=1;
                    $imageName = time().$i;
                    $imageTumbnail = time().$i.'_tumbinal'.'.'.$imageExtension;
                    $imagOriginal = time().$i.'_orginal'.'.'.$imageExtension;
                    $destinationPath = public_path('/images');
                    $imgTumbnail = Image::make($photo->getRealPath());
                    $imgTumbnail->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$imageTumbnail);

                    $photo->move($destinationPath, $imagOriginal);
                    Photo::create([
                        'user_id' => Auth::id(),
                        'post_id' => $postid,
                        'photo' => $imageName,
                        'extension' => '.'.$imageExtension,
                    ]);
            }
        }
        return back();
    }


    public function show($id)
    {
        $Like=new Like;
        $Post= new Post;
        $post= Post::find($id);
        $User = new User;
        return view('home.showpost',compact('post','Like','Post','User'));
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
          'status' => 'updated'
        ]);
    }

 
    public function destroy($id)
    {
        $post= Post::find($id)->delete();
        return response()->json([
          'success' => 'Record has been deleted successfully!'
        ]);

    }

    public function share($id)
    {
        $post= Post::find($id);
        Post::create([
            'user_id' => auth::id(),
            'parent_id' => $post->id
        ]);

        return back();
    }
}
