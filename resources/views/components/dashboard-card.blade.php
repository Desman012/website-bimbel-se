@props(['title', 'count', 'iconClass', 'bgColor', 'iconBgColor'])

<div class="w-full sm:w-1/2 md:w-1/3 p-2">
    <div class="rounded-lg shadow-lg p-6 flex justify-between items-center {{ $bgColor }}">
        
        <div class="flex flex-col">
            <p class="text-sm font-semibold text-gray-700">{{ $title }}</p>
            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $count }}</p>
        </div>
        
        <div class="p-3 rounded-full {{ $iconBgColor }} shadow-md">
            <i class="{{ $iconClass }} text-xl text-white"></i> 
        </div>
    </div>
</div>