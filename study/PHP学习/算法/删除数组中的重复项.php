<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     * @Explanation array_unique()
     */
    public function removeDuplicates(&$nums)
    {
        $count = count($nums);
        $out   = 0;
        if (empty($nums)) {
            return $out;
        }
        for ($i = 0; $i < $count; $i++) {
            if ($i == $count - 1) {
                $out++;
                break;
            }
            $l = $i + 1;
            if ($nums[$i] == $nums[$l]) {
                unset($nums[$i]);
                continue;
            }
            $out++;
        }
        return $out;
    }
}
