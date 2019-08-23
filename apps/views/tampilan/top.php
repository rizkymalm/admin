<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/styleindex.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/component.css">

<!-- Plugin -->

<style type="text/css">
.content {
	/*margin: auto;*/
	text-align: left; 
	width: 720px; 
}
.clean { 
	border: 1px solid #850000; 
}
.clean td, .clean th{ 
	background: #ddd; 
	padding: 5px 10px; 
	text-align: center; 
	border-radius: 2px; 
	background-color:#FF0000; 
}
.clean table { 
	/*margin: auto;*/
	margin-top: 15px; 
	margin-bottom: 15px; 
}
.clean caption { 
	font-weight: bold; 
	background-color:#FF0000; 
}
.gvChart,.clean { 
	/*border: 2px solid #CCCCCC;*/
	border-radius: 5px; 
	/*margin: auto;*/
	width: 830px; 
	margin-top: 20px; 
}



.radiotype1{
	position: relative;
	padding:10px 24px;
  float: left;
}

.radiotype1 input[type="radio"] {
    display:none;
}
.radiotype1 input[type="radio"] + label {
    cursor: pointer;
}
.radiotype1 input[type="radio"] + label span {
    display:inline-block;
    width:20px;
    height:20px;
    margin:-1px 4px 0 0;
    vertical-align:middle;
    cursor:pointer;
    -moz-border-radius:  50%;
    border-radius:  50%;
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    margin: auto;
}

.radiotype1 input[type="radio"] + label span {
     background-color:#D7DCDE;
}

.radiotype1 input[type="radio"]:checked + label span{
	background-color: transparent;
	background-image: url('<?php echo $base_url; ?>assets/images/icon/list-style-type-1.png');
	width: 25px;
	height: 28px;
	background-size: 100%;
	background-position: bottom;
	background-repeat: no-repeat;
}





.checkboxtype1{
	position: relative;

}

.checkboxtype1 input[type="checkbox"] {
    display:none;
}
.checkboxtype1 input[type="checkbox"] + label {
    cursor: pointer;
}
.checkboxtype1 input[type="checkbox"] + label span {
    display:inline-block;
    width:20px;
    height:20px;
    vertical-align:middle;
    cursor:pointer;
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    margin: auto;
}

.checkboxtype1 input[type="checkbox"] + label span {
     background-color:#ffffff;
     border:1px solid #D7DCDE;
}

.checkboxtype1 input[type="checkbox"]:checked + label span{
	background-color: transparent;
	background-image: url('<?php echo $base_url; ?>assets/images/icon/checkbox-active-1.png');
	width: 20px;
	height: 20px;
	background-size: 100%;
	background-position: center;
	background-repeat: no-repeat;
}



#image-preview {
  width: 400px;
  height: 400px;
  position: relative;
  overflow: hidden;
  color: #ecf0f1;  
  background-repeat: no-repeat;
  background-size: auto 100%;
  background-position: center;
  
}
.curent-image{
  position: relative;
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
  margin: auto;
  width: 100%;
  max-width: 100%;  
}
.curent-image img{
  width: 100%;
}
.uploadpreview_img_input {
    line-height: 200px;
    font-size: 200px;
    position: absolute;
    opacity: 0;
    z-index: 10;
    cursor: pointer;
  }
.uploadpreview_text {
    position: absolute;
    z-index: 5;
    opacity: 0.8;
    cursor: pointer;
    background-color: #bdc3c7;
    width: 200px;
    height: 50px;
    font-size: 20px;
    line-height: 50px;
    text-transform: uppercase;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    text-align: center;
    display: none;
  }
  #image-preview:hover .uploadpreview_text{
  	display: block;
  }


</style>


<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/plugin/fileinput/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/plugin/fileinput/demo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/plugin/fileinput/component.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/jquery-ui.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/plugin/autocomplete/jquery.autocomplete.css">
<link href='<?php echo $base_url; ?>assets/plugin/calendar/core/main.css' rel='stylesheet' />
<link href='<?php echo $base_url; ?>assets/plugin/calendar/daygrid/main.css' rel='stylesheet' />
<link href="<?php echo $base_url; ?>assets/plugin/uploadimage/upload.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $base_url ?>assets/plugin/daterange/daterangepicker.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo $base_url ?>assets/plugin/richeditor/site.css">
<link rel="stylesheet" href="<?php echo $base_url ?>assets/plugin/richeditor/richtext.min.css">
<!-- end of plugin -->

<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/plugin/chart2/morris.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/malms/css/malms.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/malms/css/style_button.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/responsive.css">