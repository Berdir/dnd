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
 * @package   PackageName
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   SVN: $Id:$
 * @link      http://pear.php.net/package/PackageName
 * @see       References to other sections (if any)...
 */

namespace DnDEngine\Classes;
use DnDEngine\Constants;
use DnDEngine\interfaces\iClass;
use DnDEngine\Character;
/**
 * PHP Template.
 */
class Fighter extends Base implements iClass
{
    /**
     * Description for protected
     * @var    string
     * @access protected
     */
    protected $name = 'Fighter';
    /**
     * Description for protected
     * @var    integer
     * @access protected
     */
    protected $maxSelectableSkills = 3;
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $skills = array(
        Constants\Skills::ATHLETHICS => Constants\Abilities::STR,
        Constants\Skills::ENDURANCE => Constants\Abilities::CON,
        Constants\Skills::HEAL => Constants\Abilities::WIS,
        Constants\Skills::INTIMATE => Constants\Abilities::CHA,
        Constants\Skills::STREETWISE => Constants\Abilities::CHA
    );
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $profs = array(
        Constants\Common::ARMOR_CLOTH,
        Constants\Common::ARMOR_CHAINMAIL,
        Constants\Common::ARMOR_HIDE,
        Constants\Common::ARMOR_LEATHER,
        Constants\Common::ARMOR_SCALE,
        Constants\Common::SHIELD_HEAVY,
        Constants\Common::SHIELD_LIGHT,
        Constants\Common::WEAPON_MELEE_SIMPLE,
        Constants\Common::WEAPON_MELEE_MIL,
        Constants\Common::WEAPON_RANGED_MIL,
        Constants\Common::WEAPON_RANGED_SIMPLE
    );
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object $char Parameter description (if any) ...
     * @return mixed  Return description (if any) ...
     * @access public
     */
    public function getBaseHitPoints(Character $char)
    {
        return 15 + $char->getAbility(Constants\Abilities::CON);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $char Parameter description (if any) ...
     * @return integer Return description (if any) ...
     * @access public
     */
    public function getHitPointsPerLevel(Character $char)
    {
        return 6;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object $char Parameter description (if any) ...
     * @return mixed  Return description (if any) ...
     * @access public
     */
    public function getHealingSurgesPerDay(Character $char)
    {
        return 9 + $char->getAbility(Constants\Abilities::CON);
    }
}
?>
