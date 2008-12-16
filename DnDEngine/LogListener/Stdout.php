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
 * @package   LogListener_Stdout
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   SVN: $Id:$
 * @link      http://pear.php.net/package/LogListener_Stdout
 * @see       References to other sections (if any)...
 */

namespace DnDEngine;
use DnDEngine::interfaces::iLogListener;
/**
 * Short description for class
 *
 * Long description (if any) ...
 *
 * @category  DnDEngine
 * @package   LogListener_Stdout
 * @author    Sascha Grossenbacher <saschagros@gmail.com>
 * @copyright 2008 Sascha Grossenbacher
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/LogListener_Stdout
 * @see       References to other sections (if any)...
 */
class LogListener_Stdout implements iLogListener
{
    /**
     * Description for protected
     * @var    unknown
     * @access protected
     */
    protected $level = Logger::ALL;
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $level Parameter description (if any) ...
     * @return boolean Return description (if any) ...
     * @access public
     */
    public function isEnabled($level)
    {
        if ($level == $this->level || $this->level == Logger::ALL) {
            return true;
        }
        return false;
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $message Parameter description (if any) ...
     * @param  unknown $level   Parameter description (if any) ...
     * @return boolean Return description (if any) ...
     * @access public
     */
    public function log($message, $level)
    {
        if (!$this->isEnabled($level)) {
            return false;
        }
        $levelText = Language::singleton()->t(Logger::getText($level));
        foreach(explode("\n", $message) as $line) {
            echo date('d.m.Y H:i:s:' . (int)(round(microtime() , 4) * 1000) . ' : ') . $levelText . ' : ' . trim($line) . "\n";
        }
    }
    /**
     * Short description for function
     *
     * Long description (if any) ...
     *
     * @param  unknown $level Parameter description (if any) ...
     * @return void
     * @access public
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }
}
?>