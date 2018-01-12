<?php

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;
use PhpParser\Skripsi\IExtractable;

abstract class AssignOp extends Expr implements IExtractable
{
    /** @var Expr Variable */
    public $var;
    /** @var Expr Expression */
    public $expr;

    /**
     * Constructs a compound assignment operation node.
     *
     * @param Expr  $var        Variable
     * @param Expr  $expr       Expression
     * @param array $attributes Additional attributes
     */
    public function __construct(Expr $var, Expr $expr, array $attributes = array()) {
        parent::__construct($attributes);
        $this->var = $var;
        $this->expr = $expr;
    }

    public function getSubNodeNames() {
        return array('var', 'expr');
    }

    public function extract()
    {
        return [
            'type' => $this->getType(),
            'var' => $this->var,
            'expr' => $this->expr
        ];
    }
}
