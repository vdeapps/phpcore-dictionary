<?php
/**
 * Copyright (c) vdeApps 2018
 */


/**
 * Class Dictionary
 * @author vdeapps
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
    private $dictionary = [];

    /**
     * Dictionary constructor.
     *
     * @param array|DictionaryInterface $arr
     * @throws \Exception
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
        
        return $this->dictionary;
    }

    /**
     * @param array|DictionaryInterface $arr
     *
     * @return $this
     * @throws \Exception
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
     * @throws \Exception
     */
    public function append($arr)
    {
        
        if (is_a($arr, DictionaryInterface::class)) {
            $arr = $arr->getDictionary();
        }
        elseif (false === is_array($arr)){
            throw new \Exception("Not an array", 5);
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
     * @param array $arr
     * @return DictionaryInterface
     * @throws \Exception
     */
    public static function getInstance($arr = [])
    {
        return new self($arr);
    }
    
    /**
     * Translate arrayKeys values with Dictionary
     *
     * @param array $arrayKeys 0 indexed
     *
     * @return array
     */
    public function translate($arrayKeys = []) {
        $result = [];
        
        // Transposition pour les libelles
        foreach ($arrayKeys as $key => $value) {
            
            // Indexed numeric array
            if (is_numeric($key)){
                $fromDictionnary = $this->getString($value);
                $result[] = (false === $fromDictionnary) ?  ucwords($value) : $fromDictionnary;
            }
            else{
                $result[] = $value;
            }
        }
        return $result;
    }
}
