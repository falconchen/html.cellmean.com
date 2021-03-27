<?php

// 清文件缓存
$dirs = array(
	'/data/home/qxu1649310056/wwwlogs',
);
// 清理缓存
foreach($dirs as $dir) {
  do_rmdir($dir, false);
  echo "<div style='border:2px solid green; background:#f1f1f1; padding:20px;margin:20px;width:800px;font-weight:bold;color:green;text-align:center;'>\"" . $dir . "\" have been cleaned clear! </div>";
}


/**
 * 清空/删除 文件夹
 * @param string $dirname 文件夹路径
 * @param bool $self 是否删除当前文件夹
 * @return bool
 */
function do_rmdir($dirname, $self = true) {
  if (!file_exists($dirname)) {
    return false;
  }
  if (is_file($dirname) || is_link($dirname)) {
    return unlink($dirname);
  }
  $dir = dir($dirname);
  if ($dir) {
    while (false !== $entry = $dir->read()) {
      if ($entry == '.' || $entry == '..') {
        continue;
      }
			echo $dirname . '/' . $entry ."<br/>";
      do_rmdir($dirname . '/' . $entry);
    }
  }
  $dir->close();
  $self && rmdir($dirname);
}
