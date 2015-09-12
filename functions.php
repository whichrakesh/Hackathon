<?php
include 'dbconnect.php';
function getLawyersBySubCategory($subcategory_id){
	$sql = "SELECT * from lawyers where subcategory_id = $subcategory_id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
	    while($row = $result->fetch_assoc()) {
	      	      
	    }
}

function postCase($case){

}

function getCasesBySubCategory($subcategory_id){

} 
?>