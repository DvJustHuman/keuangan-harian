<!DOCTYPE html>
<html>
<head>
<title>Tambah Transaksi</title>
<style>
body { font-family: Arial; background: #f4f6f9; padding: 20px; }
.card { background: white; padding: 20px; border-radius: 8px; max-width: 400px; margin:
auto; }
input, select { width: 100%; padding: 10px; margin: 8px 0; }
button { width: 100%; padding: 10px; background: green; color: white; }
</style>
</head>
<body>

<div class="card">
<h2>Tambah Transaksi</h2>
<form action="/transaksi" method="POST">
@csrf
<input type="date" name="tanggal">
<input type="text" name="keterangan">
<input type="number" name="jumlah">
<select name="jenis">
<option value="masuk">Pemasukan</option>
<option value="keluar">Pengeluaran</option>
</select>
<button>Simpan</button>
</form>
</div>
</body>
</html>