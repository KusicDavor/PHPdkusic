#!/bin/bash

NETWORK=dkusic_mreza_1

docker run -d \
  -p 9001:9001 \
  --network=$NETWORK \
  --ip 200.20.0.3 \
  --name=nwtis_bp \
  --hostname=nwtis_bp \
  --mount type=bind,source=/opt/hsqldb-2.7.1/hsqldb/data,target=/opt/data \
  nwtis_bp:1.0.0 &

wait
