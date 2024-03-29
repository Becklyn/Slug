1.3.0
=====

*   (feature) Add support for PHP 8.
*   (internal) Fix Symfony deprecations.
*   (improvement) Add missing property types and return types.
*   (internal) Remove support for Symfony 4.4.
*   (improvement) Add support for Symfony 6.


1.2.3
=====

*   (internal) Update dependencies. 
*   (internal) Raise minimum supported PHP version to 7.4
*   (improvement) add support for PHP 8 and later. 
*   (internal) Replace TravisCI with GitHub Actions. 


1.2.2
=====

*   (bug) Also sanitize `._~(),;!` chars in url by replacing them with a `-` char.
*   (bug) Require `ext-mbstring`.


1.2.1
=====

*   (bug) Properly generate slugs for strings that contain `e` characters with accents.


1.2.0
=====

*   (feature) Add `SlugGenerator::generateUnique()`.


1.1.2
=====

*   (improvement) Allow Symfony 5.
*   (internal) Update bundle structure + clean up.


1.1.1
=====

*   Fixed an invalid internal path.


1.1.0
=====

*   Added `IdSuffixSlugControllerTrait` to easily parse id-suffixed slugs in controllers.
*   Added `IdSuffixSlugEntityTrait` to easily generate id-suffixed slugs in entities.


1.0.0
=====

Initial release.
