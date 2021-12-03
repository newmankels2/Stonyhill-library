<div>
    <span class="font-bold text-center block appearance-none w-full bg-gray-400 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">Expected Return Date Is 14 Days From Now Which Is:
        {{ date('M-d-Y @ h:i', strtotime("+14 days")) }}</span>
<div>
    <div class="bg-green-400 text-center">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="flex justify-center text-center mt-12 mr-8">

        <div class="mb-14"><img width="400" src="/img/author.jpg" alt=""></div>
        <div class="w-full max-w-lg">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-03">

                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-state">
                       Select A Member
                    </label>

                    <div class="relative">
                        <select wire:model="member_id"
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state" placeholder="Choose Member">
                            <option>Choose One</option>
                            @foreach ($members as $member)
                            <option value="{{ $member->id }}">{{ $member->first_name }} {{ $member->last_name }}</option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-03">

                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-state">
                       Select A Book
                    </label>

                    <div class="relative">
                        <select wire:model="book_id"
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state">
                            <option>Choose One</option>
                            @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-03">

                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-state">
                       Status
                    </label>

                    <div class="relative">
                        <select wire:model="status"
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state">
                            <option>Choose One</option>
                            <option>Issued</option>
                            <option>Returned</option>
                            <option>Returned Late</option>
                            <option>Missing</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-03">

                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-state">
                       Return Date
                    </label>

                    <div class="relative">
                        <input wire:model="return_date"
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state" type="date">
                        {{-- <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div> --}}
                    </div>
                </div>

                @if ($btn_nm == 'Create')
                <div class="px-6 pt-4 pb-2 justify-center flex">
                <button wire:click="store()"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-16 mt-5">{{ $btn_nm }}</button>
                @else
                <div class="px-6 pt-4 pb-2 justify-center flex">
                <button wire:click="modify()"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-16 mt-5">{{ $btn_nm }}</button>
                @endif


                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap justify-center mx-auto">
        @foreach ($borrowedbooks as $borrowedbook)
        <div class="flex flex-col">
                <div class="p-10 grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 gap-5">
                    <!--Card 1-->
                    <div class="rounded overflow-hidden shadow-lg  bg-gray-300">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2 text-center">{{ $borrowedbook->member->first_name }} {{ $borrowedbook->member->last_name }}
                               </div>
                                <img width="300" src="/img/author.jpg" alt=""><br>
                            <p class="text-gray-700 text-base text-center font-bold">
                                Book Title: {{ $borrowedbook->book->title }}</p>
                            <p class="text-gray-700 text-base text-center font-bold">
                                Return Date: {{ $borrowedbook->return_date }}</p>
                                <span class="font-bold flex justify-center text-gray-700">
                                @php
                                    $dt_end = new DateTime( $borrowedbook->return_date);
                                    $dt_now = new DateTime('now' ,new DateTimeZone('America/Jamaica'));

                                    $remain = date_diff($dt_end, $dt_now);
                                    echo 'Time Left : '. $remain->d . ' days and ' . $remain->h . ' hours'
                                @endphp
                                </span>
                            <p class="text-gray-700 text-base text-center font-bold">
                                Status: {{ $borrowedbook->status }}</p> <br>
                        </div>
                        <div class="px-6 pt-4 pb-2 justify-center flex">
                            <button wire:click="edit({{ $borrowedbook->id }})"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>

                            <button wire:click="delete({{ $borrowedbook->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <span class="justify-center flex">{{ $borrowedbooks->links() }}</span>
    </div>
</div>