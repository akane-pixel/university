<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームデータの取得
    $event_date = htmlspecialchars($_POST['event_date']);
    $name = htmlspecialchars($_POST['name']);
    $furigana = htmlspecialchars($_POST['furigana']);
    $applicant = htmlspecialchars($_POST['applicant']);
    $birth_date = htmlspecialchars($_POST['birth_date']);
    $occupation = htmlspecialchars($_POST['occupation']);
    $school_name = htmlspecialchars($_POST['school_name']);
    $postal_code = htmlspecialchars($_POST['postal_code']);
    $prefecture = htmlspecialchars($_POST['prefecture']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $referral = htmlspecialchars($_POST['referral']);
    $remarks = htmlspecialchars($_POST['remarks']);

    // 簡易的なエラーチェック
    if (empty($name) || empty($email)) {
        echo "名前とメールアドレスは必須項目です。<a href='javascript:history.back()'>戻る</a>";
        exit;
    }

    // 送信内容の保存やメール送信などの処理
    $to = "your_email@example.com"; // 受信するメールアドレスに変更してください
    $subject = "イベント申し込みフォームの送信内容";
    $message = "\n開催日: $event_date\n名前: $name\nフリガナ: $furigana\nお申込みの方: $applicant\n生年月日: $birth_date\n学年・職業: $occupation\n学校名: $school_name\n郵便番号: $postal_code\n都道府県: $prefecture\n住所: $address\n電話番号: $phone\nメールアドレス: $email\n本大学を知ったきっかけ: $referral\n備考: $remarks";

    $headers = "From: webmaster@example.com"; // 送信元のメールアドレスに変更してください

    if (mail($to, $subject, $message, $headers)) {
        echo "申し込みが正常に送信されました。";
    } else {
        echo "申し訳ありませんが、送信中にエラーが発生しました。<a href='javascript:history.back()'>戻る</a>";
    }
} else {
    echo "不正なリクエストです。";
}
?>