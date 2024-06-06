<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "roles";
    protected $primaryKey = 'id';
    protected $fillable = [
        'role_name',
    ];
    
    public function roleMenus()
    {
        return $this->hasMany(RoleMenu::class, 'role_id', 'id');
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'role_menus', 'role_id', 'menu_id');
    }
}
