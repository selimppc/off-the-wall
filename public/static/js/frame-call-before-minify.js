// Polyfills for people running bad browsers in 2015
if (!String.prototype.startsWith) {
    String.prototype.startsWith = function (searchString, position) {
        position = position || 0;
        return this.indexOf(searchString, position) === position;
    };
}
if (!String.prototype.endsWith) {
    String.prototype.endsWith = function (searchString, position) {
        var subjectString = this.toString();
        if (typeof position !== 'number' || !isFinite(position) || Math.floor(position) !== position || position > subjectString.length) {
            position = subjectString.length;
        }
        position -= searchString.length;
        var lastIndex = subjectString.indexOf(searchString, position);
        return lastIndex !== -1 && lastIndex === position;
    };
}
var uploadedImg = '';
$(document).ready(function () {

    $('[data-toggle="popover"]').popover({
        trigger: 'focus'
    });
    $('[data-toggle="tooltip"]').tooltip();
    $('[name="printing-type"]').on({
        'change': function () {
            $('.printing-info').hide();
            $('.printing-info[data-info-id="' + $(this).val() + '"]').show();
        }
    });
    $('[name="matt-canvas-printing-type"]').on({
        'change': function () {
            $('.offtwl__matt-canvas-printing-info').hide();
            $('.offtwl__matt-canvas-printing-info[data-info-id="' + $(this).val() + '"]').show();
        }
    });
    $('[name="glass-type"]').on({
        'change': function () {
            $('.offtwl__glass-notes').hide();
            $('.offtwl__glass-notes[data-info-id="' + $(this).val() + '"]').show();
        }
    });
    $('[name="backing-type"]').on({
        'change': function () {
            $('.backing-info').hide();
            $('.backing-info[data-info-id="' + $(this).val() + '"]').show();
        }
    });
});

/*Added from internal script End*/
function getContrastYIQ(e) {
    return (299 * parseInt(e.substr(0, 2), 16) + 587 * parseInt(e.substr(2, 2), 16) + 114 * parseInt(e.substr(4, 2), 16)) / 1e3 >= 128 ? "black" : "white"
}

function validateDimensions() {
    var e = document.querySelector("#offtwl__dmnsn-width"),
        t = document.querySelector("#offtwl__dmnsn-height"),
        a = document.querySelector("#offtwl__dimension-type-wrapper input[name=unit-type]:checked")
            .value;
    e.value < 0 && (e.value = 1), t.value < 0 && (t.value = 1), "cm" == a ? (e.value, t.value) : (e.value > 60 && (e.value = 60), t.value > 60 && (t.value = 60))
}

function maintainRatio() {
    if ("true" == $("#offtwl__dimention-image-ratio")
            .attr("data-locked")) {
        var e = product.printing.image.aspectRatio;
        "width" == $(this)
            .attr("data-for") ? $("#offtwl__dmnsn-height")
            .val(($(this)
                .val() / e)
                .toFixed(1)) : $("#offtwl__dmnsn-width")
            .val(($(this)
                .val() * e)
                .toFixed(1))
    }
}

function handleFloatFrame(e) {
    e.startsWith("108") ? ($('[name=offtwl__how-many-mats][value="0"]')
        .click(), $("[name=glass-type][value=no-glass]")
        .click(), $("[name=backing-type][value=none]")
        .click(), $("[name=slip][value=none]")
        .click(), $(".remove-image")
        .click(), $("[name=printing-type][value=none]")
        .click(), $("[name=matt-canvas-printing-type][value=matt-canvas-none]")
        .click(), $('#upload, [aria-controls="offtwl__mats-tab"], [aria-controls="offtwl__glass-and-backing-tab"], [aria-controls="tab-slips"], [aria-controls="offtwl__fillets-tab"], [aria-controls="offtwl__print-info-tab"]')
        .fadeOut(150)) : ($("[name=glass-type][value=clear-glass]")
        .click(), "none" === $("[name=backing-type]:checked")
        .val() && $('[name=backing-type][value="offtwl__backing-type-adhesive-foamcore"]')
        .click(), $('#upload, #show-more-tabs, [aria-controls="offtwl__mats-tab"], [aria-controls="offtwl__glass-and-backing-tab"], [aria-controls="offtwl__print-info-tab"]')
        .fadeIn(150), $("#show-more-tabs")
        .parent()
        .fadeIn(150))
}

function setFrameData(e) {
    $("#frame-detail-code")
        .html(e.frameCode), $("#frame-detail-depth")
        .html(e.frameDepth.toFixed(1) + " cm"), $("#frame-detail-width")
        .html(e.frameWidth.toFixed(1) + " cm"), $("#frame-detail-rebate")
        .html(e.frameRebate.toFixed(1) + " cm"), $("#frame-detail-colour")
        .html(e.frameDesc), $("#frame-detail-material")
        .html(e.frameMaterial);
    var t = $("#frame-detail-description");
    e.frameDescription ? (t.html(e.frameDescription), t.parent()
        .show()) : t.parent()
        .hide()
}

function assessQuality() {
    var e = image_width / 300;
    if ("cm" == $("span.offtwl__dmnsn-inch-cm")
            .html()) {
        var t = Math.min(e / ($("#offtwl__dmnsn-width")
            .val() / 2.54) * 100, 100);
    } else {
        var t = Math.min(e / $("#offtwl__dmnsn-width")
            .val() * 100, 100);
    }
    t <= 0 ? ($("#offtwl__upload-quality-progress")
        .css("width", "100%"), $("#offtwl__upload-quality-progress")
        .removeClass("progress-bar-danger progress-bar-good progress-bar-excellent progress-bar-warning"), $("#offtwl__upload-quality-progress")
        .addClass("progress-bar-info"), $("#offtwl__upload-quality-text")
        .html("No Image Detected")) : t > 0 && t <= 25 ? ($("#offtwl__upload-quality-progress")
        .css("width", t + "%"), $("#offtwl__upload-quality-progress")
        .removeClass("progress-bar-good progress-bar-excellent progress-bar-warning progress-bar-info"), $("#offtwl__upload-quality-progress")
        .addClass("progress-bar-danger"), $("#offtwl__upload-quality-text")
        .html("Poor")) : t > 25 && t <= 40 ? ($("#offtwl__upload-quality-progress")
        .css("width", t + "%"), $("#offtwl__upload-quality-progress")
        .removeClass("progress-bar-good progress-bar-excellent progress-bar-danger progress-bar-info"), $("#offtwl__upload-quality-progress")
        .addClass("progress-bar-warning"), $("#offtwl__upload-quality-text")
        .html("Not Bad")) : t > 40 && t < 70 ? ($("#offtwl__upload-quality-progress")
        .css("width", t + "%"), $("#offtwl__upload-quality-progress")
        .removeClass("progress-bar-warning progress-bar-danger progress-bar-excellent progress-bar-info"), $("#offtwl__upload-quality-progress")
        .addClass("progress-bar-good"), $("#offtwl__upload-quality-text")
        .html("Good")) : t > 70 && t < 90 ? ($("#offtwl__upload-quality-progress")
        .css("width", t + "%"), $("#offtwl__upload-quality-progress")
        .removeClass("progress-bar-warning progress-bar-danger progress-bar-excellent progress-bar-info"), $("#offtwl__upload-quality-progress")
        .addClass("progress-bar-good"), $("#offtwl__upload-quality-text")
        .html("Great")) : ($("#offtwl__upload-quality-progress")
        .css("width", t + "%"), $("#offtwl__upload-quality-progress")
        .removeClass("progress-bar-danger progress-bar-warning progress-bar-good progress-bar-info"), $("#offtwl__upload-quality-progress")
        .addClass("progress-bar-excellent"), $("#offtwl__upload-quality-text")
        .html("Excellent"))
}

