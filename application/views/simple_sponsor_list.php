<?php 
$this->load->view('PI_crmHeader');
$this->load->view('PI_crmNav');
?>
<div id="content">
<?php 

if($rows !=null)
foreach($rows as $row)
 {echo "<br>";echo $row->nom;
 echo "<br>";echo $row->prenom;
 echo "<br>*************************";
/*  echo "<br>";echo "<a href=". site_url('sponsor/delete/'.$row->id).">delete</a>";echo "------<a href=". site_url('sponsor/update/'.$row->id).">Update</a>";  */
 } 
 ?>

</div>



<?php
$this->load->view('PI_crmFooter');

?>