<?php

namespace App\Http\Controllers;

use App\Shop\Admins\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class UsersController extends Controller
{
	use AuthenticatesUsers;
    public function getlist()
    {
    	$user = User::paginate(5);
    	return view('admin.users.list',['users'=>$user]);
    }

    public function getAdd()
    {
    	return view('admin/users/AddUser');
    }
    public function postAdd(Request $Request)
    {
    	$this->validate($Request,
    		[
    			'Name' => 'required|min:3|max:100|unique:users,name',
    			'PassWord' => 'required|min:4',
    			'PassWordAgain' => 'required|same:PassWord',
    			'Email' => 'required|unique:users,email'
    		]
    		,
    		[
    			'Name.required' =>'bạn chưa nhập tên người dùng'
    		]
    	);

    	$user = new User;
    	$user->name = $Request->Name;
    	$user->password = bcrypt($Request->PassWord);
    	$user->email = $Request->Email;
    	$user->Level = $Request->Level;

    	$user->save();
    	return redirect('admin/users/AddUser')->with('thongbao','Bạn đã thêm thành công');
    }

    public function getEdit($id)
    {
    	$users = User::find($id);
    	return view('admin/users/EditUser',['users' => $users]);
    }
    public function postEdit(Request $Request,$id)
    {
    	$this->validate($Request,
    		[
    			'Name' => 'required|min:3|max:100|unique:users,name',
    		]
    		,
    		[
    			'Name.required' =>'bạn chưa nhập tên người dùng'
    		]
    	);
    	$user = User::find($id);
    	$user->name = $Request->Name;
    	if($Request->ChangePassWord == "on")
    		$user->password = bcrypt($Request->PassWord);
    	$user->password = bcrypt($Request->PassWord);
    	$user->email = $Request->Email;
    	$user->Level = $Request->Level;
    	User::where('id',$id)->update(['name'=>$user->name,'password'=>$user->password,'email'=>$user->email,'Level'=>$user->Level]);
    	return redirect('admin/users/list')->with('thongbao','Bạn đã sửa thành công');
    }

    public function getDelete($id)
    {
    	$users = User::where('id',$id)->delete();
    	return redirect('admin/users/list')->with('thongbao','Bạn đã xóa thành công');
    }

    public function getLoginAdmin()
    {
        if (auth()->guard()->check()) {
            return redirect('admin/GroupProduct/list');
        }

    	return view('admin/login');
    }
    public function postLoginAdmin(Request $Request)
    {
		$this->validateLogin($Request);
		if ($this->hasTooManyLoginAttempts($Request)) {
            $this->fireLockoutEvent($Request);

            return $this->sendLockoutResponse($Request);
        }

        $details = $Request->only('email', 'password');
        $details['Level'] = 1;
        if (auth()->guard()->attempt($details)) {
            return $this->sendLoginResponse($Request);
        }
    	// if(Auth::attempt(['email'=>$Request->email,'password'=>$Request->password]))
    	// {
    	// 	return redirect('admin/GroupProduct/list');
    	// }
    	// else
    	// {
    	// 	return redirect('admin/login')->with('thongbao','Đăng nhập không thành công');
		// }
		$this->incrementLoginAttempts($Request);

        return $this->sendFailedLoginResponse($Request);
    }
    public function getLogoutAdmin()
    {
    	Auth::logout();
    	return redirect('admin/login');
    }
}
