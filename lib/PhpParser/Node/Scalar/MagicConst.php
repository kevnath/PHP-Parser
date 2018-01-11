<?php

namespace PhpParser\Node\Scalar;

use PhpParser\Node\Scalar;
use PhpParser\Skripsi\IExtractable;

abstract class MagicConst extends Scalar implements IExtractable
{
    /**
     * Constructs a magic constant node.
     *
     * @param array $attributes Additional attributes
     */
    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
    }

    public function getSubNodeNames() {
        return array();
    }

    /**
     * Get name of magic constant.
     *
     * @return string Name of magic constant
     */
    abstract public function getName();

    public function extract()
    {
        return [
            'type' => $this->getType(),
            'name' => $this->getName()
        ];

    }
}