function disableMDF(e) {
    var t = $("#no-mdf-info");
    e === !0 ? ($("[name=backing-type][value=offtwl__backing-type-adhesive-foamcore]")
        .click(), $("[name=backing-type][value=offtwl__backing-type-mdf]")
        .prop("disabled", !0)
        .addClass("disabled")
        .parent()
        .addClass("disabled")
        .find(".offtwl__outer-el")
        .addClass("disabled"), t.show()) : ($("[name=backing-type][value=offtwl__backing-type-mdf]")
        .prop("disabled", !1)
        .removeClass("disabled")
        .parent()
        .removeClass("disabled")
        .find(".offtwl__outer-el")
        .removeClass("disabled"), t.hide())
}

function togglePrinting(e) {
    1 == e ? ($("[name=printing-type]")
        .prop("disabled", !1)
        .addClass("disabled")
        .parent()
        .removeClass("disabled")
        .find(".offtwl__outer-el")
        .removeClass("disabled"), disableMDF(!0)) : ($("[data-paper-type=none]")
        .click(), $("[name=printing-type]")
        .prop("disabled", !0)
        .addClass("disabled")
        .parent()
        .addClass("disabled")
        .find(".offtwl__outer-el")
        .addClass("disabled"), disableMDF(), $(".offtwl__image-description")
        .fadeOut(150), $(".offtwl__upload-img-quality-holder")
        .fadeOut(150), $("#upload-info-alert")
        .fadeIn(150), product.printing = {
        paper: "none",
        image: {
            url: "",
            originalWidth: 0,
            originalHeight: 0,
            aspectRatio: 0,
            name: ""
        },
        price: 0
    }, fc.setImage(), $("#offtwl__dimention-image-ratio")
        .attr("data-locked", !1), fc.draw())
}

function changePanelIcon() {
    var e = $(this)
        .find(".toggle-icon");
    e.hasClass("fa-plus") ? e.removeClass("fa-plus")
        .addClass("fa-minus") : e.removeClass("fa-minus")
        .addClass("fa-plus")
}

function keepWithinBounds() {
    var e = document.querySelector("[name=offtwl__typeof-matboard-wdt]:checked")
            .value,
        t = parseFloat(this.min),
        a = parseFloat(this.max),
        i = parseFloat(this.value),
        r = i;
    if (i < t ? r = t : i > a && (r = a), r != i && (this.value = r, "offtwl__unifrm" === e)) {
        for (
            var o = document.getElementById("offtwl__fldst-var")
                .querySelectorAll("input[type=number]"), n = 0; n < o.length; n++
        ) {
            o[n].value = r;
        }
    }
    prodMan.calc()
}

var image_width = 0,
    image_height = 0;
$("#show-more-tabs")
    .on("click tap", function (e) {
        e.preventDefault(), $("#show-more-tabs")
            .parent()
            .fadeOut(50), $(".hidden-tabs")
            .fadeIn(150), $("#ui-id-6")
            .click(), $(".offtwl__cardbox-tab-list a")
            .css({
                padding: "5px 5px",
                "font-size": "1.3rem"
            })
    }), $("[id^=frame-tab]")
    .each(function () {
        var e = "#" + $(this)
            .attr("id") + " img.lazy";
        $(e)
            .lazyload({
                effect: "fadeIn",
                threshold: 20,
                container: $("#" + $(this)
                    .attr("id"))
            })
    });
var product = {
    imageWidth: 10.16,
    imageHeight: 15.24,
    printing: {
        paper: "none",
        image: {
            file: "",
            originalWidth: 0,
            originalHeight: 0,
            aspectRatio: 0,
            name: ""
        },
        price: 0
    },
    innerWidth: 0,
    innerHeight: 0,
    outerWidth: 0,
    outerHeight: 0,
    frame: {
        frameCode: "224F",
        frameDepth: 2,
        frameDesc: "Black",
        frameId: 238,
        frameMaterial: "Wood",
        frameMax: 120,
        frameMin: 10,
        frameRate: 2,
        frameRebate: .5,
        frameTile: "top_frame_238.jpg",
        frameWidth: 2
    },
    slip: {
        frame: {
            frameId: ""
        },
        price: 0
    },
    fillet: {
        frame: {
            frameId: ""
        },
        price: 0
    },
    glass: void 0,
    backing: void 0,
    matboards: {
        mat1: {
            id: "",
            colorCode: "",
            top: "",
            left: "",
            right: "",
            bottom: "",
            matCode: "",
            matName: "",
            price: 0
        },
        mat2: {
            id: "",
            colorCode: "",
            top: "",
            left: "",
            right: "",
            bottom: "",
            matCode: "",
            matName: "",
            price: 0
        }
    },
    price: 0,
    discountedPrice: 0,
    newDiscountedPrice: 0,
    framePrice: 0,
    glassPrice: 0,
    backingPrice: 0,
    quantity: 0,
    productType: "custom-frame"
};
setFrameData(product.frame), $("#order-step-tabs")
    .tabs(), $("#offtwl__frame-ctgry-tab")
    .tabs(), $("#offtwl__frame-ctgry-tab")
    .tabs("option", "active", $('[href="#offtwl__frm-tab-blacks"]')
        .parent()
        .index());
