<div class="flex items-center space-x-4">
    <!-- Foto -->
    <div>
        @if ($photo)
            <img 
                src="{{ asset($photo) }}" 
                alt="Photo" 
                class="w-16 h-16 rounded-full object-cover border border-gray-300 dark:border-gray-700"
            >
        @else
            <div 
                class="w-16 h-16 flex items-center justify-center bg-gray-200 text-gray-500 rounded-full border border-gray-300 dark:border-gray-700"
            >
                No Photo
            </div>
        @endif
    </div>
</div>
