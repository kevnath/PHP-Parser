<?php

namespace PhpParser\Node\Stmt;

use PhpParser\Node;
use PhpParser\Skripsi\IConditionExtractable;
use PhpParser\Skripsi\IStatementExtractable;

class Switch_ extends Node\Stmt implements IStatementExtractable, IConditionExtractable
{
    /** @var Node\Expr Condition */
    public $cond;
    /** @var Case_[] Case list */
    public $cases;

    /**
     * Constructs a case node.
     *
     * @param Node\Expr $cond       Condition
     * @param Case_[]   $cases      Case list
     * @param array     $attributes Additional attributes
     */
    public function __construct(Node\Expr $cond, array $cases, array $attributes = array()) {
        parent::__construct($attributes);
        $this->cond = $cond;
        $this->cases = $cases;
    }

    public function getSubNodeNames() {
        return array('cond', 'cases');
    }

    public function getStatements()
    {
        $casesStmts = array();
        foreach($this->cases as $case) {
            $casesStmts[] = $case->getStatements();
        }
        return $casesStmts;
    }

    public function getCondition()
    {
        return $this->cond;
    }
}
