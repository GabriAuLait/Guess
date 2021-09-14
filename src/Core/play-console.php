<?php

require '../../vendor/autoload.php';

echo "*** Création d'un jeu de 32 cartes.***\n";
$cardGame = App\Core\CardGame32::factoryCardGame32();
$randCard = rand(0,51);
echo " ==== Instanciation du jeu, début de la partie. ==== \n";
$game =  new App\Core\Guess($cardGame, $cardGame->getCard($randCard), false);
$fin=false;
while($fin==false){

$userCardIndex = readline("Entrez une position de carte dans le jeu : ");

while($userCardIndex < 0 || $userCardIndex > 51){
  $userCardIndex = readline("Mauvaise proposition : Entrez une position de carte dans le jeu : ");
}

// code naïf, car aucun contrôle de validité de $userCardIndex...
$userCard = $cardGame->getCard($userCardIndex);

if ($game->isMatch($userCard)) {
  echo "Bravo ! \n";
  $fin=true;
} else {
  echo "Loupé !\n";
  if ($randCard < $userCardIndex){
    echo "Plus petit !\n";
  }else{
    echo "Plus grand !\n";
  }
}
}
echo " ==== Fin prématurée de la partie ====\n";
echo "*** Terminé ***\n";