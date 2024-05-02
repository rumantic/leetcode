<?php
require_once ('lib/TreeNode.php');

$tree = buildTreeLeekCode([1,2,2,null,3,null,3]);
echo '<pre>';
print_r($tree);
echo '</pre>';

$solution = new Solution();
echo 'result is '.intval($solution->isSymmetric($tree));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {
    private $level = [];

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        $level = 0;
        $this->helper($root, $level);

        foreach ( $this->level as $level_id => $items ) {
            if ( count($items) > 1 ) {
                list($array1, $array2) = array_chunk($items, ceil(count($items) / 2));
                if ( $array1 !== array_reverse($array2)  ) {
                    return false;
                }
            }
        }
        return true;
    }


    function helper ($root, $level)
    {
        $this->level[$level][] = $root->val;
        $level++;
        if ( $root->left != null ) {
            $this->helper($root->left, $level);
        } else {
            $this->level[$level][] = null;
        }
        if ( $root->right != null ) {
            $this->helper($root->right, $level);
        } else {
            $this->level[$level][] = null;
        }

    }


}
