@extends('layout-curd.main')
@section('title')
<title>Customer view page</title>
@endsection
@section('main')

<div class="flex flex-1 items-center justify-center p-6">
    <div class="w-full max-w-lg">
        <form class="mt-5 sm:flex sm:items-center" method="get" action="">
            <input type="search" name="search" value="{{ $search }}" class="inline w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:border-indigo-500 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="search by name or email" type="search" autofocus="" value="">
        
            <button type="submit" class="mt-3 inline-flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Search</button>
        </form>
    </div>
</div>

<div>
    <button class="bg-blue-500 text-white px-4 py-2 rounded my-0 mx-5 cursor-pointer float-right">
        <a href="{{ route('customer.create') }}">Add</button></a>
        
    <button class="bg-pink-500 text-white px-4 py-2 rounded mb-3 mx-5 cursor-pointer float-right">
        <a href="{{ route('customer.trash') }}">Trash</button></a>
</div>
    <table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">

        @foreach ($customers as $customer)
            
        <tr>
             <td class="px-6 py-4 whitespace-nowrap">{{ $customer['id'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $customer['name'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $customer['email'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                @if ($customer->gender == 'M')
                    Male
                @elseif ($customer->gender == 'F')
                    Female
                @elseif ($customer->gender == 'O')
                    Other
                @endif
                
            </td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $customer->country }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                
                    @if ($customer->status)
                         <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                    </span>
                    @elseif (!$customer->status)
                       <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        Inactive
                    </span>
                    @endif

                
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <button class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">
                    <a href="{{ route('customer.edit',['id'=> $customer->id]) }}">
                        Edit
                    </a>
                </button>

                <button class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">
                    <a href="{{ route('customer.delete',['id'=>$customer->id]) }}">
                       Move to trash
                    </a>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row mt-2.5 mb-2 mx-4">
    {{ $customers->links() }};
</div>
@endsection
