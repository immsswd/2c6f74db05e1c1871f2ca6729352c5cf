<div class="col-md-3"></div>
<div class="col-md-6">
    <?php
    if(isset($_POST['lihatt'])):
    $idadmin = htmlentities($_POST['iduseradmin']);
    $_SESSION['idadmin'] = $idadmin;
    endif;
            $a = $dbase->query("SELECT * FROM adminn WHERE idadmin_reg = '$_SESSION[idadmin]' ");
            
            $q = $dbase->query("SELECT * FROM admin_reg WHERE id = '$_SESSION[idadmin]'");
    while($row = $q->fetch(PDO::FETCH_OBJ)){
        $foto       = $row->profile_img;
        $nip        = $row->nip;
        $nama       = $row->firstname." ".$row->lastname;
        $username   = $row->username;        
        $jabatan    = $row->jabatan;
        $email      = $row->email;
        $cont       = $row->contact;
    }
?>
        <h2 class="text-center">Data User</h2>
        <hr>
        <center>
            <img src="<?=$foto?>" width="100" height="100" class="img img-responsive img-thumbnail"><br>
        </center>
        <a href="index.php?pages=ubahdataadmin" class="btn btn-warning pull-right"><i class="fa fa-edit"></i> Ubah data</a>
        <table class="table table-responsive table-hover">
            <tbody>
                <tr>
                    <th>NIP/NIK</th>
                    <td style="font-family: courier"><strong><?=$nip?></strong></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <?=$email?>
                    </td>
                </tr>
                <tr>
                    <th>Kontak/WA</th>
                    <td>
                        <?=$cont?>
                    </td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>
                        <?=$nama?>
                    </td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>
                        <?=$username?>
                    </td>
                </tr>
                <tr>
                    <th>Akses Sistem sebagai?</th>
                    <td>
                        <?=$jabatan?>
                    </td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>
                        <?php
                            while ($ro = $a->fetch(PDO::FETCH_OBJ)):
                                $alamat = $ro->alamat;
                            endwhile;
                            if(!empty($alamat)){
                                echo $alamat;
                            }else{
                                echo null;
                            }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
</div>
<div class="col-md-3"></div>
