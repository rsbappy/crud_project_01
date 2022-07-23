<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Example</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">


    <style>
    .btn_task {
        background-color: black;
        color: white;
        margin: 0px 7px;
        padding: 15px;
        font-weight: bold;
        border-radius: 10px;

    }


    .btn_task:hover {
        color: yellow;
    }
    </style>
</head>

<body>

    <p>
        <a class="btn_task" href="/learnphp/crud/index.php?task=report">All Students</a>
        <a class="btn_task" href="/learnphp/crud/index.php?task=add">Add New Student</a>
        <a class="btn_task" href="/learnphp/crud/index.php?task=seed">Seed</a>
    </p>
</body>

</html>