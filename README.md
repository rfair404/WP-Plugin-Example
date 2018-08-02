Example of a WordPress Plugin that follows a TDD approach, includes the WordPress coding standards, PHPMD, and uses CI/CD for automated deployments.

### Objectives:

* PHP_Codesniffer
* WordPress Coding Standards
* PHPMD
* eslint
* stylelint
* PHP_Unit
* WP_Mock
* Qunit
* Continuous Integration (TravisCI)
* Continuous Deployment (host TBD)

## Docker Compose
Start Docker containers by running 
```
$ docker-compose up --build
```

To open a shell on the "wp" container run 
```
docker exec -it wp /bin/bash
```

### Installing

Install WP Unit Test Suite by running 
```
docker exec -it wp /bin/bash install-wp-tests.sh wordpress_tests root somewordpress db latest 
```
If the test suite has been installed, and the test database created, run this instead:
``````
docker exec -it wp /bin/bash install-wp-tests.sh wordpress_tests root somewordpress db latest false
```

Configure PHPCS to use WPCS  by running 
```
docker exec -it wp vendor/bin/phpcs --config-set installed_paths vendor/wp-coding-standards/wpcs
```


### Run PHPCS

```
docker exec -it wp vendor/bin/phpcs docroot/custom-content/plugins/custom-plugin --standard=phpcs.xml
```

### Run PHPMD

```
docker exec -it wp vendor/bin/phpmd docroot/custom-content/plugins/custom-plugin text phpmd-ruleset.xml
```

### Run PHPUnit

```
docker exec -it wp vendor/bin/phpunit --coverage-text --coverage-clover=coverage.clover --colors=never
```