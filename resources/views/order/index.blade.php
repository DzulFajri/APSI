<x-app-layout>
    <x-slot name="header">
        {{ __('Orders') }}
    </x-slot>

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('orders.report.pdf') }}" class="px-4 py-2 bg-blue-500 text-white rounded">PDF</a>
        <a href="{{ route('order.create') }}" class="px-4 py-2 bg-green-500 text-white rounded">Create New Order</a>
    </div>

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-100 uppercase bg-indigo-800 border-b-2 border-gray-200">
                        Customer Name
                    </th>
                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-100 uppercase bg-indigo-800 border-b-2 border-gray-200">
                        Address
                    </th>
                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-100 uppercase bg-indigo-800 border-b-2 border-gray-200">
                        Phone
                    </th>
                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-100 uppercase bg-indigo-800 border-b-2 border-gray-200">
                        Orders
                    </th>
                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-100 uppercase bg-indigo-800 border-b-2 border-gray-200">
                        Quantity
                    </th>
                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-100 uppercase bg-indigo-800 border-b-2 border-gray-200">
                        Total Price
                    </th>
                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-100 uppercase bg-indigo-800 border-b-2 border-gray-200">
                        Order Time
                    </th>
                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-100 uppercase bg-indigo-800 border-b-2 border-gray-200">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $order->customer_name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $order->customer_address }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $order->customer_phone }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $order->orders }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $order->order_quantity }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $order->order_time }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <a href="{{ route('order.edit', $order->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded">Edit</a>
                            <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded mt-5">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
            {{ $orders->links() }}
        </div>
    </div>
</x-app-layout>
