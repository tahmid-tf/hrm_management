<!DOCTYPE html>
<html>
<head>
    <title>New Leave Request</title>
</head>
<body>
<p>Hello {{ $user->name }},</p>

<p>A new leave request has been submitted:</p>

<ul>
    <li><strong>Leave Type:</strong> {{ $leave_type }}</li>
    <li><strong>Start Date:</strong> {{ $start_date }}</li>
    <li><strong>End Date:</strong> {{ $end_date }}</li>
    <li><strong>Reason:</strong> {{ $reason ?? 'N/A' }}</li>
</ul>

<p>Submitted by: <strong>{{ $submitted_by }}</strong></p>
</body>
</html>
