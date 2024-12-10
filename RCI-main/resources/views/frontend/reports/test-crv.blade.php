<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    @foreach ($groups as $chunk)
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chunk as $employee)
                    <tr>
                        <td>{{ $employee->value }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (!$loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach
</body>
</html>