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

namespace DnDEngine\Feats;
use DnDEngine\Constants;
use DnDEngine\Language as L;
use DnDEngine\interfaces\iFeat;
use DnDEngine\Character as C;
use DnDEngine\Logger;
/**
 * Short description for class
 *
 * Long description (if any) ...
 *
 * @category  DnDEngine
 * @package   PackageName
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PackageName
 * @see       References to other sections (if any)...
 */
class Powerattack extends Base implements iFeat
{
    /**
     * Description for const
     */
    const Name = 'Power Attack';
    /**
     * Description for protected
     * @var    boolean
     * @access protected
     */
    protected $active = true;
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object  $char Parameter description (if any) ...
     * @return boolean Return description (if any) ...
     * @access public
     */
    public function arePrerequisitesMet(C $char)
    {
        if ($char->getAbility(Constants\Abilities::STR) > 15) {
            Logger::debug('Character %s mets the prerequisites of Power Attack', array(
                $char->getName()
            ));
            return true;
        }
        return false;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return string Return description (if any) ...
     * @access public
     */
    public function getPrerequisites()
    {
        return Language::singleton()->t('15 Strength');
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object $char Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function activate(C $char)
    {
        $char->updateAttackBonus(-2);
        $char->updateDamageBonus($this->getDamageBonus($char));
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object    $char Parameter description (if any) ...
     * @return number    Return description (if any) ...
     * @access protected
     */
    protected function getDamageBonus(C $char)
    {
        $level = $char->getLevel();
        if ($level < 11) {
            $dmgBonus = 2;
        } elseif ($level < 21) {
            $dmgBonus = 4;
        } else {
            $dmgBonus = 6;
        }
        if ($char->getEquipment(Constants\Common::EQUIPMENT_MAINHAND)->getType() == Constants\Common::WEAPON_TWOHAND) {
            $dmgBonus*= 1.5;
        }
        return $dmgBonus;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  object $char Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function deactivate(C $char)
    {
        $char->updateAttackBonus(2);
        $char->updateDamageBonus(-$this->getDamageBonus($char));
    }
}
?>