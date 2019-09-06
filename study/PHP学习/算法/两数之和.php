<?php
/* 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
 */
class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function twoSum(array $nums, $target)
    {
        $find  = [];
        $count = count($nums);

        for ($i = 0; $i < $count; $i++) {
            $value = $nums[$i];

            if ($a = array_keys($find, ($target - $value))) {
                var_dump([$a[0], $i]);
            }

            $find[$i] = $value;
        }
    }
}

$a1 = new Solution;
$a1->twoSum([1, 2, 3, 4, 5, 6], 6);
