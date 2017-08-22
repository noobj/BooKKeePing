<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
        'avatar' => 'mimes:jpeg,bmp,png|required',
    	]);

        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();

        //$path = $request->file('avatar')->storeAs('image/avatars', 'u'.$request->user()->id . '.' . $avatar->getClientOriginalExtension());

        Image::make($avatar)->resize(300, 300)->save(storage_path('app/image/avatars/') . $filename);

        $user = Auth::user();
    	$user->avatar = $filename;
    	$user->save();

    	session()->flash('flash_message', 'avatar has been uploaded');
        return redirect('records');
    }
}
