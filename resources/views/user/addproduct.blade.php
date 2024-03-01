<x-app-layout>
    @include('user.header', ['title' => __('Add New Product')])

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between mb-3 items-end">
                        <p class="text-xl text-slate-600 font-bold">Please fill in the forms</p>
                        <a href="{{ url()->previous() }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                            back
                        </a>
                    </div>
                    <hr class="border-gray-300 mb-3">
                    <form action="{{url('create_product')}}" method="post">
                        @csrf
                        <div class="flex flex-col gap-4">

                            <div class="flex flex-col">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="rounded-md" placeholder="Name" required>
                            </div>
                            <div class="flex flex-col">
                                <label for="price">Price (RM):</label>
                                <input type="number" step="any" name="price" id="price" class="rounded-md"
                                    placeholder="99.90" required>
                            </div>
                            <div class="flex flex-col">
                                <label for="details">Detail:</label>
                                <textarea name="details" id="details" cols="30" rows="5" class="rounded-md"></textarea>
                            </div>
                            <div class="flex flex-col">
                                <label for="publish">Publish:</label>
                                <div class="flex flex-col text-left">
                                    <div>
                                        <input type="radio" id="publish_yes" name="publish" value="Yes" checked>
                                        <label for="publish_yes" class="ml-2">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="publish_no" name="publish" value="No">
                                        <label for="publish_no" class="ml-2">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Submit"
                                    class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md text-white">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>