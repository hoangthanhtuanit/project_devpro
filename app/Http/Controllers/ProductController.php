<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function getCreate()
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.products.create', compact('categories','colors', 'sizes'));
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'name' => 'required',
            'image' => 'image|max:10000',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ];
        $messages = [
            'name.required' => 'Tên không được để trống',
            'image.image' => 'Định dạng không cho phép',
            'image.max' => 'Kích thước file quá lớn',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá phải là số',
            'quantity.required' => 'Số lượng không được để trống',
            'quantity.numeric' => 'Số lượng phải là số'
        ];
        $this->validate($request,$rules,$messages);

        $product = new Product();
        $product_name = Product::where('name', $request->name)->first();
        $file_name = '';
        if ($request->hasFile('image')) {
            $image = $request->image;
            $file_name = 'product-' . time() . '-' . $image->getClientOriginalName();

            $dir_uploads = public_path() . '/uploads/products';
            $image->move($dir_uploads, $file_name);
        } else {
            $product->image = '';
        }
        $image = $file_name;

        if (isset($product_name) && ($product_name->price == $request->price)) {
            $dir_uploads = public_path() . '/uploads/products';
            @unlink($dir_uploads . '/' . $product_name->image);
            Product::where('quantity',$product_name->quantity)->update(['quantity'=> $product_name->quantity + $request->quantity, 'sale' => $request->sale, 'image' => $image, 'summary' => $request->summary, 'content' => $request->content, 'status' => $request->status]);
        } else {
            $product->name = $request->name;
            $product->category_id = $request->category_id;

            $product->image = $image;
            $product->price = $request->price;
            $product->sale = $request->sale;
            $product->quantity = $request->quantity;
            $product->summary = $request->summary;
            $product->content = $request->content;
            $product->status = $request->status;
            $isInsert = $product->save();
            if ($isInsert) {
                session()->flash('success', 'Thêm mới thành công');
            } else {
                session()->flash('error', 'Thêm mới thất bại');
            }
        }
        return redirect('admin/product/index');
    }

    public function detail($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.detail', compact('product', 'categories'));
    }

    public function getUpdate($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.update', compact('product','categories'));
    }

    public function postUpdate(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'image' => 'image|max:10000',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ];
        $messages = [
            'name.required' => 'Tên không được để trống',
            'image.image' => 'Định dạng không cho phép',
            'image.max' => 'Kích thước file quá lớn',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá phải là số',
            'quantity.required' => 'Số lượng không được để trống',
            'quantity.numeric' => 'Số lượng phải là số'
        ];
        $this->validate($request,$rules,$messages);

        $product = Product::find($id);

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $file_name = $product->image;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $file_name = 'product-' . time() . '-' . $image->getClientOriginalName();
            $dir_uploads = public_path() . '/uploads/products';
            @unlink($dir_uploads . '/' . $product->image);
            $image->move($dir_uploads,$file_name);
        } else {
            $product->image = '';
        }
        $image = $file_name;
        $product->image = $image;
        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->quantity = $request->quantity;
        $product->summary = $request->summary;
        $product->content = $request->content;
        $product->status = $request->status;
        $isInsert = $product->save();
        if ($isInsert) {
            session()->flash('success', 'Cập nhật thành công');
        } else {
            session()->flash('error', 'Cập nhật thất bại');
        }
        return redirect('admin/product/index');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $isDelete = $product->delete();

        if ($isDelete) {
            session()->flash('success', 'Xóa thành công');
        } else {
            session()->flash('error', 'Xóa thất bại');
        }

        return redirect('admin/product/index');
    }
}
