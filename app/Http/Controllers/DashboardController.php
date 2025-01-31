<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahHandphone = DB::table('handphone')->count();
        $jumlahLaptop = DB::table('laptop')->count();
        
        return view('admin.dashboard', [
            'jumlahHandphone' => $jumlahHandphone,
            'jumlahLaptop' => $jumlahLaptop
        ]);
    }
}
