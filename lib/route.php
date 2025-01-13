<?php
$route = $_GET['route'] ?? "home";

switch ($route) {
    case 'pemesanan':
        include 'main/form-pemesanan.php';
        break;
    case 'daftar-pemesan':
        include 'main/daftar-pemesan.php';
        break;
    case 'edit':
        include 'main/edit-form.php';
        break;
    case 'detail':
        include 'main/detail_pemesan.php';
        break;

    default:
        include 'main/home.php';
        break;
}
