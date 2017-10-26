<?php
function enumDropdown($table_name, $column_name, $echo = false)
{
   $selectDropdown = "<select name=\"$column_name\">";
   $result = mysql_query("SELECT jabatan FROM INFORMATION_SCHEMA.COLUMNS
       WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'")
   or die (mysql_error());

    $row = mysql_fetch_array($result);
    $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

    foreach($enumList as $value)
         $selectDropdown .= "<option value=\"$value\">$value</option>";

    $selectDropdown .= "</select>";

    if ($echo)
        echo $selectDropdown;

    return $selectDropdown;
}
?>


<a href="pages/nonaktif.php?id=<?php echo $row['id']?>" onclick="return confirm('Nonaktifkan <?= $row['firstname'] ?> ?')" class="btn btn-sm btn-danger"><i class="fa fa-power-off"></i> Nonaktifkan</a>