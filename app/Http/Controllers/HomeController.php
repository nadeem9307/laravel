<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Model\Category;
use App\Model\Order;
use App\Model\Menu;
use App\Model\OrderItem;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $total_users = count(User::where('type','customer')->get());
        $pending_orders = count(Order::where('order_status','Pending')->get());
        $delivered_orders = count(Order::where('order_status','Delivered')->get());
        $total_menus = count(Menu::where('status','active')->get());
        $total_orders = count(order::all());
        $total_revenue = OrderItem::getRevenue();
        return view('dashboard',compact('total_users','total_orders','pending_orders','delivered_orders','total_menus','total_revenue'));
    }
    public function logout(Request $request) {
          Auth::logout();
          return redirect('/login');
        }
}
