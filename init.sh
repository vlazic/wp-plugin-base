#!/bin/bash

read -p "Enter plugin name with spaces if it has multiple words: " PLUGIN_NAME ; echo
read -p "Enter description of plugin: " PLUGIN_DESCRIPTION ; echo

PLUGIN_NAMESPACE_FROM_NAME=$( echo $PLUGIN_NAME | sed -e 's/$/ /' -e 's/\([^ ]\)[^ ]* /\1/g' -e 's/^ *//' | tr a-z A-Z )
read -p "Enter plugin namespace ($PLUGIN_NAMESPACE_FROM_NAME): " PLUGIN_NAMESPACE ; echo
PLUGIN_NAMESPACE=${PLUGIN_NAMESPACE:-$PLUGIN_NAMESPACE_FROM_NAME}

PLUGIN_SLUG_FROM_NAME=$( echo $PLUGIN_NAME | tr A-Z a-z | tr ' ' - )
read -p "Enter plugin namespace ($PLUGIN_SLUG_FROM_NAME): " PLUGIN_SLUG ; echo
PLUGIN_SLUG=${PLUGIN_SLUG:-$PLUGIN_SLUG_FROM_NAME}

read -p "Enter plugin URI: " PLUGIN_URI ; echo

PLUGIN_AUTHOR_GIT=$( git config --global user.name )
read -p "Enter your name ($PLUGIN_AUTHOR_GIT): " PLUGIN_AUTHOR ; echo
PLUGIN_AUTHOR=${PLUGIN_AUTHOR:-$PLUGIN_AUTHOR_GIT}

read -p "Enter your site or github, linkedin page: " PLUGIN_AUTHOR_URI ; echo

echo 'Plugin Name:' $PLUGIN_NAME
echo 'Plugin Description:' $PLUGIN_DESCRIPTION
echo 'Plugin Namespace:' $PLUGIN_NAMESPACE
echo 'Plugin Slug:' $PLUGIN_SLUG
echo 'Plugin URI:' $PLUGIN_URI
echo 'Plugin Author:' $PLUGIN_AUTHOR
echo 'Plugin Author URI:' $PLUGIN_AUTHOR_URI

echo -e '\n\n'
read -p "Do you confirm this plugin informations?' (y/n) " -n 1 -r
if ! [[ $REPLY =~ ^(Y|y| ) ]] && ! [ -z $REPLY ]
then
    echo -e '\nScript aborted. Run it again if you change your mind.'
    exit 1
fi

# escape variables for sed
PLUGIN_URI=$(echo $PLUGIN_URI | sed -e 's/[\/&]/\\&/g' )
PLUGIN_AUTHOR_URI=$(echo $PLUGIN_AUTHOR_URI | sed -e 's/[\/&]/\\&/g' )

find . -type f -exec sed -i \
	-e "s/REPLACE_PLUGIN_NAMESPACE/$PLUGIN_NAMESPACE/g" \
	-e "s/REPLACE_PLUGIN_NAME/$PLUGIN_NAME/g" \
	-e "s/REPLACE_PLUGIN_DESCRIPTION/$PLUGIN_DESCRIPTION/g" \
	-e "s/REPLACE_PLUGIN_SLUG/$PLUGIN_SLUG/g" \
	-e "s/REPLACE_PLUGIN_URI/$PLUGIN_URI/g" \
	-e "s/REPLACE_PLUGIN_AUTHOR_URI/$PLUGIN_AUTHOR_URI/g" \
	-e "s/REPLACE_PLUGIN_AUTHOR/$PLUGIN_AUTHOR/g" {} +


mv wp-plugin-base.php $PLUGIN_SLUG.php

mkdir -p build

rm -fr README.md
# TODO: create some default readme file

git init
git add .
git reset post-commit.sh pre-commit.sh
git commit -m "First commit"
git tag 1.0.0

mv post-commit.sh .git/hooks/post-commit
mv pre-commit.sh .git/hooks/pre-commit
