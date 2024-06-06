<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Picture;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Menu;

class ArmadaController extends Controller
{
    public function index()
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

        // Mendapatkan semua armada
        $armadas = Armada::all();

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('armada.index', compact('armadas', 'menuItemsWithSubmenus'));
    }


    // public function index()
    // {
    //     $armadas = Armada::all();
    //     return view('armada.index', compact('armadas'));
    // }

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

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('armada.create', compact('menuItemsWithSubmenus'));
    }

    // public function create()
    // {
    //     return view('armada.create');
    // }

    public function edit($id)
    {
        // Mengambil data armada berdasarkan ID
        $armada = Armada::find($id);

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
        return view('armada.edit', compact('armada', 'menuItemsWithSubmenus'));
    }

    // public function edit($id)
    // {
    //     $armada = Armada::find($id);
    //     return view('armada.edit', compact('armada'));
    // }

    public function store(Request $request)
    {
        // dd(request->all());
        $request->validate([
            'name' => 'required',
            'max_weight' => 'required|numeric',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
        ]);

        $armada = Armada::create([
            'name' => $request->name,
            'max_weight' => $request->max_weight,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
        ]);

        foreach ($request->file('files') as $file) {
            $filename = time().rand(1,200).'.'.$file->extension(); //14323457.jpg
            $file->move(public_path('uploads'),$filename);
            Picture::create([
                'armada_id' => $armada->id,
                'filename' => $filename,
            ]);
        }

        return redirect('/armada')->with('success', 'Data armada berhasil ditambahkan');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'max_weight' => 'required|numeric',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
        ]);

        $armada = Armada::find($id);
        $armada->update([
            'name' => $request->name,
            'max_weight' => $request->max_weight,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
        ]);

        foreach ($request->file('files') as $file) {
            $filename = time().rand(1,200).'.'.$file->extension(); //14323457.jpg
            $file->move(public_path('uploads'),$filename);
            Picture::create([
                'armada_id' => $armada->id,
                'filename' => $filename,
            ]);
        }

        return redirect('/armada')->with('success', 'Data armada berhasil diubah');
    }

    public function destroy($id)
    {
        $armada = Armada::find($id);

        if (!$armada) {
            return redirect('/armada')->with('error', 'Armada tidak ditemukan');
        }

        $armada->delete();

        return redirect('/armada')->with('success', 'Data armada berhasil dihapus');
    }
}
