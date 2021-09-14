<?php

namespace App\Tests\Core;

use App\Core\CardGame32;
use PHPUnit\Framework\TestCase;
use App\Core\Card;

class CardGame32Test extends TestCase
{
    public function testShuffle()
    {
        $CardGame1 = CardGame32 :: factoryCardGame32();
        $CardGame1->shuffle();
        $CardGame2 = CardGame32 :: factoryCardGame32();
        $this->assertNotEquals($CardGame1, $CardGame2);
    }
    
    public function testToString1Cart()
    {
        $cardgame = new CardGame32([new Card('As','Pique')]);
        $this->assertEquals('CardGame32 : 1 carte(s)',$cardgame->__toString());
    }

    public function testGetCard()
    {
        $cardgame = CardGame32::factoryCardGame32();
        $index = 1;
        $card1 = $cardgame->getCard($index);
        $this->assertEquals('2', $card1->getName());
        $this->assertEquals('Trèfle', $card1->getColor());
    }

    public function testGetCardPlusGrand()
    {
        $cardgame = CardGame32::factoryCardGame32();
        $index = 125;
        $card1 = $cardgame->getCard($index);
        $this->assertEquals('9', $card1->getName());
        $this->assertEquals('Coeur', $card1->getColor());
    }

    public function testGetCardPlusPetit()
    {
        $cardgame = CardGame32::factoryCardGame32();
        $index = -125;
        $card1 = $cardgame->getCard($index);
        $this->assertEquals('6', $card1->getName());
        $this->assertEquals('Pique', $card1->getColor());
    }

    public function testFactoryCardGame32()
    {
        $cardgame = CardGame32::factoryCardGame32();
        $this->assertEquals('CardGame32 : 52 carte(s)',$cardgame->__toString());
    }
}