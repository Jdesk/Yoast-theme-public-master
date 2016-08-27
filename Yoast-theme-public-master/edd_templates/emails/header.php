<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
	<title>Yoast</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body{
			font:14px/20px 'Helvetica', Arial, sans-serif;
			margin:0;
			padding:75px 0 0 0;
			text-align:center;
			-webkit-text-size-adjust:none;
			background-color:#395C8A;
		}
		p{
			padding:0 0 5px 0;
		}
		h1 img{
			max-width:100%;
			height:auto !important;
			vertical-align:bottom;
		}
		h2{
			font-size:22px;
			line-height:28px;
			margin:0 0 12px 0;
		}
		h3{
			margin:0 0 12px 0;
		}
		.headerBar{
			background:none;
			padding:20px;
			border:none;
			background-color:#D5CDAE;
			border-bottom:0px solid #000000;
		}
		.wrapper{
			width:600px;
			margin:0 auto 10px auto;
			text-align:left;
		}
		input.button{
			border:none !important;
		}
		.button{
			display:inline-block;
			font-weight:500;
			font-size:16px;
			line-height:42px;
			font-family:'Helvetica', Arial, sans-serif;
			width:auto;
			white-space:nowrap;
			height:42px;
			margin:12px 5px 12px 0;
			padding:0 22px;
			text-decoration:none;
			text-align:center;
			cursor:pointer;
			border:0;
			border-radius:3px;
			vertical-align:top;
		}
		.button span{
			display:inline;
			font-family:'Helvetica', Arial, sans-serif;
			text-decoration:none;
			font-weight:500;
			font-style:normal;
			font-size:16px;
			line-height:42px;
			cursor:pointer;
			border:none;
		}
		.rounded6{
			border-radius:6px;
		}
		.poweredWrapper{
			padding:20px 0;
			width:560px;
			margin:0 auto;
		}
		.poweredBy{
			display:block;
			text-align:right;
		}
		span.or{
			display:inline-block;
			height:32px;
			line-height:32px;
			padding:0 5px;
			margin:5px 5px 0 0;
		}
		.clear{
			clear:both;
		}
		.profile-list{
			display:block;
			margin:15px 20px;
			padding:0;
			list-style:none;
			border-top:1px solid #eee;
		}
		.profile-list li{
			display:block;
			margin:0;
			padding:5px 0;
			border-bottom:1px solid #eee;
		}
		html[dir=rtl] .wrapper,html[dir=rtl] .container,html[dir=rtl] label{
			text-align:right !important;
		}
		html[dir=rtl] ul.interestgroup_field label{
			padding:0;
		}
		html[dir=rtl] ul.interestgroup_field input{
			margin-left:5px;
		}
		html[dir=rtl] .hidden-from-view{
			right:-5000px;
			left:auto;
		}
		body,#bodyTable{
			background-color:#ffffff;
		}
		h1{
			font-size:28px;
			margin-bottom:30px;
			margin-top:0;
			padding:0;
		}
		#templateContainer{
			background-color:none;
		}
		#templateBody{
			background-color:#ffffff;
		}
		.bodyContent{
			line-height:200%;
			font-family:Helvetica;
			font-size:14px;
			color:#333333;
			padding:20px;
		}
		a:link,a:active,a:visited,a{
			color:#A4286A;
		}
		.button:link,.button:active,.button:visited,.button,.button span{
			background-color:#A4286A !important;
			color:#ffffff !important;
		}
		.button:hover{
			background-color:#A4286A !important;
			color:#ffffff !important;
		}
		label{
			line-height:200%;
			font-family:Helvetica;
			font-size:16px;
			color:#5d5d5d;
		}
		.field-group input,select,textarea,.dijitInputField{
			font-family:Arial;
			color:#5d5d5d !important;
		}
		.asterisk{
			color:#cc6600;
			font-size:20px;
		}
		label .asterisk{
			visibility:hidden;
		}
		.indicates-required{
			display:none;
		}
		.field-help{
			color:#777;
		}
		.error,.errorText{
			color:#e85c41;
			font-weight:bold;
		}
		@media (max-width: 620px){
			body{
				width:100%;
				-webkit-font-smoothing:antialiased;
				padding:10px 0 0 0 !important;
				min-width:300px !important;
			}

		}	@media (max-width: 620px){
			.wrapper,.poweredWrapper{
				width:auto !important;
				max-width:600px !important;
				padding:0 10px;
			}

		}	@media (max-width: 620px){
			#templateContainer,#templateBody,#templateContainer table{
				width:100% !important;
				-moz-box-sizing:border-box;
				-webkit-box-sizing:border-box;
				box-sizing:border-box;
			}

		}	@media (max-width: 620px){
			.addressfield span{
				width:auto;
				float:none;
				padding-right:0;
			}

		}	@media (max-width: 620px){
			.captcha{
				width:auto;
				float:none;
			}

		}
	</style>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"
      style="font: 14px/20px 'Helvetica', Arial, sans-serif;margin: 0;padding: 75px 0 0 0;text-align: center;-webkit-text-size-adjust: none;background-color: #ffffff;">
<center>
	<table border="0" cellpadding="20" cellspacing="0" height="100%" width="100%"
	       id="bodyTable" style="background-color: #ffffff;">
		<tr>
			<td align="center" valign="top">
				<!-- // BEGIN CONTAINER -->
				<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer"
				       class="rounded6" style="border-radius: 6px;background-color: none;">
					<tr>
						<td align="center" valign="top">
							<!-- // BEGIN HEADER -->
							<table border="0" cellpadding="0" cellspacing="0" width="600">
								<tr>
									<td>
										<img src="https://gallery.mailchimp.com/ffa93edfe21752c921f860358/images/c165efc1-f705-415a-990c-6f84fdacecec.jpg" alt="" border="0" style="border: 0px none;border-color: ;border-style: none;border-width: 0px;height: 118px;width: 596px;margin: 0;padding: 0;max-width: 100%;vertical-align: bottom;" width="596" height="118">

									</td>
								</tr>
							</table>
							<!-- END HEADER \\ -->
						</td>
					</tr>
					<tr>
						<td align="center" valign="top">
