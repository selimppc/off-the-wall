var startFrom = 0;
var limit = 1000;
var hasChanged = false;
var fc = new FrameCreator();
var width = 10.1;
var height = 15.2;
var captureBox = document.getElementById('fs-capture-box');
var categoryID = "> 1";
var startingFrame = '330A';
var initialized = false;


var PageMaintainer = function () {
    var image = {};
    image.width = 0;
    image.height = 0;
    var frameData = {};

    var setImageDimensions = function (width, height) {
        image.width = width;
        image.height = height;
        updatePage();
    };

    var setFrameData = function (data) {
        frameData = data;
        updatePage();
    };

    var updatePage = function () {
        if (typeof frameData.code === 'undefined') {
            return;
        }
        document.getElementById('fs-detail-code').innerHTML = frameData.code;
        document.getElementById('fs-detail-width').innerHTML = frameData.width + ' cm';
        document.getElementById('fs-detail-depth').innerHTML = frameData.height + ' cm';
        document.getElementById('fs-detail-rebate').innerHTML = parseFloat(frameData.rebate) + ' cm';
        document.getElementById('fs-detail-description').innerHTML = frameData.desc;

        var backing = 'MDF, Metal Hanger';
        if (image.width <= 20.3 && image.height <= 25.4) {
            backing += ' & Standback';
        };


        document.getElementById('fs-detail-backing').innerHTML = backing;
        document.getElementById('fs-detail-material').innerHTML = frameData.material;


        var h = 0;
        var rows = document.querySelectorAll('#product-details tr');
        for (var i = 0; i < rows.length; i++) {
            h += rows[i].clientHeight + 2.55;
        }

        document.getElementById('product-details').style.height = h + 'px';

        // Update the canvas
        fc.draw({width: width, height: height});
    };

    var getFrameId = function(){
        return frameData.id;
    };

    var getFrameCode = function(){
        return frameData.code;
    };

    return {
        setImageDimensions: setImageDimensions,
        setFrameData: setFrameData,
        update: updatePage,
        getFrameCode: getFrameCode,
        getFrameId: getFrameId
    }
};

var pageMaintainer = new PageMaintainer();


var TabManager = function () {
    var tabs = document.getElementsByClassName('fs-tab');

    for (var i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener('click', function (e) {
            e.preventDefault();
            $('.fs-tab-selected').removeClass('fs-tab-selected');
            if (this.dataset.category !== categoryID) {
                hasChanged = true;
            }

            categoryID = this.dataset.category;
            this.className += ' fs-tab-selected';
            processForm();
        });
    }
};

TabManager();

for (var i = 0; i < document.getElementById('fs-photoframe-tabs').children.length; i++) {
    if (document.getElementById('fs-photoframe-tabs').children[i].innerHTML == 'Stains') {
        document.getElementById('fs-photoframe-tabs').children[i].click();
    }
}


var successCart = function () {
    var item = document.createElement('DIV');
    item.id = "cart-notification";
    item.style.opacity = 1;
    item.style.position = 'fixed';
    item.style.right = 30 + 'px';
    item.style.top = 90 + 'px';
    item.style.zIndex = 1000;

    item.innerHTML = '<div id="fs-popup-notification" class="row">\
                          <div class="fs-popup-notification-element fs-icon col-xs-5">\
                          <img src="static/images/shopping-cart-white.png">\
                            </div>\
                            <div class="fs-popup-notification-element fs-message col-xs-7">\
                                    Item successfully added to cart!\
                            </div>\
                            </div>';

    return item;
};


window.requestAnimationFrame = window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.requestAnimationFrame;

function fadeOut(element) {
    element.style.opacity = 1;
    (function fade() {
        if ((element.style.opacity -= .05) < 0) {
            element.display = 'none';
            document.body.removeChild(element);
            element.style.opacity = 1;
        } else {
            requestAnimationFrame(fade);
        }
    })();
}


fc.init('canvas');

// Add To Cart
var addToCartButton = document.getElementById('fs-addToCartButton');

/* Frame Box */
$('#fs-capture-box').mousewheel(function (event, delta) {
    this.scrollLeft -= (delta * 45);
    event.preventDefault();
});


var CaptureBoxController = {
    captureBox: document.getElementById('fs-capture-box'),

    clear: function () {
        this.captureBox.innerHTML = '';
    },

    append: function (item) {
        this.captureBox.appendChild(item);
    }
};

var dropDownManager = new FrameshopDropDown();

