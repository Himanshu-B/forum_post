<?php include 'header.php' ?>

<?php
    $showbtn='';
    if(isset($_SESSION['loggedin'])){
        $showbtn = true;
        if(isset($_POST['delete'])){
            $del_id=$_POST['delete_id'];
            $del_query = "DELETE FROM posts WHERE post_id={$del_id}";
            if(mysqli_query($conn, $del_query)){
                header('location: index.php');
            }else{
                echo 'ERROR: '.mysqli_error($conn);
            }
        }
    }
    $query = "SELECT * FROM posts";
    $result = mysqli_query($conn, $query);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);   

    // mysqli_free_result($result);
    // mysqli_close($conn);
?>

        <section class="main">
            <h1>Forum to discuss </h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto nihil doloremque eveniet modi vel dolores quaerat consectetur, officiis accusamus excepturi, harum id quod fuga, tempore consequatur recusandae iste ad explicabo!</p>
        </section>

        <section class="posts">
            <?php foreach($posts as $post): ?>
                <div class="card">
                    <h1><?php echo $post['title']; ?></h1>
                    <p><?php echo $post['content']; ?></p>
                    <br>
                    <p>Created By "<?php echo $post['author']; ?>"</p>
                    <?php if($showbtn): ?>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="delete_id" value="<?php echo $post['post_id']; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>

<?php include 'footer.php' ?>