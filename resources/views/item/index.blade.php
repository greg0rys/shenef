<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    >


</head>
<body>
<hgroup>
    <h2>Item Table Preview</h2>
    <h6>@gregs</h6>
</hgroup>
<div>

    <table>
        <thead>
        <th>
            asset id
        </th>
        <th>
            name
        </th>

        <th>
            item type
        </th>
        <th>
            username
        </th>

        </thead>
        <tbody>
        @foreach($items as $it)
            <tr>
                <td>{{$it->asset_id}}</td>
                <td> {{$it->name}} </td>
                <td>{{$it->item_type->name}}</td>
                <td>{{$it->user->username}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>


