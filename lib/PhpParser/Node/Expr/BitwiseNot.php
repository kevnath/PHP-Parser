<?php

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;
use PhpParser\Skripsi\IExprOnlyExtractable;

class BitwiseNot extends Expr implements IExprOnlyExtractable
{
    /** @var Expr Expression */
    public $expr;

    /**
     * Constructs a bitwise not node.
     *
     * @param Expr  $expr       Expression
     * @param array $attributes Additional attributes
     */
    public function __construct(Expr $expr, array $attributes = array()) {
        parent::__construct($attributes);
        $this->expr = $expr;
    }

    public function getSubNodeNames() {
        return array('expr');
    }

    public function extract()
    {
        return $this->expr;
    }
}
