#!/usr/bin/env bash

#ssh $1@$2 -i $4
rsync -avz -e "ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null" --progress text.txt $1@$2:~/

#rsync -avzhe ssh --dry-run test.txt  $1@$2:$3 -i $4