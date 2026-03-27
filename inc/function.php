<?php
function test_input($data){
  $data = trim($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>