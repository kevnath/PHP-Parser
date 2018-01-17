<?php

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;
use PhpParser\Node\Name;
use PhpParser\Skripsi\IExtractable;

class StaticPropertyFetch extends Expr implements IExtractable
{
    /** @var Name|Expr Class name */
    public $class;
    /** @var string|Expr Property name */
    public $name;

    /**
     * Constructs a static property fetch node.
     *
     * @param Name|Expr   $class      Class name
     * @param string|Expr $name       Property name
     * @param array       $attributes Additional attributes
     */
    public function __construct($class, $name, array $attributes = array()) {
        parent::__construct($attributes);
        $this->class = $class;
        $this->name = $name;
    }

    public function getSubNodeNames() {
        return array('class', 'name');
    }

    public function extract()
    {
        return [
            'type' => $this->getType(),
            'class' => $this->class,
            'name' => $this->name
        ];
    }
}
