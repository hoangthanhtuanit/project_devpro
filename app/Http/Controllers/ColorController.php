<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

    public function getCreate()
    {
        return view('admin.colors.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'color' => 'required|unique:colors'
        ];
        $messages = [
            'color.required' => 'Màu không được để trống',
            'color.unique' => 'Màu đã tồn tại'
        ];
        $this->validate($request,$rules,$messages);

        $color = new Color();

        $color->color = $request->color;
        $isInsert = $color->save();

        if ($isInsert) {
            session()->flash('success', 'Thêm mới thành công');
        } else {
            session()->flash('error', 'Thêm mới thất bại');
        }

        return redirect('admin/color/index');
    }

    public function getUpdate($id)
    {
        $color = Color::find($id);
        return view('admin.colors.update', compact('color'));
    }

    public function postUpdate(Request $request, $id)
    {
        $rules = [
            'color' => 'required|unique:colors'
        ];
        $messages = [
            'color.required' => 'Màu không được để trống',
            'color.unique' => 'Màu đã tồn tại'
        ];
        $this->validate($request,$rules,$messages);

        $color = Color::find($id);

        $color->color = $request->color;
        $isUpdate = $color->save();

        if ($isUpdate) {
            session()->flash('success', 'Cập nhật thành công');
        } else {
            session()->flash('error', 'Cập nhật thất bại');
        }

        return redirect('admin/color/index');
    }

    public function detail($id)
    {
        $color = Color::find($id);
        return view('admin.colors.detail', compact('color'));
    }

    public function delete($id)
    {
        $color = Color::find($id);
        $isDelete = $color->delete();

        if ($isDelete) {
            session()->flash('success', 'Xóa thành công');
        } else {
            session()->flash('error', 'Xóa thất bại');
        }
        return redirect('admin/color/index');
    }
}
