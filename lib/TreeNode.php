<?php
/**
 * Generate treenode from array (for leetcode test-cases)
 */
class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function buildTreeLeekCode($inputArray) {
    $root = new TreeNode(array_shift($inputArray));
    $queue = array($root);
    while (count($queue) > 0 && count($inputArray) > 0) {
        $curNode = array_shift($queue);
        $leftVal = array_shift($inputArray);
        $rightVal = array_shift($inputArray);
        if ($leftVal !== null) {
            $curNode->left = new TreeNode($leftVal);
            $queue[] = $curNode->left;
        }
        if ($rightVal !== null) {
            $curNode->right = new TreeNode($rightVal);
            $queue[] = $curNode->right;
        }
    }

    return $root;
}
