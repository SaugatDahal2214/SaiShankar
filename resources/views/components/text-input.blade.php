@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ $attributes->merge([
        'class' => 'border-1 border-indigo-500 text-gray-900 focus:border-indigo-700 focus:ring-indigo-500 rounded-lg shadow-md w-96 h-10 p-4 bg-gray-50 text-lg'
    ]) }}>
