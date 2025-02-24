<nav class="fixed right-0 bottom-0 left-0 z-50 w-full bg-white border-t border-gray-200 md:hidden dark:bg-gray-800 dark:border-gray-700 safe-bottom">
    <style>@media (max-width: 767px) { main.fi-main { padding-bottom: 80px } }</style>
    <div class="mx-auto max-w-md">
        <div class="grid grid-flow-col auto-cols-fr">
            @foreach ($navigation as $item)
                <a
                    @if (filament()->getCurrentPanel()->hasSpaMode())
                    wire:navigate
                    @endif
                    href="{{ $item['url'] }}"
                    class="flex flex-col justify-center items-center px-1 py-2 text-gray-500 transition-colors hover:text-primary-600 hover:bg-primary-50 dark:hover:bg-primary-950 dark:hover:text-primary-400"
                    @class([
                        'bg-primary-50 dark:bg-primary-950' => $item['active']
                    ])
                    @if (isset($item['onclick']))
                        x-on:click="{{ $item['onclick'] }}"
                    @endif
                >
                    <div class="flex justify-center items-center w-8 h-8">
                        <x-filament::icon
                            :icon="$item['icon']"
                            class="w-6 h-6"
                            @class([
                                'text-primary-600 dark:text-primary-400' => $item['active'],
                            ])
                        />
                    </div>
                    <span class="mt-1 text-xs font-medium" @class([
                        'text-primary-600 dark:text-primary-400' => $item['active'],
                    ])>
                        {{ $item['label'] }}
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</nav>
