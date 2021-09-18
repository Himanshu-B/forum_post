<?php include 'header.php' ?>

<?php
    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $cpass=$_POST['cpass'];
        if(!empty($fname)&&!empty($email)&&!empty($pass)&&!empty($cpass)){
            if($pass==$cpass){
                $sql = "INSERT INTO users(fullname,email,pass) VALUES('$fname','$email','$pass')";
                if(mysqli_query($conn,$sql)){
                    echo 'Registered Successfully';
                }else{
                    echo 'Failed Brutally';
                }
            }else{
                echo 'Password does not match with Confirm Password';
            }
        }else{
            echo 'Empty fields one or more';
        }
    }
?>

        <section class="box">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h1 style="text-align:center">Register Here</h1>
                <div class="form-control">
                    <label for="fname">Full Name</label>
                    <input type="text" name="fname" id="fname">
                </div>
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="form-control">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass">
                </div>
                <div class="form-control">
                    <label for="cpass">Confirm Password</label>
                    <input type="password" name="cpass" id="cpass">
                </div>
                    <input type="submit" name="submit" value="Submit">
            </form>
        </section>

<?php include 'footer.php' ?>