<?php require 'public/includes/header.inc.php' ?> 
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

        .benefits[data-astro-cid-jfl2tvw5] {
            padding: 67px min(8vw, 110px);
            background: #fff
        }

        .benefits__inner[data-astro-cid-jfl2tvw5] {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            gap: 28px
        }

        .benefits__header[data-astro-cid-jfl2tvw5] h2[data-astro-cid-jfl2tvw5] {
            margin: 0 0 12px;
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 500
        }

        .benefits__header[data-astro-cid-jfl2tvw5] p[data-astro-cid-jfl2tvw5] {
            margin: 0;
            color: #4b5563;
            font-size: .9375rem;
            line-height: 1.6;
            max-width: none;
            font-weight: 400
        }

        @media(min-width:1024px) {
            .benefits__header[data-astro-cid-jfl2tvw5] p[data-astro-cid-jfl2tvw5] {
                font-size: 1.125rem
            }
        }

        .benefits__stats[data-astro-cid-jfl2tvw5] {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 0;
            align-items: start
        }

        .benefits__stat[data-astro-cid-jfl2tvw5] {
            display: grid;
            gap: 10px;
            padding: 0 24px;
            align-items: start;
            position: relative
        }

        .benefits__stat[data-astro-cid-jfl2tvw5]:first-child {
            padding-left: 0
        }

        .benefits__stat[data-astro-cid-jfl2tvw5]:last-child {
            padding-right: 0
        }

        .benefits__number[data-astro-cid-jfl2tvw5] {
            display: flex;
            align-items: flex-end;
            gap: 6px;
            color: var(--accent-strong);
            font-weight: 600;
            line-height: 1
        }

        .benefits__number[data-astro-cid-jfl2tvw5] span[data-astro-cid-jfl2tvw5]:first-child {
            font-size: clamp(48px, 5vw, 72px)
        }

        .benefits__unit[data-astro-cid-jfl2tvw5] {
            font-size: clamp(28px, 3vw, 40px);
            padding-bottom: 6px
        }

        .benefits__stat[data-astro-cid-jfl2tvw5] p[data-astro-cid-jfl2tvw5] {
            margin: 0;
            font-size: 14px;
            font-weight: 500;
            color: #111827;
            max-width: none
        }

        .benefits__stat[data-astro-cid-jfl2tvw5]+.benefits__stat[data-astro-cid-jfl2tvw5] {
            border-left: 1px solid #e5e7eb
        }

        .benefits--compact[data-astro-cid-jfl2tvw5] .benefits__number[data-astro-cid-jfl2tvw5] span[data-astro-cid-jfl2tvw5]:first-child {
            font-size: clamp(28px, 3vw, 36px)
        }

        .benefits--compact[data-astro-cid-jfl2tvw5] .benefits__unit[data-astro-cid-jfl2tvw5] {
            font-size: clamp(20px, 2vw, 28px);
            padding-bottom: 3px
        }

        .benefits__footnote[data-astro-cid-jfl2tvw5] {
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
            display: grid;
            gap: 10px;
            font-size: 13px;
            color: #6b7280;
            font-weight: 400
        }

        .benefits__footnote[data-astro-cid-jfl2tvw5] a[data-astro-cid-jfl2tvw5] {
            color: #0f766e;
            text-decoration: underline;
            text-underline-offset: 4px;
            font-weight: 600
        }

        .benefits__ai-summary[data-astro-cid-jfl2tvw5] {
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
            display: grid;
            gap: 10px
        }

        .benefits__ai-header[data-astro-cid-jfl2tvw5] {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text
        }

        .benefits__ai-sparkle[data-astro-cid-jfl2tvw5] {
            width: 18px;
            height: 18px;
            flex-shrink: 0
        }

        .benefits__ai-summary[data-astro-cid-jfl2tvw5] p[data-astro-cid-jfl2tvw5] {
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
            color: #4b5563;
            font-weight: 400
        }

        @media(max-width:900px) {
            .benefits__stats[data-astro-cid-jfl2tvw5] {
                grid-template-columns: 1fr;
                gap: 20px
            }

            .benefits__stat[data-astro-cid-jfl2tvw5] {
                padding: 0
            }

            .benefits__stat[data-astro-cid-jfl2tvw5]+.benefits__stat[data-astro-cid-jfl2tvw5] {
                border-left: none;
                padding-left: 0
            }
        }

        @media(max-width:700px) {
            .benefits[data-astro-cid-jfl2tvw5] {
                padding: 59px 24px
            }
        }

        .product-grid[data-astro-cid-rjmydv62] {
            padding: 67px min(8vw, 110px);
            background: #fff
        }

        .product-grid__inner[data-astro-cid-rjmydv62] {
            max-width: 1200px;
            margin: 0 auto
        }

        .product-grid__header[data-astro-cid-rjmydv62] {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 40px;
            margin-bottom: 32px
        }

        .product-grid__heading[data-astro-cid-rjmydv62] {
            flex: 1 1 auto;
            min-width: 0
        }

        .product-grid__header[data-astro-cid-rjmydv62] h2[data-astro-cid-rjmydv62] {
            margin: 0 0 12px;
            font-size: clamp(28px, 3vw, 46px);
            font-weight: 500;
            color: #1a3d7a;
            letter-spacing: -.02em;
            line-height: 1.2
        }

        .product-grid__header[data-astro-cid-rjmydv62] p[data-astro-cid-rjmydv62] {
            margin: 0;
            color: #4b5563;
            font-size: 1rem;
            line-height: 1.6;
            max-width: none
        }

        .product-grid__learn-more[data-astro-cid-rjmydv62] {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
            margin-top: 8px;
            color: #1a3d7a;
            font-size: 16px;
            font-weight: 500;
            line-height: 1.25;
            text-decoration: none;
            white-space: nowrap
        }

        .product-grid__learn-more[data-astro-cid-rjmydv62] svg[data-astro-cid-rjmydv62] {
            width: 20px;
            height: 20px
        }

        .product-grid__learn-more[data-astro-cid-rjmydv62]:hover,
        .product-grid__learn-more[data-astro-cid-rjmydv62]:focus-visible {
            text-decoration: underline;
            text-underline-offset: 3px
        }

        .product-grid__learn-more[data-astro-cid-rjmydv62]:focus-visible {
            outline: 2px solid #111827;
            outline-offset: 3px
        }

        .product-grid__grid[data-astro-cid-rjmydv62] {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px
        }

        .product-grid--fixed-cards[data-astro-cid-rjmydv62] {
            --product-card-width: 360px
        }

        .product-grid--fixed-cards[data-astro-cid-rjmydv62] .product-grid__grid[data-astro-cid-rjmydv62] {
            grid-template-columns: repeat(auto-fill, minmax(min(100%, var(--product-card-width)), var(--product-card-width)));
            justify-content: start;
            align-items: stretch
        }

        .product-grid--fixed-cards[data-astro-cid-rjmydv62] .product-card {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: var(--product-card-width);
            height: 100%;
            background: #fff
        }

        .product-grid--fixed-cards[data-astro-cid-rjmydv62] .product-card__image {
            position: relative;
            aspect-ratio: 8 / 3;
            min-height: 0;
            padding: 0;
            overflow: hidden;
            background: #fff
        }

        .product-grid--fixed-cards[data-astro-cid-rjmydv62] .product-card__image picture,
        .product-grid--fixed-cards[data-astro-cid-rjmydv62] .product-card__image img {
            position: absolute;
            inset: 0;
            display: block;
            width: 100%;
            height: 100%;
            max-width: none;
            max-height: none;
            object-fit: contain
        }

        .product-grid--fixed-cards[data-astro-cid-rjmydv62] .product-card__content {
            flex: 1
        }

        .product-grid--fixed-cards[data-astro-cid-rjmydv62] .product-card__description {
            min-height: calc(14px * 1.6 * 4)
        }

        @media(max-width:700px) {
            .product-grid[data-astro-cid-rjmydv62] {
                padding: 59px 24px
            }

            .product-grid__header[data-astro-cid-rjmydv62] {
                flex-direction: column;
                gap: 16px
            }

            .product-grid__learn-more[data-astro-cid-rjmydv62] {
                margin-top: 0
            }

            .product-grid__grid[data-astro-cid-rjmydv62] {
                grid-template-columns: 1fr
            }

            .product-grid--scrollable[data-astro-cid-rjmydv62] .product-grid__grid[data-astro-cid-rjmydv62] {
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

            .product-grid--scrollable[data-astro-cid-rjmydv62] .product-card {
                min-width: 80%;
                scroll-snap-align: start
            }

            .product-grid--fixed-cards[data-astro-cid-rjmydv62] .product-grid__grid[data-astro-cid-rjmydv62] {
                grid-template-columns: minmax(0, var(--product-card-width))
            }

            .product-grid--fixed-cards[data-astro-cid-rjmydv62].product-grid--scrollable .product-grid__grid[data-astro-cid-rjmydv62] {
                display: flex
            }

            .product-grid--fixed-cards[data-astro-cid-rjmydv62].product-grid--scrollable .product-card {
                flex: 0 0 min(var(--product-card-width), 80%);
                width: min(var(--product-card-width), 80%);
                min-width: min(var(--product-card-width), 80%);
                max-width: min(var(--product-card-width), 80%)
            }

            .product-grid--fixed-cards[data-astro-cid-rjmydv62] .product-card__image {
                aspect-ratio: 8 / 3;
                min-height: 0
            }

            .product-grid--fixed-cards[data-astro-cid-rjmydv62] .product-card__image picture,
            .product-grid--fixed-cards[data-astro-cid-rjmydv62] .product-card__image img {
                width: 100%;
                height: 100%;
                object-fit: contain
            }
        }

        .product-card {
            display: flex;
            flex-direction: column;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            transition: border-color .2s ease, box-shadow .2s ease;
            position: relative
        }

        .product-card:hover {
            border-color: var(--accent);
            box-shadow: 0 10px 25px -5px #0000001a
        }

        .product-card__tag {
            position: absolute;
            top: 16px;
            left: 16px;
            background: var(--accent-gradient);
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 20px;
            z-index: 1
        }

        .product-card__image {
            aspect-ratio: 8 / 3;
            background: var(--media-surface-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px
        }

        .product-card__image img {
            display: block;
            width: auto;
            height: clamp(90px, 10vw, 140px);
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            flex-shrink: 0
        }

        .product-card__placeholder {
            width: 120px;
            height: 120px;
            background: #e5e7eb;
            border-radius: 12px
        }

        .product-card__content {
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex: 1
        }

        .product-card--no-image .product-card__content {
            padding: 28px
        }

        .product-card__name {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827
        }

        .product-card__description {
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
            color: #4b5563;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden
        }

        .product-card__features {
            list-style: none;
            margin: auto 0 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 8px
        }

        .product-card__features li {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 13px;
            color: #374151
        }

        .product-card__features svg {
            width: 16px;
            height: 16px;
            color: var(--accent-strong);
            flex-shrink: 0;
            margin-top: 2px
        }

        .product-card__footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid #f3f4f6;
            gap: 8px;
            flex-wrap: wrap
        }

        .product-card__price {
            font-size: 1.125rem;
            font-weight: 600;
            color: #111827;
            white-space: nowrap;
            flex-shrink: 0
        }

        .product-card__cta {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 500;
            color: var(--accent-strong)
        }

        .product-card__cta svg {
            width: 16px;
            height: 16px;
            transform: translateY(.5px);
            transition: transform .2s ease
        }

        .product-card:hover .product-card__cta svg {
            transform: translateY(.5px) translate(4px)
        }

        @media(max-width:700px) {
            .product-card__content {
                padding: 20px
            }

            .product-card--no-image .product-card__content {
                padding: 22px
            }

            .product-card__name {
                font-size: 1.125rem
            }

            .product-card__image {
                aspect-ratio: auto;
                min-height: 200px
            }

            .product-card__image img {
                height: clamp(100px, 25vw, 140px)
            }
        }

        .trustbox[data-astro-cid-mymfrz4o] {
            padding: 46px min(8vw, 110px);
            background: radial-gradient(circle at top left, rgba(223, 242, 255, .95), transparent 42%), linear-gradient(180deg, #f8fbff, #eef5ff)
        }

        .trustbox__inner[data-astro-cid-mymfrz4o] {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            justify-items: center;
            gap: 18px
        }

        .trustbox__title[data-astro-cid-mymfrz4o] {
            margin: 0;
            color: #111827;
            font-size: clamp(21px, 2.1vw, 28px);
            font-weight: 500;
            line-height: 1.1;
            text-align: center
        }

        .trustbox__widget[data-astro-cid-mymfrz4o] {
            min-height: 28px;
            width: 100%;
            max-width: 520px
        }

        .trustbox__widget[data-astro-cid-mymfrz4o] iframe[data-astro-cid-mymfrz4o]+.trustbox__fallback[data-astro-cid-mymfrz4o] {
            display: none
        }

        .trustbox__fallback[data-astro-cid-mymfrz4o] {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: #111827;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            line-height: 1
        }

        .trustbox__fallback-stars[data-astro-cid-mymfrz4o] {
            display: inline-flex;
            gap: 2px
        }

        .trustbox__fallback-star[data-astro-cid-mymfrz4o] {
            position: relative;
            display: inline-block;
            width: 26px;
            height: 26px;
            background: #d1d5db;
            color: #fff;
            font-size: 18px;
            line-height: 26px;
            text-align: center;
            overflow: hidden
        }

        .trustbox__fallback-star-fill[data-astro-cid-mymfrz4o],
        .trustbox__fallback-star-base[data-astro-cid-mymfrz4o] {
            position: absolute;
            inset: 0;
            display: block
        }

        .trustbox__fallback-star-fill[data-astro-cid-mymfrz4o] {
            background: #00b67a;
            overflow: hidden;
            z-index: 1
        }

        .trustbox__fallback-star-base[data-astro-cid-mymfrz4o] {
            z-index: 0
        }

        .trustbox__fallback-brand[data-astro-cid-mymfrz4o] {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 18px;
            font-weight: 600
        }

        .trustbox__fallback-brand-star[data-astro-cid-mymfrz4o] {
            color: #00b67a;
            font-size: 28px;
            line-height: .8
        }

        .trustbox__fallback-sr[data-astro-cid-mymfrz4o] {
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

        @media(max-width:700px) {
            .trustbox[data-astro-cid-mymfrz4o] {
                padding: 36px 24px
            }

            .trustbox__fallback[data-astro-cid-mymfrz4o] {
                flex-wrap: wrap;
                gap: 8px;
                font-size: 16px
            }

            .trustbox__fallback-star[data-astro-cid-mymfrz4o] {
                width: 24px;
                height: 24px;
                font-size: 16px
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

        .flexible[data-astro-cid-frcj3tyv] {
            padding: 67px min(8vw, 110px);
            background: #fff
        }

        .flexible__inner[data-astro-cid-frcj3tyv] {
            max-width: 1200px;
            margin: 0 auto
        }

        .flexible__header[data-astro-cid-frcj3tyv] {
            margin-bottom: 32px
        }

        .flexible__header[data-astro-cid-frcj3tyv] h2[data-astro-cid-frcj3tyv] {
            margin: 0 0 12px;
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 500
        }

        .flexible__header[data-astro-cid-frcj3tyv] p[data-astro-cid-frcj3tyv] {
            margin: 0;
            color: #4b5563;
            font-size: .9375rem;
            line-height: 1.7
        }

        @media(min-width:1024px) {
            .flexible__header[data-astro-cid-frcj3tyv] p[data-astro-cid-frcj3tyv] {
                font-size: 1.125rem
            }
        }

        .flexible__list[data-astro-cid-frcj3tyv] {
            display: flex;
            flex-direction: column;
            gap: 12px
        }

        .flexible__item[data-astro-cid-frcj3tyv] {
            display: grid;
            grid-template-columns: minmax(250px, .4fr) 1fr;
            min-height: 110px;
            gap: 48px;
            padding: 28px 32px;
            background: #fff;
            border: 1px solid var(--accent-strong);
            border-radius: 12px;
            align-items: start
        }

        .flexible__title[data-astro-cid-frcj3tyv] {
            display: flex;
            align-items: center;
            gap: 12px
        }

        .flexible__title[data-astro-cid-frcj3tyv] svg[data-astro-cid-frcj3tyv] {
            width: 24px;
            height: 24px;
            color: var(--accent-strong);
            flex-shrink: 0
        }

        .flexible__item[data-astro-cid-frcj3tyv] h3[data-astro-cid-frcj3tyv] {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 500;
            color: var(--accent-strong)
        }

        .flexible__item[data-astro-cid-frcj3tyv] p[data-astro-cid-frcj3tyv] {
            margin: 0;
            font-size: .9375rem;
            line-height: 1.6;
            color: #374151;
            padding-top: 2px
        }

        @media(max-width:900px) {
            .flexible__item[data-astro-cid-frcj3tyv] {
                grid-template-columns: 1fr;
                gap: 12px;
                padding: 24px
            }

            .flexible__item[data-astro-cid-frcj3tyv] p[data-astro-cid-frcj3tyv] {
                padding-top: 0;
                padding-left: 36px
            }
        }

        @media(max-width:700px) {
            .flexible[data-astro-cid-frcj3tyv] {
                padding: 59px 24px
            }

            .flexible__item[data-astro-cid-frcj3tyv] {
                padding: 20px
            }

            .flexible__item[data-astro-cid-frcj3tyv] h3[data-astro-cid-frcj3tyv] {
                font-size: 1.125rem
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

        .se[data-astro-cid-lhig72tx] {
            padding: 67px min(8vw, 110px);
            background: #f8fafc
        }

        .se__inner[data-astro-cid-lhig72tx] {
            max-width: 1200px;
            margin: 0 auto
        }

        .se__header[data-astro-cid-lhig72tx] {
            margin: 0 0 32px
        }

        .se__header[data-astro-cid-lhig72tx] h2[data-astro-cid-lhig72tx] {
            margin: 0 0 12px;
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 500
        }

        .se__header[data-astro-cid-lhig72tx] p[data-astro-cid-lhig72tx] {
            margin: 0;
            font-size: .9375rem;
            line-height: 1.6;
            color: #4b5563;
            font-weight: 400
        }

        @media(min-width:1024px) {
            .se__header[data-astro-cid-lhig72tx] p[data-astro-cid-lhig72tx] {
                font-size: 1.125rem
            }
        }

        .se__cards[data-astro-cid-lhig72tx] {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 16px;
            margin-top: 0;
            margin-bottom: 0
        }

        .se__card[data-astro-cid-lhig72tx] {
            background: #fff;
            border: var(--card-border);
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column
        }

        .se__card-top[data-astro-cid-lhig72tx] {
            padding: 28px 24px 20px;
            flex: 1
        }

        .se__card-label[data-astro-cid-lhig72tx] {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px
        }

        .se__icon[data-astro-cid-lhig72tx] {
            width: 40px;
            height: 40px;
            flex-shrink: 0
        }

        .se__icon[data-astro-cid-lhig72tx] svg[data-astro-cid-lhig72tx] {
            width: 40px;
            height: 40px;
            display: block
        }

        .se__prevalence-trigger[data-astro-cid-lhig72tx] {
            position: relative;
            margin-left: auto;
            flex-shrink: 0
        }

        .se__prevalence-btn[data-astro-cid-lhig72tx] {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            padding: 0;
            border: none;
            background: none;
            color: #9ca3af;
            cursor: pointer;
            transition: color .15s ease
        }

        .se__prevalence-btn[data-astro-cid-lhig72tx]:hover,
        .se__prevalence-btn[data-astro-cid-lhig72tx]:focus-visible {
            color: var(--accent, #1A3D7A)
        }

        .se__prevalence-btn[data-astro-cid-lhig72tx] svg[data-astro-cid-lhig72tx] {
            width: 16px;
            height: 16px
        }

        .se__prevalence-pop[data-astro-cid-lhig72tx] {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            z-index: 20;
            background: #fff;
            border: var(--card-border);
            border-radius: 10px;
            padding: 12px 14px;
            white-space: nowrap;
            box-shadow: 0 4px 16px #0000001a;
            display: flex;
            flex-direction: column;
            gap: 6px;
            visibility: hidden;
            opacity: 0;
            transition: opacity .15s ease, visibility .15s ease;
            pointer-events: none
        }

        .se__prevalence-trigger[data-astro-cid-lhig72tx]:hover .se__prevalence-pop[data-astro-cid-lhig72tx],
        .se__prevalence-trigger[data-astro-cid-lhig72tx]:focus-within .se__prevalence-pop[data-astro-cid-lhig72tx] {
            visibility: visible;
            opacity: 1;
            pointer-events: auto
        }

        .se__people[data-astro-cid-lhig72tx] {
            display: flex;
            gap: 3px;
            align-items: flex-end
        }

        .se__person[data-astro-cid-lhig72tx] {
            width: 11px;
            height: 17px;
            color: #e5e7eb;
            flex-shrink: 0
        }

        .se__person--active[data-astro-cid-lhig72tx] {
            color: var(--accent, #1A3D7A)
        }

        .se__prevalence-label[data-astro-cid-lhig72tx] {
            font-size: 11px;
            color: #6b7280;
            font-weight: 400
        }

        .se__fear[data-astro-cid-lhig72tx] {
            margin: 0 0 8px;
            font-size: 1.0625rem;
            font-weight: 500;
            color: #111827;
            line-height: 1.4
        }

        .se__condition[data-astro-cid-lhig72tx] {
            font-size: 12px;
            font-weight: 700;
            color: var(--accent, #1A3D7A);
            text-transform: uppercase;
            letter-spacing: .08em
        }

        .se__reality[data-astro-cid-lhig72tx] {
            margin: 0;
            font-size: .875rem;
            color: #4b5563;
            line-height: 1.55
        }

        .se__reality-label[data-astro-cid-lhig72tx] {
            font-weight: 600;
            color: #111827
        }

        .se__card[data-astro-cid-lhig72tx].is-active {
            border-color: var(--accent, #1A3D7A)
        }

        .se__trigger[data-astro-cid-lhig72tx] {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 14px 24px;
            border: none;
            border-top: 1px solid #f3f4f6;
            background: transparent;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            color: var(--accent, #1A3D7A);
            cursor: pointer;
            transition: background .15s ease;
            text-align: left
        }

        .se__trigger[data-astro-cid-lhig72tx]:hover {
            background: #f8fafc
        }

        .se__trigger[data-astro-cid-lhig72tx] svg[data-astro-cid-lhig72tx] {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            transition: transform .2s ease
        }

        .se__card[data-astro-cid-lhig72tx].is-active .se__trigger[data-astro-cid-lhig72tx] svg[data-astro-cid-lhig72tx] {
            transform: rotate(180deg)
        }

        .se__panel[data-astro-cid-lhig72tx] {
            margin-top: 8px;
            background: #fff;
            border: 1px solid var(--accent, #1A3D7A);
            border-radius: 16px;
            padding: 28px 32px;
            animation: seReveal .2s ease forwards
        }

        @keyframes seReveal {
            0% {
                opacity: 0;
                transform: translateY(-6px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .se__panel-heading[data-astro-cid-lhig72tx] {
            margin: 0 0 16px;
            font-size: .9375rem;
            font-weight: 600;
            color: #111827
        }

        .se__panel-list[data-astro-cid-lhig72tx] {
            margin: 0;
            padding: 0;
            list-style: none;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px 32px
        }

        .se__panel-list[data-astro-cid-lhig72tx] li[data-astro-cid-lhig72tx] {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: .875rem;
            color: #374151;
            line-height: 1.5
        }

        .se__panel-list[data-astro-cid-lhig72tx] li[data-astro-cid-lhig72tx]:before {
            content: "";
            flex-shrink: 0;
            width: 18px;
            height: 18px;
            margin-top: 1px;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 18 18' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='9' cy='9' r='9' fill='%231A3D7A' fill-opacity='0.1'/%3E%3Cpath d='M5 9l3 3 5-5' stroke='%231A3D7A' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-size: contain
        }

        @media(max-width:700px) {
            .se[data-astro-cid-lhig72tx] {
                padding: 59px 24px
            }

            .se__cards[data-astro-cid-lhig72tx] {
                display: flex;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                gap: 16px;
                padding-bottom: 8px;
                -webkit-overflow-scrolling: touch
            }

            .se__card[data-astro-cid-lhig72tx] {
                min-width: 80%;
                scroll-snap-align: start
            }
        }

        .se__video-trigger[data-astro-cid-lhig72tx] {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 16px;
            padding: 0;
            border: none;
            background: none;
            font-family: inherit;
            font-size: .9375rem;
            font-weight: 500;
            color: var(--accent, #1A3D7A);
            cursor: pointer;
            text-decoration: underline;
            text-underline-offset: 3px
        }

        .se__video-trigger[data-astro-cid-lhig72tx]:hover {
            opacity: .75
        }

        .se__video-play[data-astro-cid-lhig72tx] {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0
        }

        .se__video-play[data-astro-cid-lhig72tx] svg[data-astro-cid-lhig72tx] {
            width: 28px;
            height: 28px;
            color: var(--accent, #1A3D7A)
        }

        .se__modal[data-astro-cid-lhig72tx] {
            position: fixed;
            inset: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px
        }

        .se__modal[data-astro-cid-lhig72tx][hidden] {
            display: none
        }

        .se__modal-backdrop[data-astro-cid-lhig72tx] {
            position: absolute;
            inset: 0;
            background: #000000bf
        }

        .se__modal-box[data-astro-cid-lhig72tx] {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 860px;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 24px 64px #00000080
        }

        .se__modal-close[data-astro-cid-lhig72tx] {
            position: absolute;
            top: 12px;
            right: 12px;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 50%;
            background: #0009;
            color: #fff;
            cursor: pointer;
            transition: background .15s ease
        }

        .se__modal-close[data-astro-cid-lhig72tx]:hover {
            background: #000000e6
        }

        .se__modal-close[data-astro-cid-lhig72tx] svg[data-astro-cid-lhig72tx] {
            width: 18px;
            height: 18px
        }

        .se__modal-video[data-astro-cid-lhig72tx] {
            position: relative;
            padding-bottom: 56.25%;
            height: 0
        }

        .se__modal-video[data-astro-cid-lhig72tx] iframe[data-astro-cid-lhig72tx] {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            border: none
        }

        .video-explainer[data-astro-cid-rmfbf4o2] {
            padding: 67px min(8vw, 110px);
            background: radial-gradient(circle at top left, rgba(223, 242, 255, .95), transparent 42%), linear-gradient(180deg, #f8fbff, #eef5ff)
        }

        .video-explainer__inner[data-astro-cid-rmfbf4o2] {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(0, .88fr) minmax(0, 1.12fr);
            gap: 40px;
            align-items: center
        }

        .video-explainer__copy[data-astro-cid-rmfbf4o2] h2[data-astro-cid-rmfbf4o2] {
            margin: 0 0 14px;
            font-size: clamp(28px, 3vw, 38px);
            line-height: 1.1;
            font-weight: 500;
            color: #111827
        }

        .video-explainer__eyebrow[data-astro-cid-rmfbf4o2] {
            margin: 0 0 12px;
            font-size: .8125rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #1d4ed8
        }

        .video-explainer__intro[data-astro-cid-rmfbf4o2] {
            margin: 0;
            font-size: 1rem;
            line-height: 1.75;
            color: #4b5563
        }

        .video-explainer__bullets[data-astro-cid-rmfbf4o2] {
            margin: 24px 0 0;
            padding: 0;
            list-style: none;
            display: grid;
            gap: 12px
        }

        .video-explainer__bullets[data-astro-cid-rmfbf4o2] li[data-astro-cid-rmfbf4o2] {
            position: relative;
            padding-left: 30px;
            font-size: .95rem;
            line-height: 1.65;
            color: #1f2937
        }

        .video-explainer__bullets[data-astro-cid-rmfbf4o2] li[data-astro-cid-rmfbf4o2]:before {
            content: "";
            position: absolute;
            left: 0;
            top: .5rem;
            width: 12px;
            height: 12px;
            border-radius: 999px;
            background: linear-gradient(135deg, #1d4ed8, #60a5fa);
            box-shadow: 0 0 0 5px #60a5fa2e
        }

        .video-explainer__media[data-astro-cid-rmfbf4o2] {
            display: grid;
            gap: 14px
        }

        .video-explainer__frame[data-astro-cid-rmfbf4o2] {
            padding: 14px;
            border-radius: 28px;
            background: linear-gradient(145deg, #fffffff5, #dbeafee0);
            box-shadow: 0 28px 60px #0f172a1f, inset 0 1px #ffffffe6
        }

        .video-explainer__video[data-astro-cid-rmfbf4o2] {
            display: block;
            width: 100%;
            aspect-ratio: 16 / 9;
            border-radius: 20px;
            background: #0f172a
        }

        .video-explainer__caption[data-astro-cid-rmfbf4o2] {
            margin: 0;
            font-size: .8125rem;
            line-height: 1.5;
            color: #64748b
        }

        @media(max-width:960px) {
            .video-explainer__inner[data-astro-cid-rmfbf4o2] {
                grid-template-columns: 1fr
            }
        }

        @media(max-width:700px) {
            .video-explainer[data-astro-cid-rmfbf4o2] {
                padding: 59px 24px
            }

            .video-explainer__frame[data-astro-cid-rmfbf4o2] {
                padding: 10px;
                border-radius: 22px
            }

            .video-explainer__video[data-astro-cid-rmfbf4o2] {
                border-radius: 16px
            }
        }

        .weight-loss[data-astro-cid-baj7ehwi] {
            display: flex;
            flex-direction: column;
            --hero-stack-gap: .875rem
        }

        .weight-loss .hero--category .hero__top {
            margin-bottom: var(--hero-stack-gap) !important
        }

        .weight-loss .hero--category .hero__headline {
            margin: 0 !important
        }

        .weight-loss .hero--category .hero__trustpilot-inline {
            margin-top: var(--hero-stack-gap) !important;
            margin-bottom: 0 !important
        }

        .weight-loss .hero--category .hero__cta-group {
            padding-top: var(--hero-stack-gap) !important
        }

        @media(min-width:1024px) {
            .weight-loss[data-astro-cid-baj7ehwi] {
                --hero-stack-gap: 1rem
            }

            .weight-loss .hero--category {
                background: linear-gradient(135deg, #fff6, #fff6), var(--hero-surface-gradient) !important;
                margin-top: -69px !important
            }

            .weight-loss .hero--category .hero__cta-group {
                padding-bottom: 0 !important
            }

            .weight-loss .hero--category .hero__image-wrapper--category {
                height: 430px !important
            }

            .weight-loss .hero--category .hero__image--category {
                width: 100% !important;
                height: 100% !important;
                object-fit: cover !important;
                object-position: center 25% !important;
                transform: none !important
            }
        }

        @media(max-width:1023px) {
            .weight-loss .hero--category {
                padding-top: calc(64px + .5rem) !important;
                padding-bottom: 1.75rem !important
            }

            .weight-loss .hero--category .hero__inner {
                display: flex !important;
                flex-direction: column
            }

            .weight-loss .hero--category .hero__content {
                display: contents
            }

            .weight-loss .hero--category .hero__breadcrumbs {
                order: 1
            }

            .weight-loss .hero--category .hero__top {
                order: 2;
                margin-top: .1rem !important;
                gap: .4rem !important
            }

            .weight-loss .hero--category .hero__headline {
                order: 3;
                padding-top: 0 !important
            }

            .weight-loss .hero--category .hero__trustpilot-inline {
                order: 4
            }

            .weight-loss .hero--category .hero__media {
                order: 5;
                display: block !important;
                width: 100% !important;
                margin-top: .625rem !important;
                margin-bottom: .2rem !important
            }

            .weight-loss .hero--category .hero__intro {
                order: 6
            }

            .weight-loss .hero--category .hero__cta-wrapper {
                order: 7
            }

            .weight-loss .hero--category .hero__cta-group {
                padding-bottom: .75rem !important;
                gap: .625rem !important
            }

            .weight-loss .hero--category .hero__bullets-simple {
                order: 8;
                margin-top: .5rem !important;
                gap: .25rem !important
            }

            .weight-loss .hero--category .hero__image-wrapper--category {
                height: 188px !important;
                width: 100% !important;
                border-radius: 1rem !important
            }

            .weight-loss .hero--category .hero__image--category {
                width: 100% !important;
                height: 100% !important;
                object-fit: cover !important;
                object-position: center 22% !important;
                transform: none !important
            }
        }

        .testimonial[data-astro-cid-iq3ewb3i] {
            padding: 40px min(8vw, 110px);
            background: var(--surface-tint)
        }

        .testimonial__inner[data-astro-cid-iq3ewb3i] {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 2rem;
            align-items: center
        }

        .testimonial__body[data-astro-cid-iq3ewb3i] {
            display: grid;
            gap: 1rem
        }

        .testimonial__body[data-astro-cid-iq3ewb3i] h2[data-astro-cid-iq3ewb3i] {
            margin: 0;
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 500
        }

        .testimonial__text[data-astro-cid-iq3ewb3i] {
            display: grid;
            gap: 1rem;
            color: #374151;
            line-height: 1.6;
            font-size: 1rem;
            font-weight: 400
        }

        .testimonial__text[data-astro-cid-iq3ewb3i] p[data-astro-cid-iq3ewb3i] {
            margin: 0
        }

        .testimonial__text[data-astro-cid-iq3ewb3i] blockquote[data-astro-cid-iq3ewb3i] {
            margin: 10px 0 0;
            padding: .35rem 0;
            color: #111827;
            font-size: 1.0625rem;
            font-style: italic;
            font-weight: 400;
            line-height: 1.55
        }

        .testimonial__name[data-astro-cid-iq3ewb3i] {
            font-weight: 600;
            font-size: 1.125rem;
            color: #111827
        }

        .testimonial__link[data-astro-cid-iq3ewb3i] {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--accent-strong);
            font-weight: 600;
            text-decoration: none
        }

        .testimonial__link[data-astro-cid-iq3ewb3i] svg[data-astro-cid-iq3ewb3i] {
            width: 18px;
            height: 18px;
            flex-shrink: 0
        }

        .testimonial__media[data-astro-cid-iq3ewb3i] {
            display: flex;
            justify-content: center
        }

        .testimonial__media[data-astro-cid-iq3ewb3i] img[data-astro-cid-iq3ewb3i] {
            border-radius: 1rem;
            object-fit: cover;
            width: 100%;
            max-width: 240px;
            height: auto;
            aspect-ratio: 4 / 5
        }

        .testimonial__before-after[data-astro-cid-iq3ewb3i] {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            width: min(100%, 520px)
        }

        .testimonial__before-after[data-astro-cid-iq3ewb3i] figure[data-astro-cid-iq3ewb3i] {
            position: relative;
            margin: 0;
            overflow: hidden;
            border-radius: 1rem;
            background: #e5e7eb
        }

        .testimonial__before-after[data-astro-cid-iq3ewb3i] img[data-astro-cid-iq3ewb3i] {
            display: block;
            width: 100%;
            height: 100%;
            aspect-ratio: 9 / 13;
            object-fit: cover
        }

        .testimonial__before-after[data-astro-cid-iq3ewb3i] figcaption[data-astro-cid-iq3ewb3i] {
            position: absolute;
            left: 10px;
            bottom: 10px;
            padding: .35rem .6rem;
            border-radius: 999px;
            background: #ffffffeb;
            color: var(--accent-strong);
            font-size: .75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .06em
        }

        @media(max-width:900px) {
            .testimonial__inner[data-astro-cid-iq3ewb3i] {
                grid-template-columns: 1fr;
                gap: 1.5rem
            }

            .testimonial__media[data-astro-cid-iq3ewb3i] {
                order: -1
            }

            .testimonial__media[data-astro-cid-iq3ewb3i] img[data-astro-cid-iq3ewb3i] {
                max-width: 200px
            }

            .testimonial__before-after[data-astro-cid-iq3ewb3i] {
                width: min(100%, 420px)
            }
        }

        @media(max-width:700px) {
            .testimonial[data-astro-cid-iq3ewb3i] {
                padding: 32px 24px
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

        .payment-choice-support[data-astro-cid-fgdqirpq] {
            --campaign-coral: #f3b8bd;
            --subscribe-heading-color: #fff;
            position: relative;
            isolation: isolate;
            display: flex;
            min-height: clamp(38rem, 56vw, 46rem);
            overflow: hidden;
            padding: 72px min(8vw, 110px);
            align-items: center;
            background: #0a2149
        }

        .payment-choice-support__media[data-astro-cid-fgdqirpq],
        .payment-choice-support__overlay[data-astro-cid-fgdqirpq] {
            position: absolute;
            inset: 0
        }

        .payment-choice-support__media[data-astro-cid-fgdqirpq] {
            z-index: -2
        }

        .payment-choice-support__media[data-astro-cid-fgdqirpq] picture,
        .payment-choice-support__media[data-astro-cid-fgdqirpq] img {
            display: block;
            width: 100%;
            height: 100%
        }

        .payment-choice-support__media[data-astro-cid-fgdqirpq] img {
            object-fit: cover;
            object-position: 70% 58%
        }

        .payment-choice-support__overlay[data-astro-cid-fgdqirpq] {
            z-index: -1;
            background: linear-gradient(90deg, #051838d1, #051838a3 43%, #0518382e 72%, #0518380f)
        }

        .payment-choice-support__inner[data-astro-cid-fgdqirpq] {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto
        }

        .payment-choice-support__content[data-astro-cid-fgdqirpq] {
            max-width: 660px
        }

        .payment-choice-support[data-astro-cid-fgdqirpq] h2[data-astro-cid-fgdqirpq] {
            width: 100%;
            margin: 0 0 28px;
            color: #fff;
            font-size: clamp(32px, 3.5vw, 46px);
            font-weight: 600;
            letter-spacing: -.035em;
            line-height: 1.12;
            text-wrap: balance
        }

        .payment-choice-support[data-astro-cid-fgdqirpq] ul[data-astro-cid-fgdqirpq] {
            display: grid;
            gap: 14px;
            margin: 0;
            padding: 0;
            list-style: none
        }

        .payment-choice-support[data-astro-cid-fgdqirpq] li[data-astro-cid-fgdqirpq] {
            padding: 16px 18px;
            border-left: 3px solid var(--campaign-coral);
            border-radius: 0 14px 14px 0;
            background: #0a2149c7
        }

        .payment-choice-support[data-astro-cid-fgdqirpq] li[data-astro-cid-fgdqirpq] p[data-astro-cid-fgdqirpq] {
            margin: 0;
            color: #ffffffeb;
            font-size: .9375rem;
            font-weight: 400;
            line-height: 1.65
        }

        .payment-choice-support[data-astro-cid-fgdqirpq] li[data-astro-cid-fgdqirpq] strong[data-astro-cid-fgdqirpq] {
            display: block;
            margin-bottom: 2px;
            color: #fff;
            font-size: 1rem;
            font-weight: 700
        }

        .payment-choice-support__cta[data-astro-cid-fgdqirpq] {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            min-height: 52px;
            margin-top: 24px;
            padding: 0 26px;
            border-radius: 999px;
            background: #fff;
            color: var(--cta-primary);
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none
        }

        .payment-choice-support__cta[data-astro-cid-fgdqirpq]:focus-visible {
            outline: 3px solid var(--accent);
            outline-offset: 3px
        }

        @media(min-width:1024px) {
            .payment-choice-support[data-astro-cid-fgdqirpq] li[data-astro-cid-fgdqirpq] p[data-astro-cid-fgdqirpq] {
                font-size: 1rem
            }

            .payment-choice-support[data-astro-cid-fgdqirpq] li[data-astro-cid-fgdqirpq] strong[data-astro-cid-fgdqirpq] {
                font-size: 1.0625rem
            }
        }

        @media(max-width:700px) {
            .payment-choice-support[data-astro-cid-fgdqirpq] {
                min-height: 46rem;
                padding: 59px 24px
            }

            .payment-choice-support__media[data-astro-cid-fgdqirpq] img {
                object-position: 88% 54%
            }

            .payment-choice-support__overlay[data-astro-cid-fgdqirpq] {
                background: #051838ad
            }

            .payment-choice-support__content[data-astro-cid-fgdqirpq] {
                max-width: none
            }

            .payment-choice-support[data-astro-cid-fgdqirpq] li[data-astro-cid-fgdqirpq] {
                background: #0a2149d6
            }

            .payment-choice-support__cta[data-astro-cid-fgdqirpq] {
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
   