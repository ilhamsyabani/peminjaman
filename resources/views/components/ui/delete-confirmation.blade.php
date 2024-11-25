<div>
    <!-- Main Modal -->
    <div x-data="{ open: @entangle('isModalOpen').defer }" x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="bg-white rounded-lg p-6 w-1/3">
            <h2 class="text-lg font-semibold">Modal Title</h2>
            <p class="mt-4">This is a regular modal content.</p>
            <div class="mt-6 flex justify-end space-x-4">
                <button @click="open = false" wire:click="closeModalPopover" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-data="{ openDelete: @entangle('isModalDelete').defer }" x-show="openDelete" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="bg-white rounded-lg p-6 w-1/3">
            <h2 class="text-lg font-semibold">Confirm Delete</h2>
            <p class="mt-4">Are you sure you want to delete this item?</p>
            <div class="mt-6 flex justify-end space-x-4">
                <button @click="openDelete = false" wire:click="closeModalPopover" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button wire:click="deleteItem({{ $confirmDeleteId }})" class="px-4 py-2 bg-red-600 text-white rounded">Delete</button>
            </div>
        </div>
    </div>
</div>
