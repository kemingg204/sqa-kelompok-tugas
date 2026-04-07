// Data produk kursi
const products = [
    { id: 1, name: "Kursi Kantor Eksekutif", category: "kantor", price: 1250000, stock: 10, image: "kursi-kantor.jpg" },
    { id: 2, name: "Kursi Kantor Mesh", category: "kantor", price: 850000, stock: 15, image: "kursi-mesh.jpg" },
    { id: 3, name: "Kursi Makan Kayu Jati", category: "rumah", price: 750000, stock: 8, image: "kursi-makan.jpg" },
    { id: 4, name: "Kursi Santai Minimalis", category: "rumah", price: 550000, stock: 12, image: "kursi-santai.jpg" },
    { id: 5, name: "Kursi Taman Plastik", category: "taman", price: 250000, stock: 20, image: "kursi-taman.jpg" },
    { id: 6, name: "Kursi Ayunan Taman", category: "taman", price: 1850000, stock: 3, image: "kursi-ayunan.jpg" }
];

// Keranjang belanja (disimpan di localStorage)
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Fungsi untuk menampilkan produk
function displayProducts(filterCategory = 'all', searchQuery = '') {
    const productsList = document.getElementById('productsList');
    if (!productsList) return;

    let filteredProducts = products;

    // Filter kategori
    if (filterCategory !== 'all') {
        filteredProducts = filteredProducts.filter(p => p.category === filterCategory);
    }

    // Filter pencarian
    if (searchQuery) {
        filteredProducts = filteredProducts.filter(p => 
            p.name.toLowerCase().includes(searchQuery.toLowerCase())
        );
    }

    // Tampilkan produk
    productsList.innerHTML = '';
    filteredProducts.forEach(product => {
        const inCart = cart.find(item => item.id === product.id);
        const qtyInCart = inCart ? inCart.qty : 0;
        const remainingStock = product.stock - qtyInCart;

        const card = document.createElement('div');
        card.className = 'card';
        card.innerHTML = `
            <div style="background:#ddd; height:200px; display:flex; align-items:center; justify-content:center">
                🪑 ${product.name}
            </div>
            <h3>${product.name}</h3>
            <div class="price">Rp ${product.price.toLocaleString('id-ID')}</div>
            <div class="stock">Stok: ${remainingStock}</div>
            <button onclick="addToCart(${product.id})" ${remainingStock <= 0 ? 'disabled class="disabled"' : ''}>
                ${remainingStock <= 0 ? 'Stok Habis' : 'Beli'}
            </button>
        `;
        productsList.appendChild(card);
    });
}

// Fungsi tambah ke keranjang
function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    if (!product) return;

    const existingItem = cart.find(item => item.id === productId);
    const qtyInCart = existingItem ? existingItem.qty : 0;

    if (qtyInCart >= product.stock) {
        alert('Stok tidak mencukupi!');
        return;
    }

    if (existingItem) {
        existingItem.qty += 1;
    } else {
        cart.push({ id: product.id, name: product.name, price: product.price, qty: 1 });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    alert(`${product.name} berhasil ditambahkan ke keranjang!`);
    displayProducts();
}

// Event listener untuk filter
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const kategori = btn.getAttribute('data-kategori');
        const searchQuery = document.getElementById('searchInput')?.value || '';
        displayProducts(kategori, searchQuery);
    });
});

// Event listener untuk pencarian
const searchInput = document.getElementById('searchInput');
if (searchInput) {
    searchInput.addEventListener('input', (e) => {
        const activeFilter = document.querySelector('.filter-btn.active');
        const kategori = activeFilter ? activeFilter.getAttribute('data-kategori') : 'all';
        displayProducts(kategori, e.target.value);
    });
}

// Inisialisasi halaman
if (document.getElementById('productsList')) {
    displayProducts();
}

// Fungsi untuk halaman keranjang
function displayCart() {
    const cartList = document.getElementById('cartList');
    const cartTotal = document.getElementById('cartTotal');
    if (!cartList) return;

    if (cart.length === 0) {
        cartList.innerHTML = '<p>Keranjang Anda kosong</p>';
        if (cartTotal) cartTotal.innerHTML = 'Rp 0';
        return;
    }

    let total = 0;
    cartList.innerHTML = '';
    cart.forEach((item, index) => {
        const subtotal = item.price * item.qty;
        total += subtotal;
        cartList.innerHTML += `
            <div style="border-bottom:1px solid #ddd; padding:10px; display:flex; justify-content:space-between">
                <div>${item.name} x ${item.qty}</div>
                <div>Rp ${subtotal.toLocaleString('id-ID')}</div>
                <button onclick="removeFromCart(${index})">Hapus</button>
            </div>
        `;
    });
    if (cartTotal) cartTotal.innerHTML = `Rp ${total.toLocaleString('id-ID')}`;
}

function removeFromCart(index) {
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
}

function checkout() {
    if (cart.length === 0) {
        alert('Keranjang kosong!');
        return;
    }
    alert('Checkout berhasil! Terima kasih telah berbelanja di KursiKita.');
    cart = [];
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
    window.location.href = 'index.html';
}

// Panggil displayCart jika di halaman keranjang
if (document.getElementById('cartList')) {
    displayCart();
}
