<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Customer\User;
use App\Models\Sale;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Carbon;

class ShowDashboard extends Component
{
    //ORDERS 
    public $totalOrders;
    //INCOME TODAY
    public $totalIncomeToday;
    //INCOME YESTERDAY
    public $totalIncomeYesterday;
    //PRODUCTS SOLD TODAY
    public $totalProductsSoldToday;
    //PRODUCTS SOLD YESTERDAY
    public $totalProductsSoldYesterday;
    //SALES TODAY QUANTITY
    public $individualSalesToday;
    //SALES YESTERDAY QUANTITY
    public $individualSalesYesterday;
    //ALL PRODUCTS QUANTITY
    public $totalProducts;
    //ALL CUSTOMER CUANTITY
    public $countUsersWithSales;
    //ALL USERS QUANTITY
    public $totalUsers;

    public $chartProduct = 'sellingDesc';
    public $chartSales = 'year';

    public function render()
    {
        //DATES RANGES
        $currentDate = Carbon::now()->toDateString();
        $yesterdayDate = Carbon::yesterday()->toDateString();

        //ORDERS 
        $this->totalOrders = Order::count();
        //INCOME TODAY
        $this->totalIncomeToday = Sale::whereDate('created_at', $currentDate)->sum('total');
        //INCOME YESTERDAY
        $this->totalIncomeYesterday = Sale::whereDate('created_at', $yesterdayDate)->sum('total');
        //PRODUCTS SOLD TODAY
        $this->totalProductsSoldToday = Sale::whereDate('created_at', $currentDate)->sum('total_quantity');
        //PRODUCTS SOLD YESTERDAY
        $this->totalProductsSoldYesterday = Sale::whereDate('created_at', $yesterdayDate)->sum('total_quantity');
        //SALES TODAY QUANTITY
        $this->individualSalesToday = Sale::whereDate('created_at', $currentDate)->count();
        //SALES YESTERDAY QUANTITY
        $this->individualSalesYesterday = Sale::whereDate('created_at', $yesterdayDate)->count();
        //ALL PRODUCTS QUANTITY
        $this->totalProducts = Product::count();
        //ALL CUSTOMER CUANTITY
        $this->countUsersWithSales = User::whereHas('sales')->count();
        //ALL USERS QUANTITY
        $this->totalUsers = User::count();
        
        return view('livewire.dashboard.show-dashboard');
    }
}
