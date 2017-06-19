#!/bin/bash
export DOCKER_ID_USER="andyreis"
docker login
docker build -t mystyle .
docker tag mystyle $DOCKER_ID_USER/mystyle
docker push $DOCKER_ID_USER/mystyle
