/* 
SCPOP version 1.0.8
2022 - Dagan Lev - https://github.com/daganlev/scpop
Licensed under the MIT license.
*/
let scpop = { scpopShowing: !1, pops: [] },
    SCPopActiveElement = null;
function scpopLoad(e) {
    scpop.pops.push({ currentSlide: 0 });
    let p = scpop.pops.length - 1,
        r = [];
    var t;
    "string" == typeof e && (t = document.querySelectorAll(e + " a")),
        (t = "object" == typeof e ? e.querySelectorAll("a") : t).forEach(
            function (o) {
                var c = r.length;
                let s = o;
                if (
                    /\.(jpg|jpeg|png|webp|gif|svg)$/.test(s.href.toLowerCase())
                ) {
                    let e = "",
                        t = "";
                    null != o.getAttribute("title") &&
                        "" != o.getAttribute("title") &&
                        ((e =
                            '<div class="scpop__item_caption">' +
                            o.getAttribute("title") +
                            "</div>"),
                        (t = o.getAttribute("title").replace('"', "'"))),
                        r.push(
                            '<li class="scpop__item" (' +
                                p +
                                ');" id="scpop_' +
                                p +
                                "_" +
                                c +
                                '"><img alt="' +
                                t +
                                '" data-src="' +
                                s.href +
                                '" />' +
                                e +
                                "</li>"
                        ),
                        (s.href = "javascript:scpopShow(" + p + "," + c + ");"),
                        s.removeAttribute("target");
                }
                if (s.classList.contains("scpopiframe")) {
                    let e = "",
                        t =
                            (null != o.getAttribute("title") &&
                                "" != o.getAttribute("title") &&
                                (e =
                                    '<div class="scpop__item_caption">' +
                                    o.getAttribute("title") +
                                    "</div>"),
                            s.href);
                    (o = t.match(/watch\?v\=(.*)$/i)),
                        (o = (t = o
                            ? "https://www.youtube.com/embed/" +
                              o[1] +
                              "?autoplay=1"
                            : t).match(/^https\:\/\/vimeo.com\/(\d+)$/i));
                    o &&
                        (t =
                            "https://player.vimeo.com/video/" +
                            o[1] +
                            "?autoplay=1"),
                        r.push(
                            '<li class="scpop__item" onclick="scpopClose(' +
                                p +
                                ');" id="scpop_' +
                                p +
                                "_" +
                                c +
                                '"><iframe frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen data-src="' +
                                t +
                                '"></iframe>' +
                                e +
                                "</li>"
                        ),
                        (s.href = "javascript:scpopShow(" + p + "," + c + ");"),
                        s.removeAttribute("target");
                }
            }
        );
    let o = document.createElement("div");
    o.className = "scpop scpop" + p;
    (e = '<ul class="scpop__toolbar">'),
        (e =
            (e =
                (e =
                    (e +=
                        '<li><a class="scpop__toolbar_close" href="javascript:scpopClose(' +
                        p +
                        ');"><span class="scpop-sr-only">Close</span>&#215;</a></li>') +
                    '<li><a class="scpop__toolbar_prev" href="javascript:scpopPrev(' +
                    p +
                    ');"><span class="scpop-sr-only">Previous item</span>&#171;</a></li>') +
                '<li><a class="scpop__toolbar_next" href="javascript:scpopNext(' +
                p +
                ');"><span class="scpop-sr-only">Next item</span>&#187;</a></li></ul>') +
            '<ul class="scpop__inner">' +
            r.join("") +
            "</ul>");
    (o.innerHTML = e), document.body.appendChild(o);
    let c = new IntersectionObserver(
        function (e, t) {
            e.forEach((e) => {
                e.isIntersecting &&
                    scpop.scpopShowing &&
                    (e.target.querySelector("img") &&
                        null !=
                            e.target
                                .querySelector("img")
                                .getAttribute("data-src") &&
                        (e.target
                            .querySelector("img")
                            .setAttribute(
                                "src",
                                e.target
                                    .querySelector("img")
                                    .getAttribute("data-src")
                            ),
                        e.target
                            .querySelector("img")
                            .removeAttribute("data-src")),
                    e.target.querySelector("iframe") &&
                        null !=
                            e.target
                                .querySelector("iframe")
                                .getAttribute("data-src") &&
                        (e.target
                            .querySelector("iframe")
                            .setAttribute(
                                "src",
                                e.target
                                    .querySelector("iframe")
                                    .getAttribute("data-src")
                            ),
                        e.target
                            .querySelector("iframe")
                            .removeAttribute("data-src")),
                    (scpop.pops[p].currentSlide = parseInt(
                        e.target.id.replace("scpop_" + p + "_", "")
                    )),
                    scpopcheckPrevNextButtons(p));
            });
        },
        {
            root: document.querySelector(".scpop" + p + " .scpop__inner"),
            rootMargin: "0px",
            threshold: 0.6,
        }
    );
    document
        .querySelectorAll(".scpop" + p + " .scpop__item")
        .forEach(function (e) {
            c.observe(e);
        });
}
function scpopSlideTo(e, t) {
    (scpop.pops[e].currentSlide = t),
        (document.querySelector(".scpop" + e + " .scpop__inner").scrollLeft =
            document.querySelectorAll(".scpop" + e + " .scpop__item")[
                t
            ].offsetLeft);
}
function scpopShow(o, e) {
    if (
        ((SCPopActiveElement = document.activeElement),
        scpopCreateFocusSandBox(),
        (document.querySelector(
            ".scpop" + o + " .scpop__inner"
        ).style.scrollBehavior = "unset"),
        0 == e)
    ) {
        let e = document
                .querySelectorAll(".scpop" + o + " .scpop__item")[0]
                .querySelector("img"),
            t =
                (e &&
                    null != e.getAttribute("data-src") &&
                    (e.setAttribute("src", e.getAttribute("data-src")),
                    e.removeAttribute("data-src")),
                document
                    .querySelectorAll(".scpop" + o + " .scpop__item")[0]
                    .querySelector("iframe"));
        t &&
            null != t.getAttribute("data-src") &&
            (t.setAttribute("src", t.getAttribute("data-src")),
            t.removeAttribute("data-src")),
            scpopcheckPrevNextButtons(o);
    }
    (scpop.scpopShowing = !0),
        scpopSlideTo(o, e),
        document.body.classList.add("scpopshow"),
        document.querySelector(".scpop" + o).classList.add("show"),
        window.setTimeout(function () {
            document.querySelector(
                ".scpop" + o + " .scpop__inner"
            ).style.scrollBehavior = "smooth";
        }, 300);
}
window.addEventListener("load", function () {
    var e = document
        .querySelector('script[src$="scpop.js"')
        .src.replace(".js", ".css");
    let t = document.createElement("link");
    (t.rel = "stylesheet"),
        (t.href = e),
        document.head.appendChild(t),
        document.addEventListener("keydown", function (e) {
            document.body.classList.contains("scpopshow") &&
                ("ArrowRight" == e.key &&
                    document
                        .querySelector(".scpop.show .scpop__toolbar_next")
                        .click(),
                "ArrowLeft" == e.key &&
                    document
                        .querySelector(".scpop.show .scpop__toolbar_prev")
                        .click());
        });
});
let scpopTrackTabStatus = -1;
function scpopCreateFocusSandBox() {
    (scpopTrackTabStatus = -1),
        document.addEventListener("keydown", scpopTrackKeys, !0);
}
function scpopTrackKeys(e) {
    if ("Tab" === e.key || 9 === e.keyCode) {
        switch (
            (e.shiftKey
                ? --scpopTrackTabStatus < 0 && (scpopTrackTabStatus = 2)
                : 3 <= ++scpopTrackTabStatus && (scpopTrackTabStatus = 0),
            scpopTrackTabStatus)
        ) {
            case 0:
                document
                    .querySelector(".scpop.show .scpop__toolbar_close")
                    .focus();
                break;
            case 1:
                document
                    .querySelector(".scpop.show .scpop__toolbar_prev")
                    .focus();
                break;
            case 2:
                document
                    .querySelector(".scpop.show .scpop__toolbar_next")
                    .focus();
        }
        e.preventDefault();
    }
}
function scpopDestroyFocusSandBox() {
    document.removeEventListener("keydown", scpopTrackKeys, !0);
}
function scpopClose(e) {
    SCPopActiveElement.focus(),
        scpopDestroyFocusSandBox(),
        (scpop.scpopShowing = !1),
        (document.querySelector(".scpop" + e).style.opacity = "0"),
        window.setTimeout(function () {
            document.querySelector(".scpop" + e).removeAttribute("style"),
                document.body.classList.remove("scpopshow"),
                document.querySelector(".scpop" + e).classList.remove("show"),
                document
                    .querySelectorAll(".scpop .scpop__item iframe")
                    .forEach((e) => {
                        null != e.getAttribute("src") &&
                            (e.setAttribute("data-src", e.getAttribute("src")),
                            e.removeAttribute("src"));
                    });
        }, 300);
}
function scpopPrev(e) {
    var t = document.querySelectorAll(".scpop" + e + " .scpop__item").length;
    let o = scpop.pops[e].currentSlide;
    scpopSlideTo(e, (o = --o < 0 ? t - 1 : o));
}
function scpopNext(e) {
    var t = document.querySelectorAll(".scpop" + e + " .scpop__item").length;
    let o = scpop.pops[e].currentSlide;
    scpopSlideTo(e, (o = ++o > t - 1 ? 0 : o));
}
function scpopcheckPrevNextButtons(e) {
    var t = document.querySelectorAll(".scpop" + e + " .scpop__item").length,
        o = scpop.pops[e].currentSlide;
    let c = document.querySelector(".scpop" + e + " .scpop__toolbar_prev"),
        s = document.querySelector(".scpop" + e + " .scpop__toolbar_next");
    (c.style.display = "none"),
        (s.style.display = "none"),
        0 < o && (c.style.display = "block"),
        o < t - 1 && (s.style.display = "block");
}
