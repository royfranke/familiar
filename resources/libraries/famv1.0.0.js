
$( document ).ready(function() {
    if (user_id > 0) {
      loadPage('home');
    }
});

$(document).ajaxError(function( event, request, settings ) {
        //When XHR Status code is 0 there is no connection with the server
    if (request.status == 0){ 
        alert('You are offline or your connection was interrupted. If you just made a change, it was not saved.');
    }
});

$(document).ajaxSuccess(function( event, request, settings ) {
    	
});



function viewLoginMenu (page) {
	$(".login-menu li").removeClass('hide');
	$(".login-menu li[data-view="+page+"]").addClass('hide');
	$.ajax({
      url: "resources/templates/"+page+"-view.php",
      data: {
      	view: true
      },
      type: "POST", //request type
      success:function(result){
      	$("#login-view").html(result);
      }
  	});
	event.stopPropagation();
}

function signup () {
	fields = [];
	missing = [];
	var error_msg = '';
	$( ".input-container" ).each(function(index) {
  		var value = $(this).find("input").val();
  		if (value != '') {
  			fields.push(value);
  		}
  		else {
  			var label = $(this).find("label").html();
  			missing.push(label);
  		}
	});

	if (missing.length > 0) {
		error_msg = 'You are missing: ';
		for (var i = 0;i < missing.length;i++) {
			error_msg += missing[i];
			if (i < missing.length - 2) {
				error_msg += ', ';
			}
			if (i == missing.length - 2) {
				error_msg += ' and ';
			}
		}
		error_msg += '.';
	}
	else {
		if ($("#user-pwd").val() != $("#user-repeat").val()) {
			error_msg = 'Please make sure your passwords match.';
		}
		else {
			submitSignup(fields);
		}
	}
	$(".alert-message").html(error_msg);
}

function submitSignup(fields) {
	$.ajax({
      url: "includes/signup.inc.php",
      data: {
      	fields: fields
      },
      type: "POST", //request type
      success:function(result){
      	if (result == 0) {
      		location.href = "/";
      	}
      	else {
      		$(".alert-message").html(result);
      	}
      }
  	});
}

function login () {
	var user_name = $("#user-name").val();
	var user_pwd = $("#user-pwd").val();
	$.ajax({
      url: "includes/login.inc.php",
      data: {
      	user_name: user_name,
      	user_pwd: user_pwd
      },
      type: "POST", //request type
      success:function(result){
      	if (result == 0) {
      		location.href = "/";
      	}
      	else {
      		$(".alert-message").html(result);
      	}
      	
      }
  	});
	event.stopPropagation();
}

function logout () {
	$.ajax({
      url: "includes/logout.inc.php",
      type: "POST", //request type
      success:function(result){
      	location.href = "/";
      }
  	});
	event.stopPropagation();
}


function searchText() {
  var search_term = $("#search-input").val();
  if (search_term.length > 2) {
  $.ajax({
      url: "resources/templates/search-loading.php",
      type: "POST", //request type
      success:function(result){
        $("#search-block .page-block-body").html(result);
        $.ajax({
          url: "includes/search.inc.php",
          data: {
            search_term: search_term,
            user_id: user_id
          },
          type: "POST", //request type
          success:function(result){
            $("#search-block .page-block-body").html(result);
          }
        });
      }
    });
}
  event.stopPropagation();
}

function closeSettings () {
  if ($(".settings-body").is(":visible")) {
    $(".page-body").slideDown();
    $(".settings-body").slideUp();
     $(".settings-body").promise().done(function() {
        $(".settings-body").html('');
      });
     return true;
  }
  else {
    return false;
  }
}

function scrollToPage (page) {
  closeSettings();
  
  page_width = $(".page-body .page-block").width();
  index = $("#"+page+"-block").index();
  current_index = 0;
  $( ".page-body .page-block" ).each(function( index ) {
      if ($(this).isInViewport()) {
        current_index = $(this).index();
        return false;
      } 
  });

  distance = index - current_index;
  console.log(current_index+" "+distance);
  if (distance < 0) {
    symbol = "-=";
  }
  else {
    symbol = "+=";
  }
  difference = Math.abs(page_width*distance);
    $('.page-body').removeClass('scroll-snap').animate({
    scrollLeft: symbol+difference+"px"
    }, 300, 'swing', function() {
        $('.page-body').addClass('scroll-snap');
        updateFooter();
  });
}

