<?php
include 'dbconnect.php';
include 'classes.php';

function getLawyers($subcategory_id, $city, $locality, $price_range){
	$sql = "SELECT * from lawyers INNER JOIN users on lawyers.id = users.id ";
	if(is_null($price_range) or $price_range == "" ){
		if(is_null($subcategory_id) or $subcategory_id == ""){
			if (is_null($city) or $city == "" ){
				$sql = $sql. "order by ratings desc";
			} else {
				if (is_null($locality) or $locality == "" ){
					$sql = $sql. "  where city = '$city'			
					order by ratings desc";
				} else {
					$sql = $sql. "  where city = '$city' and locality = '$locality'				
					order by ratings desc";
				}
			}		
		} else {
			if (is_null($city) or $city == "" ){
				$sql = $sql. " where locate($subcategory_id, lawyers.specialization ) > 0				
					order by ratings desc";
			} else {
				if (is_null($locality) or $locality == "" ){
					$sql = $sql. "  where locate($subcategory_id, lawyers.specialization ) > 0 and city = '$city'				
					order by ratings desc";
				} else {
					$sql = $sql. "  where locate($subcategory_id, lawyers.specialization ) > 0 and city = '$city' and locality = '$locality'			
					order by ratings desc";
				}
			}
		}	
	} else {
		if(is_null($subcategory_id) or $subcategory_id == ""){
			if (is_null($city) or $city == "" ){
				$sql = $sql. " where price_range = $price_range				
					order by ratings desc";
			} else {
				if (is_null($locality) or $locality == "" ){
					$sql = $sql. "  where city = '$city' and price_range = $price_range				
					order by ratings desc";
				} else {
					$sql = $sql. "  where city = '$city' and locality = '$locality' and price_range = $price_range				
					order by ratings desc";
				}
			}		
		} else {
			if (is_null($city) or $city == "" ){
				$sql = $sql. " where locate($subcategory_id, lawyers.specialization ) > 0 and price_range = $price_range				
					order by ratings desc";
			} else {
				if (is_null($locality) or $locality == "" ){
					$sql = $sql. "  where locate($subcategory_id, lawyers.specialization ) > 0 and city = '$city' and price_range = $price_range				
					order by ratings desc";
				} else {
					$sql = $sql. "  where locate($subcategory_id, lawyers.specialization ) > 0 and city = '$city' and locality = '$locality' and price_range = $price_range				
					order by ratings desc";
				}
			}
	}	
	}	
	echo $sql;
	global $conn;
	$result = $conn->query($sql);	
	if ($result->num_rows > 0) {
		$lawyers_list = array();
		// output data of each row
	    while($row = $result->fetch_assoc()) {	      	
	      	$lawyer = new Lawyer($row["id"],$row["name"],$row["email"], $row["phone"],
	                           $row["quikr_id"],$row["address"],                           
	                           $row["specialization"],
	                           $row["experience"],
	                           $row["council_id"],                           
	                           $row["verified"],
	                           $row["ratings"],
	                           $row["photo_url"],
	                           $row["city"],
	                           $row["locality"]
      							);
      		array_push($lawyers_list, $lawyer);
	    }
	    return $lawyers_list;
	}	
}

//print_r(getLawyers(1,"Mumbai","Powai",1));

function getCasesOfCustomer($customer_id){
	$sql = "select * from cases where customer_id=" . $customer_id;
	//echo $sql;
	global $conn;
	$result = $conn->query($sql);	
	$case_list = array();
	if ($result->num_rows > 0) {		
		while($row = $result->fetch_assoc()) {
			$case = new LegalCase(
				$row['id'], 
				$row['title'], 
				$row['subcategory_id'], 
				$row['date_of_posting'],
				$row['status'],
				$row['customer_id'],
				$row['lawyer_id']);
			array_push($case_list,$case);
		}
	}
	//print_r($case_list);
	return $case_list;
}

function getMessagesForCase($case_id){
	$sql = "select * from messages where case_id=" . $case_id;
	//echo $sql;
	global $conn;
	$result = $conn->query($sql);	
	$messages_list = array();
	if ($result->num_rows > 0) {		
		while($row = $result->fetch_assoc()) {
			$message = new Message(
				$row['id'],
				$row['case_id'], 				
				$row['sender_id'], 
				$row['text'], 
				$row['time']);		
			array_push($messages_list,$message);
		}
	}
	//print_r($messages_list);
	return $messages_list;
}

function getLawyerNameFromId($user_id){
	$sql = "select * from lawyers where id=" . $user_id;
	//echo $sql;
	global $conn;
	$result = $conn->query($sql);	
	if ($result->num_rows > 0) {		
		if($row = $result->fetch_assoc()) {
			return $row['name'];
		}
	}
	return NULL;
}
?>