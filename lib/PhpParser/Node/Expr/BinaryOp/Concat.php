<?php

namespace PhpParser\Node\Expr\BinaryOp;

use PhpParser\Node\Expr\BinaryOp;
use PhpParser\Skripsi\IExtractable;

class Concat extends BinaryOp implements IExtractable
{
    public function extract()
    {
        return [
            'type' => $this->getType(),
            'left' => $this->left->extract(),
            'right' => $this->right->extract()
        ];
    }
}