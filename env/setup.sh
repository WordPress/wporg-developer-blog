#!/bin/bash

wp theme activate wporg-developer-blog

wp rewrite structure '/%year%/%monthnum%/%postname%/'
wp rewrite flush
