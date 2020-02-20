 <?php

  class Estudiantes extends DataBase
  {
    public $ID;
    public $NOMBRE;
    public $APELLIDO;
    public $EMAIL;

    public function listarEstudiantes()
    {
      try {
        parent::Conexion();
        $sql = "SELECT * FROM tredasolutions.estudiante";
        $qry = $this->dbCon->prepare($sql);
        $qry->execute();
        $row = $qry->fetchAll(PDO::FETCH_OBJ);
        $qry->closeCursor();
        return $row;
        $this->dbCon = null;
      } catch (PDOException $e) {
        die("Ha ocurrido un error inesperado en la base de datos.<br>" . $e->getMessage());
      }
    }
  }

  ?>
