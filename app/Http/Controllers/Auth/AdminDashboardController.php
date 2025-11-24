<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function customerdetails()
    {
           $orders = Order::select(
                    'customer_id',
                    DB::raw('COUNT(id) as purchase_count'),
                    DB::raw('SUM(total_amount) as total_spent')
                )
                ->with('customer')
                ->groupBy('customer_id')
                ->orderByDesc('total_spent')
                ->paginate(10);
                
         return view('admin.custoemrdetails',compact('orders'));
    }
}
