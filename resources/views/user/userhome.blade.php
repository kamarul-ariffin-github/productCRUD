<x-app-layout>
    @include('user.header', ['title' => __('Dashboard')])

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between mb-3">
                        <p class="text-lg font-bold">Product List</p>
                        <a href="{{ url('addproduct') }}"
                            class="bg-emerald-500 hover:bg-emerald-700 text-white px-2 py-1 rounded-md">
                            Create New Product
                        </a>
                    </div>
                    <form action="{{ route('home') }}" method="GET" class="mb-3 flex gap-3">
                        <input type="text" name="search" placeholder="Search..."
                            class="border-gray-200 border rounded-md px-2 py-1 flex-1">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white px-2 py-1 rounded-md">Search</button>
                    </form>
                    <table class="min-w-full divide-y divide-gray-200 mb-3">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product Name
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price (RM)
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Details
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Publish
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($products as $index => $product)
                            <tr class="hover:bg-slate-100">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->price }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product->details ? Str::limit($product->details, 50, '...') : 'None' }}
                                </td>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->publish }}</td>
                                <td class="px-6 py-4 whitespace-nowrap flex gap-1">
                                    <a href="{{url('productdetails', $product->id)}}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white px-2 py-1 rounded-md">
                                        Show
                                    </a>
                                    @if($product->user_id == Auth::id())
                                    <a href="{{ url('editproduct', $product->id) }}"
                                        class="bg-sky-500 hover:bg-sky-700 text-white px-2 py-1 rounded-md">
                                        Edit
                                    </a>
                                    <a href="{{ url('delete_product', $product->id) }}"
                                        class="bg-red-500 hover:bg-red-700 text-white px-2 py-1 rounded-md"
                                        onClick="deleteConfirmation(event)">
                                        Delete
                                    </a>
                                    @else
                                    <button disabled
                                        class="bg-sky-500 text-white px-2 py-1 rounded-md opacity-50 cursor-not-allowed">
                                        Edit
                                    </button>
                                    <button disabled
                                        class="bg-red-500 text-white px-2 py-1 rounded-md opacity-50 cursor-not-allowed">
                                        Delete
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>