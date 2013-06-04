<?php
	require_once ('finder_fns.php');

	$action = $_GET['action'];
	if ($action == 'area') {
		
		try{
			$area_items = getAreaSiderBarData();
			
			$arr['success'] = 1;
			$arr['msg'] = 'Success';
			$arr['hoboken'] = $area_items[0];
			$arr['koreanTown'] = $area_items[1];
			$arr['westvilliage'] = $area_items[2];
			$arr['eastvilliage'] = $area_items[3];
			$arr['timessquare'] = $area_items[4];
				
		}
		catch(Exception $e){
			$arr['success'] = 0;
			$arr['msg'] = 'error';
		}
		echo json_encode($arr);
	}
	else if($action == 'gender'){
		
		
		try{
			$area_items = getGenderSiderBarData();
			
			$arr['success'] = 1;
			$arr['msg'] = 'Success';
			$arr['both'] = $area_items[0];
			$arr['male'] = $area_items[1];
			$arr['female'] = $area_items[2];
			$arr['unisex'] = $area_items[3];
		
		}
		catch(Exception $e){
			$arr['success'] = 0;
			$arr['msg'] = 'error';
		}
		//echo "success";
		echo json_encode($arr);
	}
?>