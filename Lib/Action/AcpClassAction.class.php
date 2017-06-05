<?php
/**
 * acp后台商品分类
 */
class AcpClassAction extends AcpAction {

    // 一级分类模型对象
    protected $Class;
    // 二级分类模型对象
    protected $ClassSort;

    /**
     * 初始化
     * @author 张勇
     * @return void
     * @todo 初始化方法
     */
    function _initialize() {
        parent::_initialize();
        $this->assign('action_title', '分类与属性');
        $this->assign('action_src', U('/AcpClass/list_class'));
        // 实例化模型类
        $this->Class      = D('Class');
        $this->ClassSort  = D('Sort');
    }

  function get_level_one() {
		$class_obj = new ClassModel();
		$where = '';
		//数据总量
		$total = $class_obj->getClassNum($where);

		//处理分页
		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$class_obj->setStart($Page->firstRow);
    $class_obj->setLimit($Page->listRows);

		$page_str = $Page->show();
		$this->assign('page_str',$page_str);

		$class_list = $class_obj->getClassList();
    
		$this->assign('question_class_list', $class_list);
		$this->display();

  }

  function get_level_two() {
		$sort_obj = new SortModel();
    $class_obj = new ClassModel();

		//数据总量
		$where = '';
		$total = $sort_obj->getSortNum($where);

		//处理分页
		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$sort_obj->setStart($Page->firstRow);
    $sort_obj->setLimit($Page->listRows);

		$page_str = $Page->show();
		$this->assign('page_str',$page_str);

		$class_list = $sort_obj->getSortList();

    foreach ($class_list as $key => $item) {
      $class_list[$key]['class_name'] = $class_obj->getClassField($item['class_id'],'class_name');
    }

		$this->assign('sort_list', $class_list);
		$this->display();

  }

