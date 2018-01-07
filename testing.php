<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 10:48
 */

include_once ('lib/bootstrap.php');

class Mapper extends \PhpParser\NodeVisitorAbstract {
    public function enterNode(\PhpParser\Node $node)
    {
//        $this->prettyVarDump($node);
        if($node instanceof \PhpParser\Skripsi\IExtractable) {
            $result = $node->extract();
            $this->prettyVarDump($result);
        }
        return \PhpParser\NodeTraverser::DONT_TRAVERSE_CHILDREN;
    }

    public function prettyVarDump($object) {
        echo '<pre>';
        var_dump($object);
        echo '</pre>';
    }
}
$parser = (new \PhpParser\ParserFactory())->create(\PhpParser\ParserFactory::PREFER_PHP5);
$result = $parser->parse(file_get_contents('testingcode.php'));

$traverser = new \PhpParser\NodeTraverser();
$traverser->addVisitor(new Mapper());
$traverser->traverse($result);

//echo '<pre>';
//var_dump($result);
//echo '</pre>';