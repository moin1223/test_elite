

<!-- table.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Simple Table</title>
    <!-- Add your CSS styles here, if needed -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            height:14px;
            width: 42px;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Serial No</th>
                <th>Product Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productCodes as $productCode)
                <tr>
                    <td>{{ $productCode->id}}</td>
                    <td>{{$productCode->product_code}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        @foreach ($productCodes as $productCode)
        <h1>{{$productCode->product_code}}</h1>
        @endforeach
    </div>
</body>
</html> --}}