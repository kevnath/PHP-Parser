<?php

namespace PhpParser\Node\Scalar;

use PhpParser\Node\Scalar;
use PhpParser\Skripsi\IExtractable;

class EncapsedStringPart extends Scalar implements IExtractable
{
    /** @var string String value */
    public $value;

    /**
     * Constructs a node representing a string part of an encapsed string.
     *
     * @param string $value      String value
     * @param array  $attributes Additional attributes
     */
    public function __construct($value, array $attributes = array()) {
        parent::__construct($attributes);
        $this->value = $value;
    }

    public function getSubNodeNames() {
        return array('value');
    }

    public function extract()
    {
        return [
            'type' => $this->getType(),
            'value' => $this->value
        ];
    }
}
