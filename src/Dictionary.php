<?php
/**
 * Copyright (c) vdeApps 2018
 */


/**
 * Class de traduction clé/valeur
 * @author deverre
 * @version
 */

namespace vdeApps\phpCore\Dictionary;

/**
 * @category awc
 *
 */
class Dictionary implements DictionaryInterface
{
    /** @var array */
    private $dictionary;
    
    /**
     * Dictionary constructor.
     *
     * @param array|DictionaryInterface $arr
     */
    public function __construct($arr = [])
    {
        $this->setDictionary($arr);
    }
    
    /**
     * @return mixed
     */
    public function getDictionary()
    {
        
        return $this->dictionnary;
    }
    
    /**
     * @param array|DictionaryInterface $arr
     *
     * @return $this
     */
    public function setDictionary($arr = [])
    {
        return $this->clear()->append($arr);
    }
    
    /**
     * Clear all data
     */
    public function clear()
    {
        $this->dictionary = [];
        return $this;
    }
    
    /**
     * Add key / value
     *
     * @param $key
     * @param $string
     *
     * @return $this
     */
    public function setString($key, $string)
    {
        $this->dictionary[$key] = $string;
        return $this;
    }
    
    /**
     * Get Value
     *
     * @param $key
     *
     * @return mixed|false
     */
    public function getString($key)
    {
        
        if (array_key_exists($key, $this->dictionary)) {
            return $this->dictionary[$key];
        } else {
            return false;
        }
    }
    
    /** Merge with array or Dictionary
     *
     * @param array|DictionaryInterface $arr
     *
     * @return $this
     */
    public function append($arr)
    {
        
        if (is_a($arr, DictionaryInterface::class)) {
            $arr = $arr->getDictionary();
        }
        
        foreach ($arr as $key => $val) {
            if (is_numeric($key)) {
                $this->setString($key, $key);
            } else {
                $this->setString($key, $val);
            }
        }
        
        return $this;
    }
    
    /**
     * Return all keys
     * @return array
     */
    public function getKeys()
    {
        return array_keys($this->dictionary);
    }
    
    /**
     * Return instanceof Dictionary
     * @return DictionaryInterface
     */
    public static function getInstance()
    {
        return new self();
    }
}
