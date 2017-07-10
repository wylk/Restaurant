-- 入驻公司表------------------------------------
CREATE TABLE IF NOT EXISTS `hd_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `company_name` varchar(55) NOT NULL COMMENT '٫˾ĻԆ',
  `company_address` varchar(255) NOT NULL COMMENT '٫˾ַ֘',
  `company_person` varchar(55) NOT NULL COMMENT '٫˾רɋ',
  `licence` varchar(55) NOT NULL COMMENT 'Ӫҵִ֕ۅë',
  `cart_number` varchar(55) NOT NULL COMMENT 'ʭ؝֤ۅë',
  `licence_path` varchar(255) NOT NULL,
  `frontal_view` varchar(255) NOT NULL COMMENT 'ʭ؝ֽ֤Ħ֕',
  `back_view` varchar(255) NOT NULL COMMENT 'ʭ؝֤״Ħ֕',
  `phone` char(11) NOT NULL COMMENT '˖ܺۅë',
  `password` char(32) NOT NULL COMMENT '登录密码',
  `email` varchar(55) NOT NULL COMMENT '电子邮箱',
  `addtime` int(10) unsigned NOT NULL COMMENT 'Դݨʱݤ',
  `status` tinyint(3) unsigned NOT NULL COMMENT '状态值 默认0 通过1 不通过2',
  `reason` varchar(255) NOT NULL COMMENT '驳回原因',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hd_company_company_name` (`company_name`),
  KEY `hd_company_phone` (`phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='٫˾ҭ' AUTO_INCREMENT=85 ;

--
-- 转存表中的数据 `hd_company`
--

INSERT INTO `hd_company` (`id`, `company_name`, `company_address`, `company_person`, `licence`, `cart_number`, `licence_path`, `frontal_view`, `back_view`, `phone`, `password`, `email`, `addtime`, `status`, `reason`) VALUES
(83, '北京五一乐卡科技有限公司', '北京海淀区苏州街银丰大厦3楼纳什空间', '人人陆', '1111111', '412627199809090909', './uploadfile/images/18811480487/20170630143320_103.jpg', './uploadfile/images/18811480487/20170630143320_994.jpg', './uploadfile/images/18811480487/20170630143320_216.jpg', '18811480487', '96e79218965eb72c92a549dd5a330112', '760553350@qq.com', 1498632860, 2, ''),
(84, '北京五一乐卡科技', '北京海淀区苏州街银丰大厦3楼', 'luwen', '1111111', '412627199809090909', './uploadfile/images/15651117501/20170628164115_623.jpg', './uploadfile/images/15651117501/20170628164115_352.jpg', './uploadfile/images/15651117501/20170628164115_619.jpg', '15651117501', '96e79218965eb72c92a549dd5a330112', '760553350@qq.com', 1498639275, 0, '');

-- 门店表-------------------------------------------
CREATE TABLE IF NOT EXISTS `hd_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ą֪id',
  `shop_name` varchar(55) NOT NULL COMMENT 'ą֪ĻԆ',
  `type_id` int(10) unsigned NOT NULL COMMENT 'ą֪`эid',
  `company_id` int(10) unsigned NOT NULL COMMENT '٫˾id',
  `shop_status` tinyint(3) unsigned NOT NULL COMMENT 'ą֪״̬',
  `shop_notice` varchar(55) NOT NULL COMMENT 'ą֪٫٦',
  `cost_per` float(10,2) NOT NULL COMMENT 'ɋ߹лؑ',
  `shop_address` varchar(255) NOT NULL COMMENT 'ąַ֪֘',
  `shop_introduction` varchar(255) NOT NULL COMMENT 'ą֪ݲީ',
  `add_time` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hd_shop_shop_name` (`shop_name`),
  KEY `hd_shop_type_id` (`type_id`),
  KEY `hd_shop_company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='ą֪ҭ' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `hd_shop`
--

INSERT INTO `hd_shop` (`id`, `shop_name`, `type_id`, `company_id`, `shop_status`, `shop_notice`, `cost_per`, `shop_address`, `shop_introduction`, `add_time`) VALUES
(3, '全聚德', 4, 83, 1, '老北京地道烤鸭，一鸭多吃，开业大酬宾', 200.00, '北京省北京市朝阳区区三里屯什么路全聚德烤鸭店', '位居北京朝阳三里屯，黄金地段，老北京地道烤鸭，吃货们不容错过，赶快品尝吧！', 1498721789),
(6, '金手勺', 3, 83, 1, '江湖菜涵盖多种地方特色菜，让你一饱口福', 300.00, '北京省北京市海淀区银丰大厦3楼', '金手勺位居北京海淀区中关村，地段繁华，深受上班族的喜爱。', 1498725710),
(7, '鱼头汤', 2, 83, 0, '山东特色菜，一鱼多吃，口味鲜美', 200.00, '北京省北京市昌平区霍营街道', '赶快来吃', 1498788136);

-- 员工表------------------------------------------
create table if not exists hd_employee(
id int unsigned not null auto_increment comment '员工id',
role_id int unsigned not null comment '角色id',
shop_id int unsigned not null comment '店铺id',
username varchar(55) not null comment '登录账号',
password char(32) not null comment '登录密码',
truename varchar(55) not null comment '真实姓名',
phone char(11) not null comment '手机号码',
email varchar(55) not null comment '电子邮箱',
status tinyint unsigned not null comment '状态',
remark varchar(255)  not null comment '备注',
create_time int(10) unsigned NOT NULL COMMENT '添加时间',
key hd_employee_role_id(role_id),
key hd_employee_shop_id(shop_id),
unique hd_employee_username(username),
unique hd_employee_phone(phone),
unique hd_employee_email(email),
primary key(id)
)engine=innodb default charset=utf8 comment '员工表';

-- 门店类型表----------------------------------------

CREATE TABLE IF NOT EXISTS `hd_shop_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ą֪`эid',
  `cid` int(10) unsigned NOT NULL COMMENT '公司',
  `typename` varchar(55) NOT NULL COMMENT 'ą֪`эĻԆ',
  `type_img` varchar(255) NOT NULL COMMENT 'ą֪`эքͼҪ',
  `create_time` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='ą֪`эҭ' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `hd_shop_type`
--

INSERT INTO `hd_shop_type` (`id`, `cid`, `typename`, `type_img`, `create_time`) VALUES
(2, 83, '鲁菜', './uploadfile/images/18811480487/20170629115120_132.jpg', 1498708280),
(3, 83, '江湖菜', './uploadfile/images/18811480487/20170629142633_931.jpg', 1498714617),
(4, 83, '烤鸭', './uploadfile/images/18811480487/20170629152818_107.jpg', 1498721298);

--- 权限模板------------------------------------------

CREATE TABLE IF NOT EXISTS `hd_store_auth` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(20) NOT NULL,
  `auth_pid` int(11) NOT NULL,
  `auth_c` varchar(32) NOT NULL,
  `auth_a` varchar(32) NOT NULL,
  `auth_url` varchar(255) NOT NULL,
  `auth_level` tinyint(4) NOT NULL,
  `is_show` int(11) NOT NULL COMMENT '是否展示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

INSERT INTO `hd_store_auth` (`id`, `auth_name`, `auth_pid`, `auth_c`, `auth_a`, `auth_url`, `auth_level`, `is_show`) VALUES
(14, '添加商品', 12, 'goods_add', 'index', '23456fddfff', 1, 1),
(9, '员工管理', 0, 'employee', 'index', './index.php?m=plugin&amp;p=shop&amp;id=food:sit:doemployee', 0, 1),
(10, '员工列表', 9, 'do_employee_list', 'index', './index.php?m=plugin&amp;p=shop&amp;id=food:sit:doemployee_list', 1, 1),
(11, '角色管理', 9, 'do_employee_role', 'index', './index.php?m=plugin&amp;p=shop&amp;id=food:sit:do_employee_role', 1, 1),
(12, '商品管理', 0, 'goods', 'index', 'indes/goods', 0, 1),
(13, '商品列表', 12, 'do_goods_list', 'index', './index.php?m=plugin&amp;amp;p=shop&amp;amp;id=food:sit:do_goods_list', 1, 1),
(15, '删除员工', 9, 'do_empolyee_del', 'index', 'do_empolyee_del', 1, 0);

----角色----------------------------------------
CREATE TABLE IF NOT EXISTS `hd_store_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `role_auth_ids` varchar(128) NOT NULL,
  `role_auth_ac` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `hd_store_role` (`id`, `store_id`, `role_name`, `role_auth_ids`, `role_auth_ac`) VALUES
(1, 1, '店长', '1,2,3,4', 'index-doshop,index-do_order');
-------------------------------------------------------------
---------商品(菜单)表----------------------------------------------
create table if not exists hd_food_goods(
id int unsigned not null auto_increment comment '商品id',
shop_id int unsigned not null comment '门店id',
cat_id int unsigned not null comment '分类id',
goods_spec varchar(255) not null comment '商品规格',
goods_name varchar(55) not null comment '商品名称',
suppy_time varchar(255) not null comment '供应时间',
goods_img varchar(255) not null comment '商品主图',
goods_price float(10,2) not null comment '商品价格',
goods_member_price float(10,2) not null comment '商品会员价格',
goods_basic_price float(10,2) not null comment '商品原价',
goods_sales int not null comment '商品销量',
goods_per_stock int not null comment '商品每日库存',
goods_today_sales int not null comment '商品今日已售',
goods_unit varchar(55) not null comment '商品单位',
goods_desc varchar(255) not null comment '商品描述',
goods_taste varchar(55) not null comment '商品口味',
is_onsale int not null comment '是否上架',
is_recommend int not null comment '是否推荐',
addtime int not null comment '添加时间',
goods_sort int not null comment '排序',
key hd_food_goods_shop_id(shop_id),
key hd_food_goods_cat_id(cat_id),
unique hd_food_goods_goods_name(goods_name),
key hd_food_goods_addtime(addtime),
key hd_food_goods_goods_sort(goods_sort),
primary key(id)
)engine=innodb default charset=utf8 comment='商品表';

------------------------------------------------------------
-----------商品分类表---------------------------------
create table if not exists hd_food_cat(
id int unsigned not null auto_increment comment '商品分类的id',
shop_id int unsigned not null comment '商品id',
cat_name varchar(55) not null comment '分类名称',
cat_desc varchar(255) not null comment '分类描述',
pid int unsigned not null comment '上级id',
addtime int unsigned not null comment '添加时间',
status int unsigned not null comment '状态',
sort int unsigned not null comment '排序',
key hd_food_shop_id(shop_id),
unique hd_food_cat_cat_name(cat_name),
key hd_food_cat_addtime(addtime),
key hd_food_cat_sort(sort),
primary key(id)
)engine=innodb default charset=utf8 comment '商品分类表';

-------------------------------------------------------
-------------------规格表-----------------------------------
create table if not exists hd_food_spec(
id int unsigned not null auto_increment comment '规格id',
shop_id int unsigned not null comment '店铺id',
spec_name varchar(55) not null comment '规格名称',
spec_value varchar(255) not null comment '属性值',
status int unsigned not null comment '状态',
sort int unsigned not null comment '排序',
addtime int unsigned not null comment '添加时间',
key hd_food_spec_shop_id(shop_id),
unique hd_food_spec_spec_name(spec_name),
key hd_food_spec_sort(sort),
key hd_food_spec_addtime(addtime),
primary key(id)
)engine=innodb default charset=utf8 comment '规格表';

-----------餐桌------------------------
CREATE TABLE IF NOT EXISTS `hd_food_shop_tables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `table_label_id` int(4) NOT NULL DEFAULT '0',
  `tablezonesid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '名字(桌台号)',
  `url` varchar(500) NOT NULL DEFAULT '',
  `user_count` int(10) NOT NULL DEFAULT '0' COMMENT '可供就餐人数',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=7 ;


---------------餐桌标签-------------------------------
CREATE TABLE IF NOT EXISTS `hd_food_shop_print_label` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '门店id',
  `title` varchar(50) NOT NULL COMMENT '标签名称',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

---------------餐桌类型-------------------------
CREATE TABLE IF NOT EXISTS `hd_food_shop_tablezones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL DEFAULT '',
  `limit_price` int(10) unsigned NOT NULL DEFAULT '0',
  `reservation_price` int(10) unsigned NOT NULL DEFAULT '0',
  `table_count` int(10) NOT NULL DEFAULT '0' COMMENT '餐桌数量',
  `service_rate` decimal(10,2) DEFAULT '0.00',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=9 ;

--------------------------------------------------------------------

-- 购物车表----------------------------------------
create table if not exists hd_food_cart(
id int unsigned not null auto_increment comment 'id',
shop_id int unsigned not null comment '店铺id',
goods_id int unsigned not null comment '商品id',
uid int unsigned not null comment '会员id',
table_id int unsigned not null comment '餐桌id',
goods_price float(10,2) not null comment '商品价格',
pack_price float(10,2) not null comment '打包费',
num int unsigned not null comment '数量',
total float(10,2) not null comment '总价',
addtime int not null comment '添加时间',
key hd_food_cart_shop_id(shop_id),
key hd_food_cart_goods_id(goods_id),
key hd_food_cart_uid(uid),
key hd_food_cart_addtime(addtime),
key hd_food_cart_table_id(table_id),
primary key(id)
)engine=innodb default charset=utf8 comment '购物车表';

-- 订单表-----------------------------------------
create table if not exists hd_food_order(
id int unsigned not null auto_increment comment '订单id',
shop_id int unsigned not null comment '店铺id',
uid int unsigned not null comment '会员id',
table_id int unsigned not null comment '桌号id',
order_no varchar(255) not null comment '订单号',
trade_no varchar(255) not null comment '交易号',
pay_type varchar(55) not null comment '支付方式',
third_id varchar(255) not null comment '第三方id',
postage float(10,2) not null comment '配送费',
goods_total float(10,2) not null comment '订单商品价格不含邮费',
total float(10,2) not null comment '订单金额含邮费',
goods_num int unsigned not null comment '商品数量',
address varchar(255) not null comment '配送地址',
address_user varchar(55) not null comment '收货人',
address_tel varchar(11) not null comment '收货人电话',
status int unsigned not null comment '-1取消0普通1确认付款方式2成功',
meal_time int unsigned not null comment '就餐时间',
counts int unsigned not null comment '预定人数',
seat_type int unsigned not null comment '座位类型，1大厅，2包间',
eat_type int unsigned not null comment '用餐类型1到店，2外卖',
is_append int unsigned not null comment '是否加单1加0不加',
append_dish varchar(55) not null comment '加菜',
remark varchar(255) not null comment '备注',
paydetail text not null comment '消费详情',
print_status int unsigned  not null comment '打印状态 0未打印1已打印',
sign int unsigned not null comment '处理状态1已处理0未处理',
is_finish int unsigned not null comment '是否完成0未完成1已完成',
is_meal int unsigned not null comment '是否已经吃过 0未吃1已吃',
is_vip int unsigned not null comment '是否是会员0不是1是',
addtime int unsigned not null comment '下单时间',
confirm_time int unsigned not null comment '确认时间',
paid_time int unsigned not null comment '付款时间',
finish_time int unsigned not null comment '完成时间',
key hd_food_order_shop_id(shop_id),
key hd_food_order_uid(uid),
key hd_food_order_table_id(table_id),
key hd_food_order_addtime(addtime),
key hd_food_finish_time(finish_time),
primary key(id)
)engine=innodb default charset=utf8 comment '订单表';

-- 粉丝表---------------------------------------------------
create table if not exists hd_food_user(
id int unsigned not null auto_increment comment '用户id',
shop_id int  unsigned not null comment '店铺id',
openid varchar(255) not null comment '微信openid',
nickname varchar(55) not null comment '昵称',
headimgurl varchar(500) not null comment '头像',
username varchar(55) not null comment '用户名',
tel char(11) not null comment '电话号码',
address varchar(255) not null comment '地址',
sex int unsigned not null comment '性别0男1女',
country varchar(55) not null comment '城市',
province varchar(55) not null comment '省',
city varchar(55) not null comment '区',
total float(10,2) not null comment '交易总金额',
avgtotal float(10,2) not null comment '平均金额',
total_count int unsigned not null comment '交易次数',
paytime int unsigned not null comment '上次交易的时间',
status int unsigned not null comment '用户状态0禁用1正常用户',
lasttime int unsigned not null comment '最新登录的时间',
key hd_food_user_shop_id(shop_id),
key hd_food_user_nickname(nickname),
key hd_food_user_tel(tel),
primary key(id)
)engine=innodb default charset=utf8 comment '用户表';
