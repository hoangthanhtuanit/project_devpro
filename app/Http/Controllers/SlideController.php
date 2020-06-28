<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slides.index', compact('slides'));
    }

    /**
     * Form thêm mới
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreate()
    {
        return view('admin.slides.create');
    }

    /**
     * Xử lý thêm slide
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postCreate(Request $request)
    {
        $rules = [
            'title' => 'required|unique:slides',
            'image' => 'image|max:10000',
            'summary' => 'required'
        ];
        $messages = [
            'title.required' => 'Tiêu đề không được để trống',
            'title.unique' => 'Tiêu đề đã tồn tại',
            'image.image' => 'Định dạng không cho phép',
            'image.max' => 'Kích thước file quá lớn',
            'summary.required' => 'Mô tả không được để trống'
        ];
        $this->validate($request,$rules,$messages);

        $slide = new Slide();

        $file_name = '';
        if ($request->hasFile('image')) {
            $image = $request->image;
            $file_name = 'slide-' . time() . '-' . $image->getClientOriginalName();

            $dir_uploads = public_path() . '/uploads/slides';
            $image->move($dir_uploads,$file_name);
        } else {
            $slide->image = '';
        }
        $image = $file_name;
        $slide->image = $image;
        $slide->title = $request->title;
        $slide->summary = $request->summary;
        $slide->position = $request->position;
        $slide->status = $request->status;
        $isInsert = $slide->save();

        if ($isInsert) {
            session()->flash('success', 'Thêm mới thành công');
        } else {
            session()->flash('error', 'Thêm mới thất bại');
        }

        return redirect('admin/slide/index');
    }

    /**
     * Chi tiết danh mục
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Request $request, $id)
    {
        $slide = Slide::find($id);
        return view('admin.slides.detail', compact('slide'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUpdate($id)
    {
        $slide = Slide::find($id);
        return view('admin.slides.update', compact('slide'));
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
            'title' => 'required',
            'image' => 'image|max:10000',
            'summary' => 'required'
        ];
        $messages = [
            'title.required' => 'Tiêu đề không được để trống',
            'image.image' => 'Định dạng không cho phép',
            'image.max' => 'Kích thước file quá lớn',
            'summary.required' => 'Mô tả không được để trống'
        ];
        $this->validate($request, $rules, $messages);

        $slide = Slide::find($id);
        $file_name = $slide->image;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $file_name = 'slide-' . time() . '-' . $image->getClientOriginalName();
            $dir_uploads = public_path() . '/uploads/slides';
            @unlink($dir_uploads . '/' . $slide->image);
            $image->move($dir_uploads,$file_name);
        } else {
            $slide->image = '';
        }
        $image = $file_name;
        $slide->image = $image;
        $slide->title = $request->title;
        $slide->summary = $request->summary;
        $slide->position = $request->position;
        $slide->status = $request->status;

        $isUpdate = $slide->save();

        if ($isUpdate) {
            session()->flash('success', 'Cập nhật thành công');
        } else {
            session()->flash('error', 'Cập nhật thất bại');
        }

        return redirect('admin/slide/index');
    }

    public function delete($id)
    {
        $slide = Slide::find($id);
        $isDelete = $slide->delete();

        if ($isDelete) {
            session()->flash('success', 'Xóa thành công');
        } else {
            session()->flash('error', 'Xóa thất bại');
        }

        return redirect('admin/slide/index');
    }
}
