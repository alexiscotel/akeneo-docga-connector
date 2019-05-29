# DocgaExtendedAttributeTypeBundle

Provides new attributes types for Akeneo PIM CE and EE:
- docga: this attribute type can store an ordered collection of strings or URLs.

![DocGa - Attribut Akeneo](src/Resources/public/images/logo.png)


## Installation
```
    composer require oniti/akeneo-docga-connector
```

Add the following bundle in your `app/AppKernel.php` file:

```php
$bundles = [
    new Oniti\Docga\ConnectorBundle\DocgaExtendedAttributeTypeBundle(),
];
```

You will also have to register the new Elasticsearch configuration files; in `app/config/pim_parameters.yml`, edit the 
`elasticsearch_index_configuration_files` parameter and add the following values:

```yaml
elasticsearch_index_configuration_files:
    - '%kernel.root_dir%/../vendor/oniti/akeneo-docga-connector/src/Resources/config/elasticsearch/index_configuration.yml'
```

For the Enterprise edition, there are two other files to register:
```yaml
elasticsearch_index_configuration_files_product_proposal:
     - '%kernel.root_dir%/../vendor/oniti/akeneo-docga-connector/src/Resources/config/elasticsearch/index_configuration_ee_product_proposal.yml'
elasticsearch_index_configuration_files_published_product:
     - '%kernel.root_dir%/../vendor/oniti/akeneo-docga-connector/src/Resources/config/elasticsearch/index_configuration_ee_published_product.yml'   
```

If this is a fresh install, you can then proceed with a standard installation.

From an existing PIM, on the other hand, you will have to re-create your elasticsearch indexes:
```
    php bin/console cache:clear --no-warmup --env=prod
    php bin/console akeneo:elasticsearch:reset-indexes --env=prod
    php bin/console pim:product-model:index --all --env=prod
    php bin/console pim:product:index --all --env=prod
```

## Contributing

If you want to contribute to this open-source project,
thank you to read and sign the following [contributor agreement](http://www.akeneo.com/contributor-license-agreement/)