function updateFooter () {
  $(".page-footer-button").removeClass("page-footer-active");
  $( ".page-block" ).each(function( index ) {
      if ($(this).isInViewport()) {
        cur_id = $(this).attr("id");
        cur = cur_id.split('-');
        current = cur[0];
        $("#btn-"+cur[0]).addClass("page-footer-active");
        return false;
      } 
  });
}

$(".page-body").scroll(function() {
   updateFooter();
});


$.fn.isInViewport = function() {
  var elementLeft = $(this).offset().left;
  var elementRight = elementLeft + $(this).outerWidth();

  var viewportLeft = $(".page-body").offset().left;
  var viewportRight = viewportLeft + $(window).width();

  return elementRight > viewportLeft && elementLeft < viewportRight;
};


function loadPage (page) {
  $.ajax({
      url: "resources/templates/"+page+"-page.php",
      data: {
        user_id: user_id,
        view: true
      },
      type: "POST", //request type
      success:function(result){
        $(".page-body").html(result);
        $( ".page-block" ).each(function( index ) {
            page_id = $(this).attr("id");
            page = page_id.split('-');
            loadView(page[0]);
      
          });
        
      }
    });
}

function loadView (page) {
  $.ajax({
      url: "resources/templates/"+page+"-loading.php",
      type: "POST", //request type
      success:function(result){
        $("#"+page+"-block .page-block-body").html(result);
      $.ajax({
          url: "resources/templates/"+page+"-view.php",
          data: {
            user_id: user_id,
            view: true
          },
          type: "POST", //request type
          success:function(result){
            $("#"+page+"-block .page-block-body").html(result);
          }
        });
        }
    });
}

function showPastPrints () {
  $.ajax({
      url: "resources/templates/past-view.php",
      data: {
        user_id: user_id,
        view: true
      },
      type: "POST", //request type
      success:function(result){
        $("#myprints-block .page-block-body").html(result);
      }
    });
}

function togglePrintAction (fdc_id) {
  var new_state = -1;
  var this_row = $(".result-row[fdcid="+fdc_id+"] .result-action-print .row-btn");
  if (this_row.hasClass("printed")) {
    this_row.removeClass("printed");
    this_row.addClass("reprint");
    new_state = 1;
  }
  else {
    if (this_row.hasClass("reprint")) {
      this_row.removeClass("reprint");
      this_row.addClass("printed");
      new_state = 0;
    }
  }
  console.log(new_state);
  if (new_state > -1) {
    $.ajax({ 
          url: 'includes/reprint.inc.php', 
          type: 'POST', 
          data: {
            user_id: user_id,
              fdc_id: fdc_id,
              new_state: new_state
           },
          success: function(results){
            if (results == 0) { 
                loadView("myprints");
              }
            else {
              console.log(results);
            }
          }
      });
    }
  event.stopPropagation();
}

function toggleMenuAction (fdc_id) {
  var new_state = 0;
  var this_row = $(".result-row[fdcid="+fdc_id+"] .result-action-menu .row-btn");
  if (this_row.hasClass("row-btn-off")) {
    this_row.removeClass("row-btn-off");
    this_row.addClass("row-btn-on");
    new_state = 1;
    $(".result-row[fdcid="+fdc_id+"]").clone().prependTo("#myfoods-block .page-block-body");
    $("#myfoods-block .page-block-body").animate({ scrollTop: "0" }, 500);
    $("#myfoods-block .page-block-body .result-row[fdcid="+fdc_id+"]").addClass('row-new');
  }
  else {
    this_row.removeClass("row-btn-on");
    this_row.addClass("row-btn-off");
    new_state = 0;

    $("#myfoods-block .page-block-body .result-row[fdcid="+fdc_id+"]").slideUp();
    $("#myfoods-block .page-block-body .result-row[fdcid="+fdc_id+"]").remove();
  }
  new_count = $("#myfoods-block .result-row").length;
  $("#myfoods-block .page-block-summary em").html(new_count);
  $("#myfoods-block .page-block-summary").prependTo("#myfoods-block .page-block-body");
  $.ajax({ 
          url: 'includes/favorite.inc.php', 
          type: 'POST', 
          data: {
            user_id: user_id,
              fdc_id: fdc_id,
              new_state: new_state
           },
          success: function(results){ 
              loadView('myprints');
          }
      });
  event.stopPropagation();
}


function viewImage (url,fdc_id) {
  var description = $(".result-row[fdcid="+fdc_id+"] .result-food-name").html();
  $("#replace-image").attr("onclick","$(\'#image-browse\').attr(\'fdcid\',\'"+fdc_id+"\');$(\'#image-browse\').click();");
  $("#preview-image-overlay .overlay-title").html('<h1>'+description+'</h1>');
  $("#preview-image-overlay .overlay-body").html('<div class="preview-container"><img class="preview-food-image" src="'+url+'" /></div>');
  $("#preview-image-overlay").show();
}

