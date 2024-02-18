<div>
    <!--MODAL CREATE-UPDATE-->
    <x-dialog-modal wire:model="open">
        <form wire:submit="save" enctype="multipart/form-data">
            <!--TITLE-->
            <x-slot name="title">
                Crear nuevo producto
            </x-slot>
            <x-slot name="content">
                <div class="mb-4 gap-5 flex flex-col gap-5">
                    <!--MODAL CREATE-->
                    <div>
                        <x-label value="Nombre completo" />
                        <x-input type="text" class="w-full" wire:model.blur="name" />
                        <x-input-error for="name" />
                    </div>
                    <div>
                        <x-label value="Email" />
                        <x-input type="text" class="w-full" wire:model.blur="email" />
                        <x-input-error for="email" />
                    </div>
                    <div>
                        <x-label value="Telefono" />
                        <x-input type="text" class="w-full" wire:model.blur="phone" />
                        <x-input-error for="phone" />
                    </div>
                    <div>
                        <x-label value="Rol" />
                        <select wire:model.blur="rol_id" class="w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">Seleccione un rol</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="rol_id" />
                    </div>
                </div>
            </x-slot>
            <!--ACCIONES-->
            <x-slot name="footer">
                <div class="flex flex-row-reverse justify-between w-full">
                    <!--CONDITIONAL CREATE-UPDATE-->
                    <x-danger-button wire:click="update" type="button">
                        Actualizar
                    </x-danger-button>
                    <x-secondary-button wire:click="$set('open', false)">
                        Cancelar
                    </x-secondary-button>
                </div>

            </x-slot>
        </form>
    </x-dialog-modal>
    <!--TOAST-->
    <x-action-message on="saved">
        @if (session('status'))
            <x-admin.alert action="{{ session('accion') }}">
                {{ session('status') }}
            </x-admin.alert>
        @endif
    </x-action-message>
</div>
