<?php

include("conn.php");//数据库连接

$sql="select* from study_sql";//查询数据库表名为study_sql所有的数据记录

$res=mysql_query($sql);//向数据库发送一条sql语句

//$arr=mysql_fetch_row($res);//获取数据库中的第一条信息

echo '<table apgn="center" width="800" border="1">';//获取的数据用表格显示出来

 echo '<cabtion><h1>演示表</h1></cabtion>';
 
 while($arr=mysql_fetch_assoc($res)){//取出表study_sql中的所有结果集
 
  echo '<tr>';
  
  foreach($arr as $col){//遍历数据
  
   echo '<td>'.$col.'</td>';
   
  }
  
  echo "</tr>";
  
 }
 
?>