<div class="col-md-12">
    <?php
    
        $q = $dbase->query("SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser ORDER BY nama ASC");
        $q2 = $dbase->query("SELECT * FROM admin_reg ORDER BY firstname ASC");
        
        $res2 = $q2->fetchAll(PDO::FETCH_BOTH);
    
//        var_dump($res);
        $numb = 1;
    ?>
    <!-- ===============================Anggota List All============================ -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center"><i class="fa fa-list"></i> Semua Anggota</h2>
        </div>
        <div class="panel-body">
            <table class="table table-hover table-responsive table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Command</th>
                </tr>
            </thead>
            <tbody>
                <?php while($r = $q->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td>
                        <?php echo $numb ?>
                    </td>
                    <td>
                        <img src="<?=$r['foto']?>" width="100" height="100" class="img img-responsive img-thumbnail">
                    </td>
                    <td>
                        <?php echo $r['nama'] ?>
                    </td>
                    <td>
                        <?php echo $r['username'] ?>
                    </td>
                    <td>
                        <?php echo $r['email'] ?>
                    </td>
                    <td>
                        <span>
                       <form method="post" action="index.php?modul=edituser">
                           <input type="hidden" name="iduser" value="<?=$r['iduser']?>">
                           <button name="lihat" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> View & Edit</button>
                       </form>
    
                        <a type="button" href="pages/delete.php?id=<?php echo $r['id'] ?>"  onclick="return confirm('anda yakin ingin menghapus user?')" class="btn btn-danger btn-sm sweet-10"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                        </span>
                    </td>
                </tr>
                <?php $numb++; endwhile ?>
            </tbody>
        </table>
        </div>
    </div>
    <!-- ===============================/Anggota List All============================ -->

    <!-- ===============================Admin List All============================ -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center"><i class="fa fa-list"></i> Semua Admin/Staff</h2>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Privillege</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Command</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($res2 as $r2): ?>
                <tr>
                    <td>
                        <?php echo $no ?>
                    </td>
                    <td>
                        <img src="<?=$r2['profile_img']?>" width="100" height="100" class="img img-responsive img-thumbnail">
                    </td>
                    <td>
                        <?php echo $r2['firstname'] ." ". $r2['lastname'] ?>
                    </td>
                    <td>
                        <?php echo $r2['jabatan'] ?>
                    </td>
                    <td>
                        <?php echo $r2['username'] ?>
                    </td>
                    <td>
                        <?php echo $r2['email'] ?>
                    </td>
                    <td>
                        <span>
                        <form method="post" action="index.php?modul=adminprofile">
                           <input type="hidden" name="idusera" value="<?=$r2['id']?>">
                           <button name="lihatt" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> View & Edit</button>
                       </form>

                        <a href="pages/deladmin.php?id=<?=$r2['id']?>" onclick="return confirm('anda yakin ingin menghapus?')" type="button" id="confirm" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                        </span>
                    </td>
                </tr>
                <?php $no++; endforeach ?>
            </tbody>
        </table>
        </div>
    </div>
     <!-- ===============================/Admin List All============================ -->
</div>
<div class="col-md-12">
</div>
