jQuery.noConflict();
var mythemeAdmin = {
  init : function(){
    
    //To Show Video in Slider post
    "use strict";
    jQuery("td.slider-image").each(function(){ jQuery(this).find("iframe").attr("height","225"); });
    
    
    mythemeAdmin.adminPanelTab();
    
    mythemeAdmin.adminPanelTooltipHelp();
    
    mythemeAdmin.mediaUpload(); //upload logo ,favicon ...
    
    mythemeAdmin.layoutSelect();
	
	mythemeAdmin.postLayoutSelect();
    
    mythemeAdmin.menuAdd();
	
	mythemeAdmin.widgetAdd();
    
    mythemeAdmin.menuRemove();
    
    mythemeAdmin.menuCancel();
    
    mythemeAdmin.menuEdit();
    
    mythemeAdmin.adminOptionSave(); // when clicking the submit button in the options page , adminOptionSave() will be triggred and it will calls the adminOptionFormSubmit()
    
    mythemeAdmin.adminOptionFormSubmit();
    
    mythemeAdmin.resetConfirm(); //To reset the admin panel saved options
    
    mythemeAdmin.multiDropdown();
    
    mythemeAdmin.colorPicker();
    
    mythemeAdmin.skinChooser();
    
    mythemeAdmin.themeLayoutChooser();
    
    mythemeAdmin.sliderSelection();
    
    mythemeAdmin.fontSelection();
    
    mythemeAdmin.customSwitch();
	
    mythemeAdmin.customFontSwitch();
	
	mythemeAdmin.customTopSectionSwitch();
    
    mythemeAdmin.customUISlider();
    
    mythemeAdmin.backgroundPicker(); // Used in appearance tab at layout section in choosing Background type combo
    
    mythemeAdmin.sliderTypePicker(); // Unsed in Every post page
    
    mythemeAdmin.pageTemplateChooser();
	
	mythemeAdmin.postFormatChooser();
	
    mythemeAdmin.galleryPostFormatUploadImage();
	
	//For Backup Tab in admin Panel
	mythemeAdmin.backupOption();
	mythemeAdmin.restoreOption();
	mythemeAdmin.importOption();
	
	mythemeAdmin.companyTimer();
	
	mythemeAdmin.updatePageBuilderContent();
	
  },// init() End
  
  adminPanelTab : function(){
    "use strict";
   var  $tab = jQuery('#bpanel,#bpanel div.bpanel-content');
    if($tab.length) {
    if( mysiteWpVersion>='3.6') {
      $tab.tabs({ show:500  });
    } else {
      $tab.tabs({ fx: { opacity: 'toggle', duration:'fast' }, selected: 0 });     
    }
    }
  },//adminPanelTab

  adminPanelTooltipHelp: function(){
    "use strict";
    var $item = jQuery("div.bpanel-option-help a");	
    $item.click(function(e){ e.preventDefault(); });
    
    $item.each(function(){
      jQuery(this).live('mouseover',function(){
        var $x1 = -4, $y1 = -138;
        if(jQuery(this).hasClass('a_image_preivew')){
          $x1 = -25,
          $y1 = -150;
        }
        
        jQuery(this).tooltip({
          predelay:0,
          opacity: 0.9,
          effect:'slide',
          direction:'right',
          relative:true,
          tipClass:'bpanel-option-help-tooltip',
          delay: 500,
          offset: [$x1,$y1]
         });
        jQuery(this).tooltip().show();
      });
    });
  },//adminPanelTooltipHelp  
  
  mediaUpload: function(){
    "use strict";
    var fileInput = '',
        $this ='',
        $previewImg ='',
        header_clicked = false,
        icon_clicked = false;
    
    jQuery(".upload_image_reset").live("click",function(e){
      jQuery(this).siblings(".uploadfield").val('');
      var $img = jQuery(this).siblings("div.bpanel-option-help").find('img:last');
      $img.attr('src',$img.attr('data-default'));
      e.preventDefault();
    });
    
    jQuery(".upload_image_button").live("click",function(e){
      var $this = jQuery(this);
      fileInput = jQuery(this).siblings(".uploadfield");
      $previewImg = jQuery(this).siblings("div.bpanel-option-help").find('img:last');
      tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;mytheme_upload_button=1&amp;TB_iframe=true');
      header_clicked = true;
      e.preventDefault();
    });
    
    // Store original function
    window.original_send_to_editor = window.send_to_editor;
    window.original_tb_remove = window.tb_remove;
    
    // Override removing function (resets our boolean)
    window.tb_remove = function() {
      if(header_clicked && mysiteWpVersion>='3.3') {
        deleteUserSetting('uploader');
        jQuery('.media-upload-form').removeClass('html-uploader');
      }
      
      if(icon_clicked){
        jQuery('.icon_preset_button').attr('id', '');
      }
      
      header_clicked = false;
      icon_clicked = false;
      window.original_tb_remove();
    };
    
    // Override send_to_editor function from original script
    // Writes URL into the textbox.
    // Note: If header is not clicked, we use the original function.
    window.send_to_editor = function(html) {
      if (header_clicked) {
        var imgurl = jQuery(html).attr('src');
        fileInput.val(imgurl);
        
        //Show preview image
        if(jQuery($this).hasClass('show_preview')){
          $previewImg.attr('src',imgurl);
        }//Show preview image end
        
        if(mysiteWpVersion>='3.3') {
          deleteUserSetting('uploader');
          jQuery('.media-upload-form').removeClass('html-uploader');
        }
        tb_remove();
        
      }else{
        window.original_send_to_editor(html);
      }
    };
      
        
  },//mediaUpload


    layoutSelect : function(){
    jQuery("#page-layout").find("a").click(function(e){
      var $parent = jQuery(this).parents(".bpanel-layout-set"),
      $input = $parent.next(":input");

      if( jQuery(this).hasClass("selected") ) {
          jQuery(this).removeClass("selected");
          $input.val('');
      } else{
          $parent.find("a.selected").removeClass("selected");
          $input.val(jQuery(this).attr("rel"));
          jQuery("#page-layout").find("a.selected").removeClass("selected");
          jQuery(this).addClass("selected");
      }

      var $container = jQuery(".sidebar-section");
      var $section = jQuery("#widget-area-options");
      if( $container.length ) {
        if( jQuery(this).attr("rel") == "content-full-width") {
          $container.slideUp();
          $section.slideUp();
        }else{
          $container.slideDown();
          $section.slideDown();
        }
      }
      e.preventDefault();
    });
  },


   postLayoutSelect: function(){
   jQuery(".bpanel-post-layout").each(function(){
      jQuery(this).find("a").click(function(e){
        var $parent = jQuery(this).parents(".bpanel-layout-set"),
            $input = $parent.next(":input");
        if( jQuery(this).hasClass("selected") ) {
          jQuery(this).removeClass("selected");
          $input.val('');
        } else{
          $parent.find("a.selected").removeClass("selected");
          $input.val(jQuery(this).attr("rel"));
          jQuery(this).addClass("selected");
        }

        if( jQuery(this).parents(".bpanel-option-set").next(".widgetarea-section").length ) {
          if( jQuery(this).attr("rel") == "content-full-width"){
            jQuery(this).parents(".bpanel-option-set").next(".widgetarea-section").slideUp();
          }else{
            jQuery(this).parents(".bpanel-option-set").next(".widgetarea-section").slideDown();
          }
        }
        e.preventDefault();
      });
    });
  },
 
  widgetAdd: function(){
   jQuery('.mytheme_add_widgetarea').click(function(e){
     var $this = jQuery(this).parent().next(),
     $widgetfor = jQuery(this).data('for'),
     $appendTo = $this.find('.added-menu'),
     $itemToClone = $this.find('.sample-to-edit li'),
     $item = $appendTo.find('li'),
     $itemsCount = $item.length,
     $allIds = []; //$allIds = new Array();
     
     $item.each(function(){
       if(jQuery(this).attr('id')){
         var $itemId = jQuery(this).attr('id').match(/\d+/g);
         if($itemId){
           $allIds.push(parseInt($itemId,10));
         }
       }
     }); //end each
  
        var $newID = (jQuery($appendTo).css('display') === 'none' )? $itemsCount : $itemsCount+1;
        while (jQuery.inArray($newID, $allIds) !== -1 ) {
          $newID++;
        }
      
      var $newClone = $itemToClone.clone().attr('id',"widgetarea-"+$newID);
        $newClone.find(".social-link").attr('name',"mytheme[widgetarea]["+$widgetfor+"][]");
        $newClone.find(".item-title").text("Widget Area "+ $newID);
      
      var $newAppend = jQuery($appendTo).append(function(index,html){
        return $newClone;
      });
      e.preventDefault();
     
   });
  }, //widgetAdd

  
  menuAdd : function(){
    "use strict";
    jQuery('.mytheme_add_item').click(function(e){
      var $this = jQuery(this).parent().next(),
          $appendTo = $this.find('.menu-to-edit'),
          $itemToClone = $this.find('.sample-to-edit li'),
          $item = $appendTo.find('li'),
          $itemsCount = $item.length,
          $allIds = []; //$allIds = new Array();
      
      $item.each(function(){
        if(jQuery(this).attr('id')){
          var $itemId = jQuery(this).attr('id').match(/\d+/g);
          if($itemId){
            $allIds.push(parseInt($itemId,10));
          }
        }
      }); //end each
      
      var $newID = (jQuery($appendTo).css('display') === 'none' )? $itemsCount : $itemsCount+1;
      while (jQuery.inArray($newID, $allIds) !== -1 ) {
        $newID++;
      }
      
      var $newClone = $itemToClone.clone().attr('id',"social-"+$newID);
      $newClone.find(".social-select").attr('name',"mytheme[social][social-"+$newID+"][icon]");
      $newClone.find(".upload_image_button").attr('name',"mytheme[social][social-"+$newID+"][custom-image]");
      $newClone.find(".social-link").attr('name',"mytheme[social][social-"+$newID+"][link]");
      $newClone.find(".item-title").text("Sociable "+ $newID);
      
      var $newAppend = jQuery($appendTo).append(function(index,html){
        return $newClone;
      });
      e.preventDefault();
    });
    jQuery('.mytheme_add_group_item').click(function(e){
      var $this = jQuery(this).parent().next(),
          $appendTo = $this.find('.menu-to-edit'),
          $itemToClone = $this.find('.sample-to-edit li'),
          $item = $appendTo.find('li'),
          $itemsCount = $item.length,
          $allIds = []; //$allIds = new Array();
      
      $item.each(function(){
        if(jQuery(this).attr('id')){
          var $itemId = jQuery(this).attr('id').match(/\d+/g);
          if($itemId){
            $allIds.push(parseInt($itemId,10));
          }
        }
      }); //end each

      var $newID = (jQuery($appendTo).css('display') === 'none' )? $itemsCount : $itemsCount+1;
      while (jQuery.inArray($newID, $allIds) !== -1 ) {
        $newID++;
      }

      var $newClone = $itemToClone.clone().attr('id',"button-"+$newID);
      $newClone.find(".button-label").attr('name',"mytheme[privacy-bar][button-"+$newID+"][label]");
      $newClone.find(".button-select").attr('name',"mytheme[privacy-bar][button-"+$newID+"][action]");
    $newClone.find(".button-link").attr('name',"mytheme[privacy-bar][button-"+$newID+"][link]");
      $newClone.find(".item-title").text("Button "+ $newID);

      var $newAppend = jQuery($appendTo).append(function(index,html){
        return $newClone;
      });
      e.preventDefault();
    });

    jQuery('.mytheme_add_tab_item').click(function(e){
      var $this = jQuery(this).parent().next(),
          $appendTo = $this.find('.menu-to-edit'),
          $itemToClone = $this.find('.sample-to-edit li'),
          $item = $appendTo.find('li'),
          $itemsCount = $item.length,
          $allIds = []; //$allIds = new Array();
      
      $item.each(function(){
        if(jQuery(this).attr('id')){
          var $itemId = jQuery(this).attr('id').match(/\d+/g);
          if($itemId){
            $allIds.push(parseInt($itemId,10));
          }
        }
      }); //end each

      var $newID = (jQuery($appendTo).css('display') === 'none' )? $itemsCount : $itemsCount+1;
      while (jQuery.inArray($newID, $allIds) !== -1 ) {
        $newID++;
      }

      var $newClone = $itemToClone.clone().attr('id',"tab-"+$newID);
      $newClone.find(".tab-label").attr('name',"mytheme[privacy-model][tab-"+$newID+"][label]");
    $newClone.find(".tab-content").attr('name',"mytheme[privacy-model][tab-"+$newID+"][content]");
      $newClone.find(".item-title").text("Tab "+ $newID);

      var $newAppend = jQuery($appendTo).append(function(index,html){
        return $newClone;
      });
      e.preventDefault();
    });
  },//menuAdd  

  menuRemove: function(){
    "use strict";
    jQuery(".remove-item").live('click',function(e){
      var $this = jQuery(this).parent().parent().parent();
      $this.addClass('deleting').animate({opacity : 0,height: 0},350,function(){ $this.remove();});
      e.preventDefault();
    });
  },//menuRemove

  menuCancel: function(){
    "use strict";
    jQuery(".cancel-item").live( 'click', function(e) {
      jQuery(this).parents('.item-content').slideToggle('fast');
      e.preventDefault();
    });
  }, //menuCancel
  
  menuEdit: function(){
    "use strict";
    jQuery(".item-edit").live( 'click', function(e) {
      jQuery(this).parents('.item-bar').next(".item-content").slideToggle('fast');
      e.preventDefault();
    });
  },//menuEdit

  menuSort: function(){
    "use strict";
    jQuery(".menu-to-edit").sortable({placeholder: 'sortable-placeholder'});
  },//menuSort
  
  adminOptionSave: function(){
    "use strict";
    jQuery('.mytheme-footer-submit').click(function(e){
	  jQuery('form#mytheme_options_form').submit();
      e.preventDefault();
    });
  },//adminOptionSave

  adminOptionFormSubmit: function(){
    "use strict";
    jQuery('form#mytheme_options_form').submit(function(e){
    	
    	jQuery(".mytheme-footer-submit").val(objectL10n.saving).addClass("mytheme-footer-saving");
    	if(jQuery('#mytheme-full-submit').val() === '1'){
    		return true;
    	} else {
    		var formData = jQuery(this),
    			optionSave = jQuery("<input>", { type: "text", name:"mytheme-option-save", val: true }),
    			postData = formData.add(optionSave).serialize();
    		
    	        mythemeAdmin.ajaxSubmit(postData);
    	}
    	      e.preventDefault();
    });
  },//adminOptionFormSubmit

  ajaxSubmit: function(postData){
    "use strict";
    jQuery.ajax({
      type: 'POST',
      dataType: 'json',
      data: postData,
      beforeSend: function(x) {
        if(x && x.overrideMimeType) { x.overrideMimeType('application/json;charset=UTF-8'); }
      },
      success: function(data) {
        mythemeAdmin.processJSON(data);
      }
    });
  },//ajaxSubmit
  
  processJSON: function(data){
    "use strict";
    var popup = jQuery('#bpanel-message');
	popup.empty().removeClass("warning").addClass("success");
	popup.append(data.message);
	  
	popup.fadeIn();
	
	window.setTimeout(function(){ 
		popup.fadeOut('slow');
		jQuery(".mytheme-footer-submit").val(objectL10n.saveall).removeClass("mytheme-footer-saving");
	}, 2000);
	
	
    
  }, //processJSON
  
  multiDropdown : function(){
    "use strict";
    var dropdown_container = jQuery('.multidropdown');
    
    dropdown_container.each(function(){
      
      var current_dropdown_wrapper = jQuery(this),
          combo = jQuery(this).find('.multidropdown');
      combo.each(function(){
        jQuery(this).unbind('change').bind('change',function(){
          
          if(jQuery(this).val()){
            if(!(jQuery(this).hasClass("donot_multiply"))){
              jQuery(this).parent().after(jQuery(this).parent().clone());
              jQuery(this).addClass('donot_multiply');
            }
          }else{
            jQuery(this).remove();
          }
           mythemeAdmin.multiDropdown();
        }); //change end
		
      }); //combo each
      
    });//dropdown_container
  },//multiDropdown
  
  colorPicker: function(){
    "use strict";
	if(parseFloat(mysiteWpVersion) >= parseFloat("3.5")){
		jQuery('.dt-color-field').each(function(){
			jQuery(this).wpColorPicker();
		});
	}else{
		jQuery(".color_picker").each(function(){
			var $a = jQuery(this).prev('.color_picker_element');
			jQuery(this).farbtastic($a);
		});
    }
  }, //colorPicker
  
  resetConfirm : function (){
    "use strict";
    jQuery('.mytheme-reset-button').click(function(e){
    	e.preventDefault();
      if(confirm(objectL10n.resetConfirm)){
    	  
    	  var data =  { action : 'dttheme_backup_and_restore_action', type:'reset_options'};
    	  jQuery.post(ajaxurl, data,function(response){
    		  if( response === "1" ) {
    			  window.location.reload();
    		  }
    	  });
    	  
      }
    });
  }, //resetConfirm
 
  skinChooser: function(){
    "use strict";
    if(jQuery("ul#j-available-themes li").length > 0){
		
      var $current_theme_container = jQuery("#j-current-theme-container");
      jQuery('body').delegate("ul#j-available-themes li","click",function(){
        var $this_li = jQuery(this),
            attachment_theme = $this_li.attr('data-attachment-theme');
        //$current_theme_container.attr('dummy-content',attachment_theme+'-dummy'); //- used to select dummy content based on skin / theme
        jQuery("ul#j-available-themes li").removeClass('active');
        $this_li.addClass('active');
        var $clone_li = $this_li.clone().append('<input type="hidden" name="mytheme[appearance][skin]" value="' + attachment_theme + '" />');
        $current_theme_container.empty();
        $current_theme_container.append($clone_li);
      });
    }
  }, //skinChooser
  
  themeLayoutChooser:function(){
    "use strict";
    jQuery("li.themelayout").each(function(){
      jQuery(this).find("a").click(function(e){
        var $layout = jQuery(this).attr("rel");
        if($layout === "boxed"){
          jQuery("div#"+$layout).css({'display':'block'});
        }else{
          jQuery("div#boxed").css({'display':'none'});
        }
        e.preventDefault();
      });
    });
  },//themeLayoutChooser
  
  
  
  sliderSelection: function(){
    "use strict";
    var $no_sliders_container = jQuery('#j-no-images-container'),
        $pagination_link  = jQuery('div#j-slider-pagination a'),
        $used_sliders_container = jQuery('#j-used-sliders-containers'),
        $available_sliders_container = jQuery('#j-available-sliders');
    
    if(jQuery("ul#j-available-sliders li").length > 0){
      
      jQuery('body').delegate("ul#j-available-sliders li","click",function(){
        var $this_li = jQuery(this),
            attachment_id;
        if ( $this_li.hasClass('my_added') ) { return; }
        $this_li.addClass('my_added');
        attachment_id = $this_li.attr('data-attachment-id');
        var $clone_li = $this_li.clone().removeClass("my_added").append('<input type="hidden" name="sliders[]" value="' + attachment_id + '" />');
        $used_sliders_container.append($clone_li);
        if ( $no_sliders_container.is(':visible') ) { $no_sliders_container.hide(); }
        
      });
    }
    
    //Delete button click function
    jQuery('body').delegate('span.my_delete','click', function(){
      var $this = jQuery(this),
          attachment_id = $this.parent('li').attr('data-attachment-id');
      $available_sliders_container.find('li[data-attachment-id="'+attachment_id+'"]').removeClass('my_added');
      $this.parent('li').remove();
      if ( ! $used_sliders_container.find('li').length ) { $no_sliders_container.show(); }
    });
    
    //Sorting Sliders
    if($used_sliders_container.find('li').length){ $no_sliders_container.hide();}
    $used_sliders_container.sortable({placeholder: 'sortable-placeholder',forcePlaceholderSize: true,cancel: '.my_delete, input, textarea, label'});
    
    //Pagination
    if(jQuery('#j-slider-pagination').length > 0 ) {
      jQuery('#j-slider-pagination').each(function(){
        var container = jQuery(this),
            links = container.find("a"),
            $action  = container.hasClass('j-for-portfolio') ? 'show_media_images' : 'show_slider_page';
        
        links.bind('click',function(){
          var link = jQuery(this),
              link_value = link.text();
          if( link.hasClass("active_page")) { return false; }
          
          jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data:{action : $action,page: link_value},
            success: function(data){
              link.addClass('active_page').siblings().removeClass();
              $available_sliders_container.html(data);
              
              $available_sliders_container.find('li').each(function(){
                var $this = jQuery(this),
                    attachment_id = $this.attr('data-attachment-id');
                if ( $used_sliders_container.find('li[data-attachment-id="' + attachment_id + '"]').length ) { $this.addClass('my_added'); }
                
              });//Each End
            }
          }); //Ajax End
          
          return false;
          
        }); //links click end
       
      });//each end
      
    }//Pagination endid
    
  },//sliderSelection
  
  fontSelection : function(){
    "use strict";
    jQuery("select.mytheme-font-family-selector").change(function(){
      var $font = jQuery(this).val(),
          $sample_txt_container =  jQuery(this).parent().find("div.mytheme-font-preview");
      if($font !== ""){
        jQuery.post(ajaxurl,{action:'dttheme_font_url',font:$font},
        function(data){
          if(data){
            jQuery('head').append('<link rel="stylesheet" type="text/css" href="' + data.url + '" >');
            $sample_txt_container.css('font-family',$font);	
          }//endif
        },'json');
      }
    });// Change() End 
    jQuery("select.mytheme-font-family-selector").each(function(){  jQuery(this).triggerHandler("change"); });
  },//fontSelection

  customSwitch: function(){
    "use strict";
    jQuery("div.checkbox-switch").each(function(){
      jQuery(this).click(function(){
		  var $ele = '#'+jQuery(this).attr("data-for");
		  jQuery(this).toggleClass('checkbox-switch-off checkbox-switch-on');
		  if(jQuery(this).hasClass('checkbox-switch-on')){
			  if(jQuery(this).attr("data-for") === "mytheme-global-import-disable") {  jQuery("a.mytheme-import-button").addClass("import-disabled"); }
			  jQuery($ele).attr("checked","checked");
		  }else{
    	      if(jQuery(this).attr("data-for") === "mytheme-global-import-disable") { jQuery("a.mytheme-import-button").removeClass("import-disabled"); }
	          jQuery($ele).removeAttr("checked");
          }
      });//click end
    }); //switch end
  },//customSwitch
  
  customFontSwitch: function(){
	  "use strict";
	  jQuery("div.font-switcher").each(function(){
		  jQuery(this).click(function(){
			  var $ele = '#'+jQuery(this).attr("data-for");
			  jQuery(this).toggleClass('font-checkbox-switch-off font-checkbox-switch-on');
			  if( jQuery(this).hasClass('font-checkbox-switch-on')){
			 	  jQuery($ele).attr("checked","checked");
				  jQuery(this).parents(".font-container").find("div.standard-font").slideDown();
				  jQuery(this).parents(".font-container").find("div.google-font").slideUp();
			  }else{
	          	  jQuery($ele).removeAttr("checked");
				  jQuery(this).parents(".font-container").find("div.google-font").slideDown();
				  jQuery(this).parents(".font-container").find("div.standard-font").slideUp();
			  }
		  });
	  });
  },
  
  
  customTopSectionSwitch: function(){
	  jQuery("div.top-section-switcher").each(function(){
		  jQuery(this).click(function(){
			  jQuery(this).toggleClass('top-section-checkbox-switch-off top-section-checkbox-switch-on');
			  if( jQuery(this).hasClass('top-section-checkbox-switch-on')){
				  jQuery(this).parents(".box-content").find("div.top-section-slider").slideDown();
				  jQuery(this).parents(".box-content").find("div.top-section-page").slideUp();
			  }else{
				  jQuery(this).parents(".box-content").find("div.top-section-page").slideDown();
				  jQuery(this).parents(".box-content").find("div.top-section-slider").slideUp();
			  }
		  });
	  });
  },

  customUISlider: function(){
    "use strict";
    jQuery("div.mytheme-slider").each(function(){
		
      var bar_id = jQuery(this).attr('id'),
          px = jQuery(this).attr('data-for'),
          min_val = 0,
          max_val = 1,
          val = 0.1;
      
      if(px === "px"){
        min_val = 0;
        max_val = 100;
        val = 1;
      }
      
      var init_val = jQuery(this).siblings('input[name="' + bar_id + '"]').attr('value');
      
      jQuery(this).slider({
        min:min_val,
        max:max_val,
        step:val,
        value: init_val,
        slide: function(event, ui){
          jQuery(this).siblings('input[name="' + bar_id + '"]').attr('value',ui.value);
          jQuery(this).siblings('.mytheme-slider-txt').html(ui.value +' '+px);
        }
      });//SLider End
      
    }); // mytheme-slider end
  }, //customUISlider
  
  backgroundPicker: function(){
    "use strict";
    jQuery("select.bg-type").change(function(){
      if(jQuery(this).val() === "bg-patterns"){
        jQuery(this).parents('div.bpanel-option-set').siblings(".bg-pattern").slideDown();
        jQuery(this).parents('div.bpanel-option-set').siblings(".bg-custom").slideUp();
      }else if(jQuery(this).val() === "bg-custom"){
        jQuery(this).parents('div.bpanel-option-set').siblings(".bg-pattern").slideUp();
        jQuery(this).parents('div.bpanel-option-set').siblings(".bg-custom").slideDown();
      }else{
        jQuery(this).parents('div.bpanel-option-set').siblings(".bg-custom").slideUp();
        jQuery(this).parents('div.bpanel-option-set').siblings(".bg-pattern").slideUp();
      }
    });//change End
  }, //backgroundPicker

  sliderTypePicker: function(){
    "use strict";
    jQuery("select.slider-type").change(function(){
      var $val  = jQuery(this).val(),
          //$parent = jQuery(this).parents("div.inside").find("div#slider-conainer");
		  $parent = jQuery("div#slider-conainer");
      
      switch ($val){
          case 'layerslider':
          case 'revolutionslider':
		  case 'imageonly':
          jQuery($parent).find("> div:not(#"+$val+")").slideUp();
          $parent.find("#"+$val).slideDown();
		  jQuery("#specialshortcodes").slideDown();
          break;
            
          default:
          jQuery($parent).find("> div").slideUp();
		  jQuery("#specialshortcodes").slideUp();
          break;
          
      }//End Switch
      
    });//Change End
  }, //sliderTypePicker

  pageTemplateChooser: function(){
    "use strict";
    var $ptemplate_select = jQuery('select#page_template'),
        $ptemplate_box = jQuery('#page-template-meta-container');
    if( $ptemplate_select.length ) {
		$ptemplate_select.live('change', function(){
			var $val = jQuery(this).val();
			$ptemplate_box.find('.j-pagetemplate-container > div').slideUp();
			
			switch($val){
				case 'tpl-blog.php':
					$ptemplate_box.find('span:first').text('Blog Options');
					$ptemplate_box.slideDown();
					$ptemplate_box.find('#tpl-common-settings').slideDown();
					$ptemplate_box.find('#tpl-blog').slideDown();
					
					$ptemplate_box.find('#tpl-contact-settings').slideUp();
					$ptemplate_box.find('#custom-style-settings').slideUp();
					jQuery("#page-template-slider-meta-container").slideUp();
				break;
				
				case 'tpl-catalog.php':
					$ptemplate_box.find('span:first').text('Catalog page Options');
					$ptemplate_box.slideDown();
					$ptemplate_box.find('#tpl-common-settings').slideDown();
					$ptemplate_box.find('#tpl-catalog').slideDown();
					
					$ptemplate_box.find('#custom-style-settings').slideUp();
					jQuery("#page-template-slider-meta-container").slideUp();
				break;
				
				case 'tpl-portfolio.php':
				
					$ptemplate_box.find('span:first').text('Portfolio Options');
					$ptemplate_box.slideDown();
					$ptemplate_box.find('#tpl-common-settings').slideDown();
					$ptemplate_box.find('#tpl-portfolio').slideDown();
					
					$ptemplate_box.find('#custom-style-settings').slideUp();
					jQuery("#page-template-slider-meta-container").slideUp();
					
				break;
				
				case 'tpl-fullwidth.php':
					$ptemplate_box.find('span:first').text('Full Width page Options');
					$ptemplate_box.slideDown();
					$ptemplate_box.find('#tpl-common-settings').slideDown();
					$ptemplate_box.find('#page-layout').slideUp();
					$ptemplate_box.find('#widget-area-options').slideUp();
					$ptemplate_box.find('#tpl-default-settings').slideDown();
		  
					$ptemplate_box.find('#custom-style-settings').slideDown();
					jQuery("#page-template-slider-meta-container").slideDown();
				break;
				
				case 'tpl-blank.php':
					jQuery("#page-template-slider-meta-container").slideUp();
					$ptemplate_box.slideUp();
				break;
				
				default:
					$ptemplate_box.find('span:first').text('Default page Options');
					$ptemplate_box.slideDown();
					$ptemplate_box.find('#tpl-common-settings').slideDown();
					$ptemplate_box.find('#tpl-default-settings').slideDown();
					$ptemplate_box.find('#custom-style-settings').slideDown();
					$ptemplate_box.find('#page-layout').slideDown();
					$ptemplate_box.find('#widget-area-options').slideDown();
					jQuery("#page-template-slider-meta-container").slideDown();
				break;
			}//End Switch
		});//change end
		$ptemplate_select.trigger('change');
	} else {
      jQuery("#page-template-slider-meta-container").slideUp();
      jQuery("#page-template-meta-container").slideUp();
    }
  }, //pageTemplateChooser
  
  postFormatChooser: function(){
    $ptemplate_box = jQuery('#post-format-meta-container');
    $ptemplate_box.hide();

    jQuery("input[name='post_format']").change(function() {
      var selectedElt = jQuery("input[name='post_format']:checked").val();
      switch( selectedElt ){
        case 'gallery':
          $ptemplate_box.show();
          $ptemplate_box.find("#dt-post-format-gallery").slideDown();
          $ptemplate_box.find("#dt-post-format-video-audio").slideUp();
        break;

        case 'video':
        case 'audio':
          $ptemplate_box.show();
          $ptemplate_box.find("#dt-post-format-gallery").slideUp();
          $ptemplate_box.find("#dt-post-format-video-audio").slideDown();
        break;
        
        default:
          $ptemplate_box.hide();
        break;

      }
    });
   jQuery("input[name='post_format']").trigger('change');
  },

  galleryPostFormatUploadImage: function(){
    var file_frame = "";
    jQuery(".dt-open-media-for-gallery-post").live('click',function( e ){
      e.preventDefault();

      // If the media frame already exists, reopen it.
        if ( file_frame ) {
          file_frame.open();
          return;
        }

        file_frame = wp.media.frames.file_frame = wp.media({
          multiple: true,
          title : "Upload / Select Media",
          button :{ text : "Insert Image" }
        });

        file_frame.on( 'select', function() {
          var attachments = file_frame.state().get('selection').toJSON();
          var holder = "";

          jQuery.each( attachments,function(key,value){
            var full = value.sizes.full.url,
            thumbnail =  value.sizes.thumbnail.url,
            name = value.name;

            holder += "<li>" +
            "<img src='"+thumbnail+"'/>" +
            "<span class='dt-image-name' >"+name+"</span>" +
            "<input type='hidden' class='dt-image-name' name='items_name[]' value='"+name+"' />" +
            "<input type='hidden' name='items[]' value='"+full+"' />" +
            "<input type='hidden' name='items_thumbnail[]' value='"+thumbnail+"' />" +
            "<span class='my_delete'></span>" +
            "</li>";
          });
          jQuery("ul.dt-items-holder").append(holder);
        });

        file_frame.open();

    });

    jQuery('ul.dt-items-holder').sortable({
      placeholder: 'sortable-placeholder',
      forcePlaceholderSize: true,
      cancel: '.my_delete, input, textarea, label'
    });

    jQuery('body').delegate('span.my_delete','click', function(){
      jQuery(this).parent('li').remove();
    });
  },

  backupOption: function(){
	  jQuery("a#mytheme_backup_button").click(function(e){
		  var ans = confirm(objectL10n.backupMsg);
		  if( ans ){
			  
			 var data =  { action : 'dttheme_backup_and_restore_action', type:'backup_options'};
			 jQuery('#ajax-feedback').css({display:'block'});
			 
			 jQuery.post(ajaxurl, data,
			  function(response) {
				  var text = objectL10n.backupSuccess;
					  if( response === "1" ) {
					 	jQuery('#bpanel-message').empty().removeAttr('class').addClass('success');	
				 	  } else {
					 	jQuery('#bpanel-message').empty().removeAttr('class').addClass('error-msg');
					 	text = objectL10n.backupFailure;
				 	  }
					  
					  var popup = jQuery('#bpanel-message');
					  popup.append(text);
					  
					  popup.fadeIn();
					  window.setTimeout(function(){ 
						popup.fadeOut("slow",function(){
							jQuery('#ajax-feedback').fadeOut();
							location.reload();	
						});
					  }, 2000);

			 });
		  }
		 e.preventDefault(); 
	  });
  },//backupOption
  
  restoreOption : function(){
	  jQuery("a#mytheme_restore_button").click(function(e){
		  var ans = confirm(objectL10n.restoreMsg);
		  if( ans ){
			  var data =  { action : 'dttheme_backup_and_restore_action', type:'restore_options'};

			 jQuery.post(ajaxurl, data,
			  function(response) {
				  var text = objectL10n.restoreSuccess,
				  	  bodyelem;
					  if( response === "1" ) {
					 	jQuery('#bpanel-message').empty().removeAttr('class').addClass('success');	
				 	  } else {
					 	jQuery('#bpanel-message').empty().removeAttr('class').addClass('error-msg');
					 	text = objectL10n.restoreFailure;
				 	  }
					  
					  var popup = jQuery('#bpanel-message');
					  popup.append(text);
					  
					  popup.fadeIn();
					  window.setTimeout(function(){ 
						popup.fadeOut("slow",function(){
							location.reload();	
						});
					  }, 2000);
					  
					  
			 });
			  
		  }//END IF()
		  e.preventDefault();
	  });
  }, //restoreOption
  
  importOption : function() {
	  jQuery("a#mytheme_import_button").click(function(e){
		  var ans = confirm(objectL10n.importMsg);
		  if( ans ){
			  var data =  { action : 'dttheme_backup_and_restore_action', type:'import_options', data : jQuery("#export_data").val()};
			  jQuery('#ajax-feedback').css({display:'block'});

			 jQuery.post(ajaxurl, data,
			  function(response) {
				  var text = objectL10n.importSuccess,
				  	  bodyelem;
					  if( response === "1" ) {
					 	jQuery('#bpanel-message').empty().removeAttr('class').addClass('success');	
				 	  } else {
					 	jQuery('#bpanel-message').empty().removeAttr('class').addClass('error-msg');
					 	text = objectL10n.importFailure;
				 	  }
					  
					var popup = jQuery('#bpanel-message');
					  popup.append(text);
					  popup.fadeIn();
					  window.setTimeout(function(){ 
						popup.fadeOut("slow",function(){
							jQuery('#ajax-feedback').fadeOut();
							location.reload();	
						});
					  }, 2000);

			 });
			  
		  }//END IF()
		  e.preventDefault();
	  });
  }, //importOption()
  
  
  updatePageBuilderContent: function(){
    "use strict";
	
	jQuery(".dt_update_pagebuilder_contents").on("click", function(e){
		
		if(!jQuery(this).hasClass('disabled')) {
				
			jQuery.ajax({
				type:"POST",
				url:ajaxurl,
				data:{action:'dttheme_update_pagebuilder_contents'},
				beforeSend: function(){ jQuery('#ajax-feedback').css({display:'block'}); },
				error: function() { },
				complete: function(response){
					
					if(response.responseText == 1) {
						jQuery('.dt_update_pagebuilder_contents').addClass('disabled');
					}
					
					var text = objectL10n.pageBuilderUpdate;
					
					var popup = jQuery('#bpanel-message');
					popup.append(text);
					popup.fadeIn();
					window.setTimeout(function(){ 
						popup.fadeOut("slow",function(){
							jQuery('#ajax-feedback').fadeOut();
						});
					}, 3000);
					
				}
			});
			
		} else {
		
			var popup = jQuery('#bpanel-message');
			popup.append(objectL10n.pageBuilderUpdateAlready);
			popup.fadeIn();
			window.setTimeout(function(){ 
				popup.fadeOut("slow");
			}, 3000);
			
		}
	
	});
	
  },//updatePageBuilderContent

  companyTimer: function(){
	jQuery('.select_start').on('change', function(){
		var $row = jQuery(this).parent(),
		$start_select = jQuery(this),
		$end_select = jQuery('.select_end', $row);

		if( $start_select.val() ){
			$end_select.show();
			jQuery('span', $row).show();
		}else{
			$end_select.hide();
			jQuery('span', $row).hide();
			$start_select.find('option[selected="selected"]').removeAttr('selected');
			$end_select.find('option[selected="selected"]').removeAttr('selected');
		}

        jQuery('span > option', $end_select).each(function () {
            jQuery(this).unwrap();
        });

		var start_time = $start_select.val();
		$current = $end_select.data('current');

		jQuery('option', $end_select).each(function(){
			if (jQuery(this).val() <= start_time) {
				jQuery(this).wrap("<span>").parent().hide();
			} else if( !$current ){
				jQuery('option:visible:first', $end_select).attr('selected', 'selected');
			}
		});
	}).each(function(){
		var $row = jQuery(this).parent(),
		$start_select = jQuery(this),
		$end_select = jQuery('.select_end', $row);

		if( !jQuery(this).val() ){
			$end_select.hide();
			$start_select.find('option[selected="selected"]').removeAttr('selected');
			$end_select.find('option[selected="selected"]').removeAttr('selected');
			jQuery('span', $row).hide();
		}
	}).trigger('change');
  }, //Company Timer	  
}; // mythemeAdmin End

