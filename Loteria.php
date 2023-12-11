<?php

print('Selecione o jogo ' . "\n");
print(' 1-MEGA-SENA' . "\n");
print(' 2-QUINA' . "\n");
print(' 3-LOTOMANIA' . "\n");
print(' 4-LOTOFACIL' . "\n");

do {

    $jogo_escolhido = readline();
} while ($jogo_escolhido < 1 || $jogo_escolhido > 4);


if ($jogo_escolhido == 1) {
    print("Bem Vindo ao Jogo da MEGA-SENA!\n\n");

    $numero_apostas = 0;
    $minimo = 6;
    $maximo = 21;
    $intervalo = 60;
    $valores = [
        6 => 5,
        7 => 35,
        8 => 128,
    ];
    $valor_gasto = 0;

    print("Quantas apostas você deseja fazer? "); 

    do {  
        $numero_apostas = readline();
    } while ($numero_apostas < 0 || $numero_apostas > 10 );


    for ($i=0; $i < $numero_apostas; $i++) { 
        $x = sortear($minimo, $maximo, $intervalo);
        $valor_gasto +=  $valores[$x];
    }

   

    print("Essa aposta custou " . $valor_gasto . " reais." );


}

else if ($jogo_escolhido == 2) {

    print("Bem Vindo ao jogo da QUINA!");

    $minimo = 5;
    $maximo = 18;
    $intervalo = 80;

    sortear($minimo, $maximo, $intervalo);
}

else if ($jogo_escolhido == 3) {

    print("Bem Vindo ao jogo da LOTOMANIA!");

    //codigo da lotomania


}

function sortear($minimo, $maximo, $intervalo): int {
    
    $sorteados = [];
    $numero_de_dezenas = 0;

    print("Quantas dezenas vocề quer apostar? "); 

    do {  
        $numero_de_dezenas = readline();
    } while ($numero_de_dezenas < $minimo || $numero_de_dezenas > $maximo );

    //sortear as dezenas
    for ($i=0; $i < $numero_de_dezenas ; $i++) { 
        $sorteado = rand(1,$intervalo);

        if (in_array($sorteado, $sorteados)){
            $i-- ;
        }
        else{

            $sorteados[] = $sorteado; 
        }
       
    }

    //ordenar a lista
    sort($sorteados);


    //exibir os numeros sorteados
    foreach ($sorteados as $numero) {
        print("$numero - ");
    }
    
    return $numero_de_dezenas;
}
