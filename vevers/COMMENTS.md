# Comments on PHP Assessments 

### Installing PHPUnit

Please run `composer install` inside the `vevers` folder to install phpunit.

### Running unit tests

    ./vendor/bin/phpunit tests
    
    or 
    
    ./vendor/bin/phpunit --testdox tests

## 1. File Owners

* Depending on the project and context, we might also consider normalizing the ownerName strings. (trim, to lower case, check for empty values, etc.).

## 2. Palindrome

* Assumed empty strings a strings with a length of 1 (a single character) aren't words and should return false. 
* Added two different implementations and did a quick performance comparison (`palindrome-performance.php`). 

        # Running tests for a valid palindrome (100000 iterations) 
        Vevers\DijAssessments\Palindrome: 0.010311841964722ms 
        Vevers\DijAssessments\PalindromeAdvanced: 0.051285028457642ms 
        
        # Running tests for a non-palindrome (100000 iterations) 
        Vevers\DijAssessments\Palindrome: 0.01091194152832ms 
        Vevers\DijAssessments\PalindromeAdvanced: 0.015290021896362ms 

* The most basic version `Vevers\DijAssessments\Palindrome` seems to be the most readable ánd quickest. 

## 3. Thesaurus

* Would prefer to deviate from the assignment by using two methods: `getSynonyms()` and `getSynonymsAsJson()`. This would also allow us to split the unit tests into two parts: are the correct synonyms returned, and does json-conversion work properly.

## 4. Path

* Assumed only valid paths are used as described in assignment. Has very limited guards for invalid paths.
