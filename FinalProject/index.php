<?php
session_start();
include "db.php";
if (isset($_SESSION["premission"]) && $_SESSION["premission"] != "connected") {
  header('Location: login.php');
}
$con = new dbConnection();

if(isset($_POST["website"])&&isset($_POST["username"])&&isset($_POST["password"])){
  if($con->addAccount($_POST["website"],$_POST["username"],$_POST["password"])==1){
  }else{
    echo "Error!!!";
  }
}

if(isset($_GET["delete"])){
  if($con->deleteAccount($_GET["delete"])==1){
  }else{
    echo "Error!!!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

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


    <!-- Sing in  Form -->
    <section class="sign-in">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">SavePass</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>

            </ul>

          </div>
        </nav>


        <div class="signin-content">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Website</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>

              <?php
              $accounts=$con->loadAccounts();
              $i=0;
              foreach ($accounts as $key=>$account){
              ?>
                <tr>
                  <th scope="row"><?php echo ++$i; ?></th>
                  <td><?php echo $account->website; ?></td>
                  <td><?php echo $account->username; ?></td>
                  <?php 
                  if(isset($_GET['show'])&& $_GET['show'] ==$account->id ){
?>
                  <td><?php echo $account->password ?> <a href=<?php echo "index.php?show=".$account->id?>><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                      </svg></a></td>
<?php
                  }else{?>
                  <td>************ <a href=<?php echo "index.php?show=".$account->id?>><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                      </svg></a></td>
                      <?php }?>
                  <td><a href=<?php echo "index.php?delete=".$account->id ?>>Delete</a></td>
                </tr>
              <?php } ?>


              <tr>
                <th scope="row">#</th>
                <form method="POST" target="index.php">
                <td> <input type="text" id="website" name="website" /></td>
                <td> <input type="text" id="username" name="username" /></td>
                <td> <input type="password" id="password" name="password" /></td>
                <td> <input type="submit" name="signin" id="signin"  value="add"/></td>
                </form>
              </tr>


            </tbody>
          </table>

        </div>
      </div>
    </section>

  </div>

</body>

</html>