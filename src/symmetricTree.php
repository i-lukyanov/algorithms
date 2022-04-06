<?php

declare(strict_types=1);

class SymTreeChecker
{
    public function isSymmetric(TreeNode $root): bool
    {
        return ($this->makeTreeStructureString($root->left) === $this->makeTreeStructureString($root->right, true));
    }

    private function makeTreeStructureString(?TreeNode $node, $right = false): string
    {
        if ($node === null) {
            return '';
        }

        $delim = '|';

        $lss = $this->makeTreeStructureString($node->left);
        $leftStr = $lss ? ($delim . $lss) : $delim . 'null';

        $rss = $this->makeTreeStructureString($node->right);
        $rightStr = $rss ? ($delim . $rss) : $delim . 'null';

        $addStr = ($right === true) ? ($leftStr . $rightStr) : ($rightStr . $leftStr);

        return 1 . $addStr;
    }
}

class TreeNode
{
    /**
     * @var int|null
     */
    public $val;

    /**
     * @var TreeNode|null
     */
    public $left;

    /**
     * @var TreeNode|null
     */
    public $right;

    public function __construct(int $val = 0, ?TreeNode $left = null, ?TreeNode $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

$tc = new SymTreeChecker();

$n3 = new TreeNode(3);
$n2 = new TreeNode(2, $n3);
$n1 = new TreeNode(1, $n2);

var_dump($tc->isSymmetric($n1)); die();
