<div>
    <div>
        <div class="bg-green-400 text-center">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="flex justify-center text-center mt-12 mr-8">
    
            <div class="flex justify-start mb-14"><img width="400" src="/img/book.jpg" alt=""></div>
            <div class="w-full max-w-lg">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    
    
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-first-name">
                            Book Title
                        </label>
    
                        <input wire:model="title"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" placeholder="Jack and Jill">
                    </div>
    
    
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    
    
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-first-name">
                            Description
                        </label>
    
                        <textarea wire:model="desc"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" placeholder="Extension Of Conditon"></textarea>
                    </div>
    
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-03">
    
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-state">
                            Book's Author
                        </label>
    
                        <div class="relative">
                            <input wire:model="author"
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state" type="text" placeholder="John Wick">
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
    
                    @if ($btn_nm == 'Create')
                    <button wire:click="store()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-16 mt-5">{{ $btn_nm }}</button>
                    @else
                    <button wire:click="modify()"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-16 mt-5">{{ $btn_nm }}</button>
                    @endif
    
    
                    </div>
                </div>
            </div>
        </div>
    
        <div class="flex flex-wrap justify-center mx-auto">
            @foreach ($books as $book)
            <div class="flex flex-col">
                    <div class="p-10 grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 gap-5">
                        <!--Card 1-->
                        <div class="rounded overflow-hidden shadow-lg  bg-gray-300">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2 text-center">{{ $book->title }}
                                   </div>
                                    <img width="300" src="/img/book.jpg" alt=""><br>
                                <p class="text-gray-700 text-base text-center font-bold">
                                    Description:{{ $book->desc }}</p> <br>
                                <p class="text-gray-700 text-base text-center font-bold">
                                    Condition: {{ $book->author }}</p> <br>
                            </div>
                            <div class="px-6 pt-4 pb-2 justify-center flex">
                                <button wire:click="edit({{ $book->id }})"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
    
                                <button wire:click="delete({{ $book->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
    </div>
