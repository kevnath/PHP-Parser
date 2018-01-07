<?php

namespace PhpParser\Node\Expr;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Skripsi\IExtractable;

class StaticCall extends Expr implements IExtractable
{
    /** @var Node\Name|Expr Class name */
    public $class;
    /** @var string|Expr Method name */
    public $name;
    /** @var Node\Arg[] Arguments */
    public $args;

    /**
     * Constructs a static method call node.
     *
     * @param Node\Name|Expr $class      Class name
     * @param string|Expr    $name       Method name
     * @param Node\Arg[]     $args       Arguments
     * @param array          $attributes Additional attributes
     */
    public function __construct($class, $name, array $args = array(), array $attributes = array()) {
        parent::__construct($attributes);
        $this->class = $class;
        $this->name = $name;
        $this->args = $args;
    }

    public function getSubNodeNames() {
        return array('class', 'name', 'args');
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
            'class' => $this->class->extract(),
            'name' => $this->extractName(),
            'args' => $this->extractArgs()
        ];
    }
}
