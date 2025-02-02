<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahHandphone = DB::table('handphone')->count();
        $jumlahLaptop = DB::table('laptop')->count();
        $jumlahPenyewaan = DB::table('penyewaan')->count();
        $jumlahCustomer = User::where('role', 'customer')->count();
        
        return view('admin.dashboard', [
            'jumlahHandphone' => $jumlahHandphone,
            'jumlahLaptop' => $jumlahLaptop,
            'jumlahPenyewaan' => $jumlahPenyewaan,
            'jumlahCustomer' => $jumlahCustomer
        ]);
    }
    public function manajemenPengguna()
    {
        $users = User::all();
        return view('admin.manajemen-pengguna', ['users' => $users]);
    }
    
}
