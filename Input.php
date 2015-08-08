<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        return isset($_REQUEST[$key]) ? true : false;
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        return !empty($_REQUEST[$key]) ? self::escape($_REQUEST[$key]) : $default;
    }

    public static function escape ($value)
    {
        return trim(htmlspecialchars(strip_tags($value)));
    }

    public static function getString($key)
    {
        $value = static::get($key);

        if (!isset($value)) {
            throw new Exception('Input was empty.');
        }

        if(!is_string($value) || is_numeric($value)) {
            throw new Exception('Input should be a text string.');
        }

        return $value;
    }

    public static function getNumber($key)
    {
        $value = str_replace(',', '', static::get($key));

        if (!isset($value)) {
            throw new Exception('Input was empty.');
        }

        if(!is_numeric($value)) {
            throw new Exception('Input should be numeric.');
        }

        return $value;
    }

    // public static function getDate($key)
    // {
    //     $value = static::get($key);
    //     $format = 'Y-m-d';

    //     $dateObject = DateTime::createFromFormat($format, $value);

    //     if ($dateObject) {
    //         return $dateObject->date;
    //     } else {
    //         throw new Exception ('Input was not a valid date.');
    //     }
    // }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
