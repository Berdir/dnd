<?php
/**
 * Short description for file
 *
 * Long description (if any) ...
 *
 * PHP version 3
 *
 * All rights reserved.
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 * + Redistributions of source code must retain the above copyright notice,
 * this list of conditions and the following disclaimer.
 * + Redistributions in binary form must reproduce the above copyright notice,
 * this list of conditions and the following disclaimer in the documentation and/or
 * other materials provided with the distribution.
 * + Neither the name of the <ORGANIZATION> nor the names of its contributors
 * may be used to endorse or promote products derived
 * from this software without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category  DnDEngine
 * @package   Language
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   SVN: $Id:$
 * @link      http://pear.php.net/package/Language
 * @see       References to other sections (if any)...
 */
namespace DnDEngine;
use DnDEngine\Race;
use DnDEngine\Classes;
use DnDEngine\Constants;
use DnDEngine\Feats;

date_default_timezone_set('Europe/Zurich');

/**
 * Description for include
 */

include '../init.php';
Language::setLanguage('German');
Logger::addListener('StdOut');
Game::setName('Test');
$berdir = Game::addCharacter('Berdir');
$berdir->setRace(new Race\Dwarf());
$fighter = $berdir->setClass(new Classes\Fighter());
$fighter->chooseTrainedSkill(array(
    Constants\Skills::ATHLETHICS,
    Constants\Skills::ENDURANCE,
    Constants\Skills::STREETWISE
));
$standardArray = AbilityHelper::factoryGenerator('StandardArray');
$standardArray->assignAbilities(array(
    Constants\Abilities::STR => 16,
    Constants\Abilities::CON => 14,
    Constants\Abilities::DEX => 13,
    Constants\Abilities::WIS => 12,
    Constants\Abilities::CHA => 11,
    Constants\Abilities::INT => 10,
));
$berdir->setAbilityScore($standardArray);
// $rollScore = AbilityHelper::factoryGenerator('RollingScore');
// $rollScore->rollAbilities();
// $berdir->setAbilityScore($rollScore);
$berdir->build();

$level = new Level($berdir);
$level->chooseFeat(new Feats\Powerattack());
$level->finish();
$berdir->activateFeat(Feats\Powerattack::Name);
$berdir->deactivateFeat(Feats\Powerattack::Name);
$berdir->rollInitiative();
Logger::debug($berdir->dump());


$curunair = Game::addCharacter('Curunair');
$curunair->setRace(new Race\Dwarf());
$fighter = $curunair->setClass(new Classes\Fighter());
$fighter->chooseTrainedSkill(array(
    Constants\Skills::ATHLETHICS,
    Constants\Skills::ENDURANCE,
    Constants\Skills::STREETWISE
));
$standardArray = AbilityHelper::factoryGenerator('StandardArray');
$standardArray->assignAbilities(array(
    Constants\Abilities::STR => 16,
    Constants\Abilities::CON => 14,
    Constants\Abilities::DEX => 13,
    Constants\Abilities::WIS => 12,
    Constants\Abilities::CHA => 11,
    Constants\Abilities::INT => 10,
));
$curunair->setAbilityScore($standardArray);
// $rollScore = AbilityHelper::factoryGenerator('RollingScore');
// $rollScore->rollAbilities();
// $berdir->setAbilityScore($rollScore);
$curunair->build();

$level = new Level($curunair);
$level->chooseFeat(new Feats\Powerattack());
$level->finish();
$curunair->rollInitiative();
Logger::debug($curunair->dump());

$encounter = Game::startEncounter();
$encounter->start();

?>
