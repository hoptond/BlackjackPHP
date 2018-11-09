<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 09/11/2018
 * Time: 15:57
 */

namespace Blackjack;

class Player {

    protected $hand;

    public function __construct($giveCards = false) {
        $this->hand = new Hand($giveCards);
    }

    public function dealCard(Player $player, int $cardID) {
        $card = $this->hand->getCard($cardID);
        $player->receiveCard($card);
        $this->hand->removeCardFromHand($card);
    }

    public function receiveCard($card) {
        $this->hand->addCardToHand($card);
    }

    public function getHeldCard($cardID) {
        return $this->hand->getCard($cardID);
    }


    public function getHeldCardsCount() {
        return $this->hand->getCardsCount();
    }

    public function getPoints() {
        return $this->hand->getWorth();
    }
}