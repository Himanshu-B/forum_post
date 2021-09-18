<?php include 'header.php' ?>

<?php
    if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        if(!empty($email) && !empty($pass)){
            $sql = "SELECT * FROM users WHERE email='$email' AND pass='$pass'";
            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($query);
            $result = mysqli_num_rows($query);
            if($result == 1){
               session_start();
               $_SESSION['loggedin'] = true;
               $_SESSION['user'] = $data['fullname'];
               header("location:welcome.php");
            }else{
                echo 'Invalid Credentials';
            }
        }else{
            echo 'Fill out Fields';
        }
    }
?>

<!-- <section class="alert-msg">
    <p>Fill Out Fields</p>
</section> -->

        <section class="box">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h1 style="text-align:center">Login Here</h1>
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="form-control">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass">
                </div>
                    <input type="submit" name="submit" value="Submit">
            </form>
        </section>

<?php include 'footer.php' ?>