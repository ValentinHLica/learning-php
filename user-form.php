<?php 
    $alertMessage = "";
    $alertType = "";

    if (filter_has_var(INPUT_POST,"submit")) {
        $name = htmlentities($_POST["name"]);
        $email = htmlentities($_POST["email"]);

        if (!empty($name) && !empty($email)) {
            $email = filter_var($email,FILTER_SANITIZE_EMAIL);

            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $alertMessage = "Please provide a better email";
                $alertType = "alert-danger";
            } else {
                $alertMessage = "Success";
                $alertType = "alert-success";
            }

        }else {
            $alertMessage = "Please fill out form";
            $alertType = "alert-danger";
        }

    } 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
</head>
<body class="container py-5">

<?php if (!empty($alertMessage)):?>
   <div class="alert <?php echo $alertType; ?>" role="alert"><?php echo $alertMessage; ?></div>
<?php endif; ?>


<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Name" value="<?php echo isset($_POST["name"]) ? $name : "" ?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Email" value="<?php echo isset($_POST["email"]) ? $email : "" ?>">
    </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</body>
</html>