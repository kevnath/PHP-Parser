<?php

namespace PhpParser\Node\Stmt;

use PhpParser\Node;
use PhpParser\Skripsi\IStatementExtractable;

class Trait_ extends ClassLike implements IStatementExtractable
{
    /**
     * Constructs a trait node.
     *
     * @param string $name       Name
     * @param array  $subNodes   Array of the following optional subnodes:
     *                           'stmts' => array(): Statements
     * @param array  $attributes Additional attributes
     */
    public function __construct($name, array $subNodes = array(), array $attributes = array()) {
        parent::__construct($attributes);
        $this->name = $name;
        $this->stmts = isset($subNodes['stmts']) ? $subNodes['stmts'] : array();
    }

    public function getSubNodeNames() {
        return array('name', 'stmts');
    }

    public function getStatements()
    {
        $stmts = array();
        foreach($this->stmts as $stmt) {
            if($stmt instanceof IStatementExtractable)
                $stmts[] = $stmt->getStatements();
        }
        return $stmts;
    }
}
