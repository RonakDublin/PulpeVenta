<?php
class Caja
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

    public function get_cierre()
    {
        try {
            $query = $this->dbh->prepare('select * from cierre order by idcierre DESC limit 5');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function insert_cierre($descrip,$saldoant,$entra,$sali,$ca,$salact,$impreti,$cbs,$fin,$ffin,$sta)
    {
        try {
            $query = $this->dbh->prepare('insert into cierre (idcierre,descri,saldoanterior,entradas,salidas,caja,saldoactual,importeretirar,cambio,fechain,fechafin,estado) values(null,UPPER(?),?,?,?,?,?,?,?,?,?,?)');
            $query->bindParam(1, $descrip);
            $query->bindParam(2, $saldoant);
            $query->bindParam(3, $entra);
            $query->bindParam(4, $sali);
            $query->bindParam(5, $ca);
            $query->bindParam(6, $salact);
            $query->bindParam(7, $impreti);
            $query->bindParam(8, $cbs);
            $query->bindParam(9, $fin);
            $query->bindParam(10, $ffin);
            $query->bindParam(11, $sta);
            $query->execute();
            //cierre tabla ventas
            $qu = $this->dbh->prepare('update venta SET estado = 1 WHERE estado = "0"');
            $qu->execute();
            //cierra tabla ingresos
            $tin = $this->dbh->prepare('update ingresos SET estado = 1 WHERE estado = "0"');
            $tin->execute();
            //cierra tabla compras
            $tco = $this->dbh->prepare('update compra SET estado = 1 WHERE estado = "0"');
            $tco->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_cambio()
    {
        try {
            $query = $this->dbh->prepare('SELECT fechafin, cambio FROM cierre where estado="1" order by idcierre desc limit 1');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

 public function get_compras()
    {
        try {
            $query = $this->dbh->prepare('SELECT sum(monto) as monto FROM compra WHERE estado = "0"');
            $query->execute();
            return $query->fetchColumn();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

public function get_ventas()
    {
        try {
            $query = $this->dbh->prepare('SELECT sum(total) as total FROM venta WHERE estado = "0"');
            $query->execute();
            return $query->fetchColumn();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

public function get_entradas()
    {
        try {
            $query = $this->dbh->prepare('SELECT sum(monto) as monto FROM ingresos WHERE estado = "0"');
            $query->execute();
            return $query->fetchColumn();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }


public function update_cierre()
    {
        try {
            $query = $this->dbh->prepare('update venta SET estado = 1 WHERE estado = "0"');

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
