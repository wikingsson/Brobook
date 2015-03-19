<?php session_start();
        $_SESSION['email'] = "anka@kalle.se";
?>
<?php
        if(isset($_POST['submit'])){
                move_uploaded_file($_FILES['file']['tmp_name'],"img/".$_FILES['file']['name']);
                $con = mysqli_connect("localhost","root","root","brobook");
                $q = mysqli_query($con,"UPDATE users SET profile_img = '".$_FILES['file']['name']."' WHERE email = '".$_SESSION['email']."'");
        }
?>
 
<!DOCTYPE html>
<html>
        <head>
       
        </head>
        <body>
                <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <input type="submit" name="submit">
                </form>
               
               
                <?php
                       $con = mysqli_connect("localhost","root","root","brobook");
                        $q = mysqli_query($con,"SELECT * FROM users");
                        while($row = mysqli_fetch_assoc($q)){
                                echo $row['firstname'];
                                if($row['profile_img'] == ""){
                                        echo "<img width='100' height='100' src='img/default.jpg' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='100' height='100' src='img/".$row['profile_img']."' alt='Profile Pic'>";
                                }
                                echo "<br>";
                        }
                ?>
        </body>
</html>