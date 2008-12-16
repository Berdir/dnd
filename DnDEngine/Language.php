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
 * @package   Language
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   SVN: $Id:$
 * @link      http://pear.php.net/package/Language
 * @see       References to other sections (if any)...
 */

namespace DnDEngine;
/**
 * Short description for class
 *
 * Long description (if any) ...
 *
 * @category  DnDEngine
 * @package   Language
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/Language
 * @see       References to other sections (if any)...
 */
class Language
{
    /**
     * Description for protected
     * @var    object
     * @access protected
     * @static
     */
    protected static $instance = null;
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $lang Parameter description (if any) ...
     * @return void
     * @access public
     */
    public static function setLanguage($lang)
    {
        $classname = __NAMESPACE__ . '\\Language_' . ucfirst($lang);
        self::$instance = new $classname();
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @return object Return description (if any) ...
     * @access public
     */
    public static function singleton()
    {
        return self::$instance;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $key       Parameter description (if any) ...
     * @param  array   $parameter Parameter description (if any) ...
     * @return mixed   Return description (if any) ...
     * @access public
     */
    public function t($key, $parameter = array())
    {
        if (isset($this->strings[$key])) {
            $text = $this->strings[$key];
        }
        $text = $key;
        if (empty($parameter)) {
            return $text;
        }
        array_unshift($parameter, $text);
        return call_user_func_array('sprintf', $parameter);
    }
}
?>
