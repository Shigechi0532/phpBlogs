<?php
    include 'lib/secure.php';
    include 'lib/connect.php';
    include 'lib/queryArticle.php';
    include 'lib/article.php';

    $limit = 10;
    $page = 1;

    // ページ数の決定
    if(!empty($_GET['page']) && intval($_GET['page']) > 0){
        $page = intval($_GET['page']);
    }

    $queryArticle = new QueryArticle();
    $articles = $queryArticle->getPager($page,$limit);
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

                <h1>記事一覧</h1>

                <?php if ($articles): ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>タイトル</th>
                                <th>本文</th>
                                <th>画像</th>
                                <th>作成日</th>
                                <th>更新日</th>
                                <th>編集</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( $pager['$articles'] as $article ): ?>
                                <tr>
                                    <td><?php echo $article->getId() ?></td>
                                    <td><?php echo $article->getTitle() ?></td>
                                    <td><?php echo $article->getBody() ?></td>
                                    <td><?php echo $article->getFilename()? '<img scr="./album/thumbs-'.$article->getfilename().'">' : 'なし' ?></td>
                                    <td><?php echo $article->getCreatedAt() ?></td>
                                    <td><?php echo $article->getUpdatedAt() ?></td>
                                    <td><a href="edit.php?id=<?php echo $article->getId() ?>" class="btn btn-success">編集</a></td>
                                    <td><a href="delete.php ? id=<?php echo $article->getId() ?>" class="btn btn-danger">削除</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">
                        <p>記事はありません。</p>
                    </div>
                <?php endif ?>

                <?php if(!empty($pager['total'])): ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php for($i = 1; $i <= ceil($pager['total'] / $limit); $i++): ?>
                                <li class="page-item"><a class="page-link" href="backend.php=<?php echo $i ?>"></a></li>
                            <?php endfor ?>
                        </ul>
                    </nav>
                <?php endif ?>
            </div>
        </div>
    </main>

</body>
</html>