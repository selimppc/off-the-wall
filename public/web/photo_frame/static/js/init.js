$.extend($.expr[':'], {
    'containsi': function(elem, i, match, array)
    {
        return (elem.textContent || elem.innerText || '').toLowerCase()
                .indexOf((match[3] || "").toLowerCase()) >= 0;
    }
});

$(document).ready(function(){

    $(".button").button();
    $(".span-5").each(function(){
        $(this).hover(
            function(){
                $(this).find("img").css("border", "1px solid #000");
            }, function(){
                $(this).find("img").css("border", "1px solid #FFF");
            });
    });

    $("#upload_images").click(function(){
        $('#file_upload').uploadifyUpload();
    });

    $(".cancel").live('click',function(){ if($(".uploadifyQueueItem").size() == 1) $("#upload").hide(); });

    if($(".span-5").size() > 0)
    {
        $("#filter").show();
    }

    $("#search_btn").click(function(){
        if($("#search").val() != "")
        {
            $(".span-5").each(function(){$(this).hide();});
            $(".span-5:containsi("+$("#search").val()+")").show();
        }
    });

    $("#clear_btn").click(function(){ $(".span-5").each(function(){$(this).show();}); $("#search").val(''); });

    $('#file_upload').uploadify({
        'uploader'  : './upload/uploadify.swf',
        'scriptData': {'email': $("#email").val(),'subdir': $("#subdir").val()},
        'script'    : './upload.php',
        'cancelImg' : './upload/cancel.png',
        /*'buttonImg': './upload/browse-image.jpg',*/
        'buttonImg': '/uploadify/browse-image.jpg',
        'width': 73,
        'height':22,
        'fileDesc' : 'Image Files',
        'fileExt' : '*.jpg;*.jpeg;*.png;',
        'queueID': 'imageQ',
        'queueSizeLimit': 10,
        'multi' : true,
        'auto' : true,
        'onSelect': function(){ $("#upload").show(); },
        /*		'onComplete': function(event, ID, fileObj, response, data) { alert(response); },*/
        'onAllComplete': function (){ window.location.reload(true); },
        'onProgress': function(event,ID,fileObj,data){
            var per = $('#' + $(event.target).attr('id') + ID).find('.percentage').text();
            if(per == " - 100%")
            {
                $('#' + $(event.target).attr('id') + ID).append("<br /><br /><span><img border='0' src='/images/load.gif' />Generating Images</span>");
            }
        }
    });

    $('#file_uploadUploader').tipsy({trigger: 'hover', gravity: 'w', title: function(){ return 'You may add '+(10 - $(".uploadifyQueueItem").size())+' more images at once.'; }});

    $(".delete").live("click", function(){
        var img_id = $(this).parent().find("[name=img_id]").val();
        var r = confirm("Are you sure you want to delete this image?");
        if(r)
        {
            $.get("./upload.php?action=delete&id="+img_id+"&email="+$("#email").val(), function(d){
                window.location.reload(true);
            });
        }
        return
    });


    // Handle the way the gallery uses images depending on the environment
    $(".use").live("click", function(){
        var img_file = $(this).parent().find("[name=img_file]").val();
        var isIframe = (window.location != window.parent.location);
        var container = $(this).closest('.image_container');
        var t = container.find('img');
        var id = container.attr('data-image-id');
        var imageName = container.attr('data-image-name');
        var pixelWidth = container.attr('data-pixel-width');
        var pixelHeight = container.attr('data-pixel-height');

        if(!isIframe){
            window.location.href = t[0].src.replace('_thumb','_original');
            return;
        }

        // If the iframe is told to pass the URL instead.
        if(typeof parent.gallery !== 'undefined'){
            if(parent.gallery.getUrlFromIframe == true){
                var imageURL = t[0].src.replace('_thumb', '_large');
                imageURL = imageURL.replace(/^[a-z]{4}\:\/{2}[a-z]{1,}\:[0-9]{1,4}.(.*)/, '/$1');
                var filename = imageURL.substring(imageURL.lastIndexOf('/')+1).replace('_large','_original');
                parent.gallery.setImageData({
                    url: imageURL,
                    id:id,
                    name: imageName,
                    file:filename,
                    pixelWidth: pixelWidth,
                    pixelHeight: pixelHeight
                });
                return;
            }
        }
        // Else, legacy
        var url = parent.window.location;
        parent.window.location = removeParamFromURL(url, "i") + "&i="+img_file;

    });

    $(".usecollagecreator").live("click", function(){ useimage($(this).parent().find("[name=img_file]").val()); });

    $(".usephotocollage").live("click", function(){
        var img_file = $(this).parent().find("img").attr('src');
        parent.addnew("http://www.frameit.com.au"+img_file);
        parent.$.fancybox.close();
    });

    $(".usebanner").live("click", function(){
        var img_file = $(this).parent().find("img").attr('src');
        usethis(img_file);
    });

    $("#filter_menu").change(function(){
        window.location = "./index.php?order="+$(this).val();
    });

});

function removeParamFromURL(URL,param)
{
    URL = String(URL);
    var regex = new RegExp( "\\?" + param + "=[^&]*&?", "gi");
    URL = URL.replace(regex,'?');
    regex = new RegExp( "\\&" + param + "=[^&]*&?", "gi");
    URL = URL.replace(regex,'&');
    URL = URL.replace(/(\?|&)$/,'');
    URL = URL.replace("#",'');
    regex = null;
    return URL;
}
