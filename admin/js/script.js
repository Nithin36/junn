/**
 *
 * HTML5 Image uploader with Jcrop
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2012, Script Tutorials
 * http://www.script-tutorials.com/
 */

// convert bytes into friendly format
function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB'];
    if (bytes == 0) return 'n/a';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
};

// check for selected crop region
function checkForm() {
    if (parseInt($('#w').val())) return true;
     $('.error').html('<br/><div class="alert alert-danger alert-dismissable">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Please select a crop region </div> ').show();
    return false;
};


function checkForm2() {
        var oFile = $('#image_file')[0].files[0];
     if (oFile.size >0) {
           if (parseInt($('#w').val())) return true;
    $('.error').html('<br/>'+
            '<br/><div class="alert alert-danger alert-dismissable">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Please select a crop region </div> ').show();
    return false;

    }
    else
    {
        return true;
    }
  
};
// update info by cropping (onChange and onSelect events handler)
function updateInfo(e) {
    $('#x1').val(e.x);
    $('#y1').val(e.y);
    $('#x2').val(e.x2);
    $('#y2').val(e.y2);
    $('#w').val(e.w);
    $('#h').val(e.h);
  
                 //$('.img-responsive').attr('src','');

};

// clear info by cropping (onRelease event handler)
function clearInfo() {
    $('.info #w').val('');
    $('.info #h').val('');
    
   
};

function fileSelectHandler() {
                //$('.img-responsive').attr('src','');
                //alert('ff');

    // get selected file
    var f="";
    var oFile = $('#image_file')[0].files[0];

    // hide all errors
    $('.error').hide();

    // check for image type (jpg and png are allowed)
    var rFilter = /^(image\/jpeg)$/i;
    if (! rFilter.test(oFile.type)) {
        $('.error').html('Please select a valid image file (jpg  are allowed)').show();
        return;
    }

     
//    if (oFile.size > 50 * 50) {
//       
//        $('.error').html('<br/><br/><div class="alert alert-danger alert-dismissable">'+
//                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Image size should be greater than 600px * 400px</div> ').show();
//        return;
//    }

    // preview element
    var oImage = document.getElementById('preview');

    // prepare HTML5 FileReader
    var oReader = new FileReader();
        oReader.onload= function(e) {
            //e.preventDefault();

        // e.target.result contains the DataURL which we can use as a source of the image
          if(oImage.src!="")
        {
             //$('.img-responsive').attr('src','');
        }
        //alert(oImage.src);
       //oImage.src="";
      oImage.src = e.target.result;
      f=oImage.src;
        oImage.onload = function () { // onload event handler
 
            // display step 2
            $('.step2').fadeIn(500);

            // display some basic image info
            var sResultFileSize = bytesToSize(oFile.size);
            $('#filesize').val(sResultFileSize);
            $('#filetype').val(oFile.type);
            $('#filedim').val(oImage.naturalWidth + ' x ' + oImage.naturalHeight);

            // Create variables (in this scope) to hold the Jcrop API and image size
            var jcrop_api, boundx, boundy;

            // destroy Jcrop if it is existed
            if (typeof jcrop_api != 'undefined') 
                jcrop_api.destroy();

            // initialize Jcrop
            $('.jcrop-holder img').attr('src', f);
            $('#preview').Jcrop({
                 boxWidth: 1200, 
                 boxHeight: 1200 ,
                minSize: [64, 64], // min crop size
                aspectRatio : 1, // keep aspect ratio 1:1
                bgFade: true, // use fade effect
                bgOpacity: .3, // fade opacity
                onChange: updateInfo,
                onSelect: updateInfo,
                onRelease: clearInfo
            }, function(){

                // use the Jcrop API to get the real image size
                var bounds = this.getBounds();
                boundx = bounds[0];
                boundy = bounds[1];

                // Store the Jcrop API in the jcrop_api variable
                jcrop_api = this;
                
            });
        };
    };

    // read selected file as DataURL
    oReader.readAsDataURL(oFile);
   // alert(oFile.);
    //oFile="";
}