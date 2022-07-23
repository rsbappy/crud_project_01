<?php
session_start([
    'cookie_lifetime' => 300,
]);
$error = false;
//session_destroy();
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ('admin' == $_POST['username'] && '6d0ebbbdce32474db8141d23d2c01bd9628d6e5f' == sha1($_POST['password'])) {
        $_SESSION['logged'] = true;
    } else {
        $error = true;
        $_SESSION['logged'] = false;
    }
}

if (isset($_POST['logout'])) {
    $_SESSION['logged'] =  false;
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Example</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <style>
    body {
        margin-top: 30px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h2>Simple Auth Example</h2>
            </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">

                <?php
                echo  sha1('rabbit') . "<br/>";
                if (true == $_SESSION['logged']) {
                    echo "hello admin, Welcome!";
                } else {
                    echo "Hello Stranger, login below";
                }


                ?>




            </div>
        </div>
        <div class="row" style="margin-top:100px;">
            <div class="column column-60 column-offset-20">

                <?php
                if ($error) {
                    echo  "<blockquote> username &  password didn't match</blockquote>";
                }

                if (false == $_SESSION['logged']) :  ?>
                <form method="POST">
                    <label for=username>Username</label>
                    <input type="text" name='username' id="username">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <button type="submit" class="button-primary" name="submit">Log In</button>
                </form>
                <?php else : ?>
                <form method="POST">
                    <input type="hidden" name="logout" value="1">
                    <button type="submit" class="button-primary" name="submit">Log Out</button>
                </form>

                <?php endif; ?>



            </div>
        </div>
    </div>