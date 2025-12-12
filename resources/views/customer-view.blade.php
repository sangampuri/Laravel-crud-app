@extends('layout-curd.main')
@section('main')

<div>
    <button class="bg-blue-500 text-white px-4 py-2 rounded my-5 mx-5 cursor-pointer float-right">
        <a href="{{ route('customer.create') }}">Add</button></a>
</div>
    <table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
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
                <button class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Edit</button>
                <button class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</button>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>
@endsection
