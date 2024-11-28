@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ $attributes->merge([
        'class' => 'border-2 border-gray-200 text-gray-900 focus:border-indigo-700 focus:ring-indigo-500 rounded-md shadow-lg p-2 h-8 bg-gray-50 text-lg'
    ]) }}>
