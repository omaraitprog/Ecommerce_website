
    @php
        $totalpayed = 0;
    @endphp
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
    <style>
        .unbelievable-table-container {
            perspective: 1200px;
            margin-bottom: 40px;
            width: 60%;
            transition: transform 0.4s cubic-bezier(.25,.8,.25,1);
        }
        .unbelievable-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: linear-gradient(120deg, #8f94fb 0%, #4e54c8 100%);
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(78,84,200,0.25), 0 1.5px 6px rgba(0,0,0,0.08);
            overflow: hidden;
            color: #fff;
            font-family: 'Segoe UI', Arial, sans-serif;
            transform-style: preserve-3d;
            transition: box-shadow 0.3s, transform 0.4s;
        }
        .unbelievable-table th, .unbelievable-table td {
            padding: 18px 24px;
            font-size: 1.15em;
            border: none;
        }
        .unbelievable-table th {
            background: rgba(255,255,255,0.10);
            font-size: 1.4em;
            font-weight: 700;
            letter-spacing: 1px;
            text-shadow: 0 2px 8px rgba(78,84,200,0.18);
        }
        .unbelievable-table tr:not(:first-child) td {
            background: rgba(255,255,255,0.07);
            font-weight: 500;
            border-top: 1px solid rgba(255,255,255,0.13);
        }
        .unbelievable-table td:first-child {
            color: #ffe082;
            font-weight: 600;
            width: 35%;
            letter-spacing: 0.5px;
        }
        .unbelievable-table td:last-child {
            color: #fff;
            font-size: 1.2em;
            font-weight: 700;
            text-shadow: 0 1px 4px rgba(78,84,200,0.12);
        }
        .unbelievable-table-container:hover .unbelievable-table {
            box-shadow: 0 16px 48px rgba(78,84,200,0.35), 0 3px 12px rgba(0,0,0,0.13);
            transform: rotateY(8deg) scale(1.03);
        }
        .unbelievable-table-glow {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            pointer-events: none;
            border-radius: 18px;
            box-shadow: 0 0 60px 10px #ffe08255, 0 0 0 0 transparent;
            opacity: 0;
            transition: opacity 0.4s;
            z-index: 1;
        }
        .unbelievable-table-container.active .unbelievable-table-glow {
            opacity: 1;
        }
        .unbelievable-table-anim {
            animation: tablePop 0.7s cubic-bezier(.25,.8,.25,1);
        }
        @keyframes tablePop {
            0% { transform: scale(0.85) rotateY(-20deg); opacity: 0; }
            60% { transform: scale(1.05) rotateY(6deg); opacity: 1; }
            100% { transform: scale(1) rotateY(0deg); opacity: 1; }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.unbelievable-table-container').forEach(function(container) {
                container.addEventListener('mouseenter', function() {
                    container.classList.add('active');
                });
                container.addEventListener('mouseleave', function() {
                    container.classList.remove('active');
                });
                // Animate on load
                let table = container.querySelector('.unbelievable-table');
                table.classList.add('unbelievable-table-anim');
            });
        });
    </script>
    @foreach($Myproducts as $product)
        <div class="unbelievable-table-container" style="position:relative;">
            <div class="unbelievable-table-glow"></div>
            <table class="unbelievable-table">
                <tr>
                    <th colspan="2">{{ $product->name }}</th>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>${{ number_format($product->prix, 2) }}</td>
                </tr>
            </table>
        </div>
    @endforeach

    

