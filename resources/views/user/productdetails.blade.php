<x-app-layout>
    @include('user.header', ['title' => __('Product Details')])

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between mb-3 items-end">
                        <p class="text-xl text-slate-600 font-bold">Show Product</p>
                        <a href="{{ url()->previous() }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                            back
                        </a>
                    </div>
                    <hr class="border-gray-300 mb-3">
                    <div class="grid gap-4">
                        <div class="flex gap-2">
                            <p class="font-bold">Name:</p>
                            <p>{{$product->name}}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Price:</p>
                            <p>RM {{$product->price}}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Details:</p>
                            <p>{{$product->details ? $product->details : "None"}}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Publish:</p>
                            <p>{{$product->publish}}</p>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-bold">Created By:</p>
                            <p>{{$product->user_name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>