<?php

namespace PhpParser\Node\Scalar;

use PhpParser\Node\Expr;
use PhpParser\Node\Scalar;
use PhpParser\Skripsi\IExprOnlyExtractable;

class Encapsed extends Scalar implements IExprOnlyExtractable
{
    /** @var Expr[] list of string parts */
    public $parts;

    /**
     * Constructs an encapsed string node.
     *
     * @param array $parts      Encaps list
     * @param array $attributes Additional attributes
     */
    public function __construct(array $parts, array $attributes = array()) {
        parent::__construct($attributes);
        $this->parts = $parts;
    }

    public function getSubNodeNames() {
        return array('parts');
    }

    public function extract()
    {
        return $this->parts;
    }
}
