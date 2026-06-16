# WooCommerce Filtered Archives Noindex

Automatically adds `noindex,follow` to filtered WooCommerce archive pages and helps prevent filter-generated URLs from being indexed by search engines.

## Description

WooCommerce stores often generate thousands of URL variations through filters such as attributes, price ranges, sorting options, brands, colors, and sizes.

Examples:

```text
/shop/?filter_color=black
/shop/?filter_brand=toyota
/product-category/shoes/?min_price=1000&max_price=5000
```

Most of these URLs provide little SEO value and may create duplicate or near-duplicate content.

This plugin automatically detects WooCommerce filter parameters and adds:

```html
<meta name="robots" content="noindex,follow">
```

to filtered archive pages while keeping the main shop, category, and tag pages indexable.

## Features

- Automatically detects WooCommerce filter URLs
- Adds `noindex,follow` to filtered archive pages
- Supports Shop, Product Category, and Product Tag archives
- Compatible with Yoast SEO
- Compatible with Rank Math
- Compatible with All in One SEO
- Uses the WordPress Robots API
- Ignores tracking parameters such as UTM, GCLID, and FBCLID
- Lightweight and configuration-free

## Supported Parameters

### Exact Parameters

```text
min_price
max_price
orderby
rating_filter
```

### Prefix-Based Parameters

```text
filter_
query_type_
```

Examples:

```text
?filter_color=black
?filter_brand=toyota
?query_type_color=or
```

## Requirements

- WordPress 6.0+
- WooCommerce 7.0+
- PHP 7.4+

## Changelog

### 1.0.0

- Initial release
- WooCommerce archive detection
- Filter URL detection
- Noindex,follow support
- Yoast SEO compatibility
- Rank Math compatibility
- All in One SEO compatibility

---

# فارسی

افزونه WooCommerce Filtered Archives Noindex به صورت خودکار صفحات آرشیو ووکامرس که دارای پارامترهای فیلتر هستند را با تگ `noindex,follow` علامت‌گذاری می‌کند تا از ایندکس شدن URLهای فیلتر شده جلوگیری شود.

### ویژگی‌ها

- شناسایی خودکار URLهای فیلتر شده ووکامرس
- اعمال noindex,follow روی صفحات فیلتر شده
- پشتیبانی از فروشگاه، دسته‌بندی و برچسب محصولات
- سازگار با Yoast SEO
- سازگار با Rank Math
- سازگار با All in One SEO
- عدم تاثیر روی پارامترهای تبلیغاتی مانند UTM و GCLID
- سبک و بدون نیاز به تنظیمات

### تغییرات

#### 1.0.0

- انتشار اولیه افزونه
- پشتیبانی از URLهای فیلتر شده ووکامرس
- سازگاری با افزونه‌های مطرح سئو

## Author

Amirreza Shayesteh Far  
https://amirrezaa.ir/
