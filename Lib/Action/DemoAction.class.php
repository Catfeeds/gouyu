<?php
/**
 * 程序Demo
 */
class DemoAction extends FrontAction {
    public function _initialize() {
        parent::_initialize();
    }

    //acp在线文档页面
    public function acp_template() {
        $this->display();
    }
    public function acp_buttons() {
        $this->display();
    }
     public function acp_form() {
        $this->display();
    }
     public function acp_form_demo() {
        $this->display();
    }
     public function acp_gicons() {
        $this->display();
    }
    public function acp_table() {
        $this->display();
    }
    public function acp_table_demo() {
        $this->display();
    }
    public function acp_tabs() {
        $this->display();
    }
    public function acp_tabs_demo() {
        $this->display();
    }
    public function acp_wizardstep_demo() {
        $this->display();
    }
    public function acp_wizardstep() {
        $this->display();
    }
    public function acp_chartpanel() {
        $this->display();
    }
    public function acp_chartpanel_demo() {
        $this->display();
    }
    public function acp_jpops() {
        $this->display();
    }
	public function acp_form_verify()
	{
		$this->display();
	}
    public function acp_tabsform_verify()
    {
        $this->display();
    }
    public function acp_charts()
    {
        $this->display();
    }
    public function acp_progress()
    {
        $this->display();
    }
    public function acp_alerts()
    {
        $this->display();
    }
    public function express()
    {
        $this->display();
    }


    // 统计图表（Highcharts）
    public function charts() {
        // 导入图表驱动类
        import('ORG.Util.Highcharts');

        $title = '最近7天用户注册数 (线状图)';

        $dayPerWeek = 7;
        $beginTime  = mktime(0, 0, 0) - ($dayPerWeek) * 24 * 3600;

        $Users  = M('Users');
        $result = $Users->field('reg_time')->where('reg_time > ' . $beginTime)->select();

        /**** 线状图 开始 *****/
		$xAxis['text'] = '时间';    // x轴名称
        $yAxis['text'] = '注册数';  // y轴名称
        $yAxis['name'] = '人数';   // 数据点名称

        // 组装数据
		for ($i = 1; $i <= $dayPerWeek; $i++) {
			//每日的名称
			$d  = 'd_' . $i;
            $$d = 0;

			$xAxis['data'][] = date('m月d日', $beginTime);

            if ($result) {
				foreach ($result as $val) {
					if (date('Y', $val['reg_time']) == date('Y', $beginTime) &&
						date('m', $val['reg_time']) == date('m', $beginTime) &&
						date('d', $val['reg_time']) == date('d', $beginTime))
						$$d++;
				}
			}

			$beginTime += 24 * 3600;
			$yAxis['data'][] = $$d;
		}

        $graphOptions = $this->_getGraph($title, $xAxis, $yAxis);
        $graph = new Highcharts('container', $graphOptions);
        $charts =  $graph->getContent();

        $this->assign('charts', $charts);
        /**** 线状图 结束 *****/

        /**** 柱形图 开始 *****/
        $title = '柱形图';
        $type  = 'column';
        $xAxis = $yAxis = array();

        $xAxis['text'] = '时间';
        $yAxis['text'] = '注册数';
        $yAxis['name'] = '人数';

        $beginTime  = mktime(0, 0, 0) - ($dayPerWeek) * 24 * 3600;

        for ($i = 1; $i <= $dayPerWeek; $i++) {
            $d  = 'd_' . $i;
            $$d = 0;

            $xAxis['data'][] = date('m月d日', $beginTime);

            if ($result) {
                foreach ($result as $val) {
                    if (date('Y', $val['reg_time']) == date('Y', $beginTime) &&
                        date('m', $val['reg_time']) == date('m', $beginTime) &&
                        date('d', $val['reg_time']) == date('d', $beginTime))
                        $$d++;
                }
            }

            $beginTime += 24 * 3600;
            $yAxis['data'][] = $$d;
        }

        $graphOptions = $this->_getGraph($title, $xAxis, $yAxis, $type);
        $graph = new Highcharts('container2', $graphOptions);
        $charts =  $graph->getContent();

        $this->assign('charts2', $charts);
        /**** 柱形图 结束 *****/

        /**** 饼状图 开始 *****/
        $beginTime  = mktime(0, 0, 0) - ($dayPerWeek) * 24 * 3600;

        $graph = array();
        for ($i = 1; $i <= $dayPerWeek; $i++) {
            //每日的名称
            $d  = 'd_' . $i;
            $$d = 0;

            $data['name'] = date('m月d日', $beginTime);

            if ($result) {
                foreach ($result as $val) {
                    if (date('Y', $val['reg_time']) == date('Y', $beginTime) &&
                        date('m', $val['reg_time']) == date('m', $beginTime) &&
                        date('d', $val['reg_time']) == date('d', $beginTime))
                        $$d++;
                }
            }

            $beginTime += 24 * 3600;

            $data['y'] = $$d;
            $graph[] = $data;
        }


        $graphOptions = array(
            'credits'   => array(
                'position'  => array(
                    'y'     => -20,
                    'x'     => -20
                )
            ),

            'title' => array(
                'text'  => '饼状图'
            ),

            'plotOptions'   => array(
                'pie'   => array(
                    'showInLegend'  => true
                )
            ),

            'series'    =>  array(
                array(
                    'type'  => 'pie',
                    'name'  => '人数',
                    'data'  => $graph
                )
            )
        );

        $graph = new Highcharts('container3', $graphOptions);
        $charts =  $graph->getContent();

        $this->assign('charts3', $charts);
        /**** 饼状图 结束 *****/

        $this->display();
    }

