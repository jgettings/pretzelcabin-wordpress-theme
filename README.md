# Pretzel Cabin Wordpress Theme

A custom theme for our wordpress blog. Loosely based off of "the columnist" theme and reimplemented with bootstrap elements.

## Usage

This is a custom theme that is being used for one specific blog. If you want to use it somewhere else, please feel free, but we might have
some assumptions about settings because this is not intended to be reused in different situations. I will try to document here these assumptions.

### Plugins


### Settings

* Permalinks are on




## Development

### Install
```
npm install
```


### Compiling SCSS

From the theme, directory
```
npm run sass
```

Or use the following to watch for changes
```
npm run sass-watch
```



### Building a zip

In order to easily add the theme to a wordpress site, you want to build a zip file to upload. There should be an up-to-date one committed
with each version update in case people want to grab it and use it somewhere else.

```
npm run build
```



### Placeholder Theme

In order to avoid problems when updating the theme on the live site, I've created a placeholder single page theme that will show when I
delete the old version and upload the new one. The ```npm run build``` step above will also build the zip for this and it is saved as ```placeholder.zip```


- copy images, css
- copy favicon.ico
- js fontawesome
- zip it up
