<div id="fs-checkout-box" class="row card">
	<div class="col-xs-12 text-right col-align-mid">
		<div class="row">
			<div id="quantity-container" class="text-center col-xs-5 col-sm-4 flat-input"><label id="quantity-label" for="fs-product-quantity">Quantity:</label> <input type="number" value="1" step="1" min="1" id="fs-product-quantity" name="fs-product-quantity" data-calc-product class="text-center"/></div>
			<div class="text-center col-xs-5 col-sm-4 flat-input" id="checkout-total">
			<div class="row">
				<span id="label-total">Total:</span> <span id="total-quantity-price" data-price-subscriber>AUD 0.00</span>
			</div>
			</div>
			<div class="col-xs-12 col-sm-4">
				<button id="fs-addToCartButton" class="button fat-button add-to-cart-button" data-disabled="false"><i class="fa fa-shopping-cart"></i> Add to
					cart
				</button>
			</div>
		</div>
	</div>
	<div class="dashed-break col-xs-12"></div>
	<div class="row">
		<div class="col-xs-12 table-clean flat-input" id="product-summary">
			<table class="table table-hover table-condensed" id="product-summary-table">
				<thead>
					<tr>
						<td class="col-xs-4"></td>
						<td class="col-xs-4">Product Summary</td>
						<td class="col-xs-4">Price Breakdown</td>
					</tr>
				</thead>
				<tbody>
					<tr id="row-summary-frame">
						<td>Frame</td>
						<td id="summary-frame" class="product-summary-link" data-href="tab-frames">---
						</td>
						<td id="summary-frame-price">---</td>
					</tr>
					<tr id="row-summary-slip">
						<td>Slip</td>
						<td id="summary-slip" class="product-summary-link" data-href="tab-slip">
							---
						</td>
						<td id="summary-slip-price">---</td>
					</tr>
					<tr id="row-summary-fillet">
						<td>Fillet</td>
						<td id="summary-fillet" class="product-summary-link" data-href="tab-fillets">---
						</td>
						<td id="summary-fillet-price">---</td>
					</tr>
					<tr id="row-summary-mat-top">
						<td>Mat (Top)</td>
						<td id="summary-mat-top" class="product-summary-link" data-href="tab-mats">---
						</td>
						<td id="summary-mat-top-price">---</td>
					</tr>
					<tr id="row-summary-mat-bottom">
						<td>Mat (Bottom)</td>
						<td id="summary-mat-bottom" class="product-summary-link" data-href="tab-mats">---
						</td>
						<td id="summary-mat-bottom-price">---</td>
					</tr>
					<tr id="row-summary-glass">
						<td>Glass</td>
						<td id="summary-glass" class="product-summary-link" data-href="tab-glass-and-backing">---
						</td>
						<td id="summary-glass-price">---</td>
					</tr>
					<tr id="row-summary-backing">
						<td>Backing</td>
						<td id="summary-backing" class="product-summary-link" data-href="tab-glass-and-backing">---
						</td>
						<td id="summary-backing-price">---</td>
					</tr>
					<tr id="row-summary-printing">
						<td>Printing</td>
						<td id="summary-printing" class="product-summary-link" data-href="tab-printing">None
						</td>
						<td id="summary-printing-price">---</td>
					</tr>
					<tr id="row-summary-image-size">
						<td>Image Size</td>
						<td id="summary-image-size" class="product-summary-link" data-href="tab-dimensions">---
						</td>
						<td>---</td>
					</tr>
					<tr id="row-summary-glass-size">
						<td>Glass Size (approx)</td>
						<td id="summary-glass-size">---</td>
						<td>---</td>
					</tr>
					<tr id="row-summary-outer-size">
						<td>Outer Size (approx)</td>
						<td id="summary-outer-size">---</td>
						<td>---</td>
					</tr>
					<tr id="row-summary-hanging-system">
						<td>Hanging System</td>
						<td><a href="#" data-toggle="modal" data-target="#hanging-info-modal">More
								Info</a></td>
						<td>---</td>
					</tr>
					<tr id="row-summary-discount">
                        <td><strong>Less:</strong> Discount</td>
                        <td id="row-summary-discount-percent" data-discount-percentage="{{$discounts_value->value}}">
<!--                            <input type="hidden"  name="row-summary-discount-percentage" id="row-summary-discount-percentage" value="3">-->
                            0 %
                        </td>
                        <td id="row-summary-discount-value">---</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>