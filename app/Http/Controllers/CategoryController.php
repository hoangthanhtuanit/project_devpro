<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories/index', compact('categories'));
    }

    /**
     * Form thêm mới
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreate()
    {
        return view('admin.categories.create');
    }

    /**
     * Xử lý thêm danh mục
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postCreate(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories'
        ];
        $messages = [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Danh mục đã tồn tại'
        ];
        $this->validate($request,$rules,$messages);

        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $isInsert = $category->save();

        if ($isInsert) {
            session()->flash('success', 'Thêm danh mục thành công');
        } else {
            session()->flash('error', 'Thêm danh mục thất bại');
        }

        return redirect('admin/category/index');
    }

    /**
     * Chi tiết danh mục
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $category = Category::find($id);
        return view('admin.categories.detail', compact('category'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUpdate($id)
    {
        $category = Category::find($id);
        return view('admin.categories.update', compact('category'));
    }

    /**
     * Xử lý cập nhật danh mục
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postUpdate(Request $request, $id)
    {
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Tên danh mục không được để trống'
        ];
        $this->validate($request,$rules,$messages);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->status = $request->status;

        $isUpdate = $category->save();

        if ($isUpdate) {
            session()->flash('success', 'Cập nhật thành công');
        } else {
            session()->flash('error', 'Cập nhật thất bại');
        }

        return redirect('admin/category/index');
    }

    public function delete(Request $request, $id)
    {
        $category = Category::find($id);
        $isDelete = $category->delete();

        if ($isDelete) {
            session()->flash('success', 'Xóa thành công');
        } else {
            session()->flash('error', 'Xóa thất bại');
        }

        return redirect('admin/category/index');
    }
}
