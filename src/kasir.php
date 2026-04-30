<?php require_once '../api/auth.php'; redirectIfNotKasir(); $user = getCurrentUser(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kasir - Transaksi Penjualan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .info-barang { background: #e3f2fd; padding: 15px; border-radius: 12px; margin-top: 15px; display: none; }
        .total { font-size: 28px; font-weight: bold; color: #28a745; text-align: right; margin-top: 20px; padding-top: 20px; border-top: 2px solid #ddd; }
        .cart-item { display: flex; justify-content: space-between; align-items: center; padding: 10px; border-bottom: 1px solid #eee; }
        .cart-item button { background: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer; }
        .bayar-section { background: #f8f9fa; padding: 20px; border-radius: 12px; margin-top: 20px; }
        .btn-bayar { background: #28a745; color: white; padding: 15px; font-size: 18px; width: 100%; border: none; border-radius: 12px; cursor: pointer; }
        .two-columns { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        @media (max-width: 768px) { .two-columns { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="header">
        <h2>🏪 Cv Rofile Chetose </h2>
        <div>🧾 <?php echo $user['nama']; ?> | <a href="../dashboard/admin.php">Admin</a> | <a href="../logout.php">Logout</a></div>
    </div>
    <div class="container">
        <div id="alert"></div>
        <div class="two-columns">
            <div class="card">
                <h3>🛒 Pilih Barang</h3>
                <div class="form-group"><label>Cari Kursi</label><input type="text" id="searchBarang" placeholder="Cari..." onkeyup="filterBarang()"></div>
                <div class="form-group"><label>Pilih Kursi</label><select id="kursi_id" onchange="cekStok()"><option value="">-- Pilih --</option></select></div>
                <div id="infoBarang" class="info-barang"></div>
                <div class="form-group"><label>Jumlah</label><input type="number" id="jumlah" min="1" value="1" onkeyup="hitungSubtotal()"></div>
                <div class="form-group"><label>Subtotal</label><input type="number" id="subtotal" readonly style="background:#f0f0f0"></div>
                <button class="btn btn-primary" onclick="tambahKeKeranjang()">➕ Tambah</button>
            </div>
            <div class="card">
                <h3>🛍️ Keranjang</h3>
                <div id="cartItems"><p style="text-align:center">Belum ada item</p></div>
                <div class="total">Total: Rp <span id="totalSemua">0</span></div>
                <div class="bayar-section">
                    <div class="form-group"><label>Customer</label><input type="text" id="customer_name" placeholder="Nama customer"></div>
                    <div class="form-group"><label>Bayar</label><input type="number" id="bayar" placeholder="Jumlah bayar" onkeyup="hitungKembalian()"></div>
                    <div class="form-group"><label>Kembalian</label><input type="number" id="kembalian" readonly style="background:#f0f0f0"></div>
                    <button class="btn-bayar" onclick="prosesPembayaran()">✅ Proses</button>
                </div>
            </div>
        </div>
        <div class="card"><h3>📋 Riwayat Hari Ini</h3>
            <div class="table-wrapper"><table><thead><tr><th>Invoice</th><th>Customer</th><th>Total</th><th>Bayar</th><th>Waktu</th></tr></thead><tbody id="riwayatBody"><tr><td colspan="5">Loading...</td></tr></tbody></table></div>
        </div>
    </div>
    <script>
        let keranjang=[], dataKursi=[];
        function loadKursi(){ fetch('../api/api_tampil.php').then(res=>res.json()).then(data=>{ dataKursi=data; let opt='<option value="">-- Pilih --</option>'; data.forEach(item=>{ if(item.stok>0) opt+=`<option value="${item.id}" data-harga="${item.harga_jual||item.harga}" data-stok="${item.stok}" data-nama="${item.nama_kursi}" data-kode="${item.kode_kursi||'KSR-'+item.id}">${item.kode_kursi||'KSR-'+item.id} - ${item.nama_kursi} (Stok:${item.stok})</option>`; }); document.getElementById('kursi_id').innerHTML=opt; }); }
        function filterBarang(){ let kw=document.getElementById('searchBarang').value.toLowerCase(); let opt='<option value="">-- Pilih --</option>'; dataKursi.forEach(item=>{ if(item.stok>0 && (item.nama_kursi.toLowerCase().includes(kw)||(item.kode_kursi||'').toLowerCase().includes(kw))) opt+=`<option value="${item.id}" data-harga="${item.harga_jual||item.harga}" data-stok="${item.stok}" data-nama="${item.nama_kursi}" data-kode="${item.kode_kursi||'KSR-'+item.id}">${item.kode_kursi||'KSR-'+item.id} - ${item.nama_kursi} (Stok:${item.stok})</option>`; }); document.getElementById('kursi_id').innerHTML=opt; }
        function cekStok(){ let sel=document.getElementById('kursi_id'), opt=sel.options[sel.selectedIndex]; if(sel.value){ let stok=opt.getAttribute('data-stok'), harga=opt.getAttribute('data-harga'), nama=opt.getAttribute('data-nama'), kode=opt.getAttribute('data-kode'); document.getElementById('infoBarang').style.display='block'; document.getElementById('infoBarang').innerHTML=`<h4>📦 ${kode} - ${nama}</h4><p>Stok: <strong style="color:${stok<5?'red':'green'}">${stok}</strong><br>Harga: Rp ${new Intl.NumberFormat('id-ID').format(harga)}</p>`; hitungSubtotal(); } else { document.getElementById('infoBarang').style.display='none'; } }
        function hitungSubtotal(){ let sel=document.getElementById('kursi_id'), opt=sel.options[sel.selectedIndex]; let harga=opt.getAttribute('data-harga'), jumlah=document.getElementById('jumlah').value; document.getElementById('subtotal').value=harga*jumlah; }
        function tambahKeKeranjang(){ let sel=document.getElementById('kursi_id'), opt=sel.options[sel.selectedIndex]; let id=sel.value, kode=opt.getAttribute('data-kode'), nama=opt.getAttribute('data-nama'), harga=opt.getAttribute('data-harga'), stok=opt.getAttribute('data-stok'), jumlah=parseInt(document.getElementById('jumlah').value), subtotal=parseInt(document.getElementById('subtotal').value); if(!id){ alert('Pilih kursi!'); return; } if(jumlah<1){ alert('Jumlah minimal 1'); return; } if(jumlah>stok){ alert('Stok tidak cukup!'); return; } let existing=keranjang.find(item=>item.id==id); if(existing){ existing.jumlah+=jumlah; existing.subtotal+=subtotal; }else{ keranjang.push({id,kode,nama,harga,jumlah,subtotal}); } renderKeranjang(); document.getElementById('jumlah').value=1; document.getElementById('kursi_id').value=''; document.getElementById('infoBarang').style.display='none'; alert('Barang ditambahkan'); }
        function renderKeranjang(){ if(keranjang.length===0){ document.getElementById('cartItems').innerHTML='<p style="text-align:center">Belum ada item</p>'; document.getElementById('totalSemua').innerText='0'; return; } let html='', total=0; keranjang.forEach((item,idx)=>{ total+=item.subtotal; html+=`<div class="cart-item"><div><strong>${item.kode}</strong> - ${item.nama}<br>${item.jumlah} x Rp ${new Intl.NumberFormat('id-ID').format(item.harga)} = Rp ${new Intl.NumberFormat('id-ID').format(item.subtotal)}</div><button onclick="hapusDariKeranjang(${idx})">Hapus</button></div>`; }); document.getElementById('cartItems').innerHTML=html; document.getElementById('totalSemua').innerText=new Intl.NumberFormat('id-ID').format(total); }
        function hapusDariKeranjang(idx){ keranjang.splice(idx,1); renderKeranjang(); }
        function hitungKembalian(){ let total=0; keranjang.forEach(item=>total+=item.subtotal); let bayar=parseInt(document.getElementById('bayar').value)||0; document.getElementById('kembalian').value=bayar-total>0?bayar-total:0; }
        function prosesPembayaran(){ if(keranjang.length===0){ alert('Keranjang kosong!'); return; } let total=0; keranjang.forEach(item=>total+=item.subtotal); let bayar=parseInt(document.getElementById('bayar').value)||0; let customer=document.getElementById('customer_name').value||'Umum'; if(bayar<total){ alert('Uang tidak cukup!'); return; } let fd=new FormData(); fd.append('items',JSON.stringify(keranjang)); fd.append('total',total); fd.append('bayar',bayar); fd.append('customer',customer); fetch('proses_transaksi.php',{method:'POST',body:fd}).then(res=>res.json()).then(result=>{ alert(result.message); if(result.status==='success'){ keranjang=[]; renderKeranjang(); document.getElementById('bayar').value=''; document.getElementById('kembalian').value=''; document.getElementById('customer_name').value=''; loadKursi(); loadRiwayat(); } }).catch(err=>alert('Error: '+err)); }
        function loadRiwayat(){ fetch('riwayat_api.php').then(res=>res.json()).then(data=>{ if(data.length===0){ document.getElementById('riwayatBody').innerHTML='<tr><td colspan="5">Belum ada transaksi</td></tr>'; return; } let html=''; data.forEach(item=>{ html+=`<tr><td>${item.no_invoice}</td><td>${item.customer_name||'-'}</td><td>Rp ${new Intl.NumberFormat('id-ID').format(item.total)}</td><td>Rp ${new Intl.NumberFormat('id-ID').format(item.bayar)}</td><td>${item.tanggal}</td></tr>`; }); document.getElementById('riwayatBody').innerHTML=html; }); }
        loadKursi(); loadRiwayat();
    </script>
</body>
</html>