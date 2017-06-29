/*
Navicat MySQL Data Transfer

Source Server         : loaclhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : geek

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-06-27 14:45:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for `cart_item`
-- ----------------------------
DROP TABLE IF EXISTS `cart_item`;
CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart_item
-- ----------------------------

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `category_no` int(11) DEFAULT NULL,
  `preview` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'php', '1', null, null, null, null);
INSERT INTO `category` VALUES ('2', 'java', '2', null, null, null, null);
INSERT INTO `category` VALUES ('3', 'javascript', '3', null, null, null, null);
INSERT INTO `category` VALUES ('4', 'laravel', '1', null, '1', null, null);
INSERT INTO `category` VALUES ('5', 'thinkphp', '2', null, '1', null, '2016-02-28 20:11:15');
INSERT INTO `category` VALUES ('6', 'yii', '3', null, '1', null, null);
INSERT INTO `category` VALUES ('7', 'nodejs', '1', null, '3', null, null);
INSERT INTO `category` VALUES ('8', 'reactjs', '2', null, '3', null, null);
INSERT INTO `category` VALUES ('9', 'angularjs', '3', null, '3', null, null);
INSERT INTO `category` VALUES ('10', 'java base', '1', null, '2', null, null);
INSERT INTO `category` VALUES ('11', 'java web', '2', null, '2', null, null);

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(16) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', null, '13074724849', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 13:44:48', null, '', '0');
INSERT INTO `member` VALUES ('12', null, '', 'e10adc3949ba59abbe56e057f20f883e', '2017-06-19 15:47:54', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('13', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 15:49:56', null, '276411726@qq.com', '0');
INSERT INTO `member` VALUES ('14', null, '17600343847', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 15:57:30', null, '', '0');
INSERT INTO `member` VALUES ('15', null, '17600343847', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 16:28:12', null, '', '0');
INSERT INTO `member` VALUES ('16', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 16:28:27', null, '276411726@qq.com', '0');
INSERT INTO `member` VALUES ('17', null, '', 'cfcd208495d565ef66e7dff9f98764da', '2017-06-19 16:32:59', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('18', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 16:50:14', null, 'duan666@163.com', '0');
INSERT INTO `member` VALUES ('19', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 16:55:21', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('20', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 17:08:04', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('21', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 17:21:39', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('22', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 17:26:55', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('23', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 17:29:24', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('24', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 17:38:02', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('25', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-19 17:52:00', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('26', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-20 09:09:44', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('27', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-20 09:14:33', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('28', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-20 09:14:40', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('29', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-20 09:16:17', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('30', null, '13074724849', 'cfcd208495d565ef66e7dff9f98764da', '2017-06-20 10:55:10', null, '', '0');
INSERT INTO `member` VALUES ('31', null, '17600343847', '25d55ad283aa400af464c76d713c07ad', '2017-06-20 10:58:31', null, '', '0');
INSERT INTO `member` VALUES ('32', null, '', 'cfcd208495d565ef66e7dff9f98764da', '2017-06-20 13:21:31', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('33', null, '', 'cfcd208495d565ef66e7dff9f98764da', '2017-06-20 13:22:20', null, 'dduan666@163.com', '0');
INSERT INTO `member` VALUES ('35', null, '', '25d55ad283aa400af464c76d713c07ad', '2017-06-20 13:35:54', null, '276411726@qq.com', '0');
INSERT INTO `member` VALUES ('36', null, '', 'e10adc3949ba59abbe56e057f20f883e', '2017-06-20 13:56:01', null, '1165881524@qq.com', '0');

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `order_no` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `payway` int(11) DEFAULT '1',
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('12', '1', 'E149838375912', '《深入浅出Node.js》', '60.00', '1', '1', '2017-06-25 17:42:39', '2017-06-25 17:42:39');
INSERT INTO `order` VALUES ('13', '1', 'E149846905413', '《深入浅出Node.js》', '20.00', '1', '1', '2017-06-26 17:24:13', '2017-06-26 17:24:14');
INSERT INTO `order` VALUES ('14', '1', 'E149854501014', '《深入浅出Node.js》', '20.00', '1', '1', '2017-06-27 14:30:10', '2017-06-27 14:30:10');

-- ----------------------------
-- Table structure for `order_item`
-- ----------------------------
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `pdt_snapshot` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_item
-- ----------------------------
INSERT INTO `order_item` VALUES ('11', '12', '1', '6', '{\"id\":1,\"name\":\"\\u6df1\\u5165\\u6d45\\u51faNode.js\",\"summary\":\"\\u7b2c\\u4e00\\u672c\\u6df1\\u5ea6\\u8bb2\\u89e3Node\\u7684\\u56fe\\u4e66,\\u6e90\\u7801\\u7ea7\\u522b\\u63a2\\u5bfb\\u8fc7Node\\u7684\\u5b9e\\u73b0\\u539f\\u7406,\\u963f\\u91cc\\u5df4\\u5df4\\u4e00\\u7ebfNode\\u5f00\\u53d1\\u8005\\u6700\\u771f\\u5b9e\\u7684\\u7ecf\\u9a8c\",\"price\":\"10.00\",\"preview\":\"\\/images\\/1.jpg\",\"category_id\":7,\"created_at\":null,\"updated_at\":null}');
INSERT INTO `order_item` VALUES ('12', '13', '1', '2', '{\"id\":1,\"name\":\"\\u6df1\\u5165\\u6d45\\u51faNode.js\",\"summary\":\"\\u7b2c\\u4e00\\u672c\\u6df1\\u5ea6\\u8bb2\\u89e3Node\\u7684\\u56fe\\u4e66,\\u6e90\\u7801\\u7ea7\\u522b\\u63a2\\u5bfb\\u8fc7Node\\u7684\\u5b9e\\u73b0\\u539f\\u7406,\\u963f\\u91cc\\u5df4\\u5df4\\u4e00\\u7ebfNode\\u5f00\\u53d1\\u8005\\u6700\\u771f\\u5b9e\\u7684\\u7ecf\\u9a8c\",\"price\":\"10.00\",\"preview\":\"\\/images\\/1.jpg\",\"category_id\":7,\"created_at\":null,\"updated_at\":null}');
INSERT INTO `order_item` VALUES ('13', '14', '1', '2', '{\"id\":1,\"name\":\"\\u6df1\\u5165\\u6d45\\u51faNode.js\",\"summary\":\"\\u7b2c\\u4e00\\u672c\\u6df1\\u5ea6\\u8bb2\\u89e3Node\\u7684\\u56fe\\u4e66,\\u6e90\\u7801\\u7ea7\\u522b\\u63a2\\u5bfb\\u8fc7Node\\u7684\\u5b9e\\u73b0\\u539f\\u7406,\\u963f\\u91cc\\u5df4\\u5df4\\u4e00\\u7ebfNode\\u5f00\\u53d1\\u8005\\u6700\\u771f\\u5b9e\\u7684\\u7ecf\\u9a8c\",\"price\":\"10.00\",\"preview\":\"\\/images\\/1.jpg\",\"category_id\":7,\"created_at\":null,\"updated_at\":null}');

-- ----------------------------
-- Table structure for `pdt_content`
-- ----------------------------
DROP TABLE IF EXISTS `pdt_content`;
CREATE TABLE `pdt_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(20000) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdt_content
-- ----------------------------
INSERT INTO `pdt_content` VALUES ('1', 'Node.js实战（第2季） \\n¥50.20 (8.51折)\\nNode.js实战（第2季）\\n吴中骅 雷宗民 赵坤 刘亚中 著\\nAngularJS权威教程 “百科全书”式著作，公认的AngularJS经典。MVC教程精粹，JavaScript框架教程实例。\\n¥84.00 (8.49折)\\nAngularJS权威教程\\n（美）勒纳　著 等\\nJavaScript实战—JavaScript、jQuery、HTML5、Node.js实例大全 \\n¥58.60 (8.5折)\\nJavaScript实战—JavaScript、jQuery、HTML5、Node.js实例大\\n张泽娜 编著\\n跨终端 Web 移动优先|响应式|HTML5|Hybrid|桌面+移动应用|一线前端负责人联袂推荐\\n¥46.70 (8.5折)\\n跨终端 Web\\n徐凯　著\\nAngularJS高级程序设计 深入学习AngularJS，驾驭强大的现代Web浏览器\\n¥84.20 (8.51折)\\nAngularJS高级程序设计\\n[美] Adam Freeman 弗里曼　著 等\\nJavaScript框架设计 进入JavaScript框架设计的魔法指南。html+css+javascript教程详解，JavaScript高级程序设计精粹！\\n¥75.00 (8.43折)\\nJavaScript框架设计\\n司徒正美　编著\\n[当当自营]金龙鱼 原香稻大米5000g（限北京市购买）新老包装随机发放 自营食品 粮油 新老包装随机发货  物流原因限北京市购买\\n¥61.00\\n[当当自营]金龙鱼 原香稻大米5000g（限北京市购买）新老包装\\n远山 白莲子 福建建宁磨皮莲子250g*2袋 口感粉面水磨通心去芯 满138-10 满228-20 满328-30\\n¥36.80\\n远山 白莲子 福建建宁磨皮莲子250g*2袋 口感粉面水磨通心去\\n更多>>', '1', null, null);

-- ----------------------------
-- Table structure for `pdt_images`
-- ----------------------------
DROP TABLE IF EXISTS `pdt_images`;
CREATE TABLE `pdt_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(200) DEFAULT NULL,
  `image_no` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdt_images
-- ----------------------------
INSERT INTO `pdt_images` VALUES ('1', '/images/1.jpg', null, '1', null, null);
INSERT INTO `pdt_images` VALUES ('2', '/images/2.jpg', null, '1', null, null);
INSERT INTO `pdt_images` VALUES ('3', '/images/3.jpg', null, '1', null, null);

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `summary` varchar(200) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `preview` varchar(200) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '深入浅出Node.js', '第一本深度讲解Node的图书,源码级别探寻过Node的实现原理,阿里巴巴一线Node开发者最真实的经验', '10.00', '/images/1.jpg', '7', null, null);
INSERT INTO `product` VALUES ('2', 'Node.js权威指南', '以实践为导向，不仅为每个知识点配备了精巧的小案例，而且还设计了2个可操作性极强的综合性案例', '10.00', '/images/2.jpg', '7', null, null);
INSERT INTO `product` VALUES ('3', 'React', '身出名门，Fackbook开源巨献，一经推出，瞬间亮瞎全球攻城狮,以BAT为首的一线国内互联网企业均以快速跟进研发、实践React，下一次求职你就一定会被面到', '10.00', '/images/3.jpg', '8', null, null);
INSERT INTO `product` VALUES ('4', 'React Native', '如果你对开发Web端的原生移动应用感兴趣，《React Native：用JavaScript开发移动应用》就是一本不容错过的以实例代码为引导的入门书籍', '10.00', '/images/4.jpg', '8', null, null);

-- ----------------------------
-- Table structure for `temp_email`
-- ----------------------------
DROP TABLE IF EXISTS `temp_email`;
CREATE TABLE `temp_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `code` varchar(32) DEFAULT NULL,
  `deadline` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of temp_email
-- ----------------------------
INSERT INTO `temp_email` VALUES ('11', '12', '34d8f03a75b95e6e1257a3b4c6d32fda', '2017-06-20 15:47:54');
INSERT INTO `temp_email` VALUES ('12', '13', 'f12e96867599ced90ffa81948267dc95', '2017-06-20 15:49:56');
INSERT INTO `temp_email` VALUES ('13', '16', '69b2fcd6dcc25dc0eca759cba176bf4c', '2017-06-20 16:28:27');
INSERT INTO `temp_email` VALUES ('14', '17', 'a2b1d9893c139ab7bd368d2e25c56a35', '2017-06-20 16:32:59');
INSERT INTO `temp_email` VALUES ('15', '18', '85744e3c2939b9e06a66be21e01854ac', '2017-06-20 16:50:14');
INSERT INTO `temp_email` VALUES ('16', '19', '852379a3cd301a2b65c7ca0ec853b65f', '2017-06-20 16:55:21');
INSERT INTO `temp_email` VALUES ('17', '20', '6a934f775acf5e7b54f629766c27e959', '2017-06-20 17:08:04');
INSERT INTO `temp_email` VALUES ('18', '32', '7f649144ed5ad25d0ca6d2a137fcefec', '2017-06-21 13:21:31');
INSERT INTO `temp_email` VALUES ('19', '33', 'c0e269bd9f62d0d35461b5e9751865bd', '2017-06-21 13:22:20');
INSERT INTO `temp_email` VALUES ('20', '34', '3e8a917db6da0ff1b5910f4d0a6e70c6', '2017-06-21 13:27:54');
INSERT INTO `temp_email` VALUES ('21', '35', '574c4671672d393b48d95b3560a4e402', '2017-06-21 13:35:54');
INSERT INTO `temp_email` VALUES ('22', '36', '66248a56043824f932a1cd5e97074902', '2017-06-21 13:56:01');

-- ----------------------------
-- Table structure for `temp_phone`
-- ----------------------------
DROP TABLE IF EXISTS `temp_phone`;
CREATE TABLE `temp_phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `deadline` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of temp_phone
-- ----------------------------
INSERT INTO `temp_phone` VALUES ('3', '13074724849', '796040', '2017-06-20 13:08:14');
INSERT INTO `temp_phone` VALUES ('4', '17600343847', '611503', '2017-06-20 11:59:18');
