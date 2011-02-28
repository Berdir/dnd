<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DnDEngine;
use DnDEngine\Constants as C;
use DnDEngine\interfaces\iBeing;

/**
 * Description of Encounter
 *
 * @author berdir
 */
class Encounter {

  const STATE_INIT = 'Initalizing';
  const STATE_ACTIVE = 'Active';
  const STATE_FINISHED = 'Finished';

  protected $involved = array();

  protected $state = Encounter::STATE_INIT;

  public function addBeing(iBeing $being) {
    $this->involved[] = $being;
  }

  public function start() {
    Logger::info('Starting an encounter with the following beings:');
    foreach ($this->involved as $being) {
      Logger::info(' - %s (Perception: %s, Hitpoints %s)', array(
        $being->getName(),
        DisplayHelper::displayInt($being->checkSkill(C\Skills::PERCEPTION, TRUE)),
        DisplayHelper::displayInt($being->getHitpoints()),
      ));
    }

    $this->state = Encounter::STATE_ACTIVE;
  }
}

?>
