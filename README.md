# Wheelbase Widget WordPress Plugin

WordPress plugin that embeds the [Wheelbase](https://www.wheelbasepro.com) rental storefront on any WordPress page or post using a simple shortcode. See the full [documentation](https://wheelbase-docs.wheelbasepro.com/embedded/wordpress).

## Installation

1. Download or build `wheelbase-widget.zip`
2. In WordPress admin, go to **Plugins > Add New > Upload Plugin**
3. Upload `wheelbase-widget.zip` and click **Install Now**
4. Click **Activate**

## Usage

Add the `[wheelbase-widget]` shortcode to any page or post. The only required attribute is `dealer-id`:

```
[wheelbase-widget dealer-id="24019"]
```

### Available Attributes

| Attribute                | Type    | Required | Description                                           |
| ------------------------ | ------- | -------- | ----------------------------------------------------- |
| `dealer-id`              | number  | Yes      | Your Wheelbase dealer ID                              |
| `store-type`             | string  | No       | Type of rentals: `rv` or `auto` (defaults to `rv`)    |
| `background-color`       | string  | No       | Custom background color (e.g. `#f8f9fa`)              |
| `primary-color`          | string  | No       | Primary theme color                                   |
| `secondary-color`        | string  | No       | Secondary theme color                                 |
| `text-color`             | string  | No       | Text color                                            |
| `text-secondary-color`   | string  | No       | Secondary text color                                  |
| `surface-color`          | string  | No       | Surface/card color                                    |
| `hide-hero`              | boolean | No       | Hide the hero section (`true`/`false`)                |
| `hide-filters`           | boolean | No       | Hide search filters (`true`/`false`)                  |
| `hide-calendar-view`     | boolean | No       | Hide calendar/list view toggle (`true`/`false`)       |
| `show-reviews`           | boolean | No       | Show reviews in listing header (`true`/`false`)       |
| `locale`                 | string  | No       | Language locale (e.g. `en-us`, `fr-fr`, `de-de`)      |
| `env`                    | string  | No       | Environment: `production` or `staging`                |
| `visible-filters`        | string  | No       | Comma-separated list of top-level filters to show     |
| `visible-nested-filters` | string  | No       | Comma-separated list of modal filter sections to show |
| `segment-token`          | string  | No       | Segment analytics token                               |
| `google-tag-manager-id`  | string  | No       | Google Tag Manager container ID                       |
| `google-analytics-id`    | string  | No       | Google Analytics measurement ID                       |

### Examples

Basic usage:

```
[wheelbase-widget dealer-id="24019"]
```

With custom colors and hidden hero:

```
[wheelbase-widget dealer-id="24019" background-color="#f8f9fa" primary-color="#2563eb" hide-hero="true"]
```

French locale:

```
[wheelbase-widget dealer-id="24019" locale="fr-fr"]
```

Auto rentals:

```
[wheelbase-widget dealer-id="24019" store-type="auto"]
```

## How It Works

The plugin:

1. Loads the Wheelbase Widget script (`wheelbase-widget.js`) from CDN as an ES module
2. Converts `[wheelbase-widget]` shortcode attributes into a `<wheelbase-store>` web component
3. The web component renders the full rental storefront with shadow DOM for CSS isolation

### CDN Source

The widget script is loaded from:

```
https://d2toxav8qvoos4.cloudfront.net/latest/wheelbase-widget.js
```

This always points to the latest production release.

### Building the ZIP

Run the build script to create/update the installable ZIP:

```bash
./build.sh
```

## License

GPL2
