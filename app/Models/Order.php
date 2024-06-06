<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_muatan',
        'customer_id',
        'armada_id',
        'muat_kelurahan_id',
        'muat_alamat',
        'bongkar_kelurahan_id',
        'bongkar_alamat',
        'waktu_muat',
        'berat_muatan'
    ];

    protected $dates = ['waktu_muat'];


    // Relationships

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function muatKelurahan()
    {
        return $this->belongsTo(Village::class, 'muat_kelurahan_id');
    }

    public function bongkarKelurahan()
    {
        return $this->belongsTo(Village::class, 'bongkar_kelurahan_id');
    }

    public function statuses()
    {
        return $this->belongsToMany(Status::class)->withPivot('tanggal');
    }
}

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Order extends Model
// {
//     use HasFactory;
//     // protected $guarded = [];
//     protected $dates = ['waktu_muat'];
//     protected $fillable = 
//     [
//         'nama_muatan', 
//         'customer_id', 
//         'armada_id', 
//         'muat_kelurahan_id', 
//         'muat_alamat', 
//         'bongkar_kelurahan_id', 
//         'bongkar_alamat', 
//         'waktu_muat', 
//         'berat_muatan'
//     ];

//     public function customer(){
//         return $this->belongsTo(Customer::class);
//     }

//     public function muatKelurahan(){
//         return $this->belongsTo(Village::class,'muat_kelurahan_id');
//     }

//     public function bongkarKelurahan(){
//         return $this->belongsTo(Village::class,'bongkar_kelurahan_id');
//     }

//     public function statuses(){
//         return $this->belongsToMany(Status::class)->withPivot('tanggal');
//     }

// }
