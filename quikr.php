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
                if(!is_null($city)){
                    if($ad->cityName == $city){
                        if(!is_null($locality)){
                            if($ad->ad_locality == $locality and $ad->cityName == $city)
                            filterCategory($category, $ad, $validArr);
                        }
                        else filterCategory($category, $ad, $validArr);
                    }
                }
                else filterCategory($category, $ad, $validArr);
           }

        }
        $lawyer_list = array();
        // print_r($validArr);
        foreach($validArr as $row){
            $imgU = null;
            if(is_array($row->images) and sizeof($row->images) >= 1)
                $imgU = $row->images[0];
            else if(!is_array($row->images) and $row->images != "" and $row->images != null)
                $imgU = $row->images;
            $lawyer = new Lawyer(-1,$row->title,"-1", "-1",
                       $row->id,"-1",          
                       $row->specialization,
                       "-1",
                       $row->detail,                           
                       $row->verified_mobile,
                       -1,
                       $imgU,
                       $row->cityName,
                       $row->ad_locality
                        );
            array_push($lawyer_list, $lawyer);
        }
        return $lawyer_list;
    }

    function getSpecialization($data){
        $categories = array("Divorce","Property","Family","Criminal",
        "Matrimonial","HighCourt","Civil","Consumer","Labour", 
        "Cooperative","Leave","Notary","Corporate","Will","Trademark","Rent");
        $str = "";
        foreach($categories as $key=>$category){
            if(strpos(strtolower($data), strtolower($category)) !== false){
                $str .= $key.",";
            }
        }
        // echo "Dd";
        if(substr($str, -1) == ",")
            $str = substr($str, 0, -1);
        return $str;
    }

    function filterCategory($category, $ad, &$array){
        $ad->specialization = getSpecialization($ad->content);
        if(is_null($category)){
            array_push($array, $ad);
        }
        else {
            $total = strtolower($ad->title.$ad->content);
            if(strpos($total, strtolower($category)) !== false){
                array_push($array, $ad);
            }
        }
    }

    function getQuikrCustomers($city){
        $json = getQuikrAds($city);
    }

    function replyToAd($adId, $replyEmailId, $replyMobile, $replyContent){
        // $userAgent =  $replierIp

    }
    // $json = createAdRequestJson("Mumbai", "IIT Powai", "9345545434", "somethineflakdakgfsd galdkgjdfgldkga g", "des dafjdsjkfjkasfhkdfjkadkfjkajdsfsa co", "imagessss");
    // $json = getLawyersQ("Divorce", null, null);//"Bandra West");
    // print_r($json);
    //getSpecialization("divorce damp hello Corporate");
    // getLawyersQ("Mumbai",)
?>