var ProductManager = function () {
        var discountedValRow = $('#offtwl__glance-discount-row-value'),
            disPercent = $('#offtwl__glance-discount-row-percent'),
            disPercentVal = parseInt(disPercent.data('discount-percentage')),
            disPercentDecimalVal = disPercentVal / 100;

        function discountCalculator(total_price, discount_percent) {
            var tprice = total_price,
                discountprice = (tprice * disPercentDecimalVal).toFixed(4),
                newDiscountedPrice = tprice - discountprice;
            if (typeof newDiscountedPrice === 'number') {
                disPercent.html(disPercentVal + '%')
                discountedValRow.html(discountprice);
            }
            product.newDiscountedPrice = newDiscountedPrice;
            product.discountedPrice = discountprice;
            return newDiscountedPrice;
        }

        var e,
            t = !1,
            a = [],
            i = [],
            r = $("#offtwl__dmnsn-width"),
            o = $("#offtwl__dmnsn-height"),
            n = !1,
            s = !1,
            d = !0,
            l = !1,
            c = !1,
            m = !1,
            u = !1,
            p = !1,
            f = function () {
                if (t) {
                    return !0;
                }
                $.ajax({
                    type: "GET",
                    url: "static/json/price-list.json",
                    success: function (a) {
                        e = a, t = !0, H();
                    },
                    error: function (e, t, a) {
                        console.log("ajax error response type " + t)
                    }
                })
            },
            h = function (e, t) {
                fc.setImage(e, "picture", function () {
                    $("#preset-type-list")
                        .addClass("disabled")
                        .prop("disabled", !0), $(".offtwl__ratio-locking.fa-lock")
                        .removeClass("hidden"), $(".offtwl__ratio-locking.fa-unlock")
                        .addClass("hidden"), $("#offtwl__dmnsn-width")
                        .val((.015 * e.width)
                            .toFixed(2)), $("#offtwl__dmnsn-height")
                        .val((.015 * e.height)
                            .toFixed(2)), t && "function" == typeof t && t(), H()
                })
            },
            g = function () {
                if (product.printing.paper = $("[name=printing-type]:checked")
                        .val(), product.glass = $("[name=glass-type]:checked")
                        .val(), product.backing = $("[name=backing-type]:checked")
                        .val(), l = $('[name="slip"][value="add"]')
                        .prop("checked")) {
                    var e = product.slip.frame.frameCode;
                    "" == product.slip.frame.frameId && "" != e && (product.slip.frame.frameId = $("[data-frame-code=" + e + "]")
                        .data("frameId"))
                } else {
                    product.slip.frame.frameId = "";
                }
                if (c = $('[name="fillet"][value="add"]')
                        .prop("checked")) {
                    var t = product.fillet.frame.frameCode;
                    "" == product.fillet.frame.frameId && "" != t && (product.fillet.frame.frameId = $("[data-frame-code=" + t + "]")
                        .data("frameId"))
                } else {
                    product.fillet.frame.frameId = "";
                }
                p = "none" != product.printing.paper
            },
            b = function () {
                var e = product,
                    t = "inch" == currentUnits;
                e.imageWidth = parseFloat(r.val()), e.imageHeight = parseFloat(o.val()), t && (e.imageWidth *= 2.54, e.imageHeight *= 2.54), e.imageWidth = parseFloat(e.imageWidth)
                    .toFixed(2), e.imageHeight = parseFloat(e.imageHeight)
                    .toFixed(2), e.innerWidth = parseFloat(e.imageWidth), e.innerHeight = parseFloat(e.imageHeight);
                for (var a in e.matboards) {
                    e.innerWidth += parseFloat(e.matboards[a].left) || 0, e.innerWidth += parseFloat(e.matboards[a].right) || 0, e.innerHeight += parseFloat(e.matboards[a].top) || 0, e.innerHeight += parseFloat(e.matboards[a].bottom) || 0;
                }
                c && (e.innerWidth += 2 * e.fillet.frame.frameWidth, e.innerHeight += 2 * e.fillet.frame.frameWidth), e.innerWidth = parseFloat(e.innerWidth)
                    .toFixed(2), e.innerHeight = parseFloat(e.innerHeight)
                    .toFixed(2), e.outerWidth = (parseFloat(e.innerWidth) + 2 * parseFloat(e.frame.frameWidth) - 2 * parseFloat(e.frame.frameRebate))
                    .toFixed(2), e.outerHeight = (parseFloat(e.innerHeight) + 2 * parseFloat(e.frame.frameWidth) - 2 * parseFloat(e.frame.frameRebate))
                    .toFixed(2);
                var i = e.innerWidth >= 10 && e.innerHeight >= 10,
                    l = e.innerWidth <= 152.5 && e.innerHeight <= 152.5,
                    m = e.innerWidth <= 152.5 && e.innerHeight <= 101.6 || e.innerWidth <= 101.6 && e.innerHeight <= 152.5;
                d = Math.max(e.innerWidth, e.innerHeight) <= e.frame.frameMax, $("#max-frame-length-error")
                    .html(e.frame.frameMax), n = i && e.imageWidth <= 152.5 && e.imageHeight <= 152.5 && (e.imageWidth <= 152.5 && e.imageHeight <= 101.6 || e.imageWidth <= 101.6 && e.imageHeight <= 152.5), s = i && m && l, _.debounce(function () {
                    n && !s ? $("#offtwl__mat1-dimnsn-not-valid, #mat2-dimensions-invalid")
                        .show(250) : n && $("#offtwl__mat1-dimnsn-not-valid, #mat2-dimensions-invalid")
                        .hide(250), s ? $("#offtwl__dmnsn-warning")
                        .fadeOut(150) : $("#offtwl__dmnsn-warning")
                        .fadeIn(150), !d && s ? $("#larger-than-max-error")
                        .show(250) : $("#larger-than-max-error")
                        .hide(250)
                }, 500)()
            },
            v = function () {
                if (!t) {
                    return !1;
                }
                var a = void 0,
                    r = void 0,
                    o = void 0,
                    n = !1,
                    f = !1,
                    h = parseFloat(product.imageWidth) + parseFloat(product.imageHeight),
                    g = parseFloat(product.innerWidth) + parseFloat(product.innerHeight),
                    b = g + 4 * (l ? parseFloat(product.slip.frame.frameWidth) : 0);
                product.quantity = parseFloat($("#offtwl__product-quantity")
                    .val() || 1);
                for (var v in e) {
                    if (!n && v >= h && (o = e[v], n = !0), !f && v >= g && (r = e[v], f = !0), v >= b) {
                        a = e[v];
                        break
                    }
                }
                if (a) {
                    if (s && d) {
                        $("#offtwl__addToCartButton")
                            .prop("disabled", !1);
                        console.log(a.rate[product.frame.frameRate]);
                        console.log(product.frame.frameRate);
                        console.log(a.rate);
                        console.log(a);
                        console.log(a.UCM);
                        var y = product.framePrice = parseFloat(a.rate[product.frame.frameRate]),
                            k = product.matboards.mat1.price = "" != m ? r.top_mat : 0,
                            w = product.matboards.mat2.price = "" != u ? r.middle_mat : 0,
                            C = product.fillet.price = c ? o.rate[product.fillet.frame.frameRate] : 0,
                            x = product.slip.price = l ? r.rate[product.slip.frame.frameRate] : 0,
                            F = product.glassPrice = parseFloat(r[product.glass]) || 0,
                            I = product.backingPrice = parseFloat(r[product.backing]) || 0,
                            W = product.printing.price = p ? parseFloat(o[product.printing.paper]) : 0,
                            q = y + k + w + C + x + F + I + W,
                            H = (q * product.quantity).toFixed(2);
                        product.price = H,
                            $(i).each(function () {
                                var discount_price = discountCalculator(H);
                                // product.newDiscountedPrice = discount_price;
                                console.log(product);
                                $(this).html("$" + discount_price);
                            });
                    } else {
                        $(i)
                            .each(function () {
                                $(this)
                                    .html("N/A")
                            }), $("#offtwl__addToCartButton")
                            .prop("disabled", !0)
                    }
                }
            },
            y = function () {
                var e = {
                    width: product.frame.frameWidth,
                    src: "./images/frame_images/large/" + product.frame.frameTile
                };
                self.isFloat = product.frame.frameCode.startsWith("108"), fc.addFrame(e)
            },
            k = function () {
                var e = {
                    width: product.slip.frame.frameWidth,
                    src: "./images/frame_images/large/" + product.slip.frame.frameTile
                };
                fc.addFrame(e)
            },
            w = function () {
                var e = {
                    width: product.fillet.frame.frameWidth,
                    src: "./images/frame_images/large/" + product.fillet.frame.frameTile
                };
                fc.addFrame(e)
            },
            C = function () {
                var e, t, a, i, r = product.matboards,
                    o = parseInt(document.querySelector("[name=offtwl__how-many-mats]:checked")
                        .value),
                    n = document.querySelector("[name=offtwl__typeof-matboard-wdt]:checked")
                        .value;
                if (m = !1, u = !1, o > 0) {
                    if (m = !0, "offtwl__unifrm" == n) {
                        e = t = a = i = document.getElementById("offtwl__unifrm-width")
                            .value
                    } else {
                        "variable" == n && (e = document.getElementById("offtwl__dimnsn-top")
                            .value, a = document.getElementById("offtwl__dimnsn-bottom")
                            .value, t = document.getElementById("offtwl__dimnsn-left")
                            .value, i = document.getElementById("offtwl__dimnsn-right")
                            .value);
                    }
                    "inch" == currentUnits && (e *= 2.54, a *= 2.54, t *= 2.54, i *= 2.54), r.mat1.top = e, r.mat1.bottom = a, r.mat1.left = t, r.mat1.right = i, fc.createMat(e, i, a, t, "#" + r.mat1.colorCode), o > 1 && (u = !0, e = t = a = i = document.getElementById("offtwl__matboard-2-wdt")
                        .value, "inch" == currentUnits && (e *= 2.54, a *= 2.54, t *= 2.54, i *= 2.54), r.mat2.top = e, r.mat2.bottom = a, r.mat2.left = t, r.mat2.right = i, fc.createMat(e, i, a, t, "#" + r.mat2.colorCode))
                }
                for (var s = Object.keys(r), d = o; d < s.length; d++) {
                    r[s[d]] = {
                        id: "",
                        colorCode: r[s[d]].colorCode,
                        top: "",
                        left: "",
                        right: "",
                        bottom: "",
                        matCode: "",
                        matName: "",
                        price: 0
                    }
                }
            },
            x = function () {
                validateDimensions(), fc.draw({
                    width: product.imageWidth,
                    height: product.imageHeight
                })
            },
            F = function () {
                var e = parseFloat(parseFloat($("#offtwl__dmnsn-width")
                        .val())
                        .toFixed(2)),
                    t = parseFloat(parseFloat($("#offtwl__dmnsn-height")
                        .val())
                        .toFixed(2)),
                    a = .12,
                    i = .6;
                (e >= 40 || t >= 40) && (i = 1, a = .39);
                var r = "cm" === currentUnits ? i : a,
                    o = parseFloat(parseFloat(e - r)
                        .toFixed(2)),
                    n = parseFloat(parseFloat(t - r)
                        .toFixed(2)),
                    s = ["Image Size:", e, "x", t, currentUnits, "\n", "Visible (approx):", o, "x", n, currentUnits, "\n", "Outer Size (approx):", product.outerWidth, "x", product.outerHeight, "cm"].join(" ");
                fc.setPlaceholderText(s)
            },
            I = function () {
                l ? $("#offtwl__glance-slip-row")
                    .fadeIn(100) : $("#offtwl__glance-slip-row")
                    .fadeOut(100), c ? $("#offtwl__glance-fillet-row")
                    .fadeIn(100) : $("#offtwl__glance-fillet-row")
                    .fadeOut(100), m ? $("#offtwl__glance-mat-top-row")
                    .fadeIn(100) : $("#offtwl__glance-mat-top-row")
                    .fadeOut(100), u ? $("#offtwl__glance-mat-bottom-row")
                    .fadeIn(100) : $("#offtwl__glance-mat-bottom-row")
                    .fadeOut(100), p ? $("#offtwl__glance-printing-row")
                    .fadeIn(100) : $("#offtwl__glance-printing-row")
                    .fadeOut(100);
                var e = new RegExp("-", "g");
                $("#offtwl__glance-frame").html(product.frame.frameCode),
                    $("#offtwl__glance-slip").html(product.slip.frame.frameCode),
                    $("#offtwl__glance-fillet").html(product.fillet.frame.frameCode),
                    $("#offtwl__glance-mat-top").html(product.matboards.mat1.matName),
                    $("#offtwl__glance-mat-bottom").html(product.matboards.mat2.matName),
                    $("#offtwl__glance-glass").html(product.glass.replace(e, " ").replace("glass", "")),
                    $("#offtwl__glance-backing").html(product.backing.replace(e, " ").replace("glass", "")),
                    $("#offtwl__glance-image-size").html(product.imageWidth + " x " + product.imageHeight + " cm"),
                    $("#offtwl__glance-glass-size").html(product.innerWidth + " x " + product.innerHeight + " cm"),
                    $("#offtwl__glance-outer-size").html(product.outerWidth + " x " + product.outerHeight + " cm"),
                    $("#summary-printing").html(product.printing.paper),
                    $("#offtwl__glance-frame-price").html("$ " + product.framePrice.toFixed(2)),
                    $("#offtwl__glance-slip-price").html("$ " + product.slip.price.toFixed(2)),
                    $("#offtwl__glance-fillet-price").html("$ " + product.fillet.price.toFixed(2)),
                    $("#offtwl__glance-mat-top-price").html("$ " + product.matboards.mat1.price.toFixed(2)),
                    $("#offtwl__glance-mat-bottom-price").html("$ " + product.matboards.mat2.price.toFixed(2)),
                    $("#offtwl__glance-glass-price").html("$ " + product.glassPrice.toFixed(2)),
                    $("#offtwl__glance-backing-price").html("$ " + product.backingPrice.toFixed(2)),
                    $("#summary-printing-price").html("$ " + product.printing.price.toFixed(2)),
                    $("#error-current-selection-size").html($("#offtwl__glance-glass-size").html());
            },
            W = function (e, t) {
                var a = [];
                $('[id^="frame-tab"] [data-frame-code]')
                    .each(function () {
                        a.push(this)
                    });
                var i = _.filter(a, e, t);
                return _.sortBy(i, function (e) {
                    return e.dataset.frameWidth
                })
            },
            q = function (e, t) {
                var a = function (t) {
                        return t.dataset.frameMax < e
                    },
                    i = W(a);
                $(".unstable-frame")
                    .removeClass("unstable-frame"), $(".unstable-frame-hidden")
                    .removeClass("unstable-frame-hidden"), t === !0 ? $(i)
                    .addClass("unstable-frame")
                    .addClass("unstable-frame-hidden") : $(i)
                    .addClass("unstable-frame")
            },
            H = function () {
                fc.clearFrames(), g(), y(), l && k(), C(), c && w(), b(), q(Math.max(product.imageWidth, product.imageHeight), $("#hide-unstable-frames")
                    .prop("checked")), F(), x(), v(), I(), $(document.body)
                    .trigger("sticky_kit:recalc")
            },
            M = _.debounce(H, 100, {
                leading: !0
            }),
            S = function (e) {
                $(e)
                    .on("change input click", M), a.push($(e))
            },
            T = function () {
                return e
            };
        return $(document)
            .ready(function () {
                togglePrinting(1), $(".remove-image")
                    .on("click", function () {
                        togglePrinting(1), $(".offtwl__ratio-locking.fa-lock")
                            .addClass("hidden"), $(".offtwl__ratio-locking.fa-unlock")
                            .removeClass("hidden"), $("#preset-type-list")
                            .removeClass("disabled")
                            .prop("disabled", !1), $("#offtwl__upload-quality-progress")
                            .css("width", "100%"), $("#offtwl__upload-quality-progress")
                            .removeClass("progress-bar-danger progress-bar-good progress-bar-excellent progress-bar-warning"), $("#offtwl__upload-quality-progress")
                            .addClass("progress-bar-info"), $("#offtwl__upload-quality-text")
                            .html("No Image Detected"), image_width = 0, image_height = 0
                    }), $("[data-offtwl__calculation-item]")
                    .each(function (e, t) {
                        a.push(t), $(t)
                            .on("change", M)
                            .on("input", M)
                            .on("click", function () {
                                "SPAN" === $(this)
                                    .prop("tagName") && M()
                            })
                    }), $("[data-price-subscriber]")
                    .each(function (e, t) {
                        i.push(t);
                    }), $(".modal")
                    .on("shown.bs.modal", function () {
                        if ($(window)
                                .width() < 768) {
                            var e = window.innerHeight;
                            $(".modal-body > iframe")
                                .css("height", e - 130)
                        } else {
                            $(this)
                                .find(".modal-body > iframe")
                                .css("height", .7 * $(window)
                                    .height());
                        }
                        $(this)
                            .find("iframe")
                            .attr("src", "gallery.php")
                    })
            }), {
            init: f,
            addBroadcaster: S,
            setImage: h,
            prices: T,
            filter: W,
            calc: M
        }
    },
    prodMan = new ProductManager;
