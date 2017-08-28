#!/bin/bash

plugin_name="REPLACE_PLUGIN_SLUG"

script_dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
branch=$(git rev-parse --abbrev-ref HEAD)
version=$(git describe --tags | cut -f1 -d-)
name="$plugin_name-$version"
tmp_dir="/tmp/$plugin_name/$name"


mkdir -p $tmp_dir
rsync -a * $tmp_dir

cd $tmp_dir

rm -fr vendor

composer update -o --no-dev

rm -fr \
	build \
	build.sh \
	init.sh \
	composer.json \
	composer.lock \
	oracle.sqlite \
	post-commit.sh \
	pre-commit.sh

zip -r "$script_dir/build/$name.zip" .

cd -

rm -fr $tmp_dir
