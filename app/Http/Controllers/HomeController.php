<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Images;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Subscribers;
use App\Models\Contacts;
use App\Models\User;
use App\Models\Todo;
use App\Models\Rating;
use App\Models\About;





use RealRashid\SweetAlert\Facades\Alert;
use session ;
use Stripe ;


class HomeController extends Controller
{
    public function index()
    {
       if(Auth::id()){
         return redirect('redirect');
       }else {
         $Men =Product::where('category','=',"Men's clothing")->latest()->get();
         $women = Product::where('category','=',"Women's clothing")->latest()->get();

         $kids = Product::where('category','=',"kid's clothing")->latest()->get();



         return view('welcome',compact('Men','women','kids'));
       }
    }

    public function redirect(){
      if(Auth::id()){
        $usertype = Auth::user()->usertype ;
        // start of smaller if
        if($usertype==1){

          $orderCount = Order::all()->count();

          $delivered = Order::where('delivery_status','=','delivered')->count();

          $processing = Order::where('delivery_status','=','processing')->count();

          $products = Product::all()->count();

          $men = Product::where('category','=',"Men's clothing")->count();

          $women = Product::where('category','=',"Women's clothing")->count();

          $kids = Product::where('category','=',"Kid's clothing")->count();

          $accessories = Product::where('category','=',"Fashion accessories")->count();

          $contacts = Contacts::all()->count();
          $subscribers = Subscribers::all()->count();

          $visitors = $contacts + $subscribers ;

          $recent_orders = Order::where('id','>=',1)->latest()->get();

          $users = User::where('id','>=',1)->latest()->get();

          $todos = Todo::orderBy('id','asc')->get();




          return view('admin.homepage',compact('orderCount','delivered','processing','products','men','women','kids','accessories','visitors','subscribers','contacts','recent_orders','users','todos'));
        }else {
          $Men =Product::where('category','=',"Men's clothing")->latest()->get();

          $women = Product::where('category','=',"Women's clothing")->latest()->get();

          $kids = Product::where('category','=',"kid's clothing")->latest()->get();

          $user_id = Auth::user()->id;
          $cartCount = Cart::where('user_id','=',$user_id)->count();

          return view('welcome',compact('Men','women','kids','cartCount'));
        }

      }

    }

      // view product start
    public function view_product($id){
      if(Auth::id()){
      $usertype = Auth::user()->usertype;
      if($usertype==0){
        $product = Product::find($id);
        $product_id = $product->id;
        $extra_images =Images::where('product_id','=',$product_id)->latest()->get();

        $user_id = Auth::user()->id;
        $cartCount = Cart::where('user_id','=',$user_id)->count();
        $rating = Rating::where('product_id',$product_id)->sum('rate');
        $ratingCount = Rating::where('product_id',$product_id)->count();
        if($ratingCount>0){
          $rate = $rating/$ratingCount;
            return view('Home.viewProduct',compact('product','extra_images','cartCount','rate'));
        }else{
            return view('Home.viewProduct',compact('product','extra_images','cartCount'));
        }
      }else{
        Alert::warning('Unauthorized access!!','you cannot access this page !!');

        return redirect('/redirect');
      }

    }else{
      $product = Product::find($id);
      $product_id = $product->id;
      $extra_images =Images::where('product_id','=',$product_id)->latest()->get();
      $rating = Rating::where('product_id',$product_id)->sum('rate');
      $ratingCount = Rating::where('product_id',$product_id)->count();

        $rate = $rating/$ratingCount;
        return view('Home.viewProduct',compact('product','extra_images','rate'));

    }
  }
      // view product end

      // view cart start
    public function view_cart(){
      if (Auth::id()){
        $usertype = Auth::user()->usertype ;
        if($usertype==0){
          $user_id = Auth::user()->id;
          $cartCount = Cart::where('user_id','=',$user_id)->count();
          $user_cart = Cart::where('user_id','=',$user_id)->latest()->paginate(4);

          return view('Home.view_cart',compact('cartCount','user_cart'));
        }else{
          Alert::warning('Unauthorized access');
          return redirect('redirect');
        }

      }else{
        return redirect('/login');
      }
    }
      // view cart end

      // delete cart start
    public function delete_cart($id){
       $usertype = Auth::user()->usertype;
      $cart = Cart::find($id);
      if ($usertype==0){

      $cart->delete();

      Alert::success('Cart removed successfully','add new items to cart to order');
      return redirect()->back();
    }else{
      return redirect('/redirect');
    }
    }
      // delete cart end

