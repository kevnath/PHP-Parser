<?php

namespace PhpParser\Node\Stmt;

use PhpParser\Node;
use PhpParser\Skripsi\IStatementExtractable;

class Else_ extends Node\Stmt implements IStatementExtractable
{
    /** @var Node[] Statements */
    public $stmts;

    /**
     * Constructs an else node.
     *
     * @param Node[] $stmts      Statements
     * @param array  $attributes Additional attributes
     */
    public function __construct(array $stmts = array(), array $attributes = array()) {
        parent::__construct($attributes);
        $this->stmts = $stmts;
    }

    public function getSubNodeNames() {
        return array('stmts');
    }

    public function getStatements()
    {
        return $this->stmts;
    }
}
