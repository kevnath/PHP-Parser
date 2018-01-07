<?php

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;
use PhpParser\Skripsi\IExtractable;

class ArrayDimFetch extends Expr implements IExtractable
{
    /** @var Expr Variable */
    public $var;
    /** @var null|Expr Array index / dim */
    public $dim;

    /**
     * Constructs an array index fetch node.
     *
     * @param Expr      $var        Variable
     * @param null|Expr $dim        Array index / dim
     * @param array     $attributes Additional attributes
     */
    public function __construct(Expr $var, Expr $dim = null, array $attributes = array()) {
        parent::__construct($attributes);
        $this->var = $var;
        $this->dim = $dim;
    }

    public function getSubNodeNames() {
        return array('var', 'dim');
    }

    public function extract()
    {
        $dim = $this->dim;
        if($dim !== null) {
            $dim = $dim->extract();
        }
        return [
            'type' => $this->getType(),
            'var' => $this->var->extract(),
            'dim' => $dim
        ];
    }
}
