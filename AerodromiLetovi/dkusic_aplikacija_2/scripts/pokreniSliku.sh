#!/bin/bash
NETWORK=dkusic_mreza_1

docker run -it -d \
  -p 8070:8080 \
  --network=$NETWORK \
  --ip 200.20.0.4 \
  --name=dkusic_payara_micro \
  --hostname=dkusic_payara_micro \
  dkusic_payara_micro:6.2023.4 \
  --deploy /opt/payara/deployments/dkusic_aplikacija_2-1.0.0.war \
  --contextroot dkusic_aplikacija_2 \
  --noCluster &
wait
