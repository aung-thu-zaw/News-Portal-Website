<x-filament-panels::page>
    <form wire:submit.prevent="save">
        {{ $this->form }}

        <br>

        <x-filament-panels::form.actions :actions="$this->getFormActions()" />
    </form>
</x-filament-panels::page>
