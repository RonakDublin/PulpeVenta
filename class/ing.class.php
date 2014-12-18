<?php
class Ing
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

    public function get_ing()
    {
        try {
            $query = $this->dbh->prepare('select * from ingresos ORDER BY idcom DESC limit 5');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_shop($id)
    {
        try {
            $query = $this->dbh->prepare('delete from ingresos where idcom = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function insert_ing($un,$do,$tr,$cu,$ci)
    {
        try {
            $query = $this->dbh->prepare('insert into ingresos (idcom,fecha,descripcion,concepto,nro,monto) values(null,?,UPPER(?),UPPER(?),?,?)');
            $query->bindParam(1, $un);
            $query->bindParam(2, $do);
            $query->bindParam(3, $tr);
            $query->bindParam(4, $cu);
            $query->bindParam(5, $ci);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_shop($id,$u,$d,$t,$c,$ci)
    {
        try {
            $query = $this->dbh->prepare('update ingresos SET fecha = ?, descripcion = UPPER(?), concepto = UPPER(?), nro = ?, monto = ? WHERE idcom = ?');
            $query->bindParam(1, $u);
            $query->bindParam(2, $d);
            $query->bindParam(3, $t);
            $query->bindParam(4, $c);
            $query->bindParam(5, $ci);
            $query->bindParam(6, $id);
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
