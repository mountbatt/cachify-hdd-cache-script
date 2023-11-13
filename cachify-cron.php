<?php
// Pfad zum Verzeichnis (anpassen!)
$dir = '/www/htdocs/12345/mywebsite.de/wp-content/cache/cachify/';

// Funktion zum rekursiven Löschen eines Verzeichnisses
function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (is_dir($dir."/".$object))
           rrmdir($dir."/".$object);
         else
           unlink($dir."/".$object);
       }
     }
     rmdir($dir);
   }
}

// Verzeichnis und seine Unterordner und Dateien löschen
rrmdir($dir);

// URL aufrufen und Ausgabe ignorieren (1maliges Laden um Cache der Startseite vorzuladen)
// anpassen! 
file_get_contents('https://www.mywebsite.de');
?>