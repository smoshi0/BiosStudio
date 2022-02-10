<?php
require 'function.php';
$id = $_GET["id"];

if( hapus($id) > 0 ){
    echo "
    <script>
        alert('Data Project Berhasil Dihapus!');
        document.location.href = 'admin_page.php';
    </script>
";
}else{
    echo "
    <script>
        alert('Data Project Gagal Dihapus!');
        document.location.href = 'admin_page.php';
    </script>
";
}