      // cash on delivery start
    public function cash_on_delivery()
    {
      $user = Auth::user();
      $user_id = Auth::user()->id;
      $user_cart = Cart::where('user_id','=',$user_id)->latest()->get();

       foreach($user_cart as $cart){
        $order = new Order ;
        $order->name = $user->name ;
        $order->email = $user->email ;
        $order->user_id = $user_id;
        $order->phone = $user->phone ;
        $order->address = $user->address ;
        $order->product_id = $cart->product_id;
        $order->product_name = $cart->product_name;
        $order->product_image = $cart->product_image;
        $order->quantity_ordered = $cart->quantity_ordered;
        $order->product_price = $cart->product_price;
        $order->payment_status = 'Cash_on_delivery';
        $order->delivery_status = 'processing';
        $order->save();

        //deleting the the user cart from his cart table
        $cart_id = $cart->id ;
        $cart = Cart::find($cart_id);
        $cart->delete();
      }

        Alert::success('Order placed successfully','Thank you for shopping with us');

        return redirect()->back();
    }
      // cash delivery end

      // all women start
    public function all_women_products(){

      if(Auth::id()){
      $usertype = Auth::user()->usertype;
      if($usertype==0){
        $all_women = Product::where('category','=',"Women's clothing")->latest()->paginate(15);
        $user_id = Auth::user()->id;
        $cartCount = Cart::where('user_id','=',$user_id)->count();

        return view('Home.all_women',compact('all_women','cartCount'));

      }else{
        Alert::warning('Unauthorized access!!','you cannot access this page !!');

        return redirect('/redirect');
      }

    }else{
      $all_women = Product::where('category','=',"Women's clothing")->latest()->paginate(15);

      return view('Home.all_women',compact('all_women'));
    }

    }
      // all women end

      // all men start
    public function all_men(){

      if(Auth::id()){
      $usertype = Auth::user()->usertype;
      if($usertype==0){
        $all_men = Product::where('category','=',"Men's clothing")->latest()->paginate(15);
        $user_id = Auth::user()->id;
        $cartCount = Cart::where('user_id','=',$user_id)->count();

        return view('Home.all_men',compact('all_men','cartCount'));

      }else{
        Alert::warning('Unauthorized access!!','you cannot access this page !!');

        return redirect('/redirect');
      }

    }else{
      $all_men = Product::where('category','=',"Men's clothing")->latest()->paginate(15);


      return view('Home.all_men',compact('all_men'));
    }
  }
      // all men end

      // all kids start
    public function all_kids(){
      if(Auth::id()){
      $usertype = Auth::user()->usertype;
      if($usertype==0){
        $all_kids = Product::where('category','=',"Kid's clothing")->latest()->paginate(12);
        $user_id = Auth::user()->id;
        $cartCount = Cart::where('user_id','=',$user_id)->count();

        return view('Home.all_kids',compact('all_kids','cartCount'));

      }else{
        Alert::warning('Unauthorized access!!','you cannot access this page !!');

        return redirect('/redirect');
      }

    }else{
      $all_kids = Product::where('category','=',"Kid's clothing")->latest()->paginate(12);


      return view('Home.all_kids',compact('all_kids'));
    }
  }
      // all kids end


      // card payment start
    public function card_payment($total){
      if(Auth::id()){
      $usertype = Auth::user()->usertype;
      if($usertype==0){

        $total_payment = $total ;
        $user_id = Auth::user()->id;
        $cartCount = Cart::where('user_id','=',$user_id)->count();

        return view ('Home.card_payment',compact('total_payment','cartCount'));

      }else{
        Alert::warning('Unauthorized access!!','you cannot access this page !!');

        return redirect('/redirect');
      }

    }else{
        return redirect('/login');
    }

    }
    // card payment end


      // stripe payment start
    public function stripePost(Request $request,$total)
  {
      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      Stripe\Charge::create ([
              "amount" => $total * 100,
              "currency" => "usd",
              "source" => $request->stripeToken,
              "description" => "Thank you for payment , product will be delivered soon",
      ]);




      $user = Auth::user();
      $user_id = Auth::user()->id;
      $user_cart = Cart::where('user_id','=',$user_id)->get();

      foreach($user_cart as $cart){
       $order = new Order ;
       $order->name = $user->name ;
       $order->email = $user->email ;
       $order->user_id = $user_id;
       $order->phone = $user->phone ;
       $order->address = $user->address ;
       $order->product_id = $cart->product_id;
       $order->product_name = $cart->product_name;
       $order->product_image = $cart->product_image;
       $order->quantity_ordered = $cart->quantity_ordered;
       $order->product_price = $cart->product_price;
       $order->payment_status = 'Paid_with_card';
       $order->delivery_status = 'processing';
       $order->save();


        $cart_id = $cart->id;
        $cart = Cart::find($cart_id);
        $cart->delete();
      }

        Alert::success('Payment successful','Product will be delivered soon');

      return redirect('/view_cart');
  }
    // stripe payment end

