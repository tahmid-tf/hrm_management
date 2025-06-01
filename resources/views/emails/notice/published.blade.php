<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Notice Published</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 30px; color: #333;">
<table width="100%" cellpadding="0" cellspacing="0"
       style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <tr>
        <td style="background-color: #007bff; padding: 20px; color: white; text-align: center;">
            <h1 style="margin: 0; color: white">📢 New Notice</h1>
        </td>
    </tr>
    <tr>
        <td style="padding: 30px;">
            <h2 style="margin-top: 0;">{{ $notice->title }}</h2>
            <p style="line-height: 1.6;">{!! nl2br(e($notice->description)) !!}</p>
            <p style="margin-top: 30px;">
                <a href="{{ route('public_notice_data') }}"
                   style="background-color: #007bff; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 4px; font-weight: bold; display: inline-block;">
                    📄 View Full Notice
                </a>
            </p>
        </td>
    </tr>
    <tr>
        <td style="background-color: #f8f9fa; padding: 20px; text-align: center; font-size: 14px; color: #666;">
            <p style="margin: 0;">Thank you,<br>{{ config('app.name') }}</p>
        </td>
    </tr>
</table>
</body>
</html>
