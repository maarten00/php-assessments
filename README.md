
# PHP Assessments

## How to submit your assignement
Please fork this repository on your github account when you are ready to start on your assignement. Create a folder with your github accountname like I did and create your answers in there. When you are finished please submit a pullrequest.

Please submit unit tests with your assignments to prove they are doing what they should do.

## 1. File Owners
Implement a groupByOwners function that:

Accepts an associative array containing the file owner name for each file name.
Returns an associative array containing an array of file names for each owner name, in any order.
For example, for associative array ["Input.txt" => "Randy", "Code.py" => "Stan", "Output.txt" => "Randy"] the groupByOwners function should return ["Randy" => ["Input.txt", "Output.txt"], "Stan" => ["Code.py"]].


```
<?php
class FileOwners
{
    public function groupByOwners($files)
    {
        // Add your code here
    }
}

$files = array
(
    "Input.txt" => "Randy",
    "Code.py" => "Stan",
    "Output.txt" => "Randy"
);
$fileOwners = new FileOwners;
var_dump($fileOwners->groupByOwners($files));
```


## 2. Palindrome
A palindrome is a word that reads the same backward or forward.

Write a function that checks if a given word is a palindrome. Character case should be ignored.

For example, isPalindrome("Deleveled") should return true as character case should be ignored, resulting in "deleveled", which is a palindrome since it reads the same backward and forward.

```
<?php
class Palindrome
{
    public function isPalindrome($word)
    {
        // Add your code here
    }
}

$palindrome = new Palindrome;
echo $palindrome->isPalindrome('Deleveled');
```

## 3. Thesaurus

A thesaurus contains words and synonyms for each word. Below is an example of a data structure that defines a thesaurus:

`array("buy" => array("purchase"), "big" => array("great", "large"))`

Implement the function getSynonyms, which accepts a word as a string and returns all synonyms for that word in JSON format, as in the example below.

For example, the call $thesaurus->getSynonyms("big") should return:
`{"word":"big","synonyms":["great", "large"]}`
while a call with a word that doesn't have synonyms, like $thesaurus->getSynonyms("agelast") should return:

`{"word":"agelast","synonyms":[]}`

## 4. Path

Write a function that provides change directory (cd) function for an abstract file system.

Notes:
* Root path is '/'.
* Path separator is '/'.
* Parent directory is addressable as '..'.
* Directory names consist only of English alphabet letters (A-Z and a-z).
* The function should support both relative and absolute paths.
* The function will not be passed any invalid paths.
* Do not use built-in path-related functions.

For example:
```
$path = new Path('/a/b/c/d');
$path->cd('../x')
echo $path->currentPath;
```
should display '/a/b/c/x'.

```
<?php
class Path
{
    public $currentPath;

    function __construct($path)
    {
        $this->currentPath = $path;
    }

    public function cd($newPath)
    {

    }
}

$path = new Path('/a/b/c/d');
$path->cd('../x');
echo $path->currentPath;
```
