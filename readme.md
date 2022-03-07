# Commands

## Build image
```
docker build -t=docker-presentation-image .
```

## Run image into a container
```
docker run --name=docker-presentation-container -p 8080:80 --rm docker-presentation-image
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
docker stop docker-presentation-container
```

## Remove container
```
docker rm docker-presentation-container
```

## View container logs
```
docker logs docker-presentation-container
```

## Get inside container
```
docker-compose exec docker-presentation-container bash
```

