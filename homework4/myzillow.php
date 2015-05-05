<?php

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:GET,POST');



            
                $address = $_POST["address"];
                $city = $_POST["city"];
                $state = $_POST["state"];
                $zpid = "X1-ZWz1b29qod7uvf_4vl2o";
                $url ="http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=$zpid&address=$address&citystatezip=$city, $state&rentzestimate=true";
                $xmlDoc=simplexml_load_file($url);
                $error=$xmlDoc->message[0]->code;
                $newarray=[];
                $newarray+=["Error"=>(string)$error];
	            if($error!="0"){
		           $mess="No exact match found--Verify that the given address is correct.";
                   $newarray+=['Warning message'=>(string)$mess];
	            }
                else{                    

                $zpid1 = $xmlDoc->response->results->result->zpid;
                $link = $xmlDoc->response->results->result->links[0]->homedetails;
                $addr = $xmlDoc->response->results->result->address[0];
                $wholeaddress = "$addr->street, $addr->city, $addr->state-$addr->zipcode";
                $zestimate = $xmlDoc->response->results->result->zestimate[0];
                $rent = $xmlDoc->response->results->result->rentzestimate[0];
              
            
                $type=$xmlDoc->response->results->result->useCode;
                $yearbuilt=$xmlDoc->response->results->result->yearBuilt;
                $lotsize=$xmlDoc->response->results->result->lotSizeSqFt;
                $area=$xmlDoc->response->results->result->finishedSqFt;
                $bathroom=$xmlDoc->response->results->result->bathrooms;
                $bedroom=$xmlDoc->response->results->result->bedrooms;
                $taxyear=$xmlDoc->response->results->result->taxAssessmentYear;
                $tax=$xmlDoc->response->results->result->taxAssessment;
                $price=$xmlDoc->response->results->result->lastSoldPrice;
                $date=$xmlDoc->response->results->result->lastSoldDate;
                    
                $zestimateamount=$zestimate->amount;
                $zestimateDate=$zestimate->{'last-updated'};
                
                $change= $zestimate->valueChange;
                $rentzestimateamount= $rent->amount;
                $rentzestimateDate= $rent->{'last-updated'};
                $rentchange= $rent->valueChange;
               
                    
             
                
                if ($price == "") $price = "N/A";
                else $price = "\$" . number_format((float)$price, 2);
                if ($yearbuilt == "") $yearbuilt = "N/A";
                if ($date == "") $date = "N/A";
                else{
                        date_default_timezone_set("America/Los_Angeles");
                        $soldDate = strtotime($date);
                        $date = date("j-F-Y", $soldDate);
                    }
                if($lotsize =="") $lotsize= "N/A";
                else $lotsize = number_format((float)$lotsize);
                if($zestimateamount == "") $zestimateamount="-";
                else $zestimateamount= "\$" . number_format((float)$zestimateamount, 2);
                $area = number_format((float)$area);
                $arrow1 = "down_r.gif";
                $change = "\$" . number_format((float)$change, 2);
                if ((float)$change> 0)$arrow1="up_g.gif";
                $rentchange = "\$" . number_format((float)$rentchange, 2);
                $arrow2 ="down_r.gif";
                if ((float)$rentchange> 0)$arrow2="up_g.gif";
                    
                $propertyrangeLow = "\$" . number_format((float)$zestimate->valuationRange[0]->low, 2);
                $propertyrangeHigh = "\$" . number_format((float)$zestimate->valuationRange[0]->high, 2);
                $rentzestimateamount = "\$" . number_format((float)$rentzestimateamount, 2);
                $tax = "\$" . number_format((float)$tax, 2);
                $rentrangeLow = "\$" . number_format((float)$rent->valuationRange[0]->low, 2);
                $rentrangeHigh = "\$" . number_format((float)$rent->valuationRange[0]->high, 2);
                
                $newarray+=[
                'Warning message'=>'Success',
                'Type'=>(string)$type,
                'LastSoldPrice'=>(string)$price,
                'YearBuilt'=>(string)$yearbuilt,
                'LastSoldDate'=>(string)$date,
                'LotSize'=>(string)$lotsize,
                'ZestimateValueDate'=>(string)$zestimateDate,
                'ZestimateAmount'=>(string)$zestimateamount,
                'FinishedArea'=>(string)$area,
                'Valuechange'=>(string)$change,
                'Rentchange'=>(string)$rentchange,
                'Arrow1'=>(string)$arrow1,
                'Bathrooms'=>(string)$bathroom,
                'Bedrooms'=>(string)$bedroom,
                'ZestimateRentValue'=>(string)$rentzestimateamount,
                'ZestimateRentDate'=>(string)$rentzestimateDate,   
                'TaxAssessmentYear'=>(string)$taxyear,
                'Arrow2'=>(string)$arrow2,
                'TaxAssessment'=>(string)$tax,
                'Address'=>(string)$wholeaddress,
                'Link'=>(string)$link,
                'RangeLow'=>(string)$propertyrangeLow,
                'RangeHigh'=>(string)$propertyrangeHigh,
                'RentLow'=>(string)$rentrangeLow,
                'RentHigh'=>(string)$rentrangeHigh,
                    
                ];
                $url0 = "http://www.zillow.com/webservice/GetChart.htm?zws-id=$zpid&unit-type=percent&zpid=$zpid1&width=600&height=300";
                    
                $newXml = simplexml_load_file($url0."&chartDuration=1year");		
                $url1 = $newXml->response[0]->url;
                $newarray += ['ImageUrl1year'=> (string)$url1];
                    
                $newXml = simplexml_load_file($url0."&chartDuration=5years");
                $url2 = $newXml->response[0]->url;
                $newarray += ['ImageUrl5years'=> (string)$url2];
                    
                $newXml = simplexml_load_file($url0."&chartDuration=10years");
                $url3 = $newXml->response[0]->url;
                $newarray += ['ImageUrl10years'=> (string)$url3];
            }
                $jsonoutput = json_encode($newarray);
                echo $jsonoutput;
   

?>
