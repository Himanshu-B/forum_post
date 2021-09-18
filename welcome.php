<?php include 'header.php' ?>

<?php
    if(isset($_SESSION['loggedin'])){

        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $content = $_POST['content'];
            // echo 'submit';
            if(!empty($title) && !empty($author) && !empty($content)){
                $sql = "INSERT INTO posts(title,author,content) VALUES('$title','$author','$content')";

                if(mysqli_query($conn, $sql)){
                    echo 'Post added successfully';
                }else{
                    echo 'ERROR: '.mysqli_error($conn);
                }
            }else{
                echo 'One Or More Blank Fields';
            }
        }
    }else{
        header("location: index.php");
    }
?>

<section class="greeting">
    <div>
        <p>Welcome, "<?php echo $_SESSION['user']; ?>" starting creating forum/post you want to discuss about.</p>
        <small>Tip:Use below tools to get started</small>
    </div>
</section>

<section class="box">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="my-post">
        <h1 style="text-align:center">Add Post</h1>
        <div class="form-control">
            <label for="">Title</label>
            <input type="text" name="title" id="">
        </div>
        <div class="form-control">
            <label for="">Author</label>
            <input type="text" name="author" id="" value="<?php echo $_SESSION['user']; ?>" readonly='readonly'>
        </div>
        <div class="form-control">
            <label for="">Content</label>
            <textarea name="content" id="" cols="30" rows="10"></textarea>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
</section>

<br>
<?php include 'footer.php' ?>