<?php
/**
 * ChunkAnnotation
 *
 * PHP version 5
 *
 * @category Class
 * @package  Systran\Client
 * @author   http://github.com/Systran-api/Systran-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
/**
 *  Copyright 2015 SmartBear Software
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */
/**
 *
 *
 * Do not edit the class manually.
 */

namespace Systran\Client;

use \ArrayAccess;
/**
 * ChunkAnnotation Class Doc Comment
 *
 * @category    Class
 * @description NP/Chunk annotation
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class ChunkAnnotation implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $SystranTypes = array(
        'text' => 'string',
        'lemma' => 'string',
        'start' => 'int',
        'end' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'text' => 'text',
        'lemma' => 'lemma',
        'start' => 'start',
        'end' => 'end'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'text' => 'setText',
        'lemma' => 'setLemma',
        'start' => 'setStart',
        'end' => 'setEnd'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'text' => 'getText',
        'lemma' => 'getLemma',
        'start' => 'getStart',
        'end' => 'getEnd'
    );
  
    
    /**
      * $text Text
      * @var string
      */
    protected $text;
    
    /**
      * $lemma Sequence of lemma
      * @var string
      */
    protected $lemma;
    
    /**
      * $start Start offset
      * @var int
      */
    protected $start;
    
    /**
      * $end End offset
      * @var int
      */
    protected $end;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->text = $data["text"];
            $this->lemma = $data["lemma"];
            $this->start = $data["start"];
            $this->end = $data["end"];
        }
    }
    
    /**
     * Gets text
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
  
    /**
     * Sets text
     * @param string $text Text
     * @return $this
     */
    public function setText($text)
    {
        
        $this->text = $text;
        return $this;
    }
    
    /**
     * Gets lemma
     * @return string
     */
    public function getLemma()
    {
        return $this->lemma;
    }
  
    /**
     * Sets lemma
     * @param string $lemma Sequence of lemma
     * @return $this
     */
    public function setLemma($lemma)
    {
        
        $this->lemma = $lemma;
        return $this;
    }
    
    /**
     * Gets start
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }
  
    /**
     * Sets start
     * @param int $start Start offset
     * @return $this
     */
    public function setStart($start)
    {
        
        $this->start = $start;
        return $this;
    }
    
    /**
     * Gets end
     * @return int
     */
    public function getEnd()
    {
        return $this->end;
    }
  
    /**
     * Sets end
     * @param int $end End offset
     * @return $this
     */
    public function setEnd($end)
    {
        
        $this->end = $end;
        return $this;
    }
    
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset 
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }
  
    /**
     * Gets offset.
     * @param  integer $offset Offset 
     * @return mixed 
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }
  
    /**
     * Sets value based on offset.
     * @param  integer $offset Offset 
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }
  
    /**
     * Unsets offset.
     * @param  integer $offset Offset 
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
  
    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(get_object_vars($this), JSON_PRETTY_PRINT);
        } else {
            return json_encode(get_object_vars($this));
        }
    }
}