prodMan.init(), $("[name=fillet][value=add]")
    .parent()
    .on("click", function () {
        1 == $(this)
            .children(":first")
            .prop("disabled") && $("#fillet-no-mat-warning")
            .fadeIn()
    }), $("[name=fillet]")
    .on("change", function (e) {
        "add" == $("[name=fillet]:checked")
            .val() && (0 == parseInt($("[name=offtwl__how-many-mats]:checked")
            .val()) ? ($("#fillet-no-mat-warning")
            .fadeIn(), $('[name=fillet][value="none"]')
            .click()) : $("#fillet-no-mat-warning")
            .fadeOut(), "" === product.fillet.frame.frameId && $(".offtwl__thumb-frame-container.fillet-frame")
            .first()
            .click())
    });
var matColor = "",
    matboards = product.matboards;
document.getElementById("offtwl__unifrm-width")
    .addEventListener("input", function () {
        for (var e = document.querySelectorAll("#variable-width input[type=number]"), t = 0; t < e.length; t++) {
            e[t].value = this.value
        }
    });
for (var outerWidthTypes = document.querySelectorAll("[name=offtwl__typeof-matboard-wdt]"), i = 0; i < outerWidthTypes.length; i++) {
    outerWidthTypes[i].addEventListener("change", function () {
        switch (document.querySelector("[name=offtwl__typeof-matboard-wdt]:checked")
            .value) {
            case "offtwl__unifrm":
                document.getElementById("offtwl__unifrm-width")
                    .disabled = !1, document.getElementById("variable-width")
                    .disabled = !0;
                break;
            case "variable":
                document.getElementById("offtwl__unifrm-width")
                    .disabled = !0, document.getElementById("variable-width")
                    .disabled = !1
        }
    });
}
for (var colorTiles = document.querySelectorAll(".offtwl__matboard-sqr"), c = 0; c < colorTiles.length; c++) {
    colorTiles[c].style.color = getContrastYIQ(colorTiles[c].dataset.colorCode), colorTiles[c].addEventListener("click", function (e) {
        matboards[this.dataset.offtwl__matObj].id = this.dataset.matId, matboards[this.dataset.offtwl__matObj].colorCode = this.dataset.colorCode, matboards[this.dataset.offtwl__matObj].matCode = this.dataset.code, matboards[this.dataset.offtwl__matObj].matName = this.dataset.name, matColor = this.dataset.colorCode;
        var t = document.querySelector('[data-slider-value="' + this.dataset.sliderValue + '"][data-selected="true"]');
        t && (t.dataset.selected = !1, t.innerHTML = ""), this.dataset.selected = !0, this.innerHTML = '<span class="offtwl__selected-icon flaticon-checked21"></span>';
        var a = document.querySelector("[name=offtwl__how-many-mats]:checked");
        parseInt(a.value) < 1 && document.querySelector('[name="offtwl__how-many-mats"][value="1"]')
            .click()
    }), prodMan.addBroadcaster(colorTiles[c]);
}
$("[name=offtwl__how-many-mats]")
    .on("change", function (e) {
        switch (parseInt($("[name=offtwl__how-many-mats]:checked")
            .val())) {
            case 0:
                $("#offtwl__field-matboard-1")
                    .prop("disabled", !0), $("#fieldset-matboard-2")
                    .fadeOut(), $('[name=fillet][value="none"]')
                    .click(), $('[name=fillet][value="add"]')
                    .prop("disabled", !0), $("#fillet-no-mat-warning")
                    .fadeIn(), $(".offtwl__matboard-sqr[data-selected=true]")
                    .html("")
                    .attr("data-selected", !1);
                break;
            case 1:
                $("#offtwl__field-matboard-1")
                    .prop("disabled", !1), $("#fieldset-matboard-2")
                    .fadeOut(), $("#fillet-no-mat-warning")
                    .fadeOut(), $('[name=fillet][value="add"]')
                    .prop("disabled", !1), "" == matboards.mat1.id && ("" != matboards.mat1.colorCode ? $(".offtwl__matboard-sqr[data-offtwl__mat-obj=mat1][data-color-code=" + matboards.mat1.colorCode + "]")
                    .click() : $(".offtwl__matboard-sqr[data-offtwl__mat-obj=mat1]")
                    .first()
                    .click());
                break;
            case 2:
                $("#offtwl__field-matboard-1")
                    .prop("disabled", !1), $("#fieldset-matboard-2")
                    .fadeIn(), $("#fillet-no-mat-warning")
                    .fadeOut(), $('[name=fillet][value="add"]')
                    .prop("disabled", !1), "" == matboards.mat1.id && ("" != matboards.mat1.colorCode ? $(".offtwl__matboard-sqr[data-offtwl__mat-obj=mat1][data-color-code=" + matboards.mat1.colorCode + "]")
                    .click() : $(".offtwl__matboard-sqr[data-offtwl__mat-obj=mat1]")
                    .first()
                    .click()), "" == matboards.mat2.id && ("" != matboards.mat2.colorCode ? $(".offtwl__matboard-sqr[data-offtwl__mat-obj=mat2][data-color-code=" + matboards.mat2.colorCode + "]")
                    .click() : $(".offtwl__matboard-sqr[data-offtwl__mat-obj=mat2]")
                    .first()
                    .click())
        }
    });
