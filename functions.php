<?php
include 'dbconnect.php';
include 'classes.php';

function getLawyers($subcategory_id, $city, $locality, $price_range){
	if($subcategory_id == -1){
		if($city = ""){
			$sql = "SELECT * from lawyers INNER JOIN users on lawyers.id = users.id  
				where price_range = $price_range				
				order by ratings desc";
		} else {
			$sql = "SELECT * from lawyers INNER JOIN users on lawyers.id = users.id  
			where city = '$city' and locality = '$locality' and  price_range = $price_range				
			order by ratings desc";
		}		
	} else {
		$sql = "SELECT * from lawyers INNER JOIN users on lawyers.id = users.id  
				where locate($subcategory_id, lawyers.specialization ) > 0 and price_range = $price_range	
				order by ratings desc";
	}	
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


// print_r(getLawyers(1,"Mumbai","Powai",1));

function postCase($case){

}

function getCasesBySubCategory($subcategory_id){

} 
?>