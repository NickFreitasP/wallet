<?php 
 
namespace App\application\services;

use App\application\models\Transaction;
use Exception;

 class WalletService {

    private array $transactions = [];
    private float $saldo = 0;
    

    public function addTrasaction(Transaction $transaction){

         $tipo_transaction = $transaction->getTipo();
         
         if($tipo_transaction == "entrada"){
              
            $this->saldo += $transaction->getValor();

         }
         else if ($tipo_transaction == "saida"){
             
            if($transaction->getValor() >= $this->saldo ){

                  throw new Exception("Saldo insuficiente.");

            }
            else{
                
                $this->saldo -= $transaction->getValor();
            }

         }          
   
         $this->transactions[] = $transaction;

    } 

    public function getTrasactions(string  $tipo = "") : array
    {

       $saida = [];
       
       switch($tipo){

         case  "entrada" :
             foreach ($this->transactions as $key => $value) {
                if($value->getTipo() == "entrada"){
                  $saida[] = $value;
                } 
               
             }
          break;

         case  "saida" :
             foreach ($this->transactions as $key => $value) {
                if($value->getTipo() == "saida"){
                  $saida[] = $value;
                } 
               
             }
          break;

          default :

             $saida =  $this->transactions;
             break;
         
         }
      
     return $saida;

     }
   
    public function getSaldo() : float {

      return $this->saldo;

    }

 }





?>