<?php
$conn = mysqli_connect("localhost", "root", "", "proms");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    $nama_projek = htmlspecialchars($data["nama_projek"]);
    $manajer = htmlspecialchars($data["manajer"]);
    $anggota1 = htmlentities($data["anggota1"]);
    $anggota2 = htmlentities($data["anggotaaa"]);
    $anggota3 = htmlentities($data["anggotaaaaa"]);
    $np = htmlspecialchars($data["np"]);
    $hp = htmlspecialchars($data["hp"]);
    $start_date = htmlspecialchars($data["start_date"]);
    $end_date = htmlspecialchars($data["end_date"]);
    $jw = htmlspecialchars($data["jw"]);
    $jw = htmlspecialchars($data["jw"]);
    
    $proposal = upload_dokumen();
	if( !$proposal ){
		return false;
	}

    $query = "INSERT INTO projek VALUES ('', '$nama_projek', '$proposal', '$manajer', '$anggota1', '$anggota2', '$anggota3', '$np', '$hp','$start_date',
                                        '$end_date', '$jw', '0', '', '0', '')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM projek WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id = $data["id"];
    $nama_projek = htmlspecialchars($data["nama_projek"]);
    $manajer = htmlspecialchars($data["manajer"]);
    $anggota1 = htmlspecialchars($data["anggota1"]);
    $anggota2 = htmlspecialchars($data["anggotaaa"]);
    $anggota3 = htmlspecialchars($data["anggotaaaaa"]);
    $np = htmlspecialchars($data["np"]);
    $hp = htmlspecialchars($data["hp"]);
    $start_date = htmlspecialchars($data["start_date"]);
    $end_date = htmlspecialchars($data["end_date"]);
    $jw = htmlspecialchars($data["jw"]);
    $prog_back = htmlspecialchars($data["prog_back"]);
    $note_back = htmlspecialchars($data["note_back"]);
    $prog_front = htmlspecialchars($data["prog_front"]);
    $note_front = htmlspecialchars($data["note_front"]);
    $proposallama = htmlspecialchars($data["proposallama"]);
    

    if( $_FILES['proposal']['error'] === 4){
        $proposal = $proposallama;
    } else{
        $proposal = upload_dokumen();
    }

    $query = "UPDATE projek SET
                nama_projek = '$nama_projek',
                proposal = '$proposal',
                manajer = '$manajer',
                anggota1 = '$anggota1',
                anggota2 = '$anggota2',
                anggota3 = '$anggota3',
                np = '$np',
                hp = '$hp',
                start_date = '$start_date',
                end_date = '$end_date',
                jw = '$jw',
                prog_back = '$prog_back',
                note_back = '$note_back',
                prog_front = '$prog_front',
                note_front = '$note_front'
                WHERE id = $id
                ";
               
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah_front($data){
    global $conn;
    $id = $data["id"];
    $prog_front = htmlspecialchars($data["prog_front"]);
    $note_front = htmlspecialchars($data["note_front"]);

    $query = "UPDATE projek SET
                prog_front = '$prog_front',
                note_front = '$note_front'
                WHERE id = $id
                ";
               
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah_back($data){
    global $conn;
    $id = $data["id"];
    $prog_back = htmlspecialchars($data["prog_back"]);
    $note_back = htmlspecialchars($data["note_back"]);

    $query = "UPDATE projek SET
                prog_back = '$prog_back',
                note_back = '$note_back'
                WHERE id = $id
                ";
               
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function ubah_analis($data){
    global $conn;
    $id = $data["id"];
    $nama_projek = htmlspecialchars($data["nama_projek"]);
    $manajer = htmlspecialchars($data["manajer"]);
    $anggota1 = htmlspecialchars($data["anggota1"]);
    $anggota2 = htmlspecialchars($data["anggotaaa"]);
    $anggota3 = htmlspecialchars($data["anggotaaaaa"]);
    $np = htmlspecialchars($data["np"]);
    $hp = htmlspecialchars($data["hp"]);
    $start_date = htmlspecialchars($data["start_date"]);
    $end_date = htmlspecialchars($data["end_date"]);
    $jw = htmlspecialchars($data["jw"]);
    $proposallama = htmlspecialchars($data["proposallama"]);
    

    if( $_FILES['proposal']['error'] === 4){
        $proposal = $proposallama;
    } else{
        $proposal = upload_dokumen();
    }

    $query = "UPDATE projek SET
                nama_projek = '$nama_projek',
                proposal = '$proposal',
                manajer = '$manajer',
                anggota1 = '$anggota1',
                anggota2 = '$anggota2',
                anggota3 = '$anggota3',
                np = '$np',
                hp = '$hp',
                start_date = '$start_date',
                end_date = '$end_date',
                jw = '$jw'
                WHERE id = $id
                ";
               
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM projek
                WHERE
                nama_projek LIKE '%$keyword%'
                ";
    return query($query);
}

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $level = htmlspecialchars($data["level"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username telah terdaftar')
                </script>";
        return false;
    }

    if( $password !== $password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
                </script> ";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username','$password', '$level' )");

    return mysqli_affected_rows($conn);
}

function cari_anggota($keyword){
    $query = "SELECT * FROM anggota
                WHERE
                nama LIKE '%$keyword%',
                jk LIKE '%$keyword%',
                jabatan LIKE '%$keyword%'
                ";
    return query($query);
}

function tambah_anggota($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $jk = htmlspecialchars($data["jk"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    
    $foto = upload();
	if( !$foto ){
		return false;
	}

    $query = "INSERT INTO anggota VALUES ('', '$nama', '$jk', '$alamat', '$tgl_lahir', '$jabatan', '$foto')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah_anggota($data){
    global $conn;
    $id = $data["id"];
    $username = htmlspecialchars($data["username"]);
    $level = htmlspecialchars($data["level"]);

    $query = "UPDATE user SET username = '$username', level = '$level' WHERE id = $id";
                
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus_user($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function upload(){
	$namafile = $_FILES['foto']['name'];
	$ukuranfile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpname = $_FILES['foto']['tmp_name'];

	if( $error === 4 ){
		echo "<script>
			alert('Pilih foto terlebih Dahulu!');
				</script>";
			return false;
	}

	$ekstensigambarvalid = ['jpg','jpeg','png'];
	$ekstensigambar = explode('.', $namafile); //explode untuk memecah string menjadi array
	$ekstensigambar = strtolower(end($ekstensigambar));
	if( !in_array($ekstensigambar, $ekstensigambarvalid)){
		echo "<script>
		alert('Yang anda Upload bukan Foto');
		</script>";
		return false;
	}
    if( $ukuranfile > 1000000){
        echo "<script>
		alert('Ukuran Terlalu besar!');
		</script>";
		return false;
    }


	$namafilebaru = uniqid();
	$namafilebaru .='.';
	$namafilebaru .= $ekstensigambar;

	move_uploaded_file($tmpname, 'img/' . $namafilebaru);

	return $namafilebaru;
}

function upload_dokumen(){
    $namafiles = $_FILES['proposal']['name'];
    $ukuranfile = $_FILES['proposal']['size'];
    $errors = $_FILES['proposal']['error'];
    $tmpnames = $_FILES['proposal']['tmp_name'];

    if( $errors === 4 ){
        echo "<script>
            alert('Pilih dokumen terlebih Dahulu!');
                </script>";
            return false;
    }

    $ekstensidokumenvalid = ['pdf'];
    $ekstensidokumen = explode('.', $namafiles); //explode untuk memecah string menjadi array
    $ekstensidokumen = strtolower(end($ekstensidokumen));
    if( !in_array($ekstensidokumen, $ekstensidokumenvalid)){
        echo "<script>
        alert('Yang anda Upload bukan File pdf');
        </script>";
        return false;
    }
    if( $ukuranfile > 1000000){
        echo "<script>
        alert('Ukuran Terlalu besar!');
        </script>";
        return false;
    }

    $namafiledokumenbaru = uniqid();
    $namafiledokumenbaru .='.';
    $namafiledokumenbaru .= $ekstensidokumen;

    move_uploaded_file($tmpnames, 'pdf/' . $namafiledokumenbaru);

    return $namafiledokumenbaru;
}
?>