<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Order;
use App\Order_detail;
use App\Product;
use App\Size;
use App\Slide;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct()
    {
        $categories = Category::where('status', 1)->get();
        view::share(compact('categories'));
    }

    public function home()
    {
        $slides = Slide::where('status', 1)->get();
        $products = Product::all();
        return view('pages.home', compact('slides', 'products'));
    }

    public function singleProduct($id)
    {
        $product = Product::find($id);
        $colors = Color::all();
        $sizes = Size::all();
        return view('pages.single-product', compact('product', 'colors', 'sizes'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $id)->paginate(10);
        return view('pages.category', compact('products', 'categories'));
    }

    public function addCart(Request $request, $id)
    {
        $product = Product::find($id);
        $quantity = $request->quantity;
        $size = $request->size;
        $color = $request->color;
        $price = $product->price;
        $price_old = $product->price;
        $sale = $product->sale;
        if ($sale) {
            $price = $price * (100 - $sale) / 100;
        }
        if ($quantity >= 1) {
            Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => $quantity, 'price' => $price, 'options' => array('img' => $product->image, 'color' => $color, 'size' => $size, 'old_price' => $price_old, 'sale' => $sale)));
        }
        return back();
    }

    public function updateCart(Request $request)
    {
        $quantity = $request->quantity;
        $rowId = $request->rowId;
        Cart::update($rowId, $quantity);
        return back();
    }

    public function removeCart($id)
    {
        if ($id == 'all') {
            Cart::destroy();
        } else {
            Cart::remove($id);
        }
        return back();
    }

    public function cart()
    {
        $cart_lists = Cart::content();
        $total_price = Cart::total(0, 3);
        return view('pages.cart', compact('cart_lists', 'total_price'));
    }

    public function getPayment()
    {
        $cart_lists = Cart::content();
        $total_price = Cart::total(0, 3);
        return view('pages.payment', compact('cart_lists', 'total_price'));
    }

    public function postPayment(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|numeric|min:10',
            'email' => 'email|required',
            'address' => 'required',
            'zip' => 'required'
        ];
        $messages = [
            'first_name.required' => 'Họ đệm không được để trống',
            'last_name.required' => 'Tên không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'phone_number.numeric' => 'Số điện thoại không đúng định dạng',
            'phone_number.min' => 'Số điện thoại không đúng định dạng',
            'email.email' => 'Không đúng định dạng email',
            'email.required' => 'Địa chỉ email không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'zip.required' => 'Mã bưu chính không được để trống',
        ];
        $this->validate($request, $rules, $messages);

        $price_total = str_replace(',', '', Cart::total(0, 3));
        $orderId = Order::insertGetId([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'price_total' => (int)$price_total,
            'payment' => $request->payment,
            'note' => $request->note
        ]);

        if ($orderId) {
            $products = Cart::content();
            foreach ($products as $product) {
                Order_detail::insert([
                    'order_id' => $orderId,
                    'product_id' => $product->id,
                    'quantity' => $product->qty,
                    'price' => $product->options->old_price,
                    'sale' => $product->options->sale
                ]);
            }
        }

        if ($orderId) {
            $products = Cart::content();
            foreach ($products as $product) {
                $p_up = Product::where('id', $product->id)->first();
                Product::where(['quantity' => $p_up->quantity, 'quantity_sold' => $p_up->quantity_sold])->update(['quantity' => $p_up->quantity - $product->qty, 'quantity_sold' => $p_up->quantity_sold + $product->qty]);
            }
        }
        Cart::destroy();

        if ($orderId) {
            session()->flash('success', 'Đặt hàng thành công');
        } else {
            session()->flash('error', 'Đặt hàng thất bại');
        }
        return back();
    }
}
