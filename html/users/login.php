<?php
  $command = 'None';
  $fp = fopen("/home/analysis/tools/c2-command/stage2-command.txt",'rb');
  $cmd_array = [];
  while(($buffer = fgets($fp, 4096)) !== false) {
    if(strlen($buffer) > 1) {
      if($buffer[0] != '#') {
        $cmd_array[]=$buffer;
      }
    }
  }
  $idx = 0;
  $cnt = count($cmd_array);
  if($cnt !== 0) {
    $idx = rand(0, $cnt-1);
    $command = trim($cmd_array[$idx]);
  }
  setcookie('response', "$command:execute",
            time() + 86400, '/', 'canof.gtisc.gatech.edu');
  echo $command;
?>