      // about us start
    public function about_us(){
      if(Auth::id()){
      $usertype = Auth::user()->usertype;
      if($usertype==0){
           $about_info = About::where('id','>=',1)->latest()->get();
           $user_id = Auth::user()->id;
           $cartCount = Cart::where('user_id','=',$user_id)->count();
        return view ('Home.about_us', compact('about_info','cartCount'));

      }else{
        Alert::warning('Unauthorized access!!','you cannot access this page !!');

        return redirect('/redirect');
      }

    }else{
      $about_info = About::where('id','>=',1)->latest()->get();
   return view ('Home.about_us', compact('about_info'));

    }

    }
    // about us end

      //all products start
    public function all_products(){

	     if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==0){
          $products = Product::where('id','>=',1)->latest()->paginate(15);
          $user_id = Auth::user()->id;
          $cartCount = Cart::where('user_id','=',$user_id)->count();

          return view ('Home.all_products',compact('products','cartCount'));

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        $products = Product::where('id','>=',1)->latest()->paginate(15);

        return view ('Home.all_products',compact('products'));
      }
    }
      // all products end

    // contact us start
    public function contact_us(){

	  if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==0){
          $user_id = Auth::user()->id;
          $cartCount = Cart::where('user_id','=',$user_id)->count();
          return view ('Home.contact_us',compact('cartCount'));


        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return view ('Home.contact_us');

      }
    }
      // contact us end

      // home product search starts
      public function search_home_products(request $request)
      {
        if(Auth::id()){
        $usertype= Auth::user()->usertype;
        if($usertype==0){
          $search = $request->search ;
          $products = Product::where('name','like','%'.$search.'%')->orWhere('category','like','%'.$search.'%')->latest()->paginate(15);

           return view('Home.all_products',compact('products'));
        }else{
          Alert::warning('Unauthorized access');
          return redirect('/redirect');
        }
        }else{
          $search = $request->search ;
          $products = Product::where('name','like','%'.$search.'%')->orWhere('category','like','%'.$search.'%')->latest()->paginate(15);

           return view('Home.all_products',compact('products'));
        }

      }


      public function search_men_products(request $request)
      {
        if(Auth::id()){
        $usertype= Auth::user()->usertype;
        if($usertype==0){
          $search = $request->search ;
          $all_men = Product::where('name','like','%'.$search.'%')->where('category','=',"Men's clothing")->latest()->paginate(12);

          $user_id = Auth::user()->id;
          $cartCount = Cart::where('user_id','=',$user_id)->count();

           return view('Home.all_men',compact('all_men','cartCount'));
        }else{
          Alert::warning('Unauthorized access');
          return redirect('/redirect');
        }
        }else{
          $search = $request->search ;
          $all_men = Product::where('name','like','%'.$search.'%')->where('category','=',"Men's clothing")->latest()->paginate(12);

           return view('Home.all_men',compact('all_men'));
        }

      }



      public function search_women_products(request $request)
      {
        if(Auth::id()){
        $usertype= Auth::user()->usertype;
        if($usertype==0){
          $search = $request->search ;
          $all_women = Product::where('name','like','%'.$search.'%')->where('category','=',"Women's clothing")->latest()->paginate(12);

          $user_id = Auth::user()->id;
          $cartCount = Cart::where('user_id','=',$user_id)->count();

           return view('Home.all_women',compact('all_women','cartCount'));
        }else{
          Alert::warning('Unauthorized access');
          return redirect('/redirect');
        }
        }else{
          $search = $request->search ;
          $all_women = Product::where('name','like','%'.$search.'%')->where('category','=',"Women's clothing")->latest()->paginate(12);

           return view('Home.all_women',compact('all_women'));
        }

      }


      public function search_kids_products(request $request)
      {
        if(Auth::id()){
        $usertype= Auth::user()->usertype;
        if($usertype==0){
          $search = $request->search ;
          $all_kids = Product::where('name','like','%'.$search.'%')->where('category','=',"Kid's clothing")->latest()->paginate(12);

           return view('Home.all_kids',compact('all_kids'));
        }else{
          Alert::warning('Unauthorized access');
          return redirect('/redirect');
        }
        }else{
          $search = $request->search ;
          $all_kids = Product::where('name','like','%'.$search.'%')->where('category','=',"Kid's clothing")->latest()->paginate(12);

           return view('Home.all_kids',compact('all_kids'));
        }

      }

      // product rating
      public function rate_product(request $request ,$id){

        $product = Product::find($id);

        $rating = new Rating;
        $rating->rate = $request->rating;
        $rating->product_id = $product->id ;
        $rating->save();

        Alert::success('Thank you');
        return redirect()->back();

      }



}
