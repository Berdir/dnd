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
 * @package   Level
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   SVN: $Id:$
 * @link      http://pear.php.net/package/Level
 * @see       References to other sections (if any)...
 */

namespace DnDEngine;
use DnDEngine\interfaces\iFeat;
/**
 * Short description for class
 *
 * Long description (if any) ...
 *
 * @category  DnDEngine
 * @package   Level
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/Level
 * @see       References to other sections (if any)...
 */
class Level
{
    /**
     * Description for const
     */
    const FEAT = 'Feat';
    /**
     * Description for const
     */
    const ATWILL_POWER = 'At-will power';
    /**
     * Description for const
     */
    const ENCOUNTER_POWER = 'Encounter power';
    /**
     * Description for const
     */
    const DAILY_POWER = 'Daily power';
    /**
     * Description for const
     */
    const UTILITY_POWER = 'Utility Power';
    /**
     * Description for protected
     * @var    array
     * @access protected
     * @static
     */
    protected static $xpTable = array(
        1 => 0,
        2 => 1000,
        3 => 2250
    );
    /**
     * Description for protected
     * @var    array
     * @access protected
     * @static
     */
    protected static $gainTable = array(
        1 => array(
            self::FEAT => 1,
            self::ATWILL_POWER => 2,
            self::ENCOUNTER_POWER => 1,
            self::DAILY_POWER => 1
        )
    );
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $gain;
    /**
     * Description for protected
     * @var    object
     * @access protected
     */
    protected $char;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $newLevel;
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $feats = array();
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
    protected $calls = array();
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object                        $char Parameter description (if any) ...
     * @return void
     * @access public
     * @throws Exception_NotEnoughExperience Exception description (if any) ...
     */
    public function __construct(Character $char)
    {
        $this->char = $char;
        $level = $char->getLevel();
        $xp = $char->getExperience();
        if (self::$xpTable[$level + 1] <= $xp) {
            Logger::info('Starting Level Upgrade to Level %s from Character "%s"', array(
                $level + 1,
                $char->getName()
            ));
            $this->gain = self::$gainTable[$level + 1];
            $this->newLevel = $level + 1;
            Logger::debug('Aviable at this level: ' . $this->getAviable());
        } else {
            throw new Exception_NotEnoughExperience($char);
        }
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return mixed  Return description (if any) ...
     * @access public
     */
    public function getAviable()
    {
        $aviable = '';
        foreach($this->gain as $gain => $count) {
            $aviable.= $count . 'x ' . $gain . ', ';
        }
        return substr($aviable, 0, strlen($aviable) - 2);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object                          $feat Parameter description (if any) ...
     * @return object                          Return description (if any) ...
     * @access public
     * @throws Exception_NotAviableAtThisLevel Exception description (if any) ...
     * @throws Exception_PrerequitesNotMet     Exception description (if any) ...
     */
    public function chooseFeat(iFeat $feat)
    {
        if (!isset($this->gain[self::FEAT])) {
            throw new Exception_NotAviableAtThisLevel($feat);
        }
        if (!$feat->arePrerequisitesMet($this->char)) {
            throw new Exception\PrerequisitesNotMet($feat->getPrerequisites() , $this->char);
        }
        $this->gain[self::FEAT]--;
        if ($this->gain[self::FEAT] == 0) {
            unset($this->gain[self::FEAT]);
        }
        Logger::debug('Still aviable at this level: ' . $this->getAviable());
        $this->feats[] = $feat;
        return $feat;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return void
     * @access public
     */
    public function finish()
    {
        if (!empty($this->gain)) {
            //throw new Exception_NotEverythingChosen($this->gain);
            
        }
        foreach($this->feats as $feat) {
            $this->char->addFeat($feat);
        }
        Logger::info('Character %s has finished the Levelup to %s', array(
            $this->char->getName() ,
            $this->newLevel
        ));
    }
}
?>