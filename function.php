<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "soal2");

    function query($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row; 
        } 
        return $rows;
    }

    function cari($keyword){
        $query = "SELECT * FROM data_mhs where nama like '%$keyword%' ";
        return query($query); 
    }
    function tambah($data) {
        global $koneksi;
 
        $file_name = $_FILES["gambar"]["name"];
        $file_tmp = $_FILES["gambar"]["tmp_name"];
        $file_type = $_FILES["gambar"]["type"];
        $file_size = $_FILES["gambar"]["size"];
        $file_error = $_FILES["gambar"]["error"];
    
        // var_dump($_FILES["gambar"]);

        $target_dir = "img/";
        $target_file = $target_dir . basename($file_name);
        move_uploaded_file($file_tmp, $target_file);
    
        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $email = htmlspecialchars($data["email"]);
        $notlp = htmlspecialchars($data["notlp"]); 

        $query = "insert into data_mhs values ('' , '$file_name', '$nim', '$nama', '$notlp', '$email')";
        
        mysqli_query($koneksi, $query);
        header("Location: index.php");

        return mysqli_affected_rows($koneksi);
        
    }
    function ubah($data) {
        global $koneksi;

        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $email = htmlspecialchars($data["email"]);
        $notlp = htmlspecialchars($data["notlp"]);
        $gambar = htmlspecialchars($data["gambar"]);

        $query = "update data_mhs set 
            nama = '$nama',
            nim = '$nim',
            email = '$email',
            notlp = '$notlp',
            gambar = '$gambar'
             where id = $id
        ";
        
        mysqli_query($koneksi, $query);
        header("Location: index.php");

        return mysqli_affected_rows($koneksi);
    }
    // $mhs = mysqli_fetch_array($result);
    // var_dump($mhs);
    
    // while ($mhs = mysqli_fetch_assoc($result)) {
    //     var_dump($mhs);
    // }
?>