<?php
class Guias
{
    private static $instancia;
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
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function guia_uno()
    {
        try {
            $query = $this->dbh->prepare('SELECT COUNT( * ) AS total FROM venta WHERE fecha = curdate( )');
            $query->execute();
            //return $query->fetchAll();
			return $query->fetchColumn();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }


	public function guia_dos()
    {
        try {
            $query = $this->dbh->prepare('SELECT * from totalmes');
            $query->execute();
            //return $query->fetchAll();
			return $query->fetchColumn();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }


	public function guia_tres()
    {
        try {
            $query = $this->dbh->prepare('SELECT count( * ) FROM producto');
            $query->execute();
            //return $query->fetchAll();
			return $query->fetchColumn();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }


	public function guia_cuatro()
    {
        try {
            $query = $this->dbh->prepare('SELECT count( * ) FROM cliente');
            $query->execute();
            //return $query->fetchAll();
			return $query->fetchColumn();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
}
?>