    /**
     * 生成Highcharts的选项
     *
     * @param string $title 图表标题
     * @param array $xAxis 图表x轴坐标数据
     * @param array $yAxis 图表y轴坐标数据
     * @param string $type 图表类型（默认是线状图）
     * @access private
     * @return array $graphOptions 图表选项
     */
    protected function _getGraph($title, $xAxis, $yAxis, $type='line')
    {
        $graphOptions = array(
            'title' => array(
                'text' => $title
            ),
            'xAxis' => array(
                'title' => array(
                    'text' => $xAxis['text']
                ),
                'categories' => $xAxis['data']
            ),
            'yAxis' => array(
                'title' => array(
                    'text' => $yAxis['text']
                ),
                'plotLines' => array(
                    array(
                        'value' => 0,
                        'width' => 1,
                        'color' => '#808080'
                    )
                ),
                'min' => 0
            ),
            'legend' => array(
                'layout' => 'vertical',
                'align' => 'right',
                'verticalAlign' => 'middle',
                'borderWidth' => 0
            ),
            'plotOptions' => array(
                'line' => array(
                    'dataLabels' => array(
                        'enabled' => true
                    ),
                    'enableMouseTracking' => true
                ),
            ),
            'series' => array(
                array(
                    'type' => $type,
                    'name' => $yAxis['name'],
                    'data' => $yAxis['data']
                )
            )
        );
        return $graphOptions;
    }

    /**
     * 图片上传demo (包含 上传图片、等比缩放、添加水印 功能)
     */
    public function uploadImage() {
        $action = $this->_post('action');

        if ($action == 'add') {
            // 上传图片
            if ($upData = uploadImg()) {
                /***** 上传原图 开始 *****/
                if (isset($upData['error_msg']))
                    echo $upData['error_msg'] . '<br>';
                elseif (isset($upData['pic_url']))
                    echo '图片上传成功，路径为：' . $upData['pic_url'] . '<br>';
                /***** 上传原图 结束 *****/

                // 图片压缩加水印
                import('ORG.Util.Image');
                $GLOBALS['Image'] = new Image();
                $arr_img = $this->_resizeImg($upData['pic_url']);

                dump($arr_img);
                exit;
            }
        }

        $this->display();
    }

