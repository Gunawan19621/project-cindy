<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Menu;


class RoleController extends Controller
{
    public function index($activeMenu = null)
    {

        $roles = Role::all();

        // Dapatkan menu sesuai dengan peran pengguna dan atur tampilan sidebar.
        $userRole = auth()->user()->role;
        
        $menuItemsWithSubmenus = [];

        // Periksa apakah pengguna memiliki peran (role) yang valid.
        if ($userRole) {
            $menus = $userRole->menus;

            // Logic untuk mengelompokkan menu berdasarkan peran dan submenu sesuai dengan tampilan yang Anda inginkan.

            // Contoh pengelompokkan menu berdasarkan master menu dan sub menu:
            $mainMenus = $menus->where('menu_category', 'master menu');
            foreach ($mainMenus as $mainMenu) {
                $subMenus = $menus->where('menu_sub', $mainMenu->id_menu)->where('menu_category', 'sub menu');
                $menuItemsWithSubmenus[] = [
                    'mainMenu' => $mainMenu,
                    'subMenus' => $subMenus,
                ];
            }
        }

        return view('role.role', compact('roles', 'menuItemsWithSubmenus', 'activeMenu'));
    }

    public function create()
    {
        $roles = Role::all();

        $menus = Menu::all();

        $userRole = auth()->user()->role;
    
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
        return view('role.create_role', compact('roles', 'menus', 'menuItemsWithSubmenus', 'userRole'));
    }
    

    public function edit($id)
    {
        $role = Role::findOrFail($id); 

        $menus = Menu::all(); 
        
        $userRole = auth()->user()->role; 

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

        return view('role.edit_role', compact('role', 'menuItemsWithSubmenus', 'menus', 'userRole'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|max:255',
            'menus' => 'required|array', // Ubah menu_id menjadi menus
            'menus.*' => 'exists:menus,id_menu', // Pastikan setiap menu_id yang dikirimkan ada dalam tabel menus
        ]);

        try { 
            $role = new Role();
            $role->role_name = $request->input('role_name');
            $role->save();

            // Simpan data terpilih dari checkbox (menu) sebagai relasi
            $role->menus()->attach($request->input('menus'));

            return redirect()->route('role.index')->with('success', 'Role created successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

        public function update(Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required|max:255',
            'menu_ids' => 'required|array',
            'menu_ids.*' => 'exists:menus,id_menu',
        ]);

        $role = Role::findOrFail($id);
        $role->role_name = $request->input('role_name');
        $role->save();

        $role->menus()->sync($request->input('menu_ids'));

        return redirect()->route('role.index')->with('success', 'Role updated successfully');
    }

    public function show($id)
    {
        // Retrieve the currently logged-in user's role
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

        // Fetch the role data by ID
        $role = Role::find($id);

        // Check if the role exists
        if ($role) {
            // If the role exists, load the "role_show" view with the role data
            return view('role.role_show', compact('role', 'menuItemsWithSubmenus'));
        } else {
            // If the role doesn't exist, redirect back to the index page with an error message
            return redirect()->route('role.index')->with('error', 'Role not found.');
        }
    }


    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()->route('role.index')->with('success', 'Role berhasil dihapus');
    }
}