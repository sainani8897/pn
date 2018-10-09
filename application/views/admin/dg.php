<?php
// $usinfo->competetion_visibility_company_name,

$str = array();
$str[0]=",a,b,c,d,";
$str[1]=",e,2e,3e,4e,";
$str[2]="";
$str[3]=",f,2f,3f,4f,";
$str[4]=",1g,2g,3g,4g,";
$str[5]=",1,2,3,4,";
$str[6]=",1,2,3,4,";
//for()
$j=array();
$r=0;
foreach ($str as $key ) {
	$f = explode(",",$key);
	//print_r($f);
	$k='';

	for ($i=0; $i <count($f); $i++) { 
		if($f[$i]==''){
			continue;
		}
		
		 $k .= ','.$f[$i];
	
	}
	echo $j[$r]=$k;
$r++;
}
//print_r($j);


 ?>