<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = "menus";
    protected $primaryKey = 'id_menu';
    protected $fillable = [
        'menu_name',
        'menu_link',
        'menu_category',
        'menu_sub',
        'menu_position',
    ];

    public function masterMenu()
    {
        return $this->belongsTo(Menu::class, 'menu_sub');
    }
    

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_menus', 'menu_id', 'role_id');
    }
    
}