jQuery(document).ready(function($){
	
  "use strict";
  $.fn.center = function () {
	  this.animate({"top":( $(window).height() - this.height() - 200 ) / 2+$(window).scrollTop() + "px"},100);
	  this.css("left", 250 );
	  return this;
  };
  
  $(window).scroll(function() {
	  $("div#bpanel-message").center();
  });
  
  mythemeAdmin.init();
  
  jQuery("#add-video").click(function(){
    var url = prompt("Please enter video url","http://vimeo.com/18439821");
    if(url!== null){
      var $no_sliders_container = jQuery('#j-no-images-container'),
      $slider_container = jQuery("#j-used-sliders-containers");
      if ( $no_sliders_container.is(':visible') ) {
        $no_sliders_container.hide();
      }
      $slider_container.append($("span#clone_me").html()).append('<input type="hidden" name="sliders[]" value="' + url + '" />');
    }
  });
  
  // Show/Hide hover types and 1column when select Gallery shapes opts starts
  var gallery_hover = jQuery("#mytheme-gallery-post-design-type").val();
  if( gallery_hover == 'default'){
	  jQuery("#gallery_hover_types").show();
	  jQuery("#single_post_per_row").show();
  }else{
	  jQuery("#gallery_hover_types").hide();
	  jQuery("#single_post_per_row").hide();
  }
  
  jQuery("#mytheme-gallery-post-design-type").change(function(){
	  var gallery_hover_types = $(this).val();
	  if( gallery_hover_types == 'default'){
		  jQuery("#gallery_hover_types").show();
		  jQuery("#single_post_per_row").show();
	  }else{
		  jQuery("#single_post_per_row").hide();
		  jQuery("#gallery_hover_types").hide();
	  }
  });
  // Show/Hide hover types and 1column when select Gallery shapes opts ends
});