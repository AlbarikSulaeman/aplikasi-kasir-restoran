<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Transaksi;

class PdfController extends Controller
{
    
    public function print()
    {
        $transaksi = Transaksi::all();
        $pdf = PDF::loadview('manajer.cetak', compact('transaksi'))->setPaper('A4','potrait');
        return $pdf->stream();
    }
}
