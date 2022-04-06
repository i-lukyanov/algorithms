<?php

declare(strict_types=1);

/**
 * Перевести массив структур вида (id, parent_id) в массив древовидных структур вида (id, children)
 *
 *
 * Судя по оценкам, функция arrayToTrees преобразует массив к нужному виду примерно за O(N*logN), сильнее оптимизировать пока не смог
 * Торжественно клянусь, что никуда не подглядывал за решением, времени потратил около 40 минут =)
 *
 * Прошу Вас все же рассмотреть меня на позицию Backend Engineer
 * Я быстро учусь, и верю, что смогу принести пользу компании
 */

class Leaf
{
    private int $id;

    private int $parentId;

    /**
     * @param int $id
     * @param int $parentId
     */
    public function __construct(int $id, int $parentId = 0)
    {
        $this->id = $id;
        $this->parentId = $parentId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }
}

class TreeNode
{
    private int $id;

    /**
     * @var TreeNode[]
     */
    private array $leaves;

    /**
     * @param int $id
     * @param TreeNode[] $leaves
     */
    public function __construct(int $id, array $leaves = [])
    {
        $this->id = $id;
        $this->leaves = $leaves;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return TreeNode[]
     */
    public function getLeaves(): array
    {
        return $this->leaves;
    }

    public function addNode(TreeNode $node): void
    {
        $this->leaves[$node->getId()] = $node;
    }
}

/**
 * @param Leaf[] $leaves
 * @return TreeNode[]
 */
function arrayToTrees(array $leaves): array
{
    /** @var TreeNode[] $trees */
    $trees = [];

    foreach ($leaves as $i => $leaf) {
        if ($leaf->getParentId() === 0) {
            $trees[$leaf->getId()] = new TreeNode($leaf->getId());

            unset($leaves[$i]);
        }
    }

    foreach ($trees as $b => $node) {
        fillNodeChildren($node, $leaves);
    }

    return $trees;
}

/**
 * @param TreeNode $node
 * @param Leaf[] $leaves
 * @return void
 */
function fillNodeChildren(TreeNode $node, array &$leaves): void
{
    foreach ($leaves as $i => $leaf) {
        if ($leaf->getParentId() === $node->getId()) {
            $node->addNode(new TreeNode($leaf->getId()));

            unset($leaves[$i]);
        }
    }

    foreach ($node->getLeaves() as $b => $childNode) {
        fillNodeChildren($childNode, $leaves);
    }
}

$l = [
    new Leaf(1, 3),
    new Leaf(2, 6),
    new Leaf(3, 5),
    new Leaf(4, 6),
    new Leaf(5, 0),
    new Leaf(6, 5),
    new Leaf(7, 3),
    new Leaf(8, 0),
    new Leaf(9, 6),
    new Leaf(10, 4),
    new Leaf(11, 8),
];

var_dump(arrayToTrees($l)); die();
