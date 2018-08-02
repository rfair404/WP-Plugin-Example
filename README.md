Example of a WordPress Plugin that follows a TDD approach, includes the WordPress coding standards, PHPMD, and uses CI/CD for automated deployments.

### Objectives:

* PHP_Codesniffer
* WordPress Coding Standards
* PHPMD
* eslint
* stylelint
* PHP_Unit
* Qunit
* Continuous Integration (TravisCI)
* Continuous Deployment (host TBD)

## Docker Compose
Start Docker containers by running `$ docker-compose up --build`

To open a shell on the "wp" container run `$ docker exec -it wp /bin/bash`

### Installing

Install WP Unit Test Suite by running `$ docker exec -it wp /bin/bash install-wp-tests.sh wordpress wordpress wordpress db`

### Run PHPUnit

`$ docker exec -it wp vendor/bin/phpunit`
