<?php
    $nama_lengkap = $_POST["namalengkap"];
    $jenis_kelamin = $_POST["jeniskelamin"];
    $tanggal_lahir = $_POST["tanggallahir"];
    $tempat_lahir = $_POST["tempatlahir"];
    $alamat = $_POST["alamat"];
    $pend_terakhir = $_POST["jenjangpendidikanterakhir"];
    $keahlian = $_POST["keahlian"];
    $gaji = $_POST["gaji"];


    //check apakah data ada yang kosong
    if(!empty($nama_lengkap) || !empty($jenis_kelamin) || !empty($tanggal_lahir) || !empty($tempat_lahir) || !empty($alamat) || 
        !empty($pend_terakir) || !empty($keahlian) || !empty($gaji)){
            //langkah awal pembuatan koneksi ke dalam database
            $nama_server = "localhost";
            $username = "root";
            $password = "";
            //masukkan nama sesuai database pada phpmyadmin anda
            $nama_db = "data_lamaran_kerja"; 

            //koneksi
            $koneksi = new mysqli($nama_server, $username, $password, $nama_db);

            //check koneksi, jika gagal hentikan fungsi lalu beri pesan eror
            if($koneksi->connect_error){ die("Koneksi tidak berhasil : ".$koneksi->connect_error); }

            //jika koneksi berhasil, maka masukkan data kedatabase
            $sql = "INSERT INTO tabel_data_registrasi_pekerja(nama_lengkap, jenis_kelamin, tanggal_lahir, tempat_lahir, alamat, pend_terakhir, keahlian, gaji)
                    VALUES('$nama_lengkap', '$jenis_kelamin', '$tanggal_lahir', '$tempat_lahir', '$alamat','$pend_terakhir', '$keahlian', '$gaji')";
            
            //jika input berhasil
            if ($koneksi->query($sql) === TRUE){
                echo 'Data berhasil dimasukkan...';
            }
            //jika ada kesalahan
            else{
                echo "Error ".$sql."<br>".$koneksi->error;
            }

            //tutup koneksi
            $koneksi->close();
        }
    //jika ada data yang kosong, proses insert di deny
    else{
        echo "Isilah semua field yang tersedia!";
        die();
    }
?>