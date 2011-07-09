<?php 
$this->load->view('PI_crmHeader');
$this->load->view('PI_crmNav');
?>
<div id="content">
<?php 
if($results)
{foreach($results as $data)
 {echo "<br>";echo $data->first_name;
 echo "<br>";echo $data->last_name;
 echo "<br>";echo "<a href=". site_url('admin/new_candidate_more/'.$data->id).">toutes les infos</a>"; 
 
}
}
else 
{echo "sorry any new students";}?> 
<br>
  <?=$links?>


 

</div>



<?php
$this->load->view('PI_crmFooter');

?>