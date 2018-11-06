<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */

class TennisGame
{
    public $score = '';
    const HIGH_SCORE = 4;
    const ADVANTAGE_SCORE = 1;
    const WIN_SCORE = 2;

    public function getScore($player1Name, $player2Name, $player1Score, $player2Score)
    {
        $tempScore = 0;

        if ($player1Score == $player2Score) {
            switch ($player1Score) {
                case 0:
                    $this->score = "Love-All";
                    break;
                case 1:
                    $this->score = "Fifteen-All";
                    break;
                case 2:
                    $this->score = "Thirty-All";
                    break;
                case 3:
                    $this->score = "Forty-All";
                    break;
                default:
                    $this->score = "Deuce";
                    break;
            }
        } else if ($player1Score >= self::HIGH_SCORE || $player2Score >= self::HIGH_SCORE) {
            $minusResult = $player1Score - $player2Score;
            if ($minusResult == self::ADVANTAGE_SCORE) $this->score = "Advantage player1";
            else if ($minusResult == -self::ADVANTAGE_SCORE) $this->score = "Advantage player2";
            else if ($minusResult >= self::WIN_SCORE) $this->score = "Win for player1";
            else $this->score = "Win for player2";
        } else {
            for ($i = 1; $i < 3; $i++) {
                if ($i == 1) $tempScore = $player1Score;
                else {
                    $this->score .= "-";
                    $tempScore = $player2Score;
                }
                switch ($tempScore) {
                    case 0:
                        $this->score .= "Love";
                        break;
                    case 1:
                        $this->score .= "Fifteen";
                        break;
                    case 2:
                        $this->score .= "Thirty";
                        break;
                    case 3:
                        $this->score .= "Forty";
                        break;
                }
            }
        }
    }

    public function __toString()
    {
        return $this->score;
    }
}