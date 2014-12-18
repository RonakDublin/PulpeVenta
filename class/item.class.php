<?php
session_start();
class Articulos
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


    public function new_articulos($cod)
    {
        try {
//inicio

		$carrito = $_SESSION['cesta'];

			foreach($carrito as $id => $producto)
			{
			$datos = $cod;
			$itempro = $producto['Descri'];
			$npro = $producto['Codigo'];
			$cantpro = $producto['Ca'];
			$prepro = $producto['Pre'];


			$query = $this->dbh->prepare('insert into itemventa (codven,item,codprod,cantidad,precio,id) values(null,?,?,?,?,?)');

            $query->bindParam(1, $itempro);
            $query->bindParam(2, $npro);
            $query->bindParam(3, $cantpro);
            $query->bindParam(4, $prepro);
            $query->bindParam(5, $datos);
            $query->execute();


			}
//fin

            $this->dbh = null;
			//unset( $_SESSION['cesta']);
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
