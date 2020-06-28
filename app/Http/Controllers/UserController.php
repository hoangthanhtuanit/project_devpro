<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Form thêm mới
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreate()
    {
        return view('admin.users.create');
    }

    /**
     * Xử lý thêm slide
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postCreate(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'avatar' => 'image|max:10000',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:5|max:32',
            're_password' => 'required|same:password'
        ];
        $messages = [
            'first_name.required' => 'Họ đệm không được để trống',
            'last_name.required' => 'Tên không được để trống',
            'avatar.image' => 'Định dạng không cho phép',
            'avatar.max' => 'Kích thước file quá lớn',
            'email.email' => 'Không đúng định dạng email',
            'email.required' => 'Địa chỉ email không được để trống',
            'email.unique' => 'Địa chỉ email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Password tối thiểu 6 ký tự',
            'password.max' => 'Password tối đa 32 ký tự',
            're_password.required' => 'Bạn chưa nhập lại mật khẩu',
            're_password.same' => 'Password chưa khớp'
        ];
        $this->validate($request,$rules,$messages);

        $user_admin = User::find(Auth::user()->id);
        $arr_level = [2];
        $arr_status = [1];
        if (in_array($user_admin->level, $arr_level) && in_array($user_admin->status, $arr_status)) {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $file_name = '';
            if ($request->hasFile('avatar')) {
                $avatar = $request->avatar;
                $file_name = 'user-' . time() . '-' . $avatar->getClientOriginalName();

                $dir_uploads = public_path() . '/uploads/users';
                $avatar->move($dir_uploads,$file_name);
            } else {
                $user->avatar = '';
            }
            $avatar = $file_name;
            $user->avatar = $avatar;
            $user->level = $request->level;
            $user->status = $request->status;
            $isInsert = $user->save();

            if ($isInsert) {
                session()->flash('success', 'Thêm mới thành công');
            } else {
                session()->flash('error', 'Thêm mới thất bại');
            }
        } else {
            session()->flash('error', 'Bạn không được cấp quyền cho hành động này');
        }
        return redirect('admin/user/index');
    }

    /**
     * Chi tiết
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Request $request, $id)
    {
        $user_admin = User::find(Auth::user()->id);
        $arr_level = [2];
        $arr_status = [1];
        if (in_array($user_admin->level, $arr_level) && in_array($user_admin->status, $arr_status)) {
            $user = User::find($id);
            return view('admin.users.detail', compact('user'));
        } else {
            session()->flash('error', 'Bạn không được cấp quyền cho hành động này');
        }
        return redirect('admin/user/index');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUpdate($id)
    {
        $user_admin = User::find(Auth::user()->id);
        $arr_level = [2];
        $arr_status = [1];
        if (in_array($user_admin->level, $arr_level) && in_array($user_admin->status, $arr_status)) {
            $user = User::find($id);
            return view('admin.users.update', compact('user'));
        } else {
            session()->flash('error', 'Bạn không được cấp quyền cho hành động này');
        }
        return redirect('admin/user/index');
    }

    /**
     * Xử lý cập nhật
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postUpdate(Request $request, $id)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'avatar' => 'image|max:10000',
            'email' => 'email|required',
        ];
        $messages = [
            'first_name.required' => 'Họ đệm không được để trống',
            'last_name.required' => 'Tên không được để trống',
            'avatar.image' => 'Định dạng không cho phép',
            'avatar.max' => 'Kích thước file quá lớn',
            'email.email' => 'Không đúng định dạng email',
            'email.required' => 'Địa chỉ email không được để trống'
        ];
        $this->validate($request,$rules,$messages);

        $user_admin = User::find(Auth::user()->id);
        $arr_level = [2];
        $arr_status = [1];
        if (in_array($user_admin->level, $arr_level) && in_array($user_admin->status, $arr_status)) {
            $user = User::find($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            if (isset($request->changePassword)) {
                $this->validate($request,
                    [
                        'password' => 'required|min:5|max:32',
                        're_password' => 'required|same:password'
                    ],
                    [
                        'password.required' => 'Password không được để trống',
                        'password.min' => 'Password tối thiểu 5 ký tự',
                        'password.max' => 'Password tối đa 32 ký tự',
                        're_password.required' => 'Bạn chưa nhập lại mật khẩu',
                        're_password.same' => 'Password chưa khớp'
                    ]
                );
                $user->password = bcrypt($request->password);
            }
            $file_name = $user->avatar;
            if ($request->hasFile('image')) {
                $avatar = $request->image;
                $file_name = 'new-' . time() . '-' . $avatar->getClientOriginalName();
                $dir_uploads = public_path() . '/uploads/users';
                @unlink($dir_uploads . '/' . $user->image);
                $avatar->move($dir_uploads,$file_name);
            } else {
                $user->avatar = '';
            }
            $avatar = $file_name;
            $user->avatar = $avatar;
            $user->level = $request->level;
            $user->status = $request->status;

            $isUpdate = $user->save();

            if ($isUpdate) {
                session()->flash('success', 'Cập nhật thành công');
            } else {
                session()->flash('error', 'Cập nhật thất bại');
            }
        } else {
            session()->flash('error', 'Bạn không được cấp quyền cho hành động này');
        }
        return redirect('admin/user/index');
    }

    public function delete($id)
    {
        $user_admin = User::find(Auth::user()->id);
        $arr_level = [2];
        $arr_status = [1];
        if (in_array($user_admin->level, $arr_level) && in_array($user_admin->status, $arr_status)) {
            $new = News::find($id);
            $isDelete = $new->delete();

            if ($isDelete) {
                session()->flash('success', 'Xóa thành công');
            } else {
                session()->flash('error', 'Xóa thất bại');
            }
        } else {
            session()->flash('error', 'Bạn không được cấp quyền cho hành động này');
        }
        return redirect('admin/user/index');
    }

    public function getLoginAdmin(){
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request){
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Bạn chưa nhập mật khẩu'
            ]
        );
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user_admin = User::find(Auth::user()->id);
            $arr_level = [1, 2];
            $arr_status = [1];
            if (in_array($user_admin->level, $arr_level) && in_array($user_admin->status, $arr_status)) {
                return redirect('admin/dashboard');
            } else {
                return redirect('admin/login')->with('error','Đăng nhập không thành công');
            }
        }
    }

    public function logoutAdmin(){
        Auth::logout();
        return redirect('admin/login');
    }
}
