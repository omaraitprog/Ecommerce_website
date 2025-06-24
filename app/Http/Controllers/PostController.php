<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Panier;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function verify()
    {
        $User_name = request()->name;
        $User_password = request()->password;

        $User = User::where('name', $User_name)->first();

        if (!$User || !Hash::check($User_password, $User->password)) {
            return to_route('home');
        }

        return to_route('index', ['user' => $User->id]);
    }

    public function index(User $user)
{
    $Products = Product::all();
    return view('index', ['User' => $user, 'Products' => $Products]);
}


    public function create()
    {
        return view('create');
    }

    public function store()
    {
        request()->validation([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required','min:8'],
        ]);
        $User = User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => Hash::make(request()->password)
        ]);

        return to_route('index', ['user' => $User->id]);
    }
  public function buy($user_id, $product_id)
{
    $product = Product::findOrFail($product_id);

    Panier::create([
        'name' => $product->name,
        'prix' => $product->prix,
    ]);

    $productsInCart = Panier::all();

    return view('buy', [
        'Myproducts' => $productsInCart,
        'user_id' => $user_id
    ]);
}


    public function show($product_id){
        $product=Product::find($product_id);
        
        return view('show',['product' => $product]);
    }
}
