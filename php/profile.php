<!DOCTYPE html>
<html>
  <head>
    <title>Profile Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/profile.css">
  </head>
  <body>
    <div class="container mt-5">
      <div class="card">
        <div class="card-header text-center">
          <h2>Profile Page</h2>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <p><strong>Name:</strong> <span id="name"></span></p>
              <p><strong>Email:</strong> <span id="email"></span></p>
              <p><strong>Age:</strong> <span id="age"></span></p>
              <p><strong>Date of Birth:</strong> <span id="dob"></span></p>
              <p><strong>Gender:</strong> <span id="gender"></span></p>
              <p><strong>Job:</strong> <span id="job"></span></p>
              <p><strong>Interests:</strong> <span id="interests"></span></p>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function(){
  // Get the data from localStorage
  var name = localStorage.getItem("name");
  var email = localStorage.getItem("email");
  var dob = localStorage.getItem("date");
  var gender = localStorage.getItem("gender");
  var job = localStorage.getItem("job");
  var interests = localStorage.getItem("interest");
   var age=localStorage.getItem("age");

 
  

  
  // Set the values in the HTML elements
  $('#name').text(name);
  $('#email').text(email);
  $('#age').text(age);
  $('#dob').text(dob);
  $('#gender').text(gender);
  $('#job').text(job);
  $('#interests').text(interests);
});
      </script>
  </body>
</html>
