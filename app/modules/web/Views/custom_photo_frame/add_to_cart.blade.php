<div id="offtwl__checkout-box" class="row offtwl__cardbox">
  <div class="clearfix">
    <div class="col-xs-12 text-right col-align-mid" style="background: #fff;margin-top: 20px;padding-top: 8px;">
      <div class="offtwl__ac">
        <div class="row">
          <div class="clearfix">
            <div id="quantity-container" class="text-center col-xs-5 col-sm-4 flat-input">
              <label id="quantity-label" for="offtwl__product-quantity">Quantity:</label>
              <input type="number" value="1" step="1" min="1" id="offtwl__product-quantity" name="offtwl__product-quantity" data-offtwl__calculation-item class="text-center"/>
            </div>
            <div class="text-center col-xs-5 col-sm-4 flat-input" id="checkout-total">
              <span id="label-total">Total:</span>
              <span id="total-quantity-price" data-price-subscriber>$0.00</span>
            </div>
            <div class="col-xs-12 col-sm-4">
              <div class="mt-10 visible-xs"></div>
              <button id="offtwl__addToCartButton" class="btn btn-success add-to-cart-button" data-disabled="false">
                <i class="glyphicon glyphicon-shopping-cart"></i> Add to
                cart
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix">
    <div class="col-xs-12">
      <div class="dashed-break"></div>
    </div>
  </div>
  <div class="clearfix">
    <div class="col-xs-12" style="background: #fff;margin-top: 20px;padding-top: 8px;">
      <div class="panel-heading toggle-collapse inline-block" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="true" style="padding-left: 5px;">
    <span class="panel-title">
      Show frame summary
      <i style="margin-left: 5px;" class="toggle-icon fa fa-plus"></i>
    </span>
      </div>
      <div class="panel-body collapse table-clean flat-input row" id="collapse-2">
        <div class="row">
          <div class="col-xs-12 table-clean flat-input" id="offtwl__product-glance">
            <div class="offtwl__ab">
              <div class="offtwl__ac">
                <div class="offtwl__az">
                  <table class="offtwl__addtocart-info-table table table-hover table-condensed mb-0" id="offtwl__product-glance-table">
                    <thead>
                      <tr>
                        <td class="col-xs-4"></td>
                        <td class="col-xs-4">Frame Details</td>
                        <td class="col-xs-4">Price Summary</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="offtwl__glance-frame-row">
                        <td>Frame</td>
                        <td id="offtwl__glance-frame" class="offtwl__product-glance-link" data-href="offtwl__frames-tab">---
                        </td>
                        <td id="offtwl__glance-frame-price">---</td>
                      </tr>
                      <tr id="offtwl__glance-slip-row">
                        <td>Slip</td>
                        <td id="offtwl__glance-slip" class="offtwl__product-glance-link" data-href="offtwl__slip-tab">
                          ---
                        </td>
                        <td id="offtwl__glance-slip-price">---</td>
                      </tr>
                      <tr id="offtwl__glance-fillet-row">
                        <td>Fillet</td>
                        <td id="offtwl__glance-fillet" class="offtwl__product-glance-link" data-href="offtwl__fillets-tab">---
                        </td>
                        <td id="offtwl__glance-fillet-price">---</td>
                      </tr>
                      <tr id="offtwl__glance-mat-top-row">
                        <td>Mat (Top)</td>
                        <td id="offtwl__glance-mat-top" class="offtwl__product-glance-link" data-href="offtwl__mats-tab">---
                        </td>
                        <td id="offtwl__glance-mat-top-price">---</td>
                      </tr>
                      <tr id="offtwl__glance-mat-bottom-row">
                        <td>Mat (Bottom)</td>
                        <td id="offtwl__glance-mat-bottom" class="offtwl__product-glance-link" data-href="offtwl__mats-tab">---
                        </td>
                        <td id="offtwl__glance-mat-bottom-price">---</td>
                      </tr>
                      <tr id="offtwl__glance-glass-row">
                        <td>Glass</td>
                        <td id="offtwl__glance-glass" class="offtwl__product-glance-link" data-href="offtwl__glass-and-backing-tab">---
                        </td>
                        <td id="offtwl__glance-glass-price">---</td>
                      </tr>
                      <tr id="offtwl__glance-backing-row">
                        <td>Backing</td>
                        <td id="offtwl__glance-backing" class="offtwl__product-glance-link" data-href="offtwl__glass-and-backing-tab">---
                        </td>
                        <td id="offtwl__glance-backing-price">---</td>
                      </tr>
                      <tr id="offtwl__glance-printing-row">
                        <td>Printing</td>
                        <td id="summary-printing" class="offtwl__product-glance-link" data-href="offtwl__print-info-tab">None
                        </td>
                        <td id="summary-printing-price">---</td>
                      </tr>
                      <tr id="offtwl__glance-image-size-row">
                        <td>Image Size</td>
                        <td id="offtwl__glance-image-size" class="offtwl__product-glance-link" data-href="offtwl__dimension-tab">---
                        </td>
                        <td>---</td>
                      </tr>
                      <tr id="offtwl__glance-glass-row-size">
                        <td>Glass Size (approx)</td>
                        <td id="offtwl__glance-glass-size">---</td>
                        <td>---</td>
                      </tr>
                      <tr id="offtwl__glance-outer-size-row">
                        <td>Outer Size (approx)</td>
                        <td id="offtwl__glance-outer-size">---</td>
                        <td>---</td>
                      </tr>
                      <tr style="display: none;" id="offtwl__glance-hanging-system-row">
                        <td>Hanging System</td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#more-info-modal">More
                            Info
                          </a>
                        </td>
                        <td>---</td>
                      </tr>
                      <tr style="display: none;" id="offtwl__glance-discount-row">
                        <td>
                          <strong>Less:</strong>
                          Discount
                        </td>
                        <td id="offtwl__glance-discount-row-percent" data-discount-percentage="3">
                          <!--                            <input type="hidden"  name="offtwl__glance-discount-row-percentage" id="offtwl__glance-discount-row-percentage" value="3">-->
                          0 %
                        </td>
                        <td id="offtwl__glance-discount-row-value">---</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>