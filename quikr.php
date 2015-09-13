<?php
    $headerArray = array("X-Quikr-App-Id: 506", "X-Quikr-Token-Id: 3040599");
    $email = "testid@gmail.com";
    $subCategory = "Lawyers - Advocates";
    $postAdS = "8a733c0860f667ba80c8ff9521d3e34abdce5fc4";
    $adsByCategory = "3b79346f417605b67158a26574f86b290b87a932";
    $reply = "dc8e4d9d8631ed036b9521d78dfd355e4664f5b6";
    $categoryId = "239";
    function sendPostAdRequest($json){
        global $headerArray, $postAdSignature;                       
        $json_string = json_encode($json);
        $headerArrayThis = $headerArray;
        array_push($headerArrayThis, "Content-Length: ".strlen($json_string));  
        array_push($headerArrayThis, "X-Quikr-Signature: ".$postAdSignature);
        array_push($headerArrayThis, "Content-Type: application/json"); 
        //print_r($headerArrayThis);                                                                                                                                                                                   
        $ch = curl_init("https://api.quikr.com/public/postAds");                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                   
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArrayThis);
        $server_output = curl_exec ($ch);
        //echo $server_output;
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //echo $httpcode;
        curl_close ($ch);         
    }
    function createAdRequestJson($cityName, $locations, $userMobile, $title, $description, $images){
        global $subCategory, $email;
        $Ad_Type = "offer";
        $remoteAddr = "192.168.51.57";
        $json = new stdClass();
        $json->remoteAddr = $remoteAddr;
        $json->cityName = $cityName;
        $json->email = $email;
        $json->subCategory = $subCategory;
        $json->title = $title;
        $json->description = $description;
        $json->userMobile = $userMobile;
        $json->locations = $locations;
        $attributes = new stdClass(); 
        $attributes->Ad_Type = $Ad_Type;
        $json->attributes = $attributes;
        return $json;
    }

    function getQuikrAds($city){
        global $headerArray, $adsByCategory, $categoryId;
        $ch = curl_init("https://api.quikr.com/public/adsByCategory?categoryId=".$categoryId."&city=".$city); 
        $headerArrayThis = $headerArray;
        array_push($headerArrayThis, "X-Quikr-Signature: ".$adsByCategory);  
       // print_r($headerArrayThis);                                          
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArrayThis);  
        $server_output = curl_exec($ch);
        //echo $server_output;
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //echo $httpcode;
        curl_close ($ch); 
        return $server_output;
    }

    function getLawyersQ($category, $city, $locality){
        $json = getQuikrAds($city);
        $jsonD = json_decode($json);
        $data = $jsonD->AdsByCategoryResponse->AdsByCategoryData;
        $total = $data->total;
        $list = $data->docs;

        $validArr = array();
        for($i = 0; $i < sizeof($list); $i ++){
            $ad = $list[$i];
           if($ad->attribute_Ad_Type == "offer" and $ad->ad_quality_score > 8){
                array_push($validArr, $ad);
           }

        }
        print_r($validArr);
    }

    function getQuikrCustomers($city){
        $json = getQuikrAds($city);
    }

    function replyToAd($adId, $replyEmailId, $replyMobile, $replyContent){
        // $userAgent =  $replierIp

    }
    // $json = createAdRequestJson("Mumbai", "IIT Powai", "9345545434", "somethineflakdakgfsd galdkgjdfgldkga g", "des dafjdsjkfjkasfhkdfjkadkfjkajdsfsa co", "imagessss");
    // echo json_encode($json);
    // sendPostAdRequest($json);
    $json = getLawyersQ("Divorce", "Mumbai", "Bandra West");


    // foreach ($jsonIterator as $key => $val) {
    //     if(is_array($val)) {
    //         echo "$key:\n";
    //     } else {
    //         echo "$key => $val\n";
    //     }
    // }
?>