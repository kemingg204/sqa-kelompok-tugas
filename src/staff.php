<?php require_once '../api/auth.php'; redirectIfNotLoggedIn(); $user = getCurrentUser(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Staff - Lihat Stok</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="header">
        <h2>🏪 Cv Rofile Chetose - Lihat Stok Kursi</h2>
        <div>👤 <?php echo $user['nama']; ?> | <a href="../logout.php">Logout</a></div>
    </div>
    <div class="container">
        <div class="card">
            <h3>📊 Stok Kursi Tersedia</h3>
            <div class="search-section"><input type="text" id="search" placeholder="Cari kursi..." onkeyup="searchData()"></div>
            <div class="table-wrapper">
                <table><thead><tr><th>Kode</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Warna</th></tr></thead><tbody id="data-body"></tbody></table>
            </div>
        </div>
    </div>
    <script>
        function loadData() {
            fetch('../api/api_tampil.php').then(res=>res.json()).then(data=>{ let html=''; data.forEach(item=>{ let stokClass=item.stok>20?'badge-success':(item.stok>5?'badge-warning':'badge-danger'); html+=`<tr><td>${item.kode_kursi||'-'}</td><td>${item.nama_kursi}</td><td>${item.kategori||'-'}</td><td>Rp ${new Intl.NumberFormat('id-ID').format(item.harga)}</td><td><span class="badge ${stokClass}">${item.stok} unit</span></td><td>${item.warna||'-'}</td></tr>`; }); document.getElementById('data-body').innerHTML=html; });
        }
        function searchData(){ let kw=document.getElementById('search').value; fetch(`../api/api_search.php?keyword=${kw}`).then(res=>res.json()).then(r=>{ if(r.status==='success'){ let html=''; r.data.forEach(item=>{ let stokClass=item.stok>20?'badge-success':(item.stok>5?'badge-warning':'badge-danger'); html+=`<tr><td>${item.kode_kursi||'-'}</td><td>${item.nama_kursi}</td><td>${item.kategori||'-'}</td><td>Rp ${new Intl.NumberFormat('id-ID').format(item.harga)}</td><td><span class="badge ${stokClass}">${item.stok} unit</span></td><td>${item.warna||'-'}</td></tr>`; }); document.getElementById('data-body').innerHTML=html; } }); }
        loadData();
    </script>
</body>
</html>