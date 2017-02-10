<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Email Field Validation</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    </head>
    
    <body> 
    <div class="container">
    	<div class="row">
    		<div class="panel panel-primary">
    		
    		<div class="panel-heading">
    			Email Field Validation
    		</div>
    		
    		<div class="panel-body">
    		
    		<form>
    		<div class="form-group col-md-5">
      <label for="email">Jquery Validation Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email">
      <h2 id='result'></h2>
    </div>      

  <!--   <div ng-app="" ng-init="ang_email='John@doe.com'">
      <label for="email">Angular Email:</label>
      <input type="email" ng-model="ang_email"class="form-control" id="ang_email" placeholder="Enter email">
      <p>You wrote : {{ ang_email }} </p>
    </div>    -->   
    		</form>

    	 <div ng-app="myApp" ng-controller="myCtrl">
      {{ name }}
    	 </div>


    		</div>
    		</div>
    	</div>
    </div>
    </body>
</html>

<script type="text/javascript"> 
  
function validate() {
  $("#result").text("");
  var email = $("#email").val();
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   var check = re.test(email);
  if (check) {
    $("#result").text(email + " is valid :)");
    $("#result").css("color", "green");
  } else {
    $("#result").text(email + " is not valid :(");
    $("#result").css("color", "red");
  }
  return false;
}


$("#email").bind("blur", validate);
 
</script>
<script>
var app = angular.module("myApp", []);
 	app.controller("myCtrl",function($scope) {
 	$scope.name = "John Doe";
    $scope.text = 'me@example.com';
    //   $scope.emailFormat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    // });

</script>