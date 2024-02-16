<x-app-layout>
    @if(session()->has('success'))

        <div class="bg-green-300 dark:bg-green-600 shadow-sm sm:rounded-lg font-bold text-center text-gray-900 dark:text-gray-100 max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{session('success')}}
        </div>

    @else
        <div class="bg-white dark:bg-grey-800 shadow-sm sm:rounded-lg text-center text-gray-900 dark:text-gray-100 max-w-7xl mx-auto sm:px-6 lg:px-8">
            Manage products
        </div>
    @endif
    <div class="py-12">
        <div class="text-right text-gray-900 dark:text-gray-100 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <a href="{{ route('product.create') }}">
                    Create a Product
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <table class="border-separate border-spacing-x-12">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                    @foreach($products as $product)
                        <tr>
                            <th>{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->qty}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->description}}</td>
                            <td class="text-right sm:flex sm:items-center sm:ms-6">
                                <x-dropdown width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                            <div>Options</div>

                                            <div class="ms-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">

                                        <x-dropdown-link :href="route('product.edit', ['product' => $product])">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>


                                        <form method="post" action="{{ route('product.delete', ['product' => $product]) }}"
                                              onclick="event.preventDefault(); this.closest('form').submit();">
                                            @csrf
                                            @method('DELETE')
                                            <x-dropdown-link :href="route('product.delete', ['product' => $product])">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>

                                    </x-slot>
                                </x-dropdown>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
