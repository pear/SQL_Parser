<?php
$tests = array (
  0 => 
  array (
    'sql' => '
(SELECT a);',
    'expect' => 'Parse error: Unknown action: ( on line 2
(SELECT a);
^ found: "("',
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
