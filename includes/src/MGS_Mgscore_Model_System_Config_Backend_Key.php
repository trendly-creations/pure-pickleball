<?php

class MGS_Mgscore_Model_System_Config_Backend_Key extends Mage_Core_Model_Config_Data {

    const STRING_URL = 'http://www.magesolution.com/index.php/';

    protected function getStringExtension() {
        return null;
    }

    protected function _afterSave() {
        $keyString = $this->getData('groups/license/fields/key/value');
        if ($keyString != null || $keyString != '') {
            try {
                $url = self::STRING_URL . 'licensekey/index/data/';
                $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_USERAGENT, $agent);
                $result = curl_exec($ch);
                curl_close($ch);
                $licenses = json_decode(base64_decode($result));
                $keys = array();
                foreach ($licenses as $license) {
                    $keys[] = $license->key;
                }
                if (in_array($keyString, $keys)) {
                    foreach ($licenses as $license) {
                        if ($keyString == $license->key) {
                            if ($license->status == 1) {
                                if ($license->num_of_domain == 0) {
                                    if ($keyString != $license->key) {
                                        throw new Exception(Mage::helper('mgscore')->__('License key does not match'));
                                    }
                                } else {
                                    if ($_SERVER['HTTP_HOST'] != $license->domain || $keyString != $license->key) {
                                        throw new Exception(Mage::helper('mgscore')->__('License key or domain does not match'));
                                    }
                                }
                                if ($license->type == 1) {
                                    $stringExtension = $this->getStringExtension();
                                    $value = md5($keyString . $stringExtension);
                                    Mage::getModel('core/config_data')
                                            ->load('system/general/' . $this->getStringExtension(), 'path')
                                            ->setValue($value)
                                            ->setPath('system/general/' . $this->getStringExtension())
                                            ->save();
                                } else {
                                    $stringExtension = $this->getStringExtension();
                                    $currentDate = date('d-m-Y');
                                    $value = md5($keyString . $stringExtension) . base64_encode($currentDate);
                                    Mage::getModel('core/config_data')
                                            ->load('system/general/' . $this->getStringExtension(), 'path')
                                            ->setValue($value)
                                            ->setPath('system/general/' . $this->getStringExtension())
                                            ->save();
                                }
                            } else {
                                $urlUpdate = self::STRING_URL . 'licensekey/index/update/';
                                $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
                                $fields = array(
                                    'licensekey_id' => urlencode($license->licensekey_id),
                                    'domain' => urlencode($_SERVER['HTTP_HOST']),
                                    'actived_at' => urlencode(now()),
                                    'status' => urlencode(1)
                                );
                                $fieldsString = '';
                                foreach ($fields as $key => $value) {
                                    $fieldsString .= $key . '=' . $value . '&';
                                }
                                $fieldsString = rtrim($fieldsString, '&');
                                $chUpdate = curl_init();
                                curl_setopt($chUpdate, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($chUpdate, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($chUpdate, CURLOPT_URL, $urlUpdate);
                                curl_setopt($chUpdate, CURLOPT_USERAGENT, $agent);
                                curl_setopt($chUpdate, CURLOPT_POST, count($fields));
                                curl_setopt($chUpdate, CURLOPT_POSTFIELDS, $fieldsString);
                                $resultUpdate = curl_exec($chUpdate);
                                curl_close($chUpdate);
                                if ((int) $resultUpdate == 1) {
                                    if ($license->type == 1) {
                                        $stringExtension = $this->getStringExtension();
                                        $value = md5($keyString . $stringExtension);
                                        Mage::getModel('core/config_data')
                                                ->load('system/general/' . $this->getStringExtension(), 'path')
                                                ->setValue($value)
                                                ->setPath('system/general/' . $this->getStringExtension())
                                                ->save();
                                    } else {
                                        $stringExtension = $this->getStringExtension();
                                        $currentDate = date('d-m-Y');
                                        $value = md5($keyString . $stringExtension) . base64_encode($currentDate);
                                        Mage::getModel('core/config_data')
                                                ->load('system/general/' . $this->getStringExtension(), 'path')
                                                ->setValue($value)
                                                ->setPath('system/general/' . $this->getStringExtension())
                                                ->save();
                                    }
                                }
                            }
                        }
                    }
                } else {
                    throw new Exception(Mage::helper('mgscore')->__('License key does not exist'));
                }
            } catch (Exception $e) {
                throw new Exception(Mage::helper('mgscore')->__($e->getMessage()));
            }
        }
    }

}
