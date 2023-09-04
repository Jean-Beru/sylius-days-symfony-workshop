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

🎁 Bonus: Use the `MapRequestString` attribute with a Search DTO.
