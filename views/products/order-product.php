<!DOCTYPE html>
<html lang="en" data-astro-cid-sckkx6r4>

<head>
    <?php require 'public/includes/header.inc.php'  ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />

    <?php

        $imageLink = "https://{$_SERVER['SERVER_NAME']}/{$this->data['image']}";
        $sizes = @(getimagesize($this->data['image']));
        $canonical = "https://{$_SERVER['SERVER_NAME']}/products/{$this->data['slug']}";
 
    ?>
    <meta property='author' content='<?= $this->_company['c_name'] ?>'>
    <meta name='description' content="<?= $this->data['overview'] ?>">
    <meta property='og:description' content="<?= $this->data['overview'] ?>">
    <meta property='og:image' content='<?= $imageLink ?>'>
    <meta property='og:image:width' content="<?= $sizes[0] ?? 0 ?>">
    <meta property='og:image:height' content="<?= $sizes[1] ?? 0 ?>">
    <meta property='og:title' content="<?= $this->title ?>">
    <meta property='og:site_name' content='<?= $this->_company['c_name'] ?>'>
    <meta property='og:price' content='KES <?= $this->data['price'] ?>'>
    <meta property='og:url' content='<?= $canonical ?>'>
    <meta property='article:published_time' content='<?= $this->data['created_at'] ?>'>
    <link rel='canonical' href='<?= $canonical ?>' />
    <meta property="og:type" content="Product" />


    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Product",
            "name": "<?= $this->title ?>",
            "image": [
                "<?= $imageLink ?>"
            ],
            "description": "<?= $this->data['overview'] ?>",
            "sku": "WH-8234<?= $this->data['id'] ?>",
            "mpn": "92587<?= $this->data['id'] ?>",
            "brand": {
                "@type": "Brand",
                "name": "Generic"
            },
            "review": {
                "@type": "Review",
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "4.<?= rand(1, 9) ?>",
                    "bestRating": "5"
                },
                "author": {
                    "@type": "Person",
                    "name": "Jane B."
                }
            },
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.6",
                "reviewCount": "389"
            },
            "offers": {
                "@type": "Offer",
                "url": "<?= $canonical ?>",
                "priceCurrency": "KES",
                "price": "<?= $this->data['price'] ?>",
                "priceValidUntil": "2030-12-31",
                "itemCondition": "https://schema.orgNewCondition",
                "availability": "https://schema.orgInStock",
                "seller": {
                    "@type": "Organization",
                    "name": "<?= $this->_company['c_name'] ?>"
                }
            },
            "sameAs": ["<?= $canonical ?>"]
        }
    </script>

    <style>
        /* cyrillic-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459WRhyyTh89ZNpQ.woff2') format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C8A, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459W1hyyTh89ZNpQ.woff2') format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459WZhyyTh89ZNpQ.woff2') format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459WdhyyTh89ZNpQ.woff2') format('woff2');
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2') format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* cyrillic-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459WRhyyTh89ZNpQ.woff2') format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C8A, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459W1hyyTh89ZNpQ.woff2') format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459WZhyyTh89ZNpQ.woff2') format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459WdhyyTh89ZNpQ.woff2') format('woff2');
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2') format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* cyrillic-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459WRhyyTh89ZNpQ.woff2') format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C8A, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459W1hyyTh89ZNpQ.woff2') format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459WZhyyTh89ZNpQ.woff2') format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459WdhyyTh89ZNpQ.woff2') format('woff2');
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2') format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* cursive */
        @font-face {
            font-family: 'Reenie Beanie';
            src: url('https://assets.simpleonlinepharmacy.co.uk/fonts/ReenieBeanie.woff2') format('woff2'),
                url('https://assets.simpleonlinepharmacy.co.uk/fonts/ReenieBeanie.woff') format('woff');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
    </style>

    <script>
        window.snowplow = window.snowplow || function() {
            (window.snowplow.q = window.snowplow.q || []).push(arguments);
        };
    </script>

    <style>
        :root {
            color-scheme: light;
            --ink: #121417;
            --muted: #4a4f57;
            --surface: #f7f4ef;
            --surface-tint: #f7f2ee;
            --accent: #1A3D7A;
            --accent-strong: #1A3D7A;
            --accent-surface-start: rgb(240, 253, 250);
            --accent-surface-end: rgb(239, 246, 255);
            --accent-surface-blue-start: #eaf2ff;
            --accent-surface-blue-end: #d9e8ff;
            --hero-surface-gradient: linear-gradient(135deg, #D2E1F9 0%, #F2F6FD 40%, #FFFFFF 100%);
            --media-surface-gradient: #f7f2ee;
            --accent-shadow: rgba(15, 118, 110, .14);
            --accent-quiet: #a6d1c7;
            --accent-gradient: linear-gradient(135deg, #0a1f44, #1d5cff);
            --cta-primary: #1a3d7a;
            --card-border: 1px solid var(--edge);
            --cta-radius: 16px;
            --page-pad: min(8vw, 110px);
            --edge: #e1d8cc;
            --announcement-bg: #091E43;
            --announcement-text: #F3C3C6;
            --header-padding-y: 12px;
            --header-height: 61px;
            --hero-font: "Montserrat", "Avenir Next", "Avenir", "Segoe UI", "Roboto", "Helvetica Neue", Arial, sans-serif;
            --body-font: "Montserrat", "Avenir Next", "Avenir", "Segoe UI", "Roboto", "Helvetica Neue", Arial, sans-serif
        }

        * {
            box-sizing: border-box
        }

        html {
            font-family: var(--body-font);
            background: #fff;
            color: var(--ink);
            font-weight: 400;
            overflow-x: hidden;
            width: 100%;
            scroll-behavior: smooth;
            scrollbar-gutter: stable
        }

        body {
            margin: 0;
            min-height: 100%;
            overflow-x: hidden;
            width: 100%
        }

        a {
            color: inherit
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: var(--cta-primary);
            color: #fff;
            padding: 1rem 2rem;
            border-radius: var(--cta-radius);
            font-weight: 600;
            font-size: 1.125rem;
            text-decoration: none;
            transition: box-shadow .15s ease
        }

        .cta-button:hover {
            box-shadow: 0 20px 25px -5px #0000001a, 0 8px 10px -6px #0000001a
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        button,
        summary,
        input,
        textarea {
            font-family: var(--body-font)
        }

        main [data-component]:not([data-heading-tone=light]) h1 {
            color: var(--accent-strong);
            font-weight: 500;
            letter-spacing: -.035em;
            line-height: 1.2
        }

        main [data-component]:not([data-component=hero]):not([data-heading-tone=light]) h2 {
            color: var(--accent-strong);
            font-size: clamp(28px, 3.5vw, 46px);
            font-weight: 500;
            letter-spacing: -.035em;
            line-height: 1.2
        }

        .announcement-bar[data-astro-cid-3isblsjf] {
            background-color: var(--announcement-bg, #091E43);
            color: var(--announcement-text, #F3C3C6);
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            font-size: 13px;
            font-weight: 500;
            position: relative;
            z-index: 20
        }

        .announcement-bar__static[data-astro-cid-3isblsjf] {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 var(--page-pad)
        }

        .announcement-bar__carousel[data-astro-cid-3isblsjf] {
            display: none
        }

        .announcement-bar__link[data-astro-cid-3isblsjf] {
            color: inherit;
            text-decoration: none;
            white-space: nowrap
        }

        .announcement-bar__link[data-astro-cid-3isblsjf]:hover {
            text-decoration: underline
        }

        .announcement-bar__divider[data-astro-cid-3isblsjf] {
            opacity: .5
        }

        @media(max-width:600px) {
            .announcement-bar__static[data-astro-cid-3isblsjf] {
                display: none
            }

            .announcement-bar__carousel[data-astro-cid-3isblsjf] {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 100%;
                position: relative
            }

            .announcement-bar__slide[data-astro-cid-3isblsjf] {
                position: absolute;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                opacity: 0;
                transform: translateY(8px);
                transition: opacity .4s ease, transform .4s ease;
                pointer-events: none
            }

            .announcement-bar__slide--active[data-astro-cid-3isblsjf] {
                opacity: 1;
                transform: translateY(0);
                pointer-events: auto
            }
        }

        .header[data-astro-cid-wimnwge2] {
            --header-gutter: max(var(--page-pad), calc((100% - 1200px)/2));
            position: relative;
            z-index: 10;
            background: transparent;
            border-bottom: 1px solid rgba(17, 24, 39, .08);
            width: 100%;
            max-width: 100%;
            overflow: visible;
            box-sizing: border-box
        }

        .header__inner[data-astro-cid-wimnwge2] {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            padding: var(--header-padding-y, 12px) var(--header-gutter);
            width: 100%;
            max-width: 100%;
            box-sizing: border-box
        }

        .hidden[data-astro-cid-wimnwge2] {
            display: none
        }

        .header__logo[data-astro-cid-wimnwge2] img[data-astro-cid-wimnwge2] {
            display: block;
            height: 32px;
            width: auto;
            max-width: 100%;
            filter: var(--header-logo-filter, brightness(0) saturate(100%) invert(11%) sepia(37%) saturate(4873%) hue-rotate(197deg) brightness(95%) contrast(96%))
        }

        .header__logo[data-astro-cid-wimnwge2] {
            min-width: 0;
            flex: 0 0 auto
        }

        @media(min-width:700px) {
            .header__logo[data-astro-cid-wimnwge2] img[data-astro-cid-wimnwge2] {
                height: 36px
            }
        }

        @media(min-width:700px)and (max-width:1100px) {
            .header__logo[data-astro-cid-wimnwge2] img[data-astro-cid-wimnwge2] {
                height: 32px
            }
        }

        @media(min-width:700px)and (max-width:1000px) {
            .header__logo[data-astro-cid-wimnwge2] img[data-astro-cid-wimnwge2] {
                height: 28px
            }
        }

        .header__nav[data-astro-cid-wimnwge2] {
            position: absolute;
            right: var(--header-gutter);
            top: calc(100% + 10px);
            display: grid;
            gap: 12px;
            font-size: 14px;
            color: var(--muted);
            font-weight: 500;
            background: #fff;
            border: 1px solid rgba(17, 24, 39, .08);
            border-radius: 16px;
            padding: 12px;
            box-shadow: 0 18px 32px #0f172a26;
            min-width: 220px;
            z-index: 20
        }

        .header__nav[data-astro-cid-wimnwge2].hidden {
            display: none
        }

        .header__nav-list[data-astro-cid-wimnwge2] {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 6px
        }

        .header__nav-item[data-astro-cid-wimnwge2] {
            position: relative;
            width: 100%;
            padding-left: 0
        }

        .header__nav-link[data-astro-cid-wimnwge2] {
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            gap: 6px;
            text-decoration: none;
            color: #0a1f44;
            transition: color .2s ease, background .2s ease;
            padding: 8px 10px;
            border-radius: 10px;
            width: 100%;
            text-align: left
        }

        .header__nav-link--trigger[data-astro-cid-wimnwge2] {
            background: transparent;
            border: none;
            cursor: pointer;
            font: inherit
        }

        .header__nav-link[data-astro-cid-wimnwge2]:hover {
            background: #1118270d;
            color: var(--ink)
        }

        .header__caret[data-astro-cid-wimnwge2] {
            width: 14px;
            height: 14px;
            transition: transform .2s ease
        }

        .header__dropdown[data-astro-cid-wimnwge2][open]>button[data-astro-cid-wimnwge2]>.header__caret[data-astro-cid-wimnwge2] {
            transform: rotate(180deg)
        }

        .header__dropdown-items[data-astro-cid-wimnwge2] {
            position: fixed;
            left: 0;
            top: calc(var(--header-height, 64px) + 0px);
            width: 100vw;
            min-width: 100vw;
            transform: none;
            z-index: 40
        }

        .header__dropdown-items[data-astro-cid-wimnwge2].hidden {
            display: none
        }

        .header__dropdown-panel[data-astro-cid-wimnwge2] {
            background: #fff;
            border-top: 1px solid rgba(17, 24, 39, .08);
            border-bottom: 1px solid rgba(17, 24, 39, .08);
            border-left: none;
            border-right: none;
            border-radius: 0;
            padding: 0 var(--header-gutter);
            box-shadow: none;
            display: grid;
            gap: 16px;
            max-width: none;
            margin: 0;
            width: 100%;
            box-sizing: border-box
        }

        .header__dropdown-content[data-astro-cid-wimnwge2] {
            max-width: 1200px;
            margin: 0 auto;
            padding: 22px 0;
            width: 100%;
            box-sizing: border-box
        }

        .header__dropdown-two-pane[data-astro-cid-wimnwge2] {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 32px;
            align-items: start
        }

        .header__dropdown-pane--left[data-astro-cid-wimnwge2] {
            border-right: 1px solid rgba(17, 24, 39, .08);
            padding-right: 18px
        }

        .header__dropdown-left-list[data-astro-cid-wimnwge2] {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 6px
        }

        .header__dropdown-left-item[data-astro-cid-wimnwge2] {
            width: 100%;
            text-align: left;
            background: transparent;
            border: none;
            padding: 8px 10px;
            border-radius: 10px;
            font: inherit;
            color: var(--ink);
            cursor: pointer;
            transition: background .2s ease, color .2s ease
        }

        .header__dropdown-left-item[data-astro-cid-wimnwge2].is-active {
            background: #1118270f;
            color: var(--ink);
            font-weight: 600
        }

        .header__dropdown-panel-content[data-astro-cid-wimnwge2] {
            display: none
        }

        .header__dropdown-panel-content[data-astro-cid-wimnwge2].is-active,
        .header__desktop-content[data-astro-cid-wimnwge2] {
            display: block
        }

        .header__mobile-group-accordion[data-astro-cid-wimnwge2] {
            display: none
        }

        .header__dropdown-group[data-astro-cid-wimnwge2] {
            display: grid;
            gap: 10px
        }

        .header__dropdown-group-link[data-astro-cid-wimnwge2],
        .header__dropdown-group-label[data-astro-cid-wimnwge2] {
            font-weight: 500;
            font-size: 14px;
            color: #0a1f44
        }

        .header__dropdown-group-link--desktop[data-astro-cid-wimnwge2],
        .header__dropdown-group-label--desktop[data-astro-cid-wimnwge2] {
            display: inline-flex
        }

        .header__dropdown-group-link--mobile[data-astro-cid-wimnwge2],
        .header__dropdown-group-label--mobile[data-astro-cid-wimnwge2] {
            display: none
        }

        .header__dropdown-group-link[data-astro-cid-wimnwge2] {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px
        }

        .header__dropdown-group-link[data-astro-cid-wimnwge2]:hover {
            text-decoration: underline
        }

        .header__dropdown[data-astro-cid-wimnwge2] {
            padding-inline-start: 0;
            margin: 0
        }

        .header__dropdown-children[data-astro-cid-wimnwge2] {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 24px;
            margin-top: 6px;
            align-items: start
        }

        .header__dropdown-section[data-astro-cid-wimnwge2] {
            display: grid;
            gap: 8px
        }

        .header__dropdown-section-title[data-astro-cid-wimnwge2] {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #6b7280;
            margin: 0
        }

        .header__dropdown-section--level-1[data-astro-cid-wimnwge2] {
            margin-top: 8px
        }

        .header__dropdown-left-item--link[data-astro-cid-wimnwge2] {
            text-decoration: none;
            color: var(--ink);
            display: block
        }

        .header__dropdown-section-list[data-astro-cid-wimnwge2] {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 6px
        }

        .header__dropdown-section-link[data-astro-cid-wimnwge2] {
            text-decoration: none;
            color: #0a1f44;
            font-size: 14px;
            font-weight: 500
        }

        .header__dropdown-section-link[data-astro-cid-wimnwge2]:hover {
            color: var(--ink);
            text-decoration: underline
        }

        .header__dropdown-section-list--desktop[data-astro-cid-wimnwge2] {
            display: block
        }

        .header__mobile-subgroup[data-astro-cid-wimnwge2] {
            display: none
        }

        .header__mobile-subgroup-toggle[data-astro-cid-wimnwge2] {
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            padding: 8px 0;
            cursor: pointer;
            font: inherit;
            color: var(--ink)
        }

        .header__mobile-subgroup-toggle[data-astro-cid-wimnwge2]::-webkit-details-marker {
            display: none
        }

        .header__mobile-subgroup[data-astro-cid-wimnwge2][open] .header__caret[data-astro-cid-wimnwge2] {
            transform: rotate(180deg)
        }

        .header__dropdown-cta[data-astro-cid-wimnwge2] {
            text-decoration: none;
            color: var(--ink);
            font-weight: 600;
            font-size: 13px
        }

        .header__dropdown-cta[data-astro-cid-wimnwge2]:hover {
            text-decoration: underline
        }

        .header__dropdown-group-cta-container[data-astro-cid-wimnwge2] {
            display: flex;
            justify-content: flex-end;
            margin-top: 24px;
            width: 100%
        }

        .header__dropdown-group-cta[data-astro-cid-wimnwge2] {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            color: #1a3d7a;
            font-weight: 500;
            font-size: 13px;
            text-decoration: none;
            transition: background-color .2s ease, border-color .2s ease
        }

        .header__dropdown-group-cta[data-astro-cid-wimnwge2]:hover {
            background-color: #f8fafc;
            border-color: #94a3b8
        }

        .header__dropdown-group-cta-arrow[data-astro-cid-wimnwge2] {
            width: 14px;
            height: 14px
        }

        .header__actions[data-astro-cid-wimnwge2] {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            min-width: 0;
            flex: 0 1 auto;
            flex-wrap: wrap;
            justify-content: flex-end;
            max-width: 100%
        }

        .header__icon[data-astro-cid-wimnwge2] {
            display: grid;
            place-items: center;
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            border: none;
            background: transparent;
            color: #0a1f44;
            cursor: pointer;
            transition: background .2s ease, color .2s ease
        }

        .header__support[data-astro-cid-wimnwge2] {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            padding: 8px 10px;
            border-radius: 12px;
            background: transparent;
            color: #0a1f44;
            font-weight: inherit;
            font-size: 14px;
            text-decoration: none;
            transition: background .2s ease, color .2s ease
        }

        .header__support[data-astro-cid-wimnwge2]:hover,
        .header__icon[data-astro-cid-wimnwge2]:hover {
            background: #1118270f;
            color: var(--ink)
        }

        .header__icon[data-astro-cid-wimnwge2] svg[data-astro-cid-wimnwge2] {
            width: 20px;
            height: 20px
        }

        .header__basket-count[data-astro-cid-wimnwge2] {
            position: absolute;
            top: 2px;
            right: 2px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 18px;
            height: 18px;
            padding: 0 5px;
            border-radius: 999px;
            background: #dc2626;
            color: #fff;
            border: 2px solid #fff;
            font-size: .6875rem;
            font-weight: 800;
            line-height: 1;
            box-sizing: border-box
        }

        .header__basket-count[data-astro-cid-wimnwge2][hidden] {
            display: none
        }

        .header__menu-toggle[data-astro-cid-wimnwge2] {
            width: 24px;
            height: 24px;
            color: inherit
        }

        #astronav-menu {
            display: block;
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background-color: #f3f4f6;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23111827' stroke-width='2' stroke-linecap='round'%3E%3Cpath d='M4 7h16M4 12h16M4 17h16'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 24px 24px;
            border: none;
            padding: 0;
            cursor: pointer;
            transition: background-color .2s ease;
            font-size: 0;
            color: transparent;
            overflow: hidden
        }

        #astronav-menu:hover {
            background-color: #e5e7eb
        }

        #astronav-menu * {
            display: none !important
        }

        #astronav-menu[aria-expanded=true] {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23111827' stroke-width='2' stroke-linecap='round'%3E%3Cpath d='M6 6l12 12M18 6l-12 12'/%3E%3C/svg%3E")
        }

        @media(max-width:1030px) {

            .header__support[data-astro-cid-wimnwge2],
            .header__icon[data-astro-cid-wimnwge2] {
                display: none
            }

            .header__icon--basket[data-astro-cid-wimnwge2] {
                display: grid
            }

            .header__nav[data-astro-cid-wimnwge2] {
                text-align: left
            }

            .header__nav-list[data-astro-cid-wimnwge2] {
                justify-items: stretch
            }

            .header__nav-link[data-astro-cid-wimnwge2] {
                justify-content: space-between;
                text-align: left
            }

            .header__dropdown-items[data-astro-cid-wimnwge2] {
                position: static;
                left: auto;
                transform: none;
                min-width: 100%;
                width: 100%
            }

            .header__dropdown-panel[data-astro-cid-wimnwge2] {
                box-shadow: none;
                border: none;
                padding: 0
            }

            .header__dropdown-content[data-astro-cid-wimnwge2] {
                padding: 8px 10px 0
            }

            .header__dropdown-group-label[data-astro-cid-wimnwge2],
            .header__dropdown-group-link[data-astro-cid-wimnwge2] {
                padding-left: 5px
            }

            .header__dropdown-divider[data-astro-cid-wimnwge2] {
                border: none;
                border-top: 1px solid rgba(17, 24, 39, .08);
                margin: 8px 0 4px;
                width: 100%
            }

            .header__dropdown-two-pane[data-astro-cid-wimnwge2] {
                grid-template-columns: 1fr;
                gap: 16px
            }

            .header__dropdown-pane--left[data-astro-cid-wimnwge2] {
                border-right: none;
                padding-right: 0;
                display: none
            }

            .header__dropdown-panel-content[data-astro-cid-wimnwge2] {
                display: block
            }

            .header__dropdown-section-list--desktop[data-astro-cid-wimnwge2],
            .header__dropdown-group-link--desktop[data-astro-cid-wimnwge2],
            .header__dropdown-group-label--desktop[data-astro-cid-wimnwge2] {
                display: none
            }

            .header__dropdown-group-link--mobile[data-astro-cid-wimnwge2],
            .header__dropdown-group-label--mobile[data-astro-cid-wimnwge2] {
                display: block;
                padding: 8px 5px;
                text-decoration: none;
                color: var(--muted);
                font-size: 14px;
                font-weight: 500
            }

            .header__dropdown-group-link--mobile[data-astro-cid-wimnwge2]:hover {
                color: var(--ink)
            }

            .header__mobile-group-accordion[data-astro-cid-wimnwge2] {
                display: block;
                border-bottom: 1px solid rgba(17, 24, 39, .08);
                margin-bottom: 8px
            }

            .header__mobile-group-accordion[data-astro-cid-wimnwge2]>summary[data-astro-cid-wimnwge2] {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 8px;
                padding: 10px 5px;
                cursor: pointer;
                font-weight: 600;
                color: var(--ink);
                list-style: none
            }

            .header__mobile-group-accordion[data-astro-cid-wimnwge2]>summary[data-astro-cid-wimnwge2]::-webkit-details-marker {
                display: none
            }

            .header__mobile-group-accordion[data-astro-cid-wimnwge2][open]>summary[data-astro-cid-wimnwge2] .header__caret[data-astro-cid-wimnwge2] {
                transform: rotate(180deg)
            }

            .header__mobile-group-content[data-astro-cid-wimnwge2] {
                display: block;
                padding: 0 0 8px
            }

            .header__desktop-content[data-astro-cid-wimnwge2] {
                display: none
            }

            .header__mobile-links[data-astro-cid-wimnwge2] {
                list-style: none;
                margin: 0;
                padding: 0;
                display: grid;
                gap: 4px
            }

            .header__mobile-link[data-astro-cid-wimnwge2] {
                display: block;
                padding: 8px 5px;
                text-decoration: none;
                color: var(--muted);
                font-size: 14px;
                font-weight: 500
            }

            a[data-astro-cid-wimnwge2].header__mobile-link:hover {
                color: var(--ink);
                text-decoration: underline
            }

            .header__mobile-link--subcat[data-astro-cid-wimnwge2] {
                font-weight: 600;
                color: var(--ink)
            }

            .header__mobile-links--products[data-astro-cid-wimnwge2] {
                list-style: none;
                margin: 4px 0 8px;
                padding: 0 0 0 12px;
                display: grid;
                gap: 2px
            }

            .header__mobile-link--product[data-astro-cid-wimnwge2] {
                font-size: 13px
            }
        }

        @media(min-width:1031px) {
            #astronav-menu {
                display: none !important
            }

            .header__menu-toggle[data-astro-cid-wimnwge2] {
                display: none
            }

            .header__nav[data-astro-cid-wimnwge2],
            .header__nav[data-astro-cid-wimnwge2].hidden {
                position: static;
                display: block;
                background: transparent;
                border: none;
                box-shadow: none;
                padding: 0;
                min-width: auto;
                margin-left: 32px;
                flex: 1 1 auto
            }

            .header__nav-list[data-astro-cid-wimnwge2] {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 28px
            }

            .header__nav-item[data-astro-cid-wimnwge2] {
                width: auto
            }

            .header__nav-link[data-astro-cid-wimnwge2] {
                padding: 0;
                width: auto;
                justify-content: flex-start;
                white-space: nowrap
            }

            .header__nav-link[data-astro-cid-wimnwge2]:hover {
                background: transparent;
                text-decoration: underline
            }

            .header__dropdown-items[data-astro-cid-wimnwge2] {
                left: 0;
                transform: none;
                top: calc(var(--header-height, 64px) + 0px);
                width: 100vw;
                min-width: 100vw
            }

            .header__dropdown-panel[data-astro-cid-wimnwge2] {
                min-height: 320px
            }

            .header__nav-item--mobile-only[data-astro-cid-wimnwge2] {
                display: none
            }
        }

        @media(max-width:700px) {
            .header__inner[data-astro-cid-wimnwge2] {
                padding: 10px 16px;
                flex-wrap: wrap;
                gap: 12px
            }

            .header__logo[data-astro-cid-wimnwge2] img[data-astro-cid-wimnwge2] {
                height: 30px
            }

            .header__actions[data-astro-cid-wimnwge2] {
                flex-wrap: nowrap;
                gap: 6px
            }

            .header__nav[data-astro-cid-wimnwge2] {
                right: 16px;
                left: 16px
            }
        }

        .sticky-cta[data-astro-cid-wi5z2meu] {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            width: 100dvw;
            max-width: 100dvw;
            box-sizing: border-box;
            overflow-x: hidden;
            z-index: 150;
            background: #fff;
            border-top: 1px solid rgba(17, 24, 39, .08);
            box-shadow: 0 -4px 20px #00000014;
            padding: 12px 24px;
            transform: translateY(100%);
            opacity: 0;
            transition: transform .3s ease, opacity .3s ease
        }

        .sticky-cta[data-astro-cid-wi5z2meu].is-visible {
            transform: translateY(0);
            opacity: 1
        }

        .sticky-cta__inner[data-astro-cid-wi5z2meu] {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box
        }

        .sticky-cta__content[data-astro-cid-wi5z2meu] {
            position: relative
        }

        .sticky-cta__content--reserved[data-astro-cid-wi5z2meu] {
            display: grid
        }

        .sticky-cta__content--reserved[data-astro-cid-wi5z2meu]>[data-astro-cid-wi5z2meu] {
            grid-area: 1 / 1
        }

        .sticky-cta__content--reserved[data-astro-cid-wi5z2meu]>[data-astro-cid-wi5z2meu][aria-hidden=true] {
            visibility: hidden;
            pointer-events: none
        }

        .sticky-cta__state[data-astro-cid-wi5z2meu] {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box
        }

        .sticky-cta__text[data-astro-cid-wi5z2meu] {
            margin: 0;
            font-size: .9375rem;
            font-weight: 500;
            color: #111827
        }

        .sticky-cta__member-copy[data-astro-cid-wi5z2meu] {
            display: flex;
            flex-direction: column;
            gap: .25rem
        }

        .sticky-cta__member-status[data-astro-cid-wi5z2meu] {
            display: flex;
            flex-direction: column;
            gap: .75rem;
            align-items: flex-start
        }

        .sticky-cta__welcome[data-astro-cid-wi5z2meu],
        .sticky-cta__completed[data-astro-cid-wi5z2meu] {
            margin: 0
        }

        .sticky-cta__completed[data-astro-cid-wi5z2meu] {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            font-size: .8125rem;
            color: #4b5563
        }

        .sticky-cta__member-badge[data-astro-cid-wi5z2meu] {
            padding: .35rem .65rem;
            border-radius: 9999px;
            background: #eef2ff;
            color: #3730a3;
            font-size: .75rem;
            font-weight: 700;
            width: fit-content
        }

        .sticky-cta__completed[data-astro-cid-wi5z2meu] svg[data-astro-cid-wi5z2meu] {
            width: .9rem;
            height: .9rem;
            flex-shrink: 0;
            color: #3730a3
        }

        .sticky-cta__member-secondary[data-astro-cid-wi5z2meu] {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            color: #111827;
            font-size: .8125rem;
            font-weight: 600;
            text-decoration: none
        }

        .sticky-cta__member-secondary[data-astro-cid-wi5z2meu]:hover {
            text-decoration: underline;
            text-underline-offset: 3px
        }

        .sticky-cta__member-secondary[data-astro-cid-wi5z2meu] svg[data-astro-cid-wi5z2meu] {
            width: .95rem;
            height: .95rem;
            flex-shrink: 0
        }

        .sticky-cta__button[data-astro-cid-wi5z2meu] {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: var(--cta-primary);
            color: #fff;
            padding: .75rem 1.5rem;
            border-radius: .75rem;
            font-weight: 600;
            font-size: .9375rem;
            text-decoration: none;
            transition: box-shadow .15s ease;
            white-space: nowrap;
            flex-shrink: 0;
            max-width: 100%;
            box-sizing: border-box
        }

        .sticky-cta__button[data-astro-cid-wi5z2meu]:hover {
            box-shadow: 0 10px 20px -5px #00000026
        }

        .sticky-cta__button[data-astro-cid-wi5z2meu] svg[data-astro-cid-wi5z2meu] {
            width: 1.125rem;
            height: 1.125rem
        }

        @media(max-width:640px) {
            .sticky-cta[data-astro-cid-wi5z2meu] {
                padding: 10px 16px;
                padding-bottom: calc(30px + env(safe-area-inset-bottom, 0px))
            }

            .sticky-cta__state[data-astro-cid-wi5z2meu] {
                flex-direction: column;
                gap: 10px;
                text-align: center
            }

            .sticky-cta__text[data-astro-cid-wi5z2meu] {
                font-size: .8125rem
            }

            .sticky-cta__member-copy[data-astro-cid-wi5z2meu],
            .sticky-cta__member-status[data-astro-cid-wi5z2meu] {
                align-items: center
            }

            .sticky-cta__button[data-astro-cid-wi5z2meu] {
                width: 100%;
                justify-content: center;
                padding: .875rem 1.25rem;
                white-space: normal
            }
        }

        @media(min-width:641px) {
            .sticky-cta__state[data-astro-cid-wi5z2meu] {
                justify-content: center;
                text-align: center;
                flex-wrap: wrap
            }

            .sticky-cta__text[data-astro-cid-wi5z2meu] {
                text-align: center;
                max-width: 640px
            }
        }

        .footer[data-astro-cid-wxezf4vu] {
            background: var(--cta-primary);
            border-top: none;
            color: #fff;
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
            padding: 56px min(8vw, 110px) 120px
        }

        .footer__inner[data-astro-cid-wxezf4vu] {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            gap: 32px
        }

        .footer__grid[data-astro-cid-wxezf4vu] {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 18px
        }

        .footer__column-title[data-astro-cid-wxezf4vu] {
            margin: 0 0 10px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #fff;
            font-weight: 500
        }

        .footer[data-astro-cid-wxezf4vu] ul[data-astro-cid-wxezf4vu] {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 8px;
            font-size: 14px;
            color: #ffffffe6;
            font-weight: 400
        }

        .footer[data-astro-cid-wxezf4vu] a[data-astro-cid-wxezf4vu] {
            text-decoration: none;
            color: inherit;
            overflow-wrap: anywhere
        }

        .footer[data-astro-cid-wxezf4vu] a[data-astro-cid-wxezf4vu]:hover {
            color: #fff
        }

        .footer__row[data-astro-cid-wxezf4vu] {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding-bottom: 18px;
            border-bottom: 1px solid rgba(255, 255, 255, .25)
        }

        .footer__social[data-astro-cid-wxezf4vu] {
            display: flex;
            gap: 12px
        }

        .footer__social[data-astro-cid-wxezf4vu] a[data-astro-cid-wxezf4vu] {
            display: grid;
            place-items: center;
            width: 40px;
            height: 40px;
            border-radius: 999px;
            background: #ffffff26;
            color: #ffffffd9;
            transition: background .2s ease, color .2s ease
        }

        .footer__social[data-astro-cid-wxezf4vu] a[data-astro-cid-wxezf4vu]:hover {
            background: var(--accent-strong);
            color: #fff
        }

        .footer__social[data-astro-cid-wxezf4vu] svg[data-astro-cid-wxezf4vu] {
            width: 18px;
            height: 18px
        }

        .footer__info[data-astro-cid-wxezf4vu] {
            font-size: 12px;
            color: #ffffffd9;
            display: grid;
            gap: 10px;
            font-weight: 400
        }

        .footer__seal[data-astro-cid-wxezf4vu] {
            display: inline-flex;
            align-items: center;
            width: fit-content;
            padding: 6px 8px;
            background: #ffffff14;
            border-radius: 14px
        }

        .footer__seal[data-astro-cid-wxezf4vu] img[data-astro-cid-wxezf4vu] {
            display: block;
            height: auto;
            width: 60px;
            max-width: 100%
        }

        .footer__trust-badges[data-astro-cid-wxezf4vu] {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap
        }

        .footer__gphc[data-astro-cid-wxezf4vu] {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 8px;
            border-radius: 14px;
            background: #ffffff14;
            color: #fff;
            font-size: .75rem
        }

        .footer__info[data-astro-cid-wxezf4vu] a[data-astro-cid-wxezf4vu] {
            color: #fff;
            text-decoration: underline;
            text-underline-offset: 3px
        }

        .footer__info[data-astro-cid-wxezf4vu] strong[data-astro-cid-wxezf4vu] {
            color: #fff
        }

        .footer__copyright[data-astro-cid-wxezf4vu] {
            color: #fffc;
            padding-top: 8px
        }

        @media(max-width:700px) {
            .footer[data-astro-cid-wxezf4vu] {
                padding: 48px 24px 190px
            }

            .footer__row[data-astro-cid-wxezf4vu] {
                flex-direction: column;
                align-items: flex-start
            }
        }

        .breadcrumbs[data-astro-cid-aebblgj5] {
            padding: 10px min(6vw, 90px);
            color: var(--muted);
            font-size: .8125rem;
            position: relative;
            z-index: 3
        }

        .breadcrumbs__list[data-astro-cid-aebblgj5] {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 6px;
            list-style: none;
            padding: 0;
            margin: 0
        }

        .breadcrumbs__item[data-astro-cid-aebblgj5] {
            display: inline-flex;
            align-items: center;
            gap: 6px
        }

        .breadcrumbs__link[data-astro-cid-aebblgj5] {
            color: var(--accent-strong);
            text-decoration: none;
            font-weight: 500
        }

        .breadcrumbs__link[data-astro-cid-aebblgj5]:hover {
            text-decoration: underline
        }

        .breadcrumbs__current[data-astro-cid-aebblgj5] {
            color: var(--muted);
            font-weight: 500
        }

        .breadcrumbs__sep[data-astro-cid-aebblgj5] {
            color: #0003
        }

        @media(max-width:700px) {
            .breadcrumbs[data-astro-cid-aebblgj5] {
                padding: 8px 20px;
                font-size: .75rem
            }
        }

        .reviewed[data-astro-cid-plwpaone] {
            padding: 48px min(8vw, 110px) 64px;
            background: #fff
        }

        .reviewed__inner[data-astro-cid-plwpaone] {
            max-width: 1200px;
            margin: 0 auto;
            border-top: 1px solid #e5e7eb;
            padding: 24px 0 0
        }

        .reviewed__blocks[data-astro-cid-plwpaone] {
            display: grid;
            gap: 20px
        }

        .reviewed__block[data-astro-cid-plwpaone] {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 24px;
            align-items: center
        }

        .reviewed__block--divider[data-astro-cid-plwpaone] {
            border-top: 1px solid #e5e7eb;
            padding-top: 20px
        }

        .reviewed__avatar[data-astro-cid-plwpaone] {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #e5e7eb;
            background: var(--surface-tint);
            display: flex;
            align-items: center;
            justify-content: center
        }

        .reviewed__avatar-image[data-astro-cid-plwpaone] {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center
        }

        .reviewed__content[data-astro-cid-plwpaone] {
            display: grid;
            gap: 6px
        }

        .reviewed__eyebrow[data-astro-cid-plwpaone] {
            margin: 0;
            text-transform: uppercase;
            letter-spacing: .12em;
            font-size: .7rem;
            font-weight: 600;
            color: #6b7280
        }

        .reviewed__name[data-astro-cid-plwpaone] {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: #111827
        }

        .reviewed__name[data-astro-cid-plwpaone] a[data-astro-cid-plwpaone] {
            color: inherit;
            text-decoration: none
        }

        .reviewed__name[data-astro-cid-plwpaone] a[data-astro-cid-plwpaone]:hover {
            text-decoration: underline;
            text-underline-offset: 3px
        }

        .reviewed__role[data-astro-cid-plwpaone] {
            margin: 0;
            font-size: .9375rem;
            color: #374151;
            font-weight: 500
        }

        .reviewed__separator[data-astro-cid-plwpaone] {
            margin: 0 8px;
            color: #9ca3af
        }

        .reviewed__role[data-astro-cid-plwpaone] a[data-astro-cid-plwpaone] {
            color: inherit;
            text-decoration: none
        }

        .reviewed__role[data-astro-cid-plwpaone] a[data-astro-cid-plwpaone]:hover {
            text-decoration: underline;
            text-underline-offset: 3px
        }

        .reviewed__intro[data-astro-cid-plwpaone] {
            margin: 6px 0 0;
            color: #4b5563;
            line-height: 1.6;
            font-size: .9375rem
        }

        .reviewed__intro--shared[data-astro-cid-plwpaone] {
            margin-top: 16px
        }

        .reviewed__date[data-astro-cid-plwpaone] {
            margin: 16px 0 0;
            font-weight: 600;
            color: #111827;
            font-size: .875rem
        }

        @media(max-width:700px) {
            .reviewed[data-astro-cid-plwpaone] {
                padding: 48px 24px
            }

            .reviewed__block[data-astro-cid-plwpaone] {
                grid-template-columns: 1fr;
                text-align: center
            }

            .reviewed__avatar[data-astro-cid-plwpaone] {
                display: none
            }
        }

        .trust[data-astro-cid-biyz2x6i] {
            background: var(--cta-primary);
            border-top: none;
            border-bottom: none;
            padding: 22px min(8vw, 110px);
            overflow-x: clip;
            position: relative;
            contain: paint
        }

        .trust__track[data-astro-cid-biyz2x6i] {
            max-width: 1200px;
            margin: 0 auto;
            contain: layout paint
        }

        .trust__inner[data-astro-cid-biyz2x6i] {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px 32px
        }

        .trust__inner--duplicate[data-astro-cid-biyz2x6i] {
            display: none
        }

        .trust__item[data-astro-cid-biyz2x6i] {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #f3b8bd;
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap
        }

        .trust__icon[data-astro-cid-biyz2x6i] {
            width: 20px;
            height: 20px;
            color: #f3b8bd;
            flex-shrink: 0
        }

        @media(max-width:700px) {
            .trust[data-astro-cid-biyz2x6i] {
                padding: 18px 0;
                overflow: hidden;
                width: 100%
            }

            .trust__track[data-astro-cid-biyz2x6i] {
                display: flex;
                flex-direction: row;
                width: max-content;
                box-sizing: border-box;
                animation: marquee 20s linear infinite;
                will-change: transform;
                contain: layout paint
            }

            .trust__inner[data-astro-cid-biyz2x6i],
            .trust__inner--duplicate[data-astro-cid-biyz2x6i] {
                display: flex;
                flex-shrink: 0;
                flex-wrap: nowrap;
                justify-content: flex-start;
                gap: 32px;
                padding-right: 32px;
                contain: layout paint
            }
        }

        @keyframes marquee {
            0% {
                transform: translate(0)
            }

            to {
                transform: translate(-50%)
            }
        }

        .product-carousel[data-astro-cid-sbzciufz],
        .product-carousel__slides[data-astro-cid-sbzciufz],
        .product-carousel__slide[data-astro-cid-sbzciufz] {
            position: relative;
            width: 100%;
            height: 100%
        }

        .product-carousel__slide[data-astro-cid-sbzciufz] {
            margin: 0
        }

        .product-carousel__slide[data-astro-cid-sbzciufz][hidden] {
            display: none
        }

        .product-carousel__image[data-astro-cid-sbzciufz] {
            display: block;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            object-position: center
        }

        .product-carousel__image--cover[data-astro-cid-sbzciufz] {
            object-fit: cover
        }

        .product-carousel__image--contain[data-astro-cid-sbzciufz] {
            padding: 10px;
            object-fit: contain
        }

        .product-carousel__image--right[data-astro-cid-sbzciufz] {
            object-position: right center
        }

        .product-carousel__image--edge-to-edge[data-astro-cid-sbzciufz] {
            padding: 0
        }

        .product-carousel__controls[data-astro-cid-sbzciufz] {
            position: absolute;
            bottom: 12px;
            right: 12px;
            z-index: 2;
            display: flex;
            align-items: center;
            padding: 5px;
            border: 1px solid rgba(10, 35, 75, .12);
            border-radius: 999px;
            background: #ffffffeb;
            box-shadow: 0 8px 24px #0a234b24;
            gap: 6px
        }

        .product-carousel__controls[data-astro-cid-sbzciufz] button[data-astro-cid-sbzciufz] {
            display: grid;
            place-items: center;
            width: 32px;
            height: 32px;
            padding: 0;
            border: 0;
            border-radius: 999px;
            background: transparent;
            color: #0a234b;
            cursor: pointer
        }

        .product-carousel__controls[data-astro-cid-sbzciufz] button[data-astro-cid-sbzciufz]:hover {
            background: #eef2ff
        }

        .product-carousel__controls[data-astro-cid-sbzciufz] button[data-astro-cid-sbzciufz]:focus-visible {
            outline: 3px solid #245cff;
            outline-offset: 2px
        }

        .product-carousel__controls[data-astro-cid-sbzciufz] svg[data-astro-cid-sbzciufz] {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round
        }

        .product-carousel__dots[data-astro-cid-sbzciufz] {
            display: flex;
            align-items: center;
            gap: 4px
        }

        .product-carousel__dots[data-astro-cid-sbzciufz] button[data-astro-cid-sbzciufz] {
            width: 20px;
            height: 32px
        }

        .product-carousel__dots[data-astro-cid-sbzciufz] button[data-astro-cid-sbzciufz]:before {
            width: 7px;
            height: 7px;
            border-radius: 999px;
            background: #a9b3c4;
            content: ""
        }

        .product-carousel__dots[data-astro-cid-sbzciufz] button[data-astro-cid-sbzciufz][aria-current=true]:before {
            width: 18px;
            background: #0a234b
        }

        .product-carousel__status[data-astro-cid-sbzciufz] {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0
        }

        @media(max-width:639px) {
            .product-carousel__image--contain[data-astro-cid-sbzciufz] {
                padding: 8px
            }

            .product-carousel__controls[data-astro-cid-sbzciufz] {
                bottom: 10px;
                right: 10px
            }
        }

        .hero[data-astro-cid-aukjhy6i] {
            position: relative;
            background-color: #fff;
            padding-top: 2rem;
            padding-bottom: 4rem;
            overflow: hidden
        }

        @media(max-width:640px) {
            .hero[data-astro-cid-aukjhy6i] {
                padding-top: .75rem;
                padding-bottom: 2rem
            }
        }

        @media(min-width:1024px) {
            .hero[data-astro-cid-aukjhy6i] {
                padding-top: 3rem;
                padding-bottom: 2.5rem
            }
        }

        .hero__inner[data-astro-cid-aukjhy6i] {
            max-width: 80rem;
            margin-inline: auto;
            padding-inline: 1rem;
            display: grid;
            gap: 2rem;
            align-items: start;
            grid-template-columns: 1fr;
            grid-template-areas: "breadcrumbs" "top" "media" "bottom"
        }

        @media(min-width:640px) {
            .hero__inner[data-astro-cid-aukjhy6i] {
                padding-inline: 1.5rem
            }
        }

        @media(min-width:1024px) {
            .hero__inner[data-astro-cid-aukjhy6i] {
                padding-inline: 2rem;
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
                grid-template-areas: "breadcrumbs breadcrumbs" "top media" "bottom media"
            }
        }

        .hero__content[data-astro-cid-aukjhy6i] {
            display: flex;
            flex-direction: column;
            gap: 0;
            min-width: 0;
            max-width: 100%
        }

        @media(min-width:1024px) {
            .hero__content[data-astro-cid-aukjhy6i] {
                gap: .75rem
            }
        }

        .hero__content--top[data-astro-cid-aukjhy6i] {
            grid-area: top
        }

        .hero__content--bottom[data-astro-cid-aukjhy6i] {
            grid-area: bottom
        }

        .hero__breadcrumbs[data-astro-cid-aukjhy6i] {
            grid-area: breadcrumbs
        }

        .hero__eyebrow[data-astro-cid-aukjhy6i] {
            margin: 0;
            font-size: .675rem;
            font-weight: 600;
            line-height: 1.2;
            color: #1f2937;
            padding-bottom: 0;
            font-family: var(--hero-font);
            text-transform: uppercase;
            letter-spacing: .05em
        }

        @media(min-width:1024px) {
            .hero__eyebrow[data-astro-cid-aukjhy6i] {
                font-size: .8rem;
                margin-bottom: -.25rem
            }
        }

        .hero__subtitle[data-astro-cid-aukjhy6i] {
            margin: .5rem 0 0;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #4b5563;
            letter-spacing: 0;
            text-transform: none
        }

        @media(max-width:767px) {
            .hero__subtitle[data-astro-cid-aukjhy6i] {
                padding-bottom: 15px
            }
        }

        @media(min-width:768px) {
            .hero__subtitle[data-astro-cid-aukjhy6i] {
                font-size: 1.125rem
            }
        }

        .hero__eyebrow--title[data-astro-cid-aukjhy6i] {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -.02em;
            text-transform: none;
            color: #111827;
            margin-bottom: 0
        }

        @media(min-width:768px) {
            .hero__eyebrow--title[data-astro-cid-aukjhy6i] {
                font-size: 2.25rem
            }
        }

        @media(min-width:1024px) {
            .hero__eyebrow--title[data-astro-cid-aukjhy6i] {
                font-size: 3rem;
                margin-bottom: 0
            }
        }

        .hero__headline[data-astro-cid-aukjhy6i] {
            font-size: 2rem;
            line-height: 1.1;
            color: #111827;
            padding-top: 0;
            font-family: var(--hero-font);
            letter-spacing: -.02em;
            transition: opacity .18s ease
        }

        .hero__content--top[data-astro-cid-aukjhy6i]>h1[data-astro-cid-aukjhy6i].hero__eyebrow,
        .hero__content--top[data-astro-cid-aukjhy6i]>h1[data-astro-cid-aukjhy6i].hero__headline {
            color: var(--cta-primary)
        }

        @media(min-width:641px) {
            .hero--member-journey[data-astro-cid-aukjhy6i]:not(.hero--category) .hero__headline[data-astro-cid-aukjhy6i] {
                min-height: 3.4em
            }
        }

        .hero__headline[data-astro-cid-aukjhy6i].is-swapping {
            opacity: 0
        }

        @media(min-width:768px) {
            .hero__headline[data-astro-cid-aukjhy6i] {
                font-size: 2.25rem
            }

            .hero--member-journey[data-astro-cid-aukjhy6i]:not(.hero--category) .hero__headline[data-astro-cid-aukjhy6i] {
                min-height: 2.3em
            }
        }

        @media(min-width:1024px) {
            .hero__headline[data-astro-cid-aukjhy6i] {
                font-size: 3rem;
                padding-top: 0
            }
        }

        .hero[data-astro-cid-aukjhy6i]:not(.hero--category) .hero__content--top[data-astro-cid-aukjhy6i]>h1[data-astro-cid-aukjhy6i].hero__eyebrow,
        .hero[data-astro-cid-aukjhy6i]:not(.hero--category) .hero__content--top[data-astro-cid-aukjhy6i]>h1[data-astro-cid-aukjhy6i].hero__headline {
            color: var(--cta-primary);
            font-size: clamp(2.4rem, 4.5vw, 4.2rem);
            font-weight: 700;
            letter-spacing: -.045em;
            line-height: .92
        }

        @media(min-width:1024px) {

            .hero[data-astro-cid-aukjhy6i]:not(.hero--category) .hero__content--top[data-astro-cid-aukjhy6i]>h1[data-astro-cid-aukjhy6i].hero__eyebrow,
            .hero[data-astro-cid-aukjhy6i]:not(.hero--category) .hero__content--top[data-astro-cid-aukjhy6i]>h1[data-astro-cid-aukjhy6i].hero__headline {
                font-size: clamp(2.75rem, 3.2vw, 3.25rem)
            }
        }

        .hero__media[data-astro-cid-aukjhy6i] {
            grid-area: media;
            position: relative;
            margin-top: .75rem;
            margin-bottom: .5rem;
            width: 100%;
            min-width: 0;
            max-width: 100%;
            box-sizing: border-box
        }

        .hero__media-visual[data-astro-cid-aukjhy6i] {
            position: relative
        }

        .hero__image-wrapper[data-astro-cid-aukjhy6i] {
            overflow: hidden;
            border-radius: 1rem;
            max-height: 280px;
            aspect-ratio: 4 / 3;
            width: 100%;
            background: var(--media-surface-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            box-sizing: border-box;
            max-width: 100%
        }

        @media(min-width:640px) {
            .hero__image-wrapper[data-astro-cid-aukjhy6i] {
                max-height: 320px
            }
        }

        .hero__image[data-astro-cid-aukjhy6i] {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center
        }

        .hero__image-wrapper--carousel[data-astro-cid-aukjhy6i] {
            padding: 0;
            max-height: none;
            aspect-ratio: 1 / 1
        }

        .hero__bullets-simple[data-astro-cid-aukjhy6i] {
            margin-top: .75rem;
            padding-left: 0;
            display: flex;
            flex-direction: column;
            gap: .375rem;
            list-style: none
        }

        .hero__bullets-simple[data-astro-cid-aukjhy6i] li[data-astro-cid-aukjhy6i] {
            padding-top: 10px;
            display: flex;
            align-items: flex-start;
            gap: .5rem;
            font-size: .8125rem;
            color: #374151;
            line-height: 1.4
        }

        .hero__check-small[data-astro-cid-aukjhy6i] {
            width: 1rem;
            height: 1rem;
            color: #14b8a6;
            flex-shrink: 0;
            margin-top: .125rem
        }

        @media(min-width:1024px) {
            .hero__media[data-astro-cid-aukjhy6i] {
                height: auto;
                width: 550px;
                max-width: 100%;
                margin: 0 auto
            }

            .hero__image-wrapper[data-astro-cid-aukjhy6i] {
                position: relative;
                width: 100%;
                height: 367px;
                max-height: none;
                aspect-ratio: auto
            }

            .hero__image-wrapper--carousel[data-astro-cid-aukjhy6i] {
                height: 430px
            }

            .hero__bullets-simple[data-astro-cid-aukjhy6i] {
                display: none
            }

            .hero__image[data-astro-cid-aukjhy6i],
            .hero__image--category[data-astro-cid-aukjhy6i] {
                transform: translateY(-20px)
            }
        }

        .hero__overlay[data-astro-cid-aukjhy6i] {
            background-color: #fff;
            border-radius: 1rem;
            border-top: 4px solid #5283ff;
            padding: 1.5rem;
            box-shadow: 0 10px 15px -3px #0000001a, 0 4px 6px -4px #0000001a;
            max-width: 28rem;
            width: 100%;
            position: absolute;
            bottom: calc(-9rem + 75px);
            left: 50%;
            transform: translate(-50%);
            display: none
        }

        @media(min-width:1024px) {
            .hero__overlay[data-astro-cid-aukjhy6i] {
                display: block
            }
        }

        .hero__bullets[data-astro-cid-aukjhy6i] {
            display: flex;
            flex-direction: column;
            gap: .75rem;
            list-style: none;
            padding: 0;
            margin: 0
        }

        .hero__bullet[data-astro-cid-aukjhy6i] {
            display: flex;
            align-items: flex-start;
            gap: .75rem
        }

        .hero__check[data-astro-cid-aukjhy6i] {
            width: 1.25rem;
            height: 1.25rem;
            color: #5283ff;
            flex-shrink: 0;
            margin-top: .125rem
        }

        .hero__bullet[data-astro-cid-aukjhy6i] span[data-astro-cid-aukjhy6i] {
            font-size: .875rem;
            color: #374151
        }

        .hero__product-benefits[data-astro-cid-aukjhy6i] {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb
        }

        .hero__product-benefits-list[data-astro-cid-aukjhy6i] {
            display: grid;
            gap: .625rem;
            margin: 0;
            padding: 0;
            list-style: none
        }

        .hero__product-benefits-list[data-astro-cid-aukjhy6i] li[data-astro-cid-aukjhy6i] {
            display: flex;
            align-items: flex-start;
            gap: .625rem;
            color: #374151;
            font-size: .875rem;
            line-height: 1.45
        }

        .hero__product-benefits-list[data-astro-cid-aukjhy6i] svg[data-astro-cid-aukjhy6i] {
            width: 1.125rem;
            height: 1.125rem;
            margin-top: .125rem;
            flex: 0 0 1.125rem;
            color: #5283ff
        }

        .hero__product-benefits-note[data-astro-cid-aukjhy6i] {
            margin: .75rem 0 0;
            color: #6b7280;
            font-size: .75rem;
            line-height: 1.5
        }

        .hero__trustpilot-inline[data-astro-cid-aukjhy6i] {
            margin-top: .5rem;
            display: inline-flex;
            align-items: center;
            gap: .875rem;
            flex-wrap: wrap;
            max-width: 100%;
            text-decoration: none;
            color: inherit;
            transition: opacity .2s ease
        }

        .hero__content--top[data-astro-cid-aukjhy6i] .hero__trustpilot-inline[data-astro-cid-aukjhy6i] {
            margin-top: .35rem
        }

        @media(max-width:640px) {
            .hero__content--top[data-astro-cid-aukjhy6i] .hero__trustpilot-inline[data-astro-cid-aukjhy6i] {
                margin-top: .25rem
            }
        }

        .hero__trustpilot-inline[data-astro-cid-aukjhy6i]:hover {
            opacity: .85
        }

        .hero__trustpilot-logo[data-astro-cid-aukjhy6i] {
            height: 1.25rem;
            width: auto
        }

        .hero__trustpilot-rating[data-astro-cid-aukjhy6i] {
            display: flex;
            align-items: center;
            gap: .5rem;
            flex-wrap: wrap;
            max-width: 100%
        }

        .hero__trustpilot-stars[data-astro-cid-aukjhy6i] {
            display: inline-flex;
            gap: 2px
        }

        .hero__trustpilot-star[data-astro-cid-aukjhy6i] {
            position: relative;
            display: inline-block;
            width: 18px;
            height: 18px
        }

        .hero__trustpilot-star[data-astro-cid-aukjhy6i] svg[data-astro-cid-aukjhy6i] {
            width: 18px;
            height: 18px;
            fill: currentColor
        }

        .hero__trustpilot-star-bg[data-astro-cid-aukjhy6i] {
            color: #dcdce6
        }

        .hero__trustpilot-star-fill[data-astro-cid-aukjhy6i] {
            position: absolute;
            top: 0;
            left: 0;
            color: #00b67a
        }

        .hero__trustpilot-score[data-astro-cid-aukjhy6i] {
            font-size: .875rem;
            font-weight: 600;
            color: #111827
        }

        .hero__trustpilot-count[data-astro-cid-aukjhy6i] {
            font-size: .75rem;
            color: #6b7280
        }

        .hero__reinforcers[data-astro-cid-aukjhy6i] {
            display: grid;
            gap: .625rem;
            margin: 1rem 0 0;
            padding: 0;
            list-style: none
        }

        .hero__reinforcer[data-astro-cid-aukjhy6i] {
            display: flex;
            align-items: center;
            gap: .625rem;
            color: #1f2937;
            font-size: .875rem;
            font-weight: 600;
            line-height: 1.35
        }

        .hero__reinforcer[data-astro-cid-aukjhy6i] svg[data-astro-cid-aukjhy6i] {
            width: 1.25rem;
            height: 1.25rem;
            flex: 0 0 1.25rem;
            color: var(--cta-primary);
            stroke: currentColor;
            stroke-width: 1.75;
            stroke-linecap: round;
            stroke-linejoin: round
        }

        .hero__content--cta-panel[data-astro-cid-aukjhy6i] {
            padding: 1rem;
            border: 1px solid rgba(10, 33, 73, .16);
            border-radius: 1rem;
            background: #fff;
            box-shadow: none
        }

        .hero__cta-panel-heading[data-astro-cid-aukjhy6i] {
            display: grid;
            justify-items: center;
            gap: .2rem;
            text-align: center
        }

        .hero__cta-panel-badge[data-astro-cid-aukjhy6i] {
            display: inline-flex;
            padding: .25rem .6rem;
            border-radius: .35rem;
            background: #d9f0df;
            color: #173d25;
            font-size: .6875rem;
            font-weight: 700;
            line-height: 1.2
        }

        .hero__cta-panel-context[data-astro-cid-aukjhy6i] {
            margin: .15rem 0 0;
            color: #4b5563;
            font-size: .75rem;
            font-weight: 600;
            line-height: 1.3
        }

        .hero__cta-panel-price[data-astro-cid-aukjhy6i] {
            margin: 0;
            color: #172b20;
            font-size: 1rem;
            line-height: 1.35
        }

        .hero__cta-panel-price[data-astro-cid-aukjhy6i] strong[data-astro-cid-aukjhy6i] {
            font-size: 1.5rem;
            font-weight: 750
        }

        .hero__content--cta-panel[data-astro-cid-aukjhy6i] .hero__cta[data-astro-cid-aukjhy6i] {
            align-items: stretch;
            flex-direction: column;
            gap: .35rem;
            padding-top: .7rem
        }

        .hero__content--cta-panel[data-astro-cid-aukjhy6i] .hero__cta-button[data-astro-cid-aukjhy6i] {
            justify-content: center;
            width: 100%
        }

        .hero__content--cta-panel[data-astro-cid-aukjhy6i] .hero__cta[data-astro-cid-aukjhy6i] .hero__cta-category--secondary[data-astro-cid-aukjhy6i] {
            width: auto;
            min-width: 0;
            min-height: auto;
            padding: .35rem;
            border: 0;
            border-radius: 0;
            background: transparent;
            color: var(--cta-primary);
            font-size: .8125rem;
            text-decoration: underline;
            text-underline-offset: 3px
        }

        .hero__content--cta-panel[data-astro-cid-aukjhy6i] .hero__cta[data-astro-cid-aukjhy6i] .hero__cta-category--secondary[data-astro-cid-aukjhy6i]:hover {
            background: transparent;
            box-shadow: none
        }

        .hero__content--cta-panel[data-astro-cid-aukjhy6i] .hero__cta-note[data-astro-cid-aukjhy6i] {
            margin: .25rem 0 0;
            color: #4b5563;
            font-size: .75rem;
            line-height: 1.35;
            text-align: center
        }

        .hero__cta-panel-reassurance[data-astro-cid-aukjhy6i] {
            display: grid;
            gap: .35rem;
            margin: .65rem 0 0;
            padding: 0;
            list-style: none
        }

        .hero__cta-panel-reassurance[data-astro-cid-aukjhy6i] li[data-astro-cid-aukjhy6i] {
            display: flex;
            align-items: flex-start;
            gap: .5rem;
            color: #24352c;
            font-size: .75rem;
            line-height: 1.35
        }

        .hero__cta-panel-reassurance[data-astro-cid-aukjhy6i] svg[data-astro-cid-aukjhy6i] {
            width: 1rem;
            height: 1rem;
            flex: 0 0 1rem;
            color: #0f5a3c
        }

        .hero__cta-panel-footnote[data-astro-cid-aukjhy6i] {
            margin: .6rem 0 0;
            color: #6b7280;
            font-size: .6875rem;
            line-height: 1.35
        }

        .hero__cta-panel-footnote[data-astro-cid-aukjhy6i] a[data-astro-cid-aukjhy6i] {
            color: var(--cta-primary);
            font-weight: 600;
            text-underline-offset: 2px
        }

        .hero__cta-panel-secondary[data-astro-cid-aukjhy6i] {
            display: inline-flex;
            justify-content: center;
            margin-top: .45rem;
            color: var(--cta-primary);
            font-size: .75rem;
            font-weight: 600;
            text-align: center;
            text-underline-offset: 3px
        }

        .hero__cta[data-astro-cid-aukjhy6i] {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding-top: .75rem;
            flex-wrap: wrap;
            min-width: 0;
            max-width: 100%
        }

        .hero__cta-shell[data-astro-cid-aukjhy6i],
        .hero__doses-shell[data-astro-cid-aukjhy6i] {
            position: relative;
            min-width: 0;
            max-width: 100%
        }

        .hero__product-extra[data-astro-cid-aukjhy6i] {
            padding-top: 1rem;
            width: 100%
        }

        .hero__cta-shell--reserved[data-astro-cid-aukjhy6i],
        .hero__doses-shell--reserved[data-astro-cid-aukjhy6i] {
            display: grid
        }

        .hero__cta-shell--reserved[data-astro-cid-aukjhy6i]>[data-astro-cid-aukjhy6i],
        .hero__doses-shell--reserved[data-astro-cid-aukjhy6i]>[data-astro-cid-aukjhy6i] {
            grid-area: 1 / 1
        }

        .hero__cta-shell--reserved[data-astro-cid-aukjhy6i]>[data-astro-cid-aukjhy6i][aria-hidden=true],
        .hero__doses-shell--reserved[data-astro-cid-aukjhy6i]>[data-astro-cid-aukjhy6i][aria-hidden=true] {
            visibility: hidden;
            pointer-events: none
        }

        .hero__cta--member[data-astro-cid-aukjhy6i] {
            align-items: flex-start;
            flex-direction: column
        }

        .hero__cta-button[data-astro-cid-aukjhy6i] {
            flex: 0 1 auto;
            min-width: 12rem;
            max-width: 100%;
            padding: 1rem;
            white-space: nowrap
        }

        .hero__cta[data-astro-cid-aukjhy6i] .hero__cta-category[data-astro-cid-aukjhy6i] {
            flex: 0 1 auto;
            min-width: 17.5rem;
            max-width: 100%
        }

        .hero__cta-button[data-astro-cid-aukjhy6i] svg[data-astro-cid-aukjhy6i] {
            width: 1.25rem;
            height: 1.25rem
        }

        @media(max-width:640px) {
            .hero[data-astro-cid-aukjhy6i]:not(.hero--category) .hero__media[data-astro-cid-aukjhy6i] {
                margin-top: 0
            }

            .hero__bullets-simple[data-astro-cid-aukjhy6i] {
                margin-top: -.5rem;
                padding-top: 15px;
                gap: .25rem
            }

            .hero__cta-button[data-astro-cid-aukjhy6i] {
                width: 100%;
                min-width: 0;
                max-width: 100%;
                justify-content: center;
                padding: 1rem !important
            }

            .hero__cta[data-astro-cid-aukjhy6i] .hero__cta-category[data-astro-cid-aukjhy6i] {
                width: 100%;
                min-width: 0;
                max-width: 100%;
                white-space: normal;
                overflow-wrap: anywhere
            }

            .hero__cta[data-astro-cid-aukjhy6i] {
                gap: 1rem;
                padding-top: .25rem;
                flex-wrap: wrap;
                align-items: stretch;
                width: 100%
            }

            .hero__payment-pricing[data-astro-cid-aukjhy6i] {
                gap: .75rem
            }

            .hero__cta--member[data-astro-cid-aukjhy6i] {
                align-items: stretch
            }

            .hero__content--bottom[data-astro-cid-aukjhy6i] {
                gap: .75rem;
                margin-top: .5rem
            }
        }

        @media(max-width:1023px) {
            .hero--mobile-actions-first[data-astro-cid-aukjhy6i] .hero__inner[data-astro-cid-aukjhy6i] {
                grid-template-areas: "breadcrumbs" "top" "bottom" "media";
                gap: .75rem
            }

            .hero--mobile-actions-first[data-astro-cid-aukjhy6i] .hero__content--bottom[data-astro-cid-aukjhy6i],
            .hero--mobile-actions-first[data-astro-cid-aukjhy6i] .hero__media[data-astro-cid-aukjhy6i] {
                margin-top: 0
            }
        }

        .hero--media-compact[data-astro-cid-aukjhy6i] .hero__image[data-astro-cid-aukjhy6i] {
            width: min(100%, 22.5rem);
            height: auto;
            transform: none
        }

        .hero--media-cutout[data-astro-cid-aukjhy6i] .hero__image-wrapper[data-astro-cid-aukjhy6i] {
            padding: clamp(.75rem, 2vw, 1.5rem)
        }

        .hero--media-cutout[data-astro-cid-aukjhy6i] .hero__image[data-astro-cid-aukjhy6i] {
            object-position: center bottom;
            transform: none
        }

        .hero--media-campaign[data-astro-cid-aukjhy6i] .hero__image-wrapper[data-astro-cid-aukjhy6i] {
            padding: 0;
            background: #f4ecf5;
            height: clamp(24rem, 120vw, 29rem);
            max-height: none;
            aspect-ratio: auto
        }

        .hero--media-campaign[data-astro-cid-aukjhy6i] .hero__image[data-astro-cid-aukjhy6i] {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 58%;
            transform: none
        }

        @media(min-width:1024px) {
            .hero--media-campaign[data-astro-cid-aukjhy6i] .hero__image-wrapper[data-astro-cid-aukjhy6i] {
                height: 28.75rem
            }

            .hero--media-campaign[data-astro-cid-aukjhy6i].hero--clinician-note .hero__image-wrapper[data-astro-cid-aukjhy6i] {
                height: 28rem
            }
        }

        .hero--media-campaign[data-astro-cid-aukjhy6i].hero--clinician-note .hero__eyebrow[data-astro-cid-aukjhy6i] {
            margin-bottom: .625rem
        }

        .hero--media-campaign[data-astro-cid-aukjhy6i].hero--clinician-note .hero__content--top[data-astro-cid-aukjhy6i]>h1[data-astro-cid-aukjhy6i].hero__headline {
            font-size: clamp(2.65rem, 5.2vw, 3.75rem)
        }

        .hero--decision-first[data-astro-cid-aukjhy6i] .hero__headline[data-astro-cid-aukjhy6i] {
            margin: 0
        }

        .hero--decision-first[data-astro-cid-aukjhy6i] .hero__clinician--product[data-astro-cid-aukjhy6i] {
            margin: .25rem 0 .5rem
        }

        .hero--decision-first[data-astro-cid-aukjhy6i] .hero__reinforcers[data-astro-cid-aukjhy6i] {
            gap: .4rem;
            margin-top: .5rem
        }

        .hero--decision-first[data-astro-cid-aukjhy6i] .hero__cta[data-astro-cid-aukjhy6i] {
            gap: .75rem;
            padding-top: 0
        }

        .hero--decision-first[data-astro-cid-aukjhy6i] .hero__content--cta-panel[data-astro-cid-aukjhy6i] .hero__cta[data-astro-cid-aukjhy6i] {
            gap: .35rem;
            padding-top: .7rem
        }

        @media(min-width:1024px) {
            .hero--decision-first[data-astro-cid-aukjhy6i] {
                padding-top: 1.5rem
            }

            .hero--decision-first[data-astro-cid-aukjhy6i] .hero__inner[data-astro-cid-aukjhy6i] {
                column-gap: 2rem;
                row-gap: 1rem
            }

            .hero--decision-first[data-astro-cid-aukjhy6i] .hero__content[data-astro-cid-aukjhy6i] {
                gap: .5rem
            }

            .hero--decision-first[data-astro-cid-aukjhy6i] .hero__cta-button[data-astro-cid-aukjhy6i] {
                padding: .875rem 1rem
            }

            .hero--decision-first[data-astro-cid-aukjhy6i] .hero__cta[data-astro-cid-aukjhy6i] .hero__cta-category[data-astro-cid-aukjhy6i] {
                min-width: 14rem
            }

            .hero--decision-first[data-astro-cid-aukjhy6i] .hero__content--cta-panel[data-astro-cid-aukjhy6i] .hero__cta[data-astro-cid-aukjhy6i] .hero__cta-category--secondary[data-astro-cid-aukjhy6i] {
                min-width: 0
            }
        }

        .hero__price[data-astro-cid-aukjhy6i] {
            display: inline-flex;
            align-items: center;
            flex: 0 0 100%;
            margin-left: 0;
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 1;
            color: #111827;
            white-space: nowrap
        }

        .hero__payment-pricing[data-astro-cid-aukjhy6i] {
            display: grid;
            width: min(100%, 31rem);
            gap: .75rem;
            white-space: normal
        }

        .hero__payment-toggle[data-astro-cid-aukjhy6i] {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            width: 100%;
            padding: .2rem;
            border: 2px solid #5d86ff;
            border-radius: 999px;
            background: #fff
        }

        .hero__payment-option[data-astro-cid-aukjhy6i] {
            min-width: 0;
            padding: .625rem .75rem;
            border: 0;
            border-radius: 999px;
            background: transparent;
            color: #1a3d7a;
            cursor: pointer;
            font-family: var(--hero-font);
            font-size: .8125rem;
            font-weight: 650;
            line-height: 1.2;
            transition: background-color .16s ease, color .16s ease, box-shadow .16s ease
        }

        .hero__payment-option[data-astro-cid-aukjhy6i][aria-pressed=true] {
            background: #1a3d7a;
            color: #fff;
            box-shadow: 0 3px 10px #1a3d7a33
        }

        .hero__payment-option[data-astro-cid-aukjhy6i]:focus-visible {
            outline: 3px solid rgba(82, 131, 255, .45);
            outline-offset: 2px
        }

        .hero__payment-price-row[data-astro-cid-aukjhy6i] {
            display: flex;
            align-items: center;
            gap: .75rem;
            flex-wrap: wrap
        }

        .hero__payment-price-value[data-astro-cid-aukjhy6i] {
            display: inline-flex;
            align-items: center;
            gap: .08em;
            color: #1a3d7a;
            font-family: var(--hero-font);
            font-size: clamp(2.15rem, 4.2vw, 3rem);
            font-weight: 700;
            letter-spacing: -.025em;
            line-height: .92
        }

        .hero__payment-price-payg[data-astro-cid-aukjhy6i] {
            color: #6b7280;
            font-family: var(--hero-font);
            font-size: .875rem;
            font-weight: 600;
            line-height: 1;
            text-decoration-thickness: 1.5px;
            text-decoration-color: currentColor
        }

        .hero__payment-price-label[data-astro-cid-aukjhy6i] {
            max-width: 10rem;
            color: #4b5563;
            font-size: .8125rem;
            font-weight: 600;
            line-height: 1.35
        }

        .hero__payment-details[data-astro-cid-aukjhy6i] {
            display: flex;
            align-items: baseline;
            gap: .3rem .6rem;
            flex-wrap: wrap;
            color: #5f6b7d;
            font-size: .75rem;
            font-weight: 450;
            line-height: 1.5
        }

        .hero__payment-details[data-astro-cid-aukjhy6i] a[data-astro-cid-aukjhy6i] {
            color: #1a3d7a;
            font-weight: 700;
            text-underline-offset: .18em
        }

        @media(max-width:480px) {
            .hero__payment-option[data-astro-cid-aukjhy6i] {
                padding-inline: .55rem;
                font-size: .75rem
            }

            .hero__payment-price-row[data-astro-cid-aukjhy6i] {
                gap: .55rem
            }

            .hero__payment-price-label[data-astro-cid-aukjhy6i] {
                max-width: 8rem;
                font-size: .75rem
            }
        }

        .hero__price--promo[data-astro-cid-aukjhy6i] {
            display: flex;
            flex-wrap: wrap;
            gap: .35rem .6rem;
            align-items: center
        }

        .hero__price-main[data-astro-cid-aukjhy6i] {
            display: inline-flex;
            align-items: center;
            gap: .35rem
        }

        .hero__price-main--discounted[data-astro-cid-aukjhy6i] {
            gap: .5rem
        }

        .hero__price-current[data-astro-cid-aukjhy6i] {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            color: #111827
        }

        .hero__price-original[data-astro-cid-aukjhy6i] {
            display: inline-flex;
            align-items: center;
            gap: .35rem
        }

        .hero__price-main--discounted[data-astro-cid-aukjhy6i] .hero__price-original[data-astro-cid-aukjhy6i] {
            color: #6b7280;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: line-through;
            text-decoration-thickness: 2px;
            text-decoration-color: #9ca3af
        }

        .hero__discount-wrap[data-astro-cid-aukjhy6i] {
            position: relative;
            display: inline-flex;
            align-items: center
        }

        .hero__discount[data-astro-cid-aukjhy6i] {
            border: 0;
            background: transparent;
            color: #0d3478;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
            padding: 0;
            text-decoration: underline;
            text-underline-offset: 3px;
            display: inline-flex;
            align-items: center;
            gap: .35rem
        }

        .hero__discount-icon[data-astro-cid-aukjhy6i] {
            width: 1rem;
            height: 1rem;
            fill: currentColor
        }

        .hero__discount-popover[data-astro-cid-aukjhy6i] {
            position: absolute;
            top: calc(100% + .5rem);
            left: 0;
            min-width: 220px;
            background: #111827;
            color: #f9fafb;
            border-radius: .75rem;
            padding: .5rem .75rem;
            box-shadow: 0 16px 24px -10px #0f172a59;
            display: flex;
            flex-direction: column;
            gap: .25rem;
            opacity: 0;
            transform: translateY(-4px);
            pointer-events: none;
            transition: opacity .15s ease, transform .15s ease;
            z-index: 5
        }

        .hero__discount-line[data-astro-cid-aukjhy6i] {
            font-size: .75rem;
            line-height: 1.4;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: .35rem
        }

        .hero__discount-gift[data-astro-cid-aukjhy6i] {
            width: .9rem;
            height: .9rem;
            fill: currentColor;
            flex-shrink: 0
        }

        .hero__discount-hint[data-astro-cid-aukjhy6i] {
            color: #cbd5f5;
            font-weight: 600;
            letter-spacing: .02em
        }

        .hero__discount-status[data-astro-cid-aukjhy6i] {
            font-size: .7rem;
            color: #93c5fd;
            min-height: .9rem
        }

        .hero__category-promotion[data-astro-cid-aukjhy6i] {
            margin-top: .55rem
        }

        .hero__discount-wrap[data-astro-cid-aukjhy6i]:hover .hero__discount-popover[data-astro-cid-aukjhy6i],
        .hero__discount-wrap[data-astro-cid-aukjhy6i]:focus-within .hero__discount-popover[data-astro-cid-aukjhy6i] {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto
        }

        .sr-only[data-astro-cid-aukjhy6i] {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0
        }

        .hero__doses[data-astro-cid-aukjhy6i] {
            display: flex;
            flex-direction: column;
            gap: .5rem;
            padding-top: 0
        }

        .hero__member-meta[data-astro-cid-aukjhy6i] {
            padding-top: 1rem;
            display: flex;
            align-items: flex-start
        }

        .hero__member-status[data-astro-cid-aukjhy6i] {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: .9rem
        }

        .hero__member-status[data-astro-cid-aukjhy6i][hidden] {
            display: none
        }

        .hero__member-completed[data-astro-cid-aukjhy6i] {
            margin: 0;
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            font-size: .875rem;
            font-weight: 500;
            color: #4b5563
        }

        .hero__member-badge[data-astro-cid-aukjhy6i] {
            padding: .42rem .7rem;
            border-radius: 9999px;
            background: #eef2ff;
            color: #3730a3;
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .01em
        }

        .hero__member-completed[data-astro-cid-aukjhy6i] svg[data-astro-cid-aukjhy6i] {
            width: .95rem;
            height: .95rem;
            flex-shrink: 0;
            color: #3730a3
        }

        .hero__member-secondary[data-astro-cid-aukjhy6i] {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            color: #111827;
            font-size: .875rem;
            font-weight: 600;
            text-decoration: none
        }

        .hero__member-secondary[data-astro-cid-aukjhy6i]:hover {
            text-decoration: underline;
            text-underline-offset: 3px
        }

        .hero__member-secondary[data-astro-cid-aukjhy6i] svg[data-astro-cid-aukjhy6i] {
            width: 1rem;
            height: 1rem;
            flex-shrink: 0
        }

        .hero__doses-list[data-astro-cid-aukjhy6i] {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
            list-style: none;
            margin: 0;
            padding: 0
        }

        .hero__dose[data-astro-cid-aukjhy6i] {
            padding: .375rem .75rem;
            border-radius: 9999px;
            border: 1px solid rgba(26, 61, 122, .28);
            background-color: #fff;
            color: var(--cta-primary);
            font-size: .875rem;
            font-weight: 500;
            cursor: pointer;
            transition: border-color .15s ease, background-color .15s ease, color .15s ease
        }

        .hero__dose[data-astro-cid-aukjhy6i]:hover {
            border-color: var(--cta-primary)
        }

        .hero__dose[data-astro-cid-aukjhy6i][aria-checked=true] {
            border-color: var(--cta-primary);
            background-color: var(--cta-primary);
            color: #fff
        }

        .hero__doses-note[data-astro-cid-aukjhy6i] {
            font-size: .75rem;
            color: #6b7280;
            line-height: 1.625
        }

        .hero__quantity[data-astro-cid-aukjhy6i] {
            display: flex;
            flex-direction: column;
            gap: .35rem
        }

        .hero__quantity[data-astro-cid-aukjhy6i][hidden] {
            display: none
        }

        .hero__quantity-label[data-astro-cid-aukjhy6i] {
            font-size: .875rem;
            font-weight: 500;
            color: #111827
        }

        .hero__quantity-select[data-astro-cid-aukjhy6i] {
            width: 100%;
            max-width: 24rem;
            border: 1px solid #d1d5db;
            border-radius: .625rem;
            background: #fff;
            color: #111827;
            padding: .625rem .75rem;
            font-size: .9375rem;
            line-height: 1.4
        }

        .hero__quantity-select[data-astro-cid-aukjhy6i]:focus {
            outline: 2px solid #93c5fd;
            outline-offset: 1px;
            border-color: #2563eb
        }

        .hero__dose[data-astro-cid-aukjhy6i][disabled] {
            cursor: not-allowed;
            opacity: .45
        }

        .hero--category[data-astro-cid-aukjhy6i] {
            background: #fff;
            padding: 120px 0 67px;
            margin-top: -64px;
            padding-top: calc(64px + 2rem);
            overflow: visible
        }

        @media(max-width:1023px) {
            .hero--category[data-astro-cid-aukjhy6i] {
                background: linear-gradient(135deg, #fff6, #fff6), var(--hero-surface-gradient)
            }
        }

        @media(min-width:1024px) {
            .hero--category[data-astro-cid-aukjhy6i] {
                padding-top: calc(64px + 3rem);
                padding-bottom: 7rem
            }

            .hero--category[data-astro-cid-aukjhy6i].hero--image-background {
                padding-top: calc(64px + 2.25rem);
                padding-bottom: 4.5rem
            }
        }

        @media(max-width:700px) {
            .hero--category[data-astro-cid-aukjhy6i] {
                padding: 100px 0 32px;
                margin-top: -64px;
                padding-top: calc(64px + .5rem)
            }
        }

        .hero--category[data-astro-cid-aukjhy6i] .hero__bg[data-astro-cid-aukjhy6i] {
            position: absolute;
            inset: 0;
            pointer-events: none
        }

        .hero--image-background[data-astro-cid-aukjhy6i] .hero__background-image[data-astro-cid-aukjhy6i],
        .hero--image-background[data-astro-cid-aukjhy6i] .hero__bg[data-astro-cid-aukjhy6i] {
            position: absolute;
            inset: 0
        }

        .hero--image-background[data-astro-cid-aukjhy6i] .hero__background-image[data-astro-cid-aukjhy6i] {
            z-index: 0;
            overflow: hidden
        }

        .hero--image-background[data-astro-cid-aukjhy6i] .hero__background-image[data-astro-cid-aukjhy6i] img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 25%;
            transform: scale(1.12) translate(8%)
        }

        .hero--image-background[data-astro-cid-aukjhy6i] .hero__bg[data-astro-cid-aukjhy6i] {
            z-index: 1;
            background: linear-gradient(90deg, #0a2149c7, #0a21498a 34%, #0a21492e)
        }

        .hero--image-background[data-astro-cid-aukjhy6i] .hero__inner[data-astro-cid-aukjhy6i] {
            z-index: 2
        }

        .hero--category[data-astro-cid-aukjhy6i].hero--image-background .hero__eyebrow[data-astro-cid-aukjhy6i],
        .hero--category[data-astro-cid-aukjhy6i].hero--image-background .hero__content[data-astro-cid-aukjhy6i]>.hero__headline[data-astro-cid-aukjhy6i],
        .hero--category[data-astro-cid-aukjhy6i].hero--image-background .hero__intro[data-astro-cid-aukjhy6i] {
            color: #fff
        }

        .hero--image-background[data-astro-cid-aukjhy6i] .hero__accent[data-astro-cid-aukjhy6i] {
            background: none;
            -webkit-text-fill-color: #f3b8bd;
            color: #f3b8bd
        }

        .hero--image-background[data-astro-cid-aukjhy6i] .hero__trustpilot-logo[data-astro-cid-aukjhy6i] text[data-astro-cid-aukjhy6i] {
            fill: #fff
        }

        .hero--image-background[data-astro-cid-aukjhy6i] .hero__trustpilot-score[data-astro-cid-aukjhy6i],
        .hero--image-background[data-astro-cid-aukjhy6i] .hero__trustpilot-count[data-astro-cid-aukjhy6i],
        .hero--image-background[data-astro-cid-aukjhy6i] .hero__breadcrumbs[data-astro-cid-aukjhy6i] .breadcrumbs,
        .hero--image-background[data-astro-cid-aukjhy6i] .hero__breadcrumbs[data-astro-cid-aukjhy6i] .breadcrumbs__link,
        .hero--image-background[data-astro-cid-aukjhy6i] .hero__breadcrumbs[data-astro-cid-aukjhy6i] .breadcrumbs__current,
        .hero--image-background[data-astro-cid-aukjhy6i] .hero__breadcrumbs[data-astro-cid-aukjhy6i] .breadcrumbs__sep {
            color: #fff
        }

        @media(max-width:1023px) {
            .hero--image-background[data-astro-cid-aukjhy6i] .hero__bullets-simple[data-astro-cid-aukjhy6i] li[data-astro-cid-aukjhy6i] {
                color: #fff
            }

            .hero--image-background[data-astro-cid-aukjhy6i] .hero__check-small[data-astro-cid-aukjhy6i] {
                color: #f3b8bd
            }
        }

        body:has(.hero--image-background) .header {
            --header-logo-filter: brightness(0) invert(1);
            border-bottom-color: #ffffff2e
        }

        body:has(.hero--image-background) .header__nav.hidden,
        body:has(.hero--image-background) .header__support,
        body:has(.hero--image-background) .header__icon {
            color: #fff
        }

        body:has(.hero--image-background) .header__support:hover,
        body:has(.hero--image-background) .header__icon:hover {
            background: #ffffff24;
            color: #fff
        }

        body:has(.hero--image-background) #astronav-menu {
            background-color: #ffffff24;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23ffffff' stroke-width='2' stroke-linecap='round'%3E%3Cpath d='M4 7h16M4 12h16M4 17h16'/%3E%3C/svg%3E")
        }

        body:has(.hero--image-background) #astronav-menu:hover {
            background-color: #ffffff38
        }

        body:has(.hero--image-background) #astronav-menu[aria-expanded=true] {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23ffffff' stroke-width='2' stroke-linecap='round'%3E%3Cpath d='M6 6l12 12M18 6l-12 12'/%3E%3C/svg%3E")
        }

        @media(min-width:1031px) {

            body:has(.hero--image-background) .header__nav-link,
            body:has(.hero--image-background) .header__nav-link:hover {
                color: #fff
            }
        }

        .hero--category[data-astro-cid-aukjhy6i] .hero__inner[data-astro-cid-aukjhy6i] {
            display: block;
            position: relative;
            z-index: 1;
            padding-inline: 1rem;
            gap: 1rem
        }

        @media(min-width:640px) {
            .hero--category[data-astro-cid-aukjhy6i] .hero__inner[data-astro-cid-aukjhy6i] {
                padding-inline: 1.5rem
            }
        }

        @media(min-width:1024px) {
            .hero--category[data-astro-cid-aukjhy6i] .hero__inner[data-astro-cid-aukjhy6i] {
                padding-inline: 2rem
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__inner--has-image[data-astro-cid-aukjhy6i] {
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-template-rows: auto 1fr;
                grid-template-areas: none;
                gap: 0 3rem;
                align-items: center
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__breadcrumbs[data-astro-cid-aukjhy6i] {
                grid-area: auto
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__inner--has-image[data-astro-cid-aukjhy6i] .hero__breadcrumbs[data-astro-cid-aukjhy6i] {
                grid-column: 1 / -1
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__inner--has-image[data-astro-cid-aukjhy6i] .hero__media[data-astro-cid-aukjhy6i] {
                grid-column: 2
            }
        }

        .hero__breadcrumbs[data-astro-cid-aukjhy6i] .breadcrumbs {
            padding: 4px 0
        }

        .hero--category[data-astro-cid-aukjhy6i] .hero__content[data-astro-cid-aukjhy6i] {
            max-width: 800px
        }

        .hero__top[data-astro-cid-aukjhy6i] {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 30px;
            margin-top: 2rem
        }

        .hero--category[data-astro-cid-aukjhy6i] .hero__eyebrow[data-astro-cid-aukjhy6i] {
            margin: 0;
            font-weight: 600
        }

        .hero__clinician[data-astro-cid-aukjhy6i] {
            display: grid;
            grid-template-columns: 3rem minmax(0, 1fr);
            gap: .75rem;
            align-items: center;
            width: fit-content;
            max-width: 100%;
            padding: .625rem .875rem .625rem .625rem;
            border: 1px solid rgba(10, 33, 73, .14);
            border-radius: 1rem;
            background: #ffffffe0;
            box-shadow: 0 10px 30px -24px #0a2149a6
        }

        .hero__clinician-image[data-astro-cid-aukjhy6i] {
            width: 3rem;
            height: 3rem;
            border-radius: 999px;
            object-fit: cover;
            border: 1px solid rgba(10, 33, 73, .16)
        }

        .hero__clinician-copy[data-astro-cid-aukjhy6i] {
            min-width: 0
        }

        .hero__clinician--has-note[data-astro-cid-aukjhy6i] {
            grid-template-columns: 3.5rem minmax(0, 1fr);
            gap: .25rem .75rem;
            align-items: start;
            width: 100%;
            padding: 0;
            border: 0;
            border-radius: 0;
            background: transparent;
            box-shadow: none
        }

        .hero__clinician--has-note[data-astro-cid-aukjhy6i] .hero__clinician-image[data-astro-cid-aukjhy6i] {
            grid-column: 1;
            grid-row: 1 / span 2;
            width: 3.5rem;
            height: 3.5rem
        }

        .hero__clinician--has-note[data-astro-cid-aukjhy6i] .hero__clinician-copy[data-astro-cid-aukjhy6i] {
            grid-column: 2;
            grid-row: 2
        }

        .hero__clinician-note[data-astro-cid-aukjhy6i] {
            grid-column: 2;
            grid-row: 1;
            margin: 0;
            padding: 0;
            color: var(--cta-primary)
        }

        .hero__clinician-note[data-astro-cid-aukjhy6i] p[data-astro-cid-aukjhy6i] {
            margin: 0;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.45
        }

        .hero__clinician-label[data-astro-cid-aukjhy6i],
        .hero__clinician-name[data-astro-cid-aukjhy6i],
        .hero__clinician-role[data-astro-cid-aukjhy6i] {
            margin: 0
        }

        .hero__clinician-label[data-astro-cid-aukjhy6i] {
            margin-bottom: .125rem;
            color: #4b5563;
            font-size: .6875rem;
            font-weight: 700;
            letter-spacing: .06em;
            line-height: 1.25;
            text-transform: uppercase
        }

        .hero__clinician-name[data-astro-cid-aukjhy6i] {
            color: var(--cta-primary);
            font-size: .9375rem;
            font-weight: 700;
            line-height: 1.3
        }

        .hero__clinician-name[data-astro-cid-aukjhy6i] a[data-astro-cid-aukjhy6i],
        .hero__clinician-role[data-astro-cid-aukjhy6i] a[data-astro-cid-aukjhy6i] {
            color: inherit;
            text-underline-offset: 2px
        }

        .hero__clinician-name[data-astro-cid-aukjhy6i] a[data-astro-cid-aukjhy6i] {
            text-decoration: none
        }

        .hero__clinician-name[data-astro-cid-aukjhy6i] a[data-astro-cid-aukjhy6i]:hover {
            text-decoration: underline
        }

        .hero__clinician-role[data-astro-cid-aukjhy6i] {
            color: #4b5563;
            font-size: .75rem;
            line-height: 1.35
        }

        .hero__clinician--has-note[data-astro-cid-aukjhy6i] .hero__clinician-name[data-astro-cid-aukjhy6i] {
            font-size: .9375rem
        }

        .hero__clinician--has-note[data-astro-cid-aukjhy6i] .hero__clinician-role[data-astro-cid-aukjhy6i] {
            margin-top: .125rem;
            font-size: .75rem
        }

        @media(min-width:1024px) {
            .hero__clinician[data-astro-cid-aukjhy6i] {
                margin-top: .25rem
            }
        }

        .hero__clinician--product[data-astro-cid-aukjhy6i] {
            margin: .75rem 0 1rem
        }

        .hero__clinician--media[data-astro-cid-aukjhy6i] {
            width: 100%;
            margin: .75rem 0 0
        }

        @media(min-width:1024px) {
            .hero--category[data-astro-cid-aukjhy6i] .hero__eyebrow[data-astro-cid-aukjhy6i] {
                margin-bottom: 0
            }
        }

        .hero--category[data-astro-cid-aukjhy6i] .hero__headline[data-astro-cid-aukjhy6i] {
            margin: 1rem 0;
            font-size: 2.5rem;
            font-weight: 600;
            display: block
        }

        .hero--category[data-astro-cid-aukjhy6i] .hero__headline[data-astro-cid-aukjhy6i]>span[data-astro-cid-aukjhy6i] {
            display: inline
        }

        @media(min-width:768px) {
            .hero--category[data-astro-cid-aukjhy6i] .hero__headline[data-astro-cid-aukjhy6i] {
                font-size: 2.5rem
            }
        }

        @media(min-width:1024px) {
            .hero--category[data-astro-cid-aukjhy6i] .hero__headline[data-astro-cid-aukjhy6i] {
                font-size: 3.25rem
            }
        }

        .hero--category[data-astro-cid-aukjhy6i] .hero__content[data-astro-cid-aukjhy6i]>.hero__headline[data-astro-cid-aukjhy6i] {
            color: var(--cta-primary);
            font-size: clamp(2.4rem, 4.5vw, 4.2rem);
            font-weight: 700;
            letter-spacing: -.045em;
            line-height: .92
        }

        .hero__accent[data-astro-cid-aukjhy6i] {
            margin-top: 0;
            margin-left: .35rem;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 600
        }

        .hero__intro[data-astro-cid-aukjhy6i] {
            margin: .75rem 0 0;
            font-size: .875rem;
            line-height: 1.6;
            color: #1f2937;
            max-width: 560px
        }

        @media(min-width:768px) {
            .hero__intro[data-astro-cid-aukjhy6i] {
                font-size: 1rem
            }
        }

        @media(min-width:1024px) {
            .hero__intro[data-astro-cid-aukjhy6i] {
                font-size: 1.125rem
            }
        }

        .hero__badge[data-astro-cid-aukjhy6i] {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 100px;
            font-size: 13px;
            font-weight: 500;
            color: #111827
        }

        .hero__badge[data-astro-cid-aukjhy6i] svg[data-astro-cid-aukjhy6i] {
            width: 14px;
            height: 14px;
            color: var(--accent-strong)
        }

        .hero__badge--image[data-astro-cid-aukjhy6i] {
            display: none
        }

        @media(min-width:1024px) {
            .hero__badge--image[data-astro-cid-aukjhy6i] {
                display: inline-flex;
                position: absolute;
                top: .75rem;
                left: .75rem;
                z-index: 2
            }

            .hero__top[data-astro-cid-aukjhy6i] .hero__badge--inline[data-astro-cid-aukjhy6i] {
                display: none
            }
        }

        .hero__cta-category[data-astro-cid-aukjhy6i] {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .45rem;
            border: 0;
            padding: .95rem 1.8rem;
            border-radius: 1rem;
            background: var(--cta-primary);
            color: #fff;
            cursor: pointer;
            font: inherit;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            line-height: 1.25;
            text-align: center;
            transition: box-shadow .15s ease
        }

        .hero__cta-category[data-astro-cid-aukjhy6i]:hover {
            box-shadow: 0 20px 25px -5px #0000001a, 0 8px 10px -6px #0000001a
        }

        .hero__cta-category--secondary[data-astro-cid-aukjhy6i] {
            background: #fff;
            color: var(--accent-strong);
            border: 2px solid var(--accent-strong)
        }

        .hero__cta-secondary-icon[data-astro-cid-aukjhy6i] {
            width: 1rem;
            height: 1rem;
            flex-shrink: 0;
            fill: currentColor
        }

        .hero__cta-category--secondary[data-astro-cid-aukjhy6i]:hover {
            background: var(--surface-tint)
        }

        .hero--image-background[data-astro-cid-aukjhy6i] .hero__cta-category[data-astro-cid-aukjhy6i],
        .hero--image-background[data-astro-cid-aukjhy6i] .hero__cta-category--secondary[data-astro-cid-aukjhy6i] {
            background: #fff;
            border: 0;
            color: var(--cta-primary)
        }

        .hero--image-background[data-astro-cid-aukjhy6i] .hero__cta-category[data-astro-cid-aukjhy6i]:hover,
        .hero--image-background[data-astro-cid-aukjhy6i] .hero__cta-category--secondary[data-astro-cid-aukjhy6i]:hover {
            background: var(--surface-tint)
        }

        .hero__cta-category--ai[data-astro-cid-aukjhy6i] {
            background: #fff;
            color: var(--accent-strong);
            border: 2px solid var(--accent-strong);
            border-radius: 1rem;
            gap: 6px;
            font-size: .8rem;
            font-weight: 400;
            padding: .4rem .9rem;
            transition: all .15s cubic-bezier(.4, 0, .2, 1)
        }

        .hero__cta-category--ai[data-astro-cid-aukjhy6i]:hover {
            background: var(--surface-tint)
        }

        .hero__cta-ai-wrapper[data-astro-cid-aukjhy6i] {
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-top: 6px
        }

        .hero__cta-ai-buttons[data-astro-cid-aukjhy6i] {
            display: flex;
            flex-wrap: wrap;
            gap: 8px
        }

        .hero--category[data-astro-cid-aukjhy6i][data-member-journey-pending=true] .hero__cta-wrapper[data-astro-cid-aukjhy6i] {
            visibility: hidden
        }

        .hero__cta-ai-label[data-astro-cid-aukjhy6i] {
            font-size: .65rem;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--muted)
        }

        .hero__cta-ai-icon[data-astro-cid-aukjhy6i] {
            width: 20px;
            height: 20px
        }

        .hero__cta-group-shell[data-astro-cid-aukjhy6i] {
            position: relative
        }

        .hero__cta-group-shell--reserved[data-astro-cid-aukjhy6i] {
            display: grid
        }

        .hero__cta-group-shell--reserved[data-astro-cid-aukjhy6i]>[data-astro-cid-aukjhy6i] {
            grid-area: 1 / 1
        }

        .hero__cta-group-shell--reserved[data-astro-cid-aukjhy6i]>[data-astro-cid-aukjhy6i][aria-hidden=true] {
            visibility: hidden;
            pointer-events: none
        }

        .hero__cta-group[data-astro-cid-aukjhy6i] {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            padding: 30px 0
        }

        .hero__cta-group--member[data-astro-cid-aukjhy6i] {
            align-items: flex-start;
            flex-direction: column
        }

        @media(min-width:1024px) {
            .hero__cta-group[data-astro-cid-aukjhy6i] {
                padding-top: 65px
            }
        }

        .hero__cta-note[data-astro-cid-aukjhy6i] {
            margin: .75rem 0 0;
            font-size: .875rem;
            line-height: 1.6;
            color: #1f2937
        }

        .hero__image-wrapper--category[data-astro-cid-aukjhy6i] {
            padding: 0;
            max-height: none
        }

        .hero__image--category[data-astro-cid-aukjhy6i] {
            width: 130%;
            height: 130%;
            object-fit: contain;
            object-position: 5% 35%
        }

        .hero--category[data-astro-cid-aukjhy6i] .hero__media[data-astro-cid-aukjhy6i] {
            display: none;
            grid-area: auto;
            margin-top: 0;
            margin-bottom: 0
        }

        .hero--category[data-astro-cid-aukjhy6i].hero--mobile-image .hero__media[data-astro-cid-aukjhy6i] {
            display: block;
            margin-top: 1.5rem;
            width: 100%
        }

        .hero--category[data-astro-cid-aukjhy6i].hero--mobile-image .hero__image-wrapper--category[data-astro-cid-aukjhy6i] {
            aspect-ratio: 16 / 9;
            max-height: none;
            padding: 0;
            background: #fff
        }

        .hero--category[data-astro-cid-aukjhy6i].hero--mobile-image .hero__image--category[data-astro-cid-aukjhy6i] {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center
        }

        @media(min-width:1024px) {
            .hero--category[data-astro-cid-aukjhy6i] .hero__media[data-astro-cid-aukjhy6i] {
                display: block;
                position: relative;
                height: auto;
                width: 550px;
                max-width: 100%;
                margin-left: auto;
                margin-right: auto
            }
        }

        .hero--category[data-astro-cid-aukjhy6i].hero--mobile-image .hero__image-wrapper--category[data-astro-cid-aukjhy6i] {
            aspect-ratio: auto;
            max-height: none;
            overflow: hidden;
            border-radius: 1rem;
            padding: 0;
            background: transparent
        }

        .hero--category[data-astro-cid-aukjhy6i].hero--mobile-image .hero__image--category[data-astro-cid-aukjhy6i] {
            display: block;
            width: 100%;
            height: auto;
            object-fit: contain;
            object-position: center;
            border-radius: 1rem
        }

        @media(max-width:640px) {
            .hero--category[data-astro-cid-aukjhy6i] .hero__bullets-simple[data-astro-cid-aukjhy6i] {
                margin-top: .75rem;
                padding-top: 0;
                gap: .375rem
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__media[data-astro-cid-aukjhy6i] {
                margin-top: 0
            }
        }

        @media(max-width:700px) {
            .hero__breadcrumbs[data-astro-cid-aukjhy6i] .breadcrumbs {
                padding: 2px 0
            }

            .hero__top[data-astro-cid-aukjhy6i] {
                gap: 8px;
                margin-top: 1rem;
                margin-bottom: .875rem
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__headline[data-astro-cid-aukjhy6i] {
                margin: 0;
                font-size: clamp(2.125rem, 10.25vw, 2.5rem);
                line-height: 1.04
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__trustpilot-inline[data-astro-cid-aukjhy6i] {
                margin-top: .875rem;
                gap: .5rem;
                flex-wrap: wrap
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__trustpilot-logo[data-astro-cid-aukjhy6i] {
                height: 1rem
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__trustpilot-rating[data-astro-cid-aukjhy6i] {
                gap: .4rem
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__trustpilot-star[data-astro-cid-aukjhy6i],
            .hero--category[data-astro-cid-aukjhy6i] .hero__trustpilot-star[data-astro-cid-aukjhy6i] svg[data-astro-cid-aukjhy6i] {
                width: 16px;
                height: 16px
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__cta-group[data-astro-cid-aukjhy6i] {
                gap: .625rem;
                padding: 1rem 0
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__cta-ai-wrapper[data-astro-cid-aukjhy6i] {
                margin-top: 0
            }

            .hero__top[data-astro-cid-aukjhy6i] .hero__badge--inline[data-astro-cid-aukjhy6i] {
                display: none
            }

            .hero--category[data-astro-cid-aukjhy6i] .hero__cta-category[data-astro-cid-aukjhy6i] {
                width: 100%
            }
        }

        .subscribe-save-logo[data-astro-cid-rilhhfi7] {
            display: grid;
            width: max-content;
            color: #fff;
            font-family: var(--hero-font);
            font-size: clamp(1.6rem, 3vw, 2.75rem);
            font-weight: 700;
            letter-spacing: -.055em;
            line-height: .84
        }

        .subscribe-save-logo__save-line[data-astro-cid-rilhhfi7] {
            display: inline-flex;
            align-items: center;
            gap: .18em
        }

        .subscribe-save-logo__pound-mark[data-astro-cid-rilhhfi7] {
            display: inline-flex;
            align-items: center;
            width: 1.7em;
            height: .88em;
            padding-left: .09em;
            border: 2px solid #5d86ff;
            border-radius: 999px
        }

        .subscribe-save-logo__pound-mark[data-astro-cid-rilhhfi7] span[data-astro-cid-rilhhfi7] {
            display: inline-grid;
            width: 1.42em;
            height: 1.42em;
            place-items: center;
            border-radius: 50%;
            background: #5d86ff;
            color: #fff;
            font-size: .48em;
            font-weight: 700;
            letter-spacing: 0;
            line-height: 1
        }

        .notification[data-astro-cid-dltolib4] {
            padding: 28px min(8vw, 110px);
            background: var(--surface-tint)
        }

        .notification__inner[data-astro-cid-dltolib4] {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: auto minmax(0, 1fr);
            gap: 16px;
            align-items: start;
            padding: 0
        }

        .notification--media[data-astro-cid-dltolib4] .notification__inner[data-astro-cid-dltolib4] {
            grid-template-columns: 132px minmax(0, 1fr);
            gap: 30px;
            align-items: center
        }

        .notification--subscribe-save[data-astro-cid-dltolib4] {
            background: var(--cta-primary)
        }

        .notification--subscribe-save[data-astro-cid-dltolib4] .notification__inner[data-astro-cid-dltolib4] {
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 24px;
            align-items: center
        }

        .notification--subscribe-save[data-astro-cid-dltolib4] .notification__content[data-astro-cid-dltolib4] {
            order: 1
        }

        .notification__marker[data-astro-cid-dltolib4] {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 999px;
            background: #e7f0ff;
            color: #1a3d7a;
            flex-shrink: 0;
            overflow: hidden
        }

        .notification__marker--media[data-astro-cid-dltolib4] {
            width: 132px;
            height: 132px;
            border-radius: 28px;
            background: transparent;
            overflow: visible
        }

        .notification__marker--subscribe-save[data-astro-cid-dltolib4] {
            width: auto;
            height: auto;
            border-radius: 0;
            background: transparent;
            overflow: visible;
            order: 2;
            justify-self: end
        }

        .notification__marker[data-astro-cid-dltolib4] svg[data-astro-cid-dltolib4] {
            width: 18px;
            height: 18px
        }

        .notification__marker-image[data-astro-cid-dltolib4] {
            display: block;
            width: 124px;
            height: 124px;
            max-width: 124px;
            max-height: 124px;
            object-fit: contain
        }

        .notification__title[data-astro-cid-dltolib4] {
            margin: 0 0 8px;
            color: #1a3d7a;
            font-size: 16px;
            font-weight: 600;
            line-height: 1.4
        }

        .notification--subscribe-save[data-astro-cid-dltolib4] .notification__title[data-astro-cid-dltolib4] {
            color: #f3b8bd
        }

        .notification__content[data-astro-cid-dltolib4] p[data-astro-cid-dltolib4]:not(.notification__title) {
            margin: 0;
            max-width: 900px;
            color: #4b5563;
            font-size: 15px;
            font-weight: 400;
            line-height: 1.6
        }

        .notification--subscribe-save[data-astro-cid-dltolib4] .notification__content[data-astro-cid-dltolib4] p[data-astro-cid-dltolib4]:not(.notification__title) {
            color: #ffffffeb
        }

        .notification__content[data-astro-cid-dltolib4] a[data-astro-cid-dltolib4] {
            display: inline-flex;
            margin-top: 10px;
            color: #1a3d7a;
            font-size: 15px;
            font-weight: 600;
            text-decoration: underline;
            text-underline-offset: 3px
        }

        .notification--subscribe-save[data-astro-cid-dltolib4] .notification__content[data-astro-cid-dltolib4] a[data-astro-cid-dltolib4],
        .notification--subscribe-save[data-astro-cid-dltolib4] .notification__content[data-astro-cid-dltolib4] a[data-astro-cid-dltolib4]:hover {
            color: #f3b8bd
        }

        .notification__content[data-astro-cid-dltolib4] a[data-astro-cid-dltolib4]:hover {
            color: #102a55
        }

        @media(max-width:700px) {
            .notification[data-astro-cid-dltolib4] {
                padding: 24px
            }

            .notification__inner[data-astro-cid-dltolib4] {
                grid-template-columns: 1fr;
                gap: 10px;
                padding: 16px
            }

            .notification--media[data-astro-cid-dltolib4] .notification__inner[data-astro-cid-dltolib4] {
                grid-template-columns: 92px minmax(0, 1fr);
                gap: 16px;
                align-items: center;
                padding: 14px 0
            }

            .notification--subscribe-save[data-astro-cid-dltolib4] .notification__inner[data-astro-cid-dltolib4] {
                grid-template-columns: 1fr;
                gap: 12px;
                padding: 16px
            }

            .notification__marker[data-astro-cid-dltolib4] {
                display: none
            }

            .notification__marker--media[data-astro-cid-dltolib4] {
                display: inline-flex;
                width: 92px;
                height: 92px;
                border-radius: 20px
            }

            .notification__marker--subscribe-save[data-astro-cid-dltolib4] {
                display: inline-flex
            }

            .notification__marker-image[data-astro-cid-dltolib4] {
                width: 88px;
                height: 88px;
                max-width: 88px;
                max-height: 88px
            }

            .notification__title[data-astro-cid-dltolib4] {
                padding-left: 10px;
                border-left: 3px solid #1a3d7a
            }
        }

        .faq-table[data-astro-cid-u3flae7l] {
            margin-top: 12px;
            overflow-x: auto
        }

        .faq-table[data-astro-cid-u3flae7l] table[data-astro-cid-u3flae7l] {
            width: 100%;
            border-collapse: collapse;
            font-size: inherit;
            color: inherit
        }

        .faq-table[data-astro-cid-u3flae7l] th[data-astro-cid-u3flae7l],
        .faq-table[data-astro-cid-u3flae7l] td[data-astro-cid-u3flae7l] {
            padding: 10px 12px;
            border: 1px solid var(--accent);
            text-align: left;
            vertical-align: top;
            font-weight: inherit
        }

        .faq-table[data-astro-cid-u3flae7l] thead[data-astro-cid-u3flae7l] th[data-astro-cid-u3flae7l] {
            color: #fff;
            font-weight: 600;
            background: transparent;
            border-color: var(--accent-strong)
        }

        .faq-table[data-astro-cid-u3flae7l] thead[data-astro-cid-u3flae7l] tr[data-astro-cid-u3flae7l] {
            background: var(--accent-gradient)
        }

        @media(max-width:700px) {

            .faq-table[data-astro-cid-u3flae7l] th[data-astro-cid-u3flae7l],
            .faq-table[data-astro-cid-u3flae7l] td[data-astro-cid-u3flae7l] {
                padding: 8px 10px
            }
        }

        .mfaq[data-astro-cid-c5xvugsv] {
            padding: 83px min(8vw, 110px) 59px;
            background: #fff
        }

        .mfaq__inner[data-astro-cid-c5xvugsv] {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(0, .9fr) minmax(0, 1.1fr);
            gap: 48px
        }

        .mfaq__intro[data-astro-cid-c5xvugsv] {
            align-self: start
        }

        .mfaq__intro[data-astro-cid-c5xvugsv] h2[data-astro-cid-c5xvugsv] {
            margin: 0 0 12px;
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 500
        }

        .mfaq__intro[data-astro-cid-c5xvugsv] p[data-astro-cid-c5xvugsv] {
            margin: 0;
            color: #4b5563;
            line-height: 1.7;
            font-size: .9375rem;
            font-weight: 400
        }

        @media(min-width:1024px) {
            .mfaq__intro[data-astro-cid-c5xvugsv] p[data-astro-cid-c5xvugsv] {
                font-size: 1.125rem
            }
        }

        .mfaq__list[data-astro-cid-c5xvugsv] {
            display: grid;
            gap: 12px
        }

        .mfaq__list[data-astro-cid-c5xvugsv] details[data-astro-cid-c5xvugsv] {
            border-bottom: 1px solid #e5e7eb;
            padding: 18px 0
        }

        .mfaq__list[data-astro-cid-c5xvugsv] details[data-astro-cid-c5xvugsv]:last-child {
            border-bottom: none
        }

        .mfaq__list[data-astro-cid-c5xvugsv] summary[data-astro-cid-c5xvugsv] {
            cursor: pointer;
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px
        }

        .mfaq__list[data-astro-cid-c5xvugsv] summary[data-astro-cid-c5xvugsv]::-webkit-details-marker {
            display: none
        }

        .mfaq__list[data-astro-cid-c5xvugsv] summary[data-astro-cid-c5xvugsv] h3[data-astro-cid-c5xvugsv] {
            margin: 0;
            font-weight: 500;
            font-size: 16px;
            line-height: 1.4
        }

        .mfaq__list[data-astro-cid-c5xvugsv] summary[data-astro-cid-c5xvugsv]:after {
            content: "+";
            font-size: 20px;
            font-weight: 400;
            color: #6b7280;
            flex-shrink: 0;
            transition: transform .2s ease
        }

        .mfaq__list[data-astro-cid-c5xvugsv] details[data-astro-cid-c5xvugsv][open] summary[data-astro-cid-c5xvugsv]:after {
            content: "−"
        }

        .mfaq__answer[data-astro-cid-c5xvugsv],
        .mfaq__answer[data-astro-cid-c5xvugsv] p {
            margin: 12px 0 0;
            color: #4b5563;
            line-height: 1.6;
            font-size: 16px;
            font-weight: 400
        }

        .mfaq__answer[data-astro-cid-c5xvugsv] p:first-child {
            margin-top: 0
        }

        .mfaq__answer[data-astro-cid-c5xvugsv] ul,
        .mfaq__answer[data-astro-cid-c5xvugsv] ol {
            margin: 12px 0 0;
            padding-left: 1.25rem;
            color: #4b5563;
            line-height: 1.6;
            font-size: 16px;
            font-weight: 400
        }

        .mfaq__answer[data-astro-cid-c5xvugsv] li {
            margin: 6px 0;
            color: #4b5563;
            line-height: 1.6;
            font-size: 16px;
            font-weight: 400
        }

        .mfaq__answer[data-astro-cid-c5xvugsv] strong {
            color: #111827;
            font-weight: 600
        }

        .mfaq__answer[data-astro-cid-c5xvugsv] a {
            color: #1a3d7a;
            font-weight: 600;
            text-decoration: underline;
            text-underline-offset: 2px
        }

        .mfaq__answer[data-astro-cid-c5xvugsv] .faq-table {
            margin-top: 12px;
            overflow-x: auto
        }

        .mfaq__answer[data-astro-cid-c5xvugsv] .faq-table table {
            width: 100%;
            border-collapse: collapse;
            font-size: inherit;
            color: inherit
        }

        .mfaq__answer[data-astro-cid-c5xvugsv] .faq-table th,
        .mfaq__answer[data-astro-cid-c5xvugsv] .faq-table td {
            padding: 10px 12px;
            border: 1px solid var(--accent);
            text-align: left;
            vertical-align: top;
            font-weight: inherit
        }

        .mfaq__answer[data-astro-cid-c5xvugsv] .faq-table thead th {
            color: #fff;
            font-weight: 600;
            background: transparent;
            border-color: var(--accent-strong)
        }

        .mfaq__answer[data-astro-cid-c5xvugsv] .faq-table thead tr {
            background: var(--accent-gradient)
        }

        @media(max-width:960px) {
            .mfaq__inner[data-astro-cid-c5xvugsv] {
                grid-template-columns: 1fr
            }
        }

        @media(max-width:700px) {
            .mfaq[data-astro-cid-c5xvugsv] {
                padding: 67px 24px 43px
            }
        }

        .expert[data-astro-cid-qcdr3nby] {
            padding: 67px min(8vw, 110px);
            background: var(--surface-tint)
        }

        .expert__inner[data-astro-cid-qcdr3nby] {
            max-width: 1200px;
            margin: 0 auto
        }

        .expert__inner[data-astro-cid-qcdr3nby] h2[data-astro-cid-qcdr3nby] {
            margin: 0 0 32px;
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 500;
            color: #111827
        }

        .expert__content[data-astro-cid-qcdr3nby] {
            position: relative;
            display: grid;
            gap: 18px;
            padding-left: 48px
        }

        .expert__quote[data-astro-cid-qcdr3nby] {
            position: absolute;
            left: 0;
            top: -8px;
            font-size: clamp(64px, 10vw, 120px);
            line-height: .9;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            color: transparent;
            font-family: ui-serif, Georgia, Cambria, Times New Roman, Times, serif
        }

        .expert__text[data-astro-cid-qcdr3nby] {
            display: grid;
            gap: 12px;
            color: #1f2937;
            line-height: 1.7;
            max-width: none;
            font-size: 16px;
            font-weight: 400;
            padding-left: 30px
        }

        .expert__text[data-astro-cid-qcdr3nby] p[data-astro-cid-qcdr3nby] {
            margin: 0
        }

        .expert__author[data-astro-cid-qcdr3nby] {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 8px
        }

        .expert__author[data-astro-cid-qcdr3nby] img[data-astro-cid-qcdr3nby] {
            border-radius: 999px;
            border: 1px solid var(--accent-strong);
            object-fit: cover
        }

        .expert__name[data-astro-cid-qcdr3nby] {
            margin: 0;
            font-weight: 600;
            font-size: 24px;
            color: #111827
        }

        .expert__name[data-astro-cid-qcdr3nby] a[data-astro-cid-qcdr3nby] {
            color: inherit;
            text-decoration: none
        }

        .expert__name[data-astro-cid-qcdr3nby] a[data-astro-cid-qcdr3nby]:hover {
            text-decoration: underline;
            text-underline-offset: 3px
        }

        .expert__role[data-astro-cid-qcdr3nby] {
            margin: 2px 0 0;
            color: #374151;
            font-size: 16px;
            font-weight: 400
        }

        .expert__date[data-astro-cid-qcdr3nby] {
            margin: 6px 0 0;
            font-size: 12px;
            color: #6b7280;
            font-weight: 400
        }

        @media(max-width:700px) {
            .expert[data-astro-cid-qcdr3nby] {
                padding: 59px 24px
            }

            .expert__content[data-astro-cid-qcdr3nby] {
                padding-left: 0;
                display: flex;
                flex-direction: row;
                align-items: flex-start;
                gap: 8px
            }

            .expert__quote[data-astro-cid-qcdr3nby] {
                position: static;
                font-size: 48px;
                line-height: 1;
                flex-shrink: 0;
                margin-top: -8px
            }

            .expert__text[data-astro-cid-qcdr3nby] {
                padding-left: 0
            }
        }

        .comparison[data-astro-cid-tjwoxfji] {
            padding: 67px min(8vw, 110px);
            background: #fff
        }

        .comparison__inner[data-astro-cid-tjwoxfji] {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(0, .9fr) minmax(0, 1.1fr);
            gap: 48px
        }

        .comparison__header[data-astro-cid-tjwoxfji] {
            align-self: start
        }

        .comparison__title[data-astro-cid-tjwoxfji] {
            margin: 0 0 12px;
            display: block;
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 500;
            line-height: 1.2
        }

        .comparison__header[data-astro-cid-tjwoxfji] p[data-astro-cid-tjwoxfji] {
            margin: 0;
            color: #4b5563;
            line-height: 1.7;
            font-size: .9375rem;
            font-weight: 400
        }

        @media(min-width:1024px) {
            .comparison__header[data-astro-cid-tjwoxfji] p[data-astro-cid-tjwoxfji] {
                font-size: 1.125rem
            }
        }

        .comparison__content[data-astro-cid-tjwoxfji] h3[data-astro-cid-tjwoxfji] {
            margin: 0 0 16px;
            font-size: 1.125rem;
            font-weight: 600;
            color: #111827
        }

        .comparison__table[data-astro-cid-tjwoxfji] {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 8px
        }

        .comparison__thead[data-astro-cid-tjwoxfji] {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            background: #f5f5f5;
            border-bottom: 1px solid #e5e7eb
        }

        .comparison__th[data-astro-cid-tjwoxfji] {
            padding: 12px 16px;
            font-size: .9375rem;
            font-weight: 600;
            text-align: center;
            color: #111827
        }

        .comparison__th--label[data-astro-cid-tjwoxfji] {
            text-align: left
        }

        .comparison__row[data-astro-cid-tjwoxfji] {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            border-bottom: 1px solid #e5e7eb
        }

        .comparison__row[data-astro-cid-tjwoxfji]:last-child {
            border-bottom: none
        }

        .comparison__row[data-astro-cid-tjwoxfji][data-odd=true] {
            background: #fafafa
        }

        .comparison__cell[data-astro-cid-tjwoxfji] {
            padding: 12px 16px;
            font-size: .875rem;
            color: #374151;
            text-align: center
        }

        .comparison__link[data-astro-cid-tjwoxfji] {
            color: inherit;
            text-decoration: underline;
            text-underline-offset: 2px
        }

        .comparison__link[data-astro-cid-tjwoxfji]:hover {
            color: var(--accent-strong)
        }

        .comparison__cell--label[data-astro-cid-tjwoxfji] {
            font-weight: 600;
            color: #111827;
            text-align: left
        }

        .comparison__footnote[data-astro-cid-tjwoxfji] {
            margin: 0 0 24px;
            font-size: .8125rem;
            color: #6b7280;
            font-style: italic
        }

        .comparison__footnote[data-astro-cid-tjwoxfji] a[data-astro-cid-tjwoxfji] {
            color: inherit;
            text-underline-offset: .15em
        }

        .comparison__evidence[data-astro-cid-tjwoxfji] {
            margin: 24px 0;
            padding: 20px;
            border-left: 3px solid var(--accent-strong);
            background: #f8fafc
        }

        .comparison__evidence[data-astro-cid-tjwoxfji] h3[data-astro-cid-tjwoxfji] {
            margin-bottom: 8px
        }

        .comparison__evidence[data-astro-cid-tjwoxfji] p[data-astro-cid-tjwoxfji] {
            margin: 0 0 8px;
            font-size: .9375rem;
            line-height: 1.6;
            color: #4b5563
        }

        .comparison__evidence[data-astro-cid-tjwoxfji] a[data-astro-cid-tjwoxfji] {
            font-size: .875rem;
            font-weight: 600;
            color: var(--accent-strong);
            text-underline-offset: .15em
        }

        .comparison__guide[data-astro-cid-tjwoxfji] {
            padding-top: 24px;
            border-top: 1px solid #e5e7eb
        }

        .comparison__guide[data-astro-cid-tjwoxfji] p[data-astro-cid-tjwoxfji] {
            margin: 0 0 12px;
            font-size: .9375rem;
            line-height: 1.6;
            color: #4b5563
        }

        .comparison__guide[data-astro-cid-tjwoxfji] p[data-astro-cid-tjwoxfji]:last-child {
            margin-bottom: 0
        }

        .comparison__guide[data-astro-cid-tjwoxfji] strong[data-astro-cid-tjwoxfji] {
            color: #111827;
            font-weight: 600
        }

        @media(max-width:960px) {
            .comparison__inner[data-astro-cid-tjwoxfji] {
                grid-template-columns: 1fr
            }
        }

        @media(max-width:700px) {
            .comparison[data-astro-cid-tjwoxfji] {
                padding: 59px 24px
            }

            .comparison__table[data-astro-cid-tjwoxfji] {
                font-size: .8125rem
            }

            .comparison__th[data-astro-cid-tjwoxfji],
            .comparison__cell[data-astro-cid-tjwoxfji] {
                padding: 10px 8px
            }
        }

        @media(max-width:500px) {

            .comparison__thead[data-astro-cid-tjwoxfji],
            .comparison__row[data-astro-cid-tjwoxfji] {
                grid-template-columns: 1.2fr 1fr 1fr
            }

            .comparison__cell[data-astro-cid-tjwoxfji] {
                font-size: .75rem
            }
        }

        .gb[data-astro-cid-z5kj5jqh] {
            background: linear-gradient(to bottom, #a0baff, #e9f0fc);
            border-radius: 16px;
            padding: 1.5rem 1.75rem;
            position: relative;
            overflow: hidden;
            height: 100%;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 1.25rem
        }

        .gb__headline[data-astro-cid-z5kj5jqh] {
            margin: 0;
            font-size: .95rem;
            line-height: 1.5;
            color: #0f1f3d;
            position: relative;
            z-index: 1
        }

        .gb__headline[data-astro-cid-z5kj5jqh] strong[data-astro-cid-z5kj5jqh] {
            font-weight: 700
        }

        .gb__bars[data-astro-cid-z5kj5jqh] {
            display: flex;
            flex-direction: column;
            gap: .65rem;
            position: relative;
            z-index: 1
        }

        .gb__bar-row[data-astro-cid-z5kj5jqh] {
            display: flex;
            align-items: center;
            gap: .75rem
        }

        .gb__bar-wrap[data-astro-cid-z5kj5jqh] {
            width: 45%;
            flex-shrink: 0;
            background: #ffffff73;
            border-radius: 999px;
            height: 16px;
            overflow: hidden
        }

        .gb__bar[data-astro-cid-z5kj5jqh] {
            height: 100%;
            border-radius: 999px
        }

        .gb__bar--dark[data-astro-cid-z5kj5jqh] {
            background: #0f1f3d
        }

        .gb__bar--blue[data-astro-cid-z5kj5jqh] {
            background: #4b71f5
        }

        .gb__bar--pink[data-astro-cid-z5kj5jqh] {
            background: #f4c4c4
        }

        .gb__bar--light[data-astro-cid-z5kj5jqh] {
            background: #ffffffd9
        }

        .gb__label[data-astro-cid-z5kj5jqh] {
            font-size: .82rem;
            color: #1a2e4a;
            line-height: 1.3;
            white-space: nowrap
        }

        .gb__label[data-astro-cid-z5kj5jqh] strong[data-astro-cid-z5kj5jqh] {
            font-weight: 700
        }

        .gb__image[data-astro-cid-z5kj5jqh] {
            position: absolute;
            bottom: 0;
            right: -10px;
            width: 60%;
            height: auto;
            object-fit: contain;
            object-position: bottom right;
            z-index: 0;
            pointer-events: none
        }

        @media(max-width:720px) {
            .gb[data-astro-cid-z5kj5jqh] {
                padding-bottom: 12rem
            }
        }

        .other-treatments[data-astro-cid-zgpvztlc] {
            background: #fff;
            padding: 34px min(8vw, 110px)
        }

        .other-treatments__inner[data-astro-cid-zgpvztlc] {
            max-width: 1200px;
            margin: 0 auto
        }

        .other-treatments__header[data-astro-cid-zgpvztlc] {
            max-width: 760px;
            margin-bottom: 16px
        }

        .other-treatments[data-astro-cid-zgpvztlc] h2[data-astro-cid-zgpvztlc] {
            margin: 0;
            color: #111827;
            font-size: clamp(28px, 3vw, 36px);
            line-height: 1.15;
            font-weight: 500;
            letter-spacing: 0
        }

        .other-treatments__cards[data-astro-cid-zgpvztlc] {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px
        }

        .other-treatments__card[data-astro-cid-zgpvztlc] {
            position: relative;
            min-height: 9.25rem;
            overflow: hidden;
            border: var(--card-border);
            border-radius: 20px;
            background: #fff;
            color: inherit;
            text-decoration: none;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: border-color .18s ease
        }

        .other-treatments__card[data-astro-cid-zgpvztlc]:hover,
        .other-treatments__card[data-astro-cid-zgpvztlc]:focus-visible {
            border-color: #0d3478;
            outline: none
        }

        .other-treatments__copy[data-astro-cid-zgpvztlc] {
            position: relative;
            z-index: 1;
            max-width: 12rem
        }

        .other-treatments__copy[data-astro-cid-zgpvztlc] h3[data-astro-cid-zgpvztlc] {
            margin: 0;
            color: #111827;
            font-size: 1.125rem;
            line-height: 1.25;
            font-weight: 600;
            letter-spacing: 0
        }

        .other-treatments__copy[data-astro-cid-zgpvztlc] p[data-astro-cid-zgpvztlc] {
            margin: .35rem 0 0;
            color: #4b5563;
            font-size: .875rem;
            line-height: 1.5;
            font-weight: 400
        }

        .other-treatments__image[data-astro-cid-zgpvztlc] {
            position: absolute;
            right: -.75rem;
            bottom: -1rem;
            width: min(52%, 9rem);
            height: 5.75rem;
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
            pointer-events: none
        }

        .other-treatments__image[data-astro-cid-zgpvztlc] img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: right bottom
        }

        @media(max-width:760px) {
            .other-treatments[data-astro-cid-zgpvztlc] {
                padding: 36px 24px
            }

            .other-treatments__cards[data-astro-cid-zgpvztlc] {
                grid-template-columns: 1fr;
                gap: 16px
            }

            .other-treatments__card[data-astro-cid-zgpvztlc] {
                min-height: 8rem;
                padding: 18px
            }

            .other-treatments__image[data-astro-cid-zgpvztlc] {
                width: 7rem;
                height: 5rem
            }
        }

        .guides[data-astro-cid-vaftliw6] {
            padding: 83px min(8vw, 110px);
            background: var(--surface-tint);
            overflow-x: hidden
        }

        .guides__inner[data-astro-cid-vaftliw6] {
            max-width: 1200px;
            margin: 0 auto
        }

        .guides__inner[data-astro-cid-vaftliw6] h2[data-astro-cid-vaftliw6] {
            margin: 0 0 24px;
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 500
        }

        .guides__grid[data-astro-cid-vaftliw6] {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            max-width: 100%;
            contain: layout paint
        }

        .guides__card[data-astro-cid-vaftliw6] {
            text-decoration: none;
            color: inherit;
            border-radius: 18px;
            background: #fff;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            transition: transform .2s ease, border-color .2s ease
        }

        .guides__card[data-astro-cid-vaftliw6]:hover {
            transform: translateY(-3px);
            border-color: var(--accent)
        }

        .guides__image[data-astro-cid-vaftliw6] {
            aspect-ratio: 4 / 3;
            overflow: hidden;
            background: #e2e8f0
        }

        .guides__image[data-astro-cid-vaftliw6] img[data-astro-cid-vaftliw6] {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s ease
        }

        .guides__card[data-astro-cid-vaftliw6]:hover img[data-astro-cid-vaftliw6] {
            transform: scale(1.04)
        }

        .guides__meta[data-astro-cid-vaftliw6] {
            padding: 16px
        }

        .guides__meta[data-astro-cid-vaftliw6] .guides__title[data-astro-cid-vaftliw6] {
            margin: 0;
            font-size: 18px;
            line-height: 1.4;
            font-weight: 500
        }

        .guides__pathway-row[data-astro-cid-vaftliw6] {
            margin-top: clamp(28px, 3vw, 36px)
        }

        .guides__pathway[data-astro-cid-vaftliw6] {
            display: inline-flex;
            color: #1a3d7a;
            font-size: 16px;
            font-weight: 600;
            line-height: 1.5;
            text-decoration: underline;
            text-underline-offset: 3px
        }

        .guides__pathway[data-astro-cid-vaftliw6]:hover {
            color: var(--accent-strong)
        }

        @media(max-width:700px) {
            .guides[data-astro-cid-vaftliw6] {
                padding: 67px 24px
            }

            .guides__grid[data-astro-cid-vaftliw6] {
                display: flex;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                gap: 16px;
                padding-bottom: 8px;
                -webkit-overflow-scrolling: touch;
                max-width: 100%;
                overscroll-behavior-x: contain;
                contain: layout paint
            }

            .guides__card[data-astro-cid-vaftliw6] {
                min-width: 80%;
                scroll-snap-align: start
            }
        }

        .sr-only[data-astro-cid-5jyhelqc] {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0
        }

        .titration[data-astro-cid-5jyhelqc] {
            padding: 83px min(8vw, 110px) 59px;
            background: var(--surface-tint)
        }

        .titration__inner[data-astro-cid-5jyhelqc] {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(0, .9fr) minmax(0, 1.1fr);
            gap: 48px
        }

        .titration__header[data-astro-cid-5jyhelqc] {
            align-self: start
        }

        .titration__header[data-astro-cid-5jyhelqc] h2[data-astro-cid-5jyhelqc] {
            margin: 0 0 12px;
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 500
        }

        .titration__header[data-astro-cid-5jyhelqc] p[data-astro-cid-5jyhelqc] {
            margin: 0;
            color: #4b5563;
            line-height: 1.7;
            font-size: .9375rem;
            font-weight: 400
        }

        @media(min-width:1024px) {
            .titration__header[data-astro-cid-5jyhelqc] p[data-astro-cid-5jyhelqc] {
                font-size: 1.125rem
            }
        }

        .titration__content[data-astro-cid-5jyhelqc] {
            display: grid;
            gap: 16px
        }

        .titration__schedule[data-astro-cid-5jyhelqc] {
            display: grid;
            gap: 6px
        }

        .titration__simple-header[data-astro-cid-5jyhelqc] {
            display: grid;
            grid-template-columns: minmax(120px, 160px) minmax(160px, 220px) minmax(180px, 1fr) minmax(120px, 180px);
            gap: 16px;
            padding: 0 14px 8px;
            color: #21468b;
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase
        }

        .titration__row[data-astro-cid-5jyhelqc] {
            display: flex;
            align-items: center;
            gap: 16px;
            background: var(--accent-strong);
            color: #fff;
            border-radius: 8px;
            padding: 10px 14px
        }

        .titration__dosage[data-astro-cid-5jyhelqc] {
            min-width: 140px;
            display: flex;
            flex-direction: column;
            gap: 2px
        }

        .titration__dose-value[data-astro-cid-5jyhelqc] {
            font-size: 1.25rem;
            font-weight: 600;
            line-height: 1
        }

        .titration__dose-unit[data-astro-cid-5jyhelqc] {
            font-size: .75rem;
            font-weight: 400;
            margin-left: 2px
        }

        .titration__expected[data-astro-cid-5jyhelqc] {
            font-size: .7rem;
            opacity: .85;
            margin-top: 2px
        }

        .titration__weeks[data-astro-cid-5jyhelqc] {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(var(--titration-columns, 4), minmax(0, 1fr));
            gap: 6px
        }

        .titration__row--simple[data-astro-cid-5jyhelqc] {
            display: grid;
            grid-template-columns: minmax(120px, 160px) minmax(160px, 220px) minmax(180px, 1fr) minmax(120px, 180px);
            align-items: center
        }

        .titration__row--simple[data-astro-cid-5jyhelqc] .titration__dosage[data-astro-cid-5jyhelqc] {
            min-width: 0
        }

        .titration__simple-frequency[data-astro-cid-5jyhelqc],
        .titration__simple-main[data-astro-cid-5jyhelqc],
        .titration__simple-note[data-astro-cid-5jyhelqc] {
            display: flex;
            flex-direction: column;
            justify-content: center
        }

        .titration__simple-frequency-text[data-astro-cid-5jyhelqc] {
            font-size: .8125rem;
            font-weight: 500;
            line-height: 1.4
        }

        .titration__simple-main[data-astro-cid-5jyhelqc] {
            padding-right: 12px
        }

        .titration__simple-note[data-astro-cid-5jyhelqc] {
            align-items: flex-start;
            text-align: left
        }

        .titration__week[data-astro-cid-5jyhelqc] {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center
        }

        .titration__week-label[data-astro-cid-5jyhelqc] {
            font-size: .8125rem;
            font-weight: 600
        }

        .titration__week-note[data-astro-cid-5jyhelqc] {
            font-size: .625rem;
            opacity: .85;
            margin-top: 2px
        }

        .titration__disclaimer[data-astro-cid-5jyhelqc] {
            margin: 0;
            font-size: .8125rem;
            color: #6b7280;
            font-style: italic
        }

        @media(max-width:960px) {
            .titration__inner[data-astro-cid-5jyhelqc] {
                grid-template-columns: 1fr
            }
        }

        @media(max-width:700px) {
            .titration[data-astro-cid-5jyhelqc] {
                padding: 67px 24px 43px
            }

            .titration__row[data-astro-cid-5jyhelqc] {
                padding: 10px 12px;
                gap: 12px
            }

            .titration__simple-header[data-astro-cid-5jyhelqc] {
                display: none
            }

            .titration__row--simple[data-astro-cid-5jyhelqc] {
                grid-template-columns: minmax(90px, 110px) minmax(110px, 150px) minmax(120px, 1fr) minmax(80px, 120px)
            }

            .titration__dosage[data-astro-cid-5jyhelqc] {
                min-width: 0
            }

            .titration__dose-value[data-astro-cid-5jyhelqc] {
                font-size: 1.125rem
            }

            .titration__simple-frequency-text[data-astro-cid-5jyhelqc],
            .titration__week-label[data-astro-cid-5jyhelqc] {
                font-size: .75rem
            }

            .titration__week-note[data-astro-cid-5jyhelqc] {
                font-size: .5625rem
            }
        }

        @media(max-width:500px) {
            .titration__row--simple[data-astro-cid-5jyhelqc] {
                grid-template-columns: 1fr;
                gap: 6px
            }

            .titration__simple-frequency[data-astro-cid-5jyhelqc],
            .titration__simple-main[data-astro-cid-5jyhelqc],
            .titration__simple-note[data-astro-cid-5jyhelqc] {
                align-items: flex-start;
                text-align: left
            }

            .titration__weeks[data-astro-cid-5jyhelqc] {
                grid-template-columns: repeat(min(var(--titration-columns, 4), 2), 1fr);
                gap: 4px
            }

            .titration__week[data-astro-cid-5jyhelqc] {
                padding: 2px 0
            }
        }

        .pricing-table[data-astro-cid-qjgbc3at] {
            padding: 67px min(8vw, 110px);
            background: #fff
        }

        .pricing-table__inner[data-astro-cid-qjgbc3at] {
            max-width: 1200px;
            margin: 0 auto
        }

        .pricing-table__header[data-astro-cid-qjgbc3at] {
            margin-bottom: 32px
        }

        .pricing-table__header[data-astro-cid-qjgbc3at] h2[data-astro-cid-qjgbc3at] {
            margin: 0 0 12px;
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 500
        }

        .pricing-table__header[data-astro-cid-qjgbc3at] p[data-astro-cid-qjgbc3at] {
            margin: 0;
            color: #4b5563;
            font-size: .9375rem;
            line-height: 1.7;
            font-weight: 400
        }

        @media(min-width:1024px) {
            .pricing-table__header[data-astro-cid-qjgbc3at] p[data-astro-cid-qjgbc3at] {
                font-size: 1.125rem
            }
        }

        .pricing-table__wrap[data-astro-cid-qjgbc3at] {
            overflow-x: auto;
            min-width: 0;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            margin-bottom: 16px
        }

        .pricing-table__table[data-astro-cid-qjgbc3at] {
            width: 100%;
            border-collapse: collapse;
            font-size: .9375rem
        }

        .pricing-table__th[data-astro-cid-qjgbc3at] {
            padding: .875rem 1.25rem;
            text-align: left;
            font-size: .75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .05em;
            color: #6b7280;
            border-bottom: 1px solid #e5e7eb;
            background: #fff
        }

        .pricing-table__th--right[data-astro-cid-qjgbc3at] {
            text-align: right
        }

        .pricing-table__row[data-astro-cid-qjgbc3at] {
            border-bottom: 1px solid #e5e7eb
        }

        .pricing-table__row[data-astro-cid-qjgbc3at]:last-child {
            border-bottom: none
        }

        .pricing-table__td[data-astro-cid-qjgbc3at] {
            padding: 1rem 1.25rem;
            color: #111827;
            vertical-align: middle
        }

        .pricing-table__td--dose[data-astro-cid-qjgbc3at] {
            font-weight: 600
        }

        .pricing-table__td--right[data-astro-cid-qjgbc3at] {
            text-align: right
        }

        .pricing-table__price[data-astro-cid-qjgbc3at] {
            font-weight: 700;
            color: var(--accent-strong)
        }

        .pricing-table__badge[data-astro-cid-qjgbc3at] {
            display: inline-block;
            padding: .2rem .6rem;
            border-radius: 999px;
            font-size: .75rem;
            font-weight: 500
        }

        .pricing-table__badge--starter-dose[data-astro-cid-qjgbc3at] {
            background: var(--accent-surface-blue-start);
            color: var(--accent-strong)
        }

        .pricing-table__badge--titration[data-astro-cid-qjgbc3at] {
            background: #f3f4f6;
            color: #4b5563
        }

        .pricing-table__badge--maintenance[data-astro-cid-qjgbc3at],
        .pricing-table__badge--extended-maintenance[data-astro-cid-qjgbc3at] {
            background: var(--accent-surface-blue-end);
            color: var(--accent-strong)
        }

        .pricing-table__footnote[data-astro-cid-qjgbc3at] {
            margin: 0 0 24px;
            font-size: 13px;
            color: #6b7280;
            line-height: 1.5;
            font-weight: 400
        }

        @media(max-width:700px) {
            .pricing-table[data-astro-cid-qjgbc3at] {
                padding: 59px 24px
            }

            .pricing-table__th[data-astro-cid-qjgbc3at],
            .pricing-table__td[data-astro-cid-qjgbc3at] {
                padding: .75rem 1rem
            }
        }

        .reviews[data-astro-cid-e7nvnouf] {
            padding: 67px min(8vw, 110px);
            background: var(--surface-tint);
            overflow-x: hidden
        }

        .reviews__inner[data-astro-cid-e7nvnouf] {
            max-width: 1200px;
            margin: 0 auto
        }

        .reviews__header[data-astro-cid-e7nvnouf] {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            flex-wrap: wrap
        }

        .reviews__title-group[data-astro-cid-e7nvnouf] {
            display: flex;
            flex-direction: column;
            gap: 8px
        }

        .reviews__heading[data-astro-cid-e7nvnouf] {
            margin: 0
        }

        .reviews__aggregate[data-astro-cid-e7nvnouf] {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .reviews__score[data-astro-cid-e7nvnouf] {
            font-size: 14px;
            color: #1f2937;
            font-weight: 500
        }

        .reviews__trustpilot-brand[data-astro-cid-e7nvnouf] {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 600;
            color: #191919;
            flex: 0 0 auto
        }

        .reviews__trustpilot-star[data-astro-cid-e7nvnouf] {
            font-size: 16px;
            line-height: 1;
            color: #00b67a
        }

        .reviews__header[data-astro-cid-e7nvnouf]>a[data-astro-cid-e7nvnouf] {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--accent-strong);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px
        }

        .reviews__header[data-astro-cid-e7nvnouf]>a[data-astro-cid-e7nvnouf] svg[data-astro-cid-e7nvnouf] {
            width: 18px;
            height: 18px
        }

        .reviews__grid[data-astro-cid-e7nvnouf] {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            gap: 16px;
            margin-top: 24px;
            max-width: 100%;
            padding-bottom: 8px;
            -webkit-overflow-scrolling: touch;
            overscroll-behavior-x: contain;
            contain: layout paint
        }

        .reviews__card[data-astro-cid-e7nvnouf] {
            background: #fff;
            border-radius: 16px;
            padding: 18px;
            border: var(--card-border);
            display: grid;
            gap: 10px;
            min-height: 240px;
            min-width: min(360px, calc(100vw - 64px));
            max-width: 360px;
            flex: 0 0 auto;
            scroll-snap-align: start
        }

        .reviews__author[data-astro-cid-e7nvnouf] {
            margin: 0;
            font-size: 14px;
            font-weight: 500
        }

        .reviews__rating[data-astro-cid-e7nvnouf] {
            display: flex;
            align-items: center;
            gap: 8px
        }

        .reviews__stars[data-astro-cid-e7nvnouf] {
            display: inline-flex;
            gap: 3px;
            color: #dcdce6
        }

        .reviews__sr-only[data-astro-cid-e7nvnouf] {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0
        }

        .reviews__stars[data-astro-cid-e7nvnouf] svg[data-astro-cid-e7nvnouf] {
            width: 16px;
            height: 16px;
            fill: currentColor
        }

        .reviews__stars[data-astro-cid-e7nvnouf] .is-active[data-astro-cid-e7nvnouf] {
            color: var(--accent-strong)
        }

        .reviews__stars--large[data-astro-cid-e7nvnouf] {
            gap: 2px
        }

        .reviews__stars--large[data-astro-cid-e7nvnouf] svg[data-astro-cid-e7nvnouf] {
            width: 24px;
            height: 24px
        }

        .reviews__star-wrapper[data-astro-cid-e7nvnouf] {
            position: relative;
            display: inline-block
        }

        .reviews__star-bg[data-astro-cid-e7nvnouf] {
            color: #dcdce6
        }

        .reviews__star-fill[data-astro-cid-e7nvnouf] {
            position: absolute;
            top: 0;
            left: 0;
            color: var(--accent-strong)
        }

        .reviews__verified[data-astro-cid-e7nvnouf] {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            color: var(--accent-strong)
        }

        .reviews__verified[data-astro-cid-e7nvnouf] svg[data-astro-cid-e7nvnouf] {
            width: 12px;
            height: 12px
        }

        .reviews__review-body[data-astro-cid-e7nvnouf] {
            margin: 0;
            font-size: 14px;
            line-height: 1.45;
            font-weight: 500;
            display: -webkit-box;
            -webkit-line-clamp: 8;
            -webkit-box-orient: vertical;
            overflow: hidden
        }

        .reviews__date[data-astro-cid-e7nvnouf] {
            margin: auto 0 0;
            font-size: 12px;
            color: #6b7280;
            font-weight: 400
        }

        .reviews__grid[data-astro-cid-e7nvnouf]::-webkit-scrollbar {
            height: 8px
        }

        .reviews__grid[data-astro-cid-e7nvnouf]::-webkit-scrollbar-thumb {
            background: #0f766e47;
            border-radius: 999px
        }

        .reviews__grid[data-astro-cid-e7nvnouf]::-webkit-scrollbar-track {
            background: #e5e7ebe6;
            border-radius: 999px
        }

        @media(max-width:700px) {
            .reviews[data-astro-cid-e7nvnouf] {
                padding: 59px 24px
            }

            .reviews__card[data-astro-cid-e7nvnouf] {
                min-width: 80%;
                max-width: 80%
            }
        }

        .reviews[data-astro-cid-oprczqrd] {
            padding: 67px min(8vw, 110px);
            background: var(--surface-tint);
            overflow-x: hidden
        }

        .reviews__inner[data-astro-cid-oprczqrd] {
            max-width: 1200px;
            margin: 0 auto
        }

        .reviews__header[data-astro-cid-oprczqrd] {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            flex-wrap: wrap
        }

        .reviews__title-group[data-astro-cid-oprczqrd] {
            display: flex;
            flex-direction: column;
            gap: 8px
        }

        .reviews__heading[data-astro-cid-oprczqrd] {
            margin: 0
        }

        .reviews__aggregate[data-astro-cid-oprczqrd] {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .reviews__score[data-astro-cid-oprczqrd] {
            font-size: 14px;
            color: #1f2937;
            font-weight: 500
        }

        .reviews__trustpilot-brand[data-astro-cid-oprczqrd] {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 600;
            color: #191919;
            flex: 0 0 auto
        }

        .reviews__trustpilot-star[data-astro-cid-oprczqrd] {
            font-size: 16px;
            line-height: 1;
            color: #00b67a
        }

        .reviews__header[data-astro-cid-oprczqrd]>a[data-astro-cid-oprczqrd] {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--accent-strong);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px
        }

        .reviews__header[data-astro-cid-oprczqrd]>a[data-astro-cid-oprczqrd] svg[data-astro-cid-oprczqrd] {
            width: 18px;
            height: 18px
        }

        .reviews__grid[data-astro-cid-oprczqrd] {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            gap: 16px;
            margin-top: 24px;
            max-width: 100%;
            padding-bottom: 8px;
            -webkit-overflow-scrolling: touch;
            overscroll-behavior-x: contain;
            contain: layout paint
        }

        .reviews__card[data-astro-cid-oprczqrd] {
            background: #fff;
            border-radius: 16px;
            padding: 18px;
            border: var(--card-border);
            display: grid;
            gap: 10px;
            min-height: 280px;
            min-width: min(360px, calc(100vw - 64px));
            max-width: 360px;
            flex: 0 0 auto;
            scroll-snap-align: start
        }

        .reviews__author[data-astro-cid-oprczqrd] {
            margin: 0;
            font-size: 14px;
            font-weight: 500
        }

        .reviews__author[data-astro-cid-oprczqrd] a[data-astro-cid-oprczqrd],
        .reviews__review-title[data-astro-cid-oprczqrd] a[data-astro-cid-oprczqrd] {
            color: inherit;
            text-decoration: none
        }

        .reviews__author[data-astro-cid-oprczqrd] a[data-astro-cid-oprczqrd]:hover,
        .reviews__author[data-astro-cid-oprczqrd] a[data-astro-cid-oprczqrd]:focus-visible,
        .reviews__review-title[data-astro-cid-oprczqrd] a[data-astro-cid-oprczqrd]:hover,
        .reviews__review-title[data-astro-cid-oprczqrd] a[data-astro-cid-oprczqrd]:focus-visible {
            text-decoration: underline;
            text-underline-offset: .16em
        }

        .reviews__card[data-astro-cid-oprczqrd] header[data-astro-cid-oprczqrd] p[data-astro-cid-oprczqrd] {
            margin: 4px 0 0;
            color: #6b7280;
            font-size: 12px;
            font-weight: 400
        }

        .reviews__rating[data-astro-cid-oprczqrd] {
            display: flex;
            align-items: center;
            gap: 8px
        }

        .reviews__stars[data-astro-cid-oprczqrd] {
            display: inline-flex;
            gap: 3px;
            color: #dcdce6
        }

        .reviews__sr-only[data-astro-cid-oprczqrd] {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0
        }

        .reviews__stars[data-astro-cid-oprczqrd] svg[data-astro-cid-oprczqrd] {
            width: 16px;
            height: 16px;
            fill: currentColor
        }

        .reviews__stars[data-astro-cid-oprczqrd] .is-active[data-astro-cid-oprczqrd] {
            color: var(--accent-strong)
        }

        .reviews__stars--large[data-astro-cid-oprczqrd] {
            gap: 2px
        }

        .reviews__stars--large[data-astro-cid-oprczqrd] svg[data-astro-cid-oprczqrd] {
            width: 24px;
            height: 24px
        }

        .reviews__star-wrapper[data-astro-cid-oprczqrd] {
            position: relative;
            display: inline-block
        }

        .reviews__star-bg[data-astro-cid-oprczqrd] {
            color: #dcdce6
        }

        .reviews__star-fill[data-astro-cid-oprczqrd] {
            position: absolute;
            top: 0;
            left: 0;
            color: var(--accent-strong)
        }

        .reviews__verified[data-astro-cid-oprczqrd] {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            color: var(--accent-strong)
        }

        .reviews__verified[data-astro-cid-oprczqrd] svg[data-astro-cid-oprczqrd] {
            width: 12px;
            height: 12px
        }

        .reviews__review-title[data-astro-cid-oprczqrd] {
            margin: 0;
            font-size: 14px;
            font-weight: 500
        }

        .reviews__text[data-astro-cid-oprczqrd] {
            margin: 0;
            font-size: 12px;
            line-height: 1.6;
            color: #374151;
            font-weight: 400;
            display: -webkit-box;
            -webkit-line-clamp: 6;
            -webkit-box-orient: vertical;
            overflow: hidden
        }

        .reviews__date[data-astro-cid-oprczqrd] {
            margin: auto 0 0;
            font-size: 12px;
            color: #6b7280;
            font-weight: 400
        }

        .reviews__footer[data-astro-cid-oprczqrd] {
            margin-top: 20px;
            display: flex;
            justify-content: flex-start
        }

        .reviews__trustpilot-link[data-astro-cid-oprczqrd] {
            display: inline-block;
            transition: opacity .2s ease
        }

        .reviews__trustpilot-link[data-astro-cid-oprczqrd]:hover {
            opacity: .8
        }

        .reviews__grid[data-astro-cid-oprczqrd]::-webkit-scrollbar {
            height: 8px
        }

        .reviews__grid[data-astro-cid-oprczqrd]::-webkit-scrollbar-thumb {
            background: #0f766e47;
            border-radius: 999px
        }

        .reviews__grid[data-astro-cid-oprczqrd]::-webkit-scrollbar-track {
            background: #e5e7ebe6;
            border-radius: 999px
        }

        @media(max-width:700px) {
            .reviews[data-astro-cid-oprczqrd] {
                padding: 59px 24px
            }

            .reviews__card[data-astro-cid-oprczqrd] {
                min-width: 80%;
                max-width: 80%
            }
        }

        .wpt[data-astro-cid-i7z4trlf] {
            --wpt-brand: #1d5cff;
            --wpt-cornflower: #5283ff;
            --wpt-navy: #0a1f44;
            --wpt-ink: #15213a;
            --wpt-muted: #667085;
            --wpt-soft: #f5f8ff;
            --wpt-line: #d8e2ff;
            --wpt-line-strong: #b9ccff;
            --wpt-radius: 18px;
            --wpt-cta-gradient: var(--cta-primary, #1a3d7a);
            --wpt-cta-radius: .75rem;
            --wpt-cta-shadow: none;
            --wpt-cta-shadow-hover: none;
            color: var(--wpt-ink)
        }

        .wpt[data-astro-cid-i7z4trlf] .wpt-svg {
            width: 100%;
            height: 100%;
            display: block
        }

        .wpt[data-astro-cid-i7z4trlf] [data-astro-cid-i7z4trlf][hidden] {
            display: none !important
        }

        .wpt[data-astro-cid-i7z4trlf] button[data-astro-cid-i7z4trlf],
        .wpt[data-astro-cid-i7z4trlf] a[data-astro-cid-i7z4trlf] {
            font: inherit
        }

        .wpt[data-astro-cid-i7z4trlf] button[data-astro-cid-i7z4trlf] {
            cursor: pointer
        }

        .wpt[data-astro-cid-i7z4trlf] button[data-astro-cid-i7z4trlf]:focus-visible,
        .wpt[data-astro-cid-i7z4trlf] a[data-astro-cid-i7z4trlf]:focus-visible {
            outline: 3px solid rgba(29, 92, 255, .32);
            outline-offset: 3px
        }

        .wpt-nudge[data-astro-cid-i7z4trlf] {
            width: min(100%, 36rem);
            background: linear-gradient(180deg, #f9fbff, #f3f7ff);
            border: 1px solid var(--wpt-line-strong);
            border-radius: var(--wpt-radius);
            box-shadow: 0 14px 30px #0d327a1f;
            padding: 1.35rem 1.35rem 1.1rem
        }

        .wpt-nudge__inner[data-astro-cid-i7z4trlf] {
            display: grid;
            grid-template-columns: auto minmax(0, 1fr) auto;
            gap: 1rem;
            align-items: center
        }

        .wpt-nudge__glyph[data-astro-cid-i7z4trlf],
        .wpt-floating__glyph[data-astro-cid-i7z4trlf] {
            width: 3.35rem;
            height: 3.35rem;
            border-radius: .9rem;
            background: linear-gradient(135deg, #3653ff, var(--wpt-brand));
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: .9rem;
            box-shadow: 0 10px 18px #1d5cff47;
            flex-shrink: 0
        }

        .wpt-nudge__copy[data-astro-cid-i7z4trlf] {
            min-width: 0
        }

        .wpt-nudge__kicker[data-astro-cid-i7z4trlf],
        .wpt-floating__kicker[data-astro-cid-i7z4trlf] {
            margin: 0 0 .18rem;
            font-size: .76rem;
            line-height: 1.1;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .04em;
            color: #315bff
        }

        .wpt-nudge__title[data-astro-cid-i7z4trlf],
        .wpt-floating__title[data-astro-cid-i7z4trlf] {
            margin: 0;
            font-size: 20px;
            line-height: 1.12;
            font-weight: 700;
            color: var(--wpt-navy);
            letter-spacing: 0
        }

        .wpt-nudge__sub[data-astro-cid-i7z4trlf],
        .wpt-floating__sub[data-astro-cid-i7z4trlf] {
            margin: .25rem 0 0;
            font-size: 16px;
            line-height: 1.35;
            font-weight: 500;
            color: var(--wpt-muted)
        }

        .wpt-nudge__button[data-astro-cid-i7z4trlf],
        .wpt-floating__button[data-astro-cid-i7z4trlf] {
            border: 0;
            border-radius: var(--wpt-cta-radius);
            background: var(--wpt-cta-gradient);
            color: #fff;
            min-height: 3rem;
            min-width: 8.25rem;
            padding: .875rem 1.375rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            font-size: 18px !important;
            font-weight: 600 !important;
            line-height: 1.2 !important;
            letter-spacing: -.005em;
            white-space: nowrap;
            box-shadow: var(--wpt-cta-shadow);
            transition: transform .18s ease, box-shadow .18s ease, opacity .18s ease
        }

        .wpt-nudge__button[data-astro-cid-i7z4trlf]:hover,
        .wpt-floating__button[data-astro-cid-i7z4trlf]:hover {
            opacity: .92;
            box-shadow: var(--wpt-cta-shadow-hover)
        }

        .wpt-button-icon[data-astro-cid-i7z4trlf],
        .wpt-note-icon[data-astro-cid-i7z4trlf],
        .wpt-floating__button[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf]:last-child,
        .wpt-floating__close[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            width: 18px !important;
            height: 18px !important;
            display: inline-flex;
            flex-shrink: 0;
            font-weight: 700 !important
        }

        .wpt-button-icon[data-astro-cid-i7z4trlf],
        .wpt-floating__button[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf]:last-child,
        .wpt-action__icon[data-astro-cid-i7z4trlf] {
            transition: transform .18s ease
        }

        .wpt-nudge__button[data-astro-cid-i7z4trlf]:hover .wpt-button-icon[data-astro-cid-i7z4trlf],
        .wpt-floating__button[data-astro-cid-i7z4trlf]:hover span[data-astro-cid-i7z4trlf]:last-child {
            transform: translate(3px)
        }

        .wpt-nudge__note[data-astro-cid-i7z4trlf] {
            margin: 1rem 0 0;
            display: flex;
            align-items: flex-start;
            gap: .45rem;
            font-size: .78rem;
            line-height: 1.35;
            font-weight: 650;
            color: #7b8497
        }

        .wpt-note-icon[data-astro-cid-i7z4trlf] {
            margin-top: .08rem
        }

        .wpt-floating[data-astro-cid-i7z4trlf] {
            position: fixed;
            inset: 0;
            z-index: 900;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.25rem;
            background: #1010127a;
            backdrop-filter: blur(6px);
            opacity: 0;
            pointer-events: none;
            transition: opacity .18s ease, backdrop-filter .18s ease
        }

        .wpt-floating[data-astro-cid-i7z4trlf].is-visible {
            opacity: 1;
            pointer-events: auto
        }

        .wpt-floating__card[data-astro-cid-i7z4trlf] {
            position: relative;
            width: min(480px, calc(100vw - 32px));
            background: #fff;
            border: 1px solid rgba(226, 232, 245, .95);
            border-radius: 16px;
            box-shadow: 0 20px 54px #0a1f442e;
            padding: 24px 16px;
            text-align: center;
            transform: translateY(10px) scale(.98);
            transition: transform .18s ease;
            font-family: Montserrat, system-ui, sans-serif
        }

        .wpt-floating[data-astro-cid-i7z4trlf].is-visible .wpt-floating__card[data-astro-cid-i7z4trlf] {
            transform: translateY(0) scale(1)
        }

        .wpt-floating__close[data-astro-cid-i7z4trlf] {
            width: 24px;
            height: 24px;
            border: 1px solid #e5e7eb;
            border-radius: 999px;
            background: #fff;
            color: #101828;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2px;
            margin: 0 -5px -17px auto;
            position: relative;
            z-index: 1
        }

        .wpt-floating__heading[data-astro-cid-i7z4trlf] {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            margin: 0 auto;
            width: 100%;
            max-width: 448px;
            min-height: 30px;
            padding-inline: 24px 48px
        }

        .wpt-floating__glyph[data-astro-cid-i7z4trlf] {
            width: 20px;
            height: 20px;
            display: inline-flex;
            flex-shrink: 0;
            border-radius: 0;
            background: transparent;
            color: var(--wpt-navy);
            fill: currentColor;
            padding: 0;
            box-shadow: none
        }

        .wpt-floating__button[data-astro-cid-i7z4trlf] {
            margin-top: 24px;
            width: 100%;
            height: 54px;
            min-height: 54px;
            border-radius: 16px;
            padding: 16px 24px;
            background: var(--cta-primary, #1a3d7a);
            font-size: 18px;
            font-weight: 600;
            line-height: 1
        }

        .wpt-floating__title[data-astro-cid-i7z4trlf] {
            margin: 0;
            color: #101828;
            font-size: 24px;
            font-weight: 700;
            line-height: 30px;
            max-width: 390px;
            white-space: nowrap
        }

        .wpt-floating__sub[data-astro-cid-i7z4trlf] {
            margin: 12px auto 0;
            max-width: 448px;
            color: #344054;
            font-size: 16px;
            font-weight: 500;
            line-height: 160%
        }

        .wpt-floating__note[data-astro-cid-i7z4trlf] {
            margin: 12px auto 0;
            display: flex;
            justify-content: center;
            gap: 4px;
            max-width: 430px;
            color: #667085;
            font-size: 12px;
            font-weight: 400;
            line-height: 140%;
            text-align: left
        }

        .wpt-floating__button[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf]:last-child {
            width: 20px;
            height: 20px
        }

        .wpt-floating__close[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            width: 16px;
            height: 16px
        }

        .wpt-floating__note[data-astro-cid-i7z4trlf] .wpt-note-icon[data-astro-cid-i7z4trlf] {
            width: 14px;
            height: 14px;
            margin-top: 1px
        }

        .wpt-scrim[data-astro-cid-i7z4trlf] {
            position: fixed;
            inset: 0;
            z-index: 1000;
            display: flex;
            justify-content: flex-end;
            background: #040e236b;
            opacity: 0;
            overflow: hidden;
            pointer-events: none;
            transition: opacity .22s ease
        }

        .wpt-scrim[data-astro-cid-i7z4trlf].is-open {
            opacity: 1;
            pointer-events: auto
        }

        .wpt-dialog[data-astro-cid-i7z4trlf] {
            position: relative;
            width: min(48rem, calc(100vw - 2rem));
            height: 100vh;
            height: 100svh;
            height: 100dvh;
            max-height: 100vh;
            max-height: 100svh;
            max-height: 100dvh;
            min-height: 0;
            overflow: hidden;
            background: #fff;
            display: grid;
            grid-template-rows: auto auto minmax(0, 1fr) auto auto;
            box-shadow: -24px 0 70px #0a1f4442;
            transform: translate(100%);
            transition: transform .24s cubic-bezier(.2, .8, .2, 1)
        }

        .wpt-scrim[data-astro-cid-i7z4trlf].is-open .wpt-dialog[data-astro-cid-i7z4trlf] {
            transform: translate(0)
        }

        .wpt-head[data-astro-cid-i7z4trlf] {
            flex-shrink: 0;
            padding: 0;
            background: linear-gradient(135deg, #f4fbfb, #eef4ff);
            border-bottom: 1px solid #e5e7eb
        }

        .wpt-head__top[data-astro-cid-i7z4trlf] {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            min-height: 54px;
            padding: 0 24px
        }

        .wpt-mobile-back[data-astro-cid-i7z4trlf] {
            display: none
        }

        .wpt-brand[data-astro-cid-i7z4trlf] {
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 0
        }

        .wpt-brand__mark[data-astro-cid-i7z4trlf] {
            width: 20px;
            height: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 0;
            background: transparent;
            color: #0d3478;
            font-size: 0;
            padding: 0;
            flex-shrink: 0
        }

        .wpt-brand__mark[data-astro-cid-i7z4trlf]:before {
            content: "";
            width: 20px;
            height: 20px;
            display: block;
            background: currentColor;
            clip-path: polygon(50% 0%, 61% 36%, 100% 50%, 61% 64%, 50% 100%, 39% 64%, 0% 50%, 39% 36%)
        }

        .wpt-brand[data-astro-cid-i7z4trlf] h2[data-astro-cid-i7z4trlf] {
            margin: 0;
            color: var(--wpt-navy);
            font-size: 1rem;
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: 0
        }

        .wpt-brand[data-astro-cid-i7z4trlf] h2[data-astro-cid-i7z4trlf]:before {
            content: "Simple Insights"
        }

        .wpt-brand[data-astro-cid-i7z4trlf] h2[data-astro-cid-i7z4trlf] {
            font-size: 0
        }

        .wpt-brand[data-astro-cid-i7z4trlf] h2[data-astro-cid-i7z4trlf]:before {
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.2
        }

        .wpt-help[data-astro-cid-i7z4trlf] {
            margin-left: auto;
            width: 24px;
            height: 24px;
            border: 1px solid #b8c5d8;
            border-radius: 999px;
            background: #fff;
            color: #101828;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            font-size: 14px;
            font-weight: 700;
            line-height: 1;
            flex-shrink: 0
        }

        .wpt-close[data-astro-cid-i7z4trlf] {
            width: 24px;
            height: 24px;
            border: 0;
            border-radius: 999px;
            background: transparent;
            color: #101828;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 2px;
            flex-shrink: 0
        }

        .wpt-close[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            width: 16px;
            height: 16px
        }

        .wpt-progress[data-astro-cid-i7z4trlf] {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0;
            padding: 24px 86px;
            background: #fff
        }

        .wpt-progress-meta[data-astro-cid-i7z4trlf] {
            display: block;
            color: #344054;
            font-size: 12px;
            font-weight: 700;
            line-height: 5px;
            width: 56px;
            white-space: nowrap;
            flex: 0 0 56px
        }

        .wpt-progress__seg[data-astro-cid-i7z4trlf] {
            height: 5px;
            flex: 1 1 0;
            border-radius: 999px;
            background: #d0d5dd;
            overflow: hidden
        }

        .wpt-progress__seg[data-astro-cid-i7z4trlf]:before {
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, var(--wpt-brand), var(--wpt-cornflower));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .22s ease
        }

        .wpt-progress__seg[data-astro-cid-i7z4trlf].is-done:before,
        .wpt-progress__seg[data-astro-cid-i7z4trlf].is-active:before {
            transform: scaleX(1)
        }

        .wpt-body[data-astro-cid-i7z4trlf] {
            flex: 1 1 auto;
            min-height: 0;
            overflow: auto;
            overscroll-behavior: contain;
            padding: 36px 86px 2rem;
            scroll-padding-block: 16px 24px;
            background: linear-gradient(180deg, #fff, #fbfcff)
        }

        .wpt-step[data-astro-cid-i7z4trlf] {
            max-width: 612px
        }

        .wpt-step--take[data-astro-cid-i7z4trlf] {
            max-width: 580px;
            margin-inline: auto
        }

        .wpt-step__eyebrow[data-astro-cid-i7z4trlf] {
            display: none;
            margin: 0 0 .5rem;
            font-size: .72rem;
            line-height: 1.2;
            font-weight: 850;
            text-transform: uppercase;
            letter-spacing: .04em;
            color: var(--wpt-brand)
        }

        .wpt-step__title[data-astro-cid-i7z4trlf] {
            margin: 0;
            color: var(--wpt-navy);
            font-size: clamp(1.45rem, 4vw, 2rem);
            line-height: 1.08;
            font-weight: 850;
            letter-spacing: 0
        }

        .wpt-step__lead[data-astro-cid-i7z4trlf] {
            margin: .7rem 0 0;
            color: var(--wpt-muted);
            font-size: .98rem;
            line-height: 1.55
        }

        .wpt-options[data-astro-cid-i7z4trlf],
        .wpt-points[data-astro-cid-i7z4trlf],
        .wpt-reasons[data-astro-cid-i7z4trlf] {
            display: flex;
            flex-direction: column;
            gap: .85rem;
            margin-top: 1.55rem
        }

        .wpt-option[data-astro-cid-i7z4trlf] {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 1rem;
            text-align: left;
            border: 2px solid #d7deed;
            border-radius: 1.05rem;
            background: #fff;
            min-height: 4.9rem;
            padding: .95rem 1rem;
            color: var(--wpt-ink);
            box-shadow: 0 8px 18px #0f172a08;
            transition: border-color .18s ease, background .18s ease, box-shadow .18s ease, transform .18s ease
        }

        .wpt-option[data-astro-cid-i7z4trlf]:hover {
            border-color: #b9ccff;
            transform: translateY(-1px)
        }

        .wpt-option[data-astro-cid-i7z4trlf].is-selected {
            border-color: #3653ff;
            background: #eef4ff;
            box-shadow: 0 16px 30px #1d5cff1f
        }

        .wpt-option__glyph[data-astro-cid-i7z4trlf],
        .wpt-point__glyph[data-astro-cid-i7z4trlf],
        .wpt-reason__glyph[data-astro-cid-i7z4trlf] {
            width: 2.65rem;
            height: 2.65rem;
            border-radius: .75rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #f3f5f9;
            color: var(--wpt-navy);
            padding: .72rem;
            flex-shrink: 0
        }

        .wpt-option[data-astro-cid-i7z4trlf].is-selected .wpt-option__glyph[data-astro-cid-i7z4trlf],
        .wpt-reason__glyph[data-astro-cid-i7z4trlf] {
            background: var(--wpt-brand);
            color: #fff
        }

        .wpt-option__copy[data-astro-cid-i7z4trlf] {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: .24rem
        }

        .wpt-option__title[data-astro-cid-i7z4trlf] {
            font-size: .98rem;
            line-height: 1.25;
            font-weight: 800;
            color: var(--wpt-navy);
            letter-spacing: 0
        }

        .wpt-option__desc[data-astro-cid-i7z4trlf] {
            font-size: .82rem;
            line-height: 1.4;
            color: var(--wpt-muted)
        }

        .wpt-option__check[data-astro-cid-i7z4trlf] {
            width: 1.65rem;
            height: 1.65rem;
            border: 2px solid #d2daf0;
            border-radius: 999px;
            padding: .3rem;
            color: transparent;
            flex-shrink: 0
        }

        .wpt-option[data-astro-cid-i7z4trlf].is-selected .wpt-option__check[data-astro-cid-i7z4trlf] {
            background: #3653ff;
            border-color: #3653ff;
            color: #fff
        }

        .wpt-followup[data-astro-cid-i7z4trlf] {
            margin-top: 1.55rem;
            padding-top: 1.55rem;
            border-top: 1px dashed #c8d2e4
        }

        .wpt-followup[data-astro-cid-i7z4trlf].is-revealing {
            animation: wpt-fade-rise .24s ease both
        }

        .wpt-followup--visible[data-astro-cid-i7z4trlf] {
            display: block
        }

        .wpt-followup__head[data-astro-cid-i7z4trlf] {
            display: flex;
            align-items: center;
            gap: .5rem;
            color: var(--wpt-navy);
            font-weight: 800
        }

        .wpt-followup__head[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf]:first-child {
            width: 1.05rem;
            height: 1.05rem;
            color: var(--wpt-brand)
        }

        .wpt-followup__sub[data-astro-cid-i7z4trlf] {
            margin: .35rem 0 0;
            color: var(--wpt-muted);
            font-size: .9rem;
            line-height: 1.45
        }

        .wpt-point[data-astro-cid-i7z4trlf],
        .wpt-reason[data-astro-cid-i7z4trlf] {
            display: flex;
            align-items: flex-start;
            gap: .9rem;
            padding: 1rem;
            border: 1px solid #e0e6f5;
            border-radius: .9rem;
            background: #fff;
            box-shadow: 0 6px 16px #0f172a0a
        }

        .wpt-point[data-astro-cid-i7z4trlf] h4[data-astro-cid-i7z4trlf],
        .wpt-reason[data-astro-cid-i7z4trlf] h4[data-astro-cid-i7z4trlf] {
            margin: 0;
            color: var(--wpt-navy);
            font-size: .95rem;
            line-height: 1.25;
            font-weight: 820;
            letter-spacing: 0
        }

        .wpt-point[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf],
        .wpt-reason[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf] {
            margin: .25rem 0 0;
            color: var(--wpt-muted);
            font-size: .9rem;
            line-height: 1.5
        }

        .wpt-points--take[data-astro-cid-i7z4trlf] {
            gap: 16px;
            margin-top: 24px
        }

        .wpt-points--take[data-astro-cid-i7z4trlf] .wpt-point[data-astro-cid-i7z4trlf] {
            align-items: flex-start;
            gap: 16px;
            min-height: 120px;
            padding: 16px;
            border: 1px solid #dce4f2;
            border-radius: 16px;
            box-shadow: 0 12px 26px #0f172a0a
        }

        .wpt-points--take[data-astro-cid-i7z4trlf] .wpt-point__glyph[data-astro-cid-i7z4trlf] {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #eef4ff;
            color: #2458ff;
            padding: 10px
        }

        .wpt-points--take[data-astro-cid-i7z4trlf] .wpt-point__glyph[data-astro-cid-i7z4trlf] .wpt-svg[data-astro-cid-i7z4trlf] {
            stroke-width: 2.2
        }

        .wpt-points--take[data-astro-cid-i7z4trlf] .wpt-point[data-astro-cid-i7z4trlf] h4[data-astro-cid-i7z4trlf] {
            font-size: 16px;
            line-height: 1.25;
            font-weight: 800
        }

        .wpt-points--take[data-astro-cid-i7z4trlf] .wpt-point[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf] {
            margin-top: 4px;
            color: #667085;
            font-size: 15px;
            line-height: 1.45
        }

        .wpt-points--take[data-astro-cid-i7z4trlf] .wpt-point__note[data-astro-cid-i7z4trlf] {
            display: flex;
            gap: 6px;
            margin-top: 12px;
            padding-top: 10px;
            border-top: 1px solid #edf1f7;
            color: #8a94a6;
            font-size: 13px;
            line-height: 1.45
        }

        .wpt-points--take[data-astro-cid-i7z4trlf] .wpt-point__note[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf]:first-child {
            width: 14px;
            height: 14px;
            color: #6b8cff;
            flex: 0 0 14px;
            margin-top: 2px
        }

        .wpt-step--take[data-astro-cid-i7z4trlf] .wpt-missed[data-astro-cid-i7z4trlf] {
            align-items: center;
            gap: 10px;
            margin-top: 18px;
            padding: 16px;
            border-color: #ffd36a;
            border-radius: 14px;
            background: #fff7d6;
            color: #6b510c;
            box-shadow: none
        }

        .wpt-step--take[data-astro-cid-i7z4trlf] .wpt-missed[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            color: var(--wpt-brand);
            margin-top: 0
        }

        .wpt-step--take[data-astro-cid-i7z4trlf] .wpt-missed[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf] {
            font-size: 15px;
            line-height: 1.45
        }

        .wpt-step--take[data-astro-cid-i7z4trlf] .wpt-followup[data-astro-cid-i7z4trlf] {
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px dashed #c8d2e4
        }

        .wpt-note[data-astro-cid-i7z4trlf],
        .wpt-reassure[data-astro-cid-i7z4trlf],
        .wpt-missed[data-astro-cid-i7z4trlf],
        .wpt-access-note[data-astro-cid-i7z4trlf] {
            display: flex;
            align-items: flex-start;
            gap: .75rem;
            margin-top: 1.15rem;
            padding: .9rem 1rem;
            border: 1px solid #e0e6f5;
            border-radius: .9rem;
            background: #f8fafc;
            color: #475467
        }

        .wpt-note--brand[data-astro-cid-i7z4trlf],
        .wpt-reassure[data-astro-cid-i7z4trlf] {
            background: #f2f6ff;
            border-color: var(--wpt-line);
            color: #18346a
        }

        .wpt-note[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf],
        .wpt-reassure[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf],
        .wpt-missed[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf],
        .wpt-access-note[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            width: 1.15rem;
            height: 1.15rem;
            flex-shrink: 0;
            color: var(--wpt-brand);
            margin-top: .1rem
        }

        .wpt-note[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf],
        .wpt-reassure[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf],
        .wpt-missed[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf],
        .wpt-access-note[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf] {
            margin: 0;
            font-size: .9rem;
            line-height: 1.5
        }

        .wpt-chart[data-astro-cid-i7z4trlf] {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 1.45rem
        }

        .wpt-bar__top[data-astro-cid-i7z4trlf] {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: .75rem
        }

        .wpt-bar__label[data-astro-cid-i7z4trlf] {
            font-size: .9rem;
            font-weight: 800;
            line-height: 1.25;
            color: var(--wpt-navy)
        }

        .wpt-bar__label[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            display: block;
            margin-top: .12rem;
            font-size: .72rem;
            font-weight: 600;
            color: var(--wpt-muted)
        }

        .wpt-bar__value[data-astro-cid-i7z4trlf] {
            font-size: 1.1rem;
            font-weight: 850;
            color: var(--wpt-muted)
        }

        .wpt-bar--highlight[data-astro-cid-i7z4trlf] .wpt-bar__label[data-astro-cid-i7z4trlf],
        .wpt-bar--highlight[data-astro-cid-i7z4trlf] .wpt-bar__value[data-astro-cid-i7z4trlf] {
            color: var(--wpt-brand)
        }

        .wpt-bar__track[data-astro-cid-i7z4trlf] {
            height: 2rem;
            margin-top: .45rem;
            border-radius: .55rem;
            background: #eef2f7;
            overflow: hidden
        }

        .wpt-bar__fill[data-astro-cid-i7z4trlf] {
            display: block;
            width: var(--bar-width);
            height: 100%;
            border-radius: inherit;
            transform-origin: left center;
            background: #c9d5ea
        }

        .wpt-bar__fill--pill[data-astro-cid-i7z4trlf] {
            background: linear-gradient(90deg, var(--wpt-brand), var(--wpt-cornflower))
        }

        .wpt-bar__fill--winj[data-astro-cid-i7z4trlf] {
            background: #a0baff
        }

        .wpt-bar__fill--minj[data-astro-cid-i7z4trlf] {
            background: #c8d0df
        }

        .wpt-step[data-astro-cid-i7z4trlf]:not([hidden]) .wpt-bar__fill[data-astro-cid-i7z4trlf] {
            animation: wpt-bar-grow .85s cubic-bezier(.2, .8, .2, 1)
        }

        @keyframes wpt-fade-rise {
            0% {
                opacity: 0;
                transform: translateY(10px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @keyframes wpt-bar-grow {
            0% {
                transform: scaleX(0)
            }
        }

        .wpt-footnote[data-astro-cid-i7z4trlf] {
            margin: .75rem 0 0;
            color: #7a8497;
            font-size: .78rem;
            line-height: 1.5
        }

        .wpt-compare-toggle[data-astro-cid-i7z4trlf] {
            width: 100%;
            margin-top: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .75rem;
            border: 1px solid #e0e6f5;
            border-radius: .8rem;
            background: #fff;
            padding: .9rem 1rem;
            color: var(--wpt-navy);
            font-weight: 800
        }

        .wpt-compare-toggle[data-astro-cid-i7z4trlf]>span[data-astro-cid-i7z4trlf] {
            display: inline-flex;
            align-items: center;
            gap: .55rem
        }

        .wpt-compare-toggle[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf]:first-child {
            width: 1.05rem;
            height: 1.05rem;
            color: var(--wpt-brand)
        }

        .wpt-compare-toggle__chevron[data-astro-cid-i7z4trlf] {
            width: 1.05rem;
            height: 1.05rem;
            color: var(--wpt-brand);
            transition: transform .18s ease
        }

        .wpt-compare-toggle[data-astro-cid-i7z4trlf][aria-expanded=true] .wpt-compare-toggle__chevron[data-astro-cid-i7z4trlf] {
            transform: rotate(180deg)
        }

        .wpt-comparison-panel[data-astro-cid-i7z4trlf] {
            overflow: hidden;
            max-height: 0;
            transition: max-height .25s ease
        }

        .wpt-comparison-panel[data-astro-cid-i7z4trlf].is-open {
            max-height: 44rem
        }

        .wpt-comparison-scroll[data-astro-cid-i7z4trlf] {
            overflow-x: auto;
            margin-top: .75rem;
            border: 1px solid #e0e6f5;
            border-radius: .9rem;
            background: #fff
        }

        .wpt-table[data-astro-cid-i7z4trlf] {
            width: 100%;
            min-width: 38rem;
            border-collapse: collapse;
            font-size: .78rem
        }

        .wpt-table[data-astro-cid-i7z4trlf] th[data-astro-cid-i7z4trlf],
        .wpt-table[data-astro-cid-i7z4trlf] td[data-astro-cid-i7z4trlf] {
            padding: .8rem;
            text-align: left;
            vertical-align: top;
            border-bottom: 1px solid #eef2f7;
            line-height: 1.45
        }

        .wpt-table[data-astro-cid-i7z4trlf] thead[data-astro-cid-i7z4trlf] th[data-astro-cid-i7z4trlf] {
            background: #f8fafc;
            color: var(--wpt-navy);
            font-size: .75rem;
            font-weight: 850
        }

        .wpt-table[data-astro-cid-i7z4trlf] thead[data-astro-cid-i7z4trlf] th[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            display: block;
            margin-top: .1rem;
            color: var(--wpt-muted);
            font-size: .68rem;
            font-weight: 650
        }

        .wpt-table[data-astro-cid-i7z4trlf] tbody[data-astro-cid-i7z4trlf] th[data-astro-cid-i7z4trlf] {
            color: var(--wpt-navy);
            font-weight: 800;
            white-space: nowrap
        }

        .wpt-table[data-astro-cid-i7z4trlf] tbody[data-astro-cid-i7z4trlf] th[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            width: .9rem;
            height: .9rem;
            display: inline-flex;
            margin-right: .35rem;
            color: var(--wpt-muted);
            vertical-align: -.15rem
        }

        .wpt-table[data-astro-cid-i7z4trlf] tr[data-astro-cid-i7z4trlf]:last-child th[data-astro-cid-i7z4trlf],
        .wpt-table[data-astro-cid-i7z4trlf] tr[data-astro-cid-i7z4trlf]:last-child td[data-astro-cid-i7z4trlf] {
            border-bottom: 0
        }

        .wpt-table__highlight[data-astro-cid-i7z4trlf] {
            background: #f2f6ff;
            color: var(--wpt-navy);
            font-weight: 750
        }

        .wpt-chips[data-astro-cid-i7z4trlf] {
            display: flex;
            flex-wrap: wrap;
            gap: .55rem;
            margin-top: 1.25rem
        }

        .wpt-chip[data-astro-cid-i7z4trlf] {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            border: 1px solid #e0e6f5;
            border-radius: 999px;
            background: #fff;
            padding: .55rem .78rem;
            color: var(--wpt-navy);
            font-size: .85rem;
            font-weight: 750
        }

        .wpt-chip[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            width: .42rem;
            height: .42rem;
            border-radius: 999px;
            background: #f4c74d
        }

        .wpt-tips[data-astro-cid-i7z4trlf] {
            margin-top: 1.15rem;
            border: 1px solid #e0e6f5;
            border-radius: .9rem;
            background: #fff;
            overflow: hidden
        }

        .wpt-tips__head[data-astro-cid-i7z4trlf] {
            display: flex;
            align-items: center;
            gap: .55rem;
            background: #f8fafc;
            border-bottom: 1px solid #e0e6f5;
            padding: .9rem 1rem
        }

        .wpt-tips__head[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf],
        .wpt-tips[data-astro-cid-i7z4trlf] li[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            width: 1rem;
            height: 1rem;
            color: var(--wpt-brand);
            flex-shrink: 0
        }

        .wpt-tips[data-astro-cid-i7z4trlf] h4[data-astro-cid-i7z4trlf] {
            margin: 0;
            color: var(--wpt-navy);
            font-size: .92rem;
            font-weight: 850
        }

        .wpt-tips[data-astro-cid-i7z4trlf] ul[data-astro-cid-i7z4trlf] {
            list-style: none;
            margin: 0;
            padding: .35rem 1rem .45rem
        }

        .wpt-tips[data-astro-cid-i7z4trlf] li[data-astro-cid-i7z4trlf] {
            display: flex;
            gap: .7rem;
            padding: .7rem 0;
            border-bottom: 1px solid #eef2f7;
            color: var(--wpt-muted);
            font-size: .86rem;
            line-height: 1.45
        }

        .wpt-tips[data-astro-cid-i7z4trlf] li[data-astro-cid-i7z4trlf]:last-child {
            border-bottom: 0
        }

        .wpt-tips[data-astro-cid-i7z4trlf]>p[data-astro-cid-i7z4trlf] {
            margin: 0;
            padding: 0 1rem .9rem;
            color: #7a8497;
            font-size: .75rem;
            line-height: 1.45
        }

        .wpt-missed[data-astro-cid-i7z4trlf] {
            background: #fff8df;
            border-color: #ffe8a3;
            color: #665118
        }

        .wpt-summary-hero[data-astro-cid-i7z4trlf] {
            border-radius: 1rem;
            padding: 1.25rem;
            color: #fff;
            background: linear-gradient(135deg, var(--wpt-navy), var(--wpt-brand))
        }

        .wpt-summary-hero[data-astro-cid-i7z4trlf][data-summary-tone=soft] {
            background: linear-gradient(135deg, var(--wpt-navy), var(--wpt-brand));
            color: #fff;
            border: 0
        }

        .wpt-summary-hero[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf] {
            margin: 0;
            color: #cbd8ff;
            font-size: .72rem;
            font-weight: 850;
            text-transform: uppercase;
            letter-spacing: .04em
        }

        .wpt-summary-hero[data-astro-cid-i7z4trlf][data-summary-tone=soft] p[data-astro-cid-i7z4trlf] {
            color: #cbd8ff
        }

        .wpt-summary-hero[data-astro-cid-i7z4trlf] h3[data-astro-cid-i7z4trlf] {
            margin: .55rem 0 .4rem;
            font-size: clamp(1.35rem, 4vw, 1.85rem);
            line-height: 1.08;
            font-weight: 850;
            color: inherit;
            letter-spacing: 0
        }

        .wpt-summary-hero[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            display: block;
            font-size: .92rem;
            line-height: 1.55;
            color: #ffffffd6
        }

        .wpt-summary-hero[data-astro-cid-i7z4trlf][data-summary-tone=soft] span[data-astro-cid-i7z4trlf] {
            color: #ffffffd6
        }

        .wpt-timeline-title[data-astro-cid-i7z4trlf] {
            margin: 1.45rem 0 .9rem;
            color: var(--wpt-muted);
            font-size: .75rem;
            text-transform: uppercase;
            letter-spacing: .04em;
            font-weight: 850
        }

        .wpt-timeline[data-astro-cid-i7z4trlf] {
            display: flex;
            flex-direction: column
        }

        .wpt-timeline__item[data-astro-cid-i7z4trlf] {
            position: relative;
            display: grid;
            grid-template-columns: 2.5rem minmax(0, 1fr);
            gap: .85rem;
            padding-bottom: 1.15rem
        }

        .wpt-timeline__item[data-astro-cid-i7z4trlf]:not(:last-child):before {
            content: "";
            position: absolute;
            top: 2.7rem;
            bottom: .2rem;
            left: 1.2rem;
            width: 2px;
            background: linear-gradient(180deg, var(--wpt-brand), var(--wpt-cornflower))
        }

        .wpt-timeline__badge[data-astro-cid-i7z4trlf] {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: .75rem;
            background: var(--wpt-brand);
            color: #fff !important;
            padding: .68rem;
            z-index: 1
        }

        .wpt-timeline__item[data-astro-cid-i7z4trlf]:nth-child(1) .wpt-timeline__badge[data-astro-cid-i7z4trlf] {
            background: var(--wpt-navy);
            color: #fff
        }

        .wpt-timeline__item[data-astro-cid-i7z4trlf]:nth-child(3) .wpt-timeline__badge[data-astro-cid-i7z4trlf] {
            background: var(--wpt-cornflower);
            color: #fff
        }

        .wpt-timeline[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf] {
            margin: 0;
            color: var(--wpt-brand);
            font-size: .72rem;
            font-weight: 850
        }

        .wpt-timeline[data-astro-cid-i7z4trlf] h5[data-astro-cid-i7z4trlf] {
            margin: .15rem 0 .2rem;
            color: var(--wpt-navy);
            font-size: .95rem;
            line-height: 1.25;
            font-weight: 850
        }

        .wpt-timeline[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            color: var(--wpt-muted);
            font-size: .84rem;
            line-height: 1.48
        }

        .wpt-summary-context[data-astro-cid-i7z4trlf] {
            display: flex;
            flex-direction: column;
            gap: .8rem;
            margin: .2rem 0 1.05rem;
            color: #7a8497
        }

        .wpt-summary-context[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf] {
            display: flex;
            align-items: flex-start;
            gap: .55rem;
            margin: 0;
            font-size: .84rem;
            line-height: 1.45
        }

        .wpt-summary-context[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            width: 1rem;
            height: 1rem;
            flex: 0 0 auto;
            margin-top: .08rem;
            color: #7a8497
        }

        .wpt-access-note[data-astro-cid-i7z4trlf] {
            margin-top: .3rem;
            background: #f8fafc
        }

        .wpt-disclaimer[data-astro-cid-i7z4trlf] {
            flex-shrink: 0;
            display: flex;
            align-items: flex-start;
            gap: .5rem;
            padding: .8rem 86px;
            border-top: 1px solid #eef2f7;
            color: #7a8497;
            background: #fff
        }

        .wpt-disclaimer[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
            width: .9rem;
            height: .9rem;
            flex-shrink: 0;
            margin-top: .1rem
        }

        .wpt-disclaimer[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf] {
            margin: 0;
            font-size: .75rem;
            line-height: 1.45
        }

        .wpt-footer[data-astro-cid-i7z4trlf] {
            flex-shrink: 0;
            padding: 24px 86px calc(24px + env(safe-area-inset-bottom));
            border-top: 0;
            background: #fff;
            box-shadow: 0 -12px 30px #0a1f440f
        }

        .wpt-toast[data-astro-cid-i7z4trlf] {
            display: flex;
            align-items: center;
            gap: .55rem;
            margin-bottom: .65rem;
            border: 1px solid var(--wpt-line);
            border-radius: .75rem;
            background: #f2f6ff;
            color: var(--wpt-brand);
            padding: .62rem .75rem;
            font-size: .78rem;
            line-height: 1.3;
            font-weight: 750
        }

        .wpt-toast[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf]:first-child {
            width: .95rem;
            height: .95rem;
            flex-shrink: 0
        }

        .wpt-footer__actions[data-astro-cid-i7z4trlf] {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: nowrap;
            gap: 16px
        }

        .wpt-action[data-astro-cid-i7z4trlf] {
            border: 0;
            border-radius: 16px;
            min-height: 54px;
            padding: 16px 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-family: Montserrat, system-ui, sans-serif;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            line-height: 1.4;
            letter-spacing: 0;
            white-space: nowrap;
            transition: opacity .18s ease, transform .18s ease, box-shadow .18s ease, background .18s ease
        }

        .wpt-action__icon[data-astro-cid-i7z4trlf] {
            width: 20px;
            height: 20px;
            display: inline-flex;
            flex-shrink: 0
        }

        .wpt-action--back[data-astro-cid-i7z4trlf] {
            order: 1;
            margin-right: auto;
            background: transparent;
            border: 0;
            color: #344054;
            flex-shrink: 0;
            min-width: auto;
            padding-inline: 0;
            min-height: 32px;
            border-radius: 0
        }

        .wpt-action--primary[data-astro-cid-i7z4trlf] {
            flex: 0 0 182px;
            background: var(--cta-primary, #1a3d7a);
            color: #fff;
            box-shadow: var(--wpt-cta-shadow);
            min-width: 182px
        }

        .wpt-action[data-astro-cid-i7z4trlf][data-tool-next] {
            order: 3
        }

        .wpt-action--jump[data-astro-cid-i7z4trlf] {
            order: 2;
            background: transparent;
            border: 2px solid #0d3478;
            color: #0d3478;
            flex-shrink: 0;
            min-width: 214px;
            box-shadow: none
        }

        .wpt-action--soft[data-astro-cid-i7z4trlf] {
            background: transparent;
            color: #0d3478;
            border: 2px solid #0d3478;
            box-shadow: none
        }

        .wpt-action[data-astro-cid-i7z4trlf][data-tool-assessment] {
            order: 2;
            flex: 0 0 auto;
            min-width: 214px;
            background: transparent;
            border: 2px solid #0d3478;
            color: #0d3478;
            box-shadow: none
        }

        .wpt-action[data-astro-cid-i7z4trlf]:hover {
            transform: translateY(-1px)
        }

        .wpt-action--primary[data-astro-cid-i7z4trlf]:hover {
            opacity: .92;
            box-shadow: var(--wpt-cta-shadow-hover)
        }

        .wpt-action--primary[data-astro-cid-i7z4trlf]:hover .wpt-action__icon[data-astro-cid-i7z4trlf] {
            transform: translate(3px)
        }

        .wpt-action--back[data-astro-cid-i7z4trlf]:hover {
            background: transparent;
            color: #0d3478
        }

        .wpt-action--jump[data-astro-cid-i7z4trlf]:hover,
        .wpt-action--soft[data-astro-cid-i7z4trlf]:hover {
            background: #f5f8ff
        }

        .wpt-action[data-astro-cid-i7z4trlf]:disabled,
        .wpt-action[data-astro-cid-i7z4trlf][aria-disabled=true] {
            cursor: not-allowed;
            opacity: 1;
            transform: none
        }

        .wpt-action--jump[data-astro-cid-i7z4trlf]:disabled {
            background: #f8fafc;
            border-color: #d5dbe6;
            color: #98a2b3
        }

        .wpt-action--jump[data-astro-cid-i7z4trlf]:disabled:hover {
            background: #f8fafc
        }

        .wpt-action--primary[data-astro-cid-i7z4trlf]:disabled,
        .wpt-action--primary[data-astro-cid-i7z4trlf][aria-disabled=true] {
            background: #d5dbe6;
            border-color: #d5dbe6;
            box-shadow: none;
            color: #fff;
            pointer-events: none
        }

        .wpt-noscript[data-astro-cid-i7z4trlf] {
            margin: .75rem 0 0;
            color: #667085;
            font-size: .85rem;
            line-height: 1.45
        }

        html.wpt-modal-open,
        body.wpt-modal-open,
        body.wpt-prompt-open {
            overflow: hidden;
            overscroll-behavior: none
        }

        @media(min-width:641px)and (max-height:760px) {
            .wpt-progress[data-astro-cid-i7z4trlf] {
                padding-block: 16px
            }

            .wpt-body[data-astro-cid-i7z4trlf] {
                padding-block: 24px
            }

            .wpt-disclaimer[data-astro-cid-i7z4trlf] {
                padding-top: .65rem;
                padding-bottom: .65rem
            }

            .wpt-footer[data-astro-cid-i7z4trlf] {
                padding-top: 16px;
                padding-bottom: calc(16px + env(safe-area-inset-bottom))
            }
        }

        @media(max-width:640px) {
            .wpt-nudge[data-astro-cid-i7z4trlf] {
                padding: 1rem;
                border-radius: 1rem
            }

            .wpt-nudge__inner[data-astro-cid-i7z4trlf] {
                grid-template-columns: auto minmax(0, 1fr);
                gap: .85rem
            }

            .wpt-nudge__glyph[data-astro-cid-i7z4trlf] {
                width: 3rem;
                height: 3rem
            }

            .wpt-nudge__button[data-astro-cid-i7z4trlf] {
                grid-column: 1 / -1;
                width: 100%
            }

            .wpt-floating[data-astro-cid-i7z4trlf] {
                inset: 0;
                width: 100%;
                padding: 1rem
            }

            .wpt-floating__card[data-astro-cid-i7z4trlf] {
                width: min(480px, calc(100vw - 32px));
                padding: 24px 16px
            }

            .wpt-floating__heading[data-astro-cid-i7z4trlf] {
                align-items: flex-start;
                gap: 4px;
                max-width: 340px;
                padding-inline: 0 36px
            }

            .wpt-floating__glyph[data-astro-cid-i7z4trlf] {
                width: 20px;
                height: 20px;
                margin-top: 4px
            }

            .wpt-floating__title[data-astro-cid-i7z4trlf] {
                max-width: 280px;
                font-size: clamp(22px, 5.6vw, 24px);
                line-height: 1.12;
                white-space: normal
            }

            .wpt-floating__sub[data-astro-cid-i7z4trlf] {
                margin-top: 12px;
                font-size: clamp(13px, 3.6vw, 16px)
            }

            .wpt-floating__button[data-astro-cid-i7z4trlf] {
                height: 54px;
                min-height: 54px;
                font-size: clamp(16px, 4.4vw, 18px)
            }

            .wpt-floating__note[data-astro-cid-i7z4trlf] {
                font-size: clamp(10px, 2.8vw, 12px)
            }

            .wpt-scrim[data-astro-cid-i7z4trlf] {
                align-items: flex-end;
                justify-content: center
            }

            .wpt-dialog[data-astro-cid-i7z4trlf] {
                width: 100%;
                height: 100vh;
                height: 100svh;
                height: 100dvh;
                max-height: 100vh;
                max-height: 100svh;
                max-height: 100dvh;
                border-radius: 0;
                transform: translateY(100%);
                box-shadow: 0 -24px 70px #0a1f4442
            }

            .wpt-scrim[data-astro-cid-i7z4trlf].is-open .wpt-dialog[data-astro-cid-i7z4trlf] {
                transform: translateY(0)
            }

            .wpt-head[data-astro-cid-i7z4trlf] {
                padding: 0;
                background: linear-gradient(135deg, #f4fbfb, #eef4ff);
                border-bottom: 1px solid #e5e7eb
            }

            .wpt-head__top[data-astro-cid-i7z4trlf] {
                min-height: 54px;
                padding: 0 24px;
                display: grid;
                grid-template-columns: 24px minmax(0, 1fr) 24px 24px;
                gap: 16px;
                position: relative
            }

            .wpt-mobile-back[data-astro-cid-i7z4trlf] {
                width: 24px;
                height: 24px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                grid-column: 1;
                border: 0;
                background: transparent;
                color: #101828;
                padding: 0
            }

            .wpt-mobile-back[data-astro-cid-i7z4trlf] span[data-astro-cid-i7z4trlf] {
                width: 20px;
                height: 20px
            }

            .wpt-brand[data-astro-cid-i7z4trlf] {
                grid-column: 2;
                justify-self: center;
                gap: 8px
            }

            .wpt-brand[data-astro-cid-i7z4trlf] h2[data-astro-cid-i7z4trlf]:before {
                font-size: 16px;
                font-weight: 700;
                line-height: 1.2
            }

            .wpt-help[data-astro-cid-i7z4trlf] {
                grid-column: 3;
                margin-left: 0
            }

            .wpt-close[data-astro-cid-i7z4trlf] {
                width: 24px;
                height: 24px;
                background: transparent;
                padding: 2px;
                grid-column: 4
            }

            .wpt-progress[data-astro-cid-i7z4trlf] {
                margin: 0;
                width: auto;
                padding: 24px;
                background: transparent
            }

            .wpt-progress-meta[data-astro-cid-i7z4trlf] {
                margin: 0;
                flex-basis: 56px
            }

            .wpt-body[data-astro-cid-i7z4trlf] {
                min-height: 0;
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
                touch-action: pan-y;
                padding: 28px 24px 24px;
                background: #fff
            }

            .wpt-step[data-astro-cid-i7z4trlf] {
                max-width: none
            }

            .wpt-step--take[data-astro-cid-i7z4trlf] {
                max-width: none;
                margin-inline: 0
            }

            .wpt-disclaimer[data-astro-cid-i7z4trlf] {
                padding-left: 24px;
                padding-right: 24px
            }

            .wpt-step__eyebrow[data-astro-cid-i7z4trlf] {
                display: none
            }

            .wpt-step__title[data-astro-cid-i7z4trlf] {
                font-size: 24px;
                line-height: 1.08;
                font-weight: 800
            }

            .wpt-step__lead[data-astro-cid-i7z4trlf] {
                margin-top: 10px;
                color: #344054;
                font-size: 15px;
                line-height: 1.5
            }

            .wpt-options[data-astro-cid-i7z4trlf],
            .wpt-points[data-astro-cid-i7z4trlf],
            .wpt-reasons[data-astro-cid-i7z4trlf] {
                gap: 16px;
                margin-top: 24px
            }

            .wpt-option[data-astro-cid-i7z4trlf] {
                min-height: 76px;
                border-width: 1.5px;
                border-radius: 14px;
                padding: 18px 16px;
                gap: 12px;
                box-shadow: 0 8px 18px #0f172a05
            }

            .wpt-points--take[data-astro-cid-i7z4trlf] .wpt-point[data-astro-cid-i7z4trlf] {
                min-height: 0;
                padding: 16px;
                border-radius: 14px;
                gap: 12px
            }

            .wpt-points--take[data-astro-cid-i7z4trlf] .wpt-point[data-astro-cid-i7z4trlf] h4[data-astro-cid-i7z4trlf] {
                font-size: 15px
            }

            .wpt-points--take[data-astro-cid-i7z4trlf] .wpt-point[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf] {
                font-size: 14px;
                line-height: 1.45
            }

            .wpt-points--take[data-astro-cid-i7z4trlf] .wpt-point__note[data-astro-cid-i7z4trlf] {
                margin-top: 10px;
                padding-top: 10px;
                font-size: 12px
            }

            .wpt-step--take[data-astro-cid-i7z4trlf] .wpt-missed[data-astro-cid-i7z4trlf] {
                align-items: flex-start;
                margin-top: 18px;
                padding: 14px;
                border-radius: 14px
            }

            .wpt-step--take[data-astro-cid-i7z4trlf] .wpt-missed[data-astro-cid-i7z4trlf] p[data-astro-cid-i7z4trlf] {
                font-size: 14px
            }

            .wpt-step--take[data-astro-cid-i7z4trlf] .wpt-followup[data-astro-cid-i7z4trlf] {
                margin-top: 24px;
                padding-top: 24px
            }

            .wpt-option[data-astro-cid-i7z4trlf].is-selected {
                border-color: #0d3478;
                background: #eef6ff;
                box-shadow: none
            }

            .wpt-option__glyph[data-astro-cid-i7z4trlf] {
                display: none
            }

            .wpt-option__check[data-astro-cid-i7z4trlf] {
                order: -1;
                width: 18px;
                height: 18px;
                padding: 3px;
                border-width: 1.5px
            }

            .wpt-option__title[data-astro-cid-i7z4trlf] {
                font-size: 15px;
                font-weight: 700;
                line-height: 1.35
            }

            .wpt-option__desc[data-astro-cid-i7z4trlf] {
                margin-top: 2px;
                font-size: 13px;
                line-height: 1.35
            }

            .wpt-footer[data-astro-cid-i7z4trlf] {
                position: static;
                padding: 16px 24px calc(16px + env(safe-area-inset-bottom));
                box-shadow: none
            }

            .wpt-footer__actions[data-astro-cid-i7z4trlf] {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                gap: 16px
            }

            .wpt-action--back[data-astro-cid-i7z4trlf] {
                display: none
            }

            .wpt-action--primary[data-astro-cid-i7z4trlf],
            .wpt-action--soft[data-astro-cid-i7z4trlf],
            .wpt-action[data-astro-cid-i7z4trlf][data-tool-assessment] {
                width: 100%;
                min-width: 0;
                flex: 0 0 auto
            }
        }

        @media(prefers-reduced-motion:reduce) {

            .wpt[data-astro-cid-i7z4trlf] [data-astro-cid-i7z4trlf],
            .wpt[data-astro-cid-i7z4trlf] [data-astro-cid-i7z4trlf]:before,
            .wpt[data-astro-cid-i7z4trlf] [data-astro-cid-i7z4trlf]:after {
                animation: none !important;
                transition: none !important;
                scroll-behavior: auto !important
            }
        }

        html {
            background: #fff
        }

        .wegovy-pill[data-astro-cid-pccemkry] {
            display: flex;
            flex-direction: column;
            gap: 0;
            --hero-stack-gap: .625rem;
            --hero-breadcrumb-gap: 1rem;
            --hero-cta-gap: 1.25rem
        }

        .hero--member-journey .hero__headline {
            min-height: 1em !important
        }

        .wegovy-pill .hero__breadcrumbs .breadcrumbs {
            padding-top: 0 !important;
            padding-bottom: 20px !important
        }

        .wegovy-pill .hero__breadcrumbs {
            margin-bottom: calc(var(--hero-breadcrumb-gap) - var(--hero-stack-gap)) !important
        }

        .wegovy-pill .hero__inner {
            row-gap: var(--hero-stack-gap) !important
        }

        .wegovy-pill .hero__headline {
            margin: 0 !important
        }

        .wegovy-pill .hero__subtitle {
            margin-top: var(--hero-stack-gap) !important;
            padding-bottom: 0 !important
        }

        .wegovy-pill .hero__content--top .hero__trustpilot-inline {
            margin-top: var(--hero-stack-gap) !important;
            margin-bottom: 0 !important
        }

        .wegovy-pill .hero__cta {
            padding-top: 0 !important;
            min-height: 0 !important
        }

        .wegovy-pill .hero__content--bottom {
            margin-top: var(--hero-cta-gap) !important
        }

        .wegovy-pill .hero__product-extra {
            padding-top: 0 !important
        }

        .wegovy-pill .hero__doses {
            padding-top: .375rem !important
        }

        .wegovy-pill[data-astro-cid-pccemkry] .hero__product-benefits-note {
            margin-top: 0;
            max-width: 48rem
        }

        @media(max-width:1023px) {
            .wegovy-pill .hero__media {
                margin: 1rem auto 0 !important
            }
        }

        .wegovy-pill__trial-card[data-astro-cid-pccemkry] {
            width: 100%;
            padding: 56px min(8vw, 110px);
            box-sizing: border-box
        }

        .wegovy-pill__trial-card[data-astro-cid-pccemkry] .gb {
            max-width: 1200px;
            min-height: 380px;
            margin: 0 auto
        }

        .wegovy-pill__trial-card[data-astro-cid-pccemkry] .gb__headline {
            max-width: none;
            font-size: clamp(1.05rem, 2vw, 1.3rem)
        }

        .wegovy-pill__trial-card[data-astro-cid-pccemkry] .gb__bars {
            width: min(72%, 820px);
            flex: 1;
            justify-content: center;
            gap: 1rem
        }

        .wegovy-pill__trial-card[data-astro-cid-pccemkry] .gb__bar-row {
            gap: 1rem
        }

        .wegovy-pill__trial-card[data-astro-cid-pccemkry] .gb__bar-wrap {
            width: 68%;
            height: 24px
        }

        .wegovy-pill__trial-card[data-astro-cid-pccemkry] .gb__label {
            font-size: .9rem
        }

        .wegovy-pill__trial-card[data-astro-cid-pccemkry] .gb__image {
            width: min(46%, 420px)
        }

        .wegovy-pill__trial-note[data-astro-cid-pccemkry] {
            width: 100%;
            max-width: 1200px;
            margin: 14px auto 0;
            color: #4a5568;
            font-size: .8rem;
            line-height: 1.55
        }

        .wegovy-pill__trial-note[data-astro-cid-pccemkry] p[data-astro-cid-pccemkry] {
            margin: 0
        }

        .wegovy-pill__trial-note[data-astro-cid-pccemkry] p[data-astro-cid-pccemkry]+p[data-astro-cid-pccemkry] {
            margin-top: 6px
        }

        .wegovy-pill__trial-note[data-astro-cid-pccemkry] a[data-astro-cid-pccemkry] {
            color: #0f1f3d;
            font-weight: 700;
            text-decoration: underline;
            text-underline-offset: 3px
        }

        @media(max-width:640px) {
            .wegovy-pill[data-astro-cid-pccemkry] .hero {
                padding-bottom: 3.5rem
            }

            .wegovy-pill__trial-card[data-astro-cid-pccemkry] {
                padding: 44px 20px
            }

            .wegovy-pill__trial-card[data-astro-cid-pccemkry] .gb__bar-row {
                align-items: flex-start;
                flex-direction: column;
                gap: .35rem
            }

            .wegovy-pill__trial-card[data-astro-cid-pccemkry] .gb__bar-wrap {
                width: 100%;
                height: 20px
            }
        }

        @media(min-width:1024px) {
            .wegovy-pill[data-astro-cid-pccemkry] {
                --hero-stack-gap: .75rem;
                --hero-breadcrumb-gap: 1.125rem;
                --hero-cta-gap: 1.375rem
            }

            .wegovy-pill[data-astro-cid-pccemkry] .hero {
                padding-bottom: 5.5rem
            }

            .wegovy-pill[data-astro-cid-pccemkry] .hero__inner {
                column-gap: 2rem
            }

            .wegovy-pill[data-astro-cid-pccemkry] .hero__product-benefits-note {
                max-width: none
            }

            .wegovy-pill__trial-card[data-astro-cid-pccemkry] .gb {
                gap: .875rem
            }

            .wegovy-pill__trial-card[data-astro-cid-pccemkry] .gb__bars {
                flex: 0;
                justify-content: flex-start
            }
        }

        .how[data-astro-cid-yvrvggs3] {
            padding: 67px min(8vw, 110px);
            background: #fff;
            position: relative;
            z-index: 2
        }

        .how--overlap[data-astro-cid-yvrvggs3] {
            margin-top: -50px;
            padding-top: 0
        }

        .how__inner[data-astro-cid-yvrvggs3] {
            max-width: 1200px;
            margin: 0 auto
        }

        .how__header[data-astro-cid-yvrvggs3] h2[data-astro-cid-yvrvggs3] {
            margin: 0 0 12px;
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 500
        }

        .how__header[data-astro-cid-yvrvggs3] p[data-astro-cid-yvrvggs3] {
            margin: 0;
            color: #4b5563;
            font-size: .9375rem;
            line-height: 1.6;
            max-width: 760px;
            font-weight: 400
        }

        @media(min-width:1024px) {
            .how__header[data-astro-cid-yvrvggs3] p[data-astro-cid-yvrvggs3] {
                font-size: 1.125rem
            }
        }

        .how__grid[data-astro-cid-yvrvggs3] {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 28px;
            margin-top: 20px
        }

        .how--overlap[data-astro-cid-yvrvggs3] .how__grid[data-astro-cid-yvrvggs3] {
            margin-top: 0
        }

        .how__step[data-astro-cid-yvrvggs3] {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background-color: #fff;
            border: var(--card-border);
            border-radius: 20px;
            padding: 24px
        }

        .how__image[data-astro-cid-yvrvggs3] {
            width: 100%;
            border-radius: 12px;
            overflow: hidden
        }

        .how__image[data-astro-cid-yvrvggs3] img[data-astro-cid-yvrvggs3] {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 12px
        }

        .how__grid--text-only[data-astro-cid-yvrvggs3] .how__step[data-astro-cid-yvrvggs3] {
            position: relative;
            min-height: 230px;
            background: linear-gradient(150deg, rgba(16, 185, 129, .08), transparent 58%), #fff
        }

        .how__step-number[data-astro-cid-yvrvggs3] {
            display: inline-flex;
            width: 42px;
            height: 42px;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            background: var(--accent-strong);
            color: #fff;
            font-size: 1rem;
            font-weight: 700
        }

        .how__grid--text-only[data-astro-cid-yvrvggs3] .how__step[data-astro-cid-yvrvggs3] h3[data-astro-cid-yvrvggs3] {
            margin-top: 24px
        }

        .how__step[data-astro-cid-yvrvggs3] h3[data-astro-cid-yvrvggs3] {
            margin: 18px 0 10px;
            font-size: 1rem;
            color: #111827;
            font-weight: 600
        }

        @media(min-width:1024px) {
            .how__step[data-astro-cid-yvrvggs3] h3[data-astro-cid-yvrvggs3] {
                font-size: 1.125rem
            }
        }

        .how__step[data-astro-cid-yvrvggs3] p[data-astro-cid-yvrvggs3] {
            margin: auto 0 0;
            color: #4b5563;
            line-height: 1.6;
            font-size: 14px;
            font-weight: 400
        }

        .how__cta[data-astro-cid-yvrvggs3] {
            margin-top: 32px
        }

        .how__cta-button[data-astro-cid-yvrvggs3] {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: .95rem 1.8rem;
            border-radius: 1rem;
            background: var(--cta-primary);
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: box-shadow .15s ease
        }

        .how__cta-button[data-astro-cid-yvrvggs3]:hover {
            box-shadow: 0 20px 25px -5px #0000001a, 0 8px 10px -6px #0000001a
        }

        @media(max-width:700px) {
            .how[data-astro-cid-yvrvggs3] {
                padding: 59px 24px
            }

            .how--overlap[data-astro-cid-yvrvggs3] {
                margin-top: -32px
            }

            .how__step[data-astro-cid-yvrvggs3] {
                padding: 20px
            }

            .how__cta-button[data-astro-cid-yvrvggs3] {
                width: 100%
            }
        }

        .team[data-astro-cid-gkchqblh] {
            padding: 67px min(8vw, 110px);
            background: #fff;
            overflow-x: hidden
        }

        .team__inner[data-astro-cid-gkchqblh] {
            max-width: 1200px;
            margin: 0 auto
        }

        .team__header[data-astro-cid-gkchqblh] {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            flex-wrap: wrap
        }

        .team__header-text[data-astro-cid-gkchqblh] {
            display: flex;
            flex-direction: column;
            gap: 8px
        }

        .team__header-text[data-astro-cid-gkchqblh] h2[data-astro-cid-gkchqblh] {
            margin: 0;
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 500
        }

        .team__header-text[data-astro-cid-gkchqblh] p[data-astro-cid-gkchqblh] {
            margin: 0;
            color: #4b5563;
            font-size: .9375rem;
            line-height: 1.6;
            font-weight: 400
        }

        @media(min-width:1024px) {
            .team__header-text[data-astro-cid-gkchqblh] p[data-astro-cid-gkchqblh] {
                font-size: 1.125rem
            }
        }

        .team__nav[data-astro-cid-gkchqblh] {
            display: flex;
            gap: 8px;
            flex-shrink: 0
        }

        .team__nav-btn[data-astro-cid-gkchqblh] {
            width: 44px;
            height: 44px;
            border: 1px solid #e5e7eb;
            border-radius: 50%;
            background: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #374151;
            transition: all .2s
        }

        .team__nav-btn[data-astro-cid-gkchqblh]:hover:not(:disabled) {
            background: #f9fafb;
            border-color: #d1d5db
        }

        .team__nav-btn[data-astro-cid-gkchqblh]:disabled {
            opacity: .4;
            cursor: not-allowed
        }

        .team__carousel[data-astro-cid-gkchqblh] {
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
            -ms-overflow-style: none;
            -webkit-overflow-scrolling: touch;
            overscroll-behavior-x: contain;
            margin-top: 24px
        }

        .team__carousel[data-astro-cid-gkchqblh]::-webkit-scrollbar {
            display: none
        }

        .team__track[data-astro-cid-gkchqblh] {
            display: flex;
            gap: 18px
        }

        .team__card[data-astro-cid-gkchqblh] {
            display: grid;
            gap: 10px;
            width: 280px;
            flex-shrink: 0;
            scroll-snap-align: start
        }

        .team__image[data-astro-cid-gkchqblh] {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            height: 340px;
            background: var(--media-surface-gradient)
        }

        .team__image--placeholder[data-astro-cid-gkchqblh] {
            background: var(--surface-tint)
        }

        .team__image[data-astro-cid-gkchqblh] img[data-astro-cid-gkchqblh] {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
            user-select: none;
            -webkit-user-drag: none;
            pointer-events: none
        }

        .team__meta[data-astro-cid-gkchqblh] .team__name[data-astro-cid-gkchqblh] {
            margin: 0;
            font-size: 18px;
            font-weight: 500
        }

        .team__meta[data-astro-cid-gkchqblh] .team__name[data-astro-cid-gkchqblh] a[data-astro-cid-gkchqblh] {
            color: inherit;
            text-decoration: none
        }

        .team__meta[data-astro-cid-gkchqblh] .team__name[data-astro-cid-gkchqblh] a[data-astro-cid-gkchqblh]:hover {
            text-decoration: underline;
            text-underline-offset: 3px
        }

        .team__meta[data-astro-cid-gkchqblh] p[data-astro-cid-gkchqblh] {
            margin: 4px 0 0;
            color: #6b7280;
            font-size: 14px;
            font-weight: 400
        }

        .team__meta[data-astro-cid-gkchqblh] .team__credentials[data-astro-cid-gkchqblh] {
            color: #374151
        }

        .team__meta[data-astro-cid-gkchqblh] .team__registration[data-astro-cid-gkchqblh] {
            color: #374151;
            font-size: 13px
        }

        .team__registration[data-astro-cid-gkchqblh] span[data-astro-cid-gkchqblh] {
            font-weight: 600
        }

        .team__registration[data-astro-cid-gkchqblh] a[data-astro-cid-gkchqblh] {
            color: inherit;
            text-decoration: none
        }

        .team__registration[data-astro-cid-gkchqblh] a[data-astro-cid-gkchqblh]:hover {
            text-decoration: underline;
            text-underline-offset: 3px
        }

        @media(max-width:700px) {
            .team[data-astro-cid-gkchqblh] {
                padding: 59px 24px
            }

            .team__header[data-astro-cid-gkchqblh] {
                flex-direction: column
            }

            .team__card[data-astro-cid-gkchqblh] {
                width: 220px
            }

            .team__image[data-astro-cid-gkchqblh] {
                height: 280px
            }
        }
    </style>
    <script data-cfasync="false" nonce="57fee74b-5df2-4b4d-952c-93a5dae0b3ca">
        try {
            (function(w, d) {
                ! function(lP, lQ, lR, lS) {
                    if (lP.zaraz) console.error("zaraz is loaded twice");
                    else {
                        lP[lR] = lP[lR] || {};
                        lP[lR].executed = [];
                        lP.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        lP.zaraz._v = "20";
                        lP.zaraz._n = "57fee74b-5df2-4b4d-952c-93a5dae0b3ca";
                        lP.zaraz.q = [];
                        lP.zaraz._f = function(lT) {
                            return async function() {
                                var lU = Array.prototype.slice.call(arguments);
                                lP.zaraz.q.push({
                                    m: lT,
                                    a: lU
                                })
                            }
                        };
                        for (const lV of ["track", "set", "debug"]) lP.zaraz[lV] = lP.zaraz._f(lV);
                        lP.zaraz.init = () => {
                            var lW = lQ.getElementsByTagName(lS)[0],
                                lX = lQ.createElement(lS),
                                lY = lQ.getElementsByTagName("title")[0];
                            lY && (lP[lR].t = lQ.getElementsByTagName("title")[0].text);
                            lP[lR].x = Math.random();
                            lP[lR].w = lP.screen.width;
                            lP[lR].h = lP.screen.height;
                            lP[lR].j = lP.innerHeight;
                            lP[lR].e = lP.innerWidth;
                            lP[lR].l = lP.location.href;
                            lP[lR].r = lQ.referrer;
                            lP[lR].k = lP.screen.colorDepth;
                            lP[lR].n = lQ.characterSet;
                            lP[lR].o = (new Date).getTimezoneOffset();
                            if (lP.dataLayer)
                                for (const lZ of Object.entries(Object.entries(dataLayer).reduce((l$, ma) => ({
                                        ...l$[1],
                                        ...ma[1]
                                    }), {}))) zaraz.set(lZ[0], lZ[1], {
                                    scope: "page"
                                });
                            lP[lR].q = [];
                            for (; lP.zaraz.q.length;) {
                                const mb = lP.zaraz.q.shift();
                                lP[lR].q.push(mb)
                            }
                            lX.defer = !0;
                            for (const mc of [localStorage, sessionStorage]) Object.keys(mc || {}).filter(me => me.startsWith("_zaraz_")).forEach(md => {
                                try {
                                    lP[lR]["z_" + md.slice(7)] = JSON.parse(mc.getItem(md))
                                } catch {
                                    lP[lR]["z_" + md.slice(7)] = mc.getItem(md)
                                }
                            });
                            lX.referrerPolicy = "origin";
                            lX.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(lP[lR])));
                            lW.parentNode.insertBefore(lX, lW)
                        };
                        ["complete", "interactive"].includes(lQ.readyState) ? zaraz.init() : lP.addEventListener("DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
                window.zaraz._p = async nK => new Promise(nL => {
                    if (nK) {
                        nK.e && nK.e.forEach(nM => {
                            try {
                                const nN = d.querySelector("script[nonce]"),
                                    nO = nN?.nonce || nN?.getAttribute("nonce"),
                                    nP = d.createElement("script");
                                nO && (nP.nonce = nO);
                                nP.innerHTML = nM;
                                nP.onload = () => {
                                    d.head.removeChild(nP)
                                };
                                d.head.appendChild(nP)
                            } catch (nQ) {
                                console.error(`Error executing script: ${nM}\n`, nQ)
                            }
                        });
                        Promise.allSettled((nK.f || []).map(nR => fetch(nR[0], nR[1])))
                    }
                    nL()
                });
                zaraz._p({
                    "e": ["(function(w,d){})(window,document)"]
                });
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>

<body data-page-type="landing" data-astro-cid-sckkx6r4>

    <?php require 'public/includes/navbar.inc.php' ?>

    <main class="wegovy-pill" data-astro-cid-pccemkry>

        <section>
            <div class="container">

                <div class='card m-3 p-4'>

                    <form id='payforproduct'>
                        <input type="hidden" name="csrf_token" value="<?= CSRF::get() ?>" />
                        <input type="hidden" name="method" value="submit_order" />
                        <input type='hidden' name='id' class='urll' value='<?= $this->data['id'] ?>'>
                        <input type='hidden' name='url' class=' ' value='<?php echo $this->data['slug'] ?? '' ?>'>
                        <input value='<?php echo $_COOKIE['ref'] ?? '' ?>' type='hidden' name='ref' class='form-control'>
                        <div class='table-responsive'>
                            <table class='table table-bordered'>
                                <thead>
                                    <tr>
                                        <th>Product Pic</th>
                                        <th>Title</th>
                                        <th>Qty&nbsp;added</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img style='height:60px;width:auto' src='<?= $imageLink ?>'></td>
                                        <td><?= $this->data['title'] ?> </td>
                                        <td><input name="qty" style="max-width:100px" type="number" class="form-control" value="1" /></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between border-bottom mt-3">
                                <h4>
                                    <bold>Total</bold>
                                </h4>
                                <h4>
                                    <bold class="totalPrice">KES <?= number_format($this->data['price'] ?? 0) ?></bold>
                                </h4>

                            </div>

                            <div class='form-group'>
                                <!-- <label>Amount to pay</label> -->
                                <input type='hidden' value='<?= $this->data['d_price'] ?? $this->data['price'] ?>' name='price' class='form-control'><br>

 

                                <label>Phone number</label>
                                <input value='<?= $this->_me['user_tel'] ?? "" ?>' name='phone' class='phonee form-control'><br>

                                
                                <label>Email</label>
                                <input value='<?= $this->_me['user_email'] ?? "" ?>' name='email' class='phonee form-control' required><br>
                            </div>

  
                            <div class='form-group'>
                                <label>Precise Town/Location for Delivery</label>
                                <div class='d-flex bd-highlight'>
                                    <div class="p-2 flex-fill bd-highlight">
                                        <input value='' name='locationSpecific' id='messageLocation' class='locationSpecific form-control' required >
                                    </div>
                                    <div class="p-2 flex-fill bd-highlight">
                                        <button type="button" class="btn btn-secondary" id="locationButton"><i class="fa fa-map-marker"></i> Attach location</button>
                                    </div>
                                </div>

                                <br>
                            
                         <button type='submit' class='btn form-control btn-primary'  >Submit Now</button>
                              
                            </div>

                            <div class='feedback m-3'></div>
                            <p class=''> </p>
                        </div>
                    </form>




                </div>
            </div>
        </section>

    </main>

     <script> 

     const qty = document.querySelector('input[name="qty"]');
     qty.addEventListener('change', (e)=> {
        const no = parseInt(qty.value);
        if (no < 1) qty.value = 1;
        const price = parseFloat(`<?= $this->data['price'] ?? 0 ?>`);

        document.querySelector('.totalPrice').textContent = `KES ${price * no}`;
     });

    const payforproduct = document.querySelector('#payforproduct');
    const feedback = document.querySelector(".feedback");
    payforproduct.addEventListener('submit', async (e)=> {
        e.preventDefault();
        const form = new FormData(payforproduct);

        const response = await fetch('/myapp/requests', {method:"POST", body:form});
        const result = await response.json();
        feedback.innerHTML = result.msg;
        feedback.classList.remove('alert-danger');

        if (result.error) {
            feedback.classList.add('alert-danger');return;
        } 
        feedback.classList.add('alert-success');

    });
            
            
   document.getElementById('locationButton').addEventListener('click', function() {
      if (navigator.geolocation) {
        
        navigator.geolocation.getCurrentPosition(function(position) 
        {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;  
            // For example, to display the location on a map:
            const mapUrl = `https://maps.google.com/?q=${latitude},${longitude}`;
            //window.open(mapUrl, '_blank');
        
            // Or, to send the location data to the server:
            const messageInput = document.getElementById('messageLocation');
            messageInput.value += `https://maps.google.com/?q=${latitude},${longitude}`;
            });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
        });
             
            
        
    </script>
</body>

</html>