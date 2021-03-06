<x-slot name="header">
    <h2 class="pl-2">Respond</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()"
                class="bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Create Response Message</button>
            @if($isModalOpen)
            @include('livewire.create-response')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-10">No.</th>
                        <th class="px-4 py-2">Name</th>
                        {{-- <th class="px-4 py-2 list-inline">Email</th> --}}
                        <th class="px-4 py-2">Mobile</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Response Time</th>
                        <th class="px-4 py-2">Agency</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($response as $response)
                    <tr>
                        <td class="border px-4 py-2">{{ $response->id }}</td>
                        <td class="border px-4 py-2">{{ $response->name }}</td>
                        {{-- <td class="border px-4 py-2">{{ $response->email}}</td> --}}
                        <td class="border px-4 py-2">{{ $response->mobile}}</td>
                        <td class="border px-4 py-2">{{ $response->description }}</td>
                        <td class="border px-4 py-2">{{ $response->responsetime}}</td>
                        <td class="border px-4 py-2">{{ $response->occupation}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $response->id }})"
                                class="bg-blue-500  text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $response->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
