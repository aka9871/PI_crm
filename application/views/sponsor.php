<?php 
$this->load->view('PI_crmHeader');
$this->load->view('PI_crmNav');
?>
<div id="content">
<?php 
echo anchor('Sponsor/list_sponsor/',"sponsor list");
?>



</div>



<?php
$this->load->view('PI_crmFooter');

?>