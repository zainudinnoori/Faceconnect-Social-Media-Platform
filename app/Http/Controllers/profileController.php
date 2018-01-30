<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Comment;
use App\User;
 use App\Notifications\InvoicePaid;
 use App\Like;
 use Carbon\Carbon;
class profileController extends Controller
{
     public $searchtext = "";

    public function __construct(){
        $a = request('search_text');
        $this->searchtext = $a;
    }
    public function index(Request $request)
    {
        $Like= new Like;
        $Post = new Post;
        $User = new User;
        $followings=Auth::user()->follow;
        $posts = Post::where('user_id',Auth::id())->orderBy('created_at','des')->paginate(4);
        if ($request->ajax()) {
            $view = view('home.posts',compact('posts','followings','Like','Post','User'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('home.profile',compact('posts','followings','Like','Post','User'));
    }

    public function show()
    {
        $followings=Auth::user()->follow;
        $block_users=Auth::user()->block_users;
        return view('home.profilesetting',compact('followings','block_users'));
    }
 
    public function update(Request $request, $id)
    {
        // dd($request->image);
        if($request->image != null)
        {
            $imagename= time().".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'),$imagename);
            $user= Auth::user();
            $user->image=$imagename;
            $user->save();
            return back();
        }

        if($request->coverimage != null)
        {
            $imagename= time().".".$request->coverimage->getClientOriginalExtension();
            $request->coverimage->move(public_path('images'),$imagename);
            $user= Auth::user();
            $user->cover_image=$imagename;
            $user->save();
            return back();
         }

         if(request('name')!=null)
         {
             $dob = $request->birthday_year."-".$request->birthday_month."-".$request->birthday_day;
             $user= User::find($id);
             $user->name= ucfirst(request('name'));
             $user->email=request('email');
             $user->clocation=ucfirst(request('clocation'));
             if(request('cCountry')!= null)
             {
                $user->ccountry=ucfirst(request('cCountry'));
             }
             $user->dob= $dob;
             $user->about= ucfirst(request('about'));
             $user->gender= ucfirst(request('gender'));
             $user->save();
             return back();
         }

         if(request('oldpassword')!=null)
         {  
            $request->validate([
                'oldpassword' =>'required|max:255|min:6',
                'password' => 'required|max:255|min:6|confirmed',
            ]);
            $user= new User;
            $user = User::find(Auth::id());
            $oldPasswordDB = $user->password;
            if(password_verify(request('oldpassword'), $user->password))
            {

                $user->password = bcrypt(request('password'));
                $user->save();
                session()->flash('passwordChangeAlertDone','Password changed.');

                return back();
            }
            else
            {
                session()->flash('passwordChangeAlertWrongOldPassword','Wrong Old password.');
                return back();
            }
         }
         return back();
    }

    public function search()
    {
        $query=request('search_text');
        $users = User::where('name', 'LIKE', '%' . $query . '%')->paginate(10);
        return view('home.searchresult',compact('users'));
    }
}
