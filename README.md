# SnapPay Credit Service Clean Architecture

A brief description of what this project does and who it's for

![alt text](https://raw.githubusercontent.com/onemohsen/SnappPay-Credit-Service-Clean-Architecture-Backend/develop/SnappPay-Diagram.jpg)

## Installation

Install project with composer

```bash
  git clone
  cd
  composer install
  php artisan migrate --seed
```

#### Environment Variables

To run this project, you will need to add the following environment variables to .env file.
authorization by Laravel Passport package.

```bash
  cp .env.example .env
```

Finally add the settings below to end of file :

note: after the command php artisan migrate --seed run this value settings show you in console

```bash
    SNAPPPAY_GRANT_TYPE=password
    SNAPPPAY_CLIENT_ID=2
    SNAPPPAY_CLIENT_SECRET=L8erqTADUWRjv8TsAVWjlkSn2abyIekuK6mcgJV2
```

#### Authentication

```bash
Admin:
  email: admin@test.com
  password: admin
User:
  email: user@test.com
  password: user
```

#### Dockerize

```bash
# run command

mkdir snapp
cd snapp
git clone https://github.com/onemohsen/SnappPay-Credit-Service-Clean-Architecture-Backend.git
git clone https://github.com/onemohsen/SnappPay-Credit-Service-Clean-Architecture-Frontend.git
git clone https://github.com/onemohsen/SnappPay-Credit-Service-Clean-Architecture-Document.git
mv SnappPay-Credit-Service-Clean-Architecture-Frontend frontend
mv SnappPay-Credit-Service-Clean-Architecture-Document document
mv SnappPay-Credit-Service-Clean-Architecture-Backend backend
cp frontend/.env.example frontend/.env
cp backend/.env.example backend/.env
cp backend/.env .
cp backend/docker-compose.yml .
docker-compose build
docker-compose up
docker-compose exec backend php artisan migrate:fresh --seed
docker-compose exec backend php artisan optimize:clear
docker-compose exec backend ./vendor/bin/pest

# end command

backend: localhost:8080
frontend: localhost:3000
document: localhost:30001



```

## FAQ

#### What language/framework is project written in?

```bash
Backend PHP/Laravel
FrontEnd Vue 3
Document Swagger
```
