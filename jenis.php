<?php

include'Admin/lib/connect.php';

$idpaket = $_POST['idpaket'];
$query= mysqli_query($db,"SELECT * FROM tbljenis where id_paket='$idpaket'");
 $rowCount = $query->num_rows;
  if($rowCount > 0){
while($data=mysqli_fetch_array($query)){
	echo '<option value="'.$data['id_jenis'].'">'.$data['nmjenis'].'</option>';
} 
}
else
{
	
        echo '<option value="0">Tidak ada jenis untuk ini</option>';
    }
?>