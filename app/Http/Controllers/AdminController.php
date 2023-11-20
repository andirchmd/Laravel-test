<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function stats() {
        $totalUsers = User::where('role', '!=', 'admin')->count();
        $totalOrders = Order::count();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalOrders' => $totalOrders,
        ]);
    }

    public function users(){
        $users = User::where('role', '!=', 'admin')->get();

        return view('admin.users', [
            'user' => $users,
        ]);
    }

    public function deleteUser($id){
        $user = User::where('role', '!=', 'admin')->findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success','Data User Berhasil Dihapus');
    }


    public function orders(){
        return view('admin.orders', [
            'order' => Order::all(),
        ]);
    }

    public function viewOrder(){
        return view('admin.crud.add',[
            'user' => User::all(),
        ]);
    }

    public function saveOrder(Request $request){
        $request->validate([
            'user_id' => 'required',
            'nama_game' => 'required|string',
            'file_name' => 'required',
            'file_name.*' => 'mimes:jpg,jpeg,png,webp|max:4096',
            'keterangan' => 'required|string',
        ]);
        if ($request->hasFile('file_name')) {
            $gambar = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('file_name')->getClientOriginalName());
            $request->file('file_name')->move(public_path('images/akun'), $gambar);
            Order::create(
                [
                    'user_id' => $request->user_id,
                    'nama_game' => $request->nama_game,
                    'file_name' => $gambar,
                    'keterangan' => $request->keterangan,
                ]
            );
            return redirect()->route('admin.order')->with('success', 'Data Barang Berhasil Ditambahkan');
        } else {
            echo 'Gagal';
            return response()->json(['errors' => 'Gagal'], 422);
        }
        // Setelah validasi berhasil, data akan disimpan ke database
    }

    public function editOrder($id){

        return view('admin.crud.edit',[
            'order' => Order::all()->where('id', $id)->first(),
        ]);
    }

    public function updateOrder(Request $request, $id)
    {
        $request->validate([
            'nama_game' => 'required|string',
            // 'file_name' => 'nullable',
            // 'file_name.*' => 'mimes:jpg,jpeg,png,webp|max:4096',
            'current_file_name' => 'nullable',
            'current_file_name.*' => 'mimes:jpg,jpeg,png,webp|max:4096',
            'keterangan' => 'required|string',
        ]);
        $order = Order::findOrFail($id);
        // return $request;

        if ($request->hasFile('file_name')) {
            // Get the old file name from the database
            $oldFileName = $order->file_name;

            // Generate a new unique file name
            $newFileName = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('file_name')->getClientOriginalName());

            // Move the file to the specified directory
            $request->file('file_name')->move(public_path('images/akun'), $newFileName);

            // Update the record with the new file name
            $order->update([
                'nama_game' => $request->nama_game,
                'keterangan' => $request->keterangan,
                'file_name' => $newFileName,
            ]);

            // Delete the old file
            if ($oldFileName) {
                $oldFilePath = public_path('images/akun') . '/' . $oldFileName;
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
        } elseif ($request->has('current_file_name')){
            $order->update([
                'nama_game' => $request->nama_game,
                'keterangan' => $request->keterangan,
                'file_name' => $request->current_file_name,
            ]);
        }else{
            echo 'Gagal';
            return response()->json(['errors' => 'Gagal'], 422);
        }

        return redirect()->route('admin.order')->with('success', 'Data Order Berhasil Diubah');
    }

    public function deleteOrder($id)
    {
        // Find the order by ID
        $order = Order::find($id);

        // Check if the order exists
        if (!$order) {
            return redirect()->back()->with('error', 'Order tidak ditemukan.');
        }

        // Get the file name
        $fileName = $order->file_name;

        // Delete the order
        $order->delete();

        // Delete the associated file
        if ($fileName) {
            $filePath = public_path('images/akun') . '/' . $fileName;
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        return redirect()->route('admin.order')->with('success', 'Order berhasil dihapus.');
    }
    public function userViewOrder(){
        return view('addOrder');
    }

    public function userSaveOrder(Request $request){
        $request->validate([
            // 'user_id' => 'required',
            'nama_game' => 'required|string',
            'file_name' => 'required',
            'file_name.*' => 'mimes:jpg,jpeg,png,webp|max:4096',
            'keterangan' => 'required|string',
        ]);
        // return $request;
        $userid = Auth::user()->id;
        if ($request->hasFile('file_name')) {
            $gambar = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('file_name')->getClientOriginalName());
            $request->file('file_name')->move(public_path('images/akun'), $gambar);
            Order::create(
                [
                    'user_id' => $userid,
                    'nama_game' => $request->nama_game,
                    'file_name' => $gambar,
                    'keterangan' => $request->keterangan,
                ]
            );
            return redirect()->route('user.order.add')->with('success', 'Data Order Berhasil Ditambahkan');
        } else {
            echo 'Gagal';
            return response()->json(['errors' => 'Gagal'], 422);
        }
        // Setelah validasi berhasil, data akan disimpan ke database
    }
}
