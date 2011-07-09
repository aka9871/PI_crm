<?php 
$this->load->view('PI_crmHeader');
$this->load->view('PI_crmNav');
?>
<div id="content">

<?php foreach($results as $data):?>
			<?=$data->first_name?> - <?=$data->last_name?><br />
		<?php endforeach;?>
		<p>
			<?=$links?>
		</p>
<?php 
/*
echo "hello";
if($results !=null)
foreach($results as $data)
 {echo "<br>";echo $data->first_name;
 echo "<br>";echo $data->last_name;
 echo "<br>";echo "<a href=". site_url('admin/new_candidate_more/'.$data->id).">toutes les infos</a>"; 
  
 } 
*/

 
?>
</div>



<?php
$this->load->view('PI_crmFooter');

?>