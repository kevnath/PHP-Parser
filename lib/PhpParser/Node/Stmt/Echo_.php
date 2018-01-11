<?php

namespace PhpParser\Node\Stmt;

use PhpParser\Node;
use PhpParser\Skripsi\IExtractable;

class Echo_ extends Node\Stmt implements IExtractable
{
    /** @var Node\Expr[] Expressions */
    public $exprs;

    /**
     * Constructs an echo node.
     *
     * @param Node\Expr[] $exprs      Expressions
     * @param array       $attributes Additional attributes
     */
    public function __construct(array $exprs, array $attributes = array()) {
        parent::__construct($attributes);
        $this->exprs = $exprs;
    }

    public function getSubNodeNames() {
        return array('exprs');
    }


    public function extract()
    {
        return $this->exprs;
    }
}
