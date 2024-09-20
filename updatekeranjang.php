<?php
session_start();

// Periksa apakah data ID dan jumlah dikirimkan melalui POST
if (isset($_POST['id']) && isset($_POST['jumlah'])) {
    $id = $_POST['id'];
    $jumlah = $_POST['jumlah'];

    // Pastikan jumlah lebih dari 0
    if ($jumlah > 0) {
        // Update jumlah produk di keranjang
        $_SESSION['keranjang'][$id] = $jumlah;
    } else {
        // Jika jumlah adalah 0 atau kurang, hapus produk dari keranjang
        unset($_SESSION['keranjang'][$id]);
    }
}

// Redirect kembali ke halaman keranjang
header('Location: keranjang.php');
exit();

<?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6">Keranjang kosong</td>
    </tr>
<?php endif; ?>