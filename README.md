# 图书管理系统增删改查

使用 Yii 简单搭建图书管理系统。

## 建库，建表

创建一个名为 `yideng` 的数据库，下面有名为 `books` 的数据表。

建表语句如下：

```sql
CREATE TABLE `books` (
  `id` CHAR(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` CHAR(52) NOT NULL,
  `author` CHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `books` VALUES (1,'你不知道的JavaScript','KYLE SIMPSON');
INSERT INTO `books` VALUES (2,'别让不好意思害了你','周伟力');
INSERT INTO `books` VALUES (3,'从你的全世界路过','张嘉佳');
```

## 项目结构

### view

`view` 文件夹下有个 `books` 的文件夹，放图书的管理界面。

```
├── add.php
├── delete.php
├── index.php
└── update.php
```

修改功能实在不知道怎么操作了，所以用了一下 `ajax`。

### model

`models` 下的 `Books.php`，专门放图书的数据模型。

### controller

`controllers` 下的 `BooksController.php`，放对应的图书操作。