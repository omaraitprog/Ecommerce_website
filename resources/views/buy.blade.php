<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
   @php
    $totalpayed=0;
@endphp
   @foreach($Myproducts as $product)
    
@php
    $totalpayed += $product->prix;
@endphp
        <table border="1" cellpadding="10" cellspacing="0" style="margin-bottom:20px; width:60%; border-collapse:collapse;">
            <tr style="background-color:#f2f2f2;">
                <th colspan="2" style="text-align:left; font-size:1.2em;">{{ $product->name }}</th>
            </tr>
            <tr>
                <td style="width:30%; font-weight:bold;">Price</td>
                <td> {{ $product->prix }}</td>
            </tr>
          
          
        </table>

   @endforeach
<div style="margin-top:30px; width:65%; background: linear-gradient(90deg, #4e54c8 0%, #8f94fb 100%); border-radius: 12px; box-shadow: 0 4px 16px rgba(78,84,200,0.15); padding: 30px 40px; color: #fff; font-size:1.3em; font-family: 'Segoe UI', Arial, sans-serif;">
    <div style="display: flex; align-items: center;">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" style="margin-right:18px;">
            <circle cx="12" cy="12" r="12" fill="#fff" fill-opacity="0.18"/>
            <path d="M7 13l3 3 7-7" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div>
            <div style="font-size:1.5em; font-weight:700; letter-spacing:1px;">Congratulations!</div>
            <div style="margin-top:6px; font-size:1.1em;">You have purchased <span style="color:#ffe082;">{{ $Myproducts->count() }}</span> products.</div>
            <div style="margin-top:12px; font-size:1.2em;">
                <span style="font-weight:600; color:#ffe082;">Total Paid:</span>
                <span style="font-size:1.4em; font-weight:700; margin-left:10px; color:#fff;">
                    {{ number_format($Myproducts->sum('prix'), 2) }} <span style="font-size:0.7em; color:#ffe082;">USD</span>
                </span>
            </div>
        </div>
    </div>
</div>
</body>
</html>