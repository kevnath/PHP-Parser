<?php

namespace PhpParser\Node\Expr;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Skripsi\IExtractable;

class FuncCall extends Expr
{
    /** @var Node\Name|Expr Function name */
    public $name;
    /** @var Node\Arg[] Arguments */
    public $args;

    /**
     * Constructs a function call node.
     *
     * @param Node\Name|Expr $name       Function name
     * @param Node\Arg[]                    $args       Arguments
     * @param array                                   $attributes Additional attributes
     */
    public function __construct($name, array $args = array(), array $attributes = array()) {
        parent::__construct($attributes);
        $this->name = $name;
        $this->args = $args;
    }

    public function getSubNodeNames() {
        return array('name', 'args');
    }

    public function extract() {
        $args = [];
        foreach($this->args as $arg) {
            $args[] = $arg->extract();
        }
        return [
            'name' => $this->name->extract(),
            'args' => $args
        ];
    }
}