function closeOverlay (id) {
  $("#"+id).hide();
}


function uploadImage () {
  $(".image-error").html("");
  fdc_id = $("#image-browse").attr("fdcid");
  var input = document.querySelector('#image-browse[type=file]');
  var file = input.files[0];
  var form_data = new FormData();
  var timestamp = Date.now();
  var file_extension = file.name.split(".");
  var file_extension_lower = file_extension[1].toLowerCase();
  var filename = user_id+"-"+fdc_id+"-"+timestamp+"."+file_extension_lower;
  if (file_extension_lower != "jpg" && file_extension_lower != "jpeg" && file_extension_lower != "png") {
      $(".image-error").html("<div class='status-msg'>The image file type must be .jpg, .jpeg, or .png.</div>");
  }
  else {
    form_data.append('file', file, filename);
    $("#image-browse").attr("file-name",filename);
    $.ajax({
          url: 'includes/uploadimg.inc.php', 
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'POST',
          success: function(result) {
            if (result == 0) {
              url = 'user_data/uid_'+user_id+'/'+filename;
              $(".result-row[fdcid="+fdc_id+"] button").css("background-image","url("+url+")");
              $(".result-row[fdcid="+fdc_id+"] button").attr("onclick","viewImage('"+url+"','"+fdc_id+"')");
              $(".result-row[fdcid="+fdc_id+"] button").html('');
            }
          }
      });
  }
  event.stopPropagation();
}


function previewPrintPage (page) {
  var cards = [];
  $(".print-row[page="+page+"] .print-row-card").each(function( index ) {
      cards.push($(this).attr("fdcid"));
  });
  $.ajax({ 
        url: 'includes/preview.inc.php', 
        type: 'POST', 
        data: {
         },
        success: function(results){ 
          $("#preview-overlay .overlay-body").html(results);
          createMobilePreview();
          $("#preview-overlay").fadeIn(300);
          $.ajax({ 
              url: 'includes/preview.inc.php', 
              type: 'POST', 
              data: {
                user_id: user_id,
                  cards: cards
               },
              success: function(results){ 
                $("#preview-overlay .overlay-body").html(results);
                createMobilePreview();
                $("#preview-overlay").attr('data-page',page);
              }
          });
        }
    });
  event.stopPropagation();
}

function createMobilePreview () {
  card_w = $(".preview-card-row:eq(0) .preview-card:eq(0)").width();
  card_h = $(".preview-card-row:eq(0) .preview-card:eq(0)").height();
  
  $(".overlay-mobile").html('');
  $(".preview-card-row:eq(0) .preview-card:eq(0)").clone().appendTo(".overlay-mobile");
  $(".overlay-mobile .preview-card").css({ "width": card_w, "height": card_h });
}

function createPage (page,pages) {
  var w = 792;
  var h = 612;
  var div = document.querySelector('#print-page-'+page);
  var canvas = document.createElement('canvas');
  canvas.width = w;
  canvas.height = h;
  canvas.style.width = w + 'px';
  canvas.style.height = h + 'px';
  var context = canvas.getContext('2d');
  context.scale(1,1);
  html2canvas(div, { canvas: canvas, scale: 2 }).then(function(canvas) {
    var doc = new jsPDF('l', 'pt', 'letter', true);
    var width = doc.internal.pageSize.getWidth();    
    var height = doc.internal.pageSize.getHeight();
    doc.addImage(canvas,'PNG',0,0,width,height);
    if (page == pages) {savePDF(doc);}
    else {
      addPDFPage(doc,2,pages);
    }
  });
}

function addPDFPage (doc,page,pages) {
  doc.addPage();
  var w = 792;
  var h = 612;
  var div = document.querySelector('#print-page-'+page);
  var canvas = document.createElement('canvas');
  canvas.width = w;
  canvas.height = h;
  canvas.style.width = w + 'px';
  canvas.style.height = h + 'px';
  var context = canvas.getContext('2d');
  context.scale(1,1);
  html2canvas(div, { canvas: canvas, scale: 1 }).then(function(canvas) {
    var width = doc.internal.pageSize.getWidth();    
    var height = doc.internal.pageSize.getHeight();
    doc.addImage(canvas,'PNG',0,0,width,height);
    if (page == pages) {savePDF(doc);}
    else {
      addPDFPage(doc,page + 1,pages);
    }
  });
}

