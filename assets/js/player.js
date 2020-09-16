/* Yahoo! WebPlayer Loader, Build 0.9.75.  Copyright (c) 2012, Yahoo! Inc.  All rights reserved.
 * Your use of this Yahoo! WebPlayer is subject to the Yahoo! Terms of Service
 * located at http://info.yahoo.com/legal/us/yahoo/webplayer/details.html
 */ (function () {
    var d = "http://yui.yahooapis.com/3.5.1/build/yui/yui-min.js";
    if (typeof YAHOO == "undefined") {
        YAHOO = {};
    }
    if (typeof YAHOO.MediaPlayer == "undefined") {
        YAHOO.MediaPlayer = function () {
            this.controller = null;
        };
    }
    YAHOO.MediaPlayer.isAPIReady = false;
    YAHOO.MediaPlayer.onAPIReady = {
        subscribers: [],
        fire: function () {
            for (var f = 0; f < this.subscribers.length; f++) {
                if (YAHOO.MediaPlayer.isAPIReady === true) {
                    try {
                        this.subscribers[f]();
                    } catch (g) {}
                }
            }
        },
        subscribe: function (e) {
            this.subscribers.push(e);
        }
    };
    YAHOO.WebPlayer = YAHOO.MediaPlayer;
    var c = false;

    function b(f, h) {
        var e = document.createElement("script");
        e.setAttribute("type", "text/javascript");
        e.setAttribute("src", f);
        var g = document.getElementsByTagName("head")[0];
        e.onload = e.onreadystatechange = function () {
            if (!e.readyState || /loaded|complete/.test(e.readyState)) {
                e.onload = e.onreadystatechange = null;
                h && h();
            }
        };
        g.appendChild(e);
    }
    function a(f) {
        var e = window.YUI && parseInt(YUI().version.replace(/\./g, ""), 10);
        if (e) {
            if (e >= 340) {
                f();
            }
        } else {
            c = true;
            b(d, f);
        }
    }
    a(function () {
        YUI({
            "injected": c
        }).use("node-base", function (g) {
            if (typeof YAHOO.namespace == "undefined") {
                YAHOO.namespace = g.namespace;
            }
            var o = 3;
            var x = true;
            var m = ["NETSCAPE6", "NETSCAPE/7", "(IPHONE;", "(IPOD;"];
            if (navigator) {
                var w = m.length;
                for (var v = 0; v < w; v++) {
                    if (navigator.userAgent.toUpperCase().indexOf(m[v]) !== -1) {
                        x = false;
                    }
                }
            }
            if (x === true) {
                if (typeof YAHOO.mediaplayer == "undefined") {
                    YAHOO.namespace("YAHOO.mediaplayer");
                }
                var t = function (i, z, y) {
                    y = y || window;
                    if (o === 2) {
                        YAHOO.util.Event.addListener(y, i, z);
                    } else {
                        g.Event.attach(i, z, y);
                    }
                };
                var u = function (i, z, y) {
                    y = y || window;
                    if (o === 2) {
                        YAHOO.util.Event.removeListener(y, i, z);
                    } else {
                        g.Event.detach(i, z, y);
                    }
                };
                var l = function (y) {
                    var z = "#";
                    var i = y.indexOf(z);
                    if (i < 0) {
                        z = "%23";
                        i = y.indexOf(z);
                    }
                    return (i === -1) ? "" : y.substring(i + z.length);
                };
                var p = function (D) {
                    var B = window.location.toString();
                    var C = l(B);
                    var z = C.split("-");
                    for (var A = 0, y = z.length; A < y; A++) {
                        if (D === z[A].substring(0, D.length)) {
                            return true;
                        }
                    }
                    return false;
                };
                var n = function () {
                    var z = -1;
                    if (navigator.appName == "Microsoft Internet Explorer") {
                        var i = navigator.userAgent;
                        var y = new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");
                        if (y.exec(i) != null) {
                            z = parseFloat(RegExp.$1);
                        }
                    }
                    return z;
                };
                var h = function (z) {
                    var B = null;
                    for (var A = 0, y = z.length; A < y; A++) {
                        if ((z[A].nodeType === 1)) {
                            B = z[A];
                            break;
                        }
                    }
                    return B;
                };
                var s = function (z) {
                    var y = null;
                    var i = document.createElement("DIV");
                    i.innerHTML = z;
                    return h(i.childNodes);
                };
                var f = function () {
                    var y = "cursor:pointer;padding:0;margin:0;position:fixed;top:0;left:0;height:100%;width:100%;background:rgba(0,0,0,0.8);";
                    y += "filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#aa000000,endColorstr=#aa000000);";
                    y += "-ms-filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#aa000000,endColorstr=#aa000000);z-index:2147483647;";
                    var i = '<div class="ywp-page-overlay" style="' + y + '">' + '<div style="width:100%; height:100%; *background-color: white; *filter: alpha(opacity=0)">' + '<div style="position:fixed;z-index:2147483647;top:50%;left:50%;height:1px;">' + '<div style="width:100px; height:100px; margin-top:-50px;margin-left:-50px; background-color:transparent;">' + '<img width="100px" height="100px" src="' + YMPParams["assetsroot"] + '/img/page-overlay/loading.gif"/>';
                    "</div>" + "</div>" + "</div>" + "</div>";
                    return s(i);
                };
                var e = function () {
                    var y = f();
                    var z = null;
                    var A = null;
                    var C = function (D) {
                        if (D.keyCode === 27) {
                            B();
                        }
                    };
                    var B = function () {
                        YAHOO.mediaplayer._vLboxDisabled = true;
                        A && clearTimeout(A);
                        y && y.parentNode.removeChild(y);
                        u("keydown", C, document.documentElement);
                        u("click", B, y);
                        delete YAHOO.mediaplayer._hideOverlay;
                    };
                    YAHOO.mediaplayer._hideOverlay = B;
                    document.getElementsByTagName("body")[0].appendChild(y);
                    t("click", B, y);
                    t("keydown", C, document.documentElement);
                    var i = YMPParams["assetsroot"];
                    A = setTimeout(function () {
                        var D = '<div style="position:absolute;top:30px;right:30px;cursor:pointer;">' + '<img width="28px" height="28px" src="' + i + '/img/page-overlay/close.png"/>' + "</div>";
                        z = s(D);
                        y.appendChild(z);
                    }, 10000);
                };
                var r = function () {
                    return window.YAHOO && window.YAHOO.mediaplayer && window.YAHOO.mediaplayer._isPlayerAlreadyLoaded ? true : false;
                };
                var k = n();
                var j = (p("vlbox") && ((k === -1) || (k >= 7) || (document.compatMode !== "BackCompat"))) ? true : false;
                if (!r()) {
                    YAHOO.mediaplayer.partnerId = "42858483";
                    if (typeof YMPParams == "undefined") {
                        window.YMPParams = {};
                    }
                    YMPParams["assetsroot"] = YMPParams["assetsroot"] || "http://l.yimg.com/pb/webplayer" + "/" + "0.9.75";
                    YMPParams["wsroot"] = YMPParams["wsroot"] || "http://ws.webplayer.yahoo.com";
                    YMPParams["wwwroot"] = YMPParams["wwwroot"] || "http://webplayer.yahoo.com";
                    YMPParams["build_number"] = "0.9.75";
                    if (typeof YMPParams === "object" && YMPParams.logging === true) {
                        if (typeof (YAHOO) === "undefined" || typeof (YAHOO.ULT) === "undefined") {
                            var q = document.createElement("script");
                            q.type = "text/javascript";
                            q.src = "http://us.js2.yimg.com/us.js.yimg.com/ult/ylc_1.9.js";
                            document.getElementsByTagName("head")[0].appendChild(q);
                        }
                    }
                    YAHOO.mediaplayer.loadPlayerScript = function () {
                        if (r()) {
                            return;
                        }
                        if (Boolean(arguments.callee.bCalled)) {
                            window.status = "asyncLoadPlayer Already Called! (webplayerloader)";
                            return;
                        }
                        arguments.callee.bCalled = true;
                        if (j) {
                            e();
                        }
                        function i() {
                            return YMPParams["assetsroot"] + "/js/player-noyui-min.js";
                        }
                        var y = i();
                        if (typeof (y) == "string" && y.length > 0) {
                            YAHOO.mediaplayer.elPlayerSource = document.createElement("script");
                            YAHOO.mediaplayer.elPlayerSource.type = "text/javascript";
                            YAHOO.mediaplayer.elPlayerSource.src = y;
                            document.getElementsByTagName("head")[0].appendChild(YAHOO.mediaplayer.elPlayerSource);
                            window.YAHOO.mediaplayer._isPlayerAlreadyLoaded = true;
                        }
                    };
                }
            }
            if (!r()) {
                if (document.readyState !== "complete") {
                    g.on((j ? "domready" : "load"), YAHOO.mediaplayer.loadPlayerScript, window);
                } else {
                    YAHOO.mediaplayer.loadPlayerScript();
                }
            }
        });
    });
}());
