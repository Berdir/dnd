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

namespace DnDEngine::Race;
use DnDEngine::interfaces::iRace;
use DnDEngine::Constants;
/**
 * PHP Template.
 */
class Dwarf extends Base implements iRace
{
    /**
     * Description for protected
     * @var    string
     * @access protected
     */
    protected $name = 'Dwarf';
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $minSize = array(
        4,
        3
    );
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $maxSize = array(
        4,
        9
    );
    /**
     * Description for protected
     * @var    integer
     * @access protected
     */
    protected $minWeight = 160;
    /**
     * Description for protected
     * @var    integer
     * @access protected
     */
    protected $maxWeight = 220;
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $abilities = array(
        Constants::Abilities::CON => 2,
        Constants::Abilities::WIS => 2
    );
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $size = Constants::Common::SIZE_MEDIUM;
    /**
     * Description for protected
     * @var    integer
     * @access protected
     */
    protected $speed = 5;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $vision = Constants::Common::VISION_LOWLIGHT;
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $languages = array(
        Constants::Languages::COMMON,
        Constants::Languages::DWARVEN
    );
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $skillBonuses = array(
        Constants::Skills::DUNGEONEERING => 2,
        Constants::Skills::ENDURANCE => 2
    );
    /**
     * Description for protected
     * @var    array
     * @access protected
     */
    protected $specialities = array();
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $char Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function addtoCharacter(Character $char)
    {
        parent::addToCharacter($char);
    }
}
?>
