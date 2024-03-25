<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpBlogs</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <style>
        .bd-placeholder-img{
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media(min-width:768px){
            .bd-placeholder-img-lg{
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="./css/signin.css">
</head>
<body class="text-center">
    <main class="form-signin">
        <form>
            <h1 class="h3 mb-3 fw-normal">ログインする</h1>
            <label class="visually-hidden">ユーザー名</label>
            <input type="text" name="name" class="form-control" placeholder="ユーザー名" required autofocus>
            <label class="visually-hidden">パスワード</label>
            <input type="password" name="password" class="form-control" placeholder="パスワード" required>
            <button class="w-100 mb-3 btn-primary" type="submit">ログインする</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
        </form>
    </main>
</body>
</html>