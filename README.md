# CF7 to Slack

## これはなに

WordPress の Contact Form 7 を使用したフォームから送信されたメッセージを、Slack の任意のチャンネルに転送します。

## 使い方

`$my_form_id`と`$webhook_url`をそれぞれ変更してください。

> **Note**  
> WordPress での実装方法は、直接担当者に訊いてください。

## Incoming Webhook の URL の取得方法

1. [Slack App の管理画面](https://api.slack.com/apps/)から「**Create New App**」→「**From Scratch**」を順にクリックし、任意の App Name とワークスペースを指定します。「**Create App**」をクリックします。
2. 「**Incoming Webhooks**」をクリックし、これを *On* にします。
3. 「**Add New Webhook to Workspace**」をクリックし、投稿先のチャンネルを指定します。
4. 「**Webhook URL**」をコピーして、使用します。
