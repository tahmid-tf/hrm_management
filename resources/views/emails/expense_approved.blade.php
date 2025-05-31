<!DOCTYPE html>
<html>
<head>
    <title>Expense Approved</title>
</head>
<body>
<p>Dear {{ $expense->user->name }},</p>

<p>Your expense request has been <strong>{{ $approval }}</strong>.</p>

<p><strong>Details:</strong></p>
<ul>
    <li><strong>Amount:</strong> ${{ number_format($expense->amount, 2) }}</li>
    <li><strong>Category:</strong> {{ $expense->category->name ?? 'N/A' }}</li>
    <li><strong>Date:</strong> {{ $expense->expense_date ?? "not found" }}</li>
    <li><strong>Description:</strong> {{ $expense->description ?? 'N/A' }}</li>
</ul>

<p>Thank you for your submission.</p>
</body>
</html>
