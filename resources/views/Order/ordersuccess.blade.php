@include('User.layout.head')

<div class="order-success-page">
    @include('User.layout.header')

    <div class="container" style="max-width:700px; margin:2rem auto; text-align:center;">
        <div style="background:#fff; padding:2rem; border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
            <div style="font-size:50px; color:green; margin-bottom:1rem;">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 style="margin-bottom:1rem; font-size:2rem; color:#111;">Order Placed!</h1>
            <p style="color:#555; margin-bottom:2rem;">Thank you for your purchase. Your order has been successfully placed.</p>

            <div style="text-align:left; background:#f5f5f5; padding:1rem; border-radius:5px; margin-bottom:1rem;">
                <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                <p><strong>Customer:</strong> {{ $customer->name }}</p>
                <p><strong>Address:</strong> {{ $customer->address }}, {{ $customer->city }}, {{ $customer->country }}</p>
                <p><strong>Delivery:</strong> {{ \Carbon\Carbon::parse($order->delivery_date_time)->format('d-m-Y h:i A') }}</p>
                <p><strong>Status:</strong> Processing</p>
                <p><strong>Total:</strong> ₹{{ number_format($order->price,2) }}</p>
            </div>

            <a href="{{ url('/') }}" style="display:inline-block; padding:0.7rem 1.5rem; background:#EE3239; color:#fff; border-radius:5px; text-decoration:none;">Continue Shopping</a>
        </div>
    </div>

    @include('User.layout.footer')
    @include('User.layout.footJS')
</div>
