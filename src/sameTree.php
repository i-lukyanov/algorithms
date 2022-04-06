<?php

declare(strict_types=1);

class TreeChecker
{
    public function isSameTree(TreeNode $p, TreeNode $q): bool
    {
        return ($this->makeTreeStructureString($p) === $this->makeTreeStructureString($q));
    }

    private function makeTreeStructureString(?TreeNode $node): string
    {
        if ($node === null) {
            return '';
        }

        $delim = '|';
        $leftStr = $this->makeTreeStructureString($node->left)
            ? ($delim . $this->makeTreeStructureString($node->left))
            : '';
        $rightStr = $this->makeTreeStructureString($node->right)
            ? ($delim . $this->makeTreeStructureString($node->right))
            : '';

        return $node->val . $leftStr . $rightStr;
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
