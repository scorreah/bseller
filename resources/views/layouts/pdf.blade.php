<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
		}

		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 20px;
		}

		table th, table td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: center;
		}

		table th {
			background-color: #f2f2f2;
		}

		h1 {
			text-align: center;
			margin-top: 0;
			margin-bottom: 10px;
		}

		#header {
			display: flex;
			justify-content: space-between;
			flex-direction: row;
			margin-bottom: 20px;
		}

		#footer {
			position: fixed;
			bottom: 0;
			left: 0;
			right: 0;
			height: 50px;
			background-color: #f2f2f2;
			display: flex;
			align-items: center;
			padding: 0 20px;
		}

		#footer p {
			margin: 0;
			font-size: 12px;
		}
	</style>
	<div id="header">
		<div>
			<h2>{{$viewData["title"]}}</h2>
			<p>Medellin, Colombia</p>
			<p>Teléfono: 123-456-7890</p>
		</div>
		<div>
			<h1>Bill</h1>
			<p>{{$viewData["date"]}}</p>
			<p>Number: {{$viewData["order"]->getId()}}</p>
		</div>
	</div>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Brand</th>
				<th>Product</th>
				<th>Price</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($viewData["shoes"] as $shoe)
                <tr>
					<td>{{$shoe->getId()}}</td>
					<td>{{$shoe->getBrand()}}</td>
                    <td>{{$shoe->getModel()}}</td>
                    <td>${{$shoe->getPrice()}}</td>
                </tr>
            @endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3">Subtotal</td>
				<td>{{$viewData["amount"]}}</td>
			</tr>
			<tr>
				<td colspan="3">shipping cost</td>
				<td>$0.00</td>
			</tr>
			<tr>
				<td colspan="3">Total</td>
				<td>${{$viewData["amount"]}}</td>
			</tr>
		</tfoot>
	</table>
	<div id="footer">
		<p>Beseller</p>
	</div>
</body>