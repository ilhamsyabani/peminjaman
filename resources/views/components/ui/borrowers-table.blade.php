<div>
    <section class="mt-10">
        <div class="mx-auto max-w-full">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800">
                <div class="flex items-center justify-between d py-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" wire:model.live.debounce.300ms="search" wire:change="updateSearch"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Search" required="">
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <div class="flex space-x-1 items-center ">
                            <label class="w-32 text-sm font-medium text-end text-gray-900">Satatus:</label>
                            <select wire:model.live="status" wire:change="updateStatus"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="">All</option>
                                <option value="nonaktif">Non Aktif</option>
                                <option value="aktif">Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 text-start">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-start" wire:click="setSortingBy('name')">
                                    <button class="flex items-center gap-5 uppercase">
                                        Identitas
                                        @if ($sortBy !== 'name')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="size-5">
                                                <path fill-rule="evenodd"
                                                    d="M10.53 3.47a.75.75 0 0 0-1.06 0L6.22 6.72a.75.75 0 0 0 1.06 1.06L10 5.06l2.72 2.72a.75.75 0 1 0 1.06-1.06l-3.25-3.25Zm-4.31 9.81 3.25 3.25a.75.75 0 0 0 1.06 0l3.25-3.25a.75.75 0 1 0-1.06-1.06L10 14.94l-2.72-2.72a.75.75 0 0 0-1.06 1.06Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        @elseif($sortDir == 'ASC')
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.5303 16.5303C10.2374 16.8232 9.76256 16.8232 9.46967 16.5303L7.84467 14.9053L6.21967 13.2803C5.92678 12.9874 5.92678 12.5126 6.21967 12.2197C6.51256 11.9268 6.98744 11.9268 7.28033 12.2197L10 14.9393L12.7197 12.2197C13.0126 11.9268 13.4874 11.9268 13.7803 12.2197C14.0732 12.5126 14.0732 12.9874 13.7803 13.2803L10.5303 16.5303Z"
                                                    fill="#0F172A" fill-opacity="0.42" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.5303 3.46967C10.2374 3.17678 9.76256 3.17678 9.46967 3.46967L7.84467 5.09467L6.21967 6.71967C5.92678 7.01256 5.92678 7.48744 6.21967 7.78033C6.51256 8.07322 6.98744 8.07322 7.28033 7.78033L10 5.06066L12.7197 7.78033C13.0126 8.07322 13.4874 8.07322 13.7803 7.78033C14.0732 7.48744 14.0732 7.01256 13.7803 6.71967L10.5303 3.46967Z"
                                                    fill="#0F172A" />
                                            </svg>
                                        @else
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.46967 3.46967C9.76256 3.17678 10.2374 3.17678 10.5303 3.46967L12.1553 5.09467L13.7803 6.71967C14.0732 7.01256 14.0732 7.48744 13.7803 7.78033C13.4874 8.07322 13.0126 8.07322 12.7197 7.78033L10 5.06066L7.28033 7.78033C6.98744 8.07322 6.51256 8.07322 6.21967 7.78033C5.92678 7.48744 5.92678 7.01256 6.21967 6.71967L9.46967 3.46967Z"
                                                    fill="#0F172A" fill-opacity="0.42" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.5303 16.5303C10.2374 16.8232 9.76256 16.8232 9.46967 16.5303L7.84467 14.9053L6.21967 13.2803C5.92678 12.9874 5.92678 12.5126 6.21967 12.2197C6.51256 11.9268 6.98744 11.9268 7.28033 12.2197L10 14.9393L12.7197 12.2197C13.0126 11.9268 13.4874 11.9268 13.7803 12.2197C14.0732 12.5126 14.0732 12.9874 13.7803 13.2803L10.5303 16.5303Z"
                                                    fill="#0F172A" />
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3 text-start">Alamat email</th>
                                <th scope="col" class="px-4 py-3 text-start">Kontak</th>
                                <th scope="col" class="px-4 py-3 text-center">
                                    <button class="mx-auto flex justify-center items-center gap-1 uppercase"
                                        wire:click="setSortingBy('status')">
                                        Status
                                        @if ($sortBy !== 'status')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="size-5">
                                                <path fill-rule="evenodd"
                                                    d="M10.53 3.47a.75.75 0 0 0-1.06 0L6.22 6.72a.75.75 0 0 0 1.06 1.06L10 5.06l2.72 2.72a.75.75 0 1 0 1.06-1.06l-3.25-3.25Zm-4.31 9.81 3.25 3.25a.75.75 0 0 0 1.06 0l3.25-3.25a.75.75 0 1 0-1.06-1.06L10 14.94l-2.72-2.72a.75.75 0 0 0-1.06 1.06Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        @elseif($sortDir == 'ASC')
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.5303 16.5303C10.2374 16.8232 9.76256 16.8232 9.46967 16.5303L7.84467 14.9053L6.21967 13.2803C5.92678 12.9874 5.92678 12.5126 6.21967 12.2197C6.51256 11.9268 6.98744 11.9268 7.28033 12.2197L10 14.9393L12.7197 12.2197C13.0126 11.9268 13.4874 11.9268 13.7803 12.2197C14.0732 12.5126 14.0732 12.9874 13.7803 13.2803L10.5303 16.5303Z"
                                                    fill="#0F172A" fill-opacity="0.42" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.5303 3.46967C10.2374 3.17678 9.76256 3.17678 9.46967 3.46967L7.84467 5.09467L6.21967 6.71967C5.92678 7.01256 5.92678 7.48744 6.21967 7.78033C6.51256 8.07322 6.98744 8.07322 7.28033 7.78033L10 5.06066L12.7197 7.78033C13.0126 8.07322 13.4874 8.07322 13.7803 7.78033C14.0732 7.48744 14.0732 7.01256 13.7803 6.71967L10.5303 3.46967Z"
                                                    fill="#0F172A" />
                                            </svg>
                                        @else
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.46967 3.46967C9.76256 3.17678 10.2374 3.17678 10.5303 3.46967L12.1553 5.09467L13.7803 6.71967C14.0732 7.01256 14.0732 7.48744 13.7803 7.78033C13.4874 8.07322 13.0126 8.07322 12.7197 7.78033L10 5.06066L7.28033 7.78033C6.98744 8.07322 6.51256 8.07322 6.21967 7.78033C5.92678 7.48744 5.92678 7.01256 6.21967 6.71967L9.46967 3.46967Z"
                                                    fill="#0F172A" fill-opacity="0.42" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.5303 16.5303C10.2374 16.8232 9.76256 16.8232 9.46967 16.5303L7.84467 14.9053L6.21967 13.2803C5.92678 12.9874 5.92678 12.5126 6.21967 12.2197C6.51256 11.9268 6.98744 11.9268 7.28033 12.2197L10 14.9393L12.7197 12.2197C13.0126 11.9268 13.4874 11.9268 13.7803 12.2197C14.0732 12.5126 14.0732 12.9874 13.7803 13.2803L10.5303 16.5303Z"
                                                    fill="#0F172A" />
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="">Tindakan</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($borrowers as $borrower)
                                <tr wire:key="{{ $borrower->id }}" class="border-b dark:border-gray-700 text-sm">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start items-start"">
                                        <div class="flex gap-3">
                                            <img src="{{ asset('' . $borrower->photo) }}" alt="{{ $borrower->name }}"
                                                class="w-10 h-10 rounded-full">
                                            <div class="">
                                                {{ $borrower->name }}
                                                <span
                                                    class="block text-xs text-slate-500">{{ $borrower->no_id }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="px-4 py-3">{{ $borrower->email }}</td>
                                    <td class="px-4 py-3">{{ $borrower->phone }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <span
                                            class="inline-flex items-center rounded-full py-1 px-3 w-min-24 text-xs font-medium ring-1 ring-inset {{ $borrower->status == 'aktif' ? 'bg-green-50 text-green-700 ring-green-600/20' : 'bg-yellow-50 text-yellow-700 ring-yellow-600/20' }}">
                                            {{ $borrower->status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 flex items-center justify-center">
                                        <a href="{{ route( 'peminjam.view', $borrower->id )}}" class="px-3 py-2 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route( 'peminjam.edit', $borrower->id )}}" class="px-3 py-2 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        <button class="px-3 py-2 rounded"
                                        onclick="confirm('Anda yakin akan menghapus data {{ $borrower->name }} ?')? '' : event.stopImmediatePropagation()""
                                            wire:click="delete({{ $borrower->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5 text-red-600">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select wire:model.live='perPage'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    </div>
                    {{ $borrowers->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
