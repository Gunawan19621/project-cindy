<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\RoleMenu;
use App\Models\Role;
use App\Models\Menu;

class MenuController extends Controller
{

    public function index($activeMenu = null)
    { 
        $user = auth()->user(); // Dapatkan pengguna yang sedang masuk.
    
        // Inisialisasi array menuItemsWithSubmenus
        $menuItemsWithSubmenus = [];
    
        // Periksa apakah pengguna telah masuk
        if ($user) {
            // Dapatkan peran (role) pengguna
            $userRole = $user->role;
    
            // Pastikan pengguna memiliki atribut role_id yang valid
            if ($userRole && $user->role_id) {
                // Dapatkan daftar menu_ids berdasarkan role pengguna
                $menu_ids = RoleMenu::where('role_id', $user->role_id)->pluck('menu_id');
    
                // Dapatkan menu utama (master menu)
                $mainMenus = Menu::where('menu_category', 'master menu')
                    ->whereIn('id_menu', $menu_ids)
                    ->get();
    
                foreach ($mainMenus as $mainMenu) {
                    $subMenus = Menu::where('menu_sub', $mainMenu->id_menu)
                        ->where('menu_category', 'sub menu')
                        ->whereIn('id_menu', $menu_ids)
                        ->orderBy('menu_position')
                        ->get();
    
                    $menuItemsWithSubmenus[] = [
                        'mainMenu' => $mainMenu,
                        'subMenus' => $subMenus,
                    ];
                }
            }
        }
    
        // Dapatkan semua menu jika pengguna belum masuk atau tidak memiliki role
        $menus = Menu::paginate(50);
    
        return view('menu.index', compact('menus', 'menuItemsWithSubmenus', 'activeMenu'));
    }
    

    public function create()
    {
        // Inisialisasi $menu sebagai objek kosong atau dengan nilai default, tergantung pada logika aplikasi Anda
        $menu = new Menu(); // Gantilah dengan model yang sesuai jika perlu

        // Mengambil semua data master menu untuk dropdown pada formulir create
        $masterMenus = Menu::where('menu_category', 'master menu')->get();

        // Mengambil semua data sub menu untuk dropdown pada formulir create
        $subMenus = Menu::where('menu_category', 'sub menu')->get();

        // Mengambil menu-menu yang sudah ada jika disimpan dalam model Menu
        $existingSidebarItems = Menu::all();

        // Menambahkan baris berikut untuk mendapatkan $menuItemsWithSubmenus
        $userRole = auth()->user()->role;

            // Initialize the $menuItemsWithSubmenus variable as an empty array
            $menuItemsWithSubmenus = [];

            // Periksa apakah pengguna memiliki peran (role) yang valid.
            if ($userRole) {
                $userMenus = $userRole->menus;

                // Logic untuk mengelompokkan menu berdasarkan peran dan submenu sesuai dengan tampilan yang Anda inginkan.

                // Contoh pengelompokkan menu berdasarkan master menu dan sub menu:
                $mainMenus = $userMenus->where('menu_category', 'master menu');
                foreach ($mainMenus as $mainMenu) {
                    $subMenus = $userMenus->where('menu_sub', $mainMenu->id_menu)->where('menu_category', 'sub menu');
                    $menuItemsWithSubmenus[] = [
                        'mainMenu' => $mainMenu,
                        'subMenus' => $subMenus,
                    ];
                }
            }

        return view('menu.create', compact('menu', 'masterMenus', 'subMenus', 'existingSidebarItems', 'menuItemsWithSubmenus'));
    }

    public function edit($id)
    {
        // Mengambil data menu berdasarkan ID
        $menu = Menu::findOrFail($id);
    
        // Inisialisasi $menuItemsWithSubmenus sebagai array kosong
        $menuItemsWithSubmenus = [];
    
        // Mengambil data peran (role) pengguna yang sedang masuk
        $user = auth()->user();
        
        // Pastikan pengguna memiliki atribut role_id yang valid
        if ($user->role_id) {
            $role_id = $user->role_id;
    
            // Dapatkan daftar menu_ids berdasarkan role pengguna
            $menu_ids = RoleMenu::where('role_id', $role_id)->pluck('menu_id');
    
            // Dapatkan menu utama (master menu)
            $mainMenus = Menu::where('menu_category', 'master menu')
                ->whereIn('id_menu', $menu_ids)
                ->get();
    
            // Iterasi melalui menu utama dan buat menuItemsWithSubmenus
            foreach ($mainMenus as $mainMenu) {
                $subMenus = Menu::where('menu_sub', $mainMenu->id_menu)
                    ->where('menu_category', 'sub menu')
                    ->whereIn('id_menu', $menu_ids)
                    ->orderBy('menu_position')
                    ->get();
    
                $menuItemsWithSubmenus[] = [
                    'mainMenu' => $mainMenu,
                    'subMenus' => $subMenus,
                ];
            }
        }
        
        // Mengambil semua data master menu untuk dropdown pada formulir edit
        $masterMenus = Menu::where('menu_category', 'master menu')->get();
    
        // Mendefinisikan variabel $menus sesuai logika aplikasi Anda
        $menus = Menu::all(); // Atau cara lain untuk mengambil data menus
    
        return view('menu.edit', compact('menu', 'masterMenus', 'menus', 'menuItemsWithSubmenus'));
    }
    

    public function show($id)
    {
        // Cari data menu berdasarkan ID
        $menu = Menu::findOrFail($id);
    
        $menus = Menu::all(); 

        $menuItemsWithSubmenus = [];
    
        return view('menu.show', compact('menu', 'menus','menuItemsWithSubmenus'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required',
            'menu_link' => 'required',
            'menu_category' => 'required',
            'menu_position' => 'required|integer',
            'menu_sub' => 'nullable|exists:menus,id_menu',
        ]);

        $menu = new Menu();
        $menu->menu_name = $request->input('menu_name');
        $menu->menu_link = $request->input('menu_link');
        $menu->menu_category = $request->input('menu_category');
        $menu->menu_position = $request->input('menu_position');
        $menu->menu_sub = $request->input('menu_sub');
        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diinputkan dari form
        $validatedData = $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_link' => 'required|string|max:255',
            'menu_category' => 'required|in:master menu,sub menu',
            'menu_sub' => 'nullable|exists:menus,id_menu', // Kolom menu_sub harus berisi ID dari master menu yang sudah ada
            'menu_position' => 'required|integer',
        ]);

        // Cari data menu berdasarkan ID
        $menu = Menu::findOrFail($id);

        // Update data menu berdasarkan data yang diinputkan dari form
        $menu->update([
            'menu_name' => $validatedData['menu_name'],
            'menu_link' => $validatedData['menu_link'],
            'menu_category' => $validatedData['menu_category'],
            'menu_sub' => $validatedData['menu_sub'],
            'menu_position' => $validatedData['menu_position'],
        ]);

        // Redirect ke halaman index menu setelah berhasil update data
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus');
    }
}
