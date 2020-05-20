# Documentation

## Setting up Project from Git

#### Requirements

The minimum requirement by this project is php version: >= 5.6.30

#### PHP
* [PHP 5.6.30 and above](https://www.php.net/manual/en/install.php)

#### Composer
* [Composer and above](https://getcomposer.org/doc/00-intro.md)

#### Java 
* [Java 8 and above](https://www.oracle.com/java/technologies/javase-downloads.html) 

#### Clone repo
Run the following commands in your terminal

`git clone project`

`cd clone_project_path`

#### Install dependencies
Run the following command in your terminal

`composer install`

### Running the tests
 To open a command line window and run the commands below
 
`cd clone_project_path`

`java -Dwebdriver.chrome.driver=./chromedriver -jar selenium-server-standalone-3.141.59.jar` 

Open a new command line window and run the commands below

`cd clone_project_path`

`php vendor/bin/codecept run --steps`


