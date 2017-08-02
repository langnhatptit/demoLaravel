<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
     /**
     * Hien thi danh sach user
     * @return [type] [description]
     */
    public function getListUser()
    {
        $user = User::all();
        return view('user.listUser',['user'=>$user]);
    }

    /**
     * Route den trang AddUser
     * @return [type] [description]
     */
    public function getAddUser()
    {
        return view('user.addUser');
    }

    /**
     * Them User
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postAddUser(Request $request)
    {
        if($request->password){
            $this->validate($request,
                [
                'username'=>'unique:users,username',
                'email'=>'unique:users,email',
                'password' => 'min:6',
                'password_confirmation' => 'same:password'
                ],
                [
                'username.unique'=>'Username đã tồn tại',
                'email.unique'=>'Email đã được sử dụng',
                'password.min'=> 'Password phải có độ dài ít nhất 6 ký tự',
                'password_confirmation.same' => 'Hai mật khẩu không khớp  nhau'
                ]
                );  
        }

        $allRequest = $request->all();
        $name = $allRequest['name'];
        $address = $allRequest['address'];
        $phone = $allRequest['phone'];
        $email = $allRequest['email'];
        $username=$allRequest['username'];
        $password = $allRequest['password'];

        $dataInsert = array(
            'name'=>$name,
            'address'=>$address,
            'phone'=>$phone,
            'email'=>$email,
            'username'=>$username,
            'password'=>bcrypt($password),
            );
        $userNew = new User();
        $userNew->insert($dataInsert);
        // var_dump($dataInsert);die();
        $request->session()->flash('status', 'Thêm thành công!');
        return redirect()->route('getListUser');
    }

    /**
     * Route den trang editUser
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getEditUser($id)
    {
    	$data = User::findOrFail($id)->toArray();
    	return view('user.editUser',['data'=>$data]);
    }

    /**
     * Edit user
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postEditUser(Request $request,$id)
    {
        $user = User::find($id);
        if($request->password){
            $this->validate($request,
                [
                'username'=>'unique:users,username',
                'email'=>'unique:users,email',
                'password' => 'min:6',
                'password_confirmation' => 'same:password'
                ],
                [
                'username.unique'=>'Username đã tồn tại',
                'email.unique'=>'Email đã được sử dụng',
                'password.min'=> 'Password phải có độ dài ít nhất 6 ký tự',
                'password_confirmation.same' => 'Hai mật khẩu không khớp  nhau'
                ]
                );  
        }

        $user->password=bcrypt($request->password);
        $user->save();
        $request->session()->flash('status', 'Sửa thành công!');
        return redirect()->route('getListUser');
    }

    /**
     * DeleteUser
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getDeleteUser(Request $request,$id)
    {
    	$userDelete = User::find($id);
    	$userDelete->delete($id);
        $request->session()->flash('status', 'Xóa thành công!');
        return redirect()->route('getListUser');
    }
}
