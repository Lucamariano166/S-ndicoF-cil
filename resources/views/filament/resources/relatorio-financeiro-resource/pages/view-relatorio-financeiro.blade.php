<x-filament-panels::page>
    <div class="space-y-6">
        {{-- Formulário de Filtros --}}
        <x-filament::section>
            <x-slot name="heading">
                Filtros do Relatório
            </x-slot>

            <form wire:submit="$refresh" class="space-y-4">
                {{ $this->form }}

                <div class="flex justify-end mt-4">
                    <x-filament::button type="submit" wire:loading.attr="disabled">
                        Aplicar Filtros
                    </x-filament::button>
                </div>
            </form>
        </x-filament::section>

        {{-- Widgets de Resumo --}}
        @if (count($this->getHeaderWidgets()))
            <div class="space-y-6">
                <x-filament-widgets::widgets
                    :widgets="$this->getHeaderWidgets()"
                    :columns="$this->getHeaderWidgetsColumns()"
                />
            </div>
        @endif

        {{-- Tabela de Transações --}}
        <x-filament::section>
            <x-slot name="heading">
                Transações Detalhadas
            </x-slot>

            {{ $this->table }}
        </x-filament::section>
    </div>
</x-filament-panels::page>
