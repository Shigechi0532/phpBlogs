<?php
class connect{
    const DB_NAME = "php";
    const HOST = "220c65c035c68ab480c9ac44ac06a000e070f24e15fa56d19a3ef04697b03a97";
    const USER = "root";
    const PASS = "password";

    private $dbh;

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

    public function query($sql,$parm=null){
        // プリペア度ステートメントを作成し、SQL文を実行する準備をする
        $stmt = $this->dbh->prepare($sql);
        // パラメータを割り当てて実行し、結果セットを返す
        $stmt->execute($parm);
        return $stmt;
    }
}
?>