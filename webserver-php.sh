#!/bin/bash
# Simple bash script to run built-in php web server

usage() {
	echo "Usage: $0 <addr> <port>"
	echo
	echo "  Example:"
	echo "  $0 127.0.0.1 9000"
	echo
	exit 1
}

nophp() {
	echo "Missing php web server utility, please install php-cli software"
	echo "  e.g. apt-get install php7.1-cli"
	echo
	exit 1
}

if [ "$#" -ne 2 ]; then
	usage
fi

ADDR=$1
PORT=$2

cmdtest=$(command -v php -S)
[ -z "$cmdtest" ] && nophp

php -S $ADDR:$PORT
