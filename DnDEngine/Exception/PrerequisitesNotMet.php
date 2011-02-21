<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


namespace DnDEngine\exception;

use DnDEngine\Character;
use DnDEngine\Language as L;

/**
 * Description of PrerequisitesNotMet
 *
 * @author sascha
 */


class PrerequisitesNotMet extends \Exception {

  function __construct($prerequisites, \DnDEngine\Character $char) {
    parent::__construct(L::singleton()->t('Prerequisites not met for %s, requires %s.', array($char->getName(), $prerequisites)));
  }

}

?>
