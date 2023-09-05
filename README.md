# Sylius Days 08/09/2023

## Optional

⚙️ Install the Maker bundle (if you want to):
```bash
composer require --dev maker
```

## HTTP Basics

### Documentation

💡 [HttpKernel](https://symfony.com/doc/current/components/http_kernel.html)

### Install dependencies

⚙️ Install Twig to render your templates:
```bash
composer require twig
```

### Create your controller

📝 Create a new controller to handle `/search?term=test` which displays `Results for "test":`.
```bash
php bin/console make:controller SearchController
```

📝 Add the "term" parameter using the `Request` object.

📝 Add the "term" parameter using the `MapRequestParameter` attribute.

### Customize your template

📝 Edit [templates/search/index.html.twig](./templates/search/index.html.twig) to add your logic.

📝 Edit [templates/base.html.twig](./templates/base.html.twig) to add a styled `<header>`. 

### Bonus

🎁 Bonus: Use the `MapRequestString` attribute with a `App\Search\SearchContext` DTO.

⚙️ Install the Serializer and Validator components:
```bash
composer require validator serializer
```


## Working with Doctrine

### Install dependencies

⚙️ Install Doctrine:
```bash
composer require orm
```

📝 Update your `.env` to use SQLite or PostgreSQL (via Docker)
```dotenv
DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
# or
DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=15&charset=utf8"
```

### Create and use your entities

📝 Create your entities:
```bash
php bin/console make:entity Color # name, code, reference 
php bin/console make:entity Product # name, description, price, colors
```

📝 Create a `App\Provider\ProductProvider` service which will return mocked products and use it in your controller. Tip:
use an interface to switch easily to the "database" version later.

📝 Update this service to use the `App\Repository\ProductRepository`.

⚙️ Create a migration and run it:
```bash
php bin/console doctrine:migration:diff
php bin/console doctrine:migration:migrate
```


## Building and extending forms

### Install dependencies

⚙️ Install Twig to render your templates:
```bash
composer require form
```

### Create and use your form

📝 Create a new form, and then, a new controller to handle it.
```bash
php bin/console make:form Product # Remove "color" field for now
php bin/console make:controller ProductController
```

📝 Edit your controller and template to display the form.


## Creating entity using the Factory pattern

### Create and use the factory

📝 Create two services named `App\Factory\ProductFactory` and `App\Factory\ColorFactory` to return fake data and use it
in the `App\Provider\FakeProvider`.
