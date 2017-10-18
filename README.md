# MFGG powered by LumaSMS

LumaSMS is a new software being built for compatibility with Taloncrossing Site Managament System. It's being built specifically for Mario Fan Games Galaxy.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
An Apache server
PHP 5.4 or higher
MySQL
```

To get going quick, just install XAMPP.

### Installing

Download the files into your `/../xampp/htdocs/` directory.

Then, create a database named `mfgg`. The settings.php file is setup to connect to a db with username `root` and no password.

Now, run all of the SQL files, in this order:
* `mfgg.sql` (this one contains a basic TCSMS database structure)
* `mfgg_update.sql` (this one updates the TCSMS database tables with some necessary additions)
* THen everything in the `./hyliandev/sql/` directory (these create tables that are unique to LunaSMS)

Lastly, create a directory named `tcsms` in your parent directory. Inside that, create two directories: `file` and `thumbnail`. Finally, put numbered folders `1` through `6` in each. This folder is where content is being stored, as of right now. This will change.

TCSMS source code isn't available here because it isn't open-source.

## How does it work?

### Template

`template.php` contains everything before and after the page content

### Pages

Files under `./hyliandev/pages/` can be loaded by adding their path to your URL.

For example: to load `./hyliandev/pages/test.php`, you would add `/test` to your URL.

### Models

`model.php` contains a class called `Model`. It contains methods for creating, reading, updating, and deleting different database items. You should extend the `Model` class if you want to access a new database item.

There isn't a great deal of abstraction in the `Model` classes yet. Maybe this should be fixed.

### Themes

Themes aren't a thing yet. All theme elements are currently in `./hyliandev/theme/base/`.

### Views

A "view" is a template file you can include anywhere in the page. They can be included using the `view($file,$vars)` function.

The `$file` parameter is the path to the view you're trying to include from `./hyliandev/views/`, without the `.php` extension.

The `$vars` parameter is an associative array of variables you want to be local in scope to the view file.

### User

The `user.php` file contains a static class called `User`. You can get the currently logged in user as an object by calling `User::GetCurrentUser()`.

## Built With

* Raw PHP; no pre-existing framework
* `password.php` is a library I'm using for proper password hashing before PHP 5.5

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Authors

* **HylianDev** - *Project leader*

See also the list of [contributors](https://github.com/hyliandev/mfgg3/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Theme by Kritter
* Buttons by Mors
* Name by Yoshin
* Github made better by Kesha's advice
