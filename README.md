## Требования 

- PHP 8.0

## Установка 

```bash
$ composer require toni-ardyshev-basket/otus-composer-package
```
## Использование

```php
$processor = new TransliteratorProcessor();
$text = 'Ёж съел очень вкусный ужин';
$type = 'Russian-Latin/BGN';
$options = 'ë > yo';

echo $processor->transliterate($text, $type, $options);
```

$options - не обязательный параметр
