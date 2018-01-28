<?php
/**
 * @category   Vky
 * @package    Vky_MobileNumberLogin
 * @author     Vicky <viky.031290@gmail.com>
 * @copyright  Copyright © VKY All right reserved
 */
class Vky_MobileNumberLogin_Model_MobileNumberLogin
{
	public function isMobileExist($postMobile,$currentCustomerId = null){
		$read = Mage::getSingleton('core/resource')->getConnection('core_read');
		if($currentCustomerId){
			$query = "select eavAtt.attribute_id,b.entity_id,b.value from eav_attribute AS eavAtt INNER JOIN customer_entity_varchar as b on eavAtt.attribute_id = b.attribute_id where b.value = $postMobile and b.entity_id != $currentCustomerId and attribute_code = 'mobile'";
			$results = $read->fetchAll($query);
			if($results){
				return true;
			}else{
				return false;
			}
		}else{	
			$query = "select eavAtt.attribute_id,b.value from eav_attribute AS eavAtt INNER JOIN customer_entity_varchar as b on eavAtt.attribute_id = b.attribute_id where b.value = $postMobile and attribute_code = 'mobile'";
			$results = $read->fetchAll($query);
			if($results){
				return true;
			}else{
				return false;
			}
		}
	}
}