  function batch_delete_level_one () {
  
		$question_ids = $this->_post('question_class_ids');

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
            $question_obj = new ClassModel($question_id);
            $sort_obj = new SortModel();
			foreach ($question_id_ary AS $question_id)
			{
                $num      = $sort_obj->getSortNum('class_id = '. $question_id);
                if ($num) continue;
				$success_num += $question_obj->delClass();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
  }

  function batch_delete_level_two () {
  
		$question_ids = $this->_post('question_class_ids');

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
            $question_obj = new SortModel();
            $item_obj           = new ItemModel();
			foreach ($question_id_ary AS $question_id)
			{
                $num = $item_obj->where('sort_id = ' . $question_id)->count();
                if ($num) continue;
				$success_num += $question_obj->delSort($question_id);
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
  }
	//添加一级分类
	function add_level_one() {

		$act = $this->_post('act');
		if ($act == 'add') {
			$_post = $this->_post();
			$class_name	= $_post['class_name'];
			$serial		= $_post['serial'];
			$isuse		= $_post['isuse'];
			$is_index		= $_post['is_index'];
            $class_icon = $_post['class_icon'];

			
			//表单验证
			if (!$class_name) {
				$this->error('请填写分类名称！');
			}

			if (!ctype_digit($serial)) {
				$this->error('请填写排序号！');
			}

			if (!ctype_digit($isuse)) {
				$this->error('请选择是否有效！');
			}

			$arr = array(
				'class_name'	=> $class_name,
				'serial'		=> $serial,
				'isuse'			=> $isuse,
				//'is_index'		=> $is_index,
                'class_icon'    => $class_icon,

			);

			$class_obj = new ClassModel();
			$success = $class_obj->addClass($arr);

			if ($success) {
				$this->success('恭喜您，分类添加成功！', '/AcpClass/add_level_one');
			} else {
				$this->error('抱歉，问题添加失败！', '/AcpClass/add_level_one');
			}
		}

		$this->assign('head_title', '添加一级分类');
		$this->display();
	}


  function add_level_two () {
    $level_one_obj  = new ClassModel();
    $level_one_list = $level_one_obj->getClassList();

		$act = $this->_post('act');
		if ($act == 'add') {
			$_post = $this->_post();
			$class_name	= $_post['class_name'];
			$serial		= $_post['serial'];
			$isuse		= $_post['isuse'];
			$is_index		= $_post['is_index'];
			$is_first_order		= $_post['is_first_order'];
      		$class_id = $_post['class_id'];
			
			//表单验证
			if (!$class_name) {
				$this->error('请填写分类名称！');
			}

			if (!ctype_digit($serial)) {
				$this->error('请填写排序号！');
			}

			if (!ctype_digit($isuse)) {
				$this->error('请选择是否有效！');
			}

      if (!ctype_digit($class_id)) {
				$this->error('请选择一级分类！');
      } 

			$arr = array(
        		'sort_name'	  => $class_name,
				'serial'		  => $serial,
				'isuse'			  => $isuse,
				//'is_index'		=> $is_index,
				//'is_first_order'		=> $is_first_order,
        		'class_id'    => $class_id,
			);

			$class_obj = new SortModel();
			$success   = $class_obj->addSort($arr);
      $url       = '/AcpClass/add_level_two';

			if ($success) {
				$this->success('恭喜您，分类添加成功！', $url);
			} else {
				$this->error('抱歉，分类添加失败！', $url);
			}
		}
    
		$this->assign('level_one_list', $level_one_list);
		$this->assign('head_title', '添加二级分类');
		$this->display();
  }
        
	/**
	 * 删除一级分类
	 * @author 姜伟
	 * @param void
	 * @return void
	 * @todo 异步方法，根据问题ID删除一级分类
	 */
	public function delete_level_one() {
		$class_id = intval($this->_post('class_id'));
		if ($class_id) {
			$question_class_obj = new ClassModel($class_id);
            $sort_obj = new SortModel();
            $num      = $sort_obj->getSortNum('class_id = '. $class_id);

            //存在二级分类则删除失败；
            if ($num) exit('failure');

			$success = $question_class_obj->delClass();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
	}

	public function delete_level_two() {
		$class_id = intval($this->_post('sort_id'));
		if ($class_id) {
			$question_class_obj = new SortModel();
            $item_obj           = new ItemModel();
            $num                = $item_obj->where('sort_id = ' . $sort_id)->count();
            if ($num) exit('failure');
			$success = $question_class_obj->delSort($class_id);
			echo $success ? 'success' : 'failure';
			exit;
		}

		exit('failure');
	}
	//修改问题
	function edit_level_one () {
		$redirect = U('/AcpClass/get_level_one');
		$class_id = intval($this->_get('class_id'));
		if (!$class_id) {
			$this->error('对不起，非法访问！', $redirect);
		}

		$class_obj = new ClassModel();
		$class_info = $class_obj->getClass($class_id);

		if (!$class_info) {
			$this->error('对不起，不存在相关分类！', $redirect);
		}

		$act = $this->_post('act');

		if($act == 'edit') {
			$_post = $this->_post();
			$class_name	= $_post['class_name'];
			$serial		= $_post['serial'];
			$isuse		= $_post['isuse'];
			$is_index		= $_post['is_index'];
            $class_icon = $_post['class_icon'];

			
			//表单验证
			if(!$class_name) {
				$this->error('请填写分类名称！');
			}

			if(!ctype_digit($serial)) {
				$this->error('请填写排序号！');
			}

			if(!ctype_digit($isuse)) {
				$this->error('请选择是否有效！');
			}

			$arr = array(
				'class_name'	=> $class_name,
				'serial'		=> $serial,
				'isuse'			=> $isuse,
				//'is_index'		=> $is_index,
                'class_icon'    => $class_icon,

			);

			$class_obj = new ClassModel($class_id);
      $url = '/AcpClass/edit_level_one/class_id/' . $class_id;

			if ($class_obj->setClass($class_id,$arr)) {
				$this->success('恭喜您，分类修改成功！', $url) ;
			} else {
				$this->error('抱歉，分类修改失败！', $url);
			}

		}

        $class_icon_path = $class_info['class_icon'] ? APP_PATH . $class_info['class_icon'] : false;

		$this->assign('class_info', $class_info);
		$this->assign('class_icon_path', $class_icon_path);
		
		$this->assign('head_title', '修改一级分类');
		$this->display();
	}
	//修改问题
	function edit_level_two () {
		$redirect = U('/AcpClass/get_level_two');
		$sort_id = intval($this->_get('sort_id'));

    $level_one_obj  = new ClassModel();
    $level_one_list = $level_one_obj->getClassList();

		if (!$sort_id) {
			$this->error('对不起，非法访问！', $redirect);
		}

		$sort_obj = new SortModel();
		$class_info = $sort_obj->getSort($sort_id);

		if (!$class_info) {
			$this->error('对不起，不存在相关分类！', $redirect);
		}

    $class_info['class_name'] = $level_one_obj->getClassField($class_info['class_id'],'class_name');

		$act = $this->_post('act');

		if($act == 'edit') {
			$_post = $this->_post();
			$class_name	= $_post['sort_name'];
			$serial		= $_post['serial'];
			$isuse		= $_post['isuse'];
			$is_index		= $_post['is_index'];
			$is_first_order		= $_post['is_first_order'];
      		$class_id = $_post['class_id'];
			
			//表单验证
			if (!$class_name) {
				$this->error('请填写分类名称！');
			}

			if (!ctype_digit($serial)) {
				$this->error('请填写排序号！');
			}

			if (!ctype_digit($isuse)) {
				$this->error('请选择是否有效！');
			}

      if (!ctype_digit($class_id)) {
				$this->error('请选择一级分类！');
      } 

			$arr = array(
        		'sort_name'	  => $class_name,
				'serial'		  => $serial,
				'isuse'			  => $isuse,
				//'is_index'		=> $is_index,
				//'is_first_order'		=> $is_first_order,
        		'class_id'    => $class_id,
			);

      $url = '/AcpClass/edit_level_two/sort_id/' . $sort_id;

			if ($sort_obj->setSort($sort_id,$arr)) {
				$this->success('恭喜您，分类修改成功！', $url) ;
			} else {
				$this->error('抱歉，分类修改失败！', $url);
			}

		}

		$this->assign('level_one_list', $level_one_list);
		$this->assign('class_info', $class_info);
    $this->assign('head_title', '修改二级分类');
		$this->display();
	}

}
