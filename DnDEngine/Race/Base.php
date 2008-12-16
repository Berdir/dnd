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
 * @package   Base
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   SVN: $Id:$
 * @link      http://pear.php.net/package/Base
 * @see       References to other sections (if any)...
 */

namespace DnDEngine\Race;
use DnDEngine\Language as L;
/**
 * PHP Template.
 */
class Base
{
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $name;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $minSize;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $maxSize;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $minWeight;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $maxWeight;
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
    protected $size;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $speed;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $vision;
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
    protected $skillBonuses = array();
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
     * @return unknown Return description (if any) ...
     * @access public
     */
    public function getName()
    {
        return L::singleton()->t($this->name);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return array  Return description (if any) ...
     * @access public
     */
    public function getAbilities()
    {
        return $this->abilities;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return unknown Return description (if any) ...
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
    public function getVision()
    {
        return $this->vision;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return array  Return description (if any) ...
     * @access public
     */
    public function getLanguages()
    {
        return $this->languages;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return array  Return description (if any) ...
     * @access public
     */
    public function getSkillBonuses()
    {
        return $this->skillBonuses;
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
}
?>
