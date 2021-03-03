# SFP Backend Assessment

## Setup
1. Clone this repository to your local machine.
2. Create an empty repo on GitHub.
3. Run `git remote add github <YOUR GITHUB REPO URL>` in the project folder.
4. Then push the project to your new GitHub repo with `git push --mirror github`.
5. After completing the assessment be sure to push all your changes up to GitHub and send meeks@sfp.net the link to your repository.

## Directions
There are three PHP classes you need to create. All files and folders have been set up for you. Commit regularly so we can see your progress :D

| Class | Math |
|-|-|
| Scope | Create a class containing a method that will return the average of the values provided in the defined dataset whose accept field is `true`. |
| Example | `[{ value: 4, accept: false }, { value: 10, accept: true }, { value: 2, accept: true }]` the average of the data with `accept: true` is `6` |
| Filename | `src/Math.php` |
| Namespace | `Sfp` |
| Method | `public function execute()` |
| Use | `assets/tabular.csv` |
| Return | `type Double` the average of the values where accept is true with a precision of 10 decimal places |

| Class | Rotate |
|-|-|
| Scope | Create a class containing a method that will return an array that is the result of a left rotation of the provided dataset. A constructor should be used that accepts an argument for the rotation amount. values provided in the defined dataset. |
| Example | `[0, 1, 2, 3]` Rotated left 2 times becomes `[2, 3, 0, 1]` |
| Filename | `src/Rotate.php` |
| Namespace | `Sfp` |
| Method | `public function execute($amount)` |
| Use | `assets/rotate.json` |
| Return | `type Array` |

| Class | Extend |
|-|-|
| Scope | Create a class that extends the Sfp\Rotate class. It should contain a method that will return the last value of the extended classes execute() method. |
| Example | The last value to be returned from `[2, 3, 0, 1]` is `1` |
| Filename | `src/Extend.php` |
| Namespace | `Sfp` |
| Method | `public function execute()` |
| Return | `type String` the last value of the result Rotate classes execute() method |

## To test
To test your code you may use a index.php file and run the methods using a web server or you can run the code in the CLI. Instructions for testing your code in the command line are below:

In your project root run `php -r "require 'src/<FILENAME>.php'; echo execute();"`
