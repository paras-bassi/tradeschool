<?php
include '../config/connection.php';
$TABLE_NAME = "USER_DATA";
$sql = "SELECT * FROM $TABLE_NAME";
$res=$con->query($sql) or die($con->error);
$i=0;
$check = array("F"=>"","T"=>"checked");
while($th=$res->fetch_assoc()){
	$data['data'][$i][0] = $i+1;
	$data['data'][$i][1] = $th['UD_NAME'];
	$data['data'][$i][2] = $th['UD_EMAIL'];
    $data['data'][$i][3] = $th['UD_PHONE'];
    
    $permission = $th['UD_PERMISSION'];
    for($j=0;$j<strlen($permission);$j++){
        $data['data'][$i][$j+4] = "<input type='checkbox' name='".$th['UD_ID']."p".$j."' id='".$th['UD_ID']."p".$j."' ".$check[$permission[$j]]." onchange='updatePermission(this.id)' />"; 
    }
    
    $data['data'][$i][7] = '<i class="fa fa-trash" name="'.$i.'p" id="name="'.$i.'p" onclick="deleteUser(this.id)" style="color: red; margin-top: 6px; font-size: 25px;" aria-hidden="true"></i>';
    
    $i++;
}
echo json_encode($data);