<!DOCTYPE html>
<html>
<head>
		<script>var number = 0; </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
		<script src="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.css">
		<script> 
			// function clearFields(element){
			// 	console.log(element.id);
			// 	if (element.id == "searchfirstname")
			// 		$("#searchlastname").val("");
			// 	else (element.id == "searchlastname")
			// 		$("#searchfirstname").val("");	
			// 	$("#firstname").val("");
			// 	$("#lastname").val("");
			// 	$("#email").val("");
			// 	$("#password").val("");
			// 	$("#femaleradio").prop('checked',false);
			// 	$("#maleradio").prop('checked',false);
			// 	$("#phonenumber").val('');
			// 	$("#city").val('');
			// }
			function clearFields(element){
				console.log(element.id);
				if (element.id == "searchfirstname")
				{
					$("#searchlastname" ).val("");
					$("#searchemail" ).val("");	
				}					
				else if (element.id == "searchlastname")
				{
					$("#searchfirstname").val("");
					$("#searchemail" ).val("");		
				}	

				else if (element.id == "searchemail")
				{
					$("#searchfirstname").val("");
					$("#searchlastname" ).val("");		
				}	

				$("#firstname").val("");
				$("#lastname").val("");
				$("#email").val("");
				$("#password").val("");
				$("#femaleradio").prop('checked',false);
				$("#maleradio").prop('checked',false);
				$("#phonenumber").val('');
				$("#city").val('');

			}

			function deleteRows(){
				var lastname = $('#searchlastname').val();
				var firstname =  $('#searchfirstname').val();
				var email = $('#searchemail').val();

				if (firstname != "")
				{
					//alert("firstname");
					$("#ajaxDiv").html("Deleting rows where firstname: " + firstname);
					$.ajax({
						url: "delete.php",
						method: "POST",
						data: {"searchfirstname" : firstname },
						success:  function(response){
							$("#ajaxDiv").html(response);
						}					
					}); // end of ajax call
				}
				else if (lastname != "") {
					//alert("lastname");
					$("#ajaxDiv").html("Deleting rows where lastname: " + lastname);
					$.ajax({
						url: "delete.php",
						method: "POST",
						data: {"searchlastname" : lastname },
						success:  function(response){
							$("#ajaxDiv").html(response);
						}					
					}); // end of ajax call
				}
				else if (email != ""){
					//alert("email");
					$("#ajaxDiv").html("Deleting rows where email: " + email);
					$.ajax({
						url: "delete.php",
						method: "POST",
						data: {"searchemail" : email },
						success:  function(response){
							$("#ajaxDiv").html(response);
						}					
					}); // end of ajax call
				}
				$("#firstname").val("");
				$("#lastname").val("");
				$("#email").val("");
				$("#password").val("");
				$("#femaleradio").prop('checked',false);
				$("#maleradio").prop('checked',false);
				$("#phonenumber").val('');
				$("#city").val('');
				
			}

			function fetchDatabase() {
				var lastname = $('#searchlastname').val();
				var firstname =  $('#searchfirstname').val();
				var email =  $('#searchemail').val();

				if (firstname !=="")
				{
					$("#ajaxDiv").html("Searching the database for user: " + firstname);
					$.ajax({
						url: "search.php",
						method: "POST",
						data: {"searchfirstname" : firstname },
						success:  function(response){
							$("#ajaxDiv").html(response);
						}					
					}); // end of ajax call
				}
				else if (lastname !=="") {
					$("#ajaxDiv").html("Searching the database for user: " + lastname);
					$.ajax({
						url: "search.php",
						method: "POST",
						data: {"searchlastname" : lastname },
						success:  function(response){
							$("#ajaxDiv").html(response);
						}					
					}); // end of ajax call
				}

				else
				{
					$("#ajaxDiv").html("Searching the database for user: " + email);
					$.ajax({
						url: "search.php",
						method: "POST",
						data: {"searchemail" : email },
						success:  function(response){
							$("#ajaxDiv").html(response);
						}					
					}); // end of ajax call
				}
				
				$("#firstname").val("");
				$("#lastname").val("");
				$("#email").val("");
				$("#password").val("");
				$("#femaleradio").prop('checked',false);
				$("#maleradio").prop('checked',false);
				$("#phonenumber").val('');
				$("#city").val('');
				
			}	

			function submitAjax() {
				var data = $('#signupForm').serialize();
				
				//calling backend php code through Ajax
				$.ajax({
					url: "form.php",
					method: "POST",
					data: {"data" : data },
					success:  function(response){
						$("#ajaxDiv").html("form submitted successfully");
					}					
				}); // end of ajax call
			}
		</script>
	</head>
	<body>
		<div class="column small-centered small-6">
			<h1 class="column small-centered"> Sign up Form</h1>
			<form class="small-centered small-12 column " id="signupForm" action=""  >
			<fildset></fildset>
			<div class="row">
				<div class="small-6 column">
				<label> Enter name
					<input type="text" name="firstname" id="firstname" placeholder="Enter name">
				</label>
				</div>
				<div class="small-6 column">
				<label> Enter last name
					<input type="text"  name="lastname" id="lastname" placeholder="Enter last name">
				</label>
				</div>
			</div>
			<div class="row">
				<div class="small-6 column">
				<label> Enter email (Username)
					<input type="text" name="email" id="email" placeholder="Enter email">
				</label>
				</div>
				<div class="small-6 column">
				<label> Enter password
					<input type="password" name="password" id="password"  placeholder="Enter password">
				</label>
				</div>
			</div>
		<div class="row ">
			<div class="small-6 column">
				<label>Enter Phone Number
				<input type="text"  name="phone" id= "phonenumber" placeholder="Enter Phone">
				</label>
			</div>
			<div class="small-6 column">
				<label> Enter City
				<input type="text"  name="city" id= "city" placeholder="Enter City">
				</label>
			</div>
		</div>
			<div class="row ">
			<div class="small-6 column small-centered">
				<label>Gender</label>
				<input type="radio" name="gender" value="male" id="maleradio"><label for="maleradio">Male</label>
				<input type="radio" name="gender" value="female" id="femaleradio"><label for="femaleradio">Female</label>
			</div>	
		</div>
			<div class="row">
				
			<input class="button small-12 column" id="testAjax" value="Register" type="button" onclick="submitAjax();">
				
			</div>
			<div class="row">
				<div class="small-6 column">
					<lable> Search by last name
						<input type="text" name="search" id="searchlastname" placeholder="Search by last name" onfocus="clearFields(this);">
					</lable>
				</div>
			    <div class="small-6 column">
					<lable> Search by first name
						<input type="text" name="search" id="searchfirstname" placeholder="Search by first name" onfocus="clearFields(this);">
					</lable>
				</div>
				<div class="small-12 column">
					<lable> Search by email
						<input type="text" name="search" id="searchemail" placeholder="Search by email" onfocus="clearFields(this);">
					</lable>
				</div>
			</div>
			<input class="button small-6 column" id="fetchAjax" value="Search" type="button" onclick="fetchDatabase();">
			<input class="button alert small-6 column" id="deleteAjax" value="Delete" type="button" onclick="deleteRows();">
			</fildset>
			</form>
			
			<p id="ajaxDiv"> </p>	
			<?php	 ?>
		</div>
	</body>
</html>