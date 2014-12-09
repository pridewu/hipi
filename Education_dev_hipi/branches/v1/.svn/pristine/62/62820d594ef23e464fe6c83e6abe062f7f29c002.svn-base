<?php
/**
 * 控制器基类
 * @author FYW
 *
 */
namespace Common\Controller;
class CommonController extends \Think\Controller{
	
	
	
	//消息页面图片及按钮常量
	const ICON_ERROR	= 1; //错误消息
	const ICON_SUCCESS	= 2; //成功消息
	const ICON_INFO		= 3; //提示消息
	const ICON_QUESTION = 4; //询问消息
	const ICON_WARNING	= 5; //警告消息
	const BUTTON_BACK	= 1; //返回按钮
	const BUTTON_OK		= 2; //确定按钮
	const BUTTON_CANCEL	= 3; //取消按钮
	const BUTTON_YES	= 4; //是按钮
	const BUTTON_NO		= 5; //否按钮
	
	
	protected $name = '';	//控制器名
	public $user = '';		//用户信息
	
	
	public function _initialize(){
		//控制器名
		$className = explode('\\', get_class($this));
		$className = $className[count($className)-1];
		$this->name = substr($className,0,-10);
	}
	
	
	/**
	 * 空操作
	 * 第一次默认调用父类分组相应操作，如果也不存在，则报错
	 */
	public function _empty(){
		if(PARENT_MODULE == MODULE_NAME){ //直接访问父类分组
			if(C('AREA_VER') == 1){
                $this->showMessage('页面不存在或本操作不可用！',self::ICON_ERROR,'');
            }else{
                $this->showMessage('页面不存在或本操作不可用！',self::ICON_ERROR,'','Public:404');
            }
		}else{
			if(defined('EMPTY_ACTION')) return;
			define('EMPTY_ACTION',true);
			//调用父类
			if(R(C('PARENT_MODULE').'/'.CONTROLLER_NAME.'/'.ACTION_NAME)===false){
				if(C('AREA_VER') == 1){
                    $this->showMessage('页面不存在或本操作不可用！',self::ICON_ERROR,'');
                }else{
                    $this->showMessage('页面不存在或本操作不可用！',self::ICON_ERROR,'','Public:404');
                }
			}
		}
	}
	
	
	//初始化用户
	private function _initUser(){}

	/**
	 * 添加浮动消息
	 * @param string $message
     * $sign 0为失败 1为成功 2为警告
	 */
	public function addFloatMessage($message,$url=''){
		add_float_message($message,$url);		
	}	
    
	/**
	 * 显示消息页面
	 * @param string $message 消息内容
	 * @param int $icon 消息类型
	 * @param array $buttons 按钮数组 :array(x1=>array('text','img1','img2','url'),x2=>(...))或array(n1,n2,..);
	 * @param string $template 模板
	 */
	public function showMessage($message,$icon=self::ICON_INFO,$buttons='',$template=''){
		$dfButtons = array(
				self::BUTTON_OK		=> array('text'=>'确定','img1'=>'msg/btn_ok.png','img2'=>'msg/btn_ok_over.png'),
				self::BUTTON_CANCEL => array('text'=>'取消','img1'=>'msg/btn_cancel.png','img2'=>'msg/btn_cancel_over.png'),
				self::BUTTON_YES	=> array('text'=>'是','img1'=>'msg/btn_yes.png','img2'=>'msg_btn/yes_over.png'),
				self::BUTTON_NO		=> array('text'=>'否','img1'=>'msg/btn_no.png','img2'=>'msg_btn/no_over.png'),
				self::BUTTON_BACK	=> array('text'=>'返回','img1'=>'msg/btn_back.png','img2'=>'msg/btn_back_over.png'),
		);
		if(C('MESSAGE_BUTTONS')) $dfButtons = array_merge($dfButtons,C('MESSAGE_BUTTONS'));
		if(empty($buttons)){
			if($icon==self::ICON_ERROR){
				$buttons = array(self::BUTTON_BACK);
			}elseif($icon==self::ICON_SUCCESS){
				$buttons = array(self::BUTTON_BACK);
			}elseif($icon==self::ICON_INFO){
				$buttons = array(self::BUTTON_BACK);
			}elseif($icon==self::ICON_QUESTION){
				$buttons = array(self::BUTTON_YES,self::BUTTON_NO,self::BUTTON_BACK);
			}elseif($icon==self::ICON_WARNING){
				$buttons = array(self::BUTTON_BACK);
			}
		}
		foreach($buttons as $key=>$button){
			if(is_int($button)){
				$button = $dfButtons[$button];
			}elseif(is_array($button) && is_int($key)){
				if(empty($button['text'])) $button['text'] = $dfButtons[$key]['text'];
				if(empty($button['img1'])) $button['img1'] = $dfButtons[$key]['img1'];
				if(empty($button['img2'])) $button['img2'] = $dfButtons[$key]['img2'];
				if(empty($button['url']))  $button['url'] =  $dfButtons[$key]['url'];
			}elseif(!is_array($button)){
				continue;
			}
			if(empty($button['url'])) {
				//OK、YES、NO按钮默认跳转到前一页
				//if(in_array($key,array(self::BUTTON_OK,self::BUTTON_YES,self::BUTTON_NO))){
				//	$buttons['url'] = $_SERVER["HTTP_REFERER"];
				//}else{ //其它按钮默认返回前一页
				$button['url'] = 'javascript:history.back(-1);';
				//}
			}
			$buttons[$key] = $button;
		}
		$this->assign(array(
				'message' 	=> $message,
				'icon'		=> $icon,
				'buttons' 	=> $buttons,
		));
		if(empty($template)) $template = 'Public:message';
		$this->display($template);
		exit;
	}
	
	
}