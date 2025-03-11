<x-layouts.app title="Dashboard">

    <div class="container">
        <h2 class="text-2xl font-bold text-white">Subscriptions View</h2>
        
        <table class="min-w-full table-auto text-white mt-4 bg-gray-800 shadow-md rounded-lg">
            <thead class="bg-gray-900">
                <tr>
                    <th class="px-4 py-2">User Id</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Stripe Id</th>
                    <th class="px-4 py-2">Session Id</th>
                    <th class="px-4 py-2">Stripe Status</th>
                    <th class="px-4 py-2">Stripe Price</th>
                    <th class="px-4 py-2">Currency</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Invoice Id</th>
                    <th class="px-4 py-2">Order Id</th>
                    <th class="px-4 py-2">Package Slug</th>
                    <th class="px-4 py-2">Payment Method</th>
                    <th class="px-4 py-2">Payment Status</th>
                    <th class="px-4 py-2">Subscription Id</th>
                    <th class="px-4 py-2">End At</th>
                    <th class="px-4 py-2">Created At</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $subscription)
                <tr class="bg-gray-700 border-b border-gray-600">
                    <td class="px-4 py-2">{{ $subscription->user_id }}</td>
                    <td class="px-4 py-2">{{ $subscription->type }}</td>
                    <td class="px-4 py-2">{{ $subscription->stripe_id }}</td>
                    <td class="px-4 py-2">{{ $subscription->stripe_session_id }}</td>
                    <td class="px-4 py-2">{{ $subscription->stripe_status }}</td>
                    <td class="px-4 py-2">{{ $subscription->stripe_price }}</td>
                    <td class="px-4 py-2">{{ $subscription->currency }}</td>
                    <td class="px-4 py-2">{{ $subscription->quantity }}</td>
                    <td class="px-4 py-2">{{ $subscription->invoice_id }}</td>
                    <td class="px-4 py-2">{{ $subscription->order_id }}</td>
                    <td class="px-4 py-2">{{ $subscription->package_slug }}</td>
                    <td class="px-4 py-2">{{ $subscription->payment_method }}</td>
                    <td class="px-4 py-2">{{ $subscription->payment_status }}</td>
                    <td class="px-4 py-2">{{ $subscription->subscription }}</td>
                    <td class="px-4 py-2">{{ $subscription->ends_at }}</td>
                    <td class="px-4 py-2">{{ $subscription->created_at }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('subscriptions.edit', $subscription->id) }}" class="btn btn-warning bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

</x-layouts.app>
