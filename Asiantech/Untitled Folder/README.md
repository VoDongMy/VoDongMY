# Asiantech PHP Team - Laravel Skeleton Project

This repository is used for projects that use [Laravel](http://laravel.com) framework.

### Version
Laravel 5.1.*

### Install

##### Server Requirements

- PHP >= 5.5.9
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension

##### Clone this repository into local

```
git clone link_to_this_repo project_name
```
##### Change git url

Change the git url to point to your project's repository
```
git remote set-url origin your_git_project_url
```
or set the git url in git config file
```
vim .git/config #open git config file by vim, then set the url
```
##### create `.env` file
Laravel use [this package](https://github.com/vlucas/phpdotenv) to manage environment variables by creating the `.env` file in root document. This file is ignored in git so you have to copy from `.env.example` file. Whenever a team member add a new environment variable, he/she must update the `.env.example`.

```
cp .env.example .env
```
Now you have to update some values for that file, eg: database configurations.

##### generate app key
This key is used for encrypt. Execute this command to generate a new key
```
php artisan key:generate
```


##### Install packages by composer
Execute
```bash
composer install
```
to download all required packages to vendor directory. But before execute that command, make sure [composer](https://getcomposer.org/doc/00-intro.md#globally) is globally installed in your local machine.

##### Directory Permissions
```bash
sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap/cache
```

##### craete database
```bash
sudo php artisan migrate
sudo php artisan db:seed
```

##### login acout admin
../cpanel
email: admin@admin.io
password: admin

##### Setup the Vhost

Using [Homestead](http://laravel.com/docs/5.1/homestead) is recommended. You can also settup the vhost for Apache or Nginx on you local machine

### Installed Packages

##### Laravel Debugbar
[Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar) is used for debuging. Only use this package on local environment.

Verison: ^2.0

### Recommended Packages (not Installed)

Add the name and the version of package to `composer.json` file then execute
```bash
composer update
```
to install the package.
- [Laravel Former](https://github.com/formers/former) : Easier way to handle form
- [Intervention Image](http://image.intervention.io/) : The great package for working with image
- [Laravel Collective](http://laravelcollective.com/)
- [Laravel-Excel](https://github.com/Maatwebsite/Laravel-Excel): Working with Excel is more easier and fun
- [API](https://github.com/dingo/api): It's for building an API project
- [Laravel Mongodb](https://github.com/jenssegers/laravel-mongodb): The Eloquent for Mongodb
- [Sloquent Sluggable](https://github.com/cviebrock/eloquent-sluggable): Making slug

### Coding style

[PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) and [PHPMD](http://phpmd.org/) are used to check the coding style. The `cicle.ci` file is also available in the project root folder, it can help us to check coding style and unit testing when a member try to create a new pull request. The circelci configurations also can help us to make comments on github commit if something is wrong.  

#### PHP_CodeSniffer
Check the coding convention following [PSR-1](http://www.php-fig.org/psr/psr-1/), [PSR-2](http://www.php-fig.org/psr/psr-2/). Beside that function comment must follow some rules bellow:
- All global functions, class methods must have comment to explain the meaning of functions.
- Line 1 : Short description. There is a blank line after line 1
- Next lines: explain for parameters
 - `@param   type $paramName description`
 - Explain for all parameters line by line, there is no blank line bettween parameters description.
- Last line: return description
 - `@return type`
 - There is a blank line before return description line.

Local checking:
```bash
./vendor/bin/phpcs --standard=phpcs.xml
```
#### PHPMD
- [Code Size Rules](http://phpmd.org/rules/codesize.html)
- [Controversial Rules](http://phpmd.org/rules/controversial.html)
- [Design Rules](http://phpmd.org/rules/design.html)
- [Naming Rules](http://phpmd.org/rules/naming.html)
 - ShortVariable except for `$id`, `$e`
- [Unused Code Rules](http://phpmd.org/rules/unusedcode.html)

Local checking:
```bash
./vendor/bin/phpmd app text phpmd.xml
```
