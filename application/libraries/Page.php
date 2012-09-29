<?php if (!defined('BASEPATH')) exit('No direct script access allowed');    

/**
 * Page Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Pagination
 * @author		power721@163.com
 * @link		http://blog.csdn.net/power721
 */
class Page {

	var $base_url			= ''; // The page we are linking to
	var $total_rows			=  0; // total_rows number of items (database results)
	var $per_page			= 10; // Max number of items you want shown per page
	var $num_links			=  2; // Number of "digit" links to show before/after the currently viewed page
	var $cur_page			=  0; // The current page being viewed
	var $total_page 		=  0; // The total page
	var $first_url			= ''; // Alternative URL for the First Page.
	var $uri_segment		=  3;
	var $page_query_string	= FALSE;
 	var $next_page 			= 'Next';  //下一页
	var $pre_page			= 'Prev';  //上一页
	var $first_page 		= 'First'; //首页
	var $last_page 			= 'Last';  //尾页

	/**
	 * constructor构造函数
	 *
	 * @param $params = array()
	 */
	public function __construct($params = array())
	{
		if (count($params) > 0)
		{
			$this->initialize($params);
		}
		log_message('debug', "Page Class Initialized");
	}

	function initialize($params)
	{
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}
		}
		if($this->per_page <= 0)
			$this->per_page = 1;
		$this->total_page = ceil( $this->total_rows / $this->per_page);//总页数
		if($this->cur_page == 0) {
			$CI = &get_instance();
			$CI->load->helper('url');
			$this->cur_page   = $CI->uri->segment($this->uri_segment) ? $CI->uri->segment($this->uri_segment) : 1;
		}
		$this->_myset_url($this->base_url);//设置链接地址
	}

	/**
	 * 获取显示"下一页"的url
	 * 
	 * @return string
	 */
	function next_url()
	{
		if($this->cur_page < $this->total_page){
			return $this->_get_url($this->cur_page + 1);
		}
		return '';
	}

	/**
	 * 获取显示"上一页"的url
	 * 
	 * @return string
	 */
	function pre_url()
	{
		if($this->cur_page > 1){
			return $this->_get_url($this->cur_page - 1);
		}
		return '';
	}

	/**
	 * 获取显示"下一页"的代码
	 * 
	 * @param string $style
	 * @return string
	 */
	function next_page($style = 'pg_next')
	{
		if($this->cur_page < $this->total_page){
		 	return ' '.$this->_get_link($this->_get_url($this->cur_page + 1), $this->next_page, $style);
		}
		return ' <span class="'.$style.' disable">'.$this->next_page.'</span>';
	}
 
	/**
	 * 获取显示“上一页”的代码
	 *
	 * @param string $style
	 * @return string
	 */
	function pre_page($style = 'pg_pre')
	{
		if($this->cur_page > 1){
			return $this->_get_link($this->_get_url($this->cur_page-1),$this->pre_page,$style).' ';
		}
		return '<span class="'.$style.' disable">'.$this->pre_page.'</span> ';
	}
 
	/**
	 * 获取显示“首页”的代码
	 *
	 * @param string $style
	 * @return string
	 */
	function first_page($style = 'pg_first')
	{
		if($this->cur_page == 1){
			return '<span class="'.$style.' disable">'.$this->first_page.'</span> ';
		}
		return $this->_get_link($this->_get_url(1),$this->first_page,$style).' ';
	}
 
	/**
	* 获取显示“尾页”的代码
	*
	* @param string $style
	* @return string
	*/
	function last_page($style = 'pg_last')
	{
		if($this->cur_page == $this->total_page){
			return ' <span class="'.$style.' disable">'.$this->last_page.'</span> ';
		}
		return ' '.$this->_get_link($this->_get_url($this->total_page),$this->last_page,$style).' ';
	}

	/**
	 * 获取显示“当前页”的代码
	 *
	 * @param string $style
	 * @param string $curindex_style
	 * @return string
	 */
	function pages($style = 'pg_link', $curindex_style = 'pg_cur')
	{
		$plus 	= $this->num_links;
		$begin 	= 1;
		$end 	= $this->total_page;
		
		if ($this->cur_page > $plus) {
			$begin 	= $this->cur_page-$plus;
			$end 	= $this->cur_page + $plus;
			if ($end > $this->total_page) {
				$begin 	= (($begin - $end + $this->total_page) > 0) ? ($begin - $end + $this->total_page) : 1;
				$end 	= $this->total_page;
			}
		}
		else {
			$begin 	= 1;
			$end 	= $begin + 2 * $plus;
			$end 	= $end > $this->total_page ? $this->total_page : $end;
		}
		$out = '';
		for($i = $begin; $i <= $end; $i++)
		{
			if($i != $this->cur_page){
				$out .= $this->_get_link($this->_get_url($i),' '.$i.' ',$style);
			}else{
				$out .= '<span class="'.$curindex_style.'"> '.$i.' </span>';
			}
			
		}
		
		return $out;
	}

	/**
	 * 获取显示跳转按钮的代码
	 *
	 * @return string
	 */
	function select()
	{
		$out = '<select name="pagelect" class="pg_select">';
		for($i=1; $i <= $this->total_page; $i++)
		{
			if($i == $this->cur_page){
				$out .= '<option value="'.$i.'" selected>'.$i.'</option>';
			}
			else{
				$out .= '<option value="'.$i.'">'.$i.'</option>';
			}
		}
		$out .= '</select>';
		return $out;
	}

  	/**
     * 输入页码跳转
     *	
     * @return string
     */
  	function go_page()
  	{
		return '&nbsp;&nbsp;<input type="text" size=3 onkeydown="javascript:if(event.keyCode==13){var page=(this.value>'.$this->total_page.')?'.$this->total_page.':this.value;location=\''.$this->base_url.'/\'+page+\'\'}" value="'.$this->cur_page.'"><input type="button" value="GO" onclick="javascript:var page=(this.previousSibling.value>'.$this->total_page.')?'.$this->total_page.':this.previousSibling.value;location=\''.$this->base_url.'/\'+page+\'\'">&nbsp;&nbsp;';
	}

	/**
	 * 控制分页显示风格
	 * 
	 * @param int $mode
	 * @return string
	 */
	function show($mode = 1)
	{
		switch ($mode)
		{
			case 1://上一页 1 2 3 4 5 下一页 第x页
				return $this->pre_page().$this->pages().$this->next_page();
				break;
			case 2://首页 上一页 1 2 3 4 5 下一页  末页 第x页
				return $this->first_page().$this->pre_page().$this->pages().$this->next_page().$this->last_page().' 第'.$this->select().'页';
				break;
			case 3://上一页 1 2 3 4 5 下一页 
				return $this->pre_page().$this->pages().$this->next_page();
				break;
      		case 4://首页 上一页 1 2 3 4 5 下一页 cur/total 末页 输入第x页
				return $this->first_page().$this->pre_page().$this->pages().$this->next_page().$this->last_page().$this->cur_page.'/'.$this->total_page.$this->go_page();
				break;
			default://上一页 1 2 3 4 5 下一页  第x页
				return $this->pre_page().$this->pages().$this->next_page().' 第'.$this->select().'页';
				break;
		}
	}

