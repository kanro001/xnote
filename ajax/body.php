<?php
	require_once ('finder_fns.php');

	$action = $_GET['action'];
	if ($action == 'filter') {	
		$uid = stripslashes(trim($_POST['uid']));
		try{
			$arr['msg'] = 'Success';
			$article_items = getFilters($uid);
			
			$arr['success'] = 1;
			$arr['msg'] = 'Success';
			$items_num = sizeof($article_items);
			$arr['count'] = $article_items[$items_num-1][0];
			$item_count = 0;
			foreach ($article_items as $article_item){
				$arr["data".$item_count."state"] = $article_item[0];
				$arr["data".$item_count."tag"] = $article_item[1];
				$arr["data".$item_count."dow"] = $article_item[2];
				$arr["data".$item_count."starttime"] = $article_item[3];
				$arr["data".$item_count."endtime"] = $article_item[4];
				$arr["data".$item_count."choice"] = $article_item[5];
				$arr["data".$item_count."loc"] = $article_item[6];
				$arr["data".$item_count."rad"] = $article_item[7];
				$arr["data".$item_count."long"] = $article_item[8];
				$arr["data".$item_count."lat"] = $article_item[9];
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
	}elseif ($action == 'note'){
		$arr['success'] = 1;
		$uid = stripslashes(trim($_POST['uid']));
		try{
			$article_items = getNotes($uid);
				
			$arr['msg'] = 'Success';
			$items_num = sizeof($article_items);
			$arr['count'] = $article_items[$items_num-1][0];
			$item_count = 0;
			
			foreach ($article_items as $article_item){

				$arr["data".$item_count."txt"] = $article_item[0];
				$arr["data".$item_count."posttime"] = $article_item[1];
				$arr["data".$item_count."privacy"] = $article_item[2];
				$arr["data".$item_count."delete_flag"] = $article_item[3];
				$arr["data".$item_count."dow"] = $article_item[4];
				$arr["data".$item_count."start_time"] = $article_item[5];
				$arr["data".$item_count."end_time"] = $article_item[6];
				$arr["data".$item_count."start_daytime"] = $article_item[7];
				$arr["data".$item_count."end_daytime"] = $article_item[8];
				$arr["data".$item_count."choice"] = $article_item[9];
				$arr["data".$item_count."lat"] = $article_item[10];
				$arr["data".$item_count."long"] = $article_item[11];
				$arr["data".$item_count."radius"] = $article_item[12];
				$arr["data".$item_count."tag"] = $article_item[13];
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