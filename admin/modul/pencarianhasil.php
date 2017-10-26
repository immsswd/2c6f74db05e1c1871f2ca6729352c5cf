
<?php include "modul/cari_buku.php";?>

<?php
        if(isset($_POST['cari'])){
           $search = $_POST['search'];
        }
if(empty($_POST['search'])){
    echo "";
    $search = null;
}
$search = trim($search);
$search = preg_replace('/\s+/', ' ', $search);
 
//seperate multiple keywords into array space delimited
$keywords = explode(" ", $search);
//Clean empty arrays so they don't get every row as result
$keywords = array_diff($keywords, array(""));
//Set the MySQL query
if ($search == NULL or $search == '%'){
} else {
for ($i=0; $i<count($keywords); $i++) {
$query = "SELECT * FROM buku WHERE descr LIKE '%".$keywords[$i]."%' OR judul LIKE '%".$keywords[$i]."%' OR pengarang LIKE '%".$keywords[$i]."%' ".
" ORDER BY judul ASC";
}
//Store the results in a variable or die if query fails
$result = mysqli_query($link, $query) or die();
}
if ($search == NULL or $search == '%'){
} else {
//Count the rows retrived
$count = mysqli_num_rows($result);
}
//If search variable is null do nothing, else print it.
if ($search == NULL) {
} else {
echo "<h3>Pencarian: <b><FONT COLOR=\"blue\">";
foreach($keywords as $value) {
   print "<u>".$value ."</u>";
}
echo "</font></b></h3>";
}
echo "<p> </p><br />";
echo "</center>";
//If users doesn't enter anything into search box tell them to.
if ($search == NULL){
echo "<center><b><FONT COLOR=\"red\">Please enter a search parameter to continue.</font><br><br></center>";
} elseif ($search == '%'){
echo "<center><b><FONT COLOR=\"red\">Please enter a search parameter to continue.</font><br><br></center>";
//If no results are returned print it
} elseif ($count <= 0){
echo "<center class='text-danger'>Pencarian yang anda maksud tidak terekam di database.<br><br><hr></center>";
//ELSE print the data in a table
} else {
//Table header
echo "<center><table id=\"search\" bgcolor=\"#AAAAAA\">";
echo "<tr>";
echo "<td><h3><strong></strong></h1><hr></t3>";
echo "<tr>";
echo "</table></center>";
//While there are rows, print it.
    echo "<h4 class='fa fa-search'></h4> <strong>Hasil Pencarian</strong>";
while($row = mysqli_fetch_array($result))
{
//table background color = row_color variable
?>
<div class="col-md-12">
   
<div class="panel panel-default">
    
<div class="panel-heading"><h4> Judul: <a href='#' class="text-info"> <?=$row['judul']?></a></h4></div>
<div class="panel-body">
<div class="">
<div class="result">
    <tbody>
    <div id="zoomTarget">
    <img data-targetsize="0.45" data-duration="600" class="img-responsive zoomTarget" src="<?=$row['fotobuku'] ?>" alt="<?=$row['judul'] ?>" width="80" height="100">
    <em class="text-danger">Kilk gambar (zoom)</em>
    </div><br>
    <p><strong><em>Deskripsi buku:</em></strong><br><?=nl2br($row['descr'])?></p>
    <p><strong><em>Kode buku:</em></strong> <?php echo $row['kode'] ?><br>
        <strong><em>Rak buku:</em></strong> <?=$row['rakbuku']?><br>
        <strong><em>Pengarang:</em></strong> <?php echo $row['pengarang'] ?><br>
        <strong><h4 class="text-danger">Stok buku: <?= $row['stokbuku']?></h4></strong>
        <strong><h4 class="text-success">Stok yang tersedia: <?= $row['jml_stok_sekarang']?></h4></strong>
    </p>
    </tbody>
</div><hr>  
</div>
</div>

</div>
</div>

<?php
$row++;
//end while
}
//end if
}
// echo "</body>";
// echo "</html>";
if ($search == NULL or $search == '%') {
} else {
//clear memory
mysqli_free_result($result);
}
?>

