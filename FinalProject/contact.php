<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
	
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
	
	<!-- Validations JS -->
	<script src="js/validations.js"></script>
</head>
<body>

    <div class="main">

		<section class="signup">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">SavePass</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="contact.php">Contact Us <span class="sr-only">(current)</span></a>
                        </li>
						<li class="nav-item ">
                            <a class="nav-link" href="login.php">Login</a>
                          </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Registeration</a>
                          </li>
                      
                      </ul>
                   
                    </div>
                  </nav>

				<div class="signup-content">
					
					<div class="signup-form">
						<h2 class="form-title">Contact Us</h2>
						<form method="POST" class="register-form" id="register-form" onsubmit="validateContactUs()">
							<div class="form-group">
								<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="text" name="name" id="name" placeholder="Your Name" required/>
							</div>
							<div class="form-group">
								<label for="email"><i class="zmdi zmdi-email"></i></label>
								<input type="email" name="email" id="email" placeholder="Your Email" required/>
							</div>
			

							<div class="form-group">
								<label for="subject"><i class="zmdi zmdi-subject"></i></label>
								<textarea id="subject" name="subject" placeholder="subject*" class="md-textarea form-control" style="height:120px" required></textarea>
							</div>

							
							<div class="form-group form-button">
								<input type="submit" name="signup" id="signup" class="form-submit" value="Submit" />
							</div>
						</form>
					</div>
					<div class="signup-image">
						<figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
						<a href="mailto: mhemmad01@gmail.com" class="signup-image-link">Contact Support</a>
						<a href="login.php" class="signup-image-link">Login</a>
                        <a href="contact.php" class="signup-image-link">Contact Us</a>
					</div>
				</div>
			</div>
		</section>

    </div>

</body>
</html>