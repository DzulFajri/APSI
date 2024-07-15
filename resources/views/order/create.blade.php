<x-app-layout>
    <x-slot name="header">
        {{ __('Create Order') }}
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="customer_name" class="block text-sm font-medium text-gray-700">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="customer_phone" class="block text-sm font-medium text-gray-700">Customer Phone</label>
                        <input type="text" name="customer_phone" id="customer_phone" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="customer_address" class="block text-sm font-medium text-gray-700">Customer Address</label>
                        <input type="text" name="customer_address" id="customer_address" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="orders" class="block text-sm font-medium text-gray-700">Orders</label>
                        <input type="text" name="orders" id="orders" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="order_quantity" class="block text-sm font-medium text-gray-700">Order Quantity</label>
                        <input type="number" name="order_quantity" id="order_quantity" class="mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
                        <input type="number" name="total_price" id="total_price" class="mt-1 block w-full" required>
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
