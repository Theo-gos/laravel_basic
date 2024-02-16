<x-main-layout>
    @if(session()->has('msg'))
    <x-slot name="msg">
        <h4 class="bg-red-500 text-white text-center p-3">{{session('msg')}}</h4>
    </x-slot>
    @endif

    <x-slot name="header">
        <h2 class="text-3xl font-semibold self-end">Your to do</h2>
    </x-slot>

    <form class="w-full max-w-lg border-2 p-3 border-gray-200 mx-auto form" action="{{route('lists.item.add')}}" method="POST">
        @csrf
        @method('POST');

        <div class="flex flex-wrap -mx-3 mb-6 justify-between">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 flex-grow">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                    Title
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required="" name="title" id="title" type="text" value="">
                <p class="error-p text-red-500 text-xs italic hidden"></p>
            </div>

            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="priority">
                    Priority
                </label>
                <div class="relative">
                    <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="priority" id="priority" value="high">
                        <option value="high">High</option>
                        <option value="mid">Mid</option>
                        <option value="low">Low</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                    Description
                </label>
                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48" required="" name="description" id="description"></textarea>
                <p class="error-p text-red-500 text-xs italic hidden"></p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 flex-grow">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="duedate">
                    Due Date
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="duedate" id="duedate" type="date" required="" value="">
                <p class="error-p text-red-500 text-xs italic hidden"></p>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline rounded mx-2 f" name="submit" type="submit" value="Submit" />
            <a class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="{{route('lists')}}">Cancel</a>
        </div>
    </form>
</x-main-layout>