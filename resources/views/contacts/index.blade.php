<x-layouts.app title="Dashboard">

    <div class="container">
        <h2 class="text-2xl font-bold text-white">Subscriptions View</h2>
        
        <table class="min-w-full table-auto text-white mt-4 bg-gray-800 shadow-md rounded-lg">
            <thead class="bg-gray-900">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Subject</th>
                    <th class="px-4 py-2">Message</th>
                    <th class="px-4 py-2">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr class="bg-gray-700 border-b border-gray-600">
                    <td class="px-4 py-2">{{ $contact->name }}</td>
                    <td class="px-4 py-2">{{ $contact->email }}</td>
                    <td class="px-4 py-2">{{ $contact->phone }}</td>
                    <td class="px-4 py-2">{{ $contact->subject }}</td>
                    <td class="px-4 py-2">{{ $contact->message }}</td>
                    <td class="px-4 py-2">{{ $contact->created_at }}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

</x-layouts.app>
