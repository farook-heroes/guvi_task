<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/styles.css">

<!-- Add this line to include the jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




</head>
<body>
<div id="success-alert" class="alert alert-success" role="alert" style="display: none;">
  Form submitted successfully!
</div>

	<div class="container" id="details">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8">
				<div class="form-container">
					<h2>Register</h2>
					<form id="registration-form" method="POST"  action="submit.php">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" id="name" name="name" required>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" id="email" name="email" required>
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" id="password" name="password" required>
						</div>
						<div class="form-group">
							<label for="confirm-password">Confirm Password:</label>
							<input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
              <div id="password-alert" class="alert alert-danger" style="display: none;">Passwords do not match</div>

						</div>
						<div class="form-group">
							<label for="dob">Date of Birth:</label>
							<input type="date" class="form-control date-max-today" id="dob" name="dob" required>
						</div>
						<div class="form-group">
							<label for="gender">Gender:</label>
							<select class="form-control" id="gender" name="gender" required>
								<option value="">Select Gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
								<option value="other">Other</option>
							</select>
						</div>
						<div class="form-group">
                            <label for="interests">Interests:</label>
                            <textarea class="form-control" id="interests" name="interests"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="job">Job:</label>
                            <input type="text" class="form-control" id="job" name="job">
                          </div>
                          <button type="submit" class="btn btn-primary" id="submit-button">Submit</button>
                    </form>    
                </div> 
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <script>
    $(document).ready(function() {
     
  $('#password, #confirm-password').on('keyup', function () {
    if ($('#password').val() == $('#confirm-password').val()) {
      $('#password-alert').hide();
      $('#submit-button').prop('disabled', false);
    } else {
      $('#password-alert').show();
      $('#submit-button').prop('disabled', true);
    }
  });
      $('#registration-form').submit(function(e) {
        // Prevent the form from submitting
        e.preventDefault();

        // Get the input values
        var name = $('#name').val();
        var email = $('#email').val();
        var interests = $('#interests').val();
        var job = $('#job').val();

        // Verify the input values
        var isValid = true;
        if (name.trim() == '') {
          isValid = false;
          $('#name').addClass('is-invalid');
        } else {
          $('#name').removeClass('is-invalid');
        }
        if (email.trim() == '') {
          isValid = false;
          $('#email').addClass('is-invalid');
        } else {
          $('#email').removeClass('is-invalid');
        }
        if (interests.trim() == '') {
          isValid = false;
          $('#interests').addClass('is-invalid');
        } else {
          $('#interests').removeClass('is-invalid');
        }
        if (job.trim() == '') {
          isValid = false;
          $('#job').addClass('is-invalid');
        } else {
          $('#job').removeClass('is-invalid');
        }

        // Submit the form if valid
        if (isValid) {
          $.ajax({
            url: 'submit.php',
            method: 'POST',
            data: $('#registration-form').serialize(),
            success: function(response) {
              var data=JSON.parse(response)
              console.log(data);
              
              // Handle the success response
            
              if(data['status']== 'success')
              {
                $('#success-alert').show();
                $("#details").hide();
                alert("registered Successfully");
                window.location.href="main.php";
              }
              
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
              // Handle the error response
              alert("form not submitted")
            
            }
          });
        }
      });
    });
  </script>
</body> 
</html>                    