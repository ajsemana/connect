<?php
/**
* Common functions such as random numbers, string manipulations/validations
* 
* @package 		
* @subpackage 	Common
* @category    	Helpers
* @author 		
* @version 		Version 1.0
* 
*/
class CommonHelper {
    /**
    * check variable is empty
    * 
    * @param 	$var		variable to be analyzed
    * @return 	(boolean)
    **/
    public static function hasValue($var)
    {
    	if(!isset($var))
    	{
    		return FALSE;
    	} else
    	{
            if(is_null($var) || empty($var))
            {
                return FALSE;
            } else
            {
                return TRUE;
            }
    	}
    }

    /**
    * checks if variable is a valid array and not empty
    * 
    * @param    $arr        array variable to be analyzed
    * @return   (boolean)
    **/
    public static function arrayHasValue($arr)
    {
        if(!isset($arr) && !is_array($arr))
        {
            return FALSE;
        } else
        {
            if(count($arr) === 0 || empty($arr))
            {
                return FALSE;
            } else
            {
                return TRUE;
            }
        }
    }

    /**
    * returns null if the variable is empty
    * 
    * @param    $var        variable to be analyzed
    * @return   (mixed)
    **/
    public static function assess_variable_value($var)
    {
        return (has_value($var) ? $var : NULL);
    }

    /**
    * check variable is numeric and has value
    * 
    * @param    $var        variable to be analyzed
    * @return   (boolean)
    **/
    public static function numericHasValue($var)
    {
        if(isset($var) && is_numeric($var))
        {
            return TRUE;
        } else
        {
            return FALSE;
        }
    }

    /**
    * recursively converts object to array
    * 
    * @param (object)   $data   object to be converted to array
    * @return (object)
    **/
    public static function object_to_array($data)
    {
        if(is_array($data) || is_object($data)) {
            $result = array();
            foreach($data as $key => $value) {
                $result[$key] = CommonHelper::object_to_array($value);
            }
            return $result;
        }
        return $data;
    }

    /**
    * searches a specific array item based on key
    * 
    * @param (string)   $item           the needle
    * @param (string)   $array_key      key of the array to be compared with the needle
    * @param (string)   $array_items    the haystak
    * @return (array)
    **/
    public static function get_item_from_array($item,$array_key,$array_items)
    {
        if(! CommonHelper::arrayHasValue($array_items)) return array();
        if(! CommonHelper::hasValue($item)) return array();
        $array_val = array();
        foreach($array_items as $array_item)
        {
            if($array_item[$array_key] == $item)
            {
                $array_val = $array_item;
                break;
            }
        }
        return $array_val;
    }
    
    /**
    * checks if the value is in the array
    * 
    * @param (string)   $item           the needle
    * @param (string)   $array_items    the haystak
    * @return (boolean)
    **/
    public static function valueInArray($item, $array_items)
    {
        if(! CommonHelper::arrayHasValue($array_items)) return FALSE;
        
        if (in_array($item, $array_items)) {
        	return TRUE;
        } else {
        	return FALSE;
        }
    }


    public static function setRequiredFields($required_fields = array()) {
        if(self::arrayHasValue($required_fields))
        {
            foreach($required_fields as $value)
            {
                $tmp_val = Input::get($value);
                if(!self::hasValue($tmp_val)) throw new Exception("Missing {$value} parameter");
            }
        }
    }

}