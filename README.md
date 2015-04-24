# Nette pagination
*Pagination for Nette framework (a.k.a. VisualPaginator).*

## Installation

The best way to install Kdyby/Translation is using the [Composer](http://getcomposer.org/):

```sh
$ composer require fmasa/nette-pagination
```


## Usage
```php
protected function createComponentPagination()
{
    $pagination = new \fmasa\Controls\Pagination;

    // Set your own template, otherwise default one will be used
    $pagination->template->setFile(__DIR__.'/myAwesomePagination.latte');

    return $pagination;
}

public function renderDefault()
{
    // Obtain Paginator from component
    $paginator = $this['pagination']->paginator; // or $this['pagination']->getPaginator();
}
```

Default pagination template supports ajaxification (using snippets) – useful for infinite scrolling and other stuff.