    /**
     * 导入淘宝数据包
     */
    public function import_package() {
        $action = $this->_post('action');

        // 执行导入
        if ($action == 'import') {
            ini_set('max_execution_time', 0);

            // csv文件名
            $csv_name = $this->_post('csv_name');

            // 解压路径
            $csv_path = APP_PATH . 'Uploads/CsvDir/';
            if (!is_dir($csv_path)) mkdir($csv_path);

            // csv文件路径
            $filename = $csv_path . $csv_name . '.csv';

            // 文件编码格式转换
            $contents = iconv('UTF-16', 'UTF-8', file_get_contents($filename));
            file_put_contents($filename, $contents);

            $Item       = M('item');
            $Item_txt   = M('item_txt');
            $Item_photo = M('item_photo');

            // 引入图像操作类库
            import('ORG.Util.Image');
            $GLOBALS['Image'] = new Image();

            // 图片扩展名
            $img_extension = 'jpg';

            // 解析csv文件
            $handle = fopen($filename, 'r');

            $n = $success_count = $fail_count = 0;
            $fail_item = '';

            // 逐条处理csv数据
            while ($data = fgetcsv($handle, 0, "\t")) {
                $n++;
                if ($n < 4 || !$data[0]) continue;

                // 获取主图的路径
                $arr_img  = explode(':', $data[28]);
                $img_path = UPLOAD_IMAGE_PATH . date(DATE_FORMAT, time()) . '/';
                $base_img = '';
                if ($arr_img[0])
                    $base_img = $img_path . $arr_img[0] . '.' . $img_extension;

                // 组装插入item表的数据
                $arr_data = array(
                    'item_name'        => $data[0],      // 商品名称
                    'item_sn'          => $data[33] ? $data[33] : '',     // 商品货号
                    'taobao_id'        => $data[36] ? $data[36] : 0,     // 商品淘宝id
                    'market_price'     => $data[7] ? $data[7] : 0.00,      // 市场价
                    'stock'            => $data[9] ? $data[9] : 0,      // 库存
                    'weight'           => $data[50] ? $data[50] : 0,     // 货重
                    'addtime'          => time(),        // 添加时间
                    'base_pic'         => $base_img,     // 主图
                    'is_delivery_free' => $data[11] == '2' ? 0 : 1,     // 是否免邮
                );

                $insert_id = $Item->add($arr_data);

                if (!$insert_id) {
                    $fail_count++;
                    $fail_item .= $data[0] . ',';
                    continue;
                } else {
                    $success_count++;
                }

                // 商品描述入库
                $Item_txt->add(array('item_id' => $insert_id, 'contents' => $data[20]));

                /***** 处理商品图片 开始 *****/
                // 获取图片目录名
                $path_info = pathinfo($filename);
                $dir_name = str_replace('.' . $path_info['extension'], '', $path_info['basename']);

                // 图片存放路径
                if (!is_dir($img_path)) mkdir($img_path);

                $arr_imgs  = explode(';', $data[28]);
                foreach ($arr_imgs as $k => $imgs) {
                    // 图片名称
                    $arr_img  = explode('|', $imgs);
                    $img_info = explode(':', $arr_img[0]);
                    $img_name = $img_info[0];

                    // 原图路径
                    $base_img = $img_path . $img_name . '.' . $img_extension;

                    // 判断复制图片是否成功
                    if (copy($path_info['dirname'] . '/' . $dir_name . '/' . $img_name . '.tbi', $base_img)) {

                        // 图片信息入库
                        $arr_data = array(
                            'item_id'     => $insert_id,
                            'base_pic'    => $base_img,
                            'is_default'  => $k == 0 ? 1 : 0
                        );
                        $Item_photo->add($arr_data);

                        // 图片压缩加水印
                        $this->_resizeImg($base_img);
                    }
                }
                /***** 处理商品图片 结束 *****/

            }

            // 关闭文件指针
            fclose($handle);

            // 清空文件夹
            $this->_flushDir($csv_path);

            $arr_resp = array('success' => $success_count, 'fail' => $fail_count, 'fail_items' => substr($fail_item, 0, -1));
            exit(json_encode($arr_resp));
        }

        $this->display();
    }