var PriceTableManager = {
    priceTable: document.getElementById('fs-price-table-container'),
    clear: function () {
        this.priceTable.innerHTML = '';
    },

    fetchPrices: function (category, rate, code) {
        $.ajax({
            type: 'POST',
            url: '/photo-frames/static/json/pricelist.txt',
            data: {
                catID: category,
                rate: rate,
                frameCode: code
            },
            success: function (callback) {
                var ptc = document.getElementById('fs-price-table-container');
                ptc.innerHTML = callback;
                dropDownManager.init(ptc.getElementsByClassName('fs-dropdown')[0]);


                var rows = document.getElementsByClassName('fs-price-row');
                for (var i = 0; i < rows.length; i++) {
                    rows[i].addEventListener('click', function (e) {
                        width = this.dataset.width;
                        height = this.dataset.height;
                        pageMaintainer.setImageDimensions(this.dataset.width, this.dataset.height);

                        changeTotalDisplay(this.dataset.price);
                    });
                }
                changeTotalDisplay();


            },
            error: function (callback) {
                console.log(callback);
            }
        });
    },

    populate: function () {
    }
};

function flagChange() {
    hasChanged = true;
}

addToCartButton.addEventListener('click', function (e) {
    e.preventDefault();
    if (this.dataset.disabled == true) {
        return;
    }
    var quantity = document.getElementById('fs-product-quantity').value;
    var productID = document.getElementById('fs-dropdown-selected').dataset.productId;

    if (quantity < 1) {
        quantity = 1;
    }

    if (typeof productID === 'undefined') {
        return false;
    }


    $.ajax({
        type: 'GET',
        url: 'http://localhost/photo-frames/',
        data: {
            action: 'addtocart',
            iproduct_id: productID,
            quantity: quantity,
            icat_id: 1460,
          product_type : 'PHOTO_FRAME',
        },

        success: function () {
            var sc = new successCart;
            document.body.appendChild(sc);
            setTimeout(function () {
                fadeOut(sc)
            }, 2345);
            $.ajax({
                type: 'GET',
                url: 'static/json/get-cart-info.json',
                success: function (callback) {
                    // var contents = JSON.parse(callback);
                    var contents = callback;
                    console.log(contents);

                    var productListeners = document.getElementsByClassName('update-cart-products');
                    var priceListeners = document.getElementsByClassName('update-cart-price');

                    for (var i = 0; i < productListeners.length; i++) {
                        productListeners[i].innerHTML = contents.productCount;
                    }

                    for (var i = 0; i < priceListeners.length; i++) {
                        priceListeners[i].innerHTML = contents.totalPrice;
                    }


                    document.querySelector('[data-cart-product-units]').innerHTML = (contents.productCount || 0)
                    document.querySelector('[data-cart-total-price]').innerHTML = (contents.totalPrice || 0).toFixed(2)


                },
                error: function (xhr, type, exception) {
                    /* if ajax fails display error alert */
                    console.log("ajax error response type " + type);
                }
            })
        },
        error: function (xhr, type, exception) {
            /* if ajax fails display error alert */
            console.log("ajax error response type " + type);
        }
    });
});


function changeTotalDisplay(price) {
    var priceString = '$';
    if (price) {
        priceString += (price.substr(1) * document.getElementById('fs-product-quantity').value).toFixed(2);
    } else {
        priceString += parseFloat(document.querySelector('.fs-dropdown-header .fs-data-price').innerHTML.substr(1) * document.getElementById('fs-product-quantity').value).toFixed(2);
    }
    document.getElementById('total-quantity-price').innerHTML = priceString;
}


function generateFrameSelection(frameData) {

    var div = document.createElement('DIV');
    var thumb = new Image();
    div.frameData = frameData;
    thumb.src = div.frameData.thumbImage;

    div.addEventListener('click', function () {
        selectFrame(this.frameData);
        pageMaintainer.setFrameData(this.frameData);

        if (document.getElementById('fs-thumb-selected')) {
            document.getElementById('fs-thumb-selected').removeAttribute('id');
        }
        this.id = 'fs-thumb-selected';
    });

    var nametag = document.createElement('span');
    var widthtag = document.createElement('span');
    nametag.innerHTML = div.frameData.code;
    widthtag.innerHTML = div.frameData.width + " cm";
    div.className = 'fs-frame-thumb-container';
    nametag.className = 'fs-frame-nametag';
    widthtag.className = 'fs-frame-widthtag';
    thumb.className = 'fs-frame-thumb-image';

    if (div.frameData.code == startingFrame) {
        div.id = 'default-frame';
    }

    div.appendChild(thumb);
    div.appendChild(nametag);
    div.appendChild(widthtag);
    CaptureBoxController.append(div);
}

function selectFrame(frameData) {
    document.getElementById('fs-addToCartButton').dataset.disabled = false;
    fc.clearFrames();
    var fr = {width: frameData.width, src: frameData.tileImage};
    fc.addFrame(fr);
    fc.draw({width: width, height: height});

    PriceTableManager.fetchPrices(frameData.sizeCategory,
        frameData.rate,
        frameData.code);
}

