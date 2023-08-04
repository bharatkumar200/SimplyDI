# SimplyDI
DI in its simplest form (PHP)

## Registering

**Register the classes in your bootstrap or anywhere you like**:

```php
// In your application's bootstrap or configuration file

use SimplyDi\SimplyDi\Container;

Container::register('content', function () {
    return new \App\Libraries\Content\Posts();
});

```

**Using the dependencies in your controllers**:

```php
namespace App\Controllers;

use SimlpyDi\SimplyDi\Container;

class MyController
{
    private $content;

    public function __construct()
    {
        $this->content = Container::resolve('content');
    }

    public function someMethod()
    {
        // Now you can use $this->content as an instance of \App\Libraries\Content\Posts
        $post = $this->content->getPostBySlug('example-slug');
    }
}

```

## Notes

- This is the simplest form of DI (inspired from CodeIgniter 4 services) wherein you register all your classes in a single container class and then use the same container to load all other classes
- it doesn't offer high level features such as Autowiring and stuff. For such features, use Symfony or League Dependency Injection component.
- this project is suitable only for smaller projects or for learning