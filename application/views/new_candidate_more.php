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
?>
<input type="radio" name="accepte" value="1" <?php echo set_radio('accept', '1', TRUE); ?> />
<input type="radio" name="refuse" value="2" <?php echo set_radio('refuse', '2'); ?> />


<?php
echo form_close(); } 
 
?>
</div>



<?php
$this->load->view('PI_crmFooter');

?>