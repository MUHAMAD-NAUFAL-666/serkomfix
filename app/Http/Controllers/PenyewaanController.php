<?php

namespace App\Http\Controllers;

use App\Models\Handphone;
use App\Models\Laptop;
use App\Models\Penyewaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PenyewaanController extends Controller
{
    public function index()
    {
        $handphone = Handphone::all();
        $laptop = Laptop::all();
        $penyewaan = Penyewaan::all();
        $users = User::all();

        return view('admin.manajemen-penyewaan', compact('handphone', 'laptop', 'penyewaan', 'users'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'nama' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'no_wa' => 'required|string|max:255',
            'tanggal_sewa' => 'required|date',
            'durasi' => 'required|numeric|min:1',
            'status' => 'required|string',
            'harga_sewa' => 'required|numeric|min:0'
        ]);

        // Hitung tanggal selesai sewa
        $tanggalSelesai = date('Y-m-d', strtotime("+{$validated['durasi']} days", strtotime($validated['tanggal_sewa'])));

        // Simpan penyewaan ke database
        Penyewaan::create($validated);

        // Link Google Maps lokasi kantor
        $googleMapsUrl = "https://www.google.com/maps/place/PT.+Cahaya+Perkasa+Inspeksindo/@-6.3376506,107.2812254,17z/data=!4m14!1m7!3m6!1s0x2e699d0280b7dc4f:0xc53802d4b608f!2sPT.+Cahaya+Perkasa+Inspeksindo!8m2!3d-6.3376506!4d107.2838003!16s%2Fg%2F11fs_hkq73!3m5!1s0x2e699d0280b7dc4f:0xc53802d4b608f!8m2!3d-6.3376506!4d107.2838003!16s%2Fg%2F11fs_hkq73?entry=ttu&g_ep=EgoyMDI1MDUxMy4xIKXMDSoJLDEwMjExNDU1SAFQAw%3D%3D";

        // Format pesan WhatsApp
        $pesan = "🌟 *Konfirmasi Penyewaan Perangkat* 🌟\n\n"
            . "Halo *{$validated['nama']}*,\n"
            . "Terima kasih telah melakukan penyewaan perangkat *{$validated['merek']}* melalui sistem kami.\n\n"
            . "📅 *Tanggal Sewa:* {$validated['tanggal_sewa']}\n"
            . "⏳ *Durasi:* {$validated['durasi']} hari\n"
            . "🗓️ *Tanggal Selesai:* {$tanggalSelesai}\n"
            . "💰 *Total Biaya:* Rp " . number_format($validated['harga_sewa'], 0, ',', '.') . "\n\n"
            . "📍 *Silakan datang ke kantor kami untuk konfirmasi dan pengambilan perangkat.*\n"
            . "🪪 Jangan lupa membawa *KTP asli* untuk keperluan verifikasi.\n\n"
            . "🗺️ *Lokasi Kantor:*\n{$googleMapsUrl}\n\n"
            . "Apabila ada pertanyaan, jangan ragu untuk menghubungi kami kembali.\n\n"
            . "────────────────────────────\n"
            . "👨‍💼 *Admin: Muhamad Naufal*\n"
            . "📱 Sistem Penyewaan Perangkat\n"
            . "────────────────────────────";


        // Kirim pesan ke API WhatsApp
        $apiKey = '7GbsI3PnkQDKyAgFbAELIgKSlgFRta'; // Ganti dengan API key kamu
        $sender = '6281573635413';  // Ganti dengan nomor pengirim yang terdaftar
        $number = $validated['no_wa'];

        $response = Http::get('https://wa.codeucil.my.id/send-message', [
            'api_key' => $apiKey,
            'sender'  => $sender,
            'number'  => $number,
            'message' => $pesan
        ]);

        return response()->json([
            'message' => "Penyewaan berhasil! Sewa berakhir pada {$tanggalSelesai}. Pesan WA dikirim.",
            'wa_response' => $response->json()
        ]);
    }



    public function deletePenyewaan($id_sewa)
    {
        $penyewaan = Penyewaan::findOrFail($id_sewa);
        $penyewaan->delete();

        return redirect()->route('manajemen-penyewaan')->with('success', 'Data berhasil dihapus');
    }
}
