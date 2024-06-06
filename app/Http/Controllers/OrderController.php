<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Armada;
use App\Models\Order;
use App\Models\Status;
use App\Models\Role;
use App\Models\Menu;
use App\Models\RoleMenu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        // dd('oke');
        // Mendapatkan pengguna yang sedang masuk
        $user = auth()->user();

        // Mendapatkan peran (role) pengguna
        $userRole = $user->role;

        // Inisialisasi variabel $menus dan $menuItemsWithSubmenus
        $menus = [];
        $menuItemsWithSubmenus = [];

        // Periksa apakah pengguna sudah masuk
        if ($user) {
            // Pastikan pengguna memiliki atribut role_id yang valid
            if ($user->role_id) {
                // Dapatkan ID peran pengguna
                $role_id = $user->role_id;

                // Dapatkan daftar menu_ids berdasarkan role pengguna
                $menu_ids = RoleMenu::where('role_id', $role_id)->pluck('menu_id');

                // Dapatkan menu utama (master menu)
                $mainMenus = Menu::where('menu_category', 'master menu')
                    ->whereIn('id_menu', $menu_ids)
                    ->get();

                // Iterasi melalui setiap menu utama
                foreach ($mainMenus as $mainMenu) {
                    // Dapatkan submenu untuk setiap menu utama
                    $subMenus = Menu::where('menu_sub', $mainMenu->id_menu)
                        ->where('menu_category', 'sub menu')
                        ->whereIn('id_menu', $menu_ids)
                        ->orderBy('menu_position')
                        ->get();

                    // Masukkan menu utama dan submenu ke dalam array $menuItemsWithSubmenus
                    $menuItemsWithSubmenus[] = [
                        'mainMenu' => $mainMenu,
                        'subMenus' => $subMenus,
                    ];
                }
            }
        }

        // Mendapatkan semua pesanan (orders) dan status
        $orders = Order::all();
        $statuses = Status::all();

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('orders.index', compact('orders', 'statuses', 'menus', 'menuItemsWithSubmenus'));
    }

    // public function index(){
    //     $orders = Order::all();
    //     $statuses = Status::all();
    //     return view('orders.index', compact('orders','statuses'));
    // }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $menuItemsWithSubmenus = [];
        return view('orders.edit', compact('order', 'menuItemsWithSubmenus'));
    }

    public function create()
    {
        // Mendapatkan pengguna yang sedang masuk
        $user = auth()->user();

        // Mendapatkan peran (role) pengguna
        $userRole = $user->role;

        // Inisialisasi variabel $menuItemsWithSubmenus
        $menuItemsWithSubmenus = [];

        // Periksa apakah pengguna sudah masuk
        if ($user) {
            // Pastikan pengguna memiliki atribut role_id yang valid
            if ($user->role_id) {
                // Dapatkan ID peran pengguna
                $role_id = $user->role_id;

                // Dapatkan daftar menu_ids berdasarkan role pengguna
                $menu_ids = RoleMenu::where('role_id', $role_id)->pluck('menu_id');

                // Dapatkan menu utama (master menu)
                $mainMenus = Menu::where('menu_category', 'master menu')
                    ->whereIn('id_menu', $menu_ids)
                    ->get();

                // Iterasi melalui setiap menu utama
                foreach ($mainMenus as $mainMenu) {
                    // Dapatkan submenu untuk setiap menu utama
                    $subMenus = Menu::where('menu_sub', $mainMenu->id_menu)
                        ->where('menu_category', 'sub menu')
                        ->whereIn('id_menu', $menu_ids)
                        ->orderBy('menu_position')
                        ->get();

                    // Masukkan menu utama dan submenu ke dalam array $menuItemsWithSubmenus
                    $menuItemsWithSubmenus[] = [
                        'mainMenu' => $mainMenu,
                        'subMenus' => $subMenus,
                    ];
                }
            }
        }

        // Mendapatkan semua pelanggan (customers) dan armada
        $customers = Customer::all();
        $armada = Armada::all();

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('orders.create', compact('customers', 'armada', 'menuItemsWithSubmenus'));
    }

    // public function create(){
    //     $customers = Customer::all();
    //     $armada = Armada::all();
    //     return view('orders.create',compact('customers','armada'));
    // }

    public function store(Request $request)
    {
        // dd($request->all());
        $order = Order::create($request->all());
        $order->statuses()->attach(1, ['tanggal' => now()]);
        return redirect('/orders')->with('success', 'Order berhasil dibuat');
    }

    // // proses update status dan tgl BY Gunawan
    public function updateStatus(Request $request, $id)
    {
        try {
            $order = Order::find($request->input('order_id'));
            if (!$order) {
                return redirect('/orders')->with('error', 'Order not found');
            }
            $statuses = $order->statuses();
            if (!$statuses) {
                return redirect('/orders')->with('error', 'Statuses relationship not found');
            }
            // Pastikan tanggal tidak null
            if (empty($request->input('tanggal'))) {
                return redirect('/orders')->with('error', 'Tanggal tidak boleh kosong');
            }
            $statuses->attach($request->input('status_id'), ['tanggal' => $request->input('tanggal')]);
            return redirect('/orders')->with('success', 'Status Order berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/orders')->with('error', 'Terjadi kesalahan saat mengupdate status: ' . $e->getMessage());
        }
    }



    public function show($id)
    {
        $order = Order::find($id);
        // dd($order);
        return view('orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->all());
        return redirect('/orders')->with('success', 'Order berhasil diupdate');
    }
}
