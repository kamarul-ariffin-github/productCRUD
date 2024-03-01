<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                $products = Product::query();

                if ($request->has('search')) {
                    $search = $request->get('search');
                    $products->where(function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('details', 'like', '%' . $search . '%')
                            ->orWhere('publish', 'like', '%' . $search . '%');
                    });
                }

                $products = $products->paginate(10);

                return view('user.userhome', compact('products'));
            } else if ($usertype == 'admin') {
                $products = Product::query();

                if ($request->has('search')) {
                    $search = $request->get('search');
                    $products->where(function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('details', 'like', '%' . $search . '%')
                            ->orWhere('publish', 'like', '%' . $search . '%');
                    });
                }

                $products = $products->paginate(10);

                return view('admin.adminhome', compact('products'));
            } else {
                return redirect()->back();
            }
        }
    }

    public function addProduct()
    {
        return view('user.addproduct');
    }

    public function productDetails($id)
    {
        $product = Product::join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*', 'users.name as user_name')
            ->find($id);

        return view('user.productdetails', compact('product'));
    }

    public function editProduct($id)
    {
        $product = Product::find($id);

        if (!$this->canModifyProduct($product)) {
            Alert::error('Error', 'You are not authorized to update this product!');
            return redirect()->route('home');
        }

        return view('user.editproduct', compact('product'));
    }

    public function create_product(Request $request)
    {
        $user = Auth()->user();
        $product = new Product;

        $product->user_id = $user->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->publish = $request->publish;

        $product->save();

        Alert::success('Congrats', 'You have created the product successfully!');

        return redirect()->route('home');
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        if (!$this->canModifyProduct($product)) {
            Alert::error('Error', 'You are not authorized to delete this product!');
            return redirect()->route('home');
        }

        $product->delete();

        Alert::success('Congrats', 'You have deleted the product successfully!');

        return redirect()->back();
    }

    public function update_product($id, Request $request)
    {
        $product = Product::find($id);

        if (!$this->canModifyProduct($product)) {
            Alert::error('Error', 'You are not authorized to update this product!');
            return redirect()->route('home');
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->publish = $request->publish;

        $product->save();

        Alert::success('Congrats', 'You have updated the product successfully!');

        return redirect()->route('home');
    }

    private function canModifyProduct($product)
    {
        $user = Auth::user();

        if ($user->usertype == 'admin' || $product->user_id == $user->id) {
            return true;
        }

        return false;
    }
}
