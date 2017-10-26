<?php
include_once("fctn/tglid.php");

// $jmlh = $stmt->rowCount(PDO::FETCH_NUM);
$timestamp = date('Y-m-d G:i:s');
$stmt = $dbase->query("UPDATE pesan SET baca = 'y', timestampp = NOW() WHERE desusername = '$_SESSION[member]'");

//get pesan
$stm = $dbase->query("SELECT * FROM pesan WHERE desusername = '$_SESSION[member]' ORDER BY idpesan DESC");
?>
    <div class="col-md-12">
        <h2>Pesan dari Perpustakaan:</h2>
        <hr>
        <?php while($r = $stm->fetch(PDO::FETCH_OBJ)): ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                &mdash;
                <?=$r->judul?>
            </div>
            <div class="panel-body">
                <ul class="messages">
                    <li>
                        <img src="public/images/user.png" class="avatar" alt="Avatar">
                        <div class="message_date">
                            <h3 class="date text-info">
                                <?=date('j', (strtotime($r->tgl)))?>
                            </h3>
                            <p class="month">
                                <?=date('F/y', (strtotime($r->tgl)))?>
                            </p>
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading text-primary">
                                Admin <?=$r->susername?>
                            </h4>
                            <blockquote class="message">
                                <?=$r->pesan?>
                            </blockquote>
                            <br />
                            <p class="url">
                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                <a href="#"><i class="fa fa-envelope-o"></i> <em>
				regards:<br>
				<?=$r->susername?>, Pustaka Soeman HS.
				</em> </a>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <?php endwhile ?>
    </div>
