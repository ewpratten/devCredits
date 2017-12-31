# devCredits [![Build Status](https://travis-ci.org/Ewpratten/devCredits.svg?branch=master)](https://travis-ci.org/Ewpratten/devCredits) [![GitHub pull requests](https://img.shields.io/github/issues-pr/Ewpratten/devCredits.svg)]() [![GitHub issues](https://img.shields.io/github/issues/Ewpratten/devCredits.svg)]() [![GitHub closed pull requests](https://img.shields.io/github/issues-pr-closed/Ewpratten/devCredits.svg)]()
A simple way to make a credits page for any [devRant](https://devrant.com/) community projects.

### Note to contributors
To join the signal chat, email **ewpratten@tuta.io** with your phone number.
If you add any new PHP file, add the respective command to `.travis.yml` too:
```
php -l <path/file name>
```

## How to use
The entire site is link based. Start with the base link:
```
https://devcredits.herokuapp.com/?
```
then, add the details:
* Background color

  Code      | Color
  ----------|--------
  `color=1` | purple
  `color=2` | green
  `color=3` | blue
  `color=4` | red
  `color=5` | yellow
  `color=6` | orange
* Title
  ```
  title=<your title here>
  ```
* Subtext
  ```
  subtext=<add your subtext here, leave blank for none, use link below for formatting>
  ```
  Text to URL converter: https://meyerweb.com/eric/tools/dencoder/
* Usernames
  ```
  names=<usernames, comma separated, no spaces>
  ```

## Todo
- [X] allow configuration of background color from link
- [ ] add profile images to the page
- [ ] a collection "devRant community project" banners and embeds for your project site
- [X] embeddable buttons that link to credits page
- [X] better mobile version
- [ ] background images
- [ ] clean up unused files
- [ ] test if user exists before displaying name
- [ ] profile photo API?
- [X] customizable heart from link
- [X] add heart dropdown to link generator
- [ ] indicator for devRant++ members
