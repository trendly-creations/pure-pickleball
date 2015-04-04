<?php

class MGS_Mgscore_Helper_Data extends Mage_Core_Helper_Abstract {

    public function dateDiff($start, $end) {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);
    }

    public function isEnable($stringExtension, $module) {
        $licenseKey = Mage::helper($module)->getLicenseKey();
        $config = Mage::getModel('core/config_data')->load('system/general/' . $stringExtension, 'path');
        $value = $config->getData('value');
        $encryptValue = md5($licenseKey . $stringExtension);
        if ($encryptValue == $value) {
            return 1;
        } else {
            $date = date('Y-m-d', strtotime(base64_decode(substr($value, -16))));
            $str = str_replace(substr($value, -16), '', $value);
            if ($encryptValue == $str) {
                $days = Mage::helper('mgscore')->dateDiff($date, date('Y-m-d'));
                if ($days <= 30) {
                    return 1;
                } else {
                    return 2; //'License key for this extension has expired.';
                }
                return 1;
            } else {
                return 0; // 'Incorrect license key.';
            }
        }
    }

}
