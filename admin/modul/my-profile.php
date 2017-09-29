<div class="col-md-12">
<?php
$s = $dbase->query("SELECT * FROM admin_reg WHERE username = '$_SESSION[staffadmin]'");
while ($fe = $s->fetch(PDO::FETCH_OBJ)) {
    $f = $fe->profile_img;
    $firstname = $fe->firstname;
    $lastname  = $fe->lastname;
    $jabatan = $fe->jabatan;
    $nip = $fe->nip;
    $contact   = $fe->contact;
}
?>
	<h2 class="text-center">Profile <span class="text-info"><u><?=$_SESSION['staffadmin']?></u></span></h2><hr>
<div id="card">
  <img src="<?=$f?>" alt="John" style="width:100%">
  <h1><?=$firstname." ".$lastname?></h1>
  <p class="title"><?=$jabatan?></p>
  <p>NIP/NIK: <?=$nip?></p>
  <a href="#"><i class="fa fa-twitter"></i></a> 
  <a href="#"><i class="fa fa-facebook"></i></a> 
  <p><button>Contact: <?=$contact?></button></p>
</div>
</div>