<?php
   
 require_once '../config/DB.php';
 
 if (isset($_REQUEST['id'])) {
   
 $id = intval($_REQUEST['id']);
 $query = "SELECT * FROM anggota WHERE id=:id";
 $stmt = $->prepare( $query );
 $stmt->execute(array(':id'=>$id));
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 extract($row);
 
 ?>
   
 <div class="table-responsive">
  
 <table class="table table-striped table-bordered">
 <tr>
 <th>First Name</th>
 <td><?php echo $kodeanggota; ?></td>
 </tr>
 <tr>
 <th>Last Name</th>
 <td><?php echo $nama; ?></td>
 </tr>
 <tr>
 <th>Email ID</th>
 <td><?php echo $kontak; ?></td>
 </tr>
 <tr>
 <th>Position</th>
 <td><?php echo $status_keanggotaan; ?></td>
 </tr>
 <tr>
 <th>Office</th>
 <td><?php echo $alamat; ?></td>
 </tr>
 </table>
   
 </div>
   
 <?php    
}