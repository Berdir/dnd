#!/usr/bin/php
<?php
require_once 'PHP/DocBlockGenerator.php';
$param = array(
    'license' => 'bsd',
    'version' => 'svn',
    'category' => 'DnDEngine',
    'author' => 'Sascha Grossenbacher',
    'email' => 'saschagros@gmail.com',
    'year' => '2008'
);
$gen = new PHP_DocBlockGenerator();
docDirectory($gen, $param, 'DnDEngine');
docDirectory($gen, $param, 'tests');
function docDirectory($gen, $param, $directory)
{
    $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    foreach($dir as $file) {
        if (false === strpos($file, '.svn') && false === strpos($file, 'www/api') && '.php' == substr($file, -4)) {
            echo 'Generate DocBlock for ' . $file . '...';
            $gen->generate($file->__toString() , $param);
            echo "Done\n";
        }
    }
}
?>




