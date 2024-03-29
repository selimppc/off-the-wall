/*Added from internal script start*/
/*$(document).ready(function () {
    $('[data-toggle="popover"]').popover({
        trigger: 'focus'
    });
});*/
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
/*$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('[name="printing-type"]').on('change', function () {
        $('.printing-info').hide();
        $('.printing-info[data-info-id="' + $(this).val() + '"]').show();
    });
    $('[name="matt-canvas-printing-type"]').on('change', function () {
        $('.matt-canvas-printing-info').hide();
        $('.matt-canvas-printing-info[data-info-id="' + $(this).val() + '"]').show();
    });
    $('[name="glass-type"]').on('change', function () {
        $('.glass-info').hide();
        $('.glass-info[data-info-id="' + $(this).val() + '"]').show();
    });
    $('[name="backing-type"]').on('change', function () {
        $('.backing-info').hide();
        $('.backing-info[data-info-id="' + $(this).val() + '"]').show();
    });
});*/
/*Added from internal script End*/
function getContrastYIQ(e) {
    return (299 * parseInt(e.substr(0, 2), 16) + 587 * parseInt(e.substr(2, 2), 16) + 114 * parseInt(e.substr(4, 2), 16)) / 1e3 >= 128 ? "black" : "white"
}
function validateDimensions() {
    var e = document.querySelector("#imgwidth"),
        t = document.querySelector("#imgheight"),
        a = document.querySelector("#dimensions-unit-selection input[name=unit-type]:checked")
            .value;
    e.value < 0 && (e.value = 1), t.value < 0 && (t.value = 1), "cm" == a ? (e.value, t.value) : (e.value > 60 && (e.value = 60), t.value > 60 && (t.value = 60));
    console.log(e, 'hee');
}
function maintainRatio() {
    if ("true" == $("#image-ratio")
            .attr("data-is-locked")) {
        var e = product.printing.image.aspectRatio;
        "width" == $(this)
            .attr("data-for") ? $("#imgheight")
            .val(($(this)
                .val() / e)
                .toFixed(1)) : $("#imgwidth")
            .val(($(this)
                .val() * e)
                .toFixed(1))
    }
}
function handleFloatFrame(e) {
    e.startsWith("108") ? ($('[name=number-of-mats][value="0"]')
        .click(), $("[name=glass-type][value=no-glass]")
        .click(), $("[name=backing-type][value=none]")
        .click(), $("[name=slip][value=none]")
        .click(), $(".remove-image")
        .click(), $("[name=printing-type][value=none]")
        .click(),$("[name=matt-canvas-printing-type][value=matt-canvas-none]")
        .click(), $('#upload, [aria-controls="tab-mats"], [aria-controls="tab-glass-and-backing"], [aria-controls="tab-slips"], [aria-controls="tab-fillets"], [aria-controls="tab-printing"]')
        .fadeOut(150)) : ($("[name=glass-type][value=clear-glass]")
        .click(), "none" === $("[name=backing-type]:checked")
        .val() && $('[name=backing-type][value="adhesive-foamcore"]')
        .click(), $('#upload, #show-more-tabs, [aria-controls="tab-mats"], [aria-controls="tab-glass-and-backing"], [aria-controls="tab-printing"]')
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
    if ("cm" == $("span.inch-cm")
            .html()) {
        var t = Math.min(e / ($("#imgwidth")
                .val() / 2.54) * 100, 100);
    } else {
        var t = Math.min(e / $("#imgwidth")
                .val() * 100, 100);
    }
    t <= 0 ? ($("#print-quality-progress")
        .css("width", "100%"), $("#print-quality-progress")
        .removeClass("progress-bar-danger progress-bar-good progress-bar-excellent progress-bar-warning"), $("#print-quality-progress")
        .addClass("progress-bar-info"), $("#print-quality-text")
        .html("No Image Detected")) : t > 0 && t <= 25 ? ($("#print-quality-progress")
        .css("width", t + "%"), $("#print-quality-progress")
        .removeClass("progress-bar-good progress-bar-excellent progress-bar-warning progress-bar-info"), $("#print-quality-progress")
        .addClass("progress-bar-danger"), $("#print-quality-text")
        .html("Poor")) : t > 25 && t <= 40 ? ($("#print-quality-progress")
        .css("width", t + "%"), $("#print-quality-progress")
        .removeClass("progress-bar-good progress-bar-excellent progress-bar-danger progress-bar-info"), $("#print-quality-progress")
        .addClass("progress-bar-warning"), $("#print-quality-text")
        .html("Not Bad")) : t > 40 && t < 70 ? ($("#print-quality-progress")
        .css("width", t + "%"), $("#print-quality-progress")
        .removeClass("progress-bar-warning progress-bar-danger progress-bar-excellent progress-bar-info"), $("#print-quality-progress")
        .addClass("progress-bar-good"), $("#print-quality-text")
        .html("Good")) : t > 70 && t < 90 ? ($("#print-quality-progress")
        .css("width", t + "%"), $("#print-quality-progress")
        .removeClass("progress-bar-warning progress-bar-danger progress-bar-excellent progress-bar-info"), $("#print-quality-progress")
        .addClass("progress-bar-good"), $("#print-quality-text")
        .html("Great")) : ($("#print-quality-progress")
        .css("width", t + "%"), $("#print-quality-progress")
        .removeClass("progress-bar-danger progress-bar-warning progress-bar-good progress-bar-info"), $("#print-quality-progress")
        .addClass("progress-bar-excellent"), $("#print-quality-text")
        .html("Excellent"))
}
function disableMDF(e) {
    var t = $("#no-mdf-info");
    e === !0 ? ($("[name=backing-type][value=adhesive-foamcore]")
        .click(), $("[name=backing-type][value=MDF]")
        .prop("disabled", !0)
        .addClass("disabled")
        .parent()
        .addClass("disabled")
        .find(".outer")
        .addClass("disabled"), t.show()) : ($("[name=backing-type][value=MDF]")
        .prop("disabled", !1)
        .removeClass("disabled")
        .parent()
        .removeClass("disabled")
        .find(".outer")
        .removeClass("disabled"), t.hide())
}
function togglePrinting(e) {
    1 == e ? ($("[name=printing-type]")
        .prop("disabled", !1)
        .addClass("disabled")
        .parent()
        .removeClass("disabled")
        .find(".outer")
        .removeClass("disabled"), disableMDF(!0)) : ($("[data-paper-type=none]")
        .click(), $("[name=printing-type]")
        .prop("disabled", !0)
        .addClass("disabled")
        .parent()
        .addClass("disabled")
        .find(".outer")
        .addClass("disabled"), disableMDF(), $(".image-details")
        .fadeOut(150), $(".print-quality-container")
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
    }, fc.setImage(), $("#image-ratio")
        .attr("data-is-locked", !1), fc.draw())
}
function changePanelIcon() {
    var e = $(this)
        .find(".toggle-icon");
    e.hasClass("fa-plus") ? e.removeClass("fa-plus")
        .addClass("fa-minus") : e.removeClass("fa-minus")
        .addClass("fa-plus")
}
function keepWithinBounds() {
    var e = document.querySelector("[name=matboard-width-type]:checked")
            .value,
        t = parseFloat(this.min),
        a = parseFloat(this.max),
        i = parseFloat(this.value),
        r = i;
    if (i < t ? r = t : i > a && (r = a), r != i && (this.value = r, "uniform" === e)) {
        for (
            var o = document.getElementById("fieldset-variable")
                .querySelectorAll("input[type=number]"), n = 0; n < o.length; n++
        ) {
            o[n].value = r;
        }
    }
    prodMan.calc()
}
console.log("v 1.99");
var image_width = 0,
    image_height = 0;