    /**
     * 上传压缩包并解压
     */
    public function uploadZip() {

        $arr_resp = array('error' => '', 'csv_name' => '');

        /***** 数据包解压 开始 *****/
        if (!isset($_FILES['zip']['tmp_name']) || substr($_FILES['zip']['name'], -3, 3) != 'zip') {
            $arr_resp['error'] = '请上传正确大小的zip压缩包！';
            exit(json_encode($arr_resp));
        }

        $tmp_name = $_FILES['zip']['tmp_name'];

        // 解压zip数据包
        $zip = new ZipArchive();
        $rs  = $zip->open($tmp_name);

        if ($rs !== TRUE) {
            $arr_resp['error'] = '解压失败!Error Code:' . $rs;
            exit(json_encode($arr_resp));
        }

        // 解压路径
        $csv_path = APP_PATH . 'Uploads/CsvDir/';

        // 清空目录下的文件
        $this->_flushDir($csv_path);

        $zip->extractTo($csv_path);
        $zip->close();

        // 判断是否包含csv文件和图片文件夹
        $csv_name = '';
        $arr_file = scandir($csv_path);
        foreach ($arr_file as $file) {
            if ($file == "." || $file == "..")  continue;
            $arr_info = explode('.', $file);
            if (isset($arr_info[1]) && $arr_info[1] == 'csv')
                $csv_name = $arr_info[0];
        }

        if (!$csv_name) {
            $arr_resp['error'] = '压缩包内没有csv文件！';
            exit(json_encode($arr_resp));
        }

        if (!is_dir($csv_path . $csv_name)) {
            $arr_resp['error'] = '压缩包内没有与csv文件同名的图片目录！';
            exit(json_encode($arr_resp));
        }

        $arr_resp['csv_name']  = $csv_name;
        $arr_resp['file_size'] = filesize($csv_path . $csv_name . '.csv');

        exit(json_encode($arr_resp));
        /***** 压缩包解压 结束 *****/
    }

    public function zip() {
        $zip=new ZipArchive();
        if($zip->open('./images.zip', ZipArchive::OVERWRITE)=== TRUE){
            $zip->addEmptyDir('20140221105750');
            $zip->addFile('./Uploads/ZipDir/v_fx/20140221105750/20140221105750.csv', '20140221105750/20140221105750.csv'); //调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法
            $zip->close(); //关闭处理的zip文件
        }


    }

    private function addFileToZip($path,$zip){
        $handler=opendir($path); //打开当前文件夹由$path指定。
        while(($filename=readdir($handler))!==false){
            if($filename != "." && $filename != ".."){//文件夹文件名字为'.'和‘..’，不要对他们进行操作
                if(is_dir($path."/".$filename)){// 如果读取的某个对象是文件夹，则递归
                    $this->addFileToZip($path."/".$filename, $zip);
                }else{ //将文件加入zip对象
                    $zip->addFile($path."/".$filename);
                }
            }
        }
        @closedir($path);
    }

