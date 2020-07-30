<?php
/**
 * Broadcasts a UDP message to the network.
 *
 * This script does the same thing as below in Bash:
 *    echo 'foo' | socat - UDP4-DATAGRAM:255.255.255.255:6666,so-broadcast
 */

 // Get config info or set default
$name_host  = getenv('NAME_HOST_SELF')     ?: 'broadcaster_php7';
$port       = getenv('PORT_UDP_BROADCAST') ?: 5963;
$time_sleep = getenv('TIME_INTERVAL_SEND') ?: 10;

// Create socket
$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_set_option($sock, SOL_SOCKET, SO_BROADCAST, 1);

// Broadcast a message
$counter = 0;
while (true) {
    // Message to broadcast
    $broadcast_string = "Count:${counter}\tBroadcasting meow meow from ${name_host}" . PHP_EOL;

    // Broadcast
    socket_sendto($sock, $broadcast_string, strlen($broadcast_string), 0, '255.255.255.255', intval($port));

    // Count up and sleep
    $counter++;
    sleep($time_sleep);
}
