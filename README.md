# WP Plugin Base

This is opinionated template for new WordPress plugin.

## Features

1. Automatic versioning. Every commit will bump next minor version number. 
2. Automatic creation of plugin .zip file. Zip files are placed in **bulid/** folder after each commit.
3. Plugin class with some useful methods
4. Simple Template class

## Installation

Download this project (change *MY-PLUGIN-NAME* to the name of your plugin)
```
mkdir MY-PLUGIN-NAME
cd MY-PLUGIN-NAME
git clone git@github.com:vlazic/wp-plugin-base.git .
./init.sh

wp plugin activate MY-PLUGIN-NAME
```
