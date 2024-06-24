<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\ProductRequest;
use App\Models\appointment;

class AdminController extends Controller
{
    public function __invoke()
    {
        $products = Product::all();
        $categories = Category::all();
        $apps = appointment::orderBy('id','DESC')->get();
        $users = User::all();
        return view('admin.admin', compact('products', 'categories', 'users','apps'));
    }
    public function changeProduct(Request $request, Product $product)
    {
        switch ($request->method()) {
            case 'POST':
                $data = $request->all();

                if ($request->has('name')) {
                    $data['slug'] = Str::slug($request->name);

                    if ($data['slug'] == $request->name) {
                        $data['slug'] = Str::slug($request->name . "-" . $product->id);
                    }
                }
                if ($request->has('image')) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp'
                    ]);
                    $imgname = $product->id . time() .  "product" . "." . $request->image->extension();
                    $request->image->move(public_path('images/products/'), $imgname);

                    $data['image'] = $imgname;
                    File::delete(public_path() . "/images/products" . $product->image);
                }

                $product->update($data);
                unset($data['_token']);
                unset($data['slug']);

                return to_route('admin')->with(['success' => 'Товар был обновлен', 'changed' => array_keys($data)]);

            case 'GET':
                return view('admin.product', ['product' => $product]);
        }
    }
    public function deleteProduct(Product $product)
    {
        File::delete(public_path() . "/images/products" . $product->image);
        $product->delete();
        return to_route('admin')->with(['success' => 'Товар был удален']);
    }
    public function category(Request $request, $category = 0)
    {
        switch ($request->method()) {
            case 'POST':
                $data = $request->all();
                $data['slug'] = Str::slug($data['name']);
                if ($category != 0) {
                    Category::find($category)->update($data);
                    return to_route('admin')->with(['success' => 'Категория была обновлен']);
                } else {
                    Category::create($data);
                    return to_route('admin')->with(['success' => 'Категория была создана']);
                }

            case 'GET':
                if ($category != 0) {
                    $pr = Category::find($category);
                    return view('admin.category', compact('pr'));
                } else {
                    return view('admin.category');
                }
            case 'DELETE':
                $cat = Category::find($category);
                Product::where('category_id', $cat->id)->delete();
                $cat->delete();
                return to_route('admin')->with(['success' => 'Категория и его товары были удалены']);
        }
    }

    public function user(Request $request, $user = 0)
    {
        switch ($request->method()) {
            case 'POST':
                $data = $request->all();
                if ($user != 0) {
                    if ($request->has('password')) {
                        $data['password'] = Hash::make($request->password);
                    }
                    User::find($user)->update($data);

                    return to_route('admin')->with(['success' => 'Пользователь был обновлен']);
                } else {
                    if ($request->has('password')) {
                        $data['password'] = Hash::make($request->password);
                    }
                    User::create($data);
                    return to_route('admin')->with(['success' => 'Пользователь был создан']);
                }

            case 'GET':
                if ($user != 0) {
                    $product = User::find($user);

                    return view('admin.user', compact('product'));
                } else {
                    return view('admin.user');
                }
            case 'DELETE':
                $brand = User::find($user);
                $brand->delete();
                return to_route('admin')->with(['success' => 'Пользователь был удален']);
        }
    }
    public function addProduct(Request $request)
    {
        switch ($request->method()) {
            case 'POST':
                $data = $request->all();
                $request->validate([
                    'name' => 'required|string',
                    'price' => 'required|integer',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
                    'category_id' => 'required|integer',
                    'in_stock' => 'required|integer',
                ]);
                $imgname = Str::slug($request->name . time() .  "product") . "." . $request->image->extension();
                $request->image->move(public_path('images/products/'), $imgname);

                $data['image'] = $imgname;
                $data['slug'] = rand(1, 5000) . '-' . Str::slug($request->name) . "-" . rand(1, 5000);
                Product::create($data);
                return back()->with(['success' => 'Товар был создан']);

            case 'GET':
                return view('admin.addProduct');
        }
    }
}
