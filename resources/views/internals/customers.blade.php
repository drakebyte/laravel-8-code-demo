<h1>Customers</h1>

<ul>
    @foreach ( $customers_array as $customer )
        <li>{{ $customer }}</li>
    @endforeach
</ul>