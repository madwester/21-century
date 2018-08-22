<?php

include ("wp-content/themes/customizr-child/database.php");
 
$id="81";


$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', 'school_name','NEW')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', '_school_name','field_5a69532cd46d8')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', 'state','新南威尔士州')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', '_state','field_5a695346d46d9')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', 'grade','大学本科')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', '_grade','field_5a695369d46da')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', 'logo','748')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', '_logo','field_5a731547d871f')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', 'image','748')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', '_image','field_5a731555d8720')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', 'school_info','THIS IS INFO')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', '_school_info','field_5a731564d8721')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', 'school_detail','THIS IS DETAIL')";
$connection->query($query);
$query = "INSERT INTO wp_postmeta (post_id,meta_key,meta_value)  VALUES ('$id', '_school_detao;','field_5a73157fd8722')";
$connection->query($query);

?>