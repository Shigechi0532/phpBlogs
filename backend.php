<?php
    session_start();
    if(!isset($_SESSION["id"])){
        header('Location: login.php');
    }
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
    <nav class="navbar navbar-expand-md navbar-dark bg-red fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/phpBlogs/backend.php">My Blog Backend</a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item"><a class="nav-link" href="#">記事を書く</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="row">
            <div class="col-md-12">

                <p>本文を入れる。</p>

            </div>
        </div>
    </main>
    
</body>
</html>