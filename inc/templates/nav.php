

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Example</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">


<!--    <style>-->
<!--    .btn_task {-->
<!--        background-color: black;-->
<!--        color: white;-->
<!--        margin: 0px 7px;-->
<!--        padding: 15px;-->
<!--        font-weight: bold;-->
<!--        border-radius: 10px;-->
<!---->
<!--    }-->
<!---->
<!---->
<!--    .btn_task:hover {-->
<!--        color: yellow;-->
<!--    }-->
<!--    </style>-->
</head>

<body>
    <div style="border-bottom: 1px solid; border-color:#eee; padding-bottom: 30px; margin-bottom:30px;">
        <div class="float-left">
        <p>
            <a class="btn_task" href="/learnphp/crud/index.php?task=report">All Students </a>
            <?php if (hasPrivilege()): ?>|
            <a class="btn_task" href="/learnphp/crud/index.php?task=add">Add New Student </a>
            <?php endif; ?>
            <?php if (isAdmin()): ?>
            |
            <a class="btn_task" href="/learnphp/crud/index.php?task=seed">Seed</a>
            <?php endif; ?>
        </p>


            </div>

        <div class="float-right">
            <?php

            if ( ! @$_SESSION['loggedin'] ):
                ?>
                <a href="/learnphp/crud/auth.php">Log In</a>
            <?php
            else:
                ?>
                <a href="/learnphp/crud/auth.php?logout=true">Log Out (<?php echo $_SESSION['role']; ?>)</a>
            <?php
            endif;
            ?>
        </div>


    </div>
</body>

</html>