<?php

namespace PhpParser\Node\Stmt;

use PhpParser\Node;
use PhpParser\Skripsi\IConditionExtractable;
use PhpParser\Skripsi\IStatementExtractable;

class While_ extends Node\Stmt implements IStatementExtractable, IConditionExtractable
{
    /** @var Node\Expr Condition */
    public $cond;
    /** @var Node[] Statements */
    public $stmts;

    /**
     * Constructs a while node.
     *
     * @param Node\Expr $cond       Condition
     * @param Node[]    $stmts      Statements
     * @param array     $attributes Additional attributes
     */
    public function __construct(Node\Expr $cond, array $stmts = array(), array $attributes = array()) {
        parent::__construct($attributes);
        $this->cond = $cond;
        $this->stmts = $stmts;
    }

    public function getSubNodeNames() {
        return array('cond', 'stmts');
    }

    public function getStatements()
    {
        return $this->stmts;
    }

    public function getCondition()
    {
        return $this->cond;
    }
}
