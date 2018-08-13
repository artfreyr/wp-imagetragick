# wp-imagetragick

A simple WordPress plugin used as an ImageTragick (CVE-2016–3714) proof of concept.

## Getting Started

These instructions will help you get a running copy of the plugin working on your WordPress instance. Additionally, newer versions of WordPress might conduct additional checks to files being uploaded. There is no guarantee that this version of the plugin will work fine with these versions. 

### Prerequisites

* WordPress 4.5.13
* Vulnerable version of ImageMagick ([6.9.2-10](https://sourceforge.net/projects/imagemagick/files/old-sources/6.x/6.9/))

### Installing

After setting up a desired WordPress and ImageMagick environment, the plugin can be installed using the .zip file located within the pluginfile directory.

## Using the plugin

### Usage

> Option 1

After successful plugin installation, a new entry for "WPImageTragick" will be available from the sidebar, and a vulnerable picture may be uploaded through this form.

> Option 2

Alternatively, the upload form can be embedded in a WordPress Post or Page using the shortcode:

```
[tragick_uploader]
```

### Upload location

Pictures uploaded through both these options will be saved within the following folder:

```
wp-content/uploads/useruploads
```

## Authors

* **Daniel Lim**
* **Nurul Asfilzah**
* **Frances Alexandra Renton**

## Additional resources

* [ImageTragick](https://imagetragick.com/)