var fc = new CustomFramer,
    width = 10.1,
    height = 15.2,
    initialized = !1;
$("#offtwl__dimension-type-wrapper input[name=unit-type]:first ~ span")
    .click();
for (
    var currentUnits = document.querySelector("#offtwl__dimension-type-wrapper input[name=unit-type]:checked")
        .value, UnitConverter = function () {
        var e = [];
        return {
            subscribe: function (t) {
                e.push(t)
            },
            unsubscribe: function (t) {
                for (; e.indexOf(val) != -1;) {
                    e.splice(i, 1)
                }
            },
            convertUnits: function () {
                for (var t = "cm" == currentUnits ? "inch" : "cm", a = 0; a < e.length; a++) {
                    switch (currentUnits) {
                        case "inch":
                            if ("offtwl__dmnsn-unit-label" == e[a].dataset.type) {
                                e[a].innerHTML = "cm";
                                break
                            }
                            if ("offtwl__dmnsn-unit-value" == e[a].dataset.type) {
                                e[a].innerHTML = e[a].dataset.cmValue;
                                break
                            }
                            if ("standard-conversion" == e[a].dataset.type) {
                                e[a].innerHTML = (2.54 * parseFloat(e[a].innerHTML))
                                    .toFixed(1);
                                break
                            }
                            width = (2.54 * parseFloat(width))
                                .toFixed(1), height = (2.54 * parseFloat(height))
                                .toFixed(1), e[a].value = (2.54 * e[a].value)
                                .toFixed(1), e[a].setAttribute("min", e[a].dataset.cmMin), e[a].setAttribute("max", e[a].dataset.cmMax), e[a].setAttribute("step", e[a].dataset.cmStep);
                            break;
                        case "cm":
                            if ("offtwl__dmnsn-unit-label" == e[a].dataset.type) {
                                e[a].innerHTML = "inch";
                                break
                            }
                            if ("offtwl__dmnsn-unit-value" == e[a].dataset.type) {
                                e[a].innerHTML = e[a].dataset.inchValue;
                            } else if ("standard-conversion" == e[a].dataset.type) {
                                e[a].innerHTML = (parseFloat(e[a].innerHTML) / 2.54)
                                    .toFixed(1);
                                break
                            }
                            width = (parseFloat(width) / 2.54)
                                .toFixed(1), height = (parseFloat(height) / 2.54)
                                .toFixed(1), e[a].value = (e[a].value / 2.54)
                                .toFixed(1), e[a].setAttribute("min", e[a].dataset.inchMin), e[a].setAttribute("max", e[a].dataset.inchMax), e[a].setAttribute("step", e[a].dataset.inchStep)
                    }
                }
                currentUnits = t
            }
        }
    }, unitConverter = new UnitConverter, unitElements = document.querySelectorAll(".offtwl__dmnsn-inch-cm"), i = 0; i < unitElements.length; i++
) {
    unitConverter.subscribe(unitElements[i]);
}
for (var unitRadioButtons = document.querySelectorAll("#offtwl__dimension-type-wrapper input[type=radio]"), i = 0; i < unitRadioButtons.length; i++) {
    unitRadioButtons[i].addEventListener("change", function () {
        unitConverter.convertUnits()
    });
}
$("#offtwl__dmnsn-width, #offtwl__dmnsn-height")
    .on("input change", maintainRatio), fc.init("canvas"), $(".offtwl__select-frame-container")
    .mousewheel(function (e, t) {
        this.scrollLeft -= 45 * t, e.preventDefault()
    }), $(".offtwl__thumb-frame-container")
    .each(function () {
        $(this)
            .hasClass("slip-frame") ? $(this)
            .on("click", function () {
                $(".slip-thumb-selected")
                    .removeClass("slip-thumb-selected"), $(this)
                    .addClass("slip-thumb-selected"), product.slip.frame = $.extend(!0, {}, $(this)
                    .data()), $('[name="slip"]')
                    .prop("checked") || $('[name="slip"][value="add"]')
                    .click()
            }) : $(this)
            .hasClass("fillet-frame") ? $(this)
            .on("click", function () {
                $(".fillet-thumb-selected")
                    .removeClass("fillet-thumb-selected"), $(this)
                    .addClass("fillet-thumb-selected"), product.fillet.frame = $.extend(!0, {}, $(this)
                    .data()), $('[name="fillet"]')
                    .prop("checked") || $('[name="fillet"][value="add"]')
                    .click()
            }) : $(this)
            .on("click", function () {
                $(".frame-thumb-selected").removeClass("frame-thumb-selected"),
                    $(this).addClass("frame-thumb-selected"),
                    product.frame = $.extend(!0, {}, $(this).data()),
                    handleFloatFrame(product.frame.frameCode),
                    setFrameData($(this).data()),
                    $("#thumb-selected").removeAttr("id"),
                    $(this).attr("id", "thumb-selected");
            }), prodMan.addBroadcaster($(this));
    });
