<?php

namespace Blackjack;

class Card {

    protected $suit;
    protected $rank;

    public function __construct(string $suit, $rank) {
        $this->suit = $suit;
        $this->rank = $rank;
    }

    /*
     * This function gets the value of this card. If it is a number card, the value is the number of the card. If it is a special card,
     * the value is either 11 if it is an Ace or 10 if it is not.
     *
     * @param int $score The current running score. By default, this score is 0.
     *
     * @return int Returns the value of the card.
     */
    public function getValue($score = 0): int {
        //gets the initial value of this card by exploding the string and taking the second value, which is either a number or a string
        if (is_numeric($this->rank)) {
            return (int)$this->rank;
        } else {
            if ($this->rank === "Ace") {
                if ($score >= 11) {
                    return 1;
                }
                return 11;
            } else {
                return 10;
            }
        }
    }

    public function __toString() {
        return $this->rank . ' of ' . $this->suit;
    }

}

?>