    /**
     * 导出数据包
     */
    public function export_package() {
        $action = $this->_request('action');

        if ($action == 'export') {
            set_time_limit(0);
            ini_set('memory_limit', '500M');

            $Item       = M('Item');
            $Item_txt   = M('item_txt');
            $Item_photo = M('item_photo');

            // 获取需要导出的商品
            $items = $Item->limit(300)->select();

            // 文件路径
            $file_path = './Uploads/ZipDir/';
            if (!is_dir($file_path))    mkdir($file_path);

            // 文件名
            $file_name = date('YmdHis');

            // 创建压缩文件
            $zip = new ZipArchive();
            $zip_path = $file_path . $file_name . '.zip';
            $zip->open($zip_path, ZipArchive::OVERWRITE);
            $zip->addEmptyDir($file_name);

            // csv文件
            $csv_path = $file_path . $file_name . '.csv';
            $fp = fopen($csv_path, 'w');

            // 加入UTF-16LE BOM
            fwrite($fp, chr(255) . chr(254));

            // 加入文件头数据
            $header  = "version 1.00";
            $header .= "\r\n";
            $header .= "title	cid	seller_cids	stuff_status	location_state	location_city	item_type	price	auction_increment	num	valid_thru	freight_payer	post_fee	ems_fee	express_fee	has_invoice	has_warranty	approve_status	has_showcase	list_time	description	cateProps	postage_id	has_discount	modified	upload_fail_msg	picture_status	auction_point	picture	video	skuProps	inputPids	inputValues	outer_id	propAlias	auto_fill	num_id	local_cid	navigation_type	user_name	syncStatus	is_lighting_consigment	is_xinpin	foodparame	features	buyareatype	global_stock_type	global_stock_country	sub_stock_type	item_size	item_weight	sell_promise	custom_design_flag	wireless_desc";
            $header .= "\r\n";
            $header .= "宝贝名称	宝贝类目	店铺类目	新旧程度	省	城市	出售方式	宝贝价格	加价幅度	宝贝数量	有效期	运费承担	平邮	EMS	快递	发票	保修	放入仓库	橱窗推荐	开始时间	宝贝描述	宝贝属性	邮费模版ID	会员打折	修改时间	上传状态	图片状态	返点比例	新图片	视频	销售属性组合	用户输入ID串	用户输入名-值对	商家编码	销售属性别名	代充类型	数字ID	本地ID	宝贝分类	用户名称	宝贝状态	闪电发货	新品	食品专项	尺码库	采购地	库存类型	国家地区	库存计数	物流体积	物流重量	退换货承诺	定制工具	无线详情";
            $header .= "\r\n";
            $header  = iconv('UTF-8', 'UTF-16LE', $header);
            fwrite($fp, $header);

            foreach ($items as $item) {
                // 获取商品描述
                $item['description'] = $Item_txt->where('item_id = ' . $item['item_id'])->getField('contents');

                $n = 0;
                $picture = $picture_status = '';

                // 获取商品图片
                $arr_pic = $Item_photo->where('item_id = ' . $item['item_id'])->field('base_pic')->order('is_default DESC')->select();

                foreach ($arr_pic as $pic) {
                    $pic_info = pathinfo($pic['base_pic']);
                    $pic_name = substr($pic_info['basename'], 0, -strlen(strstr($pic_info['basename'],'.')));

                    // 复制图片
                    if ($zip->addFile($pic['base_pic'], $file_name . '/' . $pic_name . '.tbi')) {
                        $picture .= $pic_name . ':1:' . $n . ':|;';
                        $picture_status .= '2;';
                        $n++;
                    }
                }

                $item['picture'] = $picture;
                $item['picture_status'] = $picture_status;

                // 转换为符合淘宝csv文件格式的字符串
                $str_item = $this->_convCsv($item);

                // 数据写入csv文件
                fwrite($fp, $str_item);
            }

            fclose($fp);

            // 添加csv文件到压缩包
            $zip->addFile($csv_path, $file_name . '.csv');

            $zip->close();

            // 删除csv文件
            unlink($csv_path);

            /***** 输出压缩文件 开始 *****/
            //打开文件
            $file = fopen($zip_path,"r");
            //返回的文件类型
            Header("Content-type: application/octet-stream");
            //按照字节大小返回
            Header("Accept-Ranges: bytes");
            //返回文件的大小
            Header("Accept-Length: ".filesize($zip_path));
            //这里对客户端的弹出对话框，对应的文件名
            Header("Content-Disposition: attachment; filename=".$file_name . '.zip');
            //向客户端回送数据
            $buffer=1024;
            //判断文件是否读完
            while (!feof($file)) {
                //将文件读入内存
                $file_data=fread($file,$buffer);
                //每次向客户端回送1024个字节的数据
                echo $file_data;
            }
            fclose($file);
            /***** 输出压缩文件 结束 *****/

        }

        $this->display();
    }

