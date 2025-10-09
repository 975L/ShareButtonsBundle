# Changelog

## v4.11

- Deleted entity as not used anymore (09/10/2025)

## v4.10

- Replaced Symfony\Component\Routing\Annotation\Route by Symfony\Component\Routing\Attribute\Route (09/10/2025)

## v4.9

- Dropped support for Twitter/X (06/06/2025)
- Added support for Bluesky (06/06/2025)

## v4.8

- Removed "c975l/email-bundle from composer.json (25/04/2025)

## v4.7

- Removed use of`c975L/ServicesBundle` (09/03/2025)

## v4.6.2

- Corrected missing return (27/11/2024)

## v4.6.1

- Added redirect from POST call to GET route to avoid errors messages (26/11/2024)

## v4.6

- Added ->setMaxAge(3600) to controllers (15/09/2024)

## v4.5

- Suppressed spaceless filter as it's deprecated (12/09/2024)

## v4.4.1

- Changed DependencyInjection Extension (10/09/2024)

## v4.4

- Removed the inline onclick to avoid having inline js (11/03/2024))

## v4.3.3

- Added alt + title to icon's img (18/02/2024)

## v4.3.2

- Modified styles (13/02/2024)

## v4.3.1

- Added missing svgs (10/02/2024)

## v4.3

- Removed 'size' part of buttons to not depend on Bootstrap (10/02/2024)
- Included fontawesome icons to not have to load them (10/02/2024)
- Removed dropdown style (10/02/2024)
- Added circle and square styles (10/02/2024)

## v4.2

- Removed icons under 768px as tablet/smartphone have their own sharing system (01/02/2024)

## v4.1

- Added double urlencode to avoid problems with Apache servers (01/02/2024)
- Moved styles in css file to avoid W3C error (01/02/2024)
- Moved assets to public folder (01/02/2024)
- Finished removal of database recording (01/02/2024)

## v4.0

- Removed the save in the database (22/01/2024)

Upgrading from v3.x? **Check UPGRADE.md**

## v3.0.4

- Corrected call for templates folder (17/01/2024)

## v3.0.3

- Transformed routes to attributes (17/01/2024)

## v3.0.2

- Suppressed Tests folder (17/07/2024)

## v3.0.1

- Moved Tests folder under src (17/07/2024)

## v3.0

- Changed to new recomended bundle SF 7 structure (16/01/2024)

Upgrading from v2.x? **Check UPGRADE.md**

## v2.0.2

- Added TreeBuilder return type (29/05/2023)

## v2.0.1

- Added missing return type (06/04/2023)

## v2.0

- Changed compatibility to PHP 8 (25/07/2022)

Upgrading from v1.x? **Check UPGRADE.md**

## v1.7.1

- Added return type for Voter (24/07/2022)

## v1.7

- Changed composer versions constraints (24/07/2022)

## v1.6.3

- Corrected required versions in composer.json (11/10/2021)

## v1.6.2

- Corrected file path for sql file (08/10/2021)

## v1.6.1

- Replaced `kernel.root_dir` by `kernel.project_dir` (03/09/2021)

## v1.6

- Removed versions constraints in composer (03/09/2021)

## v1.5.3.1

- Added missing requirements for url (01/06/2021)

## v1.5.3

- Added condition to not have the name of the share twice in the url to avoid ssharing problems (01/06/2021)

## v1.5.2

- Added filter_var to validate url (03/12/2020)

## v1.5.1

- Cosmetic changes due to Codacy review (04/03/2020)
- Reduced Cyclomatic complexity (04/03/2020)

## v1.5

- Removed use of symplify/easy-coding-standard as abandonned (19/02/2020)

## v1.4

- Added dropdown button (09/09/2019)
- Added possibility to provide the url (09/09/2019)

## v1.3.1

- Added rel="nofollow" to button (20/08/2019)

## v1.3

- Added several networks (mentionned in README.md) (07/08/2019)
- Grouped share data in one method to ease maintenance (08/08/2019)
- Corrected returns types in ShareButtonsInterface (08/08/2019)
- Added possibility to call Twig extension with 'main' that provides main networks (08/08/2019)
- Moved color by share to ShareButtonsService (08/08/2019)
- Added posibility to display the label in the button (08/08/2019)

## v1.2.3.1

- Corrected wrong types (07/08/2019)

## v1.2.3

- Replaced __DIR__ with a clearer path (07/08/2019)

## v1.2.2

- Corrected path for saving SQL queries (07/08/2019)

## v1.2.1

- Added ellipse style (07/08/2019)
- Fixed the not same size for buttons (07/08/2019)

## v1.2

- Added core bundles files (06/08/2019)

## v1.1

- Modified composer.json and DependencyInjection (05/08/2019)

## v1.0.1

- Corrected `services.yml` (04/03/2018)
- Corrected `README.md` (04/03/2018)

## v1.0

- Creation of bundle (04/03/2018)