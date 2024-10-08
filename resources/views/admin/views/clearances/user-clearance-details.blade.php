<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Clearance Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- Display User ID and Name --}}
                    <div class="mb-6">
                        <h3 class="text-xl ">ID: <strong>{{ $userClearance->user->id }}</strong></h3>
                        <h3 class="text-xl ">Name: <strong>{{ $userClearance->user->name }}</strong></h3>
                        <h3 class="text-xl ">Position: <strong>{{ $userClearance->user->position }}</strong></h3>
                        <h3 class="text-xl ">Unit: <strong>{{ $userClearance->user->units }}</strong></h3>
                        <h3 class="text-xl ">Program: <strong>{{ $userClearance->user->program }}</strong></h3>
                        <h3 class="text-xl ">Email: <strong>{{ $userClearance->user->email }}</strong></h3>
                    </div>

                    <h3 class="text-2xl font-semibold mb-4">{{ $userClearance->sharedClearance->clearance->document_name }}</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-3 text-left">Requirement</th>
                                    <th class="py-2 px-3 text-left">Status</th>
                                    <th class="py-2 px-3 text-left">Uploaded Files</th>
                                    <th class="py-2 px-3 text-left">Status</th>
                                    <th class="py-2 px-3 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userClearance->sharedClearance->clearance->requirements as $requirement)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $requirement->requirement }}</td>
                                        <td class="border px-4 py-2">
                                            @if($userClearance->uploadedClearanceFor($requirement->id))
                                                <span class="text-green-500">Uploaded</span>
                                            @else
                                                <span class="text-red-500">Pending</span>
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">
                                            @foreach($userClearance->uploadedClearances->where('user_id', $userClearance->user->id) as $uploaded)
                                                @if($uploaded->requirement_id == $requirement->id)
                                                    <div class="flex items-center space-x-2">
                                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16h16V8l-6-6H4zm2 2h8v4h4v10H6V6z"></path>
                                                        </svg>
                                                        <a href="{{ asset('storage/' . $uploaded->file_path) }}" target="_blank" class="text-blue-500 hover:underline">
                                                            {{ basename($uploaded->file_path) }}
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </td>
                                           {{-- @foreach($userClearance->uploadedClearances as $uploaded)
                                                @if($uploaded->requirement_id == $requirement->id)
                                                    <a href="{{ asset('storage/' . $uploaded->file_path) }}" target="_blank" class="text-blue-500 hover:underline">
                                                        {{ basename($uploaded->file_path) }}
                                                    </a><br>
                                                @endif
                                            @endforeach
                                        </td>--}} <!-- Pang DEBUG lng sa lahat ng user Overall Upload -->
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('admin.clearances.approve', $userClearance->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-green-500 hover:text-green-700">Approve</button>
                                            </form>
                                        </td>
                                        <td class="border px-4 py-2">
                                            
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