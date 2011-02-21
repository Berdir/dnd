<?php

/**
 *
 * @author sascha
 */
namespace DnDEngine\interfaces;

interface iDice {
    const USE_HIGH = 1;
    const USE_RANDOM = 2;
    const USE_LOW = 4;

    public function roll($sides = NULL, $repeat = NULL, $modifier = NULl);
    public function rollandKeepSettings();
    public function setSides($sides);
    public function setModifier($modifier);
    public function setRepeat($repeat);
    public function setKeep($keep, $use = iDice::USE_HIGH);
    public function reset();
}
?>
