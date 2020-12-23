<?php
    $c = new mysqli('db' , 'pmauser' , 'helloworld' , 'responsi3');
    
    function fecthing_post_data($c , $data) {
        $e = true;
        if(empty($_POST['nim']) || empty($_POST['nama']) || empty($_POST['kelas']) || empty($_POST['prodi']) || empty($_POST['jenjang'])) { $e = false; }
        return $e ? [
            "id" => $c->escape_string($_POST['id']),
            "nim" => $c->escape_string($_POST['nim']),
            "nama" => $c->escape_string($_POST['nama']),
            "kelas" => $c->escape_string($_POST['kelas']),
            "prodi" => $c->escape_string($_POST['prodi']),
            "jenjang" => $c->escape_string($_POST['jenjang']),
        ] : $e ;
    }

    if(!empty($_POST)){
        $action = $c->escape_string($_POST['action']);
        switch($action):
            case "create":
                $d = fecthing_post_data($c , $_POST);
                if(!$d){ 
                    print_r(json_encode(["status" => false , "message" => "Ada Bagian Yang Kosong !"]));
                    exit;
                }
                if(!empty($d['id'])){
                    $q = "UPDATE mahasiswa SET nim='". $d['nim'] ."', nama='".$d['nama']."',kelas='". $d['kelas'] ."', prodi='". $d['prodi'] ."', jenjang='". $d['jenjang'] ."' WHERE id='" . $d['id'] . "'";
                }else{
                    $q = "INSERT INTO mahasiswa (nim,nama,kelas,prodi,jenjang) VALUES('".$d['nim']."','".$d['nama']."','".$d['kelas']."','".$d['prodi']."','". $d['jenjang'] ."')";
                }
                $status = $c->query($q);
                print_r(json_encode(["status" => $status ? true : false , "message" => $status ? "Berhasil Menyimpan Data !" : "Ada kesalahan saat menyimpan data"]));
                break;
            case "delete":
                $id = $c->escape_string($_POST['id']);
                $status = $c->query("DELETE FROM mahasiswa WHERE id=" . $id . "");
                print(json_encode(["status" => $status ? true : false , "message" => $status ? "Berhasil Menghapus Data !" : "Ada kesalahan saat menghapus data"]));
                break;
            default:
                print_r(json_encode(["status" => false , "message" => "Invalid Action !"]));
                break;
        endswitch;
    }else{
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1>";
        echo "The page that you have requested could not be found.";
        exit();
    }
?>