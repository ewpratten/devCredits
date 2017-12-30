# devCredits [![Build Status](https://travis-ci.org/Ewpratten/devCredits.svg?branch=master)](https://travis-ci.org/Ewpratten/devCredits) [![GitHub pull requests](https://img.shields.io/github/issues-pr/Ewpratten/devCredits.svg)]() [![GitHub issues](https://img.shields.io/github/issues/Ewpratten/devCredits.svg)]() [![GitHub closed pull requests](https://img.shields.io/github/issues-pr-closed/Ewpratten/devCredits.svg)]()
A simple way to make a credits page for any [devRant](https://devrant.com/) community projects.
## Note to contributors
If you add any new php file, add the respective command to `.travis.yml`, too.
```
php -l <path/file name>
```
### How to use
The entire site is link based. <br>
First, start with the base link.
```
https://devcredits.herokuapp.com/?
```
then, add the details
```
background color:
color=1 - purple
color=2 - green
color=3 - blue
color=4 - red
color=5 - yellow
color=6 - orange

title=<your title here>

names=<usernames, comma seperated, no spaces>

subtext=<add your subtext here, leave blank for none, use link below for formatting>
```
text to url converter: https://meyerweb.com/eric/tools/dencoder/
### Todo
- [X] allow configuration of background color from link
- [ ] add profile images to the page
- [ ] a collection "devRant community project" banners and embeds for your project site
- [ ] embedable buttons that link to credits page
- [X] better mobile version
- [ ] background images
- [ ] clean up unused files
- [ ] test if user exsists before displaying name
- [ ] profile photo api?
- [X] customizable heart from link
- [X] add heart dropdown to link generator
