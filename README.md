# 图书管理系统增删改查

使用 Yii 简单搭建图书管理系统。

## 建库，建表

创建一个名为 `yideng` 的数据库，下面有名为 `book` 的数据表。

建表语句如下：

```sql
CREATE TABLE `book` (
  `id` CHAR(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` CHAR(50) NOT NULL,
  `author` CHAR(50) NOT NULL,
  `time` DATETIME NOT NULL,
  `library_id` INT(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `book` VALUES (1,'你不知道的JavaScript','KYLE SIMPSON', '2018-12-12 00:00:00', 1);
INSERT INTO `book` VALUES (2,'别让不好意思害了你','周伟力', '2018-12-12 00:00:00', 1);
INSERT INTO `book` VALUES (3,'从你的全世界路过','张嘉佳', '2018-12-12 00:00:00', 1);
```

## 创建项目

通过 gii 进行工程构建