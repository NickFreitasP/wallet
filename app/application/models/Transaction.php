<?php 

namespace app\application\models;

use Exception;
use DateTime;


class Transaction{

 
 private float $valor;
 private string $tipo;
//  private string $categoria;
 private DateTime $data;


  public function setValor(float $valor) : void
  {
 
    if(!$valor || gettype($valor) == "float" ){
         throw new Exception("Valor inválido");   
    }

    $this->valor = $valor;
 
  }

  public function setTipo(string $tipo) : void
  {
  
     switch($tipo){
    
      case "entrada" : 
        $this->tipo = $tipo;
        break;     
      
      case "saida" :
        $this->tipo = $tipo; 
        break;

      default:
        throw new Exception("Tipo de transação inválida");
        break;      

     }

  } 
 
  public function setData() : void
  {
  
    $data = date("Y-m-d H:i:s");
    $data = date_create_from_format('Y-m-d H:i:s',$data);
    $this->data = $data;
  }


   public function getValor() : float
   {
   
      return $this->valor;

   }
 
   public function getTipo() : string 
   {

     return $this->tipo;

   }

   public function getData() : DateTime
   {
      
     return $this->data;

   }
     
   public function __debugInfo() :array
   {
     
     return [
        "valor" => $this->valor,
        "data" => $this->data,
        "tipo" => $this->tipo

     ];
   

   }


}

?>