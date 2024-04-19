# Polyglot-News

This repo is mostly a demonstration for polyglot-bundle

It follows the instructions in the README.

To run this locally (sqlite), 

```bash
git clone git@github.com:survos-sites/polyglot-readme.git && cd polyglot-readme
composer install
bin/console doctrine:schema:update --force
bin/console doctrine:fixtures:load -n 
```


It was created roughly using these steps, copying the README examples.

```bash
symfony new poly-readme --webapp
bin/console make:entity Document -n
composer req webfactory/polyglot-bundle:dev-master
composer require orm-fixtures --dev              
bin/console make:fixtures App
```


