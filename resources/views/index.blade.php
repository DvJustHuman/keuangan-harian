<!DOCTYPE html>
<html>
<head>
    <title>Keuangan Harian</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #0f172a;
            color: #e5e7eb;
            padding: 20px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .saldo-card {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .saldo-card .total {
            font-size: 30px;
            font-weight: bold;
        }

        .card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 15px;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .top-bar {
            display: flex;
            gap: 10px;
        }

        input {
            padding: 10px;
            border-radius: 10px;
            border: none;
            background: rgba(255,255,255,0.1);
            color: white;
            width: 100%;
        }

        input::placeholder {
            color: #9ca3af;
        }

        .btn {
            background: #6366f1;
            color: white;
            padding: 10px 14px;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn:hover {
            background: #4f46e5;
        }

        .item {
            padding: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.2s;
        }

        .item:hover {
            background: rgba(255,255,255,0.05);
        }

        .masuk { color: #22c55e; }
        .keluar { color: #ef4444; }

        .hapus {
            background: transparent;
            color: #ef4444;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .hapus:hover {
            color: #f87171;
        }
    </style>
</head>
<body>

<div class="container">

<h1>🌙 Keuangan Harian</h1>

<div class="saldo-card">
    <div>Total Saldo</div>
    <div class="total">Rp {{ number_format($saldo, 0, ',', '.') }}</div>
</div>

<div class="card">
    <div class="top-bar">
        <form method="GET" action="/transaksi" style="flex:1;">
            <input type="text" name="search" placeholder="🔍 Cari keterangan...">
        </form>
        <a href="/transaksi/create" class="btn">+ Tambah</a>
    </div>
</div>

<div class="card">
@forelse($data as $t)
    <div class="item">
        <div>
            <strong>{{ $t->keterangan }}</strong><br>
            <small>{{ $t->tanggal }}</small>
        </div>

        <div>
            @if($t->jenis == 'masuk')
                <span class="masuk">+ Rp{{ number_format($t->jumlah, 0, ',', '.') }}</span>
            @else
                <span class="keluar">- Rp{{ number_format($t->jumlah, 0, ',', '.') }}</span>
            @endif

            <form action="/transaksi/{{ $t->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="hapus">✕</button>
            </form>
        </div>
    </div>
@empty
    <p style="text-align:center;">Belum ada data</p>
@endforelse
</div>

</div>

</body>
</html>