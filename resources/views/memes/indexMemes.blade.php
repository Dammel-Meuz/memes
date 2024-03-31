<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Liste des Memes

                </div>
                <div class="p-6 bg-white border-b border-gray-200 ">
                    {{-- <div class="container mx-auto mt-8 flex flex-wrap justify-center">
                       @foreach ($memes as $meme)
                       <div class="max-w-sm rounded overflow-hidden shadow-lg m-4">
                        <img class="w-full" src="https://via.placeholder.com/300" alt="Placeholder Image">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Card 1</div>
                            <p class="text-gray-700 text-base">
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">En savoir plus</button>
                        </div>
                    </div>

                       @endforeach


                    </div> --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 lg:gap-8">
                        @foreach ($memes as $meme)
                        <div class="h-32 rounded-lg bg-gray-200">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $meme->title }}</div>
                                <p class="text-gray-700 text-base">
                                </p>
                            </div>
                            <img class="w-full" src="{{ asset('images/'.$meme->image) }}" alt="Placeholder Image">
                        </div>
                        <a href="{{ route('download.image', ['id' => $meme->id]) }}">Télécharger l'image</a>
                        @endforeach
                      </div>

                      </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