for (var buttons = document.querySelectorAll("[name=unit-type]"), i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function (e) {
        var t = document.querySelectorAll(".offtwl__data-inch"),
            a = document.querySelectorAll(".offtwl__data-cm");
        if ("cm" == this.value) {
            for (var i = 0; i < t.length; i++) {
                a[i].classList.remove("hidden-xs"), a[i].classList.remove("hidden-sm"), t[i].classList.add("hidden-xs"), t[i].classList.add("hidden-sm");
            }
        } else {
            for (var i = 0; i < t.length; i++) {
                a[i].classList.add("hidden-xs"), a[i].classList.add("hidden-sm"), t[i].classList.remove("hidden-xs"), t[i].classList.remove("hidden-sm")
            }
        }
    });
}
"undefined" == typeof headerCart && (headerCart = new CartAnnouncements, headerCart.init()), $("#offtwl__addToCartButton")
    .on("click", function () {
        if ("true" !== $(this)
                .attr("data-disabled")) {
            var e = {
                    product: product,
                    thumb: fc.thumb().toDataURL(),
                    uploadedImg: uploadedImg
                },
                t = $(this);
            console.log(e);
            "true" !== t.attr("data-disabled") && (t.attr("data-disabled", "true"), $.ajax({
                type: "POST",
                url: "/custom-picture-frames/add-to-cart",
                data: e,
                success: function (e) {
                    headerCart.notifyQuantity(e.totalProducts), headerCart.notifyTotalPrice((e.totalPrice || 0)
                        .toFixed(2)), headerCart.toast(), t.attr("data-disabled", "false")
                },
                error: function (e, a, i) {
                    console.log("ajax error response type " + a), console.log(i), t.attr("data-disabled", "false")
                }
            }))
        }
    }), $(window)
    .width() >= 768 && $("#offtwl__sticky-wrapper")
    .stick_in_parent({
        parent: "#offtwl__product-feature"
    }), $(window)
    .on("resize", function () {
        $(this)
            .width() < 768 ? $("#offtwl__sticky-wrapper")
            .trigger("sticky_kit:detach") : $("#offtwl__sticky-wrapper")
            .stick_in_parent({
                parent: "#offtwl__product-feature"
            })
    }), $("#offtwl__sticky-wrapper")
    .on("sticky_kit:bottom", function (e) {
        $(this)
            .parent()
            .css("position", "static")
    })
    .on("sticky_kit:unbottom", function (e) {
        $(this)
            .parent()
            .css("position", "relative")
    }), $('[id^="frame-tab"]')
    .parent()
    .on("click", function (e) {
        var t = e.target;
        t.href && t.href.indexOf("frame-tab-") != -1 && (t.href.endsWith("#offtwl__frm-tab-float-canvas") ? $("#offtwl__frame-warning")
            .slideDown(250) : $("#offtwl__frame-warning")
            .slideUp(150))
    }), $("#frame-code-filter")
    .on("input", function () {
        if (!($(this)
                .val()
                .length < 1)) {
            if (void 0 == this.frameData) {
                var e = [];
                $('[id^="frame-tab"]:not(#offtwl__frm-tab-filtered-result) [data-frame-code]')
                    .each(function () {
                        e.push(this)
                    }), this.frameData = e
            }
            $('a[href="#offtwl__frm-tab-filtered-result"].ui-tabs-anchor')
                .parent()
                .hasClass("ui-state-active") || $('a[href="#offtwl__frm-tab-filtered-result"].ui-tabs-anchor')
                .click();
            var t = $(this)
                    .val()
                    .toUpperCase(),
                a = _.filter(this.frameData, function (e) {
                    return _.startsWith(e.dataset.frameCode.toUpperCase(), t)
                }),
                i = $("#offtwl__frm-tab-filtered-result");
            i.unbind(), i.empty(), i.mousewheel(function (e, t) {
                this.scrollLeft -= 45 * t, e.preventDefault()
            }), $(a)
                .each(function () {
                    $(this)
                        .clone(!0)
                        .appendTo($("#offtwl__frm-tab-filtered-result"))
                }), $("#offtwl__frm-tab-filtered-result .lazy")
                .lazyload({
                    effect: "fadeIn",
                    threshold: 0,
                    container: i
                })
        }
    }), $("#offtwl__listof-frame-rate")
    .on("change", function () {
        var e = parseInt($(this)
            .val());
        $('a[href="#offtwl__frm-tab-filtered-result"].ui-tabs-anchor')
            .parent()
            .hasClass("ui-state-active") || $('a[href="#offtwl__frm-tab-filtered-result"].ui-tabs-anchor')
            .click();
        var t = prodMan.filter(function (t) {
                return e == t.dataset.frameRate
            }),
            a = $("#offtwl__frm-tab-filtered-result");
        a.unbind(), a.empty(), a.mousewheel(function (e, t) {
            this.scrollLeft -= 45 * t, e.preventDefault()
        }), $(t)
            .each(function () {
                $(this)
                    .clone(!0)
                    .appendTo($("#offtwl__frm-tab-filtered-result"))
            }), $("#offtwl__frm-tab-filtered-result .lazy")
            .lazyload({
                effect: "fadeIn",
                threshold: 0,
                container: a
            })
    }), $("[data-frame-filter]")
    .on("click", function (e) {
        e.preventDefault();
        var t = $(this)
            .data("filterTarget");
        $("[data-filter-input]")
            .hide(), $(t)
            .show(), $(this)
            .closest(".btn-group")
            .find("#current-filter-type")
            .html($(this)
                .data("filterType"))
    });
