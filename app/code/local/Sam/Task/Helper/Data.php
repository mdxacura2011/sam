<?php

class Sam_Task_Helper_Data extends Mage_Core_Helper_Abstract
{
    private function tsh($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    public function validate($str)
    {
        foreach ($str as &$value) {
            $value = $this->tsh($value);
        }
        unset($value);
        return $str;
    }
}