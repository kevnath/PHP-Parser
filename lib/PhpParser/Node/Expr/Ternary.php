<?php

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;
use PhpParser\Skripsi\IConditionExtractable;
use PhpParser\Skripsi\IStatementExtractable;

class Ternary extends Expr implements IConditionExtractable, IStatementExtractable
{
    /** @var Expr Condition */
    public $cond;
    /** @var null|Expr Expression for true */
    public $if;
    /** @var Expr Expression for false */
    public $else;

    /**
     * Constructs a ternary operator node.
     *
     * @param Expr      $cond       Condition
     * @param null|Expr $if         Expression for true
     * @param Expr      $else       Expression for false
     * @param array                    $attributes Additional attributes
     */
    public function __construct(Expr $cond, $if, Expr $else, array $attributes = array()) {
        parent::__construct($attributes);
        $this->cond = $cond;
        $this->if = $if;
        $this->else = $else;
    }

    public function getSubNodeNames() {
        return array('cond', 'if', 'else');
    }

    public function getCondition()
    {
        return $this->cond;
    }

    public function getStatements()
    {
        return [
            'if' => $this->if,
            'else' => $this->else
        ];
    }
}
