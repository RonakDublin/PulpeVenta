<?php
class Pan
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

    public function get_usuarios()
    {
        try {
            $query = $this->dbh->prepare('select * from usuario');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_pan($id)
    {
        try {
            $query = $this->dbh->prepare('delete from usuario where codusu = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function insert_pan($un,$do,$tr,$cu,$ci)
    {
        try {
            $query = $this->dbh->prepare('insert into usuario (codusu,nombre,correo,user,pass,tipo) values(null,UPPER(?),?,?,?,?)');
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

    public function update_pan($id,$un,$do,$tr,$cu)
    {
        try {
            $query = $this->dbh->prepare('update usuario SET nombre = UPPER(?), correo = ?, user = ?, pass = ? WHERE codusu = ?');
            $query->bindParam(1, $un);
            $query->bindParam(2, $do);
            $query->bindParam(3, $tr);
            $query->bindParam(4, $cu);
            $query->bindParam(5, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



/*	public function get_busca($nom)
    {
        try {
            $query = $this->dbh->prepare('select * from cliente where nombre like ?');
            $query->bindValue(1, $nom,PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }*/



    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
}
?>
