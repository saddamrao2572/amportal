<?php use yii\helpers\Url; ?>
<h1 style="font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-size: 36px; line-height: 1.2em; color: #111111; font-weight: 200; margin: 40px 0 10px; padding: 0;">Hi <?= $user->username?></h1>
<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;">You have recenlty sent a request to reset your password at  <a href="https://solemole.com">SoleMole</a>.
<br/>
This means:
<br/>

a.       You need to verify that this was not a mistake<br/>
So, to reset your password, click the link below

</p>
<!-- button -->
<table class="" cellpadding="0" cellspacing="0" border="0" style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: auto !important; Margin: 0 0 10px; padding: 0;">
	<tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
		<td style="font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-size: 14px; line-height: 1.6em; text-align: center; vertical-align: top;  margin: 0; padding: 0;" align="center"  valign="top">
			<a href="<?= Url::to(['https://solemole.com/site/reset-pass/','key'=>$user->password_reset_token],true) ?>" style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 2; color: #ffffff; border-radius: 25px; display: inline-block; cursor: pointer; font-weight: bold; text-decoration: none; background: #348eda; margin: 0; padding: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">RESET</a>
			<br/>
			<p>Or copy paste the below link into your browser window</p>
			<p><?= Url::to(['https://solemole.com/site/reset-pass/','key'=>$user->password_reset_token],true) ?></p>

		</td>
	</tr>
</table>