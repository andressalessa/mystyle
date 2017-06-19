#!/bin/bash
export DOCKER_ID_USER="andyreis"
docker login
docker tag mystyle $DOCKER_ID_USER/mystyle
docker push $DOCKER_ID_USER/mystyle
