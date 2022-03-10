# Commands

## Build image
```
docker build -t=php-image .
```

## Run image into a container
```
docker run --name=php-container -p 8080:80 --rm php-image
```

## Show running containers
```
docker ps
```

## Show all containers (running + stopped)
```
docker ps
```

## Stop container
```
docker stop php-container
```

## Remove container
```
docker rm php-container
```

## View container logs
```
docker logs php-container
```

## Get inside container (without a service name)
```
docker exec -it php-container sh
```

## Get inside container (using a service name)
```
docker-compose exec php-service bash
```