    /**
     * 将数组转换为符合淘宝csv文件格式的字符串
     * @param array $item
     * @return string
     */
    protected function _convCsv($item) {
        $d = array();
        //宝贝名称
        $d['title'] = $item['item_name'];
        //宝贝类目
        $d['cid'] = 0;
        //店铺类目
        $d['seller_cids'] = 0;
        //新旧程度
        $d['stuff_status'] = 1;
        //省
        $d['location_state'] = '';
        //城市
        $d['location_city'] = '';
        //出售方式
        $d['item_type'] = 1;
        //宝贝价格
        $d['price'] = $item['market_price'];
        //加价幅度
        $d['auction_increment'] = '';
        //宝贝数量
        $d['num'] = $item['stock'];
        //有效期
        $d['valid_thru'] = 14;
        //运费承担
        $d['freight_payer'] = $item['is_delivery_free'] ? 1 : 2;
        //平邮
        $d['post_fee'] = 20;
        //EMS
        $d['ems_fee'] = 15;
        //快递
        $d['express_fee'] = 10;
        //发票
        $d['has_invoice'] = 0;
        //保修
        $d['has_warranty'] = 0;
        //放入仓库
        $d['approve_status'] = 1;
        //橱窗推荐
        $d['has_showcase'] = 0;
        //开始时间
        $d['list_time'] = '';
        //宝贝描述
        $d['description'] = $item['description'];
        //宝贝属性
        $d['cateProps'] = '';
        //邮费模版ID
        $d['postage_id'] = 0;
        //会员打折
        $d['has_discount'] = 0;
        //修改时间
        $d['modified'] = '';
        //上传状态
        $d['upload_fail_msg'] = 100;
        //图片状态
        $d['picture_status'] = $item['picture_status'];
        //返点比例
        $d['auction_point'] = 0;
        //新图片
        $d['picture'] = $item['picture'];
        //视频
        $d['video'] = '';
        //销售属性组合
        $d['skuProps'] = '';
        //用户输入ID串
        $d['inputPids'] = '';
        //用户输入名-值对
        $d['inputValues'] = '';
        //商家编码
        $d['outer_id'] = $item['item_sn'];
        //销售属性别名
        $d['propAlias'] = '';
        //代充类型
        $d['auto_fill'] = 0;
        //数字ID
        $d['num_id'] = 0;
        //本地ID
        $d['local_cid'] = -1;
        //宝贝分类
        $d['navigation_type'] = 1;
        //用户名称
        $d['user_name'] = '';
        //宝贝状态
        $d['syncStatus'] = 1;
        //闪电发货
        $d['is_lighting_consigment'] = 160;
        //新品
        $d['is_xinpin'] = 220;
        //食品专项
        $d['foodparame'] = '';
        //尺码库
        $d['features'] = '';
        //采购地
        $d['buyareatype'] = 0;
        //库存类型
        $d['global_stock_type'] = -1;
        //国家地区
        $d['global_stock_country'] = '';
        //库存计数
        $d['sub_stock_type'] = 0;
        //物流体积
        $d['item_size'] = '';
        //物流重量
        $d['item_weight'] = $item['weight'];
        //退换货承诺
        $d['sell_promise'] = 0;
        //定制工具
        $d['custom_design_flag'] = '';
        //无线详情
        $d['wireless_desc'] = '';

        $str_item = implode("\t", $d) . "\r\n";
        $str_item = iconv('UTF-8', 'UTF-16LE', $str_item);
        return $str_item;
    }


    /**
     * 清空目录下的文件
     * @param string $dir_path 目录路径
     * @return void
     */
     protected function _flushDir($dir_path) {
        $dh = opendir($dir_path);
        while ($file = readdir($dh)) {
            if ($file == "." || $file == "..")  continue;
            if (is_dir($dir_path . $file)) {
                $this->_flushDir($dir_path . $file . '/');
            }
            unlink($dir_path . $file);
        }
        closedir($dh);
    }

