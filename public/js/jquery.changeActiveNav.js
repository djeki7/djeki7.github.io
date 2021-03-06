/* changeActiveNav.js v1.0.1 */
/*!
 * The MIT License
 *
 * Copyright (c) 2016 Alexander Paukov
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to
 * deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
 * sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 */

! function(t) {
    var e = {
        init: function(n) {
            return this.each(function() {
                var n = t.extend({
                    menu: t(this)
                }, n);
                t(document).on("scroll.changeActiveNav", {
                    myOptions: n
                }, e.scroll)
            })
        },
        destroy: function() {
            return this.each(function() {
                t(document).off(".changeActiveNav")
            })
        },
        scroll: function(e) {
            var n = e.data.myOptions.menu,
                o = t(document).scrollTop();
            n.find("a").each(function() {
                var e = t(this).attr("href"),
                    i = t(e);
                i.position().top <= o && i.position().top + i.outerHeight() > o ? (n.find("a.active").removeClass("active"),
                    t(this).addClass("active")) : t(this).removeClass("active")
            })
        },
        click: function(n) {
            n.preventDefault();
            var o = n.data.myOptions.menu;
            t(document).off("scroll.changeActiveNav"),
                o.find("a.active").removeClass("active"),
                t(this).addClass("active");
            var i = t(this).attr("href"),
                a = t(i);
            t("html, body").animate({
                scrollTop: a.offset().top
            }, 500, function() {
                window.location.hash = i,
                    t(document).on("scroll.changeActiveNav", {
                        myOptions: n.data.myOptions
                    }, e.scroll)
            })
        }
    };
    t.fn.changeActiveNav = function(n) {
        return e[n] ? e[n].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof n && n ? void t.error("Method " + n + " does not exist on jQuery.changeActiveNav") : e.init.apply(this, arguments)
    }
}(jQuery);