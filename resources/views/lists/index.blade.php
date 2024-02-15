<x-main-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-semibold self-end">Your to do list</h2>
        <a href="lists/detail" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline rounded mx-2 mt-3 block w-fit mb-1">Add An Item</a>
    </x-slot>

    <div class="to-do-list striped flex flex-col justify-between items-start">
        <div class="to-do-heading grid grid-cols-12 gap-2 border-y-2 border-black w-full text-center">
            <!-- <div class="px-1 grid-cols-subgrid col-span-1 border-x-2 border-black">
                Check
            </div> -->
            <div class="grid-cols-subgrid col-span-6 border-x-2 border-black">
                Item Info
            </div>
            <div class="grid-cols-subgrid col-span-2 border-r-2 border-black">
                Due Date
            </div>
            <div class="grid-cols-subgrid col-span-2 border-r-2 border-black">
                Priority
            </div>
            <div class="grid-cols-subgrid col-span-2 px-1 border-r-2 border-black">
                Controls
            </div>
        </div>

        @foreach ($items as $item)
        <div class="to-do-item grid grid-cols-12 gap-2 border-b-2 border-black w-full">
            <!-- <div class="item_checkbox px-1 grid-cols-subgrid col-span-1 border-x-2 border-black flex justify-center items-center">
                <input type="checkbox" name="check" class="check">
            </div> -->
            <div class="item_info grid-cols-subgrid col-span-6 p-2 border-x-2 border-black">
                <p class="item_title text-2xl">{{$item->title}}</p>
                <p class="item_desc text-gray-500 overflow-hidden">{{$item->description}}</p>
                <p class="item_desc text-sm text-gray-500 overflow-hidden">{{$item->created_at}}</p>
            </div>
            <div class="item_due-time grid-cols-subgrid col-span-2 border-r-2 border-black flex justify-center items-center">
                <p>{{$item->duedate}}</p>
            </div>
            <div class="item_priority grid-cols-subgrid col-span-2 border-r-2 border-black flex justify-center items-center">
                <p>{{$item->priority}}</p>
            </div>
            <div class="item_controls grid-cols-subgrid col-span-2 px-1 border-r-2 border-black flex flex-col xl:flex-row justify-center items-center">
                <a href="{{route('lists.detail', ['id' => $item->id])}}" class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded mb-1 xl:mb-0 mx-1 w-2/3 xl:w-1/2 text-center">Edit</a>
                <a href="{{route('lists.delete', ['id' => $item->id])}}" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded mx-1 w-2/3 xl:w-1/2 text-center">Delete</a>
            </div>
        </div>
        @endforeach
    </div>

</x-main-layout>