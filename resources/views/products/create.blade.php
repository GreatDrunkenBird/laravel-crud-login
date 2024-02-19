<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Produto') }}
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
    <!-- Formulário para adicionar dados a DB -->
    <form class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 text-center" method="post" action="{{route('product.store')}}">
        @csrf
        @method('post')
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 text-gray-900 dark:text-gray-100">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" />

            <label>Quantity</label>
            <input type="text" name="qty" placeholder="Quantity" />

            <label>Price</label>
            <input type="text" name="price" placeholder="Price" />

            <label>Description</label>
            <input type="text" name="description" placeholder="Description" />

            <!-- Confirmação dos dados para enviar -->
            <button class="ps-3 font-bold hover:text-green-500">
                <input type="submit" value="Salvar" />
            </button>
        </div>
    </form>
</x-app-layout>
