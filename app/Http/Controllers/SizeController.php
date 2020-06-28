<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();
        return view('admin.sizes.index', compact('sizes'));
    }

    public function getCreate()
    {
        return view('admin.sizes.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'size' => 'required|unique:sizes|numeric'
        ];
        $messages = [
            'size.required' => 'Kích cỡ không được để trống',
            'size.unique' => 'Kích cỡ đã tồn tại',
            'size.numeric' => 'Kiểu dữ liệu phải là số'
        ];
        $this->validate($request,$rules,$messages);

        $size = new Size();

        $size->size = $request->size;
        $isInsert = $size->save();

        if ($isInsert) {
            session()->flash('success', 'Thêm mới thành công');
        } else {
            session()->flash('error', 'Thêm mới thất bại');
        }

        return redirect('admin/size/index');
    }

    public function getUpdate($id)
    {
        $size = Size::find($id);
        return view('admin.sizes.update', compact('size'));
    }

    public function postUpdate(Request $request, $id)
    {
        $rules = [
            'size' => 'required|unique:sizes|numeric'
        ];
        $messages = [
            'size.required' => 'Kích cỡ không được để trống',
            'size.unique' => 'Kích cỡ đã tồn tại',
            'size.numeric' => 'Kiểu dữ liệu phải là số'
        ];
        $this->validate($request,$rules,$messages);

        $size = Size::find($id);

        $size->size = $request->size;
        $isInsert = $size->save();

        if ($isInsert) {
            session()->flash('success', 'Thêm mới thành công');
        } else {
            session()->flash('error', 'Thêm mới thất bại');
        }

        return redirect('admin/size/index');
    }

    public function detail($id)
    {
        $size = Size::find($id);
        return view('admin.sizes.detail', compact('size'));
    }

    public function delete($id)
    {
        $size = Size::find($id);
        $isDelete = $size->delete();

        if ($isDelete) {
            session()->flash('success', 'Xóa thành công');
        } else {
            session()->flash('error', 'Xóa thất bại');
        }
        return redirect('admin/size/index');
    }
}
