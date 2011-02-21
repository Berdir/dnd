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
 * @package   Game
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   SVN: $Id:$
 * @link      http://pear.php.net/package/Game
 * @see       References to other sections (if any)...
 */

namespace DnDEngine;
/**
 * Short description for class
 *
 * Long description (if any) ...
 *
 * @category  DnDEngine
 * @package   Game
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/Game
 * @see       References to other sections (if any)...
 */
class Game
{
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     * @static
     */
    protected static $name;
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     * @static
     */
    protected static $starttime;
    /**
     * Description for protected
     * @var    array
     * @access protected
     * @static
     */
    protected static $characters = array();

    protected static $dice = NULL;

    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $name Parameter description (if any) ...
     * @return void
     * @access public
     * @static
     */
    public static function setName($name)
    {
        self::$name = $name;
        self::$starttime = microtime(true);
        Logger::system('A new Game "%s" has been started...', array(
            $name
        ));
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $charname Parameter description (if any) ...
     * @return mixed   Return description (if any) ...
     * @access public
     * @static
     */
    public static function addCharacter($charname)
    {
        $char = new Character($charname);
        return self::$characters[$charname] = $char;
    }

    public static function setDice(interfaces\iDice $dice) {
      self::$dice = $dice;
    }

    /**
     *
     * @return interfaces\iDice
     */
    public static function getDice() {
      return self::$dice;
    }
}
?>