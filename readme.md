# Docker presentation

The purpose of this repository is to have a support for my Docker presentation. These files here will give you a starting point into your journey experience.

The presentation can be found [here](https://docs.google.com/presentation/d/1G3iEeR8QGld2smck6yoGlH2howC3NmzLyclCQjBocTU/edit?usp=sharing). At the moment its in romanian, but will create an english version soon.

## Docker-compose commands

This section describes how to start and stop everything with `docker-compose`.

**Note:** Run commands from the dir where `docker-compose.yml` is found.

### Create and start everything (network, containers, etc.)
```
docker-compose up -d --build
```
### Stop and remove everything
```
docker-compose down -v
```

## Docker commands

This section describes all the commands that you need to run to obtain the above result, without using any `docker-compose.yml` file.

**Note:** Run commands from the dir where `docker-compose.yml` is found.

### Create and start everything

Create network
```
docker network create crm-network
```

Build php image for www container (service)
```
docker build -t=crm-php-image ./php/
```

Start www container
```
docker run \
-p 8080:80 \
--volume `pwd`/php/code:/var/www/html/ \
--network=crm-network \
--name=www \
--rm \
-d \
crm-php-image
```

Start db container
```
docker run \
--env MYSQL_DATABASE=crm_app \
--env MYSQL_USER=crm_user \
--env MYSQL_PASSWORD=crm_pass \
--env MYSQL_ROOT_PASSWORD=root \
--volume `pwd`/mysql/dump:/docker-entrypoint-initdb.d \
--volume `pwd`/mysql/conf:/etc/mysql/conf.d \
--volume `pwd`/mysql/data:/var/lib/mysql \
--network=crm-network \
--name=db \
--rm \
-d \
mysql:8.0
```

*Note* You can remove the `-d` flag if you want to do see real-time logs on the screen while the containers are running.

### Remove everything

Stop containers
```
docker stop db www
```

Remove containers
```
docker rm db www
```

Remove www container image
```
docker rmi crm-php-image
```

Remove network
```
docker network rm crm-network
```

## Other useful commands

Here you can find a list of useful commands that may help you doing various operations. For more information you can also check docker reference, link [here](https://docs.docker.com/reference/).

Build the php image
```
docker build -t=php-image .
```

Run the php image into a container
```
docker run --name=php-container -p 8080:80 --rm -d php-image
```

Show running containers
```
docker ps
```

Show all containers (running + stopped)
```
docker ps -a
```

Stop container
```
docker stop php-container
```

Remove container
```
docker rm php-container
```

View container logs
```
docker logs php-container
```

"SSH" into the container without a service name
```
docker exec -it php-container sh
```

"SSH" into the using the service name (www in our case)
```
docker-compose exec www sh
```

