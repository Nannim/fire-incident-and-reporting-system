<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 modal" id="autocompleteaddress">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="form-group mb-4">
                            <label for="level"
                                class="block text-gray-700 text-sm font-bold mb-2">Level</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="level" placeholder="What is the level of damage?" wire:model="level">
                            @error('label') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="description"
                                class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="description" wire:model="description"
                                placeholder="Describe it briefly"></textarea>
                            @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="city-street"
                            class="block text-gray-700 text-sm font-bold mb-2">City/Street</label>
                            <input type="text"
                            name="autocomplete" id="autocomplete"
                            class="pac-container form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="What City and Country?">
                        </div>

                        <div class="form-group mb-4" id="latitudeArea">
                            <label for="latitude"
                            class="block text-gray-700 text-sm font-bold mb-2">Latitude</label>
                            <input type="text"
                            id="latitude" name="latitude"
                            class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="form-group mb-4" id="longtitudeArea">
                            <label for="longitude"
                            class="block text-gray-700 text-sm font-bold mb-2">Longitude</label>
                            <input type="text"
                            name="longitude" id="longitude"
                            class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="form-group mb-4">
                            <label for="time"
                                class="block text-gray-700 text-sm font-bold mb-2">Time</label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="time" wire:model="time"
                                placeholder="What is the time?"></textarea>
                            @error('time') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Report
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModalPopover()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Close
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- <script>
    import Button from "@/Jetstream/Button";
    export default {
        components: {Button}
    }
</script> --}}
