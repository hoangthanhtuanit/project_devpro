<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Form thêm mới
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreate()
    {
        return view('admin.news.create');
    }

    /**
     * Xử lý thêm slide
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postCreate(Request $request)
    {
        $rules = [
            'title' => 'required|unique:news',
            'image' => 'image|max:10000',
            'summary' => 'required',
            'content' => 'required'
        ];
        $messages = [
            'title.required' => 'Tiêu đề không được để trống',
            'title.unique' => 'Tiêu đề đã tồn tại',
            'image.image' => 'Định dạng không cho phép',
            'image.max' => 'Kích thước file quá lớn',
            'summary.required' => 'Mô tả tin không được để trống',
            'content.required' => 'Nội dung tin không được để trống'
        ];
        $this->validate($request,$rules,$messages);

        $new = new News();

        $file_name = '';
        if ($request->hasFile('image')) {
            $image = $request->image;
            $file_name = 'new-' . time() . '-' . $image->getClientOriginalName();

            $dir_uploads = public_path() . '/uploads/news';
            $image->move($dir_uploads,$file_name);
        } else {
            $new->image = '';
        }
        $image = $file_name;
        $new->image = $image;
        $new->title = $request->title;
        $new->summary = $request->summary;
        $new->content = $request->content;
        $new->status = $request->status;
        $isInsert = $new->save();

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
        $new = News::find($id);
        return view('admin.news.detail', compact('new'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUpdate($id)
    {
        $new = News::find($id);
        return view('admin.news.update', compact('new'));
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
            'summary' => 'required',
            'content' => 'required'
        ];
        $messages = [
            'title.required' => 'Tiêu đề không được để trống',
            'image.image' => 'Định dạng không cho phép',
            'image.max' => 'Kích thước file quá lớn',
            'summary.required' => 'Mô tả tin không được để trống',
            'content.required' => 'Nội dung tin không được để trống'
        ];
        $this->validate($request,$rules,$messages);

        $new = News::find($id);
        $file_name = $new->image;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $file_name = 'new-' . time() . '-' . $image->getClientOriginalName();
            $dir_uploads = public_path() . '/uploads/news';
            @unlink($dir_uploads . '/' . $new->image);
            $image->move($dir_uploads,$file_name);
        } else {
            $new->image = '';
        }
        $image = $file_name;
        $new->image = $image;
        $new->title = $request->title;
        $new->summary = $request->summary;
        $new->content = $request->content;
        $new->status = $request->status;

        $isUpdate = $new->save();

        if ($isUpdate) {
            session()->flash('success', 'Cập nhật thành công');
        } else {
            session()->flash('error', 'Cập nhật thất bại');
        }

        return redirect('admin/new/index');
    }

    public function delete($id)
    {
        $new = News::find($id);
        $isDelete = $new->delete();

        if ($isDelete) {
            session()->flash('success', 'Xóa thành công');
        } else {
            session()->flash('error', 'Xóa thất bại');
        }

        return redirect('admin/new/index');
    }
}
