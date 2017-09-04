# Build docker image
$ sudo docker build [name] .

# Pulling the docker images
$ sudo docker pull pb2bee/mal-posgrabber:1


# Create a container
$ sudo docker run --rm -i -t -v [c2-command path in host]:/home/analysis/tools/c2-command --name [container's name] -d pb2bee/mal-posgrabber:1



