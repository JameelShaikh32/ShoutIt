<?php 
    include 'database.php';
    include 'process.php';
?>
<?php
    //Creating query
    $query = "select * from shouts";
    $shouts = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/shout-style.css">
    <title>Shout It!</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Shout It! : ShoutBox</h1>
        </header>
        <div class="shouts">
            <ul>
                <?php while($row = mysqli_fetch_assoc($shouts)): ?>
                    <li id="spout"><span><?php echo $row['time'] ?> - </span><strong><?php echo $row['user'] ?></strong> : <?php echo $row['message'] ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <?php if(isset($_GET['error'])) : ?>
            <div class="errors" style="background: red;color:white;padding:5px;margin-bottom:20px;">
                <?php echo $_GET['error']; ?>
            </div>
        <?php endif; ?>
        <div class="inputs">
            <form method="post" action="process.php">
                <input type="text" name="user" placeholder="Enter your name">
                <input type="text" name="message" placeholder="Enter message"><br />
                <input type="submit" id="submit_btn" name="submit" value="Shout!">
            </form>
        </div>
    </div>
</body>
</html>