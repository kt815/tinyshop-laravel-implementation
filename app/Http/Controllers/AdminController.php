<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Order;
use App\OrderedItem;
use App\User;
use App\Category;
use App\Brand;
use App\Item;
use Session;
use Hash;

class AdminController extends Controller {

    public function __construct() {
         $this->middleware('role.id');
    }

    public function showorders(Request $request ,$confirm = null) {

        if ($confirm == null){
             $orders = Order::paginate(7);
             $count_confirmed = Order::where('confirmed', 1)->count();         
             $count_all = Order::all()->count();
             $count_not_confirmed = $count_all - $count_confirmed;
             $confirmed = Order::where('confirmed', 1)->get();
         }
        elseif ($confirm == 'confirmed')
        {
            $orders = Order::where('confirmed', 1)->paginate(7);
            $count_confirmed = Order::where('confirmed', 1)->count();
            $count_all = Order::all()->count();
            $count_not_confirmed = $count_all - $count_confirmed;
            $confirmed = $orders;
        }
        elseif ($confirm == 'notconfirmed') {
            $orders = Order::where('confirmed', 0)->paginate(7);
            $count_confirmed = Order::where('confirmed', 1)->count();
            $count_all = Order::all()->count();
            $count_not_confirmed = $count_all - $count_confirmed;
            $confirmed = $orders;
        }


         return view('admin_showorders', [
            'orders' => $orders,
            'count_all' => $count_all,
            'count_confirmed' => $count_confirmed,
            'count_not_confirmed' => $count_not_confirmed,
            'confirmed' => $confirmed
            ]);
    }

    public function showOrder($order_id) {
            $order = Order::where('order_id', $order_id)->first();
            $items = Order::getOrderItems($order_id);

            $total = 0;
            foreach ($items as $item) {
                $total += $item['old_price'] * $item['quantity'];            
                $i = Item::find($item->item_id);
                $brand = Brand::find($i['brand_id']);
                $item['brand'] = $brand['brand'];
                $item['id'] = $i['id'];
                $item['model'] = $i['model'];
                $item['photo'] = $i['photo'];
                $item['price'] = $item['old_price'];
            }
            
            // kd($order, $items, $total);

            return view('admin_showorder', [
                    'order' => $order,
                    'items' => $items,
                    'total' => $total                    
                ]);
    }

    public function confirmOrder($order_id) {
            $order = Order::where('order_id', $order_id)->first();
            $order->confirmed = 1;
            $order->save();
            Session::flash('success', 'Order has been confirmed successfully.');            
            return redirect($_SERVER['HTTP_REFERER']);    
    }

    public function deleteOrder($order_id) {
            Session::flash('success', 'Order has been removed successfully.');            
            $order = Order::where('order_id', $order_id)->delete();
            $order_items = OrderedItem::where('order_id', $order_id)->delete();            
            return redirect('adminbar/showorders');    
    }

    public function adduser() {
         return view('admin_adduser');
    }

    public function registrateUser(Request $request) {        
            $user = new User;
            $user->name = (string)$request->name;
            $user->email = (string)$request->email;
            $user->password = Hash::make((string)$request->password);
            if ((string)$request->role == 'admin'){
                $user->role_id = 1;
            }
            else if ($request->role == 'user') {
                $user->role_id = 2;
            }            
            $user->telephone = (string)$request->telephone;
            $user->address = (string)$request->address;
            $user->save();         
         return redirect('/adminbar/adduser');
    }

    public function addcategory() {
         return view('admin_addcategory');
    }

    public function postAddCategory (Request $request) {
            $category = new Category;            
            $category->category = (string)$request->category;            
            $category->save();
            return redirect('/adminbar/addcategory');
    }    

    public function addbrand() {
         return view('admin_addbrand');
    }

    public function postAddBrand(Request $request) {
            $brand = new Brand;            
            $brand->brand = (string)$request->brand;            
            $brand->save();         
         return redirect('/adminbar/addbrand');
    }

    public function additem() {
         return view('admin_additem');
    }

    public function postAddItem(Request $request) {            
            $item = new Item;            
            $item->brand_id = (int)$request->brand;            
            $item->category_id = (int)$request->category;
            $item->characteristics = (string)$request->characteristics;
            $item->description = (string)$request->description;
            $item->photo = (string)$_FILES['file']['name'];
            $item->instock = (int)$request->instock;
            $item->model = (string)$request->model;
            $item->price = (float)$request->price;
            $item->save();         
         return redirect('/adminbar/additem');

    }



}
