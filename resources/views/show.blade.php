<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }}</title>
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #c3dafe 0%, #e9d8fd 50%, #fbb6ce 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            background: #fff;
            border-radius: 2rem;
            box-shadow: 0 8px 32px rgba(60, 60, 120, 0.18);
            overflow: hidden;
            max-width: 600px;
            width: 100%;
            display: flex;
            transition: transform 0.3s cubic-bezier(.25,.8,.25,1);
        }
        .card:hover {
            transform: scale(1.04) rotate(-1deg);
            box-shadow: 0 16px 48px rgba(60, 60, 120, 0.22);
        }
        .card-img {
            background: linear-gradient(120deg, #a78bfa 0%, #fbb6ce 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40%;
            min-width: 180px;
            padding: 2rem;
        }
        .card-img svg {
            width: 90px;
            height: 90px;
            opacity: 0.85;
        }
        .card-content {
            flex: 1;
            padding: 2.5rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .card-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }
        .card-desc {
            color: #4a5568;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card-price {
            font-size: 1.7rem;
            font-weight: bold;
            color: #d53f8c;
        }
        .buy-btn {
            padding: 0.7rem 2rem;
            background: linear-gradient(90deg, #ed64a6 0%, #805ad5 100%);
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 1.2rem;
            box-shadow: 0 4px 16px rgba(237, 100, 166, 0.15);
            cursor: pointer;
            transition: background 0.3s, transform 0.15s;
            outline: none;
            position: relative;
            overflow: hidden;
        }
        .buy-btn:active {
            transform: scale(0.96);
        }
        .buy-btn.clicked {
            animation: pulse 0.4s;
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 #ed64a6aa; }
            70% { box-shadow: 0 0 0 10px #ed64a600; }
            100% { box-shadow: 0 0 0 0 #ed64a600; }
        }
        @media (max-width: 700px) {
            .card { flex-direction: column; }
            .card-img { width: 100%; min-width: 0; }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-img">
            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                <path d="M8 12l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="card-content">
            <h1 class="card-title">{{ $product->name }}</h1>
            <p class="card-desc">{{ $product->description }}</p>
            <div class="card-footer">
                <span class="card-price">{{ number_format($product->prix, 2) }} €</span>
                <button class="buy-btn" id="buyBtn" >Acheter</button>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('buyBtn').addEventListener('click', function() {
            this.classList.remove('clicked');
            void this.offsetWidth; // trigger reflow for animation restart
            this.classList.add('clicked');
        });
    </script>
</body>
</html>
