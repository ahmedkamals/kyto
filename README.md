Prerequisites
==============
* **php7.1 + (dom) extensions**
* [**Composer**][1]

Installation
--------------

Please follow below steps for installation:

  * **Dependencies installation**

        composer install

### Check
    php src/kyto/Solution.php SIZE_NUMBER

SIZE_NUMBER possible values:
   * Small = 0
   * Medium = 1
   * Large =2

### Tests

    bin/phpunit --debug -c .

Enjoy!

[1]:  https://getcomposer.org/download/
