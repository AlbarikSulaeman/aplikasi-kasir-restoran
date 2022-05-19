<style type="text/css">
table {
  font-family: Arial, Helvetica, sans-serif;
  color: #666;
  text-shadow: 1px 1px 0px #fff;
  background: #eaebec;
  border: #ccc 1px solid;

}

table th {
  padding: 15px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
  font-size: 14px;
}


table tr {
  text-align: center;
  padding-left: 20px;
}


table td {
  padding: 15px 25px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
  font-size: 10px;
}

table tr:last-child td {
  border-bottom: 0;
}

table tr:last-child td:first-child {
  -moz-border-radius-bottomleft: 3px;
  -webkit-border-bottom-left-radius: 3px;
  border-bottom-left-radius: 3px;
}

table tr:last-child td:last-child {
  -moz-border-radius-bottomright: 3px;
  -webkit-border-bottom-right-radius: 3px;
  border-bottom-right-radius: 3px;
}

table tr:hover td {
  background: #f2f2f2;
  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
}
	</style>
    <table class="table">
        <thead class="thead-dark">
          <tr>
          <th>Nama Pelanggan</th>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Nama Pegawai</th>
            <th>Tanggal Pembelian</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($transaksi as $transaksis)
        <tr>
            <td>{{ $transaksis->nama_pelanggan }}</td>
            <td>{{ $transaksis->nama_menu }}</td>
            <td>{{ $transaksis->jumlah }}</td>
            <td>RP.{{ $transaksis->total_harga }}</td>
            <td>{{ $transaksis->nama_pegawai }}</td>
            <td>{{ $transaksis->created_at }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>