<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Product;
use App\Models\Images;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Subscribers;
use App\Models\Contacts;
use App\Models\User;
use App\Models\Todo;
use App\Models\About;





use Notification;
use App\Notifications\sendEmailNotification;
use App\Notifications\subscriberMail;
use App\Notifications\contactMail;









class AdminController extends Controller
{
      // adding product start
    public function add_product(){
      if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          // pulling all categories to our form
          $categories = Category::where('id','>=',1)->latest()->get();
          return view ('adminpages.add_product',compact('categories'));
        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');
          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }
    }
      // adding product end

    // adding category start
    public function add_category(){
      if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $categories = Category::where('id','>=',1)->latest()->paginate(10);

          return view ('adminpages.category',compact('categories'));
        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');
          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }
    }
    // adding category end

      // saving category start
    public function save_category(request $request){
      $category = new Category ;
      $category->name = $request->name ;
      $category->save();
      return redirect()->back()->with('message','category saved');
    }
    // saving category end

      // deleting category start
    public function delete_category($id){

    if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
 	        $category = Category::find($id);
          $category->delete();
          return redirect()->back()->with('message','category deleted');
        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }
    }
      // deleting category end


      // saving product start
     public function save_product(request $request){
       $this->validate($request,[
         'name'=>'required',
         'description'=>'required',
         'price'=>'required',
         'quantity'=>'required',
         'discount_price'=>'',
         'image'=>'image',
         'category'=>'',
       ]);

       $image = $request->file('image');
       $imagename = time().'_'.$image->getClientOriginalName();
       $request->file('image')->move('products_images',$imagename);

       $product = new Product ;
       $product->name = $request->name ;
       $product->price = $request->price ;
       $product->discount_price = $request->discount_price ;
       $product->quantity = $request->quantity ;
       $product->image = $imagename ;
       $product->description= $request->description;
       $product->category = $request->product_category;
       $product->save();

       Alert::success('Product uploaded successfully','view product to see all products');

       return redirect()->back();
     }
        // saving product end

        // viewing products start
     public function view_products(){

     if(Auth::id()){
         $usertype = Auth::user()->usertype;
         if($usertype==1){
           $products = Product::where('id','>=',1)->latest()->paginate(8);

           return view ('adminpages.all_products',compact('products'));
         }else{
           Alert::warning('Unauthorized access!!','you cannot access this page !!');
           return redirect('/redirect');
         }

       }else{
         return redirect('/login');
       }
     }
      //viewing products end

        // deleting product start
     public function delete_product($id){

	   if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $product = Product::find($id);
          $product->delete();

          Alert::success('Product deleted successfully','Go to add product to add more products');
          return redirect()->back();

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

     }
      // deleting product end

      // Editing product start
     public function edit_product($id){

	   if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $categories = Category::where('id','>=',1)->latest()->get();
          $product = Product::find($id);
          return view('adminpages.edit_product',compact('product','categories'));

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

     }
        //Editing product end

      // storing edited product start
     public function edited_product(Request $request,$id){
          $old_product = Product::find($id);
        $this->validate($request,[
          'name'=>'required',
          'description'=>'required',
          'price'=>'required',
          'quantity'=>'required',
          'discount_price'=>'',
          'image'=>'image',
          'category'=>'',
        ]);

         $product = Product::find($id) ;
         $product->name = $request->name ;
         $product->description = $request->description ;
         $product->quantity = $request->quantity ;
         $product->price = $request->price ;
         $product->discount_price = $request->discount_price ;
         $product->category = $request->product_category ;


         if($request->hasfile('image')){
         $image = $request->file('image');
         $imagename = time().'.'.$image->getClientOriginalName();
         $request->file('image')->move('products_images',$imagename);
       }else {
         $imagename = $old_product->image;
       }

         $product->image= $imagename;
         $product->save();

         Alert::success('Product updated successfully');
         return redirect('/view_products');
      }
      // storing edited product end

        // adding extra image start
      public function add_images($id){

	    if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $product = Product::find($id);

          return view('adminpages.extra_images',compact('product'));

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }
      }
          // adding extra image end

          // editing extra image start
      public function extra_image(request $request,$id){
        $product = Product::find($id);

        $this->validate($request,[
          'extra_image'=>'image',
        ]);

        $image = $request->extra_image ;
        $imagename = time().'_'.$image->getClientOriginalName();
        $request->file('extra_image')->move('extra_images',$imagename);


        $extra_image = new Images ;
        $extra_image->image = $imagename;
        $extra_image->product_id = $product->id;
        $extra_image->save();

        Alert::success('Image uploaded successfully');

        return redirect('/view_products');
      }
        // editing extra image end

        // add to cart start
      public function add_to_cart(request $request,$id){
        if(Auth::id()){
        $product = Product::find($id);
        $user = Auth::user();

        $cart = new Cart ;
        $cart->user_name = $user->name;
        $cart->user_id = $user->id;
        $cart->product_name= $product->name ;
        $cart->email= $user->email ;
        $cart->phone= $user->phone ;
        $cart->email= $user->email ;
        $cart->product_id= $product->id ;

        $cart->quantity_ordered = $request->quantity_ordered;
        if($product->discount_price!=null){
          $cart->product_price =$product->discount_price*$request->quantity_ordered;
        }else{
          $cart->product_price= $product->price*$request->quantity_ordered;
        }

        $cart->product_image = $product->image ;
        $cart->save();

        Alert::success('Cart added successfully','proceed to cart to make an order');

        return redirect()->back();
      }else {
        return redirect('/login');
      }
      }
        // add to cart end

        // view images start
      public function view_images($id){

	    if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $product = Product::find($id);
          $product_id = $product->id;

          $product_images = Images::where('product_id','=',$product_id)->latest()->paginate(4);
          return view('adminpages.view_extra_images',compact('product_images'));

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
        // view image end


        // delete extra image start
      public function delete_extra_image($id){

	    if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $image = Images::find($id);
          $image->delete();

          Alert::success('Image deleted successfully');
          return redirect()->back();

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
        // delete extra image end

        // orders start
      public function orders(){
	   if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $orders = Order::where('id','>=',1)->latest()->paginate(10);
          return view ('adminpages.orders',compact('orders'));

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
        // orders end

      // delivered start
      public function delivered($id){

	    if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $order = Order::find($id);

          $order->delivery_status = 'delivered';
          $order->save();
          Alert::success('Order delivered');
          return redirect()->back();

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
        //delivered end

        // send email start
      public function send_email($id){

	    if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $order = Order::find($id);
          return view('Adminpages.send_email',compact('order'));

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
        // send email end


          // send email notification start
      public function send_email_notification(request $request ,$id){
        $order = Order::find($id);

        $details=[
          'greeting'=>$request->greeting,
          'first_line'=>$request->first_line,
          'button'=>$request->button_name,
          'url'=>$request->url,
          'body'=>$request->body,
          'last_line'=>$request->last_line,
        ];


        Notification::send($order, new sendEmailNotification($details));

        Alert::success('Email sent successfully');
        return redirect()->back();
      }
          // send email notification end

        // subscribers start
      public function subscribers(request $request){

        $subscriber = new Subscribers ;
        $subscriber->name = $request->name ;
        $subscriber->email = $request->email;
        $subscriber->save();


        Alert::success('Subscribed successfully');
        return redirect()->back();
      }
        //subscribers end

        // contacts start
      public function contacts(request $request){

        $contact = new Contacts ;
        $contact->name = $request->name ;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();


        Alert::success('Sent successfully');
        return redirect()->back();
      }
        //contacts end


      // all subscribers start
      public function all_subscribers(){

	   if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $subscribers = Subscribers::where('id','>=',1)->latest()->paginate(10);

          return view ('Adminpages.all_subscribers',compact('subscribers'));

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
          // all subscribers end

        // mail subscriber start
      public function mail_subscriber($id){

	       if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $subscriber = Subscribers::find($id);

          return view('adminpages.mail_subscriber',compact('subscriber'));

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
        //mail subscriber end

        // send subscriber mail start
      public function send_subscriber_mail(request $request,$id){
        $subscriber = Subscribers::find($id);

        $mail =[
          'greeting'=>$request->greeting,
          'description'=>$request->description,
          'body'=>$request->body,
          'button'=>$request->button,
          'link'=>$request->link,
          'lastline'=>$request->lastline,
        ];

        Notification::send($subscriber ,new subscriberMail($mail));

        Alert::success('Mail sent successfully ');

        return redirect()->back();
      }
        // send subscriber mail end

        // delete subscriber start
      public function delete_subscriber($id){

      if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $subscriber = Subscribers::find($id);
          $subscriber->delete();

          Alert::success('Subscriber deleted successfully');

          return redirect()->back();

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
        // delete subscriber end

      // all contacts start
      public function all_contacts(){

	   if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $contacts = Contacts::where('id','>=',1)->latest()->paginate(10);

          return view('adminpages.all_contacts',compact('contacts'));

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
        //all contacts end

        // view contacts start
      public function view_contact($id){

	    if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $contact = Contacts::find($id);
          return view ('adminpages.view_contact',compact('contact'));

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
          // view contact end

        // delete contact start
      public function delete_contact($id){
	   if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $contact = Contacts::find($id);
          $contact->delete();

          Alert::success('Contact deleted successfully');
          return redirect()->back();

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
        // delete contact end

        //mail contact start
      public function mail_contact($id){
	   if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $contact = Contacts::find($id);

          return view('adminpages.contact_mail',compact('contact'));

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
        // mail contact end

        // send contact mail start
      public function send_contact_mail(request $request, $id){
        $contact = Contacts::find($id);

        $contactmail = [
          'greeting'=>$request->greeting,
          'description'=>$request->description,
          'body'=>$request->body,
          'button'=>$request->button,
          'url'=>$request->url,
          'lastline'=>$request->lastline,
        ];

        Notification::send($contact,new contactMail($contactmail));

        Alert::success('Email sent successfully');

        return redirect()->back();
      }
        // send contact mail end

        // all users start
      public function all_users(){
	    if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $users = User::where('id','>=',1)->latest()->paginate(10);

          return view('adminpages.all_users',compact('users'));

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
      // all users end

      // delete users start
      public function delete_user($id){
	    if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $user = User::find($id);
          $user->delete();


          Alert::success('User deleted successfully ');

          return redirect()->back();

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
      // delete users end


      // save todo start
      public function save_todo(request $request){

        $todo = new Todo;
        $todo->todo = $request->todo ;
        $todo->save();

        Alert::success('Todo saved ');
        return redirect()->back();
      }
      // save todo end

      // delete todo start
      public function delete_todo($id){


	    if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==1){
          $todo = Todo::find($id);
          $todo->delete();

          Alert::success('Todo deleted');
          return redirect()->back();

        }else{
          Alert::warning('Unauthorized access!!','you cannot access this page !!');

          return redirect('/redirect');
        }

      }else{
        return redirect('/login');
      }

      }
        // delete todo end


        // search products
        public function search_products(request $request)
        {
          $search = $request->search ;
          $products = Product::where('name','like','%'.$search.'%')->orWhere('category','like','%'.$search.'%')->latest()->paginate(10);

          return view ('adminpages.all_products',compact('products'));

        }
        // end search products .

        // search contact
        public function search_contacts(request $request)
        {
          $search = $request->search ;
          $contacts = Contacts::where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%')->latest()->paginate(10);

          return view ('adminpages.all_contacts',compact('contacts'));

        }
        // end search contact .

        // search subscriber
        public function search_subscribers(request $request)
        {
          $search = $request->search ;
          $subscribers = Subscribers::where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%')->latest()->paginate(10);

          return view ('adminpages.all_subscribers',compact('subscribers'));

        }
        // end search subscriber .

        // search user
        public function search_users(request $request)
        {
          $search = $request->search ;
          $users = User::where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%')->orWhere('phone','like','%'.$search.'%')->latest()->paginate(10);

          return view ('adminpages.all_users',compact('users'));

        }
        // end search user .

        // search order
        public function search_orders(request $request)
        {
          $search = $request->search ;
          $orders = Order::where('name','like','%'.$search.'%')->orWhere('payment_status','like','%'.$search.'%')->orWhere('delivery_status','like','%'.$search.'%')->latest()->paginate(10);

          return view ('adminpages.orders',compact('orders'));

        }
        // end search order .

        // add about start
        public function add_about(){
          $about_info = About::all();
          return view ('Adminpages.add_about',compact('about_info'));
        }

        public function save_about(request $request){

            $image = $request->image ;
            $imagename = time().'_'.$image->getClientOriginalName();
            $request->file('image')->move('aboutimages',$imagename);

            $about = new About ;
            $about->image = $imagename ;
            $about->description= $request->description;
            $about->save();

            Alert::success('Saved','information updated successfully');
            return redirect()->back();
        }

        public function delete_about($id){
          $about = About::find($id);
          $about->delete();

          Alert::success('About info deleted','Add new about information');
          return redirect()->back();
        }

        public function view_about($id){
          $about = About::find($id);
          return view('adminpages.view_about',compact('about'));
        }

        public function edit_about($id){
          $about = About::find($id);
          return view('adminpages.edit_about',compact('about'));
        }

        public function save_edited_about(request $request , $id){
          $old = About::find($id);
          // when edited form has an image
          if($request->file('image')){
            $image = $request->image ;
            $imagename = time().'_'.$image->getClientOriginalName();
            $request->file('image')->move('aboutimages',$imagename);

          }else{
            $imagename = $old->image;
          }

          $about = About::find($id);
          $about->description = $request->description;
          $about->image = $imagename ;
          $about->save();

          Alert::success('About information updated successfully');

          return redirect('/add_about');


        }
}
