<!DOCTYPE html>
<html>
<head>
    <title>Leave Status Update</title>
</head>
<body>
<p>Dear {{ $user->name }},</p>

<p>Your leave request for <strong>{{ $leave_type }}</strong> from <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong> has been <strong>{{ $status }}</strong>.</p>

@if ($admin_comment)
    <p><strong>Admin Comment:</strong> {{ $admin_comment }}</p>
@endif

<p>Thank you.</p>
</body>
</html>
