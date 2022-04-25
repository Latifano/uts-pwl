<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Ikromi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="user.php">User</a>
                    <a class="nav-link active" aria-current="page" href="inputUser.php">Input</a>
                </div>
                </div>
            </div>
	    </nav>
    <!-- Akhir Navbar -->

    <br>
    
    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <h3 align="center">Add User</h3> <br>
            <!-- Awal Kondisi Untuk mengecek apakah password & cpassword sama/tidak-->
            <!-- $_GET msg diambil melalui url dan mengirim pesan success atau not-match-->
            <?php 
                if(isset($_GET['msg']))
                {
                    if($_GET['msg']=='not-match')
                    {
            ?>
            <!-- alert = mengirim peringatan bahwa pw & cpw tidak sama-->
                <div class="alert alert-danger">Password & Confirm Password Not Match !</div>
            <?php 
                    }
                    elseif($_GET['msg']=='success'){
            ?>
            <!-- alert = mengirim peringatan bahwa pw & cpw berhasil dibuat-->
                <div class="alert alert-success">User Created !</div>
             <?php 
                    }
                }
            ?>
             <!-- Akhir Kondisi Untuk mengecek apakah password & cpassword sama/tidak-->
            

            <!-- Awal Form -->
            <form action="save_formUser.php" method="post" class="form-group">
                <label> <b>Username *</b></label>
                <input class="form-control" type="text" name="username" required> <br>
                <label> <b>Email *</b></label>
                <input class="form-control" type="text" name="email" required> <br>
                <label> <b>Password *</b></label>
                <input class="form-control" type="password" name="password" required> <br>
                <label> <b>Confirm Password *</b></label>
                <input class="form-control" type="password" name="cpassword" required> <br>
                <input class="btn btn-success" value="Save" type="submit"></input>
                <a class="btn btn-primary" href="user.php">Back</a>
            </form>
            <!-- Akhir Form -->
        </div>

        <div class="col-md-4"></div>
    </div>
    
</body>
</html>