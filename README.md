Following [this example](http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/tutorials/getting-started.html) in the doctrine docs.

Topics covered:

* required composer packages and autoloading in `composer.json`
* yaml config in `config/yaml/*` (yaml: yay! annotations: boo!)
* get the entity manager with db connection and yaml config for each script in `bootstrap.php` (use sqlite file for example)
* quick doctrine cli tool setup in `cli-config.php`
* create initial schema: `vendor/bin/doctrine orm:schema-tool:create`
* update the schema in place: `vendor/bin/doctrine orm:schema-tool:update --force`

* start with an entity in `src/MikeFunk/DoctrineExample/Entities/Product.php`
* set up the config for the entity in `config/MikeFunk.DoctrineExample.Entities.Product.dcm.yml`
* now update the schema and show the sql statements used with `vendor/bin/doctrine orm:schema-tool:update --force --dump-sql`
* you can also generate or update the entities by just entering the yaml config and `vendor/bin/doctrine orm:generate:entities src`

* script to create a product using the entity and persist it in the db in `create_product.php`
* list all products using a default product repository in `list_products.php`
* show one product with the find method right off of the entity manager in `show_product.php`
* update a product without having to persist it (UnitOfWork) in `update_product.php`

* add bug and user entity configs in `MikeFunk.DoctrineExample.Entities.Bug.dcm.yml` and `MikeFunk.DoctrineExample.Entities.User.dcm.yml`
* generate the entities with `vendor/bin/doctrine orm:generate:entities src`
* understand the concept of ownership of a relation and how to represent that in the config
* initialize products for bugs and assigned/reported bugs for users

* learn about `Doctrine\Common\Util\Debug::dump()` instead of `var_dump` to make dumped results human readable
* learn about when entities are automatically persisted
* learn about bi-directional references with bugs having engineers and reporters
* add `setReporter` method to the Bug entity. Since this is bi-directional you have to attach the reported bug to the reporter as well as define the reporter of the current bug. Same with `setEngineer`.
* add a method `addReportedBug` on the User entity to allow it to update related bugs of this type from this direction. Same with `assignedToBug`

* update the Bug config to add manyToOne relations with the reporter and engineer, and manyToMany with products. Also add some fields to Bug.
* generate the entities with `vendor/bin/doctrine orm:generate:entities src` to add `getProducts` to the bug class alone with `addProducts` and `removeProduct`
* add yaml config for the user entity with fields and relations
* generate the user entity with `vendor/bin/doctrine orm:generate:entities src` to get a starting point
* update the schema in place: `vendor/bin/doctrine orm:schema-tool:update --force`

* create a user with `php create_user.php joe`
* set up the `create_bug.php` script to create a bug with an assigned engineer, a reporter, and related products attached
* create `list_bugs.php` using the first DQL example. Format and show the details of each bug with the reporter, engineer, and all attached products.
 * do the same thing as an array with `list_bugs_array.php`
* show a bug with `show_bug.php` along with the assigned engineer. This shows an example of how the setters/getters are replaced by lazy-loading proxies. `$bug->getEngineer()->getName()` works.
 * you can eager load by getting the children ordered by the parents or define in the yaml config `fetch: EAGER` for that relation. You can also [set fetch mode to eager on the fly](http://stackoverflow.com/a/18945069/557215).

* set up a "dashboard" for the user to see all created or assigned bugs in `dashboard.php`. This shows an examples of PDO-style bound parameters.
* show the bugs for a product with `products.php`. This shows an example of `->getScalarResult()` when there is an aggregate function such as COUNT, SUM, MAX, or AVG in the dql.
* set up a verb updater `close()` on the Bug model to set the status as `CLOSED`. add a script to close a bug at `close_bug.php` which just `find`s it and calls `->close()`.
* learn about how *UnitOfWork* reuses entities found by id.

* create a custom repository at `src/MikeFunk/DoctrineExample/Repositories/BugRepository.php` and fill it with some methods we did in entities before.
* bind it to the entity in the yaml config for Bug: `repositoryClass: MikeFunk\DoctrineExample\Repositories\BugRepository`
* use the repo instead of the entity in `list_bugs_repository.php`
