# SnapPay Credit Service Clean Architecture

A brief description of what this project does and who it's for

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

## FAQ

#### What language/framework is project written in?

```bash
Backend PHP/Laravel
FrontEnd Vue 3
```
