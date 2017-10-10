var xmlHttp;
var xmlHttp1;
var xmlHttp2;
var xmlHttp3;
var xmlHttp8;

function add2cart(id, name, fcode, width, height, price,cidu)
{
	var urladd;
	var str = 'quantaty'+ id + name;
	var res = str.split(".").join("_");
	var quantity=$('.' + res).val();

	if(isNaN(parseFloat(quantity)))
	{
		alert('Please input numeric quantity.');
		return false;
	}
	else
	{

		var url="/scripts/photoframes.php";
		url=url+"?action=add2cart&id="+id+"&name="+name+"&fcode="+fcode+"&width="+width+"&height="+height+"&price="+price+ "&quantity="+quantity;
		url=url+"&sid="+Math.random();

		document.getElementById("result1").innerHTML = '<font face="Verdana" size="2"><img src="js/loading.gif"> Loading cart...</font>';

		xmlHttp = GetXmlHttpObject();
		xmlHttp.onreadystatechange = productIdfun;
		xmlHttp.open("GET", url, true);
		xmlHttp.send(null);
		setTimeout("cartdisplay()", 2000);
		document.getElementById("totalItemShopHtml").innerHTML = Number(document.getElementById("totalItemShopHtml").innerHTML) + Number(1);
	}
}
function productIdfun()
{
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

		urladd = "/add-to-cart.html&iproduct_id="+xmlHttp.responseText+"&icat_id=1239";
		xmlHttp2 = GetXmlHttpObject();
		xmlHttp2.onreadystatechange = productIdMessage;
		xmlHttp2.open("GET", urladd, true);
		xmlHttp2.send(null);

	} else {
		document.getElementById("result1").innerHTML = '<font face="Verdana" size="2"><img src="js/loading.gif"> Loading cart...</font>';
	}
}

function productIdMessage()
{
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

		document.getElementById("result1").innerHTML = '<font face="Verdana" size="2">Item added successfully in Cart.</font>';


	} else {
		document.getElementById("result1").innerHTML = '<font face="Verdana" size="2"><img src="js/loading.gif"> Loading cart...</font>';
	}
}

function cartdisplay()
{
	xmlHttp8 = GetXmlHttpObject();
	var url2 = "scripts/carttotal.php";
	url2 = url2 + "?sid=" + Math.random(); //alert(url);
	xmlHttp8.onreadystatechange = totalPrice;
	xmlHttp8.open("GET", url2, true);
	xmlHttp8.send(null);
}


function totalPrice() {
	if (xmlHttp8.readyState == 4 || xmlHttp8.readyState == "complete") {

		document.getElementById("totalItemShop").innerHTML = xmlHttp8.responseText;
	} else {
		document.getElementById("totalItemShop").innerHTML = '<font face="Verdana" size="2"><img src="js/loading.gif"> Loading cart...</font>';
	}
}

function custom_add2cart(id, name, fcode)
{
	if($('#width_'+id).val() == "" || $('#height_'+id).val() == "" || isNaN(parseFloat($('#width_'+id).val())) || isNaN(parseFloat($('#height_'+id).val())))
	{
		alert('Please input numeric width and height.');
	}
	else
	{
		width = $('#width_'+id).val();
		height = $('#height_'+id).val();
		price = $('#price_'+id).html();

		add2cart(id, name, fcode, width, height, price);
	}
}

function get_price(id, fcode, rate)
{
	if($('#width_'+id).val() == "" || $('#height_'+id).val() == "" || isNaN(parseFloat($('#width_'+id).val())) || isNaN(parseFloat($('#height_'+id).val())))
	{

	}
	else
	{
		$("#price_"+id).html('<img src="/images/loading.gif" alt="Calculating Price" title="Calculating Price" border="0" />');

		setTimeout(function () {
			var url="/scripts/photoframes.php";
			url=url+"?action=getprice&id="+id+"&fcode="+fcode+"&width="+$('#width_'+id).val()+"&height="+$('#height_'+id).val()+"&rate="+rate;
			url=url+"&sid="+Math.random();

			$.get(url, function(data){
				$("#price_"+id).html(data);
			});}, 3000);

	}
}
function GetXmlHttpObject() {
	var xmlHttp = null;
	try { // Firefox, Opera 8.0+, Safari
		xmlHttp = new XMLHttpRequest();
	} catch(e) { //Internet Explorer
		try {
			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e) {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}
