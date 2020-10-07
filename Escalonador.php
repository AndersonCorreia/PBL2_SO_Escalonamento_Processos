<?php

require 'Processo.php';

class Escalonador {
    public $fila_0 = [];
    public $fila_1 = [];
    
    public function addProcessos($qtd_p) {
        for( $i = 0; $i < $qtd_p; $i++){
            $this->fila_0[] = new Processo();   //adicionando novos processos na fila 0
        }
    }

    public function run(){
        $processo_ativos = true;
        while($processo_ativos){
            print("\n Quantidade de processos na fila 0: ".count($this->fila_0));
            print("\n Quantidade de processos na fila 1: ".count($this->fila_1));
            print("\n");
            $processo = array_shift($this->fila_0); // tirando um processo do inicio da fila
            if( $processo){
                if( $processo->execute(1)){     //executando com quantum 1
                    array_push($this->fila_1, $processo);//se ainda resta tempo de execução adicionar no final da proxima fila
                }
                $sort = rand(0, 10); //para adicionar procceso aleatoriamente
                if ( $sort == 5){
                    print("\n adcionando novo processo a fila 0");
                    $this->addProcessos(1);
                }
            }
            else {  // se a fila 0 está vazia
                $processo = array_shift($this->fila_1); // tirando um processo do inicio da fila 1
                if( $processo){
                    $sort = rand(0, 10); //para adicionar procceso aleatoriamente
                    if ( $sort == 5){
                        print("\n adcionando novo processo a fila 0 e interrompido processo da fila 1");
                        $this->addProcessos(1);//
                        array_push($this->fila_0, $processo);//adcionando processo interrompido para a fila de maior prioridade
                    }
                    else if( $processo->execute(2)){        //executando com quantum 2
                            array_push($this->fila_1, $processo);//se ainda resta tempo de execução adicionar no final da fila
                    }
                }
                else {      // se a ultima fila esta vazia todos os processo terminaram sua execução
                    $processo_ativos = false;
                }
            }
        }
    }
}