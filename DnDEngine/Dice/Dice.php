<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DnDEngine\Dice;
use DnDEngine\interfaces\iDice;

class Dice implements iDice {
  private $sides = 20;
  private $modifier = 0;
  private $repeat = 1;
  private $keep = NULL;
  private $use = iDice::USE_HIGH;

  public function roll($sides = NULL, $repeat = NULL, $modifier = NULL) {
    if (!is_null($sides)) {
      $this->sides = $sides;
    }
    if (!is_null($repeat)) {
      $this->repeat = $repeat;
    }
    if (!is_null($modifier)) {
      $this->modifier = $modifier;
    }
    $result = $this->doRoll();
    $this->reset();
    return $result;
  }

  public function reset() {
    $this->sides = 20;
    $this->modifier = 0;
    $this->repeat = 1;
    $this->keep = NULL;
    $this->use = iDice::USE_HIGH;
  }

  public function rollAndKeepSettings() {
    return $this->doRoll();
  }

  private function doRoll() {

    $results = array();
    for ($i = 0; $i < $this->repeat; $i++) {
      $results[] = rand(1, $this->sides);
    }

    if (!is_null($this->keep)) {
      switch ($this->use) {
        case iDice::USE_HIGH:
          sort($results);
          break;
        case iDice::USE_LOW:
          rsort($results);
          break;
      }
      for ($i = $this->repeat; $i <= $this->keep; $i--) {
        array_shift($results);
      }
    }
    return array_sum($results) + $this->modifier;
  }

  public function setSides($sides) {
    $this->sides = $sides;
  }

  public function setModifier($modifier) {
    $this->modifier = $modifier;
  }

  public function setRepeat($repeat) {
    $this->repeat = $repeat;
  }

  public function setKeep($keep, $use = iDice::USE_HIGH) {
    $this->keep = $keep;
    $this->use = $use;
  }
}
?>
