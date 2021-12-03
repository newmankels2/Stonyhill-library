<div>
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
    
            <div class="flex justify-start mb-14"><img width="400" src="/img/COVER.jpg" alt=""></div>
            <div class="w-full max-w-lg">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    
    
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-first-name">
                            First Name
                        </label>
    
                        <input wire:model="first_name"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" placeholder="Jane">
                    </div>
    
    
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    
    
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-first-name">
                            Last Name
                        </label>
    
                        <input wire:model="last_name"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" placeholder="Doe">
                    </div>
    
    
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    
    
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-first-name">
                            E-Mail
                        </label>
    
                        <input wire:model="email"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="email" placeholder="example@domain.com">
                    </div>
    
    
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-last-name">
                            Address
                        </label>
    
                        <input wire:model="address"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" placeholder="District, City, State">
                    </div>
                </div>

                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-zip">
                            Phone Number:
                        </label>
                        <input wire:model="phone_number"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-zip" type="number" placeholder="123 456 7890">
    
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
            @foreach ($members as $member)
            <div class="flex flex-col">
                    <div class="p-10 grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 gap-5">
                        <!--Card 1-->
                        <div class="rounded overflow-hidden shadow-lg  bg-gray-300">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2 text-center">{{ $member->first_name }}
                                    {{ $member->last_name }}</div>
                                    <img width="300" src="/img/COVER.jpg" alt=""><br>

                                <p class="text-gray-700 text-base text-center font-bold">
                                    Address:{{ $member->address }} <br>
                                </p>
                                <p class="text-teal-500 text-base text-center">
                                    Phone Number: <a href="tel:{{ $member->phone_nbr }}">{{ $member->phone_nbr }}</a> <br>
                                </p>
                                <p class="text-blue-700 text-base text-center">
                                   E-Mail: <a href="mailto:{{ $member->email }}">  {{ $member->email }}</a> <br>
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2 justify-center flex">
                                <button wire:click="edit({{ $member->id }})"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                <button wire:click="delete({{ $member->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </div>
                        </div>
                    </div>
    
                </div>
                @endforeach
        </div>
    </div>
    </div>
    </div>
    