<?php
/**
 * Copyright (c) vdeApps 2018
 */

namespace vdeApps\phpCore\Dictionary;

interface DictionaryInterface
{
    
    /**
     * @return mixed
     */
    public function getDictionary();
    
    /**
     * @param array|DictionaryInterface $arr
     *
     * @return $this
     */
    public function setDictionary($arr = []);
    
    /**
     * Add key / value
     * @param $key
     * @param $string
     *
     * @return $this
     */
    public function setString($key, $string);
    
    /**
     * Get Value
     * @param $key
     *
     * @return mixed|false
     */
    public function getString($key);
    
    
    /** Merge with array or Dictionary
     * @param array|DictionaryInterface $arr
     *
     * @return $this
     */
    public function append($arr);
    
    /**
     * Return all keys
     * @return array
     */
    public function getKeys();
    
    /**
     * Return instanceof Dictionary
     * @return DictionaryInterface
     */
    public static function getInstance();
    
    /**
     * Clear all data
     */
    public function clear();
}
