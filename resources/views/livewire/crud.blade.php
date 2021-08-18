<x-slot name="header">
    <h2 class="text-center">Laravel 8 Livewire CRUD Demo</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-green-300 rounded-b text-teal-900 px-4 py-3 shadow my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()"
                class="my-4 inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-blue-400 text-base font-bold text-white shadow-sm hover:bg-blue-700">
                Create Student
            </button>
            @if($isModalOpen)
                @include('livewire.create')
            @endif
            <table class="table-fixed w-full mt-5">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Mobile</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td class="border px-4 py-2">{{ $student->id }}</td>
                        <td class="border px-4 py-2">{{ $student->name }}</td>
                        <td class="border px-4 py-2">{{ $student->email}}</td>
                        <td class="border px-4 py-2">{{ $student->mobile}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $student->id }})"
                                class="px-4 py-2 text-white bg-green-500 rounded cursor-pointer">Edit</button>
                            <button wire:click="delete({{ $student->id }})"
                                class="px-4 py-2 text-white bg-red-500 rounded cursor-pointer">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>