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
     * @param array $arr
     * @return DictionaryInterface
     */
    public static function getInstance($arr = []);
    
    /**
     * Clear all data
     */
    public function clear();
    
    /**
     * Traduit une liste de code par son libelle
     *
     * @param array $arrayKeys 0 indexed
     * @param DictionaryInterface $dictionary
     *
     * @return array
     */
    public function translate($arrayKeys = []);
}
