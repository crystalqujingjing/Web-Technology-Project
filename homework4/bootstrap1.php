<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    
  </head>

  <body background="http://www.neovisual.cz/files/V0779-d9.jpg">
      
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
     
    </div> <!-- /container -->
    <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="80%" color=#fff SIZE=3>
  
    
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
                }
            });
        });
    </script>
  
 <div class="navbar">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
          
          <nav class="navbar navbar-default" role="navigation">
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" 
         data-target="#example-navbar-collapse">
         <span class="sr-only">切换导航</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">W3Cschool</a>
   </div>
   <div class="collapse navbar-collapse" id="example-navbar-collapse">
      <ul class="nav navbar-nav">
         <li class="active"><a href="#">iOS</a></li>
         <li><a href="#">SVN</a></li>
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               Java <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
               <li><a href="#">jmeter</a></li>
               <li><a href="#">EJB</a></li>
               <li><a href="#">Jasper Report</a></li>
               <li class="divider"></li>
               <li><a href="#">分离的链接</a></li>
               <li class="divider"></li>
               <li><a href="#">另一个分离的链接</a></li>
            </ul>
         </li>
      </ul>
   </div>
</nav>


 <div id="myCarousel" class="carousel slide" data-ride="carousel">
   
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
   </ol>   
   
   <div class="carousel-inner">
       
      <div class="item active">
         <img src="http://www.zillow.com/app?chartDuration=1year&chartType=partner&height=150&page=webservice%2FGetChart&service=chart&showPercent=true&width=300&zpid=48749425" alt="First slide">
      </div>
      <div class="item">
         <img src="http://www.zillow.com/app?chartDuration=5years&chartType=partner&height=150&page=webservice%2FGetChart&service=chart&showPercent=true&width=300&zpid=48749425" alt="Second slide">
      </div>
      <div class="item">
         <img src="http://www.zillow.com/app?chartDuration=10years&chartType=partner&height=150&page=webservice%2FGetChart&service=chart&showPercent=true&width=300&zpid=48749425" alt="Third slide">
      </div>
   </div>
  
   <a class="carousel-control left" href="#myCarousel" 
      data-slide="prev">&lsaquo;</a>
   <a class="carousel-control right" href="#myCarousel" 
      data-slide="next">&rsaquo;</a>
</div> 
 
 
    
  </body>

</html>
