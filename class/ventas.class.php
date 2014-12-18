<?php
class Ventas
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

    public function get_maxid()
    {
        try {
            $query = $this->dbh->prepare('select nro from nrovent where idnro = 1');
            $query->execute();
            //return $query->fetchAll();
			return $query->fetchColumn();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }



    public function update_ventas()
    {
        try {
            $query = $this->dbh->prepare('update nrovent SET nro = nro+1 WHERE idnro = 1');

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
