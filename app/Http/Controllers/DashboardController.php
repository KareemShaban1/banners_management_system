<?php

namespace App\Http\Controllers;

use App\Models\CashOut;
use App\Models\Client;
use App\Models\Material;
use App\Models\ReceiveCash;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $users_count = User::count();
        $clients_count = Client::count();
        $suppliers_count = Supplier::count();
        $materials_count = Material::count();
        $receive_cash_count = ReceiveCash::count();
        $cash_out_count = CashOut::count();
        $receive_cash_monthly = ReceiveCash::select(DB::raw('MONTH(receive_date) as month'), DB::raw('SUM(paid_amount) as total_paid_amount'))
        ->groupBy(DB::raw('MONTH(receive_date)'))
        ->get();
        $cash_out_monthly = CashOut::select(DB::raw('MONTH(date) as month'), DB::raw('SUM(paid_amount) as total_paid_amount'))
        ->groupBy(DB::raw('MONTH(date)'))
        ->get();
        return view(
            'pages.dashboard.index',
            compact(
                'users_count',
                'clients_count',
                'suppliers_count',
                'receive_cash_monthly',
                'cash_out_monthly',
                'materials_count',
                'receive_cash_count',
                'cash_out_count',
            )
        );
    }
}