function processForm() {
  /* Dynamic form values */
  if (hasChanged) {
    hasChanged = false;
    if (CaptureBoxController) {
      CaptureBoxController.clear();
    }
    startFrom = 0;
  }
  /* Retrieves frames from server. Frame metadata is in frameData property */
  $.ajax({
    type   : 'POST',
    url    : '/photo-frames/static/json/frames.json',
    data   : {
      startFrom : startFrom,
      limit     : limit,
      categoryID: categoryID
    },
    success: function (callback) {
      startFrom += limit;

      CaptureBoxController.clear();
      for (var i = 0; i < callback.length; i++) {

        generateFrameSelection(callback[i]);
      }

      if (typeof document.getElementById('default-frame') !== 'undefined' && !initialized) {
        setTimeout(function () {

          var frame = document.getElementById('default-frame')
          frame && document.getElementById('default-frame').click();
          initialized = true;
        }, 750);
      }
    },
    error  : function (err) {
      console.log(err.responseText);
    }
  });
}

document.getElementById('select-photo-size-title').addEventListener('click', function (e) {
    e.stopPropagation();
    dropDownManager.toggle();
});


$(function () {
    $(document).ready(function () {
        processForm();
        flagChange();

        document.getElementById('fs-product-quantity').addEventListener('input', function () {
            changeTotalDisplay();
        });

        dropDownManager.addToggleHook(function () {
            document.getElementById('custom-framing-promotion').className = 'alert alert-info';
        });

        $('#fs-cat_id').on('change', function (e) {
            e.preventDefault();
            processForm();
        });
    });
});


var buttons = document.querySelectorAll('[name=unit-type]');
for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', function (e) {
        var inches = document.querySelectorAll('.fs-data-inch');
        var cm = document.querySelectorAll('.fs-data-cm');
        if (this.value == 'cm') {
            // hide inch, show cm
            for (var j = 0; j < inches.length; j++) {
                cm[j].classList.remove('hidden-xs');
                cm[j].classList.remove('hidden-sm');
                inches[j].classList.add('hidden-xs');
                inches[j].classList.add('hidden-sm');
            }
        } else {
            // hide cm, show inch
            for (var j = 0; j < inches.length; j++) {
                cm[j].classList.add('hidden-xs');
                cm[j].classList.add('hidden-sm');
                inches[j].classList.remove('hidden-xs');
                inches[j].classList.remove('hidden-sm');
            }
        }
    });

}


// Tour
var template = "<div class='popover tour'> \
        <div class='arrow'></div> \
        <h3 class='popover-title'></h3> \
        <div class='popover-content'></div> \
        <div class='popover-navigation'> \
        <button class='btn btn-default' data-role='prev'>« Prev</button> \
        <span data-role='separator'>|</span> \
        <button class='btn btn-default' data-role='next'>Next »</button> \
        <button class='btn btn-default' data-role='end'>End Guide</button> \
        </div> \
        </div>";
var tour = new Tour({
    template: template
});
tour.addStep({
    element: "#fs-photoframe-tabs",
    title: "Choose a Category",
    content: "Click on one of the many colour categories to see the range of frames available.",
    reflex: true,
    placement: 'top',
    backdropContainer: 'body',
    backdrop: true
});

tour.addStep({
    element: "#fs-capture-box",
    title: "Select your Frame",
    content: "Browse through and click on your favourite frames below.",
    reflex: true,
    placement: 'top',
    backdropContainer: 'body',
    backdrop: true
});

tour.addStep({
    element: "#fs-price-table-container",
    title: "View Available Sizes",
    content: "Click on the bar below to open up the available standard sizes. Then select the size of your photo or image.",
    reflex: true,
    placement: 'top',
    backdrop: true,
    backdropContainer: 'body'

});

tour.addStep({
    element: "#fs-product-quantity",
    title: "Change your Quantity",
    content: "You can order as many photo frames as you like!",
    backdropContainer: 'body',
    placement: 'top',
    backdrop: true
});

tour.addStep({
    element: "#fs-addToCartButton",
    title: "Add to Cart!",
    content: "Click the Add to cart button and you are done! You can continue shopping and order more frames or click on your shopping cart in the top right corner to proceed to checkout.",
    backdropContainer: 'body',
    placement: 'top',
    backdrop: true
});

// Initialize the tour
tour.init();





setTimeout(function(){var a=document.createElement("script");
    var b=document.getElementsByTagName("script")[0];
    a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0036/0096.js?"+Math.floor(new Date().getTime()/3600000);
    a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
//# sourceMappingURL=photo-frames.min.js.map
