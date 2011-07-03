<?php 
$this->load->view('PI_crmHeader');
$this->load->view('PI_crmNav');
?>
<div id="content">

<?php 

echo form_open('sponsor/update/'.$row->id);?>

<input type="text"  name="nom" value="<?php echo $row->nom;?>" /><?php echo form_error('titre'); ?> 
<input type="text"  name="prenom" value="<?php echo $row->prenom;?>" /> <?php echo form_error('prenom'); ?>
<input type="text"  name="email" value="<?php echo $row->email;?>" /> <?php echo form_error('email'); ?>
<input type="submit" value="Update" />

</div>



<?php
$this->load->view('PI_crmFooter');

?>