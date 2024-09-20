<?php
session_start();

// Cek apakah $_SESSION['keranjang'] sudah didefinisikan
if (!isset($_SESSION['keranjang']) || !is_array($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array(); // Inisialisasi dengan array kosong jika belum ada
}

$koneksi = new mysqli("localhost", "root", "", "vape_store");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.cart {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    width: 450px;
}

.cart h2 {
    margin-top: 0;
    text-align: center;
    font-size: 24px;
    color: #333;
    border-bottom: 1px solid #eeeeee;
    padding-bottom: 15px;
}

.store {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.store-icon {
    width: 24px;
    height: 24px;
    margin-right: 10px;
}

.store-name {
    font-size: 18px;
    font-weight: 600;
    color: #333;
}

.cart-items {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.cart-item {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    padding: 15px 0;
    border-bottom: 1px solid #eeeeee;
}

.select-item {
    margin-right: 15px;
}

.item-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    margin-right: 15px;
}

.item-details {
    flex-grow: 1;
}

.item-name {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    display: block;
}

.item-description {
    font-size: 14px;
    color: #777;
    margin-top: 5px;
}

.item-quantity {
    margin-top: 10px;
    display: flex;
    align-items: center;
}

.quantity-btn {
    background-color: #dddddd;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
}

.quantity-input {
    width: 40px;
    text-align: center;
    border: 1px solid #dddddd;
    border-radius: 5px;
    margin: 0 10px;
}

.price-section {
    margin-top: 10px;
}

.item-price {
    font-size: 16px;
    font-weight: bold;
    color: #ff5722;
    margin-right: 10px;
}

.item-original-price {
    font-size: 14px;
    color: #999;
    text-decoration: line-through;
}

.remove-btn {
    background-color: transparent;
    color: #ff4d4d;
    border: none;
    font-size: 20px;
    cursor: pointer;
    margin-left: 15px;
}

.checkout-section {
    margin-top: 20px;
}

.select-all {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.select-all-checkbox {
    margin-right: 10px;
}

.checkout-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.total {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.checkout-btn {
    background-color: #ff5722;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.checkout-btn:hover {
    background-color: #e64a19;
    transform: translateY(-2px);
}

.item-count {
    background-color: #ffffff;
    color: #ff5722;
    padding: 5px 10px;
    border-radius: 15px;
    margin-left: 10px;
    font-size: 14px;
    font-weight: 600;
}

    </style>
</head>
<body>
    
<form action="" method="post"></form>
    <div class="cart">
        <h2>Keranjang Belanja</h2>
        <div class="store">
            <img src="store-icon.png" alt="Icon Toko" class="store-icon">
            <span class="store-name">Nama Toko</span>
        </div>
        <ul class="cart-items">
            <li class="cart-item">
                <input type="checkbox" class="select-item">
                <img src="product1.jpg" alt="Produk 1" class="item-image">
                <div class="item-details">
                    <span class="item-name">Produk 1</span>
                    <span class="item-description">Deskripsi singkat produk 1</span>
                    <div class="item-quantity">
                        <button class="quantity-btn">-</button>
                        <input type="text" value="1" class="quantity-input">
                        <button class="quantity-btn">+</button>
                    </div>
                    <div class="price-section">
                        <span class="item-price">Rp 50,000</span>
                        <span class="item-original-price">Rp 70,000</span>
                    </div>
                </div>
                <button class="remove-btn">✕</button>
            </li>
            <li class="cart-item">
                <input type="checkbox" class="select-item">
                <img src="product2.jpg" alt="Produk 2" class="item-image">
                <div class="item-details">
                    <span class="item-name">Produk 2</span>
                    <span class="item-description">Deskripsi singkat produk 2</span>
                    <div class="item-quantity">
                        <button class="quantity-btn">-</button>
                        <input type="text" value="2" class="quantity-input">
                        <button class="quantity-btn">+</button>
                    </div>
                    <div class="price-section">
                        <span class="item-price">Rp 75,000</span>
                        <span class="item-original-price">Rp 100,000</span>
                    </div>
                </div>
                <button class="remove-btn">✕</button>
            </li>
        </ul>
        <div class="checkout-section">
            <div class="select-all">
                <input type="checkbox" class="select-all-checkbox"> Pilih Semua
            </div>
            <div class="checkout-details">
                <div class="total">
                    <span>Total:</span>
                    <span class="total-price">Rp 200,000</span>
                </div>
                <button class="checkout-btn">
                    <span>Checkout</span>
                    <span class="item-count">(2 barang)</span>
                </button>
            </div>
        </div>
     </form>
    </div>
</body>
</html>