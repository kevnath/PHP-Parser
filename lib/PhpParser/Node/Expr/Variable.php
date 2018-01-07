<?php

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;
use PhpParser\Skripsi\IExtractable;

class Variable extends Expr implements IExtractable
{
    /** @var string|Expr Name */
    public $name;

    /**
     * Constructs a variable node.
     *
     * @param string|Expr $name       Name
     * @param array                      $attributes Additional attributes
     */
    public function __construct($name, array $attributes = array()) {
        parent::__construct($attributes);
        $this->name = $name;
    }

    public function getSubNodeNames() {
        return array('name');
    }

    public function extract()
    {
        return [
            'type' => $this->getType(),
            'name' => $this->name
        ];
    }
}
