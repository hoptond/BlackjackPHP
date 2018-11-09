<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 09/11/2018
 * Time: 15:45
 */

namespace Blackjack;

class Deck extends Hand {



    public function __toString() {
        return 'This deck has '.  count($this->cards) . ' cards in it.';
    }
}