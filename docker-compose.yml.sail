# For more information: https://laravel.com/docs/sail
version: '3'
services:
    laravel.test:
        build:
            context: ./vendor/laravel/sail/runtimes/8.1
            dockerfile: Dockerfile
            args:
                WWWGROUP: '${WWWGROUP}'
        image: sail-8.1/app
        extra_hosts:
            - 'host.docker.internal:host-gateway'
        ports:
            - 8080:8080
        environment:
            WWWUSER: '${WWWUSER}'
            LARAVEL_SAIL: 1
            XDEBUG_MODE: '${SAIL_XDEBUG_MODE:-off}'
            XDEBUG_CONFIG: '${SAIL_XDEBUG_CONFIG:-client_host=host.docker.internal}'
            DB_HOST: db
            DB_DATABASE: snapp_pay
            DB_USERNAME: root
            DB_PASSWORD: root
            SNAPPPAY_GRANT_TYPE: password
            SNAPPPAY_CLIENT_ID: 2
            SNAPPPAY_CLIENT_SECRET: L8erqTADUWRjv8TsAVWjlkSn2abyIekuK6mcgJV2
        volumes:
            - '.:/var/www/html'
        networks:
            - sail
        depends_on:
            - mysql
    mysql:
        image: 'mysql/mysql-server:8.0'
        environment:
            MYSQL_DATABASE: 'snapp_pay'
            MYSQL_USER: 'root'
            MYSQL_PASSWORD: 'root'
            MYSQL_ROOT_PASSWORD: 'root'
            MYSQL_ALLOW_EMPTY_PASSWORD: 1
        volumes:
            - 'sail-mysql:/var/lib/mysql'
            - './vendor/laravel/sail/database/mysql/create-testing-database.sh:/docker-entrypoint-initdb.d/10-create-testing-database.sh'
        networks:
            - sail
        healthcheck:
            test: ["CMD", "mysqladmin", "ping", "-p${DB_PASSWORD}"]
            retries: 3
            timeout: 5s
networks:
    sail:
        driver: bridge
volumes:
    sail-mysql:
        driver: local
