# UDP Broadcast Station in PHP7

Sample Docker container to send broadcast messages via UDP in PHP7. (Port=5963 by default)

## File Description

- Broadcaster: `sender.php` (Entrypoint script. Sends the broadcast message)

## What It Does

In this sample container:

1. Creates the socket of UDP broadcast message port.
2. Loops the below
    - Sends a broadcast message.
    - Waits/sleeps for a seconds.

## Requirements

The `sockets` PHP extension module is needed to send and receive the messages. This extension is a proxy that connects a socket to others. In this case the UDP port to a variable.

## Sample Usage

- [KEINOS/Broadcast-inside-Docker-network](https://github.com/KEINOS/Broadcast-inside-Docker-network) @ GitHub