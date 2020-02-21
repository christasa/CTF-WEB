#!/bin/bash

unitd --user ctf --group ctf;
chown ctf:ctf /var/run/
# waiting for mongodb
sleep 5;
curl -X PUT --data-binary @unit.config.json --unix-socket /var/run/control.unit.sock http://localhost/config/
curl http://127.0.0.1:13333/init -vv
echo -e "\n!!!!!!!!!!!!!!!!!! Server Ready Perfectly !!!!!!!!!!!!!!!!\n"
tail -F /var/log/unit.log
