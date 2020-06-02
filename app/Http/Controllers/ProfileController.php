<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\User;
use Hash;

class ProfileController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
    public function profile(){
    	return view('users.profile', array('user' => Auth::user()) );
    }

    public function update_profile(Request $request){
		$user = Auth::user();
		$this->validate($request, [
			'first_name' => 'required|min:3|max:100',
			'last_name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'phonenumber'=>'required|max:10|min:10',
		]);

		$user_id = \Auth::user()->id;
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $phonenumber = $request->input('phonenumber');
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$user->avatar = $filename;
    		$user->save();
		}
		\DB::table('users')
            ->where('id', $user_id)
            ->update([
                'first_name' => $first_name, 
                'last_name' => $last_name,
                'email' => $email,
                'phonenumber' => $phonenumber,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
		
    	return redirect('/userprofile')->with('success','Profile Updated');

	}

	public function update_password(Request $request){
		$user = Auth::user();
		$this->validate($request, [
			'old_password' => 'required',
			'new_password' => 'required|confirmed|min:8|max:25',
			
		]);
		if (Hash::check($request->old_password, $user->password)){
			$new_password = $request->input('new_password');
			$user->password = bcrypt($new_password);
			$user->save();
			return redirect('/userprofile')->with('success','Password Changed Successfully');
		}
		else{
			return redirect('/userprofile')->with('error','Invalid old Password');
		}

	}
}