$("#show-more-tabs")
    .on("click tap", function (e) {
        e.preventDefault(), $("#show-more-tabs")
            .parent()
            .fadeOut(50), $(".hidden-tabs")
            .fadeIn(150), $("#ui-id-6")
            .click(), $(".card-tab-list a")
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
        frameTile: "",
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
    .tabs(), $("#frame-category-tabs")
    .tabs(), $("#frame-category-tabs")
    .tabs("option", "active", $('[href="#frame-tab-Blacks"]')
        .parent()
        .index());
var ProductManager = function () {
        var discountedValRow = $('#row-summary-discount-value'),
            disPercent = $('#row-summary-discount-percent'),
            disPercentVal = parseInt(disPercent.data('discount-percentage')),
            disPercentDecimalVal = disPercentVal / 100;
        function discountCalculator(total_price, discount_percent) {
            var tprice = total_price,
                discountprice = (tprice * disPercentDecimalVal).toFixed(4),
                newDiscountedPrice = tprice - discountprice;
            if(typeof newDiscountedPrice === 'number') {
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
            r = $("#imgwidth"),
            o = $("#imgheight"),
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
                    url: "web/photo_frame/plain_mirror/static/json/price-list.json",
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
                    $("#preset-size-list")
                        .addClass("disabled")
                        .prop("disabled", !0), $(".ratio-lock.fa-lock")
                        .removeClass("hidden"), $(".ratio-lock.fa-unlock")
                        .addClass("hidden"), $("#imgwidth")
                        .val((.015 * e.width)
                            .toFixed(2)), $("#imgheight")
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
                    n && !s ? $("#mat1-dimensions-invalid, #mat2-dimensions-invalid")
                        .show(250) : n && $("#mat1-dimensions-invalid, #mat2-dimensions-invalid")
                            .hide(250), s ? $("#dimension-warning")
                        .fadeOut(150) : $("#dimension-warning")
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
                product.quantity = parseFloat($("#fs-product-quantity")
                        .val() || 1);
                for (var v in e) {
                    if (!n && v >= h && (o = e[v], n = !0), !f && v >= g && (r = e[v], f = !0), v >= b) {
                        a = e[v];
                        break
                    }
                }
                if (a) {
                    if (s && d) {
                        $("#fs-addToCartButton")
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
                            }), $("#fs-addToCartButton")
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
                    o = parseInt(document.querySelector("[name=number-of-mats]:checked") &&document.querySelector("[name=number-of-mats]:checked")
                        .value),
                    n = document.querySelector("[name=matboard-width-type]:checked") && document.querySelector("[name=matboard-width-type]:checked")
                        .value;
                if (m = !1, u = !1, o > 0) {
                    if (m = !0, "uniform" == n) {
                        e = t = a = i = document.getElementById("uniform-width")
                            .value
                    } else {
                        "variable" == n && (e = document.getElementById("dimensions-top")
                            .value, a = document.getElementById("dimensions-bottom")
                            .value, t = document.getElementById("dimensions-left")
                            .value, i = document.getElementById("dimensions-right")
                            .value);
                    }
                    "inch" == currentUnits && (e *= 2.54, a *= 2.54, t *= 2.54, i *= 2.54), r.mat1.top = e, r.mat1.bottom = a, r.mat1.left = t, r.mat1.right = i, fc.createMat(e, i, a, t, "#" + r.mat1.colorCode), o > 1 && (u = !0, e = t = a = i = document.getElementById("matboard-2-width")
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
                var e = parseFloat(parseFloat($("#imgwidth")
                        .val())
                        .toFixed(2)),
                    t = parseFloat(parseFloat($("#imgheight")
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
                    // s = ["Image Size:", e, "x", t, currentUnits, "\n", "Visible (approx):", o, "x", n, currentUnits, "\n", "Outer Size (approx):", product.outerWidth, "x", product.outerHeight, "cm"].join(" ");
                    // s = ["Image Size:", e, "x", t, currentUnits].join(" ");
                    // s = ["Please Note: Hangers and Chains", "\n", "will be fitted to the width of your Framed Mirror", "\n\n", "Plain Mirror thickness", "\n", "4mm"].join(" ");
                    s = ["Please choose mirror size & ", "\n", " click to Add a frame to continue."].join(" ");
                fc.setPlaceholderText(s)
            },
            I = function () {
                l ? $("#row-summary-slip")
                    .fadeIn(100) : $("#row-summary-slip")
                    .fadeOut(100), c ? $("#row-summary-fillet")
                    .fadeIn(100) : $("#row-summary-fillet")
                    .fadeOut(100), m ? $("#row-summary-mat-top")
                    .fadeIn(100) : $("#row-summary-mat-top")
                    .fadeOut(100), u ? $("#row-summary-mat-bottom")
                    .fadeIn(100) : $("#row-summary-mat-bottom")
                    .fadeOut(100), p ? $("#row-summary-printing")
                    .fadeIn(100) : $("#row-summary-printing")
                    .fadeOut(100);
                var e = new RegExp("-", "g");
                $("#summary-frame").html(product.frame.frameCode),
                    $("#summary-slip").html(product.slip.frame.frameCode),
                    $("#summary-fillet").html(product.fillet.frame.frameCode),
                    $("#summary-mat-top").html(product.matboards.mat1.matName),
                    $("#summary-mat-bottom").html(product.matboards.mat2.matName),
                    $("#summary-glass").html(product.glass ? product.glass.replace(e, " ").replace("glass", "") : ''),
                    $("#summary-backing").html(product.backing ? product.backing.replace(e, " ").replace("glass", "") : ''),
                    $("#summary-image-size").html(product.imageWidth + " x " + product.imageHeight + " cm"),
                    $("#summary-glass-size").html(product.innerWidth + " x " + product.innerHeight + " cm"),
                    $("#summary-outer-size").html(product.outerWidth + " x " + product.outerHeight + " cm"),
                    $("#summary-printing").html(product.printing.paper),
                    $("#summary-frame-price").html("$ " + product.framePrice.toFixed(2)),
                    $("#summary-slip-price").html("$ " + product.slip.price.toFixed(2)),
                    $("#summary-fillet-price").html("$ " + product.fillet.price.toFixed(2)),
                    $("#summary-mat-top-price").html("$ " + product.matboards.mat1.price.toFixed(2)),
                    $("#summary-mat-bottom-price").html("$ " + product.matboards.mat2.price.toFixed(2)),
                    $("#summary-glass-price").html("$ " + product.glassPrice.toFixed(2)),
                    $("#summary-backing-price").html("$ " + product.backingPrice.toFixed(2)),
                    $("#summary-printing-price").html("$ " + product.printing.price.toFixed(2)),
                    $("#error-current-selection-size").html($("#summary-glass-size").html());
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
                        togglePrinting(1), $(".ratio-lock.fa-lock")
                            .addClass("hidden"), $(".ratio-lock.fa-unlock")
                            .removeClass("hidden"), $("#preset-size-list")
                            .removeClass("disabled")
                            .prop("disabled", !1), $("#print-quality-progress")
                            .css("width", "100%"), $("#print-quality-progress")
                            .removeClass("progress-bar-danger progress-bar-good progress-bar-excellent progress-bar-warning"), $("#print-quality-progress")
                            .addClass("progress-bar-info"), $("#print-quality-text")
                            .html("No Image Detected"), image_width = 0, image_height = 0
                    }), $("[data-calc-product]")
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
                        console.log('hi');
                        console.log(i[t]);
                        console.log('hi');
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
            .val() && (0 == parseInt($("[name=number-of-mats]:checked")
            .val()) ? ($("#fillet-no-mat-warning")
            .fadeIn(), $('[name=fillet][value="none"]')
            .click()) : $("#fillet-no-mat-warning")
            .fadeOut(), "" === product.fillet.frame.frameId && $(".frame-thumb-container.fillet-frame")
            .first()
            .click())
    });
var matColor = "",
    matboards = product.matboards;
document.getElementById("uniform-width") && document.getElementById("uniform-width")
    .addEventListener("input", function () {
        for (var e = document.querySelectorAll("#variable-width input[type=number]"), t = 0; t < e.length; t++) {
            e[t].value = this.value
        }
    });
for (var outerWidthTypes = document.querySelectorAll("[name=matboard-width-type]"), i = 0; i < outerWidthTypes.length; i++) {
    outerWidthTypes[i].addEventListener("change", function () {
        switch (document.querySelector("[name=matboard-width-type]:checked")
            .value) {
            case "uniform":
                document.getElementById("uniform-width")
                    .disabled = !1, document.getElementById("variable-width")
                    .disabled = !0;
                break;
            case "variable":
                document.getElementById("uniform-width")
                    .disabled = !0, document.getElementById("variable-width")
                    .disabled = !1
        }
    });
}
for (var colorTiles = document.querySelectorAll(".matboard-square"), c = 0; c < colorTiles.length; c++) {
    colorTiles[c].style.color = getContrastYIQ(colorTiles[c].dataset.colorCode), colorTiles[c].addEventListener("click", function (e) {
        matboards[this.dataset.matObject].id = this.dataset.matId, matboards[this.dataset.matObject].colorCode = this.dataset.colorCode, matboards[this.dataset.matObject].matCode = this.dataset.code, matboards[this.dataset.matObject].matName = this.dataset.name, matColor = this.dataset.colorCode;
        var t = document.querySelector('[data-slider-value="' + this.dataset.sliderValue + '"][data-selected="true"]');
        t && (t.dataset.selected = !1, t.innerHTML = ""), this.dataset.selected = !0, this.innerHTML = '<span class="select-icon flaticon-checked21"></span>';
        var a = document.querySelector("[name=number-of-mats]:checked");
        parseInt(a.value) < 1 && document.querySelector('[name="number-of-mats"][value="1"]')
            .click()
    }), prodMan.addBroadcaster(colorTiles[c]);
}
$("[name=number-of-mats]")
    .on("change", function (e) {
        switch (parseInt($("[name=number-of-mats]:checked")
            .val())) {
            case 0:
                $("#fieldset-matboard-1")
                    .prop("disabled", !0), $("#fieldset-matboard-2")
                    .fadeOut(), $('[name=fillet][value="none"]')
                    .click(), $('[name=fillet][value="add"]')
                    .prop("disabled", !0), $("#fillet-no-mat-warning")
                    .fadeIn(), $(".matboard-square[data-selected=true]")
                    .html("")
                    .attr("data-selected", !1);
                break;
            case 1:
                $("#fieldset-matboard-1")
                    .prop("disabled", !1), $("#fieldset-matboard-2")
                    .fadeOut(), $("#fillet-no-mat-warning")
                    .fadeOut(), $('[name=fillet][value="add"]')
                    .prop("disabled", !1), "" == matboards.mat1.id && ("" != matboards.mat1.colorCode ? $(".matboard-square[data-mat-object=mat1][data-color-code=" + matboards.mat1.colorCode + "]")
                    .click() : $(".matboard-square[data-mat-object=mat1]")
                    .first()
                    .click());
                break;
            case 2:
                $("#fieldset-matboard-1")
                    .prop("disabled", !1), $("#fieldset-matboard-2")
                    .fadeIn(), $("#fillet-no-mat-warning")
                    .fadeOut(), $('[name=fillet][value="add"]')
                    .prop("disabled", !1), "" == matboards.mat1.id && ("" != matboards.mat1.colorCode ? $(".matboard-square[data-mat-object=mat1][data-color-code=" + matboards.mat1.colorCode + "]")
                    .click() : $(".matboard-square[data-mat-object=mat1]")
                    .first()
                    .click()), "" == matboards.mat2.id && ("" != matboards.mat2.colorCode ? $(".matboard-square[data-mat-object=mat2][data-color-code=" + matboards.mat2.colorCode + "]")
                    .click() : $(".matboard-square[data-mat-object=mat2]")
                    .first()
                    .click())
        }
    });
var fc = new FrameCreator,
    width = 10.1,
    height = 15.2,
    initialized = !1;
$("#dimensions-unit-selection input[name=unit-type]:first ~ span")
    .click();
for (
    var currentUnits = document.querySelector("#dimensions-unit-selection input[name=unit-type]:checked")
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
                            if ("unit-label" == e[a].dataset.type) {
                                e[a].innerHTML = "cm";
                                break
                            }
                            if ("unit-value" == e[a].dataset.type) {
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
                            if ("unit-label" == e[a].dataset.type) {
                                e[a].innerHTML = "inch";
                                break
                            }
                            if ("unit-value" == e[a].dataset.type) {
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
    }, unitConverter = new UnitConverter, unitElements = document.querySelectorAll(".inch-cm"), i = 0; i < unitElements.length; i++
) {
    unitConverter.subscribe(unitElements[i]);
}
for (var unitRadioButtons = document.querySelectorAll("#dimensions-unit-selection input[type=radio]"), i = 0; i < unitRadioButtons.length; i++) {
    unitRadioButtons[i].addEventListener("change", function () {
        unitConverter.convertUnits()
    });
}
$("#imgwidth, #imgheight")
    .on("input change", maintainRatio), fc.init("canvas"), $(".frame-selection-container")
    .mousewheel(function (e, t) {
        this.scrollLeft -= 45 * t, e.preventDefault()
    }), $(".frame-thumb-container")
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
        var t = document.querySelectorAll(".fs-data-inch"),
            a = document.querySelectorAll(".fs-data-cm");
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
"undefined" == typeof headerCart && (headerCart = new CartAnnouncements, headerCart.init()), $("#fs-addToCartButton")
    .on("click", function () {
        if ("true" !== $(this)
                .attr("data-disabled")) {
            var e = {
                    product: product,
                    thumb: fc.thumb().toDataURL()
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
    }),/* $(window)
    .width() >= 768 && $("#stick-wrapper")
    .stick_in_parent({
        parent: "#product-focus"
    }),*/ $(window)
    .on("resize", function () {
       /* $(this)
            .width() < 768 ? $("#stick-wrapper")
            .trigger("sticky_kit:detach") : $("#stick-wrapper")
            .stick_in_parent({
                parent: "#product-focus"
            })*/
    }), $("#stick-wrapper")
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
        t.href && t.href.indexOf("frame-tab-") != -1 && (t.href.endsWith("#frame-tab-FloatforCanvas") ? $("#float-frame-warning")
            .slideDown(250) : $("#float-frame-warning")
            .slideUp(150))
    }), $("#frame-code-filter")
    .on("input", function () {
        if (!($(this)
                .val()
                .length < 1)) {
            if (void 0 == this.frameData) {
                var e = [];
                $('[id^="frame-tab"]:not(#frame-tab-filter-results) [data-frame-code]')
                    .each(function () {
                        e.push(this)
                    }), this.frameData = e
            }
            $('a[href="#frame-tab-filter-results"].ui-tabs-anchor')
                .parent()
                .hasClass("ui-state-active") || $('a[href="#frame-tab-filter-results"].ui-tabs-anchor')
                .click();
            var t = $(this)
                    .val()
                    .toUpperCase(),
                a = _.filter(this.frameData, function (e) {
                    return _.startsWith(e.dataset.frameCode.toUpperCase(), t)
                }),
                i = $("#frame-tab-filter-results");
            i.unbind(), i.empty(), i.mousewheel(function (e, t) {
                this.scrollLeft -= 45 * t, e.preventDefault()
            }), $(a)
                .each(function () {
                    $(this)
                        .clone(!0)
                        .appendTo($("#frame-tab-filter-results"))
                }), $("#frame-tab-filter-results .lazy")
                .lazyload({
                    effect: "fadeIn",
                    threshold: 0,
                    container: i
                })
        }
    }), $("#frame-rate-list")
    .on("change", function () {
        var e = parseInt($(this)
            .val());
        $('a[href="#frame-tab-filter-results"].ui-tabs-anchor')
            .parent()
            .hasClass("ui-state-active") || $('a[href="#frame-tab-filter-results"].ui-tabs-anchor')
            .click();
        var t = prodMan.filter(function (t) {
                return e == t.dataset.frameRate
            }),
            a = $("#frame-tab-filter-results");
        a.unbind(), a.empty(), a.mousewheel(function (e, t) {
            this.scrollLeft -= 45 * t, e.preventDefault()
        }), $(t)
            .each(function () {
                $(this)
                    .clone(!0)
                    .appendTo($("#frame-tab-filter-results"))
            }), $("#frame-tab-filter-results .lazy")
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
        this.imageUrl = e.url, this.imageId = e.id, $("#upload-image-modal")
            .modal("hide");
        var a = new Image;
        a.onload = function () {
            prodMan.setImage(this, function () {
                togglePrinting(1), $("#image-ratio")
                    .attr("data-is-locked", "true");
                var i = (a.src.replace(/.*?:\/\//g, "/"), 0),
                    r = 0;
                e.pixelWidth && e.pixelHeight ? (i = e.pixelWidth, r = e.pixelHeight, image_width = e.pixelWidth, image_height = e.pixelWidth) : (i = a.width, r = a.height, image_width = e.pixelWidth, image_height = e.pixelWidth), product.printing.image.url = e.file, product.printing.image.id = parseInt(e.id), product.printing.image.name = e.name, product.printing.image.originalWidth = i, product.printing.image.originalHeight = r, product.printing.image.aspectRatio = parseFloat(a.width) / a.height, $("#image-summary-name")
                    .html(e.name), $(".image-details")
                    .fadeIn(150), $(".print-quality-container")
                    .fadeIn(150), $("#upload-info-alert")
                    .fadeOut(150), $("[name=printing-type][value=luster-paper]")
                    .click(), $("a[href=#tab-printing]")
                    .click(), $("#preset-size-list")
                    .val("-"), "cm" == $("span.inch-cm")
                    .html() ? ($("#imgwidth")
                    .val(i / 60), $("#imgheight")
                    .val((r / 60)
                        .toFixed(1))
                    .change()) : ($("#imgwidth")
                    .val(i / 60 / 2.54), $("#imgheight")
                    .val((r / 60 / 2.54)
                        .toFixed(1))
                    .change()), "function" == typeof t && t()
            })
        }, a.src = e.url
    },
    imageUrl: "",
    imageId: -1
};
$("#imgwidth, #imgheight")
    .on("input change", assessQuality), $("[name=printing-type]")
    .on("change", function () {
        "none" != $(this)
            .val() ? disableMDF(!0) : disableMDF()
    });
$("#fillet-no-mat-warning a")
    .on("click", function (e) {
        e.preventDefault(), $("[href=#tab-mats]")
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
                    .drawImage(e, 0, 0, t.width, t.height), document.getElementById("canvas-lightcase")
                    .appendChild(t)
            }
        },
        onCleanup: {
            removeClone: function () {
                $("#canvas-preview-cloned")
                    .remove()
            }
        }
    }), $("#preset-size-list")
    .on("change", function () {
        if ("-" != $(this)
                .val()) {
            var e = $("#imgwidth"),
                t = $("#imgheight"),
                a = $("[data-value=" + $(this)
                        .val() + "]"),
                i = "inch" === currentUnits ? "inch" : "cm";
            e.val(a.data("width-" + i)), t.val(a.data("height-" + i))
                .change()
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
                frameTile: "",
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
$("#frame-details")
    .collapse("hide"), $("#frame-details-icon")
    .removeClass("fa-minus")
    .addClass("fa-plus"), $("#frame-details")
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
            .width() < 768 && frame_details_open && ($("#frame-details")
            .collapse("hide"), $("#frame-details-icon")
            .removeClass("fa-minus")
            .addClass("fa-plus"), frame_details_open = !1), cachedWidth = e)
    });
var scrollTarget = $("#order-step-tabs");
$(".product-summary-link")
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
var elements = document.querySelector("#matboard-form") && document.querySelector("#matboard-form")
    .querySelectorAll("input[type=number]");
!function () {
    if(elements != null) {
        for (var e = 0; e < elements.length; e++) {
            elements[e].onblur = keepWithinBounds
        }
    }
}();
function onImageUploadeSelect() {
    var inp = $('.upload-input-inside-btn');
    inp.on('change', function (e) {
        var $this = $(this),
            elm = e.target,
            ext = $this.val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("only 'gif','png','jpg','jpeg' are allowd!");
        } else {


            if (elm.files && elm.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
//        $('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');
                    var imageURL = URL.createObjectURL(elm.files[0]);
//        var imageURL = e.target.result,
                    uploaded_img = new Image();
                    uploaded_img.src = imageURL;
                    uploaded_img.onload = function () {
                        if (typeof parent.gallery !== 'undefined') {
//           if(parent.gallery.getUrlFromIframe == true){
                            var pixelWidth = uploaded_img.width;
                            var pixelHeight = uploaded_img.height;
                            imageURL = imageURL.replace(/^[a-z]{4}\:\/{2}[a-z]{1,}\:[0-9]{1,4}.(.*)/, '/$1');
                            var filename = imageURL.substring(imageURL.lastIndexOf('/') + 1);
                            parent.gallery.setImageData({
                                url: imageURL,
                                id: 100,
                                name: filename,
                                file: filename,
                                pixelWidth: pixelWidth,
                                pixelHeight: pixelHeight
                            });
                            return;
//           }
                        }
                    };
                }
                reader.readAsDataURL(elm.files[0]);
            }
        }
    });
}
onImageUploadeSelect();