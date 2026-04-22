<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #0f172a;
            color: white;
            padding: 20px;
        }

        .container {
            max-width: 420px;
            margin: auto;
        }

        .card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(12px);
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 13px;
            color: #9ca3af;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 6px 0 14px;
            border-radius: 10px;
            border: none;
            background: rgba(255,255,255,0.08);
            color: white;
            outline: none;
        }

        input:focus {
            background: rgba(255,255,255,0.15);
        }


        select {
            width: 100%;
            padding: 12px;
            margin: 6px 0 14px;
            border-radius: 10px;
            border: none;
            background: #1e293b;
            color: white;
        }

        option {
            color: black;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .back {
            display: inline-block;
            margin-bottom: 15px;
            color: #c7d2fe;
            text-decoration: none;
            font-size: 14px;
        }

        .back:hover {
            color: white;
        }
    </style>
</head>
<body>

<div class="container">

<a href="/transaksi" class="back">← Kembali</a>

<div class="card">
    <h2>Tambah Transaksi</h2>

    <form action="/transaksi" method="POST">
        @csrf

        <label>Tanggal</label>
        <input type="date" name="tanggal" required>

        <label>Keterangan</label>
        <input type="text" name="keterangan" placeholder="Contoh: Jajan, Gaji" required>

        <label>Jumlah</label>
        <input type="text" id="rupiah" placeholder="Rp 0" required>
        <input type="hidden" name="jumlah" id="jumlah">

        <label>Jenis</label>
        <select name="jenis">
            <option value="masuk">Pemasukan</option>
            <option value="keluar">Pengeluaran</option>
        </select>

        <button class="btn-primary">Simpan</button>
    </form>
</div>

</div>

<script>
let rupiah = document.getElementById('rupiah');
let jumlah = document.getElementById('jumlah');

rupiah.addEventListener('input', function(e) {
    let angka = e.target.value.replace(/[^0-9]/g, '');
    jumlah.value = angka;

    let formatted = angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    e.target.value = formatted;
});
</script>

</body>
</html>