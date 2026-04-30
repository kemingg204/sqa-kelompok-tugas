<?php
require_once '../api/auth.php';
redirectIfNotManager();
$user = getCurrentUser();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager - Dashboard & Laporan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            background: white;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        }
        .chart-container h3 {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e9ecef;
        }
        canvas { max-height: 300px; width: 100% !important; }
        .periode-filter {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
            align-items: center;
            background: white;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .periode-filter select, .periode-filter input {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .two-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        @media (max-width: 768px) {
            .two-columns { grid-template-columns: 1fr; }
        }
        .history-table {
            max-height: 400px;
            overflow-y: auto;
        }
        .history-table table {
            width: 100%;
            border-collapse: collapse;
        }
        .history-table th, .history-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .history-table th {
            background: #f8f9fa;
            position: sticky;
            top: 0;
        }
        .total-penjualan {
            font-size: 24px;
            font-weight: bold;
            color: #28a745;
            text-align: right;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #ddd;
        }
        .btn-filter {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            cursor: pointer;
        }
        .btn-filter:hover {
            transform: translateY(-2px);
        }
        .badge-selesai {
            background: #d4edda;
            color: #155724;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
        .loading {
            text-align: center;
            padding: 20px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>📊 Manager Dashboard - Lake Data Kursi</h2>
        <div>
            📋 <?php echo $user['nama']; ?> (Manager)
            <a href="../logout.php" style="margin-left:15px; color:white;">Logout</a>
        </div>
    </div>

    <div class="container">
        <!-- Statistik Cards -->
        <div class="stats">
            <div class="stat-card">
                <h3>Total Kursi</h3>
                <div class="value" id="totalKursi">-</div>
            </div>
            <div class="stat-card">
                <h3>Total Stok</h3>
                <div class="value" id="totalStok">-</div>
            </div>
            <div class="stat-card">
                <h3>Nilai Inventaris</h3>
                <div class="value" id="totalNilai">-</div>
            </div>
            <div class="stat-card">
                <h3>Total Penjualan</h3>
                <div class="value" id="totalPenjualan">-</div>
            </div>
        </div>

        <!-- Filter Periode -->
        <div class="periode-filter">
            <label><strong>Filter Periode:</strong></label>
            <select id="filterJenis" onchange="changeFilterJenis()">
                <option value="hari">📅 Hari Ini</option>
                <option value="minggu">📆 Minggu Ini</option>
                <option value="bulan">📆 Bulan Ini</option>
                <option value="tahun">📅 Tahun Ini</option>
                <option value="custom">⚙️ Custom</option>
            </select>
            <div id="customRange" style="display: none;">
                <input type="date" id="tglMulai">
                <span> s/d </span>
                <input type="date" id="tglSelesai">
            </div>
            <button class="btn-filter" onclick="loadGrafik()">📊 Tampilkan</button>
            <button class="btn-filter" onclick="exportLaporan()" style="background:#28a745;">📎 Export Excel</button>
        </div>

        <!-- Grafik Penjualan -->
        <div class="chart-container">
            <h3>📈 Grafik Penjualan</h3>
            <canvas id="penjualanChart"></canvas>
        </div>

        <!-- History Penjualan -->
        <div class="chart-container">
            <h3>📋 History Penjualan</h3>
            <div class="history-table">
                <table>
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Tanggal</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="historyBody">
                        <tr class="loading"><td colspan="5">Loading data...</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="total-penjualan">
                💰 Total Pendapatan: Rp <span id="grandTotal">0</span>
            </div>
        </div>
    </div>

    <script>
        let penjualanChart = null;

        function changeFilterJenis() {
            let jenis = document.getElementById('filterJenis').value;
            let customDiv = document.getElementById('customRange');
            customDiv.style.display = jenis === 'custom' ? 'inline-block' : 'none';
        }

        function getFilterParams() {
            let jenis = document.getElementById('filterJenis').value;
            let params = new URLSearchParams();
            params.append('jenis', jenis);
            
            if (jenis === 'custom') {
                let mulai = document.getElementById('tglMulai').value;
                let selesai = document.getElementById('tglSelesai').value;
                if (mulai) params.append('tgl_mulai', mulai);
                if (selesai) params.append('tgl_selesai', selesai);
            }
            return params;
        }

        function loadStatistik() {
            fetch('../api/api_statistik.php')
                .then(res => res.json())
                .then(result => {
                    if (result.status === 'success') {
                        document.getElementById('totalKursi').innerText = result.data.total_kursi || 0;
                        document.getElementById('totalStok').innerText = result.data.total_stok || 0;
                        document.getElementById('totalNilai').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(result.data.total_nilai_inventaris || 0);
                    }
                })
                .catch(err => console.error('Statistik error:', err));
        }

        function loadGrafik() {
            let params = getFilterParams();
            let loadingRow = '<tr class="loading"><td colspan="5">Loading data...</td></tr>';
            document.getElementById('historyBody').innerHTML = loadingRow;
            
            fetch('../api/api_laporan_penjualan.php?' + params.toString())
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    console.log('Data API:', data);
                    
                    // Update history table
                    let historyHtml = '';
                    let grandTotal = 0;
                    
                    if (data.history && data.history.length > 0) {
                        data.history.forEach(item => {
                            historyHtml += `<tr>
                                <td><strong>${item.no_invoice}</strong></td>
                                <td>${item.tanggal}</td>
                                <td>${item.customer_name || '-'}</td>
                                <td>Rp ${new Intl.NumberFormat('id-ID').format(item.grand_total)}</td>
                                <td><span class="badge-selesai">${item.status}</span></td>
                            </tr>`;
                            grandTotal += item.grand_total;
                        });
                    } else {
                        historyHtml = '<tr><td colspan="5">📭 Belum ada transaksi</td></tr>';
                    }
                    document.getElementById('historyBody').innerHTML = historyHtml;
                    document.getElementById('grandTotal').innerText = new Intl.NumberFormat('id-ID').format(grandTotal);
                    document.getElementById('totalPenjualan').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(grandTotal);

                    // Update chart
                    if (penjualanChart) {
                        penjualanChart.destroy();
                    }
                    
                    const ctx = document.getElementById('penjualanChart').getContext('2d');
                    penjualanChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.chart.labels,
                            datasets: [{
                                label: 'Penjualan (Rp)',
                                data: data.chart.values,
                                backgroundColor: 'rgba(102, 126, 234, 0.2)',
                                borderColor: 'rgba(102, 126, 234, 1)',
                                borderWidth: 2,
                                tension: 0.4,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: true,
                            plugins: {
                                legend: { position: 'top' },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return 'Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    ticks: {
                                        callback: function(value) {
                                            return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                                        }
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(err => {
                    console.error('Error loading grafik:', err);
                    document.getElementById('historyBody').innerHTML = '<tr><td colspan="5">❌ Error memuat data: ' + err.message + '</td></tr>';
                });
        }

        function exportLaporan() {
            let params = getFilterParams();
            window.open('../export/export_laporan_penjualan.php?' + params.toString(), '_blank');
        }

        // Load data saat halaman dibuka
        document.addEventListener('DOMContentLoaded', function() {
            loadStatistik();
            loadGrafik();
        });
    </script>
</body>
</html>