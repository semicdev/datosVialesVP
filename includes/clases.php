<?php 
class conexion
  {     
    protected $conexion;
    const DB='pre_dec';
    const SERVER='localhost';
    const USER = "root";
    const PASS = "123";
    private $bd;

      function conectar() 
      {
        $this->conexion = new mysqli(self::SERVER,self::USER,self::PASS,self::DB);
        
        if ($this->conexion->connect_errno) 
         {
           printf("Error de Conexión'", $conexion->connect_error);
           exit();
         }

      }

      function query($consulta)
        {
        return $this->conexion->query($consulta);
        }

      function estaciones($consulta)//estaciones.php
      {
    
        $this->query->
      }      
 }
