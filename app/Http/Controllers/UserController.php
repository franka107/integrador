<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;

class UserController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function edit(){
    	return view('auth.edit');
    }

    public function update(Request $request){
    	$request->validate([
    		'name' => ['required', 'string', 'max:255'],
    		'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
		]);
		$id = Auth::user()->id; 
		$user = User::find($id);

		if ($request->file('image')) {
            $imageName = basename($request->file('image')->store('users/'. \Auth::id() , 'public'));
			$user->image = $imageName;
		} 
				    	   	
    	$user->name = $request->get('name');
    	$user->lastname = $request->get('lastname');
		$user->email = $request->get('email');
		
    	$user->save();

    	return redirect()->action('UserController@edit');
    }

    public function editPwd(){
    	return view('auth.editpass');
    }

    public function updatePwd(Request $request){
    	$request->validate([
    		'password' => ['required', 'string', 'min:8'],
    	]);

    	$id = Auth::user()->id;
    	$user = User::find($id);
    	$user->password = bcrypt($request->get('password'));
    	$user->save();

    	return redirect()->action('UserController@edit');
    }

    public function destroy(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->delete();

        return redirect()->action('StoreController@index');

	}
	
	public function orders(){
		$id =  Auth::user()->id;
		

		$orders = Order::Where('user_id' , 'like', "$id")->get();
		
		return view('auth.order-list', compact('orders'));
	}
}


