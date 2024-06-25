# Partials Folder

This is the place for any page template partials that will be used for page views.

## Naming

- *top.php* - The start of the HTML page, including the `<head>` section
- *header.php* - The main header
- *footer.php* - The main footer
- *nav.php* - The navigation section
- *bottom.php* - The last few tags of the HTML page

These partials can be used within a page layout template by simply 'requiring' it:

```php
require 'partial/nav.php';
```

