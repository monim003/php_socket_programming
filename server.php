<?php

$host = "127.0.0.1";
$port = 8000;

//no timeout
set_time_limit(0);

//create socket
$sock = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

//bind the socket to port and $host
$result = socket_bind($sock, $host, $port) or die("Could not bind to socket\n");

while(true)
{
  //start listening to the port
  $result = socket_listen($sock, 3) or die("Could not set up socket listener\n");

  //make it to accept incoming connection
  $spawn = socket_accept($sock) or die("Could not accept incoming connection\n");

  //read the message from client socket
  $input = socket_read($spawn, 1024) or die ("Could not read input\n");

  $output = 'Message received to server !';

  socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");
}

socket_close($spawn);
socket_close($socket);

?>
