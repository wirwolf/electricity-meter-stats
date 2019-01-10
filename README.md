# Skeleton Yii2

## Build project with Docker

```
docker-compose file v3.3

```

To start project first of all create `.env` file. You can create it from exist `.env.example` file in core of project. 
After it build docker containers using make file shortcut:
```
make build
```
To start containers type:
```
make up
```

#### Structure of docker project
All contaters configuration and relations handle in `docker-compose.yml`. Also project has **.docker** directory, which hold configuration data for containers (**config** directory), dockerfiles for containers ( **dockerfile** directory) and data from containers ( **data** directory )


## Setup project

## Tests
To run test 
```
make tests
```

## Code samples and usage
