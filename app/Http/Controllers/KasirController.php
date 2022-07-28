<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Cooperative;
use App\Models\Kasir;
use App\Models\ProductGallery;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasir = Kasir::whereRaw('user_id =' . Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $product = Product::all();
        $galleries = ProductGallery::get();

        return view(
            'admin.transaction.kasir',
            compact('kasir'),
            compact('product'),
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = mt_rand(1000, 99999);
        $product = Product::where('id', $request->id)->first();
        $kasir = Kasir::where('product_id', $request->id)->first();
        if ($kasir  == null) {
            $order = Kasir::create([
                'id'                => $id,
                'user_id'           => Auth::user()->id,
                'product_id'        => $product->id,
                'quantity'          => '1',
                'price'             => $product->price,
            ]);


            if ($order) {
                return redirect('/kasir');
            } else {
                return redirect('/kasir');
            }
        } else {
            $kasir->quantity =  $kasir->quantity + 1;
            $kasir->price =  $kasir->price + $product->price;
            $kasir->update();

            return redirect('/kasir');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = Kasir::where('user_id', $id);
        $cart->delete();
        return redirect('/kasir');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasir = Kasir::find($id);
        $product = Product::find($kasir->product_id);
        $product->stock =  $product->stock + $kasir->quantity;
        $product->update();
        $kasir->delete();
        return redirect('/kasir');
    }


    public function minus_quantity(Request $request)
    {
        $id_kasirs = $request->id_kasirs;
        $kasir = Kasir::where('id', $id_kasirs)->first();
        if ($kasir->quantity == 1) {
            $kasir->quantity = $kasir->quantity;
            $kasir->update();
            echo "$kasir->quantity";
        } else {
            $product = Product::find($kasir->product_id);
            $product->stock = $product->stock + 1;
            $product->update();
            $kasir->quantity = $kasir->quantity - 1;
            $kasir->price = $kasir->price - $product->price;
            $kasir->update();
            echo $kasir->quantity;
        }
    }


    public function plus_quantity(Request $request)
    {
        $id_kasirs = $request->id_kasirs;
        $kasir = Kasir::where('id', $id_kasirs)->first();
        $product = Product::find($kasir->product_id);
        if ($kasir->quantity == $kasir->quantity + $product->stock) {
            $kasir->quantity = $kasir->quantity;
            $kasir->update();
            echo "$kasir->quantity";
        } else {
            $product->stock = $product->stock - 1;
            $product->update();
            $kasir->quantity = $kasir->quantity + 1;
            $kasir->price = $kasir->price + $product->price;
            $kasir->update();
            echo $kasir->quantity;
        }
    }

    public function printer()
    {
        $connector = new WindowsPrintConnector("RP58 Printer");

        // membuat objek $printer agar dapat di lakukan fungsinya
        $printer = new Printer($connector);

        // membuat fungsi untuk membuat 1 baris tabel, agar dapat dipanggil berkali-kali dgn mudah
        function buatBaris4Kolom($kolom1, $kolom2, $kolom3, $kolom4)
        {
            // Mengatur lebar setiap kolom (dalam satuan karakter)
            $lebar_kolom_1 = 10;
            $lebar_kolom_2 = 3;
            $lebar_kolom_3 = 8;
            $lebar_kolom_4 = 8;

            // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
            $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
            $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
            $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);
            $kolom4 = wordwrap($kolom4, $lebar_kolom_4, "\n", true);

            // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
            $kolom1Array = explode("\n", $kolom1);
            $kolom2Array = explode("\n", $kolom2);
            $kolom3Array = explode("\n", $kolom3);
            $kolom4Array = explode("\n", $kolom4);

            // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
            $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array), count($kolom4Array));

            // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
            $hasilBaris = array();

            // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
            for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

                // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");

                // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);
                $hasilKolom4 = str_pad((isset($kolom4Array[$i]) ? $kolom4Array[$i] : ""), $lebar_kolom_4, " ", STR_PAD_LEFT);

                // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3 . " " . $hasilKolom4;
            }

            // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
            return implode("\n", $hasilBaris) . "\n";
        }

        $nama_toko = Cooperative::where('id', Auth::user()->cooperative_id)->first();
        // Membuat judul
        $printer->initialize();
        $printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT); // Setting teks menjadi lebih besar
        $printer->setJustification(Printer::JUSTIFY_CENTER); // Setting teks menjadi rata tengah
        $printer->text($nama_toko->name . "\n");
        $printer->text("\n");

        // Data transaksi
        $printer->initialize();
        date_default_timezone_set('Asia/Jakarta');
        $printer->text("Kasir : " . Auth::user()->name . "\n");
        $printer->text("Waktu : " . date('d-m-Y H:i:s') . "\n");

        // Membuat tabel
        $printer->initialize(); // Reset bentuk/jenis teks
        $printer->text("----------------------------------------\n");
        $printer->text(buatBaris4Kolom("Barang", "qty", "Harga", "Subtotal"));
        $printer->text("----------------------------------------\n");
        $harga = 0;
        $kasir = Kasir::where('user_id', Auth::user()->id)->get();
        foreach ($kasir as $value) {
            $harga += $value->price;
            $printer->text(buatBaris4Kolom($value->product->title, $value->quantity . " pcs", $value->product->price, $value->price));
        };
        $printer->text("----------------------------------------\n");
        $printer->text(buatBaris4Kolom('', '', "Total", $harga));
        $printer->text("\n");

        // Pesan penutup
        $printer->initialize();
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("Terima kasih telah berbelanja\n");
        $printer->text("Di Toko " . $nama_toko->name . "\n");

        $printer->feed(5); // mencetak 5 baris kosong agar terangkat (pemotong kertas saya memiliki jarak 5 baris dari toner)
        $printer->close();
        $kasir = Kasir::where('user_id', Auth::user()->id);
        $kasir->delete();
        return redirect('/kasir');
    }
}
