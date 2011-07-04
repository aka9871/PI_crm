<?php 
$this->load->view('PI_crmHeader');
$this->load->view('PI_crmNav');
?>
<div id="content">
<?php 
echo anchor('Sponsor/list_sponsor/',"sponsor list");
echo " ********** ";
echo anchor('Sponsor/register/',"Add sponsor");
?>



</div>



<?php
$this->load->view('PI_crmFooter');

?>