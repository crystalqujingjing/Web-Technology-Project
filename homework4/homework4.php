<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link href="mystyle.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <style type="text/css">
	.bs-example{
     margin: 20px;
	}
    table#table {
        background-color: white;
    }
</style>
    
  </head>

  <body background="http://www.neovisual.cz/files/V0779-d9.jpg">
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '550965505040566',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
      
        <div class="container">

      <form class="form-submit" role="form" id="contact-form">
    
          <h3 class="prompt control-label"><font color="#FF9900">Search Your Property Here</font></h3>
          
        <div class="form-group">
          <label class="control-label col-xs-12 col-md-1 label-text" for="Address"><font color="#FF9900"><strong>Street Address*:</strong></font></label>
          <div class="col-xs-12 col-md-2">
             <input class="form-control" id="Address" type="text" placeholder="Address" required/>
          </div>
        </div>
          <div class="form-group">
             <label class="control-label col-xs-12 col-md-1 label-text" for="City"><font color="#FF9900"><strong>City*:</strong></font></label>
             <div class="col-xs-12 col-md-2">
                <input class="form-control" id="City" type="text" placeholder="City" required/>
              </div>
          </div>
        <div class="form-group">
             <label class="control-label col-xs-12 col-md-1 label-text" for="State"><font color="#FF9900"><strong>State*:</strong></font></label>
            <div class="col-xs-12 col-md-2">
                <select class="form-control" id="State" name="State" style="height:35px;" required/>
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
            </div>
        </div>
        <div class="form-group">
           <div class="col-xs-12 col-md-1">
             <button class="btn btn-sm btn-warning" style="height:35px" type="submit">Submit</button>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 col-md-1" id="logo">
             <img src="http://www.zillow.com/widgets/GetVersionedResource.htm?path=/static/logos/Zillowlogo_150x40.gif" width="150" height="40" alt="Zillow Real Estate Search" />
            </div>
        </div>
     
    </div> <!-- /container -->
    <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="80%" color=#fff SIZE=3>
    <div id="msg">
        <p><center>No exact match found -- Verify that the given address is correct.</center></p>
    </div>
  
    
    <script>
        $(document).ready(function(){
            $('#contact-form').validate({
                rules: {
                    Address: {
                        required: true
                    },
                    City: {
                        required: true
                    },
                    State: {
                        required: true
                    },
                },
                highlight: function(border) {
                $(border).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(border) {
                $(border).closest('.form-group').removeClass('has-error');
                },
                submitHandler: function(table) {
                $.ajax( {
                    url: "http://crystalelasticbeans-env.elasticbeanstalk.com/index.php",
                    data: {
                        address: table.Address.value,
                        city: table.City.value,
                        state: table.State.value
                    },
                    type: 'POST',
                    success: function(output) {
                        Parse(output);
                    },
                    error: function() {
                        alert("Error");
                    }
                })
            }
            });
        });
        
        function Parse(json)
{
     jsondata = $.parseJSON(json);
    
    if (jsondata.Error!="0") {
        $("#zillowInfor").css("visibility", "hidden");
        $("#msg").css("visibility","visible");
        }
    else {
        $("#Basic").addClass("active");
        $("#zillowInfor").css("visibility", "visible");
        $("#link").html("<a href='" + jsondata.Link + "'>" + jsondata.Address + "</a>");
        $("#newlink1").html(jsondata.Address);
        $("#newlink2").html(jsondata.Address);
        $("#newlink3").html(jsondata.Address);
        $("#type").html(jsondata.Type);
        $("#lastsoldprice").html(jsondata.LastSoldPrice);
        $("#yearbuilt").html(jsondata.YearBuilt);
        $("#lastsolddate").html(jsondata.LastSoldDate);
        $("#rentdate").html(jsondata.ZestimateRentDate);
        $("#rentvalue").html(jsondata.ZestimateRentValue);
        $("#taxyear").html(jsondata.TaxAssessmentYear);
        $("#rentchange").html(jsondata.RentChange);
        $("#taxassessment").html(jsondata.TaxAssessment);
        $("#renticon").html("<img src='img/" + jsondata.Arrow2 + "' alt='icon'>");
        $("#rentrange").html(jsondata.RentLow + ' - ' + jsondata.RentHigh); 
        $("#range").html(jsondata.RangeLow + ' - ' + jsondata.RangeHigh);
        $("#address").html(jsondata.Address);
        $("#size").html(jsondata.LotSize);
        $("#zestimatedate").html(jsondata.ZestimateValueDate);
        $("#zestimatevalue").html(jsondata.ZestimateAmount);
        $("#area").html(jsondata.FinishedArea);
        $("#valueicon").html("<img src='img/" + jsondata.Arrow1 + "' alt='icon'>");
        $("#valuechange").html(jsondata.Valuechange);
        $("#bathrooms").html(jsondata.Bathrooms);
        $("#bedrooms").html(jsondata.Bedrooms);
        $("#year1").html("<img src='" + jsondata.ImageUrl1year + "' alt='1 Year'>");
        $("#year5").html("<img src='" + jsondata.ImageUrl5years + "' alt='5 Year'>");
        $("#year10").html("<img src='" + jsondata.ImageUrl10years + "' alt='10 Year'>");
    }
}
   function facebookshare(){
    FB.ui(
        {
            method: 'feed',
            name: jsondata.Address,
            link: jsondata.link,
            picture:jsondata.ImageUrl1year,
            caption: 'Property Information from Zillow.com',
            description: 'Last Sold Price:'+jsondata.LastSoldPrice+',30 Days Overall Change:'+jsondata.Valuechange,
           
        },
        function(response){
            if(response && !response.error_code){
                alert('Posting completed.');
            }else{
                alert('Error while posting.')
            }
        }
    );
}


    </script>
      
        
        
    <div id="zillowInfor">
    <ul class="nav nav-tabs">
        <li><a data-toggle="tab" href="#Basic">Basic Infor</a></li>
        <li><a data-toggle="tab" href="#Historical">Historical zestimate</a></li>
    </ul>
    <div class="tab-content">
        <div id="Basic" class="tab-pane fade in">
            <table class="table table-striped" id="table">
            <tr>
                <td colspan="3">See more details for <span id="link"></span>on Zillows.</td>
                <td colspan="1"><button class="btn btn-primary" onclick="facebookshare()">Share on <b>Facebook</b></button></td>
            </tr>
            <tr>
            <td class="left">Property Type</td>
            <td class="leftv" id="type"></td>
            <td class="left">Last Sold Price</td>
            <td class="right" id="lastsoldprice"></td>
            </tr>
            <tr>
            <td class="left">Year Built</td>
            <td class="leftv" id="yearbuilt"></td>
            <td class="left">Last Sold Date</td>
            <td class="right" id="lastsolddate"></td>
            </tr>
            <tr>
            <td class="left">Lot Size</td>
            <td class="leftv" id="lot-size"></td>
            <td class="left">Zestimate® Property Estimate as of <span id="zestimatedate"></span></td>
            <td class="right" id="zestimatevalue"></td>
            </tr>
            <tr>
            <td class="left">Finished Area</td>
            <td class="leftv" id="area"></td>
            <td class="left">30 Days Overall Change<span id="value-icon"></span></td>
            <td class="right" id="valuechange"></td>
            </tr>
            <tr>
            <td class="left">Bathrooms</td>
            <td class="leftv" id="bathrooms"></td>
            <td class="left">All Time Property Range</td>
            <td class="right" id="range"></td>
            </tr>
            <tr>
            <td class="left">Bedrooms</td>
            <td class="leftv" id="bedrooms"></td>
            <td class="left">Rent Zestimate® Valuation as of <span id="rentdate"></span></td>
            <td class="right" id="rentvalue"></td>
            </tr>
            <tr>
            <td class="left">Tax AssessmentYear</td>
            <td class="leftv" id="taxyear"></td>
            <td class="left">30 Days Rent Change<span id="renticon"></span></td>
            <td class="right" id="rentchange"></td>
            </tr>
            <tr>
            <td class="left">Tax Assessment</td>
            <td class="leftv" id="taxassessment"></td>
            <td class="left">All Time Rent Change</td>
            <td class="right" id="rentrange"></td>
            </tr>
            </table>
        </div>
    
  <div id="Historical" class="tab-pane fade">   
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
   
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
   </ol>   
   
   <div class="carousel-inner">
       <div class="item active">
         <center><span id="year1"></span></center>
         <div class="carousel-caption">
                  <font size="4">Historical Zestimates for the past 1 year</font><br />
                  <span id="newlink1"></span>
        </div>
      </div>
      <div class="item">
          <center><span id="year5"></span></center>
        <div class="carousel-caption">
                  <font size="4" align="left">Historical Zestimates for the past 5 years</font><br />
                  <span id="newlink2"></span>
        </div>
      </div>
      <div class="item">
          <center><span id="year10"></span></center>
          <div class="carousel-caption">
                  <font size="4" align="left">Historical Zestimates for the past 10 years</font><br />
                  <span id="newlink3"></span>
        </div>
      </div>
   </div>
        
  
   <a class="carousel-control left" href="#myCarousel" 
      data-slide="prev">&lsaquo;</a>
   <a class="carousel-control right" href="#myCarousel" 
      data-slide="next">&rsaquo;</a>
   </div> 
 </div>
 </div>
    
  </body>

</html>
