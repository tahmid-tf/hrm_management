<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payslip</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
        }

        .container {
            width: 100%;
            padding: 20px;
        }

        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #000;
            padding: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Payslip</h2>
        <p>Month: {{ $formattedMonth }}</p>
    </div>

    <p><strong>Employee:</strong> {{ $payroll->employee->name }}</p>
    <p><strong>Email:</strong> {{ $payroll->employee->email }}</p>

    <table>
        <tr>
            <th>Description</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>Basic Salary</td>
            <td>{{ number_format($payroll->basic_salary, 2) }}</td>
        </tr>
        <tr>
            <td>Allowances</td>
            <td>{{ number_format($payroll->allowances, 2) }}</td>
        </tr>
        <tr>
            <td>Deductions</td>
            <td>{{ number_format($payroll->deductions, 2) }}</td>
        </tr>
        <tr>
            <th>Net Salary</th>
            <th>{{ number_format($payroll->net_salary, 2) }}</th>
        </tr>
    </table>

    <div class="footer">
        <p>Processed by HRMS</p>
    </div>
</div>
</body>
</html>
