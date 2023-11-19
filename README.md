## Требования 

- PHP 8.0

## Установка 

```bash
$ composer require anton-ardyshev/otus-composer-package
```
## Использование

```php
$processor = new TransliteratorProcessor();
$text = 'Ёж съел очень вкусный ужин';
$options = 'ё > yo';

echo $processor->transliterate($text, $options);
```
$options  - необязательный параметр

### Генератор ЧПУ ссылок

Данное приложение используется для транслитерации русского языка на латынь.
Символы пробел и нижнее подчеркивание('_') заменяется на дефис('-').
Символы не буквенно-цифрового выражения удаляются.




