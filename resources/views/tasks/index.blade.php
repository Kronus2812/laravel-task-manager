<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Botón Nueva Tarea -->
                <a href="{{ route('tasks.create') }}" 
                   class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    New Task
                </a>

                <!-- Filtros -->
                <div class="mb-4 flex space-x-4 text-sm border-b pb-2">
                    <a href="{{ route('tasks.index') }}" 
                       class="{{ !request('status') ? 'text-blue-700 font-bold border-b-2 border-blue-700' : 'text-gray-600 hover:text-blue-500' }}">
                        All
                    </a>
                    <a href="{{ route('tasks.index', ['status' => 'pending']) }}" 
                       class="{{ request('status') == 'pending' ? 'text-blue-700 font-bold border-b-2 border-blue-700' : 'text-gray-600 hover:text-blue-500' }}">
                        Pending
                    </a>
                    <a href="{{ route('tasks.index', ['status' => 'completed']) }}" 
                       class="{{ request('status') == 'completed' ? 'text-blue-700 font-bold border-b-2 border-blue-700' : 'text-gray-600 hover:text-blue-500' }}">
                        Completed
                    </a>
                </div>

                @if($tasks->isEmpty())
                    <p class="text-gray-500">No tasks found.</p>
                @else
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="text-left py-3 px-2">Title</th>
                                <th class="text-left py-3 px-2">Status</th>
                                <th class="text-left py-3 px-2">Due date</th>
                                <th class="text-left py-3 px-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="py-3 px-2 font-medium">{{ $task->title }}</td>
                                    
                                    <!-- Badges de Estado -->
                                    <td class="py-3 px-2">
                                        @if($task->status == 'completed')
                                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                                Completed
                                            </span>
                                        @else
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                    
                                    <td class="py-3 px-2 text-gray-500">{{ $task->due_date ?? '-' }}</td>
                                    
                                    <!-- Acciones -->
                                    <td class="py-3 px-2 flex gap-3">
                                        <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:underline">Edit</a>

                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this task?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
