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
 echo "<br>";echo "<a href=". site_url('sponsor/delete/'.$row->id).">delete</a>";echo "------<a href=". site_url('sponsor/update/'.$row->id).">Update</a>"; 
 } 
 echo form_open('sponsor/list_sponsor/'.$row->id);?>

<input type="text"  name="nom" value="<?php echo $row->nom;?>" /><?php echo form_error('titre'); ?> 
<input type="text"  name="prenom" value="<?php echo $row->prenom;?>" /> <?php echo form_error('prenom'); ?>
<input type="text"  name="email" value="<?php echo $row->email;?>" /> <?php echo form_error('email'); ?>
<input type="text"  name="entreprise" value="<?php echo $row->entreprise;?>" /> <?php echo form_error('entreprise'); ?>
<input type="submit" value="Create" />


</div>



<?php
$this->load->view('PI_crmFooter');

?>