<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Menu;

class CustomerController extends Controller
{
    public function index()
    {
        // Mengambil semua data pelanggan
        $customers = Customer::all();

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

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('customers.index', compact('customers', 'menuItemsWithSubmenus'));
    }

    // public function index()
    // {
    //     $customers = Customer::all();
    //     return view('customers.index', compact('customers')); 
    // }

    public function create()
    {
        // Mengambil semua data pelanggan
        $customers = Customer::all();

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

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('customers.create', compact('customers', 'menuItemsWithSubmenus'));
    }

    // public function create()
    // {
    //     return view('customers.create');
    // }

    public function edit($id)
    {
        // Mengambil data pelanggan berdasarkan ID
        $customer = Customer::find($id);

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

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('customers.edit', compact('customer', 'menuItemsWithSubmenus'));
    }

    // public function edit($id){
    //     $customer = Customer::find($id);
    //     return view('customers.edit', compact('customer'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);
    
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
    
        return redirect('/customers')->with('success', 'Data customer berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer = Customer::find($id);
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect('/customers')->with('success', 'Data pelanggan berhasil diubah');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
    
        if (!$customer) {
            return redirect('/customers')->with('error', 'Pelanggan tidak ditemukan');
        }
    
        $customer->delete();
    
        return redirect('/customers')->with('success', 'Data pelanggan berhasil dihapus');
    }
    
}
