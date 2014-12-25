# Advanced Custom Fields: Tooltips

Change the display of the ACF instructions. The ACF-Tooltips plugin hides the instructions, adds a help symbol to the label of the fields and generate a tooltip of the instuction.

![advanced custom field column field in tabs](http://www.dreihochzwo.de/download/acf-tooltip2.jpg)

**This plugin needs the installation/activation of Advanced Custom Fields V4 or V5**

### Installation

This add-on can be treated as both a WP plugin and a theme include.

**Install as Plugin**

1. Copy the 'acf-tootip' folder into your plugins folder
2. Activate the plugin via the Plugins admin page

**Include within theme**

1.	Copy the 'acf-tootip' folder into your theme folder (can use sub folders). You can place the folder anywhere inside the 'wp-content' directory
2.	Edit your functions.php file and add the code below (Make sure the path is correct to include the acf-date_time_picker.php file)

```php
include_once('acf-tooltip/acf-tooltip.php');
```

### Compatibility

This ACF field type is compatible with:
* ACF 4
* ACF 5


### Changelog
**1.0.0**
* First release
