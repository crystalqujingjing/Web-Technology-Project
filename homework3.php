<!DOCTYPE HTML> 
<html>
<meta charset="UTF-8">
   <head>
    <title>Real Estate Search</title>
    <link rel="stylesheet" type="text/css"href="mystyle2.css">
    </head>
<body>

<?php
            error_reporting(0);
?>
    
    <script>//Javascript to check whether the value inserted or not
        function test_input(data){
   if (data.address.value=="") {
    alert("Please enter value for Street Address.");
    return false;
    }
   else if (data.city.value==""){
     alert("Please enter value for City and State");
     return false;
   }
   else {
     return true;
   }
}
    </script>
    
<h1>Real Estate Search</h1>
    <div class="top">
    <form action="homework3.php" method='post'>
    <table class=search1 border="0">
  <tr>
    <td>Street Address*:</td>
    <td><input type="text" name="address"></td>
  </tr>
  <tr>
    <td>City*:</td>
    <td><input type="text" name="city"></td>
  </tr>
  <tr>
    <td>State*:</td>
    <td>
    <select name="state">
<option value=""></option>
<option value="AL">AL</option>
<option value="AK">AK</option>
<option value="AZ">AZ</option>
<option value="AR">AR</option>
<option value="CA">CA</option>
<option value="CO">CO</option>
<option value="CT">CT</option>
<option value="DE">DE</option>
<option value="DC">DC</option>
<option value="FL">FL</option>
<option value="GA">GA</option>
<option value="HI">HI</option>
<option value="ID">ID</option>
<option value="IL">IL</option>
<option value="IN">IN</option>
<option value="IA">IA</option>
<option value="KS">KS</option>
<option value="KY">KY</option>
<option value="LA">LA</option>
<option value="ME">ME</option>
<option value="MD">MD</option>
<option value="MA">MA</option>
<option value="MI">MI</option>
<option value="MN">MN</option>
<option value="MS">MS</option>
<option value="MO">MO</option>
<option value="MT">MT</option>
<option value="NE">NE</option>
<option value="NV">NV</option>
<option value="NH">NH</option>
<option value="NJ">NJ</option>
<option value="NM">NM</option>
<option value="NY">NY</option>
<option value="NC">NC</option>
<option value="ND">ND</option>
<option value="OH">OH</option>
<option value="OK">OK</option>
<option value="OR">OR</option>
<option value="PA">PA</option>
<option value="RI">RI</option>
<option value="SC">SC</option>
<option value="SD">SD</option>
<option value="TN">TN</option>
<option value="TX">TX</option>
<option value="UT">UT</option>
<option value="VT">VT</option>
<option value="VA">VA</option>
<option value="WA">WA</option>
<option value="WV">WV</option>
<option value="WI">WI</option>
<option value="WY">WY</option>

        </select>
      </td>
    </tr>
    <tr>
        <td></td>
        <td>
        <input type="submit" name="submit" value="search" onclick="return test_input(this.form)">
        </td>
    <td>
      <img src="http://www.zillow.com/widgets/GetVersionedResource.htm?path=/static/logos/Zillowlogo_150x40_rounded.gif" width="150" height="40" alt="Zillow Real Estate Search" />
      </td>
    </tr>
    <td>*-Mandatory fields.</td>
        </table>
    </form>
    </div>
    <div class="bottom"><?php
   if (isset($_POST["address"]))
            {
                $address = $_POST["address"];
                $city = $_POST["city"];
                $state = $_POST["state"];
                $zpid = "X1-ZWz1b29qod7uvf_4vl2o";
                $url ="http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=$zpid&address=$address&citystatezip=$city, $state&rentzestimate=true";
                $xmlDoc=simplexml_load_file($url);
	            if($xmlDoc->message[0]->code !="0"){
		        echo "<p class='error'><b>No exact match found--Verify that the given address is correct.</b>";
	            }
                else{
                echo"<h1><b>Search Reasults</b></h1>";
                echo"<table class='searchresults'>";//Create the URL query line above the table.
                $link = "<a href='".$xmlDoc->response->results->result->links->homedetails."' target='_blank'>";
                $addr = $xmlDoc->response->results->result->address[0];
                $zestimate = $xmlDoc->response->results->result->zestimate[0];
                $rent = $xmlDoc->response->results->result->rentzestimate[0];
                $wholeaddress = $addr->street . ", " . $addr->city . ", " . $addr->state . "-" . $addr->zipcode;
                echo "<h2><tr><td colspan='4' class='queryurl'>" .  "See more details for " .$link . $wholeaddress . "</a> on Zillow.</td></tr><h2>";
                    
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
                
                $change= $rent->valueChange;
                $rentzestimateamount= $rent->amount;
                $rentzestimateDate= $rent->{'last-updated'};
                $rentchange= $rent->valueChange;
               
                    
             
                
                if ($price == "") $price = "-";
                else $price = "\$" . number_format((float)$price, 2);
                if ($yearbuilt == "") $yearbuilt = "-";
                if ($date == "") $date = "-";
                else{
                        date_default_timezone_set("America/Los_Angeles");
                        $soldDate = strtotime($date);
                        $date = date("j-F-Y", $soldDate);
                    }
                if($lotsize =="") $lotsize= "-";
                else $lotsize = number_format((float)$lotsize);
                if($zestimateamount == "") $zestimateamount="-";
                else $zestimateamount= "\$" . number_format((float)$zestimateamount, 2);
                $area = number_format((float)$area);
                $change = "\$" . number_format((float)$change, 2);
                $arrow = "";
                if ((float)$change> 0)
                    {
                        $arrow1="up_g.gif";
                    } else {
                        $arrow1="down_r.gif";
                    }
                $rentchange = "\$" . number_format((float)$rentchange, 2);
                 if ((float)$rentchange> 0)
                    {
                        $arrow2="up_g.gif";
                    } else {
                        $arrow2="down_r.gif";
                    }
                $propertyrangeLow = "\$" . number_format((float)$zestimate->valuationRange[0]->low, 2);
                $propertyrangeHigh = "\$" . number_format((float)$zestimate->valuationRange[0]->high, 2);
                $rentzestimateamount = "\$" . number_format((float)$rentzestimateamount, 2);
                $tax = "\$" . number_format((float)$tax, 2);
                $rentrangeLow = "\$" . number_format((float)$rent->valuationRange[0]->low, 2);
                $rentrangeHigh = "\$" . number_format((float)$rent->valuationRange[0]->high, 2);
                
                
                echo "<tr><td>Property Type:</td><td>$type</td>";
                echo "<td>Last Sold Price:</td><td>$price</td></tr>";
                echo "<tr><td>Year Built:</td><td>$yearbuilt</td>";
                echo "<td>Last Sold Date:</td><td>$date</td></tr>";
                echo "<tr><td>Lot Size:</td><td>$lotsize Sq. Ft.</td>";
                echo "<td>Zestimate&reg; Property Estimate as of $zestimateDate</td><td>$zestimateamount</td></tr>";
                echo "<tr><td>Finished Area:</td><td>$area</td>";
                echo "<td>30 Days Overall Change";
                echo "<img src='$arrow1' alt='arrow1'/></td><td>$change</td></tr>";
                echo "<tr><td>Bathrooms</td><td>$bathroom</td>";
                echo "<td>All Time Property Range:</td><td>$propertyrangeLow-$propertyrangeHigh</td></tr>";
                echo "<tr><td>Bedrooms:</td><td>$bedroom</td>";
                echo "<td>Rent Zestimate&reg Valuation as of $rentzestimateDate</td><td>$rentzestimateamount</td></tr>";
                echo "<tr><td>Tax Assessment Year:</td><td>$taxyear</td>";
                echo "<td>30 Days Rent Change";
                echo "<img src='$arrow2' alt='arrow2' /></td><td>$rentchange</td></tr>";
                echo "<tr><td>Tax Assessment:</td><td>$tax</td>";
                echo "<td>All Time Rent Change:</td><td>$rentrangeLow-$rentrangeHigh</td></tr>";
                    
                echo "</table>";
                }
            
            
   }
    

?>
                <p>
                &copy; Zillow, Inc., 2006-2014. Use is subject to <a href="http://www.zillow.com/corp/Terms.htm">Terms of Use</a><br />
                <a href="http://www.zillow.com/wikipages/What-is-a-Zestimate/">What's a Zestimate?</a><br />";
                </p>
                </div>
    </body>       
</html>
