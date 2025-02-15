scnShortcodeMeta = {
	attributes : [

			{
				label : "Type",
				id : "type",
				help : "Select which type of box you would like to use.",
				controlType : "select-control",
				selectValues : [ 'Default' ,'Circle' ,'Bordered Circle','Square','Bordered Square'],
				defaultValue : 'Circle',
				defaultText : 'Circle'
			},
	
			{
				label : "Background Color",
				id : "bgcolor",
				help : 'Or you can also choose your own color to use as the background for your Dropcap',
				controlType : "color-control"
			},
			{
				label : 'Variation',
				id : 'variation',
				help : 'Choose one of our predefined color skins to use with your Dropcap.',
				controlType : "select-control",
				selectValues : ['','blue','chocolate','coral','cyan','eggplant','electricblue','ferngreen','gold','green','grey','khaki','ocean','orange','palebrown','pink','purple','raspberry','red','skyblue','slateblue'],
				defaultValue : '',
				defaultText : 'Select'
			},
			{
				label : "Text Color",
				id : "textcolor",
				help : 'You can change the color of the text that appears on your Dropcap.',
				controlType : "color-control"
			}],
	defaultContent : "A",
	shortcode : "dt_sc_dropcap"
};