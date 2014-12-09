<?php
/**
 * 逻辑处理类：基类
 */
namespace Common\Logic;
class BaseLogic {
    
	// 返回数据是否为空
	protected function returnListData($list = '') {
		if (! isset($list ['rows']) || ! is_array($list ['rows']) || empty($list['rows'])) {
			return array ('rows' => array (), 'total' => 0);
		} else {
			return $list;
		}
	}
	
	protected function getPage($page,$pageSize){
		$page = $page<=0 ? 1 : $page;
		$pageSize = empty($pageSize) ? C('PAGE_SIZE') : $pageSize;
		return array($page,$pageSize);
	}
}