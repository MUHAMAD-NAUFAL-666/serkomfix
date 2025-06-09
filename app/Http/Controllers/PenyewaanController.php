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

        $tanggalSelesai = date('Y-m-d', strtotime("+{$validated['durasi']} days", strtotime($validated['tanggal_sewa'])));

        // Simpan ke database
        Penyewaan::create($validated);

        // Buat isi pesan WA
        $googleMapsUrl = "https://www.google.com/maps/place/PT.+Cahaya+Perkasa+Inspeksindo/@-6.3376506,107.2812254...";
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

        // Kirim WA
        $apiKey = 'dDIcB2zq75YOUda0gKlVNNzpva2KJQ';
        $sender = '081573635413';
        $number = $validated['no_wa'];

        try {
            $response = Http::get('https://wa.codeucil.my.id/send-message', [
                'api_key' => $apiKey,
                'sender'  => $sender,
                'number'  => $number,
                'message' => $pesan
            ]);

            $waResponse = $response->json();

            if (!$response->successful() || ($waResponse['status'] ?? '') !== 'success') {
                // Tetap kirim response sukses
                return response()->json([
                    'message' => 'Penyewaan berhasil, tapi gagal mengirim pesan WhatsApp.',
                    'wa_response' => $waResponse
                ]);
            }

            return response()->json([
                'message' => "Penyewaan berhasil! Sewa berakhir pada {$tanggalSelesai}. Pesan WA dikirim.",
                'wa_response' => $waResponse
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Penyewaan berhasil, tapi terjadi kesalahan saat mengirim pesan WhatsApp.',
                'wa_response' => $e->getMessage()
            ]);
        }
    }


    public function deletePenyewaan($id_sewa)
    {
        $penyewaan = Penyewaan::findOrFail($id_sewa);
        $penyewaan->delete();

        return redirect()->route('manajemen-penyewaan')->with('success', 'Data berhasil dihapus');
    }
}
