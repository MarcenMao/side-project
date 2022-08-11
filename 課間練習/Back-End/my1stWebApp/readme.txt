打開 phpMyAdmin\libraries\Util.class.php
把 1656行的 return strftime($date, $timestamp);改成

if (extension_loaded('gettext'))

{    date_default_timezone_set('UTC');     

     return gmdate('Y-m-d H:i:s', $timestamp + 28800);

}