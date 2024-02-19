<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Produto') }}
        </h2>
    </x-slot>
    <div>
        <!-- Retorna um idicador dos erros ao usuário -->
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <!-- Formulário para editar dados da DB -->
    <form class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 text-center" method="post" action="{{route('product.update', ['product' => $product]) }}">
        @csrf
        @method('put')
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 text-gray-900 dark:text-gray-100">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$product->name}}" />

            <label>Quantity</label>
            <input type="text" name="qty" placeholder="Quantity" value="{{$product->qty}}" />

            <label>Price</label>
            <input type="text" name="price" placeholder="Price" value="{{$product->price}}" />

            <label>Description</label>
            <input type="text" name="description" placeholder="Description" value="{{$product->description}}" />

            <!-- Confirmação dos dados para enviar -->
            <button class="ps-2 font-bold hover:text-green-500">
                <input type="submit" value="Atualizar Produto" />
            </button>
        </div>
    </form>
</x-app-layout>
