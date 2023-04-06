# Introduction
Our database models publicly traded companies, and would allow users to query relevant information about to make their own evaluations of companies of their interest. The information our database holds is related to how companies fit and perform in their respective markets, allowing users to analyze companies beyond the scope of the stock price.

## Getting started
On a server with oracle database preconfigured, create a directory _public\_html_. Place all .php, .html, and .css files in that folder.

It might be necesarry to modify permission:

1. chmod 711 ~ - This makes it so that people/the web server can read and change into your home directory.
2. chmod 711 ~/public_html - This makes it so that people/the web server can read and change into your public_html directory.
3. chmod 711 ~/public_html/filename.php  - specific file permission

.CSS-files and media files require 777 permission instead of 711. As they are in the folder _artifacts_, the entire folder needs 777 permission. Use the following commands:

1. chmod 777 ~/public_html/artifacts
2. chmod 777 ~/public_html/artifacts/filename.png

Current permissions for a folder can be viewed fro the command line with _ls -la ~/public\_html_

For this project implementation, the website can be viewed at https://www.students.cs.ubc.ca/~bengs/manage.php

## Notice
The code written for this assignment was inspired by and adapted from Tutorial 7 "PHP/ORACLE": 
https://canvas.ubc.ca/courses/112179/assignments/1445437?module_item_id=5255267

## Group Members
### d9u2a
Nafis Ahsan
### m6o6m
Manvinder Jawanda
### r8z9v
Joel Bengs