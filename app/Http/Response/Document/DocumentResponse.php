<?php
/**
 * Created by PhpStorm.
 * User: throzen
 * Date: 7.10.2018
 * Time: 21:40
 */

namespace App\Http\Response;


use App\Http\Transformers\DocumentTransformer;

class DocumentResponse implements \JsonSerializable
{
    /**
     * @var null
     */
    protected $document = null;

    public function __construct($document)
    {
        $this->document = DocumentTransformer::transform($document);
    }


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return [
            'document' => $this->document
        ];
    }
}