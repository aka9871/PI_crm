<?php 
$this->load->view('PI_crmHeader');
$this->load->view('PI_crmNav');
?>
<div id="content">
<?php 
echo anchor('admin/list_new_candidate/',"new-candidates list");
?>



</div>



<?php
$this->load->view('PI_crmFooter');

?>