var gallery = {
    getUrlFromIframe: !0,
    setImageData: function (e, t) {
        this.imageUrl = e.url, this.imageId = e.id;
        // $("#uploadingPhotoModal").modal("hide");
        var a = new Image;
        a.onload = function () {
            prodMan.setImage(this, function () {
                togglePrinting(1), $("#offtwl__dimention-image-ratio")
                    .attr("data-locked", "true");
                var i = (a.src.replace(/.*?:\/\//g, "/"), 0),
                    r = 0;
                e.pixelWidth && e.pixelHeight ? (i = e.pixelWidth, r = e.pixelHeight, image_width = e.pixelWidth, image_height = e.pixelWidth) : (i = a.width, r = a.height, image_width = e.pixelWidth, image_height = e.pixelWidth), product.printing.image.url = e.file, product.printing.image.id = parseInt(e.id), product.printing.image.name = e.name, product.printing.image.originalWidth = i, product.printing.image.originalHeight = r, product.printing.image.aspectRatio = parseFloat(a.width) / a.height, $("#offtwl__image-glance-name")
                    .html(e.name), $(".offtwl__image-description")
                    .fadeIn(150), $(".offtwl__upload-img-quality-holder")
                    .fadeIn(150), $("#upload-info-alert")
                    .fadeOut(150), $("[name=printing-type][value=luster-paper]")
                    .click(), $("a[href=#offtwl__print-info-tab]")
                    .click(), $("#preset-type-list")
                    .val("-"), "cm" == $("span.offtwl__dmnsn-inch-cm")
                    .html() ? ($("#offtwl__dmnsn-width")
                    .val(i / 60), $("#offtwl__dmnsn-height")
                    .val((r / 60)
                        .toFixed(1))
                    .change()) : ($("#offtwl__dmnsn-width")
                    .val(i / 60 / 2.54), $("#offtwl__dmnsn-height")
                    .val((r / 60 / 2.54)
                        .toFixed(1))
                    .change()), "function" == typeof t && t()
            })
        }, a.src = e.url
    },
    imageUrl: "",
    imageId: -1
};
$("#offtwl__dmnsn-width, #offtwl__dmnsn-height")
    .on("input change", assessQuality), $("[name=printing-type]")
    .on("change", function () {
        "none" != $(this)
            .val() ? disableMDF(!0) : disableMDF()
    });
var tour = new Tour({
    onStart: function () {
        var e = document.getElementById("canvas");
        e.style.zIndex = "1101", e.style.background = "inherit", e.style.position = "relative", e.style.cursor = null
    },
    onEnd: function () {
        var e = document.getElementById("canvas");
        e.style.zIndex = null, e.style.background = null, e.style.position = null, e.style.cursor = "zoom-in"
    }
});
tour.addStep({
    element: "body",
    title: "Let's Get Started!",
    content: "This 3 minute tour will guide you through making your own custom picture frame for your photos. You can skip steps, return to previous steps or quit the tour at any time. Click 'Next' to get started! You'll be able to change any of the selections you made once you are finished. We'll be skipping 'Slips' and 'Fillets' throughout this tour.",
    placement: "top",
    backdropContainer: "body",
    backdrop: !0
}), tour.addStep({
    element: "#offtwl__dimension-tab",
    title: "Choose Your Size or Upload an Image",
    content: "If you're framing a print or photo you already have, you can simply enter the size below. If you'd like to get your digital images printed, click on the 'Upload' button and follow the prompts. Once you're ready click 'Next'.",
    placement: "top",
    backdrop: !0,
    backdropContainer: "body"
}), tour.addStep({
    element: "#ui-id-1",
    title: "Let's Look at Frames",
    content: "We'll continue by checking out some frames, click on the 'Frames' tab to continue.",
    placement: "bottom",
    reflex: !0,
    backdropContainer: "body",
    backdrop: !0,
    onNext: function (e) {
        $("#ui-id-1")
            .click()
    }
}), tour.addStep({
    element: "#offtwl__frame-ctgry-tab",
    title: "Choose a Frame",
    content: "Click on one of the many frame categories below to view the range. Then browse through and click on your favourite frame below. You can try as many as you like!",
    placement: "top",
    backdrop: !0,
    backdropContainer: "body"
}), tour.addStep({
    element: "#ui-id-2",
    title: "Let's Look at Mat Boards (Optional)",
    content: "Click on the 'Mats' tab to view our range of matting options.",
    reflex: !0,
    placement: "bottom",
    backdropContainer: "body",
    backdrop: !0,
    onNext: function (e) {
        $("#ui-id-2")
            .click()
    },
    onPrev: function (e) {
        $("#ui-id-1")
            .click()
    }
}), tour.addStep({
    element: "#offtwl__mats-tab",
    title: "Choose a Mat Colour (Optional)",
    content: "A mat board sits between your photo and the frame. Choose your favourite colour to match your frame and image, be creative! Don't forget to try a double mat too for that special touch. Click 'Next' to continue.",
    placement: "top",
    backdropContainer: "body",
    backdrop: !0
}), tour.addStep({
    element: "#ui-id-3",
    title: "Glass and Backings (Optional)",
    content: "Let's choose the 'Glass & Backing' tab to finish off our frame.",
    reflex: !0,
    placement: "bottom",
    backdropContainer: "body",
    backdrop: !0,
    onNext: function (e) {
        $("#ui-id-3")
            .click()
    },
    onPrev: function (e) {
        $("#ui-id-2")
            .click()
    }
}), tour.addStep({
    element: "#glass-type-row",
    title: "Choose Your Type of Glass (Optional)",
    content: "We recommend 'Clear Perspex' as it is durable, light, UV resistant and as clear as glass! When you click on an option, you'll get to see some extra details on the right hand side.",
    placement: "top",
    backdropContainer: "body",
    backdrop: !0
}), tour.addStep({
    element: "#backing-type-row",
    title: "Select a Backing (Optional)",
    content: "For acid-free mounting (which will protect your images from fading for longer) choose one of the foam core options. Click on each option to learn more about the different types of backings we offer.",
    placement: "top",
    backdropContainer: "body",
    backdrop: !0
}), tour.addStep({
    element: "#quantity-container",
    title: "Change Your Quantity (Optional)",
    content: "You can order as many custom picture frames as you'd like!",
    backdropContainer: "body",
    placement: "top",
    backdrop: !0
}), tour.addStep({
    element: "#offtwl__addToCartButton",
    title: "And We're Done!",
    content: "Click the Add to cart button and you are done! Click on 'End Tour' to see the masterpiece you've created! You can adjust anything you like as you are now a professional online custom picture framer! However, if you feel you need extra help or suggestions, please don't hesitate to <a href=\"/contact-us/\" rel=\"nofollow\">contact us!</a>",
    backdropContainer: "body",
    placement: "top",
    reflex: !0,
    backdrop: !0
}), tour.init(), $("#fillet-no-mat-warning a")
    .on("click", function (e) {
        e.preventDefault(), $("[href=#offtwl__mats-tab]")
            .click()
    }), $(".close")
    .click(function () {
        $(this)
            .closest(".alert")
            .fadeOut(250)
    }), $("#hide-unstable-frames")
    .on("click", function () {
        if ($(this)
                .prop("checked")) {
            $(".unstable-frame")
                .addClass("unstable-frame-hidden");
            var e = "#" + $(".ui-tabs-active")
                .last()
                .attr("aria-controls");
            $(e)
                .scroll()
        } else {
            $(".unstable-frame-hidden")
                .removeClass("unstable-frame-hidden")
        }
    }), $("[data-rel^=lightcase]")
    .lightcase({
        disableShrink: !0,
        onStart: {
            generateClone: function () {
                var e = document.getElementById("canvas"),
                    t = document.createElement("canvas");
                t.id = "canvas-preview-cloned", t.width = e.width, t.height = e.height, t.getContext("2d")
                    .drawImage(e, 0, 0, t.width, t.height), document.getElementById("offtwl__canvas-lightgallery")
                    .appendChild(t)
            }
        },
        onCleanup: {
            removeClone: function () {
                $("#canvas-preview-cloned")
                    .remove()
            }
        }
    }),
    $("#preset-type-list").on({
        "change": function () {
            if ($(this).val() != "-") {
                var e = $("#offtwl__dmnsn-width"),
                    t = $("#offtwl__dmnsn-height"),
                    a = $("[data-value=" + $(this).val() + "]"),
                    i = "inch" === currentUnits ? "inch" : "cm";
                e.val(a.data("width-" + i)), t.val(a.data("height-" + i))
                    .change()
            }
        }
    }), $(window)
    .on("unload", function () {
        product = {
            imageWidth: 10.16,
            imageHeight: 15.24,
            printing: {
                paper: "none",
                image: {
                    file: "",
                    originalWidth: 0,
                    originalHeight: 0,
                    aspectRatio: 0,
                    name: ""
                },
                price: 0
            },
            innerWidth: 0,
            innerHeight: 0,
            outerWidth: 0,
            outerHeight: 0,
            frame: {
                frameCode: "224F",
                frameDepth: 2,
                frameDesc: "Black",
                frameId: 238,
                frameMaterial: "Wood",
                frameMax: 120,
                frameMin: 10,
                frameRate: 2,
                frameRebate: .5,
                frameTile: "top_frame_238.jpg",
                frameWidth: 2
            },
            slip: {
                frame: {
                    frameId: ""
                },
                price: 0
            },
            fillet: {
                frame: {
                    frameId: ""
                },
                price: 0
            },
            glass: void 0,
            backing: void 0,
            matboards: {
                mat1: {
                    id: "",
                    colorCode: "",
                    top: "",
                    left: "",
                    right: "",
                    bottom: "",
                    matCode: "",
                    matName: "",
                    price: 0
                },
                mat2: {
                    id: "",
                    colorCode: "",
                    top: "",
                    left: "",
                    right: "",
                    bottom: "",
                    matCode: "",
                    matName: "",
                    price: 0
                }
            },
            price: 0,
            framePrice: 0,
            glassPrice: 0,
            backingPrice: 0,
            quantity: 0,
            productType: "custom-frame"
        }, setFrameData(product.frame);
    }), $(".next-button")
    .on("click", function (e) {
        e.preventDefault(), $("#list-of-tabs > .ui-tabs-active")
            .next()
            .find("a")
            .click()
    }), $(".prev-button")
    .on("click", function (e) {
        e.preventDefault(), $("#list-of-tabs > .ui-tabs-active")
            .prev()
            .find("a")
            .click()
    }), $(".toggle-collapse")
    .on("click", function () {
        changePanelIcon.call(this)
    });
var cachedWidth = $(window)
        .width(),
    frame_details_open = !1;
$("#offtwl__frame-details-info")
    .collapse("hide"), $("#offtwl__frame-details-info-icon")
    .removeClass("fa-minus")
    .addClass("fa-plus"), $("#offtwl__frame-details-info")
    .on("shown.bs.collapse", function () {
        frame_details_open = !0
    })
    .on("hidden.bs.collapse", function () {
        frame_details_open = !1
    }), $(window)
    .on("load resize", function () {
        var e = $(window)
            .width();
        e !== cachedWidth && ($(this)
            .width() < 768 && frame_details_open && ($("#offtwl__frame-details-info")
            .collapse("hide"), $("#offtwl__frame-details-info-icon")
            .removeClass("fa-minus")
            .addClass("fa-plus"), frame_details_open = !1), cachedWidth = e)
    });
var scrollTarget = $("#order-step-tabs");
$(".offtwl__product-glance-link")
    .on("click tap", function (e) {
        var t = scrollTarget.offset();
        e.preventDefault();
        var a = $(this)
            .attr("data-href");
        $("html, body")
            .animate({
                scrollTop: t.top
            }), $("[href=#" + a + "]")
            .click()
    });
var elements = document.querySelector("#offtwl__form-matboard")
    .querySelectorAll("input[type=number]");
!function () {
    for (var e = 0; e < elements.length; e++) {
        elements[e].onblur = keepWithinBounds
    }
}();

function onImageUploadeSelect() {
    var inp = $('.upload-input-inside-btn');
    inp.on({
        'change': function (e) {
            var $this = $(this),
                elm = e.target,
                ext = $this.val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("only 'gif','png','jpg','jpeg' are allowd!");
            } else {

                if (elm.files && elm.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
//		  $('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');
                        var imageURL = URL.createObjectURL(elm.files[0]);
//		  var imageURL = e.target.result,
                        uploaded_img = new Image();
                        uploaded_img.src = imageURL;
                        uploaded_img.onload = function () {
                            if (typeof gallery !== 'undefined') {
//			 if(gallery.getUrlFromIframe == true){

                                var canvas = document.createElement('canvas');
                                canvas.width = this.naturalWidth; // or 'width' if you want a special/scaled size
                                canvas.height = this.naturalHeight;
                                canvas.getContext('2d').drawImage(this, 0, 0);
                                uploadedImg = reader.result;

                                var pixelWidth = uploaded_img.width;
                                var pixelHeight = uploaded_img.height;
                                imageURL = imageURL.replace(/^[a-z]{4}\:\/{2}[a-z]{1,}\:[0-9]{1,4}.(.*)/, '/$1');
                                console.log('regex url');
                                console.log(imageURL);
                                var filename = imageURL.substring(imageURL.lastIndexOf('/') + 1);
                                gallery.setImageData({
                                    url: imageURL,
                                    id: 100,
                                    name: filename,
                                    file: filename,
                                    pixelWidth: pixelWidth,
                                    pixelHeight: pixelHeight
                                });
                                return;
//			 }
                            }
                        };
                    }
                    reader.readAsDataURL(elm.files[0]);
                }
            }
        }
    });
}

onImageUploadeSelect();