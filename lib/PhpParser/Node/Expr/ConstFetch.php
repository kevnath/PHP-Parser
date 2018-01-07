<?php

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;
use PhpParser\Node\Name;
use PhpParser\Skripsi\IExtractable;

class ConstFetch extends Expr implements IExtractable
{
    /** @var Name Constant name */
    public $name;

    /**
     * Constructs a const fetch node.
     *
     * @param Name  $name       Constant name
     * @param array $attributes Additional attributes
     */
    public function __construct(Name $name, array $attributes = array()) {
        parent::__construct($attributes);
        $this->name = $name;
    }

    public function getSubNodeNames() {
        return array('name');
    }

    public function extract()
    {
        return [
            'type' => $this->getType(),
            'name' => $this->name
        ];
    }
}
