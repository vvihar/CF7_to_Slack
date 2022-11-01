<?php
function my_wpcf7_mail_sent($contact_form){
	//送信された情報を取得
	$submission = WPCF7_Submission::get_instance();
	if($submission) {
        $posted_data = $submission->get_posted_data();
        $name = $posted_data['your-name'];
        $email = $posted_data['your-email'];
        $subject = $posted_data['your-subject'];
        // message は任意入力の項目
        $message = $posted_data['your-message'];
	}
    // Slack Webhook URL
    $webhook_url = 'https://hooks.slack.com/services/XXXXXXXXXXX/XXXXXXXXXXX/XXXXXXXXXXXXXXXXXXXXXXXX';

    // Slackに送信するメッセージ
    $message = "お問い合わせがありました。\n\nお名前：".$name."\nメールアドレス：".$email."\n件名：".$subject."\nメッセージ：".$message;

    // Slackに送信するデータ
    $data = array(
        'text' => $message,
    );

    // Slackに送信
    $curl = curl_init($webhook_url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen(json_encode($data))
    ));
    $result = curl_exec($curl);
    curl_close($curl);
}
add_action("wpcf7_mail_sent", "my_wpcf7_mail_sent");

?>