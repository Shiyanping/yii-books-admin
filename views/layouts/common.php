<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>公共样式</title>
</head>
<body>
<?php if (isset($this->blocks['block1'])):?>
  <?= $this->blocks['block1']?>
<?php else:?>
  <?=$content;?>
<?php endif;?>
</body>
</html>