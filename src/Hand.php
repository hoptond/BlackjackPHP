<?php

namespace Blackjack;

class Hand {

    protected $cards;

    public function __construct($populate = false) {
        $this->cards = array();
        if($populate) {
            $suits = array("Clubs", "Spades", "Hearts", "Diamonds");
            foreach($suits as $suit) {
                for($i = 2; $i < 11; $i++) {
                    array_push($this->cards, new Card($suit, $i));
                }
                array_push($this->cards, new Card($suit, 'Ace'));
                array_push($this->cards, new Card($suit, 'King'));
                array_push($this->cards, new Card($suit, 'Queen'));
                array_push($this->cards, new Card($suit, 'Jack'));
            }
            shuffle($this->cards);
        }
    }

    /*
     * This function adds the card to a given deck. The deck is automatically sorted based upon the value of the card.
     *
     * @param deck The targeted deck of cards.
     * @param card The targeted card to remove.
     */
    function addCardToHand(Card $card) {
        if (count($this->cards) == 0) {
            array_push($this->cards, $card);
            return;
        }
        $insertValue = $card->getValue();
        for ($i = 0; $i < count($this->cards); $i++) {
            if ($insertValue < $this->cards[$i]->getValue()) {
                $insert = array($card);
                array_splice($this->cards, $i, 0, $insert);
                return;
            }
        }
        array_push($this->cards, $card);
    }

    /*
     * This function removes the given card from a Hand.
     *
     * @param $card The targeted card to remove.
     */
    public function removeCardFromHand($card) {
        //there is probably a nicer way of doing this
        if (in_array($card, $this->cards)) {
            unset($this->cards[array_search($card, $this->cards)]);
            $this->cards = array_values($this->cards);
        }
    }

    public function getWorth() : int {
        $score = 0;
        foreach($this->cards as $card) {
            $score += $card->getValue();
        }
        return $score;
    }

    public function getCard(int $cardID) : Card {
        try {
            return $this->cards[$cardID];
        } catch (\Exception $e) {
            throw new \Exception('Card ID did not exist in the held cards array!');
        }
    }

    public function getCardsCount() : int {
        return count($this->cards);
    }

}