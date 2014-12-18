<?php
class Nuevov
{
    private static $instanciapro;
    private $dbh;

    private function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=ventas', 'root', '');
            $this->dbh->exec("SET CHARACTER SET utf8");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    public static function singleton()
    {
        if (!isset(self::$instanciapro)) {
            $miclasepro = __CLASS__;
            self::$instanciapro = new $miclasepro;
        }
        return self::$instanciapro;
    }



    public function insert_nuevaventa($codigo,$fecventa,$cliventa,$totventa)
    {
        try {
            $query = $this->dbh->prepare('insert into venta (codven,fecha,cliente,total) values(?,?,?,?)');
            $query->bindParam(1, $codigo);
            $query->bindParam(2, $fecventa);
            $query->bindParam(3, $cliventa);
            $query->bindParam(4, $totventa);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


	public function nuevo_valores($codigo,$itempro,$npro,$cantpro,$prepro)
    {
        try {
            $query = $this->dbh->prepare('insert into itemventa (codven,item,codprod,cantidad,precio) values(?,?,?,?,?)');
            $query->bindParam(1, $codigo);
            $query->bindParam(2, $itempro);
            $query->bindParam(3, $npro);
            $query->bindParam(4, $cantpro);
            $query->bindParam(5, $prepro);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
}
?>
