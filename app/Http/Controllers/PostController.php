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
        'user_id' => $user_id,
        'quantity' => 1
    ]);
   
    $productsInCart = Panier::all()->where('user_id',$user_id);
     $user=User::find($user_id);
     $quantity=Panier::all()->where('user_id',$user_id)->where('name',$product->name)->count();
     
    return view('buy', [
        'Myproducts' => $productsInCart,
        'user_id' => $user_id,
        'user' => $user,
        'quantity' => $quantity
    ]);
}


    public function show($user,$product){
        $product=Product::find($product);
        
        return view('show',['user' => $user,'product' => $product]);
    }
    public function create_produit( User $user){

        return view('create_produit',['user' => $user]);
    }
    public function store_newproduit(User $user){
        $name=request()->name;
         $description=request()->description;
          $Prix=request()->Prix;
          Product::create([
            'name' => $name,
            'description'=> $description,
            'Prix' => $Prix
          ]);
          return to_route('index',['user' => $user]);
    }

}
