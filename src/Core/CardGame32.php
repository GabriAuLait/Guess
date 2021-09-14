<?php

namespace App\Core;

/**
 * Class CardGame32 : un jeu de cartes.
 * @package App\Core
 */
class CardGame32
{
  /**
   * @var $cards array a array of Cards
   */
  private $cards;

  /**
   * Guess constructor.
   * @param array $cards
   */
  public function __construct(array $cards)
  {
    $this->cards = $cards;
  }

  /**
   * Brasse le jeu de cartes
   */
  public function shuffle()
  {
    // TODO (voir les fonctions sur les tableaux)
    shuffle($this->cards);
  }

  // TODO ajouter une méthode reOrder qui remet le paquet en ordre

  /** définir une relation d'ordre entre instance de Card.
   * à valeur égale (name) c'est l'ordre de la couleur qui prime
   * carreau > pique > coeur > trèfle
   * Attention : si AS de Coeur est plus fort que AS de Trèfle,
   * 2 de Coeur sera cependant plus faible que 3 de Trèfle
   *
   *  Remarque : cette méthode n'est pas de portée d'instance (static)
   *
   * @see https://www.php.net/manual/fr/function.usort.php
   *
   * @param $c1 Card
   * @param $c2 Card
   * @return int
   * <ul>
   *  <li> zéro si $c1 et $c2 sont considérés comme égaux </li>
   *  <li> -1 si $c1 est considéré inférieur à $c2</li>
   * <li> +1 si $c1 est considéré supérieur à $c2</li>
   * </ul>
   *
   */
  public static function compare(Card $c1, Card $c2) : int
  {
    // TODO code naïf, et de plus il faudra prendre en compte la couleur !
    $order_colors = ['carreau'=>4 ,'pique'=>3 ,'coeur'=>2 ,'trèfle'=>1];
    $orders_name = ['as'=>13 , '2'=>1 , '3'=>2 , '4'=>3, '5'=>4, '6'=>5, '7'=>6, '8'=>7, '9'=>8, '10'=>9, 'valet'=>10, 'reine'=>11, 'roi'=>12];

    $c1Name = strtolower($c1->getName());
    $c2Name = strtolower($c2->getName());
    $c1Color = strtolower($c1->getColor());
    $c2Color = strtolower($c2->getColor());

    if ($orders_name[$c1Name] === $orders_name[$c2Name]) {
      if ($order_colors[$c1Color] === $order_colors[$c2Color]) {
        return 0;
      }
      return ($order_colors[$c1Color] > $order_colors[$c2Color]) ? +1 : -1;
    }
    return ($orders_name[$c1Name] > $orders_name[$c2Name]) ? +1 : -1;
  }

 // TODO manque PHPDoc
  public static function factoryCardGame32() : CardGame32 {
     // TODO création d'un jeu de 52 cartes
    $cardGame = new CardGame32([new Card('As', 'Trèfle'), new Card('2', 'Trèfle'), new Card('3', 'Trèfle'), new Card('4', 'Trèfle'), new Card('5', 'Trèfle'), new Card('6', 'Trèfle'), new Card('7', 'Trèfle'), new Card('8', 'Trèfle'), new Card('9', 'Trèfle'), new Card('10', 'Trèfle'), new Card('Valet', 'Trèfle'), new Card('Reine', 'Trèfle'), new Card('Roi', 'Trèfle'), new Card('As', 'Coeur'), new Card('2', 'Coeur'), new Card('3', 'Coeur'), new Card('4', 'Coeur'), new Card('5', 'Coeur'), new Card('6', 'Coeur'), new Card('7', 'Coeur'), new Card('8', 'Coeur'), new Card('9', 'Coeur'), new Card('10', 'Coeur'), new Card('Valet', 'Coeur'), new Card('Reine', 'Coeur'), new Card('Roi', 'Coeur'), new Card('As', 'Pique'), new Card('2', 'Pique'), new Card('3', 'Pique'), new Card('4', 'Pique'), new Card('5', 'Pique'), new Card('6', 'Pique'), new Card('7', 'Pique'), new Card('8', 'Pique'), new Card('9', 'Pique'), new Card('10', 'Pique'), new Card('Valet', 'Pique'), new Card('Reine', 'Pique'), new Card('Roi', 'Pique'), new Card('As', 'Carreau'), new Card('2', 'Carreau'), new Card('3', 'Carreau'), new Card('4', 'Carreau'), new Card('5', 'Carreau'), new Card('6', 'Carreau'), new Card('7', 'Carreau'), new Card('8', 'Carreau'), new Card('9', 'Carreau'), new Card('10', 'Carreau'), new Card('Valet', 'Carreau'), new Card('Reine', 'Carreau'), new Card('Roi', 'Carreau')]);

    return $cardGame;
  }

  //vérifie que le nombre donner apr l'utilisateur est valide
  // TODO manque PHPDoc
  public function getCard($index) : Card {
    // TODO naïf
    if ($index > 51){
      $index = $index % 52;
    }
    while($index < 0){
      $index=$index+52;
    }
    return  $this->cards[$index];
  }

  public function __toString()
  {
    return 'CardGame32 : '.count($this->cards).' carte(s)';
  }

}

