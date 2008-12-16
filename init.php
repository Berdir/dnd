<?php
namespace DnDEngine;
/**
 * PHP Template.
 */
function autoload($classname)
{
    if (class_exists(__NAMESPACE__ . '\\Logger', false)) {
        Logger::debug('Loading class %s', array(
            $classname
        ));
    }
    require_once __DIR__ . '/' . str_replace(array('::','_', '\\', ) , '/', $classname) . '.php';
}
spl_autoload_register('DnDEngine\autoload');
?>
