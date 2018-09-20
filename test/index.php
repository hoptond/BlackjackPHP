<?php

require '../index.php';

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testdisplayWinner_success_p2win() {
        $winner = displayWinner(1,21);
        $this->assertEquals("<br><br>Player two has won!", $winner);
    }

    public function testdisplayDrawnCard_success() {
        $drawnCard = displayDrawnCard("Clubs_8");
        $this->assertEquals("Drew the 8 of Clubs" . '<br>', $drawnCard);
    }

    public function testdisplayDrawnCard_error_nounderscore() {
        $drawnCard = displayDrawnCard("DiamondsJack");
        $this->assertEquals('Drew the  of DiamondsJack' . '<br>', $drawnCard);
    }

    public function testdisplayDrawnCard_malform_float() {
        $drawnCard = displayDrawnCard(4.5);
        $this->assertEquals('Drew the  of 4.5' . '<br>', $drawnCard);
    }


    public function testdisplayWinner_success_continue() {
        $winner = displayWinner(1,1);
        $this->assertEquals("<br><br>Continue drawing cards...", $winner);
    }

    public function testdisplayWinner_success_draw() {
        $winner = displayWinner(21,21);
        $this->assertEquals("<br><br>" . "A draw. Everyone loses!", $winner);
    }

    public function testdisplayWinner_success_p1win() {
        $winner = displayWinner(21,1);
        $this->assertEquals("<br><br>Player one has won!", $winner);
    }

    public function testdisplayWinner_malform_string() {
        $winner = displayWinner('onion',3);
        $this->assertEquals("<br><br>Continue drawing cards...", $winner);
    }

    public function testDeal_success() {
        $score = deal();
        $this->assertGreaterThan(20, $score);
    }
    public function testcreateDeck() {
        $deck = createDeck();
        $this->assertEquals(52, count($deck));
    }
}
?>
