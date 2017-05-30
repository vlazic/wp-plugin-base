#!/bin/bash

# TODO: this works for single 
# TODO: branch http://stackoverflow.com/questions/9725531/show-commits-since-branch-creation

branch=$(git rev-parse --abbrev-ref HEAD)
version=$(git describe --tags | cut -f1 -d-)

major=$(echo $version | cut -d. -f1)
minor=$(echo $version | cut -d. -f2)
revision=$(echo $version | cut -d. -f3)

version=$major.$minor.$(($revision + 1))

if [[ "$branch" != "master" ]]; then
	version=$major.$minor.$(($revision + 1))-$branch
fi

sed -i -e "s/[0-9]\+\.[0-9]\+\.[0-9]\+/$version/g" REPLACE_PLUGIN_SLUG.php
git add REPLACE_PLUGIN_SLUG.php

# FIX: last commit is missing
# git for-each-ref --format="v%(refname:short) - %(authordate:short) - %(subject) %(body)" refs/tags | tac > Readme.md
# git add Readme.md

