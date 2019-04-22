<?php

require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

$c = true;
$message = '';

$admin_email  = get_bloginfo( 'admin_email' );
$form_subject = 'Жду вашего ответа! :)';
$project_name = 'У вас новый клиент!';

foreach ( $_POST as $key => $value ) {

	if ($key == 'Емейл') {
		$value = '<a href="mailto:'. $value .'" target="_blank" style="color: #ffffff">' . $value . '</a>';
	}

	if ( $value != '' && $value != 'hidden' && $key != 'project_name' && $key != 'admin_email' && $key != 'form_subject' ) {
		$message .= '
		' . ( ($c = !$c) ? '<tr>':'<tr>' ) . '
			<td style="padding: 15px; text-align: right;">' . str_replace('_', ' ', $key) . '</td>
			<td style="padding: 15px;"><strong>' . $value . '</strong></td>
		</tr>
		';
	}

}

$message = '<body><table style="width: 100%; border-spacing: 0; font-family: sans-serif; font-size: 18px; background-color: #4c8599; color: #ffffff;">' . $message . '</table></body>';

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = 'MIME-Version: 1.0' . PHP_EOL .
'Content-Type: text/html; charset=utf-8' . PHP_EOL .
'From: ' . adopt( $project_name ) . ' <' . $admin_email . '>' . PHP_EOL .
'Reply-To: ' . $admin_email . '' . PHP_EOL;

if ( mail( $admin_email, adopt( $form_subject ), $message, $headers ) ) {
	echo 'Мы скоро свяжемся с Вами! :)';
} else {
	echo 'Попробуйте позже... :(';
}
