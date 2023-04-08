<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
  <!-- Custom CSS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="../css/login_page.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Login</h4>
            <form id="login-form">
            <div id="alert-message" class="alert alert-danger" role="alert" style="display : none">Username or Password Wrong</div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Custom JS -->
  <script>
    $(function() {
      // Submit form data to login.php using AJAX
      $("#login-form").submit(function(e) {
        e.preventDefault();
        localStorage.setItem("email", $("#email").val());
        localStorage.setItem("password",$("#password").val());
        localStorage.setItem("verified", false);

        $.ajax({
          url: "validate.php",
          type: "POST",
          data: $("#login-form").serialize(),
          success: function(response) {
            console.log(response)
            var data = JSON.parse(response);
             
             
              // Handle the success response
           if(data['success']==true)
           {
            alert("ok");
            localStorage.setItem("verified", true);
          
            localStorage.setItem('name', data['name']);
            localStorage.setItem('email', data['email']);

localStorage.setItem('gender', data['data']['gender']);
localStorage.setItem('job', data['data']['job']);
localStorage.setItem('interest', data['data']['interests']);

// define the input date string
const dateString = data['date'];

// create a new Date object from the string
const date = new Date(dateString);

// extract the day, month, and year from the Date object
const day = date.getDate();
const month = date.getMonth() + 1; // add 1 to account for zero-indexed months
const year = date.getFullYear();

// format the date string in d-m-y format
const formattedDate = `${day}-${month}-${year}`;
console.log(formattedDate); // output: "6-4-2023"

const dob = new Date(dateString);

// calculate age in years
const ageInMilliseconds = Date.now() - dob.getTime();
const ageInYears = new Date(ageInMilliseconds).getUTCFullYear() - 1970;

console.log(ageInYears); // output: 24
        // redirect to profile page
localStorage.setItem("age",ageInYears);
localStorage.setItem("date",formattedDate);
      
window.location.href="profile.php";
    
           }
           if(data['success']==false)
           {
            $("#alert-message").show();
           }
          },
          error: function(response){
            var data = JSON.parse(response);
            if(data['success']==false)
           {
            $("#alert-message").show();
           }
          }
        
        });
    });
});
</script>
</body> 
</html>                    