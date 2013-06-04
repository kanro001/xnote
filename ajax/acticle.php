<?php
	require_once ('finder_fns.php');

	$action = $_GET['action'];
	if ($action == 'body') {	
		try{
			$article_items = getActicleData();
			
			$arr['success'] = 1;
			$arr['msg'] = 'Success';
			$item_count = 0;
			foreach ($article_items as $article_item){
				$arr["data".$item_count."room_name"] = $article_item[0];
				$arr["data".$item_count."area"] = $article_item[1];
				$arr["data".$item_count."city"] = $article_item[2];
				$arr["data".$item_count."date"] = $article_item[3];
				$arr["data".$item_count."addr"] = $article_item[4];
				$arr["data".$item_count."phone"] = $article_item[5];
				$arr["data".$item_count."gender"] = $article_item[6];
				$arr["data".$item_count."img"] = $article_item[7];
				$item_count++;
			}		
		}
		catch(Exception $e){
			$arr['success'] = 0;
			$arr['msg'] = 'error';
		}
		echo json_encode($arr);
	}elseif ($action == 'area'){
		$area = stripslashes(trim($_POST['area']));
		try{
			$article_items = getActicleDataByArea($area);
				
			$arr['success'] = 1;
			$arr['msg'] = 'Success';
			$items_num = sizeof($article_items);
			$arr['count'] = $article_items[$items_num-1][0];
			$item_count = 0;
			
			foreach ($article_items as $article_item){

				$arr["data".$item_count."room_name"] = $article_item[0];
				$arr["data".$item_count."area"] = $article_item[1];
				$arr["data".$item_count."city"] = $article_item[2];
				$arr["data".$item_count."date"] = $article_item[3];
				$arr["data".$item_count."addr"] = $article_item[4];
				$arr["data".$item_count."phone"] = $article_item[5];
				$arr["data".$item_count."gender"] = $article_item[6];
				$arr["data".$item_count."img"] = $article_item[7];
				$item_count++;
				if($item_count == $arr['count'])
					break;
			}
		}
		catch(Exception $e){
			$arr['success'] = 0;
			$arr['msg'] = 'error';
		}
		echo json_encode($arr);
		
	}elseif ($action == 'gender'){
		$gender = stripslashes(trim($_POST['gender']));
		try{
			$article_items = getActicleDataByGender($gender);
		
			$arr['success'] = 1;
			$arr['msg'] = 'Success';
			$items_num = sizeof($article_items);
			$arr['count'] = $article_items[$items_num-1][0];
			$item_count = 0;
				
			foreach ($article_items as $article_item){
		
				$arr["data".$item_count."room_name"] = $article_item[0];
				$arr["data".$item_count."area"] = $article_item[1];
				$arr["data".$item_count."city"] = $article_item[2];
				$arr["data".$item_count."date"] = $article_item[3];
				$arr["data".$item_count."addr"] = $article_item[4];
				$arr["data".$item_count."phone"] = $article_item[5];
				$arr["data".$item_count."gender"] = $article_item[6];
				$arr["data".$item_count."img"] = $article_item[7];
				$item_count++;
				if($item_count == $arr['count'])
					break;
			}
		}
		catch(Exception $e){
			$arr['success'] = 0;
			$arr['msg'] = 'error';
		}
		echo json_encode($arr);
	}elseif ($action == 'name'){
		$name = stripslashes(trim($_POST['name']));
		try{
			$article_items = getActicleDataByName($name);
		
			$arr['success'] = 1;
			$arr['msg'] = 'Success';
			$items_num = sizeof($article_items);
			$arr['count'] = $article_items[$items_num-1][0];
			$item_count = 0;
				
			foreach ($article_items as $article_item){
		
				$arr["data".$item_count."room_name"] = $article_item[0];
				$arr["data".$item_count."area"] = $article_item[1];
				$arr["data".$item_count."city"] = $article_item[2];
				$arr["data".$item_count."date"] = $article_item[3];
				$arr["data".$item_count."addr"] = $article_item[4];
				$arr["data".$item_count."phone"] = $article_item[5];
				$arr["data".$item_count."gender"] = $article_item[6];
				$arr["data".$item_count."img"] = $article_item[7];
				$item_count++;
				if($item_count == $arr['count'])
					break;
			}
		}
		catch(Exception $e){
			$arr['success'] = 0;
			$arr['msg'] = 'error';
		}
		echo json_encode($arr);
	}

?>