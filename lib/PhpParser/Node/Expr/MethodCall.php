<?php

namespace PhpParser\Node\Expr;

use PhpParser\Node\Arg;
use PhpParser\Node\Expr;
use PhpParser\Skripsi\IExtractable;

class MethodCall extends Expr implements IExtractable
{
    /** @var Expr Variable holding object */
    public $var;
    /** @var string|Expr Method name */
    public $name;
    /** @var Arg[] Arguments */
    public $args;

    /**
     * Constructs a function call node.
     *
     * @param Expr        $var        Variable holding object
     * @param string|Expr $name       Method name
     * @param Arg[]       $args       Arguments
     * @param array       $attributes Additional attributes
     */
    public function __construct(Expr $var, $name, array $args = array(), array $attributes = array()) {
        parent::__construct($attributes);
        $this->var = $var;
        $this->name = $name;
        $this->args = $args;
    }

    public function getSubNodeNames() {
        return array('var', 'name', 'args');
    }

    private function extractName() {
        $name = $this->name;
        if(!is_scalar($name)) {
            return $name->extract();
        }
        return $name;
    }

    private function extractArgs() {
        $args = [];
        foreach($this->args as $arg) {
            $args[] = $arg->extract();
        }
        return $args;
    }

    public function extract()
    {
        return [
            'type' => $this->getType(),
            'var' => $this->var->extract(),
            'name' => $this->extractName(),
            'args' => $this->extractArgs()
        ];
    }
}
