<?php 
$this->load->view('PI_crmHeader');
$this->load->view('PI_crmNav');
?>
<div id="content">
<?php 

if($row !=null)

{echo "<br>";echo $row->id;
echo "<br>";echo $row->first_name;
echo "<br>";echo $row->last_name;
echo "<br>";echo $row->birth;
echo "<br>";echo $row->email;
echo "<br>";echo $row->phone;
echo "<br>";echo $row->schools;

echo form_open('admin/update_new_candidate');
$id=$row->id;
$email=$row->email;
?>

<label for="satut">Accepter</label>
<input type="radio" name="statut" value="2" <?php echo set_radio('accept', '2', TRUE); ?> />
<label for="satut">Refuser</label>
<input type="radio" name="statut" value="3" <?php echo set_radio('refuse', '3'); ?> />
<input type="hidden" name="id" value="<?php echo $id ?>" />
<input type="hidden" name="email" value="<?php echo $email ?>" />
       

<input type="submit", value="Update" />

<?php
echo form_close(); } 
 
?>
</div>



<?php
$this->load->view('PI_crmFooter');

?>