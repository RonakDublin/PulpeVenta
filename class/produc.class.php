<?php
class Producs
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

    public function get_productos()
    {
        try {
            $query = $this->dbh->prepare('select * from producto');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_producto($id)
    {
        try {
            $query = $this->dbh->prepare('delete from producto where codpro = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function insert_producto($descripcion,$cantidad,$precio)
    {
        try {
            $query = $this->dbh->prepare('insert into producto (codpro,descripcion,cantidad,precio) values(null,UPPER(?),?,?)');
            $query->bindParam(1, $descripcion);
            $query->bindParam(2, $cantidad);
            $query->bindParam(3, $precio);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_producto($id,$descripcion,$precio)
    {
        try {
            $query = $this->dbh->prepare('update producto SET descripcion = UPPER(?), precio = ? WHERE codpro = ?');
            $query->bindParam(1, $descripcion);
            $query->bindParam(2, $precio);
            $query->bindParam(3, $id);
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
