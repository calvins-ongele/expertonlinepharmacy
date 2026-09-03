 <div class="announcement-bar" aria-label="Announcements" data-astro-cid-3isblsjf>
     <div class="announcement-bar__static" data-astro-cid-3isblsjf> <a href="#" class="announcement-bar__link" target="_blank" rel="noopener noreferrer" data-astro-cid-3isblsjf>
             Rated 4.6 on Trustpilot
         </a> <span class="announcement-bar__divider" aria-hidden="true" data-astro-cid-3isblsjf>|</span> <a href="https://www.thetimes.com/sunday-times-100-fast-growth/company-profile/article/uk-2026-simple-online-healthcare-w3x0vxmtt" class="announcement-bar__link" target="_blank" rel="noopener noreferrer nofollow" data-astro-cid-3isblsjf>
             Listed in The Sunday Times 100, 2026
         </a> </div>
     <div class="announcement-bar__carousel" data-astro-cid-3isblsjf>
         <div class="announcement-bar__slide announcement-bar__slide--active" data-astro-cid-3isblsjf> <a href="#" class="announcement-bar__link" target="_blank" rel="noopener noreferrer" data-astro-cid-3isblsjf>
                 Rated 4.6 on Trustpilot
             </a> </div>
         <div class="announcement-bar__slide" data-astro-cid-3isblsjf> <a href="https://www.thetimes.com/sunday-times-100-fast-growth/company-profile/article/uk-2026-simple-online-healthcare-w3x0vxmtt" class="announcement-bar__link" target="_blank" rel="noopener noreferrer nofollow" data-astro-cid-3isblsjf>
                 Listed in The Sunday Times 100, 2026
             </a> </div>
     </div>
 </div>
 <script type="module">
     const e = document.querySelector(".announcement-bar__carousel");
     if (e && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
         const a = e.querySelectorAll(".announcement-bar__slide");
         let n = 0,
             t = null;
         const c = () => {
                 a[n].classList.remove("announcement-bar__slide--active"), n = (n + 1) % a.length, a[n].classList.add("announcement-bar__slide--active")
             },
             r = () => {
                 t = setInterval(c, 5e3)
             },
             s = () => {
                 t !== null && (clearInterval(t), t = null)
             };
         r(), e.addEventListener("pointerenter", s), e.addEventListener("focusin", s), e.addEventListener("pointerleave", r), e.addEventListener("focusout", r)
     }
 </script>

 <header class="header" data-component="navigation" data-astro-cid-wimnwge2>
     <div class="header__inner" data-astro-cid-wimnwge2> <a class="header__logo" href="/" data-astro-cid-wimnwge2>
             <img src="/public/assets/uploads/<?= $this->_company['c_logo'] ?>" alt="<?= $this->_company['c_name'] ?>" width="140" height="32" loading="eager" fetchpriority="high" data-astro-cid-wimnwge2> </a>
         <nav class="astronav-items astronav-toggle header__nav hidden" aria-label="Primary" data-astro-cid-wimnwge2="true">
             <ul class="header__nav-list" data-astro-cid-wimnwge2>
                 <li class="header__nav-item" data-astro-cid-wimnwge2>
                     <menu class="astronav-dropdown header__dropdown" data-astro-cid-wimnwge2="true" aria-expanded="false"> 
                        <button class="header__nav-link header__nav-link--trigger" type="button" data-astro-cid-wimnwge2> <span data-astro-cid-wimnwge2>Online Doctor</span> <svg viewBox="0 0 24 24" aria-hidden="true" class="header__caret" data-astro-cid-wimnwge2>
                                 <path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-wimnwge2></path>
                             </svg> </button>
                         <div class="astronav-dropdown dropdown-toggle hidden header__dropdown-items" data-astro-cid-wimnwge2="true" aria-expanded="false">
                             <div class="header__dropdown-panel" data-astro-cid-wimnwge2>
                                 <div class="header__dropdown-content" data-astro-cid-wimnwge2>
                                     <div class="header__dropdown-two-pane" data-menu="Online Doctor" data-astro-cid-wimnwge2>
                                         <div class="header__dropdown-pane header__dropdown-pane--left" data-astro-cid-wimnwge2>
                                             <ul class="header__dropdown-left-list" data-astro-cid-wimnwge2>
                                                 <li data-astro-cid-wimnwge2> <button class="header__dropdown-left-item" type="button" data-group="group-0" data-astro-cid-wimnwge2> Weight Care </button> </li>
                                                 <li data-astro-cid-wimnwge2> <button class="header__dropdown-left-item" type="button" data-group="group-1" data-astro-cid-wimnwge2> Men's Health </button> </li>
                                                 <li data-astro-cid-wimnwge2> <button class="header__dropdown-left-item" type="button" data-group="group-2" data-astro-cid-wimnwge2> Women's Health </button> </li>
                                                 <li data-astro-cid-wimnwge2> <button class="header__dropdown-left-item" type="button" data-group="group-3" data-astro-cid-wimnwge2> Skin Conditions </button> </li>
                                                 <li data-astro-cid-wimnwge2> <button class="header__dropdown-left-item" type="button" data-group="group-4" data-astro-cid-wimnwge2> General Health </button> </li>
                                                 <li data-astro-cid-wimnwge2> <button class="header__dropdown-left-item" type="button" data-group="group-5" data-astro-cid-wimnwge2> Sexual Health </button> </li>
                                                 <li data-astro-cid-wimnwge2> <button class="header__dropdown-left-item" type="button" data-group="group-6" data-astro-cid-wimnwge2> Chronic Conditions </button> </li>
                                                 <li data-astro-cid-wimnwge2> <button class="header__dropdown-left-item" type="button" data-group="group-7" data-astro-cid-wimnwge2> Travel Health </button> </li>
                                              
                                             </ul>
                                         </div>
                                         <div class="header__dropdown-pane header__dropdown-pane--right" data-astro-cid-wimnwge2>
                                            <?php 
                                            $i = 0;
                                            foreach($this->_categories as $category ) { 
                                                if ($category['category_type'] != 'products') continue; ?>
                                             <div class="header__dropdown-panel-content" data-group="group-<?= $i ?>" data-astro-cid-wimnwge2>
                                                 <div class="header__desktop-content" data-astro-cid-wimnwge2>
                                                     <div class="header__dropdown-group header__dropdown-group--level-0" data-astro-cid-wimnwge2>
                                                         <div class="header__dropdown-children" data-astro-cid-wimnwge2>
                                                             <div class="header__dropdown-group header__dropdown-group--level-1" data-astro-cid-wimnwge2> <a class="header__dropdown-group-link" href="/products/categories/<?= $category['slug'] ?>" data-astro-cid-wimnwge2> <?= $category['title'] ?> </a>
                                                                 <div class="header__dropdown-section header__dropdown-section--level-1" data-astro-cid-wimnwge2>
                                                                     <p class="header__dropdown-section-title" data-astro-cid-wimnwge2>Treatments Available</p>
                                                                     <ul class="header__dropdown-section-list" data-astro-cid-wimnwge2>
                                                                        <?php foreach ($category['inner_content'] as $row) {  ?>
                                                                        <li data-astro-cid-wimnwge2> 
                                                                            <a class="header__dropdown-section-link" href="/products/<?= $row['slug'] ?>" data-astro-cid-wimnwge2> <?= $row['title'] ?> </a> 
                                                                        </li>
                                                                        <?php } ?>
                                                                            
                                                                     </ul>
                                                                 </div>
                                                             </div>
                                                            
                                                           
                                                         </div>
                                                     </div>
                                                 </div>
                                                 
                                             </div>
                                             <?php $i++; } ?>
                                           
                                              
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </menu>
                 </li>
                 <li class="header__nav-item" data-astro-cid-wimnwge2>
                     <menu class="astronav-dropdown header__dropdown" data-astro-cid-wimnwge2="true" aria-expanded="false"> <button class="header__nav-link header__nav-link--trigger" type="button" data-astro-cid-wimnwge2> <span data-astro-cid-wimnwge2>Advice</span> <svg viewBox="0 0 24 24" aria-hidden="true" class="header__caret" data-astro-cid-wimnwge2>
                                 <path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-wimnwge2></path>
                             </svg> </button>
                         <div class="astronav-dropdown dropdown-toggle hidden header__dropdown-items" data-astro-cid-wimnwge2="true" aria-expanded="false">
                             <div class="header__dropdown-panel" data-astro-cid-wimnwge2>
                                 <div class="header__dropdown-content" data-astro-cid-wimnwge2>
                                     <div class="header__dropdown-two-pane" data-menu="Advice" data-astro-cid-wimnwge2>
                                         <div class="header__dropdown-pane header__dropdown-pane--left" data-astro-cid-wimnwge2>
                                             <ul class="header__dropdown-left-list" data-astro-cid-wimnwge2>
                                                 <li data-astro-cid-wimnwge2> <button class="header__dropdown-left-item" type="button" data-group="group-0" data-astro-cid-wimnwge2> Weight Care </button> </li>
                                                 <li data-astro-cid-wimnwge2> <button class="header__dropdown-left-item" type="button" data-group="group-1" data-astro-cid-wimnwge2> Men's Health </button> </li>
                                                 <li data-astro-cid-wimnwge2> <button class="header__dropdown-left-item" type="button" data-group="group-2" data-astro-cid-wimnwge2> Women's Health </button> </li>
                                                 <li data-astro-cid-wimnwge2> <button class="header__dropdown-left-item" type="button" data-group="group-3" data-astro-cid-wimnwge2> General Conditions </button> </li>
                                             </ul>
                                         </div>
                                         <div class="header__dropdown-pane header__dropdown-pane--right" data-astro-cid-wimnwge2>
                                            <?php $i = 0;
                                                  foreach($this->_categories as $category ) { 
                                                    if ($category['category_type'] != 'products') continue; ?>
                                             <div class="header__dropdown-panel-content" data-group="group-<?= $i ?>" data-astro-cid-wimnwge2>
                                                 <div class="header__desktop-content" data-astro-cid-wimnwge2>
                                                     <div class="header__dropdown-group header__dropdown-group--level-0" data-astro-cid-wimnwge2>
                                                         <div class="header__dropdown-children" data-astro-cid-wimnwge2>
                                                             <div class="header__dropdown-group header__dropdown-group--level-1" data-astro-cid-wimnwge2> <a class="header__dropdown-group-link" href="/content/?category=<?= $category['slug'] ?>" data-astro-cid-wimnwge2> <?= $category['title'] ?> </a> </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <details class="header__mobile-group-accordion" data-astro-cid-wimnwge2>
                                                     <summary class="header__mobile-group-toggle" data-astro-cid-wimnwge2> <span data-astro-cid-wimnwge2><?= $category['title'] ?></span> <svg viewBox="0 0 24 24" aria-hidden="true" class="header__caret" data-astro-cid-wimnwge2>
                                                             <path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-wimnwge2></path>
                                                         </svg> </summary>
                                                     <div class="header__mobile-group-content" data-astro-cid-wimnwge2>
                                                         <ul class="header__mobile-links" data-astro-cid-wimnwge2>
                                                             <?php foreach ($category['inner_content'] as $row) {  ?>
                                                                <li data-astro-cid-wimnwge2> 
                                                                    <a class="header__mobile-link header__mobile-link--subcat" href="/content/<?= $row['slug'] ?>" data-astro-cid-wimnwge2> <?= $row['title'] ?> </a> 
                                                                </li>
                                                                <?php } ?>
                                                                             
                                                         </ul>
                                                     </div>
                                                 </details>
                                             </div>
                                             <?php $i++; } ?>
                                             
                                             
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </menu>
                 </li>
                 <li class="header__nav-item header__nav-item--mobile-only" data-astro-cid-wimnwge2> <a class="header__nav-link" href="/search/" data-astro-cid-wimnwge2> Search </a> </li>
                 <li class="header__nav-item header__nav-item--mobile-only" data-astro-cid-wimnwge2> <a class="header__nav-link" href="/contact-us" data-astro-cid-wimnwge2> Support </a> </li>
                 <li class="header__nav-item header__nav-item--mobile-only" data-astro-cid-wimnwge2> <a class="header__nav-link" href="/login/" data-astro-cid-wimnwge2> Account </a> </li>
             </ul>
         </nav>
         <div class="header__actions" data-astro-cid-wimnwge2> <a class="header__support" href="/contact-us" data-astro-cid-wimnwge2>
                 Support
             </a>   
                 <a class="header__icon header__icon--basket" href="/basket/" aria-label="Basket" data-header-basket-link data-astro-cid-wimnwge2> <svg viewBox="0 0 24 24" aria-hidden="true" data-astro-cid-wimnwge2>
                     <path d="M5 10h14l-1.6 8H6.6L5 10Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" data-astro-cid-wimnwge2></path>
                     <path d="M8 10 12 5l4 5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-wimnwge2></path>
                     <path d="M9 13v2.5M12 13v2.5M15 13v2.5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" data-astro-cid-wimnwge2></path>
                 </svg> <span class="header__basket-count" data-header-basket-count hidden data-astro-cid-wimnwge2></span> </a> <button id="astronav-menu" aria-label="Toggle Menu"> <svg fill="currentColor" class="header__menu-toggle" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-astro-cid-wimnwge2="true">
                     <title>Toggle Menu</title>
                     <path class="astronav-close-icon astronav-toggle hidden" fill-rule="evenodd" clip-rule="evenodd" d="M18.278 16.864a1 1 0 01-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 01-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 011.414-1.414l4.829 4.828 4.828-4.828a1 1 0 111.414 1.414l-4.828 4.829 4.828 4.828z"></path>
                     <path class="astronav-open-icon astronav-toggle" fill-rule="evenodd" d="M4 5h16a1 1 0 010 2H4a1 1 0 110-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2z"></path>
                 </svg> </button> </div>
     </div>
     <script>
         (function() {
             const closeOnClick = true;

             ["DOMContentLoaded", "astro:after-swap"].forEach((event) => {
                 document.addEventListener(event, addListeners);
             });

             // Function to clone and replace elements
             function cloneAndReplace(element) {
                 const clone = element.cloneNode(true);
                 element.parentNode.replaceChild(clone, element);
             }

             function addListeners() {
                 // Clean up existing listeners
                 const oldMenuButton = document.getElementById("astronav-menu");
                 if (oldMenuButton) {
                     cloneAndReplace(oldMenuButton);
                 }

                 const oldDropdownMenus = document.querySelectorAll(".astronav-dropdown");
                 oldDropdownMenus.forEach((menu) => {
                     cloneAndReplace(menu);
                 });

                 // Mobile nav toggle
                 const menuButton = document.getElementById("astronav-menu");
                 menuButton && menuButton.addEventListener("click", toggleMobileNav);

                 // Dropdown menus
                 const dropdownMenus = document.querySelectorAll(".astronav-dropdown");
                 dropdownMenus.forEach((menu) => {
                     const button = menu.querySelector("button");
                     button &&
                         button.addEventListener("click", (event) =>
                             toggleDropdownMenu(event, menu, dropdownMenus)
                         );

                     // Handle Submenu Dropdowns
                     const dropDownSubmenus = menu.querySelectorAll(
                         ".astronav-dropdown-submenu"
                     );

                     dropDownSubmenus.forEach((submenu) => {
                         const submenuButton = submenu.querySelector("button");
                         submenuButton &&
                             submenuButton.addEventListener("click", (event) => {
                                 event.stopImmediatePropagation();
                                 toggleSubmenuDropdown(event, submenu);
                             });
                     });
                 });

                 // Clicking away from dropdown will remove the dropdown class
                 document.addEventListener("click", closeAllDropdowns);

                 if (closeOnClick) {
                     handleCloseOnClick();
                 }
             }

             function toggleMobileNav() {
                 [...document.querySelectorAll(".astronav-toggle")].forEach((el) => {
                     el.classList.toggle("hidden");
                 });
             }

             function toggleDropdownMenu(event, menu, dropdownMenus) {
                 toggleMenu(menu);

                 // Close one dropdown when selecting another
                 Array.from(dropdownMenus)
                     .filter((el) => el !== menu && !menu.contains(el))
                     .forEach(closeMenu);

                 event.stopPropagation();
             }

             function toggleSubmenuDropdown(event, submenu) {
                 event.stopPropagation();
                 toggleMenu(submenu);

                 // Close sibling submenus at the same nesting level
                 const siblingSubmenus = submenu
                     .closest(".astronav-dropdown")
                     .querySelectorAll(".astronav-dropdown-submenu");
                 Array.from(siblingSubmenus)
                     .filter((el) => el !== submenu && !submenu.contains(el))
                     .forEach(closeMenu);
             }

             function closeAllDropdowns(event) {
                 const dropdownMenus = document.querySelectorAll(".dropdown-toggle");
                 const dropdownParent = document.querySelectorAll(
                     ".astronav-dropdown, .astronav-dropdown-submenu"
                 );
                 const isButtonInsideDropdown = [
                     ...document.querySelectorAll(
                         `.astronav-dropdown button, .astronav-dropdown label, .astronav-dropdown input,
	  .astronav-dropdown-submenu button, .astronav-dropdown-submenu label, .astronav-dropdown-submenu input,
	  #astronav-menu`
                     ),
                 ].some((button) => button.contains(event.target));
                 if (!isButtonInsideDropdown) {
                     dropdownMenus.forEach((d) => {
                         // console.log("I ran", d);
                         // if (!d.contains(event.target)) {
                         d.classList.remove("open");
                         d.removeAttribute("open");
                         d.classList.add("hidden");
                         // }
                     });
                     dropdownParent.forEach((d) => {
                         d.classList.remove("open");
                         d.removeAttribute("open");
                         d.setAttribute("aria-expanded", "false");
                     });
                 }
             }

             function toggleMenu(menu) {
                 menu.classList.toggle("open");
                 const expanded = menu.getAttribute("aria-expanded") === "true";
                 menu.setAttribute("aria-expanded", expanded ? "false" : "true");
                 menu.hasAttribute("open") ?
                     menu.removeAttribute("open") :
                     menu.setAttribute("open", "");

                 const dropdownToggle = menu.querySelector(".dropdown-toggle");
                 const dropdownExpanded = dropdownToggle.getAttribute("aria-expanded");
                 dropdownToggle.classList.toggle("hidden");
                 dropdownToggle.setAttribute(
                     "aria-expanded",
                     dropdownExpanded === "true" ? "false" : "true"
                 );
             }

             function closeMenu(menu) {
                 // console.log("closing", menu);
                 menu.classList.remove("open");
                 menu.removeAttribute("open");
                 menu.setAttribute("aria-expanded", "false");
                 const dropdownToggles = menu.querySelectorAll(".dropdown-toggle");
                 dropdownToggles.forEach((toggle) => {
                     toggle.classList.add("hidden");
                     toggle.setAttribute("aria-expanded", "false");
                 });
             }

             function handleCloseOnClick() {
                 const navMenuItems = document.querySelector(".astronav-items");
                 const navToggle = document.getElementById("astronav-menu");
                 const navLink = navMenuItems && navMenuItems.querySelectorAll("a");

                 const MenuIcons = navToggle.querySelectorAll(".astronav-toggle");

                 navLink &&
                     navLink.forEach((item) => {
                         item.addEventListener("click", () => {
                             navMenuItems?.classList.add("hidden");
                             MenuIcons.forEach((el) => {
                                 el.classList.toggle("hidden");
                             });
                         });
                     });
             }
         })();
     </script>
 </header>

 <script type="module">
     const u = "__memberAuthState",
         l = "member-auth-state",
         m = t => {
             const e = t?.basket?.item_count ?? t?.basket_item_count;
             if (typeof e == "number" && Number.isFinite(e)) return Math.max(0, Math.floor(e));
             if (typeof e == "string" && e.trim() !== "") {
                 const n = Number.parseInt(e, 10);
                 return Number.isFinite(n) ? Math.max(0, n) : 0
             }
             return 0
         },
         s = t => {
             const e = document.querySelector("[data-header-basket-link]"),
                 n = document.querySelector("[data-header-basket-count]");
             if (!(e instanceof HTMLAnchorElement) || !(n instanceof HTMLElement)) return;
             const i = m(t);
             if (t?.basket?.url && typeof t.basket.url == "string" && (e.href = t.basket.url), i <= 0) {
                 n.textContent = "", n.setAttribute("hidden", ""), e.setAttribute("aria-label", "Basket");
                 return
             }
             const o = i > 99 ? "99+" : String(i);
             n.textContent = o, n.removeAttribute("hidden"), e.setAttribute("aria-label", `Basket, ${i} ${i===1?"item":"items"}`)
         },
         f = () => {
             s(window[u]), window.addEventListener(l, t => {
                 s(t.detail)
             })
         },
         g = () => {
             const t = document.querySelector(".header__nav"),
                 e = document.getElementById("astronav-menu");
             !t || !e || t.classList.contains("hidden") || (t.classList.add("hidden"), e.querySelectorAll(".astronav-toggle").forEach(i => i.classList.toggle("hidden")))
         },
         b = () => {
             document.addEventListener("click", t => {
                 const e = t.target;
                 if (!(e instanceof Element)) return;
                 const n = document.querySelector(".header__nav"),
                     i = document.getElementById("astronav-menu");
                 n?.contains(e) || i?.contains(e) || g()
             })
         },
         h = () => {
             document.querySelectorAll(".header__mobile-group-accordion > summary, .header__mobile-subgroup > summary").forEach(t => {
                 t.dataset.initialized !== "true" && (t.dataset.initialized = "true", t.addEventListener("click", e => {
                     e.stopPropagation()
                 }))
             })
         },
         E = () => {
             document.querySelectorAll(".header__dropdown-two-pane").forEach(t => {
                 if (!(t instanceof HTMLElement) || t.dataset.initialized === "true") return;
                 t.dataset.initialized = "true";
                 const e = Array.from(t.querySelectorAll(".header__dropdown-left-item")),
                     n = Array.from(t.querySelectorAll(".header__dropdown-panel-content")),
                     i = a => {
                         e.forEach(r => {
                             r.classList.toggle("is-active", r.getAttribute("data-group") === a)
                         }), n.forEach(r => {
                             r.classList.toggle("is-active", r.getAttribute("data-group") === a)
                         })
                     },
                     o = e[0]?.getAttribute("data-group");
                 o && i(o), e.forEach(a => {
                     a.addEventListener("click", () => {
                         const r = a.getAttribute("data-group");
                         r && i(r)
                     })
                 })
             })
         },
         c = () => {
             b(), E(), h()
         },
         d = () => {
             typeof window > "u" || ("requestIdleCallback" in window ? window.requestIdleCallback(c, {
                 timeout: 2e3
             }) : window.setTimeout(c, 0))
         };
     window.addEventListener("load", d, {
         once: !0
     });
     window.addEventListener("astro:after-swap", d);
     f();
 </script>
 <div class="sticky-cta" data-component="sticky-cta" data-astro-cid-wi5z2meu>
     <div class="sticky-cta__inner" data-astro-cid-wi5z2meu>
         <div class="sticky-cta__content" data-astro-cid-wi5z2meu>
             <div class="sticky-cta__state" data-astro-cid-wi5z2meu>
                 <p class="sticky-cta__text" data-astro-cid-wi5z2meu>Take the first steps to feeling healthier overall</p> <a class="sticky-cta__button" href="/weight-loss/" data-astro-cid-wi5z2meu> 
                    <span data-astro-cid-wi5z2meu>Weight Loss Treatments</span> <svg viewBox="0 0 24 24" aria-hidden="true" data-astro-cid-wi5z2meu>
                         <path d="M5 12h14M13 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-astro-cid-wi5z2meu></path>
                     </svg> </a>
             </div>
         </div>
     </div>
 </div>
 <script type="module">
     document.addEventListener("DOMContentLoaded", () => {
         const e = document.querySelector('[data-component="sticky-cta"]'),
             t = document.querySelector('[data-component="hero"]');
         if (!e || !t) return;
         new IntersectionObserver(o => {
             o.forEach(s => {
                 s.isIntersecting ? e.classList.remove("is-visible") : e.classList.add("is-visible")
             })
         }, {
             threshold: 0,
             rootMargin: "-100px 0px 0px 0px"
         }).observe(t)
     });
 </script>