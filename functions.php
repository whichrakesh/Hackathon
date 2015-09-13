<?php
include 'dbconnect.php';
include 'classes.php';

function getLawyers($subcategory_id, $city, $locality, $price_range){
	$sql = "SELECT * from lawyers INNER JOIN users on lawyers.id = users.id ";
	if(is_null($price_range)){
		if(is_null($subcategory_id)){
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
		if(is_null($subcategory_id)){
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


function postCase($case){

}

function getCasesBySubCategory($subcategory_id){

} 
?>