<?php

class Processo {

    private static $id = 1;
    private $UCP; // tempo de uso do processador
    private $UCP_remaining; // tempo restante de uso do processador
    private $PID; // id do processo
    private $Rounds; // quantidade de vezes que o processo recebeu tempo de execução;

    public function __construct()
    {
        $this->PID = self::$id++;
        $this->UCP = rand(2,10);
        $this->UCP_remaining = $this->UCP;
    }

    //função para simular o consumo do processador executando alguma tarefa
    public function execute(int $quantum){
        $this->Rounds++;
        $this->UCP_remaining -= $quantum;
        if ( $this->UCP_remaining <=0 ){
            $UCP_LeftOver = -$this->UCP_remaining;
            print( "PID($this->PID): Processo terminou sua execução, tempo original de UCP: $this->UCP,");
            print(" Quantidade de vezes em execução: $this->Rounds, Sobra de UCP: $UCP_LeftOver;\n");
            return false;
        }
        print("PID($this->PID): Tempo original de UCP: $this->UCP, Tempo restante de UCP: $this->UCP_remaining");
        print(" Quantidade de vezes em execução: $this->Rounds, valor do quantum: $quantum\n");
        return true;
    }
}