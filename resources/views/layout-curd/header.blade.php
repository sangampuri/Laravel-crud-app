<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Navbar</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 ">
     <!-- Even Simpler Navbar -->
    <nav class="bg-gray-800 text-white">
        <div class="container mx-auto px-4">
            <div class="flex items-center h-12">
                <!-- Logo -->
                <div class="text-lg font-medium mr-8">Customer System</div>
                
                <!-- Simple Links -->
                <div class="flex">
                    <a href="{{ url('/') }}" class="px-4 py-2 bg-gray-900">Home</a>
                    <a href="{{ url('/register') }}" class="px-4 py-2 text-gray-300">Register</a>
                    <a href="{{ url('/customer/view') }}" class="px-4 py-2 text-gray-300">Customers</a>
                </div>
            </div>
        </div>
    </nav>
    
