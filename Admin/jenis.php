<?php

include'lib/connect.php';

$idmember = $_POST['idmember'];
$query= mysqli_query($db,"SELECT * FROM tblmember inner join tbljenis on tblmember.id_jenis=tbljenis.id_jenis where idmember='$idmember'");
$rowCount = $query->num_rows;
if($rowCount > 0){
	while($data=mysqli_fetch_array($query)){
		echo '<option value="'.$data['id_jenis'].'">'.$data['nmjenis'].'</option>';
	} 
}
else
{
	echo '<option value="0">Tidak Ada Jenis</option>';
}

?>