/*----------------private function (私有方法)-----------------------------------------------------------*/

	/**
	 * 设置url头地址
	 *
	 * @param: String $base_url
	 * 
	 */
	function _myset_url($base_url)
	{
		$CI = &get_instance();
		$CI->load->helper('url');
		if (empty($base_url)) {//如果$url为空，要用uri_string()函数取uri段
			$cururl = '';
			$cururl = uri_string();
			$segementarray = explode("/",$cururl);
			$c = 0;
			for ($i=0; $i < sizeof($segementarray); $i++) {
				if ($segementarray[$i] && $c < $this->uri_segment - 1) {//取uri_string()的seg-1段
					$base_url = $base_url.'/'.$segementarray[$i];
					$c++;
				}
			}	
		}
		$this->base_url = site_url($base_url);
	}
	
	/**
	 * 为指定的页面返回地址值
	 *
	 * @param int $total_page
	 * @return string $base_url
	 */
	function _get_url($page = 1)
	{
		return $this->base_url.'/'.$page;
	}
 
	/**
	 * 获取链接地址
	 */
	function _get_link($url, $text, $style = ''){
		$style = $style?'class="'.$style.'"':'';
		return '<a '.$style.' href="'.$url.'">'.$text.'</a>';
	}

}//end class
/* End of file Page.php */
/* Location: ./application/libraries/Page.php */