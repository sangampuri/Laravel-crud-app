@extends('layout-curd.main')
@section('main')

    <div class="form-container mx-auto bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold text-blue-800 mb-6">{{$title}}</h1>
        
        <form id="registrationForm" action="{{ $url }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-3">
                <!-- Name Field -->
                <div class="mb-2">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-1">Full Name *</label>
                    <input type="text" id="name" name="name" required value={{ $customer->name }}
                           class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>
                
                <!-- Email Field -->
                <div class="mb-2">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-1">Email Address *</label>
                    <input type="email" id="email" name="email" required value={{ $customer->email }}
                           class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>
                
                <!-- Password Field -->
                <div class="mb-2">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-1">Password *</label>
                    <input type="password" id="password" name="password" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>
                
                <!-- Confirm Password Field -->
                <div class="mb-2">
                    <label for="confirmPassword" class="block text-gray-700 text-sm font-medium mb-1">Confirm Password *</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>
                
                <!-- Country Field -->
                <div class="mb-2">
                    <label for="country" class="block text-gray-700 text-sm font-medium mb-1">Country *</label>
                    <input type="text" id="country" name="country" required value={{ $customer->country }}
                           class="w-full px-3 py-2 border border-gray-300 rounded">
                    
                </div>
                
                <!-- State Field -->
                <div class="mb-2">
                    <label for="state" class="block text-gray-700 text-sm font-medium mb-1">State *</label>
                    <input type="text" id="state" name="state" required value={{ $customer->state }}
                           class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>
                
                <!-- Address Field (Spans both columns) -->
                <div class="mb-2 col-span-2">
                    <label for="address" class="block text-gray-700 text-sm font-medium mb-1">Address *</label>
                    <textarea id="address" name="address" rows="3" required  {{ $customer->address }}
                              class="w-full px-3 py-2 border border-gray-300 rounded"></textarea>
                </div>
                
                <!-- Gender Field -->
                 <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Gender *</label>
                    <div class="flex space-x-6">
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="M" required 
                            {{ $customer->gender == "M" ? "checked" : "" }}
                                   class="text-indigo-600 border-gray-300">
                            <span class="ml-2 text-gray-700">Male</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="F" required 
                             {{ $customer->gender == "F" ? "checked" : "" }}
                                   class="text-indigo-600 border-gray-300">
                            <span class="ml-2 text-gray-700">Female</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="O" required 
                             {{ $customer->gender == "O" ? "checked" : "" }}
                                   class="text-indigo-600 border-gray-300">
                            <span class="ml-2 text-gray-700">Other</span>
                        </label>
                    </div>
                </div>
                
                <!-- Date of Birth Field -->
                <div class="mb-2">
                    <label for="dob" class="block text-gray-700 text-sm font-medium mb-1">Date of Birth *</label>
                    <input type="date" id="dob" name="dob" required 
                    value={{ $customer->dob }}
                           class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="mt-4">
                <button type="submit" 
                        class="w-full bg-indigo-600 text-white font-medium py-3 px-4 rounded">
                    Register
                </button>
            </div>
        </form>
        
        <div class="mt-2 text-center text-sm text-gray-500">
            <p>Fields marked with * are required</p>
        </div>
    </div>

@endsection