<?php

$phar=new Phar(__DIR__."/".$argv[1],FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME, $argv[1]);
function find_all_files($dir) // kodlee at kodleeshare dot net from http://php.net/scandir
{
    $root = scandir($dir);
    $result=[];
    foreach($root as $value)
    {
        if($value === '.' || $value === '..') {continue;}
        if(is_file("$dir/$value")) {$result[]="$dir/$value";continue;}
        foreach(find_all_files("$dir/$value") as $value)
        {
            $result[]=$value;
        }
    }
    return $result;
}
foreach(find_all_files(".") as $file)
{
  $file=substr($file,2); // Remove initial ./
  if(substr($file,-4)!==".php"&&substr($file,-3)!==".mo") {continue;}
  $phar[$file]=file_get_contents($file);
  $phar->setStub($phar->createDefaultStub("index.php"));
}