    /**
     * 图片压缩加水印
     * @param string $base_img 原图地址
     * @return array 生成的图片信息
     */
    protected function _resizeImg($base_img) {
        global $Image;
        $arr_img = array();

        if (!is_file($base_img)) return $arr_img;

        $base_img_info = pathinfo($base_img);
        $img_path = $base_img_info['dirname'] . '/';
        $img_extension = $base_img_info['extension'];
        $img_name = str_replace('.' . $img_extension, '', $base_img_info['basename']);

        /***** 等比缩放 开始 *****/

        // 生成大图
        $big_img_path = $img_path . $img_name . C('BIG_IMG_SUFFIX') . '.' . $img_extension;
        $big_img = $Image->thumb($base_img, $big_img_path, $img_extension, C('BIG_IMG_SIZE'), C('BIG_IMG_SIZE'));

        // 生成中图
        $middle_img_path = $img_path . $img_name . C('MIDDLE_IMG_SUFFIX') . '.' . $img_extension;
        $middle_img = $Image->thumb($base_img, $middle_img_path, $img_extension, C('MIDDLE_IMG_SIZE'), C('MIDDLE_IMG_SIZE'));

        // 生成小图
        $small_img_path = $img_path . $img_name . C('SMALL_IMG_SUFFIX') . '.' . $img_extension;
        $small_img = $Image->thumb($base_img, $small_img_path, $img_extension, C('SMALL_IMG_SIZE'), C('SMALL_IMG_SIZE'));
        /***** 等比缩放 结束 *****/

        $arr_img['big_img']    = $big_img;
        $arr_img['middle_img'] = $middle_img;
        $arr_img['small_img']  = $small_img;

        /***** 图片加水印 开始 *****/
        // 判断水印功能是否开启
        if ($this->system_config['WATER_PRINT_OPEN'] && file_exists($this->system_config['WATER_PRINT_IMG'])) {
            // 水印图片
            $water_img = $this->system_config['WATER_PRINT_IMG'];

            // 水印透明度
            $alpha = intval($this->system_config['WATER_PRINT_TRANSPARENCY']);

            // 大图加水印
            if ($big_img) {
                $Image->water($big_img, $water_img, '', $alpha);
            }

            // 中图加水印
            if ($middle_img) {
                $Image->water($middle_img, $water_img, '', $alpha);
            }

            // 小图尺寸太小，不建议添加水印
        }
        /***** 图片加水印 结束 *****/

        return $arr_img;
    }

    /**
     * ajax上传图片
     * @author 张勇
     */
    public function ajaxUpload() {
        $action = I('post.action');
        if ($action == 'upload') {
            exit(json_encode($_FILES['userfile']));
        }
        $this->display();
    }
	
	/**
	 * 发送短信
	 *
	 * @author zhengzhen
	 *
	 */
	public function send_sms()
	{
		if($this->_post())
		{
			$mobiles = $this->_post('mobiles');
			$message = $this->_post('message');
			$isSign  = $this->_post('is_sign');
			
			$result = $isSign ? sendSMS($mobiles, $message) : sendSMSNoSign($mobiles, $message);
			var_dump($result);
		}
		else
		{
			$this->display();
		}
	}
	
