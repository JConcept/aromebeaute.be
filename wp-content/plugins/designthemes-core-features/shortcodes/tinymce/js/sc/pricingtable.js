scnShortcodeMeta = {
	attributes : [ {
		label : "Style",
		id : "type",
		help : "Select which type of pricing table you would like to use.",
		controlType : "select-control",
		selectValues : [ 'type1', 'type2' ],
		defaultValue : 'type1',
		defaultText : 'type1'
	}, {
		label : "Columns",
		id : "content",
		controlType : "column-control"
	} ],
	customMakeShortcode : function(b) {
		var a = b.data, type = b.type;

		chktype = type;
		type = ' type =" '+type+'"';
		
		if (!a)
			return "";
		b = a.numColumns;
		var c = a.content;
		a = [ "0", "one", "two", "three", "four", "five", 'six' ];
		var x = [ "0", "0", "half", "third", "fourth", "fifth", 'sixth' ];
		var f = x[b];
		c = c.split("|");
		var g = "";
		for ( var h in c) {
			var d = jQuery.trim(c[h]);
			if (d.length > 0) {
				var e = a[d.length] + '_' + f;
				if (b == 4 && d.length == 2)
					e = "one_half";

				var z = e;
				var selected = "";
				if (h == 0) {
					e += " first";
					selected = "selected";
				}
				
				if(chktype == "type1"){

				g += "[dt_sc_"
						+ e
						+ "] "
						+ "<br>[dt_sc_pricing_table_item heading='Heading' button_text='Buy Now' button_link='#' price='$15' per='month' "
						+ selected + "]<br>" + "<ul>" + "<li>Text</li>"
						+ "<li>Text</li>" + "<li>Text</li>" + "</ul>"
						+ "[/dt_sc_pricing_table_item]<br>" + " [/dt_sc_" + z
						+ "] <br/>";
				}else if(chktype == "type2"){

					g += "[dt_sc_"
						+ e
						+ "] "
						+ "<br>[dt_sc_pricing_table_item_with_image thumb='http://dummyimage.com/350x200' heading='Heading' button_text='Buy Now' button_link='#' button_size='small' price='$15' per='month' "
						+ selected + "]<br>" + "<ul>" + "<li>Text</li>"
						+ "<li>Text</li>" + "<li>Text</li>" + "</ul>"
						+ "[/dt_sc_pricing_table_item_with_image]<br>" + " [/dt_sc_" + z
						+ "] <br/>";
				}
			}
		}

		return "[dt_sc_pricing_table " + type + "]<br>" + g + "<br>[/dt_sc_pricing_table]";
	}
};