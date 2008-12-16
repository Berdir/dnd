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

namespace DnDEngine;
use DnDEngine\interfaces\iLogListener;
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
class Logger
{
    /**
     * Description for static
     * @var    array
     * @access protected
     * @static
     */
    static protected $listeners = array();
    /**
     * Description for const
     */
    const ALL = 2047;
    /**
     * Description for const
     */
    const FIGHT = 1024;
    /**
     * Description for const
     */
    const STORY = 512;
    /**
     * Description for const
     */
    const TALK = 256;
    /**
     * Description for const
     */
    const FATAL = 128;
    /**
     * Description for const
     */
    const ERROR = 64;
    /**
     * Description for const
     */
    const WARN = 32;
    /**
     * Description for const
     */
    const INFO = 16;
    /**
     * Description for const
     */
    const DEBUG = 8;
    /**
     * Description for const
     */
    const SYSTEM = 4;
    /**
     * Description for static
     * @var    array
     * @access protected
     * @static
     */
    static protected $text = array(
        self::FIGHT => 'Fight',
        self::STORY => 'Story',
        self::TALK => 'Talk',
        self::FATAL => 'Fatal',
        self::ERROR => 'Error',
        self::WARN => 'Warn',
        self::INFO => 'Info',
        self::DEBUG => 'Debug',
        self::SYSTEM => 'System'
    );
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $message    Parameter description (if any) ...
     * @param  array   $paramaters Parameter description (if any) ...
     * @return void
     * @access public
     * @static
     */
    public static function system($message, $paramaters = array())
    {
        self::log($message, self::SYSTEM, $paramaters);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $message    Parameter description (if any) ...
     * @param  array   $paramaters Parameter description (if any) ...
     * @return void
     * @access public
     * @static
     */
    public static function debug($message, $paramaters = array())
    {
        self::log($message, self::DEBUG, $paramaters);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $message    Parameter description (if any) ...
     * @param  array   $paramaters Parameter description (if any) ...
     * @return void
     * @access public
     * @static
     */
    public static function info($message, $paramaters = array())
    {
        self::log($message, self::INFO, $paramaters);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $message    Parameter description (if any) ...
     * @param  array   $paramaters Parameter description (if any) ...
     * @return void
     * @access public
     * @static
     */
    public static function warn($message, $paramaters = array())
    {
        self::log($message, self::WARN, $paramaters);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $message    Parameter description (if any) ...
     * @param  array   $paramaters Parameter description (if any) ...
     * @return void
     * @access public
     * @static
     */
    public static function error($message, $paramaters = array())
    {
        self::log($message, self::ERROR, $paramaters);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $message    Parameter description (if any) ...
     * @param  array   $paramaters Parameter description (if any) ...
     * @return void
     * @access public
     * @static
     */
    public static function fatal($message, $paramaters = array())
    {
        self::log($message, self::FATAL, $paramaters);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $message    Parameter description (if any) ...
     * @param  array   $paramaters Parameter description (if any) ...
     * @return void
     * @access public
     * @static
     */
    public static function talk($message, $paramaters = array())
    {
        self::log($message, self::TALK, $paramaters);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $message    Parameter description (if any) ...
     * @param  array   $paramaters Parameter description (if any) ...
     * @return void
     * @access public
     * @static
     */
    public static function story($message, $paramaters = array())
    {
        self::log($message, self::story, $paramaters);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $message    Parameter description (if any) ...
     * @param  array   $paramaters Parameter description (if any) ...
     * @return void
     * @access public
     * @static
     */
    public static function fight($message, $paramaters = array())
    {
        self::log($message, self::FIGHT, $paramaters);
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown                   $listener Parameter description (if any) ...
     * @return unknown                   Return description (if any) ...
     * @access public
     * @throws Exception_IllegalListener Exception description (if any) ...
     * @static
     */
    public static function addListener($listener)
    {
        if (is_string($listener)) {
            $listener = Logger::factory($listener);
        }
        if (!($listener instanceof iLogListener)) {
            throw new Exception_IllegalListener($listener);
        }
        self::$listeners[] = $listener;
        return $listener;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $name Parameter description (if any) ...
     * @return object  Return description (if any) ...
     * @access public
     * @static
     */
    public static function factory($name)
    {
        $classname = __NAMESPACE__ . '\\LogListener_' . ucfirst(strtolower($name));
        return new $classname();
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $message    Parameter description (if any) ...
     * @param  integer $level      Parameter description (if any) ...
     * @param  array   $paramaters Parameter description (if any) ...
     * @return void
     * @access public
     * @static
     */
    public static function log($message, $level = self::INFO, $paramaters = array())
    {
        $message = Language::singleton()->t($message, $paramaters);
        foreach(self::$listeners as $listener) {
            $listener->log($message, $level);
        }
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $level Parameter description (if any) ...
     * @return array   Return description (if any) ...
     * @access public
     */
    public static function getText($level)
    {
        return self::$text[$level];
    }
}
?>
