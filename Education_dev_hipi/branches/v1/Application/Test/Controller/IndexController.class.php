<?php

/**
 * 测试
 * @author CGY
 *
 */

namespace Test\Controller;

class IndexController extends \Think\Controller {
	
	public function indexAct(){
		$this->display();
	}
	
	public function phpRPCAct(){
		Vendor('phpRPC.phprpc_client');
		$client = new \PHPRPC_Client('http://localhost:8500/Api/RpcTest');
		$result = $client->test();
		dump($result);
	}
	
	public function hproseAct(){
		vendor('Hprose.HproseHttpClient');
		$client = new \HproseHttpClient('http://localhost:8500/Api/HproseTest');
		$result = $client->test();
		dump($result);
	}
	
	public function jsonRPCAct(){
		vendor('jsonRPC.jsonRPCClient');
		$client = new \jsonRPCClient('http://localhost:8500/Api/JsonRPCTest');
		$result = $client->test();
		var_dump($result); // 结果：
	}
	
}