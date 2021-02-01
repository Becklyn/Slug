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
