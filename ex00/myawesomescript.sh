#!/bin/sh

if [ -z "$1" ]; then
    echo "usage: $0 <bit.ly URL>"
    exit 1
fi

curl -s -I "$1" | grep -i Location: | cut -d ' ' -f2
