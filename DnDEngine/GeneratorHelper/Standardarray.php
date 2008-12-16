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
 * @package   GeneratorHelper_StandardArray
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   SVN: $Id:$
 * @link      http://pear.php.net/package/GeneratorHelper_StandardArray
 * @see       References to other sections (if any)...
 */

namespace DnDEngine;
use DnDEngine::Constants;
/**
 * Short description for class
 *
 * Long description (if any) ...
 *
 * @category  DnDEngine
 * @package   GeneratorHelper_StandardArray
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/GeneratorHelper_StandardArray
 * @see       References to other sections (if any)...
 */
class GeneratorHelper_StandardArray
{
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $abilities;
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  array                        $abilities Parameter description (if any) ...
     * @return void
     * @access public
     * @throws Exception_NotEnoughAbilities Exception description (if any) ...
     * @throws Exception_IllegalChoice      Exception description (if any) ...
     * @throws Exception_IllegalChoice      Exception description (if any) ...
     */
    public function assignAbilities($abilities)
    {
        if (count($abilities) !== 6) {
            throw new Exception_NotEnoughAbilities(count($abilities));
        }
        $allValues = array_flip(array(
            16,
            14,
            13,
            12,
            11,
            10
        ));
        $allAbilities = array_flip(array(
            Constants::Abilities::STR,
            Constants::Abilities::CON,
            Constants::Abilities::DEX,
            Constants::Abilities::WIS,
            Constants::Abilities::INT,
            Constants::Abilities::CHA
        ));
        foreach($abilities as $ability => $value) {
            if (!isset($allValues[$value])) {
                throw new Exception_IllegalChoice();
            }
            if (!isset($allAbilities[$ability])) {
                throw new Exception_IllegalChoice();
            }
            unset($allValues[$value]);
            unset($allAbilities[$ability]);
        }
        $this->abilities = $abilities;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return unknown                   Return description (if any) ...
     * @access public
     * @throws Exception_AbilitiesNotSet Exception description (if any) ...
     */
    function getAbilities()
    {
        if (count($this->abilities) !== 6) {
            throw new Exception_AbilitiesNotSet();
        }
        return $this->abilities;
    }
}
?>