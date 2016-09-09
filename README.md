# ACF Section Styles Field

Adds a field to configure styles including padding, border, margin, and backgrounds.

![ACF PRO Section Styles Field Screenshot](/assets/images/acf-pro-section-styles-field.png?raw=true)

### Description

Allows you to set defaults for margin, border size, border color, border style, padding, background color, and background style on creation. Creates controls to configure:

* Margin
* Border Size
* Border Style
* Border Color
* Padding
* Background Color
* Background Image
* Background Style (cover, contain, repeat, no-repeat, etc.)

### Usage

Using `get_field( 'your_field_name' )` will return an array of values:

```
Array
(
    [margin_top] => 10px
    [margin_right] => 10px
    [margin_bottom] => 10px
    [margin_left] => 10px
    [border_top] => 10px
    [border_right] => 10px
    [border_bottom] => 10px
    [border_left] => 10px
    [padding_top] => 10px
    [padding_right] => 10px
    [padding_bottom] => 10px
    [padding_left] => 10px
    [border_style] => solid
    [border_color] => #ffffff
    [background_color] => #ffffff
    [background_image] => Array
        (
            [ID] => 1
            [id] => 1
            [title] => my_image
            [filename] => my_image.jpg
            [url] => http://wpdev.local/wp-content/uploads/2016/02/my_image_1680x1050.jpg
            [alt] => 
            [author] => 1
            [description] => 
            [caption] => 
            [name] => my_image
            [date] => 2016-09-05 04:07:27
            [modified] => 2016-09-05 04:07:27
            [mime_type] => image/jpeg
            [type] => image
            [icon] => http://wpdev.local/wp-includes/images/media/default.png
            [width] => 1680
            [height] => 1050
            [sizes] => Array
                (
                    [thumbnail] => http://wpdev.local/wp-content/uploads/2016/02/my_image-150x150.jpg
                    [thumbnail-width] => 150
                    [thumbnail-height] => 150
                    [medium] => http://wpdev.local/wp-content/uploads/2016/02/my_image-300x188.jpg
                    [medium-width] => 300
                    [medium-height] => 188
                    [medium_large] => http://wpdev.local/wp-content/uploads/2016/02/my_image-768x480.jpg
                    [medium_large-width] => 660
                    [medium_large-height] => 413
                    [large] => http://wpdev.local/wp-content/uploads/2016/02/my_image-1024x640.jpg
                    [large-width] => 660
                    [large-height] => 413
                    [post-thumbnail] => http://wpdev.local/wp-content/uploads/2016/02/my_image-825x510.jpg
                    [post-thumbnail-width] => 825
                    [post-thumbnail-height] => 510
                )

        )
    [background_style] => cover
    [padding] => 10px 10px 10px 10px
    [margin] => 10px 10px 10px 10px
    [border_width] => 10px 10px 10px 10px
)
```

### Compatibility

This ACF field type is compatible with:
* ACF 5

### Installation

1. Copy the plugin folder into your `wp-content/plugins` folder
2. Activate the plugin via the plugins admin page
3. Create a new field via ACF and select the Section Styles type
4. Please refer to the description for more info regarding the field type settings

### Changelog
Please see `readme.txt` for changelog
