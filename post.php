<?php
    include 'lib/secure.php';
    include 'lib/connect.php';
    include 'lib/article.php';
    include 'lib/queryArticle.php';
    include 'lib/queryCategory.php';

    $title = ""; //タイトル
    $body = ""; //本文
    $title_alert = ""; //タイトルのエラー文
    $body_alert = ""; //本文のエラー文

    $queryCategory = new QueryCategory();
    $categories = $queryCategory->findAll();

    if(!empty($_POST['title']) && !empty($_POST['body']))
    {
        // titleとbodyがPOSTメソッドで送信されたとき
        $title = $_POST['title'];
        $body = $_POST['body'];

        $article = new Article();
        $article->setTitle($title);
        $article->setBody($body);

        if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])){
            $article->setFile($_FILES['image']);
        }

        if (!empty($_POST['category'])){
            $category = $queryCategory->find($_POST['category']);
            if ($category){
                $article->setCategoryId($category->getId());
            }
        }

        $article->save();

        header('Location: backend.php');
    }else if(!empty($_POST)){
        // POSTメソッドで送信されたが、titleかbodyが足りなとき
        // 存在する法は変数へ、ない場合空文字にしてフォームのvalueに設定する
        if(!empty($_POST['title'])){
            $title = $_POST['title'];
        }else{
            $title_alert = "タイトルを入力してください。";
        }

        if(!empty($_POST['body'])){
            $body = $_POST['body'];
        }else{
            $body_alert = "本文を入力してください。";
        }
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
    <?php include('lib/nav.php') ?>

    <main class="container">
        <div class="row">
            <div class="col-md-12">

                <h1>記事の投稿</h1>

                <form action="post.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">タイトル</label>
                        <?php echo !empty($title_alert)? '<div class="alert alert-danger">'.$title_alert.'</div>' : '' ?>
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">本文</label>
                        <?php echo !empty($body_alert)? '<div class="alert alert-danger">' .$body_alert.'</div>' : "" ?>
                        <textarea name="body" class="form-control" rows="10"><?php echo $body; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">カテゴリー</label>
                        <select name="category" class="form-control">
                            <option value="0">なし</option>
                            <?php foreach ($categories as $c): ?>
                                <option value="<?php echo $c->getId() ?>"><?php echo $c->getName() ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">画像</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">投稿する</button>
                    </div>
                </form>

            </div>
        </div>
    </main>

</body>
</html>