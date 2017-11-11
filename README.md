#WP Plugin Base

This is recommended template for new WordPress plugin.

##Features

1. Automatic versioning. Every commit will bump next minor version number. 
2. Automatic creation of plugin .zip file. Zip files are placed in **bulid/** folder after each commit.
3. Plugin Class with some useful methods
4. Template Class

##Installation

Download this project (change *MY-PLUGIN-NAME* to the name of your plugin)
```
mkdir MY-PLUGIN-NAME
cd MY-PLUGIN-NAME
git archive --format=tar --remote=git@bitbucket.org:webzadruga/wp-plugin-base.git HEAD | tar xf -
./init.sh

composer update
wp plugin activate MY-PLUGIN-NAME
```