	public function batch_shipping_print()
	{
		if($this->isAjax())
		{
			//筛选订单
		//	$this->_filterOrder($this->_get());
			$printAction = $this->_get('print_action');
			$orderId = $this->_get('order_id');
		//	$pageNo = $this->_get('page_no');
			$start = $this->_get('start');
			$shippingPrint = new ShippingPrintModel('real');
			switch($printAction)
			{
				case 'current':
					$where = 'order_id=' . $orderId;
					$result = $shippingPrint->batchShippingPrint(1, null, null, $where);
					$isFinish = 1;
					break;
				case 'selected':
					$orderId = explode(',', $orderId);
					$where = 'order_id IN (' . $orderId . ')';
					$result = $shippingPrint->batchShippingPrint(1, null, null, $where);
					$isFinish = 1;
					break;
				case 'page':
					$start = 1;
					$rows = 5;
					$result = $shippingPrint->batchShippingPrint(1, $start, $rows, $where);
					$isFinish = 1;
					break;
				case 'all':
					$start = $start ? $start : 1;
					$rows = 30;
					
					$result = $shippingPrint->batchShippingPrint(1, $start, $rows, $where);
					if(!$shippingPrint->testOrderNum($start + 1))
					{
						$isFinish = 1;
					}
					else
					{
						$start += $rows;
					}
			}
			
		//	var_dump($result);die;
			$result['other']['START'] = $start;
			$result['other']['IS_FINISH'] = $isFinish;
			$result['status'] = 1;
			echo json_encode($result);
			exit;
		//	echo "<pre>";
		//	print_r($result);
		}
		$this->display();
	}
	
	private function _filterOrder(array $param)
	{
		
	}
	
	public function add_print_set()
	{
		$data = array(
			'shipping_company_id' => 1,
			'background_img' => '##img_domain##/image/other/shipping/100423144719.jpg',
			'printing_paper_width' => 2150,
			'printing_paper_height' => 1400,
			'set_detail' => 'a:64:{s:11:"realname2_x";i:118;s:11:"realname2_y";i:273;s:11:"realname2_w";i:89;s:11:"realname2_h";i:40;s:11:"realname2_s";s:0:"";s:11:"realname2_b";s:0:"";s:11:"realname2_i";s:0:"";s:11:"realname2_l";i:0;s:10:"address2_x";i:65;s:10:"address2_y";i:325;s:10:"address2_w";i:298;s:10:"address2_h";i:44;s:10:"address2_s";i:14;s:10:"address2_b";i:1;s:10:"address2_i";s:0:"";s:10:"address2_l";i:0;s:6:"tel2_x";i:117;s:6:"tel2_y";i:389;s:6:"tel2_w";i:111;s:6:"tel2_h";i:40;s:6:"tel2_s";s:0:"";s:6:"tel2_b";s:0:"";s:6:"tel2_i";s:0:"";s:6:"tel2_l";i:0;s:9:"mobile2_x";i:225;s:9:"mobile2_y";i:389;s:9:"mobile2_w";i:146;s:9:"mobile2_h";i:40;s:9:"mobile2_s";s:0:"";s:9:"mobile2_b";s:0:"";s:9:"mobile2_i";s:0:"";s:9:"mobile2_l";i:0;s:10:"sitename_x";i:108;s:10:"sitename_y";i:139;s:10:"sitename_w";i:155;s:10:"sitename_h";i:40;s:10:"sitename_s";s:0:"";s:10:"sitename_b";s:0:"";s:10:"sitename_i";s:0:"";s:10:"sitename_l";i:0;s:9:"address_x";i:100;s:9:"address_y";i:175;s:9:"address_w";i:246;s:9:"address_h";i:34;s:9:"address_s";i:14;s:9:"address_b";i:1;s:9:"address_i";s:0:"";s:9:"address_l";i:0;s:8:"mobile_x";i:223;s:8:"mobile_y";i:233;s:8:"mobile_w";i:140;s:8:"mobile_h";i:33;s:8:"mobile_s";s:0:"";s:8:"mobile_b";s:0:"";s:8:"mobile_i";s:0:"";s:8:"mobile_l";i:0;s:5:"tel_x";i:128;s:5:"tel_y";i:228;s:5:"tel_w";i:102;s:5:"tel_h";i:33;s:5:"tel_s";s:0:"";s:5:"tel_b";s:0:"";s:5:"tel_i";s:0:"";s:5:"tel_l";i:0;}'
		);
		$shippingPrint = new ShippingPrintModel();
		$shippingPrint->addShippingPrint($data);
	}
}

