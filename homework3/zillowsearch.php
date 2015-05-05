<html>
    <head>
        <title>Search Result</title>
        <link type="text/css" rel="stylesheet" href="zillow.css" />
        <script>
            function validateForm(userData) {
                if (userData.addr.value == "") {
                    alert("Please enter the street address.");
                    return false;
                } else if (userData.city.value == "") {
                    alert("Please enter the city.");
                    return false;
                } else {
                    return true;
                }
            }
        </script>
        <?php
            ini_set('display_errors', 'On');
            error_reporting(E_ALL | E_STRICT);
        ?>
    </head>
    <body>
        <h1>Real Estate Search</h1>
        <div>
            <form id="info" method="post" action="zillowsearch.php">
                <table class="query">
                    <tr>
                        <td>Street Address:* </td>
                        <td><input id="address" type="text" name="addr"></td>
                    </tr>
                    <tr>
                        <td>City:*</td>
                        <td><input  type="text" name="city"></td>
                    </tr>
                    <tr>
                        <td>State:*</td>
                        <td>
                            <select name="state">
                                <?php
                                    $state_list = array("al", "ak", "az", "ar", "ca", "co", "ct", "de", "dc", "fl", "ga", "hi", "id", "il", "in", "ia", "ks", "ky", "la", "me", "md", "ma", "mi", "mn", "ms", "mo", "mt", "ne", "nv", "nh", "nj", "nm", "ny", "nc", "nd", "oh", "ok", "or", "pa", "ri", "sc", "sd", "tn", "tx", "ut", "vt", "va", "wa", "wv", "wi", "wy");
                                    foreach ($state_list as $sta)
                                    {
                                        $op = "";
                                        if (isset($_POST["state"]) and $_POST["state"] == $sta) $op = "selected";
                                        echo "<option value='$sta'>" . strtoupper($sta) . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="hint">*-Mandatory field</td>
                    </tr>
                </table><br />
                <input type="submit" name="search" value="Search" onclick="return validateForm(this.form)">
            </form>
        </div>
        <div><?php
            if (isset($_POST["addr"]))
            {
                $addr = $_POST["addr"];
                $city = $_POST["city"];
                $state = $_POST["state"];
                $zid = "X1-ZWz1b36uf18zyj_1acr8";

                $urlPath = "http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=$zid&address=$addr&citystatezip=$city, $state&rentzestimate=true";
                $xmlDoc = simplexml_load_file($urlPath);
                //$xmlDoc = simplexml_load_file("result.xml");
                if ($xmlDoc->message[0]->code != "0")
                {
                    echo "<p class='notfound'>No exact match found -- Verify that the given address is correct.";
                }
                else
                {
                    echo "<h1>Search Result</h1>";
                    echo "<table class='result'>";

                    // Generate the table head line
                    $result = $xmlDoc->response->results->result;
                    $detailslink = "<a href='" . $result->links->homedetails . "' target='_blank'>";
                    $address = $result->address[0];
                    $zestimate = $result->zestimate[0];
                    $rent = $result->rentzestimate[0];
                    $detailsaddress = $address->street . ", " . $address->city . ", " . $address->state . "-" . $address->zipcode;
                    echo "<tr><td colspan='4' class='heading'>" .  "See more details on " . $detailslink . $detailsaddress . "</a> on Zillow.</td></tr>";

                    // Generate each row and column of the table
                    $propertyType = $result->useCode;
                    $lastSoldPrice = $result->lastSoldPrice;
                    if ($lastSoldPrice == "") $lastSoldPrice = "-";
                    else $lastSoldPrice = "\$" . number_format((float)$lastSoldPrice, 2);
                    echo "<tr><td class='left'>Property Type</td><td class='leftv'>$propertyType</td>";
                    echo "<td class='left'>Last Sold Price</td><td class='right'>$lastSoldPrice</td></tr>";

                    $yearBuilt = $result->yearBuilt;
                    if ($yearBuilt == "") $yearBuilt = "-";
                    $lastSoldDate = $result->lastSoldDate;
                    if ($lastSoldDate == "") $lastSoldDate = "-";
                    else
                    {
                        date_default_timezone_set("America/Los_Angeles");
                        $soldDate = strtotime($lastSoldDate);
                        $lastSoldDate = date("j-F-Y", $soldDate);
                    }
                    echo "<tr><td class='left'>Year Built</td><td class='leftv'>$yearBuilt</td>";
                    echo "<td class='left'>Last Sold Date</td><td class='right'>$lastSoldDate</td></tr>";

                    $lotSize = number_format((float)$result->lotSizeSqFt);
                    $zestAmount = "\$" . number_format((float)$zestimate->amount, 2);
                    $zestDate = $zestimate->{'last-updated'};
                    echo "<tr><td class='left'>Lot Size</td><td class='leftv'>$lotSize Sq. Ft.</td>";
                    echo "<td class='left'>Zestimate&reg; Property Estimate as of $zestDate</td><td class='right'>$zestAmount</td></tr>";

                    $finishedArea = number_format((float)$result->finishedSqFt);
                    $valueChange = "\$" . number_format((float)$zestimate->valueChange, 2);
                    $icon = "";
                    if ((float)$zestimate->valueChange > 0)
                    {
                        $icon="up_g.gif";
                    } else {
                        $icon="down_r.gif";
                    }
                    echo "<tr><td class='left'>Finished Area</td><td class='leftv'>$finishedArea</td>";
                    echo "<td class='left'>30 Days Overall Change";
                    echo "<img src='$icon' alt='icon'/></td><td class='right'>$valueChange</td></tr>";

                    $bathrooms = $result->bathrooms;
                    if ($bathrooms == "") $bathrooms = "-";
                    $allTimeRangeLow = "\$" . number_format((float)$zestimate->valuationRange[0]->low, 2);
                    $allTimeRangeHigh = "\$" . number_format((float)$zestimate->valuationRange[0]->high, 2);
                    echo "<tr><td class='left'>Bathrooms</td><td class='leftv'>$bathrooms</td>";
                    echo "<td class='left'>All Time Property Range</td><td class='right'>$allTimeRangeLow-$allTimeRangeHigh</td></tr>";

                    $bedrooms = $result->bedrooms;
                    if ($bedrooms == "") $bedrooms = "-";
                    $rentValue = "\$" . number_format((float)$rent->amount, 2);
                    $rentDate = $rent->{'last-updated'};
                    echo "<tr><td class='left'>Bedrooms</td><td class='leftv'>$bedrooms</td>";
                    echo "<td class='left'>Rent Zestimate&reg Valuation as of $rentDate</td><td class='right'>$rentValue</td></tr>";

                    $taxYear = $result->taxAssessmentYear;
                    if ($taxYear == "") $taxYear = "-";
                    $rentChange = "\$" . number_format((float)$rent->valueChange, 2);
                    if ((float)$rent->valueChange > 0)
                    {
                        $icon="up_g.gif";
                    } else {
                        $icon="down_r.gif";
                    }
                    echo "<tr><td class='left'>Tax AssessmentYear</td><td class='leftv'>$taxYear</td>";
                    echo "<td class='left'>30 Days Rent Change";
                    echo "<img src='$icon' alt='icon' /></td><td class='right'>$rentChange</td></tr>";

                    $taxAssess = "\$" . number_format((float)$result->taxAssessment, 2);
                    $allTimeRentLow = "\$" . number_format((float)$rent->valuationRange[0]->low, 2);
                    $allTimeRentHigh = "\$" . number_format((float)$rent->valuationRange[0]->high, 2);
                    echo "<tr><td class='left'>Tax Assessment</td><td class='leftv'>$taxAssess</td>";
                    echo "<td class='left'>All Time Rent Change</td><td class='right'>$allTimeRentLow-$allTimeRentHigh</td></tr>";

                    echo "</table>";
                }
            }
        ?></div>
        <p class="disclaimer">
            &copy; Zillow, Inc., 2006-2014. Use is subject to
            <a href="http://www.zillow.com/corp/Terms.htm">Terms of Use</a><br />
            <a href="http://www.zillow.com/wikipages/What-is-a-Zestimate/">What's a Zestimate?</a><br />
            <img src="http://www.zillow.com/widgets/GetVersionedResource.htm?path=/static/logos/Zillowlogo_200x50.gif" width="200" height="50" alt="Zillow Real Estate Search" />
        </p>
    </body>
</html>
