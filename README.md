# Typed collection

Defines a generic class to manage collections. 

PHP 7.4 doesn't implement class templating (e.g `private array<MyElementClass> $collection`), so the items of any array are inherently untyped. 

This is an attempt to address that issue, allowing subclasses to redefine the return type of the abstract methods that manage the collection.
