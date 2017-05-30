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

git tag $version

./build.sh
