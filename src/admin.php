<?php require_once '../api/auth.php'; redirectIfNotAdmin(); $user = getCurrentUser(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .form-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; }
        .btn-sm { padding: 5px 10px; font-size: 12px; margin: 2px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>🏪 Admin Panel - Kelola Kursi</h2>
        <div>👑 <?php echo $user['nama']; ?> | <a href="../transaksi/penjualan.php">Penjualan</a> | <a href="../logout.php">Logout</a></div>
    </div>
    <div class="container">
        <div id="alert"></div>
        <div class="stats">
            <div class="stat-card"><h3>Total Kursi</h3><div class="value" id="totalKursi">-</div></div>
            <div class="stat-card"><h3>Total Stok</h3><div class="value" id="totalStok">-</div></div>
            <div class="stat-card"><h3>Nilai Inventaris</h3><div class="value" id="totalNilai">-</div></div>
        </div>
        <div class="card">
            <h3 id="formTitle">➕ Tambah Kursi</h3>
            <form id="kursiForm">
                <input type="hidden" id="kursiId">
                <div class="form-grid">
                    <div><label>Kode</label><input type="text" id="kode_kursi" placeholder="KSR-XXX"></div>
                    <div><label>Nama *</label><input type="text" id="nama_kursi" required></div>
                    <div><label>Kategori</label><select id="kategori"><option value="">Pilih</option><option>Kantor</option><option>Rumah</option><option>Gaming</option><option>Outdoor</option></select></div>
                    <div><label>Harga *</label><input type="number" id="harga" required></div>
                    <div><label>Stok *</label><input type="number" id="stok" required></div>
                    <div><label>Berat</label><input type="number" id="berat_kg" step="0.1"></div>
                    <div><label>Warna</label><input type="text" id="warna"></div>
                </div>
                <div><label>Deskripsi</label><textarea id="deskripsi" rows="2"></textarea></div>
                <button type="button" class="btn btn-primary" id="submitBtn" onclick="submitForm()">Simpan</button>
                <button type="button" class="btn btn-danger" id="cancelBtn" onclick="resetForm()" style="display:none">Batal</button>
            </form>
        </div>
        <div class="search-section">
            <input type="text" id="searchKeyword" placeholder="🔍 Cari..." onkeyup="searchData()">
            <select id="filterKategori" onchange="filterData()"><option value="">Semua Kategori</option><option>Kantor</option><option>Rumah</option><option>Gaming</option><option>Outdoor</option></select>
            <button class="btn btn-warning" onclick="resetFilter()">Reset</button>
            <button class="btn btn-success" onclick="exportExcel()">Excel</button>
            <button class="btn btn-danger" onclick="exportPDF()">PDF</button>
        </div>
        <div class="table-wrapper">
            <table><thead><tr><th>ID</th><th>Kode</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Berat</th><th>Warna</th><th>Aksi</th></tr></thead><tbody id="dataKursi"></tbody></table>
        </div>
    </div>
    <script>
        function showAlert(msg, type) { let a=document.getElementById('alert'); a.className=`alert alert-${type}`; a.innerHTML=msg; a.style.display='block'; setTimeout(()=>a.style.display='none',3000); }
        function loadData() {
            fetch('../api/api_tampil.php').then(res=>res.json()).then(data=>{ let html=''; data.forEach(item=>{ html+=`<tr><td>${item.id}</td><td>${item.kode_kursi||'-'}</td><td>${item.nama_kursi}</td><td>${item.kategori||'-'}</td><td>Rp ${new Intl.NumberFormat('id-ID').format(item.harga)}</td><td>${item.stok}</td><td>${item.berat_kg?item.berat_kg+' kg':'-'}</td><td>${item.warna||'-'}</td><td><button class="btn btn-warning btn-sm" onclick="editData(${item.id})">Edit</button> <button class="btn btn-danger btn-sm" onclick="hapusData(${item.id})">Hapus</button></td></tr>`; }); document.getElementById('dataKursi').innerHTML=html; });
        }
        function loadStatistik() {
            fetch('../api/api_statistik.php').then(res=>res.json()).then(r=>{ if(r.status==='success'){ document.getElementById('totalKursi').innerText=r.data.total_kursi; document.getElementById('totalStok').innerText=r.data.total_stok; document.getElementById('totalNilai').innerText='Rp '+new Intl.NumberFormat('id-ID').format(r.data.total_nilai_inventaris); } });
        }
        function submitForm() {
            let id=document.getElementById('kursiId').value, fd=new FormData();
            fd.append('id',id); fd.append('kode_kursi',document.getElementById('kode_kursi').value); fd.append('nama_kursi',document.getElementById('nama_kursi').value);
            fd.append('kategori',document.getElementById('kategori').value); fd.append('harga',document.getElementById('harga').value); fd.append('stok',document.getElementById('stok').value);
            fd.append('berat_kg',document.getElementById('berat_kg').value); fd.append('warna',document.getElementById('warna').value); fd.append('deskripsi',document.getElementById('deskripsi').value);
            fetch(id?'../api/api_ubah.php':'../api/api_tambah.php',{method:'POST',body:fd}).then(res=>res.json()).then(r=>{ showAlert(r.message,r.status); if(r.status==='success'){ resetForm(); loadData(); loadStatistik(); } });
        }
        function editData(id){ fetch(`../api/api_edit.php?id=${id}`).then(res=>res.json()).then(r=>{ if(r.status==='success'){ let d=r.data; document.getElementById('kursiId').value=d.id; document.getElementById('kode_kursi').value=d.kode_kursi||''; document.getElementById('nama_kursi').value=d.nama_kursi; document.getElementById('kategori').value=d.kategori; document.getElementById('harga').value=d.harga; document.getElementById('stok').value=d.stok; document.getElementById('berat_kg').value=d.berat_kg; document.getElementById('warna').value=d.warna; document.getElementById('deskripsi').value=d.deskripsi; document.getElementById('formTitle').innerHTML='✏️ Edit Data'; document.getElementById('submitBtn').innerHTML='Update'; document.getElementById('cancelBtn').style.display='inline-block'; window.scrollTo({top:0}); } }); }
        function hapusData(id){ if(!confirm('Yakin hapus?')) return; let fd=new FormData(); fd.append('id',id); fetch('../api/api_hapus.php',{method:'POST',body:fd}).then(res=>res.json()).then(r=>{ showAlert(r.message,r.status); if(r.status==='success'){ if(document.getElementById('kursiId').value==id) resetForm(); loadData(); loadStatistik(); } }); }
        function resetForm(){ document.getElementById('kursiForm').reset(); document.getElementById('kursiId').value=''; document.getElementById('formTitle').innerHTML='➕ Tambah Kursi'; document.getElementById('submitBtn').innerHTML='Simpan'; document.getElementById('cancelBtn').style.display='none'; }
        function searchData(){ let kw=document.getElementById('searchKeyword').value; fetch(`../api/api_search.php?keyword=${kw}`).then(res=>res.json()).then(r=>{ if(r.status==='success'){ let html=''; r.data.forEach(item=>{ html+=`<tr><td>${item.id}</td><td>${item.kode_kursi||'-'}</td><td>${item.nama_kursi}</td><td>${item.kategori||'-'}</td><td>Rp ${new Intl.NumberFormat('id-ID').format(item.harga)}</td><td>${item.stok}</td><td>${item.berat_kg?item.berat_kg+' kg':'-'}</td><td>${item.warna||'-'}</td><td><button class="btn btn-warning btn-sm" onclick="editData(${item.id})">Edit</button> <button class="btn btn-danger btn-sm" onclick="hapusData(${item.id})">Hapus</button></td></tr>`; }); document.getElementById('dataKursi').innerHTML=html; } }); }
        function filterData(){ let kat=document.getElementById('filterKategori').value; if(!kat){ loadData(); return; } fetch(`../api/api_filter.php?kategori=${kat}`).then(res=>res.json()).then(r=>{ if(r.status==='success'){ let html=''; r.data.forEach(item=>{ html+=`<tr><td>${item.id}</td><td>${item.kode_kursi||'-'}</td><td>${item.nama_kursi}</td><td>${item.kategori||'-'}</td><td>Rp ${new Intl.NumberFormat('id-ID').format(item.harga)}</td><td>${item.stok}</td><td>${item.berat_kg?item.berat_kg+' kg':'-'}</td><td>${item.warna||'-'}</td><td><button class="btn btn-warning btn-sm" onclick="editData(${item.id})">Edit</button> <button class="btn btn-danger btn-sm" onclick="hapusData(${item.id})">Hapus</button></td></tr>`; }); document.getElementById('dataKursi').innerHTML=html; } }); }
        function resetFilter(){ document.getElementById('searchKeyword').value=''; document.getElementById('filterKategori').value=''; loadData(); }
        function exportExcel(){ window.open('../export/export_excel.php','_blank'); }
        function exportPDF(){ window.open('../export/export_pdf.php','_blank'); }
        loadData(); loadStatistik();
    </script>
</body>
</html>