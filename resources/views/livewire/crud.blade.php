<x-slot name="header">
    <h2 class="pl-2">Reports</h2>
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
                class="bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Report a Fire Incident</button>
            @if($isModalOpen)
            @include('livewire.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 w-20">No.</th>
                        <th class="border px-4 py-2">Level</th>
                        <th class="border px-4 py-2">Description</th>
                        <th class="border px-4 py-2">Location</th>
                        <th class="border px-4 py-2">Time</th>
                        <th class="border px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                    <tr>
                        <td class="border px-4 py-2">{{ $report->id }}</td>
                        <td class="border px-4 py-2">{{ $report->level }}</td>
                        <td class="border px-4 py-2">{{ $report->description }}</td>
                        <td class="border px-4 py-2">{{ $report->location }}</td>
                        <td class="border px-4 py-2">{{ $report->time }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $report->id }})"
                                class="bg-blue-500  text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $report->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    import Button from "@/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>
