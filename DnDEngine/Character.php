<?php
/**
 * Short description for file
 *
 * Long description (if any) ...
 *
 * PHP version 5
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
 * @package   Character
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   SVN: $Id:$
 * @link      http://pear.php.net/package/Character
 * @see       References to other sections (if any)...
 */

namespace DnDEngine;
use DnDEngine::Constants;
use DnDEngine::interfaces::iFeat;
/**
 * PHP Template.
 */
class Character
{
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $name;
    /**
     * Description for protected
     * @var    integer
     * @access protected
     */
    protected $level = 0;
    /**
     * Description for protected
     * @var    integer
     * @access protected
     */
    protected $xp = 0;
    /**
     * Description for protected
     * @var    mixed
     * @access protected
     */
    protected $class;
    /**
     * Description for protected
     * @var    mixed
     * @access protected
     */
    protected $race;
    /**
     * Description for protected
     * @var    integer
     * @access protected
     */
    protected $age = 0;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $gender;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $height;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $weight;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $alignment;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $iniative;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $defense;
    /**
     * Description for protected
     * @var    integer
     * @access protected
     */
    protected $speed = 0;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $vision = Constants::Common::VISION_NORMAL;
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $abilities = array();
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $sense;
    /**
     * Description for protected
     * @var    integer
     * @access protected
     */
    protected $attackBonus = 0;
    /**
     * Description for protected
     * @var    number
     * @access protected
     */
    protected $hitpoints = 0;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $secondWind;
    /**
     * Description for protected
     * @var    integer
     * @access protected
     */
    protected $deathSavingThrowFailures = 0;
    /**
     * Description for protected
     * @var    integer
     * @access protected
     */
    protected $actionPoints = 0;
    /**
     * Description for protected
     * @var    integer
     * @access protected
     */
    protected $damageBonus = 0;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $basicAttack;
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $skills = array();
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $languages = array();
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $passiveFeats = array();
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $activeFeats = array();
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $powers = array();
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $magicItems = array();
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $notes;
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $equipment = array();
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $rituals = array();
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $coins;
    /**
     * Description for protected
     * @var    number
     * @access protected
     */
    protected $maxHitPoints = 0;
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $profs = array();
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $name Parameter description (if any) ...
     * @return void
     * @access public
     */
    function __construct($name)
    {
        $this->name = $name;
        Logger::system('New Character "%s" has been created', array(
            $name
        ));
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object $race Parameter description (if any) ...
     * @return mixed  Return description (if any) ...
     * @access public
     */
    public function setRace($race)
    {
        Logger::info('Race of Character "%s" set to %s', array(
            $this->getName() ,
            $race->getName()
        ));
        return $this->race = $race;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object $class Parameter description (if any) ...
     * @return mixed  Return description (if any) ...
     * @access public
     */
    public function setClass($class)
    {
        Logger::info('Class of Character "%s" set to %s', array(
            $this->getName() ,
            $class->getName()
        ));
        return $this->class = $class;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $ability Parameter description (if any) ...
     * @param  unknown $value   Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function updateAbility($ability, $value)
    {
        $l = Language::singleton();
        if (isset($this->abilities[$ability])) {
            Logger::info('Ability %s of Character %s has been changed: %s (new total: %s)', array(
                $l->t($ability) ,
                $this->getName() ,
                DisplayHelper::displayInt($value) ,
                DisplayHelper::displayInt($this->abilities[$ability] + $value)
            ));
            $this->abilities[$ability]+= $value;
        } else {
            Logger::info('Character %s has gained the ability %s: %s', array(
                $this->getName() ,
                $l->t($ability) ,
                DisplayHelper::displayInt($value)
            ));
            $this->abilities[$ability] = $value;
        }
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $skill Parameter description (if any) ...
     * @param  unknown $value Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function updateSkill($skill, $value)
    {
        $l = Language::singleton();
        if (isset($this->skills[$skill])) {
            Logger::info('Skill %s of Character %s has been changed: %s (new total: %s)', array(
                $l->t($skill) ,
                $this->getName() ,
                DisplayHelper::displayInt($value) ,
                DisplayHelper::displayInt($this->skills[$skill] + $value)
            ));
            $this->skills[$skill]+= $value;
        } else {
            Logger::info('Character %s has gained the skill %s: %s', array(
                $this->getName() ,
                $l->t($skill) ,
                DisplayHelper::displayInt($value)
            ));
            $this->skills[$skill] = $value;
        }
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $points Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function updateMaxHitPoints($points)
    {
        Logger::info('Maximal hitpoints of Character %s have been changed: %s (new total: %s)', array(
            $this->getName() ,
            DisplayHelper::displayInt($points) ,
            DisplayHelper::displayInt($this->maxHitPoints + $points)
        ));
        $this->maxHitPoints+= $points;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $points Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function updateHitPoints($points)
    {
        if ($points + $this->hitpoints > $this->maxHitPoints) {
            $points = $this->maxHitPoints - $this->hitpoints;
        }
        Logger::info('Hitpoints of Character %s have been changed: %s (new total: %s)', array(
            $this->getName() ,
            DisplayHelper::displayInt($points) ,
            DisplayHelper::displayInt($this->hitpoints + $points)
        ));
        $this->hitpoints+= $points;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $speed Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function updateSpeed($speed)
    {
        Logger::info('Speed of Character %s has been changed: %s (new total: %s)', array(
            $this->getName() ,
            DisplayHelper::displayInt($speed) ,
            DisplayHelper::displayInt($this->speed + $speed)
        ));
        $this->speed+= $speed;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $vision Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function updateVision($vision)
    {
        $l = Language::singleton();
        Logger::info('Vision of Character %s has been changed to %s', array(
            $this->getName() ,
            $l->t($vision)
        ));
        $this->vision = $vision;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $size Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function updateSize($size)
    {
        $l = Language::singleton();
        Logger::info('Size of Character %s has been changed to %s', array(
            $this->getName() ,
            $l->t($size)
        ));
        $this->size = $size;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $lang Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function addLanguage($lang)
    {
        if (!in_array($lang, $this->languages)) {
            $l = Language::singleton();
            Logger::info('Character %s has learned the language %s', array(
                $this->getName() ,
                $l->t($lang)
            ));
            $this->languages[] = $lang;
        }
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $name Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function addProfiency($name)
    {
        $l = Language::singleton();
        if (!in_array($name, $this->profs)) {
            Logger::info('Character %s has learned the profiency %s', array(
                $this->getName() ,
                $l->t($name)
            ));
            $this->profs[] = $name;
        }
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  mixed  $helper Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function setAbilityScore($helper)
    {
        Logger::debug('Adding base abilities to Character "%s"', array(
            $this->getName()
        ));
        foreach($helper->getAbilities() as $ability => $value) {
            $this->updateAbility($ability, $value);
        }
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object $feat Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function addFeat(iFeat $feat)
    {
        Logger::info('Character %s learns the feat %s', array(
            $this->getName() ,
            $feat->getName()
        ));
        if ($feat->isActive()) {
            if (!isset($this->activeFeats[$feat->getName() ])) {
                $this->activeFeats[$feat->getName() ] = $feat;
            }
        } else {
            if (!isset($this->passiveFeats[$feat->getName() ])) {
                $this->passiveFeats[$feat->getName() ] = $feat;
            }
            $feat->activate($this);
        }
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $bonus Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function updateAttackBonus($bonus)
    {
        Logger::info('Attack bonus of Character %s has been changed: %s (new total: %s)', array(
            $this->getName() ,
            DisplayHelper::displayInt($bonus) ,
            DisplayHelper::displayInt($this->attackBonus + $bonus)
        ));
        $this->attackBonus+= $bonus;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $bonus Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function updateDamageBonus($bonus)
    {
        Logger::info('Damage bonus of Character %s has been changed: %s (new total: %s)', array(
            $this->getName() ,
            DisplayHelper::displayInt($bonus) ,
            DisplayHelper::displayInt($this->damageBonus + $bonus)
        ));
        $this->damageBonus+= $bonus;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown                  $name Parameter description (if any) ...
     * @return void
     * @access public
     * @throws Exception_FeatNotAviable Exception description (if any) ...
     */
    public function activateFeat($name)
    {
        if (!isset($this->activeFeats[$name])) {
            throw new Exception_FeatNotAviable($name);
        }
        Logger::debug('Character %s activates feat %s', array(
            $this->getName() ,
            $name
        ));
        $this->activeFeats[$name]->activate($this);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown                  $name Parameter description (if any) ...
     * @return void
     * @access public
     * @throws Exception_FeatNotAviable Exception description (if any) ...
     */
    public function deactivateFeat($name)
    {
        if (!isset($this->activeFeats[$name])) {
            throw new Exception_FeatNotAviable($name);
        }
        Logger::debug('Character %s deactivates feat %s', array(
            $this->getName() ,
            $name
        ));
        $this->activeFeats[$name]->deactivate($this);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return mixed  Return description (if any) ...
     * @access public
     */
    public function getRace()
    {
        return $this->race;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return mixed  Return description (if any) ...
     * @access public
     */
    public function getClass()
    {
        return $this->class;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return unknown Return description (if any) ...
     * @access public
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return string Return description (if any) ...
     * @access public
     */
    public function getAbilities()
    {
        $l = Language::singleton();
        $text = '';
        foreach($this->abilities as $ability => $value) {
            $text.= $l->t("%s: %s \n", array(
                $ability,
                DisplayHelper::displayInt($value)
            ));
        }
        return $text;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $ability Parameter description (if any) ...
     * @return array   Return description (if any) ...
     * @access public
     */
    public function getAbility($ability)
    {
        if (isset($this->abilities[$ability])) {
            return $this->abilities[$ability];
        }
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return number Return description (if any) ...
     * @access public
     */
    public function getMaxHitpoints()
    {
        return $this->maxHitPoints;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return number Return description (if any) ...
     * @access public
     */
    public function getHitpoints()
    {
        return $this->hitpoints;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return integer Return description (if any) ...
     * @access public
     */
    public function getSpeed()
    {
        return $this->speed;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return unknown Return description (if any) ...
     * @access public
     */
    public function getSize()
    {
        return $this->size;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return unknown Return description (if any) ...
     * @access public
     */
    public function getVision()
    {
        return $this->vision;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return integer Return description (if any) ...
     * @access public
     */
    public function getLevel()
    {
        return $this->level;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return integer Return description (if any) ...
     * @access public
     */
    public function getExperience()
    {
        return $this->xp;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $name Parameter description (if any) ...
     * @return mixed   Return description (if any) ...
     * @access public
     */
    public function getEquipment($name)
    {
        if (isset($this->equipment[$name])) {
            return $this->equipment[$name];
        }
        return new Equipment_None();
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return void
     * @access public
     */
    public function build()
    {
        $l = Language::singleton();
        Logger::debug('Character building has started...');
        Logger::debug('Calculating Abilities');
        foreach($this->race->getAbilities() as $ability => $value) {
            $this->updateAbility($ability, $value);
        }
        Logger::debug('Calculating speed, vision and size');
        $this->updateSpeed($this->race->getSpeed());
        $this->updateVision($this->race->getVision());
        $this->updateSize($this->race->getSize());
        Logger::debug('Calculating languages');
        foreach($this->race->getLanguages() as $lang) {
            $this->addLanguage($lang);
        }
        Logger::debug('Calculating skills');
        foreach($this->race->getSkillBonuses() as $skill => $value) {
            $this->updateSkill($skill, $value);
        }
        Logger::debug('Calculating profiencies');
        foreach($this->class->getProfiencies() as $prof) {
            $this->addProfiency($prof);
        }
        Logger::debug('Calculating hitpoints');
        $this->updateMaxHitPoints($this->class->getBaseHitPoints($this));
        $this->updateHitPoints($this->getMaxHitpoints());
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return mixed  Return description (if any) ...
     * @access public
     */
    public function dump()
    {
        return Language::singleton()->t(' ==== Dumping Character Information: ===
     	
Name : %s
Race : %s
Class: %s

Hitpoints: %s/%s

Speed   : %s
Vision  : %s
Size    : %s
     
Ability Score: 
%s', array(
            $this->getName() ,
            $this->getRace()->getName() ,
            $this->getClass()->getName() ,
            $this->getHitPoints() ,
            $this->getMaxHitPoints() ,
            $this->getSpeed() ,
            $this->getVision() ,
            $this->getSize() ,
            $this->getAbilities()
        ));
    }
}
?>
