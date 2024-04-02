<?php
    include 'lib/connect.php';
    include 'lib/queryArticle.php';
    include 'lib/article.php';

    $queryArticle = new QueryArticle();

    if (!empty($_GET['id'])){
        $id = intval($_GET['id']);
        $article = $queryArticle->find($id);
    } else {
        $article = null;
    }
    $monthly = $queryArticle->getMonthlyArchiveMenu();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpBlogs</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <style>
        body{
            padding-top: 5rem;
        }
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

    <!-- Custom style for this template -->
    <link rel="stylesheet" href="./css/phpblogs.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/phpBlogs/">My Blog</a>
        </div>
    </nav>

    <main class="container">
        <div class="row">
            <div class="col-md-8">

                <?php if($article): ?>
                    <article class="blog-post">
                        <h2 class="blog-post-title"><?php echo $article->getTitle() ?></h2>
                        <p class="blog-post-meta"><?php echo $article->getCreatedAt() ?></p>
                        <?php echo nl2br($article->getBody()) ?>
                        <?php if($article->getFilename()): ?>
                            <div>
                                <a href="./album/<?php echo $article->getFilename() ?>" target="_blank">
                                    <img src="./album/thumbs-<?php echo $article->getFilename() ?>" class="img-fluid">
                                </a>
                            </div>
                        <?php endif ?>
                    </article>
                <?php else: ?>
                    <div class="alert alert-success">
                        <p>記事はありません。</p>
                    </div>
                <?php endif ?>

            </div>

            <div class="col-md-4">
                <div class="p-4 mb-3 bg-light rounded">
                    <h4>ブログについて</h4>
                    <p class="mb-0">毎日のなんてことない日常を描いていきます。</p>
                </div>
                <div class="p-4 mb-3 bg-light-rounded">
                    <h4>アーカイブ</h4>
                    <ol class="list-unstyled mb-0">
                        <?php foreach($monthly as $m): ?>
                            <li><a href="index.php?month=<?php echo $m['month'] ?>"><?php echo $m['month'] ?> (<?php echo $m['count'] ?>)</a></li>
                        <?php endforeach ?>
                    </ol>
                </div>
            </div>
        </div>
    </main>
</body>
</html>