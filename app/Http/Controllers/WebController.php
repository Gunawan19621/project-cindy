<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Armada;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\Menu;

class WebController extends Controller
{
    public function home()
    {
        $armada = Armada::all();
        return view('web.home', compact('armada'));
    }

    public function store(Request $request)
    {
        // Validate input or use Form Request for more validation
        $request->validate([
            'email' => 'required|email',
            // Add other validation rules as needed
        ]);

        // Find customer based on email
        $customer = Customer::where('email', $request->email)->first();

        // If customer not found, add a new customer
        if (!$customer) {
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        }

        $request->merge(['customer_id' => $customer->id]);
        
        $order = Order::create($request->except(['name', 'email', 'address', 'phone']));
        $order->statuses()->attach(1, ['tanggal' => now()]);
        
        return redirect()->back()->with('success', 'Order berhasil dibuat');
    }

    public function tracking()
    {
        return view('web.tracking');
    }

    // public function postTracking(Request $request)
    // {
    //     $request->validate([
    //         "no_resi" => 'required',
    //         'phone' => 'required|min:4|max:10', // Corrected min_digits and max_digits to min and max
    //     ]);
    
    //     $dataResi = explode('-', $request->no_resi);
    //     if ($dataResi[0] != env("RESI_PREFIX")) {
    //         return redirect()->back()->withErrors(['error' => 'Resi tidak valid'])->withInput();
    //     }
    
    //     $order = Order::find($dataResi[1]);
    //     if (!$order) {
    //         return redirect()->back()->withErrors(['error' => 'Resi tidak valid'])->withInput();
    //     }
    
    //     if($dataResi[2] != $order->waktu_muat->format('dmY')){
    //         return redirect()->back()->withErrors(['error' => 'Resi tidak valid'])->withInput();
    //     }
        
    //     return view('web.post-tracking', compact('order'));
    // }
    





// Pastikan untuk mengimpor model Order yang benar

// public function postTracking(Request $request)
// {
//     $request->validate([
//         'no_resi' => 'required',
//         'phone' => 'required|min_4|max:4', // Memperbaiki min_digits dan max_digits menjadi min dan max
//     ]);

//     $noResi = $request->no_resi;
//     $dataResi = explode('-', $noResi);

//     if ($dataResi[0] != env("RESI_PREFIX")) {
//         return redirect()->back()->withInput()->with('error', 'Resi tidak valid');
//     }

//     $order = Order::find($dataResi[1]);

//     if (!$order) {
//         return redirect()->back()->withInput()->with('error', 'Resi tidak valid');
//     }

//     $dataResiDate = substr($dataResi[2], 0, 8); // Ekstrak bagian tanggal dari nomor lacak

//     if ($dataResiDate != $order->waktu_muat->format('dmY')) {
//         return redirect()->back()->withInput()->with('error', 'Resi tidak valid');
//     }

//     // Validasi atau pemrosesan tambahan jika diperlukan

//     return view('web.post-tracking', compact('order'));
// }



// public function postTracking(Request $request)
// {
//     $request->validate([
//         'no_resi' => 'required',
//         'phone' => 'required|min:4|max:4'
//     ]);

//     $noResi = $request->no_resi;

//     $dataResi = explode('-', $request->no_resi);

//     if ($dataResi[0] != env("RESI_PREFIX")) {
//         return redirect()->back()->withInput()->with('error', 'Resi tidak valid');
//     }

//     $order = Order::find($dataResi[1]);

//     if (!$order) {
//         return redirect()->back()->withInput()->with('error', 'Resi tidak valid');
//     }

//     if ($dataResi[2] != $order->waktu_muat->format('dmY')) {
//         return redirect()->back()->withInput()->with('error', 'Resi tidak valid');
//     }

//     $customerNumber = substr($order->customer->phone, -4);

//     if ($request->phone != $customerNumber) {
//         return redirect()->back()->withInput()->with('error', 'Resi tidak valid');
//     }

//     return view('web.post-tracking', compact(['order', 'noResi']));
// }

public function postTracking(Request $request)
{
    $request->validate([
        'no_resi' => 'required',
        'phone' => 'required|digits:4'
    ]);

    $noResi = $request->no_resi;
    $dataResi = explode('-', $noResi);

    if ($dataResi[0] !== env("RESI_PREFIX")) {
        return redirect()->back()->withInput()->with('error', 'Resi tidak valid: Invalid prefix');
    }

    $order = Order::find($dataResi[1]);

    if (!$order) {
        return redirect()->back()->withInput()->with('error', 'Resi tidak valid: Order not found');
    }

    // Explicitly convert the date to a Carbon instance
    $waktuMuat = \Carbon\Carbon::parse($order->waktu_muat);

    $formattedDate = $waktuMuat->format('dmY');

    if ($dataResi[2] !== $formattedDate) {
        return redirect()->back()->withInput()->with('error', 'Resi tidak valid: Invalid date');
    }

    $senderLastFourDigits = substr($order->customer->phone, -4);

    if ($request->phone !== $senderLastFourDigits) {
        return redirect()->back()->withInput()->with('error', 'Resi tidak valid: Invalid sender phone');
    }

    return view('web.post-tracking', compact('order', 'noResi'));
}


}
