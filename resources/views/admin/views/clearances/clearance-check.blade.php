<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clearance Check') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4">User Clearance Check</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-3 text-left">User ID</th>
                                    <th class="py-2 px-3 text-left">User Name</th>
                                    <th class="py-2 px-3 text-left">Document Name</th>
                                    <th class="py-2 px-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userClearances as $userClearance)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $userClearance->user->id }}</td>
                                        <td class="border px-4 py-2">{{ $userClearance->user->name }}</td>
                                        <td class="border px-4 py-2">{{ $userClearance->sharedClearance->clearance->document_name }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('admin.clearances.show', $userClearance->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>