function savePDF (doc) {
    var pdf = doc.output('blob');
    var data = new FormData();
    var timestamp = Date.now();
    var filename = user_id+"-"+timestamp+".pdf";
    data.append('data', pdf, filename);
    var xhr = new XMLHttpRequest();
    xhr.responseType = 'text';
    xhr.onreadystatechange = function() {
      if (this.readyState == 1) {

      }
      if (this.readyState == 2) {

      }
      if (this.readyState == 3) {

      }
      if (this.readyState == 4) {

        if (this.status !== 200) {
          alert(this.status);
        }
        else {  
          if (xhr.responseText == 0) {
            window.open('http://familiar.royfranke.com/user_data/uid_'+user_id+'/pdf/'+filename);
            recordPrint(filename);
          }
        }
      }
    };
    xhr.open('POST', 'includes/pdf.inc.php', true);
  xhr.send(data);
}

function recordPrint (filename) {
  //TODO: Record print in DB (cycle through fcd_ids and mark them printed)
  var cards = [];
  $(".preview-card").each(function( index ) {
      cards.push($(this).attr("fdcid"));
    });
      $.ajax({ 
          url: 'includes/print.inc.php', 
          type: 'POST', 
          data: {
              user_id: user_id,
              cards: cards
           },
          success: function(results){ 
            if (results == 0) {
              loadView('myprints');
              loadView('myfoods');
              closeOverlay('preview-overlay');
            }
            else {
              console.log(results);
            }
          }
      });
}

function settings (block_id) {
  this_id = block_id.split('-');
  settings_id = this_id[0];
  if ($("#"+block_id+" .page-block-settings").length == 0) {
      $.ajax({ 
          url: 'includes/settings.inc.php', 
          type: 'POST', 
          data: {
              user_id: user_id,
              settings_id: settings_id
           },
          success: function(results){ 

            $("#"+block_id+" .page-block-body").prepend(results);
            $("#"+block_id+" .page-block-body").animate({ scrollTop: "0" }, 500);
            $("#"+block_id+" .page-block-settings").slideDown();
          }
      });
    }
    else {
      $("#"+block_id+" .page-block-settings").slideUp();
      $("#"+block_id+" .page-block-settings").promise().done(function() {
        $("#"+block_id+" .page-block-settings").remove();
      });
    }
  event.stopPropagation();
}

function changeSetting (setting) {
  if ($("#"+setting).is(':checked')) {
    value = 1;
  }
  else {
    value = 0;
  }
  $.ajax({ 
          url: 'includes/setting.inc.php', 
          type: 'POST', 
          data: {
              user_id: user_id,
              setting: setting,
              value: value
           },
          success: function(results){ 
            if (results == 0) {
              
            }
            else {
              console.log(results);
            }
          }
      });
}

function loadSettings () {
  $(".page-block-settings").remove();
  settings_open = closeSettings();
  if (!settings_open) {
  $.ajax({ 
          url: 'includes/profile.inc.php',
          data: {
              user_id: user_id
           },
          type: 'POST', 
          success: function(results){ 
            $(".settings-body").html(results);
            $(".settings-body").slideDown();
            $(".page-body").slideUp();
          }
      });
  }  
}


function updateUser () {
  fields = [];
  missing = [];
  var error_msg = '';
  $( ".settings-body .input-container" ).each(function(index) {
      var value = $(this).find("input").val();
      if (value != '') {
        fields.push(value);
      }
      else {
        var label = $(this).find("label").html();
        missing.push(label);
      }
  });

  if (missing.length > 0) {
    error_msg = 'You are missing: ';
    for (var i = 0;i < missing.length;i++) {
      error_msg += missing[i];
      if (i < missing.length - 2) {
        error_msg += ', ';
      }
      if (i == missing.length - 2) {
        error_msg += ' and ';
      }
    }
    error_msg += '.';
  }
  else {
    submitUserUpdate(fields);
  }
  $(".alert-message").html(error_msg);
}

function unsavedChange () {
  $("#btn-update").prop('disabled',false);
  $("#btn-update").html('Save Changes');
}

function submitUserUpdate(fields) {
  $("#btn-update").prop('disabled',true);
  $.ajax({
      url: "includes/user.inc.php",
      data: {
        user_id:user_id,
        fields: fields
      },
      type: "POST", //request type
      success:function(result){
        if (result == 0) {
          $("#btn-update").html("Saved");
        }
        else {
          $("#btn-update").prop('disabled',false);
          $(".alert-message").html(result);
        }
      }
    });
}
