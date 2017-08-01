<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title>Email Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<style>
	* {
	  margin: 0;
	  padding: 0;
	  font-size: 100%;
	  font-family: 'Avenir Next', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
	  line-height: 1.65; }

	img {
	  max-width: 100%;
	  margin: 0 auto;
	  display: block; }

	body,
	.body-wrap {
	  width: 100% !important;
	  height: 100%;
	  background: #efefef;
	  -webkit-font-smoothing: antialiased;
	  -webkit-text-size-adjust: none; }

	a {
	  color: #71bc37;
	  text-decoration: none; }

	.text-center {
	  text-align: center; }

	.text-right {
	  text-align: right; }

	.text-left {
	  text-align: left; }

	.button {
	  display: inline-block;
	  color: white;
	  background: #71bc37;
	  border: solid #71bc37;
	  border-width: 10px 20px 8px;
	  font-weight: bold;
	  border-radius: 4px; }

	h1, h2, h3, h4, h5, h6 {
	  margin-bottom: 20px;
	  line-height: 1.25; }

	h1 {
	  font-size: 32px; }

	h2 {
	  font-size: 28px; }

	h3 {
	  font-size: 24px; }

	h4 {
	  font-size: 20px; }

	h5 {
	  font-size: 16px; }

	p, ul, ol {
	  font-size: 16px;
	  font-weight: normal;
	  margin-bottom: 20px; }

	.container {
	  display: block !important;
	  clear: both !important;
	  margin: 0 auto !important;
	  max-width: 580px !important; }
	  .container table {
		width: 100% !important;
		border-collapse: collapse; }
	  .container .masthead {
		padding: 80px 0;
		background: #71bc37;
		color: white; }
		.container .masthead h1 {
		  margin: 0 auto !important;
		  max-width: 90%;
		  text-transform: uppercase; }
	  .container .content {
		background: white;
		padding: 30px 35px; }
		.container .content.footer {
		  background: none; }
		  .container .content.footer p {
			margin-bottom: 0;
			color: #888;
			text-align: center;
			font-size: 14px; }
		  .container .content.footer a {
			color: #888;
			text-decoration: none;
			font-weight: bold; }
	</style>
</head>
<body>
<table class="body-wrap">
    <tr>
        <td class="container">

            <!-- Message start -->
            <table>
                <tr>
                    <td align="center" class="masthead">

                        <h1><?php echo $config[0]->email_title ?></h1>

                    </td>
                </tr>
                <tr>
                    <td class="content">

                        <h2>Dear Guest,</h2>

                        <p>
						<?php echo $config[0]->email_message ?>
						</p>
						<!--
						<p>
						<?php// echo base_url('/index.php/guest/email_verify/'.$to_passcode); ?>.
						</p>-->
                        <table>
                            <tr>
                                <td align="center">
                                    <p>
                                        <a href="<?php echo base_url('/emailauth/email_verify/'.$to_passcode); ?>" class="button"><?php echo $config[0]->email_button ?></a>
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <p>By the way, if you're wondering where you can find more of this fine meaty filler, visit <a href="http://www.hkt.com">HKT PCCW</a>.</p>

                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td class="container">

            <!-- Message start -->
            <table>
                <tr>
                    <td class="content footer" align="center">
                        <?php echo $config[0]->email_footer ?>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>
</body>
</html>