-- 入驻公司表------------------------------------
create table if not exists hd_company(
id int unsigned not null auto_increment comment 'id',
company_name varchar(55) not null comment '公司名称',
company_address varchar(255) not null comment '公司地址',
company_person varchar(55) not null comment '公司法人',
licence varchar(55) not null comment '营业执照号码',
img_licence varchar(255) not null comment '营业执照图片',
cart_number varchar(55) not null comment '身份证号码',
frontal_view varchar(255) not null comment '身份证正面照',
back_view varchar(255) not null comment '身份证反面照',
phone char(11) not null comment '手机号码',
unique hd_company_company_name(company_name),
key hd_company_phone(phone),
primary key(id)
)engine=innodb default charset=utf8 comment '公司表';

-- 门店表-------------------------------------------
create table if not exists hd_shop(
id int unsigned not null auto_increment comment '门店id',
shop_name varchar(55) not null comment '门店名称',
type_id int unsigned not null comment '门店类型id',
company_id int unsigned not null comment '公司id',
shop_status tinyint unsigned not null comment '门店状态',
shop_notice varchar(55) not null comment '门店公告',
cost_per float(10,2) not null comment '人均消费',
shop_address varchar(255) not null comment '门店地址',
shop_introduction varchar(255) not null comment '门店简介',
unique hd_shop_shop_name(shop_name),
key hd_shop_type_id(type_id),
key hd_shop_company_id(company_id),
primary key(id)
)engine=innodb default charset=utf8 comment '门店表';

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

