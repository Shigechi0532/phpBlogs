<?php
class connect{
    const DB_NAME = "phpBlogs";
    const HOST = "db";
    const USER = "root";
    const PASS = "password";

    protected $dbh;

    public function __construct(){
        $dsn = "mysql:host=".self::HOST.";dbname=".self::DB_NAME.";charset=utf8mb4";
        try{
            // PDOのインスタンスをクラス変数に格納する
            $this->dbh = new PDO($dsn, self::USER, self::PASS);

        }catch(PDOException $e){
            // Exceptionが発生したら表示して終了
            exit($e->getMessage());
        }

        // DBのエラーを表示するモードを設定
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function query($sql,$param=null){
        // プリペア度ステートメントを作成し、SQL文を実行する準備をする
        $stmt = $this->dbh->prepare($sql);
        // パラメータを割り当てて実行し、結果セットを返す
        $stmt->execute($param);
        return $stmt;
    }
}
?>