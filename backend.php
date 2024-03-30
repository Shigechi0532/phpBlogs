<?php
    include 'lib/secure.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpBlogs Backend</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <style>
        body{
            padding-top: 5rem;
        }
        .bd-placeholder-ing{
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media(min-width:768px){
            .bd-placeholder-ing{
                font-size: 3.5rem;
            }
        }
        .bg-red{
            background-color: #ff6644 !important;
        }
    </style>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="./css/phpBlogs.css">
</head>
<body>
    <?php include('lib/nav.php'); ?>

    <main class="container">
        <div class="row">
            <div class="col-md-12">

                <p>本文を入れる。</p>

            </div>
        </div>
    </main>

</body>
</html>